<?php if (!defined('THINK_PATH')) exit();?>﻿
﻿<!DOCTYPE html>
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

<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.css" />
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script>
			KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager : true
				});
				K('#image1').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#cover').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#cover').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				K('#image2').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('banner').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#banner').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				K('#image3').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('house_banner').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#house_banner').val(url);
								editor.hideDialog();
							}
						});
					});
				});
				K('#insertfile').click(function() {
					editor.loadPlugin('insertfile', function() {
						editor.plugin.fileDialog({
							fileUrl : K('#url4').val(),
							clickFn : function(url, title) {
								K('#url4').val(url);
								editor.hideDialog();
							}
						});
					});
				});
			});
		</script>
 <script src="/tpl/static/upyun.js"></script>
 <script>

var editor;
KindEditor.ready(function(K) {
editor = K.create('#estate_desc', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '/index.php?g=User&m=Upyun&a=kindedtiropic',
items : [
'source','undo','plainpaste','wordpaste','clearhtml','quickformat','selectall','fullscreen','fontname', 'fontsize','subscript','superscript','indent','outdent','|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','hr']
});
editor = K.create('#project_brief', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '/index.php?g=User&m=Upyun&a=kindedtiropic',
items : [
'source','undo','plainpaste','wordpaste','clearhtml','quickformat','selectall','fullscreen','fontname', 'fontsize','subscript','superscript','indent','outdent','|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','hr']
});
editor = K.create('#traffic_desc', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '/index.php?g=User&m=Upyun&a=kindedtiropic',
items : [
'source','undo','plainpaste','wordpaste','clearhtml','quickformat','selectall','fullscreen','fontname', 'fontsize','subscript','superscript','indent','outdent','|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','hr']
});
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/default_user_com.css" media="all">
<div class="content" style="width:95%; background:none; margin-left:25px; border:none; margin-bottom:30px; margin-top:-20px;" >
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
<link rel="stylesheet" type="text/css" href="./tpl/User/default/common/css/cymain.css" />
  
<div class="tab">
<ul>
<li class="<?php if(ACTION_NAME == 'index'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Huadian/index',array('token'=>$token));?>">经营主体介绍</a></li>
<li class="<?php if(ACTION_NAME == 'son' ): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Huadian/son',array('token'=>$token));?>">鲜花门店</a></li>
<li class="<?php if(ACTION_NAME == 'housetype' ): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Huadian/housetype',array('token'=>$token));?>">特色鲜花</a></li>
<li class="<?php if(ACTION_NAME == 'album' or ACTION_NAME == 'album_add'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Huadian/album',array('token'=>$token));?>">花店相册</a></li>
<li class="<?php if(ACTION_NAME == 'expert'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Huadian/expert',array('token'=>$token));?>">客人印象</a></li>
<li class="<?php if(ACTION_NAME == 'huadianindex'): ?>current<?php endif; ?> tabli" id="tab6"><a href="<?php echo U('Reservation/huadianindex',array('token'=>$token));?>">预约管理</a></li>
</ul>
</div>

 </div> 
  <div class="msgWrap">
  <form action="" method="post" class="form-horizontal form-validate" novalidate="novalidate">
  <input type="hidden" name="token" value="<?php echo ($token); ?>" />
  <input type="hidden" name="thetype" value="Huadian">
