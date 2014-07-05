<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo ($tpl["wxname"]); ?></title>
<base href="." />
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<link href="<?php echo RES;?>/css/allcss/cate18_0.css" rel="stylesheet" type="text/css" />
<link href="<?php echo RES;?>/css/110/iscroll.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo RES;?>/css/flash/css/plugmenu.css">
<style>
#cate10 .catemenu li:nth-child(n+4) img {
 display: block;
}
 #cate10 .catemenu li:nth-child(n+4) a {
 padding: 20px 5px 10px;
}
#cate10 .catemenu li a {
	background:#75c13b;
	margin:0;
	border-radius: 0;
}
 #cate10 .catemenu li:nth-child(2n) a {
 background:#01adc5;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(3n) a {
 background:#ec7815;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(4n) a {
 background:#ecac02;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(5n) a {
 background:#3064d2;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(6n) a {
 background:#9454ab;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(7n) a {
 background:#00b0c4;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(8n) a {
 background:#77c03b;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(9n) a {
 background:#75c13b;
 margin:0;
 border-radius: 0;
}
 #cate10 .catemenu li:nth-child(10n) a {
 background:#01adc5;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(11n) a {
 background:#ec7815;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(12n) a {
 background:#ecac02;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(13n) a {
 background:#3064d2;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(14n) a {
 background:#9454ab;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(15n) a {
 background:#00b0c4;
 color:#fff;/*文字的颜色，可以自由更换*/
}
 #cate10 .catemenu li:nth-child(16n) a {
 background:#77c03b;
 color:#fff;/*文字的颜色，可以自由更换*/
}
#cate10 .catemenu {
	margin:3px;
	border-radius: 0;
}
#cate10 .catemenu a {
	border:0;
	color:#ccc;/*文字的颜色，可以自由更换*/
}
#cate10 {
	background-color:#000000;/*黑色背景，可以自由更换*/
}
</style>
<script src="<?php echo RES;?>/css/110/iscroll.js" type="text/javascript"></script>
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
<body id="cate10">
<div class="banner">
  <div id="wrapper">
    <div id="scroller">
      <ul id="thelist">
        <?php if(is_array($flash)): $i = 0; $__LIST__ = $flash;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$so): $mod = ($i % 2 );++$i;?><li>
            <p><?php echo ($so["info"]); ?></p>
            <a href="<?php echo ($so["url"]); ?>"><img src="<?php echo ($so["img"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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
