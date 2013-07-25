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
    <p>积分兑换添加</p>
    <ul class="subnav">
		<li><a class="btn3" href="index.php?module=my_money&act=jifen_shezhi">返回列表</a></li>
		
    </ul>
</div>

<div class="info">

            <table class="infoTable">
    <form method="post" enctype="multipart/form-data">

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
                <th class="paddingT15">已兑换数</th>
                <td class="paddingT15 wordSpacing5"><input name="yiduihuan" type="text" id="yiduihuan" value="<?php echo $this->_var['val']['yiduihuan']; ?>" size="20" /></td>
            </tr>
            <tr>
                <th class="paddingT15">效果图片</th>
                <td class="paddingT15 wordSpacing5"><input class="infoTableFile" name="wupin_img" type="file" id="wupin_img" />
		  <img class="show_image" src="templates/style/images/right.gif" /><?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['val']['wupin_img']; ?>
          <div style="position:absolute; display:none"><img src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['val']['wupin_img']; ?>" /></div></td>
            </tr>
            <tr>
                <th class="paddingT15">兑换描述</th>
                <td class="paddingT15 wordSpacing5"><textarea name="log_text" id="log_text"><?php echo $this->_var['val']['log_text']; ?></textarea></td>
            </tr>
            <tr>
                <th class="paddingT15">排序</th>
                <td class="paddingT15 wordSpacing5"><input name="ids" type="text" id="ids" value="<?php echo $this->_var['val']['ids']; ?>" size="5" /></td>
            </tr>


	
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