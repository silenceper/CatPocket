<?php

return array(
    'id'    => 'my_money',
    'name'  => Lang::get('money_name'),
    'desc'  => Lang::get('money_miaosu'),
    'version'   => '2.2',
	'author'    => 'CatPocket Team',
    'author'    => Lang::get('money_zuozhe'),
    'website'   => 'carey',
    'menu'  => array(
        array(
            'text'  => Lang::get('money_admin'),
            'act'   => 'index.php?module=my_money&act=setup',
        ),
    ),

);

?>
