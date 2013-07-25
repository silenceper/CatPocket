<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>礼品卡管理</p>
</div>

<div class="mrightTop">
 	<div class="fontl">
    <form method="get">
       <div class="left">
          <input type="hidden" name="app" value="jfcade" />
          <input type="hidden" name="act" value="index" />
          <select class="querySelect" name="field_name"><?php echo $this->html_options(array('options'=>$this->_var['query_fields'],'selected'=>$_GET['field_name'])); ?>
          </select>
          <input class="queryInput" type="text" name="field_value" value="<?php echo htmlspecialchars($_GET['field_value']); ?>" />
          <input type="submit" class="formbtn" value="查询" />
      </div>
      <?php if ($this->_var['filtered']): ?>
      <a class="left formbtn1" href="index.php?app=jfcade">撤销检索</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <?php if ($this->_var['cards']): ?>
    <tr class="tatr1">
      <td width="20" class="firstCell"></td>
      <td>卡号</td>
      <td>店铺编号</td>
      <td>店铺名</td>
      <td>面值</td>
      <td>生成时间</td>
      <td>过期时间</td>
      <td>状态</td>
      <td>兑分客户</td>
    </tr>
    <?php endif; ?>
    <?php $_from = $this->_var['cards']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
    <tr class="tatr2">
        <td class="firstCell"></td>
        <td><?php echo htmlspecialchars($this->_var['card']['jf_card_id']); ?></td>
        <td><?php echo htmlspecialchars($this->_var['card']['store_id']); ?></td>
        <td><?php echo htmlspecialchars($this->_var['card']['store_name']); ?></td>
        <td style="color:#F60"><?php echo $this->_var['card']['jf_count']; ?></td>
        <td><?php echo local_date("Y-m-d H:i:s",$this->_var['card']['add_time']); ?></td>
        <td><?php echo local_date("Y-m-d H:i:s",$this->_var['card']['end_time']); ?></td>
        <?php if ($this->_var['card']['c_state'] == '0'): ?>
        <td style="color:#F60">未使用</td>   
        <?php elseif ($this->_var['card']['c_state'] == '1'): ?>  
        <td>已使用</td>  
        <?php endif; ?>	
        <td><?php echo $this->_var['card']['user_name']; ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="7">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  <?php if ($this->_var['cards']): ?>
  <div id="dataFuncs">
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>