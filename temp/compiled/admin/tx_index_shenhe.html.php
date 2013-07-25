<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>提现审核管理</p>
    <ul class="subnav">
		<li><span>查看全部</span></li>
		<li><a class="btn3" href="index.php?module=my_money&act=tx_wei_shenhe">未审核</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=tx_yi_shenhe">已审核</a></li>
		
    </ul>
</div>

<div class="mrightTop">
    <div class="fontl">
       <form method="get">
            <div class="left">
              <input name="module" type="hidden" id="module" value="my_money" />
              <input name="act" type="hidden" id="act" value="tx_soso" />
              用户名:
              <input name="soname" type="text" id="soname" value="<?php echo $_GET["soname"];?>" />
			  申请时间:
              <input name="sotime" type="text" id="sotime" value="<?php echo $_GET["sotime"];?>" size="10" maxlength="10" />
              &nbsp; 至 &nbsp;<input name="endtime" type="text" id="endtime" value="<?php echo $_GET["endtime"];?>" size="10" maxlength="10" />
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
            <td align="left">申请人</td>
            <td>申请金额</td>
            <td>转帐单号</td>
            <td width="120">申请时间</td>
			<td width="120">审核时间</td>
			<td>审核状态</td>
            <td class="handler">管理操作</td>
        </tr>

        <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
        <tr class="tatr2">
            <td width="20" class="firstCell">
            <input type="checkbox" class="checkitem" value="<?php echo $this->_var['key']; ?>" />
            </td>
            <td align="left"><b><?php echo $this->_var['val']['user_name']; ?></b></td>
            <td><font color="#FF0000"><?php echo $this->_var['val']['money_zs']; ?></font></td>
            <td><?php echo $this->_var['val']['order_id']; ?></td>
            <td><?php echo local_date("y-m-d H:i",$this->_var['val']['add_time']); ?></td>
			<td><?php if ($this->_var['val']['admin_time']): ?><?php echo local_date("y-m-d H:i",$this->_var['val']['admin_time']); ?><?php else: ?>未审核<?php endif; ?></td>
			<td class="table_center">
			<?php if ($this->_var['val']['caozuo'] == 61): ?>
			<a href="index.php?module=my_money&act=caozuo_no&id=<?php echo $this->_var['val']['id']; ?>&caozuo=61"><img src="<?php echo $this->res_base . "/" . 'admin/images/positive_enabled.gif'; ?>"></a>
			<?php endif; ?>
			<?php if ($this->_var['val']['caozuo'] == 60): ?>
			<a href="index.php?module=my_money&act=caozuo_yes&id=<?php echo $this->_var['val']['id']; ?>&caozuo=60"><img src="<?php echo $this->res_base . "/" . 'admin/images/positive_disabled.gif'; ?>"></a>
			<?php endif; ?>
			</td>
            <td class="handler">
            <a href="index.php?module=my_money&act=tx_shenhe_user&user_id=<?php echo $this->_var['val']['user_id']; ?>&log_id=<?php echo $this->_var['val']['id']; ?>">查看详情</a></td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="8">没有符合条件的记录</td>
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