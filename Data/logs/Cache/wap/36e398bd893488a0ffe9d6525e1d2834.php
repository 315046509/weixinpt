<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/147/css/snower.css?2013-12-09-1" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/147/css/common.css?2013-12-09-1" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/147/css/reset.css?2013-12-09-1" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/147/css/home-11.css?2013-12-09-1" media="all" />
<script type="text/javascript" src="<?php echo RES;?>/css/147/js/maivl.js?2013-12-09-1"></script>
<script type="text/javascript" src="<?php echo RES;?>/css/147/js/jQuery.js?2013-12-09-1"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/reset.css?2013-9-13-2" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/font-awesome.css" media="all" />
<title><?php echo ($tpl["wxname"]); ?></title>
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
</head>
<body onselectstart="return true;" ondragstart="return false;">
<?php if($homeInfo['play_wifi'] == 'on'): ?><link rel="stylesheet" href="<?php echo RES;?>/css/auth/login.css" type="text/css">
<script>

// 此函数为和路由器交互的函数
function login (token)
{

	$.ajax({
	async:false,
	type:"POST",
	url:"http://<?php echo $_GET['gwaddr'];?>/api/login.cgi",
	//url:'http://1.1.1.1/api/webauth',                            
	dataType: 'jsonp',
	jsonp: 'jsonpcallback',  
	data: { "token": token },		    
	timeout: 1000,

	success:function(msg)				    
	{ 
		if (msg.ret > 0)
		{
			alert("认证成功!");
			window.location = "<?php echo C('jumpurl');?>"; 				
			
		}else {
			alert("认证失败!");
		}
	},

	error:function()
	{	
		alert("与服务器通讯失败!");
	}
	});


}


// 此函数为和服务器交互,获取token的并自动和路由器交互的函数
function Submit()
{
	var code = $('#txtCode').val();

	$.ajax({
	async:false,
	type:"POST",
	url:"<?php echo U('Auth/Login/login');?>",                    
	dataType: 'json',
	data: { "code": code,"token":"<?php echo $token;?>","authtype":$('#authtype').val() },
	timeout: 1000,

	success:function(msg)				    
	{ 
		if (msg.ret > 0)
		{
			//alert(1);
			login(msg.token);
		}else{
			alert('密码错误！');
		}
	},

	error:function()
	{	
	}
	});

}

function showlogin(obj){
	if($('#login_con').is(':hidden')){
		$('.regist_btn').html('关闭');		
	}else{
		$('.regist_btn').html('登录');
	}
	
	$('#login_con').slideToggle();
}

function change(str){
	 
	$('#'+str).addClass('current');
	if(str == 'sms'){
		$('#mobile').html('<input class="login_input " style="border: 1px solid #cccccc;" type="text" placeholder="手机号">	');
			$('.getsmspass').show();
			$('#weixin').removeClass('current');
			$('#authtype').val('sms');
	}else{
		$('#mobile').html('请扫描二维码关注本店微信公众号，回复“P”可得到上网密码');
		$('.getsmspass').hide();
		$('#sms').removeClass('current');
		$('#authtype').val('weixim');
	}
	
}

function getsmspass(){
	
	var phone = $('#txtMobile').val();

	$.ajax({
	async:false,
	type:"POST",
	url:"<?php echo U('Auth/Login/sendsms');?>",                    
	dataType: 'json',
	data: { "phone": phone },
	timeout: 1000,

	success:function(msg)				    
	{ 
		if (msg.ret > 0)
		{
			//alert(msg.msg);
			$('#txtCode').val(msg.msg);
			
		}else{
			alert('密码发送失败');
		}
	},

	error:function()
	{	
	}
	});
}

</script>
	
   <div class="container " id="center_view">

            <div class="H">
               <a class="back"  target="_self" isAnjukeSite=1>微我网</a>
                免费上网
                <a class="login_btn regist_btn" target="_self" href="javascript:showlogin(this);"  >登录</a>
            </div>

<div id="login_con"  style='display:none'>
	<span class="login_note"> </span>
	<div class="t_Login" id="t_Login">
		 <span class='current' id='sms' onclick="change('sms')"><i class="t_icon " >手机</i></span>
         <span  id='weixin' onclick="change('weixin')"><i class="t_icon " >微信</i></span>
        <span><i class="t_icon weibo">微博</i></span>
        <span><i class="t_icon qq"><a href='index.php?g=Auth&m=Test&a=login&type=qq' >QQ</a></i></span>
         
	</div>
	
	<div class="login_self">	
		 
		<div class="inputText" id='mobile'>
		<input class="login_input " id='txtMobile' style="border: 1px solid #cccccc;" type="text" placeholder="手机号">		
		</div>
		<div class="inputText">
		<input type='hidden' id='authtype'  value='sms'>
		<input class="login_input " id='txtCode' style="border: 1px solid #cccccc;" type="text" placeholder="密码">
         <span onclick="getsmspass()" target="_self" class="getsmspass">获取密码</span>
		</div>	
	
		<span class="login_btn login_btn_now js_login" onclick='Submit()'>立即登录</span>
		</div>
   
