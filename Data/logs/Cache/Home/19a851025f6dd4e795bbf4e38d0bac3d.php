<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, user-scalable=no">
<meta content="<?php echo C('keyword');?>" name="Keywords">
<meta content="<?php echo C('content');?>" name="Description">
<title><?php echo C('site_name');?>-微信公众平台互动营销专家</title>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/base.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/auth.css"/>
<script type="text/javascript" src="<?php echo RES;?>/js/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/sea.js"></script>
</head>
<body>

<div class="header">

    <div class="site-nav header-background">

    	<div class="animated-color-line">

            <div class="colors ">

                <div class="color-part light-gray-bg show-color-part"></div>

                <div class="color-part blue-bg show-color-part"></div>

                <div class="color-part pink-bg show-color-part"></div>

                <div class="color-part orange-bg show-color-part"></div>

                <div class="color-part light-orange-bg show-color-part"></div>

                <div class="color-part yellow-bg show-color-part"></div>

                <div class="color-part green-bg show-color-part"></div>

            </div>

        </div>

        <div class="wPage">

        	<div class="header-nav">

                <div id="logo">

                    <a href="/" class="logocover"></a>

                    <a href="/" title="" hidefocus="true" class="logo-ornament logo-animation" id="logo_ornament"></a>

                </div>

                <ul>

                    <li><a href="/" class="hover" title="首页">首页</a></li>

                    <li class="divider"></li>

                    <li><a href="<?php echo U('Home/Index/about');?>">关于宏宏CMS</a></li>

                    <li class="divider"></li>

                    <li><a href="<?php echo U('Home/Index/service');?>">功能介绍</a></li>

                    <li class="divider"></li>

                    <li><a href="<?php echo U('Home/Index/case');?>">案例展示</a></li>

                    <li class="divider"></li>

                    <li><a href="<?php echo U('Home/Index/join');?>">招商代理</a></li>

                    <li class="divider"></li>

                    <li><a href="<?php echo U('Home/Index/help');?>">帮助中心</a></li>

                    <?php if($_SESSION[uid]==false): ?><li class="divider"></li>

                    <li><a href="<?php echo U('Home/Index/price');?>">资费说明</a></li>

                    <li class="divider"></li>

					<li><a href="<?php echo U('Home/Index/contact');?>">联系我们</a></li>

                    <?php else: ?>

                    <li class="divider"></li>

                    <li><a href="<?php echo U('User/Index/index');?>">管理中心</a></li>

                    <li class="divider"></li>

                    <li><a href="/#" onClick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" >退出</a></li><?php endif; ?>

                    <?php if($_SESSION[uid]==false): ?><li class="divider"></li>

                    <li class="header-account"><a href="<?php echo U('Home/Index/reg');?>" class="create">创建一个账号</a><a href="<?php echo U('Home/Index/index');?>" class="login">登录</a></li>

                    <?php else: ?>

                    <li class="header-account"><a href="#" class="a" id="tiduser" onMouseOver="ying();" ><span><?php echo (session('uname')); ?></span></a></li><?php endif; ?>

              </ul>

            </div>

        </div>

    </div>

