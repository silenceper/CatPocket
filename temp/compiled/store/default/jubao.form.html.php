<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo $this->_var['charset']; ?>" />
<link rel="stylesheet" type="text/css" href="themes/store/default/styles/goods.css"  />
</head>

<body>
<ul class="tab">
    <li class="active">举报商品</li>
</ul>
<div class="eject_con">
    <div class="info_table_wrap">
        <form method="post" action="index.php?app=goods&amp;act=jubao&id=<?php echo $this->_var['goods_id']; ?>&store_id=<?php echo $this->_var['store_id']; ?>" >
        <ul class="info_table">
            <li>
                <h4>商品名称:</h4>
                <p class="new_style"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></p>
            </li>
            <li>
                <h4>举报原因:</h4>
                <p>
                <label><input type="radio" name="jubao_cate" value="1" checked="checked"/>虚标价格</label>
            <label>
            <input type="radio" name="jubao_cate" value="2" />其它</label></p>
            </li>
            <li>
                <h4>说&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;明:</h4>
                <p><textarea style="resize:none;" cols="8" rows="8" name="jubao_sm"><?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?></textarea></p>
            </li>
        </ul>
        <div class="submit"><input type="submit" class="btn" value="提交" /></div>
        </form>
    </div>
</div>
</body>
</html>