<?php if($es_data['id'] != ''): ?><input type="hidden" name="id" value="<?php echo ($es_data['id']); ?>" /><?php endif; ?>
	<div class="control-group">
		<label for="title" class="control-label">图文消息标题：</label>
		<div class="controls">
			<input type="text" name="title" id="title" maxlength="10" class="span4" value="<?php echo ($es_data['title']); ?>" data-rule-required="true"><span class="maroon">*</span><span class="help-inline">触发关键词后返回图文消息标题</span>
		</div>
	</div>
	<div class="control-group">
		<label for="keyword" class="control-label">触发关键词：</label>
		<div class="controls">
			<input type="text" name="keyword" id="keyword" class="span4" data-rule-required="true" value="<?php echo ($es_data['keyword']); ?>"><span class="maroon">*</span><span class="help-inline">只能设置一个关键字</span>
		</div>
	</div>

	<div class="control-group">
		<label for="coverurl" class="control-label">图文消息封面：</label>
		<div class="controls">
      <img class="thumb_img" id="cover_src" src="<?php echo (($es_data['cover'])?($es_data['cover']):'./tpl/static/sucai/Huadian/1.jpg'); ?>" style="max-height:100px;">
     <input type="text" name="cover" value="<?php echo (($es_data['cover'])?($es_data['cover']):'./tpl/static/sucai/Huadian/1.jpg'); ?>" id="cover" class="px" style="width:150px;" ><script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('cover',700,420,'<?php echo ($token); ?>')" class="ChooseImage">上传</a> 
	  <a href="###" onclick="viewImg('cover')" class="ChooseImage">预览</a>
              <span class="help-inline">建议尺寸：宽720像素，高400像素</span>
          </span>
       </div>
	</div>
	<div class="control-group">
         <label class="control-label">经营主体头部图片：</label>
                                    <div class="controls">
                                        <img class="thumb_img" id="banner_src" src="<?php echo (($es_data['banner'])?($es_data['banner']):'./tpl/static/sucai/Huadian/2.png'); ?>" style="max-height:100px;"> 
                                        
                                            <input type="text" id="banner" name="banner" class="px" value="<?php echo (($es_data['banner'])?($es_data['banner']):'./tpl/static/sucai/Huadian/2.png'); ?>"><script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('banner',700,420,'<?php echo ($token); ?>')" class="ChooseImage">上传</a>
                  		 <a href="###" onclick="viewImg('banner')" class="ChooseImage">预览</a>                           
                                            <span class="help-inline">建议尺寸：宽720像素，高350像素</span>
                                        </span>
                                    </div>
                                </div>
	<div class="control-group">
		<div class="control-group">
                                    <label class="control-label">鲜花门店头部图片：</label>
                                    <div class="controls">
                                        <img class="thumb_img" id="house_banner_src" src="<?php echo (($es_data['house_banner'])?($es_data['house_banner']):'./tpl/static/sucai/Huadian/4.png'); ?>" style="max-height:100px;">
                                        <input type="text" name="house_banner" id="house_banner" class="px" value="<?php echo (($es_data['house_banner'])?($es_data['house_banner']):'./tpl/static/sucai/Huadian/4.png'); ?>"><script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('house_banner',700,420,'<?php echo ($token); ?>')" class="ChooseImage">上传</a>
                                             <a href="###" onclick="viewImg('house_banner')" class="ChooseImage">预览</a>
                                            <span class="help-inline">建议尺寸：宽720像素，高350像素</span>
                                        </span>
                                    </div>
                                </div>
	</div>

	<div class="control-group">
                                    <label for="album_title" class="control-label">全景相册名称：</label>
                                    <div class="controls">
                                    <select id="panorama_id" name="panorama_id" class="input-medium" data-rule-required="true"> 
                                          <option value="0">请选择360全景相册</option> 
                                            <?php if(is_array($panorama)): $i = 0; $__LIST__ = $panorama;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['pid']); ?>" <?php if($vo['pid'] == $es_data['panorama_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <span class="maroon">*</span>
                                        <span class="help-inline">如果没有，请先到 <a href="<?php echo U('Panorama/add',array('token'=>$token));?>" class="btn"><strong><font color='red'>360°全景</strong></font></a>添加</span>

                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">服务理念信息：</label>
                                    <div class="controls">
                                     <select id="classify_id" name="classify_id" class="input-medium" data-rule-required="true"> 
                                          <option value="0">请选择公开政务信息</option> 
                                            <?php if(is_array($classify)): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cid']); ?>" <?php if($vo['cid'] == $es_data['classify_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <span class="maroon">*</span>
                                        <span class="help-inline">如果没有，请先到<a href="<?php echo U('Classify/add',array('token'=>$token));?>" class="btn"> <strong><font color='red'>文章分类管理</strong></font></a>添加</span> <span class="maroon">注意：只能添加［图文回复］的［新增图文自定义回复］！</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">预约服务：</label>
                                    <div class="controls">
                                     <select id="res_id" name="res_id" class="input-medium" data-rule-required="true"> 
                                          <option value="0">请选择预约服务版面</option> 
                                            <?php if(is_array($reslist)): $i = 0; $__LIST__ = $reslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['rid']); ?>" <?php if($vo['rid'] == $es_data['res_id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <span class="maroon">*</span>
                                        <span class="help-inline">如果没有，请先到<a href="<?php echo U('Reservation/index',array('token'=>$token));?>" class="btn"><strong><font color='red'>预约管理</strong></font></a>添加</span>
                                    </div>
                                </div>
