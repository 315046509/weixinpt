<?php if (!defined('THINK_PATH')) exit();?>﻿﻿<!DOCTYPE html>
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
<!--鼠标移动上去效果start-->
<style>
    li .mbtip {
    display: none;
} 
.cateradio li:hover .mbtip {
    background-color: #000000;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 7px;
    box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.15);
    color: #FFFFFF;
    display: block;
    padding: 6px;
    float:right;
   /* position:relative;
    right:-140px;
    top:-325px;	*/
    width: 130px;
    text-align: left;
    z-index: 999;
}

</style>

<!--中间内容-->
<style type="text/css">
.cateradio5 { margin-top:20px }
.cateradio5 li { float: left; margin: 0 0 20px 20px; width: 170px; height: 383px; text-align: center; background: url(index/images/radio_iphone.png) no-repeat center top; position: relative; }
.phome{ position: fixed; top:50%; right:1px; margin-top:-28px; z-index:999}
.blue {border: 0;}
</style>

<div class="phome"><a id="homeurl2" target="_blank" href="<?php echo C('site_url');?>/index.php?g=Wap&m=Index&a=index&token=<?php echo ($token); ?>&wecha_id={wechat_id}"><img src="http://img.ishangtong.com/stylepage/phome.png"></a></div>

<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.css" />
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<div class="content" style="width:95%; background:none; margin-left:25px; border:none; margin-bottom:30px; margin-top:10px;" >
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
    <h4>模板管理 <span class="FAQ">选择适合您的模版风格，手机输入“首页”测试效果。</span></h4>
  </div>
  <div class="msgWrap form">
    <ul id="tags" style="width:940px;">
      <li class="selectTag"><a onclick="selectTag('tagContent0',this)" href="javascript:void(0)">1. 栏目首页模板风格</a> </li>
      <li><a onclick="selectTag('tagContent1',this)" href="javascript:void(0)">2.图文列表模板风格</a> </li>
      <li><a onclick="selectTag('tagContent2',this)" href="javascript:void(0)">3.图文详细页模板风格</a> </li>
      <li><a onclick="selectTag('tagContent3',this)" href="javascript:void(0)">4.颜色风格&预览</a> </li>
      <div class="clr"></div>
    </ul>
