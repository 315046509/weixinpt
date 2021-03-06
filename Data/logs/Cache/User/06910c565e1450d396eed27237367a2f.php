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
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.css" />
<!--link rel="stylesheet" href="<?php echo STATICS;?>/vote/style.css" /-->
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/vote/common.js" type="text/javascript"></script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default" type="text/javascript"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js" type="text/javascript"></script>

<script type="text/javascript">

var editor;
KindEditor.ready(function(K) {
editor = K.create('#info', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '/index.php?g=User&m=Upyun&a=kindedtiropic',
items : [
'source','undo','plainpaste','wordpaste','clearhtml','quickformat','selectall','fullscreen','fontname', 'fontsize','subscript','superscript','indent','outdent','|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline','hr']
});
});
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
  <h4> <?php if($vo['type'] != 'img'): ?>文本<?php else: ?>图片<?php endif; ?>投票设置 </h4><a href="<?php echo U('Vote/index');?>" class="right btn btn-info" style="margin-top:-27px">返回</a>
 </div>

         <div class="msgWrap bgfc">
<form class="form" method="post" action="" target="_top" enctype="multipart/form-data">	
<?php if($vo['id'] != ''): ?><input type="hidden" name="id" value="<?php echo ($vo['id']); ?>"><?php endif; ?>
<table class="userinfoArea" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%"><tbody><tr>
<th width="120">关键词：</th>
<td><input type="text" name="keyword" value="<?php if($vo['keyword'] == ''): ?>投票<?php else: echo ($vo["keyword"]); endif; ?>" class="px" style="width:550px;"><br><span class="red">只能写一个关键词,功能面板必须开启投票</span></td>
</tr>
                            <tr>
<th width="120">投票标题：</th>
<td><input type="text" name="title" value="<?php echo ($vo["title"]); ?>" class="px" style="width:550px;"></td>
</tr>
<tr>
<th>投票图片：</th>
<td><img class="thumb_img" id="picurl_src" src="<?php echo (($reslist['picurl'])?($reslist['picurl']):'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png'); ?>" style="max-height:100px;"><input type="text" name="picurl" value="<?php echo (($vo["picurl"])?($vo["picurl"]):'http://www.138wo.com/uploads/1/1d2e1b640424480/f/c/1/1/thumb_5320647871c5d.png'); ?>" class="px" onclick="document.getElementById('picurl_src').src=this.value;" id="picurl" style="width:300px;"> 
 <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('picurl',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('picurl')">预览</a>&nbsp;填写图片外链地址，大小为720x400</td>
</tr>
<tr>
<th>图片显示：</th>
<td><label>
<input type="radio" name="showpic" value="1" checked="checked" id="showpic2">
显示在投票页面</label>
<label>
<input name="showpic" type="radio" id="showpic1" value="0">
不显示在投票页面</label>
</td>
</tr>
<tr>
<th valign="top">投票说明：</th>
<td valign="top"><textarea class="px" id="info" name="info" style="width: 560px; height: 120px; display: ;"><?php echo html_entity_decode(htmlspecialchars_decode($vo['info'])); ?></textarea></td>
</tr>
<tr>
<th valign="top">投票选项：</th>
<td valign="top"><div class="bdrcontent">
<div id="div_ptype">
<table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">

<script type="text/javascript">


function addDeltbody(i) {

    //document.getElementById("div_add_del_" + i).value = "";
    //document.getElementById("svalue" + i).value = "";
    if (i != 1) {
       document.getElementById("div_add_del_" + i).style.display = "none";
       document.getElementById("add" + i).style.display = "";
    }
}
function addTabody(i) {

     document.getElementById('div_add_del_' + i).style.display = "";
     document.getElementById('add' + i).style.display = "none";
}

function delrow(obj, tbody,objid) {
  // if($$(tbody).rows.length == 1) {
  // var trobj = obj.parentNode.parentNode;
  // trobj.style.display='none';
  // }else{
  $$(tbody).removeChild(obj.parentNode.parentNode);

   var obj = {id:objid}
        $.post("<?php echo U('Vote/del_tab');?>", obj,
            function(data) {
                // if (0 == data.errno) {
                //     alert(data.msg+data.tid);
                //     return;
                // } else {
                //     alert("失败了。。");
                //     alert(data.tid);
                // }
            },
        "json");
}



  </script>
<tbody>
<tr>
   
    <td width="260">选项标题</td>
    <td width="50">排序</td>
     <td width="50">票数</td>
    <?php if($vo['type'] == 'img' OR $type == 'img'): ?><td width="260">图片外链地址</td>
    <td width="260">图片跳转地址以http://开头</td><?php endif; ?>
    <td class="norightborder"></td>
</tr>
</tbody>
<?php if($items != ''): if(is_array($items)): $i = 0; $__LIST__ = $items;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ivo): $mod = ($i % 2 );++$i;?><tbody id="div_add_del_<?php echo ($i+50); ?>" name="div_add_del">
<tr>
    <input type="hidden" name="add[id][]"   value="<?php echo ($ivo["id"]); ?>" style="width:20px;">
    <td width="120"><input type="text" name="add[item][]" value="<?php echo ($ivo["item"]); ?>" class="px" style="width:120px;"></td>
    <td width="20"><input type="text" name="add[rank][]" value="<?php echo ($ivo["rank"]); ?>" style="width:20px;" class="px"></td>
    <td width="20"><input type="text" name="add[vcount][]" value="<?php echo ($ivo["vcount"]); ?>" style="width:20px;" class="px"></td>
    <?php if($vo['type'] == 'img' OR $type == 'img'): ?><td width="200">
      <img class="thumb_img" id="startpicurl_<?php echo ($i+50); ?>_src" src="<?php echo ($ivo['startpicurl']); ?>" style="max-height:100px;display: none;">
      <input type="text" name="add[startpicurl][]" value="<?php echo ($ivo["startpicurl"]); ?>" class="px" onclick="document.getElementById('startpicurl_<?php echo ($i+50); ?>_src').src=this.value;" id="startpicurl_<?php echo ($i+50); ?>" style="width:130px;"> 