<div class="control-group">
		<label for="place" class="control-label">经营主体地址：</label>
		<div class="controls"> 
			<div class="input-prepend">
				 <input type="text" id="suggestId" class="span4 px"  name="place" value="<?php echo ($es_data['place']); ?>" class="input-xlarge" data-rule-required="true" onchange="loadmap()" value=""/> <span class="maroon">*</span> 
			</div>
		</div>
	</div>
	<div class="control-group">
		<label for="place" class="control-label">联系电话：</label>
		<div class="controls"> 
			<div class="input-prepend">
				 <input type="text" id="suggestId" class="span4 px"  name="tel" value="<?php echo ($es_data['tel']); ?>" class="input-xlarge" data-rule-required="true"> <span class="maroon">*</span> 
			</div>
		</div>
	</div>
    <div class="control-group">
    <label for="suggestId" class="control-label">地图标识：</label>
         <div class="controls">
          <span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注！</span>
           <div id="l-map"  style="width:605px; height:320px;"></div>
            <div id="r-result">
                 <input type="input" class="px" id="lng" value="<?php echo ($es_data['lng']); ?>"  name="lng" style="width:80px;">
                 <input type="input" class="px" id="lat" value="<?php echo ($es_data['lat']); ?>"  name="lat" style="width:80px;">
                 <input  type="hidden"  name="city" class="px" id="city" size="20" value="" /> 
             </div>
             <div id="searchResultPanel" style="border:1px solid #C0C0C0;width:350px;height:auto;"></div>
         </div>
    </div>
<div class="control-group">
         <label for="estate_desc" class="control-label">服务理念简介：</label>
         <div class="controls">
             <textarea class="px" id="estate_desc" name="estate_desc" style="width: 605px; height: 150px;"><?php echo ($es_data['estate_desc']); ?></textarea>
                                        
         </div>
     </div>
     <div class="control-group">
         <label for="project_brief" class="control-label">经营主体简介：</label>
         <div class="controls">
             <textarea class="px" id="project_brief" name="project_brief" style="width: 605px; height: 150px; "><?php echo ($es_data['project_brief']); ?></textarea>
         </div>
     </div>
     <div class="control-group">
        <label for="traffic_desc" class="control-label">服务配套：</label>
        <div class="controls">
            <textarea class="px" id="traffic_desc" name="traffic_desc" style="width: 605px; height: 150px; "><?php echo ($es_data['traffic_desc']); ?></textarea>
        </div>
    </div>
 <?php if($es_data['id'] != ''): ?><input type="hidden" name="id" value="<?php echo ($es_data['id']); ?>" /><?php endif; ?>
   <div class="form-actions">
			<button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-success">保存</button>　<button type="button" class="btn btn-danger">取消</button>
		</div>
</form>
  </div> 
 
  
        </div>
<script src="http://api.map.baidu.com/api?key=040c55027f5509316877ae67f1ccfd9b&amp;v=1.1&amp;services=true" type="text/javascript"></script>
<script type="text/javascript" src="http://api.map.baidu.com/getscript?v=1.1&amp;ak=&amp;services=true&amp;t=20130716024057"></script>
<link rel="stylesheet" type="text/css" href="http://api.map.baidu.com/res/11/bmap.css">
<script type="text/javascript">
var map = new BMap.Map("l-map");
var myGeo = new BMap.Geocoder();  
//map.addControl(new BMap.MapTypeControl({mapTypes: [BMAP_NORMAL_MAP,BMAP_HYBRID_MAP]}));     //2D图，卫星图

//map.addControl(new BMap.MapTypeControl({anchor: BMAP_ANCHOR_TOP_LEFT}));    //左上角，默认地图控件

//alert(city);
var currentPoint ;
var marker1;
var marker2;
map.enableScrollWheelZoom(); 
//var point = new BMap.Point(116.331398,39.897445);  

map.enableDragging();   
map.enableContinuousZoom();
map.addControl(new BMap.NavigationControl());  
map.addControl(new BMap.ScaleControl());  
map.addControl(new BMap.OverviewMapControl());
var point = new BMap.Point(<?php if($es_data['lng']!="") echo $es_data['lng'];else echo "120.265912" ?>,<?php if($es_data['lat']!="") echo $es_data['lat'];else echo "30.316553" ?>);
doit(point);
window.setTimeout(function(){
auto();
},100);

 function auto(){
 var geolocation = new BMap.Geolocation();  
geolocation.getCurrentPosition(function(r){  
if(this.getStatus() == BMAP_STATUS_SUCCESS){  
//var mk = new BMap.Marker(r.point);  
//map.addOverlay(mk);  
 // point = r.point;  
//map.panTo(r.point); 

var point = new BMap.Point(r.point.lng,r.point.lat);  
marker1 = new BMap.Marker(point);        // 创建标注
map.addOverlay(marker1);
var opts = {
width : 220,     // 信息窗口宽度 220-730
height: 60,     // 信息窗口高度 60-650
title : ""  // 信息窗口标题
}
var infoWindow = new BMap.InfoWindow("定位成功这是你当前的位置!,移动红点标注目标位置，你也可以直接修改上方位置,系统自动定位!", opts);  // 创建信息窗口对象
marker1.openInfoWindow(infoWindow);      // 打开信息窗口
doit(point);

}else {  
 
}  
})
 }
