<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
<title> <?php echo C('site_title');?> <?php echo C('site_name');?></title>
<meta name="keywords" content="<?php echo ($f_metaKeyword); ?>" />
<meta name="description" content="<?php echo ($f_metaDes); ?>" />
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/matrix-media.css" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/jquery.gritter.css" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/font-awesome.css" media="all" />
<link href="<?php echo RES;?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo RES;?>/css/stylet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/top_v5.css"/>
<link rel="shortcut icon" href="/favicon.ico" />
<script type="text/javascript" src="<?php echo RES;?>/js/jQuery.js"></script>
<script src="<?php echo RES;?>/js/common.js" type="text/javascript"></script>
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
                <div id="logoweiwo">
                    <a href="/" class="logocover"></a>
                    <a href="/" title="" hidefocus="true" class="logo-ornament logo-animation" id="logo_ornament"></a>
                </div>
                <ul>
                    <li><a href="/" class="hover" title="首页">首页</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('Home/Index/about');?>">关于<?php echo C('site_name');?></a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('Home/Index/service');?>">功能介绍</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('Home/Index/dz');?>">私人定制</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('Home/Index/case');?>">案例展示</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('Home/Index/ap');?>">微路由</a></li>
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
                    <li><a href="<?php echo U('Home/Index/price');?>">资费说明</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo U('System/Admin/logout');?>">退出</a></li><?php endif; ?>
                    <?php if($_SESSION[uid]==false): ?><li class="divider"></li>
                    <li class="header-account"><a href="<?php echo U('Home/Index/reg');?>" class="create">创建一个账号</a><a href="<?php echo U('Home/Index/index');?>" class="login">登录</a></li>
                    <?php else: ?>
                    <li class="header-account"><a href="#" class="a" id="tiduser" onMouseOver="ying();" ><span><?php echo (session('uname')); ?></span></a></li><?php endif; ?>
                                    </ul>
            </div>
        </div>
    </div>
