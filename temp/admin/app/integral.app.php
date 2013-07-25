<?php

/* 管理员控制器 */
class IntegralApp extends BackendApp
{
	var $_user_mod;
	var $_integral_mod;
    function __construct()
    {
        $this->IntegralApp();
    }

    function IntegralApp()
    {
        parent::__construct();
		$this->_user_mod =& m('member');
		$this->_integral_mod = &m('my_money');
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
            'fields' => 'member.user_id,member.user_name,ig.*',
			'join'   => 'has_integral',
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
		$this->assign('query_fields', array('user_name' => LANG::get('user_name')));
        $this->display('integral.index.html');
    }
	function recharge()
	{
		$id = empty($_GET['id']) ? 0 : intval($_GET['id']);
		$integral = $this->_integral_mod->get($id);
		if (empty($_GET['id']))
		{
			$this->show_warning('user_empty');
			return;
		}
		else
		{
			if (IS_POST)
			{
				$data = array(
				   'user_id' => $id,
				   'amount'  => intval($_POST['amount']) + $integral['amount']
				);
				if($this->_integral_mod->get('user_id='.$id)) // 如果已经设置过会员积分，则修改改会员积分，否则添加记录
				{
					$this->_integral_mod->edit($id,$data);
				}
				else
				{
					$this->_integral_mod->add($data);
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
    function drop()
    {
        
    }
    function edit()
    {
        
    }
}

?>
