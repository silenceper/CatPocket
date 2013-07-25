<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>提现审核管理</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=tx_index_shenhe">查看全部</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=tx_wei_shenhe">未审核</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=tx_yi_shenhe">已审核</a></li>
		
    </ul>
</div>

<div class="info">
    <form method="post">
            <table class="infoTable">
<?php $_from = $this->_var['log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?> 
            <tr>        
              <th class="paddingT15">申请人</th>
              <td class="paddingT15 wordSpacing5"><?php echo $this->_var['val']['user_name']; ?>&nbsp;&nbsp;<a href="index.php?module=my_money&act=logs_user_shouru&user_name=<?php echo $this->_var['val']['user_name']; ?>">查看<?php echo $this->_var['val']['user_name']; ?>最近收入</a></td>
            </tr>

            <tr>
              <th class="paddingT15">申请金额</th>
              <td class="paddingT15 wordSpacing5"><font color="#FF0000"><?php echo $this->_var['val']['money_zs']; ?> 元</font>
              <input name="money_djs" type="hidden" id="money_djs" value="<?php echo $this->_var['val']['money_zs']; ?>" /></td>
            </tr>
            <tr>
              <th class="paddingT15">申请时间</th>
              <td class="paddingT15 wordSpacing5"><?php echo local_date("Y-m-d H:i:s",$this->_var['val']['add_time']); ?></td>
            </tr>
			<tr>
              <th class="paddingT15">&nbsp;</th>
            </tr>

<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php $_from = $this->_var['user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?> 
            <tr>
                <th class="paddingT15">用户可用余额:</th>
                <td class="paddingT15 wordSpacing5"><?php echo $this->_var['val']['money']; ?></td>
            </tr>	
			<tr>
                <th class="paddingT15">用户提现冻结金额:</th>
                <td class="paddingT15 wordSpacing5"><?php echo $this->_var['val']['money_dj']; ?>
                <font color="#FF0000">是否扣除此次申请资金</font><input name="money_chu" type="checkbox" id="money_chu" value="YES" /></td>
            </tr>
			<tr>
                <th class="paddingT15">提现帐户类型:</th>
                <td class="paddingT15 wordSpacing5"><?php echo $this->_var['val']['bank_name']; ?></td>
            </tr>
			<tr>
                <th class="paddingT15">提现帐号: </th>
                <td class="paddingT15 wordSpacing5"><?php echo $this->_var['val']['bank_sn']; ?></td>
            </tr>
			<tr>
                <th class="paddingT15">提现户名:</th>
                <td class="paddingT15 wordSpacing5"><?php echo $this->_var['val']['bank_uname']; ?></td>
            </tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
<?php $_from = $this->_var['log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
			<tr>
                <th class="paddingT15">转帐成功交易号:</th>
                <td class="paddingT15 wordSpacing5">
				<input name="order_id" type="text" id="order_id" value="<?php echo $this->_var['val']['order_id']; ?>" size="30" />
                </td>
            </tr>
			<tr>
                <th class="paddingT15">更新日志说明: </th>
                <td class="paddingT15 wordSpacing5">
				<input name="log_text" type="text" id="log_text" value="<?php echo $this->_var['val']['log_text']; ?>" size="60" />
                </td>
            </tr>
			<tr>
                <th class="paddingT15">是否审核:</th>
                <td class="paddingT15 wordSpacing5">
			<?php if ($this->_var['val']['caozuo'] == 61): ?>
			是:<input name="caozuo" type="radio" value="61" checked="checked" />
			<?php else: ?>
			是:<input name="caozuo" type="radio" value="61" />
			<?php endif; ?>
			
			<?php if ($this->_var['val']['caozuo'] == 60): ?>
			否:<input name="caozuo" type="radio" value="60" checked="checked" />
			<?php else: ?>
			否:<input name="caozuo" type="radio" value="60" />
			<?php endif; ?>

                </td>
            </tr>	
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>					
        <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="Submit" value="审核" />
                <input class="formbtn" type="reset" name="Submit2" value="重置" />
            </td>
        </tr>

        </table>
    </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
