<?php

/**
 *    买家的订单管理控制器
 *
 *    @author    Garbin
 *    @usage    none
 */
class Buyer_orderApp extends MemberbaseApp
{
    function index()
    {
        /* 获取订单列表 */
        $this->_get_orders();

        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'), 'index.php?app=member',
                         LANG::get('my_order'), 'index.php?app=buyer_order',
                         LANG::get('order_list'));

        /* 当前用户中心菜单 */
        $this->_curitem('my_order');
        $this->_curmenu('order_list');
        $this->_config_seo('title', Lang::get('member_center') . ' - ' . Lang::get('my_order'));
        $this->import_resource(array(
            'script' => array(
                array(
                    'path' => 'dialog/dialog.js',
                    'attr' => 'id="dialog_js"',
                ),
                array(
                    'path' => 'jquery.ui/jquery.ui.js',
                    'attr' => '',
                ),
                array(
                    'path' => 'jquery.ui/i18n/' . i18n_code() . '.js',
                    'attr' => '',
                ),
                array(
                    'path' => 'jquery.plugins/jquery.validate.js',
                    'attr' => '',
                ),
            ),
            'style' =>  'jquery.ui/themes/ui-lightness/jquery.ui.css',
        ));


        /* 显示订单列表 */
        $this->display('buyer_order.index.html');
    }
    /**
     *    查看订单详情
     *
     *    @author    Garbin
     *    @return    void
     */
    function view()
    {
        $order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        $model_order =& m('order');
        //$order_info  = $model_order->get("order_id={$order_id} AND buyer_id=" . $this->visitor->get('user_id'));
        $order_info = $model_order->get(array(
            'fields'        => "*, order.add_time as order_add_time",
            'conditions'    => "order_id={$order_id} AND buyer_id=" . $this->visitor->get('user_id'),
            'join'          => 'belongs_to_store',
            ));
        if (!$order_info)
        {
            $this->show_warning('no_such_order');

            return;
        }

        /* 团购信息 */
        if ($order_info['extension'] == 'groupbuy')
        {
            $groupbuy_mod = &m('groupbuy');
            $group = $groupbuy_mod->get(array(
                'join' => 'be_join',
                'conditions' => 'order_id=' . $order_id,
                'fields' => 'gb.group_id',
            ));
            $this->assign('group_id',$group['group_id']);
        }

        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'), 'index.php?app=member',
                         LANG::get('my_order'), 'index.php?app=buyer_order',
                         LANG::get('view_order'));

        /* 当前用户中心菜单 */
        $this->_curitem('my_order');

        $this->_config_seo('title', Lang::get('member_center') . ' - ' . Lang::get('order_detail'));

        /* 调用相应的订单类型，获取整个订单详情数据 */
        $order_type =& ot($order_info['extension']);
        $order_detail = $order_type->get_order_detail($order_id, $order_info);
        foreach ($order_detail['data']['goods_list'] as $key => $goods)
        {
			$goods_integral_mod = & m('goods_integral');
			$goods_integral = $goods_integral_mod->get('goods_id='.$goods['goods_id']);
			empty($goods['goods_image']) && $order_detail['data']['goods_list'][$key]['goods_image'] = Conf::get('default_goods_image');
			empty($goods['bargin_price']) && $order_detail['data']['goods_list'][$key]['bargin_price'] = $goods_integral['bargin_price'];
        }
        $this->assign('order', $order_info);
        $this->assign($order_detail['data']);
        $this->display('buyer_order.view.html');
    }

    /**
     *    取消订单
     *
     *    @author    Garbin
     *    @return    void
     */
    function cancel_order()
    {
        $order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        if (!$order_id)
        {
            echo Lang::get('no_such_order');

            return;
        }
        $model_order    =&  m('order');
        /* 只有待付款的订单可以取消 */
        $order_info     = $model_order->get("order_id={$order_id} AND buyer_id=" . $this->visitor->get('user_id') . " AND status " . db_create_in(array(ORDER_PENDING, ORDER_SUBMITTED)));
        if (empty($order_info))
        {
            echo Lang::get('no_such_order');

            return;
        }
        if (!IS_POST)
        {
            header('Content-Type:text/html;charset=' . CHARSET);
            $this->assign('order', $order_info);
            $this->display('buyer_order.cancel.html');
        }
        else
        {
            $model_order->edit($order_id, array('status' => ORDER_CANCELED));
            if ($model_order->has_error())
            {
                $this->pop_warning($model_order->get_error());

                return;
            }

            /* 加回商品库存 */
            $model_order->change_stock('+', $order_id);
            $cancel_reason = (!empty($_POST['remark'])) ? $_POST['remark'] : $_POST['cancel_reason'];
            /* 记录订单操作日志 */
            $order_log =& m('orderlog');
            $order_log->add(array(
                'order_id'  => $order_id,
                'operator'  => addslashes($this->visitor->get('user_name')),
                'order_status' => order_status($order_info['status']),
                'changed_status' => order_status(ORDER_CANCELED),
                'remark'    => $cancel_reason,
                'log_time'  => gmtime(),
            ));
			
			// 订单取消后，归还各自积分 tyioocom 
			$order_integral_mod = &m('order_integral');
			$integral_mod = &m('my_money');
			$order_integral = $order_integral_mod->get($order_id);
			if($order_integral)
			{
				$integral_buyer = $integral_mod->get('user_id='.$this->visitor->get('user_id'));
				$integral_mod->edit($integral_buyer['id'],'jifen=jifen+'.$order_integral['seller_has_integral']);
				
				$integrallog_mod = &m('my_integrallog');
				$integrallog_mod->add(array(
					'user_id' => $this->visitor->get('user_id'),
					'user_name' => $this->visitor->get('user_name'),
					'recieve_id' =>$this->visitor->get('user_id'),
					'recieve_name' => $this->visitor->get('user_name'),
					'add_time' => gmtime(),
					'state' => 14,
					'jifen' => $order_integral['seller_has_integral'],
					'log_text' => '用户取消订单，返回扣除的积分',
				 ));
			}
			// end 

            /* 发送给卖家订单取消通知 */
            $model_member =& m('member');
            $seller_info   = $model_member->get($order_info['seller_id']);
            $mail = get_mail('toseller_cancel_order_notify', array('order' => $order_info, 'reason' => $_POST['remark']));
            $this->_mailto($seller_info['email'], addslashes($mail['subject']), addslashes($mail['message']));

            $new_data = array(
                'status'    => Lang::get('order_canceled'),
                'actions'   => array(), //取消订单后就不能做任何操作了
            );

            $this->pop_warning('ok');
        }

    }

    /**
     *    确认订单
     *
     *    @author    Garbin
     *    @return    void
     */
    function confirm_order()
    {
        $order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        if (!$order_id)
        {
            echo Lang::get('no_such_order');

            return;
        }
        $model_order    =&  m('order');
        /* 只有已发货的订单可以确认 */
        $order_info     = $model_order->get("order_id={$order_id} AND buyer_id=" . $this->visitor->get('user_id') . " AND status=" . ORDER_SHIPPED);
        if (empty($order_info))
        {
            echo Lang::get('no_such_order');

            return;
        }
        if (!IS_POST)
        {
            header('Content-Type:text/html;charset=' . CHARSET);
            $this->assign('order', $order_info);
            $this->display('buyer_order.confirm.html');
        }
        else
        {
			//猫粮开始
			$customer_mod = & m('customer');
			$cat_log_mod = & m('my_catfoodlog');
			$model_member =& m('member');
			$catfood_rate = Conf::get('catfood_rate');
			$this->my_money_mod =& m('my_money');;
			$my_moneylog = & m('my_moneylog');
			$cat_info = $customer_mod->get('buyer_id='.$this->visitor->get('user_id').' and store_id='.$order_info['seller_id']);
			if(empty($cat_info))
			{
				$customer_id = $customer_mod->add(array(
					'buyer_id'  =>  $this->visitor->get('user_id'),
					'store_id'  =>  $order_info['seller_id'],
					'purchase_number'  =>  1
				));
				if(!$customer_id)
				{
					$this->pop_warning($customer_mod->get_error());

                	return;
				}
				$store_mod = & m('store');
				$cat_foods = $store_mod->get($order_info['seller_id']);
				$ms =& ms();
				$content = '';
				if($cat_foods['cat_food']>=10)
				{
					$store_mod->edit($order_info['seller_id'],'cat_food=cat_food-1');
				}
				elseif($cat_foods['cat_food']>=1&&$cat_foods['cat_food']<10)
				{
					$store_mod->edit($order_info['seller_id'],'cat_food=cat_food-1');
				    $content = '您的猫粮少于10个，请及时购买猫粮，猫粮不足将从交易所得中扣取！';
            		$ms->pm->send(MSG_SYSTEM, $order_info['seller_id'], '', $content);
				}
				else
				{
					$ids =  $this->my_money_mod->get('user_id = '.$order_info['seller_id']);
					$id2 = $ids['id'];
					$this->my_money_mod->edit($id2,'money=money-'.$catfood_rate);
					$data1=array(
						'user_id' => $order_info['seller_id'],
						'user_name' => $order_info['seller_name'],
						'recieve_id' =>$order_info['seller_id'],
						'recieve_name' => $order_info['seller_name'],
						'add_time' => gmtime(),
						'state' => 3,
						'cat_food' => 1,
						'log_text' => '用户购买猫粮',
					);
					$data2=array(
						'user_id'=>$order_info['seller_id'],
						'user_name'=>$order_info['seller_name'],
						'buyer_name'=>$order_info['seller_name'],
						'order_id '=>'',
						'add_time'=>time(),
						'leixing'=>56,	
						's_and_z'=>2,
						'money_zs'=> $catfood_rate,	
						'money'=>'-'.$catfood_rate,		
						'log_text'=>'购买猫粮使用',
						'caozuo'=>71,																				
					);
					$cat_log_mod->add($data1);
					$my_moneylog->add($data2);
					$content = '您的猫粮不足，请及时购买猫粮，此次交易直接从交易所得扣取！';
            		$ms->pm->send(MSG_SYSTEM, $order_info['seller_id'], '', $content);
				}
				
				$seller_info=$model_member->get('user_id='.$order_info['seller_id']);

				$cat_log_mod->add(array(
					'user_id' => $order_info['buyer_id'],
					'user_name'  =>  $order_info['buyer_name'],
					'recieve_id'  =>  $order_info['seller_id'],
					'recieve_name'  =>  $seller_info['user_name'],
					'add_time' => gmtime(),
					'state'  =>  '1',
					'cat_food'  => '1',
					'log_text' =>  '用户首次购买消耗猫粮'
				));
			}
			else
			{
				$customer_mod->edit($cat_info['customer_id'],'purchase_number=purchase_number+1');
			}
			//猫粮结束
            $model_order->edit($order_id, array('status' => ORDER_FINISHED, 'finished_time' => gmtime()));  //修改订单状态
            if ($model_order->has_error())
            {
                $this->pop_warning($model_order->get_error());

                return;
            }
            /* 记录订单操作日志 */
            $order_log =& m('orderlog');
            $order_log->add(array(
                'order_id'  => $order_id,
                'operator'  => addslashes($this->visitor->get('user_name')),
                'order_status' => order_status($order_info['status']),
                'changed_status' => order_status(ORDER_FINISHED),
                'remark'    => Lang::get('buyer_confirm'),
                'log_time'  => gmtime(),
            ));
			
			/* 买家确认收货后，即交易完成，将订单积分表中的积分进行派发 by tyioocom */
			/* 在这里不用判断商城是否开启积分功能，只要该订单有积分设置，则进行派发。 */
			$order_integral_mod = &m('order_integral');
			$integral_mod = &m('my_money');
			$order_integral = $order_integral_mod->get($order_id);  //订单积分表
			if($order_integral)
			{
				$integral_buyer = $integral_mod->get('user_id='.$this->visitor->get('user_id')); //买家获得积分
				$integral_buyer['jifen'] = $integral_buyer['jifen']+$order_integral['buyer_has_integral'];
				$integral_mod->edit($integral_buyer['id'],$integral_buyer);
				
				$integral_seller = $integral_mod->get('user_id='.$order_info['seller_id']);  //卖家获得积分
				
				$money_jifen =  $order_integral['seller_has_integral'] * Conf::get('exchange_rate'); //用户积分换成的钱

				$money_order = $order_info['order_amount'];  //用户购买的钱
		
			    $_money_exchange = $order_integral['buyer_has_integral'] * Conf::get('exchange_rate');

				if($order_info['integral_state']==1)
				{
					$order_money = $order_info['goods_amount'] + $order_info['jifen'] * Conf::get('exchange_rate');  //购买商品的总价值（不算邮费和其他）
				}
				else
				{
					$order_money = $order_info['goods_amount'];
				}
				
				$_money_fuwu = $order_money * 0.08;  //总价值的8%要重做服务费（其中0%给网站，8%给商家邀请的客户）
				
				$integral_mod->edit($integral_seller['id'],'money = money + '.$money_jifen.' + '.$money_order.' - '.$_money_exchange.' - '.$_money_fuwu);
				
				$model_member =& m('member');
				$seller_info=$model_member->get('user_id='.$order_info['seller_id']);
				
				$my_moneylog_mod = & m('my_moneylog');
				//买家添加日志
				$seller_log_text =Lang::get('商家扣除由赠送积分转换成的钱');
				$buyer_add_array=array(
					'user_id'=>$order_info['seller_id'],
					'user_name'=>$seller_info['user_name'],
					'order_id '=>$order_id,
					'order_sn '=>$order_info['order_sn'],
					'seller_id'=>$order_info['seller_id'],
					'seller_name'=>$seller_info['user_name'],
					'buyer_id'=>$this->visitor->get('user_id'),
					'buyer_name'=>$this->visitor->get('user_name'),
					'add_time'=>time(),
					'leixing'=>56,		
					'money_zs'=>"-".$_money_exchange,
					'money'=> $_money_exchange,
					'log_text'=>$seller_log_text,	
					'caozuo'=>0,
					's_and_z'=>2,
				);
				$my_moneylog_mod->add($buyer_add_array);

				//扣除商家服务费
				$seller_log_text =Lang::get('订单完成，扣除商家服务费');
				$seller_add_array=array(
					'user_id'  =>$order_info['seller_id'],
					'user_name'=>$seller_info['user_name'],
					'order_id '=>$order_id,
					'order_sn '=>$order_info['order_sn'],
					'seller_id'=>$order_info['seller_id'],
					'seller_name'=>$seller_info['user_name'],
					'buyer_id'=>$order_info['seller_id'],
					'buyer_name'=>$seller_info['user_name'],
					'add_time'=>time(),
					'leixing'=>56,		
					'money_zs'=>"-".$_money_fuwu,
					'money'=>$_money_fuwu,
					'log_text'=>$seller_log_text,	
					'caozuo'=>71,
					's_and_z'=>2,
				);
				$my_moneylog_mod->add($seller_add_array);
				
				$log_text = '出售商品，商家应得钱';
				$log_change=$my_moneylog_mod->get("log_text='".$log_text."' and order_id=".$order_id);
				$seller_add_array=array(
					'caozuo'=>50,															
				);
				$my_moneylog_mod->edit($log_change['id'],array(
					'caozuo'=>50,	
					'log_text'  =>  '出售商品，资金已入账',
				));
				
				$czmoneys=0.08 * $order_money ;
				$customer_mod =& m('customer');
				$this->my_moneylog_mod=& m('my_moneylog');
				$gongxianid = $customer_mod->get("buyer_id='".$this->visitor->get('user_id')."' and firstgm=1");
				if($gongxianid&&$czmoneys>0)
				{
					//给带来客户的商家增加贡献资金8%
					$firstinviteid = $gongxianid['store_id'];
					$ids =  $integral_mod->get('user_id = '.$firstinviteid);
					$id = $ids['id'];
					
					$member_mod = & m('member');
					$inviter = $member_mod->get('user_id='.$firstinviteid);
					$integral_mod->edit($id,'money=money+'.$czmoneys);
					//写资金日志
					$buyer_log_text = '邀请的新客户下单贡献资金';
					$buyer_add_array=array(
						'user_id'  =>$firstinviteid,
						'user_name'=>$inviter['user_name'],
						'order_id '=>$order_id,
						'order_sn '=>$order_info['order_sn'],
						'seller_id'=>$order_info['seller_id'],
						'seller_name'=>$seller_info['user_name'],
						'buyer_id'=>$this->visitor->get('user_id'),
						'buyer_name'=>$this->visitor->get('user_name'),
						'add_time'=>time(),
						'leixing'=>56,		
						'money_zs'=>"+".$order_money * 0.08,
						'money'=>$order_money * 0.08,
						'log_text'=>$buyer_log_text,	
						'caozuo'=>73,
						's_and_z'=>1,
					);
					$my_moneylog_mod->add($buyer_add_array);
				}
				$integrallog_mod = &m('my_integrallog');
				$integrallog_mod->add(array(
					'user_id' => $this->visitor->get('user_id'),
					'user_name' => $this->visitor->get('user_name'),
					'recieve_id' => $this->visitor->get('user_id'),
					'recieve_name' => $seller_info['user_name'],
					'add_time' => gmtime(),
					'state' => 2,
					'jifen' => $order_integral['buyer_has_integral'],
					'log_text' => '用户获得商家赠送积分',
				 ));
//				 $integrallog_mod->add(array(
//					'user_id' => $order_info['seller_id'],
//					'user_name' => $seller_info['user_name'],
//					'recieve_id' => $this->visitor->get('user_id'),
//					'recieve_name' => $this->visitor->get('user_name'),
//					'add_time' => gmtime(),
//					'state' => 3,
//					'jifen' => $order_integral['seller_has_integral'],
//					'log_text' => '商家获得用户购买使用积分',
//				 ));
			}
			/*派发结束 by tyioocom */
			
            /* 发送给卖家买家确认收货邮件，交易完成 */
            $model_member =& m('member');
            $seller_info   = $model_member->get($order_info['seller_id']);
            $mail = get_mail('toseller_finish_notify', array('order' => $order_info));
            $this->_mailto($seller_info['email'], addslashes($mail['subject']), addslashes($mail['message']));

            $new_data = array(
                'status'    => Lang::get('order_finished'),
                'actions'   => array('evaluate'),
            );

            /* 更新累计销售件数 */
            $model_goodsstatistics =& m('goodsstatistics');
            $model_ordergoods =& m('ordergoods');
            $order_goods = $model_ordergoods->find("order_id={$order_id}");
            foreach ($order_goods as $goods)
            {
                $model_goodsstatistics->edit($goods['goods_id'], "sales=sales+{$goods['quantity']}");
            }

            $this->pop_warning('ok','','index.php?app=buyer_order&act=evaluate&order_id='.$order_id);;
        }

    }

    /**
     *    给卖家评价
     *
     *    @author    Garbin
     *    @param    none
     *    @return    void
     */
    function evaluate()
    {
        $order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
        if (!$order_id)
        {
            $this->show_warning('no_such_order');

            return;
        }

        /* 验证订单有效性 */
        $model_order =& m('order');
        $order_info  = $model_order->get("order_id={$order_id} AND buyer_id=" . $this->visitor->get('user_id'));
        if (!$order_info)
        {
            $this->show_warning('no_such_order');

            return;
        }
        if ($order_info['status'] != ORDER_FINISHED)
        {
            /* 不是已完成的订单，无法评价 */
            $this->show_warning('cant_evaluate');

            return;
        }
        if ($order_info['evaluation_status'] != 0)
        {
            /* 已评价的订单 */
            $this->show_warning('already_evaluate');

            return;
        }
        $model_ordergoods =& m('ordergoods');

        if (!IS_POST)
        {
            /* 显示评价表单 */
            /* 获取订单商品 */
            $goods_list = $model_ordergoods->find("order_id={$order_id}");
            foreach ($goods_list as $key => $goods)
            {
                empty($goods['goods_image']) && $goods_list[$key]['goods_image'] = Conf::get('default_goods_image');
            }
            $this->_curlocal(LANG::get('member_center'), 'index.php?app=member',
                             LANG::get('my_order'), 'index.php?app=buyer_order',
                             LANG::get('evaluate'));
            $this->assign('goods_list', $goods_list);
            $this->assign('order', $order_info);

            $this->_config_seo('title', Lang::get('member_center') . ' - ' . Lang::get('credit_evaluate'));
            $this->display('buyer_order.evaluate.html');
        }
        else
        {
            $evaluations = array();
            /* 写入评价 */
            foreach ($_POST['evaluations'] as $rec_id => $evaluation)
            {
                if ($evaluation['evaluation'] <= 0 || $evaluation['evaluation'] > 3)
                {
                    $this->show_warning('evaluation_error');

                    return;
                }
                switch ($evaluation['evaluation'])
                {
                    case 3:
                        $credit_value = 1;
                    break;
                    case 1:
                        $credit_value = -1;
                    break;
                    default:
                        $credit_value = 0;
                    break;
                }
                $evaluations[intval($rec_id)] = array(
                    'evaluation'    => $evaluation['evaluation'],
                    'comment'       => $evaluation['comment'],
                    'credit_value'  => $credit_value
                );
            }
            $goods_list = $model_ordergoods->find("order_id={$order_id}");
            foreach ($evaluations as $rec_id => $evaluation)
            {
                $model_ordergoods->edit("rec_id={$rec_id} AND order_id={$order_id}", $evaluation);
                $goods_url = SITE_URL . '/' . url('app=goods&id=' . $goods_list[$rec_id]['goods_id']);
                $goods_name = $goods_list[$rec_id]['goods_name'];
                $this->send_feed('goods_evaluated', array(
                    'user_id'   => $this->visitor->get('user_id'),
                    'user_name'   => $this->visitor->get('user_name'),
                    'goods_url'   => $goods_url,
                    'goods_name'   => $goods_name,
                    'evaluation'   => Lang::get('order_eval.' . $evaluation['evaluation']),
                    'comment'   => $evaluation['comment'],
                    'images'    => array(
                        array(
                            'url' => SITE_URL . '/' . $goods_list[$rec_id]['goods_image'],
                            'link' => $goods_url,
                        ),
                    ),
                ));
            }

            /* 更新订单评价状态 */
            $model_order->edit($order_id, array(
                'evaluation_status' => 1,
                'evaluation_time'   => gmtime()
            ));

            /* 更新卖家信用度及好评率 */
            $model_store =& m('store');
            $model_store->edit($order_info['seller_id'], array(
                'credit_value'  =>  $model_store->recount_credit_value($order_info['seller_id']),
                'praise_rate'   =>  $model_store->recount_praise_rate($order_info['seller_id'])
            ));

            /* 更新商品评价数 */
            $model_goodsstatistics =& m('goodsstatistics');
            $goods_ids = array();
            foreach ($goods_list as $goods)
            {
                $goods_ids[] = $goods['goods_id'];
            }
            $model_goodsstatistics->edit($goods_ids, 'comments=comments+1');


            $this->show_message('evaluate_successed',
                'back_list', 'index.php?app=buyer_order');
        }
    }

    /**
     *    获取订单列表
     *
     *    @author    Garbin
     *    @return    void
     */
    function _get_orders()
    {
        $page = $this->_get_page(10);
        $model_order =& m('order');
        !$_GET['type'] && $_GET['type'] = 'all_orders';
        $con = array(
            array(      //按订单状态搜索
                'field' => 'status',
                'name'  => 'type',
                'handler' => 'order_status_translator',
            ),
            array(      //按店铺名称搜索
                'field' => 'seller_name',
                'equal' => 'LIKE',
            ),
            array(      //按下单时间搜索,起始时间
                'field' => 'add_time',
                'name'  => 'add_time_from',
                'equal' => '>=',
                'handler'=> 'gmstr2time',
            ),
            array(      //按下单时间搜索,结束时间
                'field' => 'add_time',
                'name'  => 'add_time_to',
                'equal' => '<=',
                'handler'=> 'gmstr2time_end',
            ),
            array(      //按订单号
                'field' => 'order_sn',
            ),
        );
        $conditions = $this->_get_query_conditions($con);
        /* 查找订单 */
        $orders = $model_order->findAll(array(
            'conditions'    => "buyer_id=" . $this->visitor->get('user_id') . "{$conditions}",
            'fields'        => 'this.*',
            'count'         => true,
            'limit'         => $page['limit'],
            'order'         => 'add_time DESC',
            'include'       =>  array(
                'has_ordergoods',       //取出商品
            ),
        ));
        foreach ($orders as $key1 => $order)
        {
            foreach ($order['order_goods'] as $key2 => $goods)
            {
				$goods_integral_mod = & m('goods_integral');
				$goods_integral = $goods_integral_mod->get('goods_id='.$goods['goods_id']);
                empty($goods['goods_image']) && $orders[$key1]['order_goods'][$key2]['goods_image'] = Conf::get('default_goods_image');
				empty($goods['bargin_price']) && $orders[$key1]['order_goods'][$key2]['bargin_price'] = $goods_integral['bargin_price'];
            }
        }

        $page['item_count'] = $model_order->getCount();
        $this->assign('types', array('all'     => Lang::get('all_orders'),
                                     'pending' => Lang::get('pending_orders'),
                                     'submitted' => Lang::get('submitted_orders'),
                                     'accepted' => Lang::get('accepted_orders'),
                                     'shipped' => Lang::get('shipped_orders'),
                                     'finished' => Lang::get('finished_orders'),
                                     'canceled' => Lang::get('canceled_orders')));
        $this->assign('type', $_GET['type']);
        $this->assign('orders', $orders);
        $this->_format_page($page);
        $this->assign('page_info', $page);
    }

    function _get_member_submenu()
    {
        $menus = array(
            array(
                'name'  => 'order_list',
                'url'   => 'index.php?app=buyer_order',
            ),
        );
        return $menus;
    }

}

?>