function  doit(point){

//map.centerAndZoom(point,12);  
 

//myGeo.getPoint(city, function(point){ 
if (point) {
//window.external.setlngandlat(point.lng,point.lat);
//alert(point.lng + "  ddd " + point.lat);

 document.getElementById('lat').value = point.lat;
 document.getElementById('lng').value =point.lng;

 
map.setCenter(point);
map.centerAndZoom(point, 15);
map.panTo(point);

var cp = map.getCenter();		
myGeo.getLocation(point, function(result){  
/*if (result){
 document.getElementById('suggestId').value = result.address;
}	*/		
});	






marker2 = new BMap.Marker(point);        // 创建标注  
var opts = {
width : 220,     // 信息窗口宽度 220-730
height: 60,     // 信息窗口高度 60-650
title : ""  // 信息窗口标题
}
var infoWindow = new BMap.InfoWindow("拖拽地图或红点，在地图上用红点标注您的店铺位置。", opts);  // 创建信息窗口对象
marker2.openInfoWindow(infoWindow);      // 打开信息窗口

map.addOverlay(marker2);                     // 将标注添加到地图中

marker2.enableDragging();
marker2.addEventListener("dragend", function(e){
 document.getElementById('lat').value =e.point.lat;
   document.getElementById('lng').value =e.point.lng;
myGeo.getLocation(new BMap.Point(e.point.lng,e.point.lat), function(result){  
if (result){
//$('suggestId').value = result.address;
//$('city').value = result.city;
//			alert(result.address)				
//	window.external.setaddress(result.address);//setarrea(result.address);//
//marker1.setPoint(new BMap.Point(e.point.lng,e.point.lat));        // 移动标注
marker2.setPoint(new BMap.Point(e.point.lng,e.point.lat));     
map.panTo(new BMap.Point(e.point.lng,e.point.lat));
//window.external.setlngandlat(e.point.lng,e.point.lat);
}			
});	
});	

map.addEventListener("dragend", function showInfo(){
var cp = map.getCenter();		
myGeo.getLocation(new BMap.Point(cp.lng,cp.lat), function(result){  
if (result){
 //document.getElementById('suggestId').value = result.address;
 document.getElementById('lat').value =cp.lat;
   document.getElementById('lng').value =cp.lng;
//	window.external.setaddress(result.address);//setarrea(result.address);//
//alert(point.lng + "  ddd " + point.lat);
//marker1.setPoint(new BMap.Point(cp.lng,cp.lat));        // 移动标注
marker2.setPoint(new BMap.Point(cp.lng,cp.lat));     
map.panTo(new BMap.Point(cp.lng,cp.lat));
//window.external.setlngandlat(cp.lng,cp.lat);
}			
});	
});	

map.addEventListener("dragging", function showInfo(){
var cp = map.getCenter();
//marker1.setPoint(new BMap.Point(cp.lng,cp.lat));        // 移动标注
marker2.setPoint(new BMap.Point(cp.lng,cp.lat)); 
map.panTo(new BMap.Point(cp.lng,cp.lat));
map.centerAndZoom(marker2.getPoint(), map.getZoom());
});	


}


//}, province);


}


function loadmap() {
var province =  document.getElementById('city').value;
var city =   document.getElementById('suggestId').value ;
// 将结果显示在地图上，并调整地图视野  
myGeo.getPoint(city, function(point){  
if (point) {
//marker1.setPoint(new BMap.Point(point.lng,point.lat));        // 移动标注
marker2.setPoint(new BMap.Point(point.lng,point.lat));  
//window.external.setlngandlat(marker2.getPoint().lng,marker2.getPoint().lat);
//alert(point.lng + "  ddd " + point.lat);
 document.getElementById('lat').value =point.lat;
   document.getElementById('lng').value =point.lng;
map.panTo(new BMap.Point(marker2.getPoint().lng,marker2.getPoint().lat));
map.centerAndZoom(marker2.getPoint(), map.getZoom());
}}, province);
} 

function setarrea(address,city) {
//$('suggestId').value = address;
//$('city').value=city;
window.setTimeout(function(){
loadmap();
},2000);
}

function initarreawithpoint(lng,lat){
window.setTimeout(function(){
//marker1.setPoint(new BMap.Point(lng,lat));        // 移动标注
marker2.setPoint(new BMap.Point(lng,lat));  
//window.external.setlngandlat(lng,lat);
map.panTo(new BMap.Point(lng,lat));
map.centerAndZoom(marker2.getPoint(), map.getZoom());
}, 2000);	
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