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
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
          <ul class="tab">
				<li class="active" ><a href="index.php?app=cat_food">猫粮管理</a></li>
				<li class="normal"><a href="index.php?app=cat_food&act=catfood_jilu">猫粮记录</a></li>
          </ul>
          
        <div class="wrap margin1">
            <div class="public table">
				<div class="information_index" style="overflow:hidden; margin: 0px 0 -15px;">
                	<h3 class="margin2">
                    <span>您好，<?php echo $this->_var['visitor']['user_name']; ?>！&nbsp;&nbsp;<a href="<?php echo $this->_var['site_url']; ?>/index.php?app=article&act=view&article_id=18
" style="color:red;" target="_blank">什么是猫粮？</a></span>
                    </h3>
                    <span>您现有猫粮：<span style="color:#FF6600;font-size:14px;font-weight:bold;"><?php echo $this->_var['stores']['cat_food']; ?></span></span>
                    <span style="padding-left:100px;">您的账户余额：<span style="color:#FF6600;font-size:14px;font-weight:bold;"><?php echo $this->_var['user_money']; ?>元</span></span>	
                </div>
             </div>
        </div>

           <div class="wrap margin1">
            <div class="public table">            <h3 class="title" style="margin: -10px 0 20px; color:#3E3E3E">购买猫粮</h3>

                  <div style="color:#646665;float:left;font-size:12px;font-weight:normal;line-height:30px;">
<form action="index.php?app=cat_food&act=foodcz" method="post">
				  您要购买的猫粮数：<input name="food_num" type="text" id="food_num"  size="15" />
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
                   <br/><br/>
                   &nbsp;&nbsp;&nbsp;<input type="submit" class="money_btn" value="立即购买" />
				  &nbsp;&nbsp;&nbsp;猫粮兑换规则：每兑换<span style="color:#FF0000;font-weight:bold;font-size:14px;">1</span>颗猫粮，你将花费<span style="color:#FF0000;font-weight:bold;font-size:14px;"><?php echo $this->_var['catfood_rate']; ?></span>元。

                  
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
