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
    <p>调整用户积分</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?app=integral">积分列表</a></li>
		<li><span>调整用户积分</span></li>
		<li><a class="btn3" href="index.php?app=integral&act=user_jifen_log">积分流水</a></li>
		
    </ul>
</div>

<div class="info">

            <table class="infoTable">
    <form method="post">
            <tr>
                <th class="paddingT15">会员名</th>
                <td class="paddingT15 wordSpacing5">
				<?php echo $this->_var['integral']['user_name']; ?>
				</td>
            </tr>
            <tr>
                <th class="paddingT15">操作积分</th>
              <td class="paddingT15 wordSpacing5">
				<input name="jifennum" type="text" id="jifennum" value="" size="10">
				分
				</td>
            </tr>
			<?php if ($this->_var['integral']['store_name'] != ''): ?>
            <tr>
                <th class="paddingT15">卖家额度</th>
              <td class="paddingT15 wordSpacing5">
				<input name="jifenedu" type="text" id="jifenedu" value="<?php echo $this->_var['integral']['seller_edu']; ?>" size="10">
				分
				</td>
            </tr>                      
            <?php endif; ?>
            <tr>
                <th class="paddingT15">操作类型</th>
           <td class="paddingT15 wordSpacing5">增加<input name="jia_or_jian" type="radio" value="jia" checked="CHECKED" />
		   减少<input type="radio" name="jia_or_jian" value="jian" />
		   <font color="#FF0000">注意选择</font>
			  </td>
            </tr>
<?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
            <tr>
                <th class="paddingT15">现有积分</th>
                <td class="paddingT15 wordSpacing5">
				<font color="#FF0000"><?php echo $this->_var['val']['money']; ?></font>
				</td>
            </tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<tr>
                <th class="paddingT15">记录流水</th>		
                <td class="paddingT15 wordSpacing5">
				


<input name="log_text" type="text" id="log_text" value="<?php echo $this->_var['visitor']['user_name']; ?>管理员手工操作用户积分" size="60">



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