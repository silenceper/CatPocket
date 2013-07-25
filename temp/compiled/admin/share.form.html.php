<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
//<!CDATA[
$(function(){
    $('#share_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('right').text('OK!');
        },
        rules : {
            title : {
                required : true,
                maxlength: 100
            },
            link  : {
                required : true
            },
            logo  : {
                accept : 'png|jpe?g|gif'
            },
            sort_order : {
                number   : true
            }
        },
        messages : {
            title : {
                required : '分享名称不能为空',
                maxlength: 'title_maxlength_error'
            },
            link  : {
                required : '接口地址不能为空'
            },
            logo  : {
                accept   : 'logo格式错误，只支持gif,jpeg,jpg,png格式'
            },
            sort_order  : {
                number   : '只允许填写数字'
            }
        }
    });
});
//]]>
</script>
<div id="rightTop">
    <p>分享链接</p>
    <ul class="subnav">
        <li><a class="btn1" href="index.php?app=share">管理</a></li>
        <?php if ($this->_var['share']['share_id']): ?>
        <li><a class="btn1" href="index.php?app=share&amp;act=add">新增</a></li>
        <?php else: ?>
        <li><span>新增</span></li>
        <?php endif; ?>
    </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data" id="share_form">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    分享名称:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput2" id="title" type="text" name="title" value="<?php echo htmlspecialchars($this->_var['share']['title']); ?>" />
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    图片标识:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableFile" id="share_logo" type="file" name="logo" value="" /> <label class="field_notice">非必须，但建议上传16x16像素大小的logo图片</label>
                </td>
            </tr>
            <?php if ($this->_var['share']['logo']): ?>
            <tr>
                <th class="paddingT15">
                </th>
                <td class="paddingT15 wordSpacing5">
                <img src="<?php echo $this->_var['share']['logo']; ?>?<?php echo $this->_var['random_number']; ?>" class="makesmall" max_width="16" max_height="16" />
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <th class="paddingT15">
                    接口地址:</th>
                <td class="paddingT15 wordSpacing5">
                    <textarea class="infoTableInput" id="link" type="text" name="link"><?php echo htmlspecialchars($this->_var['share']['link']); ?></textarea><br /><label class="field_notice">接口地址中{$title}表示分享标题，{$link}表示分享地址。<br/>&nbsp;例如：http://www.kaixin001.com/repaste/share.php?rtitle={$title}&rurl={$link}</label>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    <label for="type">类别:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <?php echo $this->html_radios(array('options'=>$this->_var['type'],'checked'=>$this->_var['share']['type'],'name'=>'type')); ?>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    排序:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="sort_order" id="sort_order" type="text" name="sort_order" value="<?php echo $this->_var['share']['sort_order']; ?>" />
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