</div>

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 首页</a>
  <ul>
    <li class="active"><a href="<?php echo U('User/Index/index');?>"><i class="icon-refresh"></i> <span>首页</span></a> </li>
    
    <li class="submenu"> <a href="#"><i class="icon-cogs"></i> <span>基础功能</span></a>
      <ul>
        <li><a href="<?php echo U('Connme/index',array('token'=>$token));?>"><i class="icon-cog"></i> 基础功能配置</a></li>
        <li><a href="<?php echo U('Wo138/index',array('token'=>$token));?>"><i class="icon-cog"></i> 实用工具外链</a></li>
        <li><a href="<?php echo U('Areply/index',array('token'=>$token));?>"><i class="icon-comment"></i> 关注回复</a></li>
        <li><a href="<?php echo U('Text/index',array('token'=>$token));?>"><i class="icon-comment-alt"></i> 文本回复</a></li>
        <li><a href="<?php echo U('Voiceresponse/index',array('token'=>$token));?>"><i class="icon-headphones"></i> 语音回复</a></li>
        <li><a href="<?php echo U('Weiwosms/index',array('id'=>session('wxid'),'token'=>$token));?>"><i class="icon-signal"></i> 短信设置</a></li>
        <li><a href="<?php echo U('Weiwoemail/index',array('id'=>session('wxid'),'token'=>$token));?>"><i class="icon-envelope"></i> 邮箱设置</a></li>
        <li><a href="<?php echo U('Company/index',array('token'=>$token));?>"><i class="icon-cogs"></i> 商家设置</a></li>
        <li><a href="<?php echo U('Alipay_config/index',array('token'=>$token));?>"><i class="icon-cog"></i> 支付设置</a></li>
        <li><a href="<?php echo U('Feiyin/index',array('token'=>$token));?>"><i class="icon-print"></i> 飞印设置</a></li>
        <li><a href="<?php echo U('Requerydata/index',array('token'=>$token));?>"><i class="icon-bar-chart"></i> 数据统计</a></li>
        <li><a href="<?php echo U('Other/index',array('token'=>$token));?>"><i class="icon-book"></i> 回答不上</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon-home"></i> <span>微网站</span></a>
      <ul>
        <li><a href="<?php echo U('Home/set',array('token'=>$token));?>"><i class="icon-cog"></i> 首页设置</a></li>
        <?php if($thisUser[mpenable] == '1'): ?><li><a href="/138mb/manage/index.php"><i class="icon-dashboard"></i> 高级模板</a></li><?php endif; ?>
        <li><a href="<?php echo U('Tmpls/index',array('token'=>$token));?>"><i class="icon-dashboard"></i> 模版管理</a></li>
        <li><a href="<?php echo U('Classify/index',array('token'=>$token));?>"><i class="icon-cogs"></i> 分类管理</a></li>
        <li><a href="<?php echo U('Img/index',array('token'=>$token));?>"><i class="icon-book"></i> 图文回复</a></li>
        <li><a href="<?php echo U('Diymen/index',array('token'=>$token));?>"><i class="icon-comment"></i> 自定义菜单</a></li>
        <li><a href="<?php echo U('Forum/index',array('token'=>$token));?>"><i class="icon-edit"></i> 微论坛</a></li>
        <li><a href="<?php echo U('Flash/index',array('token'=>$token,'tip'=>1));?>"><i class="icon-camera-retro"></i> 首页幻灯片</a></li>
        <li><a href="<?php echo U('Flash/index',array('token'=>$token,'tip'=>2));?>"><i class="icon-camera-retro"></i> 轮播背景图</a></li>
        <li><a href="<?php echo U('Photo/index',array('token'=>$token));?>"><i class="icon-picture"></i> 相册</a></li>
        <li><a href="<?php echo U('Catemenu/index',array('token'=>$token));?>"><i class="icon-magic"></i> 底部导航</a></li>
        <li><a href="<?php echo U('Daohang/index',array('token'=>$token));?>"><i class="icon-pushpin"></i> 一键导航生成</a></li>
        <li><a href="<?php echo U('Yulan/index',array('token'=>$token));?>" target="_blank"><i class="icon-globe"></i> 在线预览</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-th"></i> <span>营销功能</span></a>
      <ul>
        <li><a href="<?php echo U('Lottery/index',array('token'=>$token));?>"><i class="icon-gift"></i> 大转盘</a></li>
        <li><a href="<?php echo U('Coupon/index',array('token'=>$token));?>"><i class="icon-money"></i> 优惠券</a></li>
        <li><a href="<?php echo U('Guajiang/index',array('token'=>$token));?>"><i class="icon-cogs"></i> 刮刮卡</a></li>
        <li><a href="<?php echo U('GoldenEgg/index',array('token'=>$token));?>"><i class="icon-trophy"></i> 砸金蛋</a></li>
        <li><a href="<?php echo U('LuckyFruit/index',array('token'=>$token));?>"><i class="icon-trophy"></i> 幸运水果机</a></li>
        <li><a href="<?php echo U('Wedding/index',array('token'=>$token));?>"><i class="icon-heart"></i> 微喜帖</a></li>
        <li><a href="<?php echo U('Diaoyan/index',array('token'=>$token));?>"><i class="icon-bullhorn"></i> 微调研</a></li>
        <li><a href="<?php echo U('Vote/index',array('token'=>$token));?>"><i class="icon-bar-chart"></i> 微投票</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon-sitemap"></i> <span>微商务</span></a>
      <ul>
        <li><a href="<?php echo U('Store/index',array('token'=>$token));?>"><i class="icon-shopping-cart"></i> 微商城</a></li>
        <li><a href="<?php echo U('Groupon/index',array('token'=>$token));?>"><i class="icon-money"></i> 微团购</a></li>
        <li><a href="<?php echo U('Host/index',array('token'=>$token));?>"><i class="icon-unlock"></i> 通用订单</a></li>
        <li><a href="<?php echo U('Selfform/index',array('token'=>$token));?>"><i class="icon-magnet"></i> 万能表单</a></li>
        <li><a href="<?php echo U('Adma/index',array('token'=>$token));?>"><i class="icon-pencil"></i> DIY宣传</a></li>
        <li><a href="<?php echo U('Panorama/index',array('token'=>$token));?>"><i class="icon-eye-open"></i> 360全景</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>微行业</span></a>
      <ul>
      <?php if($thisUser[cy] == '1'): ?><li><a href="<?php echo U('Dining/orders',array('token'=>$token,'dining'=>1));?>"><i class="icon-tint"></i> 微餐饮</a></li><?php endif; ?>
        <?php if($thisUser[yy] == '1'): ?><li><a href="<?php echo U('Reservation/index',array('token'=>$token));?>"><i class="icon-map-marker"></i> 微预约</a></li><?php endif; ?>
        <?php if($thisUser[fc] == '1'): ?><li><a href="<?php echo U('Estate/index',array('token'=>$token));?>"><i class="icon-star"></i> 微房产</a></li><?php endif; ?>
        <?php if($thisUser[jd] == '1'): ?><li><a href="<?php echo U('Hotels/index',array('token'=>$token));?>"><i class="icon-tag"></i> 微酒店</a></li><?php endif; ?>
        <?php if($thisUser[yl] == '1'): ?><li><a href="<?php echo U('Medical/index',array('token'=>$token));?>"><i class="icon-plus"></i> 微医疗</a></li><?php endif; ?>
        <?php if($thisUser[qc] == '1'): ?><li><a href="<?php echo U('Car/index',array('token'=>$token));?>"><i class="icon-truck"></i> 微汽车</a></li><?php endif; ?>
        <?php if($thisUser[dy] == '1'): ?><li><a href="<?php echo U('Dianying/index',array('token'=>$token));?>"><i class="icon-film"></i> 微电影</a></li><?php endif; ?>
        <?php if($thisUser[mr] == '1'): ?><li><a href="<?php echo U('Meirong/index',array('token'=>$token));?>"><i class="icon-cut"></i> 微美容</a></li><?php endif; ?>
        <?php if($thisUser[jb] == '1'): ?><li><a href="<?php echo U('Jiuba/index',array('token'=>$token));?>"><i class="icon-glass"></i> 微酒吧</a></li><?php endif; ?>
        <?php if($thisUser[jy] == '1'): ?><li><a href="<?php echo U('School/index',array('token'=>$token));?>"><i class="icon-book"></i> 微教育</a></li><?php endif; ?>
        <?php if($thisUser[hd] == '1'): ?><li><a href="<?php echo U('Huadian/index',array('token'=>$token));?>"><i class="icon-asterisk"></i> 微花店</a></li><?php endif; ?>
        <?php if($thisUser[zw] == '1'): ?><li><a href="<?php echo U('Zhengwu/index',array('token'=>$token));?>"><i class="icon-star"></i> 微政务</a></li><?php endif; ?>
        <?php if($thisUser[js] == '1'): ?><li><a href="<?php echo U('Jianshen/index',array('token'=>$token));?>"><i class="icon-magnet"></i> 微健身</a></li><?php endif; ?>
        <?php if($thisUser[ly] == '1'): ?><li><a href="<?php echo U('Lvyou/index',array('token'=>$token));?>"><i class="icon-plane"></i> 微旅游</a></li><?php endif; ?>
        <?php if($thisUser[sp] == '1'): ?><li><a href="<?php echo U('Shipin/index',array('token'=>$token));?>"><i class="icon-lemon"></i> 微食品</a></li><?php endif; ?>
        <?php if($thisUser[ktv] == '1'): ?><li><a href="<?php echo U('Ktv/index',array('token'=>$token));?>"><i class="icon-music"></i> 微KTV</a></li><?php endif; ?>
        <?php if($thisUser[hq] == '1'): ?><li><a href="<?php echo U('Hunqing/index',array('token'=>$token));?>"><i class="icon-heart"></i> 微婚庆</a></li><?php endif; ?>
        <?php if($thisUser[wy] == '1'): ?><li><a href="<?php echo U('Waimai/orders',array('token'=>$token,'dining'=>1));?>"><i class="icon-volume-up"></i> 微外卖</a></li><?php endif; ?>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon-credit-card"></i> <span>微会员</span></a>
      <ul>
        <li><a href="<?php echo U('Member_card/index',array('token'=>$token));?>"><i class="icon-tasks"></i> 会员卡</a></li>
        <li><a href="<?php echo U('Member_card/info',array('token'=>$token));?>"><i class="icon-legal"></i> 商家设置</a></li>
        <li><a href="<?php echo U('Member_card/replyInfoSet',array('token'=>$token));?>"><i class="icon-credit-card"></i> 回复配置</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon-group"></i> <span>微用户管理CRM</span></a>
      <ul>
        <li><a href="<?php echo U('ServiceUser/index',array('token'=>$token));?>"><i class="icon-tasks"></i> 人工客服</a></li>
        <li><a href="<?php echo U('Message/index',array('token'=>$token));?>"><i class="icon-envelope-alt"></i> 消息群发</a></li>
        <li><a href="<?php echo U('Share/index',array('token'=>$token));?>"><i class="icon-google-plus"></i> 分享管理</a></li>
        <li><a href="<?php echo U('Recognition/index',array('token'=>$token));?>"><i class="icon-legal"></i> 渠道二维码</a></li>
        <li><a href="<?php echo U('Wechat_behavior/statistics',array('token'=>$token));?>"><i class="icon-credit-card"></i> 粉丝行为分析</a></li>
        <li><a href="<?php echo U('Wechat_group/groups',array('token'=>$token));?>"><i class="icon-credit-card"></i> 分组管理</a></li>
        <li><a href="<?php echo U('Wechat_group/index',array('token'=>$token));?>"><i class="icon-credit-card"></i> 粉丝管理</a></li>
      </ul>
    </li>
    
    <li class="submenu"> <a href="#"><i class="icon icon-pencil"></i> <span>互动模块</span></a>
      <ul>
        <li><a href="<?php echo U('Taobao/index',array('token'=>$token));?>"><i class="icon-bullhorn"></i> 淘宝天猫</a></li>
        <li><a href="<?php echo U('Api/index',array('token'=>$token));?>"><i class="icon-resize-full"></i> 第三方</a></li>
        <li><a href="<?php echo U('Reply/index',array('token'=>$token));?>"><i class="icon-book"></i> 留言板</a></li>
        <li><a href="<?php echo U('Greeting_card/index',array('token'=>$token));?>"><i class="icon-envelope"></i> 微贺卡</a></li>
        <li><a href="<?php echo U('Shake/index',array('token'=>$token));?>"><i class="icon-bolt"></i> 摇一摇</a></li>
        <li><a href="<?php echo U('Wxq/index',array('token'=>$token));?>"><i class="icon-reorder"></i> 微信墙</a></li>
        <li><a href="<?php echo U('Wall/index',array('token'=>$token));?>"><i class="icon-reorder"></i> 微信墙高级版</a></li>
        <li><a href="<?php echo U('Kefu/index',array('token'=>$token));?>"><i class="icon-reorder"></i> 智能客服</a></li>
      </ul>
    </li>
    <?php if($thisUser[apenable] == '1'): ?><li class="submenu"> <a href="#"><i class="icon-rss"></i> <span>微路由</span></a>
      <ul>
        <li><a href="/index.php?g=User&amp;m=AP&amp;a=index&amp;tab=09"><i class="icon-comment"></i> 设备列表</a></li>
        <li><a href="/index.php?g=User&m=Policy&a=index&tab=09"><i class="icon-cogs"></i> 策略设置</a></li>
        <li><a href="/index.php?g=User&m=Terminal&a=index&tab=09"><i class=" icon-cloud"></i> 终端管理</a></li>
        <li><a href="#"><i class="icon-group"></i> 用户管理</a></li>
      </ul>
    </li><?php endif; ?>
    <li> <a href="<?php echo U('System/Admin/logout');?>"><i class="icon-off"></i> <span>退出</span></a></li>
    <li class="content"> <span><?php echo C('site_name');?>新功能开发进度</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 98%;" class="bar"></div>
      </div>
      <span class="percent">99%</span>
    </li>
    <li class="content"> <span>用户体验完善程度</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 98%;" class="bar"></div>
      </div>
      <span class="percent">98%</span>
    </li>
  </ul>
