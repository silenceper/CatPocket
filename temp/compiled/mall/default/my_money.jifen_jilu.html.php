<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">
				<li class="normal" ><a href="index.php?app=my_money&act=jifenguanli">积分管理</a></li>
				<li class="active"><a href="index.php?app=my_money&act=jifen_jilu">积分记录</a></li>
          </ul>
        <div class="wrap">
            <div class="public table">
                <table class="table_head_line">
                    <?php if ($this->_var['my_integralloginfo']): ?>
                    <tr class="line_bold">
                        <th class="width1"></th>
                        <th class="align1" colspan="7">
                        </th>
                    </tr>

                    <tr class="line tr_color">
                        <th style="width:50px;">操作人</th>
						<th>操作积分</th>
                        <th>操作对象</th>
                        <th align="center">操作时间</th>
                        <th align="center">操作日志</th>
                        <th align="center">操作类型</th>
                    </tr>
                    <?php endif; ?>
                    
                    <?php $_from = $this->_var['my_integralloginfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['val']):
        $this->_foreach['v']['iteration']++;
?>
                    <?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?><tr class="line_bold"><?php else: ?><tr class="line"><?php endif; ?>
                        <td ><?php echo $this->_var['val']['user_name']; ?></td>
                        <td align="center"><?php echo $this->_var['val']['jifen']; ?></td>
                        <td align="center"><?php echo $this->_var['val']['recieve_name']; ?></td>
						<td align="center"><?php echo local_date("Y-m-d H:i",$this->_var['val']['add_time']); ?></td>
                        <td align="center"><?php echo $this->_var['val']['log_text']; ?></td>
                     <td align="center">
                       <?php if ($this->_var['val']['state'] == '1'): ?>
            买入商品使用积分
            <?php elseif ($this->_var['val']['state'] == '2'): ?>
            买入商品获得积分
            <?php elseif ($this->_var['val']['state'] == '3'): ?>
            卖出商品获得积分
            <?php elseif ($this->_var['val']['state'] == '4'): ?>
            卖出商品消耗积分
            <?php elseif ($this->_var['val']['state'] == '5'): ?>
            管理员增加积分
            <?php elseif ($this->_var['val']['state'] == '6'): ?>
            管理员减少积分
            <?php elseif ($this->_var['val']['state'] == '7'): ?>
            管理员变更额度
            <?php elseif ($this->_var['val']['state'] == '8'): ?>
            卖家生成礼品卡消耗
            <?php elseif ($this->_var['val']['state'] == '9'): ?>
            卖家礼品卡过期返还积分
            <?php elseif ($this->_var['val']['state'] == '10'): ?>
            买家使用礼品卡获得积分
            <?php elseif ($this->_var['val']['state'] == '11'): ?>
            购买积分
            <?php elseif ($this->_var['val']['state'] == '12'): ?>
            积分兑换物品
            <?php elseif ($this->_var['val']['state'] == '13'): ?>
            积分转账扣积分
            <?php elseif ($this->_var['val']['state'] == '14'): ?>
            积分转账失败返回积分
            <?php else: ?>
            其它途径
            <?php endif; ?></td>

                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="7" class="member_no_records padding6">没有符合条件的记录</td>
                    </tr>

                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php if ($this->_var['my_integralloginfo']): ?>
                    <tr>
                        <th class="width1"></th>
                        
                        <td colspan="5" >
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
