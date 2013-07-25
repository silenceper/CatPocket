<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
  <p></p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=show_index&amp;act=show_index">首页推荐</a></li>
    <li><a class="btn1" href="index.php?app=show_index">所有商品</a></li>
  </ul>
</div>
<div class="mrightTop">
  <div class="fontl">
    <form method="get">
       <div class="left">
          <input type="hidden" name="app" value="show_index" />
          <input type="hidden" name="act" value="index" />
          商品名称:
          <input class="queryInput" type="text" name="goods_name" value="<?php echo htmlspecialchars($_GET['goods_name']); ?>" />
          <input type="submit" class="formbtn" value="查询" />
      </div>
      <?php if ($this->_var['filtered']): ?>
      <a class="left formbtn1" href="index.php?app=show_index">撤销检索</a>
      <?php endif; ?>
    </form>
  </div>
  <div class="fontr"><?php echo $this->fetch('page.top.html'); ?></div>
</div>
<div class="tdare">
  <table width="100%" cellspacing="0" class="dataTable">
    <tr class="tatr1">
      <td width="20" class="firstCell"></td>
      <td width="30%">商品名称</td>
      <td width="100">排序</td>
      <td width="10%">店铺名称</td>
      <td width="10%">品牌</td>
      <td>类别</td>
      <td>首页推荐</td>
    </tr>
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <tr class="tatr2">
      <td class="firstCell"></td>
      <td><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></td>
      <td><span ectype="inline_edit" fieldname="sort_order" fieldid="<?php echo $this->_var['goods']['goods_id']; ?>" class="editable" title="可编辑"><?php echo $this->_var['goods']['sort_order']; ?></span></td>
      <td><?php echo htmlspecialchars($this->_var['goods']['store_name']); ?></td>
      <td><?php echo htmlspecialchars($this->_var['goods']['brand']); ?></td>
      <td><?php echo nl2br($this->_var['goods']['cate_name']); ?></td>
      <td><?php if ($this->_var['goods']['show_index'] == 0): ?><img src="<?php echo $this->res_base . "/" . 'style/images/positive_enabled.gif'; ?>" ectype="inline_edit" fieldname="show_index" fieldid="<?php echo $this->_var['goods']['goods_id']; ?>" fieldvalue="0" title="可编辑" /><?php else: ?><img src="<?php echo $this->res_base . "/" . 'style/images/positive_disabled.gif'; ?>"ectype="inline_edit" fieldname="show_index" fieldid="<?php echo $this->_var['goods']['goods_id']; ?>" fieldvalue="1" title="可编辑" /><?php endif; ?></td>
    </tr>
    <?php endforeach; else: ?>
    <tr class="no_data">
      <td colspan="5">没有符合条件的记录</td>
    </tr>
    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>
  <div class="pageLinks"> <?php if ($this->_var['goods_list']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?> </div>
  <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?> 