<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">

        <?php echo $this->fetch('member.submenu.html'); ?>
        
        <div class="wrap margin1">
            <div class="public table">
				<div class="information_index" style="overflow:hidden; margin: 0px 0 -15px;">
                    <span>累计已收入：<span style="color:#FF6600;font-size:14px;font-weight:bold;"><?php echo price_format($this->_var['count_all']); ?></span></span>
                    <span style="padding-left:100px;">本月预期收入：<span style="color:#FF6600;font-size:14px;font-weight:bold;"><?php echo price_format($this->_var['pre_count']); ?></span></span>	<span style="padding-left:100px;">本月已收入：<span style="color:#FF6600;font-size:14px;font-weight:bold;"><?php echo price_format($this->_var['current_count']); ?></span></span>
                </div>
             </div>
        </div>

        <div class="wrap">
            <div class="public table">
                <table>
                    <?php if ($this->_var['my_moneylog_list']): ?>
  
                    <tr class="line_bold">
                        <th>用户ID</th>
                        <th class="width3">收益金额</th>
                        <th>操作时间</th>
                    </tr>
                    <?php endif; ?>
                    <?php $_from = $this->_var['my_moneylog_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'my_moneylog');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['my_moneylog']):
        $this->_foreach['v']['iteration']++;
?>
                    <?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?><tr class="line_bold tr_align"><?php else: ?><tr class="line tr_align"><?php endif; ?>
                        <td><?php echo htmlspecialchars($this->_var['my_moneylog']['buyer_name']); ?></td>
                        <td><?php echo htmlspecialchars($this->_var['my_moneylog']['money']); ?></td>
                        <td><?php echo local_date("Y-m-d H:i:s",$this->_var['my_moneylog']['add_time']); ?></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="3" class="member_no_records padding6">没有相关的记录</td>
                    </tr>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </table>
            </div>
            <div class="wrap_bottom"></div>
        </div>

        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>

    <div class="clear"></div>




</div>
<iframe id='iframe_post' name="iframe_post" frameborder="0" width="0" height="0">
</iframe>
<?php echo $this->fetch('footer.html'); ?>
