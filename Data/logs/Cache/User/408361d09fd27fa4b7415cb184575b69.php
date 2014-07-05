<?php if (!defined('THINK_PATH')) exit();?> ﻿<!DOCTYPE html>
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
 <link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.css" />
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<style type="text/css">
	.pic_img{width:145px;height:145px;}
	.px{width:135px;}
</style>
<script>
	KindEditor.ready(function(K){
		var editor = K.editor({
			allowFileManager:true
		});
		K('#upload_small_pic').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					fileUrl : K('#small_pic').val(),
					clickFn : function(url, title) {
						if(url.indexOf("http") > -1){
							K('#small_pic').val(url);
							$("#frontpic_src").attr('src',url);
						}else{
							K('#small_pic').val("<?php echo C('site_url');?>"+url);
							$("#frontpic_src").attr('src',"<?php echo C('site_url');?>"+url);
						}
						editor.hideDialog();
					}
				});
			});
		});
		K('#upload_site_map_1').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					fileUrl : K('#site_map_1').val(),
					clickFn : function(url, title) {
						if(url.indexOf("http") > -1){
							K('#site_map_1').val(url);
              $("#rightpic_src").attr('src',url);
						}else{
							K('#site_map_1').val("<?php echo C('site_url');?>"+url);
							$("#rightpic_src").attr('src',"<?php echo C('site_url');?>"+url);
						}
						editor.hideDialog();
					}
				});
			});
		});
		K('#upload_site_map_2').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					fileUrl : K('#site_map_2').val(),
					clickFn : function(url, title) {
						if(url.indexOf("http") > -1){
							K('#site_map_2').val(url);
              $("#backpic_src").attr('src',url);
						}else{
							K('#site_map_2').val("<?php echo C('site_url');?>"+url);
							$("#backpic_src").attr('src',"<?php echo C('site_url');?>"+url);
						}  
						editor.hideDialog();
					}
				});
			});
		});
		K('#upload_site_map_3').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					fileUrl : K('#site_map_3').val(),
					clickFn : function(url, title) {
						if(url.indexOf("http") > -1){
							K('#site_map_3').val(url);
              $("#leftpic_src").attr('src',url);
						}else{
							K('#site_map_3').val("<?php echo C('site_url');?>"+url);
							$("#leftpic_src").attr('src',"<?php echo C('site_url');?>"+url);
						}  
						editor.hideDialog();
					}
				});
			});
		});
		K('#upload_site_map_4').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					fileUrl : K('#site_map_4').val(),
					clickFn : function(url, title) {
						if(url.indexOf("http") > -1){
							K('#site_map_4').val(url);
              $("#toppic_src").attr('src',url);
						}else{
							K('#site_map_4').val("<?php echo C('site_url');?>"+url);
							$("#toppic_src").attr('src',"<?php echo C('site_url');?>"+url);
						}  
						editor.hideDialog();
					}
				});
			});
		});
		K('#upload_site_map_5').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					fileUrl : K('#site_map_5').val(),
					clickFn : function(url, title) {
						if(url.indexOf("http") > -1){
							K('#site_map_5').val(url);
              $("#bottompic_src").attr('src',url);
						}else{
							K('#site_map_5').val("<?php echo C('site_url');?>"+url);
							$("#bottompic_src").attr('src',"<?php echo C('site_url');?>"+url);
						}
						editor.hideDialog();
					}
				});
			});
		});
	});
</script>

<script>

