<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>财务账号设置</p>
    <ul class="subnav">
    </ul>
</div>

<div class="info">

            <table class="infoTable">
    <form method="post">
<?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
            <tr>
                <th class="paddingT15">网银KEY</th>
                <td class="paddingT15 wordSpacing5">
				<input name="chinabank_key" type="text" id="chinabank_key" value="<?php echo $this->_var['val']['chinabank_key']; ?>" size="20">				</td>
            </tr>
            <tr>
                <th class="paddingT15">网银MID</th>
              <td class="paddingT15 wordSpacing5">
				<input name="chinabank_mid" type="text" id="chinabank_mid" value="<?php echo $this->_var['val']['chinabank_mid']; ?>" size="20"></td>
            </tr>
            <tr>
                <th class="paddingT15">网银URL</th>
                <td class="paddingT15 wordSpacing5"><input name="chinabank_url" type="text" id="chinabank_url" value="<?php echo $this->_var['val']['chinabank_url']; ?>" size="80" /></td>
            </tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	
            <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="Submit" value="提交" />
                <input class="formbtn" type="reset" name="Submit2" value="重置" />            </td>
            </tr>
    </form>
      </table>	
</div>
<?php echo $this->fetch('footer.html'); ?>