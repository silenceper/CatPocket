<?php
class Ss_jifenApp extends BackendApp
{
    var $ss_jifen_mod;
    function __construct()
    {
        $this->RefundApp();
    }
    function RefundApp ()
    {
        $this->ss_jifen_mod= & m('ss_jifen');
        parent::__construct();
    }
    function index()
    {
        $search_options = array(
            'seller_name'   => Lang::get('seller_name'),
            'buyer_name'   => Lang::get('buyer_name'),
        );
        /* 默认搜索的字段是店铺名 */
        $field = 'seller_name';
        array_key_exists($_GET['field'], $search_options) && $field = $_GET['field'];
        $conditions = $this->_get_query_conditions(array(array(
                'field' => $field,       //按用户名,店铺名,支付方式名称进行搜索
                'equal' => 'LIKE',
                'name'  => 'search_name',
            ),array(
                'field' => 'add_time',
                'name'  => 'add_time_from',
                'equal' => '>=',
                'handler'=> 'gmstr2time',
            ),array(
                'field' => 'add_time',
                'name'  => 'add_time_to',
                'equal' => '<=',
                'handler'   => 'gmstr2time_end',
            ),
        ));
        $page   =   $this->_get_page(10);    //获取分页信息
        //更新排序
        if (isset($_GET['sort']) && isset($_GET['order']))
        {
            $sort  = strtolower(trim($_GET['sort']));
            $order = strtolower(trim($_GET['order']));
            if (!in_array($order,array('asc','desc')))
            {
             $sort  = 'add_time';
             $order = 'desc';
            }
        }
        else
        {
            $sort  = 'add_time';
            $order = 'desc';
        }
        $jifens = $this->ss_jifen_mod->find(array(
		    'join' => '',
    		'fields' => 'this.*',
            'conditions'    => '1=1 ' . $conditions,
            'limit'         => $page['limit'],  //获取当前页的数据
            'order'         => "$sort $order",
            'count'         => true             //允许统计
        )); //找出所有商城的合作伙伴
        $page['item_count'] = $this->ss_jifen_mod->getCount();   //获取统计的数据
        $this->_format_page($page);
        $this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
        $this->assign('search_options', $search_options);
        $this->assign('page_info', $page);          //将分页信息传递给视图，用于形成分页条
        $this->assign('jifens', $jifens);
        $this->import_resource(array('script' => 'inline_edit.js,jquery.ui/jquery.ui.js,jquery.ui/i18n/' . i18n_code() . '.js',
                                      'style'=> 'jquery.ui/themes/ui-lightness/jquery.ui.css'));
        $this->display('ss_jifen.index.html');
    }
	
