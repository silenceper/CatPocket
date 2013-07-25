<?php echo $this->fetch('member.header.html'); ?>

<script language = "JavaScript">
/*删除密保表单*/
function Del_mibao()
{

if(confirm('您确定要解除吗? 解除后动态密码将失效！'))
{
return true;
}
else
{
return false;
}
}
</script>
<?php
$shuzi1 = round(rand(1,8));
$shuzi2 = round(rand(1,8));
$shuzi3 = round(rand(1,8));

$quzimu1= round(rand(65,72));
$quzimu2= round(rand(65,72));
$quzimu3= round(rand(65,72));

$zimu1 = chr($quzimu1);
$zimu2 = chr($quzimu2);
$zimu3 = chr($quzimu3);

?>	
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">
				<li class="normal"><a href="?app=my_money&act=mylist">钱包设置</a></li>
				<li class="normal"><a href="?app=my_money&act=password">支付密码修改</a></li>
                <li class="active">密保绑定</li>
          </ul>
        <div class="wrap">
        <div class="eject_con bgwhite">
            <div class="add">
			    <?php $_from = $this->_var['my_money']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
				<?php if ($this->_var['val']['mibao_id'] > 0): ?>	  
				<form name="del_mibao" onsubmit="return Del_mibao()" action="index.php?app=my_money&act=del_mibao" method="post">
                 <li><h3>已绑序号:</h3>
                                <p>
                    <input type="text" id="sn" value="<?php echo $this->_var['val']['mibao_sn']; ?>" size="20" readonly disabled>
                  </p>
                            </li>
				  <li><h3>动态密码:</h3>
                                <p>
<b>
<font color="red">
<?php echo $shuzi1.$zimu1;?><input type="text" id="user_shuzi1" name="user_shuzi1"  size="3" maxlength="3"/>    
<?php echo $shuzi2.$zimu2;?><input type="text" id="user_shuzi2" name="user_shuzi2"  size="3" maxlength="3"/>    
<?php echo $shuzi3.$zimu3;?><input type="text" id="user_shuzi3" name="user_shuzi3"  size="3" maxlength="3"/>
</font>
</b>

				  <font color="red">*&nbsp;解除前需验证</font></p>
                            </li>  
<input name="user_zimuz1" id="user_zimuz1" type="hidden" value="<?php echo $zimu1.$shuzi1;?>" />
<input name="user_zimuz2" id="user_zimuz2" type="hidden" value="<?php echo $zimu2.$shuzi2;?>" />
<input name="user_zimuz3" id="user_zimuz3" type="hidden" value="<?php echo $zimu3.$shuzi3;?>" />

                  <input name="post_mb_sn" id="post_mb_sn" type="hidden" value="<?php echo $this->_var['val']['mibao_sn']; ?>" />

                    <div class="submit">
                        <input class="btn" type="submit" value="解除密保" /></div>
               </form>					  

				<?php else: ?>
				
				<form onSubmit="return add_mibao();" action="index.php?app=my_money&act=add_mibao" method="post">
				

                  <li><h3>支付密码:</h3>
                                <p>
                    <input name="zf_pass" type="password" id="zf_pass" size="20" />
				  <font color="red">*&nbsp;请输入支付密码</font></p>
                            </li>
				  <li><h3>密保序号:</h3>
                                <p>
                    <input name="post_mb_sn" type="text" id="post_mb_sn" size="19" style='text-transform:uppercase;'>
				  <font color="red">*&nbsp;输入密保SN号</font></p>
                            </li>
				  <li><h3>动态密码:</h3>
                                <p>
	
<b>
<font color="red">
<?php echo $shuzi1.$zimu1;?><input type="text" id="user_shuzi1" name="user_shuzi1"  size="3" maxlength="3"/>    
<?php echo $shuzi2.$zimu2;?><input type="text" id="user_shuzi2" name="user_shuzi2"  size="3" maxlength="3"/>    
<?php echo $shuzi3.$zimu3;?><input type="text" id="user_shuzi3" name="user_shuzi3"  size="3" maxlength="3"/>
</font>
</b>

				  <font color="red">*&nbsp;刮开涂层输入数字</font></p>
                            </li>
<input name="user_zimuz1" id="user_zimuz1" type="hidden" value="<?php echo $zimu1.$shuzi1;?>" />
<input name="user_zimuz2" id="user_zimuz2" type="hidden" value="<?php echo $zimu2.$shuzi2;?>" />
<input name="user_zimuz3" id="user_zimuz3" type="hidden" value="<?php echo $zimu3.$shuzi3;?>" />

                    <div class="submit">
                        <input class="btn" type="submit" value="绑定动态密码" /></div>
                </form>				



				<?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
</div>	</div>			

			

            </div>
            <div class="wrap_bottom"></div>
        </div>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<iframe id='iframe_post' name="iframe_post" frameborder="0" width="0" height="0">
</iframe>
<?php echo $this->fetch('footer.html'); ?>