</div>

<div id="content">
<script type="text/javascript" charset="utf-8" src="./tpl/static/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./tpl/static/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="./tpl/static/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="<?php echo STATICS;?>/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo STATICS;?>/artDialog/plugins/iframeTools.js"></script>
<script src="<?php echo STATICS;?>/upyun.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
editor = K.create('#intro', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : SITEURL+'/index.php?g=User&m=Upyun&a=kindedtiropic',
items : [
'source','undo','clearhtml','hr',
'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
'insertunorderedlist', '|', 'emoticons', 'image','link', 'unlink','baidumap','lineheight','table','anchor','preview','print','template','code','cut']
});

});
</script>
<script>
function showChildCats(value){
	$("#catid").html('<option value="0">请选择...</option>');
	if(value==0){
		document.getElementById('catid').disabled=true;
	}else{
		$.ajax({
			url: $('#catUrl').attr("value")+'&parentid='+value,
			success: function( data ) {
				document.getElementById('catid').disabled=false;
				$("#catid").html($("#catid").html()+data);
			}
		});
	}
}
function toDecimal(x) {  
            var f = parseFloat(x);  
            if (isNaN(f)) {  
                return;  
            }  
            f = Math.round(x*10)/10;  
            return f;  
        }  
function calDiscount(){
	var price=$('#price').attr('value');
	var oprice=$('#oprice').attr('value');
	if(oprice!=0&&oprice!=''){
		var dis=oprice-price;
		var discount=10-toDecimal((dis/oprice)*10);
	}else{
		discount=10;
	}
	$('#discount').attr('value',discount);
}
</script>
<input type="hidden" id="catUrl" value="<?php echo U('Dining/ajaxCatOptions',array('token'=>$token));?>" />
<div class="content" style="width:95%; background:none; margin-left:25px; border:none; margin-bottom:30px; margin-top:10px;" >
﻿  <div class="cLineB">
    <div  class="quick-actions_homepage">
    <ul class="quick-actions">
    <?php if($thisUser[qc] == '1'): ?><li class="bg_ls"> <a href="<?php echo U('Car/index',array('token'=>$token));?>"> <i class="icon-truck"></i> 微汽车 </a> </li><?php endif; ?>
      <?php if($thisUser[cy] == '1'): ?><li class="bg_lb"> <a href="<?php echo U('Dining/orders',array('token'=>$token,'dining'=>1));?>"> <i class="icon-glass"></i> 微餐饮 </a> </li><?php endif; ?>
      <?php if($thisUser[wy] == '1'): ?><li class="bg_lb"> <a href="<?php echo U('Waimai/orders',array('token'=>$token,'dining'=>1));?>"> <i class="icon-volume-up"></i> 微外卖 </a> </li><?php endif; ?>
      <?php if($thisUser[fc] == '1'): ?><li class="bg_dy"> <a href="<?php echo U('Estate/index',array('token'=>$token));?>"> <i class="icon-star"></i> 微房产</a> </li><?php endif; ?>
      <?php if($thisUser[jd] == '1'): ?><li class="bg_lg"> <a href="<?php echo U('Hotels/index',array('token'=>$token));?>"> <i class="icon-tag"></i> 微酒店</a> </li><?php endif; ?>
      <?php if($thisUser[yl] == '1'): ?><li class="bg_ly"> <a href="<?php echo U('Medical/index',array('token'=>$token));?>"> <i class="icon-plus"></i> 微医疗 </a> </li><?php endif; ?>
      <?php if($thisUser[dy] == '1'): ?><li class="bg_lr"> <a href="<?php echo U('Dianying/index',array('token'=>$token));?>"> <i class="icon-film"></i> 微电影</a> </li><?php endif; ?>
      <?php if($thisUser[mr] == '1'): ?><li class="bg_ls"> <a href="<?php echo U('Meirong/index',array('token'=>$token));?>"> <i class="icon-cut"></i> 微美容</a> </li><?php endif; ?>
      <?php if($thisUser[jb] == '1'): ?><li class="bg_lr"> <a href="<?php echo U('Jiuba/index',array('token'=>$token));?>"> <i class="icon-glass"></i> 微酒吧</a> </li><?php endif; ?>
      <?php if($thisUser[jy] == '1'): ?><li class="bg_lv"> <a href="<?php echo U('School/index',array('token'=>$token));?>"> <i class="icon-book"></i> 微教育</a> </li><?php endif; ?>
      <?php if($thisUser[hd] == '1'): ?><li class="bg_ls"> <a href="<?php echo U('Huadian/index',array('token'=>$token));?>"> <i class="icon-asterisk"></i> 微花店</a> </li><?php endif; ?>
      <?php if($thisUser[zw] == '1'): ?><li class="bg_lr"> <a href="<?php echo U('Zhengwu/index',array('token'=>$token));?>"> <i class="icon-star"></i> 微政务</a> </li><?php endif; ?>
      <?php if($thisUser[js] == '1'): ?><li class="bg_lv"> <a href="<?php echo U('Jianshen/index',array('token'=>$token));?>"> <i class="icon-magnet"></i> 微健身</a> </li><?php endif; ?>
      <?php if($thisUser[ly] == '1'): ?><li class="bg_dy"> <a href="<?php echo U('Lvyou/index',array('token'=>$token));?>"> <i class="icon-plane"></i> 微旅游</a> </li><?php endif; ?>
      <?php if($thisUser[sp] == '1'): ?><li class="bg_lg"> <a href="<?php echo U('Shipin/index',array('token'=>$token));?>"> <i class="icon-lemon"></i> 微食品</a> </li><?php endif; ?>
      <?php if($thisUser[ktv] == '1'): ?><li class="bg_lg"> <a href="<?php echo U('Ktv/index',array('token'=>$token));?>"> <i class="icon-music"></i> 微KTV</a> </li><?php endif; ?>
      <?php if($thisUser[hq] == '1'): ?><li class="bg_lg"> <a href="<?php echo U('Hunqing/index',array('token'=>$token));?>"> <i class="icon-heart"></i> 微婚庆</a> </li><?php endif; ?>
      <?php if($thisUser[yy] == '1'): ?><li class="bg_lo"> <a href="<?php echo U('Reservation/index',array('token'=>$token));?>"> <i class="icon-map-marker"></i> 微预约 </a> </li><?php endif; ?>
      <li class="bg_db"> <a href="javascript:history.go(-1);"> <i class="icon-share-alt"></i> 返回</a> </li>
    </ul>
  </div>
    <h4>菜品设置</h4> 
    <a href="<?php echo U('Dining/index',array('token'=>$token,'dining'=>$isDining));?>" class="right  btn btn-info" style="margin-top:-27px">返回</a> 
   </div> 
   <form class="form" method="post" action="" enctype="multipart/form-data"> 
