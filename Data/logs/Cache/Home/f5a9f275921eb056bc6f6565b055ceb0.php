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

<script type="text/javascript">seajs.use("<?php echo RES;?>/js/base_common.js")</script>

<script type="text/javascript" src="<?php echo RES;?>/js/cj-lib.js"></script>

<script type="text/javascript" src="<?php echo RES;?>/js/validate.js"></script>

<script type="text/javascript" src="<?php echo RES;?>/js/md5.js"></script>

<meta property="qc:admins" content="14433267776130776375" />

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

    <div class="content ui-login-area WG-item">

    	<div class="bgwrap">

        	<img src="<?php echo RES;?>/images/ambient.png" style="width:100%;height: auto;">

        </div>

        <div class="mbox" id="WG_mbox">

            <div class="wPage">

                <div class="ui-login-title">

                    <div class="headline">在任何地方，在任何时间 <span>宏宏CMS，帮你打造最专业、最流行的微信智能公众平台</span></div>

                </div>

                <div class="ui-loginBox">

                    <div class="ui-pos">

                        <div class="ui-form no-longlogin" id="WG_loginbox">

                            <div id="WG_Message" class="login-msg msg" style="display:none;">

                                <p class="error"></p>

                            </div>

                            <div class="bd">

                                <form action="<?php echo U('Users/checklogin');?>" enctype="multipart/form-data"  onsubmit="return onpost()" id="registerform" method="post">

                                     <input name="step" value="2" type="hidden">

                                     <input name="invite" value="" type="hidden">

                                 <?php if($_SESSION[uid]==false): ?><div class="field username-field">

                                    <span class="place_holder" id="WG_username_ph">会员名/邮箱</span>

                                    <input type="text" name="username" id="WG_username_input" value="" class="ui-text" maxlength="32" tabindex="1" autocomplete="off">

                                </div>

                                <div class="field password-field">

                                    <span class="place_holder" id="WG_password_ph">密码</span>

                                    <input type="password" name="password" id="WG_password" class="ui-text"  tabindex="2">            	

                                </div>

                                <div class="field btn-login-field">

                                    <button type="submit" class="btn-login" tabindex="5" id="btn_submit">开 始 微 之 旅</button>

                                </div>

                                <div class="entries">

                                    <a href="<?php echo U('Home/Index/reg');?>" class="btn-go-register">加入宏宏网</a>

                                </div>

                                <?php else: ?>

                                <!--登录后开始 -->

                                  <div class="field username-field">

                                   <span class="place_holder" id="WG_username_ph"><?php echo (session('uname')); ?></span>

                                    <input type="text" name="username" id="WG_username_input" value="" class="ui-text" maxlength="32" tabindex="1" autocomplete="off">

                                </div>

                                <div class="field password-field">

                                    <span class="place_holder" id="WG_password_ph">已登录</span>

                                    <input type="password" name="password" id="WG_password" class="ui-text"  tabindex="2">            	

                                </div>

                                <div class="entries">

                                    <a href="<?php echo U('User/Index/index');?>" class="btn-go-register">进入管理中心</a>

                                </div>

                                <!--登录后结束 --><?php endif; ?>

                            </div>

                            <div class="AppLogin">

                            	<div class="toplink"></div>

                            	<a href="<?php echo U('login?type=qq');?>" class="openid-btn openid-qqlogin"><span class="s"></span><span class="middle">使用腾讯QQ登录</span></a>

                                <a href="<?php echo U('login?type=sina');?>" class="openid-btn openid-sinalogin"><span class="s"></span><span class="middle">使用新浪微博登录</span></a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

<script type="text/javascript" src="<?php echo RES;?>/js/login.js"></script>

<script type="text/javascript">

	window.WG_SSO = window.WG_SSO || {};

	WG_SSO.CONSTANTS = {

	};

	window.SSOConfig = {

		enable: true,   // 是否开启SSO跨域登录，有回调方法的可能

		loginUrl: "<?php echo U('Users/checklogin');?>"// login url

	};

	fn_mLogin();

	$(function(){

		$(".WG-item").height($(window).height());

		$(".WG-item:eq(0)").height($(window).height()-57);

		$("#WG_mbox").css({"top":($(window).height()-$("#WG_mbox").height()-60)/2+"px"});

		$(window).resize(function(){

			$(".WG-item").height($(window).height());

			$(".WG-item:eq(0)").height($(window).height()-57);

			$("#WG_mbox").css({"top":($(window).height()-$("#WG_mbox").height()-60)/2+"px"});

		})

	})

</script>

<script type="text/javascript">

function onpost() {

	var pw = max.$("password");

	var idname = max.$("idname");

	if(idname.value == "") {

		alert("请输入用户名");

		return false;

	}

	if (pw.value == "" ){

		alert("请输入密码");

		return false;

	}	

	return true;

}

</script> 

<script>

$(function() {

	

    var $phone = $('.phone');

    var top = $phone.css('top');

    $phone.css({top: '-160px', display: 'inline'}).animate({top: top}, 2000, 'easeOutBounce') 

    $('.txt1').slideDown(2000);

	

	$(".d1").hover(

	 function(){

	   	 $(".d3").parent().parent().parent().animate({ width:'135px'},300)

		 $(".d2").parent().parent().parent().animate({ width:'135px'},300)

		 $(".d1").parent().parent().parent().animate({ width:'545px'},300)

	  }

	)

	$(".d2").hover(

	 function(){

	   	 $(".d1").parent().parent().parent().animate({ width:'135px'},300)

		 $(".d3").parent().parent().parent().animate({ width:'135px'},300)

		 $(".d2").parent().parent().parent().animate({ width:'545px'},300)

	  }

	)

	$(".d3").hover(

	 function(){

	   	 $(".d1").parent().parent().parent().animate({ width:'135px'},300)

		 $(".d2").parent().parent().parent().animate({ width:'135px'},300)

		 $(".d3").parent().parent().parent().animate({ width:'545px'},300)

	  }

	)

	

});

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