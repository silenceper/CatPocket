<?php echo $this->fetch('member.header.html'); ?>
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
				<li class="active">提现申请</li>
				<li class="normal"><a href="?app=my_money&act=txlog">提现记录</a></li>
				<li class="normal"><a href="?app=my_money&act=mylist">设置提现帐号</a></li>
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
				  <h3 class="title" style="margin: -10px 0 20px; color:#3E3E3E">提现申请</h3>
                  <div style="color:#646665;float:left;font-size:12px;font-weight:normal;line-height:30px;">
				  <form name="to_users" onSubmit="return tousers();" action="index.php?app=my_money&act=txsq" method="post">
				  <span>提现帐户：</span>
				  <?php if ($this->_var['val']['bank_sn'] == ""): ?>
				  <a href="?app=my_money&act=mylist">请先设置提现帐号!</a>
				  <?php else: ?>
				  <?php echo substr($this->_var['val']['bank_sn'],0,4);?><font color="#FF0000">****</font><?php echo substr($this->_var['val']['bank_sn'],-4);?>				  
				  <?php endif; ?>
				  <BR>
                  <span>提现金额：</span>
                  <input name="tx_money" type="text" id="tx_money" size="8">
                  &nbsp;元<BR>
				  <?php if ($this->_var['val']['mibao_id'] == 0): ?>
                  <span>支付密码：</span>
				  <input name="post_zf_pass" type="password" id="post_zf_pass" size="12">
				  <?php else: ?>
				  <span>动态密码：</span>
<b>
<font color="red">
<?php echo $shuzi1.$zimu1;?><input type="text" id="user_shuzi1" name="user_shuzi1"  size="3" maxlength="3"/>    
<?php echo $shuzi2.$zimu2;?><input type="text" id="user_shuzi2" name="user_shuzi2"  size="3" maxlength="3"/>    
<?php echo $shuzi3.$zimu3;?><input type="text" id="user_shuzi3" name="user_shuzi3"  size="3" maxlength="3"/>
</font>
</b>
<input name="user_zimuz1" id="user_zimuz1" type="hidden" value="<?php echo $zimu1.$shuzi1;?>" />
<input name="user_zimuz2" id="user_zimuz2" type="hidden" value="<?php echo $zimu2.$shuzi2;?>" />
<input name="user_zimuz3" id="user_zimuz3" type="hidden" value="<?php echo $zimu3.$shuzi3;?>" />
				  <?php endif; ?>

                  <BR><BR><span><input type="submit" class="money_btn" value="提现申请" /></span>
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