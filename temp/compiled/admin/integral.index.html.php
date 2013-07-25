<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>积分列表</p>
    <ul class="subnav">
		<li><span>积分列表</span></li>
		<li><a class="btn3" href="index.php?app=integral&act=user_jifen_log">积分流水</a></li>
		
    </ul>
</div>

<div class="mrightTop">
  <div class="fontl">
    <form method="get" style="float:left;">
       <div class="left">
          <input type="hidden" name="app" value="integral" />
          <input type="hidden" name="act" value="index" />
          <select class="querySelect" name="field_name"><?php echo $this->html_options(array('options'=>$this->_var['query_fields'],'selected'=>$_GET['field_name'])); ?>
          </select>
          <input class="queryInput" type="text" name="field_value" value="<?php echo htmlspecialchars($_GET['field_value']); ?>" />
          <input type="submit" class="formbtn" value="查询" />
      </div>
      <?php if ($this->_var['filtered']): ?>
      <a class="left formbtn1" href="index.php?app=integral">撤销检索</a>
      <?php endif; ?>
    </form>
    <div style="float:left; margin-left:50px;">积分总数：<span style="color:red; font-weight:400;"><?php echo $this->_var['sum_jifen']; ?></span></div>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <?php if ($this->_var['users']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"></td>
      <td>会员名</td>
      <td>用户积分</td>
      <td>店铺名</td>
      <td>卖家额度</td>
      <td class="handler">操作</td>
    </tr>
    <?php endif; ?>
    <?php $_from = $this->_var['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'user');if (count($_from)):
    foreach ($_from AS $this->_var['user']):
?>
    <tr class="tatr2">
      <td class="firstCell"></td>
      <td><?php echo htmlspecialchars($this->_var['user']['user_name']); ?></td>
      <td><font color="#FF0000"><?php echo $this->_var['user']['jifen']; ?></font></td>
      <td><?php echo $this->_var['user']['store_name']; ?></td>
      <td><font color="#FF0000"><?php echo $this->_var['user']['seller_edu']; ?></font></td>
      <td class="handler">
      <a href="index.php?app=integral&amp;act=recharge&amp;id=<?php echo $this->_var['user']['user_id']; ?>">管理积分</a>
      </td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="5">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  <?php if ($this->_var['users']): ?>
  <div id="dataFuncs">
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>