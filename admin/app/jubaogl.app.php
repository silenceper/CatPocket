<?php

/* 管理员控制器 */
class JubaoglApp extends BackendApp
{
    function index()
    {
		$this->_jubao_mod = &m('jubao');
		$page = $this->_get_page();
        $indexs = $this->_jubao_mod->find(array(
            'fields' => 'this.*,goods.goods_name,store.store_name',
			'join'   => 'belong_goods,belong_store',
            'limit' => $page['limit'],
            'order' => "id desc",
            'count' => true,
        ));
		$this->assign('index',$indexs);
		$page['item_count'] = $this->_jubao_mod->getCount();
        $this->_format_page($page);
        $this->assign('page_info', $page);
		$this->assign('query_fields', array('user_name' => LANG::get('user_name')));
        $this->display('jubao.index.html');
    }
	function agree()
	{
		$id = isset($_GET['id']) ? trim($_GET['id']) : '';
		$this->_jubao_mod = &m('jubao');
		if (!$id)
		{
			$this->show_warning('没有选中的举报！');
			return;
		}
		$result =$this->_jubao_mod->edit($id ,  array(
				'state'  => 1,
		));
		if (!$result)
		{
			/* 修改不成功，显示原因 */
			$this->show_warning($this->_jubao_mod->get_error());
			return;
		}
		$this->show_message('操作成功！');
	}
	
	function drop()
	{
		$id = isset($_GET['id']) ? trim($_GET['id']) : '';
		$this->_jubao_mod = &m('jubao');
		if (!$id)
		{
			$this->show_warning('没有选中的举报！');
			return;
		}
		$this->_jubao_mod->drop($id);
		$this->show_message('操作成功！');
	}
	
	function view()
	{
		$id = isset($_GET['id']) ? trim($_GET['id']) : '';
		$this->_jubao_mod = &m('jubao');
		if (!$id)
		{
			$this->show_warning('没有选中的举报！');
			return;
		}
		$indexs = $this->_jubao_mod->get(array('conditions' =>  "id= '".$id."'"));
		$this->assign('index',$indexs);
        $this->display('jubao.form.html');
	}
	
}

?>
