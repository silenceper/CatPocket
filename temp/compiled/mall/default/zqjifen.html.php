<?php echo $this->fetch('header.html'); ?>
<link href="<?php echo $this->res_base . "/" . 'css/app-score-v3.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/tjb-base.css'; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'search_goods.js'; ?>" charset="utf-8"></script> 
<script type="text/javascript">
var upimg   = '<?php echo $this->res_base . "/" . 'images/up.gif'; ?>';
var downimg = '<?php echo $this->res_base . "/" . 'images/down.gif'; ?>';
imgUping = new Image();
imgUping.src = upimg;
</script>
<style type="text/css">
.img_info{
	border:solid 1px rgb(238,238,238);
}
.img_info:hover
{
    border:solid 1px rgb(196,196,196);
}

.gzbz_content{
	width:778px;
	border:#dcdcdc solid 1px;
	border-top:none;
	padding-bottom:10px;
	background:none;
}
.gzbz_content h1{
	margin:0 13px 25px;
	padding:25px 0 13px 0;
	border-bottom:solid 1px #ccc;
	font-size:14px;
}
.gzbz_content ul li{
	margin:0 0 20px 0;
	font-size:12px;
}
.gzbz_content h2{
	margin:5px 0 5px 80px;
	padding:0;
	font-size:14px;
}
.gzbz_content p{
	margin:0 60px 0 80px;
	padding:0;
	font-size:12px;
	line-height:22px;
}
.gzbz_content table{
	margin:10px 0 20px 80px;
	background:#b0b0b0;
	font-size:12px;
	font-weight:normal;
	width:670px;
}
.gzbz_content table th{
	background:#ebebeb;
	text-align:center;
	padding:12px 0;
}
.gzbz_content table td{
	background:#fff;
	text-align:left;
	vertical-align:top;
	padding:8px;
	line-height:22px;
}


