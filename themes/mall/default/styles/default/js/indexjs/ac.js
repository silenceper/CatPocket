/*publish time:2011-09-23 15:14:34*/
(function(D){var F="_tb_acookie_loaded";if(D[F]){return }D[F]=1;var K=document,C=("https:"==K.location.protocol?"https://":"http://")+"acookie.taobao.com/1.gif",A=M(),B=location.pathname,J=K.referrer,L=escape(K.title),I=["/list_forum","/theme/info/info","/promo/co_header.php","fast_buy.htm","/add_collection.htm"];function H(){for(var O=0,N=I.length;O<N;O++){if(B.indexOf(I[O])!=-1){return true}}var P=/^https?:\/\/[\w\.]+\.taobao\.com\//i;return !P.test(J)}function M(){var N=K.getElementById("tb-beacon-ac");return N.getAttribute("exparams")||""}function E(N){return Math.floor(Math.random()*N)+1}var G={init:function(){if(parent===self||H()){G.send()}},send:function(){var O=new Image(),P="_ta_rndid_"+Math.random(),N=""+E(9999999999)+E(9999999999);D[P]=O;O.onload=O.onerror=function(){D[P]=null};O.src=C+"?acookie_load_id="+N+"&title="+L+"&pre="+escape(J)+"&isbetanew=1&"+A;O=null}};G.init()})(window);