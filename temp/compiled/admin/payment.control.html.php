
<link href="templates/style/user.css" rel="stylesheet" type="text/css" />
<?php echo $this->fetch('header.html'); ?>


<div id="rightTop">
  <p>支付配置</p>
  <ul class="subnav">
    <li><a class="btn1" href="index.php?app=payment">名称</a></li>
  </ul>

</div>



<div class="eject_con">
    <div class="info_table_wrap">
        <form method="post" action="index.php?app=payment&amp;act=config&id=<?php echo $this->_var['payment']['code']; ?>">
        <ul class="info_table">
            <li>
                <h4>名称:</h4>
                <p class="new_style"><?php echo htmlspecialchars($this->_var['payment']['name']); ?></p>
            </li>
            
            <li>
                <h4>简介</h4>
                <p><textarea class="text" name="payment_desc"><?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?></textarea><span>该信息将在用户下单时被看到</span></p>
            </li>
            
            <li>
                <h4>启用:</h4>
                <p>
                     <?php echo $this->html_radios(array('options'=>$this->_var['yes_or_no'],'checked'=>$this->_var['payment']['enabled'],'name'=>'enabled')); ?>
                </p>
            </li>
            
            <li>
                <h4>排序:</h4>
                <p><input type="text" class="text width2" value="<?php echo $this->_var['payment']['sort_order']; ?>" name="sort_order"/></p>
            </li>
            
            <?php $_from = $this->_var['payment']['config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('conf', 'info');if (count($_from)):
    foreach ($_from AS $this->_var['conf'] => $this->_var['info']):
?>
            <li>
                <h4><?php echo $this->_var['info']['text']; ?>:</h4>
                <p><?php if ($this->_var['info']['type'] == 'text'): ?> <input type="text" name="config[<?php echo $this->_var['conf']; ?>]" id="ctrl_<?php echo $this->_var['conf']; ?>" value="<?php echo $this->_var['config'][$this->_var['conf']]; ?>" size="<?php echo $this->_var['info']['size']; ?>" onfocus="<?php echo $this->_var['info']['onfocus']; ?>" onchange="<?php echo $this->_var['info']['onchange']; ?>" onblur="<?php echo $this->_var['info']['onblur']; ?>" class="text"/>
                <?php elseif ($this->_var['info']['type'] == 'select'): ?>
                <select name="config[<?php echo $this->_var['conf']; ?>]" id="ctrl_<?php echo $this->_var['conf']; ?>" onchange="<?php echo $this->_var['info']['onchange']; ?>" class="width8 padding4">
                       <?php echo $this->html_options(array('options'=>$this->_var['info']['items'],'selected'=>$this->_var['config'][$this->_var['conf']])); ?>
                 </select>
                 <?php elseif ($this->_var['info']['type'] == 'textarea'): ?>
                 <textarea cols="<?php echo $this->_var['info']['cols']; ?>" rows="<?php echo $this->_var['info']['rows']; ?>" name="config[<?php echo $this->_var['conf']; ?>]" id="ctrl_<?php echo $this->_var['conf']; ?>" onfocus="<?php echo $this->_var['info']['onfocus']; ?>" onchange="<?php echo $this->_var['info']['onchange']; ?>" onblur="<?php echo $this->_var['info']['onblur']; ?>" class="text" ><?php echo $this->_var['config'][$this->_var['conf']]; ?></textarea>
                 <?php elseif ($this->_var['info']['type'] == 'radio'): ?>
                       <?php echo $this->html_radios(array('options'=>$this->_var['info']['items'],'checked'=>$this->_var['config'][$this->_var['conf']],'name'=>$this->_var['info']['name'])); ?>
                 <?php elseif ($this->_var['info']['type'] == 'checkbox'): ?>
                    <?php echo $this->html_checkbox(array('options'=>$this->_var['info']['items'],'checked'=>$this->_var['config'][$this->_var['conf']],'name'=>$this->_var['info']['name'])); ?>
                 <?php endif; ?>
                 <span><?php echo $this->_var['info']['desc']; ?></span>
                 </p>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            
            
            
            <li>
                <h4>区别码:</h4>
                <p><input type="text" name="config[pcode]" value="<?php echo $this->_var['config']['pcode']; ?>" size="3" class="text" /><span>正常情况下可留空，仅当支付时频繁出错时使用</span></p>
            </li>
            
        </ul>
        <div class="submit"><input type="submit" class="btn" value="提交" style="float:none;" /></div>
        </form>
    </div>
</div>



<?php echo $this->fetch('footer.html'); ?>