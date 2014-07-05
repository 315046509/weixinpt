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
<style type="text/css">
.plug-menu {
width:36px;
height:36px;
border-radius:36px;
-moz-box-shadow:0 0 0 4px #FFFFFF, 0 2px 5px 4px rgba(0, 0, 0, 0.25);
-webkit-box-shadow:0 0 0 4px #FFFFFF, 0 2px 5px 4px rgba(0, 0, 0, 0.25);
box-shadow:0 0 0 4px #FFFFFF, 0 2px 5px 4px rgba(0, 0, 0, 0.25);
background-color: FF0000;
position:relative
}
.plug-menu span {
display: block;
width:28px;
height:28px;
background: url(tpl/User/default/common/images/photo/plugmenu.png) no-repeat;
background-size: 28px 28px;
text-indent: -999px;
position:absolute;
top:4px;
left:4px;
overflow: hidden;
}
</style>
<script src="./tpl/User/default/common/js/cart/jscolor.js" type="text/javascript"></script>
<form method="post" action="" enctype="multipart/form-data">
 <input type="hidden" name="formhash" id="formhash" value="a68de075">
 
<div class="content" style="width:98%; background:none; margin-left:25px; border:none; margin-bottom:30px; margin-top:10px;" >
  <div class="cLineB">
﻿<div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="<?php echo U('Home/set',array('token'=>$token));?>"> <i class="icon-cog"></i> 首页设置 </a> </li>
      <li class="bg_dy"> <a href="<?php echo U('Tmpls/index',array('token'=>$token));?>"> <i class="icon-dashboard"></i> 模板管理</a> </li>
      <li class="bg_lg"> <a href="<?php echo U('Classify/index',array('token'=>$token));?>"> <i class="icon-cogs"></i> 分类管理</a> </li>
      <li class="bg_lv"> <a href="<?php echo U('Forum/index',array('token'=>$token));?>"> <i class="icon-edit"></i> 微论坛</a> </li>
      <li class="bg_ly"> <a href="<?php echo U('Img/index',array('token'=>$token));?>"> <i class="icon-book"></i> 图文回复 </a> </li>
      <li class="bg_lo"> <a href="<?php echo U('Flash/index',array('token'=>$token));?>"> <i class="icon-camera-retro"></i> 幻灯片 </a> </li>
      <li class="bg_ls"> <a href="<?php echo U('Photo/index',array('token'=>$token));?>"> <i class="icon-picture"></i> 相册</a> </li>
      <li class="bg_lr"> <a href="<?php echo U('Catemenu/index',array('token'=>$token));?>"> <i class="icon-magic"></i> 底部导航</a> </li>
      <li class="bg_lv"> <a href="<?php echo U('Diymen/index',array('token'=>$token));?>"> <i class="icon-eye-open"></i> 自定义菜单</a> </li>
      <li class="bg_lh"> <a href="<?php echo U('Yulan/index',array('token'=>$token));?>" target="_blank"> <i class="icon-globe"></i> 在线预览</a> </li>
    </ul>
  </div>
  <h4>菜单颜色与导航 <span class="FAQ">提供一键拨号，一键导航，一键email等等快捷功能</span></h4>
  
 </div>
  <ul id="tags">
          <li><a href="<?php echo U('Catemenu/index');?>">底部菜单分类设置</a> </li>
          <li><a href="<?php echo U('Catemenu/styleSet');?>">底部菜单风格选择</a> </li>
          <li class="selectTag"><a href="<?php echo U('Home/plugmenu');?>">菜单颜色与版权</a> </li>
          <div class="clr"></div>
        </ul>
        <div class="cLineB" style="padding:0;margin:0"></div>
 <div class="msgWrap bgfc" style="padding: 5px 20px;">
 	<table class="userinfoArea" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%">
<tbody>
<tr>
<td width="60"><div class="plug-menu" id="plugmenucolor" style="background-color:<?php echo ($homeInfo["plugmenucolor"]); ?>"><span class="close"></span></div></td>
<td width="140"><strong>请选择快捷菜单的颜色：</strong></td>
<td width="95"><input type="text" name="plugmenucolor" id="themeStyle" value="<?php echo ($homeInfo["plugmenucolor"]); ?>" class="px color" style="width: 55px; background-image: none; background-color:<?php echo ($homeInfo["plugmenucolor"]); ?>; color: rgb(255, 255, 255);" onblur="document.getElementById('plugmenucolor').style.backgroundColor=document.getElementById('themeStyle').value;"></td>
<td width="536">请在手机上查看效果！</td>

