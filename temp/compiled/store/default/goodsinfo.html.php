<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'goodsinfo.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
//<!CDATA[
/* buy */
function buy_direction()
{
	if (goodsspec.getSpec() == null)
    {
        alert(lang.select_specs);
        return;
    }
    var spec_id = goodsspec.getSpec().id;

    var quantity = $("#quantity").val();
    if (quantity == '')
    {
        alert(lang.input_quantity);
        return;
    }
    if (parseInt(quantity) < 1)
    {
        alert(lang.invalid_quantity);
        return;
    }
	go('index.php?app=cart&act=add_only&spec_id='+spec_id+'&quantity='+quantity+'&store_id=<?php echo $this->_var['store']['store_id']; ?>');
}

function buy()
{
    if (goodsspec.getSpec() == null)
    {
        alert(lang.select_specs);
        return;
    }
    var spec_id = goodsspec.getSpec().id;

    var quantity = $("#quantity").val();
    if (quantity == '')
    {
        alert(lang.input_quantity);
        return;
    }
    if (parseInt(quantity) < 1)
    {
        alert(lang.invalid_quantity);
        return;
    }
    add_to_cart(spec_id, quantity);
}

/* add cart */
function add_to_cart(spec_id, quantity)
{
    var url = SITE_URL + '/index.php?app=cart&act=add';
    $.getJSON(url, {'spec_id':spec_id, 'quantity':quantity}, function(data){
        if (data.done)
        {
            $('.bold_num').text(data.retval.cart.kinds);
            $('.bold_mly').html(price_format(data.retval.cart.amount));
            $('.ware_cen').slideDown('slow');
            setTimeout(slideUp_fn, 5000);
        }
        else
        {
            alert(data.msg);
        }
    });
}

var specs = new Array();
<?php $_from = $this->_var['goods']['_specs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec']):
?>
specs.push(new spec(<?php echo $this->_var['spec']['spec_id']; ?>, '<?php echo htmlspecialchars($this->_var['spec']['spec_1']); ?>', '<?php echo htmlspecialchars($this->_var['spec']['spec_2']); ?>', <?php echo $this->_var['spec']['price']; ?>, <?php echo $this->_var['spec']['stock']; ?>));
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var specQty = <?php echo $this->_var['goods']['spec_qty']; ?>;
var defSpec = <?php echo htmlspecialchars($this->_var['goods']['default_spec']); ?>;
var goodsspec = new goodsspec(specs, specQty, defSpec);
//]]>
</script>
<div class="ware_title" style="height:40px;">
<h2 align="left" style="width:80%;float:left;" title="<?php echo $this->_var['goods']['g_all']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></h2><span style="float:right;width:10%;"><a href="index.php?app=goods&amp;act=jubao&id=<?php echo $this->_var['goods']['goods_id']; ?>&store_id=<?php echo $this->_var['store']['store_id']; ?>" target="_blank">举报该商品</a></span>
</div>
<div class="ware_info">
    <div class="ware_pic">
        <div class="big_pic">
            <a href="javascript:;"><span class="jqzoom"><img src="<?php echo ($this->_var['goods']['_images']['0']['thumbnail'] == '') ? $this->_var['default_image'] : $this->_var['goods']['_images']['0']['thumbnail']; ?>" width="300" height="300" jqimg="<?php echo $this->_var['goods']['_images']['0']['image_url']; ?>" /></span></a>
        </div>

        <div class="bottom_btn">
            <!--<a class="collect" href="javascript:collect_goods(<?php echo $this->_var['goods']['goods_id']; ?>);" title="淘宝"></a>-->
            <div class="left_btn"></div>
            <div class="right_btn"></div>
            <div class="ware_box">
                <ul>
                    <?php $_from = $this->_var['goods']['_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_image');$this->_foreach['fe_goods_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods_image']['total'] > 0):
    foreach ($_from AS $this->_var['goods_image']):
        $this->_foreach['fe_goods_image']['iteration']++;
?>
                    <li <?php if (($this->_foreach['fe_goods_image']['iteration'] <= 1)): ?>class="ware_pic_hover"<?php endif; ?> bigimg="<?php echo $this->_var['goods_image']['image_url']; ?>"><img src="<?php echo $this->_var['goods_image']['thumbnail']; ?>" width="55" height="55" /></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
        <script>
            $(function(){
                var btn_list_li = $("#btn_list > li");
                btn_list_li.hover(function(){
                    $(this).find("ul:not(:animated)").slideDown("fast");
                },function(){
                    $(this).find("ul").slideUp("fast");
                });
            });
        </script>

        <ul id="btn_list">
            <li title="本商品淘宝链接" style="width: 146px; height: 29px; float: left; margin-right:5px;">
<?php if ($this->_var['goods']['taobao_url']): ?><a href="<?php echo $this->_var['goods']['taobao_url']; ?>" target="_blank" ><img src="<?php echo $this->res_base . "/" . 'images/taobao_1.gif'; ?>" /></a><?php else: ?><img src="<?php echo $this->res_base . "/" . 'images/taobao_2.gif'; ?>" /><?php endif; ?></li>

            <li title="本商品拍拍链接" style="float:left;">
