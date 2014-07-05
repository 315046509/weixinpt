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

<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style-price.css"/>

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



            	联系宏宏CMS



            </div>



            <div class="con-bd">



            	<!--[if !IE]>广场<![endif]-->



            	<div id="articleDetail" class="col">



                	<div class="article_con">



                    	<div class="articleService">



                            <ul class="cls">



                                <li>



                                    <div class="cls">



                                        <div class="pic t1"></div>



                                        <div class="txt">为微信公众平台打造专业级的公众号，为Android、Windows Mobile、IOS等多种系统平台的手机、平板电脑等移动设备设计专属的品牌化用户界面及开发定制应用和网站。</div>



                                    </div>



                                </li>



                                <li>



                                    <div class="cls">



                                        <div class="pic t2"></div>



                                        <div class="txt">



                                            <p>基于Windows、Mac OS等桌面操作系统的软件界面设计及软件开发。提供整合品牌个性界面设计方案以及可供延展开发的设计资源包。</p>



                                            <p>提供包括电子商城、企业网站、以及各类SNS社交平台、博客系统的网站设计及开发。</p>



                                        </div>



                                    </div>



                                </li>



                                <li>



                                    <div class="cls">



                                    <div class="pic t3"></div><div class="txt">提供宣传手册、杂志、海报等品牌化定制设计</div>



                                    </div>



                                </li>



                                <li>



                                    <div class="cls">



                                    <div class="pic t4"></div><div class="txt">为客户提供中长期的针对产品或内部团队的设计、技术方向指导与顾问，参与团队项目和团队建设。</div>



                                    </div>



                                </li>



                            </ul>



                            <div class="postDemand" id="postDemand">





                    </div>



                </div>



                <!--[if !IE]>广场<![endif]-->



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