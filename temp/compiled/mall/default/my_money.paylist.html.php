<?php echo $this->fetch('member.header.html'); ?>
<script language = "JavaScript">
function chongzhi()
{
  if (document.chongzhi_form.cz_money.value=="")
  {
    alert("填写要充值的金额");
	document.chongzhi_form.cz_money.focus();
	return false;
  }

  return true;  
}


function card()
{
  if (document.card_form.card_sn.value =="")
  {
    alert("充值卡卡号不能为空!");
	document.card_form.card_sn.focus();
	return false;
  }
  if (document.card_form.card_pass.value =="")
  {
    alert("充值卡密码不能为空!");
	document.card_form.card_pass.focus();
	return false;
  }
  return true;  
}
</script>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">
				<li class="active">在线充值</li>
				<li class="normal"><a href="index.php?app=my_money&act=paylog">充值记录</a></li>
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
            <h3 class="title" style="margin: -10px 0 20px; color:#3E3E3E">在线充值</h3>
                  <div style="color:#646665;float:left;font-size:12px;font-weight:normal;line-height:30px;">
<form name="chongzhi_form" onSubmit="return chongzhi();" action="index.php?app=my_money&act=scfs_info" method="post" target="_blank">
				  充值金额：
                  <input name="cz_money" type="text" value="100" size="8" />&nbsp;元
                    充值方式：
                  <select name="czfs" class="select">
                  <?php $_from = $this->_var['payment_all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pay');if (count($_from)):
    foreach ($_from AS $this->_var['pay']):
?>
 		              <option value="<?php echo $this->_var['pay']['payment_code']; ?>"><?php echo $this->_var['pay']['payment_name']; ?></option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>               
		  </select>
                  <BR><BR><input type="submit" class="money_btn" value="立即充值" />
                  </form>
             </div>
			</div>
           </div>		
	

           <div class="wrap margin1">
            <div class="public table">
            <h3 class="title" style="margin: -10px 0 20px; color:#3E3E3E">充值卡充值</h3>
                  <div style="color:#646665;float:left;font-size:12px;font-weight:normal;line-height:30px;">
<form name="card_form" onSubmit="return card();" action="index.php?app=my_money&act=card_cz" method="post" target="_blank">
				  充值卡卡号：<input name="card_sn" type="text" id="card_sn" size="30" />
				  <br>                  
				  充值卡密码：<input name="card_pass" type="text" id="card_pass" size="30" />
				  <br><br>
                  <input type="submit" class="money_btn" value="立即充值" />
                  </form>
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
</div>
<div class="clear"></div>
<iframe id='iframe_post' name="iframe_post" frameborder="0" width="0" height="0">
</iframe>
<?php echo $this->fetch('footer.html'); ?>
