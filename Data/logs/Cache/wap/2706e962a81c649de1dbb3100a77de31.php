<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="description" content="">

<title><?php echo ($Dazpan["title"]); ?></title>
<link href="<?php echo RES;?>/css/guajiang/css/activity-style.css" rel="stylesheet" type="text/css">
</head>
<body class="activity-lottery-winning" >
<!--main start-->
<div class="main" >
<script src="<?php echo RES;?>/css/guajiang/js/jquery.js" type="text/javascript"></script> 
<script src="<?php echo RES;?>/css/guajiang/js/alert.js" type="text/javascript"></script> 
<style type="text/css">

.window {
	width:290px;
	position:absolute;
	display:none;
	bottom:30px;
	left:50%;
	 z-index:9999;
	margin:-50px auto 0 -145px;
	padding:2px;
	border-radius:0.6em;
	-webkit-border-radius:0.6em;
	-moz-border-radius:0.6em;
	background-color: #ffffff;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	-o-box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	font:14px/1.5 Microsoft YaHei,Helvitica,Verdana,Arial,san-serif;
}
.window .title {
	
	background-color: #A3A2A1;
	line-height: 26px;
    padding: 5px 5px 5px 10px;
	color:#ffffff;
	font-size:16px;
	border-radius:0.5em 0.5em 0 0;
	-webkit-border-radius:0.5em 0.5em 0 0;
	-moz-border-radius:0.5em 0.5em 0 0;
	background-image: -webkit-gradient(linear, left top, left bottom, from( #585858 ), to( #565656 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient(#585858, #565656); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient(#585858, #565656); /* FF3.6 */
	background-image:     -ms-linear-gradient(#585858, #565656); /* IE10 */
	background-image:      -o-linear-gradient(#585858, #565656); /* Opera 11.10+ */
	background-image:         linear-gradient(#585858, #565656);
	
}
.window .content {
	/*min-height:100px;*/
	overflow:auto;
	padding:10px;
	background: linear-gradient(#FBFBFB, #EEEEEE) repeat scroll 0 0 #FFF9DF;
    color: #222222;
    text-shadow: 0 1px 0 #FFFFFF;
	border-radius: 0 0 0.6em 0.6em;
	-webkit-border-radius: 0 0 0.6em 0.6em;
	-moz-border-radius: 0 0 0.6em 0.6em;
}
.window #txt {
	min-height:30px;font-size:16px; line-height:22px;
}
.window .txtbtn {
	
	background: #f1f1f1;
	background-image: -webkit-gradient(linear, left top, left bottom, from( #DCDCDC ), to( #f1f1f1 )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #DCDCDC ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #DCDCDC ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #DCDCDC ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #DCDCDC ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #DCDCDC );
	border: 1px solid #CCCCCC;
	border-bottom: 1px solid #B4B4B4;
	color: #555555;
	font-weight: bold;
	text-shadow: 0 1px 0 #FFFFFF;
	border-radius: 0.6em 0.6em 0.6em 0.6em;
	display: block;
	width: 100%;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
	text-overflow: ellipsis;
	white-space: nowrap;
	cursor: pointer;
	text-align: windowcenter;
	font-weight: bold;
	font-size: 18px;
	padding:6px;
	margin:10px 0 0 0;
}
.window .txtbtn:visited {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffffff ), to( #cccccc )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #cccccc ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #cccccc ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #cccccc ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #cccccc ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #cccccc );
}
.window .txtbtn:hover {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #ffffff ), to( #cccccc )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #ffffff , #cccccc ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #ffffff , #cccccc ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #ffffff , #cccccc ); /* IE10 */
	background-image:      -o-linear-gradient( #ffffff , #cccccc ); /* Opera 11.10+ */
	background-image:         linear-gradient( #ffffff , #cccccc );
}
.window .txtbtn:active {
	background-image: -webkit-gradient(linear, left top, left bottom, from( #cccccc ), to( #ffffff )); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #cccccc , #ffffff ); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #cccccc , #ffffff ); /* FF3.6 */
	background-image:     -ms-linear-gradient( #cccccc , #ffffff ); /* IE10 */
	background-image:      -o-linear-gradient( #cccccc , #ffffff ); /* Opera 11.10+ */
	background-image:         linear-gradient( #cccccc , #ffffff );
	border: 1px solid #C9C9C9;
	border-top: 1px solid #B4B4B4;
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3) inset;
}

.window .title .close {
	float:right;
	background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACTSURBVEhL7dNtCoAgDAZgb60nsGN1tPLVCVNHmg76kQ8E1mwv+GG27cestQ4PvTZ69SFocBGpWa8+zHt/Up+IN+MhgLlUmnIE1CpBQB2COZibfpnXhHFaIZkYph0SOeeK/QJ8o7KOek84fkCWSBtfL+Ny2MPpCkPFMH6PWEhWhKncIyEk69VfiUuVhqJefds+YcwNbEwxGqGIFWYAAAAASUVORK5CYII=");
	width:26px;
	height:26px;
	display:block;	
}
</style>

<?php if($Dazpan['end'] == 1): ?><div class="activity-lottery-end" >
    <div  class="main" >
    <div class="banner"><img src="<?php if(!$Dazpan['endpicurl']){ echo RES;?>/css/guajiang/images/activity-lottery-end2.jpg<?php }else{ echo ($Dazpan["endpicurl"]); } ?>" /></div>
    <div class="content" style=" margin-top:10px">
        <div class="boxcontent boxyellow">
            <div class="box">
                <div class="title-red">活动结束说明：</div>
                <div class="Detail">
                <p> <?php echo ($Dazpan["endinfo"]); ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php else: ?>
    <div style="display: none;" class="window" id="windowcenter">
	<div id="title" class="title">消息提醒<span class="close" id="alertclose"></span></div>
	<div class="content">
	 <div id="txt">亲，继续努力哦！</div>
	 <input value="确定" id="windowclosebutton" name="确定" class="txtbtn" type="button">	
	</div>
    </div>
    <?php if ($Dazpan['statdate']<time()){?>
    <div id="outercont"  >
        <div id="outer-cont">
            <div id="outer"><img src="<?php echo RES;?>/css/guajiang/images/activity-lottery-5.png"></div>
        </div>
        <div id="inner-cont">
            <div id="inner" <?php if($wecha_id == ''): ?>onclick="alert('您不能参加此活动');"<?php else: endif; ?>><img src="<?php echo RES;?>/css/guajiang/images/activity-lottery-2.png"></div>
        </div>
    </div>
    <?php  } endif; ?>


<!--content start-->
<div class="content">
    <div class="boxcontent boxyellow"  id="result"  <?php if($Dazpan['end'] != 5): ?>style="display:none"<?php endif; ?>>
    <div class="box">
        <div class="title-orange"><span>恭喜您中奖了</span></div>
        <div class="Detail">   
            <p>你中了：<span class="red" id="prizetype" ><?php echo ($Dazpan["prize"]); ?>等奖</span></p>
            <p>兑奖<?php echo ($Dazpan["renamesn"]); ?>：<span class="red" id="sncode" ><?php echo ($Dazpan["sn"]); ?></span></p>
            <p class="red" id="red"><?php echo ($Dazpan["sttxt"]); ?></p>
            <?php if($record["phone"] == ''): ?><p>
            <input name=""  class="px" id="tel" value="" type="text" placeholder="请输入您的<?php echo ($Dazpan["renametel"]); ?>">
            <input name=""  class="px" id="wechaname" value="" type="text" placeholder="请输入您的微信号">
            <input name=""  id="wechaid" value="<?php echo ($Dazpan["wecha_id"]); ?>" type="hidden">
            <input name=""  id="lid" value="<?php echo ($Dazpan["lid"]); ?>" type="hidden">
            <input name=""  id="winprize" value="" type="hidden">
            <input name=""  id="rid" value="<?php echo ($record["id"]); ?>" type="hidden">
            </p>
            <p>
            <input class="pxbtn" name="提 交"  id="save-btn" type="button" value="用户提交">
            </p>
            <?php else: ?>
            <?php echo ($record["phone"]); endif; ?>
            <?php if($record["sendstutas"] == 0): ?><p><input name="" class="px" id="parssword" value="" placeholder="商家输入兑奖密码" type="password"></p>
            <p><input class="pxbtn" name="提 交" id="save-btnn" value="商家提交" type="button"></p>
            <?php else: ?>
            <p>已于<?php echo (date("Y-m-d",$record["sendtime"])); ?>兑奖</p><?php endif; ?>
        </div>
    </div>
  </div>


<?php if($Dazpan['end'] == 5): ?><div  class="main" style="display:none">
    <div class="content" style=" margin-top:10px">
        <div class="boxcontent boxyellow">
            <div class="box">
                <div class="title-red">恭喜:</div>
                <div class="Detail">
                <p>您已经中了<font color='red'> <?php echo ($Dazpan["prize"]); ?> </font> ,您的领奖序列号:<font color='red'> <?php echo ($Dazpan["sn"]); ?> </font>请您牢记及尽快与我们联系</p>
                </div>
            </div>
        </div>
    </div>
    </div><?php endif; ?>


<?php if($Dazpan['On'] == 1): if($wecha_id == ''): ?><div class="boxcontent boxyellow">
    <div class="box">
    <div class="title-green"><span>友情提醒：</span></div>
         <div class="Detail">
				<p style="color:#f00;line-height:160%">您可能是从朋友圈等分享过的页面打开的链接，无法直接参与此活动，如需参与此活动请按照以下步骤操作：<br>1、关注微信名称“<?php echo ($wxuser["wxname"]); ?>”或者微信号“<?php echo ($wxuser["weixin"]); ?>”<br>2、输入关键词：“<?php echo ($Dazpan["keyword"]); ?>”</p>            
               </div>
</div>
</div><?php endif; ?>
			
<div class="boxcontent boxyellow">
    <div class="box">
    <div class="title-green"><span>奖项设置：</span></div>
         <div class="Detail">
         <?php if ($Dazpan['statdate']>time()){echo '<p style="color:red">活动还没有开始 :(</p>';}?>
		 <p>每人最多允许抽奖次数:<?php echo ($Dazpan["canrqnums"]); ?> <?php if($Dazpan["daynums"] != 0): ?>，每天只能抽<?php echo ($Dazpan["daynums"]); ?>次<?php endif; ?> <?php if($Dazpan["usenums"] > 0): ?>- 已抽取 <span class="red" id="usenums"><?php echo ($Dazpan["usenums"]); ?></span> 次<?php endif; ?></p>
            <p>一等奖: <?php echo ($Dazpan["fist"]); ?>  <?php if($Dazpan['displayjpnums']){ ?>奖品数量: <?php echo ($Dazpan["fistnums"]); } ?></p>
              <?php if($Dazpan['second'] != ''): ?><p>二等奖: <?php echo ($Dazpan["second"]); ?> <?php if($Dazpan['displayjpnums']){ ?>奖品数量: <?php echo ($Dazpan["secondnums"]); } ?></p><?php endif; ?>             
            <?php if($Dazpan['third'] != ''): ?><p>三等奖: <?php echo ($Dazpan["third"]); ?> <?php if($Dazpan['displayjpnums']){ ?>奖品数量: <?php echo ($Dazpan["thirdnums"]); } ?></p><?php endif; ?>
            <?php if($Dazpan['four'] != ''): ?><p>四等奖: <?php echo ($Dazpan["four"]); ?>  <?php if($Dazpan['displayjpnums']){ ?>奖品数量: <?php echo ($Dazpan["fournums"]); } ?></p><?php endif; ?>
            <?php if($Dazpan['five'] != ''): ?><p>五等奖: <?php echo ($Dazpan["five"]); ?>  <?php if($Dazpan['displayjpnums']){ ?>奖品数量: <?php echo ($Dazpan["fivenums"]); } ?></p><?php endif; ?>
            <?php if($Dazpan['six'] != ''): ?><p>六等奖: <?php echo ($Dazpan["six"]); ?>   <?php if($Dazpan['displayjpnums']){ ?>奖品数量: <?php echo ($Dazpan["sixnums"]); } ?></p><?php endif; ?>
        </div>
</div>
</div>
<div class="boxcontent boxyellow">
    <div class="box">
        <div class="title-green">活动说明：</div>
        <div class="Detail">
        <p><?php echo ($Dazpan["info"]); ?></p>
        <p>活动时间:<?php echo (date("Y-m-d",$Dazpan["statdate"])); ?>至<?php echo (date("Y-m-d",$Dazpan["enddate"])); ?></p>		
        <p><strong><?php echo ($Dazpan["txt"]); ?></strong></p>  
        </div>
    </div>
</div><?php endif; ?>

</div>
<!--content end-->
</div>
<!--main end-->
<!--footer start-->
<style>
.footFix{width:100%;text-align:center;position:fixed;left:0;bottom:0;z-index:99;}
#footReturn a, #footReturn2 a {
display: block;
line-height: 41px;
color: #fff;
text-shadow: 1px 1px #282828;
font-size: 14px;
font-weight: bold;
}
#footReturn, #footReturn2 {
z-index: 89;
display: inline-block;
text-align: center;
text-decoration: none;
vertical-align: middle;
cursor: pointer;
width: 100%;
outline: 0 none;
overflow: visible;
Unknown property name.-moz-box-sizing: border-box;
box-sizing: border-box;
padding: 0;
height: 41px;
opacity: .95;
border-top: 1px solid #181818;
box-shadow: inset 0 1px 2px #b6b6b6;
background-color: #515151;
Invalid property value.background-image: -ms-linear-gradient(top,#838383,#202020);
background-image: -webkit-linear-gradient(top,#838383,#202020);
Invalid property value.background-image: -moz-linear-gradient(top,#838383,#202020);
Invalid property value.background-image: -o-linear-gradient(top,#838383,#202020);
background-image: -webkit-gradient(linear,0% 0,0% 100%,from(#838383),to(#202020));
Invalid property value.filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
Unknown property name.-ms-filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#838383',endColorstr='#202020');
}

</style>
<div style="height:60px;"></div>
<div class="footFix" id="footReturn"><a href="javascript:void(0)" onClick="location.href='<?php echo U('Wap/Index/index',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id']));?>';"><span>返回3G网站</span></a></div>
<!--footer end-->

<script type="text/javascript">

    
$(function() {
    window.requestAnimFrame = (function() {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
        function(callback) {
            window.setTimeout(callback, 1000 / 60)
        }
    })();

    var totalDeg = 360 * 3 + 0;
    var steps = [];
    var lostDeg = [36, 96, 156, 216, 276,336];
    var prizeDeg = [6, 66, 126,186,246,306];
    var prize, sncode;
    var count = 0;
    var now = 0;
    var a = 0.01;
    var outter, inner, timer, running = false;
    

    function countSteps() {
        var t = Math.sqrt(2 * totalDeg / a);
        var v = a * t;
        for (var i = 0; i < t; i++) {
            steps.push((2 * v * i - a * i * i) / 2)
        }
        steps.push(totalDeg)
    }
     
    function step() {
    	 outter.style.webkitTransform = 'rotate(' + steps[now++] + 'deg)';
        outter.style.MozTransform = 'rotate(' + steps[now++] + 'deg)';
        if (now < steps.length) {
running = true;
            requestAnimFrame(step)
        } else {
            running = false;
            setTimeout(function() {
                if (prize != null) {
                    $("#sncode").text(sncode);
                    var type = "";
                    if (prize == 1) {
                        type = "一等奖"
                    } else if (prize == 2) {
                        type = "二等奖"
                    } else if (prize == 3) {
                    	type = "三等奖"
                    }
                    else if (prize == 4) {
                    	type = "四等奖"
                    }
                    else if (prize == 5) {
                    	type = "五等奖"
                    }
                    else if (prize == 6) {
                    	type = "六等奖"
                    }
                    $("#prizetype").text(type);
                    $("#result").slideToggle(500);
                    $("#outercont").slideUp(500)
                } else {
                    alert("<?php echo ($Dazpan["aginfo"]); ?>")
                }
            },
            200)
        }
    } //setps()
    
    function start(deg) {
        deg = deg || lostDeg[parseInt(lostDeg.length * Math.random())];
        running = true;
        clearInterval(timer);
        totalDeg = 360 * 5 + deg;
        steps = [];
        now = 0;
        countSteps();
        requestAnimFrame(step)
    }
    window.start = start;
    outter = document.getElementById('outer');
    inner = document.getElementById('inner');
    i = 10;
<?php if($wecha_id != ''): ?>$("#inner").click(function() {

        if (running) return;
        if (count >= <?php echo ($Dazpan["canrqnums"]); ?>) {
            alert("Oh~No~您已经抽了<?php echo ($Dazpan["canrqnums"]); ?> 次奖,不能再抽了,下次再来吧!");
            return
        }

        if (prize != null) {
            alert("亲，你不能再参加本次活动了喔！下次再来吧^_^");
            return
        }

       $.ajax({
         url     : "index.php?g=Wap&m=Lottery&a=getajax&token=<?php echo ($Dazpan["token"]); ?>&oneid=<?php echo ($Dazpan["wecha_id"]); ?>&id=<?php echo ($Dazpan["lid"]); ?>&rid=<?php echo ($Dazpan["rid"]); ?>",
         dataType: "json",
         
         beforeSend : function(){
            running = true;
            timer = setInterval(function() {
                i += 5;
                outter.style.webkitTransform = 'rotate(' + i + 'deg)';
                outter.style.MozTransform = 'rotate(' + i + 'deg)'
            },1)
         },
         success: function(data) {
         	if (data.error == 1) {
         		alert(data.msg);
         		count = <?php echo ($Dazpan["canrqnums"]); ?>;
         		clearInterval(timer);
         		return
         	}
         	if (data.error == "getsn") {

         		$("#tel").val(data.tel);
         		if(data.state==2){
         			$("#closedj").css("display","none");

         		}
         		$("#red").text(data.msg);
         		alert(data.msg + data.sn);
         		count = <?php echo ($Dazpan["canrqnums"]); ?>;
         		clearInterval(timer);
         		prize = data.prizetype;
         		sncode = data.sn;
         		start(prizeDeg[data.prizetype - 1]);
         		return
         	}
         	if (data.success) {
         		prize = data.prizetype;
         		sncode = data.sn;
         		start(prizeDeg[data.prizetype - 1])
         	} else {
         		prize = null;
         		start()
         	}
         	running = false;
         	count++
         },
         error: function() {
         	alert('ajax request failed!!!!');
         	return;
         	prize = null;
         	start();
         	running = false;
         	count++
         },
         timeout    : 5000       
        
       })//ajax
    }<?php endif; ?>
    ) //#inner click function;
});



//中奖提交
$("#save-btn").bind("click",
function() {
    var btn = $(this);
    var tel = $("#tel").val();
    var wxname  = $("#wechaname").val();
    var wechaid = $("#wechaid").val();
    var lid     = $("#lid").val();
    var prizetype = $("#winprize").val();
    if (tel == '') {
        alert("请认真输入<?php echo ($Dazpan["renametel"]); ?>");
        return
    }
    
    if (wxname == '') {
        alert("请认真输入微信号");
        return
    }
   
    var submitData = {
        lid: lid,
        sncode: $("#sncode").text(),
        tel: tel,
        wxname: wxname,
        wechaid:wechaid,
        rid:$("#rid").val(),
        action: "add"
    };
    $.post('index.php?g=Wap&m=Lottery&a=add', submitData,
    function(data) {
        if (data.success == true) {
            alert(data.msg);
            $("#result").hide("slow");
            setTimeout("window.location.href = location.href",2000);
            return
        } else {}
    },
    "json")
});

$("#save-btnn").bind("click",
function () {
	var submitData = {
		id: <?php echo ($Dazpan["id"]); ?>,
		rid: <?php echo ($record["id"]); ?>,
		parssword: $("#parssword").val()
	};
	$.post('index.php?g=Wap&m=Lottery&a=exchange', submitData,
	function (data) {
		if (data.success == true) {
			alert(data.msg);
			if (data.changed == true) {
				setTimeout("window.location.href = location.href",2000);
			}
			return
		} else {alert(data.msg);}
	},
	"json")
});

</script>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Lottery",
            "moduleID":"<?php echo ($Dazpan["id"]); ?>",
            "imgUrl": "<?php echo ($Dazpan["starpicurl"]); ?>", 
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Lottery/index',array('token'=>$token,'id'=>$Dazpan['id'],'type'=>1));?>",
            "tTitle": "<?php echo ($Dazpan["title"]); ?>",
            "tContent": "<?php echo ($Dazpan["info"]); ?>"
};
</script>
<?php echo ($shareScript); ?>
</body>
</html>