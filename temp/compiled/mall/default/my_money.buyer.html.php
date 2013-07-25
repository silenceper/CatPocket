<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">
                <li class="normal"><a href="index.php?app=my_money&act=loglist">我的帐户</a></li>
                <li class="active">买入记录</li>
				<li class="normal"><a href="index.php?app=my_money&act=seller">卖出记录</a></li>
				<li class="normal"><a href="index.php?app=my_money&act=intolog">转帐记录</a></li>
				<li class="normal"><a href="index.php?app=my_money&act=otherlog">其它记录</a></li>
          </ul>
        <div class="wrap">
            <div class="public table">
                <table>
                    <?php if ($this->_var['my_money']): ?>
                    <tr class="line_bold">
                        <th width="40px"></th>
                        <th class="align1">操作日志</th>
                        <th style="width:80px;">卖家</th>
                        <th>订单号</th>
                        <th>金额</th>
                        <th align="center">操作时间</th>
                    </tr>
                    <?php endif; ?>
                    <?php $_from = $this->_var['my_money']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['val']):
        $this->_foreach['v']['iteration']++;
?>
                    <?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?><tr class="line_bold"><?php else: ?><tr class="line"><?php endif; ?>
                        <td class="align2"></td>
                        <td class="link1"><?php echo $this->_var['val']['log_text']; ?></td>
						<td align="center"><?php echo $this->_var['val']['seller_name']; ?></td>
                        <td align="center"><a href="index.php?app=buyer_order&act=view&order_id=<?php echo $this->_var['val']['order_id']; ?>" target="_blank"><?php echo $this->_var['val']['order_sn']; ?></a></td>
						<td align="center"><?php echo $this->_var['val']['money_zs']; ?><?php echo $this->_var['val']['yuan']; ?></td>
                        <td align="center"><?php echo local_date("Y-m-d H:i",$this->_var['val']['add_time']); ?></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="6" class="member_no_records padding6"><?php echo $this->_var['lang'][$_GET['act']]; ?>没有符合条件的记录</td>
                    </tr>

                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php if ($this->_var['my_money']): ?>
                    <tr>
                        <td colspan="6" >
                           <p class="position2">
                                <?php echo $this->fetch('member.page.bottom.html'); ?>
                            </p>
                         </td>
                    </tr>
                    <?php endif; ?>
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
<div class="clear"></div>
<iframe id='iframe_post' name="iframe_post" frameborder="0" width="0" height="0">
</iframe>
<?php echo $this->fetch('footer.html'); ?>