<link href="<?php echo STATICS;?>/tmpls/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STATICS;?>/tmpls/css/product.css" rel="stylesheet" type="text/css" />
<script src="<?php echo STATICS;?>/tmpls/js/jquery.tools.min.js" type="text/javascript"></script> 
<script src="<?php echo STATICS;?>/tmpls/js/jquery.mixitup.min.js" type="text/javascript"></script>
          <div id=tagContent>
            <div class="tagContent   selectTag " id="tagContent0">
              <fieldset>
                <div class="g filterBox">
                  <h1>按功能选择:</h1>
                  <ul class="filterBtn">
                    <li class="filter" data-filter="ck"><p>我选中的模版</p><i></i></li>
                    <li class="filter on active" data-filter="all"><p>全部模版</p><i></i></li>
                    <li class="filter" data-filter="sub"><p>支持二级分类</p><i></i></li>
                    <li class="filter" data-filter="focu"><p>支持幻灯片</p><i></i></li>
                    <li class="filter" data-filter="bg"><p>支持自定义背景</p><i></i></li>
                    <li class="filter" data-filter="thumb"><p>带缩略图</p><i></i></li>
                    <li class="filter" data-filter="filt"><p>半透明版块</p><i></i></li>
                    <li class="filter" data-filter="bgs"><p>支持背景音乐</p><i></i></li>
                    <li class="filter" data-filter="slip"><p>支持左右滑动</p><i></i></li>
                    <li class="filter" data-filter="black"><p class="p-black">黑色</p><i></i></li>
                    <li class="filter" data-filter="orange"><p class="p-orange">橙色</p><i></i></li>
                    <li class="filter" data-filter="red2"><p class="p-red">红色</p><i></i></li>
                    <li class="filter" data-filter="pink"><p class="p-pink">粉色红</p><i></i></li>
                    <li class="filter" data-filter="green2"><p class="p-green">绿色</p><i></i></li>
                    <li class="filter" data-filter="blue"><p class="p-blue">蓝色</p><i></i></li>
                    <li class="filter" data-filter="purple"><p class="p-purple">紫色</p><i></i></li>
                    <li class="filter" data-filter="brown"><p class="p-brown">棕色</p><i></i></li>
                    
                    <li class="filter" data-filter="white"><p class="p-white">白色</p><i></i></li>
                    <li class="filter" data-filter="color"><p class="p-color">五彩缤纷</p><i></i></li>
                  </ul>
                  
                </div>
				<ul class="cateradio g grid" id="grid">
					<?php if(is_array($tpl)): $i = 0; $__LIST__ = $tpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tpl): $mod = ($i % 2 );++$i;?><li class="mix <?php echo ($tpl["attr"]); ?> <?php if($info['tpltypeid'] == $tpl['tpltypeid']) echo 'ck active'; ?>">
							<div class="mbtip"><?php echo (($tpl["tpldesinfo"])?($tpl["tpldesinfo"]):'暂无模板描述'); ?></div>
							<label>
								<img src="/tpl/User/default/common/images/<?php echo ($tpl["tplview"]); ?>">
								<input class="radio" type="radio"<?php if($info['tpltypeid'] == $tpl['tpltypeid']): ?>checked<?php endif; ?> name="optype" value="<?php echo ($tpl["tpltypeid"]); ?>">
								模板<?php echo ($tpl["tpltypeid"]); ?>
								</label>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					<div style="clear:both"></div>
                </ul>
			</fieldset>
        </div> 
            <div class="tagContent" id="tagContent1">
                <fieldset style="width:100%;height:400px;">

					<p style="font-size:16px;text-indent:20px;padding-top:50px;">
						1、微网站系统支持无限级分类</p><p style="font-size:16px;text-indent:20px;padding-top:20px;">
						2、每个分类可以设置不同的模板样式，请在分类管理中选择模板
					</p>
                </fieldset>
            </div>
            <div class="tagContent" id="tagContent2">
                <fieldset style="width:100%;height:400px;">
					<p style="font-size:16px;text-indent:20px;padding-top:50px;">
						1、微网站系统支持无限级分类</p><p style="font-size:16px;text-indent:20px;padding-top:20px;">
						2、每个分类可以设置不同的模板样式，请在分类管理中选择模板
					</p>
                </fieldset>
            </div>	
      
      <div class="tagContent" id="tagContent3">
        <fieldset>
          <div class="cateradio4">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td width="400" rowspan="2" valign="top"><div class="samsung-render">
                      <iframe src="/index.php?g=Wap&m=Index&token=<?php echo ($info["token"]); ?>&show=1" id="myiframe" width="320" height="406" frameborder="0" style="overflow-x:hidden;"></iframe>
                    </div></td>
                  <td valign="top"><h3>请选择你喜欢的颜色风格，实时预览 (<span style="color:#c30">注意：只有在手机上才能获得最佳浏览效果，电脑浏览并不一定是最终显示效果，并且仅部分模板支持更换颜色风格</span>)</h3>
                    <ul>
                      <li>
                        <label><input class="radio4" type="radio" name="optype4" value="0" 
                          <?php if(($info["color_id"]) == "0"): ?>checked="checked"<?php endif; ?>
                          > 默认风格</label>
                      </li>
                      <li>
                        <label><input class="radio4" type="radio" name="optype4" value="1" 
                          <?php if(($info["color_id"]) == "1"): ?>checked="checked"<?php endif; ?>
                          > 黑色风格</label>
                      </li>
                      <li>
                        <label><input class="radio4" type="radio" name="optype4" value="2" 
                          <?php if(($info["color_id"]) == "2"): ?>checked="checked"<?php endif; ?>
                          > 蓝色风格</label>
                      </li>
                      <li>
                        <label><input class="radio4" type="radio" name="optype4" value="3" 
                          <?php if(($info["color_id"]) == "3"): ?>checked="checked"<?php endif; ?>
                          > 木纹风格</label>
                      </li>
                      <li>
                        <label><input class="radio4" type="radio" name="optype4" value="4" 
                          <?php if(($info["color_id"]) == "4"): ?>checked="checked"<?php endif; ?>
                          > 橙色风格</label>
                      </li>
                      <li>
                        <label><input class="radio4" type="radio" name="optype4" value="5" 
                          <?php if(($info["color_id"]) == "5"): ?>checked="checked"<?php endif; ?>
                          > 紫色风格</label>
                      </li>
                      <li>
                        <label><input class="radio4" type="radio" name="optype4" value="6" 
                          <?php if(($info["color_id"]) == "6"): ?>checked="checked"<?php endif; ?>
                          > 绿色风格</label>
                      </li>
                    </ul></td>
                </tr>
              </tbody>
            </table>
            <div class="clr"></div>
          </div>
        </fieldset>
      </div>
    </div>
    <script type="text/javascript">
            function selectTag(showContent,selfObj){
                // 操作标签
                var tag = document.getElementById("tags").getElementsByTagName("li");
                var taglength = tag.length;
                for(i=0; i<taglength; i++){
                    tag[i].className = "";
                }
                selfObj.parentNode.className = "selectTag";
                // 操作内容
                for(i=0; j=document.getElementById("tagContent"+i); i++){
                    j.style.display = "none";
                }
                document.getElementById(showContent).style.display = "block";


            }
        </script>
       <script>

            $(".radio").click(function(){
                $(".cateradio li").each(function(){
                    $(this).removeClass("active");
                });
                $(this).parents("li").addClass("active");
                var myurl='index.php?g=User&m=Tmpls&a=add&style='+$(this).val()+'&r='+Math.random(); 
                $.ajax({url:myurl,async:false});

//                $("#homeurl").attr("href","http://baidu.com/index.php?ac=cate"+$(this).val()+"&tid=9379&w=1");
                $("#myiframe").attr("src",$("#myiframe").attr("src")+'&r='+Math.random());


            });
            $(".radio2").click(function(){
                $(".cateradio2 li").each(function(){
                    $(this).removeClass("active");
                });
                $(this).parents("li").addClass("active");
  
                var myurl ='index.php?g=User&m=Tmpls&a=lists&style='+$(this).val()+'&r='+Math.random(); 
                $.ajax({url:myurl,async:false});


            });
            $(".radio3").click(function(){
                $(".cateradio3 li").each(function(){
                    $(this).removeClass("active");
                });
                $(this).parents("li").addClass("active");
  
                var myurl='index.php?g=User&m=Tmpls&a=content&style='+$(this).val()+'&r='+Math.random(); 
                $.ajax({url:myurl,async:false});

            });
            $(".radio4").click(function(){
                var myurl='index.php?g=User&m=Tmpls&a=background&style='+$(this).val()+'&r='+Math.random(); 
                $.ajax({url:myurl,async:false});
                $("#myiframe").attr("src",$("#myiframe").attr("src")+'&r='+Math.random());
            });
            function changeapp(obj,gid){
                if(obj.checked==true){
                    //var image=new Image();   
                    var myurl='index.php?ac=app&op=open&value=1&id=9379&wxid=gh_858dwjkeww5&openid='+gid+'&r='+Math.random(); 
                    $.ajax({url:myurl,async:false});

                }else{
 
                    var myurl='index.php?ac=app&op=open&value=0&id=9379&wxid=gh_858dwjkeww5&openid='+gid+'&r='+Math.random(); 
                    $.ajax({url:myurl,async:false});

                }
            }

        </script>
  </div>
