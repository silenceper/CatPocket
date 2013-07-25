<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});
    $('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
<div id="rightTop">
    <p>积分申述管理</p>
    <ul class="subnav">
        <li><span>管理</span></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
             <div class="left">
                <input type="hidden" name="app" value="ss" />
                <input type="hidden" name="act" value="index" />
                <select class="querySelect" name="field"><?php echo $this->html_options(array('options'=>$this->_var['search_options'],'selected'=>$_GET['field'])); ?>
                </select>:<input class="queryInput" type="text" name="search_name" value="<?php echo htmlspecialchars($this->_var['query']['search_name']); ?>" />
                申述时间从:<input class="queryInput2" type="text" value="<?php echo $this->_var['query']['add_time_from']; ?>" id="add_time_from" name="add_time_from" class="pick_date" />
                至:<input class="queryInput2" type="text" value="<?php echo $this->_var['query']['add_time_to']; ?>" id="add_time_to" name="add_time_to" class="pick_date" />
                <input type="submit" class="formbtn" value="查询" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=ss_jifen">撤销检索</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="fontr">
        <?php if ($this->_var['refunds']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?>
    </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['jifens']): ?>
        <tr class="tatr1">
            <td width="10%" class="firstCell"><span ectype="order_by" fieldname="seller_id">买家名称</span></td>
            <td width="13%"><span ectype="order_by" fieldname="order_sn">卖家名称</span></td>
            <td width="13%"><span ectype="order_by" fieldname="add_time">积分</span></td>
            <td width="10%"><span ectype="order_by" fieldname="buyer_name">申述时间</span></td>
            <td width="10%">积分日志状态</td>
            <td width="10%">操作</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['jifens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'order');if (count($_from)):
    foreach ($_from AS $this->_var['order']):
?>
        <tr class="tatr2">
            <td class="firstCell"><?php echo htmlspecialchars($this->_var['order']['buyer_name']); ?></td>
            <td><?php echo $this->_var['order']['seller_name']; ?>&nbsp;&nbsp;<?php if ($this->_var['order']['extension'] == 'groupbuy'): ?>[groupbuy]<?php endif; ?></td>
            <td><?php echo htmlspecialchars($this->_var['order']['jifen']); ?></td>
            <td><?php echo local_date("Y-m-d H:i:s",$this->_var['order']['add_time']); ?></td>
            <td><?php if ($this->_var['order']['ss_status'] == 0): ?>新建申述<?php elseif ($this->_var['order']['ss_status'] == 1): ?>申述已完成<?php endif; ?></td>
            <td><a href="index.php?app=ss_jifen&amp;act=view&amp;id=<?php echo $this->_var['order']['ss_id']; ?>">refund</a></td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">没有符合条件的记录</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <div id="dataFuncs">
        <div class="pageLinks">
            <?php if ($this->_var['refunds']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
