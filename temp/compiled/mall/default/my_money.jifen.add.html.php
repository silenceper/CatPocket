<?php echo $this->fetch('member.header.html'); ?>
<style type="text/css">
.top_tab{width:400px;float:left;border:solid 1px #CCCCCC;height:100%}
.top_menu{height:30px;background-color:#EDEDED;line-height:30px;padding-left:20px;border:solid 1px #999999;font-weight:bold;color:#F60}
.setting{float:right;width:100px;border-left:#CCCCCC 1px solid;height:267px;}
.setting h3{padding:5px;}
.con_cz{float:left;padding:50px 0 0 10px;}
.con_cz but{padding:10px 0 0 10px}

.t_class tr td {border:1px solid #eee;padding:5px; text-align:center}
</style>
<script type="text/javascript">
function copyCode(card_id){
	var value='亲，为感谢您对本店的支持。特向您赠送一张礼品卡（密码:'+document.getElementById(card_id).value+'），请在15天之内登陆猫口袋网站www.maikoudai.com领取积分。10积分=1元人民币，积分常年有效，可以累积使用，全能积分用途包含：“淘宝网购物抵货款、抵运费、猫口袋换购礼品，充手机话费、买Q币……”';
	if(copy2Clipboard(value)!=false){
		alert('已复制到粘贴板，使用ctrl+v粘帖即可');
	}
}
function copy2Clipboard(txt){
	if(window.clipboardData){
		window.clipboardData.clearData();
		window.clipboardData.setData("Text",txt);
	}
	else if(navigator.userAgent.indexOf("Opera")!=-1){
		window.location=txt;
	}
	else if(window.netscape) {
		try{netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");}
		catch(e) {
			alert("您的firefox安全限制限制您进行剪贴板操作，请打开'about:config'将 'signed.applets.codebase_principal_support'设置为'true'之后重试，相对路径为firefox根目录 /greprefs/all.js");
			return false;
		}
		var clip=Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
		if(!clip) return;
		var trans=Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
		if(!trans) return;
		trans.addDataFlavor('text/unicode');
		var str=new Object();
		var len=new Object();
		var str=Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
		var copytext=txt;
		str.data=copytext;
		trans.setTransferData("text/unicode",str,copytext.length*2);
		var clipid=Components.interfaces.nsIClipboard;
		if(!clip) return false;
		clip.setData(trans,null,clipid.kGlobalClipboard);
	}
}


</script>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">
				<li class="active" ><a href="index.php?app=my_money&act=jifenguanli">积分管理</a></li>
				<li class="normal"><a href="index.php?app=my_money&act=jifen_jilu">积分记录</a></li>
          </ul>
          
        <div class="wrap margin1">
            <div class="public table">
				<div class="information_index" style="overflow:hidden; margin: 0px 0 -15px;">
                    <span>您现有积分：<span style="color:#FF6600;font-size:14px;font-weight:bold;"><?php echo $this->_var['user_jf']; ?></span></span>
                    <span style="padding-left:100px;">您的账户余额：<span style="color:#FF6600;font-size:14px;font-weight:bold;"><?php echo $this->_var['user_money']; ?>元</span></span>	
                </div>
             </div>
        </div>


<?php if ($this->_var['store_id']): ?>
           <div class="wrap margin1">
            <div class="public table">            <h3 class="title" style="margin: -10px 0 20px; color:#3E3E3E">积分充值</h3>

                  <div style="color:#646665;float:left;font-size:12px;font-weight:normal;line-height:30px;">
<form action="index.php?app=my_money&act=jfcz" method="post">
				  您要充值的积分数：<input name="jf_num" type="text" id="jf_num"  size="15" />
                  &nbsp;&nbsp;
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
				   <font color="red">请输入支付密码</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?app=my_money&act=find_password" style="color:#0000FF;" target="_blank">忘记支付密码</a>
				   <?php endif; ?>
                   &nbsp;&nbsp;
                   <br/><br/>
                   &nbsp;&nbsp;&nbsp;<input type="submit" class="money_btn" value="立即充值" />&nbsp;&nbsp;&nbsp;
				  积分兑换规则：每兑换<span style="color:#FF0000;font-weight:bold;font-size:14px;">10</span>个积分，你将花费<span style="color:#FF0000;font-weight:bold;font-size:14px;"><?php echo $this->_var['user_setting']; ?></span>元。
                  <input type="hidden" value="<?php echo $this->_var['user_setting']; ?>" name="user_setting" />

                  
</form>
                  </div>
			</div>
           </div>		
		
<?php endif; ?>


           <div class="wrap">
            <div class="public table">
            <h3 class="title" style="margin: -10px 0 20px; color:#3E3E3E">领取积分</h3>
                  <div style="color:#646665;float:left;font-size:12px;font-weight:normal;line-height:30px;">
				  <form action="index.php?app=my_money&act=lqjf" method="post" >
				  礼品卡号：
                  <input name="card_num" type="text" size="15" />
                  <input type="submit" class="money_btn" value="立即领取" />
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  礼品卡号为商家提供的礼品卡的卡号
                  </form>
             </div>
			</div>
           </div>		
	
<?php if ($this->_var['store_id']): ?>

           <div class="wrap">
            <div class="public table">
            <h3 class="title" style="margin: -10px 0 20px; color:#3E3E3E">生成礼品卡</h3>
                  <div style="color:#646665;float:left;font-size:12px;font-weight:normal;line-height:30px;">
<form action="index.php?app=my_money&act=scjf" method="post" >
				 前缀：
                  <input name="head_c" id="head_c" type="text" size="6" />
                 数量：
                  <input name="num_c" id="num_c" type="text" size="6" />
                 积分：
                  <input name="jf_c" id="jf_c" type="text" size="6" />
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
				   <font color="red">请输入支付密码</font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?app=my_money&act=find_password" style="color:#0000FF;" target="_blank">忘记支付密码</a>
				   <?php endif; ?>
                   <br />
                  <input type="submit" class="money_btn" value="立即生成" />
                  &nbsp;&nbsp;&nbsp;注：礼品卡15天未使用将作废，该卡用于商家赠送给买家
                  </form>
             </div>
			</div>
           </div>	
           <div class="wrap">
            <div class="public table">
              <table class="t_class">

                <tr class="tatr1">
                    <td width="150">卡号</td>
                    <td align="left" width="80">面值</td>
                    <td align="left">生成时间</td>
                    <td align="left">过期时间</td>
                    <td align="left">状态</td>
                    <td align="left">兑分客户</td>
                </tr>

                <?php $_from = $this->_var['store_card_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
                <tr>
                    <td><?php echo htmlspecialchars($this->_var['card']['card_num']); ?><input type="hidden" value="<?php echo $this->_var['card']['card_num']; ?>" id="card_<?php echo $this->_var['card']['card_num']; ?>" name="card_<?php echo $this->_var['card']['card_num']; ?>"></td>
                    <td style="color:#F60"><?php echo $this->_var['card']['jf_count']; ?></td>
                    <td><?php echo local_date("Y-m-d H:i:s",$this->_var['card']['add_time']); ?></td>
                    <td><?php echo local_date("Y-m-d H:i:s",$this->_var['card']['end_time']); ?></td>
                    <?php if ($this->_var['card']['c_state'] == 0): ?>
                    <td style="color:#F60">未使用</td>   
                    <?php elseif ($this->_var['card']['c_state'] == 1): ?>  
                    <td>已使用</td>  
                    <?php endif; ?>
                    <?php if ($this->_var['card']['c_state'] == 0): ?>
                    <td><input onclick="copyCode('card_<?php echo $this->_var['card']['card_num']; ?>');return false;" type="button" value="点击复制" /></td>
                    <?php elseif ($this->_var['card']['c_state'] == 1): ?>  
                    <td><?php echo $this->_var['card']['user_name']; ?></td>  
                    <?php endif; ?>	
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="6">
                        没有符合条件的记录
                    </td>
                </tr>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php if ($this->_var['page_info']['page_count'] > 1): ?>
                <tr>
                    <td colspan="6">
                        <?php echo $this->fetch('member.page.bottom.html'); ?>
                    </td>
                </tr>
              <?php endif; ?>
              </table>
              </div>
           </div>	
<?php endif; ?>	


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