</tr>
<?php if($userGroup["iscopyright"] == 1): ?><tr>
<td width="60"> </td>
<td><strong>设置页面版权：</strong></td>
 
<td colspan="2"><textarea class="px" style="width:550px; height:35px" name="copyright"><?php echo ($homeInfo["copyright"]); ?></textarea><br>例如：© 2001-2013 <?php echo ($wecha["wxname"]); ?>版权所有 </td>

</tr><?php endif; ?>
</tbody>
</table>
 </div>
         
 
 <div class="msgWrap form">
         
<div class="bdrcontent">
<div id="div_ptype">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<thead>
<tr style="display:none">
<th style=" width:40px;">图标</th>
                    <th style=" width:80px;">名称</th>
<th style=" width:270px;"><span class="tooltips">外链网站或活动 <img src="<?php echo RES;?>/images/price_help.png" align="absmiddle"><span>
<p>比如你想跳转到百度，就填写<a class="red">http://www.baidu.com</a></p>
<p>不需要跳转就不用填写，还可以外链活动，</p>
<p>直接填写活动外链地址：<a class="red">大转盘 888</a></p>
</span></span></th>
<th style=" width:70px;">显示顺序</th>
<th>显示(<span class="red">只显示勾选的前4项</span>) </th>
                        </tr>
</thead>
                    
<tbody><tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu1.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>电话</td>
<td><input class="px" type="text" style="width:250px;" name="url_tel" value="<?php echo $menus['tel']['url']; ?>"></td>
<td><input type="text" name="sort_tel" value="<?php echo $menus['tel']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_tel" value="1" <?php if($menus['tel']['display']){echo 'checked';} ?> /> 默认为商家电话，可以输入电话号码，比如：13888888888</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu2.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>会员资料</td>
<td><input class="px" type="text" style="width:250px;" name="url_memberinfo" value="<?php echo $menus['memberinfo']['url']; ?>"></td>
<td><input type="text" name="sort_memberinfo" value="<?php echo $menus['memberinfo']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_memberinfo" value="1" <?php if($menus['memberinfo']['display']){echo 'checked';} ?> /> 默认为会员卡资料，可以填写外链</td></tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu3.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>导航</td>
<td><input class="px" type="text" style="width:250px;" name="url_nav" value="<?php echo $menus['nav']['url']; ?>"></td>
<td><input type="text" name="sort_nav" value="<?php echo $menus['nav']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_nav" value="1" <?php if($menus['nav']['display']){echo 'checked';} ?> /> 默认为商家地图</td></tr>

