<?php

/* 属性 attribute */
class CustomerModel extends BaseModel
{
    var $table  = 'customer';
    var $prikey = 'customer_id';
    var $_name  = 'customer';
	var $_relation  = array(
		'has_detail'=>array(
		   'model'        => 'member',
		   'type'         => BELONGS_TO,
		   'foreign_key'  => 'user_id',
		   'reverse'       => 'custo_card',
		),  // end  by tyioocom
	);
}

?>