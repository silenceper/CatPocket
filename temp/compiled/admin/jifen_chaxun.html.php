<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>

<div id="rightTop">
    <p>积分兑换添加</p>
    <ul class="subnav">
	    <li><a class="btn3" href="index.php?module=my_money&act=jifen_add">添加物品</a></li>
		
    </ul>
</div>

<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
              <input name="module" type="hidden" id="module" value="my_money" />
              <input name="act" type="hidden" id="act" value="jifen_chaxun" />
              会员名:
              <input name="soname" type="text" id="soname" value="<?php echo $_GET["soname"];?>" />
			  积分:
              <input name="sojifen" type="text" id="sojifen" value="<?php echo $_GET["sojifen"];?>" size="10" maxlength="10" />
               至 <input name="endjifen" type="text" id="endjifen" value="<?php echo $_GET["endjifen"];?>" size="10" maxlength="10" />
                
                <input type="submit" class="formbtn" value="查询" />
          </div>
            <?php if ($this->_var['soso']): ?>
            <a class="left formbtn1" href="index.php?module=my_money&act=index">撤销检索</a>
            <?php endif; ?>
      </form>
    </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>

<div class="tdare">
    <table width="100%" cellspacing="0">

        <tr class="tatr1">
            <td width="20" class="firstCell"><input id="checkall_1" type="checkbox" class="checkall"/></td>
            <td align="left">ID</td>
            <td>会员名</td>
            <td>剩余积分</td>
            <td>余额</td>
            <td width="120">开通时间</td>
			<td width="120">操作管理</td>
        </tr>

        <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
        <tr class="tatr2">
            <td width="20" class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['val']['id']; ?>" /></td>
            <td align="left"><b><?php echo $this->_var['val']['id']; ?></b></td>
            <td align="left"><font color="#FF0000"><?php echo $this->_var['val']['user_name']; ?></font></td>
			<td><?php echo $this->_var['val']['jifen']; ?></td>
            <td><?php echo $this->_var['val']['money']; ?></td>
            <td><?php echo local_date("y-m-d H:i",$this->_var['val']['add_time']); ?></td>
			<td>修改 删除</td>
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
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?module=my_money&act=mibao_drop_pi" presubmit="confirm('确定要批量删除吗？删除后该新卡数据将被删除!');" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>