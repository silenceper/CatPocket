<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>积分流水</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?app=integral">积分列表</a></li>
		<li><span>积分流水</span></li>
		
    </ul>
</div>

<div class="mrightTop">
    <div class="fontl">
       <form method="get">
            <div class="left">
              <input name="app" type="hidden" id="app" value="integral" />
              <input name="act" type="hidden" id="act" value="user_jifen_log" />
              类型:
              <select name="log_text" id="log_text">
              <option value="">请选择</option>
              <option value="管理员手工操作用户积分">管理员操作</option>
              <option value="用户通过积分卡获取积分">使用积分卡</option>
              <option value="用户购买积分">购买积分</option>
              <option value="用户购物自己扣除使用积分">购物消耗</option>
              <option value="取消订单，返回">取消订单返回</option>
              </select>
              用户名:
              <input name="username" type="text" id="username" value="<?php echo $_GET["username"];?>" size="10" maxlength="10" />
			  添加时间:
              <input name="sotime" type="text" id="sotime" value="<?php echo $_GET["sotime"];?>" size="10" maxlength="10" />
              &nbsp;至&nbsp;<input name="endtime" type="text" id="endtime" value="<?php echo $_GET["endtime"];?>" size="10" maxlength="10" />
              <input type="submit" class="formbtn" value="搜 索" />
            </div>
            <?php if ($this->_var['filtered']): ?>
      		<a class="left formbtn1" href="index.php?app=integral&act=user_jifen_log">撤销检索</a>
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
            <td>操作类型</td>
            <td>操作日志</td>
            <td width="120">积分数</td>
			<td width="120">操作时间</td>
            <td align="center">操作人</td>
        </tr>

        <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
        <tr class="tatr2">
        	<td width="40">&nbsp;</td>
            <td align="left"><b><?php echo $this->_var['val']['recieve_name']; ?></b></td>
            <td>
            <?php if ($this->_var['val']['state'] == '1'): ?>
            买入商品使用积分
            <?php elseif ($this->_var['val']['state'] == '2'): ?>
            买入商品获得积分
            <?php elseif ($this->_var['val']['state'] == '3'): ?>
            卖出商品获得积分
            <?php elseif ($this->_var['val']['state'] == '4'): ?>
            卖出商品消耗积分
            <?php elseif ($this->_var['val']['state'] == '5'): ?>
            管理员增加积分
            <?php elseif ($this->_var['val']['state'] == '6'): ?>
            管理员减少积分
            <?php elseif ($this->_var['val']['state'] == '7'): ?>
            管理员变更额度
            <?php elseif ($this->_var['val']['state'] == '8'): ?>
            卖家生成礼品卡消耗
            <?php elseif ($this->_var['val']['state'] == '9'): ?>
            卖家礼品卡过期返还积分
            <?php elseif ($this->_var['val']['state'] == '10'): ?>
            买家使用礼品卡获得积分
            <?php elseif ($this->_var['val']['state'] == '11'): ?>
            购买积分
            <?php elseif ($this->_var['val']['state'] == '12'): ?>
            积分兑换物品
            <?php else: ?>
            其它途径
            <?php endif; ?>
            </td>
            <td><?php echo $this->_var['val']['log_text']; ?></td>
            <td><font color="#FF0000"><?php echo $this->_var['val']['jifen']; ?></font></td>
			<td><?php echo local_date("y-m-d H:i:s",$this->_var['val']['add_time']); ?></td>
            <td class="table_center"><?php echo $this->_var['val']['user_name']; ?></td>


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