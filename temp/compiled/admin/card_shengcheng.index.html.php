<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
function card()
{
  if (document.card_form.guoqi_time.value =="")
  {
    alert("过期时间不能为空!");
	document.card_form.guoqi_time.focus();
	return false;
  }
  if (document.card_form.money.value =="")
  {
    alert("面值不能为空!");
	document.card_form.money.focus();
	return false;
  }
  return true;  
}

$(function(){
    $('#guoqi_time').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>动态密保管理</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=card_yichongzhi">已充值</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=card_guoqi">已过期</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=card_weichongzhi">未充值</a></li>
		<li><span>新卡生成</span></li>
		
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form name="card_form" onSubmit="return card();" action="index.php" target="stafrm">
            <div class="left">
              
              <input name="module" type="hidden" id="module" value="my_money" />
              <input name="act" type="hidden" id="act" value="card_add_pi" />
              前缀:
              <input name="snprefix" type="text" id="snprefix" value="SN" size="5" />
			  &nbsp;字母
			  <input name="ctype" type="radio" value="2" checked="checked" />
			  数字
			  <input type="radio" name="ctype" value="1" />
			  &nbsp;生成数量:
              <input name="mnum" type="text" id="mnum" value="10" size="3" />
              &nbsp;组合数:
              <input name="pwdgr" type="text" id="pwdgr" value="3" size="3" />
			  &nbsp;组合长度:
              <input name="pwdlen" type="text" id="pwdlen" value="4" size="3" />

              &nbsp;密码长度:
              <input name="m_pwdlen" type="text" id="m_pwdlen" value="10" size="3" />
              &nbsp;面值:
              <input name="money" type="text" id="money" value="100" size="3" />
              &nbsp;过期:
			  <input name="guoqi_time" type="text" id="guoqi_time" size="10" />
              <input type="submit" class="formbtn" value="生成" />
          </div>
		  
      </form>
    </div>

</div>

 <iframe name="stafrm" frameborder="0" id="stafrm" width="98%" height="300"></iframe>
 <br><br>
<?php echo $this->fetch('footer.html'); ?>