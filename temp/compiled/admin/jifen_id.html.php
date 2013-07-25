<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
//<!CDATA[
$(function(){
    $(".show_image").mouseover(function(){
        $(this).next("div").show();
    });
    $(".show_image").mouseout(function(){
        $(this).next("div").hide();
    });
});
//]]>
</script>
<div id="rightTop">
    <p>编辑查看</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&amp;act=jifen_yiduihuan">返回列表</a></li>
		
    </ul>
</div>

<div class="info">
<?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
            <table class="infoTable">
    <form method="post" enctype="multipart/form-data">

            <tr>
                <th class="paddingT15">兑换会员</th>
                <td class="paddingT15 wordSpacing5">
				<input name="user_name" type="text" id="user_name" value="<?php echo $this->_var['val']['user_name']; ?>" size="20">				</td>
            </tr>
            <tr>
                <th class="paddingT15">物品名称</th>
                <td class="paddingT15 wordSpacing5">
				<input name="wupin_name" type="text" id="wupin_name" value="<?php echo $this->_var['val']['wupin_name']; ?>" size="20">				</td>
            </tr>
            <tr>
                <th class="paddingT15">兑换积分</th>
                <td class="paddingT15 wordSpacing5">
				<input name="jifen" type="text" id="jifen" value="<?php echo $this->_var['val']['jifen']; ?>" size="20"></td>
            </tr>
            <tr>
                <th class="paddingT15">物品价值</th>
                <td class="paddingT15 wordSpacing5">
				<input name="jiazhi" type="text" id="jiazhi" value="<?php echo $this->_var['val']['jiazhi']; ?>" size="20"></td>
            </tr>
            <tr>
                <th class="paddingT15">数量</th>
                <td class="paddingT15 wordSpacing5"><input name="shuliang" type="text" id="shuliang" value="<?php echo $this->_var['val']['shuliang']; ?>" size="20" /></td>
            </tr>
            <tr>
                <th class="paddingT15">兑换描述</th>
                <td class="paddingT15 wordSpacing5"><textarea name="log_text" id="log_text"><?php echo $this->_var['val']['log_text']; ?></textarea></td>
            </tr>
            <tr>
                <th class="paddingT15">真实姓名</th>
                <td class="paddingT15 wordSpacing5"><input name="my_name" type="text" id="my_name" value="<?php echo $this->_var['val']['my_name']; ?>" size="20" /></td>
            </tr>
            <tr>
                <th class="paddingT15">地址</th>
                <td class="paddingT15 wordSpacing5"><input name="my_add" type="text" id="my_add" value="<?php echo $this->_var['val']['my_add']; ?>" size="60" /></td>
            </tr>
            <tr>
                <th class="paddingT15">电话</th>
                <td class="paddingT15 wordSpacing5"><input name="my_tel" type="text" id="my_tel" value="<?php echo $this->_var['val']['my_tel']; ?>" size="20" /></td>
            </tr>
            <tr>
                <th class="paddingT15">手机</th>
                <td class="paddingT15 wordSpacing5"><input name="my_mobile" type="text" id="my_mobile" value="<?php echo $this->_var['val']['my_mobile']; ?>" size="20" /></td>
            </tr>
            <tr>
                <th class="paddingT15">物流名称</th>
                <td class="paddingT15 wordSpacing5"><input name="wuliu_name" type="text" id="wuliu_name" value="<?php echo $this->_var['val']['wuliu_name']; ?>" size="20" /></td>
            </tr>
            <tr>
                <th class="paddingT15">物流单号</th>
                <td class="paddingT15 wordSpacing5"><input name="wuliu_danhao" type="text" id="wuliu_danhao" value="<?php echo $this->_var['val']['wuliu_danhao']; ?>" size="20" /></td>
            </tr>
            <tr>
                <th class="paddingT15">审核状态</th>
                <td class="paddingT15 wordSpacing5"><?php if ($this->_var['val']['shenhe']): ?><font color="#FF0000">已审核</font><?php else: ?><font color="#FF0000">未审核</font><?php endif; ?></td>
            </tr>
            <tr>
                <th class="paddingT15">状态</th>
                <td class="paddingT15 wordSpacing5">
				<input name="shenhe" type="radio" value="1" <?php if ($this->_var['val']['shenhe'] == 1): ?> checked="checked"<?php endif; ?>/>
				通过
				<input name="shenhe" type="radio" value="0" <?php if ($this->_var['val']['shenhe'] == 0): ?> checked="checked"<?php endif; ?> />
				拒绝
				</td>
            </tr>


	
            <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="Submit" value="审核" />
                <input class="formbtn" type="reset" name="Submit2" value="重置" />            </td>
            </tr>
    </form>
      </table>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
</div>
<?php echo $this->fetch('footer.html'); ?>