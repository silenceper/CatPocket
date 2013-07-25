<?php echo $this->fetch('header.html'); ?>

<style> 
.ovrit 
{ 
background: #FFCC33; 
} 
.cross 
{ 
background: #FF0000; 
} 

.titl 
{ 
background: #f0f0f0; 
} 
</style>
<div id="rightTop">
    <p>用户资金管理</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=user_money_list">资金列表</a></li>
		<li><span>调整用户资金</span></li>
		<li><a class="btn3" href="index.php?module=my_money&act=user_money_log">资金流水</a></li>
		
    </ul>
</div>

<div class="info">

            <table class="infoTable">
    <form method="post">
            <tr>
                <th class="paddingT15">用户名:</th>
                <td class="paddingT15 wordSpacing5">
				<input name="user_name" type="text" value="<?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?><?php echo $this->_var['val']['user_name']; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>" size="20">
				</td>
            </tr>
            <tr>
                <th class="paddingT15">操作金额:</th>
              <td class="paddingT15 wordSpacing5">
				<input name="post_money" type="text" id="post_money" value="" size="10">
				元
				</td>
            </tr>
            <tr>
                <th class="paddingT15">操作类型:</th>
           <td class="paddingT15 wordSpacing5">增加<input name="jia_or_jian" type="radio" value="jia" checked="CHECKED" />
		   减少<input type="radio" name="jia_or_jian" value="jian" />
		   <font color="#FF0000">注意选择!</font>
			  </td>
            </tr>
<?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
            <tr>
                <th class="paddingT15">可用余额:</th>
                <td class="paddingT15 wordSpacing5">
				<font color="#FF0000"><?php echo $this->_var['val']['money']; ?></font>
				</td>
            </tr>
            <tr>
                <th class="paddingT15">提现冻结金额:</th>
                <td class="paddingT15 wordSpacing5"><?php echo $this->_var['val']['money_dj']; ?>
				</td>
            </tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<tr>
                <th class="paddingT15">记录流水:</th>		
                <td class="paddingT15 wordSpacing5">
				


<input name="log_text" type="text" id="log_text" value="<?php echo $this->_var['visitor']['user_name']; ?>管理员手工操作用户资金" size="60">



<div id="time_from2">

</div>
</td>
            </tr>
	
            <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="Submit" value="提交" />
                <input class="formbtn" type="reset" name="Submit2" value="重置" />
            </td>
            </tr>
    </form>


      </table>	
</div>
<?php echo $this->fetch('footer.html'); ?>