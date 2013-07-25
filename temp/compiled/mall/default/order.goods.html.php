                <h4 class="add_title"><b class="ico">已选商品(原价)</b></h4>
                <dl class="article" style="padding-top:10px;">
                    <dt style="line-height:15px;">店铺:&nbsp;<a href="<?php echo url('app=store&store_id=' . $this->_var['goods_info']['store_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods_info']['store_name']); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods_info']['store_name_1']); ?></a></dt>
                    <?php $_from = $this->_var['goods_info']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <dd style="padding-top:5px;">
                        <p><a href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width="65" height="65" /></a></p>
                        <h3>
                            <a target="_blank" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" style="height:20px;"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a>
                            <span class="attr"><?php echo htmlspecialchars($this->_var['goods']['specification']); ?></span>
                            <b>原价：<?php echo $this->_var['goods']['quantity']; ?>件<br /><span class="money"><?php echo price_format($this->_var['goods']['subtotal']); ?></span></b>
                        </h3>
                    </dd>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </dl>