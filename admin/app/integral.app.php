<?php

/* 管理员控制器 */
class IntegralApp extends BackendApp
{
	var $_user_mod;
	var $_my_money_mod;
	var $_store_mod;
    function __construct()
    {
        $this->IntegralApp();
    }

    function IntegralApp()
    {
        parent::__construct();
		$this->_user_mod =& m('member');
		$this->_my_money_mod = &m('my_money');
		$this->_store_mod = &m('store');		
    }
    function index()
    {
		$conditions = $this->_get_query_conditions(array(
            array(
                'field' => $_GET['field_name'],
                'name'  => 'field_value',
                'equal' => 'like',
            ),
        ));
		$page = $this->_get_page();
        $users = $this->_user_mod->find(array(
            'fields' => 'member.user_id,member.user_name,my_money.*,store.*',
			'join'   => 'has_my_money,has_store',
            'conditions' => '1=1' . $conditions,
            'limit' => $page['limit'],
            'order' => "",
            'count' => true,
        ));
		$this->assign('users',$users);
		$page['item_count'] = $this->_user_mod->getCount();
        $this->_format_page($page);
        $this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
        $this->assign('page_info', $page);
		$this->assign('query_fields', array('member.user_name' => LANG::get('user_name')));
        $this->display('integral.index.html');
    }
	function recharge()
	{
		$this->_my_integrallog_mod = &m('my_integrallog');
		$id = empty($_GET['id']) ? 0 : intval($_GET['id']);
		$integral = $this->_my_money_mod->get(array('conditions' =>'user_id ='.$id,'fields' => 'my_money.*,store.*',
			'join'   => 'has_stores',));
		$this->assign('integral',$integral);
		if (empty($_GET['id']))
		{
			$this->show_warning('user_empty');
			return;
		}
		else
		{
			if (IS_POST)
			{
				$jifennum= trim($_POST['jifennum']);
				$jifenedu= trim($_POST['jifenedu']);
				$jia_or_jian= trim($_POST['jia_or_jian']);
				$log_text= trim($_POST['log_text']);
				if($jia_or_jian=="jia")
			   	{
					$jifen=$jifennum + $integral['jifen'];
					$state='5';
				}
			   	if($jia_or_jian=="jian")
			   	{
				   if($integral['jifen']+$jifenedu >= $jifennum)
				   {	   
				   		$jifen=$integral['jifen'] - $jifennum;
						$state='6';
				   }
				   else
				   {
						$this->show_warning('用户积分不能少于其额度的负值！');
						return;
				   }
			   	} 
				$data = array(
				   'user_id' => $id,
				   'jifen'  => $jifen,
				   'seller_edu'  => $jifenedu,
				);
				//添加日志
				if($jifennum!='')
				{
					$data1 = array(
						'user_id' => $this->visitor->get('user_id'),
						'user_name' => $this->visitor->get('user_name'),
						'recieve_id' => $integral['user_id'],
						'recieve_name' => $integral['user_name'],
						'add_time' => gmtime(),
						'state' => $state,
						'jifen' => $jifennum,
						'log_text' => $log_text,
					);
					$this->_my_integrallog_mod->add($data1);
				}
				if($jifenedu!=$integral['seller_edu'])
				{
					$data2 = array(
						'user_id' => $this->visitor->get('user_id'),
						'user_name' => $this->visitor->get('user_name'),
						'recieve_id' => $integral['user_id'],
						'recieve_name' => $integral['user_name'],
						'add_time' => gmtime(),
						'state' => '7',
						'jifen' => $jifenedu,
						'log_text' => $log_text,
					);
					$this->_my_integrallog_mod->add($data2);
				}

				if($this->_my_money_mod->get(array('conditions' =>'user_id ='.$id,))) 
				{
					$ids =  $this->_my_money_mod->get('user_id = '.$id);
					$id = $ids['id'];
					$this->_my_money_mod->edit($id,$data);
				}
				else
				{
					$this->_my_money_mod->add($data);
				}
				$this->show_message('edit_ok',
                   'back_list',    'index.php?app=integral',
                   'edit_again',   'index.php?app=integral&amp;act=recharge&amp;id=' . $id
               );
			}
			else
			{
				$this->display('integral.form.html');
			}
		}
	}
	//查看所有增加减少资金log
 	function user_jifen_log()
    {
        $page = $this->_get_page();	
		$this->_my_integrallog_mod = &m('my_integrallog');	
		$index=$this->_my_integrallog_mod->find(array(
	        'conditions' => '',
            'limit' => $page['limit'],
			'order' => "id desc",
			'count' => true));
		$page['item_count'] = $this->_my_integrallog_mod->getCount();
        $this->_format_page($page);
	    $this->assign('page_info', $page);
	    $this->assign('index', $index);//传递到风格里
        $this->display('user_jifen_log.html'); 
	   return;
	}
}

?>
