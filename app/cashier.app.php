<?php

/**
 *    收银台控制器，其扮演的是收银员的角色，你只需要将你的订单交给收银员，收银员按订单来收银，她专注于这个过程
 *
 *    @author    Garbin
 */
class CashierApp extends ShoppingbaseApp
{
    /**
     *    根据提供的订单信息进行支付
     *
     *    @author    Garbin
     *    @param    none
     *    @return    void
     */
    function index()
    {
        /* 外部提供订单号 */
        $order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        if (!$order_id)
        {
            $this->show_warning('no_such_order');

            return;
        }
        /* 内部根据订单号收银,获取收多少钱，使用哪个支付接口 */
        $order_model =& m('order');
        $order_info  = $order_model->get("order_id={$order_id} AND buyer_id=" . $this->visitor->get('user_id'));
        if (empty($order_info))
        {
            $this->show_warning('no_such_order');

            return;
        }
        /* 订单有效性判断 */
        if ($order_info['status'] != ORDER_PENDING)
        {
            $this->show_warning('no_such_order');
            return;
        }
        $payment_model =& m('payment');
        if (!$order_info['payment_id'])
        {
            /* 若还没有选择支付方式，则让其选择支付方式 */
            $payments = $payment_model->get_enabled();
            if (empty($payments))
            {
                $this->show_warning('store_no_payment');

                return;
            }
            /* 找出配送方式，判断是否可以使用货到付款 */
            $model_extm =& m('orderextm');
            $consignee_info = $model_extm->get($order_id);
            if (!empty($consignee_info))
            {
                /* 需要配送方式 */
                $model_shipping =& m('shipping');
                $shipping_info = $model_shipping->get($consignee_info['shipping_id']);
                $cod_regions   = unserialize($shipping_info['cod_regions']);
                $cod_usable = true;//默认可用
                if (is_array($cod_regions) && !empty($cod_regions))
                {
                    /* 取得支持货到付款地区的所有下级地区 */
                    $all_regions = array();
                    $model_region =& m('region');
                    foreach ($cod_regions as $region_id => $region_name)
                    {
                        $all_regions = array_merge($all_regions, $model_region->get_descendant($region_id));
                    }

                    /* 查看订单中指定的地区是否在可货到付款的地区列表中，如果不在，则不显示货到付款的付款方式 */
                    if (!in_array($consignee_info['region_id'], $all_regions))
                    {
                        $cod_usable = false;
                    }
                }
                else
                {
                    $cod_usable = false;
                }
            }
            $all_payments = array('online' => array(), 'offline' => array());
            foreach ($payments as $key => $payment)
            {
                if ($payment['is_online'])
                {
                    $all_payments['online'][] = $payment;
                }
                else
                {
                    $all_payments['offline'][] = $payment;
                }
            }
            $this->assign('order', $order_info);
            $this->assign('payments', $all_payments);
            $this->_curlocal(
                LANG::get('cashier')
            );

            $this->_config_seo('title', Lang::get('confirm_payment') . ' - ' . Conf::get('site_title'));
            $this->display('cashier.payment.html');
        }
        else
        {
            /* 否则直接到网关支付 */
            /* 验证支付方式是否可用，若不在白名单中，则不允许使用 */
            if (!$payment_model->in_white_list($order_info['payment_code']))
            {
                $this->show_warning('payment_disabled_by_system');

                return;
            }
            $payment_info  = $payment_model->get("payment_code = '{$order_info['payment_code']}' AND store_id = 0");
            /* 若卖家没有启用，则不允许使用 */
            if (!$payment_info['enabled'])
            {
                $this->show_warning('payment_disabled');

                return;
            }

            /* 生成支付URL或表单 */
            $payment    = $this->_get_payment($order_info['payment_code'], $payment_info);
            $payment_form = $payment->get_payform($order_info);
			
			if($payment_info['payment_code'] == 'yu_e')
			{
				$this->assign('order', $order_info);
				$this->assign('pay_id', $payment_info['payment_id']);
                header('Content-Type:text/html;charset=' . CHARSET);
            	$this->display('yu_e.payment.html');
				return;
            }

            /* 线下付款的 */
            if (!$payment_info['online'])
            {
                $this->_curlocal(
                    Lang::get('post_pay_message')
                );
            }

            /* 跳转到真实收银台 */
            $this->_config_seo('title', Lang::get('cashier'));
            $this->assign('payform', $payment_form);
            $this->assign('payment', $payment_info);
            $this->assign('order', $order_info);
            header('Content-Type:text/html;charset=' . CHARSET);
            $this->display('cashier.payform.html');
        }
    }