</div>
<div class="wPage">
	<div class="content-area">
    	<div class="content-box">
        	<div class="con-hd">
            	功能简介
            </div>
            <div class="con-bd" style="padding:0px;">
            	<div class="servicebox">
                	<div class="serviceLeft">
                    	<ul class="ui-navigation" id="ui-navigation">
                        	<li class="selected" data-url="<?php echo RES;?>/Index/APPGuanwang.html">
                                <h2 class="expansion-0">微官网</h2>
                            </li>
                            <li  data-url="<?php echo RES;?>/Index/APPvipshop.html">
                                <h2 class="expansion-1">微商城</h2>
                            </li>
                            <li  data-url="<?php echo RES;?>/Index/APPmeiye.html">
                                <h2 class="expansion-2">微美业</h2>
                            </li>
                            <li  data-url="<?php echo RES;?>/Index/APPdiancai.html">
                                <h2 class="expansion-3">微餐饮</h2>
                            </li>
                            <li  data-url="<?php echo RES;?>/Index/APPhotel.html">
                                <h2 class="expansion-4">微酒店</h2>
                            </li>
                             <li  data-url="<?php echo RES;?>/Index/APPcar.html">
                                <h2 class="expansion-1">微汽车</h2>
                            </li>
                             <li  data-url="<?php echo RES;?>/Index/APPfang.html">
                                <h2 class="expansion-2">微房产</h2>
                            </li>
                             <li  data-url="<?php echo RES;?>/Index/APPvipcard.html">
                                <h2 class="expansion-4">微会员</h2>
                                </li>
                             <li  data-url="<?php echo RES;?>/Index/APPfuwu.html">
                                <h2 class="expansion-3">微服务</h2>
                                </li>
                             <li  data-url="<?php echo RES;?>/Index/APPshenghuo.html">
                                <h2 class="expansion-2">微生活</h2>
                                </li>
                             <li  data-url="<?php echo RES;?>/Index/APPyuyue.html">
                                <h2 class="expansion-1">微预约</h2>
                                </li>
                             <li  data-url="<?php echo RES;?>/Index/APPkefu.html">
                                <h2 class="expansion-4">微客服</h2>
                                </li>
                             <li  data-url="<?php echo RES;?>/Index/APPqiang.html">
                                <h2 class="expansion-0">微信墙</h2>
                                 </li>
                             <li  data-url="<?php echo RES;?>/Index/APPphoto.html">
                                <h2 class="expansion-2">微相册</h2>
                                </li>
                             <li  data-url="<?php echo RES;?>/Index/APPWcard.html">
                                <h2 class="expansion-1">微喜帖</h2>
                                </li>
                            <li  data-url="<?php echo RES;?>/Index/APPyiliao.html">
                                <h2 class="expansion-2">微医疗</h2>
                                </li>
                            <li  data-url="<?php echo RES;?>/Index/APPwall.html">
                                <h2 class="expansion-3">微信墙</h2>
                                </li>
                            <li  data-url="<?php echo RES;?>/Index/APPtuan.html">
                                <h2 class="expansion-4">微团购</h2>
                        </ul>
                    </div>
                    <div class="serviceRight">
                    	<div class="service-con" id="service-con">
                       		加载中
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$("#ui-navigation li").on("click",function(){
	$("#ui-navigation li").removeClass("selected");
	$(this).addClass("selected");
	var url = $(this).attr("data-url");
	ajaxhtml(url);
})
function ajaxhtml(url){
	$.get(url,{},function(t){	$("#service-con").html(t)},"html");	
}
ajaxhtml($("#ui-navigation li:eq(0)").attr("data-url"));
</script>
<!--[if !IE]>底部<![endif]-->
<div class="footer">

	<div class="divider-panel"></div>

	<div class="wPage">

        <div class="about">

        	<div class="copyright"><?php echo C('site_name');?>-微信智能公众平台 版权所有</div>

        </div>

        <div class="glink">

        	<ul>

            	<li><a href="/" class="hover" title="首页">网站首页</a></li>

                <li><a href="<?php echo U('Home/Index/about');?>">关于宏宏CMS</a></li>

                <li><a href="<?php echo U('Home/Index/service');?>">功能介绍</a></li>

                <li><a href="<?php echo U('Home/Index/case');?>">案例展示</a></li>

                <li><a href="<?php echo U('Home/Index/help');?>">帮助教程</a></li>

                <li><a href="<?php echo U('Home/Index/contact');?>">联系我们</a></li>

            </ul>

            <div class="beian"><a href="#" target="_blank">备案号：<?php echo C('ipc');?></a></div>

        </div>

    </div>

</div>
<!--[if !IE]>底部<![endif]-->
</body>
</html>