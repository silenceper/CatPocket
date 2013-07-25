<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div class="mrightTop">
<div class="fontl">欢迎使用商付通</div>
</div>

<div id="rightTop">
    <p>用户资金管理</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=user_money_list">资金列表</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=user_money_add">调整用户资金</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=user_money_log">资金流水</a></li>
    </ul>
</div>

<div id="rightTop">
    <p>提现审核管理</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=tx_index_shenhe">查看全部</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=tx_wei_shenhe">未审核</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=tx_yi_shenhe">已审核</a></li>
    </ul>
</div>


<div id="rightTop">
    <p>动态密保管理</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=mibao_zhengchang">正常使用</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=mibao_zanting">已暂停</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=mibao_guoqi">已过期</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=mibao_xinka">新卡列表</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=mibao_sn_pi">新卡生成</a></li>
    </ul>
</div>

<div id="rightTop">
    <p>充值卡密管理</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=card_yichongzhi">已充值</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=card_guoqi">已过期</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=card_weichongzhi">未充值</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=card_add_pi">新卡生成</a></li>
    </ul>
</div>

<div id="rightTop">
    <p>积分礼品兑换</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=jifen_chaxun">查询积分榜</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=jifen_shezhi">设置兑换礼品</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=jifen_yiduihuan">查询已兑换</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=setup">商付通设置</a></li>
    </ul>
</div>
<?php echo $this->fetch('footer.html'); ?>