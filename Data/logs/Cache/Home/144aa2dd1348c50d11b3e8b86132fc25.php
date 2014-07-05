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

            	我们的案例

            </div>

            <div class="con-bd">

            	<div class="works-item">

                	<h2>电视媒体</h2>

                    <ul>

                    	<li>

                        	<div class="m">

                        		<img src="<?php echo RES;?>/images/dianshi1.jpg">

                            </div>

                        </li>

                        <li>

                        	<div class="m">

                        	<img src="<?php echo RES;?>/images/dianshi2.jpg">

                            </div>

                        </li>

                        <li>

                        	<div class="m">

                        	<img src="<?php echo RES;?>/images/dianshi3.jpg">

                            </div>

                        </li>

                    </ul>

                </div>

                <div class="works-item">

                	<h2>汽车服务</h2>

                    <ul>

                    	<li>

                        	<div class="m">

                        	<img src="<?php echo RES;?>/images/thumb_loseit.jpg">

                            </div>

                        </li>

                        <li>

                        	<div class="m">

                        	<img src="<?php echo RES;?>/images/thumb_loseit.jpg">

                            </div>

                        </li>

                        <li>

                        	<div class="m">

                        	<img src="<?php echo RES;?>/images/thumb_loseit.jpg">

                            </div>

                        </li>

                    </ul>

                </div>

                <div class="works-item">

                	<h2>汽车服务</h2>

                    <ul>

                    	<li>

                        	<div class="m">

                        	<img src="<?php echo RES;?>/images/thumb_loseit.jpg">

                            </div>

                        </li>

                        <li>

                        	<div class="m">

                        	<img src="<?php echo RES;?>/images/thumb_loseit.jpg">

                            </div>

                        </li>

                        <li>

                        	<div class="m">

                        	<img src="<?php echo RES;?>/images/thumb_loseit.jpg">

                            </div>

                        </li>

                    </ul>

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