<?php

/* 管理员控制器 */
class CatfoodApp extends BackendApp
{
    function index()
    {
		$this->_store_mod = &m('store');
		$conditions = $this->_get_query_conditions(array(
            array(
                'field' => $_GET['field_name'],
                'name'  => 'field_value',
                'equal' => '=',
            ),
        ));
		$page = $this->_get_page();
        $stores = $this->_store_mod->find(array(
            'fields' => 'store.*,member.user_id,member.user_name',
			'join'   => 'belongs_to_user',
            'conditions' => '1=1' . $conditions,
            'limit' => $page['limit'],
            'order' => "",
            'count' => true,
        ));
		$this->assign('stores',$stores);
		$page['item_count'] =$this->_store_mod->getCount();
        $this->_format_page($page);
        $this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
        $this->assign('page_info', $page);
		$this->assign('query_fields', array(
			'store_id' => LANG::get('store_id'),
			'store_name' => LANG::get('store_name'),
			'user_name' => LANG::get('user_name'),
		));
        $this->display('catfood.index.html');
    }
	

 	function catfood_log()
    {
        $page = $this->_get_page();	
		$my_catfoodlog = & m('my_catfoodlog');
		$conditions = $this->_get_query_conditions(array(
            array(
                'field' => $_GET['field_name'],
                'name'  => 'field_value',
                'equal' => '=',
            ),
        ));	
		$index=$my_catfoodlog->find(array(
			'fields' => 'this.*',
	        'join'   => '',
            'limit' => $page['limit'],
			'order' => "id desc",
			'conditions' => '1=1' . $conditions,
			'count' => true));
		$page['item_count'] = $my_catfoodlog->getCount();
        $this->_format_page($page);
		$this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
	    $this->assign('page_info', $page);
	    $this->assign('index', $index);//传递到风格里
		$this->assign('query_fields', array(
			'user_id' => LANG::get('user_id'),
			'user_name' => LANG::get('user_names'),
		));
        $this->display('catfood_log.html'); 
	   return;
	}
}

?>
