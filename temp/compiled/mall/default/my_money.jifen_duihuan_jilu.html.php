<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">
				<li class="normal"><a href="index.php?app=my_money&act=jifen">礼品兑换</a></li>
				<li class="active">兑换记录</li>
          </ul>
        <div class="wrap">
            <div class="public table">
		
			
                <table class="table_head_line">
                    <?php if ($this->_var['index']): ?>
                    <tr class="line_bold">
                        <th class="width1"></th>
                        <th class="align1" colspan="7">
                        </th>
                    </tr>

                    <tr class="line tr_color">
                        <th></th>
                        <th class="align1">物品名称</th>
                        <th>积分</th>
						<th>价值</th>
                        <th>数量</th>
                        <th align="center">操作时间</th>
                        <th align="center">状态</th>
                        <th class="width4">操作</th>
                    </tr>
                    <?php endif; ?>
                    <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['val']):
        $this->_foreach['v']['iteration']++;
?>
                    <?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?><tr class="line_bold"><?php else: ?><tr class="line"><?php endif; ?>
                        <td class="align2"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['val']['id']; ?>"/></td>
                        <td class="link1"><?php echo $this->_var['val']['wupin_name']; ?></td>
                        <td align="center"><?php echo $this->_var['val']['jifen']; ?></td>
                        <td align="center"><?php echo $this->_var['val']['jiazhi']; ?>&nbsp;元</td>
						<td align="center"><?php echo $this->_var['val']['shuliang']; ?></td>
                        <td align="center"><?php echo local_date("Y-m-d H:i",$this->_var['val']['add_time']); ?></td>
                     <td align="center">
					 <?php if ($this->_var['val']['shenhe'] == 0): ?>未审核<?php else: ?>已审核<?php endif; ?></td>
                        <td>
                       <a href="javascript:drop_confirm('您确定要删除它吗？', '#');" class="delete">删除</a>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="7" class="member_no_records padding6"><?php echo $this->_var['lang'][$_GET['act']]; ?>没有符合条件的记录</td>
                    </tr>

                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php if ($this->_var['index']): ?>
                    <tr>
                        <th class="width1"></th>
                        
                        <td colspan="5" class="page word_spacing5">
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
