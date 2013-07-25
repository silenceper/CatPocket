<?php

/**
 * 商品分类挂件
 *
 * @return  array
 */
class BrandsWidget extends BaseWidget
{
    var $_name = 'brands';
    var $_ttl  = 86400;
    var $_num  = 8;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$goods =& m('goods');
			$data = $goods->find(array(
				'conditions' => "show_index=0",
				'fields'     => 'this.*,goods_integral.*',
				'limit'      => $this->_num,
				'join'  =>  'has_goodsintegral',
				'order' => 'sort_order',
			));
			
		foreach ($data as $key => $goodss)
        {
            empty($goodss['default_image']) && $data[$key]['default_image'] = Conf::get('default_goods_image');
			if(strlen($goodss['brand'])>30)
			{
				$data[$key]['brand']=$this->msubstr($goodss['brand'],0,30)."...";
				$data[$key]['b_all']=$goodss['brand'];
			}
        }
			
            $cache_server->set($key, $data, $this->_ttl);
        }

        return $data;
    }
	
	function msubstr($str, $start, $len) {  
		$tmpstr = "";  
		$strlen = $start + $len;  
		for($i = 0; $i < $strlen; $i++){  
			if(ord(substr($str, $i, 1)) > 127){  
				$tmpstr.=substr($str, $i, 3);  
				$i+=2;  
			}else  
				$tmpstr.= substr($str, $i, 1);  
    }  
       return $tmpstr;  
    }


}

?>