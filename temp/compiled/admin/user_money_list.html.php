<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>用户资金管理</p>
    <ul class="subnav">
		<li><span>资金列表</span></li>
		<li><a class="btn3" href="index.php?module=my_money&act=user_money_add">调整用户资金</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=user_money_log">资金流水</a></li>
		
    </ul>
</div>

<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
              <input name="module" type="hidden" id="module" value="my_money" />
              <input name="act" type="hidden" id="act" value="user_money_list" />    
              用户名:
              <input name="soname" type="text" id="soname" value="<?php echo $_GET["soname"];?>" />
			  金额:
              <input name="somoney" type="text" id="somoney" value="<?php echo $_GET["somoney"];?>" size="10" maxlength="10" />
               至 <input name="endmoney" type="text" id="endmoney" value="<?php echo $_GET["endmoney"];?>" size="10" maxlength="10" />
                
                <input type="submit" class="formbtn" value="搜 索" />
          </div>
      </form>
    </div>
    <div class="fontr">

    </div>
</div>

<div class="tdare">
    <table width="100%" cellspacing="0">

        <tr class="tatr1">
            <td width="20" class="firstCell"><input id="checkall_1" type="checkbox" class="checkall"/></td>
            <td align="left">用户名</td>
            <td>可用金额</td>
            <td width="150">提现冻结金额</td>
			<td width="180">消费积分</td>
			<td width="180">开通时间</td>
            <td class="handler">管理操作</td>
        </tr>

        <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
        <tr class="tatr2">
            <td width="20" class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['key']; ?>" /></td>
            <td align="left"><b><?php echo $this->_var['val']['user_name']; ?></b></td>
            <td><font color="#FF0000"><?php echo $this->_var['val']['money']; ?></font></td>
            <td><font color="#FF0000"><?php echo $this->_var['val']['money_dj']; ?></font></td>
			<td><font color="#FF0000"><?php echo $this->_var['val']['jifen']; ?></font></td>
            <td><?php echo local_date("y-m-d H:i",$this->_var['val']['add_time']); ?></td>

            <td class="handler">
            <a href="index.php?module=my_money&act=user_money_add&user_id=<?php echo $this->_var['val']['user_id']; ?>&user_name=<?php echo $this->_var['val']['user_name']; ?>">增加金额</a></td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['index']): ?>
<div id="dataFuncs">

    <div id="batchAction" class="left paddingT15"><input type="checkbox" class="checkall" />
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="#" presubmit="confirm('批量功能暂停使用');" />
    </div>

    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>