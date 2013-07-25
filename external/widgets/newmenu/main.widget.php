<?php

/**
 * 商品分类挂件
 *
 * @return  array
 */
class NewmenuWidget extends BaseWidget
{
    var $_name = 'newmenu';
    var $_ttl  = 86400;
	var $_num = 10;
	var $_limit = 4;


    function _get_data()
    {
        $this->options['amount'] = intval($this->options['amount']);
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$gcategory_mod = & m('gcategory');
			$data['p_info'] = $gcategory_mod->find(array(
			     'conditions' => 'parent_id=0 and if_show=1 and show_index=0 and store_id=0',
				 'order' => 'sort_order',
				 'limit' => '10',
				 'fields' => 'this.*',
			));
			$data['c_info'] = $gcategory_mod->find(array(
			     'conditions' => 'parent_id!=0 and if_show=1 and show_index=0',
				 'order' => 'sort_order',
				 'fields' => 'this.*',
			));
            $cache_server->set($key, $data, $this->_ttl);
        }
        return $data;
    }
}

?>