<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>猫粮流水</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?app=catfood">猫粮管理</a></li>
		<li><span>猫粮流水</span></li>
		
    </ul>
</div>

<div class="mrightTop">
  <div class="fontl">
    <form method="get">
       <div class="left">
          <input type="hidden" name="app" value="catfood" />
          <input type="hidden" name="act" value="catfood_log" />
          <select class="querySelect" name="field_name"><?php echo $this->html_options(array('options'=>$this->_var['query_fields'],'selected'=>$_GET['field_name'])); ?>
          </select>
          <input class="queryInput" type="text" name="field_value" value="<?php echo htmlspecialchars($_GET['field_value']); ?>" />
          <input type="submit" class="formbtn" value="查询" />
      </div>
      <?php if ($this->_var['filtered']): ?>
      <a class="left formbtn1" href="index.php?app=catfood&act=catfood_log">撤销检索</a>
      <?php endif; ?>
    </form>
  </div>
    <div class="fontr">

    </div>
</div>

<div class="tdare">
    <table width="100%" cellspacing="0">

        <tr class="tatr1">
        	<td width="40">&nbsp;</td>
            <td align="left">会员编号</td>
            <td>会员名</td>
            <td>操作猫粮</td>
            <td>操作对象</td>
            <td align="center">操作时间</td>
            <td align="center">操作类型</td
        ></tr>
        <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
        <tr class="tatr2">
            <td>&nbsp;</td>
            <td align="left"><?php echo $this->_var['val']['user_id']; ?></td>
            <td><?php echo htmlspecialchars($this->_var['val']['user_name']); ?></td>
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
        <tr class="no_data">
            <td colspan="7">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['index']): ?>
<div id="dataFuncs">
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>