<?php

class Cat_foodApp extends MemberbaseApp
{	
 	function index()
    {
		$this->my_money_mod =& m('my_money');
		$this->my_moneylog_mod =& m('my_moneylog');
		$this->my_store_mod =& m('store'); 
		/* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('mycat_food'),         'index.php?app=cat_food&act=index',
                         LANG::get('mycat_foodlist')
                         );
        /* 当前用户中心菜单 */
        $this->_curitem('cat_food');	
        $this->assign('page_title', Lang::get('member_center') . ' - ' . Lang::get('mycat_food'));
		$user_id = $this->visitor->get('user_id');	
		$store_id = $this->visitor->get('manage_store');  
		$user_jf = $this->my_money_mod->get('user_id='.$user_id); 	
		$stores = $this->my_store_mod->get($store_id);
		$catfood_rate = Conf::get('catfood_rate');
		$this->assign('user_money', $user_jf['money']);
		$this->assign('stores', $stores);
		$this->assign('user_id', $user_id);
		$this->assign('store_id', $store_id);
		$this->assign('catfood_rate', $catfood_rate);	
		$this->display('cat_food.add.html');
	}	
	

	//猫粮充值
	function foodcz()
	{
		$this->my_money_mod =& m('my_money');
		$my_catfoodlog = & m('my_catfoodlog');
		$my_moneylog = & m('my_moneylog');
		$this->my_store_mod =& m('store');
		$catfood_rate = Conf::get('catfood_rate');
		$user_id = $this->visitor->get('user_id');
		$store_id = $this->visitor->get('manage_store');
		$buyer_row = $this->my_money_mod->getrow("select * from ".DB_PREFIX."my_money where user_id='$user_id'");	 
		$buyer_zf_pass =$buyer_row['zf_pass'];//支付密码
		$zf_pass = isset($_POST['zf_pass']) ? $_POST['zf_pass'] : 0;
		$new_zf_pass=md5($zf_pass);
		if ( $new_zf_pass != $buyer_zf_pass) 
		{ //支付密码 错误 开始
			$this->show_warning('cuowu_zhifumimayanzhengshibai'); 
			return;
		} 
		//支付密码 错误 结束
		$food_num = isset($_POST['food_num']) ? $_POST['food_num'] : 0;
		$user_setting=isset($_POST['user_setting']) ? $_POST['user_setting'] : 0;
		if($food_num==0)
		{
			$this->show_warning('非法参数');
			return;
		}
		$ids =  $this->my_money_mod->get('user_id = '.$this->visitor->get('user_id'));
		$id = $ids['id'];
		if($food_num*$catfood_rate <= $ids['money'])
		{
			$this->my_money_mod->edit($id,'money=money-'.$food_num*$catfood_rate);
			$this->my_store_mod->edit($store_id,'cat_food=cat_food+'.$food_num);
			$data=array(
				'user_id' => $this->visitor->get('user_id'),
				'user_name' => $this->visitor->get('user_name'),
				'recieve_id' => $this->visitor->get('user_id'),
				'recieve_name' => $this->visitor->get('user_name'),
				'add_time' => gmtime(),
				'state' => 3,
				'cat_food' => $food_num,
				'log_text' => '用户购买猫粮',
			);
			$data2=array(
				'user_id'=>$this->visitor->get('user_id'),
				'user_name'=>$this->visitor->get('user_name'),
				'buyer_name'=>$this->visitor->get('user_name'),
				'order_id '=>'',
				'add_time'=>time(),
				'leixing'=>56,	
				's_and_z'=>2,
				'money_zs'=> $food_num*$catfood_rate,	
				'money'=>'-'. $food_num*$catfood_rate,		
				'log_text'=>'购买猫粮使用',
				'caozuo'=>71,																				
			);
			$my_catfoodlog->add($data);
			$my_moneylog->add($data2);
			$this->show_message('购买成功','返回','index.php?app=cat_food');
		}
		else
		{
			 $this->show_message('余额不足，请充值后再兑换','返回','index.php?app=cat_food');
		}
	}
	
	//猫粮记录
	function catfood_jilu()
	{
			/* 当前位置 */
		$this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
						 LANG::get('mycat_food'),         'index.php?app=cat_food',
						 LANG::get('mycat_foodlog')
						 );
		/* 当前用户中心菜单 */
		$this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('mycat_food').' - '.Lang::get('mycat_foodlog'));
		$this->_curitem('mycat_foodlog');	
		$my_catfoodlog = & m('my_catfoodlog');
		$user_id = $this->visitor->get('user_id');	
		$page = $this->_get_page();
		$my_integralloginfo=$my_catfoodlog->find(array(
			'field' => 'this.*',
			'conditions' => 'recieve_id='.$user_id.' or user_id='.$user_id,
			'join' => '',
			'limit' => $page['limit'],
			'order' => "add_time desc",
			'count' => true,
		));
		$page['item_count'] = $my_catfoodlog->getCount();
		$this->_format_page($page);
		$this->assign('page_info',$page);
		$this->assign('my_integralloginfo', $my_integralloginfo);
		$this->display('catfood.jilu.html');
	}
}
?>
