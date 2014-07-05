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
<script src="./tpl/User/default/common/js/date/WdatePicker.js"></script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<script src="/tpl/static/upyun.js"></script>
<style>
.msgWrap .control-group {
margin-bottom: 20px;
}
.msgWrap .control-label {
text-align: left;
width: 140px;
font-weight: bold;
padding-top: 5px;
float: left;
display: block;
margin-bottom: 5px;
}
.msgWrap .controls {
margin-left: 160px;
}
.msgWrap .form-actions {
padding: 19px 20px 20px 160px;
margin-top: 20px;
}
.span4, .span1, .option, .valid, .input-large{
	background: url(../images/px.png) repeat-x scroll 0 0 #FFFFFF;
    border-color: #848484 #E0E0E0 #E0E0E0 #848484;
    border-style: solid;
    border-width: 1px;
	border-radius: 2px 2px 2px 2px;
	padding:5px;
	width: 210px;
}
</style>
<script>
function setlatlng(longitude,latitude){
	art.dialog.data('longitude', longitude);
	art.dialog.data('latitude', latitude);
	art.dialog.open('<?php echo U('Map/setLatLng');?>',{lock:false,title:'设置经纬度',width:600,height:400,yesText:'关闭',background: '#000',opacity: 0.87});
}
</script>
<div class="content" style="width:95%; background:none; margin-left:25px; border:none; margin-bottom:30px; margin-top:30px;" >
  <div class="cLineB">
    <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="<?php echo U('Lottery/index',array('token'=>$token));?>"> <i class="icon-gift"></i> 大转盘 </a> </li>
      <li class="bg_dy"> <a href="<?php echo U('Coupon/index',array('token'=>$token));?>"> <i class="icon-money"></i> 优惠券</a> </li>
      <li class="bg_lg"> <a href="<?php echo U('Guajiang/index',array('token'=>$token));?>"> <i class="icon-cogs"></i> 刮刮卡</a> </li>
      <li class="bg_lh"> <a href="<?php echo U('LuckyFruit/index',array('token'=>$token));?>"> <i class="icon-trophy"></i> 水果机 </a> </li>
      <li class="bg_ly"> <a href="<?php echo U('GoldenEgg/index',array('token'=>$token));?>"> <i class="icon-trophy"></i> 砸金蛋 </a> </li>
      <li class="bg_lo"> <a href="<?php echo U('Wedding/index',array('token'=>$token));?>"> <i class="icon-heart"></i> 微喜帖 </a> </li>
      <li class="bg_ls"> <a href="<?php echo U('Diaoyan/index',array('token'=>$token));?>"> <i class="icon-bullhorn"></i> 微调研</a> </li>
      <li class="bg_lr"> <a href="<?php echo U('Vote/index',array('token'=>$token));?>"> <i class="icon-bar-chart"></i> 微投票</a> </li>
      <li class="bg_db"> <a href="javascript:history.go(-1);"> <i class="icon-share-alt"></i> 返回</a> </li>
    </ul>
  </div>
  <h4>新建微喜帖</h4><a href="<?php echo U('Wedding/index');?>" class="right btn btn-info" style="margin-top:-27px">返回</a>
 </div> 
  <div class="msgWrap bgfc">
  <form action="" method="post" class="form-horizontal form-validate" novalidate="novalidate">
	<div class="control-group">
		<label for="title" class="control-label">喜帖标题：</label>
		<div class="controls">
			<input type="text" name="title" id="title" maxlength="10" class="span4" value="<?php echo ($wedding["title"]); ?>" data-rule-required="true"><span class="maroon">*</span><span class="help-inline">喜帖标题限制在十个字以内</span>
		</div>
	</div>
	<div class="control-group">
		<label for="keyword" class="control-label">触发关键词：</label>
		<div class="controls">
			<input type="text" name="keyword" id="keyword" class="span4" data-rule-required="true" value="<?php echo ($wedding["keyword"]); ?>"><span class="maroon">*</span><span class="help-inline">只能设置一个关键字</span>
		</div>
	</div>
	<div class="control-group">
		<label for="coverurl" class="control-label">喜帖封面：</label>
		<div class="controls">
			<img class="thumb_img" id="suicai1_src" src="<?php if($wedding['coverurl'] != false): echo ($wedding["coverurl"]); else: ?>http://bcs.duapp.com/baeimgs/Tnh1ROgm93.png<?php endif; ?>" style="max-height: 100px;">
			<input id="suicai1" type="text" name="coverurl" class="px hide" onchange="changpic(this,1)" value="<?php if($wedding['coverurl'] != false): echo ($wedding["coverurl"]); else: ?>http://bcs.duapp.com/baeimgs/Tnh1ROgm93.png<?php endif; ?>">
			<span class="help-inline">
				<a href="javascript:void(0)" onclick="upyunPicUpload('suicai1',700,420,'<?php echo ($token); ?>')" class="btnGrayS vm">上传</a>
				<a href="###" onclick="viewImg('suicai1')" class="btnGrayS vm">预览</a>
			</span>
			<span class="help-inline"><span class="maroon">*</span>封面默认大小720*400</span>
		</div>
	</div>
	<div class="control-group">
		<label for="openpic" class="control-label">开场动画：</label>
		<div class="controls">
			<img class="thumb_img" id="suicaipic2_src" src="<?php if($wedding['openpic'] != false): echo ($wedding["openpic"]); else: ?>http://bcs.duapp.com/baeimgs/jNuxaj1cAj.jpg<?php endif; ?>" style="width: 180px; height: 180px;">
			<input id="suicaipic2" type="text" name="openpic" class="px hide" onchange="changpic(this,2)" value="<?php if($wedding['openpic'] != false): echo ($wedding["openpic"]); else: ?>http://bcs.duapp.com/baeimgs/jNuxaj1cAj.jpg<?php endif; ?>">
			<span class="help-inline">
						<a href="javascript:void(0)" onclick="upyunPicUpload('suicaipic2',700,420,'<?php echo ($token); ?>')" class="btnGrayS vm">上传</a>
				<a href="###" onclick="viewImg('suicaipic2')" class="btnGrayS vm">预览</a>
			</span>
			<span class="help-inline"> 上传400*400左右的新郎新娘合影图,用于喜帖打开时的动画中,图片大小不超过300K </span>
			<span class="red">不想要开场动画图片地址留空即可!</span>
		</div>
	</div>
	<div class="control-group">
		<label for="picurl" class="control-label">缩略图：</label>
		<div class="controls">
			<img class="thumb_img" id="suicai3_src" src="<?php if($wedding['openpic'] != false): echo ($wedding["openpic"]); else: ?>http://bcs.duapp.com/baeimgs/2cDQtFbl75.jpg<?php endif; ?>" style="width: 40px; height: 40px;">
			<input id="suicai3" type="text" name="picurl" class="px hide" onchange="changpic(this,3)" value="<?php if($wedding['openpic'] != false): echo ($wedding["openpic"]); else: ?>http://bcs.duapp.com/baeimgs/2cDQtFbl75.jpg<?php endif; ?>">
			<span class="help-inline">
				<a href="javascript:void(0)" onclick="upyunPicUpload('suicai3',700,420,'<?php echo ($token); ?>')" class="btnGrayS vm">上传</a>
				<a href="###" onclick="viewImg('suicai3')" class="btnGrayS vm">预览</a>
			</span><span class="help-inline"><span class="maroon">*</span>默认40x40,显示在喜帖主页</span>
		</div>
	</div>
		<div class="control-group">
		<label for="picurl" class="control-label">相册选择：</label>
		<div class="controls">
			<select name="pid">
				<option value="">请选择相册名称</option>
				<?php if(is_array($photo)): $i = 0; $__LIST__ = $photo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($photo["id"]); ?>" <?php if($photo['id'] == $wedding['pid']): ?>selected="selected"<?php endif; ?>><?php echo ($photo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<span class="help-inline">
			</span>
			<span class="help-inline">
				<span class="maroon">*</span>
				<a target="ddd" class="btnGrayS vm" href="<?php echo U('Photo/add');?>">创建相册</a>  如果没有请创建
			</span>
		</div>
	</div>
	<div class="control-group">
		<label for="address" class="control-label">新郎名字：</label>
		<div class="controls">
			<input type="text" name="man" id="man" class="span4" value="<?php echo ($wedding["man"]); ?>" data-rule-required="true">
			<span class="maroon">*</span>
		</div>
	</div>
	<div class="control-group">
		<label for="woman" class="control-label">新娘名字：</label>
		<div class="controls">
			<input type="text" name="woman" id="woman" class="span4" value="<?php echo ($wedding["woman"]); ?>" data-rule-required="true">
			<span class="maroon">*</span>
		</div> 
	</div>
	<div class="control-group">
		<label for="typename" class="control-label"></label>
		<div class="controls">
			<label class="radio inline">
				<input type="radio" name="who_first" checked="checked" value="1"><span class="help-inline">新郎名字在前</span>
			</label>
			<label class="radio inline">
				<input type="radio" name="who_first" value="2"><span class="help-inline">新娘名字在前</span>
			</label>
		</div>
	</div>
	<div class="control-group">
		<label for="tel" class="control-label">联系电话：</label>
		<div class="controls">
			<input type="text" name="phone" id="phone" class="span4" value="<?php echo ($wedding["phone"]); ?>" data-rule-required="true" data-rule-phone="true"><span class="maroon">*</span><span class="help-inline">如0551-63474223 </span>
		</div>
	</div>
	<div class="control-group">
		<label for="time" class="control-label">婚宴日期：</label>
		<div class="controls"> 
			<div class="input-prepend">
				<span class="add-on">
					<i class="icon-calendar"></i>
				</span>
				<input type="input" class="px" onClick="WdatePicker()"  value="<?php if($wedding['time'] != false): echo (date('Y-m-d',$wedding["time"])); endif; ?>" name="time"> <span class="maroon">*</span> 
			</div>
		</div>
	</div>
	<div class="control-group">
		<label for="place" class="control-label">宴席地址：</label>
		<div class="controls"> 
			<div class="input-prepend">
				<input type="text" name="place" class="span4" value="<?php echo ($wedding["place"]); ?>" onchange="loadmap()" id="suggestId" data-rule-required="true"/> <span class="maroon">*</span> 
			</div>
		</div>
	</div>
	<div class="control-group">
		 <label class="control-label" for="suggestId">经纬地址</label>
		 <div class="controls">
			<div id="r-result">
				 <input type="input" class="px" id="longitude" value="<?php echo ($wedding["lng"]); ?>"  name="lng" style="width:80px;">
				 <input type="input" class="px" id="latitude" value="<?php echo ($wedding["lat"]); ?>"  name="lat" style="width:80px;">  <a href="###" onclick="setlatlng($('#longitude').val(),$('#latitude').val())">在地图中查看/设置</a>
				 <input  type="hidden"  name="city" class="px" id="city" size="20" value="" /> 
			 </div>
			 <div id="searchResultPanel"></div>
		 </div>
    </div>
	<div class="control-group">
		<label for="video" class="control-label">喜帖视频：</label>
		<div class="controls"> 
			 <input type="text" name="video" id="video" class="span4" style="width:480px" value="<?php echo ($wedding["video"]); ?>"><p>支持优酷视频地址如;http://v.youku.com/v_show/id_XNjI4ODk5NDQ4.html <br> 腾讯fash视频地址：如http://static.video.qq.com/TPout.swf?vid=v0119s27wd5&amp;auto=0 <br> 也支持mp4和ogg 格式地址 http://www.w3school.com.cn/example/html5/mov_bbb.mp4 </p>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="mp3url">背景音乐</label>
		<div class="controls">
			<input class="px" name="mp3url" value="<?php echo ($wedding["mp3url"]); ?>" id="suicai4" style="width:300px" onchange="document.getElementById('plmp3').src=this.value"> <a href="###" onclick="chooseFile('suicai4','music')" class="a_upload">选择</a><br />
		
			<audio  id="plmp3" src="" preload="none"></audio>
		</div>
	</div>
	<div class="control-group">
		<label for="tel" class="control-label">密码：</label>
		<div class="controls">
			<input type="text" name="passowrd" id="passowrd" class="span4" value="<?php echo ($wedding["passowrd"]); ?>" data-rule-required="true"><span class="maroon">*</span><span class="help-inline">设置微信上查看来宾名单的验证密码</span>
		</div>
	</div>
	<div class="control-group">
		<label for="tel" class="control-label">想要给朋友说的话：</label>
		<div class="controls">
			<textarea rows="5" name="word" id="word" class="px" data-rule-required="true" data-rule-maxlength="200" style=" width:450px; height:60px"><?php if($wedding['word'] != false): echo ($wedding["word"]); else: ?>亲爱的朋友，我要结婚了，希望能在我的婚礼上得到你的祝福，并祝愿你也幸福.<?php endif; ?></textarea>
			<span class="maroon">*</span><span class="help-inline">喜帖文字限制在200字以内</span>
		</div>
	</div>
	<div class="control-group">
		<label for="qr_code" class="control-label">二维码图片地址：</label>
		<div class="controls">
			<input id="suicai6" type="text" name="qr_code" class="span4" value="<?php echo ($wedding["qr_code"]); ?>">
			<span class="help-inline">
				<a href="javascript:void(0)" onclick="upyunPicUpload('suicai6',700,420,'<?php echo ($token); ?>')" class="btnGrayS vm">上传</a>
				<a href="###" onclick="viewImg('suicai6')" class="btnGrayS vm">预览</a>
			</span>
			<span class="help-inline">
			<span class="maroon">*</span>默认100x100,显示在喜帖底部</span>
		</div>
	</div>
	<div class="control-group">
		<label for="copr" class="control-label">底部版权：</label>
		<div class="controls">
		<textarea name="copyrite" id="copyrite" class="px" rows="5" style="width:450px; height:60px"><?php echo ($wedding["copyrite"]); ?></textarea>
		</div>
	</div>
   <div class="form-actions">
			<button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-success">保存</button>　<button type="button" class="btn btn-danger">取消</button>
		</div>
</form>
  </div> 
 
  
        </div>
		
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