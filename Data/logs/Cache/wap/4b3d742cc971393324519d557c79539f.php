<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0079)http://www.apiwx.com/wxapi.php?ac=cate18&tid=650&c=o7MB9jtoUbIfrW2CrrmyPhRO9v7s -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($tpl['wxname']); ?></title>
<!--<base href="http://www.quweixin.cn/">-->
<base href=".">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo RES;?>/css/117/idangerous.swiper.css">
<link href="<?php echo RES;?>/css/117/iscroll.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo RES;?>/css/117/plugmenu.css">
<link href="<?php echo RES;?>/css/117/cate18_.css" rel="stylesheet" type="text/css">
<style>
body {
	background:url(SfMNsgKp5b.jpg) no-repeat;
}
 #cate15 .mainmenu li:nth-child(10n+1) a {
 background-color:rgba(255, 152, 0, 0.46);
}
#cate15 .mainmenu li:nth-child(10n+2) a {
 background-color:rgba(255, 51, 0, 0.46);
}
#cate15 .mainmenu li:nth-child(10n+3) a {
 background-color:rgba(255, 254, 0, 0.46);
}
#cate15 .mainmenu li:nth-child(10n+4) a {
 background-color:rgba(121, 255, 0, 0.46);/*rgb��ɫ��͸����0.46���������е���*/
}
#cate15 .mainmenu li:nth-child(10n+5) a {
 background-color: rgba(0, 192, 255, 0.46);
}
#cate15 .mainmenu li:nth-child(10n+6) a {
 background-color: rgba(206, 0, 255, 0.46);
}
#cate15 .mainmenu li:nth-child(10n+7) a {
 background-color: rgba(113, 0, 255, 0.46);
}
#cate15 .mainmenu li:nth-child(10n+8) a {
 background-color: rgba(255, 0, 211, 0.46);
}
#cate15 .mainmenu li:nth-child(10n+9) a {
 background-color: rgba(255, 101, 0, 0.46);
}
#cate15 .mainmenu li:nth-child(10n+10) a {
 background-color: rgba(255, 152, 0, 0.46);
}
#cate15 .mainmenu {
	bottom: 60px;  /*60px��ʾ����ײ�60�����أ��������е���*/
}
.themeStyle {
	background:#E00B19 !important;
	background-color:#E00B19 !important;
}
</style>
<script src="<?php echo RES;?>/css/117/iscroll.js" type="text/javascript"></script>
<script type="text/javascript">
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
</script>
</head>
<body id="cate18" style="">
<div id="insert1" style="z-index:10000; position:fixed; top:20px;"></div>
<iframe src="<?php echo RES;?>/css/117/saved_resource.htm" width="0" height="0" frameborder="0"></iframe>
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
<?php if($homeInfo['play_audio'] == 'on'): if($homeInfo['musicurl'] != false): ?><style>
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
<div class="banner">
  <div id="wrapper" style="overflow: hidden; ">
    <div id="scroller" style="width: 3360px; -webkit-transition: -webkit-transform 0ms; -webkit-transform-origin: 0px 0px; -webkit-transform: translate3d(-1680px, 0px, 0px) scale(1); ">
      <ul id="thelist">
        <li>
          <p>1</p>
          <?php if(is_array($flashbg)): $i = 0; $__LIST__ = $flashbg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li>
          <p><?php echo ($so["info"]); ?></p>
          <a href="<?php echo ($so["url"]); ?>"><img src="<?php echo ($so["img"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </li>
      </ul>
    </div>
  </div>
  <div id="nav">
    <div id="prev" onclick="myScroll.scrollToPage(&#39;prev&#39;, 0,400,2);return false">�� prev</div>
    <ul id="indicator">
      <?php if(is_array($flashbg)): $i = 0; $__LIST__ = $flashbg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li   
        <?php if($i == 1): ?>class="active"<?php endif; ?>
        ><?php echo ($i); ?>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <div id="next" onclick="myScroll.scrollToPage(&#39;next&#39;, 0,400,2);return false">next ��</div>
  </div>
  <div class="clr"></div>
</div>
<div class="device">
  <div class="swiper-container" style="cursor: -webkit-grab; ">
    <div class="swiper-wrapper" style="width: 6720px; height: 185px; -webkit-transform: translate3d(-1680px, 0px, 0px); -webkit-transition: 0s; ">
      <div class="swiper-slide" style="width: 1680px; height: 185px; ">
        <div class="content-slide">
          <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token']));?>
            <?php else: ?>
            <?php echo ($vo["url"]); endif; ?>
            ">
            <p class="ico"><img src="<?php echo ($vo["img"]); ?>" /></p>
            <p class="title"><?php echo ($vo["name"]); ?></p>
            </a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
    </div>
    <div class="pagination"><span class="swiper-pagination-switch swiper-visible-switch swiper-active-switch"></span><span class="swiper-pagination-switch"></span></div>
  </div>
