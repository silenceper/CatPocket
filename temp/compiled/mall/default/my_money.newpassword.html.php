<?php echo $this->fetch('member.header.html'); ?>

<script language = "JavaScript">
/*修改密码表单*/
function editpass()
{

  
  if (document.edit_pass.zf_pass.value=="")
  {
    alert("密码不能为空！");
	document.edit_pass.zf_pass.focus();
	return false;
  }

  if (document.edit_pass.zf_pass2.value=="")
  {
    alert("querenmimabunengweikong");
	document.edit_pass.zf_pass2.focus();
	return false;
  }
  
  if (document.edit_pass.zf_pass.value != edit_pass.zf_pass2.value)
  {
    alert("错误：两次输入密码不一致!");
	document.edit_pass.zf_pass2.focus();
	return false;
  } 
  return true;  
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
				<li class="active">设置支付密码</li>
                
          </ul>
        <div class="wrap">
        <div class="eject_con bgwhite">
            <div class="add">
                <form name="edit_pass" onSubmit="return editpass()" method="post">
                        <ul>

                            <li>
                                <h3>新支付密码:</h3>
                                <p>
                                    <input name="zf_pass" type="password" id="zf_pass"/>
                                    <label class="field_notice">支付密码建议密码采用字母和数字混合，且不短于6位</label></p>
                            </li>
                            <li>
                                <h3>确认新密码:</h3>
                                <p>
                                    <input name="zf_pass2" type="password" id="zf_pass2" />
                                    <label class="field_notice">再输入一次</label></p>
                            </li>
                        </ul>
                    <div class="submit">
                        <input class="btn" type="submit" value="设置支付密码" />
                    </div>
                </form>
            </div>
</div>	</div>			

			

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
