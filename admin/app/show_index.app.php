<?php

/**
 *    商品品牌管理控制器
 *
 *    @author    Hyber
 *    @usage    none
 */
class Show_indexApp extends BackendApp
{
    /**
     *    首页推荐
     *
     *    @author    Hyber
     *    @return    void
     */
    function index()
    {
       $conditions = $this->_get_query_conditions(array(
            array(
                'field' => 'goods_name',
                'equal' => 'LIKE',
            ),
        ));
		
		/* 取得推荐商品 */
		$goods_mod =& m('goods');
        $page = $this->_get_page();
        $goods_list = $goods_mod->find(array(
            'join' => 'be_recommend, belongs_to_store, has_goodsstatistics',
            'fields' => 'g.goods_name, s.store_id, s.store_name, g.cate_name, g.brand, recommended_goods.sort_order, g.closed, g.show_index,g.sort_order',
            'conditions' => '1=1' . $conditions,
            'limit' => $page['limit'],
            'order' => 'recommended_goods.sort_order',
            'count' => true,
        ));
        foreach ($goods_list as $key => $goods)
        {
            $goods_list[$key]['cate_name'] = $goods_mod->format_cate_name($goods['cate_name']);
        }
        $this->assign('goods_list', $goods_list);

        $page['item_count'] = $goods_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info', $page);

        $this->import_resource(array('script' => 'inline_edit.js'));
        $this->display('goods_show_index.html');
    }
	
	function show_index()
	{
	    $conditions = $this->_get_query_conditions(array(
            array(
                'field' => 'goods_name',
                'equal' => 'LIKE',
            ),
        ));
		
		/* 取得推荐商品 */
		$goods_mod =& m('goods');
        $page = $this->_get_page();
        $goods_list = $goods_mod->find(array(
            'join' => 'be_recommend, belongs_to_store, has_goodsstatistics',
            'fields' => 'g.goods_name, s.store_id, s.store_name, g.cate_name, g.brand, recommended_goods.sort_order, g.closed, g.show_index,g.sort_order',
            'conditions' => 'show_index=0' . $conditions,
            'limit' => $page['limit'],
            'order' => 'recommended_goods.sort_order',
            'count' => true,
        ));
        foreach ($goods_list as $key => $goods)
        {
            $goods_list[$key]['cate_name'] = $goods_mod->format_cate_name($goods['cate_name']);
        }
        $this->assign('goods_list', $goods_list);

        $page['item_count'] = $goods_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info', $page);

        $this->import_resource(array('script' => 'inline_edit.js'));
        $this->display('goods_show_index.html');
	}
	
    //异步修改数据
    function ajax_col()
    {
       $goods_mod =& m('goods');
	   $id     = empty($_GET['id']) ? 0 : intval($_GET['id']);
       $column = empty($_GET['column']) ? '' : trim($_GET['column']);
       $value  = isset($_GET['value']) ? trim($_GET['value']) : '';
       $data   = array();
       if (in_array($column ,array('show_index','sort_order')))
       {
           $data[$column] = $value;
           $goods_mod->edit($id, $data);
           if(!$goods_mod->has_error())
           {
               echo ecm_json_encode(true);
           }
       }
       else
       {
           return ;
       }
       return ;
    }

}

?>