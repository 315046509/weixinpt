<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
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

<div class="Public-content clearfix">
<div class="pos"> &nbsp;&nbsp;&nbsp;</div>
<style type="text/css">
.normalTitle {
    border-bottom: 1px solid #D7DDE6;
    border-radius: 10px 10px 0 0;
    padding: 20px;
    text-shadow: 0 1px 1px #FFFFFF;
}
.normalTitle h2, .panelTitle h2, .processTitle h2 {
    font-size: 20px;
    font-weight: bold;
}
.content {
 margin: 0 auto;
    text-align: left;
    width: 707px;
}
.article, .intro, .download, .document, .developer {
margin:40px 0px;

background:#f5f6f7;
box-shadow:0px 1px 3px #ccc;
}
.section {
padding:0 0 20px 0;
margin:0 0 20px 0;
border-bottom:1px solid #eee;
overflow: hidden;
}
.lastSection {
border:none;
margin-bottom:0px;
}
.normalTitle {
border-bottom:1px solid #d7dde6;
border-radius:10px 10px 0 0;
padding:20px 40px;
text-shadow:0 1px 1px #fff;
}
.normalContent {
background:#fff;/*border-radius:0 0 10px 10px;*/
padding:40px;
}
.normalTitle h2, .panelTitle h2, .processTitle h2 {
font-size:20px;
font-weight:bold;
}
.green{ color:#090}
.red{ color: #F00}
.collapsible {
    background: none repeat scroll 0 0 #FFFFFF;
    padding: 20px;
}
.CollapsiblePanel {
    margin-bottom: 10px;
    width: 870px;
}
.CollapsiblePanelTab {
    background: url(style/images/img/arrow_unclick.png) no-repeat scroll 820px 20px #FFFFFF;
    border: 1px solid #DEDEDE;
    border-radius: 3px 3px 3px 3px;
    color: #626B8A;
    cursor: pointer;
    font-size: 18px;
    padding: 20px 40px 20px 20px;
    text-shadow: 0 1px 0 white;
}
.CollapsiblePanelTab.hover {
    background: url(style/images/img/arrow_unclick.png) no-repeat scroll 820px 20px #D7DDE6;
border: 1px solid #C1C9D4;
}
.CollapsiblePanelTab.clicked {
    background: url(style/images/img/arrow_click.png) no-repeat scroll 820px 20px #D7DDE6;
border: 1px solid #C1C9D4;
}
.CollapsiblePanelContent {
    display: none;
    overflow: hidden;
}
.CollapsiblePanelContent .normalContent {
    padding: 20px 20px 0;
}
</style>
<div class="content" style="width:985px;line-height:1.5">
<div class="document" >
            <div class="normalTitle"><h2>如何为微信公众号配置接口？</h2></div>
                <div class="collapsible">
<div class="section lastSection">
<p>请务必认真阅读以下2步内容，才能更有效的完成配置工作，有疑问的请联系QQ：<?php echo C('site_qq');?>提问。<br/>
<?php if($_GET['token'] != ''): ?>你的接口URL是：<font color="red"><?php echo C('site_url');?>/index.php/api/<?php echo $_GET['token']; ?></font><br>
您的token是：<font color="red"><?php echo $_GET['token']; ?></font><?php endif; ?></p>
</div>
<a href="http://mp.weixin.qq.com/" target="_blank"><img src="<?php echo RES;?>/images/bangding.png" border="0" /></a> <br />
                <div id="CollapsiblePanel2" class="CollapsiblePanel">
                    <div class="CollapsiblePanelTab clicked">第一步、在<?php echo C('site_name');?>绑定你的微信公众号。<span></span></div>
                    <div style="" class="">
                        <div class="articleContent catalogHome normalContent">
                            <div class="section lastSection">
                                <p>1、注册并登录<a href="<?php echo U('Index/login');?>"><?php echo C('site_name');?>接口平台</a></p>
                                <p>2、添加公众号 → 功能管理 → 勾选要开启的功能</p>									
								<p><img src="<?php echo STATICS;?>/help/help01.jpg" width="790px"></p>
								<p><img src="<?php echo STATICS;?>/help/help0.jpg" width="790px"></p>
                            </div>
                        </div>
                    </div>                        
                </div>
<div id="CollapsiblePanel3" class="CollapsiblePanel">
                        <div class="CollapsiblePanelTab clicked">第二步、到微信公众平台设置接口。<span></span></div>
                        <div style="" class="">
                            <div class="articleContent catalogHome normalContent">
                                <div class="section lastSection">
                                   <div class="section lastSection">
                                    <p>1、登录 <a href="http://mp.weixin.qq.com/" target="_blank">微信公众平台</a>（<a href="http://mp.weixin.qq.com/" target="_blank">http://mp.weixin.qq.com/</a>），进行身份认证，填写信息，提交身份证。</p>
                                    <p>认证后，点击高级功能 → 进入开发模式</p><br>
                                    <p><img src="<?php echo STATICS;?>/help/help002.jpg" width="790px"></p><br>
									<p>2、点击"成为开发者"按钮</p>
									<p><img src="<?php echo STATICS;?>/help/help003.jpg" width="790px"></p><br>
									<p>3、填写接口配置信息</p>
									<?php if($_GET['token'] == ''): ?><p>比如你<?php echo C('site_name');?>平台上的地址是<?php echo C('site_url');?>/index.php/api/demo</p>
									<p>那么URL就是<?php echo C('site_url');?>/INDEX.PHP/api/demo</p>
									<?php else: ?>
									<p>你的URL是 <font color="red"><?php echo C('site_url');?>/index.php/api/<?php echo $_GET['token']; ?></font></p><?php endif; ?>
									<p>Token填写 <font color="red"><?php echo $_GET['token']; ?></font></p>
									<p><img src="<?php echo STATICS;?>/help/help004.jpg" width="790px"></p><br>
									<p>4、确认开启</p>
									<p>5、在手机上用微信给你的公众号输入"帮助"，测试你的接口是否配置正常！</p><br>									
                                </div>
                               <a href="<?php echo U('User/Index/index');?>"><img src="<?php echo RES;?>/images/guanli.png" border="0" /></a></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
<!--结束-->
</div>
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