.jplc_content{
	width:778px;
	border:#dcdcdc solid 1px;
	border-top:none;
	padding-bottom:10px;
}
.jplc_content h1{
	margin:0 22px 20px;
	padding-top:25px;
	font-size:14px;
}
.jplc_content h2{
	background:url(http://img02.taobaocdn.com/tps/i2/T1dnucXeRkXXXXXXXX-706-3.gif) bottom left no-repeat;
	margin:30px 0px 15px 60px;;
	padding-bottom:10px;
	font-size:14px;
}
.jplc_content p{
	margin:0 60px 0;
	padding:0;
	font-size:12px;
	line-height:22px;
}
.jplc_content img{
	margin:5px 0 10px 60px;
}
.jplc_content ul li{
	margin:0 0 20px 0;
	font-size:12px;
}
.jplc_content h3{
	margin:5px 0 5px 60px;
	padding:0;
	font-size:14px;
}



.zqtjb_content{
	width:778px;
	/* border:#dcdcdc solid 1px; */
	border-top:none;
	padding-bottom:10px;
	clear:both;
}
.zqtjb_content a{
	color:#36c;
}
.zqtjb_content h1{
	margin:0 13px 20px;
	padding-top:25px;
	font-size:14px;
}
.zqtjb_content p{
	margin:0 0 0 80px;
	padding:0;
	font-size:12px;
	line-height:22px;
}
.zqtjb_content h2{
	background:url(http://img02.taobaocdn.com/tps/i2/T1dnucXeRkXXXXXXXX-706-3.gif) bottom left no-repeat;
	margin:30px 0px 10px 60px;;
	padding-bottom:10px;
	font-size:12px;
	font-weight:normal;
}
.zqtjb_content h3{
	margin:10px 0px 15px 60px;;
	padding:0px;
}
</style>
<?php echo $this->fetch('curlocal.html'); ?>
<div class="content">
  <div class="left" style="width:162px;">
    <div >
      <div class="col-sub">
        <div class="box">
          <div class="lmenu">
            <div class="user" style="width:140px;">
              <p style="line-height: 20px;"> 您可以通过商家赠送给您<br>
                的礼品卡，<em>领取积分</em><br>
              </p>
              <p class="user-button"> <a class="get-coin" target="_blank" href="index.php?app=my_money&act=jifenguanli">领取积分</a> </p>
              <p style="color:#ccc; text-align:center;">礼品卡的有效期为15天</p>
            </div>
            <div class="new-menu" >
              <div class="title">
                <h4 style="width:152px;">全部商品分类</h4>
              </div>
              <div class="content" style="width:160px;margin-top:0px;"> 
                
                <?php $_from = $this->_var['widget_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('keys', 'category');$this->_foreach['fe_gcate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_gcate']['total'] > 0):
    foreach ($_from AS $this->_var['keys'] => $this->_var['category']):
        $this->_foreach['fe_gcate']['iteration']++;
?> 
                <?php if ($this->_var['key'] < 10): ?>
                <dl>
                  <dt><a style="color:#000" href="<?php echo url('app=search&cate_id=' . $this->_var['category']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['category']['value']); ?></a></dt>
                  <dd style="float:left;">
                  <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['child']):
?> 
                  <?php if ($this->_var['key'] < 4): ?>
                   <span> <a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a> </span> 
                  <?php endif; ?> 
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </dd>
                </dl>
                <?php endif; ?> 
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div style="width:820px;float:right;">
    <div class="module_filter" style="width:820px;">
      <div style="width:810px;">
        <div class="zqtjb_content">
          <h1><img src="<?php echo $this->res_base . "/" . 'images/data/T1WqC0XnliXXXXXXXX-128-26.jpg'; ?>"></h1>
          <p style="margin-right:60px;">积分是猫口袋商城的虚拟货币，能够在猫口袋这个平台用现金充值积分或者通过礼品卡领取积分。积分可用于购买猫口袋商城上的各种商品；也可以兑换到更大优惠的商品，是淘实惠的最佳途径。在猫口袋，拥有积分也是资深猫友的最高象征和权力体现哦！ 目前使用积分兑换、抽奖、购买各类商品，都在猫口袋平台（http://www.maokoudai.com）进行。 </p>
        </div>
        <img src="<?php echo $this->res_base . "/" . 'images/data/T1Mui0Xh4aXXXXXXXX-810-377.jpg'; ?>">
        <div class="zqtjb_content">
          <h1><img src="<?php echo $this->res_base . "/" . 'images/data/T1Il5ZXntrXXXXXXXX-143-26.jpg'; ?>"></h1>
          <h3><img src="<?php echo $this->res_base . "/" . 'images/data/T1SY50XolfXXXXXXXX-709-34.gif'; ?>"></h3>
          <p>在猫口袋商城购物，均可获得积分，积分返点按比例为最低商品售价的0.5%，商家可以设置"多倍返积分商品"；</p>
          <p> </p>
          <p>猫口袋网站显示该交易状态为"交易成功"，买家才能得到此次交易的相应返点积分。</p>
          <p style="width:350px; height:300px; float:left; display:inline;"><img src="<?php echo $this->res_base . "/" . 'images/data/T1nKi0XktaXXXXXXXX-374-161.jpg'; ?>" style="margin: 5px 0pt 10px;"><br>
            注:积分的数值精确到个位（小数点后全部舍弃，不进行四舍五入），
            例如：原价109元的商品，返54（109*0.5=54.5）个积分；</p>
          <p style="width:300px; height:300px; float:left; display:inline; margin-left:40px;">&nbsp;</p>
          <h3><img src="<?php echo $this->res_base . "/" . 'images/data/T1h1i0XlBaXXXXXXXX-706-33.gif'; ?>"></h3>
          <p style="height:170px;"><img src="<?php echo $this->res_base . "/" . 'images/data/T1oDKZXn8oXXXXXXXX-166-156.jpg'; ?>" style="margin-right: 100px;" align="right">您在淘宝、拍拍以及阿里巴巴等B2C/C2C网上商城购物后，均可以向商家索取猫口袋礼品卡，然后在<a href="http://www.maokoudai.com" target="_blank">猫口袋首页</a>，使用礼品卡领取积分<br>
            <br>
            注:请尽快使用礼品卡兑付积分，礼品卡15天过期!&nbsp;&nbsp;&nbsp;&nbsp;积分兑入后长期有效。
        </div>
        <div class="zqtjb_content">
          <h1><img src="<?php echo $this->res_base . "/" . 'images/data/T1BSKZXiBqXXXXXXXX-177-28.jpg'; ?>"></h1>
          <h3><img src="<?php echo $this->res_base . "/" . 'images/data/T1akKZXa4vXXXXXXXX-706-33.gif'; ?>"></h3>
          <p><img src="<?php echo $this->res_base . "/" . 'images/data/T1gWSoXepqXXXXXXXX-205-457.jpg'; ?>"></p>
          <br>
          <br>
          <h3><img src="<?php echo $this->res_base . "/" . 'images/data/T1apS0XlRkXXXXXXXX-706-33.gif'; ?>"></h3>
          <p><img src="<?php echo $this->res_base . "/" . 'images/data/T1caSoXe4qXXXXXXXX-223-398.jpg'; ?>"></p>
          <br>
          <br>
          <h3><img src="<?php echo $this->res_base . "/" . 'images/data/T1qKi0XolaXXXXXXXX-706-33.gif'; ?>"></h3>
          <p><img src="<?php echo $this->res_base . "/" . 'images/data/T1eq5oXh8oXXXXXXXX-279-215.jpg'; ?>"></p>
          <br>
          <br>
          <h3><img src="<?php echo $this->res_base . "/" . 'images/data/T1Ln1ZXh4oXXXXXXXX-706-33.gif'; ?>"></h3>
          <p><img src="<?php echo $this->res_base . "/" . 'images/data/T1OG1oXl8oXXXXXXXX-351-143.jpg'; ?>"></p></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $this->fetch('footer.html'); ?> 