<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>猫粮管理</p>
    <ul class="subnav">
		<li><span>猫粮管理</span></li>
		<li><a class="btn3" href="index.php?app=catfood&act=catfood_log">猫粮流水</a></li>
		
    </ul>
</div>

<div class="mrightTop">
  <div class="fontl">
    <form method="get">
       <div class="left">
          <input type="hidden" name="app" value="catfood" />
          <input type="hidden" name="act" value="index" />
          <select class="querySelect" name="field_name"><?php echo $this->html_options(array('options'=>$this->_var['query_fields'],'selected'=>$_GET['field_name'])); ?>
          </select>
          <input class="queryInput" type="text" name="field_value" value="<?php echo htmlspecialchars($_GET['field_value']); ?>" />
          <input type="submit" class="formbtn" value="查询" />
      </div>
      <?php if ($this->_var['filtered']): ?>
      <a class="left formbtn1" href="index.php?app=catfood">撤销检索</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <?php if ($this->_var['stores']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"></td>
      <td>店铺编号</td>
      <td>店主会员名</td>
      <td>店铺名称</td>
      <td>猫粮数</td>
    </tr>
    <?php endif; ?>
    <?php $_from = $this->_var['stores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
    <tr class="tatr2">
      <td class="firstCell"></td>
      <td><?php echo htmlspecialchars($this->_var['store']['store_id']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['store']['user_name']); ?></td>
      <td><?php echo $this->_var['store']['store_name']; ?></td>
      <td><font color="#FF0000"><?php echo $this->_var['store']['cat_food']; ?></font></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="5">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  <?php if ($this->_var['stores']): ?>
  <div id="dataFuncs">
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>