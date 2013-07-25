<?php

/* 管理员控制器 */
class JfcadeApp extends BackendApp
{
    function index()
    {
		$store_card = & m('store_card');
		$page = $this->_get_page();
		$conditions = $this->_get_query_conditions(array(
            array(
                'field' => $_GET['field_name'],
                'name'  => 'field_value',
                'equal' => '=',
            ),
        ));
		$store_card_info=$store_card->find(array(
			'field' => 'store_card.*,member.user_name,s.store_name',
			'join' => 'card_cardstore,card_member',
			'limit' => $page['limit'],
			'conditions' => '1=1' . $conditions,
			'order' => "store_card.add_time desc",
			'count' => true,
		));
		foreach($store_card_info as $key => $item)
		{
			$store_card_info[$key]['end_time']=$item['add_time']+15*24*3600;
		}
		$page['item_count'] = $store_card->getCount();
		$this->_format_page($page);
		$this->assign('filtered', $conditions? 1 : 0); //是否有查询条件
		$this->assign('page_info',$page);
		$this->assign('cards', $store_card_info);
		$this->assign('query_fields', array('s.store_id' => LANG::get('store_id'),'s.store_name' => LANG::get('store_name')));
        $this->display('jfcade.index.html');
    }

}

?>
