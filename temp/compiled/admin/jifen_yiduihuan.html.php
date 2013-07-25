<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>

<div id="rightTop">
    <p>查询已兑换</p>
    <ul class="subnav">
		
    </ul>
</div>

<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
              <input name="module" type="hidden" id="module" value="my_money" />
              <input name="act" type="hidden" id="act" value="jifen_yijduihuan" />
              会员名:
              <input name="soname" type="text" id="soname" />
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
            <td>兑换物品名</td>
            <td>兑换积分</td>
            <td>兑换数量</td>
            <td width="120">兑换时间</td>
			<td width="120">操作管理</td>
        </tr>

        <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
        <tr class="tatr2">
            <td width="20" class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['val']['id']; ?>" /></td>
            <td align="left"><b><?php echo $this->_var['val']['id']; ?></b></td>
            <td align="left"><a href="index.php?module=my_money&act=jifen_id&id=<?php echo $this->_var['val']['id']; ?>"><font color="#FF0000"><?php echo $this->_var['val']['user_name']; ?></font>&nbsp;&nbsp;<?php if ($this->_var['val']['shenhe']): ?><font color="#666666">[已审核]</font><?php else: ?><font color="#0000FF">[未审核]</font><?php endif; ?></a></td>
			<td><?php echo $this->_var['val']['wupin_name']; ?></td>
			<td><?php echo $this->_var['val']['jifen']; ?></td>
            <td><?php echo $this->_var['val']['shuliang']; ?></td>
            <td><?php echo local_date("y-m-d H:i",$this->_var['val']['add_time']); ?></td>
			<td><a href="index.php?module=my_money&act=jifen_id&id=<?php echo $this->_var['val']['id']; ?>">编辑</a></td>
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
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?module=my_money&act=mibao_drop_pi" presubmit="confirm('确定要批量删除吗？删除后该新卡数据将被删除!');" />
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>