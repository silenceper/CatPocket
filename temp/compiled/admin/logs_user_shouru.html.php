<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>查看用户收入来源</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=tx_index_shenhe">查看全部</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=tx_wei_shenhe">未审核</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=tx_yi_shenhe">已审核</a></li>
    </ul>
</div>

<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">   
            <input name="module" type="hidden" id="module" value="my_money" />
            <input name="act" type="hidden" id="act" value="logs_user_shouru" />
            用户名:
            <input name="user_name" type="text" id="user_name" value="<?php echo $_GET["user_name"];?>" />
			收入时间:
            <input name="sotime" type="text" id="sotime" value="<?php echo $_GET["sotime"];?>" size="10" maxlength="10" />
			 至 
			<input name="endtime" type="text" id="endtime" value="<?php echo $_GET["endtime"];?>" size="10" maxlength="10" />
            <input type="submit" class="formbtn" value="查询" />
          </div>
<?php if ($this->_var['soso']): ?>
<a class="left formbtn1" href="index.php?module=my_money&act=logs_user_shouru&user_name=<?php echo $_GET["user_name"];?>">撤销检索</a>
<?php endif; ?>
      </form>
    </div>
    <div class="fontr">

    </div>
</div>

<div class="tdare">
    <table width="100%" cellspacing="0">

        <tr class="tatr1">
            <td width="20" class="firstCell">ID</td>
            <td align="left">用户名</td>
            <td>收入金额</td>
			<td width="120">收入时间</td>
            <td>来源</td>
			<td>类型</td>
            <td>定单号</td>
			<td class="handler">管理操作</td>
        </tr>

        <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
        <tr class="tatr2">
            <td width="20" class="firstCell"><?php echo $this->_var['val']['id']; ?></td>
            <td align="left"><b><?php echo $this->_var['val']['user_name']; ?></b></td>
			            
            <td><font color="#FF0000"><?php echo $this->_var['val']['money_zs']; ?></font></td>
			<td><?php echo local_date("Y-m-d H:i:s",$this->_var['val']['add_time']); ?></td>
			<td><?php echo $this->_var['val']['buyer_name']; ?></td>
		    <td>	 					 
					 <?php if ($this->_var['val']['logs'] == 10): ?>收入<?php endif; ?>
					 <?php if ($this->_var['val']['logs'] == 11): ?>转入<?php endif; ?>
					 <?php if ($this->_var['val']['logs'] == 20): ?>支出<?php endif; ?>
					 <?php if ($this->_var['val']['logs'] == 21): ?>转出<?php endif; ?>
					 <?php if ($this->_var['val']['logs'] == 30): ?>充值<?php endif; ?>
					 <?php if ($this->_var['val']['logs'] == 40): ?>提现<?php endif; ?>
			</td>
			<td><?php echo $this->_var['val']['order_id']; ?></td>
            <td class="handler">暂无</td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="8">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['index']): ?>
<div id="dataFuncs">
        <div class="pageLinks">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>

  </div>
    <div class="clear"></div>
    <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>