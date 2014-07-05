<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('site_name'); echo ($wall["title"]); ?></title>
<meta name="keywords" content="<?php echo C('site_name');?>微信墻" />
<meta name="description" content="<?php echo C('site_name');?>微信墻" />
<script type="text/javascript" src="<?php echo RES;?>/wxq/resource/script/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/wxq/source/modules/wxwall/template/common.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo RES;?>/wxq/source/modules/wxwall/template/common.css" />
</head>
<!--    <script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>-->
<body>
    <img id="img_id" src="<?php echo ($wall['background']); ?>" />
<div id="wallMain">
        <table id="topbox" class="topbox">
        <tr>
            <td class="topbox_l"><span class="addCnt">当前抽奖模式：
                    <select class="red Topic_cnt" style="font-size:16px;">
                        <option value="1" <?php if($_GET['type'] == 1): ?>selected="true"<?php endif; ?>>根据聊天记录</option>
                        <option value="2" <?php if($_GET['type'] == 2): ?>selected="true"<?php endif; ?>>根据进墙用户</option>
                    </select>，

                </span>
             </td>
            <td class=""><h1 class="msg_tit">已中奖用户：<strong class="red">0</strong> 位
                <a href="./index.php?g=User&m=Wxq&a=awardList&id=<?php echo ($wall['id']); ?>" target="_blank" style="color:#000; text-decoration:underline;">点击查看中奖名单</a>
                </h1>
            </td>
        </tr>
    </table>

	<div class="msg_list" id="msg_list_wrap">
		<div class="win_animate"></div>
		<div class="win_list"><table cellspacing="0" cellpadding="0"></table></div>
	</div>
</div>

    <div class="side_div">
        <div class="side_item"><a href="<?php echo U('Wxq/qrcode',array('id'=>$wall['id']));?>" >二维码</a></div>
        <div class="side_item"><a href="javascript:;" id="lottery">抽奖</a></div>
        <div class="side_item"><a href="<?php echo U('Wxq/detail',array('id'=>$wall['id']));?>">返回</a></div>
    </div>
<script type="text/javascript">
var message = <?php echo ($list); ?>;
var wxwall = {
	'start' : true,
	'temp' : '',
	'intervalLottery' : {},
	'winUserNum' : 0,
	'messageNum' : 0,
	'winUser' : new Array(),
	'init' : function() {
		var $this = this;
		this.control('start');
	},
	'buildLottery' : function(message) {/*构造一条抽奖内容*/
		if (!message) {
			return false;
		}
		this.temp = message['avatar'];
		var font_size = this.changeSize(message['content']);
		var html = '<div class="userPic" id="msg_'+message['id']+'"><img src="'+message['avatar']+'"><span class="userName"><strong>'+message['nickname']+'</strong></span></div><div class="msgBox"><span width=88% height=88% style="font-size:' + font_size + 'px;line-height:' + parseInt(font_size+8) + 'px;">' +
					message['content'] + '</span></div>';
		message['avatar'] = this.temp;
		return html;
	},
	'control' : function(operation) {
		var $this = this;
		if (operation == 'pause') {
			this.start = false;
			$('#lottery').html('抽奖');
			$('#lottery')[0].onclick = function() {
				$this.control('start');
			}
		} else if(operation == 'start') {
			this.start = true;
			$('#lottery').html('暂停');
			$('#lottery')[0].onclick = function() {
				$this.control('pause');
				$this.getuser();
			}
			$this.startLottery();
		}
	},
	'startLottery' :function() {
		var $this = this;
		if (!$this.start) {
			clearTimeout($this.intervalLottery);
			return false;
		}
		$('#lottery').html('暂停');
		do {
			if ($this.winUser.length >= message.length ) {
				alert('全部用户已中奖！');
				return false;
			}
			$this.messageNum++;
			if ($this.messageNum >= message.length) {
				$this.messageNum = 0;
			}
		}
		while (!message[$this.messageNum] || $this.isWinuser(message[$this.messageNum]['nickname']));
		$('.win_animate').html(this.buildLottery(message[$this.messageNum]));
		$this.intervalLottery = setTimeout(function(){
			$this.startLottery();
		}, 50);
	},
	'getuser' : function() {
		var $this = this;
		var winner = message[$this.messageNum];
		if($this.isWinuser(winner['nickname'])) {
			alert('抱歉，未有用户中奖，你重新抽奖！');
			$this.control('start');
			return false;
		}
		this.winUserNum++;
		this.temp = winner['avatar'];
		if (winner['avatar']) {
			if (winner['avatar'].indexOf('source/modules') >= 0) {
				avatar = winner['avatar'];
			} else {
				avatar = winner['avatar'];
			}
		} else {
			avatar = winner['avatar'];
		}
		$('.win_list table').prepend('<tr><td class="num"><span>'+this.winUserNum+'</span></td><td class="avatar"><img src="'+avatar+'"></td><td class="name">'+winner['nickname']+'</td></tr>');
		$('.msg_tit strong').html(this.winUserNum);
		this.winUser.push(winner['nickname']);
		record();
		function record() {
			$.getJSON("./index.php?g=User&m=Wxq&a=award&id="+winner['wxq_id'], {'mid' : winner['id']}, function(s){
				if (s.status == 0) {
					record();
				}
			});
		}
	},
	'isWinuser' : function(username) {
		for(var i=0; i<this.winUser.length; i++){
			if(this.winUser[i] == username) {
				return true;
			}
		}
		return false;
	},
	'removeHTMLTag' : function(str) {
		str = str.replace(/<\/?[^>]*>/g,'');
		str = str.replace(/[ | ]*\n/g,'\n');
		str = str.replace(/\n[\s| | ]*\r/g,'\n');
		str = str.replace(/&nbsp;/ig,'');
		return str;
	},
	'strlen' : function(str) {
		var n = 0;
		str = this.removeHTMLTag(str);
		for(i=0;i<str.length;i++){
			var leg=str.charCodeAt(i);
			n+=1;
		}
		return n;
	},
	'changeSize' : function(a) {
		var $this = this;
		var str_len = parseInt($this.strlen(a));
		var font_size = 36;
		for (j=18;j>str_len;j--) {
			font_size += 4;
		}
		return font_size;
	}
};
$(function(){
	wxwall.init();
	var windowUrl = "./index.php?g=User&m=Wxq&a=lottery&id="+<?php echo ($wall['id']); ?>;
	$('.Topic_cnt').change(function() {
		window.location.href = windowUrl+'&type='+$(this).val();
	});
});
</script>
</body>
</html>