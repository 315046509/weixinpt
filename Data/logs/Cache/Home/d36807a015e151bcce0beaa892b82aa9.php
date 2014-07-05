<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>立即注册 - 微我网微信接口_微信公众管理平台</title>
<meta name="keywords" content="微我网微信营销,微信接口,微信机器人,微信助手,微信营销,微信第三方接口,微信公众账号"/>
<meta name="description" content="微我网微信营销提供最好用、最方便的微信接口，微信会员卡、微信喜帖、优惠券、大转盘、团购、一战到底、微网站、微相册、在线预订，一应俱全。让你运营微信得心应手!"/>
<link href="<?php echo RES;?>/css/global.css" rel="stylesheet" type="text/css" />
<link href="<?php echo RES;?>/css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/base.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/auth.css"/>
<script type="text/javascript" src="<?php echo RES;?>/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/cj-lib.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/validate.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/md5.js"></script>
</style>
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
<body>
<div class="wPage">
<div class="main-content">
 <div class="main1000">
   <div class="bg50"></div>
   <form action="<?php echo U('Users/checkreg');?>" enctype="multipart/form-data"  onsubmit="return onpost()" id="registerform" name="register" autocomplete="off" method="post">

			<input name="step" value="2" type="hidden"/>
			<input name="invite" value="" type="hidden"/>
   <div class="reg_index">
    <p>
        <label>用户名</label>
        <input  id="username"  name="username" type="text" />
        <span id="err_username"><font color="#FF0000">*</font>长度为6~16位字符，可以为"数字/字母/中划线/下划线"组成</span>
      </p>
       <p>
        <label>设置密码</label>
        <input  id="password" name="password"  type="password" />
        <span id="err_password"><font color="#FF0000">*</font>长度为6~16位字符</span>
      </p>
       <p>
        <label>确认密码</label>
        <input id="repassword"  name="repassword"  type="password" />
        <span id="err_repassword"></span>
      </p>      
       <p>
        <label>邮箱</label>
        <input name="email" id="registeremail" type="text" />
        <span id="err_registeremail"><font color="#FF0000">*</font>邮箱将与支付及优惠相关，请填写正确的邮箱</span>
      </p>
       <p>
        <label>QQ</label>
        <input  name="qq" id="registerqq" type="text" />
        <span id="err_registerqq"><font color="#FF0000">*</font>请输入QQ号，以便我们联系</span>
      </p>
	   <p>
        <label>手机</label>
        <input  name="tel" id="registertel" type="text" />
        <span></span>
      </p>
     <!--  <p>
        <label>验证码</label>
        <input name="" type="text" />
        <span></span>
      </p>-->
      <input name="sendphone" type="submit" value="" class="reg_tj"/>
   </div>
   </form>

 </div>
</div>
</div>
<script type="text/javascript">
	function onpost() {
        var username = max.$("username");
		var password = max.$("password");
		var repassword = max.$("repassword");
		var registeremail = max.$("registeremail");
		var registerqq = max.$("registerqq");
		if(username.value == "") {
			max.$("err_username").innerHTML = "<font color='#FF0000'>*请输入用户名</font>";
			return false;
        }
        if (password.value == "" ){
			max.$("err_password").innerHTML = "<font color='#FF0000'>*请输入密码</font>";
			return false;
		}
		if(repassword.value == "") {
			max.$("err_repassword").innerHTML = "<font color='#FF0000'>*请再次输入密码</font>";
			return false;
        }
		if(repassword.value != password.value) {
			max.$("err_repassword").innerHTML = "<font color='#FF0000'>*2次输入的密码不一致</font>";
			return false;
        }
        if (registeremail.value == "" ){
			max.$("err_registeremail").innerHTML = "<font color='#FF0000'>*请输入邮箱</font>";
			return false;
		}
		 if (registerqq.value == "" ){
			max.$("err_registerqq").innerHTML = "<font color='#FF0000'>*请输入qq</font>";
			return false;
		}
        return true;
    }
</script>
</body>
</html>