var editor;
KindEditor.ready(function(K) {
editor = K.create('#intro', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '/index.php?g=User&m=Upyun&a=kindedtiropic',
items : [
'source','undo','clearhtml','hr',
'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
'insertunorderedlist', '|', 'emoticons', 'image','link', 'unlink','baidumap','lineheight','table','anchor','preview','print','template','code','cut']
});

});
</script>
<script>
function selectall(name) {
	var checkItems=$('.cbitem');
	if ($("#check_box").attr('checked')==false) {
		$.each(checkItems, function(i,val){
			val.checked=false;
		});
		
	} else {
		$.each(checkItems, function(i,val){
			val.checked=true;
		});
	}
}
function setlatlng(longitude,latitude){
	art.dialog.data('longitude', longitude);
	art.dialog.data('latitude', latitude);
	// 此时 iframeA.html 页面可以使用 art.dialog.data('test') 获取到数据，如：
	// document.getElementById('aInput').value = art.dialog.data('test');
	art.dialog.open('<?php echo U('Map/setLatLng',array('token'=>$token,'id'=>$id));?>',{lock:false,title:'设置经纬度',width:600,height:400,yesText:'关闭',background: '#000',opacity: 0.87});
}
</script>
<input type="hidden" id="catUrl" value="<?php echo U('Product/ajaxCatOptions',array('token'=>$token));?>" />
<div class="content" style="width:95%; background:none; margin-left:25px; border:none; margin-bottom:30px; margin-top:10px;" >
﻿  <div class="cLineB">
    <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="<?php echo U('Store/index',array('token'=>$token));?>"> <i class="icon-gift"></i> 微商城 </a> </li>
      <li class="bg_dy"> <a href="<?php echo U('Groupon/index',array('token'=>$token));?>"> <i class="icon-money"></i> 微团购</a> </li>
      <li class="bg_lg"> <a href="<?php echo U('Host/index',array('token'=>$token));?>"> <i class="icon-unlock"></i> 通用订单</a> </li>
      <li class="bg_ly"> <a href="<?php echo U('Selfform/index',array('token'=>$token));?>"> <i class="icon-magnet"></i> 万能表单 </a> </li>
      <li class="bg_lo"> <a href="<?php echo U('Adma/index',array('token'=>$token));?>"> <i class="icon-pencil"></i> DIY宣传 </a> </li>
      <li class="bg_ls"> <a href="<?php echo U('Panorama/index',array('token'=>$token));?>"> <i class="icon-eye-open"></i> 360全景</a> </li>
      <li class="bg_lr"> <a href="<?php echo U('Printer/index',array('token'=>$token));?>"> <i class="icon-print"></i> 无线打印</a> </li>
      <li class="bg_db"> <a href="javascript:history.go(-1);"> <i class="icon-share-alt"></i> 返回</a> </li>
    </ul>
  </div>
    <h4>360°全景设置</h4> 
    <a href="<?php echo U('Panorama/index',array('token'=>$token));?>" class="right  btn btn-success" style="margin-top:-27px">返回</a> 
   </div> 
   
   
   
   <form class="form" method="post" action="" enctype="multipart/form-data"> 
   <input type="hidden" name="token" value="<?php echo ($token); ?>" />
