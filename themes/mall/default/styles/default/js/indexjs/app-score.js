KISSY.add("my~taojinbi",function(a){var d=a.DOM,b=a.Event,c=window.document;a.ready(function(){var f=d.get("#J_MyTjbItems"),e=d.get("#J_MyTjb");if(!e){return}d.addClass(f,"hidden");b.on(e,"mouseenter",function(g){g.preventDefault();d.removeClass(f,"hidden")});b.on(f,"mouseleave",function(g){if(g.target!==e){d.addClass(f,"hidden")}})})});SNS.namespace("qz");SNS.add("score-v2",function(){var e=YAHOO.util.Dom,a=YAHOO.util.Event,d=SNS.sys.Helper,f=YAHOO.lang,g=SNS.sys.snsCenterPanel,c=SNS.sys.BasicDataSource;var b=function(h){this.config={msg:["\u6210\u529f","\u4eca\u5929\u5df2\u7ecf\u9886\u8fc7\u4e86","\u7cfb\u7edf\u5f02\u5e38"],takeSuccessHtml:'<div class="lqcg_popup"> <div class="lqcg_content"><p class="success-tips">\u606d\u559c\u4f60\u6210\u529f\u83b7\u5f97<span class="num red">{coinAdd}</span>\u4e2a\u6dd8\u91d1\u5e01!</p>   {takenHtml}<p class="gray">\u660e\u5929\u518d\u6765\uff0c\u5c31\u53ef\u4ee5\u9886\u5230<b class="red">{coinTomorrow}</b>\u4e2a\u6dd8\u91d1\u5e01\uff0c\u522b\u5fd8\u8bb0\u54e6~</p><p class="total-assets"><span class = "bold">\u4f60\u7684\u6dd8\u91d1\u5e01\u603b\u8ba1\uff1a<span class="red">{coinOld}</span></span><a href="'+d.getApiURI("http://taojinbi.{serverHost}/record/my_coin_detail.htm")+'" target="_blank" class="link">\u67e5\u770b\u6211\u7684\u8d44\u4ea7\u6e05\u5355</a></p><a class="help-take-btn" hidefocus="true" href="javacript:;" id = "J_helpTakeCoin">\u5e2e\u9886\u6dd8\u91d1\u5e01</a><div class="help-take-tips"></div> </div></div><div class="add-friend-list">	 <div class="add-friend-content">    <div class ="add-friend-tips">			<p><img src="http://img01.taobaocdn.com/tps/i1/T1QOGIXnFiXXXXXXXX-180-21.png"/></p>			<p class="first">\u5e2e\u597d\u53cb\u9886\u91d1\u5e01\uff0c\u6bcf\u65e5\u53ef\u989d\u5916\u83b7\u8d60\u6dd8\u91d1\u5e01<span class="red">15</span>\u4e2a\uff01</p>			<p class="second">\u7ed9\u81ea\u5df1\u9886\u91d1\u5e01\uff0c\u6bcf\u65e5\u9886\u53d6\u6570\u91cf\u6700\u9ad8\u53ef\u8fbe<span class="red">40</span>\u4e2a\uff01</p>			<p class="friend-link"><a href="http://jianghu.taobao.com/admin/invite/invite_friend.htm?warmth=invite_friends" target="_blank" class="link">\u597d\u53cb\u4e0d\u591f\uff1f\u5feb\u53bb\u6dfb\u52a0\u66f4\u591a\u597d\u53cb\u5427\uff01</a></p>		</div>		<div class="recommend-friends">			<div class="recommend-friends-bd" id="J_MtFriendsWapper">			</div>		</div></div></div>',lessFiveHtml:'<div class="lqcg_popup"> <div class="lqcg_content less-five"><p class="fail-tips red">\u4eb2\uff0c\u67095\u4e2a\u597d\u53cb\u7684\u7528\u6237\u624d\u80fd\u5929\u5929\u9886\u91d1\u5e01</br>\u540c\u65f6\u8fd8\u53ef\u4ee5\u5e2e\u597d\u53cb\u9886\u91d1\u5e01\u54e6</p>   {takenHtml}	<p class="total-assets"><span class = "bold">\u4f60\u7684\u6dd8\u91d1\u5e01\u603b\u8ba1\uff1a<span class="red">{coinOld}</span></span><a href="'+d.getApiURI("http://taojinbi.{serverHost}/record/my_coin_detail.htm")+'" target="_blank" class="link">\u67e5\u770b\u6211\u7684\u8d44\u4ea7\u6e05\u5355</a></p><p class="not-enough">\u60a8\u76ee\u524d\u4ec5\u6709<a href="http://jianghu.taobao.com/admin/follow/myFollows.htm" target="_blank" class="red">{friendNum}</a>\u4e2a\u597d\u53cb<a href="http://jianghu.taobao.com/admin/invite/invite_friend.htm?warmth=invite_friends" hidefocus="true" class="invite-friends" hidefocus="true">\u53bb\u9080\u8bf7\u66f4\u591a\u597d\u53cb</a></span></p> </div></div><div class="add-friend-list">	 <div class="add-friend-content">    <div class ="add-friend-tips">			<p><img src="http://img01.taobaocdn.com/tps/i1/T1QOGIXnFiXXXXXXXX-180-21.png"/></p>			<p class="first">\u5e2e\u597d\u53cb\u9886\u91d1\u5e01\uff0c\u6bcf\u65e5\u53ef\u989d\u5916\u83b7\u8d60\u6dd8\u91d1\u5e01<span class="red">15</span>\u4e2a\uff01</p>			<p class="second">\u7ed9\u81ea\u5df1\u9886\u91d1\u5e01\uff0c\u6bcf\u65e5\u9886\u53d6\u6570\u91cf\u6700\u9ad8\u53ef\u8fbe<span class="red">40</span>\u4e2a\uff01</p>			<p class="friend-link"><a href="http://jianghu.taobao.com/admin/invite/invite_friend.htm?warmth=invite_friends" target="_blank" class="link">\u597d\u53cb\u4e0d\u591f\uff1f\u5feb\u53bb\u6dfb\u52a0\u66f4\u591a\u597d\u53cb\u5427\uff01</a></p>		</div>		<div class="recommend-friends">			<div class="recommend-friends-bd" id="J_MtFriendsWapper">			</div>		</div></div></div>',checkHtml:'<div class="coin-grant-popup"><div class="check-code"><p class="code-title">\u8f93\u5165\u4ee5\u4e0b\u9a8c\u8bc1\u7801\u9886\u53d6\u5f53\u65e5\u6dd8\u91d1\u5e01</p><p class="code-content"><input type="text" class="code-input J_CheckCode" maxlength="4" size="4" name="checkCode" /><img class="J_CodeImg code-img" src="{codeImgSrc}" class="J_CheckCodeImg" /><span class="code-help">\u770b\u4e0d\u6e05?<a class="J_CodeRefresh code-refresh" href="#">\u6362\u4e00\u5f20</a></span></p><div class="sns-msg code-error"><p class="J_CodeErrorMsg error"></p></div></div> </div>',grantUrl:"http://taojinbi.{serverHost}/home/grant_everyday_coin.htm",grantBtnHandle:"J_CoinGrantBtn",codeImg:"J_CodeImg",failedHandle:"J_FailedExchangeReg"};this._init(h)};b.prototype={_init:function(j){this.config=f.merge(this.config,j||{});var h=this,i=null;a.onDOMReady(function(){h.draw()})},draw:function(){var h=e.get(this.config.grantBtnHandle);if(!h){return}a.on(h,"click",function(i){a.preventDefault(i);this.grant('{"checkCode":null}')},this,true)},grant:function(o){var o=YAHOO.lang.JSON.parse(o);var n=e.get("UA_InputId");if(n){o.user_action=n.value}var l=e.get("J_EnterTime");if(l){o.enter_time=l.value}var q=this;var p=function(x){var z=x.isTake=="true"?'<p class="gray">\u53e6\u5916\u4eca\u5929\u4f60\u7684\u597d\u53cb\u8fd8\u5e2e\u4f60\u9886\u4e86<em>'+x.takeAmount+"</em>\u4e2a\uff01\uff08"+x.takeAmount+"\u91d1\u5e01\u5df2\u6253\u5165\u4f60\u7684\u8d26\u6237\uff09</p>":" ";var t=YAHOO.lang.substitute(q.config.takeSuccessHtml,{coinAdd:x.coinNew-x.coinOld,coinOld:x.coinNew,coinTomorrow:x.coinTomorrow,takenHtml:z});var u=YAHOO.lang.substitute(q.config.lessFiveHtml,{coinOld:x.coinNew,friendNum:x.friendNum,takenHtml:z});var v=YAHOO.lang.substitute(q.config.checkHtml,{codeImgSrc:q.config.codeImgSrc});if(x.auth==false){KISSY.use("",function(A){KISSY.use("",function(B){B.getScript("http://assets.taobaocdn.com/p/sns/1.0/widget/auth/auth.css?t="+new Date().getTime(),function(){},"GBK");B.getScript("http://assets.taobaocdn.com/p/sns/1.0/widget/auth/auth.js?t="+new Date().getTime(),function(){B.use("auth",function(C){C.sns.auth()})},"GBK")})});return}switch(x.code){case 1:e.get("J_Coin").innerHTML=x.coinNew;var s=e.get(q.config.grantBtnHandle);var r=e.getAncestorByTagName(s,"p");if(!r){return}s.innerHTML="\u8fde\u9886<span>"+x.daysTomorrow+"</span>\u5929&nbsp;<em>\u660e\u5929\u53ef\u9886<span id='J_CoinTomorrow'>"+x.coinTomorrow+"</span></em>";s.className="get-coin J_Tip havegetcoin";a.removeListener(s);takeCoinPanel=new SNS.sys.Popup({width:590,title:"\u63d0\u793a",hideMask:false,content:t,focus:1,buttons:[],autoShow:true,useAnim:true});takeCoinPanel.show();if(x.switcher.toLowerCase()=="true"){var w=setInterval(function(){if(e.get("J_MtFriendsWapper")){SNS.use(["SNS.widget.RecommendFriends"],function(){var A="http://i.{serverHost}/home/friendRecommendWidget.htm";SNS.request(d.getApiURI(A),{method:"get",dataType:"html",success:function(C){if(!C){return}var B=KISSY.DOM.get("#J_MtFriendsWapper");if(B){B.innerHTML=C;new SNS.widget.RecommendFriends({wapperId:"#J_FriendRecommended",containId:"#J_RecommendedList",itemType:"li",perPageNum:3,eachScrollNum:3})}}})});SNS.use(["SNS.widget.FriendFollow"],function(){SNS.widget.FriendFollow.config("#J_Follow2",{srcNode:"#J_FriendFollowGroupContainer"})});clearInterval(w)}},10)}else{var y=e.get("J_interestList");e.get("J_addFriNow").style.display="none";y.innerHTML='<p class="addfri-now"><a href="http://jianghu.taobao.com/admin/invite/invite_friend.htm?warmth=invite_friends" target="_blank">\u7acb\u5373\u53bb\u52a0\u597d\u53cb</a></p>'}e.removeClass("J_GetCoinTips","hidden");if(e.get("J_DaysTomorrow")){e.get("J_DaysTomorrow").innerHTML=x.daysTomorrow}e.get("J_CoinTomorrow").innerHTML=x.coinTomorrow;setTimeout(function(){var A=e.get("J_helpTakeCoin");a.on(A,"click",function(B){a.preventDefault(B);takeCoinPanel.hide();new KISSY.TakeCoin()})},1000);break;case 2:SNS.sys.snsDialog({content:q.config.msg[1],confirmBtn:function(){this.hide();var A=e.get(q.config.grantBtnHandle);var B=e.getAncestorByTagName(A,"p");if(!B){return}A.innerHTML="\u8fde\u9886<span>"+x.daysTomorrow+"</span>\u5929&nbsp;<em>\u660e\u5929\u53ef\u9886<span id='J_CoinTomorrow'>"+x.coinTomorrow+"</span></em>";A.className="get-coin J_Tip havegetcoin";a.removeListener(A);e.removeClass("J_GetCoinTips","hidden");if(e.get("J_DaysTomorrow")){e.get("J_DaysTomorrow").innerHTML=x.daysTomorrow}e.get("J_CoinTomorrow").innerHTML=x.coinTomorrow},cancelBtn:false});break;case 3:SNS.sys.snsDialog({content:q.config.msg[2],confirmBtn:function(){this.hide()},cancelBtn:false});break;case 4:i(v,q);break;case 5:i(v,q,"\u9a8c\u8bc1\u7801\u9519\u8bef,\u8bf7\u91cd\u8bd5!");q.codeRefresh(q.config.codeImg,q.config.codeImgSrc);break;case 6:e.get("J_Coin").innerHTML=x.coinNew;var s=e.get(q.config.grantBtnHandle);var r=e.getAncestorByTagName(s,"p");if(!r){return}s.className="get-coin J_Tip ";a.removeListener(s);takeCoinPanel=new SNS.sys.Popup({width:590,title:"\u63d0\u793a",hideMask:false,content:u,focus:1,buttons:[],autoShow:true,useAnim:true});takeCoinPanel.show();if(x.switcher.toLowerCase()=="true"){var w=setInterval(function(){if(e.get("J_MtFriendsWapper")){SNS.use(["SNS.widget.RecommendFriends"],function(){var A="http://i.{serverHost}/home/friendRecommendWidget.htm";SNS.request(d.getApiURI(A),{method:"get",dataType:"html",success:function(C){if(!C){return}var B=KISSY.DOM.get("#J_MtFriendsWapper");if(B){B.innerHTML=C;new SNS.widget.RecommendFriends({wapperId:"#J_FriendRecommended",containId:"#J_RecommendedList",itemType:"li",perPageNum:3,eachScrollNum:3})}}})});SNS.use(["SNS.widget.FriendFollow"],function(){SNS.widget.FriendFollow.config("#J_Follow2",{srcNode:"#J_FriendFollowGroupContainer"})});clearInterval(w)}},10)}else{var y=e.get("J_interestList");e.get("J_addFriNow").style.display="none";y.innerHTML='<p class="addfri-now"><a href="http://jianghu.taobao.com/admin/invite/invite_friend.htm?warmth=invite_friends" target="_blank">\u7acb\u5373\u53bb\u52a0\u597d\u53cb</a></p>'}break}};var j=function(){d.showMessage(q.config.msg[2])};var i=function(y,v,x){var u=new SNS.sys.Popup({width:404,title:"\u63d0\u793a",hideMask:false,content:y,focus:1,buttons:[{text:"\u63d0\u4ea4\u9886\u53d6\u6dd8\u91d1\u5e01",func:function(){m(this)}}],autoShow:true,useAnim:true});var s=e.getElementsByClassName("J_CheckCode");var t=s[s.length-1];a.on(t,"keydown",function(z){if(a.getCharCode(z)===13){m(u)}});var r=e.getElementsByClassName("J_CodeRefresh");var w=r[r.length-1];a.on(w,"click",function(){v.codeRefresh(v.config.codeImg,v.config.codeImgSrc)},this,true);if(x){h(x)}};var m=function(t){var r=e.getElementsByClassName("J_CheckCode");var s=r[r.length-1];if(s.value.trim()){q.grant('{"checkCode":"'+s.value+'"}');t.hide()}else{h("\u8bf7\u8f93\u5165\u9a8c\u8bc1\u7801!")}};var h=function(s){var r=e.getElementsByClassName("J_CodeErrorMsg");var r=r[r.length-1];r.innerHTML=s;e.addClass(e.getElementsByClassName("code-error","div"),"code-error-show")};d.regApiServer({coin:q.config.grantUrl});var k=new c({url:d.getApiURI("coin:"),parms:o,success:p,failure:j}).json()},coinGrantTip:function(){var h=e.get("J_CoinGrantBtn"),j=e.get("J_CoinGrantTip");if(!h||!j){return}var k=null,i=window.setTimeout(function(){e.setStyle(j,"display","block");k=window.setTimeout(function(){e.setStyle(j,"display","none")},5000)},500);a.on(h,"mouseover",function(l){if(null!=i){window.clearTimeout(i)}if(null!=k){window.clearTimeout(k)}e.setStyle(j,"display","block")});a.on(h,"mouseout",function(l){e.setStyle(j,"display","none")})},codeRefresh:function(i,h){var j=e.getElementsByClassName(i);var i=j[j.length-1];if(!i){return}i.src=SNS.sys.Helper.addStamp(h)}};SNS.app.Score=b});SNS.add("trade_coin",function(){var e=YAHOO.util.Dom,b=YAHOO.util.Event,d=SNS.sys.Helper,g=YAHOO.lang;var a=KISSY;var c=function(h){this.config={coin:0,tmsID:"J_Tms"};this._init(h)};c.prototype={_init:function(i){this.config=g.merge(this.config,i||{});var h=this;b.onDOMReady(function(){h.popup()})},popup:function(){var i;if(this.config.coin>0){if(this.config.act==1){i='<div class="lqcg_popup"><div class="lqcg_content" style="margin-left:30px;"><span style="font-size:14px; font-weight:bold;">\u606d\u559c\u4f60\u6210\u529f\u83b7\u5f97<span style="color:#c00;">'+this.config.coin+'</span>\u670d\u9970\u6dd8\u91d1\u5e01</span><br>\u4f60\u7684\u6dd8\u91d1\u5e01\u603b\u6570\u5df2\u7ecf\u8fbe\u5230<span style="color:#c00;">'+this.config.coinUserSum+'</span>\u4e2a\u54af!<br>\u5176\u4e2d\u670d\u9970\u6dd8\u91d1\u5e01<span style="color:#c00;">'+this.config.actCoinUserSum+'</span>\u4e2a!<br><br><span style="margin-top:15px;">2011\u5e7412\u670812\u65e5,\u7528\u6dd8\u91d1\u5e01\u5373\u53ef\u4e13\u4eab\u8d85\u8fc73000\u4e07\u514d\u8d39\u5546\u54c1\u53ca\u8d85\u4f4e\u6298\u6263\u5151\u6362,\u8fd8\u6709\u767e\u4e07\u65c5\u6e38\u5927\u5956\u7b49\u4f60\u74dc\u5206,\u514d\u8d39\u6e38\u4e16\u754c\uff08\u65c5\u6e38\u5927\u5956\u7531\u6b4c\u8389\u5a05\u54c1\u724c\u72ec\u5bb6\u8d5e\u52a9\uff09</span><iframe scrolling="no" frameborder="0" style="border:0; overflow: hidden; height: 30px; width: 100%;margin-top:3px;" src="http://www.taobao.com/go/rgn/taojinbi/shuang12_activity_url.php"></iframe></div><iframe scrolling="no" frameborder="0" style="border:0; overflow: hidden; height: 220px; width: 100%;" src="http://www.taobao.com/go/rgn/taojinbi/shuang12_float_banner.php"></iframe></div>'}else{i='<div class="lqcg_popup"><div class="lqcg_content" style="margin-left:30px;"><span style="font-size:14px; font-weight:bold; line-height: 24px;">\u606d\u559c\u4f60\u6210\u529f\u83b7\u5f97<span style="color:#c00;">'+this.config.coin+'</span>\u6dd8\u91d1\u5e01</span><br>\u4f60\u7684\u6dd8\u91d1\u5e01\u603b\u6570\u5df2\u7ecf\u8fbe\u5230<span style="color:#c00;">'+this.config.coinUserSum+'</span>\u4e2a\u54af!<br><br><span class="act skin-gray coin-act"><span  class="share" id="J_Share"><a href="#" class="share-btn" >\u5206\u4eab</a></span><span id="J_NotShare" class="not-share"><a class="not-share-btn" href="#">\u4e0d\u5206\u4eab</a></span></span><br><br></div><iframe scrolling="no" frameborder="0" style="border:0; overflow: hidden; height: 220px; width: 100%;" src="http://www.taobao.com/go/rgn/taojinbi/float-favor.php"></iframe></div>'}e.get(this.config.tmsID).innerHTML="";var h=new SNS.sys.Popup({width:590,title:"\u9886\u53d6\u6dd8\u91d1\u5e01\u6210\u529f",hideMask:false,content:i,focus:1,buttons:[]})}else{if(this.config.closeCoin){i='<p class="error-content" style="margin:10px 0 0 15px;line-height:15px">\u5f88\u62b1\u6b49\uff0c\u7531\u4e8e\u53cc\u5341\u4e00\u5927\u4fc3\u671f\u95f4\u6709\u592a\u591a\u7684\u4eba\u8ddf\u4f60\u4e00\u6837\u6765\u9886\u91d1\u5e01\u3002<br />\u6211\u4eec\u7684\u7cfb\u7edf\u5df2\u7ecf\u6fd2\u4e34\u9ad8\u5371\u72b6\u6001\u3002\u4f46\u6211\u4eec\u5df2\u7ecf\u8bb0\u5f55\u4e86\u60a8\u8981\u9886\u53d6\u7684\u6dd8\u91d1\u5e01\u6570\u91cf\u3002<br />\u5728\u4e0b\u5468\u4e00\u5b9a\u4f1a\u53d1\u5230\u60a8\u7684\u6dd8\u91d1\u5e01\u8d26\u6237\u5185\uff0c\u5c4a\u65f6\u60a8\u518d\u5230\u6dd8\u91d1\u5e01\u91cc\u67e5\u8be2\u53d1\u653e\u660e\u7ec6\u54c8\uff01<br />\u6240\u4ee5\uff0c\u73b0\u5728\uff0c\u4f60\u5c31\u7ee7\u7eed\u52a0\u6cb9\u8840\u62fc\u5427~~~</p><span class="act skin-gray coin-act"><span class="share"  id="J_Share"><a href="#" class="share-btn" >\u5206\u4eab</a></span><span id="J_NotShare" class="not-share"><a class="not-share-btn" href="#">\u4e0d\u5206\u4eab</a></span></span><br><br>';var h=new SNS.sys.Popup({width:404,title:"\u9886\u53d6\u5931\u8d25",hideMask:false,content:i,type:"error",focus:1,buttons:[],autoShow:true,useAnim:true})}else{if(this.config.act==1){i='<div style="margin:10px 0 0 15px;line-height: 18px;"><p class="error-content" style="margin-bottom:5px;">\u554a\u54e6!\u9886\u53d6\u5931\u8d25,\u53ef\u80fd\u662f:<br />1.\u672c\u6b21\u4ea4\u6613\u7684\u670d\u9970\u6dd8\u91d1\u5e01,\u60a8\u5df2\u7ecf\u9886\u53d6\u6216\u4eca\u5929\u60a8\u5df2\u7ecf\u9886\u8fc72000\u4e2a\u670d\u9970\u6dd8\u91d1\u5e01.<br />2.\u7cfb\u7edf\u5ef6\u65f6,\u4f60\u9700\u8981\u91cd\u65b0\u70b9\u51fb\u9886\u53d6\u6309\u94ae\u83b7\u53d6\u91d1\u5e01.<br />3.\u8fc7\u4e86\u672c\u6b21\u4ea4\u6613\u7684\u670d\u9970\u6dd8\u91d1\u5e01\u7684\u9886\u53d6\u6709\u6548\u65f6\u95f4.</p><br /><span style="margin-top:15px;">\u60a8\u73b0\u5728\u53ef\u4ee5\u53bb\u670d\u9970\u201d\u5168\u6c11\u75af\u62a2\u201d\u6d3b\u52a8\u9875\u9762\u67e5\u770b\u670d\u9970\u6dd8\u91d1\u5e01\u8be6\u60c5\u8bf4\u660e\uff01</span></div><iframe scrolling="no" frameborder="0" style="border:0; overflow: hidden; height: 30px; width: 100%;margin-top:3px;" src="http://www.taobao.com/go/rgn/taojinbi/shuang12_activity_url.php"></iframe><br><br>';var h=new SNS.sys.Popup({width:450,title:"\u9886\u53d6\u5931\u8d25",hideMask:false,content:i,type:"error",focus:1,buttons:[],autoShow:true,useAnim:true})}else{i='<div style="margin:10px 0 0 15px;line-height: 18px;"><p class="error-content" style="margin-bottom:5px;">\u554a\u54e6!\u9886\u53d6\u5931\u8d25,\u53ef\u80fd\u662f:<br />1.\u672c\u6b21\u4ea4\u6613\u7684\u6dd8\u91d1\u5e01,\u4f60\u5df2\u7ecf\u9886\u53d6\u6216\u4eca\u5929\u4f60\u5df2\u7ecf\u9886\u8fc750\u4e2a\u91d1\u5e01.<br />2.\u7cfb\u7edf\u5ef6\u65f6,\u4f60\u9700\u8981\u91cd\u65b0\u70b9\u51fb\u9886\u53d6\u6309\u94ae\u83b7\u53d6\u91d1\u5e01.<br /></p><span class="act skin-gray coin-act"><span class="share"  id="J_Share"><a href="#" class="share-btn" >\u5206\u4eab</a></span><span id="J_NotShare" class="not-share"><a class="not-share-btn" href="#">\u4e0d\u5206\u4eab</a></span></span><br><br></div>';var h=new SNS.sys.Popup({width:404,title:"\u9886\u53d6\u5931\u8d25",hideMask:false,content:i,type:"error",focus:1,buttons:[],autoShow:true,useAnim:true})}}}b.on(e.get("J_Share"),"click",function(k){h.hide();var j=e.get("J_Share");if("undefined"!==typeof TS){f(j)}else{a.IO.getScript("http://a.tbcdn.cn/apps/snstaoshare/widget/ts/ts.js?t="+new Date().getTime(),function(){f(j)})}});b.on(e.get("J_NotShare"),"click",function(){h.hide()});b.on(e.get("J_goShare"),"click",function(){h.hide()})}};var f=function(h){var i=a.DOM.attr(h,"data-param");if(i){i=a.JSON.parse(i)}TS.require("Share","2.0",function(){new TS.Share(i?{param:i}:{},a.DOM.attr(h,"data-name")||"").show(a.DOM.attr(h,"data-type"))})};SNS.app.TradeCoin=c});SNS.add("wwPopup",function(){var a=KISSY,d=a.DOM,c=a.Event;var b=function(e){this.config={coin:15};this._init(e)};b.prototype={_init:function(e){this.config=a.merge(this.config,e||{});if(this.config.coin>0){this.config.html='<div class="coin-grant-popup"><div class="header">\u5c0f\u63d0\u793a</div><h3>\u606d\u559c\u4f60\uff0c\u6210\u529f\u83b7\u5f97<span>'+this.config.coin+'</span>\u6dd8\u91d1\u5e01</h3><div class="content"><p style="text-align: left; width: 344px; line-height: 22px; margin: 15px auto 0pt;">\u6d3b\u52a8\u89c4\u5219\uff1a<br>1.\u83b7\u5f97\u7684\u6dd8\u91d1\u5e01\u4f1a\u572824\u5c0f\u65f6\u5185\u5230\u8d26\u3002<br>2.\u6bcf\u5929<em>6:00-22:00</em>\u767b\u5f55\u963f\u91cc\u65fa\u65fa\u5e76\u5728\u7ebf\u6ee1<em>5</em>\u5c0f\u65f6\u7684\u7528\u6237\uff0c\u6709\u673a\u4f1a\u83b7\u5f97<em>15</em>\u6dd8\u91d1\u5e01\u7684\u5956\u52b1\u3002<br><span style="color:#999">\u6d3b\u52a8\u6709\u6548\u671f\uff1a2010.12.11-2011.1.06</span></p><p class="act skin-red coin-act"><span class="btn coin-btn"><a id="J_confirm" href="#">\u5173&nbsp;\u95ed</a></span></p></div></div></div>'}else{this.config.html='<div class="coin-grant-popup"><div class="header">\u5c0f\u63d0\u793a</div><div class="content" style="padding:20px;height:60px;"><p style="float:left;margin-right:10px"><img src="http://a.tbcdn.cn/app/sns/img/face/46.gif" /></p><p style="text-align:left;font-size:16px;">\u6dd8\u91d1\u5e01\u83b7\u5f97\u5931\u8d25\uff0c\u767b\u5f55\u963f\u91cc\u65fa\u65fa\u5728\u7ebf\u6ee15\u5c0f\u65f6\u9001\u91d1\u5e01\u6bcf\u5929\u53ea\u80fd\u5728\u5f53\u65e5\u83b7\u5f97\u4e00\u6b21\u3002</p></div></div>'}},popup:function(){var e=new SNS.sys.snsCenterPanel(this.config.html,{width:"404px",opacity:0.5});c.on(d.get("#J_confirm"),"click",function(){e.hide()})}};SNS.app.wwPopup=b});KISSY.ready(function(b){var f=b.DOM,c=b.Event,e=window,d=document,a=d.body;SNS.use(function(i){var j={_popup:null,show:function(n){var m=j,k=this.getAttribute("data-tips"),o=f.offset(this),l=m._createPop(k);f.removeClass(l,"hidden");f.offset(m._popup,{left:o.left+(this.offsetWidth-l.offsetWidth)/2,top:o.top-80})},_createPop:function(m){var k=this,l=k._popup;if(!l){l=d.createElement("span");l.className="popup-tips";a.appendChild(l);k._popup=l}l.innerHTML='<span class="txt">'+m+'</span><span class="arrow"></span>';return k._popup},hide:function(l){var k=j;f.addClass(k._popup,"hidden")}};function h(k){c.on(k,"mouseenter",j.show);c.on(k,"mouseleave",j.hide)}var g=f.query(".J_Tip","#content");if(g.length>0){h(g)}});SNS.use(function(k){var j=k.sys,i=f.query(".J_Share"),l=f.get("#J_ShareContent"),h,g;if(0===i.length||!l){return}h='<h3 class="title">\u590d\u5236\u94fe\u63a5\u7ed9\u597d\u53cb</h3><div class="bd">'+l.innerHTML+"</div></div>";c.on(i,"click",function(m){m.preventDefault();if(!g){g=j.snsNearbyPanel(m.target,h,{coordinate:[1,4],hideHandle:"true",offsetLeft:"10px"});c.on("#J_copyPrizeBtn","click",function(o){o.preventDefault();var n=f.get("#J_copyPrizeInput");j.Clipboard.clip(n.value,function(){n.select()})})}setTimeout(function(){g.show()},100)})});SNS.use(function(h){var g=f.get("#J_Winner");if(!g){return}if(!f.get("#J_Winner li")){return}b.use("switchable",function(){var i=new b.Slide(g,{effect:"scrolly",steps:1,viewSize:[62],contentCls:"u-list",delay:0.2,autoplay:true,hasTriggers:false,circular:true});i.length=Math.ceil(b.query("li",g).length/4)})})});SNS.add("fade",function(){var b=KISSY,d=b.DOM,a=b.Anim;var c=function(e){this.config={container:"J_Fade",timing:5000,duration:0.5};this._init(e);this._play()};c.prototype={_init:function(e){this.config=b.merge(this.config,e||{})},_fade:function(f,e){d.css(e,"opacity",1);self.anim=new a(f,{opacity:0},this.config.duration,this.config.easing,function(){self.anim=undefined;d.css(e,"z-index",9);d.css(f,"z-index",1)}).run()},_play:function(){var g=d.children(d.get("#"+this.config.container));var f=0;var e=this;setInterval(function(){e._fade(g[f%g.length],g[(f+1)%g.length]);f++},this.config.timing)}};SNS.app.Fade=c});SNS.add("exchange",function(S){var K=KISSY,D=K.DOM,E=K.Event,IO=K.IO;var exchange={init:function(){E.on(".J_exchange","click",this._confirm,this);E.on(".J_raffle","click",this._raffle,this)},checkLogin:function(){if(!S.sys.Helper.checkLogin()){location.href=S.sys.Helper.getApiURI("http://login.{serverHost}/member/login.jhtml?redirect_url="+location.href);return false}return true},_confirm:function(e){e.preventDefault();var self=this;if(!this.checkLogin()){return}var coin=D.attr(e.target,"data-exchange-coin");var onlineId=D.attr(e.target,"data-online-id");var html="<br/><p>1. \u70b9\u51fb\u201c\u786e\u5b9a\u201d\u5c06\u6263\u9664<em style='color:#E11114;'>"+coin+"</em>\u6dd8\u91d1\u5e01\uff01</p><br/><p>2. \u5151\u6362\u6210\u529f\u540e\uff0c\u8bf7<em style='color:#E11114;'>12</em>\u5c0f\u65f6\u5185\u5728\u5e97\u94fa\u4ee5\u201c\u6dd8\u91d1\u5e01\u4ef7\u201d\u8d2d\u4e70\u5e76\u4ed8\u6b3e\uff0c\u8d85\u65f6\u201c\u6dd8\u91d1\u5e01\u4ef7\u201d\u5c06\u5931\u6548\uff0c\u91d1\u5e01\u4e0d\u8fd4\u8fd8\uff01</p><br/>";var popup=new SNS.sys.Popup({width:404,title:"\u786e\u8ba4\u5151\u6362",hideMask:false,content:html,focus:1,autoShow:true,useAnim:true,buttons:[{text:"\u786e\u5b9a",func:function(){this.hide();self._request(onlineId)}},{text:"\u53d6\u6d88",func:function(){this.hide()}}]})},_raffle:function(e){var self=this;e.preventDefault();if(!this.checkLogin()){return}var onlineId=D.attr(e.target,"data-online-id");var flash=D.get("#J_flash");IO.get(S.sys.Helper.getApiURI("http://taojinbi.{serverHost}/detail/exchange_excutor.htm?online_id="+onlineId),function(data){data=eval("("+data+")");if(data.success&&data.msg!="RETURN_COIN_AFTER_RAFFLE"){flash.innerHTML='<object style="height:190px;width:313px" id="movie" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"><param name="allowScriptAccess"   value="always" /> <param name="wmode" value="transparent"> <param name="movie" value="http://a.tbcdn.cn/app/sns/img/success.swf" /><embed name="movie" src="http://a.tbcdn.cn/app/sns/img/success.swf" type="application/x-shockwave-flash" wmode="transparent" swLiveConnect="true" allowScriptAccess="always" style="height:190px;width:313px"/></object>'}else{if(data.msg=="ERROR_IS_XIAOER"||data.msg=="ERROR_SYSTEM"||data.msg=="ERROR_AREADY_OFFLINE"||data.msg=="ERROR_COIN_NOT_ENOUGH"||data.msg=="ERROR_AWARD_NOT_ENOUGH"){self._showResult(data);return}else{if(data.msg!="RETURN_COIN_AFTER_RAFFLE"){var random=Math.floor(Math.random()*27)+1;flash.innerHTML='<object style="height:190px;width:313px" id="movie" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"><param name="allowScriptAccess"   value="always" /> <param name="wmode" value="transparent"><param name="movie" value="http://a.tbcdn.cn/app/sns/img/failure'+random+'.swf" /><embed name="movie" src="http://a.tbcdn.cn/app/sns/img/failure'+random+'.swf" type="application/x-shockwave-flash" wmode="transparent" swLiveConnect="true" allowScriptAccess="always" style="height:190px;width:313px"/></object>'}else{var random=Math.floor(Math.random()*9)+1;flash.innerHTML='<object style="height:190px;width:313px" id="movie" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"><param name="allowScriptAccess"   value="always" /> <param name="wmode" value="transparent"><param name="movie" value="http://a.tbcdn.cn/app/sns/img/return'+random+'.swf" /><embed name="movie" src="http://a.tbcdn.cn/app/sns/img/return'+random+'.swf" type="application/x-shockwave-flash" wmode="transparent" swLiveConnect="true" allowScriptAccess="always" style="height:190px;width:313px"/></object>'}}}setTimeout(function(){self._showResult(data)},5000);flash.style.display="block";var anim=new K.Anim("#J_flash","height:198px",0.5,"easeOutStrong");anim.run()})},_showResult:function(data){var html={ERROR_SYSTEM:'<p class="error-content">\u7cfb\u7edf\u8fd9\u4f1a\u592a\u5fd9\u4e86\uff0c\u6709\u70b9\u5904\u7406\u4e0d\u8fc7\u6765\uff0c\u8981\u4e0d\u4f60\u518d\u5237\u65b0\u8bd5\u8bd5\uff1f</p>',ERROR_AREADY_OFFLINE:'<p class="error-content">\u5bf9\u4e0d\u8d77\uff0c\u8be5\u5b9d\u8d1d\u5151\u6362\u65f6\u95f4\u7ed3\u675f\uff0c\u5df2\u7ecf\u4e0b\u67b6\u4e86\uff01</p>',ERROR_IS_XIAOER:'<p class="error-content">\u636e\u6211\u6240\u77e5\uff0c\u4f60\u597d\u50cf\u662f\u5c0f\u4e8c\u5427\uff0c\u5151\u6362\u6216\u62bd\u5956\u662f\u4e0d\u5141\u8bb8\u7684\u54e6\uff01\uff01</p>',ERROR_OUTOF_EXCHANGE_TIME:'<p class="error-content">\u5bf9\u4e0d\u8d77\uff0c\u8be5\u5b9d\u8d1d\u5151\u6362\u65f6\u95f4\u7ed3\u675f\uff0c\u5df2\u7ecf\u4e0b\u67b6\u4e86\uff01</p>',ERROR_ALREADY_EXCHANGE:'<p class="error-content">\u8fd9\u4e2a\u793c\u54c1\u4f60\u662f\u4e0d\u662f\u5df2\u7ecf\u5151\u5230\u8fc7\u4e86\uff1f\u53bb\u770b\u770b\u5176\u5b83\u8fd8\u80fd\u5151\u6362\u4ec0\u4e48\u4e1c\u4e1c\u5427!</p>',ERROR_COIN_NOT_ENOUGH:'<p class="error-content">\u5f88\u62b1\u6b49\u4f60\u7684\u6dd8\u91d1\u5e01\u4e0d\u8db3\uff0c\u53bb\u8d5a\u66f4\u591a\u7684\u6dd8\u91d1\u5e01\u5466...!</p>',ERROR_CONSUME_COIN:'<p class="error-content">\u5bf9\u4e0d\u8d77\uff0c\u5151\u6362\u5931\u8d25\uff0c\u8bf7\u91cd\u65b0\u5151\u6362\uff01</p>',ERROR_AWARD_NOT_ENOUGH:'<p class="error-content">\u771f\u9057\u61be\u4f60\u6162\u4e860.0001\u79d2\uff0c\u8fd9\u4e2a\u793c\u54c1\u5df2\u7ecf\u88ab\u5151\u5b8c\u4e86.... \u73b0\u5728\u53bb\u770b\u770b\u5176\u5b83\u8fd8\u6709\u4ec0\u4e48\u53ef\u4ee5\u5151\u6362\u7684\u4e1c\u4e1c\u5427\uff01</p>',ERROR_CAN_NOT_LOTTERY:'<p class="error-content">\u5f88\u9057\u61be\uff0c\u53ea\u5dee\u4e00\u70b9\u70b9\u5c31\u62bd\u4e2d\u4e86\uff0c\u518d\u8bd5\u4e00\u6b21\u5427\uff01</p>',ERROR_DRAW_ALIPAY_BONUS_FAIL:'<p class="error-content">\u4e0d\u597d\u610f\u601d\uff0c\u7ea2\u5305\u53d1\u653e\u5931\u8d25\u4e86<br/>\u8bf7\u5230"<a href="http://taojinbi.taobao.com/record/user_records.htm">\u5df2\u83b7\u5f97\u793c\u54c1\u4e2d</a>"\u9875\u9762\u4e2d\u91cd\u65b0\u9886\u53d6</p>',ERROR_DRAW_ALIPAY_BONUS_NOT_BANDING:'<p class="error-content">\u5bf9\u4e0d\u8d77\uff0c\u65e0\u6cd5\u9886\u53d6\u7ea2\u5305<br />\u4f60\u7684\u6dd8\u5b9d\u8d26\u53f7\u8fd8\u6ca1\u6709\u7ed1\u5b9a\u652f\u4ed8\u5b9d\u8d26\u53f7</p><p style="margin-left:10px;">\u9886\u53d6\u89c4\u5219\uff1a<br />\u7b2c1\u6b65\uff1a\u7ed1\u5b9a\u4f60\u7684\u652f\u4ed8\u5b9d\u8d26\u6237<br />\u7b2c2\u6b65\uff1a\u56de\u5230\u6dd8\u91d1\u5e01"<a href="http://taojinbi.taobao.com/record/user_records.htm?tracelog=qzindex006" target="_blank">\u5df2\u83b7\u5f97\u793c\u54c1</a>"\u9875\u9762\u4e2d\u518d\u6b21\u9886\u5956</p>',ERROR_MARKETING_BINDING:'<p class="error-content">\u5bf9\u4e0d\u8d77\uff0c\u5151\u6362\u5931\u8d25\uff0c\u8bf7\u91cd\u65b0\u5151\u6362\uff01</p>',RETURN_COIN_AFTER_RAFFLE:'<p class="marketing-succed-content">\u54c7 \u6709\u4e24\u4e2a\u56fe\u7247\u4e00\u6837\uff0c\u4e5f\u5f88\u8fd0\u6c14\u54e6\uff0c\u7279\u9001\u4f60'+data.returnCoin+'\u6dd8\u91d1\u5e01\uff01\u7ee7\u7eed\u5427\uff0c\u51fa\u73b0"\u4e09\u4e2a\u8d22\u795e"\u5c31\u80fd\u5f97\u5230\u8fd9\u4e2a\u5b9d\u8d1d</p>',ALIPAY_SUCCESS:'<p class="marketing-succed-content">\u606d\u559c\uff01\u7ea2\u5305\u5df2\u7ecf\u53d1\u653e\u53d1\u5230\u4f60\u7684\u652f\u4ed8\u5b9d\u8d26\u6237\u4e2d\uff0c\u4f60\u73b0\u5728\u5c31\u53ef\u4ee5\u7528<span class="red">\u7ea2\u5305+\u73b0\u91d1</span>\u8d2d\u4e70\u5151\u6362\u7684\u5b9d\u8d1d\u4e86</p><p >\u8bf7\u6309\u4ee5\u4e0b\u6b65\u9aa4\u64cd\u4f5c\uff1a<br />\u7b2c1\u6b65\uff1a\u70b9\u51fb\u4e0b\u65b9\u6309\u94ae\u8fdb\u5165\u5b9d\u8d1d\u9875\u9762\uff0c\u5e76\u62cd\u4e0b\u8be5\u5b9d\u8d1d<br />\u7b2c2\u6b65\uff1a\u4ed8\u6b3e\u65f6\uff0c\u8bf7\u9009\u62e9\u4f7f\u7528\u652f\u4ed8\u5b9d\u7ea2\u5305\u4ed8\u6b3e</p>',MARKETING_SUCCESS:'<p class="marketing-succed-content">\u606d\u559c\u4f60,\u53ea\u5dee\u6700\u540e\u4e00\u6b65\u5c31\u80fd\u83b7\u5f97\u793c\u54c1\u54af!</p><p class="marketing-succed-detail">\u8bf7\u70b9\u51fb\u786e\u8ba4\u6309\u94ae\u524d\u5f80\u5e97\u94fa,\u4ee5"<strong> \u6dd8\u91d1\u5e01\u4ef7 </strong>"\u8d2d\u4e70\u5e76\u4ed8\u6b3e\u3002<br />\u91cd\u8981\u63d0\u9192\uff1a"\u6dd8\u91d1\u5e01\u4ef7"\u6709\u6548\u671f\u53ea\u6709<em>12</em>\u5c0f\u65f6\u54e6,\u8bf7\u5728<em>12</em>\u5c0f\u65f6\u5185\u4e0b\u5355\u5e76\u4ed8\u6b3e,\u8fc7\u671f"\u6dd8\u91d1\u5e01\u4ef7"\u5c06\u5931\u6548\u3002</p>',VISUAL_SUCCESS:'<p class="marketing-succed-content">\u606d\u559c\u4f60\uff01\u5151\u6362\u6210\u529f\uff01\u4f60\u53ef\u4ee5\u53bb<a href="http://taojinbi.taobao.com/record/user_records.htm">\u6211\u83b7\u5f97\u7684\u793c\u54c1</a>\u4e2d\u67e5\u770b\u3002\u6211\u4eec\u5c06\u4e8e5\u4e2a\u5de5\u4f5c\u65e5\u5185\u53d1\u653e\u5230\u60a8\u7684\u5e10\u53f7\uff01</p>',ERROR_INSUFFICIENT_PRIVILEGE:'<p class="error-content">\u5bf9\u4e0d\u8d77, \u8be5\u5b9d\u8d1d\u9700\u8981\u6709\u5bf9\u5e94\u7684\u7279\u6743\u624d\u80fd\u83b7\u5f97!</p>'};var popup=new SNS.sys.Popup({width:404,title:"\u5c0f\u63d0\u793a",type:data.success?"":"error",hideMask:false,content:html[data.msg],focus:1,autoShow:true,useAnim:true,buttons:[{text:"\u786e\u5b9a",func:function(){this.hide();if(data.href){window.location.href=data.href}}}]})},_request:function(onlineId){var self=this;IO.get(S.sys.Helper.getApiURI("http://taojinbi.{serverHost}/detail/exchange_excutor.htm?online_id="+onlineId),function(data){if(!data){data='{"success":false,"msg":"ERROR_SYSTEM"}'}self._showResult(eval("("+data+")"))})}};S.qz.exchange=exchange});SNS.add("exchange-confirm",function(){var b=KISSY,d=b.DOM,c=b.Event;var a=function(){this._init()};a.prototype={_init:function(){c.on(".J_Exchange","click",function(j){var g=d.attr(j.target,"data-exchange-url");var i=d.attr(j.target,"data-exchange-coin");var h="<br/><p>1. \u70b9\u51fb\u201c\u786e\u5b9a\u201d\u5c06\u6263\u9664<em style='color:#E11114;'>"+i+"</em>\u6dd8\u91d1\u5e01\uff01</p><br/><p>2. \u5151\u6362\u6210\u529f\u540e\uff0c\u8bf7<em style='color:#E11114;'>12</em>\u5c0f\u65f6\u5185\u5728\u5e97\u94fa\u4ee5\u201c\u6dd8\u91d1\u5e01\u4ef7\u201d\u8d2d\u4e70\u5e76\u4ed8\u6b3e\uff0c\u8d85\u65f6\u201c\u6dd8\u91d1\u5e01\u4ef7\u201d\u5c06\u5931\u6548\uff0c\u91d1\u5e01\u4e0d\u8fd4\u8fd8\uff01</p><br/>";var f=new SNS.sys.Popup({width:404,title:"\u786e\u8ba4\u5151\u6362",hideMask:false,content:h,focus:1,buttons:[],autoShow:true,useAnim:true,buttons:[{text:"\u786e\u5b9a",func:function(){this.hide();window.location.href=g}},{text:"\u53d6\u6d88",func:function(){this.hide()}}]})})}};SNS.app.exchangeConfirm=a});(function(){var a=KISSY,b=function(c){var d=a.DOM.attr(c,"data-param");if(d){d=a.JSON.parse(d)}TS.require("Share","2.0",function(){new TS.Share(d?{param:d}:{},a.DOM.attr(c,"data-name")||"").show(a.DOM.attr(c,"data-type"))})};a.Event.on("#J_Share","click",function(c){var d=c.target;if("a"===d.tagName.toLowerCase()){c.preventDefault();if("undefined"!==typeof TS){b(d)}else{a.IO.getScript("$!assetsServer/apps/snstaoshare/widget/ts/ts.js?t="+new Date().getTime(),function(){b(d)})}}})})();