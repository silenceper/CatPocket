<?php

/* 店铺礼品卡记录 */
class Store_cardModel extends BaseModel
{
    var $table  = 'store_card';
    var $prikey = 'jf_card_id';
    var $_name  = 'store_card';
    var $_relation  = array(
	    // 一个礼品卡被一个会员使用
		'card_member'=>array(
		   'model'        => 'member',
		   'type'         => BELONGS_TO,
		   'foreign_key'  => 'user_id',
		   'reverse'       => 'member_card',
		), 
		// 一个礼品卡属于一个店铺
		'card_cardstore'=>array(
		   'model'        => 'store',
		   'type'         => BELONGS_TO,
		   'foreign_key'  => 'store_id',
		   'reverse'      => 'store_storecard',
		), 
    );
	
	/*
     * 判断是否有此卡号
    */
    function has_card($card_num)
    {
        $conditions = "card_num = '" . $card_num . "'";
        return count($this->find(array('conditions' => $conditions))) != 0;
    }
	
	/*
	*  积分改变
	*/
	function edit_jf_count($user_id,$card_num)
	{
	    $store_card_info=$this->get("card_num='".$card_num."'");
		$this->edit($store_card_info['jf_card_id'],'c_state=1,buyer_id='.$user_id);
		$money_mod = & m('my_money');
		$money_info=$money_mod->get('user_id='.$user_id);
		$money_mod->edit($money_info['id'],'jifen=jifen+'.$store_card_info['jf_count']);
	}
	/*
	*  生成礼品卡号
	*/
	function sc_card_num()
	{
		$timestring = microtime();
		$secondsSinceEpoch=(integer) substr($timestring, strrpos($timestring, " "), 100);
		$microseconds=(double) $timestring;
		$seed = mt_rand(0,1000000000) + 10000000 * $microseconds + $secondsSinceEpoch;
		mt_srand($seed);
		$randstring = "";
		for($i=0; $i < 5; $i++)
		{
			$randstring .= mt_rand(0, 9);
			$randstring .= chr(ord('A') + mt_rand(0, 5));
			
		}
		return $randstring;
	}
}

?>
