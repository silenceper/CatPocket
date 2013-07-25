<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="index.php?act=jslang"></script>

<div id="rightTop">
  <p>商品</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=goods">所有商品</a></li>
    <li><a class="btn1" href="index.php?app=goods&amp;closed=1">禁售商品</a></li>
    <li><span>待审查商品</span></li>
  </ul>
</div>
<div class="info">
  <form method="post" id="store_form">
    <table class="infoTable">
      <tr>
        <th class="paddingT15">店铺名:</th>
        <td class="paddingT15 wordSpacing5"><?php echo $this->_var['goods_list']['store_name']; ?></td>
      </tr>
      <tr>
        <th class="paddingT15">商品名:</th>
        <td class="paddingT15 wordSpacing5"><?php echo $this->_var['goods_list']['goods_name']; ?></td>
      </tr>
      <tr>
        <th class="paddingT15">分类名:</th>
        <td class="paddingT15 wordSpacing5"><?php echo $this->_var['goods_list']['cate_name']; ?></td>
      </tr>
      <tr>
        <th class="paddingT15">品牌:</th>
        <td class="paddingT15 wordSpacing5"><?php echo $this->_var['goods_list']['brand']; ?></td>
      </tr>
      <tr>
        <th class="paddingT15">原价:</th>
        <td class="paddingT15 wordSpacing5"><?php echo price_format($this->_var['goods_list']['price']); ?></td>
      </tr>
      <tr>
        <th class="paddingT15">促销价:</th>
        <td class="paddingT15 wordSpacing5"><?php echo price_format($this->_var['goods_list']['bargin_price']); ?></td>
      </tr>
      <tr>
        <th class="paddingT15">猫粮:</th>
        <td class="paddingT15 wordSpacing5"><?php echo $this->_var['goods_list']['cat_food']; ?></td>
      </tr>
      <tr>
      	<th class="paddingT15"> 淘宝链接:</th>
        <td class="paddingT15 wordSpacing5"><?php echo $this->_var['goods_list']['taobao_url']; ?></td>
      </tr>
      <tr>
         <th class="paddingT15"> 拍拍链接:</th>
         <td class="paddingT15 wordSpacing5"><?php echo $this->_var['goods_list']['paipai_url']; ?></td>
      </tr>
      <tr>
          <th class="paddingT15">添加时间:</th>
          <td class="paddingT15 wordSpacing5"><?php echo local_date("Y-m-d H:i:s",$this->_var['goods_list']['add_time']); ?></td>
      </tr>
      <tr id="tr_close_reason">
          <th class="paddingT15" valign="top">禁售原因:</th>
          <td class="paddingT15 wordSpacing5"><label for="close_reason"></label>
              <textarea name="close_reason" id="close_reason" name="close_reason"></textarea></td>
      </tr>
      <tr>
        <th class="paddingT15"> 操作:</th>
        <td class="paddingT15 wordSpacing5">
          <label for="true">
          <input name="is_true" type="radio" id="true" value="1" <?php if ($this->_var['goods_list']['is_checked'] == 1): ?>checked="checked"<?php endif; ?> />
          通过</label>
          <label for="false">
          <input type="radio" name="is_true" value="2" id="false" <?php if ($this->_var['goods_list']['is_checked'] == 0): ?>checked="checked"<?php endif; ?> />
          禁售</label>
        </td>
      </tr>
      <tr>
        <th></th>
        <td class="ptb20"><input class="formbtn" type="submit" name="Submit" value="提交" />
          <input class="formbtn" type="reset" name="Reset" value="重置" /></td>
      </tr>
    </table>
  </form>
</div>
<?php echo $this->fetch('footer.html'); ?>