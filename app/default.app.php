<?php

class DefaultApp extends MallbaseApp
{
    function index()
    {
        $this->assign('index', 1); // 标识当前页面是首页，用于设置导航状态
        $this->assign('icp_number', Conf::get('icp_number'));

        /* 热门搜素 */
        $this->assign('hot_keywords', $this->_get_hot_keywords());
		
		$store_mod = & m('store');
		$taobao_info = $store_mod->find(array(
			'conditions' => "1=1 and taobao_rank <> 0 group by taobao_rank",
            'fields'     => 'count(*) as taobao_val,taobao_rank',
		));
		
		$paipai_info = $store_mod->find(array(
			'conditions' => "1=1 and paipai_rank <> 0 group by paipai_rank",
            'fields'     => 'count(*) as paipai_val,paipai_rank',
		));
		
		$goods_mod = & m('goods');
		$goods_info=$goods_mod->find(array(
		'conditions' => 'if_show=1',
		'fields' => 'this.*',
		'count' => true,
		));
		$count_goods=$goods_mod->getCount();
		
		$this->assign('count_goods', $count_goods);
		$this->assign('taobao_info', $taobao_info);
		$this->assign('paipai_info', $paipai_info);

        $this->_config_seo(array(
            'title' => Lang::get('mall_index') . ' - ' . Conf::get('site_title'),
        ));
        $this->assign('page_description', Conf::get('site_description'));
        $this->assign('page_keywords', Conf::get('site_keywords'));
        $this->display('index.html');
    }

    function _get_hot_keywords()
    {
        $keywords = explode(',', conf::get('hot_search'));
        return $keywords;
    }
	
}

?>