<?php if ($this->_var['goods']['paipai_url']): ?><a href="<?php echo $this->_var['goods']['paipai_url']; ?>" target="_blank" ><img src="<?php echo $this->res_base . "/" . 'images/paipai_1.gif'; ?>" /></a><?php else: ?><img src="<?php echo $this->res_base . "/" . 'images/paipai_2.gif'; ?>" /><?php endif; ?></li>

                </ul>
            </li>
        </ul>

    </div>

    <div class="ware_text">
        <div class="rate">
            <span>价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格： </span><span class="fontColor3" ectype="goods_price" <?php if ($this->_var['integral_open']): ?><?php if ($this->_var['goods']['bargin_price']): ?> style="text-decoration:line-through;color:red;font-size:14px;" <?php endif; ?><?php endif; ?>>&nbsp;<?php echo price_format($this->_var['goods']['_specs']['0']['price']); ?>&nbsp;</span><br />
            <?php if ($this->_var['integral_open']): ?><?php if ($this->_var['goods']['bargin_price']): ?><span>促&nbsp;&nbsp;销&nbsp;&nbsp;价</span>： <span class="fontColor3" ectype="goods_price"><?php echo price_format($this->_var['goods']['bargin_price']); ?><?php if ($this->_var['goods']['integral_state']): ?>+<?php echo $this->_var['goods']['max_exchange']; ?>积分<?php endif; ?></span><br /><?php endif; ?><?php endif; ?>
            <span>品&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牌： </span><?php echo htmlspecialchars($this->_var['goods']['brand']); ?><br />
            标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;签： &nbsp;&nbsp;<?php $_from = $this->_var['goods']['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tag');if (count($_from)):
    foreach ($_from AS $this->_var['tag']):
?><?php echo $this->_var['tag']; ?>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?><br />
            销售情况： <?php echo $this->_var['sales_info']; ?><?php echo $this->_var['comments']; ?><br />
            所在地区： <?php echo htmlspecialchars($this->_var['store']['region_name']); ?><br />
            
            
            <?php if ($this->_var['integral_open']): ?><?php if ($this->_var['goods']['has_integral']): ?><span>送&nbsp;&nbsp;积&nbsp;&nbsp;分</span>： 单件送<span style="color:red;"><?php echo $this->_var['goods']['has_integral']; ?></span>积分<?php endif; ?><?php endif; ?>
            
        </div>

        <div class="handle">
            <?php if ($this->_var['goods']['spec_qty'] > 0): ?>
            <ul>
                <li class="handle_title"><?php echo htmlspecialchars($this->_var['goods']['spec_name_1']); ?>: </li>
            </ul>
            <?php endif; ?>
            <?php if ($this->_var['goods']['spec_qty'] > 1): ?>
            <ul>
                <li class="handle_title"><?php echo htmlspecialchars($this->_var['goods']['spec_name_2']); ?>: </li>
            </ul>
            <?php endif; ?>
            <ul>
                <li class="handle_title">购买数量: </li>
                <li>
                    <input type="text" class="text width1" name="" id="quantity" value="1" />
                    件（库存<span class="stock" ectype="goods_stock"><?php echo $this->_var['goods']['_specs']['0']['stock']; ?></span>件）
                </li>
            </ul>
            <?php if ($this->_var['goods']['spec_qty'] > 0): ?>
            <ul>
                <li class="handle_title">您已选择: </li>
                <li class="aggregate" ectype="current_spec"></li>
            </ul>
            <?php endif; ?>
        </div>

        <ul class="ware_btn">
            <div class="ware_cen" style="display:none">
                <div class="ware_center">
                    <h1>
                        <span class="dialog_title">商品已成功添加到购物车</span>
                        <span class="close_link" title="关闭" onmouseover="this.className = 'close_hover'" onmouseout="this.className = 'close_link'" onclick="slideUp_fn();"></span>
                    </h1>
                    <div class="ware_cen_btn">
                        <p class="ware_text_p">购物车内共有 <span class="bold_num">3</span> 种商品 共计 <span class="bold_mly">658.00</span></p>
                        <p class="ware_text_btn">
                            <input type="submit" class="btn1" name="" value="查看购物车" onclick="location.href='<?php echo $this->_var['site_url']; ?>/index.php?app=cart'" />
                            <input type="submit" class="btn2" name="" value="继续挑选商品" onclick="$('.ware_cen').css({'display':'none'});" />
                        </p>
                    </div>
                </div>
                <div class="ware_cen_bottom"></div>
            </div>

            <li class="btn_c1" title="立刻购买"><a href="javascript:buy_direction();"></a></li>
            <li class="btn_c2" title="加入购物车"><a href="javascript:buy();"></a></li>
            <br/>
            <li class="btn_c4"><a href="index.php?app=ss_jifen&act=song_jifen&id=<?php echo $this->_var['store']['store_id']; ?>" target="_blank" ></a></li>
            <li class="btn_c3" title="收藏该商品"><a href="javascript:collect_goods(<?php echo $this->_var['goods']['goods_id']; ?>);"></a></li>
        </ul>
    </div>

    <div class="clear"></div>
</div>