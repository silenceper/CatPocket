<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p><b>申述详细</b></p>
</div>
<div class="info">
<form method="POST" >
    <div class="order_form">
        <h1>申述详细</h1>
        <table width="40%">
        <tr>
        	<td width="30%" height="30px">买家ID:</td>
            <td><?php echo $this->_var['jifen_info']['buyer_id']; ?></td>
        </tr>
        <tr>
        	<td width="30%" height="30px">买家名称:</td>
            <td><?php echo $this->_var['jifen_info']['buyer_name']; ?></td>
        </tr>
        <tr>
        	<td width="30%" height="30px">卖家ID:</td>
            <td><?php echo $this->_var['jifen_info']['seller_id']; ?></td>
        </tr>
        <tr>
        	<td width="30%" height="30px">卖家名称:</td>
            <td><?php echo $this->_var['jifen_info']['seller_name']; ?></td>
        </tr>
        <tr>
        	<td width="30%" height="30px">申述时间:</td>
            <td><?php echo local_date("Y-m-d H:i:s",$this->_var['jifen_info']['add_time']); ?></td>
        </tr>
        <tr>
        	<td width="30%" height="30px">积分:</td>
            <td><?php echo $this->_var['jifen_info']['jifen']; ?></td>
        </tr>
        </table>
        <div class="clear"></div>
    </div>
    <div>
		<input type="button" value="积分给技术员" onclick="go('index.php?app=ss_jifen&amp;act=submit&amp;id=<?php echo $this->_var['jifen_info']['ss_id']; ?>')" name="Submit">
        <input type="button" value="积分给卖家" onclick="go('index.php?app=refund&amp;act=failure&amp;id=<?php echo $this->_var['jifen_info']['ss_id']; ?>')" name="Submit" >
    </div>
</div>
</form>
<?php echo $this->fetch('footer.html'); ?>
