<?php echo $this->fetch('member.header.html'); ?>

<script language = "JavaScript">
/*修改密码表单*/
function editpass()
{
   if (document.edit_pass.y_pass.value=="")
  {
    alert("密码不能为空！");
	document.edit_pass.y_pass.focus();
	return false;
  }
  
  if (document.edit_pass.my_pass.value=="")
  {
    alert("密码不能为空！");
	document.edit_pass.my_pass.focus();
	return false;
  }

  if (document.edit_pass.my_pass2.value=="")
  {
    alert("密码不能为空！");
	document.edit_pass.my_pass2.focus();
	return false;
  }
  return true;  
}

/*提现帐户表单*/
$(document).ready(function(){

	$('#bank_edit').click(function(){
		var $bank_edit = $("#bank_edit").attr("checked");
		var $bank_from1 = $('#bank_from1');
		var $bank_from2 = $('#bank_from2');
		if($bank_edit == true){
			$bank_from1.show();
			$bank_from2.hide();
		}else{
			$bank_from2.show();
			$bank_from1.hide();
		}
	});

});
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
				<li class="active">钱包设置</li>
				<li class="normal"><a href="?app=my_money&act=password">支付密码修改</a></li>
                
          </ul>
        <div class="wrap margin1">
            <div class="public table">
				<div class="information_index" style="overflow:hidden; margin: 0px 0 -15px;">
                   <div class="info">
                        <h3 class="margin2">
                            <span>您好！<?php echo $this->_var['visitor']['user_name']; ?>，欢迎使用我的钱包！</span>
                            
                        </h3>
                      <table class="width6">
                      <tr>
					  <td><span style="font-size:14px">
					  <?php $_from = $this->_var['my_money']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
帐户总金额：<span style="font-size:16px;font-weight:bold; color:#FE5400;"><?php echo $this->_var['val']['money']; ?></span>
&nbsp;元&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提现冻结金额：<span style="color:blue;"><?php echo $this->_var['val']['money_dj']; ?></span>&nbsp;元&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;积分：<span style="color:blue;"><?php echo $this->_var['val']['jifen']; ?></span></span>
					  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					  </td>
                      </tr>
                      <tr>
                      <td>上次登陆IP: <?php echo $this->_var['visitor']['last_ip']; ?><br><br>
                                    上次登陆时间:<?php echo local_date("Y-m-d H:i:s",$this->_var['visitor']['last_login']); ?><br> <br>
                                    
                                    <A 
href="index.php?app=my_money&act=paylist">立即充值</A>&nbsp;&nbsp;|&nbsp;&nbsp;<A 
class=G href="index.php?app=my_money&act=txlist"><span style="color:green;">提现</span></A>  
					  </td> 

                      </tr>
                      </table>
                 </div>
             </div>
         </div>
      </div>


<div class="wrap">
            <div class="public table">
			<form name="bank_set" onSubmit="return user_set();" action="index.php?app=my_money&act=bank_set" method="post">
				  <h3 class="title" style="margin: -10px 0 20px; color:#3E3E3E">提现帐户设置
				  
				  <span style="font-size:12px; font-weight:normal; color:#666666">是否修改
                  <input name="bank_edit" type="checkbox" id="bank_edit" value="YES" onclick="SetGroupChecked('bank_edit');"/>
				  </span>
			      </h3>
                  

			
<div id="bank_from1" style="display: none; color:#646665;float:left;font-size:12px;font-weight:normal;line-height:30px;">
					<span>银行名称：</span>
                    <input type="text" name="yes_bank_name" value="<?php echo $this->_var['val']['bank_name']; ?>">&nbsp;<font color="#FF0000">         
					支持支付宝、财富通 等</font>
                    <br>
                    <span>开户地区：</span>
                    <input type="text" name="yes_bank_add" value="<?php echo $this->_var['val']['bank_add']; ?>">&nbsp;<font color="#FF0000">         
					非银行可为空</font>
                    <br>
                    <span>提现帐户：</span>
                    <input type="text" name="yes_bank_sn" value="<?php echo $this->_var['val']['bank_sn']; ?>">
                    <br>
					<span>确认帐户：</span>
                    <input type="text" name="yes_bank_sn_queren" value="">
                    <br>
                    <span>帐户户名：</span>
                    <input type="text" name="yes_bank_username" value="<?php echo $this->_var['val']['bank_username']; ?>" size="10" maxlength="6">
					<br><br>
					<?php if ($this->_var['val']['mibao_id'] == 0): ?>
					<span>支付密码：</span>
					<input name="zf_pass" type="password" id="zf_pass" />
					<br>
					<span><font color="#FF0000">请填写支付密码提示回答验证，若无设置请留空</font></span>
					<?php else: ?>
                    <span>动态密码</span>
<b>
<font color="red">
<?php echo $shuzi1.$zimu1;?><input type="text" id="user_shuzi1" name="user_shuzi1"  size="3" maxlength="3"/>    
<?php echo $shuzi2.$zimu2;?><input type="text" id="user_shuzi2" name="user_shuzi2"  size="3" maxlength="3"/>    
<?php echo $shuzi3.$zimu3;?><input type="text" id="user_shuzi3" name="user_shuzi3"  size="3" maxlength="3"/>
</font>
</b>
<input name="user_zimuz1" id="user_zimuz1" type="hidden" value="<?php echo $zimu1.$shuzi1;?>" />
<input name="user_zimuz2" id="user_zimuz2" type="hidden" value="<?php echo $zimu2.$shuzi2;?>" />
<input name="user_zimuz3" id="user_zimuz3" type="hidden" value="<?php echo $zimu4.$shuzi3;?>" />
					<br>
					<span><font color="#FF0000">保存设置前请填写动态密码</font></span>
					<?php endif; ?>
					<span><BR><BR>
					<input type="submit" class="money_btn" value="保存设置" />
					</span>
</div>
					
<div id="bank_from2" style="color:#646665;float:left;font-size:12px;font-weight:normal;line-height:30px;">
					<span>银行名称</span>
                    <input type="text" value="<?php echo $this->_var['val']['bank_name']; ?>" readonly disabled>
                    <br>
                    <span>当前帐户</span>
                    <input type="text" value="<?php echo $this->_var['val']['bank_sn']; ?>" readonly disabled>
                    <br>
                    <span>当前户名</span>
                    <input type="text" value="<?php echo $this->_var['val']['bank_username']; ?>" size="10" maxlength="6" readonly disabled>

</div>
</form>				  
				
		
         </div>
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