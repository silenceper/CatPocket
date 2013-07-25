<?php echo $this->fetch('header.html'); ?>
<style>
body{margin:0px; padding:0px;}
.font{font-family:"宋体"; font-size:12px; color:#666666; line-height:20px;}
.tab  a {font-family:"宋体"; font-size:12px; color:#666666; text-decoration:none;}
.tab  a:hover {text-decoration:none; color:#ac0405;}
.tab1 a{font-family:"宋体"; font-size:12px; color:#fff; text-decoration:none;}
.tab1 a:hover{text-decoration:none;}
.tb-slide {
	float:left;
    height: 229px;
    overflow: hidden;
    width: 750px;
	position:relative;
}
.tb-slide ul.tb-slide-list {
    list-style: none outside none;
    margin: 0;
    padding: 0;
	overflow: hidden;
}
.tb-slide ul.tb-slide-list li {
    line-height: 0;
}
.tb-slide ul.tb-slide-list img {
    border: 0 none;
    display: block;
}
.tb-slide .tb-slide-triggers {
    bottom: 5px;
    height: 21px;
    list-style: none outside none;
    margin: 0;
    padding: 0;
    position: absolute;
    right: 2px;
    z-index: 10;
}
.tb-slide .tb-slide-triggers li {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #74A8ED;
    color: #74A8ED;
    cursor: pointer;
    float: left;
    font: 12px Arial;
    height: 15px;
    margin: 2px 3px;
    text-align: center;
    width: 19px;
}
.tb-slide .tb-slide-triggers li.current {
    background: none repeat scroll 0 0 #74A8ED;
    border: 1px solid #EEEEEE;
    color: #FFFFFF;
    font-size: 16px;
    font-weight: bold;
    height: 19px;
    line-height: 19px;
    margin: 0 3px;
    width: 19px;
}
.mjzx_banner{
	width:750px;
	height:229px;
    }
.mjzx_hdal{
	width:950px;
	height:420px;
	font-family: "宋体"; font-size:12px; 
	}
.mjzx_hdal a{
	float:left;
	width:270px;
	height:165px;
	margin:10px 20px;
	}
.mjzx_hdal a:link,.mjzx_hdal a:visited{
	background:url(http://img01.taobaocdn.com/tps/i1/T14m5aXfpyXXXXXXXX-143-163.gif) no-repeat;
	color:#666;
	}
.mjzx_hdal a:hover{
	background:url(http://img01.taobaocdn.com/tps/i1/T1891aXhxyXXXXXXXX-143-163.gif) no-repeat;
	text-decoration:none;
	color:#fff;
	}
.mjzx_hdal_l{
	width:120px;
	float:left;
	padding:7px 0 0 10px;
	}
.mjzx_hdal_tit{
	margin-top:3px;
	margin-left:10px;
	height:20px;
        line-height: 20px;
	overflow:hidden;
	}
.mjzx_hdal_r{
	width:120px;
	float:left;
	clear:right;
	margin-left:20px;
	}
.mjzx_hdal_desc{
	color:#666666;
	font-weight:bold;
	line-height:20px;
	}
.mjzx_hdal_c{
	color:#666666;
	line-height:20px;
	}
.mjzx_hdal_c span{
	color:#c53437;
	}
.main-content {
	width: 1000px;
	margin: 0 auto;
}
</style>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/indexjs/kissy-min.js'; ?>"></script>
<script src="<?php echo $this->res_base . "/" . 'js/tbra-widgets.js'; ?>" type="text/javascript"></script>
<div class="main-content">
<table></table>
<table bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="1000" align="center">
  <tbody><tr>
    <td colspan="3" height="15"></td>
  </tr>
  <tr>
    <td style="border: 1px solid rgb(212, 212, 212);">
      <div class="mjzx_banner">
        <div id="J_Slide" class="tb-slide">
          <ul class="tb-slide-list" style="height: 229px;">
            <li style=""><a href="index.php?app=article&amp;act=view&amp;article_id=35" target="_blank"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1RFy8XXBtXXXXXXXX-756-229.jpg'; ?>" border="0" height="229" width="750"></a></li>         
            <li style=""><a href="index.php?app=article&act=view&article_id=37" target="_blank"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1oMC6Xf8XXXXXXXXX-756-229.jpg'; ?>" border="0" height="229" width="750"></a></li>
            <li style=""><a href="index.php?app=article&act=view&article_id=34" target="_blank"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1f954XoRfXXXXXXXX-756-229.jpg'; ?>" border="0" height="229" width="750"></a></li>
            <li style=""><a href="index.php?app=article&act=view&article_id=33" target="_blank"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1lwiqXid4XXXXXXXX-756-229.jpg'; ?>" border="0" height="229" width="750"></a></li>
            
            </ul>
          <ul class="tb-slide-triggers"><li>1</li><li>2</li><li>3</li><li>4</li></ul></div>
        <script type="text/javascript">
            TB.widget.SimpleSlide.decorate('J_Slide', {triggersClass:'tb-slide-triggers', currentClass:'current', eventType:'mouse', effect:'scroll', slideHeight:'229',

            });
       </script>
        </div>	
      </td>
    <td width="10"></td>
    <td style="border: 1px solid rgb(212, 212, 212);" valign="top">
      
      <div style=" margin-left:10px; line-height:20px;margin-top:20px;">
        <a href="index.php?app=apply" target="_blank"><img src="<?php echo $this->res_base . "/" . 'images/1.jpg'; ?>" border="0"></a>
        
        <a href="index.php?app=article&act=view&article_id=37" target="_blank"><img src="<?php echo $this->res_base . "/" . 'images/2.jpg'; ?>" border="0" style="margin-top:10px;" ></a>
        
        <a href="index.php?app=article&cate_id=29" target="_blank"><img src="<?php echo $this->res_base . "/" . 'images/3.jpg'; ?>" border="0" style="margin-top:10px;" ></a>
        </div></td>
  </tr>
  <tr>
    <td colspan="3" height="15"></td>
  </tr>
  <tr>
    <td colspan="3" style="border: 1px solid rgb(212, 212, 212);" height="190"><table border="0" cellpadding="0" cellspacing="0" width="950">
      <tbody>
        <tr>
          <td colspan="7"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T11zSmXa4iXXXXXXXX-948-41.jpg'; ?>" alt="" />
            <table border="0" cellpadding="0" cellspacing="0" width="956">
              <tbody>
                <tr>
                  <td width="95" align="right" valign="top">&nbsp;</td>
                  <td width="861"><br /></td>
                </tr>
                <tr>
                  <td height="10" align="center" valign="top"><img src="<?php echo $this->res_base . "/" . 'images/9340862_125352022382_2.gif'; ?>" alt="" /></td>
                  <td valign="middle"><br />
                    <font class="font"> <br />
                    <font class="font"><font color="#ac0405"><strong>独一无二"客户资源交换" 模式。</strong></font><br /><br />
                    <strong>猫口袋</strong>是一个独家首创<strong>"商家客源交换/共享"</strong>商业模式的C2C商城网站，在猫口袋商城，商家必须首先共享自己的客户，才能获得其他商家共享的更多新客源。商家共享自己的客户资源赚取<a href="index.php?app=article&amp;act=view&amp;article_id=18?app=article&amp;act=view&amp;article_id=18" target="_new">"猫粮"</a>，商家与新客户则会消耗<a href="index.php?app=article&amp;act=view&amp;article_id=18?app=article&amp;act=view&amp;article_id=18" target="_new">"猫粮"</a>。 就像一家软件共享网站由会员上传软件赚取点数，然后下载别人发布的软件则会消耗点数；<br /><br />
                      <br />
                    </font></td>
                </tr><tr>
                  <td height="10" align="center" valign="top"><img src="<?php echo $this->res_base . "/" . 'images/9340862_125352022382_2.gif'; ?>" alt="" /></td>
                  <td valign="middle"><br />
                    <font class="font"> <br />
<font class="font">                    <font color="#ac0405"><strong>比"淘宝客"更赚钱，只有猫口袋"客源佣金分成"!</strong></font><br /><br />

"淘宝客/淘客"是指帮助淘宝卖家推广商品的个人或网站。只要买家通过淘客的商品推广链接购买成交，淘客就能赚取由卖家支付的佣金。淘客无需投入成本，无需承担风险，淘客每推广完成一笔交易可获得一次佣金收入。<br />
<br />
商家向猫口袋共享每一个客户资源，除了赚取猫粮，还可以获得这些客户在猫口袋商城每次消费金额8%佣金分成。<strong>与淘宝客推广相比，猫口袋商家只要共享自己的客户，就可以一劳永逸坐享佣金分成。随着商家共享客户资源积累越来越多，商家可以赚取更多的规模化收益；</strong>（<a href="index.php?app=article&amp;act=view&amp;article_id=35" target="_new">点击查看详情）</a><br /><br />
                      <br />
                    </font></td>
                </tr><tr>
                  <td height="10" align="center" valign="top"><img src="<?php echo $this->res_base . "/" . 'images/9340862_125352022382_2.gif'; ?>" alt="" /></td>
                  <td valign="middle"><br />
                    <font class="font"><br />
                    <font class="font"><font color="#ac0405"><strong>加入猫口袋，送客户"猫の礼品卡" ，领全能积分!</strong></font><br /><br />
商家向<strong>自家淘宝/拍拍店</strong>已完成交易的客户发送猫口袋礼品卡， 客户使用礼品卡在猫口袋网站领取积分（10积分=1元）。积分可以直接用于猫口袋商城购物消费，并且使用无任何限制，可以购买Q币、冲话费、抵货款、抵运费、兑换礼品……
（商家可自由设定每张礼品卡的积分数量，礼品卡发布后15日之内不领取积分将失效，礼品卡失效后所含积分自动返还发卡商家）<br />
<br />
                      对客户而言，"猫の礼品卡&quot;比直接送礼品更受欢迎，因为每个人的需求和喜好都不一样。使用礼品卡的好处在于不必再与商家为挑选一款自己想要礼物去讨价还价说上半天，无需再与商家纠缠赠品的品质问题，也不会再为收到"鸡肋礼品"而郁闷。猫口袋礼品卡让客户自己拥有了选择权，可以自由选择喜欢的东西。另外，还可以长期把积分积攒在一起，用大量积分去换购更高货值商品。<br />
    <br />
    商家向客户赠送"猫の礼品卡"是比&quot;打折促销、赠品、优惠卡、抵价券，淘客返利，竞价推广……&quot;更高效的店铺营销策略。让商家获得更好的评价和口碑，带来更多客源订单！       <a href="index.php?app=article&amp;act=view&amp;article_id=36" target="_new">（点击查看详情） </a><br /><br />
                      <br />
                    </font></td>
                </tr><tr>
                  <td height="10" align="center" valign="top"><img src="<?php echo $this->res_base . "/" . 'images/9340862_125352022382_2.gif'; ?>" alt="" /></td>
                  <td valign="middle"><br />
                    <font class="font"><br />
                      <font class="font"><font color="#ac0405"><strong>"礼品" 也是一个新的利润增长点~&nbsp;&nbsp;&nbsp;销售& 馈赠两相宜!</strong></font><br />
                      <br />
                      销售附赠礼品是商家最常用营销手段，目的是吸引顾客下单，提高客户满意度和拉动回头客购买率。然而事实上，虽然商家不惜血本送好礼，客户是否买单却未必，我们经常可以看到<strong>"买的东西不错,送的是垃圾"</strong>之类的买家评语。如果做为商家的你，既不想放弃"赠品"所带来的效果，又想要彻底杜绝费力不讨好的可能，怎么办？<br /><br />
                      从现在开始，马上向客户赠送<strong>"猫の礼品卡" </strong>！由客户们自己选择各自喜欢的礼品。商家可以将所有礼品发布到猫口袋礼品商城供大家选购。客户每使用10个<strong>积分</strong>换购礼品，由猫口袋商城向礼品供应商支付一元货款，货款抵扣无上限。<strong>"礼品销售"</strong>也绝对可以成为商家们的一个非常可观的利润增长点。<br /><br />
                      <br />
                    </font></td>
                </tr><tr>
                  <td height="10" align="center" valign="top"><img src="<?php echo $this->res_base . "/" . 'images/9340862_125352022382_2.gif'; ?>" alt="" /></td>
                  <td valign="middle"><br />
                    <font class="font"><br />
                      <font class="font"><font color="#ac0405"><strong>商家们的"带路货"，爆单商品带来火爆人气，为你的目标业绩保驾护航!</strong></font><br /><br />
                      什么是带路货？&nbsp;&nbsp;——商场超市所经营商品按获利分类为<strong> 1.带路货  2.大路货  3.浅货；</strong><br />
                      
                      <strong>1、带路货：</strong>大部份为日化和民生用品，作为促销商品利润极低，节假日甚至不惜亏本销售。用以吸引客流量。通常为牺牲品。(数量占总数10%以下) <br />
                      <strong>2、大路货：</strong>全国性广告商品、高知名度商品，为各大商超必备商品。因零售价统一利润低。商场超市通常以进价销售，以此代表本店平价的形象(数量占总数7-20%)。 <br />
                      <strong>3、浅 货：</strong>非大众型商品，知名度相对于较低，常为专供商品，给店员高提成吸引店员推荐销售，利润超高。 (数量占总数30%-200%) <br /><br />
                      在猫口袋礼品商城，会员们持有大量积分待购。只要商家发布的"礼品"足够吸引人，质优价廉，就可以快速吸引惊人客源流量和订单量。商家们通过在猫口袋发布<strong>"带路货礼品"</strong>，只要客户向你换购礼品，你就有机会向客户展示更多更好的商品，客服人员就可以向客户推荐更多超值的货品。而且，基于网购买家要承担运费成本的特点，客户也愿意在节省运费前提下在同一家店内一次购买多件自己喜欢的商品。<br />
                      <br />
                      在如今B2C、C2C电商客源渠道匮乏的市场大环境下，在猫口袋商城发布<strong>"带路货礼品"</strong>是商家们在"直通车、搜索竞价推广和销售返利"之外可以轻松获得客源的唯一免费途径。<br /><br />
                      <br />
                    </font></td>
                </tr><tr>
                  <td height="10" align="center" valign="top"><img src="<?php echo $this->res_base . "/" . 'images/9340862_125352022382_2.gif'; ?>" alt="" /></td>
                  <td valign="middle"><br />
                    <font class="font"><br />
                      <font class="font"><font color="#ac0405"><strong>绝佳的试用平台，"猫试客"助你口碑营销；</strong></font><br /><br />
                      商家要在一个电子商务平台做好销售的前提是推广，而直接花了大把钱做广告推广，通常都没什么效果。有没有什么好办法可以获得比较好的自然推广效果呢？试用营销是一个绝佳的点子。商家发布试用品后，试客踊跃的参与试用并发布试用心得和评论。经过试用营销这一系列的动作之后，商家得到的不仅仅是销量和潜在消费者，还有很好的长久的口碑宣传。还等什么？马上在猫口袋发布你的试用品，让大量猫口袋会员使用积分立即购买试用，商家不仅无需为此负担运费和广告成本，还可以收回试用品成本。赶快加入吧，猫口袋助你打造好口碑！<br /><br />
                      <br />
                    </font></td>
                </tr><tr>
                  <td height="10" align="center" valign="top"><img src="<?php echo $this->res_base . "/" . 'images/9340862_125352022382_2.gif'; ?>" alt="" /></td>
                  <td valign="middle"><br />
                    <font class="font"><br />
                      <font class="font"><font color="#ac0405"><strong>不打广告!&nbsp;&nbsp;不跑车!&nbsp;&nbsp;不竞排名!&nbsp;&nbsp;只要"精准客源筛选"，免费推广一样成就惊人销量；</strong></font><br /><br />
                      在竞争激烈的市场环境下，商家只能不惜成本将一群人先拉进店铺，祈祷多成交几笔订单。最后，太低转化率让所有努力都付诸东流。问题关键在于，推广易做，没有筛选真正有购买潜力的客户，再眼花缭乱的推广也只是徒劳。<br /><br />
                    筛选有购买潜力客源并非很难，仅通过商家之间交换客户就能实现。<strong>比如卖手机套的可以找卖手机的，卖戒指的可以找卖婚纱的，卖减肥药的可以找卖肥码衣服的，卖婴儿装可以找卖奶粉的……</strong>只要与经营有相关性商品的商户交换客户，就可以精准无误的找到有特定需求的买家。但是，虽然客源交换办法很好，商家实施起来却有难度。比如商家一家家去谈合作，效率不够，人手也没有那么多，再加上与对方经济位势的不对等，尤其很难得到客源大户的支持，客户交换难以得到充分发展。另外，商家缺乏对客源交换成效的监测手段，也没有标准合作流程和公平的管理规则，合作不能长久持续。当商家合作数量不够多，客户的"不便利"感逐渐带来忠诚度下降，导致客源不断流失。 <br />
                      <br />
                    "猫口袋商城"——首家<strong>"客户资源交换/共享"</strong>专业服务机构。面对B2C/C2C商家提供公平，统一，公开，共赢的合作营销计划。在猫口袋，每个会员都持币待购（会员们持有大量可购物抵现的积分），商家们可以轻易获得订单。精准客源筛选、转化率……神马都是浮云~~~<br />
                      <br />
                      <br />
                      </font></td>
                </tr><tr>
                  <td height="10" align="center" valign="top"><img src="<?php echo $this->res_base . "/" . 'images/9340862_125352022382_2.gif'; ?>" alt="" /></td>
                  <td valign="middle"><br />
                    <font class="font"><br />
                      <font class="font"><font color="#ac0405"><strong>担保交易更安全，放心购物，品质有保障！</strong></font><br /><br />
                      猫口袋礼品商城在交易流程方面，采用与"淘宝网/拍拍网"完全相同的"担保交易"模式：买家先收货查验，满意后再向商家确认付款，最后给商家商品评价。在猫口袋运营公司严格的监管下，任何假冒伪劣和欺骗消费者的行为没有一丝空间!（点击查看详情）<br /><br />
                      <br />
                    </font></td>
                </tr>
                <tr>
                  <td height="7" align="center" valign="top">&nbsp;</td>
                  <td valign="middle"><br />
                    </td>
                </tr>
                <tr>
                  <td height="8" align="right" valign="middle">&nbsp;</td>
                  <td align="center" valign="middle"><br />
                    <img src="<?php echo $this->res_base . "/" . 'images/T1EQK.XdNsXXX.png'; ?>" alt="" /><br />
                    <br />
                    <a href="index.php?app=search&amp;act=store&amp;cate_id=36"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-1.png'; ?>" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="index.php?app=search&amp;act=store&amp;cate_id=2"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-2.png'; ?>" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="index.php?app=search&amp;act=store&amp;cate_id=1"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-3.png'; ?>" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="index.php?app=search&amp;act=store&amp;cate_id=8"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-4.png'; ?>" alt="" /></a><br />
                    <br />
                    <a href="index.php?app=search&amp;act=store&amp;cate_id=9"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-5.png'; ?>" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="index.php?app=search&amp;act=store&amp;cate_id=11"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-6.png'; ?>" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="index.php?app=search&amp;act=store&amp;cate_id=24"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-7.png'; ?>" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="index.php?app=search&amp;act=store&amp;cate_id=28"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-8.png'; ?>" alt="" /></a><br />
                    <br />
                    <a href="index.php?app=search&amp;act=store&amp;cate_id=21"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-9.png'; ?>" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="index.php?app=search&amp;act=store&amp;cate_id=42"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-10.png'; ?>" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="index.php?app=search&amp;act=store&amp;cate_id=35"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-11.png'; ?>" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="index.php?app=search&amp;act=store&amp;cate_id=11"><img src="<?php echo $this->res_base . "/" . 'images/T1EQKXdNsXXaCwpjX1-12.png'; ?>" alt="" /></a><br />
                    <br /></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
          <td colspan="7" height="2"></td>
        </tr>
      </tbody>
    </table></td>
  </tr>
  <tr>
    <td colspan="3" height="15"></td>
  </tr>
  <tr>
    <td colspan="3" style="border: 1px solid rgb(212, 212, 212);">
      <table border="0" cellpadding="0" cellspacing="0" width="950">
        <tbody><tr>
          <td colspan="4" height="52"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1K51mXdpoXXXXXXXX-948-52.jpg'; ?>"></td>
          </tr>
          <tr>
            <td>
              <table style="background-image: url(&quot;http://58.215.170.200/themes/mall/default/styles/default/images/11.jpg&quot;); background-repeat: no-repeat;" border="0" cellpadding="0" cellspacing="0">
                <tbody><tr>
                  <td width="90"></td>
                  <td width="418" valign="top"><font class="font"><font color="#ac0405"><strong>·	商家在猫口袋注册和开店均免费；</strong></font> <br><br> 
                    ·	报名商家必须在淘宝、拍拍以及阿里巴巴等B2C/C2C网上商城开店，并经营两个月以上，商品数量不低于10件，有稳定的客源； <br> <br> 
                    ·	商家申请开店需提供自己的淘宝或拍拍等B2C/C2C店铺网址。申请人所提供的店铺网址将公开显示该商家在猫口袋店铺信息栏下方；（商家的第三方网店一经认证，不得修改，请认真填写网址）<br> <br> 	
                    ·	猫口袋对商家提供信息进行审核认证，两个工作日内完成复核。</font></td>
                  <td width="120"></td>
                  <td width="329" valign="top"><font class="font"><font color="#ac0405"><b>·	商家在猫口袋发布商品免费</b></font> <br><br>
                    ·	商家发布商品需提供自己在淘宝/拍拍等B2C/C2C网店上同款同型商品链接，此链接将公示于其所发布的新商品网页中；<br><br>
                    ·	发布商品填写两个价格：第一“原价”——商家在淘宝/拍拍等店铺中此商品售价。第二“促销价”——猫口袋商城的售价。（注意：促销价不得高于原价！）<br>
                    <br>
                    ·	商家发布商品必须设置<strong>"积分返点"</strong>，即买家购买本商品可获得返还积分的数量。最低为商品促销价<strong>5%</strong>，最高不超过<strong>60%</strong> 。商品订单交易成功后按<strong>1元＝10积分</strong>比率实时划扣该笔订单的积分款项。 <br>
                    <br>
                    ·	在猫口袋商城的订单成交后，网站按商品促销价8%征收服务费。网站向共享客户（成交订单买家）的商户进行补贴。</font></td>
                  </tr>
                </tbody></table>		  </td>
            </tr>
          <tr>
            <td colspan="4" height="20"></td>
            </tr>
        </tbody></table>	</td>
  </tr>
  <tr>
    <td colspan="3" height="15"></td>
  </tr>
  <tr>
    <td colspan="3" style="border: 1px solid rgb(212, 212, 212);">
      <table border="0" cellpadding="0" cellspacing="0">
        <tbody><tr>
          <td colspan="7"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1vOymXaBrXXXXXXXX-948-216.jpg'; ?>" usemap="#Map" border="0"></td>
          </tr>
          <tr>
            <td colspan="7" height="30"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1dwamXhxLXXXXXXXX-948-50.jpg'; ?>" height="50" width="950"></td>
            </tr>
          <tr>
            <td colspan="7" height="10"></td>
            </tr>
          <tr>
            <td height="180" width="31"></td>
            <td valign="top" width="250"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1ozKmXipiXXXXXXXX-160-20.jpg'; ?>" style="margin-bottom: 15px;"><br>
              <div class="font" style="margin-bottom:10px;"><font color="#ac0405">·</font> 用户中心》我是卖家》支付方式管理》安装支付方式</div><div class="font"><font color="#ac0405">·</font>用户中心》我是卖家》配送方式管理》设置配送方式
  <br>
              <br>
  <div class="font"><font color="#ac0405">·</font>用户中心》我是卖家》商品管理》发布新商品<br>
  <br>
  <div class="font"><font color="#ac0405">·</font>商家必须在商品描述页面如实描述商品的信息，并填写正确的自己在第三方网店的此款商品链接，设置积分返点率，点击发布即可。</div></td>
            <td width="60" align="center"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1r6qmXeplXXXXXXXX-1-206.jpg'; ?>" height="206" width="1"></td>
            <td valign="top" width="250"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T195WmXhpoXXXXXXXX-200-21.jpg'; ?>" style="margin-bottom: 15px;"><br>
              <div class="font" style="margin-bottom:10px;"><font color="#ac0405">·</font> 猫口袋是第一个以C2C平台提出客户资源交换模式的商城网站，猫口袋商城的每笔成交订单不论货值交易额多少，每一个新客户消耗一颗商家猫粮。</div>
              <div class="font">
                <p><font color="#ac0405">·</font>猫粮是商家共享客户资源获得的分值。基本操作是商家向自己已开店的第三方C2C、B2C（淘宝/天猫/拍拍/有货/MSN购物/阿里巴巴）商城平台上已成交订单的客户赠送猫口袋积分卡，一个客户到猫口袋商城使用积分卡领取积分，商家增加一颗猫粮；<br><br>
                  <font color="#F83294">商家Ａ发布积分卡999＃，买家Z使用商家Ａ积分卡999＃兑取积分，买家Z在商家Ａ猫口袋店铺购物，不会消耗商家Ａ的猫粮。<br><br>
                    买家Z在商家Ａ猫口袋店铺一次购物，买家Z以后在商家Ａ猫口袋店铺购物不会消耗商家Ａ的猫粮。</font></p>
                </div></td>
            <td width="60" align="center"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1r6qmXeplXXXXXXXX-1-206.jpg'; ?>" height="206" width="1"></td>
            <td valign="top" width="265"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1VkemXlteXXXXXXXX-183-20.jpg'; ?>" style="margin-bottom: 15px;"><br>
              <div class="font" style="margin-bottom:10px;"><font color="#ac0405">·</font>猫口袋商城的类目商品排序，以及商品搜索排序规则均默认为按销量从多到少依次排序。</div>
              <div class="font" style="margin-bottom:10px;"><font color="#ac0405">·</font>另提供"商品的积分返点数量，店铺信用度，商品价格高低，商品浏览量，商品上架时间"</div>
              <div class="font" style="margin-bottom:10px;"><font color="#ac0405">·</font>请商家根据自己所经营商品特点，对每件商品做好适当优化，以便获得更高展现率和销量。</div>
              <div class="font"><font color="#ac0405">·</font>猫口袋专门开设特色市场，定期收集优秀商品免费定向推广，帮助商家获得更多客源流量。</div></td>
            <td width="20"></td>
            </tr>
          <tr>
            <td colspan="7" height="25"></td>
            </tr>
        </tbody></table>	</td>
  </tr>		 
    </tbody></table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody>
    
    <tr>
      <td colspan="3" height="15"></td>
    </tr>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td colspan="3" style="border: 1px solid rgb(212, 212, 212);" height="190"><table border="0" cellpadding="0" cellspacing="0" width="950">
        <tbody>
          <tr>
            <td colspan="7"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1OzSmXa4iXXXXXXXX-948-40.jpg'; ?>" alt="" /></td>
          </tr>
          <tr>
            <td rowspan="2" height="150" width="30"></td>
            <td></td>
            <td width="50"></td>
            <td width="257"></td>
            <td width="50"></td>
            <td width="236"></td>
            <td width="32"></td>
          </tr>
          <tr>
            <td><table border="0" cellpadding="0" cellspacing="0" width="274">
              <tbody>
                <tr>
                  <td valign="top" width="25"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1_yWmXhpoXXXXXXXX-15-20.png'; ?>" alt="" /></td>
                  <td rowspan="2" width="251"><font class="font">违反猫口袋的价格体系规定，发布于猫口袋商城的商品售价必须为相比该商家在第三方网店不高于或更低售价的规定，否则一律终止合作，并视情节严重给予分别一个月，三个月，永久的终止时间的处罚</font></td>
                </tr>
                <tr>
                  <td></td>
                </tr>
                <tr>
                  <td height="10"></td>
                  <td></td>
                </tr>
                <tr>
                  <td height="15"></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td height="18"></td>
                  <td class="tab1">&nbsp;</td>
                </tr>
              </tbody>
            </table></td>
            <td height="130"></td>
            <td valign="top"><table border="0" cellpadding="0" cellspacing="0" width="257">
              <tbody>
                <tr>
                  <td valign="top" width="25"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1C7emXoxeXXXXXXXX-15-20.png'; ?>" alt="" /></td>
                  <td><font class="font">涉及扰乱猫口袋在架商品的正常展示，例如恶意拍下架猫口袋在架商品；</font></td>
                </tr>
                <tr>
                  <td height="15"></td>
                  <td></td>
                </tr>
                <tr>
                  <td valign="top"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1WOWmXiNoXXXXXXXX-15-20.png'; ?>" alt="" /></td>
                  <td><font class="font">违背承诺，商家未按照承诺向买家提供服务，妨害买家权益的行为，例如交易不发货、未按照活动规定提供服务等</font></td>
                </tr>
                <tr>
                  <td height="35"></td>
                  <td></td>
                </tr>
              </tbody>
            </table></td>
            <td></td>
            <td valign="top"><table border="0" cellpadding="0" cellspacing="0" width="257">
              <tbody>
                <tr>
                  <td valign="top" width="25"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1yPqmXdtlXXXXXXXX-15-20.png'; ?>" alt="" width="15" height="20" /></td>
                  <td><font class="font">恶意炒作猫口袋商品成交的虚假交易；</font></td>
                </tr>
                <tr>
                  <td height="15"></td>
                  <td></td>
                </tr>
                <tr>
                  <td valign="top"><img src="<?php echo $this->res_base . "/" . 'images/storebm/T1BkemXoJeXXXXXXXX-15-20.png'; ?>" alt="" width="15" height="20" /></td>
                  <td><font class="font">严重违规行为，出售假货，发布违禁商品等</font></td>
                </tr>
                <tr>
                  <td height="35"></td>
                  <td></td>
                </tr>
              </tbody>
            </table></td>
            <td></td>
          </tr>
          <tr>
            <td height="25" colspan="7" align="center">&nbsp;</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td colspan="3" height="15"></td>
    </tr>
  </tbody>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tbody>
    <tr>
      <td colspan="3" style="border: 1px solid rgb(212, 212, 212);" height="100"><table border="0" cellpadding="0" cellspacing="0" width="950">
        <tbody>
          <tr>
            <td colspan="7"></td>
          </tr>
          <tr>
            <td rowspan="2" height="150" width="30"></td>
            <td></td>
            <td width="50"></td>
            <td width="257"></td>
            <td width="50"></td>
            <td width="236"></td>
            <td width="32"></td>
          </tr>
          <tr>
            <td align="center" valign="middle"><a href="index.php?app=apply" target="_blank"><img src="http://58.215.170.200/themes/mall/default/styles/default/images/1.jpg" alt="" border="0" align="middle" /></a></td>
            <td height="130" align="center" valign="middle"></td>
            <td align="center" valign="middle">
                <a href="index.php?app=article&act=view&article_id=37" target="_blank"><img src="<?php echo $this->res_base . "/" . 'images/2.jpg'; ?>" border="0" style="margin-top:10px;" ></a></td>
            <td align="center" valign="middle"></td>
            <td align="center" valign="middle"><a href="index.php?app=article&code=help" target="_blank"><img src="<?php echo $this->res_base . "/" . 'images/3.jpg'; ?>" border="0" style="margin-top:10px;" ></a></td>
            <td></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>

</div>
</div>


<?php echo $this->fetch('footer.html'); ?>