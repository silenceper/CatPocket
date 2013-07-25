<?php

class CustomerApp extends MemberbaseApp
{	
 	function index()
    {
		/* 当前位置 */
		$this->_curlocal(LANG::get('member_center'),  'index.php?app=member',
		                 LANG::get('customer'),         'index.php?app=customer&act=profit',
						 LANG::get('customer_source'));
		/* 当前用户中心菜单 */
		$this->_curitem('customer');

		/* 当前所处子菜单 */
		$this->_curmenu('customer_source');
				$store_id = $this->visitor->get('manage_store');
		if(!$store_id)
		{
		    show_warning('您不是商家或者没登陆！');
			return;
		}
		
		$customer_mod = & m('customer');
		$page = $this->_get_page();
        $customer_list = $customer_mod->find(array(
            'fields'    => 'customer.*,member.reg_time,member.user_name',
            'join'      => 'has_detail',
            'conditions'=> 'firstgm=1 and store_id='.$store_id ,
            'order'     => 'buyer_id DESC',
        ));
		$m=0;
		foreach($customer_list as $key =>$item )
		{
		    if($m==0)
			{
			    $buyer_id=$item['buyer_id'];
			}
			else
			{
				$buyer_id.=','.$item['buyer_id'];
			}
			$m++; 
		}	
		$my_moneylog_mod = & m('my_moneylog');
		$page = $this->_get_page();
		$my_moneylog_list=array();
		if($buyer_id)
		{
			$my_moneylog_list = $my_moneylog_mod->find(array(
				'fields'    => 'this.*',
				'conditions'=> 'caozuo=73 and user_id='.$store_id.' and buyer_id in ('.$buyer_id.')' ,
				'order'     => 'id DESC',
				'limit'     => $page['limit'],
				'count'     => true
			));
		}
		$j=0;	
		foreach ($my_moneylog_list as $key)
		{
			$year=date('Y',$key['add_time']);
			$month=date('m',$key['add_time']);
			$year1=date('Y',gmtime());
			$month1=date('m',gmtime());
			if($year==$year1 && $month==$month1)
			{
				$j++;
			}
		}
		$i=0;
		foreach ($customer_list as $key => $customer)
		{
			$customer_list_info=$customer_mod->find('buyer_id='.$customer['buyer_id']);
			foreach($customer_list_info as $arr)
			{
			   $i=$arr['purchase_number']+$i;
			}
			$customer_list[$key]['count']=$i;
		}
		
		$page['item_count'] = $customer_mod->getCount();
		$count_all = $page['item_count'];
        $this->_format_page($page);
        $this->assign('count_all', $m);
		$this->assign('active_all', $j);
		$this->assign('page_info', $page);
		$this->assign('customer_list', $customer_list);
        $this->assign('page_title', Lang::get('member_center') . ' - ' . Lang::get('customer_source'));
		$this->display('customer.source.html');
	}	
	
	function profit()
	{
			/* 当前位置 */
		$this->_curlocal(LANG::get('member_center'),   'index.php?app=member',
						 LANG::get('customer'),         'index.php?app=customer&act=profit',
						 LANG::get('customer_profit')
						 );
		/* 当前用户中心菜单 */
		$this->_curitem('customer');	
		$this->_curmenu('customer_profit');
		
		$store_id = $this->visitor->get('manage_store');
		if(!$store_id)
		{
		    show_warning('您不是商家或者没登陆！');
			return;
		}
		
		$customer_mod = & m('customer');
		$page = $this->_get_page();
        $customer_list = $customer_mod->find(array(
            'fields'    => 'customer.*,member.reg_time,member.user_name',
            'join'      => 'has_detail',
            'conditions'=> 'firstgm=1 and store_id='.$store_id ,
            'order'     => 'buyer_id DESC',
        ));
		$i=0;
		foreach($customer_list as $key =>$item )
		{
		    if($i==0)
			{
			    $buyer_id=$item['buyer_id'];
			}
			else
			{
			    $buyer_id.=','.$item['buyer_id'];
			}
			$i++; 
		}	
		$my_moneylog_mod = & m('my_moneylog');
		$page = $this->_get_page();
		$my_moneylog_list=array();
		if($buyer_id)
		{
			$my_moneylog_list = $my_moneylog_mod->find(array(
				'fields'    => 'this.*',
				'conditions'=> 'caozuo=73 and user_id='.$store_id.' and buyer_id in ('.$buyer_id.')' ,
				'order'     => 'id DESC',
				'limit'     => $page['limit'],
				'count'     => true
			));
		}
		$i=0;
		$j=0;
		foreach ($my_moneylog_list as $key)
		{
			$i=$key['money']+$i;
			
			$year=date('Y',$key['add_time']);
			$month=date('m',$key['add_time']);
			$year1=date('Y',gmtime());
			$month1=date('m',gmtime());
			if($year==$year1 && $month==$month1)
			{
				$j=$key['money']+$j;
			}
		}
		$day=date('d',gmtime());
		$pre_count=30/$day*$j;
		$page['item_count'] = $my_moneylog_mod->getCount();
		$this->_format_page($page);
		$this->assign('page_info', $page);
		$this->assign('my_moneylog_list', $my_moneylog_list);
		$this->assign('count_all', $i);
		$this->assign('current_count', $j);
		$this->assign('pre_count', $pre_count);
		
		
		$this->assign('page_title', Lang::get('member_center') . ' - ' . Lang::get('customer_profit'));
		$this->display('customer.profit.html');
	}
	
	 /**
     *    三级菜单
     *
     *    @author    Hyber
     *    @return    void
     */
    function _get_member_submenu()
    {
        $submenus =  array(
            array(
                'name'  => 'customer_source',
                'url'   => 'index.php?app=customer',
            ),
            array(
                'name'  => 'customer_profit',
                'url'   => 'index.php?app=customer&amp;act=profit',
            ),
        );
        return $submenus;
    }
}
?>
