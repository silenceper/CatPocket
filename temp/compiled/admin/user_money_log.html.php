<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>用户资金管理</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=user_money_list">资金列表</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=user_money_add">调整用户资金</a></li>
		<li><span>资金流水</span></li>
		
    </ul>
</div>

<div class="mrightTop">
    <div class="fontl">
       <form method="get">
            <div class="left">
              <input name="module" type="hidden" id="module" value="my_money" />
              <input name="act" type="hidden" id="act" value="user_money_log" />
              类型:
              <select name="log_text" id="log_text">
              <option value="">请选择</option>
              <option value="管理员手工操作用户资金">管理员操作</option>
              <option value="使用充值卡充值">使用充值卡</option>
              <option value="即时充值">在线充值</option>
              <option value="申请金额">申请提现</option>
              <option value="商家取消订单，钱返用户">取消订单</option>
              <option value="购买商品，买家扣钱">买入商品</option>
              <option value="出售商品，商家应得钱">卖出商品</option>
              <option value="邀请的新客户下单贡献资金">邀请客户贡献</option>
              <option value="订单完成，扣除商家服务费">服务费</option>
              <option value="商家扣除由赠送积分转换成的钱">商家赠送积分</option>
              <option value="购买积分使用">购买积分</option>
              <option value="购买猫粮使用">购买猫粮</option>
              </select>
              用户名:
              <input name="username" type="text" id="username" value="<?php echo $_GET["username"];?>" size="10" maxlength="10" />
			  添加时间:
              <input name="sotime" type="text" id="sotime" value="<?php echo $_GET["sotime"];?>" size="10" maxlength="10" />
              &nbsp; 至 &nbsp;<input name="endtime" type="text" id="endtime" value="<?php echo $_GET["endtime"];?>" size="10" maxlength="10" />
                <input type="submit" class="formbtn" value="搜 索" />
            </div>
            <?php if ($this->_var['filtered']): ?>
      		<a class="left formbtn1" href="index.php?module=my_money&act=user_money_log">撤销检索</a>
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
            <td align="left">对象会员</td>
            <td>操作日志</td>
            <td>操作金额</td>
            <td align="center">单号</td>
			<td width="120">操作时间</td>
			<td>操作人</td>
        </tr>

        <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
        <tr class="tatr2">
            <td width="40">&nbsp;</td>
            <td align="left"><b><?php echo $this->_var['val']['user_name']; ?></b></td>
            <td><?php echo $this->_var['val']['log_text']; ?></td>
            <td><font color="#FF0000"><?php echo $this->_var['val']['money_zs']; ?></font></td>
            <td><?php echo htmlspecialchars($this->_var['val']['order_sn']); ?>&nbsp;</td>
			<td><?php echo local_date("y-m-d H:i:s",$this->_var['val']['add_time']); ?></td>
			<td class="table_center"><?php if ($this->_var['val']['admin_name']): ?><?php echo $this->_var['val']['admin_name']; ?><?php else: ?><?php echo $this->_var['val']['user_name']; ?><?php endif; ?></td>
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