<?php if($isUpdate == 1): ?><input type="hidden" name="id" value="<?php echo ($set["id"]); ?>" /><?php endif; ?>
<input type="hidden" name="discount" id="discount" value="<?php echo ($set["discount"]); ?>" />
    <div class="msgWrap bgfc" style="padding:10px 10px 30px 0px;"> 
    <table class="userinfoArea" border="0" cellspacing="0" cellpadding="0" width="100%">
              <tbody>
              	 <tr>
                    <td align="right" width="86"><label for="title">名称：</label></td>
              		<td width="814"><input type="input" class="px" id="name" name="name" value="<?php echo ($set["name"]); ?>" style="width:420px;"></td>
              		</tr>
              		 <tr>
                    <td align="right"><label for="title">关键词：</label></td>
              		<td><input type="input" class="px" id="keyword" value="<?php echo ($set["keyword"]); ?>" name="keyword" style="width:420px;"></td>
              		</tr>
              		<tr>
                    <td align="right"><label for="title">顺序数字：</label></td>
              		<td><input type="input" class="px" id="taxis" value="<?php echo ($set["taxis"]); ?>" name="taxis" style="width:420px;">  由小到大排列</td>
              		</tr>
                     <tr>
                    <td align="right"><label for="title">背景音乐：</label></td>
              		<td><input type="input" class="px" id="music" value="<?php echo ($set["music"]); ?>" name="music" style="width:420px;"></td>
              		</tr>
                     <tr>
                       <td colspan="2">
                         <table border="0" cellspacing="0" cellpadding="0" class="quanjing">
                         <tbody><tr>
                           <td align="center">前</td>
                           <td align="center">右</td>
                           <td align="center">后</td>
                           <td align="center">左</td>
                           <td align="center">顶部</td>
                           <td align="center">底部</td>
                         </tr>
                         <tr>
                           <td align="center">
                               <?php if($_GET['id']!=''){ ?>
                                    <img src="<?php echo ($set["frontpic"]); ?>" id='frontpic_src' class="pic_img" >
                               <?php }else{ ?>
                                    <img src="/tpl/User/default/common/images/panorama/0.jpg" id='frontpic_src' class="pic_img" >
                               <?php } ?>
                           </td>
                           <td align="center">
                               <?php if($_GET['id']!=''){ ?>
                                    <img src="<?php echo ($set["rightpic"]); ?>" id='rightpic_src' class="pic_img"  >
                               <?php }else{ ?>
                                    <img src="/tpl/User/default/common/images/panorama/1.jpg" id='rightpic_src' class="pic_img" >
                               <?php } ?>
                           </td>
                           <td align="center">
                               <?php if($_GET['id']!=''){ ?>
                                    <img src="<?php echo ($set["backpic"]); ?>" id='backpic_src' class="pic_img" >
                               <?php }else{ ?>
                                    <img src="/tpl/User/default/common/images/panorama/2.jpg" id='backpic_src' class="pic_img" >
                               <?php } ?>
                           </td>
                           <td align="center">
                               <?php if($_GET['id']!=''){ ?>
                                    <img src="<?php echo ($set["leftpic"]); ?>" id='leftpic_src' class="pic_img" >
                               <?php }else{ ?>
                                    <img src="/tpl/User/default/common/images/panorama/3.jpg" id='leftpic_src' class="pic_img" >
                               <?php } ?>
                           </td>
                           <td align="center">
                               <?php if($_GET['id']!=''){ ?>
                                    <img src="<?php echo ($set["toppic"]); ?>" id='toppic_src' class="pic_img" >
                               <?php }else{ ?>
                                    <img src="/tpl/User/default/common/images/panorama/4.jpg" id='toppic_src' class="pic_img" >
                               <?php } ?>
                           </td>
                            <td align="center">
                               <?php if($_GET['id']!=''){ ?>
                                    <img src="<?php echo ($set["bottompic"]); ?>" id='bottompic_src' class="pic_img" >
                               <?php }else{ ?>
                                    <img src="/tpl/User/default/common/images/panorama/5.jpg" id='bottompic_src' class="pic_img" >
                               <?php } ?>
                           </td>
                         </tr>
                         <tr>
                           <td>
                           		<?php if($_GET['id']!=''){ ?>
                                    <input type="text"  class="px"  value="<?php echo ($set["frontpic"]); ?>" name="frontpic" id="small_pic" />
                               <?php }else{ ?>
                                    <input type="text"  class="px"  value="/tpl/User/default/common/images/panorama/0.jpg" name="frontpic" id="small_pic" />
                               <?php } ?>
                           </td>
                           <td>
                           		<?php if($_GET['id']!=''){ ?>
                                    <input type="text"  class="px"  value="<?php echo ($set["rightpic"]); ?>" name="rightpic" id="site_map_1" />
                               <?php }else{ ?>
                                    <input type="text" class="px"  value="/tpl/User/default/common/images/panorama/1.jpg" name="rightpic" id="site_map_1" />
                               <?php } ?>
                           </td>
                           <td>
                           		<?php if($_GET['id']!=''){ ?>
                                    <input type="text" class="px"  value="<?php echo ($set["backpic"]); ?>" name="backpic" id="site_map_2" />
                               <?php }else{ ?>
                                    <input type="text"  class="px"  value="/tpl/User/default/common/images/panorama/2.jpg" name="backpic" id="site_map_2" />
                               <?php } ?>
                           </td>
                           <td>
                           		<?php if($_GET['id']!=''){ ?>
                                    <input type="text"  class="px"  value="<?php echo ($set["leftpic"]); ?>" name="leftpic" id="site_map_3" />
                               <?php }else{ ?>
                                    <input type="text"  class="px"  value="/tpl/User/default/common/images/panorama/3.jpg" name="leftpic" id="site_map_3" />
                               <?php } ?>
                           </td>
                          <td>
                           		<?php if($_GET['id']!=''){ ?>
                                    <input type="text"  class="px"  value="<?php echo ($set["toppic"]); ?>" name="toppic" id="site_map_4" />
                               <?php }else{ ?>
                                    <input type="text" class="px"  value="/tpl/User/default/common/images/panorama/4.jpg" name="toppic" id="site_map_4" />
                               <?php } ?>
                           </td>
                           <td>
                           		<?php if($_GET['id']!=''){ ?>
                                    <input type="text" class="px"  value="<?php echo ($set["bottompic"]); ?>" name="bottompic" id="site_map_5" />
                               <?php }else{ ?>
                                    <input type="text" class="px"  value="/tpl/User/default/common/images/panorama/5.jpg" name="bottompic" id="site_map_5" />
                               <?php } ?>
                           </td>
                         </tr>
                         <tr>
                           <td align="center"><a class="btn btn-info" href="###" id="upload_small_pic" >上传</a></td>
                           <td align="center"><a class="btn btn-info" href="###" id="upload_site_map_1" >上传</a></td>
                           <td align="center"><a class="btn btn-info" href="###" id="upload_site_map_2" >上传</a></td>
                           <td align="center"><a class="btn btn-info" href="###" id="upload_site_map_3" >上传</a></td>
                           <td align="center"><a class="btn btn-info" href="###" id="upload_site_map_4" >上传</a></td>
                           <td align="center"><a class="btn btn-info" href="###" id="upload_site_map_5" >上传</a></td>
                         </tr>
                       </tbody>
                       </table></td>
                     </tr>
                   <tr>
                    <td valign="top"><label for="catepic">描述信息：</label></td>
              		<td><textarea name="intro" class="px" style="width:420px; height:150px"><?php echo ($set["intro"]); ?></textarea> </td>
              		</tr>
              	<tr>
              		<td></td>
              		<td colspan="3"><button type="submit" name="button" class="btn btn-success">保存</button>　<a href="<?php echo U('Panorama/index',array('token'=>$token));?>" class="btn btn-info">取消</a></td>
              		</tr>
              	</tbody>
            </table>
     </div>
   </form> 
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