<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu5.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>分享</td>
<td><input class="px" type="text" style="width:250px;" name="url_share" value="<?php echo $menus['share']['url']; ?>"></td>
<td><input type="text" name="sort_share" value="<?php echo $menus['share']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_share" value="1" <?php if($menus['share']['display']){echo 'checked';} ?> /> </td></tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu6.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>首页</td>
<td><input class="px" type="text" style="width:250px;" name="url_home" value="<?php echo $menus['home']['url']; ?>"></td>
<td><input type="text" name="sort_home" value="<?php echo $menus['home']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_home" value="1" <?php if($menus['home']['display']){echo 'checked';} ?> /> 默认为首页</td></tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu7.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>相册</td>
<td><input class="px" type="text" style="width:250px;" name="url_album" value="<?php echo $menus['album']['url']; ?>"></td>
<td><input type="text" name="sort_album" value="<?php echo $menus['album']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_album" value="1" <?php if($menus['album']['display']){echo 'checked';} ?> /> 默认为3g相册</td></tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu8.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>邮箱</td>
<td><input class="px" type="text" style="width:250px;" name="url_email" value="<?php echo $menus['email']['url']; ?>"></td>
<td><input type="text" name="sort_email" value="<?php echo $menus['email']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_email" value="1" <?php if($menus['email']['display']){echo 'checked';} ?> /> 请填写邮箱地址</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu9.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>购物</td>
<td><input class="px" type="text" style="width:250px;" name="url_shopping" value="<?php echo $menus['shopping']['url']; ?>"></td>
<td><input type="text" name="sort_shopping" value="<?php echo $menus['shopping']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_shopping" value="1" <?php if($menus['shopping']['display']){echo 'checked';} ?> /> 默认为微商城</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu10.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>会员卡</td>
<td><input class="px" type="text" style="width:250px;" name="url_membercard" value="<?php echo $menus['membercard']['url']; ?>"></td>
<td><input type="text" name="sort_membercard" value="<?php echo $menus['membercard']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_membercard" value="1" <?php if($menus['membercard']['display']){echo 'checked';} ?> /> 默认为会员卡</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu11.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>活动</td>
<td><input class="px" type="text" style="width:250px;" name="url_activity" value="<?php echo $menus['activity']['url']; ?>"></td>
<td><input type="text" name="sort_activity" value="<?php echo $menus['activity']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_activity" value="1" <?php if($menus['activity']['display']){echo 'checked';} ?> /> 请填写活动外链代码</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu12.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>新浪微博</td>
<td><input class="px" type="text" style="width:250px;" name="url_weibo" value="<?php echo $menus['weibo']['url']; ?>"></td>
<td><input type="text" name="sort_weibo" value="<?php echo $menus['weibo']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_weibo" value="1" <?php if($menus['weibo']['display']){echo 'checked';} ?> /> 请填写微博地址</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu13.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>腾讯微博</td>
<td><input class="px" type="text" style="width:250px;" name="url_tencentweibo" value="<?php echo $menus['tencentweibo']['url']; ?>"></td>
<td><input type="text" name="sort_tencentweibo" value="<?php echo $menus['tencentweibo']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_tencentweibo" value="1" <?php if($menus['tencentweibo']['display']){echo 'checked';} ?> /> 请填写微博地址</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu14.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>腾讯空间</td>
<td><input class="px" type="text" style="width:250px;" name="url_qqzone" value="<?php echo $menus['qqzone']['url']; ?>"></td>
<td><input type="text" name="sort_qqzone" value="<?php echo $menus['qqzone']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_qqzone" value="1" <?php if($menus['qqzone']['display']){echo 'checked';} ?> /> 请填写空间地址</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu15.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>微信</td>
<td><input class="px" type="text" style="width:250px;" name="url_wechat" value="<?php echo $menus['wechat']['url']; ?>"></td>
<td><input type="text" name="sort_wechat" value="<?php echo $menus['wechat']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_wechat" value="1" <?php if($menus['wechat']['display']){echo 'checked';} ?> /> 默认为您的微信号</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu16.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>音乐</td>
<td><input class="px" type="text" style="width:250px;" name="url_music" value="<?php echo $menus['music']['url']; ?>"></td>
<td><input type="text" name="sort_music" value="<?php echo $menus['music']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_music" value="1" <?php if($menus['music']['display']){echo 'checked';} ?> /> 请填写音乐地址</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu17.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>视频</td>
<td><input class="px" type="text" style="width:250px;" name="url_video" value="<?php echo $menus['video']['url']; ?>"></td>
<td><input type="text" name="sort_video" value="<?php echo $menus['video']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_video" value="1" <?php if($menus['video']['display']){echo 'checked';} ?> /> 请填写视频地址</td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu18.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>推荐</td>
<td><input class="px" type="text" style="width:250px;" name="url_recommend" value="<?php echo $menus['recommend']['url']; ?>"></td>
<td><input type="text" name="sort_recommend" value="<?php echo $menus['recommend']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_recommend" value="1" <?php if($menus['recommend']['display']){echo 'checked';} ?> /></td>
</tr>
<tr style="display:none">
<td><img src="tpl/User/default/common/images/photo/plugmenu19.png" align="absmiddle" style=" background-color:#CCC;width:32px;"></td>
<td>其他</td>
<td><input class="px" type="text" style="width:250px;" name="url_other" value="<?php echo $menus['other']['url']; ?>"></td>
<td><input type="text" name="sort_other" value="<?php echo $menus['other']['taxis']; ?>" class="px" style="width:50px;"></td>
<td><input class="checkbox" type="checkbox" name="display_other" value="1" <?php if($menus['other']['display']){echo 'checked';} ?> /></td>
</tr>
             
                 <tr>
                 	<td colspan="5" class="norightborder" align="center">
                 		<button type="submit" name="batchsubmit" value="true" class="btn btn-success"><strong>保存</strong></button></td>
                 	</tr>
  </tbody></table>
</div>
</div>



     <script>

$(document).ready(function(){
 
 
  $(".checkbox").click(function(){
var i=0; 
 
  $("input:checked").each(function(){
  
 
    i++;
  
  });
 if(i>4){
 alert('最多只显示四项');
 }
});

});



</script>

 
   
          </div>
  
        </div></form>
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