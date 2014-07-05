<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($info["title"]); ?></title>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=320,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="format-detection" content="telephone=no"/>
<script language="javascript"> 
var t1 = new Date().getTime(); 
</script> 
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script>
//剩余时间
var starttime=<?php echo ($info["starttime"]); ?>;
//开始倒计时

var isAct=<?php echo ($info["isact"]); ?>;
// 定义摇动的幅度
var SHAKE_THRESHOLD = 3000;
// 摇动的时间(秒)
var SHAKE_TIMES = <?php echo ($info["usetime"]); ?>;
// 定义摇动的时间间隔
var SHAKE_SPACE = 100;
// 计数器
var count = 0;
// 上一次提交的计数器
var last_count = -1 ;
// 定义一个变量保存上次更新的时间
var last_update = 0;

var gameIsOver= true;


var x;
var y;
var z;
var last_x;
var last_y;
var last_z;
var loadtime=0;
//倒计时方法
function TimerStart(sec,TextID)
{
	$("#loadingrt").hide();
    var endTime = new Date().getTime() + sec + 100;
    function interval()
    {
      var n=(endTime-new Date().getTime());
		
        if (n<100) {
			n=0;
			GamesOver(SHAKE_TIMES,'yaoyiyaoyes');
			return;
		}
		n=n/1000;
        if(TextID && TextID!=""){document.getElementById(TextID).innerHTML = parseInt(n)+'秒后开始！';}		
        setTimeout(interval, 100);
    }
	interval();
}

function GamesOver(Oversec,TextID)
{
    var duration=Oversec*1000;
    var gendTime = new Date().getTime() + duration + 100;
    function intervals()
    {
      var nv=(gendTime-new Date().getTime());
		
        if (nv<100) {
			nv=0;
			//$.post("");
			gameIsOver = true ;
			$("#tage").css("width",'100%');
			$("#tage").html(parseInt(SHAKE_TIMES)+'S');
			return;	
		}
		nv=nv/1000;
		var percent=parseInt((SHAKE_TIMES - nv ) * 100 /SHAKE_TIMES);
		$("#tage").css("width",percent+'%');
		$("#tage").html(parseInt(SHAKE_TIMES - nv)+'S');
        setTimeout(intervals, 100);
    }
	intervals();
}

//初始化方法
function init(){
	if(window.DeviceMotionEvent) {
		gameIsOver = false ;
		//移动浏览器支持运动传感事件
		window.addEventListener('devicemotion', deviceMotionHandler, false);
		$("#yaoyiyaoyes").show();
		$("#nostart").hide();
		$("#loadingrt").hide();
		$("#Percentage").show();
		} else{
			// 移动浏览器不支持运动传感事件
			$("#yaoyiyaono").show();
			} 
}

//震动监听
function deviceMotionHandler(eventData) {
	if (gameIsOver) {
		return;
	}
	// 获取含重力的加速度
	var acceleration = eventData.accelerationIncludingGravity; 
// 获取当前时间
var curTime = new Date().getTime(); 
var diffTime = curTime -last_update;
// 固定时间段
if (diffTime > SHAKE_SPACE) {
	last_update = curTime; 
	x = acceleration.x; 
	y = acceleration.y; 
	z = acceleration.z; 
	var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 10000; 
	
	if (<?php echo intval($info['isact']);?>) {
		if (speed > SHAKE_THRESHOLD) {
			// TODO:摇一摇之后所要进行的数据逻辑操作
			$("#yaoyiyaoyes").hide();
			$("#yaoyiyaoresult").show();
			$("#loadingrt").hide();
			count++;
			$("#yaoyiyaoresult").html("加油!第" + count + "个了！");
			//摇慢退出了
		}else{

		}
	}else{
		$("#yaoyiyaoyes").hide();
		$("#loadingrt").hide();
		$("#yaoyiyaoresult").show();
		$("#yaoyiyaoresult").html("还没开始，别着急");
	}
		
		
		last_x = x; 
		last_y = y; 
		last_z = z; 
	} 
} 