</div>
</div>
</div>
</div>
<!--底部-->
</div>
<script>
    KindEditor.ready(function(K) {
        var editor = K.editor({
            allowFileManager : true
        });

        K('#image').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    showRemote : false,
                    imageUrl : K('#img').val(),
                    clickFn : function(url, title, width, height, border, align) {
                        K('#img').val(url);
                        var show_img = '<img src = "' + url + '" width="80" height="80" />';
                        $('#show_img').html(show_img);
                        editor.hideDialog();
                    }
                });
            });
        });
    });
</script>

<!--选择首页模板-->
<script>
$(function(){

//列表hover效果
$(".grid li").hover(
function(){
$(this).addClass("hover");
},
function(){
$(this).removeClass("hover");
}
);
$(".prdInfo").click(function(){
return false;
});

$('#grid').mixitup({layoutMode: 'grid'});
});
</script> 
	  
	  
<script>
/*
$(".radio").click(function(){
  $(".cateradio li").each(function(){
    $(this).removeClass("active ck");
  });
  $(this).parents("li").addClass("active ck");
//ajax换模板

});
*/
            $(".radio").click(function(){
                $(".cateradio li").each(function(){
                    $(this).removeClass("active ck");
                });
                $(this).parents("li").addClass("active ck");
                var myurl='index.php?g=User&m=Tmpls&a=add&style='+$(this).val()+'&r='+Math.random(); 
                $.ajax({url:myurl,async:false});

                $("#myiframe").attr("src",$("#myiframe").attr("src")+'&r='+Math.random());


            });
</script>
</div></div>
<!--Footer-part-->
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

</body>
</html>