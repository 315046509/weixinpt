<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/common.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/peak-3.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/menu-2.css" media="all" />
<script type="text/javascript" src="http://stc.weimob.com/src/jQuery.js?2013-12-18-1"></script>
<title><?php echo ($res["title"]); ?> - <?php echo ($tpl["wxname"]); ?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<meta content="telephone=no, address=no" name="format-detection">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<!-- Mobile Devices Support @end -->
<link rel="shortcut icon" href="<?php echo RES;?>/img/favicon.ico" />
<style>
img {
	width:100%!important;
}
</style>
</head>
<body onselectstart="return true;" ondragstart="return false;">
<div class="body" style="padding-bottom:60px;">
  <footer class="nav_footer">
    <ul class="box">
      <li><a href="javascript:history.go(-1);">返回</a></li>
      <li><a href="javascript:history.go(1);">前进</a></li>
      <li><a href="<?php echo U('Index/index',array('token'=>$res['token']));?>">首页</a></li>
      <li><a href="javascript:location.reload();">刷新</a></li>
    </ul>
  </footer>
  <section class="news_article">
    <header>
      <h3 style="font-size:14px;"><?php echo ($res["title"]); ?></h3>
      <small class="gray"><?php echo (date("y-m-d",$res["createtime"])); ?></small> </header>
    <article>
      <?php if(($res["showpic"]) == "1"): ?><p><img src="<?php echo ($res["pic"]); ?>" />
        <p><?php endif; ?>
      <span style="white-space:normal;">　　</span><?php echo (htmlspecialchars_decode($res["info"])); ?>
      <p>公众微信号:<?php echo ($tpl["weixin"]); ?></P>
    </article>
  </section>
  <section style="width:95%; margin:0px auto;">
    <div id="mcover" onClick="document.getElementById('mcover').style.display='';" style="display:none;"> <img src="<?php echo RES;?>/img/guide.png"> </div>
    <div class="text" id="content">
      <div id="mess_share">
        <div id="share_1">
          <button class="button2" onClick="document.getElementById('mcover').style.display='block';"> <img src="<?php echo RES;?>/img/icon_msg.png">&nbsp;发送给朋友 </button>
        </div>
        <div id="share_2">
          <button class="button2" onClick="document.getElementById('mcover').style.display='block';"> <img src="<?php echo RES;?>/img/icon_timeline.png">&nbsp;分享到朋友圈 </button>
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </section>
  <div style="padding-bottom:0!important;"> <a href="javascript:window.scrollTo(0,0);" style="font-size:12px;margin:5px auto;display:block;color:#fff;text-align:center;line-height:35px;background:#333;margin-bottom:-10px;">返回顶部</a> </div>
</div>
  <script>
		document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
			window.shareData = {
				"imgUrl": "<?php echo ($homeInfo["picurl"]); ?>",
				"timeLineLink": "<?php echo C('site_url'); echo U('Index/index',array('token'=>$vo['token']));?>",
				"sendFriendLink": "<?php echo C('site_url'); echo U('Index/index',array('token'=>$vo['token']));?>",
				"weiboLink": "<?php echo C('site_url'); echo U('Index/index',array('token'=>$vo['token']));?>",
				"tTitle": "欢迎访问<?php echo ($tpl["wxname"]); ?>微信版3G网站",
				"tContent": "欢迎访问<?php echo ($tpl["wxname"]); ?>微信版3G网站",
				"fTitle": "欢迎访问<?php echo ($tpl["wxname"]); ?>微信版3G网站",
				"fContent": "欢迎访问<?php echo ($tpl["wxname"]); ?>微信版3G网站",
				"wContent": "欢迎访问<?php echo ($tpl["wxname"]); ?>微信版3G网站"
			};
			// 发送给好友
			WeixinJSBridge.on('menu:share:appmessage', function (argv) {
				WeixinJSBridge.invoke('sendAppMessage', {
					"img_url": window.shareData.imgUrl,
					"img_width": "640",
					"img_height": "640",
					"link": window.shareData.sendFriendLink,
					"desc": window.shareData.fContent,
					"title": window.shareData.fTitle
				}, function (res) {
					_report('send_msg', res.err_msg);
				})
			});
			// 分享到朋友圈
			WeixinJSBridge.on('menu:share:timeline', function (argv) {
				WeixinJSBridge.invoke('shareTimeline', {
					"img_url": window.shareData.imgUrl,
					"img_width": "640",
					"img_height": "640",
					"link": window.shareData.timeLineLink,
					"desc": window.shareData.tContent,
					"title": window.shareData.tTitle
				}, function (res) {
					_report('timeline', res.err_msg);
				});
			});
		}, false)
	</script>
  <footer>
    <div class="copyright">
      <p align="center">
        <?php if($iscopyright == 1): ?>©<?php echo ($homeInfo["copyright"]); ?>
          <?php else: ?>
         ©<?php echo ($siteCopyright); endif; ?>
      </p>
    </div>
    <span class="support" style="display:none;">
    <?php if($iscopyright == 1): ?>©<?php echo ($homeInfo["copyright"]); ?>
      <?php else: ?>
      ©<?php echo ($siteCopyright); endif; ?>
    </span> </footer>
</div>
</body>
</html>
</body>
</html>