//2秒更新一次数据
function  updata(){
	if (gameIsOver) {
		return;
	}
	if(last_count<count){
		$.ajax({
			type: "post",
			url : "<?php echo U('Shake/refreshScreen');?>",
			dataType:'text',
			data: 'count='+count+'&id=<?php echo ($info["id"]); ?>&wecha_id=<?php echo ($wecha_id); ?>&token=<?php echo ($info["token"]); ?>',
			success: function(data){
				if(data=='-1'){
					//gameIsOver=true;
				}
			}
		});
	  
		last_count=count;
	}
	setTimeout('updata()',2000);
}
//检查是否开始
function checkStart(){
	var submitData = {
        id: <?php echo ($info["id"]); ?>,
    };
    $.post('index.php?g=Wap&m=Shake&a=shakeActivityStatus&id=<?php echo ($info["id"]); ?>&token=<?php echo ($info["token"]); ?>', submitData,
    function(data) {
        if (data.isact == 1) {
           window.location.reload();
        } else {}
    },
    "json")
}
//电脑上测试用
function testshade(){
	count++;
	$("#yaoyiyaoresult").show();
	$("#yaoyiyaoresult").html("加油!第" + count + "个了！");
		
}
$(document).ready(function(){
	//减小网络加载时间误差
	loadtime=(new Date().getTime()-t1);
	loadtime=starttime*1000-loadtime;
	if(count==0){
		setTimeout('init()',loadtime);
		setTimeout('updata()',loadtime);
	}else{
		init();
		updata();
	}
	if(!isAct){
		setInterval('checkStart()',1500);
	}else{
		TimerStart(loadtime,'lefttime');
	}
	
});
//尽可能屏弊按扭,避免误操作退出
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideOptionMenu');
});
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
	WeixinJSBridge.call('hideToolbar');
});
</script>
<style>
body{font-size:12px;font-family:"nobile","微软雅黑","宋体";color:#595959;margin:0; padding:0; background-color:#404040;text-shadow: rgba(255, 255, 255, .95) 0px 1px 0px; }
@font-face {  font-weight:bold; font-style: normal;  }

/* Common Style */
*{margin:0;padding:0;}
input,select{font-size:12px;line-height:16px;}
h1,h2,h3,h4,h5,h6{font-size:100%;font-weight:normal;} q:before,q:after{content:'';}
.clear{clear:both;display:block;float:none;font-size:0;margin:0;padding:0;overflow:hidden;visibility:hidden;}
img{border:0;}
p{ line-height:20px;}
ul,li{list-style-type:none;}
a{color:#333; text-decoration:none;text-shadow: rgba(255, 255, 255, .95) 0px 1px 0px;}
a:hover{color:#333;text-decoration:underline; /*end color*/background-color:#8AD8DC;-webkit-transition: color .25s linear , background-color 1s linear;transition: color .25s linear,background-color:#fff 0.3s ease-in-out;}

.radius{-moz-border-radius: 3px; -webkit-border-radius: 3px; border-radius:5px;}
.red{ color:#990000}

#Percentage{
	width: 100%;
	height: 30px;
	margin-top: 6px;
	margin-bottom: 12px;
	float: left;
	border-radius: 5px;
	border: 1px solid #3d7337;
	display:none;
	clear:both;
}
#tage {
	height: 30px;
	background: #86ae2c;
	border-radius: 5px;
	clear:both;
	text-align:right;
	color:#fff;
}

/*---------------------------*/		
		
#stripes {
	-webkit-background-size: 30px 30px;
	-moz-background-size: 30px 30px;
	background-size: 30px 30px;
	background-image: -webkit-gradient(linear, left top, right bottom, color-stop(.25, rgba(255, 255, 255, .15)), color-stop(.25, transparent), color-stop(.5, transparent), color-stop(.5, rgba(255, 255, 255, .15)), color-stop(.75, rgba(255, 255, 255, .15)), color-stop(.75, transparent), to(transparent));
	background-image: -webkit-linear-gradient(135deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
	background-image: -moz-linear-gradient(135deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
	background-image: -ms-linear-gradient(135deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
	background-image: -o-linear-gradient(135deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
	background-image: linear-gradient(135deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
	-webkit-animation: animate-stripes 3s linear infinite;
	-moz-animation: animate-stripes 3s linear infinite;
}
 @-webkit-keyframes animate-stripes {
	0% {
		background-position: 0 0;
	}
	100% {
		background-position: 60px 0;
	}
}
 @-moz-keyframes animate-stripes {
	0% {
		background-position: 0 0;
	}
	100% {
		background-position: 60px 0;
	}
}
/*---------------------------*/	 
.page{
	width:320px;
	clear:both;
	margin:0 auto;
}
/*适应手机端的div样式*/
.mobile-div{border:1px #CCC solid; margin:10px 5px; background:#FFF;overflow:hidden;min-height:50px;}

.mobile-hd{
	height:35px;
	line-height:35px;
	padding:0 10px;
	color: #666;
	text-shadow: 0 1px #FFF;
	border-bottom:1px solid #C6C6C6;
	background-color:#E1E1E1;
	background-image: linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);
	background-image: -o-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);
	background-image: -moz-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);
	background-image: -webkit-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);
	background-image: -ms-linear-gradient(bottom, #E7E7E7 0%, #f9f9f9 100%);
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0, #E7E7E7),
		color-stop(1, #f9f9f9)
	);
	-webkit-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;
	-moz-box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;
	box-shadow: 0 1px 0 #FFFFFF inset, 0 1px 0 #EEEEEE;
	-webkit-border-radius: 5px 5px 0 0;
	-moz-border-radius: 5px 5px 0 0;
	-o-border-radius: 5px 5px 0 0;
	border-radius: 5px 5px 0 0;
}
.mobile-hd i{line-height:35px;}
.mobile-content{margin:10px;line-height:28px;}
.mobile-content .help-block{margin-bottom:0; margin-top:3px; color:#AAA;}
.mobile-img img{width:100%;}
.mobile-submit{margin:0 5px;}
.mobile-li{display:block; text-decoration:none; color:#666; height:35px; line-height:35px; font-size:14px; padding:0 10px; border-top:1px #CCC solid;}
.mobile-li:first-child{border-top:0;}
.mobile-li i{line-height:35px;}
.mobile-li:hover{text-decoration:none; color:#333;}
.img-rounded {	-webkit-border-radius: 6px;	-moz-border-radius: 6px;	border-radius: 6px;}
#nostart span{	font-size:36px;	color:red;}
</style>
</head>
<body>
<div class="page">
	<img src="/tpl/static/shake/mtop.png" style="width:320px;">
	<?php if($wecha_id != ''): ?><div class="mobile-div img-rounded">
		<div id="yaoyiyaono" style="font-size:20px;margin:10px;line-height:35px;display:none;">
　　		您的手机该扔了！！！
		</div>
		<div id="yaoyiyaoyes" style="font-size:20px;margin:10px;line-height:50px;display:none;">
			<?php if($info['isact'] == 1): echo ($info["title"]); else: ?>正在加载...<?php endif; ?>
		</div>
		<div id="loadingrt" style="font-size:20px;margin:10px;line-height:50px;">
			正在加载...
		</div>
		<div id="yaoyiyaoresult" style="font-size:20px;margin:10px;line-height:50px;display:none;"></div>
		<div id='nostart' style="text-align:center;<?php if($info['isact'] != 1): ?>display:none<?php endif; ?>"><span id='lefttime'>0</span></div>
	</div>
	<div class="mobile-div img-rounded">
		<div class="mobile-hd">已耗时间</div>
		<div class="mobile-content">
			<div  id="Percentage">
				<div id="tage"  style="width:0%"></div>
			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="mobile-div img-rounded">
		<div class="mobile-hd"><a href="javascript:testshade();">友情提醒</a></div>
		<div class="mobile-content"><p style="color:#f00;line-height:160%">您可能是从朋友圈等分享过的页面打开的链接，无法直接参与此活动，如需参与此活动请按照以下步骤操作：<br>1、关注微信名称“<?php echo ($wxuser["wxname"]); ?>”或者微信号“<?php echo ($wxuser["weixin"]); ?>”<br>2、输入关键词：“<?php echo ($lottery["keyword"]); ?>”</p>   </div>
	</div><?php endif; ?>
	
	
	
	<div class="mobile-div img-rounded">
		<div class="mobile-hd"><a href="javascript:testshade();">规则</a></div>
		<div class="mobile-content"><?php echo ($info["rule"]); ?></div>
	</div>
	
	<div class="mobile-div img-rounded">
		<div class="mobile-hd">简介</div>
		<div class="mobile-content"><?php echo ($info["info"]); ?></div>
		
	</div>
</div>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Shake",
            "moduleID":"<?php echo ($info["id"]); ?>",
            "imgUrl": "<?php echo ($info["thumb"]); ?>", 
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Shake/index',array('token'=>$token,'id'=>$info['id']));?>",
            "tTitle": "<?php echo ($info["title"]); ?>",
            "tContent": "<?php echo ($info["intro"]); ?>"
};
</script>
<?php echo ($shareScript); ?>
</body>
</html>