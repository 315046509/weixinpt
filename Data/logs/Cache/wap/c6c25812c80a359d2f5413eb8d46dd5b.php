<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title><?php echo ($metaTitle); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?php echo RES;?>/weidingcan/index/css/diancai.css" rel="stylesheet" type="text/css">
<script src="<?php echo RES;?>/weidingcan/index/js/cookie.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/weidingcan/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>

<script src="<?php echo RES;?>/weidingcan/index/js/iscroll.js" type="text/javascript"></script>
<SCRIPT type=text/javascript>
var myScroll;
function loaded() {
	myScroll = new iScroll('wrapper', {
	snap: true,
	momentum: false,
	hScrollbar: false,
	onScrollEnd: function () {
	document.querySelector('#indicator > li.active').className = '';
	document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
	}
 });
}
document.addEventListener('DOMContentLoaded', loaded, false);
</SCRIPT>
<style type="text/css">
/*.round .dandanb ul { border-top:1px solid #ddd;}
.round .dandanb ul li{width:30%; height:36px; line-height:36px; float:left; text-indent:25px;}*/
.round .dandanb .kjj { border-top:1px solid #ddd;}
.round .dandanb .kjj span {width:30%; height:30px; line-height:32px; float:left; text-indent:25px; padding:0;margin:0;}
.round .dandanb .kjj span.tell{width:40%; background:url(<?php echo RES;?>/weidingcan/index/images/card/themes/1/icon_order.png) left 5px no-repeat; background-size:24px;}
.round .dandanb .kjj span.reserve{background:url(<?php echo RES;?>/weidingcan/index/images/card/themes/1/icon_reserve.png) left 5px no-repeat; background-size:24px;}
.round .dandanb .kjj span.lbs{background:url(<?php echo RES;?>/weidingcan/index/images/card/themes/1/icon_lbs.png) left 5px no-repeat; background-size:24px;}
.round .dandanb .kjj span a{color:#36B35F; text-decoration:none;}

</style>
</head>
<body id="diancaiindex">

<!--轮换图start-->
<div class="banner">
    <div id="wrapper">
        <div id="scroller">
            <ul id="thelist">
              <?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><!--<li><p><?php echo ($so["info"]); ?></p><a href="<?php echo ($so["url"]); ?>"><img src="<?php echo ($so["img"]); ?>" /></a></li>-->
                <li><p><?php echo ($so["info"]); ?></p><a href="#"><img src="<?php echo ($so["img"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>                 
            </ul>
        </div>
    </div>
    <div id="nav">
        <div id="prev" onClick="myScroll.scrollToPage('prev', 0,400,2);return false">&larr; prev</div>
            <ul id="indicator">
                        
                <?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li  <?php if($i == 1): ?>class="active"<?php endif; ?>  ><?php echo ($i); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
             
            </ul>
        <div id="next" onClick="myScroll.scrollToPage('next', 0);return false">next &rarr;</div>
    </div>
	<div class="clr"></div>
</div>
<!--轮换图end-->


<div class="cardexplain"> 

<!--热门商家-->
<ul class="round">
<li class="title"><span class="none smallspan">店铺信息(<?php echo ($branchStoreCount); ?>个)</span></li>
	<?php if(is_array($branchStores)): $i = 0; $__LIST__ = $branchStores;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($i % 2 );++$i;?><li class="dandanb"><a href="<?php echo U('Dining/cats',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>1,'setid'=>$b['id'],'dtype'=>$_GET['dtype'],'companyID'=>$b['id']));?>"><span class="none shangjia"><img src="<?php echo ($b["logourl"]); ?>"><h2><?php echo ($b["name"]); ?></h2>
<p>区域：<?php echo ($b["scope"]); ?></p><p>起送价：￥<?php echo ($b["money"]); ?></p><em class="ok"><?php if($b["status"] == 1): ?>未营业<?php else: ?>营业中<?php endif; ?></em></span></a>
<div class="kjj">
				<span class="tell"><a href="tel:<?php echo ($b["tel"]); ?>">电话预订</a></span>
				<span class="reserve"><a href="<?php echo U('Dining/about',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>1,'setid'=>$b['id']));?>">店铺信息</a></span>
				<span class="lbs"><a href="http://api.map.baidu.com/marker?location=<?php echo ($b["latitude"]); ?>,<?php echo ($b["longitude"]); ?>&amp;title=<?php echo ($b["name"]); ?>&amp;content=<?php echo ($b["address"]); ?>&amp;output=html">导航</a></span>
			</div>
            <div class="clr"></div>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>

<script>
var count = $("#thelist img").size();
$("#thelist img").css("width",document.body.clientWidth);
$("#scroller").css("width",document.body.clientWidth*count);
 setInterval(function(){
myScroll.scrollToPage('next', 0,400,count);
},3500 );
window.onresize = function(){
  $("#thelist img").css("width",document.body.clientWidth);
  $("#scroller").css("width",document.body.clientWidth*count);
} 

</script>

<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
WeixinJSBridge.call('hideToolbar');
});
</script>
</body>
</html>