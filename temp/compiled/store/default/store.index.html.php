<?php echo $this->fetch('header.html'); ?>

<?php echo $this->fetch('top.html'); ?>
<style type="text/css">
.h4_css{
	padding-left:10px; padding-bottom:5px;color:red;margin-top:10px;height:40px;line-height:18px;padding-bottom:10px;width:170px;
	}
.h4_css a
{
   color:#666666;font-size:13px; text-decoration:none; font-weight:normal;font-size:12px;
}
.h4_css a:hover
{
    color:#F33;
	text-decoration:underline;
}
.bl{_display:inline;display:inline-block;width:30px;height:15px;vertical-align:middle;background:url("<?php echo $this->res_base . "/" . 'images/T11BOuXjJtXXXXXXXX-30-12.png'; ?>") no-repeat left top;font:10px 'arial';color:#fff;line-height:10px;margin-top:2px;padding-left:10px;}
</style>
<div id="content">
    <div id="left">
        <?php echo $this->fetch('left.html'); ?>
    </div>

    <div id="right">
        <div class="die6"><?php echo html_filter($this->_var['store']['description']); ?></div>

        <?php if ($this->_var['recommended_goods']): ?>
        <div class="module_special">
            <h2 class="common_title veins2">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">推荐商品</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <div class="major">
                        <ul class="list">
                            <?php $_from = $this->_var['recommended_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rgoods');if (count($_from)):
    foreach ($_from AS $this->_var['rgoods']):
?>
                            <li style="height:280px;padding:20px 0 25px 0;border-bottom:solid 1px rgb(229,229,229);">
                                <div class="pic"><a href="<?php echo url('app=goods&id=' . $this->_var['rgoods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['rgoods']['default_image']; ?>" width="150" height="150" /></a></div>
                                <h4 class="h4_css"><a href="<?php echo url('app=goods&id=' . $this->_var['rgoods']['goods_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['rgoods']['goods_name']); ?></a></h4>
                           
                            <span class="fontColor3" ectype="goods_price" <?php if ($this->_var['rgoods']['bargin_price']): ?> style="text-decoration:line-through;color:rgb(102, 102, 102);font-size:14px;float:left;padding-left:10px" <?php endif; ?>><?php echo $this->_var['rgoods']['price']; ?></span>
                             
                             <span style="padding-left:30px;padding-right:10px;color:rgb(206, 206, 206);float:right;">已成交<?php echo ($this->_var['rgoods']['sales'] == '') ? '0' : $this->_var['rgoods']['sales']; ?>件</span><br />
                             
<?php if ($this->_var['rgoods']['bargin_price']): ?>
<div style="float:left;width:100%">
<span style="width:140px;float:left">
<span style="color:red;padding-left:10px;"><?php echo price_format($this->_var['rgoods']['bargin_price']); ?></span>
<?php if ($this->_var['rgoods']['integral_state'] == 1): ?>+<span ><?php echo $this->_var['rgoods']['max_exchange']; ?></span>&nbsp;积分<?php endif; ?></span>

            <b class="bl" title="送积分" style="cursor:pointer;"><?php echo $this->_var['rgoods']['has_integral']; ?></b></div>
            <?php endif; ?>
                                
                            </li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($this->_var['new_groupbuy']): ?>
        <div class="module_special">
            <h2 class="common_title veins2">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">最新团购</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                <div class="group_major">
                    <ul class="list">
                        <?php $_from = $this->_var['new_groupbuy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'groupbuy');if (count($_from)):
    foreach ($_from AS $this->_var['groupbuy']):
?>
                        <li style="height:280px;padding:20px 0 25px 0;border-bottom:solid 1px rgb(229,229,229);">
                            <div class="pic"><a href="<?php echo url('app=groupbuy&id=' . $this->_var['groupbuy']['group_id']. ''); ?>"><img src="<?php echo $this->_var['groupbuy']['default_image']; ?>" /></a></div>
                            <h3><a href="<?php echo url('app=groupbuy&id=' . $this->_var['groupbuy']['group_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['groupbuy']['group_name']); ?></a></h3>
                            <p><span>团购价:&nbsp;</span><?php echo price_format($this->_var['groupbuy']['price']); ?></p>
                            <div class="time">剩余:&nbsp;<?php echo $this->_var['groupbuy']['lefttime']; ?></div>
                        </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="module_special">
            <h2 class="common_title veins2">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">新品</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <?php if ($this->_var['new_goods']): ?>
                    <div class="major">
                        <ul class="list">
                            <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ngoods');if (count($_from)):
    foreach ($_from AS $this->_var['ngoods']):
?>
                            <li style="height:280px;padding:20px 0 25px 0;border-bottom:solid 1px rgb(229,229,229);">
                                <div class="pic"><a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['ngoods']['default_image']; ?>" width="150" height="150" /></a></div>
                                <h4 class="h4_css"><a href="<?php echo url('app=goods&id=' . $this->_var['ngoods']['goods_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['ngoods']['goods_name']); ?></a></h4>
                           
                            <span class="fontColor3" ectype="goods_price" <?php if ($this->_var['ngoods']['bargin_price']): ?> style="text-decoration:line-through;color:rgb(102, 102, 102);font-size:14px;float:left;padding-left:10px" <?php endif; ?>><?php echo $this->_var['ngoods']['price']; ?></span>
                             
                             <span style="padding-left:30px;padding-right:10px;color:rgb(206, 206, 206);float:right;">已成交<?php echo ($this->_var['ngoods']['sales'] == '') ? '0' : $this->_var['ngoods']['sales']; ?>件</span><br />
                             
<?php if ($this->_var['ngoods']['bargin_price']): ?>
<div style="float:left;width:100%">
<span style="width:140px;float:left">
<span style="color:red;padding-left:10px;"><?php echo price_format($this->_var['ngoods']['bargin_price']); ?></span>
<?php if ($this->_var['ngoods']['integral_state'] == 1): ?>+<span ><?php echo $this->_var['ngoods']['max_exchange']; ?></span>&nbsp;积分<?php endif; ?></span>

            <b class="bl" title="送积分" style="cursor:pointer;"><?php echo $this->_var['ngoods']['has_integral']; ?></b></div>
            <?php endif; ?>
                                
                            </li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                    <?php else: ?>
                    <div class="nothing"><p>很抱歉! 没有找到相关商品</p></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="clear"></div>
</div>

<?php echo $this->fetch('footer.html'); ?>