<a href="###" onclick="upyunPicUpload('startpicurl_<?php echo ($i+50); ?>',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('startpicurl_<?php echo ($i+50); ?>')">预览</a>
</td>
    <td width="260"><input type="text" name="add[tourl][]" value="<?php echo ($ivo["tourl"]); ?>" style="width:100px;" class="px"></td><?php endif; ?>   

    <td width="50" class="norightborder"><a href="javascript:;" onclick="delrow(this, 'div_add_del_<?php echo ($i+50); ?>',<?php echo ($ivo["id"]); ?>);">删除</a></td>
</tr>
 </tbody><?php endforeach; endif; else: echo "" ;endif; endif; ?>

<tbody id="div_add_del_1" name="div_add_del">    
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:20px;" >
        <td width="120">
            <input type="text" name="add[item][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="px">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="px">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_1_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" placeholder="图片外链须加[http://]" value="" class="px" 
          onclick="document.getElementById('startpicurl_1_src').src=this.value;" id="startpicurl_1" style="width:130px;"> 
          <a href="###" onclick="upyunPicUpload('startpicurl_1',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> 
          <a href="###" onclick="viewImg('startpicurl_1')">预览</a>
            <!--input type="text" name="add[startpicurl][]" id="startpicurl_1" value="<?php echo ($ivo["startpicurl"]); ?>" class="px"  style="width:50px;"--> 
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(1)">删除</a>
          <a href="javascript:;" id="add2" onclick="addTabody(2)">添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_2" name="div_add_del" style="display:none">    
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:20px;" >
        <td width="120">
            <input type="text" name="add[item][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="px">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="px">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_2_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="px" 
          onclick="document.getElementById('startpicurl_2_src').src=this.value;" id="startpicurl_2" style="width:130px;"> 
          <a href="###" onclick="upyunPicUpload('startpicurl_2',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> 
          <a href="###" onclick="viewImg('startpicurl_2')">预览</a>
            
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(2)">删除</a>
          <a href="javascript:;" id="add3" onclick="addTabody(3)">添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_3" name="div_add_del" style="display:none">    
    <tr >
      <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value="" placeholder="请填写选项标题"  class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="px">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="px">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_3_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="px" 
          onclick="document.getElementById('startpicurl_3_src').src=this.value;" id="startpicurl_3" style="width:130px;"> 
          <a href="###" onclick="upyunPicUpload('startpicurl_3',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> 
          <a href="###" onclick="viewImg('startpicurl_3')">预览</a>
           
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(3)">删除</a>
          <a href="javascript:;" id="add4" onclick="addTabody(4)">添加</a></td>
    </tr>
</tbody>


