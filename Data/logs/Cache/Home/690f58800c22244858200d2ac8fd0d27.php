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



            	招商代理



            </div>



            <div class="con-bd">



            	<div class="help-box">



                <div align="center" >
                  <div align="center" > <img src="<?php echo RES;?>/images/daili.jpg" >



                    </div>



                    </div>



                                <div class="postemail"><div class="onner">
                                  <div class="inner">有意者可在线联系客户或发送邮件至 <span class="enFont"><a href="tomail:weixin@138wo.com">3669955@qq.com</a></span>  或联系在线客服：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo C('site_qq');?>:41" alt="点击这里给我发消息" title="点击这里给我发消息"/></a><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes"></a></div>
                                </div></div>



                            </div>



                        </div>



                </div>



            </div>



        </div>



    </div>



</div>



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