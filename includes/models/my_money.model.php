<?php
class My_moneyModel extends BaseModel
{
    var $table  = 'my_money';
    var $prikey = 'id';
    var $_name  = 'my_money';
	    var $_relation = array(
			// 一个会员拥有一个店铺，id相同
        'has_stores' => array(
            'model'       => 'store',       //模型的名称
            'type'        => BELONGS_TO,       //关系类型
            'foreign_key' => 'store_id',    //外键名
			'reverse'       => 'belongs_to_my_money',
        ),
		);
}
?>