	function view()
	{
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
                    'path' => 'member.js',
                    'attr' => '',
                ),
            ),
            'style' =>  'jquery.ui/themes/ui-lightness/jquery.ui.css',
			'style' =>  'dialig/dialog.css',
        ));
		$id = isset($_GET['id']) ? trim($_GET['id']) : '';
		if (!$id)
        {
            $this->show_warning('no_order_to_refund');
            return;
        }

		$jifen = $this->ss_jifen_mod->get('ss_id='.$id);
		if(empty($jifen))
		{
            $this->show_warning('no_order_to_refund');
            return;
		}

		$this->assign('jifen_info',$jifen);

		if(!IS_POST)
		{
			$this->display('ss_jifen.view.html');
		}
		else
		{
			
		}
	}
	
	function submit()
	{
		$ss_id = isset($_GET['id']) ? trim($_GET['id']) : '';
		if (!$ss_id)
        {
            $this->show_warning('no_order_to_edit');
            return;
        }
		$jifen = $this->ss_jifen_mod->get('ss_id='.$ss_id);
		if(empty($jifen))
        {
            $this->show_warning('no_order_to_edit');
            return;
        }
		$member =& m('member');
		$buyer_info=$member->get($jifen['buyer_id']);
		if($buyer_info)
		{
			
			$money_mod = & m('my_money');
			$money_info = $money_mod->get('user_id='.$jifen['buyer_id']);
			if($money_info['jifen']>=$jifen['jifen'])
			{
				$this->ss_jifen_mod->edit($ss_id,array('ss_state' => 3,'update_time' =>gmtime()));
				$money_mod->edit($jifen['buyer_id'],'jifen=jifen+'.$jifen['jifen']);
				
				$integrallog_mod = &m('my_integrallog');
				$integrallog_mod->add(array(
					'user_id' => $jifen['buyer_id'],
					'user_name' => $jifen['buyer_name'],
					'recieve_id' => $jifen['buyer_id'],
					'recieve_name' => $jifen['buyer_name'],
					'add_time' => gmtime(),
					'state' => 14,
					'jifen' => $jifen['jifen'],
					'log_text' => '积分转账，扣除使用积分',
				));
				
				$ms =& ms();
				$buyer_content='申述已确认，积分已发至您的账户';
				$seller_content='申述已确认，积分已发给买家';
				$ms->pm->send(MSG_SYSTEM,$jifen['buyer_id'],'',$buyer_content);
				$ms->pm->send(MSG_SYSTEM,$jifen['seller_id'],'',$seller_content);
				
				$this->show_message('发钱给技术员成功','index.php');
			}
			else
				$this->show_warning('买家积分不足，不能发积分');
		}
		else
		{
			$this->show_warning('申述失败');
		}
	}

	function failure()
	{
		$ss_id = isset($_GET['id']) ? trim($_GET['id']) : '';
		if (!$ss_id)
        {
            $this->show_warning('no_order_to_edit');
            return;
        }
		$jifen = $this->ss_jifen_mod->get('ss_id='.$ss_id);
		if(empty($jifen))
        {
            $this->show_warning('no_order_to_edit');
            return;
        }
		$member =& m('member');
		$seller_info=$member->get($jifen['seller_id']);
		if($seller_info)
		{
			
			$money_mod = & m('my_money');
			$money_info = $money_mod->get('user_id='.$jifen['seller_id']);
			if($money_info['jifen']>=$jifen['jifen'])
			{
				$this->ss_jifen_mod->edit($ss_id,array('ss_state' => 3,'update_time' =>gmtime()));
				$_money_exchange = $jifen['jifen'] * Config::get('exchange_rate') * 0.92;
				$money_mod->edit($jifen['seller_id'],'money=money+'.$_money_exchange);
				
				$my_moneylog_mod = & m('my_moneylog');
				//买家添加日志
				$seller_log_text =Lang::get('商家扣除由赠送积分转换成的钱');
				$seller_add_array=array(
					'user_id'=>$jifen['seller_id'],
					'user_name'=>$jifen['seller_name'],
					'order_id '=>0,
					'order_sn '=>'',
					'seller_id'=>$jifen['seller_id'],
					'seller_name'=>$jifen['seller_name'],
					'buyer_id'=>$jifen['buyer_id'],
					'buyer_name'=>$jifen['buyer_name'],
					'add_time'=>time(),
					'leixing'=>56,		
					'money_zs'=>"+".$_money_exchange,
					'money'=> $_money_exchange,
					'log_text'=>$seller_log_text,	
					'caozuo'=>909,
					's_and_z'=>1,
				);
				$my_moneylog_mod->add($seller_add_array);
				
				$ms =& ms();
				$buyer_content='申述已确认，积分已发给卖家';
				$seller_content='申述已确认，积分已转换成金额发至您的账户';
				$ms->pm->send(MSG_SYSTEM,$jifen['buyer_id'],'',$buyer_content);
				$ms->pm->send(MSG_SYSTEM,$jifen['seller_id'],'',$seller_content);
				
				$this->show_message('发钱给技术员成功','index.php');
			}
			else
				$this->show_warning('买家积分不足，不能发积分');
		}
		else
		{
			$this->show_warning('申述失败');
		}
		
	}
	
	function cancel()
	{
		$order_id = isset($_GET['id']) ? trim($_GET['id']) : '';
		if (!$order_id)
        {
            $this->show_warning('no_order_to_edit');
            return;
        }
		$model_order =& m('order');
		$order_info = $model_order->get('order_id='. $order_id.' and order_state=5');
		if(empty($order_info))
        {
            $this->show_warning('no_order_to_edit');
            return;
        }
		if (!IS_POST)
        {
            header('Content-Type:text/html;charset=' . CHARSET);
            $this->assign('order', $order_info);
            $this->display('ss_jifen.cancel.html');
        }
        else
        {
            $cancel_reason = (!empty($_POST['remark'])) ? $_POST['remark'] : $_POST['cancel_reason'];
			$refund_info = $this->ss_jifen_mod->get('order_id='.$order_id);
			$this->ss_jifen_mod->edit($refund_info['refund_id'],'ss_status=0');
			$ms =& ms();
			$content='申述材料不详细';
			$ms->pm->send(MSG_SYSTEM,$order_info['buyer_id'],$content,$cancel_reason);
			$this->show_warning('add_ok');
        }

	}

}
?>