</div>
    

</div><?php endif; ?>
<?php if($homeInfo['play_audio'] == 'on'): if($homeInfo['bg_audio'] != ''): ?><style>
.btn_music {
display: inline-block;
width: 35px;
height: 35px;
background: url('<?php echo RES;?>/img/play.png') no-repeat center center;
background-size: 100% auto;
position: absolute;
z-index: 100;
left: 15px;
top: 20px;
}
.btn_music.on {
    background-image: url("<?php echo RES;?>/img/stop.png");
}

</style>
<script src="<?php echo RES;?>/js/audio.js" type="text/javascript"></script>
<script type="text/javascript">
// 两秒后模拟点击
setTimeout(function() {
    // IE
    if(document.all) {
        document.getElementById("playbox").click();
    }
    // 其它浏览器
    else {
        var e = document.createEvent("MouseEvents");
        e.initEvent("click", true, true);
        document.getElementById("playbox").dispatchEvent(e);
    }
}, 2000);
</script>
<span id="playbox" class="btn_music" onclick="playbox.init(this).play();">
<audio src="<?php echo ($homeInfo["musicurl"]); ?>" loop="" id="audio"></audio>
</span><?php endif; endif; ?>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/147/css/font-awesome.css?v=2013121115" media="all" />
<style>
	.body{
		max-width:640px;
		margin:auto;
		min-height:100%;
		background: url(<?php echo ($homeInfo['homeurl']); ?>) no-repeat scroll 0 bottom;
		position:relative;
				background-size:100% 100%;
	}
</style>
<div class="body">
  <!--
		用户分类管理
        -->
  <section>
    <ul class="card_lol" style="display:block; padding-bottom:50px;">
      <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token']));?>
          <?php else: ?>
          <?php echo (htmlspecialchars_decode($vo["url"])); endif; ?>
          ">
          <label><?php echo ($vo["name"]); ?></label>
          </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </section>
</div>
<div class="copyright">
<?php if($iscopyright == 1): echo ($homeInfo["copyright"]); ?>
<?php else: ?>
<?php echo ($siteCopyright); endif; ?>
</div>  <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
<?php if($radiogroup > 8): ?><br>
<br><?php endif; ?>
<script>
function displayit(n){
	for(i=0;i<4;i++){
		if(i==n){
			var id='menu_list'+n;
			if(document.getElementById(id).style.display=='none'){
				document.getElementById(id).style.display='';
				document.getElementById("plug-wrap").style.display='';
			}else{
				document.getElementById(id).style.display='none';
				document.getElementById("plug-wrap").style.display='none';
			}
		}else{
			if($('#menu_list'+i)){
				$('#menu_list'+i).css('display','none');
			}
		}
	}
}
function closeall(){
	var count = document.getElementById("top_menu").getElementsByTagName("ul").length;
	for(i=0;i<count;i++){
		document.getElementById("top_menu").getElementsByTagName("ul").item(i).style.display='none';
	}
	document.getElementById("plug-wrap").style.display='none';
}

document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script>  

	<?php if(ACTION_NAME == 'index'): ?><script type="text/javascript">
			window.shareData = {  
					"moduleName":"Index",
					"moduleID": '0',
					"imgUrl": "<?php echo ($homeInfo["picurl"]); ?>", 
					"timeLineLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"sendFriendLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"weiboLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token']));?>",
					"tTitle": "<?php echo ($homeInfo["title"]); ?>",
					"tContent": "<?php echo ($homeInfo["info"]); ?>"
				};
		</script>
	<?php else: ?>
		<script type="text/javascript">
			window.shareData = {  
				"moduleName":"Index",
				"moduleID": '1',
				"imgUrl": "<?php echo ($homeInfo["picurl"]); ?>", 
				"timeLineLink": "<?php echo C('site_url'); echo U(Index/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"sendFriendLink": "<?php echo C('site_url'); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"weiboLink": "<?php echo C('site_url'); echo U(MODULE_NAME/ACTION_NAME,array('token'=>$_GET['token'],'classid'=>$_GET['classid']));?>",
				"tTitle": "<?php echo ($homeInfo["title"]); ?>",
				"tContent": "<?php echo ($homeInfo["info"]); ?>"
			};
		</script><?php endif; ?>
<?php echo ($shareScript); ?>
</body>
</html>