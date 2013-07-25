<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>充值卡密管理</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=card_yichongzhi">已充值</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=card_guoqi">已过期</a></li>
		<li><span>未充值</span></li>
		<li><a class="btn3" href="index.php?module=my_money&act=card_add_pi">新卡生成</a></li>
		
    </ul>
</div>

<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
              <input name="module" type="hidden" id="module" value="my_money" />
              <input name="act" type="hidden" id="act" value="weiguoqi" />
              充值卡号:
              <input name="sosn" type="text" id="sosn" />
			  过期时间:
              <input name="sotime" type="text" id="sotime" value="<?php echo $_GET["sotime"];?>" size="10" maxlength="10" />
               至 <input name="endtime" type="text" id="endtime" value="<?php echo $_GET["endtime"];?>" size="10" maxlength="10" />
                
                <input type="submit" class="formbtn" value="查询" />
          </div>
      </form>
    </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>

<div class="tdare">
    <table width="100%" cellspacing="0">

        <tr class="tatr1">
            <td width="20" class="firstCell"><input id="checkall_1" type="checkbox" class="checkall"/></td>
            <td align="left">ID</td>
            <td>卡号SN</td>
			<td>面值</td>
            <td width="120">生成时间</td>
            <td>使用会员</td>
			<td width="120">过期时间</td>
            <td>管理操作</td>
        </tr>

        <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
        <tr class="tatr2">
            <td width="20" class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['val']['id']; ?>" /></td>
            <td align="left"><b><?php echo $this->_var['val']['id']; ?></b></td>
            <td align="left"><font color="#FF0000"><?php echo $this->_var['val']['card_sn']; ?></font></td>
			<td><font color="#FF0000"><?php echo $this->_var['val']['money']; ?>元</font></td>
            <td><?php echo local_date("Y-m-d H:i:s",$this->_var['val']['add_time']); ?></td>
            <td><?php if ($this->_var['val']['user_name']): ?><a href="index.php?app=user&act=edit&id=<?php echo $this->_var['val']['user_id']; ?>"><?php echo $this->_var['val']['user_name']; ?></a><?php else: ?>未绑定<?php endif; ?></td>
			<td><?php echo local_date("Y-m-d",$this->_var['val']['guoqi_time']); ?></td>
            <td><a href="index.php?module=my_money&act=card_edit&id=<?php echo $this->_var['val']['id']; ?>">查看卡密</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:drop_confirm('确定删除吗？', 'index.php?module=my_money&act=card_del&id=<?php echo $this->_var['val']['id']; ?>');">删除</a></td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="8">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['index']): ?>
<div id="dataFuncs">
    <div id="batchAction" class="left paddingT15">
 <input type="checkbox" class="checkall" />
      <input class="formbtn batchButton" type="button" value="删除" name="id" uri="index.php?module=my_money&act=card_drop" presubmit="confirm('确定要删除吗？确认将会删除已选的数据！');" />     
    </div>
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>