<tbody id="div_add_del_4" name="div_add_del" style="display:none">    
    <tr >
      <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" placeholder="请填写选项标题" value="" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="px">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="px">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_4_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value=""  placeholder="图片外链须加[http://]" class="px" 
          onclick="document.getElementById('startpicurl_4_src').src=this.value;" id="startpicurl_4" style="width:130px;"> 
          <a href="###" onclick="upyunPicUpload('startpicurl_4',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> 
          <a href="###" onclick="viewImg('startpicurl_4')">预览</a>
            
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(4)">删除</a>
          <a href="javascript:;" id="add5" onclick="addTabody(5)">添加</a></td>
    </tr>
</tbody>


<tbody id="div_add_del_5" name="div_add_del" style="display:none">    
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="px">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="px">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_5_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="px" 
          onclick="document.getElementById('startpicurl_5_src').src=this.value;" id="startpicurl_5" style="width:130px;"> 
          <a href="###" onclick="upyunPicUpload('startpicurl_5',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> 
          <a href="###" onclick="viewImg('startpicurl_5')">预览</a>
            
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(5)">删除</a>
          <a href="javascript:;" id="add6" onclick="addTabody(6)">添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_6" name="div_add_del" style="display:none">    
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="px">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="px">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_6_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="px" 
          onclick="document.getElementById('startpicurl_6_src').src=this.value;" id="startpicurl_6" style="width:130px;"> 
          <a href="###" onclick="upyunPicUpload('startpicurl_6',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> 
          <a href="###" onclick="viewImg('startpicurl_6')">预览</a>
            
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(6)">删除</a>
          <a href="javascript:;" id="add7" onclick="addTabody(7)">添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_7" name="div_add_del" style="display:none">    
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="px">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="px">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_7_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="px" 
          onclick="document.getElementById('startpicurl_7_src').src=this.value;" id="startpicurl_7" style="width:130px;"> 
          <a href="###" onclick="upyunPicUpload('startpicurl_7',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> 
          <a href="###" onclick="viewImg('startpicurl_7')">预览</a>
            
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(7)">删除</a>
          <a href="javascript:;" id="add8" onclick="addTabody(8)">添加</a></td>
    </tr>
</tbody>
<tbody id="div_add_del_8" name="div_add_del" style="display:none">    
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="px">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="px">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_8_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="px" 
          onclick="document.getElementById('startpicurl_8_src').src=this.value;" id="startpicurl_8" style="width:130px;"> 
          <a href="###" onclick="upyunPicUpload('startpicurl_8',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> 
          <a href="###" onclick="viewImg('startpicurl_8')">预览</a>
            
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(8)">删除</a>
          <a href="javascript:;" id="add9" onclick="addTabody(9)">添加</a></td>
    </tr>
</tbody>
<tbody id="div_add_del_9" name="div_add_del" style="display:none">    
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="px">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="px">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_9_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="px" 
          onclick="document.getElementById('startpicurl_9_src').src=this.value;" id="startpicurl_9" style="width:130px;"> 
          <a href="###" onclick="upyunPicUpload('startpicurl_9',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> 
          <a href="###" onclick="viewImg('startpicurl_9')">预览</a>
            
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(9)">删除</a>
          <a href="javascript:;" id="add10" onclick="addTabody(10)">添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_10" name="div_add_del" style="display:none">    
    <tr >
     <input type="hidden" name="add[id][]" readonly="readonly" disabled="disabled"  value="" style="width:50px;" >
        <td width="120">
            <input type="text" name="add[item][]" value=""  placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[rank][]" value="" style="width:20px;" class="px">
        </td>
         <td>
            <input type="text" name="add[vcount][]" value="" style="width:20px;" class="px">
        </td>
        <?php if(($vo['type'] == 'img') OR ($type == 'img')): ?><td width="200">
          <img class="thumb_img" id="startpicurl_10_src" src="" style="max-height:100px;display: none;">
          <input type="text" name="add[startpicurl][]" value="" placeholder="图片外链须加[http://]" class="px" 
          onclick="document.getElementById('startpicurl_10_src').src=this.value;" id="startpicurl_10" style="width:130px;"> 
          <a href="###" onclick="upyunPicUpload('startpicurl_10',700,400,'<?php echo ($vo["token"]); ?>')" class="a_upload">上传</a> 
          <a href="###" onclick="viewImg('startpicurl_10')">预览</a>
            
        </td>
        <td width="100"><input type="text" name="add[tourl][]" value="" class="px" style="width:100px;"></td><?php endif; ?>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(10)">删除</a>
          </td>
    </tr>
</tbody>
<tbody>
        <tr>
            <td colspan="4" class="norightborder"> 
              排序默认为1，票数默认为0，图片跳转地址没有可以不填写。
                
        </tr>
        
  </tbody>
</table>
   
</div>
</div>

</td>
</tr>
<tr>
<th>单选/多选：</th>
<td>
  <p style="width: 120px; float: left; display: block; line-height: 32px; height: 32px;">
    <select name="cknums" class="input-medium">
      <option value="1" <?php if($vo['cknums'] == 1): ?>selected<?php endif; ?>>单选</option>
      <option value="2" <?php if($vo['cknums'] == 2): ?>selected<?php endif; ?>>多选</option>
    </select>
    
</p>
</td>
</tr>
                          
<tr>
<th>截至时间：</th>
<td><input type="input" class="px" id="statdate" value="<?php if($vo['statdate'] != ''): echo (date("Y-m-d",$vo["statdate"])); endif; ?>" onClick="WdatePicker()" name="statdate">
到
<input type="input" class="px" id="enddate" value="<?php if($vo['enddate'] != ''): echo (date("Y-m-d",$vo["enddate"])); endif; ?>" name="enddate" onClick="WdatePicker()"></td>
</tr>
<tr>
<th>投票结果：</th>
<td>
<label>
<input name="display" type="radio" <?php if($vo['display'] == 1): ?>checked<?php endif; ?>  value="1" id="RadioGroup2_1">
投票前可见</label>
<label>
<input name="display" type="radio" <?php if($vo['display'] == 0): ?>checked <?php else: ?> checked<?php endif; ?> id="RadioGroup2_0" value="0">
投票后可见</label>
<label>
<input name="display" type="radio" <?php if($vo['display'] == 2): ?>checked<?php endif; ?>id="RadioGroup2_2" value="2">
投票结束可见</label>

</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><button type="submit" name="button" class="btn btn-success">保存</button>
<a href="<?php echo U('Vote/index');?>" class="btn btn-danger">取消</a>
</td>
</tr>
</tbody>
</table>  


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