<?php echo $this->fetch('header.html'); ?>




	<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/indexjs/kissy-min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/indexjs/switchable-pkg-min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/indexjs/datalazyload-pkg-min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/indexjs/module.js'; ?>"></script>
	
    <script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/indexjs/app-backtop.js'; ?>"></script>

	<link href="<?php echo $this->res_base . "/" . 'css/app-score-v3.css'; ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo $this->res_base . "/" . 'css/tjb-base.css'; ?>" rel="stylesheet" type="text/css" />



    
    
<script>
KISSY.ready(function(S) {
    var dl = S.DataLazyload();
    dl.addCallback('#test-callback', function() {
        //alert('#test-callback will come!');
    });
});
</script>

<script type="text/javascript">
     KISSY.ready(function () {
            //首页轮播和旋转木马效果
            KISSY.use('switchable', function (S) {
                S.Switchable.autoRender();
            });
        });

</script>



<div class="keyword">
    <div class="keyword1"></div>
    <div class="keyword2"></div>
    <div style="width:400px; float:left;">
    热门搜索:
    <?php $_from = $this->_var['hot_keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'keyword');if (count($_from)):
    foreach ($_from AS $this->_var['keyword']):
?>
    <a href="<?php echo url('app=search&keyword=' . $this->_var['keyword']. ''); ?>"><?php echo $this->_var['keyword']; ?></a>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>
    <div style="float:right; margin-right:20px; width:490px; text-align:right;">
    <span style="padding-right:10px;">商品数：<b style="color:rgb(255,0,0);font-weight:bold;font-size:15px;"><?php echo $this->_var['count_goods']; ?></b></span>
    本站进驻商家：
    <?php $_from = $this->_var['taobao_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'taobao');if (count($_from)):
    foreach ($_from AS $this->_var['taobao']):
?>
    <?php if ($this->_var['taobao']['taobao_rank'] == 2): ?>
    <img src="<?php echo $this->res_base . "/" . 'images/s_blue_1.gif'; ?>" title="淘宝钻石级" style="padding:0 4px 0 4px;" /><?php echo $this->_var['taobao']['taobao_val']; ?>
    <?php elseif ($this->_var['taobao']['taobao_rank'] == 3): ?>
    <img src="<?php echo $this->res_base . "/" . 'images/s_cap_1.gif'; ?>" title="淘宝黄冠级"  style="padding:0 4px 0 4px;"/><?php echo $this->_var['taobao']['taobao_val']; ?>
    <?php elseif ($this->_var['taobao']['taobao_rank'] == 4): ?>
    <img src="<?php echo $this->res_base . "/" . 'images/s_crown_1.gif'; ?>" title="淘宝金冠级" style="padding:0 4px 0 4px;" /><?php echo $this->_var['taobao']['taobao_val']; ?>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    <?php $_from = $this->_var['paipai_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'paipai');if (count($_from)):
    foreach ($_from AS $this->_var['paipai']):
?>
    <?php if ($this->_var['paipai']['paipai_rank'] == 2): ?>
    <img src="<?php echo $this->res_base . "/" . 'images/credit_s21.gif'; ?>" title="拍拍钻石级" style="padding:0 4px 0 4px;" /><?php echo $this->_var['paipai']['paipai_val']; ?>
    <?php elseif ($this->_var['paipai']['paipai_rank'] == 3): ?>
    <img src="<?php echo $this->res_base . "/" . 'images/credit_s31.gif'; ?>" title="拍拍银冠级" style="padding:0 4px 0 4px;" /><?php echo $this->_var['paipai']['paipai_val']; ?>
    <?php elseif ($this->_var['paipai']['paipai_rank'] == 4): ?>
    <img src="<?php echo $this->res_base . "/" . 'images/credit_s41.gif'; ?>" title="拍拍皇冠级" style="padding:0 4px 0 4px;" /><?php echo $this->_var['paipai']['paipai_val']; ?>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div> 
</div>


<div class="content">

    <div class="leftmenu" area="top_left" widget_type="area">
        <?php $this->display_widgets(array('page'=>'index','area'=>'top_left')); ?>
    </div>

    <div class="rightmenu">
        <div class="main_info">
            <div id="module_middle_info" area="cycle_image" widget_type="area">
                <?php $this->display_widgets(array('page'=>'index','area'=>'cycle_image')); ?>
            </div>

            <div class="sidebar" area="sales" widget_type="area">
                <?php $this->display_widgets(array('page'=>'index','area'=>'sales')); ?>
            </div>
        </div>

        <div area="top_right" widget_type="area" class="top_right">
            <?php $this->display_widgets(array('page'=>'index','area'=>'top_right')); ?>
        </div>

    </div>
</div>
<div class="clear"></div>
<div class="ad_banner" area="banner" widget_type="area">
    <?php $this->display_widgets(array('page'=>'index','area'=>'banner')); ?>
</div>

<div class="content">
    <div class="left" area="bottom_left" widget_type="area">
        <?php $this->display_widgets(array('page'=>'index','area'=>'bottom_left')); ?>
    </div>

    <div class="right" widget_type="area" area="bottom_right">
        <?php $this->display_widgets(array('page'=>'index','area'=>'bottom_right')); ?>
    </div>
</div>

<div class="clear"></div>
<div class="content" area="bottom_down" widget_type="area">
    <?php $this->display_widgets(array('page'=>'index','area'=>'bottom_down')); ?>
</div>

    <script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/indexjs/app-picswitch.js'; ?>"></script>
 		
<div class="qzhelper-desc clearfix" style="margin:0 auto; width:1000px;">
    <dl class="shopping-share">
      <dt><span>购物、分享赚金币</span></dt>
       
            <dd><a target="_blank" href="index.php?app=search&act=show_jifenzq">什么是猫积分</a></dd>
            <dd><a target="_blank" href="index.php?app=search&act=show_jifenzq">如何赚取猫积分</a></dd>
            
    </dl>
    <dl class="shopping-exchange">
      <dt><span>竞拍、兑换享折扣</span></dt>
       
            <dd><a target="_blank" href="/index.php?app=article&act=view&article_id=19">如何用猫积分换礼品</a></dd>
            <dd><a target="_blank" href="index.php?app=article&act=view&article_id=20">用户违规处罚</a></dd>
            
    </dl>
    <dl class="sure-share">
      <dt><span>确认收货写分享</span></dt>
       
             <dd><a target="_blank" href="index.php?app=article&act=view&article_id=21">售后服务相关</a></dd>
            <dd><a target="_blank" href="http://weibo.com/maokoudai">猫积分官方微博</a></dd>
            
    </dl>
    <div class="merchant-applybg">
      <div class="merchant-apply">
        <h2>商家报名</h2>
         
                 <p><a target="_blank" href="index.php?app=search&act=storebm">报名详情</a></p>
        <p class="apply"><a target="_blank" href="index.php?app=apply" title="我要报名">我要报名</a></p>
              
      </div>
    </div>
  </div>
  <div style="margin:0 auto; text-align:center;">
    <img src="<?php echo $this->res_base . "/" . 'images/1.gif'; ?>" style="margin:5px 10px 0 0;" /><img src="<?php echo $this->res_base . "/" . 'images/2.png'; ?>" style="margin:5px 10px 0 0;" /><img src="<?php echo $this->res_base . "/" . 'images/3.gif'; ?>" style="margin:5px 10px 0 0;" /><img src="<?php echo $this->res_base . "/" . 'images/4.gif'; ?>" style="margin:5px 10px 0 0;" /><img src="<?php echo $this->res_base . "/" . 'images/5.gif'; ?>" /><br/><br/>
  </div>

<?php echo $this->fetch('footer.html'); ?>