    /**
     *    确认支付
     *
     *    @author    Garbin
     *    @return    void
     */
    function goto_pay()
    {
        $order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        $payment_id = isset($_POST['payment_id']) ? intval($_POST['payment_id']) : 0;
        if (!$order_id)
        {
            $this->show_warning('no_such_order');

            return;
        }
        if (!$payment_id)
        {
            $this->show_warning('no_such_payment');

            return;
        }
        $order_model =& m('order');
        $order_info  = $order_model->get("order_id={$order_id} AND buyer_id=" . $this->visitor->get('user_id'));
        if (empty($order_info))
        {
            $this->show_warning('no_such_order');

            return;
        }

        #可能不合适
        if ($order_info['payment_id'])
        {
            $this->_goto_pay($order_id);
            return;
        }

        /* 验证支付方式 */
        $payment_model =& m('payment');
        $payment_info  = $payment_model->get($payment_id);
        if (!$payment_info)
        {
            $this->show_warning('no_such_payment');

            return;
        }

        /* 保存支付方式 */
        $edit_data = array(
            'payment_id'    =>  $payment_info['payment_id'],
            'payment_code'  =>  $payment_info['payment_code'],
            'payment_name'  =>  $payment_info['payment_name'],
        );

        /* 如果是货到付款，则改变订单状态 */
        if ($payment_info['payment_code'] == 'cod')
        {
            $edit_data['status']    =   ORDER_SUBMITTED;
        }

        $order_model->edit($order_id, $edit_data);

        /* 开始支付 */
        $this->_goto_pay($order_id);
    }

    /**
     *    线下支付消息
     *
     *    @author    Garbin
     *    @return    void
     */
    function offline_pay()
    {
        if (!IS_POST)
        {
            return;
        }
        $order_id       = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        $pay_message    = isset($_POST['pay_message']) ? trim($_POST['pay_message']) : '';
        if (!$order_id)
        {
            $this->show_warning('no_such_order');
            return;
        }
        if (!$pay_message)
        {
            $this->show_warning('no_pay_message');

            return;
        }
        $order_model =& m('order');
        $order_info  = $order_model->get("order_id={$order_id} AND buyer_id=" . $this->visitor->get('user_id'));
        if (empty($order_info))
        {
            $this->show_warning('no_such_order');

            return;
        }
        $edit_data = array(
            'pay_message' => $pay_message
        );

        $order_model->edit($order_id, $edit_data);

        /* 线下支付完成并留下pay_message,发送给卖家付款完成提示邮件 */
        $model_member =& m('member');
        $seller_info   = $model_member->get($order_info['seller_id']);
        $mail = get_mail('toseller_offline_pay_notify', array('order' => $order_info, 'pay_message' => $pay_message));
        $this->_mailto($seller_info['email'], addslashes($mail['subject']), addslashes($mail['message']));

        $this->show_message('pay_message_successed',
            'view_order',   'index.php?app=buyer_order',
            'close_window', 'javascript:window.close();');
    }

    function _goto_pay($order_id)
    {
        header('Location:index.php?app=cashier&order_id=' . $order_id);
    }
	
