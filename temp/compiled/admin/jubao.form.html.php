<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p><strong>举报管理</strong></p>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    <label for="plugin_name">商品编号:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <?php echo $this->_var['index']['id']; ?>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    <label for="plugin_name">举报说明:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <?php echo $this->_var['index']['jubao_sm']; ?>
                </td>
            </tr>
            <tr>
                <th class="paddingT15"> </th>
                <td class="ptb20"><a href="index.php?app=jubaogl">返回</a>&nbsp;&nbsp;</td>
            </tr>
        </table>
    </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
