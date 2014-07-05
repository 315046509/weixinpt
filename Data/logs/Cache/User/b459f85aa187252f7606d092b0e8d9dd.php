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
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<script src="<?php echo RES;?>/js/cart/jscolor.js" type="text/javascript"></script>
<style type="text/css">
.vipcard{
margin: 0 auto;
position: relative;
height: 159px;
text-align: left;
width: 267px;
}
#cardbg{
height: 159px;
width: 267px;
position:absolute;
border-radius: 8px;
-webkit-border-radius:8px;
-moz-border-radius:8px;
box-shadow: 0 0 4px rgba(0, 0, 0, 0.6);
-moz-box-shadow:0 0 4px rgba(0, 0, 0, 0.6);
-webkit-box-shadow:0 0 8px rgba(0, 0, 0, 0.6);
top:0;
left:0;
z-index:1;
}
.vipcard .logo {
max-height:70px;
position:absolute;
top:8px;
left:5px;
z-index:2;
}
.vipcard .verify {
display:inline-block;
height:40px;
top:105px;
right:12px;
text-align:right;
line-height:24px;
color:#000;
font-size:20px;
text-shadow:0 1px rgba(255, 255, 255, 0.2);
z-index:2;
}
.vipcard h1 {
position:absolute;
right:10px;
top:7px;
text-shadow:0 1px rgba(255, 255, 255, 0.2);
color:#000;
font-size:11px;
line-height:25px;
text-align:right;
font-weight: normal;
z-index:2;
}
.vipcard .verify span {
display:inline-block;
text-align:left;
}
.vipcard .verify em {
display:block;
line-height:13px;
font-size:10px;
font-weight:normal;
font-style:normal;
}
.pdo {
position:absolute;
top:0;
left:0;
display:inline-block;
}
.userinfoArea td {
    padding: 8px 0 0px 15px;
}
#tishi{
text-align: center;display: block;
}
.banner{
display:block; width:213px;height: 278px;overflow: hidden;
}
.banner img{
display:block; width:213px; border:0;
}
.bannerbtn{ position:relative; display:block}
.bannerbtn .qiaodaobtn{ position: absolute; display:block; bottom:0}
</style>
  <form class="form" method="post" action="" target="_top" enctype="multipart/form-data">
<div class="content" style="width:95%; background:none; margin-left:25px; border:none; margin-bottom:30px; margin-top:30px;" >
  <div class="cLine">
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="/index.php?g=User&m=Member_card&a=design&token=<?php echo ($token); ?>&id=<?php echo ($card["id"]); ?>"> <i class="icon-cog"></i> 卡片设置 </a> </li>
      <li class="bg_dy"> <a href="/index.php?g=User&m=Member_card&a=create&token=<?php echo ($token); ?>&id=<?php echo ($card["id"]); ?>"> <i class="icon-dashboard"></i> 在线开卡</a> </li>
      <li class="bg_lg"> <a href="/index.php?g=User&m=Member_card&a=exchange&token=<?php echo ($token); ?>&id=<?php echo ($card["id"]); ?>"> <i class="icon-cogs"></i> 积分设置</a> </li>
      <li class="bg_ly"> <a href="/index.php?g=User&m=Member_card&a=notice&token=<?php echo ($token); ?>&id=<?php echo ($card["id"]); ?>"> <i class="icon-book"></i> 设置通知 </a> </li>
      <li class="bg_lo"> <a href="/index.php?g=User&m=Member_card&a=privilege&token=<?php echo ($token); ?>&id=<?php echo ($card["id"]); ?>"> <i class="icon-camera-retro"></i> 会员特权 </a> </li>
      <li class="bg_ls"> <a href="/index.php?g=User&m=Member_card&a=coupon&token=<?php echo ($token); ?>&id=<?php echo ($card["id"]); ?>"> <i class="icon-picture"></i> 优惠券</a> </li>
      <li class="bg_lr"> <a href="/index.php?g=User&m=Member_card&a=integral&token=<?php echo ($token); ?>&id=<?php echo ($card["id"]); ?>"> <i class="icon-magic"></i> 礼品券</a> </li>
      <li class="bg_lv"> <a href="/index.php?g=User&m=Member_card&a=members&token=<?php echo ($token); ?>&id=<?php echo ($card["id"]); ?>"> <i class="icon-eye-open"></i> 会员管理</a> </li>
      <li class="bg_lh"> <a href="/index.php?g=User&m=Member_card&a=staff&token=<?php echo ($token); ?>&id=<?php echo ($card["id"]); ?>"> <i class="icon-globe"></i> 管理员设置</a> </li>
    </ul>
  </div>
         <h4>会员卡版面设置<span class="FAQ">开始DIY你的会员卡吧，logo、背景以及字体颜色都可以自由调整。</span></h4><a href="javascript:history.go(-1);" class="right btn btn-info" style="margin-top:-27px">返回</a></div>  