	//支付定单
	function payment()
	{  
		$payment_id = isset($_POST['payment_id']) ? intval($_POST['payment_id']) : 0;
		if(!$payment_id)
		{
			$this->show_warning('参数错误1');
            return;		
		}
		$payment_model =& m('payment');
        $payment_info  = $payment_model->get($payment_id);
        if (empty($payment_info))
        {
            $this->show_warning('参数错误2');

            return;
        }
		$user_id = $this->visitor->get('user_id');
		$zf_pass = trim($_POST['zf_pass']);
		$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;//提交过来的 定单号码
		if(empty($order_id))
		{
			$this->show_warning('feifacanshu');
			return;
		}
		
		if($_POST)//检测是否提交
		{
			$my_moneylog_mod = & m('my_moneylog');
			//读取moneylog 为了检测提交不重复
			$moneylog_row=$my_moneylog_mod->get("user_id='".$user_id."' and order_id='".$order_id."' and caozuo='10'");
			if($moneylog_row['order_id']==$order_id) 
			{
				$this->show_warning('错误！该订单已经支付了'); 
				return;//定单已经支付
			}
			//读取买家SQL
			$my_money_mod = & m('my_money');
			$buyer_row=$my_money_mod->get("user_id='".$user_id."'");	 
			$buyer_name=$buyer_row['user_name'];//买家用户名
			$buyer_zf_pass =$buyer_row['zf_pass'];//支付密码
			if($buyer_zf_pass=='')
			{
				$this->show_warning('错误！支付密码为空，请到 “ 用户中心->我的钱包->钱包设置 ” 设置您的支付密码'); 
				return;
			}
			$buyer_money=$buyer_row['money'];//当前用户的原始金钱
			
			$order_model =& m('order');
			//检测支付密码
			$new_zf_pass=md5($zf_pass);
			if ( $new_zf_pass != $buyer_zf_pass) 
			{ //支付密码 错误 开始
				$this->show_warning('错误！支付密码验证失败！'); 
				return;
			} 
			//支付密码 错误 结束
			
			//从定单中 读取卖家信息
			$order_row=$order_model->get("order_id='".$order_id."'");
			$order_order_sn=$order_row['order_sn'];//定单号
			$order_seller_id=$order_row['seller_id'];//定单里的 卖家ID
			$order_money=$order_row['order_amount'];//定单里的 最后定单总价格
			//读取卖家SQL
			$seller_row=$my_money_mod->get("user_id='".$order_seller_id."'");	
			$seller_id=$seller_row['user_id'];//卖家ID 
			$seller_name=$seller_row['user_name'];//卖家用户名
			$seller_money_dj=$seller_row['money_dj'] ;//卖家的原始冻结金钱
		
			//检测余额是否足够
			if ( $buyer_money < $order_money) 
			{   //检测余额是否足够 开始
				$this->show_warning('错误！账户余额不足',
				'立即充值',  'index.php?app=my_money&act=paylist'
				);
				return;
			}	//检测余额是否足够 结束

			//检测SESSION 是否存为空
			if ($_SESSION['session_order_sn'] != $order_order_sn)
			{//检测SESSION 开始
				
				//更新扣除买家的金钱
				$buyer_array=array(
					'money'=>$buyer_money-$order_money,
				);
				$my_money_mod->edit('user_id='.$user_id,$buyer_array);
				
				//买家添加日志
				$buyer_log_text = '购买商品，买家扣钱';
				$buyer_add_array=array(
					'user_id'=>$user_id,
					'user_name'=>$buyer_name,
					'order_id '=>$order_id,
					'order_sn '=>$order_order_sn,
					'seller_id'=>$seller_id,
					'seller_name'=>$seller_name,
					'buyer_id'=>$user_id,
					'buyer_name'=>$buyer_name,
					'add_time'=>time(),
					'leixing'=>20,		
					'money_zs'=>"-".$order_money,
					'money'=>$order_money,
					'log_text'=>$buyer_log_text,	
					'caozuo'=>10,
					's_and_z'=>2,
				);
				$my_moneylog_mod->add($buyer_add_array);
				//卖家添加日志
				$order_integral_mod = &m('order_integral');

				$order_money_add = $order_row['order_amount'] + $order_row['jifen'] * Conf::get('exchange_rate');  //购买商品的总价值（不算邮费和其他）

				$order_integral = $order_integral_mod->get($order_id); 
				$seller_log_text= '出售商品，商家应得钱';
				$seller_add_array=array(
					'user_id'=>$seller_id,
					'user_name'=>$seller_name,
					'order_id '=>$order_id,
					'order_sn '=>$order_order_sn,
					'seller_id'=>$seller_id,
					'seller_name'=>$seller_name,
					'buyer_id'=>$user_id,
					'buyer_name'=>$buyer_name,
					'add_time'=>time(),
					'leixing'=>10,		
					'money_zs'=>$order_money_add,
					'money'=>$order_money_add,		
					'log_text'=>$seller_log_text,	
					'caozuo'=>10,
					's_and_z'=>1,																
				);
				$my_moneylog_mod->add($seller_add_array);
				//改变定单为 已支付等待卖家确认  status10改为20
				//更新定单状态
				$order_edit_array=array(
					'pay_time' =>time(),
					'out_trade_sn'=>$order_sn,
					'status'=>ORDER_ACCEPTED,//20就是 待发货了
				);
				$order_model->edit($order_id,$order_edit_array);
				//$edit_data['status']    =   ORDER_ACCEPTED;//定义 为 20 待发货
				//$order_model->edit($order_id, $edit_data);//直接更改为 20 待发货
				//支付成功
				
//				$this->show_message('支付成功',
//					'三秒后自动跳转到订单列表',  'index.php?app=buyer_order',
//					'查看订单',  'index.php?app=buyer_order',
//					'关闭页面', 'index.php?app=my_money&act=exits'
//				);
				//定义SESSION值
				$_SESSION['session_order_sn']=$order_order_sn;	
				
				$this->_curlocal(LANG::get('pay_successed'));
				$this->assign('order', $order_row);
				$this->display('paynotify.index.html');
			}//检测SESSION为空 执行完毕
			else//检测SESSION为空 否则
			{//检测SESSION为空 否则 开始
				$this->show_warning('警告！请不要重复刷新页面！'); 
				return;
			}//检测SESSION为空 否则 结束
		}
		else
		{
			$this->show_warning('非法参数'); 
			return;
		}
	}
}

?>
