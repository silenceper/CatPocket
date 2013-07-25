<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>动态密保管理</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=mibao_zhengchang">正常使用</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=mibao_zanting">已暂停</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=mibao_guoqi">已过期</a></li>
		<li><a class="btn3" href="index.php?module=my_money&act=mibao_xinka">新卡列表</a></li>
		<li><span>新卡生成</span></li>
		<li><a class="btn3" href="index.php?module=my_money&act=index">返回导航</a></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form action="index.php?module=my_money&act=mibao_sn_pi" target="stafrm">
            <div class="left">
              
              <input name="module" type="hidden" id="module" value="my_money" />
              <input name="act" type="hidden" id="act" value="mibao_sn_pi" />
              密卡前缀:
              <input name="snprefix" type="text" id="snprefix" value="SN" size="8" />
			  &nbsp;&nbsp;&nbsp;&nbsp;大写字母:
			  <input name="ctype" type="radio" value="2" checked="checked" />
			  纯数字:
			  <input type="radio" name="ctype" value="1" />
			  &nbsp;&nbsp;&nbsp;&nbsp;生成数量:
              <input name="mnum" type="text" id="mnum" value="10" size="6" maxlength="6" />
              &nbsp;&nbsp;组合数:
              <input name="pwdgr" type="text" id="pwdgr" value="3" size="4" />
			  &nbsp;&nbsp;组合长度:
              <input name="pwdlen" type="text" id="pwdlen" value="4" size="4" />
              &nbsp;&nbsp; 
              <input type="submit" class="formbtn" value="生成" />
          </div>
      </form>
    </div>

</div>

 <iframe name="stafrm" frameborder="0" id="stafrm" width="98%" height="300"></iframe>
 <br><br>
<?php echo $this->fetch('footer.html'); ?>