<?php if($isUpdate == 1): ?><input type="hidden" name="id" value="<?php echo ($set["id"]); ?>" /><?php endif; ?>
<input type="hidden" name="discount" id="discount" value="<?php echo ($set["discount"]); ?>" />
    <div class="msgWrap bgfc"> 
     <table class="userinfoArea" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%"> 
      <tbody> 
       <tr> 
        <th><span class="red">*</span>名称：</th> 
        <td><input type="text" name="name" value="<?php echo ($set["name"]); ?>" class="px" style="width:400px;" /></td> 
       </tr> 
       <tr> 
        <th><span class="red">*</span>类别：</th> 
        <td><select id="catid" name="catid"><option value="0">请选择分类...</option><?php echo ($catsOptions); ?></select></td> 
       </tr>
        <tr> 
        <th><span class="red">*</span>店铺：</th> 
        <td><select id="storeid" name="storeid" class="px">
        <?php if(is_array($Companys)): $i = 0; $__LIST__ = $Companys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($set['storeid'] == $v['id']): ?>selected<?php endif; ?>><?php echo ($v["shortname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select></td> 
       </tr>
        <tr> 
        <th><span class="red">*</span>价格：</th>
        <td><input type="text" id="price" onchange="calDiscount();" name="price" value="<?php echo ($set["price"]); ?>" class="px" style="width:100px;" /> 元</td> 
       </tr>
       <tr> 
        <th><span class="red">*</span>原价：</th> 
        <td><input type="text" id="oprice" onchange="calDiscount();" name="oprice" value="<?php echo ($set["oprice"]); ?>" class="px" style="width:100px;" /> 元</td> 
       </tr>
        <tr> 
        <th><span class="red">*</span>关键词：</th>
        <td><input type="text" name="keyword" value="<?php echo ($set["keyword"]); ?>" class="px" style="width:400px;" /></td> 
       </tr>
        <tr> 
        <th><span class="red">*</span>Logo地址：</th>
        <td><input type="text" name="logourl" value="<?php echo ($set["logourl"]); ?>" class="px" id="pic" style="width:400px;" /> <a href="###" onclick="upyunPicUpload('pic',700,700,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('pic')">预览</a></td> 
       </tr>
        <TR>
                  <TH valign="top"><label for="info">图文详细页内容：</label></TH>
				  <script id="editor" name="intro" type="text/plain" style="width:590px;height:360px;"><?php echo ($set["intro"]); ?></script>
                </TR>  
       <tr>         
       <th>&nbsp;</th>
       <td>
       <?php if($isDining != 1): ?><input type="hidden" value="0" name="dining" /><?php else: ?><input type="hidden" value="1" name="dining" /><?php endif; ?>
       <button type="submit" name="button" class="btn btn-success">保存</button> &nbsp; <a href="<?php echo U('Dining/index',array('token'=>$token));?>" class="btn btn-danger">取消</a></td> 
       </tr> 
      </tbody> 
     </table> 
     </div>
    
   </form> 
  </div> 
  <script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }

</script>
  <!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2014 &copy; <?php echo C('site_url');?> Admin </div>
</div>

<!--end-Footer-part-->

<script src="<?php echo RES;?>/138/js/excanvas.min.js"></script> 
<script src="<?php echo RES;?>/138/js/bootstrap.min.js"></script> 
<script src="<?php echo RES;?>/138/js/jquery.flot.min.js"></script> 
<script src="<?php echo RES;?>/138/js/jquery.peity.min.js"></script> 
<script src="<?php echo RES;?>/138/js/fullcalendar.min.js"></script> 
<script src="<?php echo RES;?>/138/js/matrix.js"></script> 
<script src="<?php echo RES;?>/138/js/matrix.dashboard.js"></script> 
<script src="<?php echo RES;?>/138/js/jquery.gritter.min.js"></script>  
</body>
</html>