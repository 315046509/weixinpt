<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/template/music-left.css" media="all" />
<link rel="stylesheet" href="<?php echo RES;?>/css/flash/css/plugmenu.css">
<script src="<?php echo RES;?>/css/flash/js/zepto.min.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/css/flash/js/plugmenu.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo ($tpl["wxname"]); ?></title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/176/index.css" />
<script src="<?php echo RES;?>/css/176/iscroll.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/font-awesome.css" media="all" />
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
<body id="cate">
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
<div class="wrap">
  <div class="banner">
    <div id="wrapper">
      <div id="scroller">
        <ul id="thelist">
          <?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li>
              <p><?php echo ($so["info"]); ?></p>
              <?php if($so['url'] == ''): ?><img src="<?php echo ($so["img"]); ?>" />
                <?php else: ?>
                <a href="<?php echo ($so["url"]); ?>"><img src="<?php echo ($so["img"]); ?>" /></a><?php endif; ?>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <div id="nav">
      <div id="prev" onclick="myScroll.scrollToPage('prev', 0,400,3);return false">&larr; prev</div>
      <ul id="indicator">
        <?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li   
          <?php if($i == 1): ?>class="active"<?php endif; ?>
          ><?php echo ($i); ?>
          </li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      <div id="next" onclick="myScroll.scrollToPage('next', 0);return false">next &rarr;</div>
    </div>
    <div class="clr"></div>
  </div>
  <div id="insert1"></div>
  <script>


            var count = document.getElementById("thelist").getElementsByTagName("img").length;	


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
  <div id="insert2"></div>
  <div style="display:none"> </div>
  <div style="display:none">
  </div>
  <div class="main">
    <ul>
      <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["url"]); ?>">
      <li id="m1"> <?php if($vo['ltype'] == 'img'): ?><a href="<?php echo C('site_url'); echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token'],'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>" ><?php endif; ?>                 
 <?php if($vo['ltype'] == 'map'): ?><a href="http://api.map.baidu.com/marker?location=<?php echo ($vo["lat"]); ?>,<?php echo ($vo["lng"]); ?>&title=<?php echo ($home['webname']); ?>&name=<?php echo ($tpl['wxname']); ?>&content=<?php echo ($vo["place"]); ?>&output=html&src=weiba|weiweb" ><?php endif; ?>
 <?php if($vo['ltype'] == 'tel'): ?><a href="http://site.tg.qq.com/forwardToPhonePage?siteId=1&phone=<?php echo ($vo["tel"]); ?>" ><?php endif; ?>
 <?php if($vo['ltype'] == 'url'): ?><a href="<?php echo ($vo["url"]); ?>" ><?php endif; ?>
 <?php if($vo['ltype'] == 'business'): if($vo['business_type'] == 'vipcard'): ?><a href="<?php echo C('site_url'); echo U('Userinfo/index',array('token'=>$gtoken,'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>" ><?php endif; ?> 
         <?php if($vo['business_type'] == 'official'): ?><a href="<?php echo C('site_url'); echo U('Wap/Index/index',array('token'=>$gtoken,'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?>
	   <?php if($vo['business_type'] == 'photo'): ?><a href="<?php echo C('site_url'); echo U('Wap/Photo/index',array('token'=>$gtoken,'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?>
	   <?php if($vo['business_type'] == 'ding'): ?><a href="<?php echo C('site_url'); echo U('Wap/Product/dining',array('token'=>$gtoken,'dining'=>1,'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?>
	   <?php if($vo['business_type'] == 'shop'): ?><a href="<?php echo C('site_url'); echo U('Wap/Product/cats',array('token'=>$gtoken,'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?>
	   <?php if($vo['business_type'] == 'groupon'): ?><a href="<?php echo C('site_url'); echo U('Wap/Groupon/grouponIndex',array('token'=>$gtoken,'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?>
	   <?php if($vo['business_type'] == 'Selfform'): ?><a href="<?php echo C('site_url'); echo U('Wap/Selfform/index',array('token'=>$gtoken,'id'=>$vo['activity_value'],'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?>
	   <?php if($vo['business_type'] == 'Hotel'): ?><a href="<?php echo C('site_url'); echo U('Wap/Host/index',array('token'=>$gtoken,'hid'=>$vo['activity_value'],'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?>
	   <?php if($vo['business_type'] == 'house'): ?><a href="<?php echo C('site_url'); echo U('Wap/Index/house',array('token'=>$gtoken,'hid'=>$vo['activity_value'],'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?>
	   <?php if($vo['business_type'] == 'Panorama'): ?><a href="<?php echo C('site_url'); echo U('Wap/Index/Panorama',array('token'=>$gtoken,'id'=>$vo['activity_value'],'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; endif; ?>
<?php if($vo['ltype'] == 'activity'): if($vo['activity_type'] == 1): ?><a href="<?php echo C('site_url'); echo U('Wap/Lottery/index',array('type'=>$vo['activity_type'],'token'=>$gtoken,'id'=>$vo['activity_value'],'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?> 
<?php if($vo['activity_type'] == 2): ?><a href="<?php echo C('site_url'); echo U('Wap/Guajiang/index',array('type'=>$vo['activity_type'],'token'=>$gtoken,'id'=>$vo['activity_value'],'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?> 
<?php if($vo['activity_type'] == 3): ?><a href="<?php echo C('site_url'); echo U('Wap/Coupon/index',array('type'=>$vo['activity_type'],'token'=>$gtoken,'id'=>$vo['activity_value'],'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; ?>
<?php if($vo['activity_type'] == 4): ?><a href="<?php echo C('site_url'); echo U('Wap/Vote/index',array('type'=>$vo['activity_type'],'token'=>$gtoken,'id'=>$vo['activity_value'],'wecha_id'=>$wecha_id,'weiwin'=>'mp.weixin.qq.com'));?>"><?php endif; endif; ?> <span class="icon"  style="background:url(<?php echo ($vo["img"]); ?>) no-repeat;background-size:88px 64px;"><em></em></span><span class="title"> <?php echo ($vo["name"]); ?></span></li>
      </a><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
</div>
<div style="display:none"> </div>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
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