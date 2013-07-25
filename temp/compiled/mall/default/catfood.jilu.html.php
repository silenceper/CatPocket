<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">

                <li class="normal" ><a href="index.php?app=cat_food">猫粮管理</a></li>
				<li class="active"><a href="index.php?app=cat_food&act=catfood_jilu">猫粮记录</a></li>
          </ul>
        <div class="wrap">
            <div class="public table">
                <table>
                    <?php if ($this->_var['my_integralloginfo']): ?>
                    <tr class="line_bold">
                    	<th style="width:40px;">&nbsp;</th>
                        <th style="width:50px;">操作人</th>
						<th>操作猫粮</th>
                        <th>操作对象</th>
                        <th align="center">操作时间</th>
                        <th align="center">操作类型</th>
                    </tr>
                    <?php endif; ?>
                    
                    <?php $_from = $this->_var['my_integralloginfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['val']):
        $this->_foreach['v']['iteration']++;
?>
                    <?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?><tr class="line_bold"><?php else: ?><tr class="line"><?php endif; ?>
                    	<td style="width:40px;">&nbsp;</td>
                        <td ><?php echo $this->_var['val']['user_name']; ?></td>
                        <td align="center"><?php echo $this->_var['val']['cat_food']; ?></td>
                        <td align="center"><?php echo $this->_var['val']['recieve_name']; ?></td>
						<td align="center"><?php echo local_date("Y-m-d H:i",$this->_var['val']['add_time']); ?></td>
                        <td align="center">
                            <?php if ($this->_var['val']['state'] == '1'): ?>
                            用户首次购买消耗猫粮
                            <?php elseif ($this->_var['val']['state'] == '2'): ?>
                            邀请新会员赠送猫粮
                            <?php elseif ($this->_var['val']['state'] == '3'): ?>
                            购买猫粮
                            <?php else: ?>
                            其它途径
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="6" class="member_no_records padding6">没有符合条件的记录</td>
                    </tr>

                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php if ($this->_var['my_integralloginfo']): ?>
                    <tr>
                        <th class="width1"></th>
                        <td colspan="6">
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
