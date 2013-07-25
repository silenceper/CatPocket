<?php

class My_moneyApp extends MemberbaseApp
{
    function My_moneyApp()
    {
        parent::__construct();
        $this->my_money_mod =& m('my_money');
		$this->my_moneylog_mod =& m('my_moneylog');
		$this->my_mibao_mod =& m('my_mibao');
		$this->order_mod =& m('order');
		$this->my_card_mod =& m('my_card');
		$this->my_jifen_mod =& m('my_jifen');	
		$this->my_paysetup_mod =& m('my_paysetup');
    }
	
	function exits()
    {
		//执行关闭页面	
		echo "<script language='javascript'>window.opener=null;window.close();</script>";
	}	
	
 	function index()
    {

        $user_id = $this->visitor->get('user_id'); 
		/* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('jiaoyichaxun')
                         );
        /* 当前用户中心菜单 */
        $this->_curitem('jiaoyichaxun');	
        $this->assign('page_title', Lang::get('member_center') . ' - ' . Lang::get('shangfutong'));
        $my_money=$this->my_money_mod->getAll("select * from ".DB_PREFIX."my_money where user_id=$user_id");
        $this->assign('my_money', $my_money); 	
	    $this->display('my_money.index.html');
	}	
	
 	function loglist()
    {
	    $user_id = $this->visitor->get('user_id');   
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('jiaoyichaxun')
                         );
        /* 当前用户中心菜单 */
        $this->_curitem('jiaoyichaxun');	
	    $this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('jiaoyichaxun').' - '.Lang::get('yuezhuanzhang'));
        $my_money=$this->my_money_mod->getAll("select * from ".DB_PREFIX."my_money where user_id=$user_id");
        $this->assign('my_money', $my_money); 
        $this->display('my_money.loglist.html');
    }
	
    //买入查询
 	function buyer()
    {        
        $user_id = $this->visitor->get('user_id');	    
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('mairuchaxun')
                         );
        /* 当前用户中心菜单 */
        $this->_curitem('jiaoyichaxun');
		$this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('jiaoyichaxun').' - '.Lang::get('mairuchaxun'));
	    $page = $this->_get_page();			
		$my_money=$this->my_moneylog_mod->find(array(
            'conditions' => "user_id='$user_id' and s_and_z=2 and user_log_del=0 and leixing=20" ,
            'limit' => $page['limit'],
			'order' => "id desc",
			'count' => true,
        ));	

		$page['item_count'] = $this->my_moneylog_mod->getCount();
        $this->_format_page($page);
	    $this->assign('page_info', $page);
		$this->assign('my_money', $my_money);
        $this->display('my_money.buyer.html');
    }
		
	//收入查询	
   	function seller()
    {        
        $user_id = $this->visitor->get('user_id');	    
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('maichuchaxun')
                         );
        /* 当前用户中心菜单 */
        $this->_curitem('jiaoyichaxun');
		$this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('jiaoyichaxun').' - '.Lang::get('maichuchaxun'));
	    $page = $this->_get_page();	
		
		$my_money=$this->my_moneylog_mod->find(array(
            'conditions' => "user_id='$user_id' and s_and_z=1 and user_log_del=0 and leixing=10" ,
            'limit' => $page['limit'],
			'order' => "id desc",
			'count' => true,
        ));	

		$page['item_count'] = $this->my_moneylog_mod->getCount();
        $this->_format_page($page);
	    $this->assign('page_info', $page);
		$this->assign('my_money', $my_money);
        $this->display('my_money.seller.html');
    }

	//转账查询
   	function intolog()
    {        
        $user_id = $this->visitor->get('user_id');	    
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('zhuanzhangchaxun')
                         );
        /* 当前用户中心菜单 */
        $this->_curitem('jiaoyichaxun');
	    $this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('jiaoyichaxun').' - '.Lang::get('zhuanzhangchaxun'));
	    $page = $this->_get_page();			
		$my_money=$this->my_moneylog_mod->find(array(
            'conditions' => "user_id='$user_id' and user_log_del=0 and (leixing=21 or leixing=11)" ,
            'limit' => $page['limit'],
			'order' => "id desc",
			'count' => true,
        ));	

		$page['item_count'] = $this->my_moneylog_mod->getCount();
        $this->_format_page($page);
	    $this->assign('page_info', $page);
		$this->assign('my_money', $my_money);
        $this->display('my_money.intolog.html');
    }
	
	//其它查询
   	function otherlog()
    {        
        $user_id = $this->visitor->get('user_id');	    
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('otherchaxun')
                         );
        /* 当前用户中心菜单 */
		$this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('jiaoyichaxun').' - '.Lang::get('otherchaxun'));
        $this->_curitem('jiaoyichaxun');
	    $page = $this->_get_page();		
		
		$my_money=$this->my_moneylog_mod->find(array(
            'conditions' => "user_id='$user_id' and user_log_del=0 and leixing=56 and caozuo!=73" ,
            'limit' => $page['limit'],
			'order' => "id desc",
			'count' => true,
        ));	

		$page['item_count'] = $this->my_moneylog_mod->getCount();
        $this->_format_page($page);
	    $this->assign('page_info', $page);
		$this->assign('my_money', $my_money);
        $this->display('my_money.otherlog.html');
    }

	//充值查询
 	function paylist()
    {        
        $user_id = $this->visitor->get('user_id');	    
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('chongzhichaxun')
                         );
        /* 当前用户中心菜单 */
	    $this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('chongzhichaxun').' - '.Lang::get('zaixianchongzhi'));
        $this->_curitem('chongzhichaxun');	
		
		$payment_mod =& m('payment');
		$paments=$payment_mod->get_enabled();
		foreach($paments as $item)
		{
		    if($item['payment_code']!='yu_e')
			{
			   $payment_all[]=$item;
			}
		}	

        $my_money=$this->my_money_mod->getAll("select * from ".DB_PREFIX."my_money where user_id=$user_id");
        $this->assign('my_money', $my_money); 
		$this->assign('payment_all', $payment_all); 
        $this->display('my_money.paylist.html');
    }


	//充值记录
   	function paylog()
    {        
        $user_id = $this->visitor->get('user_id');	    
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         '充值记录'
                         );
        /* 当前用户中心菜单 */
		$this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('chongzhichaxun').' - '.Lang::get('chongzhijilu'));
        $this->_curitem('chongzhichaxun');	
	    $page = $this->_get_page();		
		
		$my_money=$this->my_moneylog_mod->find(array(
            'conditions' => "user_id='$user_id' and s_and_z=1 and user_log_del=0 and leixing=30" ,
            'limit' => $page['limit'],
			'order' => "id desc",
			'count' => true,
        ));	

		$page['item_count'] = $this->my_moneylog_mod->getCount();
        $this->_format_page($page);
	    $this->assign('page_info', $page);
		$this->assign('my_money', $my_money);
        $this->display('my_money.paylog.html');
    }	
		
	//提现查询	
	function txlist()
    {        
	    $user_id = $this->visitor->get('user_id');   
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('tixianshenqing')
                         );
        /* 当前用户中心菜单 */
		$this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('tixianshenqing'));
        $this->_curitem('tixianshenqing');	
        $my_money=$this->my_money_mod->getAll("select * from ".DB_PREFIX."my_money where user_id=$user_id");
        $this->assign('my_money', $my_money); 
        $this->display('my_money.txlist.html');
    }
	
    //提现记录
   	function txlog()
    {        
        $user_id = $this->visitor->get('user_id');	    
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('tixianjilu')
                         );
        /* 当前用户中心菜单 */
		$this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('tixianshenqing').' - '.Lang::get('tixianjilu'));
        $this->_curitem('tixianshenqing');	
	    $page = $this->_get_page();		
		
		$my_money=$this->my_moneylog_mod->find(array(
            'conditions' => "user_id='$user_id' and s_and_z=2 and user_log_del=0 and leixing=40" ,
            'limit' => $page['limit'],
			'count' => true,
        ));	

		$page['item_count'] = $this->my_moneylog_mod->getCount();
        $this->_format_page($page);
	    $this->assign('page_info', $page);
		$this->assign('my_money', $my_money);
        $this->display('my_money.txlog.html');
    }	
		
    //用户设置		
 	function mylist()
    {        
        $user_id = $this->visitor->get('user_id');	   
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('zhanghushezhi')
                         );
        /* 当前用户中心菜单 */
        $this->_curitem('zhanghushezhi');	
        $this->assign('page_title', Lang::get('member_center') . ' - ' . Lang::get('zhanghushezhi'));
		//读取帐户金额
        $my_money=$this->my_money_mod->getAll("select * from ".DB_PREFIX."my_money where user_id=$user_id");
        $this->assign('my_money', $my_money); 
        $this->display('my_money.mylist.html');//对应风格文件
    }	

   //用户隐藏流水，但不会删除数据
 	function user_log_del()
    {
        $user_id = $this->visitor->get('user_id');
		$id = trim($_GET['id']);
		if(empty($id))
        {
			   	$this->show_warning('feifacanshu');
       	        return;
		}
		else
		{
		$ids = explode(',', $id);
		$user_log_del=array(
		'user_log_del'=>1,
		);
        $this->my_moneylog_mod->edit($ids,$user_log_del);
				$this->show_message('shanchuchenggong');
		        return;
		}
	}
    //用户显示流水，但不会删除数据，此功能暂时隐藏不使用
 	function user_log_huifu()
    {

        $user_id = $this->visitor->get('user_id');
		$id = trim($_GET['id']);
		if(empty($id))
        {
			$this->show_warning('feifacanshu');
			return;
		}
		else
		{
		$ids = explode(',', $id);
		$user_log_del=array(
		'user_log_del'=>0,
		);
        $this->my_moneylog_mod->edit($ids,$user_log_del);
			$this->show_message('ok');
			return;
		}
	}	


	//设置新支付密码
	function newpassword()
	{     	
		$user_id = $this->visitor->get('user_id');			
		if($_POST)//检测是否提交
		{
			$zf_pass = trim($_POST['zf_pass']);
			$zf_pass2 = trim($_POST['zf_pass2']);
			if(empty($zf_pass))
			{
				$this->show_warning('cuowu_zhifumimabunengweikong'); 
				return;
			}
			if($zf_pass != $zf_pass2)
			{
				$this->show_warning('cuowu_liangcishurumimabuyizhi'); 
				return;
			}
			//读原始密码
			$money_row=$this->my_money_mod->getrow("select zf_pass from ".DB_PREFIX."my_money where user_id='$user_id'");	
			//转换32位 MD5
			$md5zf_pass=md5($zf_pass);	
		
			if(empty($money_row['zf_pass']))//检测为空密码才允许新设置
			{
				$newpass_array=array(
					'zf_pass'=>$md5zf_pass,													
				);
				$this->my_money_mod->edit('user_id='.$user_id,$newpass_array);
				$this->show_message('zhifumimaxiugaichenggong','zhifumimaxiugaichenggong','index.php?app=my_money&act=password');
				return;
			}
			else	
			{
				$this->show_warning('cuowu_yuanzhifumimayanzhengshibai'); 
				return;	
			}	
	
		}
		else
		{
			//读原始密码
			$money_row=$this->my_money_mod->getrow("select zf_pass from ".DB_PREFIX."my_money where user_id='$user_id'");
			if(!empty($money_row['zf_pass']))
			{
				header("Location: index.php?app=my_money&act=password");
				return;
			}//检测空密码就跳到新密码设
		
			$this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
							 LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
							 LANG::get('zhifumimaxiugai')
							 );
			$this->_curitem('zhanghushezhi');
			$this->assign('page_title',Lang::get('member_center').' - '.Lang::get('zhanghushezhi').' - '.Lang::get('zhifumimaxiugai'));
			$this->display('my_money.newpassword.html');
			return;
		}
	}

	//修改支付密码
	function password()
	{     	
		$user_id = $this->visitor->get('user_id');			
		if($_POST)//检测是否提交
		{
			$y_pass = trim($_POST['y_pass']);
			$zf_pass = trim($_POST['zf_pass']);
			$zf_pass2 = trim($_POST['zf_pass2']);
			if(empty($zf_pass))
			{
				$this->show_warning('cuowu_zhifumimabunengweikong'); 
				return;
			}
			if($zf_pass != $zf_pass2)
			{
				$this->show_warning('cuowu_liangcishurumimabuyizhi'); 
				return;
			}
			//读原始密码
			$money_row=$this->my_money_mod->getrow("select zf_pass from ".DB_PREFIX."my_money where user_id='$user_id'");	
			//转换32位 MD5
			$md5y_pass=md5($y_pass);
			$md5zf_pass=md5($zf_pass);	
			
			if($money_row['zf_pass'] != $md5y_pass)
			{
				$this->show_warning('cuowu_yuanzhifumimayanzhengshibai'); 
				return;	
			}
			else
			{
				$newpass_array=array(
					'zf_pass'=>$md5zf_pass,													
				);
				$this->my_money_mod->edit('user_id='.$user_id,$newpass_array);
				$this->show_message('zhifumimaxiugaichenggong');
				return;
			}
		}
		else
		{
			//读原始密码
			$money_row=$this->my_money_mod->getrow("select zf_pass from ".DB_PREFIX."my_money where user_id='$user_id'");
			if(empty($money_row['zf_pass']))
			{
				header("Location: index.php?app=my_money&act=newpassword");
				return;
			}//检测空密码就跳到新密码设置
			$this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
							 LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
							 LANG::get('zhifumimaxiugai')
							 );
			$this->_curitem('zhanghushezhi');
		    $this->assign('page_title',Lang::get('member_center').' - '.Lang::get('zhanghushezhi').' - '.Lang::get('zhifumimaxiugai'));
			$this->display('my_money.password.html');
			return;
		}
	}

	//显示找回支付密码		
 	function find_password()
    {
		header("Location: index.php?app=find_password");
		return;
	}
	
	


	//密保绑定页面		
 	function mibao()
    {        
        $user_id = $this->visitor->get('user_id');	   
        /* 当前位置 */
        $this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
                         LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
                         LANG::get('mibaobangding')
                         );
        /* 当前用户中心菜单 */
        $this->_curitem('zhanghushezhi');
		$this->assign('page_title',Lang::get('member_center').' - '.Lang::get('zhanghushezhi').' - '.Lang::get('mibaobangding'));	
		//读取帐户金额
        $my_money=$this->my_money_mod->getAll("select * from ".DB_PREFIX."my_money where user_id=$user_id");
		$this->assign('my_money', $my_money); 
        $this->display('my_money.mibao.html');//对应风格文件
    }



	//提现申请
	function txsq()
	{ 
		if($_POST)
		{
			$user_id = $this->visitor->get('user_id');
			$tx_money = trim($_POST['tx_money']);
			$post_zf_pass = trim($_POST['post_zf_pass']);
			$user_zimuz1 = trim($_POST['user_zimuz1']);
			$user_zimuz2 = trim($_POST['user_zimuz2']);
			$user_zimuz3 = trim($_POST['user_zimuz3']);
			$md5zf_pass=md5($post_zf_pass);	
			$user_shuzi1 = trim($_POST['user_shuzi1']);
			$user_shuzi2 = trim($_POST['user_shuzi2']);
			$user_shuzi3 = trim($_POST['user_shuzi3']);
			$money_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_money where user_id='$user_id'");
			//检测用户的银行信息
			if(empty($money_row['bank_sn']) or empty($money_row['bank_name']) or empty($money_row['bank_username']))
			{
				$this->show_warning('cuowu_nihaimeiyoushezhiyinhangxinxi'); 
				return;
			}
			if(empty($tx_money))
			{
				$this->show_warning('cuowu_tixianjinebunengweikong');
				return;
			}
			if(preg_match("/[^0.-9]/",$tx_money))
			{
				 $this->show_warning('cuowu_nishurudebushishuzilei'); 
				 return;
			}
			if($money_row['money'] <$tx_money)
			{
				$this->show_warning('duibuqi_zhanghuyuebuzu');
				return;
			}
			//检测是密保用户就执行
			if($money_row['mibao_id'] >0)
			{
				if(empty($user_shuzi1) or empty($user_shuzi2) or empty($user_shuzi3))
				{
					$this->show_warning('cuowu_dongtaimimabunengweikong');
					return;
				}
				$mibao_row=$this->my_mibao_mod->getrow("select * from ".DB_PREFIX."my_mibao where user_id='$user_id'");
				//检测数字错，就提示并停止
				if($mibao_row[$user_zimuz1] != $user_shuzi1 or $mibao_row[$user_zimuz2] != $user_shuzi2 or $mibao_row[$user_zimuz2] != $user_shuzi2)
				{
					echo Lang::get('money_banben');
					$this->show_warning('cuowu_dongtaimimayanzhengshibai'); 
					return;
				}
			}
			else
			{
				//否则检测 支付密码
				if(empty($post_zf_pass))
				{
					$this->show_warning('cuowu_zhifumimabunengweikong');
					return;
				}
				if($money_row['zf_pass'] != $md5zf_pass)
				{
					$this->show_warning('cuowu_zhifumimayanzhengshibai'); 
					return;
				}
			}
			//通过验证 开始操作数据
			$newmoney = $money_row['money']-$tx_money;
			$newmoney_dj =$money_row['money_dj']+$tx_money;
			//添加日志
			$log_text =$this->visitor->get('user_name').Lang::get('tixianshenqingjine').$tx_money.Lang::get('yuan');
			$add_mymoneylog=array(
				'user_id'=>$user_id,
				'user_name'=>$this->visitor->get('user_name'),
				'order_id '=>Lang::get('tixian_dengdaiguanliyuangongbu'),
				'add_time'=>time(),
				'leixing'=>40,	
				's_and_z'=>2,
				'money_zs'=>$tx_money,	
				'money'=>'-'.$tx_money,		
				'log_text'=>$log_text,
				'caozuo'=>60,																				
			);
			$this->my_moneylog_mod->add($add_mymoneylog);
			$edit_mymoney=array(
				'money_dj'=>$newmoney_dj,	
				'money'=>$newmoney,																			
			);	
			$this->my_money_mod->edit('user_id='.$user_id,$edit_mymoney);
			$this->show_message('tixian_chenggong');
			return;
		}
		else
		{
			$this->show_warning('feifacanshu');
			return;
		}
	}	


	//银行信息设置
	function bank_set()
	{ 
		if($_POST)
		{
			//检测两次银行号码
			if(trim($_POST['yes_bank_sn']) != trim($_POST['yes_bank_sn_queren']))
			{
				$this->show_warning('liangxitixianzhenghaobuyizhi'); 
				return;
			}
			$user_id = $this->visitor->get('user_id');
			$bank_edit = trim($_POST['bank_edit']);
			if($bank_edit=="YES")
			{
				$zf_pass     = trim($_POST['zf_pass']);
				$user_zimuz1 = trim($_POST['user_zimuz1']);
				$user_zimuz2 = trim($_POST['user_zimuz2']);
				$user_zimuz3 = trim($_POST['user_zimuz3']);
				$user_shuzi1 = trim($_POST['user_shuzi1']);
				$user_shuzi2 = trim($_POST['user_shuzi2']);
				$user_shuzi3 = trim($_POST['user_shuzi3']);
			
				//读取密保卡资料
				$money_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_money where user_id='$user_id'");
				if($money_row['mibao_id'] >0 )
				{
					$mibao_row=$this->my_mibao_mod->getrow("select * from ".DB_PREFIX."my_mibao where user_id='$user_id'");
					//检测数字错，就提示并停止
					if($mibao_row[$user_zimuz1]!=$user_shuzi1 or $mibao_row[$user_zimuz2]!=$user_shuzi2 or $mibao_row[$user_zimuz2]!=$user_shuzi2)
					{
						echo Lang::get('money_banben');
						$this->show_warning('cuowu_dongtaimimayanzhengshibai'); 
						return;
					}
				}
				else
				{
					//检测密码回答
					if(empty($zf_pass))
					{
						$this->show_warning('cuowu_zhifumimabunengweikong');
						return;
					}
					$md5zf_pass=md5($zf_pass);		
					if($money_row['zf_pass'] != $md5zf_pass)
					{
						$this->show_warning('cuowu_zhifumimayanzhengshibai'); 
						return;
					}
				}//mibao>0
				//验证都通过了开始修改数据
				$bank_array=array(
					'bank_name'=>trim($_POST['yes_bank_name']),	
					'bank_sn'=>trim($_POST['yes_bank_sn']),	
					'bank_username'=>trim($_POST['yes_bank_username']),	
					'bank_add'=>trim($_POST['yes_bank_add']),	
				);
				//执行SQL操作
				$this->my_money_mod->edit('user_id='.$user_id,$bank_array);
				$this->show_message('baocuntixianxinxichenggong');	
				return;
			}//YES
		}//post
		else
		{
			$this->show_warning('feifacanshu');
			return;
		}
	}




	//绑定密保卡
	function add_mibao()
	{ 
		if($_POST)
		{
			$user_id = $this->visitor->get('user_id');
			$zf_pass = trim($_POST['zf_pass']);
			$post_mb_sn = trim($_POST['post_mb_sn']);
			$user_zimuz1 = trim($_POST['user_zimuz1']);
			$user_zimuz2 = trim($_POST['user_zimuz2']);
			$user_zimuz3 = trim($_POST['user_zimuz3']);
			$user_shuzi1 = trim($_POST['user_shuzi1']);
			$user_shuzi2 = trim($_POST['user_shuzi2']);
			$user_shuzi3 = trim($_POST['user_shuzi3']);
			if(empty($zf_pass))
			{
				$this->show_warning('cuowu_zhifumimabunengweikong');
				return;
			}
			if(empty($post_mb_sn))
			{
				$this->show_warning('mibaosnbunengweikong');
				return;
			}
			$money_row=$this->my_money_mod->getrow("select zf_pass from ".DB_PREFIX."my_money where user_id='$user_id'");
		
			if($money_row['mibao_id']>0)
			{
				$this->show_warning('cuowu_gaiyonghuyijingbangdingmibaole'); 
				return;
			}
			$md5zf_pass=md5($zf_pass);		
			if($money_row['zf_pass'] != $md5zf_pass)
			{
				$this->show_warning('cuowu_zhifumimayanzhengshibai'); 
				return;
			}
			$mibao_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_mibao where mibao_sn='$post_mb_sn'");
			$mibao_id=$mibao_row['id'];
			$mibao_sn=$mibao_row['mibao_sn'];
			$mibao_shuzi1=$mibao_row[$user_zimuz1];
			$mibao_shuzi2=$mibao_row[$user_zimuz2];
			$mibao_shuzi3=$mibao_row[$user_zimuz3];
			if(empty($mibao_id) or empty($mibao_sn))
			{
				$this->show_warning('cuowu_mibaokasncuowu');
				return;
			}
			if($mibao_row['user_id']>0)
			{
				$this->show_warning('cuowu_gaimibaokazhengzaishiyongzhong');
				return;
			}
			if ($user_shuzi1 != $mibao_shuzi1 or $user_shuzi2 != $mibao_shuzi2 or  $user_shuzi3 != $mibao_shuzi3) 
			{
				echo Lang::get('money_banben');
				$this->show_warning('cuowu_dongtaimimayanzhengshibai'); 
				return;
			}
			else
			{
			//检测绑定时间
			if(empty($mibao_row['bd_time']))
			{
				$mibao_array=array(
					'user_id'=>$this->visitor->get('user_id'),
					'user_name'=>$this->visitor->get('user_name'),
					'bd_time'=>time(),	
					'dq_time'=>time()+31536000,
					'ztai'=>1,
				);
			}
			else//绑时间 否则
			{
				$mibao_array=array(
					'user_id'=>$this->visitor->get('user_id'),
					'user_name'=>$this->visitor->get('user_name'),
				);
			}
			
			$money_edit=array(
				'mibao_id'=>$mibao_id,
				'mibao_sn'=>$mibao_sn,
			);
		
			$this->my_money_mod->edit('user_id='.$user_id,$money_edit);
			$this->my_mibao_mod->edit('id='.$mibao_id,$mibao_array);
			$this->show_message('bangding_chenggong');	
			}
		}
		else
		{
			$this->show_warning('feifacanshu');
			return;
		}
	}


	//解除密保卡
	function del_mibao()
	{ 
		if($_POST)
		{
			$user_id = $this->visitor->get('user_id');
			$post_mb_sn  = trim($_POST['post_mb_sn']);
			$user_zimuz1 = trim($_POST['user_zimuz1']);
			$user_zimuz2 = trim($_POST['user_zimuz2']);
			$user_zimuz3 = trim($_POST['user_zimuz3']);
			$user_shuzi1 = trim($_POST['user_shuzi1']);
			$user_shuzi2 = trim($_POST['user_shuzi2']);
			$user_shuzi3 = trim($_POST['user_shuzi3']);
			if(empty($post_mb_sn))
			{
				$this->show_warning('mibaosnbunengweikong');
				return;
			}
			
			$mibao_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_mibao where mibao_sn='$post_mb_sn'");
		
			$mibao_id=$mibao_row['id'];
			$mibao_sn=$mibao_row['mibao_sn'];
		
			$mibao_shuzi1=$mibao_row[$user_zimuz1];
			$mibao_shuzi2=$mibao_row[$user_zimuz2];
			$mibao_shuzi3=$mibao_row[$user_zimuz3];
			if(empty($mibao_id) or empty($mibao_sn))
			{
				$this->show_warning('cuowu_mibaokasncuowu');
				return;
			}
			if ($user_shuzi1 != $mibao_shuzi1 or $user_shuzi2 != $mibao_shuzi2 or  $user_shuzi3 != $mibao_shuzi3) 
			{
				echo Lang::get('money_banben');
				$this->show_warning('cuowu_dongtaimimayanzhengshibai'); 
				return;
			}
			else
			{
				$mibao_array=array(
				'user_id'=>0,
				'user_name'=>"",
			);
			
			$money_array=array(
				'mibao_id'=>0,
				'mibao_sn'=>"",
			);
			}
			$this->my_mibao_mod->edit('id='.$mibao_id,$mibao_array);
			$this->my_money_mod->edit('user_id='.$user_id,$money_array);
			$this->show_message('jiechu_chenggong');		
	   }
	   else
	   {
			$this->show_warning('feifacanshu');
			return;
	   }
	}  
	//积分管理
	function jifenguanli()
	{
		$user_id = $this->visitor->get('user_id');	
		$store_id = $this->visitor->get('manage_store');  
		if($store_id)
		{
			$store_card = & m('store_card');
			$page = $this->_get_page();
			$store_card_info=$store_card->find(array(
				'field' => 'this.*,member.user_name',
				'conditions' => 'store_id='.$store_id,
				'join' => 'card_member',
				'limit' => $page['limit'],
				'order' => "add_time desc",
				'count' => true,
			));
			foreach($store_card_info as $key => $item)
			{
				$store_card_info[$key]['end_time']=$item['add_time']+15*24*3600;
			}
			$page['item_count'] = $store_card->getCount();
			$this->_format_page($page);
			$this->assign('page_info',$page);
			$this->assign('store_card_info', $store_card_info);
		} 
		/* 当前位置 */
		$this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
						 LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
						 LANG::get('jifenguanli')
						 );
		/* 当前用户中心菜单 */
		$this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('shangfutong').' - '.Lang::get('jifenguanli'));
		$this->_curitem('jifenguanli');		
		$money_mod = & m('my_money');
		$user_jf=$money_mod->get('user_id='.$user_id);
		$model_setting = &af('settings');
		$setting = $model_setting->getAll();
		$jf_setting=$setting['exchange_rate']*10;
		$this->assign('user_setting',$jf_setting);
		$this->assign('user_jf', $user_jf['jifen']);
		$this->assign('user_money', $user_jf['money']);
		$this->assign('user_id', $user_id);
		$this->assign('store_id', $store_id);
		$this->display('my_money.jifen.add.html');
	}
	//积分充值
	function jfcz()
	{
		$store_id = $this->visitor->get('manage_store');
		if($store_id)
		{
			$user_id = $this->visitor->get('user_id');
			$buyer_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_money where user_id='$user_id'");	 
			$buyer_zf_pass =$buyer_row['zf_pass'];//支付密码
			$zf_pass = isset($_POST['zf_pass']) ? $_POST['zf_pass'] : 0;
			$new_zf_pass=md5($zf_pass);
			if ( $new_zf_pass != $buyer_zf_pass) 
			{ //支付密码 错误 开始
							$this->show_warning('cuowu_zhifumimayanzhengshibai'); 
							return;
			} 
			//支付密码 错误 结束
		   $jf_num = isset($_POST['jf_num']) ? $_POST['jf_num'] : 0;
		   $user_setting=isset($_POST['user_setting']) ? $_POST['user_setting'] : 0;
		   if($jf_num==0)
		   {
				$this->show_warning('非法参数');
				return;
		   }
		   if($user_setting==0)
		   {
				$this->show_warning('非法参数');
				return;
		   }
			$count=$jf_num*$user_setting/10;
			$my_money_mod =& m('my_money');
			$ids =  $my_money_mod->get('user_id = '.$this->visitor->get('user_id'));
			$id = $ids['id'];
			if($count<=$ids['money'])
			{
				 $my_money_mod->edit($id,'jifen=jifen+'.$jf_num.',money=money-'.$count);
				 $my_integrallog = & m('my_integrallog');
				 $my_moneylog = & m('my_moneylog');
				 $data=array(
					'user_id' => $this->visitor->get('user_id'),
					'user_name' => $this->visitor->get('user_name'),
					'recieve_id' => $this->visitor->get('user_id'),
					'recieve_name' => $this->visitor->get('user_name'),
					'add_time' => gmtime(),
					'state' => 11,
					'jifen' => $jf_num,
					'log_text' => '用户购买积分',
				 );
				$data2=array(
					'user_id'=>$this->visitor->get('user_id'),
					'user_name'=>$this->visitor->get('user_name'),
					'buyer_name'=>$this->visitor->get('user_name'),
					'order_id '=>'',
					'add_time'=>time(),
					'leixing'=>56,	
					's_and_z'=>2,
					'money_zs'=> $count,	
					'money'=>'-'. $count,		
					'log_text'=>'购买积分使用',
					'caozuo'=>71,																				
				);
				$my_integrallog->add($data);
				$my_moneylog->add($data2);
				$this->show_message('充值成功','返回','index.php?app=my_money&act=jifenguanli');
			}
			else
			{
				 $this->show_message('余额不足，请充值后再兑换','返回','index.php?app=my_money&act=paylist');
			}
		}
		else
		{
			$this->show_message('所在用户组没有权限','返回','index.php?app=my_money&act=jifenguanli');
		}
	}

	//领取积分
	function lqjf()
	{
		$jf_num = isset($_POST['card_num']) ? $_POST['card_num'] : 0;
		$my_money_mod =& m('my_money');
		$my_store_mod =& m('store');
		$my_member_mod =& m('member');
		$my_integrallog = & m('my_integrallog');
		$my_catfoodlog = & m('my_catfoodlog');
		$ids =  $my_money_mod->get('user_id = '.$this->visitor->get('user_id'));
		$store_id = $this->visitor->get('manage_store');
		$store_card = & m('store_card');
		$store_cards = $store_card->get(array('conditions' => "c_state=0 and card_num= '".$jf_num."'"));
		if($store_cards)
		{
			if($store_cards['store_id']!= $store_id)
			{
				if($store_cards['jf_count']>0&&$store_cards['jf_count']<=100)
				{
					$cat_food_add = 1;
				}
				elseif($store_cards['jf_count']>100&&$store_cards['jf_count']<=300)
				{
					$cat_food_add = 2;
				}
				elseif($store_cards['jf_count']>300)
				{
					$cat_food_add = 3;
				}
				$store_names = $my_member_mod->get($store_cards['store_id']);
				$customer_mod = & m('customer');
				$cat_info = $customer_mod->find('buyer_id='.$this->visitor->get('user_id'));
				if(empty($cat_info))
				{
					$customer_id = $customer_mod->add(array(
						'buyer_id'  =>  $this->visitor->get('user_id'),
						'store_id'  =>   $store_cards['store_id'],
						'purchase_number'  =>  1,
						'firstgm' => 1,
					));
					if(!$customer_id)
					{
						$this->pop_warning($customer_mod->get_error());
	
						return;
					}
					$my_store_mod->edit($store_cards['store_id'],'cat_food=cat_food + '.$cat_food_add);
					$data2=array(
						'user_id' => $this->visitor->get('user_id'),
						'user_name' => $this->visitor->get('user_name'),
						'recieve_id' => $store_cards['store_id'],
						'recieve_name' => $store_names['user_name'],
						'add_time' => gmtime(),
						'state' => 2,
						'cat_food' => $cat_food_add,
						'log_text' => '邀请新会员赠送猫粮',
					);
					$my_catfoodlog->add($data2);
				}
				else
				{
					$c_info = $customer_mod->get("buyer_id=".$this->visitor->get('user_id')." and store_id='".$store_cards['store_id']."'");
					if(empty($c_info))
					{
						$customer_id = $customer_mod->add(array(
							'buyer_id'  =>  $this->visitor->get('user_id'),
							'store_id'  =>  $store_cards['store_id'],
							'purchase_number'  =>  1
						));
						if(!$customer_id)
						{
							$this->pop_warning($customer_mod->get_error());
		
							return;
						}
					}
					else
					{
						$customer_mod->edit($c_info['customer_id'],'purchase_number=purchase_number+1');
					}
				}
				$store_card->edit_jf_count($this->visitor->get('user_id'),$jf_num);
				$store_cardinfo=$store_card->get("card_num='".$card_num."'");
				$data=array(
					'user_id' => $this->visitor->get('user_id'),
					'user_name' => $this->visitor->get('user_name'),
					'recieve_id' => $ids['user_id'],
					'recieve_name' => $ids['user_name'],
					'add_time' => gmtime(),
					'state' => 10,
					'jifen' => $store_cards['jf_count'],
					'log_text' => '用户通过礼品卡获取积分',
				 );
				$my_integrallog->add($data);
				$this->show_message('领取成功','返回','index.php?app=my_money&act=jifenguanli');
			}
			else
			{
				$this->show_warning('不能领取自己发布的礼品卡！');
			}
		}
		else
		{
			$this->show_message('您输入的卡号不正确，请验证后重新输入','返回','index.php?app=my_money&act=jifenguanli');
		}
	}

	//积分记录
	function jifen_jilu()
	{
			/* 当前位置 */
		$this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
						 LANG::get('shangfutong'),         'index.php?app=my_money&act=index',
						 LANG::get('jifenguanli')
						 );
		/* 当前用户中心菜单 */
		$this->assign('page_title',Lang::get('member_center'). ' - ' .Lang::get('shangfutong').' - '.Lang::get('jifenguanli'));
		$this->_curitem('jifenguanli');	
		
		$user_id = $this->visitor->get('user_id');	
		$my_integrallog = & m('my_integrallog');
		$page = $this->_get_page();
		$my_integralloginfo=$my_integrallog->find(array(
			'field' => 'this.*',
			'conditions' => 'recieve_id='.$user_id.' or user_id='.$user_id,
			'join' => '',
			'limit' => $page['limit'],
			'order' => "add_time desc",
			'count' => true,
		));
		$page['item_count'] = $my_integrallog->getCount();
		$this->_format_page($page);
		$this->assign('page_info',$page);
		$this->assign('my_integralloginfo', $my_integralloginfo);
		$this->display('my_money.jifen_jilu.html');
	}
	//生成礼品卡
	function scjf()
	{
		$store_id = $this->visitor->get('manage_store');
		if($store_id)
		{
			$user_id = $this->visitor->get('user_id');
			$buyer_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_money where user_id='$user_id'");	 
			$buyer_zf_pass =$buyer_row['zf_pass'];//支付密码
			$zf_pass = isset($_POST['zf_pass']) ? $_POST['zf_pass'] : 0;
			$new_zf_pass=md5($zf_pass);
			if ( $new_zf_pass != $buyer_zf_pass) 
			{ //支付密码 错误 开始
				$this->show_warning('cuowu_zhifumimayanzhengshibai'); 
				return;
			} 
			//支付密码 错误 结束
			$head_c = isset($_POST['head_c']) ? $_POST['head_c'] : 0;
			$num_c = isset($_POST['num_c']) ? $_POST['num_c'] : 0;
			$jf_c = isset($_POST['jf_c']) ? $_POST['jf_c'] : 0;
			
			if($num_c==0)
			{
				$this->show_warning('非法参数');
				return;
			}
			if($jf_c==0)
			{
				$this->show_warning('非法参数');
				return;
			}
			$store_card = & m('store_card');
			$money_mod = & m('my_money');
			$jf_info=$money_mod->get('user_id='.$store_id);
			for($i=0;$i<$num_c;$i++)
			{
				if($jf_c<=$jf_info['jifen']+$jf_info['seller_edu'])
				{
					$data=array(
						'store_id' => $this->visitor->get('manage_store'),
						'card_num' => $head_c.$store_card->sc_card_num(),
						'jf_count' => $jf_c,
						'add_time' => gmtime(),
						'c_state' => 0,
					);
					$store_card->add($data);
					$money_mod->edit($jf_info['id'],'jifen=jifen-'.$jf_c);
				}
				else
				{
					$this->show_message('积分不足，请兑换更多的积分','返回','index.php?app=my_money&act=jifenguanli');
					return;
				}
			}
			$this->show_message('生成成功','返回','index.php?app=my_money&act=jifenguanli');
		}
		else
		{
			$this->show_message('所在用户组没有权限','返回','index.php?app=my_money&act=jifenguanli');
		}
	}


	//支付定单
	function payment()
	{  
		$user_id = $this->visitor->get('user_id');
		$zf_pass = trim($_POST['zf_pass']);
		$user_zimuz1 = trim($_POST['user_zimuz1']);
		$user_zimuz2 = trim($_POST['user_zimuz2']);
		$user_zimuz3 = trim($_POST['user_zimuz3']);
		$user_shuzi1 = trim($_POST['user_shuzi1']);
		$user_shuzi2 = trim($_POST['user_shuzi2']);
		$user_shuzi3 = trim($_POST['user_shuzi3']);
		$post_money  = trim($_POST['post_money']);//提交过来的 金钱
		$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;//提交过来的 订单号码
		if(empty($order_id))
		{
			$this->show_warning('feifacanshu');
			return;
		}
		if($_POST)//检测是否提交
		{
			//读取moneylog 为了检测提交不重复
			$moneylog_row=$this->my_moneylog_mod->getrow("select order_id from ".DB_PREFIX."my_moneylog where user_id='$user_id' and order_id='$order_id' and caozuo='10'");
			if($moneylog_row['order_id']==$order_id) 
			{
				$this->show_warning('cuowu_gaidingdanyijingzhufule'); 
				return;//定单已经支付
			}
			//读取买家SQL
			$buyer_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_money where user_id='$user_id'");	 
			$buyer_name=$buyer_row['user_name'];//买家用户名
			$buyer_zf_pass =$buyer_row['zf_pass'];//支付密码
			$buyer_money=$buyer_row['money'];//当前用户的原始金钱
			//从定单中 读取卖家信息
			$order_row=$this->order_mod->getrow("select * from ".DB_PREFIX."order where order_id='$order_id'");
			$order_order_sn=$order_row['order_sn'];//订单号
			$order_seller_id=$order_row['seller_id'];//定单里的 卖家ID
			$order_money=$order_row['order_amount'];//定单里的 最后定单总价格
			//读取卖家SQL
			$seller_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_money where user_id='$order_seller_id'");	
			$seller_id=$seller_row['user_id'];//卖家ID 
			$seller_name=$seller_row['user_name'];//卖家用户名
			$seller_money_dj=$seller_row['money_dj'] ;//卖家的原始冻结金钱
			//读取密保卡资料
			$mibao_row=$this->my_mibao_mod->getrow("select * from ".DB_PREFIX."my_mibao where user_id='$user_id'");
			$mibao_user_id=$mibao_row['user_id'];
			$mibao_shuzi1=$mibao_row[$user_zimuz1];
			$mibao_shuzi2=$mibao_row[$user_zimuz2];
			$mibao_shuzi3=$mibao_row[$user_zimuz3];	
			if($mibao_user_id)
			{
			//检测提交的密保信息 是否于读取用户的相符
			if ( $user_shuzi1 != $mibao_shuzi1 or $user_shuzi2 != $mibao_shuzi2 or  $user_shuzi3 != $mibao_shuzi3) 
			{ //检测密保相符 开始
				echo Lang::get('money_banben');
				$this->show_warning('cuowu_dongtaimimayanzhengshibai'); 
				return;
			} 
			//检测密保 否则 结束
			}
			else
			{
			//检测是否使用支付密码 开始
			$new_zf_pass=md5($zf_pass);
			if ( $new_zf_pass != $buyer_zf_pass) 
			{ //支付密码 错误 开始
				$this->show_warning('cuowu_zhifumimayanzhengshibai'); 
				return;
			} 
			//支付密码 错误 结束
			}

			//检测余额是否足够
			if ( $buyer_money < $order_money) 
			{   //检测余额是否足够 开始
				$this->show_warning('cuowu_zhanghuyuebuzu','lijichongzhi',  'index.php?app=my_money&act=paylist' );
				return;
			}	//检测余额是否足够 结束
			
			//金额是否相同
			if ( $post_money != $order_money) 
			{   //检测密保相符 开始
				$this->show_warning('fashengcuowu_jineshujukeyi'); 
				return;
			}	//金额是否相同 结束
			
			
			//检测SESSION 是否存为空
			if ($_SESSION['session_order_sn'] != $order_order_sn)
			{//检测SESSION 开始
			
				//更新扣除买家的金钱
				$buyer_array=array(
					'money'=>$buyer_money-$order_money,
					);
				$this->my_money_mod->edit('user_id='.$user_id,$buyer_array);
		
				//更新卖家的冻结金钱	
				$seller_array=array(
					'money_dj'=>$seller_money_dj+$order_money,																	
				);		
				$seller_edit=$this->my_money_mod->edit('user_id='.$seller_id,$seller_array);	
				 //买家添加日志
				$buyer_log_text =Lang::get('goumaishangpin_dianzhu').$seller_name;
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
				$this->my_moneylog_mod->add($buyer_add_array);
				//卖家添加日志
				$seller_log_text=Lang::get('chushoushangpin_maijia').$buyer_name;
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
					'money_zs'=>$order_money,
					'money'=>$order_money,		
					'log_text'=>$seller_log_text,	
					'caozuo'=>10,
					's_and_z'=>1,																
				);
				$this->my_moneylog_mod->add($seller_add_array);
				//改变定单为 已支付等待卖家确认  status10改为20
				$payment_code="sft";
				//更新定单状态
				$order_edit_array=array(
					'payment_name'  =>Lang::get('shangfutong'),
					'payment_code'  =>$payment_code,
					'pay_time' =>time(),
					'out_trade_sn'=>$order_sn,
					'status'=>20,//20就是 待发货了
				 );
				$this->order_mod->edit($order_id,$order_edit_array);
				//$edit_data['status']    =   ORDER_ACCEPTED;//定义 为 20 待发货
				//$order_model->edit($order_id, $edit_data);//直接更改为 20 待发货
				//支付成功
				$this->show_message('zhifu_chenggong',
							'sanmiaohouzidongtiaozhuandaodingdanliebiao',  'index.php?app=buyer_order',
							'chankandingdan',  'index.php?app=buyer_order',
							'guanbiyemian', 'index.php?app=my_money&act=exits'
				);
				//定义SESSION值
				$_SESSION['session_order_sn']=$order_order_sn;	
			}//检测SESSION为空 执行完毕
			else//检测SESSION为空 否则
			{//检测SESSION为空 否则 开始
				$this->show_warning('jinggao_qingbuyaochongfushuaxinyemian'); 
				return;
			}//检测SESSION为空 否则 结束
		}
		else
		{
			$this->show_warning('feifacanshu'); 
			return;
		}
	}
	
	function scfs_info()
	{
	   	if($_POST)
		{
			$user_id = $this->visitor->get('user_id');
			$user_name = $this->visitor->get('user_name');
			$cz_money     =trim($_POST['cz_money']);
			$czfs     =trim($_POST['czfs']);
			$order_sn=$user_id.date(Ymdhms)."_".$cz_money;
			
			$data=array(
			    'czmoney_id' => $order_sn,
				'user_id' => $user_id,
				'user_name' => $user_name,
				'cz_price' => $cz_money,
				'payment_code' => $czfs,
				'cz_time' => gmtime(),
				'cz_state' => 1,
			);
			$cz_log_model =& m('mymoney_czlog');
			$cz_id=$cz_log_model->add($data);
			
			$payment_model = & m('payment');
			$payment_info  = $payment_model->get("payment_code = '{$czfs}' AND store_id = 0");
			/* 生成支付URL或表单 */
            $payment    = $this->_get_payment($czfs, $payment_info);
			
			$order_info['order_id']=$user_id;
			$order_info['order_amount']=$cz_money;
			$order_info['order_sn']=$order_sn;
			$order_info['cz_id']=$cz_id;
			
			
            $payment_form = $payment->get_payform($order_info,1);
			
			/* 跳转到真实收银台 */
            $this->_config_seo('title', Lang::get('cashier'));
            $this->assign('payform', $payment_form);
            $this->assign('payment', $payment_info);
            $this->assign('order', $order_info);
            header('Content-Type:text/html;charset=' . CHARSET);
            $this->display('cashier.payform.html');
		}
	}


	//充值成功 返回return页面
	function return_url()
	{
		$user_id   = $this->visitor->get('user_id');
		$user_name = $this->visitor->get('user_name');
		$log_row=$this->my_moneylog_mod->getrow("select * from ".DB_PREFIX."my_moneylog");	
		//这里是支付宝，财付通等当订单状态改变时的通知地址
        $order_id   = isset($_GET['out_trade_no']) ? $_GET['out_trade_no'] : 0; //哪个订单
		$price = isset($_GET['total_fee']) ? $_GET['total_fee'] : 0;
        if (!$order_id)
        {
            /* 无效的通知请求 */
            $this->show_warning('forbidden');
            return;
        }
		if (!$price)
        {
            /* 无效的通知请求 */
            $this->show_warning('forbidden');
            return;
        }

        /* 获取订单信息 */
        $cz_log_model =& m('mymoney_czlog');
        $order_info_detail  = $cz_log_model->get("czmoney_id='".$order_id."' and user_id='".$this->visitor->get('user_id')."'");
		$order_info['out_trade_sn']=$order_info_detail['czmoney_id'];
		$order_info['order_amount']=$order_info_detail['cz_price'];
        if (empty($order_info))
        {
            /* 没有该订单 */
            $this->show_warning('forbidden');

            return;
        }

        $model_payment =& m('payment');
        $payment_info  = $model_payment->get("payment_code='{$order_info_detail['payment_code']}' AND store_id = 0");
        if (empty($payment_info))
        {
            /* 没有指定的支付方式 */
            $this->show_warning('no_such_payment');

            return;
        }

        /* 调用相应的支付方式 */
        $payment = $this->_get_payment($order_info_detail['payment_code'], $payment_info);

        /* 获取验证结果 */
        $notify_result = $payment->verify_notify($order_info,true,1);
        if ($notify_result === false)
        {
            /* 支付失败 */
            $this->show_warning($payment->get_error());

            return;
        }

        #TODO 临时在此也改变订单状态为方便调试，实际发布时应把此段去掉，订单状态的改变以notify为准

        /* 只有支付时会使用到return_url，所以这里显示的信息是支付成功的提示信息 */
        $this->_curlocal('充值成功');
        $this->assign('order', $order_info);
        $this->assign('payment', $payment_info);
		$this->show_message('chongzhi_chenggong_jineyiruzhang',
		'chakancicichongzhi',  'index.php?app=my_money&act=paylog',
		'guanbiyemian', 'index.php?app=my_money&act=exits'
		);
	}
	


	//网银支付返回数据 进行站内充值
	function chinabank_pay()
	{
		$user_id = $this->visitor->get('user_id');	
		if($_POST)
		{
			$pay_row=$this->my_paysetup_mod->getrow("select * from ".DB_PREFIX."my_paysetup where id='1'");	
			$key   =   $pay_row['chinabank_key'];	
									
			$v_oid     =trim($_POST['v_oid']);       // 商户发送的v_oid定单编号   
			$v_pmode   =trim($_POST['v_pmode']);    // 支付方式（字符串）   
			$v_pstatus =trim($_POST['v_pstatus']);   //  支付状态 ：20（支付成功）；30（支付失败）
			$v_pstring =trim($_POST['v_pstring']);   //提示中文"支付成功"字符串
			
			$v_amount  =trim($_POST['v_amount']);     // 订单实际支付金额
			$v_moneytype  =trim($_POST['v_moneytype']); //订单实际支付币种
			$remark1   =trim($_POST['remark1' ]);      //备注字段1
			$remark2   =trim($_POST['remark2' ]);     //备注字段2
			$v_md5str  =trim($_POST['v_md5str' ]);   //拼凑后的MD5校验值
			
			//重新计算md5的值                         
			$md5string=strtoupper(md5($v_oid.$v_pstatus.$v_amount.$v_moneytype.$key));
			if ($v_md5str==$md5string)//校验MD5 开始
			{
				//校验MD5 IF括号
				if ($v_pstatus=="20")
				{
				//检测定单是否重复提交
				$order_row=$this->my_moneylog_mod->getrow("select order_sn from ".DB_PREFIX."my_moneylog where user_id='$user_id' and order_sn='$v_oid'");
				
				if ($v_oid != $order_row['order_sn'])
				{
					//支付成功，可进行逻辑处理！
					//商户系统的逻辑处理（例如判断金额，判断支付状态，更新订单状态等等）......
					$user_row=$this->my_money_mod->getrow("select money from ".DB_PREFIX."my_money where user_id='$user_id'");	
					$user_money=$user_row['money'];
					
					$new_money=$user_money+$v_amount;
					$edit_mymoney=array(
						'money'=>$new_money,																	
					);
					$this->my_money_mod->edit('user_id='.$user_id,$edit_mymoney);
					//添加日志
					$log_text =$this->visitor->get('user_name').Lang::get('tongguowangyinjishichongzhi').$v_amount.Lang::get('yuan');
					
					$add_mymoneylog=array(
						'user_id'=>$user_id,
						'user_name'=>$this->visitor->get('user_name'),
						'buyer_name'=>Lang::get('chinabankzhifu').$v_pmode,
						'seller_id'=>$user_id,
						'seller_name'=>$this->visitor->get('user_name'),
						'order_sn '=>$v_oid,
						'add_time'=>time(),
						'leixing'=>30,		
						'money_zs'=>$v_amount,
						'money'=>$v_amount,
						'log_text'=>$log_text,		
						'caozuo'=>50,	
						's_and_z'=>1,																		
					);
					$this->my_moneylog_mod->add($add_mymoneylog);		
					$this->show_message('chongzhi_chenggong_jineyiruzhang','chakancicichongzhi',  'index.php?app=my_money&act=paylog','guanbiyemian', 'index.php?app=my_money&act=exits'
					);
				}
				else
				{
					$this->show_warning('jinggao_qingbuyaochongfushuaxinyemian','guanbiyemian',  'index.php?app=my_money&act=exits');
					return;	
				}
				
				}else
				{ 
					$this->show_warning('chongzhi_shibai_qingchongxintijiao','guanbiyemian',  'index.php?app=my_money&act=exits');
					return;
				}
			}
			else
			{ //否则 校验MD5
				$this->show_warning('wangyinshujuxiaoyanshibai_shujukeyi','guanbiyemian',  'index.php?app=my_money&act=exits');
				return;
			}//否则 校验MD5  结束 
	
		}
		else
		{
			$this->show_warning('feifacanshu','guanbiyemian',  'index.php?app=my_money&act=exits');
			return;
		}  
	}
	
	
	
	
	//充值卡
	function card_cz()
	{  
		$user_name = $this->visitor->get('user_name');
		$card_sn = trim($_POST['card_sn']);
		$card_pass = trim($_POST['card_pass']);
		if($_POST)//检测有提交
		{
			//检测有提交
			if (preg_match("/[^0.-9]/",$card_pass))
			{
				$this->show_warning('cuowu_nishurudebushishuzilei'); 
				return;
			}
			//充值对象不能为空
			if(empty($user_name))
			{
				$this->show_warning('cuowu_mubiaoyonghubucunzai'); 
				return;
			}	
	
	
			$user_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_money where user_name='$user_name'");	
			$user_money=$user_row['money'];
			$user_id=$user_row['user_id'];
			if(empty($user_id))
			{
				$this->show_warning('cuowu_mubiaoyonghubucunzai'); 
				return;
			}	
			$card_row=$this->my_card_mod->getrow("select * from ".DB_PREFIX."my_card where card_pass='$card_pass'");	
			$card_id=$card_row['id'];
			//读取空 提示卡号、密码错误
			if(empty($card_row))
			{
				$this->show_warning('cuowu_card_pass'); 
				return;
			}
			//检测过期时间小于现在时间，则提示已经过期
			if($card_row['guoqi_time'] < time())
			{
				$this->show_warning('cuowu_cardyijingguoqi'); 
				return;
			}
			if($card_row['user_id'] !=0)
			{
				$this->show_warning('cuowu_cardyijingshiyongguole'); 
				return;
			}
			else
			{
				//添加日志
				$log_text ='使用充值卡充值，获得金额';
				$add_mymoneylog=array(
					'user_id'=>$user_id,
					'user_name'=>$user_name,
					'buyer_id'=>$this->visitor->get('user_id'),
					'buyer_name'=>$this->visitor->get('user_name'),
					'seller_id'=>$user_id,
					'seller_name'=>$user_name,
					'order_sn '=>$card_sn,
					'add_time'=>time(),
					'leixing'=>30,
					'money_zs'=>$card_row['money'],
					'money'=>$card_row['money'],	
					'log_text'=>$log_text,
					'caozuo'=>50,
					's_and_z'=>1,															
				);
				//写入日志
				$this->my_moneylog_mod->add($add_mymoneylog);
				//定义新资金
				$new_user_money = $user_money+$card_row['money'];
				//定义资金数组
				$add_money=array('money'=>$new_user_money,);
				//更新该用户资金
				$this->my_money_mod->edit('user_id='.$user_id,$add_money);
				//改变充值卡信息 已使用
				$add_cardlog=array(
				'user_id'=>$user_id,
				'user_name'=>$user_name,
				'cz_time'=>time(),												
				);
				$this->my_card_mod->edit('id='.$card_id,$add_cardlog);
				//提示语言
				$this->show_message('chongzhi_chenggong_jineyiruzhang',
				'chakancicichongzhi',  'index.php?app=my_money&act=paylog',
				'guanbiyemian', 'index.php?app=my_money&act=exits');
				return;
				}	
		}
		else//检测提交 否则
		{
			//检测提交 开始
			header("Location: index.php?app=my_money");
			return;
		}//检测提交 结束
	}
	
	//余额转帐
	function to_user()
	{  
		$to_user = trim($_POST['to_user']);
		$to_money = trim($_POST['to_money']);
		$user_id = $this->visitor->get('user_id');	
		if($_POST)//检测有提交
		{//检测有提交
			if (preg_match("/[^0.-9]/",$to_money))
			{
				$this->show_warning('cuowu_nishurudebushishuzilei'); 
				return;
			}
		
		
			$to_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_money where user_name='$to_user'");	
			$to_user_id=$to_row['user_id'];
			$to_user_name=$to_row['user_name'];
			$to_user_money=$to_row['money'];
		
			if($to_user_id==$user_id)
			{
				$this->show_warning('cuowu_bunenggeizijizhuanzhang'); 
				return;
			}
			
			if(empty($to_user_id))
			{
				$this->show_warning('cuowu_mubiaoyonghubucunzai'); 
				return;
			}	
			$user_row=$this->my_money_mod->getrow("select * from ".DB_PREFIX."my_money where user_id='$user_id'");	
			$user_money=$user_row['money'];
			$user_zf_pass=$user_row['zf_pass'];
			$user_mibao_id=$user_row['mibao_id'];
			if(empty($user_mibao_id))
			{
				$zf_pass = md5(trim($_POST['zf_pass']));
				if($user_zf_pass != $zf_pass)
				{
					$this->show_warning('cuowu_zhifumimayanzhengshibai'); 
					return;	
				} 
			}
			else
			{
				//读取密保卡资料
				$user_zimuz1 = trim($_POST['user_zimuz1']);
				$user_zimuz2 = trim($_POST['user_zimuz2']);
				$user_zimuz3 = trim($_POST['user_zimuz3']);
				$user_shuzi1 = trim($_POST['user_shuzi1']);
				$user_shuzi2 = trim($_POST['user_shuzi2']);
				$user_shuzi3 = trim($_POST['user_shuzi3']);
				if(empty($user_shuzi1) or empty($user_shuzi2) or empty($user_shuzi3))
				{
					$this->show_warning('cuowu_dongtaimimayanzhengshibai'); 
					return;			
				}
				$mibao_row=$this->my_mibao_mod->getrow("select * from ".DB_PREFIX."my_mibao where user_id='$user_id'");
				$mibao_shuzi1=$mibao_row[$user_zimuz1];
				$mibao_shuzi2=$mibao_row[$user_zimuz2];
				$mibao_shuzi3=$mibao_row[$user_zimuz3];	
			
				if ( $user_shuzi1 != $mibao_shuzi1 or $user_shuzi2 != $mibao_shuzi2 or $user_shuzi3 != $mibao_shuzi3) 
				{ //检测密保相符 开始
					echo Lang::get('money_banben');
					$this->show_warning('cuowu_dongtaimimayanzhengshibai'); 
					return;
				} //检测密保 否则 结束
			}
		
		
			$order_id = date('Ymd-His',time()).'-'.$to_money; 
			if ($user_money < $to_money)
			{
				$this->show_warning('cuowu_zhanghuyuebuzu'); 
				return;
			}
			else
			{
				//添加日志
				$log_text =$this->visitor->get('user_name').Lang::get('gei').$to_user.Lang::get('zhuanchujine').$to_money.Lang::get('yuan');
				
				$add_mymoneylog=array(
					'user_id'=>$user_id,
					'user_name'=>$this->visitor->get('user_name'),
					'buyer_name'=>$this->visitor->get('user_name'),
					'seller_name'=>$to_user_name,
					'order_sn '=>$order_id,
					'add_time'=>time(),
					'leixing'=>21,		
					'money_zs'=>$to_money,
					'money'=>'-'.$to_money,	
					'log_text'=>$log_text,
					'caozuo'=>50,
					's_and_z'=>2,															
				);
				$this->my_moneylog_mod->add($add_mymoneylog);
					
					
				$log_text_to =$this->visitor->get('user_name').Lang::get('gei').$to_user_name.Lang::get('zhuanrujine').$to_money.Lang::get('yuan');
				$add_mymoneylog_to=array(
					'user_id'=>$to_user_id,
					'user_name'=>$to_user_name,
					'order_sn '=>$order_id,
					'buyer_name'=>$this->visitor->get('user_name'),
					'seller_name'=>$to_user_name,
					'add_time'=>time(),
					'leixing'=>11,		
					'money_zs'=>$to_money,
					'money'=>'-'.$to_money,			
					'log_text'=>$log_text_to,	
					'caozuo'=>50,
					's_and_z'=>1,																				
				);
				$this->my_moneylog_mod->add($add_mymoneylog_to);
				
				$new_user_money = $user_money-$to_money;
				$new_to_user_money =$to_user_money+$to_money;
				
				$add_jia=array(	
					'money'=>$new_to_user_money,																	
				);
				$this->my_money_mod->edit('user_id='.$to_user_id,$add_jia);
				$add_jian=array(	
					'money'=>$new_user_money,																		
				);
				$this->my_money_mod->edit('user_id='.$user_id,$add_jian);
				
				$this->show_message('zhuanzhangchenggong');
				return;
			}	
		}
		else//检测提交 否则
		{//检测提交 开始
			header("Location: index.php?app=my_money");
			return;
		}//检测提交 结束
	}
}
?>
