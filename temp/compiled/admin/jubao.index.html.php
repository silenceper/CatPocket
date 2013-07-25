<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $('#sotime,#endtime').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>举报管理</p>
</div>

<div class="mrightTop">
    <div class="fontr">

    </div>
</div>

<div class="tdare">
    <table width="100%" cellspacing="0">

        <tr class="tatr1">
        	<td width="20">&nbsp;</td>
            <td width="40">ID</td>
            <td align="left">商品名</td>
            <td>店铺名</td>
            <td>举报类型</td>
            <td>举报人</td>
            <td width="120">举报时间</td>
			<td width="120">当前状态</td>
            <td align="center">操作</td>
        </tr>

        <?php $_from = $this->_var['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['val']):
?>
        <tr class="tatr2">
        	<td width="20">&nbsp;</td>
            <td width="40"><?php echo $this->_var['val']['goods_id']; ?></td>
            <td align="left"><?php echo $this->_var['val']['goods_name']; ?></td>
            <td><?php echo $this->_var['val']['store_name']; ?></td>
            <td><?php if ($this->_var['val']['jubao_cate'] == 1): ?>虚标价格<?php elseif ($this->_var['val']['jubao_cate'] == 2): ?>其它<?php endif; ?></td>
            <td><?php echo $this->_var['val']['user_name']; ?></td>
			<td><?php echo local_date("y-m-d H:i:s",$this->_var['val']['addtime']); ?></td>
            <td class="table_center"><?php if ($this->_var['val']['state'] == 0): ?><span style="color:red;">未确认</span><?php elseif ($this->_var['val']['state'] == 1): ?>已确认<?php endif; ?></td>
            <td><a href="index.php?app=jubaogl&act=view&id=<?php echo $this->_var['val']['id']; ?>">查看</a>&nbsp;|&nbsp;<a href="index.php?app=jubaogl&act=agree&id=<?php echo $this->_var['val']['id']; ?>">确认</a>&nbsp;</td>


        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['index']): ?>
<div id="dataFuncs">
    <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
    <div class="clear"></div>
  </div>
  <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>