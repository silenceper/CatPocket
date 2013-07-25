<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">
                <li class="active">我的帐户</li>
				<li class="normal"><a href="index.php?app=my_money&act=buyer">买入记录</a></li>
				<li class="normal"><a href="index.php?app=my_money&act=seller">卖出记录</a></li>
				<li class="normal"><a href="index.php?app=my_money&act=intolog">zhuanruchaxun</a></li>
				<li class="normal"><a href="index.php?app=my_money&act=outlog">zhuanchuchaxun</a></li>
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
		



        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>

<div class="clear"></div>
<?php echo $this->fetch('footer.html'); ?>