</div>
<script src="<?php echo RES;?>/css/117/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/css/117/idangerous.swiper-2.1.min.js" type="text/javascript"></script>
<script>
  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    loop:true,
    grabCursor: true,
    paginationClickable: true
  })
  $('.arrow-left').on('click', function(e){
    e.preventDefault()
    mySwiper.swipePrev()
  })
  $('.arrow-right').on('click', function(e){
    e.preventDefault()
    mySwiper.swipeNext()
  })
  </script>
<script>
var count = document.getElementById("thelist").getElementsByTagName("img").length;	

var count2 = document.getElementsByClassName("menuimg").length;
for(i=0;i<count;i++){
 document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}
document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";

 setInterval(function(){
myScroll.scrollToPage('next', 0,400,count);
},3500 );
window.onresize = function(){ 
for(i=0;i<count;i++){
document.getElementById("thelist").getElementsByTagName("img").item(i).style.cssText = " width:"+document.body.clientWidth+"px";

}
 document.getElementById("scroller").style.cssText = " width:"+document.body.clientWidth*count+"px";
} 


</script>
</div>
<div style="display:none"></div>
<style>
 #leafContainer 
{
    position:fixed;
    z-index:2;
width:100%;
    height: 690px;
top:0;
overflow:hidden;
}
 #leafContainer > div 
{
    position: absolute;
    max-width: 100px;
    max-height: 100px;
    -webkit-animation-iteration-count: infinite, infinite;
    -webkit-animation-direction: normal, normal;
    -webkit-animation-timing-function: linear, ease-in;
}

#leafContainer > div > img {
     position: absolute;
     width: 100%;
     -webkit-animation-iteration-count: infinite;
     -webkit-animation-direction: alternate;
     -webkit-animation-timing-function: ease-in-out;
     -webkit-transform-origin: 50% -100%;
}

 @-webkit-keyframes fade
{
   
    0%   { opacity: 1; }
    95%  { opacity: 1; }
    100% { opacity: 0; }
}

 @-webkit-keyframes drop
{
       0%   { -webkit-transform: translate(0px, -50px); }
    100% { -webkit-transform: translate(0px, 650px); }
}
 @-webkit-keyframes clockwiseSpin
{
    0%   { -webkit-transform: rotate(-50deg); }
    100% { -webkit-transform: rotate(50deg); }
}
 @-webkit-keyframes counterclockwiseSpinAndFlip 
{
    
    0%   { -webkit-transform: scale(-1, 1) rotate(50deg); }
   
    100% { -webkit-transform: scale(-1, 1) rotate(-50deg); }
}
 </style>
<script src="<?php echo RES;?>/css/flash/js/zepto.min.js" type="text/javascript"></script>
<div style="display:none"> </div>
<div id="leafContainer"></div>
<style>
 #leafContainer 
{
    position:fixed;
    z-index:2;
width:100%;
    height: 690px;
top:0;
overflow:hidden;
}
 #leafContainer > div 
{
    position: absolute;
    max-width: 100px;
    max-height: 100px;
    -webkit-animation-iteration-count: infinite, infinite;
    -webkit-animation-direction: normal, normal;
    -webkit-animation-timing-function: linear, ease-in;
}

#leafContainer > div > img {
     position: absolute;
     width: 100%;
     -webkit-animation-iteration-count: infinite;
     -webkit-animation-direction: alternate;
     -webkit-animation-timing-function: ease-in-out;
     -webkit-transform-origin: 50% -100%;
}

 @-webkit-keyframes fade
{
   
    0%   { opacity: 1; }
    95%  { opacity: 1; }
    100% { opacity: 0; }
}

 @-webkit-keyframes drop
{
       0%   { -webkit-transform: translate(0px, -50px); }
    100% { -webkit-transform: translate(0px, 650px); }
}
 @-webkit-keyframes clockwiseSpin
{
    0%   { -webkit-transform: rotate(-50deg); }
    100% { -webkit-transform: rotate(50deg); }
}
 @-webkit-keyframes counterclockwiseSpinAndFlip 
{
    
    0%   { -webkit-transform: scale(-1, 1) rotate(50deg); }
   
    100% { -webkit-transform: scale(-1, 1) rotate(-50deg); }
}
</style>
<script src="<?php echo RES;?>/css/bjdh/<?php echo ($homeInfo["bjdh"]); ?>/bjdh<?php echo ($homeInfo["bjdh"]); ?>.js" type="text/javascript" type="text/javascript">
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