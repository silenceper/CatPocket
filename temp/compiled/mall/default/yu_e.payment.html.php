<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>


<div class="content">
    <form action="index.php?app=cashier&act=payment&order_id=<?php echo $this->_var['order']['order_id']; ?>" method="POST" id="payment">
    <div class="module_common">
        <div class="step_main">
            <div class="order_information">
                <h3>
                    <b>订单号&nbsp;:&nbsp;<span><?php echo $this->_var['order']['order_sn']; ?></span></b>
                    <b>订单总价&nbsp;:&nbsp;<span><?php echo price_format($this->_var['order']['order_amount']); ?></span></b>
                </h3>
                <p><a href="<?php echo url('app=buyer_order'); ?>" target="_blank">您可以在用户中心中的我的订单查看该订单</a></p>
                <input type="hidden" id="payment_id" name="payment_id" value="<?php echo $this->_var['pay_id']; ?>"/>
            </div>

            <div class="make_sure">
            	<p style="width:300px;float:left;"><label>支付密码：</label><input type="password" class="text" id="zf_pass" name="zf_pass" /></p>
                <p style="width:200px;float:left;">
                    <a href="javascript:$('#payment').submit();" class="btn">确认支付</a>
                </p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    </form>
</div>

<?php echo $this->fetch('footer.html'); ?>