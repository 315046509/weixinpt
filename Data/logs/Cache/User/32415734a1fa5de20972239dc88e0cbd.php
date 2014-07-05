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
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
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
'insertunorderedlist', '|', 'emoticons', 'image','link', 'unlink','baidumap','lineheight','table','anchor','preview','print','template','code','cut', 'music', 'video'],
afterBlur: function(){this.sync();}
});
});
</script>
<div class="content" style="width:95%; background:none; margin-left:25px; border:none; margin-bottom:30px; margin-top:1px;" >
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
    <h4>商品设置</h4> 
    <a href="<?php echo U('Store/product',array('token'=>$token,'catid'=>$catid));?>" class="right  btnGreen" style="margin-top:-27px">返回</a> 
   </div> 
<?php if($isUpdate == 1): ?><input type="hidden" name="id" value="<?php echo ($set["id"]); ?>" /><?php endif; ?>
<form method="post" action="" id="formID">
<input type="hidden" name="discount" id="discount" value="<?php echo ($set["discount"]); ?>" />
    <div class="msgWrap bgfc"> 
     <table class="userinfoArea" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%"> 
      <tbody> 
       <tr> 
        <th><span class="red">*</span>名称：</th> 
        <td>
        <input type="hidden" name="pid" id="pid" value="<?php echo ($set["id"]); ?>"/>
        <input type="text" name="name" id="name" value="<?php echo ($set["name"]); ?>" class="px" style="width:400px;" />
        </td> 
       </tr> 
       <tr> 
        <th>类别：</th> 
        <td><span class="red"><?php echo ($productCatData["name"]); ?></span></td> 
       </tr>
       <?php if(empty($productCatData['color']) != true): ?><tr>
	       <th><?php echo ($productCatData["color"]); ?>：</th>
	       <td>
	       		<table>
	       		<tr>
	       		<?php if(is_array($colorData)): $i = 0; $__LIST__ = $colorData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$norms): $mod = ($i % 2 );++$i;?><td width="130">
				<?php if((in_array($norms['id'], $colorList))): ?><input type="checkbox" name="color[]" value="<?php echo ($norms["id"]); ?>" class="color" id="norms_<?php echo ($norms["id"]); ?>" atr="<?php echo ($norms["value"]); ?>" checked/>&nbsp;&nbsp;<label for="norms_<?php echo ($norms["id"]); ?>"><?php echo ($norms["value"]); ?></label>
				<?php else: ?>
				<input type="checkbox" name="color[]" value="<?php echo ($norms["id"]); ?>" class="color" id="norms_<?php echo ($norms["id"]); ?>" atr="<?php echo ($norms["value"]); ?>"/>&nbsp;&nbsp;<label for="norms_<?php echo ($norms["id"]); ?>"><?php echo ($norms["value"]); ?></label><?php endif; ?>
				</td>
				<?php if(($i%5 == 0)): ?></tr><tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</tr>
				</table>
	       </td>
       </tr><?php endif; ?>
       <!-- 规格 -->
       <?php if(empty($productCatData['norms']) != true): ?><tr>
	       <th><?php echo ($productCatData["norms"]); ?>：</th>
	       <td>
	       		<table>
	       		<tr>
	       		<?php if(is_array($formatData)): $i = 0; $__LIST__ = $formatData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$norms): $mod = ($i % 2 );++$i;?><td width="130">
				<?php if((in_array($norms['id'], $formatList))): ?><input type="checkbox" name="norms[]" value="<?php echo ($norms["id"]); ?>" class="norms" id="norms_<?php echo ($norms["id"]); ?>" atr="<?php echo ($norms["value"]); ?>" checked/>&nbsp;&nbsp;<label for="norms_<?php echo ($norms["id"]); ?>"><?php echo ($norms["value"]); ?></label>
				<?php else: ?>
				<input type="checkbox" name="norms[]" value="<?php echo ($norms["id"]); ?>" class="norms" id="norms_<?php echo ($norms["id"]); ?>" atr="<?php echo ($norms["value"]); ?>"/>&nbsp;&nbsp;<label for="norms_<?php echo ($norms["id"]); ?>"><?php echo ($norms["value"]); ?></label><?php endif; ?>
				</td>
				<?php if(($i%5 == 0)): ?></tr><tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</tr>
				</table>
	       </td>
       </tr><?php endif; ?>
       <tr>
			<td colspan="2">
				<table id="priceList">
					<?php if(($productDetailData != null) ): ?><tr><th width="130">产品外观</th><th width="130">产品规格</th><th width="130">价格</th><th width="130">会员价</th><th width="130">数量</th></tr>
			        <?php if(is_array($productDetailData)): $i = 0; $__LIST__ = $productDetailData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?><input type="hidden" class="editselect" value="<?php echo ($detail["id"]); ?>,<?php echo ($detail["color"]); ?>,<?php echo ($detail["colorName"]); ?>,<?php echo ($detail["format"]); ?>,<?php echo ($detail["formatName"]); ?>,<?php echo ($detail["price"]); ?>,<?php echo ($detail["vprice"]); ?>,<?php echo ($detail["num"]); ?>"/>
				       <tr class="tnorms">
					       <td width="130"><?php echo ($detail["colorName"]); ?><input type="hidden" value="<?php echo ($detail["color"]); ?>"/></td>
					       <td width="130"><?php echo ($detail["formatName"]); ?><input type="hidden" value="<?php echo ($detail["format"]); ?>"/></td>
					       <td width="130"><input type="text" class="px" style="width:60px;" value="<?php echo ($detail["price"]); ?>"/></td>
					       <td width="130"><input type="text" class="px" style="width:60px;" value="<?php echo ($detail["vprice"]); ?>"/></td>
					       <td width="130"><input type="text" class="px" style="width:60px;" value="<?php echo ($detail["num"]); ?>"/></td>
					       <td width="130"><input type="hidden" value="<?php echo ($detail["id"]); ?>"/></td>
				       </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</table>
			</td>
       </tr>
       <?php if(is_array($attributeData)): $i = 0; $__LIST__ = $attributeData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attribute): $mod = ($i % 2 );++$i;?><tr>
		       <th><?php echo ($attribute["name"]); ?>：</th>
		       <td>
					<input type="text" value="<?php echo ($attribute["value"]); ?>" class="attribute px" style="width:400px;" atr="<?php echo ($attribute["name"]); ?>" id="<?php echo ($attribute["id"]); ?>" aid="<?php echo ($attribute["aid"]); ?>"/>
		       </td>
	       </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       <tr> 
        <th><span class="red">*</span>价格：</th>
        <td><input type="text" id="price" name="price" value="<?php echo ($set["price"]); ?>" class="validate[required, length[0,20]] px" style="width:100px;" /> 元</td> 
       </tr>
       <tr> 
        <th><span class="red">*</span>会员价：</th> 
        <td><input type="text" id="vprice" name="vprice" value="<?php echo ($set["vprice"]); ?>" class="px" style="width:100px;" /> 元</td> 
       </tr>
       <tr> 
        <th><span class="red">*</span>原价：</th> 
        <td><input type="text" id="oprice" name="oprice" value="<?php echo ($set["oprice"]); ?>" class="px" style="width:100px;" /> 元</td> 
       </tr>
       <tr> 
        <th>库存：</th> 
        <td><input type="text" id="num" name="num" value="<?php echo ($set["num"]); ?>" class="px" style="width:100px;" /></td> 
       </tr>
       <tr> 
        <th>邮费：</th> 
        <td><input type="text" id="mailprice" name="mailprice" value="<?php echo ($set["mailprice"]); ?>" class="px" style="width:100px;" /> 元</td> 
       </tr>
        <tr> 
        <th><span class="red">*</span>关键词：</th>
        <td><input type="text" name="keyword" id="keyword" value="<?php echo ($set["keyword"]); ?>" class="px" style="width:400px;" /></td> 
       </tr>
       <tr> 
        <th>Logo地址：</th>
        <td><input type="text" name="logourl" value="<?php echo ($set["logourl"]); ?>" class="px" id="pic" style="width:400px;" />  <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('pic',700,700,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('pic')">预览</a></td> 
       </tr>
       <tr> 
        <th>展示图片一：</th>
        <td><input type="text" name="image1" value="<?php echo ($imageList[0]["image"]); ?>" imageid="<?php echo ($imageList[0]["id"]); ?>" class="px" id="image1" style="width:400px;" />  <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('image1',700,700,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('image1')">预览</a></td> 
       </tr>
       <tr> 
        <th>展示图片二：</th>
        <td><input type="text" name="image2" value="<?php echo ($imageList[1]["image"]); ?>" imageid="<?php echo ($imageList[1]["id"]); ?>" class="px" id="image2" style="width:400px;" />  <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('image2',700,700,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('image2')">预览</a></td> 
       </tr>
       <tr> 
        <th>展示图片三：</th>
        <td><input type="text" name="image3" value="<?php echo ($imageList[2]["image"]); ?>" imageid="<?php echo ($imageList[2]["id"]); ?>" class="px" id="image3" style="width:400px;" />  <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('image3',700,700,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('image3')">预览</a></td> 
       </tr>
       <tr> 
        <th>展示图片四：</th>
        <td><input type="text" name="image4" value="<?php echo ($imageList[3]["image"]); ?>" imageid="<?php echo ($imageList[3]["id"]); ?>" class="px" id="image4" style="width:400px;" />  <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('image4',700,700,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('image4')">预览</a></td> 
       </tr>
       <tr> 
        <th>展示图片五：</th>
        <td><input type="text" name="image5" value="<?php echo ($imageList[4]["image"]); ?>" imageid="<?php echo ($imageList[4]["id"]); ?>" class="px" id="image5" style="width:400px;" />  <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('image5',700,700,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('image5')">预览</a></td> 
       </tr>
       <tr> 
        <th>展示图片六：</th>
        <td><input type="text" name="image6" value="<?php echo ($imageList[5]["image"]); ?>" imageid="<?php echo ($imageList[5]["id"]); ?>" class="px" id="image6" style="width:400px;" />  <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('image6',700,700,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('image6')">预览</a></td> 
       </tr>
       <tr> 
        <th>排序：</th> 
        <td><input type="text" id="sort" name="sort" value="<?php echo ($set["sort"]); ?>" class="px" style="width:50px;" />  数字越小排再越前（大于等于0的整数）</td> 
       </tr>
       <TR>
          <TH valign="top"><label for="info">图文详细页内容：</label></TH>
          <TD><textarea name="intro" id="intro"  rows="5" style="width:590px;height:360px"><?php echo ($set["intro"]); ?></textarea></TD>
       </TR>  
       <tr>         
       <th>&nbsp;</th>
       <td>
       <button type="button" name="button" class="btnGreen" id="save">保存</button> &nbsp; <a href="<?php echo U('Store/index',array('token'=>$token, 'catid' => $catid));?>" class="btnGray vm">取消</a></td> 
       </tr> 
      </tbody> 
     </table> 
     </div>
</form>
  </div> 
<script type="text/javascript">
$(document).ready(function(){
	var oldselect = [];
	$(".editselect").each(function(){
		var t = $(this).val().split(",");
		//alert(t[0]+'---'+ parseInt(t[1])+'---'+  t[2]+'---'+  t[3]+'---'+  t[4]+'---'+  t[5]+'---'+  t[6]);
		oldselect[t[1] + '_' + t[3]] = new Array(t[0], t[1], t[2], t[3], t[4], t[5], t[6], t[7]);
	});
	$(".color").click(function(){
		var selectValue = [];
		var html = '';
		var header = '<tr><th width="130">产品外观</th><th width="130">产品规格</th><th width="130">价格</th><th width="130">会员价</th><th width="130">数量</th></tr>';
		if ($(".norms").html() == null) {
			$(".color").each(function(){
				if ($(this).attr('checked')) {
					var color = $(this).attr('atr');
					var colorid = $(this).val();
					selectValue[colorid + '_' + 0] = new Array(0, colorid, color, 0, '', 0, 0, 0);
				}
			});
		} else {
			$(".color").each(function(){
				if ($(this).attr('checked')) {
					var color = $(this).attr('atr');
					var colorid = $(this).val();
					$(".norms").each(function(){
						if ($(this).attr('checked')) {
							var norms = $(this).attr('atr');
							var normsid = $(this).val();
							selectValue[colorid + '_' + normsid] = new Array(0, colorid, color, normsid, norms, 0, 0, 0);
							//selectValue[colorid + '_' + normsid] = '<tr class="tnorms"><td width="130">' + color + '<input type="hidden" value="' + colorid + '"/></td><td width="130">' + norms + '<input type="hidden" value="' + normsid + '"/></td><td width="130"><input type="text" class="px" style="width:60px;"/></td><td width="130"><input type="text" class="px" style="width:60px;"/></td><td><input type="hidden" value="0"/></td></tr>';
						}
					});
				}
			});
		}
		for (var index in selectValue) {
			if (oldselect[index] != null && oldselect[index] != '') {
				html += '<tr class="tnorms"><td width="130">' + oldselect[index][2] + '<input type="hidden" value="' + oldselect[index][1] + '"/></td>';
				html += '<td width="130">' + oldselect[index][4] + '<input type="hidden" value="' + oldselect[index][3] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + oldselect[index][5] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + oldselect[index][6] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + oldselect[index][7] + '"/></td>';
				html += '<td><input type="hidden" value="' + oldselect[index][0] + '"/></td></tr>';
			} else {
				html += '<tr class="tnorms"><td width="130">' + selectValue[index][2] + '<input type="hidden" value="' + selectValue[index][1] + '"/></td>';
				html += '<td width="130">' + selectValue[index][4] + '<input type="hidden" value="' + selectValue[index][3] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + selectValue[index][5] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + selectValue[index][6] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + selectValue[index][7] + '"/></td>';
				html += '<td><input type="hidden" value="' + selectValue[index][0] + '"/></td></tr>';
			}
			//html += selectValue[index];
		}
		if (html != '') {
			$("#priceList").html(header + html);
		} else {
			$("#priceList").html('');
		}
	});
	$(".norms").click(function(){
		var selectValue = [];
		var html = '';
		var header = '<tr><th width="130">产品外观</th><th width="130">产品规格</th><th width="130">价格</th><th width="130">会员价</th><th width="130">数量</th></tr>';
		if ($(".color").html() == null) {
			$(".norms").each(function(){
				if ($(this).attr('checked')) {
					var norms = $(this).attr('atr');
					var normsid = $(this).val();
					selectValue[0 + '_' + normsid] = new Array(0, 0, '', normsid, norms, 0, 0, 0);
					//selectValue[colorid + '_' + normsid] = '<tr class="tnorms"><td width="130">' + color + '<input type="hidden" value="' + colorid + '"/></td><td width="130">' + norms + '<input type="hidden" value="' + normsid + '"/></td><td width="130"><input type="text" class="px" style="width:60px;"/></td><td width="130"><input type="text" class="px" style="width:60px;"/></td><td><input type="hidden" value="0"/></td></tr>';
				}
			});
		} else {
			$(".color").each(function(){
				if ($(this).attr('checked')) {
					var color = $(this).attr('atr');
					var colorid = $(this).val();
					$(".norms").each(function(){
						if ($(this).attr('checked')) {
							var norms = $(this).attr('atr');
							var normsid = $(this).val();
							selectValue[colorid + '_' + normsid] = new Array(0, colorid, color, normsid, norms, 0, 0, 0);
							//selectValue[colorid + '_' + normsid] = '<tr class="tnorms"><td width="130">' + color + '<input type="hidden" value="' + colorid + '"/></td><td width="130">' + norms + '<input type="hidden" value="' + normsid + '"/></td><td width="130"><input type="text" class="px" style="width:60px;"/></td><td width="130"><input type="text" class="px" style="width:60px;"/></td><td><input type="hidden" value="0"/></td></tr>';
						}
					});
				}
			});
		}
		for (var index in selectValue) {
			if (oldselect[index] != null && oldselect[index] != '') {
				html += '<tr class="tnorms"><td width="130">' + oldselect[index][2] + '<input type="hidden" value="' + oldselect[index][1] + '"/></td>';
				html += '<td width="130">' + oldselect[index][4] + '<input type="hidden" value="' + oldselect[index][3] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + oldselect[index][5] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + oldselect[index][6] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + oldselect[index][7] + '"/></td>';
				html += '<td><input type="hidden" value="' + oldselect[index][0] + '"/></td></tr>';
			} else {
				html += '<tr class="tnorms"><td width="130">' + selectValue[index][2] + '<input type="hidden" value="' + selectValue[index][1] + '"/></td>';
				html += '<td width="130">' + selectValue[index][4] + '<input type="hidden" value="' + selectValue[index][3] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + selectValue[index][5] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + selectValue[index][6] + '"/></td>';
				html += '<td width="130"><input type="text" class="px" style="width:60px;" value="' + selectValue[index][7] + '"/></td>';
				html += '<td><input type="hidden" value="' + selectValue[index][0] + '"/></td></tr>';
			}
			//html += selectValue[index];
		}
		if (html != '') {
			$("#priceList").html(header + html);
		} else {
			$("#priceList").html('');
		}
	});
	$("#save").click(function(){
		var name = $("#name").val();
		if (name.length < 1) {
			art.dialog({title:'消息提示', ok:true, width:300, height:200, content:'名称不能为空'});
			return false;
		}
		var num = $("#num").val();
		if (isNaN(num)) {
			art.dialog({title:'消息提示', ok:true, width:300, height:200, content:'库存应该是为正整数'});
			return false;
		}
		var price = $("#price").val();
		var vprice = $("#vprice").val();
		var oprice = $("#oprice").val();
		var mailprice = $("#mailprice").val();
		var keyword = $("#keyword").val();
		var pic = $("#pic").val();
		var intro = $("#intro").val();
		var attribute = [];
		var i = 0;
		var str = '';
		$(".attribute").each(function(){
			attribute[i]= {'name':$(this).attr('atr'), 'value':$(this).val(), 'aid':$(this).attr('aid'), 'id':$(this).attr('id')};//new Array($(this).attr('atr'), $(this).val());
			i ++;
		});
		var norms = [];
		var i = 0;
		var tnum = 0;
		$(".tnorms").each(function(){
			tnum += parseInt($(this).children('td').eq(4).children('input').val());
			norms[i]= {'color':$(this).children('td').eq(0).children('input').val(), 'format':$(this).children('td').eq(1).children('input').val(), 'price':$(this).children('td').eq(2).children('input').val(), 'vprice':$(this).children('td').eq(3).children('input').val(), 'num':$(this).children('td').eq(4).children('input').val(), 'id':$(this).children('td').eq(5).children('input').val()};
			i ++;
		});
		if (tnum > 0) {
			num = tnum;
		}
		//num = num > tnum ? num : tnum;
		var image1 = $("#image1").val();
		var image2 = $("#image2").val();
		var image3 = $("#image3").val();
		var image4 = $("#image4").val();
		var image5 = $("#image5").val();
		var image6 = $("#image6").val();
		var imageid1 = parseInt($("#image1").attr('imageid'));
		var imageid2 = parseInt($("#image2").attr('imageid'));
		var imageid3 = parseInt($("#image3").attr('imageid'));
		var imageid4 = parseInt($("#image4").attr('imageid'));
		var imageid5 = parseInt($("#image5").attr('imageid'));
		var imageid6 = parseInt($("#image6").attr('imageid'));
		var images = [];
		images[0] = {'id':imageid1, 'image':image1};
		images[1] = {'id':imageid2, 'image':image2};
		images[2] = {'id':imageid3, 'image':image3};
		images[3] = {'id':imageid4, 'image':image4};
		images[4] = {'id':imageid5, 'image':image5};
		images[5] = {'id':imageid6, 'image':image6};
		var data = {pid:$("#pid").val(),
					name:name,
					num:num,
					price:price,
					vprice:vprice,
					oprice:oprice,
					mailprice:mailprice,
					keyword:keyword,
					pic:pic,
					intro:intro,
					attribute:JSON.stringify(attribute),
					norms:JSON.stringify(norms),
					images:JSON.stringify(images),
					token:'<?php echo ($token); ?>',
					catid:'<?php echo ($catid); ?>',
					sort:$("#sort").val()
					};
		$.post('index.php?g=User&m=Store&a=productSave', data, function(response){
			if (response.error_code == false) {
				art.dialog({
					title:'消息提示', 
				    content: response.msg, 
				    width:300, 
				    height:200,
				    lock: true,
				    ok: function () {
				    	this.time(3);
				    	location.href='index.php?g=User&m=Store&a=product&token=<?php echo ($token); ?>&catid=<?php echo ($catid); ?>'
				        return false;
				    },
				    cancelVal: '关闭'
				});
			} else {
				art.dialog({title:'消息提示', time:2, width:300, height:200, content:response.msg});
			}
			
		}, 'json');
	});
});
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