<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">
                <li class="normal"><a href="index.php?app=my_money&act=paylist">在线充值</a></li>
				<li class="active">充值记录</li>
          </ul>
        <div class="wrap">
            <div class="public table">
			
                <div class="user_search">
                <form method="get">
                  <input name="app" type="hidden" value="my_money" />
				  <input name="act" type="hidden" value="paylog" />
                  <select name="select">
                    <option value="1">定&nbsp;&nbsp;单</option>
                    <option value="2">金&nbsp;&nbsp;额</option>
                    <option value="3">日&nbsp;&nbsp;志</option>
                  </select>

                    <input name="so" type="text" class="text1 width8" id="so" value="">
                    <!--<span>订单状态</span>
                    <select name="type">
                    <option value="all">所有订单</option>
					<option value="pending">待付款的</option>
					<option value="submitted">已提交的</option>
					<option value="accepted">待发货的</option>
					<option value="shipped">已发货的</option>
					<option value="finished">已完成的</option>
					<option value="canceled">已取消的</option>
					</select>-->

                    <input type="submit" class="btn" value="搜索" />
                </form>
                </div>		
			
                <table>
                    <?php if ($this->_var['my_money']): ?>
                    <tr class="line_bold">
                        <th width="40px"></th>
                        <th class="align1">操作日志</th>
                        <th>来源支付商</th>
                        <th>订单号</th>
                        <th>金额</th>
                        <th align="center">操作时间</th>
                        <th align="center">状态</th>
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
						<td align="center"><?php echo $this->_var['val']['buyer_name']; ?></td>
                        <td align="center"><?php echo $this->_var['val']['order_sn']; ?></td>
						<td align="center"><?php echo $this->_var['val']['money_zs']; ?><?php echo $this->_var['val']['yuan']; ?></td>
                        <td align="center"><?php echo local_date("Y-m-d H:i",$this->_var['val']['add_time']); ?></td>
                     <td align="center">
					 <?php if ($this->_var['val']['caozuo'] == 0): ?>交易进行中！<?php endif; ?>
					 <?php if ($this->_var['val']['caozuo'] == 4): ?>充值成功<?php endif; ?>
					 <?php if ($this->_var['val']['caozuo'] == 10): ?>已支付-等待卖家发货<?php endif; ?>
					 <?php if ($this->_var['val']['caozuo'] == 20): ?>已发货-等待买家确认<?php endif; ?>
					 <?php if ($this->_var['val']['caozuo'] == 30): ?>定单已撤消！<?php endif; ?>
					 <?php if ($this->_var['val']['caozuo'] == 40): ?>交易已完成！<?php endif; ?>
					 <?php if ($this->_var['val']['caozuo'] == 50): ?>资金已入帐！<?php endif; ?>
					 <?php if ($this->_var['val']['caozuo'] == 60): ?>待审核！<?php endif; ?>
					 <?php if ($this->_var['val']['caozuo'] == 61): ?>提现成功-现金已汇出<?php endif; ?>
					 </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="7" class="member_no_records padding6"><?php echo $this->_var['lang'][$_GET['act']]; ?>没有符合条件的记录</td>
                    </tr>

                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php if ($this->_var['my_money']): ?>
                    <tr>
                        <td colspan="7">
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
