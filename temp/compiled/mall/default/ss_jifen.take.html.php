<?php echo $this->fetch('member.header.html'); ?>
<style type="text/css">
.top_tab{width:400px;float:left;border:solid 1px #CCCCCC;height:100%}
.top_menu{height:30px;background-color:#EDEDED;line-height:30px;padding-left:20px;border:solid 1px #999999;font-weight:bold;color:#F60}
.setting{float:right;width:100px;border-left:#CCCCCC 1px solid;height:267px;}
.setting h3{padding:5px;}
.con_cz{float:left;padding:50px 0 0 10px;}
.con_cz but{padding:10px 0 0 10px}

.t_class tr td {border:1px solid #eee;padding:5px; text-align:center}
</style>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right"><?php echo $this->fetch('member.submenu.html'); ?>

        <div class="wrap margin1">
            <div class="public table">
				<div class="information_index" style="overflow:hidden; margin: 0px 0 -15px;">
                    <span>您现有积分：<span style="color:#FF6600;font-size:14px;font-weight:bold;"><?php echo $this->_var['user_jf']; ?></span></span>
                </div>
             </div>
        </div>
    
           <div class="wrap">
            <div class="public table">
              <table class="t_class">

                <tr class="tatr1">
                    <td width="150">支付积分</td>
                    <td align="left" width="80">收到积分</td>
                    <td align="left">积分数</td>
                    <td align="left">送出时间</td>
                    <td align="left">状态</td>
                    <td align="left">操作</td>
                </tr>

                <?php $_from = $this->_var['ss_jifen_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ss_jifen');if (count($_from)):
    foreach ($_from AS $this->_var['ss_jifen']):
?>
                <tr>
                    <td width="150"><?php echo $this->_var['ss_jifen']['buyer_name']; ?></td>
                    <td align="left" width="80"><?php echo $this->_var['ss_jifen']['seller_name']; ?></td>
                    <td align="left"><?php echo $this->_var['ss_jifen']['jifen']; ?></td>
                    <td align="left"><?php echo local_date("Y-m-d H:i:s",$this->_var['ss_jifen']['add_time']); ?></td>
                    <?php if ($this->_var['ss_jifen']['ss_status'] == 0): ?>
                    <td align="left">积分送出处理</td>
                    <td align="left">无可用操作</td>
                    <?php endif; ?>
                    <?php if ($this->_var['ss_jifen']['ss_status'] == 1): ?>
                    <td align="left">取消支付积分</td>
                    <td align="left"><a href="index.php?app=ss_jifen&act=refund_song_jifen&ss_id=<?php echo $this->_var['ss_jifen']['ss_id']; ?>">申诉</a>
                    <a href="index.php?app=ss_jifen&act=sure_song_jifen&ss_id=<?php echo $this->_var['ss_jifen']['ss_id']; ?>">允许取消</a></td>
                    <?php endif; ?>
                    <?php if ($this->_var['ss_jifen']['ss_status'] == 2): ?>
                    <td align="left">商家发起申诉</td>
                    <td align="left">无可用操作</td>
                    <?php endif; ?>
                    <?php if ($this->_var['ss_jifen']['ss_status'] == 3): ?>
                    <td align="left">积分交易完成</td>
                    <td align="left">无可用操作</td>
                    <?php endif; ?>
                    <?php if ($this->_var['ss_jifen']['ss_status'] == 4): ?>
                    <td align="left">积分交易取消</td>
                    <td align="left">无可用操作</td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="6">
                        没有符合条件的记录
                    </td>
                </tr>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php if ($this->_var['page_info']['page_count'] > 1): ?>
                <tr>
                    <td colspan="6">
                        <?php echo $this->fetch('member.page.bottom.html'); ?>
                    </td>
                </tr>
              <?php endif; ?>
              </table>
              </div>
           </div>

        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
