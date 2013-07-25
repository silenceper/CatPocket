<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>网站设置</p>
    <ul class="subnav">
        <li><a class="btn1" href="index.php?app=setting&amp;act=base_setting">系统设置</a></li>
        <li><a class="btn1" href="index.php?app=setting&amp;act=base_information">基本信息</a></li>
        <li><a class="btn1" href="index.php?app=setting&amp;act=email_setting">Email</a></li>
        <li><a class="btn1" href="index.php?app=setting&amp;act=captcha_setting">验证码</a></li>
        <li><a class="btn1" href="index.php?app=setting&amp;act=store_setting">开店设置</a></li>
        <li><a class="btn1" href="index.php?app=setting&amp;act=credit_setting">信用评价</a></li>
        <li><a class="btn1" href="index.php?app=setting&amp;act=subdomain_setting">二级域名</a></li>
        <li><span>积分设置</span></li>        
        </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    是否启用积分功能:</th>
                <td class="paddingT15 wordSpacing5">
                    <input id="integral_enabled0" type="radio" name="integral_enabled" <?php if ($this->_var['setting']['integral_enabled'] == 0): ?>checked<?php endif; ?> value="0" /> <label for="integral_enabled0">关闭</label>
                    <input id="integral_enabled1" type="radio" name="integral_enabled" <?php if ($this->_var['setting']['integral_enabled'] == 1): ?>checked<?php endif; ?> value="1" /> <label for="integral_enabled1">开启</label>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    积分兑换比率:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" type="text" name="exchange_rate" value="<?php echo $this->_var['setting']['exchange_rate']; ?>"/>
                <span class="grey">例如：金钱：积分=1:1，则填写 1，金钱：积分=1:100，则填写 0.01</span>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    注册赠送积分:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" type="text" name="register_integral" value="<?php echo $this->_var['setting']['register_integral']; ?>"/>
                    <span class="grey">用户注册后免费赠送积分值，默认为0</span>
                </td>
            </tr>
			 <tr>            
			 <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="Submit" value="提交" />
                <input class="formbtn" type="reset" name="Submit2" value="重置" />
            </td>
        </tr>
        </table>
    </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
