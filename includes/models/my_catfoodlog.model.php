<?php

/* 店铺礼品卡记录 */
class My_catfoodlogModel extends BaseModel
{
    var $table  = 'my_catfoodlog';
    var $prikey = 'id';
    var $_name  = 'my_catfoodlog';
    var $_relation  = array(
 		// 一个猫粮记录属于一个店铺
		'has_my_money'=>array(
		   'model'        => 'my_money',
		   'type'         => HAS_ONE,
		   'foreign_key'  => 'user_id',
		   'dependent'    => true
		),  // end  by tyioocom
		 // 一个猫粮记录属于一个店铺
		'has_store'=>array(
		   'model'        => 'store',
		   'type'         => BELONGS_TO,
		   'foreign_key'  => 'store_id',
		   'reverse'       => 'store_catfoodlog',
		),  // end  by tyioocom
    );
}