<div class="catemenu">
  <ul>
    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <a href="<?php if($vo['url'] == ''): echo U('Wap/Index/lists',array('classid'=>$vo['id'],'token'=>$vo['token']));?>
        <?php else: ?>
        <?php echo (htmlspecialchars_decode($vo["url"])); endif; ?>
        "> <img style="float:right;margin-right:10px;margin-top:5px;" src="<?php echo ($vo["img"]); ?>" />
        <div style="display:block;width:40px;height:50px;float:left;margin-left:5px;margin-top:50px;" >
          <div id="aa" style="display:block;width:40px;height:50px;"><?php echo ($vo["name"]); ?></div>
        </div>
        </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="clr"></div>
  </ul>
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
</script> <style type="text/css">
body { margin-bottom:60px !important; }
a, button, input { -webkit-tap-highlight-color:rgba(255, 0, 0, 0); }
ul, li { list-style:none; margin:0; padding:0 }
.top_bar { position: fixed; z-index: 900; bottom: 0; left: 0; right: 0; margin: auto; font-family: Helvetica, Tahoma, Arial, Microsoft YaHei, sans-serif; }
.top_menu { display:-webkit-box; border-top: 1px solid #3D3D46; display: block; width: 100%; background: rgba(255, 255, 255, 0.7); height: 48px; display: -webkit-box; display: box; margin:0; padding:0; -webkit-box-orient: horizontal; background: -webkit-gradient(linear, 0 0, 0 100%, from(#524945), to(#48403c), color-stop(60%, #524945)); box-shadow: 0 1px 0 0 rgba(255, 255, 255, 0.1) inset; }
.top_bar .top_menu>li { -webkit-box-flex:1; position:relative; text-align:center; }
.top_menu li:first-child { background:none; }
.top_bar .top_menu>li>a { height:48px; margin-right: 1px; display:block; text-align:center; color:#FFF; text-decoration:none; text-shadow: 0 1px rgba(0, 0, 0, 0.3); -webkit-box-flex:1; }
.top_bar .top_menu>li.home { max-width:70px }
.top_bar .top_menu>li.home a { height: 66px; width: 66px; margin: auto; border-radius: 60px; position: relative; top: -22px; left: 2px; background: url('tpl/Wap/default/common/images/home.png') no-repeat center center; background-size: 100% 100%; }
.top_bar .top_menu>li>a label { overflow:hidden; margin: 0 0 0 0; font-size: 12px; display: block !important; line-height: 18px; text-align: center; }
.top_bar .top_menu>li>a img { padding: 3px 0 0 0; height: 24px; width: 24px; color: #fff; line-height: 48px; vertical-align:middle; }
.top_bar li:first-child a { display: block; }
.menu_font { text-align:left; position:absolute; right:10px; z-index:500; background: -webkit-gradient(linear, 0 0, 0 100%, from(#524945), to(#48403c), color-stop(60%, #524945)); border-radius: 5px; width: 120px; margin-top: 10px; padding: 0; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3); }
.menu_font.hidden { display:none; }
.menu_font { top:inherit !important; bottom:60px; }
.menu_font li a { height:40px; margin-right: 1px; display:block; text-align:center; color:#FFF; text-decoration:none; text-shadow: 0 1px rgba(0, 0, 0, 0.3); -webkit-box-flex:1; }
.menu_font li a { text-align: left !important; }
.top_menu li:last-of-type a { background: none; overflow:hidden; }
.menu_font:after { top: inherit!important; bottom: -6px; border-color: #48403c rgba(0, 0, 0, 0) rgba(0, 0, 0, 0); border-width: 6px 6px 0; position: absolute; content: ""; display: inline-block; width: 0; height: 0; border-style: solid; left: 80%; }
.menu_font li { border-top: 1px solid rgba(255, 255, 255, 0.1); border-bottom: 1px solid rgba(0, 0, 0, 0.2); }
.menu_font li:first-of-type { border-top: 0; }
.menu_font li:last-of-type { border-bottom: 0; }
.menu_font li a { height: 40px; line-height: 40px !important; position: relative; color: #fff; display: block; width: 100%; text-indent: 10px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; }
.menu_font li a img { width: 20px; height:20px; display: inline-block; margin-top:-2px; color: #fff; line-height: 40px; vertical-align:middle; }
.menu_font>li>a label { padding:3px 0 0 3px; font-size:14px; overflow:hidden; margin: 0; }
#menu_list0 { right:0; left:10px; }
#menu_list0:after { left: 20%; }
#sharemcover { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); display: none; z-index: 20000; }
#sharemcover img { position: fixed; right: 18px; top: 5px; width: 260px; height: 180px; z-index: 20001; border:0; }
.top_bar .top_menu>li>a:hover, .top_bar .top_menu>li>a:active { background-color:#333; }
.menu_font li a:hover, .menu_font li a:active { background-color:#333; }
.menu_font li:first-of-type a { border-radius:5px 5px 0 0; }
.menu_font li:last-of-type a { border-radius:0 0 5px 5px; }
#plug-wrap { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0); z-index:800; }
#cate18 .device {bottom: 49px;}
#cate18 #indicator {bottom: 240px;}
#cate19 .device {bottom: 49px;}
#cate19 #indicator {bottom: 330px;}
#cate19 .pagination {bottom: 60px;}
</style>


<div class="top_bar" style="-webkit-transform:translate3d(0,0,0)">
  <nav>
    <ul id="top_menu" class="top_menu">
    <?php if(is_array($catemenu)): $i = 0; $__LIST__ = $catemenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['k'] < 2): ?><li><a <?php if($vo['vo']){echo 'onclick="javascript:displayit('.$vo['k'].')"';}else{echo 'href="'.$vo['url'].'"';}?>><img src="<?php echo ($vo["picurl"]); ?>"><label><?php echo ($vo["name"]); ?></label></a>
        <?php if ($vo['vo']){ ?>
            <ul id="menu_list<?php echo ($vo['k']); ?>" class="menu_font" style=" display:none">
            <?php if(is_array($vo['vo'])): $i = 0; $__LIST__ = $vo['vo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["picurl"]); ?>"><label><?php echo ($vo["name"]); ?></label></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
             <?php
 } ?>
        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>    
<li class="home"><a href="?g=Wap&m=Index&a=index&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>"></a></li>
<?php if(is_array($catemenu)): $i = 0; $__LIST__ = $catemenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['k'] > 1): ?><li><a <?php if($vo['vo']){echo 'onclick="javascript:displayit('.$vo['k'].')"';}else{echo 'href="'.$vo['url'].'"';}?>><img src="<?php echo ($vo["picurl"]); ?>"><label><?php echo ($vo["name"]); ?></label></a>
        <?php if ($vo['vo']){ ?>
            <ul id="menu_list<?php echo ($vo['k']); ?>" class="menu_font" style=" display:none">
            <?php if(is_array($vo['vo'])): $i = 0; $__LIST__ = $vo['vo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["picurl"]); ?>"><label><?php echo ($vo["name"]); ?></label></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
             <?php
 } ?>
        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </nav>
</div>
<div id="plug-wrap" onclick="closeall()" style="display: none;"></div> 

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