<div class="msgWrap bgfc">
<table class="userinfoArea" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%"><tbody>
<tr>
<th width="303" rowspan="5" valign="top">
	<div class="vipcard">
		<img id="cardbg" src="<?php if($card["diybg"] != ''): echo ($card["diybg"]); else: echo ($card["bg"]); endif; ?>">
		<img id="cardlogo" class="logo" src="<?php echo ($card["clogo"]); ?>">
		<h1 id="vipname" style="color:<?php echo ($card["vipnamecolor"]); ?>;"><?php echo ($card["cardname"]); ?>会员卡</h1>
		<strong class="pdo verify" id="number" style="color:<?php echo ($card["numbercolor"]); ?>"><span><em>会员卡号</em>6537 1998</span></strong>
	</div>
</th>
<td colspan="2">会员卡的名称：
<input type="text" name="cardname" value="<?php echo ($card["cardname"]); ?>" id="cardname" class="px" style="width:200px;" onkeyup="DivFollowingText()"> 
<script type="text/javascript">
function DivFollowingText()
{
document.getElementById("vipname").innerHTML=document.getElementById("cardname").value;
}
</script> 
颜色：
<input type="text" name="vipnamecolor" id="vipnamecolor" value="<?php echo ($card["vipnamecolor"]); ?>" class="px color" style="width: 55px; background:<?php echo ($card["vipnamecolor"]); ?>; color: rgb(255, 255, 255);" onblur="document.getElementById('vipname').style.color=document.getElementById('vipnamecolor').value;">
</td>
</tr>
<tr>
<td colspan="2">最低积分要求：
<input type="text" name="miniscore" id="miniscore" value="<?php echo ($card["miniscore"]); ?>" class="px" style="width:100px;">  只有到达(含)这个积分后才可以申领此卡</td>
</tr>
<tr>
<td colspan="2">会员卡的图标：
<input type="text" name="clogo" id="clogo" class="px" value="<?php echo ($card["clogo"]); ?>" style="width:200px;"> 
<input type="button" onclick="document.getElementById(&#39;cardlogo&#39;).src=document.getElementById(&#39;clogo&#39;).value;" value="显示效果" class='btn'> 
      <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('clogo',1000,600,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('clogo')">预览</a></td>
</tr>
<tr>
<td colspan="2">会员卡的背景：
	<select name="bg" onchange="document.getElementById(&#39;cardbg&#39;).src=this.options[this.selectedIndex].value;" class="pt" style="width:210px;"> 
	<option selected="">请选择会员卡背景图</option>
		<?php  for($i=1;$i<=23;$i++){ $i=$i<10?'0'.$i:$i; $str='./tpl/User/default/common/images/card/card_bg'.$i.'.png'; if($card['bg']==$str){ echo $str='<option value="'.$str.'" selected="selected" >'.$i.'</option>'; }else{ echo $str='<option value="'.$str.'">'.$i.'</option>'; } } ?>
		
	</select>
</td>
</tr>
<td colspan="2">自己设计背景：
	<input type="text" name="diybg" id="bg" class="px" value="<?php echo ($card["diybg"]); ?>" style="width:200px;"> 
	<input type="button" onclick="document.getElementById(&#39;cardbg&#39;).src=document.getElementById(&#39;bg&#39;).value;" value="显示效果" class='btn'> 
	  <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('bg',1000,600,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('bg')">预览</a> 背景图
</td>
</tr>
<tr>
<td colspan="2">卡号文字颜色：
<input type="text" name="numbercolor" id="numbercolor" value="<?php echo ($card["numbercolor"]); ?>" class="px color" style="width: 55px; background-image: none; background-color: rgb(0, 0, 0); color: rgb(255, 255, 255);" onblur="document.getElementById('number').style.color=document.getElementById('numbercolor').value;"> </td>
</tr>
<tr>
<td><span id="tishi"></span></td>
<td colspan="2">首页提示文字：
<input type="text" name="msg" value="<?php echo ($card["msg"]); ?>" id="tishi2" class="px" style="width:287px;" onkeyup="DivFollowingText2()"> 请不要超过20个字。
<script type="text/javascript">
function DivFollowingText2()
{
document.getElementById("tishi").innerHTML=document.getElementById("tishi2").value;
}
</script></td>
</tr>
<tr>
<th valign="top" height="40"></th>
<td colspan="2"><span class="red">备注：Logo宽370px高170px，图案上下左右居中，背景图宽534px高318px，图片类型png。</span><a href="<?php echo RES;?>/images/cart_info/template.rar" class="green">请下载模板</a></td>
</tr>
<tr>
<th>&nbsp;</th>
<td width="70">&nbsp;</td>
<td><button type="submit" name="button" class="btn btn-success">保存</button></td>
</tr>
</tbody>
</table>
  </div> 
<div class="cLineB">
          	<h4>各内容页头部Benner图片设置<span class="FAQ">根据你企业的特色设计内容页头部图片，完全展示出不同的会员卡风格。</span></h4></div> 
<div class="msgWrap bgfc">
  	<table class="userinfoArea" style=" margin: 0;" border="0" cellspacing="0" cellpadding="0" width="100%"><tbody>
	 <tr>
		<td align="center" valign="top">
			<div class="banner">
				<img src="<?php echo RES;?>/images/cart_info/news-2.jpg">
				<img id="news2_src" src="<?php echo ($card["Lastmsg"]); ?>">
				<img src="<?php echo RES;?>/images/cart_info/news-3.jpg">
			</div>
		</td>
		<td align="center" valign="top">
			<div class="banner">
				<img src="<?php echo RES;?>/images/cart_info/vippower-2.jpg">
				<img id="vippower2_src" src="<?php echo ($card["vip"]); ?>">
				<img src="<?php echo RES;?>/images/cart_info/vippower-3.jpg"></div>
		</td>
		<td align="center" valign="top">
			<div class="banner">
				<img src="<?php echo RES;?>/images/cart_info/qiandao-2.jpg">
				<img id="qiandao2_src" src="<?php echo ($card["qiandao"]); ?>">
				<div class="bannerbtn">
					<img src="<?php echo RES;?>/images/cart_info/qiandao-3.jpg">
					<img class="qiaodaobtn" src="<?php echo RES;?>/images/cart_info/qiandao-4.png">
				</div>
			</div>
		</td>
		<td align="center" valign="top">
			<div class="banner">
				<img src="<?php echo RES;?>/images/cart_info/shopping-2.jpg">
				<img id="shopping2_src" src="<?php echo ($card["shopping"]); ?>">
				<img src="<?php echo RES;?>/images/cart_info/shopping-3.jpg">
			</div>
		</td>
	</tr>
<tr>
<td align="center">上传或填写外链地址查看效果</td>
<td align="center">上传或填写外链地址查看效果</td>
<td align="center">上传或填写外链地址查看效果</td>
<td align="center">上传或填写外链地址查看效果</td>
</tr>
<tr>
	<td align="center">
		<textarea name="Lastmsg" class="px" id="news2" style="width:210px; height:36px" onblur="document.getElementById('news2_src').src=document.getElementById('news2').value;"><?php echo ($card["Lastmsg"]); ?></textarea><br><script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('news2',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('news2')">预览</a>
	</td>
	<td align="center">
		<textarea name="vip" class="px" id="vippower2" style="width:210px; height:36px" onblur="document.getElementById('vippower2_src').src=document.getElementById('vippower2').value;"><?php echo ($card["vip"]); ?></textarea><br><script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('vippower2',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('vippower2')">预览</a>
	</td>
	<td align="center">
		<textarea name="qiandao" class="px" id="qiandao2" style="width:210px; height:36px" onblur="document.getElementById('qiandao2_scr').src=document.getElementById('qiandao2').value;"><?php echo ($card["qiandao"]); ?></textarea><br><script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('qiandao2',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('qiandao2')">预览</a>
	</td>
	<td align="center">
		<textarea name="shopping" class="px" id="shopping2" style="width:210px; height:36px" onblur="document.getElementById('shopping2_src').src=document.getElementById('shopping2').value;"><?php echo ($card["shopping"]); ?></textarea><br><script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('shopping2',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('shopping2')">预览</a>
	</td>
 </tr>
<tr>
<td></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td align="center" valign="top">
	<div class="banner">
		<img src="<?php echo RES;?>/images/cart_info/user-2.jpg">
		<img id="user2_src" src="<?php echo ($card["memberinfo"]); ?>">
		<img src="<?php echo RES;?>/images/cart_info/user-3.jpg">
	</div>
</td>
<td align="center" valign="top">
	<div class="banner">
		<img src="<?php echo RES;?>/images/cart_info/info-2.jpg">
		<img id="info2_src" src="<?php echo ($card["membermsg"]); ?>">
		<img src="<?php echo RES;?>/images/cart_info/info-3.jpg">
	</div>
</td>
<td align="center" valign="top">
	<div class="banner">
		<img src="<?php echo RES;?>/images/cart_info/addr-2.jpg">
		<img id="addr2_src" src="<?php echo ($card["contact"]); ?>">
		<img src="<?php echo RES;?>/images/cart_info/addr-3.jpg">
	</div>
</td>
<td align="center" valign="middle">
	<span class="red">备注：图片宽640px高109px或者更高，</p>但是不要高太多；图片类型为jpg，</p>签到图片外与其他图片高度不同，</p>尽量根据模板图片修改。</span>
</td>
</tr>
<tr>
<td align="center">上传或填写外链地址查看效果</td>
<td align="center">上传或填写外链地址查看效果</td>
<td align="center">上传或填写外链地址查看效果</td>
<td>&nbsp;</td>
</tr>
<tr>
<td align="center">
	<textarea name="memberinfo" class="px" id="user2" style="width:210px; height:36px" onblur="document.getElementById('user2_src').src=document.getElementById('user2').value;"><?php echo ($card["memberinfo"]); ?></textarea><br><script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('user2',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('user2')">预览</a>
</td>
<td align="center">
	<textarea name="membermsg" class="px" id="info2" style="width:210px; height:36px" onblur="document.getElementById('info2_src').src=document.getElementById('info2').value;"><?php echo ($card["membermsg"]); ?></textarea><br><script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('info2',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('info2')">预览</a>
</td>
<td align="center">
	<textarea name="contact" class="px" id="addr2" style="width:210px; height:36px" onblur="document.getElementById('addr2_src').src=document.getElementById('addr2').value;"><?php echo ($card["contact"]); ?></textarea><br><script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('addr2',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('addr2')">预览</a>
</td>
<td><button type="submit" name="button" class="btn btn-success">保存</button></td>
</tr>
</tbody>
</table>
  </div> 
        </div>
</form>
        <div class="clr"></div>
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

      </div>
    </div>
  </div>