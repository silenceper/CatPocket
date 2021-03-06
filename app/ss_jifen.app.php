<?php

class Ss_jifenApp extends MemberbaseApp
{
	function take_jifen()
    {

	   	if(!$this->visitor->get('manage_store'))
		{
			$this->show_warning('您没有权限！'); 
			return;
		}
	    /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                         LANG::get('take_jifen'), 'index.php?app=ss_jifen&act=take_jifen',
                         LANG::get('take_jifen'));
		
		/* 当前用户中心菜单 */
		$this->_curitem('take_jifen');

		/* 当前所处子菜单 */
		$this->_curmenu('take_jifen');
		$money_mod = & m('my_money');
		$user_id = $this->visitor->get('user_id');
		$user_jf=$money_mod->get('user_id='.$user_id);	
		$ss_jifen_mod = & m('ss_jifen');
		$ss_jifen_info = $ss_jifen_mod->find(array(
		    'fields'    => 'this.*',
			'join'      => '',
			'conditions'=> 'seller_id='.$user_id,
			'order' => 'add_time desc',
		)); 
		$this->assign('user_jf', $user_jf['jifen']);	
		$this->assign('ss_jifen_info', $ss_jifen_info);			 
		$this->display('ss_jifen.take.html');
	}
	function song_jifen()
    {
		/* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),    'index.php?app=member',
                         LANG::get('song_jifen'), 'index.php?app=ss_jifen&act=song_jifen',
                         LANG::get('song_jifen'));
		/* 当前用户中心菜单 */
		$this->_curitem('song_jifen');

		/* 当前所处子菜单 */
		$this->_curmenu('song_jifen');
		$id = isset($_GET['id']) ? $_GET['id'] : 0;

		$member_mod = & m('member');
		$member_info= $member_mod->get($id);

		$this->assign('user_name', $member_info['user_name']);
		
		
		$money_mod = & m('my_money');
		$user_id = $this->visitor->get('user_id');
		$user_jf=$money_mod->get('user_id='.$user_id);	
		$ss_jifen_mod = & m('ss_jifen');
		$ss_jifen_info = $ss_jifen_mod->find(array(
		    'fields'    => 'this.*',
			'join'      => '',
			'conditions'=> 'buyer_id='.$user_id,
			'order' => 'add_time desc',
		)); 
		$this->assign('user_jf', $user_jf['jifen']);	
		$this->assign('ss_jifen_info', $ss_jifen_info);
		$this->display('ss_jifen.song.html');
	}
	
	function song_jifen_info()
	{
		$seller_name = isset($_POST['seller_name']) ? $_POST['seller_name'] : 0;
		$jifen_count = isset($_POST['jifen_count']) ? $_POST['jifen_count'] : 0;
		if(!$seller_name)
		{
			$this->show_warning('商家名称不能为空！'); 
			return;
		}
		if(!$jifen_count)
		{
			$this->show_warning('送出积分不能为空！'); 
			return;
		}
		$member_mod = & m('member');
		$member_info = $member_mod->find(array(
		'conditions' => "user_name='".$seller_name."'",
		'join' => 'belongs_to_user',
		'fields' => 'this.*',
		));
		if(count($member_info)==0)
		{
		   	$this->show_warning('没有此商家！'); 
			return;
		}
		$money_mod = & m('my_money');
		$user_id = $this->visitor->get('user_id');
		$buyer_row=$money_mod->getrow("select * from ".DB_PREFIX."my_money where user_id='$user_id'");	 
		$buyer_zf_pass =$buyer_row['zf_pass'];//支付密码
		$zf_pass = isset($_POST['zf_pass']) ? $_POST['zf_pass'] : 0;
		$new_zf_pass=md5($zf_pass);
		if ( $new_zf_pass != $buyer_zf_pass) 
		{ //支付密码 错误 开始
			$this->show_warning('错误的支付密码'); 
			return;
		} 
		//支付密码 错误 结束
		$member_mod = & m('member');
		$member_info= $member_mod->get("user_name='".$seller_name."'");
		$data=array(
		   'buyer_id' => $this->visitor->get('user_id'),
		   'buyer_name' => $this->visitor->get('user_name'),
		   'seller_id' => $member_info['user_id'],
		   'seller_name' => $seller_name,
		   'jifen' => $jifen_count,
		   'add_time' => gmtime(),
		   'ss_status' => 0,
		);
		$member_mod = & m('member');
		$member_info= $member_mod->get("user_name='".$seller_name."'");
		$data=array(
		   'buyer_id' => $this->visitor->get('user_id'),
		   'buyer_name' => $this->visitor->get('user_name'),
		   'seller_id' => $member_info['user_id'],
		   'seller_name' => $seller_name,
		   'jifen' => $jifen_count,
		   'add_time' => gmtime(),
		   'ss_status' => 0,
		);
		$money_info = $money_mod->get('user_id='.$this->visitor->get('user_id'));
		if($money_info['jifen']>=$jifen_count)
		{
			$ss_jifen_mod = & m('ss_jifen');
			$ss_id=$ss_jifen_mod->add($data);
			$money_mod->edit($money_info['id'],'jifen=jifen-'.$jifen_count);
			
			$jifen = $ss_jifen_mod->get('ss_id='.$ss_id);
			
			$integrallog_mod = &m('my_integrallog');
			$integrallog_mod->add(array(
				'user_id' => $jifen['buyer_id'],
				'user_name' => $jifen['buyer_name'],
				'recieve_id' => $jifen['buyer_id'],
				'recieve_name' => $jifen['buyer_name'],
				'add_time' => gmtime(),
				'state' => 13,
				'jifen' => $jifen['jifen'],
				'log_text' => '积分转账，扣除使用积分',
			));

			$ms =& ms();
			$seller_content='用户'.$jifen['buyer_name'].'已将积分转入系统，系统处理完毕将转入您的帐户！';
			$ms->pm->send(MSG_SYSTEM,$jifen['seller_id'],'',$seller_content);
			
			$this->show_message('送出成功！');
		}
		else
		{
		    $this->show_message('您的积分不足，请先冲值积分！');
		}
	}
	
	function cancel_song_jifen()
	{
	    $ss_id = isset($_GET['ss_id']) ? $_GET['ss_id'] : 0;
		if(!$ss_id)
		{
			$this->show_warning('没有此相关信息！'); 
			return;
		}
		$ss_jifen_mod = & m('ss_jifen');
		$ss_jifen_mod->edit($ss_id,'ss_status=1,update_time='.gmtime());
		$jifen = $ss_jifen_mod->get('ss_id='.$ss_id);

		$ms =& ms();
		$seller_content='用户'.$jifen['buyer_name'].'已取消将积分转入您的帐户！';
		$ms->pm->send(MSG_SYSTEM,$jifen['seller_id'],'',$seller_content);

		$this->show_message('取消成功，等待后台处理！');
	}
	
	function sure_song_jifen()
	{
	    $ss_id = isset($_GET['ss_id']) ? $_GET['ss_id'] : 0;
		if(!$ss_id)
		{
			$this->show_warning('没有此相关信息！'); 
			return;
		}
		$ss_jifen_mod = & m('ss_jifen');
		$ss_jifen_mod->edit($ss_id,'ss_status=4,update_time='.gmtime());

		$jifen = $ss_jifen_mod->get('ss_id='.$ss_id);
		
		
		$member_mod = & m('member');
		$member_info= $member_mod->get("user_name='".$jifen['seller_name']."'");
		$money_mod = & m('my_money');
		$money_mod->edit($money_info['id'],'jifen=jifen+'.$jifen['jifen']);

		$ms =& ms();
		$seller_content='用户'.$jifen['seller_name'].'已取消申诉！';
		$ms->pm->send(MSG_SYSTEM,$jifen['buyer_id'],'',$seller_content);

		$this->show_message('取消操作成功！');
	}

	function lj_song_jifen()
	{
        $ss_id = isset($_GET['ss_id']) ? $_GET['ss_id'] : 0;
		if(!$ss_id)
		{
			$this->show_warning('没有此相关信息！'); 
			return;
		}
		$ss_jifen_mod = & m('ss_jifen');
		$ss_jifen_mod->edit($ss_id,'ss_status=3,update_time='.gmtime());
		
		$ss_jifen_info = $ss_jifen_mod->get('ss_id='.$ss_id);
		$jifen=$ss_jifen_info['jifen'];
		
		$model_setting = &af('settings');
		$setting = $model_setting->getAll();
		$jf_setting=$setting['exchange_rate'];
		
		$money_mod = & m('my_money');
		$money_info = $money_mod->get('user_id='.$ss_jifen_info['seller_id']);
		$money_mod->edit($money_info['id'],'money=money+'.$jifen*$jf_setting*0.92.'');


		$my_moneylog_mod = & m('my_moneylog');
	
		//买家添加日志
		$seller_log_text =Lang::get('商家扣除由赠送积分转换成的钱');
		$buyer_add_array=array(
			'user_id'=>$ss_jifen_info['seller_id'],
			'user_name'=>$ss_jifen_info['seller_name'],
			'order_id '=>0,
			'order_sn '=>'',
			'seller_id'=>$ss_jifen_info['seller_id'],
			'seller_name'=>$ss_jifen_info['seller_name'],
			'buyer_id'=>$ss_jifen_info['buyer_id'],
			'buyer_name'=>$ss_jifen_info['buyer_name'],
			'add_time'=>time(),
			'leixing'=>56,		
			'money_zs'=>"+".$jifen*$jf_setting*0.92,
			'money'=> $jifen*$jf_setting*0.92,
			'log_text'=>$seller_log_text,	
			'caozuo'=>909,
			's_and_z'=>1,
		);
		$my_moneylog_mod->add($buyer_add_array);

		$jifen = $ss_jifen_mod->get('ss_id='.$ss_id);

		$ms =& ms();
		$seller_content='用户'.$jifen['buyer_name'].'已将积分转成金额转入您的帐户！';
		$ms->pm->send(MSG_SYSTEM,$jifen['seller_id'],'',$seller_content);


		$this->show_message('处理成功！');
	}
	
	function refund_song_jifen()
	{
	   	$ss_id = isset($_GET['ss_id']) ? $_GET['ss_id'] : 0;
		if(!$ss_id)
		{
			$this->show_warning('没有此相关信息！'); 
			return;
		}
		$ss_jifen_mod = & m('ss_jifen');
		$ss_jifen_mod->edit($ss_id,'ss_status=2,update_time='.gmtime());

		$jifen = $ss_jifen_mod->get('ss_id='.$ss_id);

		$ms =& ms();
		$seller_content='用户'.$jifen['seller_name'].'已发出申诉，等待系统处理！';
		$ms->pm->send(MSG_SYSTEM,$jifen['buyer_id'],'',$seller_content);


		$this->show_message('申诉成功，等待后台处理！');
	}
	
	function _get_member_submenu()
    {
		if($this->visitor->get('manage_store'))
		{
			$submenus =  array(	
				array(
					'name'  => 'take_jifen',
					'url'   => 'index.php?app=ss_jifen&act=take_jifen',
				),
				array(
					'name'  => 'song_jifen',
					'url'   => 'index.php?app=ss_jifen&act=song_jifen',
				),
            );

		}
		else
		{
		    $submenus =  array(	
				array(
						'name'  => 'song_jifen',
						'url'   => 'index.php?app=ss_jifen&act=song_jifen',
					),
				);
		}
        return $submenus;
    }
	
}
?>