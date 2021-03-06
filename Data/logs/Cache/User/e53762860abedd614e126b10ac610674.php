<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('site_name'); echo ($wall["title"]); ?></title>
<meta name="keywords" content="微信墻" />
<meta name="description" content="微信墻" />
<script type="text/javascript" src="<?php echo RES;?>/wxq/resource/script/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/wxq/source/modules/wxwall/template/common.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo RES;?>/wxq/source/modules/wxwall/template/common.css" />
</head>
<!--    <script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>-->
<body>
<img id="img_id" src="<?php echo ($wall['background']); ?>"/>
<div id="wrap" class="wrapbg" >
  <div id="whole">
    <div id="header" class="clearfix">

              <a href="#" target="_blank">
                      <span class="logo-t left"><img class="logoScreenLeft" src="<?php echo ($wall['logourl']); ?>" /></span>
                  </a>
            <div class="word-scroll left">
        <div class="clearfix">
          <div class="scrollbox left">
            <ul class="word-list wordList">
             <li class="themeBox" >查找微信号：<?php echo ($wall['account']['weixin']); ?><br/>发送“<?php echo ($wall['keyword']); ?>”登记后发送内容，自动上墙</li>
            </ul>
            
          </div>
          <div class="num-t left">
            <p><em class="messageTotal"></em><span>扫描二维码<br/>即刻上墙</span></p>
          </div>
        </div>
      </div>
      <span class="reserved right showIntroBtn">
                  <img src="<?php echo ($wall["qrcode"]); ?>" style="max-width:126px;max-height:96px;">
              </span>
    </div>
<div id="wallMain">
	<div class="msg_list" id="msg_list_wrap">
		<div id="msg_list" style="position:absolute; left:0px;">

		</div>
	</div>
</div>
</div>
<div class="side_div">
	<div class="side_item"><a href="javascript:;" id="remaintime" style="color:red; font-weight:600;">0</a></div>
	<div class="side_item"><a href="javascript:;" onclick="wxwall.prevPage()">上一页</a></div>
	<div class="side_item"><a href="javascript:;" onclick="wxwall.nextPage()">下一条</a></div>
	<div class="side_item"><a href="#" id="status">暂停</a></div>
    <div class="side_item"><a href="<?php echo U('Wxq/qrcode',array('id'=>$wall['id']));?>" >二维码</a></div>
    <div class="side_item"><a href="<?php echo U('Wxq/lottery',array('id'=>$wall['id'],'type'=>1));?>">去抽奖</a></div>
</div>


