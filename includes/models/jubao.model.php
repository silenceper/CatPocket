<?php

/* 购物车 cart */
class JubaoModel extends BaseModel
{
    var $table  = 'jubao';
    var $prikey = 'id';
    var $_name  = 'jubao';
	var $_relation = array(
        // 一个举报属于一件商品
        'belong_goods' => array(
            'model'         => 'goods',
            'type'          => BELONGS_TO,
            'foreign_key'   => 'goods_id',
            'reverse'       => 'has_jubao',
        ),
		// 一个举报属于一个店铺
        'belong_store' => array(
            'model'         => 'store',
            'type'          => BELONGS_TO,
            'foreign_key'   => 'store_id',
            'reverse'       => 'has_toushu',
        ),
	);
}

?>