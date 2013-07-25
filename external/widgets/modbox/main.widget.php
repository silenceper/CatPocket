<?php

/**
 * 精品推荐挂件
 *
 * @param   int     $img_recom_id   图文推荐id
 * @return  array
 */
class ModboxWidget extends BaseWidget
{
    var $_name = 'modbox';
    var $_ttl  = 180;
    var $_num  = 4;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data == false)
        {
			$gcategory_mod  =& bm('gcategory');
			$layer   = $gcategory_mod->get_layer($this->options['img_recom_id'], true);
			
            $gcategory_mod = & m('gcategory'); 
            $data['data_info'] = $gcategory_mod->get_gcategory_goods($this->options['img_recom_id'], $this->_num, $layer, true);
			if($this->options['img_recom_id'])
			{
				$gcategory = $gcategory_mod->get('cate_id='.$this->options['img_recom_id']);
				$data['cate_name'] = $gcategory['cate_name'];
			}
			$data['cate_id'] = $this->options['img_recom_id'];
			$data['image_url'] = $this->options['image_url'];
            $cache_server->set($key, $data, $this->_ttl);
        }
        return $data;
    }

    function get_config_datasrc()
    {
        // 取得推荐类型
        $this->assign('gcategorys', $this->_get_gcategorys());
    }

    function parse_config($input)
    {
		$filename = $this->_upload_image();
        if ($filename)
        {
            $input['image_url'] = $filename;
        }
        return $input;
    }
	
	function _upload_image()
    {
        import('uploader.lib');
        $file = $_FILES['image_file'];
        if ($file['error'] == UPLOAD_ERR_OK)
        {
            $uploader = new Uploader();
            $uploader->allowed_type(IMAGE_FILE_TYPE);
            $uploader->addFile($file);
            $uploader->root_dir(ROOT_PATH);

            return $uploader->save('data/files/mall/template', $uploader->random_filename());
        }

        return '';
    }
	
}

?>