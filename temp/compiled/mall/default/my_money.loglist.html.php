<?php echo $this->fetch('member.header.html'); ?>
<script language = "JavaScript">
function tousers()
{


   if (document.to_users.to_user.value=="")
  {
    alert("转移的用户名不能为空！");
	document.to_users.to_user.focus();
	return false;
  }
  
  if (document.to_users.to_money.value=="")
  {
    alert("填写转移的金额！");
	document.to_users.to_money.focus();
	return false;
  }
 /*提交按钮警告 */
  if(confirm('确定要转出资金吗？'))
  {
  return true;
  }
  else
  {
  return false;
  }


  return true;  
}


function check_user_name()
{
    if(document.getElementById("sure_user").value!=document.getElementById("to_user").value)
	{
	    document.getElementById("sure_user").value="";
		alert('用户名不一致');
		
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
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">
                <li class="active">我的帐户</li>
				<li class="normal"><a href="index.php?app=my_money&act=buyer">买入记录</a></li>
				<li class="normal"><a href="index.php?app=my_money&act=seller">卖出记录</a></li>
				<li class="normal"><a href="index.php?app=my_money&act=intolog">转帐记录</a></li>
				<li class="normal"><a href="index.php?app=my_money&act=otherlog">其它记录</a></li>
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
&nbsp;元&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提现冻结金额：<span style="color:blue;"><?php echo $this->_var['val']['money_dj']; ?></span>&nbsp;元
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;积分：<span style="color:blue;"><?php echo $this->_var['val']['jifen']; ?></span></span>
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
            <h3 class="title" style="margin: -10px 0 20px; color:#3E3E3E">余额转帐</h3>
              <div style="color:#646665;float:left;font-size:12px;font-weight:normal;line-height:30px;">
				<?php $_from = $this->_var['my_money']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
				<form name="to_users" onSubmit="return tousers();" action="index.php?app=my_money&act=to_user" method="post">
                  <span>目标用户：</span>
                  <input name="sure_user" type="text" id="sure_user" size="10">
                 <span>确认目标用户：</span>
                  <input name="to_user" type="text" id="to_user" size="10" onblur="check_user_name()">
				    转出金额：<input name="to_money" type="text" id="to_money" size="6">
                    &nbsp;元
                    &nbsp; &nbsp;
                   <BR>
				   <?php if ($this->_var['val']['mibao_id']): ?>
				   <span>动态密码：</span>
				   <b><font color="red">
<?php echo $shuzi1.$zimu1;?><input type="text" id="user_shuzi1" name="user_shuzi1"  size="3" maxlength="3"/>    
<?php echo $shuzi2.$zimu2;?><input type="text" id="user_shuzi2" name="user_shuzi2"  size="3" maxlength="3"/>    
<?php echo $shuzi3.$zimu3;?><input type="text" id="user_shuzi3" name="user_shuzi3"  size="3" maxlength="3"/>
</font></b><BR><font color="red">请填写动态密码对应的数字</font>
				   <input name="user_zimuz1" id="user_zimuz1" type="hidden" value="<?php echo $zimu1.$shuzi1;?>" />
				   <input name="user_zimuz2" id="user_zimuz2" type="hidden" value="<?php echo $zimu2.$shuzi2;?>" />
				   <input name="user_zimuz3" id="user_zimuz3" type="hidden" value="<?php echo $zimu3.$shuzi3;?>" />
                   <?php else: ?>
				   <span>支付密码：</span>
				   <input name="zf_pass" type="password" id="zf_pass"  size="16" maxlength="16"/>
				   <BR>
				   <font color="red">转帐前请输入支付密码</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?app=my_money&act=find_password" style="color:#0000FF;" target="_blank">忘记支付密码</a>
				   <?php endif; ?>
                   <BR><BR>

				   
				   <span><input type="submit" class="money_btn" value="确认转出" /></span>
                </form>	
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		   </div>
          </div>
         </div>


        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>

<div class="clear"></div>
<?php echo $this->fetch('footer.html'); ?>
