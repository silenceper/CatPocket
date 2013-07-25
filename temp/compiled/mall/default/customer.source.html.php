<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">

        <?php echo $this->fetch('member.submenu.html'); ?>
        
        <div class="wrap margin1">
            <div class="public table">
				<div class="information_index" style="overflow:hidden; margin: 0px 0 -15px;">
                    <span>共享客户资源总数：<span style="color:#FF6600;font-size:14px;font-weight:bold;"><?php echo $this->_var['count_all']; ?></span></span>
                    <span style="padding-left:100px;">活跃客户数：<span style="color:#FF6600;font-size:14px;font-weight:bold;"><?php echo $this->_var['active_all']; ?></span></span>	
                </div>
             </div>
        </div>

        <div class="wrap">
            <div class="public table">
                <table>
                    <?php if ($this->_var['customer_list']): ?>
                    <tr class="line_bold">
                        <th>用户ID</th>
                        <th class="width3">注册时间</th>
                        <th>本店交易数</th>
                        <th class="width5">总共交易数</th>
                    </tr>
                    <?php endif; ?>
                    <?php $_from = $this->_var['customer_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'customer');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['customer']):
        $this->_foreach['v']['iteration']++;
?>
                    <?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?><tr class="line_bold tr_align"><?php else: ?><tr class="line tr_align"><?php endif; ?>
                        <td><?php echo htmlspecialchars($this->_var['customer']['user_name']); ?></td>
                        <td><?php echo local_date("Y-m-d H:i:s",$this->_var['customer']['reg_time']); ?></td>
                        <td><?php echo htmlspecialchars($this->_var['customer']['purchase_number']); ?></td>
                        <td><?php echo $this->_var['customer']['count']; ?></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="4" class="member_no_records padding6">没有相关的记录</td>
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
