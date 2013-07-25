<?php echo $this->fetch('header.html'); ?>
<link href="<?php echo $this->res_base . "/" . 'css/app-score-v3.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/tjb-base.css'; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'search_goods.js'; ?>" charset="utf-8"></script> 
<script type="text/javascript">
var upimg   = '<?php echo $this->res_base . "/" . 'images/up.gif'; ?>';
var downimg = '<?php echo $this->res_base . "/" . 'images/down.gif'; ?>';
imgUping = new Image();
imgUping.src = upimg;
</script>
<style type="text/css">
.img_info{
	border:solid 1px rgb(238,238,238);
}
.img_info:hover
{
    border:solid 1px rgb(196,196,196);
}

.h4_css{
	padding-left:20px; padding-bottom:5px;color:red;margin-top:10px;height:40px;line-height:18px;padding-bottom:10px;width:170px;
	}
.h4_css a
{
   color:#666666;font-size:13px; text-decoration:none; font-weight:normal; font-size:12px;
}
.h4_css a:hover
{
    color:#F33;
	text-decoration:underline;
}
.bl{_display:inline;display:inline-block;width:30px;height:15px;vertical-align:middle;background:url("<?php echo $this->res_base . "/" . 'images/main/T11BOuXjJtXXXXXXXX-30-12.png'; ?>") no-repeat left top;font:10px 'arial';color:#fff;line-height:10px;margin-top:2px;padding-left:8px;}
.img_a{
	border:1px solid rgb(238, 238, 238);width:150px;height:150px;padding:7px;
	}
.img_a:hover
{
    border:solid 1px rgb(196,196,196);
}
</style>
<?php echo $this->fetch('curlocal.html'); ?>
<div class="content"> 
  <?php if ($this->_var['goods_list']): ?>
  <div class="left" style="width:162px;">
    <div >
      <div class="col-sub">
        <div class="box">
          <div class="lmenu">
            <div class="user" style="width:140px;">
              <p style="line-height: 20px;"> 您可以通过商家赠送给您<br>
                的礼品卡，<em>领取积分</em><br>
              </p>
              <p class="user-button"> <a class="get-coin" target="_blank" href="index.php?app=my_money&act=jifenguanli">领取积分</a> </p>
              <p style="color:#ccc; text-align:center;">礼品卡的有效期为15天</p>
            </div>
            <div class="new-menu" >
              <div class="title">
                <h4 style="width:152px;">全部商品分类</h4>
              </div>
              <div class="content" style="width:160px;margin-top:0px;"> 
                
                <?php $_from = $this->_var['widget_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('keys', 'category');$this->_foreach['fe_gcate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_gcate']['total'] > 0):
    foreach ($_from AS $this->_var['keys'] => $this->_var['category']):
        $this->_foreach['fe_gcate']['iteration']++;
?> 
                <?php if ($this->_var['key'] < 10): ?>
                <dl>
                  <dt><a style="color:#000" href="<?php echo url('app=search&cate_id=' . $this->_var['category']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['category']['value']); ?></a></dt>
                  <dd style="float:left;"> 
                    <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['child']):
?> 
                    <?php if ($this->_var['key'] < 4): ?> 
                    
                    <span> <a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a> </span> 
                    
                    <?php endif; ?> 
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                  </dd>
                </dl>
                <?php endif; ?> 
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="right" style="width:820px">
    <div class="module_filter" style="width:820px;">
      <div class="module_filter_line" style="width:810px;">
        <ul class="module_filter_nav" ectype="ul_filter">
          <?php $_from = $this->_var['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter');if (count($_from)):
    foreach ($_from AS $this->_var['filter']):
?>
          <li class="normal" ectype="li_filter"> <span class="txt"><?php echo $this->_var['filter']['name']; ?>: <?php echo $this->_var['filter']['value']; ?></span> <span class="ico"><img src="<?php echo $this->res_base . "/" . 'images/delete.gif'; ?>" title="<?php echo $this->_var['filter']['key']; ?>" /></span> </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
          <?php if (! $this->_var['filters']['category']): ?>
          <li class="normal" ectype="dropdown_filter_title" ecvalue="category"> <span class="txt">分类: <a href="javascript:void(0);">请选择</a></span> <span class="ico"><img src="<?php echo $this->res_base . "/" . 'images/down.gif'; ?>" /></span> </li>
          <?php endif; ?> 
          <?php if (! $this->_var['filters']['brand']): ?>
          <li class="normal" ectype="dropdown_filter_title" ecvalue="brand"> <span class="txt">品牌: <a href="javascript:void(0);">请选择</a></span> <span class="ico"><img src="<?php echo $this->res_base . "/" . 'images/down.gif'; ?>" /></span> </li>
          <?php endif; ?>
          <li class="normal" ectype="dropdown_filter_title" ecvalue="price"> <span class="txt">价格: <a href="javascript:void(0);">请选择</a></span> <span class="ico"><img src="<?php echo $this->res_base . "/" . 'images/down.gif'; ?>" /></span> </li>
          <?php if (! $this->_var['filters']['region_id']): ?>
          <li class="normal" ectype="dropdown_filter_title" ecvalue="region"> <span class="txt">所在地区: <a href="javascript:void(0);">请选择</a></span> <span class="ico"><img src="<?php echo $this->res_base . "/" . 'images/down.gif'; ?>" /></span> </li>
          <?php endif; ?>
        </ul>
        <?php if (! $this->_var['filters']['category']): ?>
        <div class="contain_list" ectype="dropdown_filter_content" ecvalue="category" style="display:none">
          <ul ectype="ul_category">
            <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?> 
            <?php if ($this->_var['row']['cate_name'] != ''): ?>
            <li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['cate_name']; ?>" id="<?php echo urlencode($this->_var['row']['cate_id']); ?>"><?php echo htmlspecialchars($this->_var['row']['cate_name']); ?></a></li>
            <?php endif; ?> 
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
        <?php endif; ?> 
        <?php if (! $this->_var['filters']['brand']): ?>
        <div class="contain_list" ectype="dropdown_filter_content" ecvalue="brand" style="display:none">
          <ul ectype="ul_brand">
            <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
            <li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['brand']; ?>" id="<?php echo urlencode($this->_var['row']['brand']); ?>"><?php echo htmlspecialchars($this->_var['row']['brand']); ?> (<?php echo $this->_var['row']['count']; ?>)</a></li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
        <?php endif; ?>
        <div class="contain_list" ectype="dropdown_filter_content" ecvalue="price" style="display:none">
          <ul ectype="ul_price">
            <?php $_from = $this->_var['price_intervals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
            <li><a href="javascript:void(0);" title="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>"><?php echo price_format($this->_var['row']['min']); ?> - <?php echo price_format($this->_var['row']['max']); ?> (<?php echo $this->_var['row']['count']; ?>)</a></li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
        <?php if (! $this->_var['filters']['region_id']): ?>
        <div class="contain_list" ectype="dropdown_filter_content" ecvalue="region" style="display:none">
          <ul ectype="ul_region">
            <?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
            <li><a href="javascript:void(0);" id="<?php echo $this->_var['row']['region_id']; ?>" title="<?php echo htmlspecialchars($this->_var['row']['region_name']); ?>"><?php echo htmlspecialchars($this->_var['row']['region_name']); ?> (<?php echo $this->_var['row']['count']; ?>)</a></li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
        <?php endif; ?> 
      </div>
    </div>
    <div class="shop_con_list">
      <h2 >
        <div class="ornament1"></div>
        <div class="ornament2"></div>
        <div class="h2_wrap" >
          <div class="table_title" >
            <p class="title" style="display:none;">显示:</p>
            <p class="list_ico" style="display:none;" ectype="display_mode" ecvalue="list" title="以列表显示"></p>
            <p class="squares_ico" style="display:none;" ectype="display_mode" ecvalue="squares" title="以方格显示"></p>
            <p style="display:none;" class="line_ico"></p>
            <p class="title">排序:</p>
          </div>
          <p>
            <select ectype="order_by">
              <?php echo $this->html_options(array('options'=>$this->_var['orders'],'selected'=>$_GET['order'])); ?>
            </select>
          </p>
        </div>
      </h2>
      
      <?php if ($this->_var['goods_list']): ?>
      <div class="module_special">
        <div class="wrap">
          <div class="wrap_child">
            <div class="major">
              <ul class="list">
                <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rgoods');if (count($_from)):
    foreach ($_from AS $this->_var['rgoods']):
?>
                <li style="height:250px;padding:30px 20px 25px 0;border-bottom:solid 1px rgb(229,229,229);width:180px;float:left;">
                  <div class="pic img_a"><a href="<?php echo url('app=goods&id=' . $this->_var['rgoods']['goods_id']. ''); ?>" target="_blank"  ><img src="<?php echo $this->_var['rgoods']['default_image']; ?>" width="150" height="150" /></a></div>
                  <h4 class="h4_css" style="padding-left:0;"><a href="<?php echo url('app=goods&id=' . $this->_var['rgoods']['goods_id']. ''); ?>" target="_blank" ><?php echo htmlspecialchars($this->_var['rgoods']['goods_name']); ?></a></h4>
                  <div style="width:170px;float:left;"> 
                  <span class="fontColor3" ectype="goods_price" <?php if ($this->_var['rgoods']['bargin_price']): ?> style="text-decoration:line-through;color:rgb(102, 102, 102);font-size:14px;float:left;" <?php endif; ?>><?php echo $this->_var['rgoods']['price']; ?></span> <span style="padding-left:30px;padding-right:10px;color:rgb(206, 206, 206);float:right;">已成交<?php echo ($this->_var['rgoods']['sales'] == '') ? '0' : $this->_var['rgoods']['sales']; ?>件</span></div>
                  <?php if ($this->_var['rgoods']['bargin_price']): ?>
                  
                  <div style="width:170px;float:left;"> 
                  <span style="float:left">
                    <span style="color:red;"><?php echo price_format($this->_var['rgoods']['bargin_price']); ?></span> 
                      <?php if ($this->_var['rgoods']['integral_state'] == 1): ?>+<span ><?php echo $this->_var['rgoods']['max_exchange']; ?></span>&nbsp;积分<?php endif; ?></span> 
                        <b class="bl" title="送积分" style="cursor:pointer;float:right;"><?php echo $this->_var['rgoods']['has_integral']; ?></b>
                        </div>
                  <?php endif; ?> </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php else: ?>
      <div id="no_results">很抱歉! 没有找到相关商品</div>
      <?php endif; ?> 
    </div>
    <div class="shop_list_page"> <?php echo $this->fetch('page.bottom.html'); ?> </div>
  </div>
  <?php else: ?>
  <div class="module_common">
    <p class="no_info">很抱歉! 没有找到相关商品</p>
  </div>
  <?php endif; ?> 
</div>
<?php echo $this->fetch('footer.html'); ?> 