<script type="text/javascript">
var message = <?php echo ($list); ?>;
var id = <?php echo ($id); ?>;
var delayTime = <?php echo ($wall['showtime']); ?>;
if(delayTime==''){
    delayTime=8000;
}
var wxwall = {
	'options' : {
		'index' : -1,
		'pagesize' : 1,
		'delaytime' : delayTime,
		'wrapHeight' : 0,
		'pause' : false
	},
	'temp' : '',
	'status' : {'prev' : false, 'next' : true},
	'timer' : {},
	'timerdown' : {},
	'lastmsgtime' : 0,
	'page' : 1,
	'init' : function() {
		var $this = this;
		this.options.wrapHeight = $('#msg_list_wrap').height();
		this.prevPage();
		this.control('start');
		$('#remaintime').html();
	},
	'buildItem' : function(message) {/*构造一条微墙内容*/
		if ($('#msg_list #msg_'+message['id'])[0]){
			return '';
		}
        this.lastmsgtime = message['createtime'];
		if (message['avatar']) {
			if (message['avatar'].indexOf('source/modules') >= 0) {
				message['avatar'] = message['avatar'];
			} else {
				message['avatar'] = message['avatar'];
			}
		} else {
            message['avatar']='http://t2.baidu.com/it/u=3798893902,2939720635&fm=15&gp=0.jpg';
		}
		var font_size = this.changeSize(message['content']);
		var html = '<div class="talkList" id="msg_'+message['id']+'" style="display:none; height:auto;">' +
					'<div class="userPic"><img src="'+message['avatar']+'"><span class="userName"><strong>'+message['nickname']+'</strong></span></div>' +
					'<div class="msgBox"><span class="msgCnt" style="font-size:' + font_size + 'px;line-height:' + parseInt(font_size+8) + 'px;">' +
					message['content'] + '</span></div></div>';
		return html;
	},
	'appendItem' : function(message) {/*向后插入一条消息*/
		if (!message) {
			return false;
		}
		$('#msg_list').append(this.buildItem(message));
		$('#msg_list div:last-child').css('display', 'block');
	},
	'beforeItem' : function(message) {/*向前插入一条消息*/
		if (!message) {
			return false;
		}
		if ($('#msg_list div:first').size()) {
			$('#msg_list div:first').before(this.buildItem(message));
		} else {
			$('#msg_list').append(this.buildItem(message));
		}
		var target = $('#msg_list div:first');
		if (!this.options.pause) {
			target.show().css('height', $(this).height()).animate({'duration' : 200, 'specialEasing' : {'width' : target.width()}});
		}
	},
	'prevPage' : function() {/*浏览上一页数据*/
		if (this.options.index >= message.length) {
			return false;
		}
		this.control('pause');
		if (this.status.prev) {
			this.options.index += 2;
			this.status.prev = false;
		} else {
			this.options.index += 1;
		}
		if ($('#msg_list .talkList').size() < this.options.index + 1) {
			for (i = this.options.index; i < this.options.index + this.options.pagesize; i++) {
				try {
					this.appendItem(message[i]);
				} catch (e) {
				}
			}
		}
		if (this.options.index >= 2){
			var position = $('#msg_list .talkList').eq(this.options.index).position();
			var top = 0;
			if (position) {
				top = $('#msg_list .talkList').eq(this.options.index).position().top + $('#msg_list .talkList').eq(this.options.index).outerHeight();
				if (this.options.wrapHeight - top > 0) {
					top = 0;
				} else {
					top = this.options.wrapHeight - top;
				}
			}
			if (top != 0) {
				$('#msg_list').css({'position' : 'absolute'}).animate({'top' : top});
			}
		}
	},
	'nextPage' : function() {
		if (this.options.index <= 0) {
			return false;
		}
		this.control('pause');
		this.options.index -= 1;
		if (!this.status.prev) {
			if ($('#msg_list .talkList').eq(this.options.index - 1).outerHeight() < this.options.wrapHeight) {
				this.options.index -= 2;
			} else {
				this.options.index -= 1;
			}
			this.status.prev = true;
			this.status.next = false;
		}
		if (this.options.index < 0) {
			this.options.index = 0;
		}
		if (this.options.index > 0) {
			var position = $('#msg_list .talkList').eq(this.options.index).position();
			var top = 0;
			if (position) {
				top = 0 - $('#msg_list .talkList').eq(this.options.index).position().top;
			}
			if (top != 0) {
				$('#msg_list').css({'position' : 'absolute'}).animate({'top' : top});
			}
		} else if (this.options.index == 0) {
			$('#msg_list').css({'position' : 'absolute'}).animate({'top' : 0});
		}
	},
	'newItem' : function() {
		var $this = this;
		if (this.options.pause) {
			return false;
		}
		if ($('#msg_list .talkList:hidden').size() >0) {
			try {
				var target = $('#msg_list .talkList:hidden:last');
				if (!this.options.pause && target[0]) {
					target.show({'duration' : 200, 'specialEasing' : {'width' : target.width()}});
				}
			} catch (e) {}
			$this.timer = setTimeout(function(){
				$this.newItem();
			}, $this.options.delaytime);
		} else {
			$.getJSON("./index.php?g=User&m=Wxq&a=incoming&id="+id, {'lastmsgtime' : $this.lastmsgtime, 'page' : $this.page}, function(s){
				if (s && s['data']) {
					$this.page++;
				}
				try {
					$this.beforeItem(s['data']);
				} catch (e) {
				}
				$this.timer = setTimeout(function(){
					$this.newItem();
				}, $this.options.delaytime);
				$this.countdown($this.options.delaytime);
			});
		}
	},
	'control' : function(operation) {
		var $this = this;
		if (operation == 'pause') {
			this.options.pause = true;
			clearTimeout($this.timer);
			$('#status').html('开始');
			$('#status')[0].onclick = function(){
				$this.control('start');
			}
		} else if(operation == 'start') {
			this.options.pause = false;
			$('#status').html('暂停');
			$('#status')[0].onclick = function(){
				$this.control('pause');
			}
			this.options.index = 0;
			$('#msg_list').css({'position' : 'absolute'}).animate({'top' : 0});
			clearTimeout($this.timer);
			$this.newItem();
		}
	},
	'countdown' : function(time) {
		var $this = this;
		if (time) {
			clearTimeout(this.timerdown);
			$('#remaintime').html(time / 1000);
		} else {
			time = parseInt($('#remaintime').html()) - 1;
			if (time < 0){
				time = 0;
			}
			$('#remaintime').html(time);
		}
		this.timerdown = setTimeout(function(){
			$this.countdown();
		}, 1000);
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
			/*if(leg>255){
				n+=2;
			}else {
				n+=1;
			}*/
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
});
</script>

<audio autoplay src="<?php echo ($wall['bgmp3']); ?>" loop></audio>
</body>
</html>