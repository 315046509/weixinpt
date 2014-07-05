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
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/default_user_com.css" media="all">
<script src="./tpl/User/default/common/js/date/WdatePicker.js"></script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo RES;?>/daterangepicker/daterangepicker-bs3.css" />
<script type="text/javascript" src="<?php echo RES;?>/daterangepicker/moment.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/daterangepicker/daterangepicker.js"></script>

<link rel="stylesheet" href="<?php echo STATICS;?>/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src="<?php echo STATICS;?>/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo STATICS;?>/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
 <script>
    jQuery(document).ready(function(){
      jQuery("#formID").validationEngine();
    });
    </script>
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

<link rel="stylesheet" type="text/css" href="./tpl/User/default/common/css/cymain.css" />
<div class="tab">
<ul>
<li class="<?php if(ACTION_NAME == 'index'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Medical/index',array('token'=>$token,'addtype'=>'medical'));?>">挂号设置</a></li>
<li class="<?php if(ACTION_NAME == 'reser_manage'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Medical/reser_manage',array('token'=>$token));?>">预约管理</a></li>
<!-- <li class="<?php if(ACTION_NAME == 'housetype'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Medical/searchMedical',array('token'=>$token));?>">预约查询</a></li>
<li class="<?php if(ACTION_NAME == 'album'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Medical/totalMedical',array('token'=>$token));?>">预约统计</a></li> -->
<li class="<?php if(ACTION_NAME == 'aboutus'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Medical/aboutus',array('token'=>$token));?>">医院简介</a></li>
<li class="<?php if(ACTION_NAME == 'setIndex'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Medical/setIndex',array('token'=>$token));?>">首页配置</a></li>
</ul>
</div>
 <a href="javascript:history.go(-1);return false;" class="right btnGrayS vm" style="margin-top:-27px">返回</a>
 </div>
  <div class="msgWrap">
  <form action="" method="post" id="formID" class="form-horizontal form-validate" novalidate="novalidate">
 <input type="hidden" name="rid" id="rid" value="123"/>
 <?php if($reslist['id'] != ''): ?><input type="hidden" name="id" id="id" value="<?php echo ($reslist['id']); ?>"/><?php endif; ?>
    <div class="control-group">
        <label for="title" class="control-label">图文消息标题：</label>
        <div class="controls">
           <input type="text" placeholder="请输入图文消息标题" name="title" id="title" class="span4"  data-validation-engine="validate[required,minSize[2],maxSize[25]]" data-errormessage-value-missing="必填项"  value="<?php echo ($reslist['title']); ?>" schoolSet /><span class="maroon">*</span><span class="help-inline">尽量简单，不要超过25字</span>
        </div>
    </div>

    <div class="control-group">
        <label for="coverurl" class="control-label">图文封面：</label>
       <div class="controls">
      <img class="thumb_img" id="picurl_src" src="<?php echo (($reslist['picurl'])?($reslist['picurl']):'tpl/User/default/common/images/medical_default.png'); ?>" style="max-height:100px;">
      <input id="picurl" type="text" class="span4" name="picurl" class="input-xlarge"  schoolSet  value="<?php echo (($reslist['picurl'])?($reslist['picurl']):'tpl/User/default/common/images/medical_default.png'); ?>" data-validation-engine="validate[required,custom[url]]"
                    data-errormessage-value-missing="必须上传图片!"  data-errormessage-custom-error="如果是手动填写,正确的网址,如: http://www.baidu.com/images/demo.png"/>
          <span class="help-inline">
               <script src="<?php echo STATICS;?>/upyun.js"></script><a href="###" onclick="upyunPicUpload('picurl',720,400,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('picurl')">预览</a>
              <span class="help-inline">建议尺寸：宽720像素，高400像素</span>
          </span>
       </div>
    </div>

      <div class="control-group">
         <label for="project_brief" class="control-label">挂号页头部图片:</label>
          <div class="controls">
             <img class="thumb_img" id="headpic_src" src="<?php echo (($reslist['headpic'])?($reslist['headpic']):'tpl/User/default/common/images/medical_default.png'); ?>" style="max-height: 100px;">
              <input id="headpic"type="text"class="input-large" name="headpic" class="span4 px"  schoolSet data-rule-url="true" value="<?php echo (($reslist['headpic'])?($reslist['headpic']):'tpl/User/default/common/images/medical_default.png'); ?>" data-validation-engine="validate[required,custom[url]]"
                    data-errormessage-value-missing="必须上传图片!"  data-errormessage-custom-error="如果是手动填写,正确的网址,如: http://www.baidu.com/images/demo.png"/>
            <span class="maroon">*</span>
            <span class="help-inline">
            <a href="###" onclick="upyunPicUpload('headpic',640,109,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('headpic')">预览</a>
            <span class="help-inline">建议尺寸：宽640像素，高109像素</span>
         </div>
        <script>
function setlatlng(longitude,latitude){
  art.dialog.data('longitude', longitude);
  art.dialog.data('latitude', latitude);
  art.dialog.open('<?php echo U('Map/setLatLng',array('token'=>$token,'id'=>$id));?>',{lock:false,title:'设置经纬度',width:600,height:400,yesText:'关闭',background: '#000',opacity: 0.87});
}
</script>
     <div class="control-group">
                                <label for="address" class="control-label">医院详细地址:</label>
                                <div class="controls">
                                    <input type="text" name="address" id="address" class="span4"  value="<?php echo ($reslist['address']); ?>" schoolSet  placeholder="请输入接待预约用户的地址" data-validation-engine="validate[required,minSize[5]]" data-errormessage-value-missing="必填项" /><span class="maroon">*</span><span class="help-inline">如温州市鹿城区南二环路3818号某某医院</span>
                                </div>
                             </div>
    <div class="control-group">
    <label for="suggestId" class="control-label">地图标识：</label>
         <div class="controls">
          <span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注！</span><br />
                经度 <input type="text" id="longitude"  name="lng" size="14" class="span4" value="<?php echo ($reslist['lng']); ?>" />
                纬度 <input type="text"  name="lat" size="14" id="latitude" class="span4" value="<?php echo ($reslist['lat']); ?>" />
                <a href="###" onclick="setlatlng($('#longitude').val(),$('#latitude').val())">在地图中查看/设置</a>
         </div>
    </div>

<div class="control-group">
         <label for="estate_desc" class="control-label">医院电话：</label>
         <div class="controls">
             <input type="text" name="tel" id="tel" class="span4" value="<?php echo ($reslist['tel']); ?>"
             data-validation-engine="validate[required,custom[tel]]" data-errormessage-value-missing="必填项"   placeholder="请输入接收预约的电话号码"/><span class="maroon">*</span><span class="help-inline">如 0577-65371998</span>
         </div>
     </div>

     </div>
     <div class="control-group">
        <label for="traffic_desc" class="control-label">图文简介：</label>
        <div class="controls">
          <textarea class="px" id="info" name="info" style="width:560px;height:75px"  data-validation-engine="validate[required,minSize[5]]" data-errormessage-value-missing="必填项"  placeholder="显示在图文封面下方，文字请尽量的简洁"><?php echo ($reslist['info']); ?></textarea>
        </div>
    </div>
<div class="control-group">
      <label for="typename" class="control-label">预约信息设置：</label>
       <div class="controls">
           <input type="text" class="span4" name="typename" value="<?php echo (($reslist['typename'])?($reslist['typename']):'我的挂号订单'); ?>" id="typename" schoolSet />
    <span class="maroon">*</span><span class="help-inline">修改用户手机中“我的订单”栏目的名称，您可以将其修改成诸如“挂号订单”、“我的订单”等</span>
       </div>
</div>
<div class="control-group" style="display: none;">
 <label for="typename2" class="control-label">重命名订单说明：</label>
<div class="controls">
    <input type="text" class="span4" name="typename2" value="<?php echo (($reslist['typename2'])?($reslist['typename2']):'订单说明'); ?>" id="typename2"/>
     <span class="maroon">*</span><span class="help-inline">用户修改用户手机中“订单说明”栏目的名称，您可以将其修改成诸如“预约说明”、“试驾说明”等</span>
 </div>
</div>
<div class="control-group" style="display: none;">
    <label for="typename3" class="control-label">预约信息设置：</label>
    <div class="controls">
         <input type="text" class="span4" name="typename3" value="<?php echo (($reslist['typename3'])?($reslist['typename3']):'订单电话'); ?>" id="typename3"/>
         <span class="maroon">*</span><span class="help-inline">用户修改用户手机中“订单电话”栏目的名称，您可以将其修改成诸如“预约电话”、“试驾电话”等</span>
     </div>
</div>




    <script type="text/javascript">
    $(function () {
         $("input[type='radio']").click(function () {
            var $this = $(this), $val = $this.val(), $div = $this.parents(".control-group");
            if ($val == 1) {
                $div.next().show();
                $div.next().next().hide();
                $("#type1").show();
                $("#type2").hide();
                $("#type3").hide();
            } else {
                $div.next().next().show();
                $div.next().hide();
                if($val == 2){
                    $("#type2").show();
                    $("#type1").hide();
                    $("#type3").hide();
                }else{
                    $("#type3").show();
                    $("#type1").hide();
                    $("#type2").hide();
                }
            }
         })
            </script>

<script>
function dodelit(i) {
   document.getElementById("txt" + i).value = "";
   document.getElementById("value" + i).value = "";
   if (i != 1) {
       document.getElementById("trtxt" + i).style.display = "none";
       document.getElementById("add" + i).style.display = "";
   }
}
   function doaddit(i) {

    document.getElementById('trtxt' + i).style.display = "";
   document.getElementById('add' + i).style.display = "none";
}

function sdodelit(i) {

    document.getElementById("select" + i).value = "";
    document.getElementById("svalue" + i).value = "";
    if (i != 1) {
        document.getElementById("strtxt" + i).style.display = "none";
       document.getElementById("sadd" + i).style.display = "";
    }
}
function sdoaddit(i) {

     document.getElementById('strtxt' + i).style.display = "";
     document.getElementById('sadd' + i).style.display = "none";
}
  </script>

<div class="control-group" >
        <label for="tel" class="control-label">订单内容设置：</label>
        <div class="controls">
            <span class="help-inline">填写你要收集的内容！订单默认选项不可以修改删除！<font color="red">如果手动添加的项想删除,把[字段名称]\[初始内容]里的值清空提交即可.</font></span>
<table id="listTable" class="ListProduct table table-bordered table-hover dataTable">
    <thead>
        <tr>
            <th>字段类型</th>
             <th>字段名称</th>
             <th>初始内容</th>

            <th>操作</th>
        </tr>
    </thead>
<tbody>
    <tr>
        <td>单行文字：</td>
        <td>
            <input  type="button" disabled="disabled" value="患者姓名" readonly="readonly"></td>
        <td>
            <input   type="button" disabled="disabled"  value="请输入您的名字" readonly="readonly"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"     checked="checked" name="name_show" value="1">是否显示
             </label>
        </td>
     </tr>
    <tr>
        <td>单行文字：</td>
        <td>
             <input type="button" disabled="disabled"  value="联系电话" readonly="readonly"></td>
        <td>
            <input  type="button" disabled="disabled" value="请输入您的电话" readonly="readonly"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"  checked="checked"   name="tel_show" value="1">是否显示
            </label>
        </td>
    </tr>
    <tr>
        <td>日期选择：</td>
        <td>
            <input  type="button" disabled="disabled"  value="预约日期" ></td>
        <td>
            <input  type="button" disabled="disabled" value="请输入预约日期"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"   checked="checked" name="date_show" value="1">是否显示
            </label>
         </td>
    </tr>
     <tr style="display: none;">
        <td>时间选择：</td>
        <td>
             <input name=" " type="text" disabled="disabled" class="px wizard-ignore" value="预约时间" onchange="$('odid').value='请输入'+this.value;"></td>
        <td>
            <input name="add[order][]" type="text" disabled="disabled" id="odid" class="px wizard-ignore" value="请输入预约时间"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"  checked="checked" name="time_show" value="1">是否显示
             </label>
        </td>
    </tr>
    <tr>
    <td>单行文字：</td>
    <td>
        <input type="button" disabled="disabled"   value="患者性别"></td>
    <td>
        <!--input name="value1" class="px" id="value1" type="text" value="<?php echo ($reslist['value1']); ?>"-->
        <select name="value1" >
            <option value="1">男</option>
            <option value="2">女</option>
        </select>
    </td>

    <td>

    </td>
  </tr>
<tr    >
    <td>单行文字：</td>
    <td>
        <input type="button" disabled="disabled" value="患者年龄"></td>
    <td>
        <input disabled="disabled" type="button" value="请输入您的年龄"></td>

    <td>

    </td>
</tr>
<tr id="trtxt1" >
<td>单行文字：</td>
<td>
    <input type="text" class="px" name="txt3" id="txt1" value="<?php echo ($reslist['txt3']); ?>"></td>
<td>
    <input name="value3" class="px" id="value1" type="text" value="<?php echo ($reslist['value3']); ?>"></td>

<td>
<p><?php if($reslist['txt4'] == ''): ?><a class="btnGrayS vm" id="add2" href="javascript:doaddit(2)">添加</a><?php endif; ?>　<a href="javascript:dodelit(1)">删除</a><span class="tooltips"><img src="/tpl/Home/138wo/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
</td> </tr>
                                            <tr id="trtxt2" <?php if($reslist['txt4'] == ''): ?>style="display: none"<?php endif; ?> >
                                                <td>单行文字：</td>
                                                <td>
                                                    <input type="text" class="px" name="txt4" id="txt2" value="<?php echo ($reslist['txt4']); ?>"></td>
                                                <td>
                                                    <input name="value4" class="px" id="value2" type="text" value="<?php echo ($reslist['value4']); ?>"></td>
                                                <td>
                                                    <p><?php if($reslist['txt5'] == ''): ?><a class="btnGrayS vm" id="add3" href="javascript:doaddit(3)">添加</a><?php endif; ?>　<a href="javascript:dodelit(2)">删除</a> <span class="tooltips"><img src="/tpl/Home/138wo/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
                                            <tr id="trtxt3"  <?php if($reslist['txt5'] == ''): ?>style="display: none"<?php endif; ?>>
                                                <td>单行文字：</td>
                                                <td>
                                                    <input type="text" class="px" name="txt5" id="txt3" value="<?php echo ($reslist['txt5']); ?>"></td>
                                                <td>
                                                    <input name="value5" class="px" id="value3" type="text" value="<?php echo ($reslist['value5']); ?>"></td>

                                                <td>
                                                    <p><a href="javascript:dodelit(3)">删除</a><span class="tooltips"><img src="/tpl/Home/138wo/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
<tr>
     <td width="120">科室选择：</td>
     <td>
        <input type="text" class="px" name="select1" value="<?php echo (($reslist['select1'])?($reslist['select1']):'预约科室'); ?>" ></td>
     <td>
         <input name="svalue1" class="px"  type="text" value="<?php echo ($reslist['svalue1']); ?>" placeholder="选项之间以英文“|”分割"></td>

    <td>

    </td>
</tr>
<tr >
    <td>专家选择：</td>
    <td>
         <input type="text" class="px" name="select2"  value="<?php echo (($reslist['select2'])?($reslist['select2']):'预约专家'); ?>"></td>
    <td>
        <input name="svalue2" class="px"  type="text" value="<?php echo ($reslist['svalue2']); ?>" placeholder="选项之间以英文“|”分割"></td>

    <td>

    </td>
</tr>

<tr  >
    <td>病种选择：</td>
    <td>
        <input type="text" class="px" name="select3" value="<?php echo (($reslist['select3'])?($reslist['select3']):'预约病种'); ?>"></td>
    <td>
         <input name="svalue3" class="px" type="text" value="<?php echo ($reslist['svalue3']); ?>" placeholder="选项之间以英文“|”分割"></td>

     <td>
         <p></p>
    </td>
 </tr>
                                            <tr id="strtxt1"  >
                                                <td>下拉框1：</td>
                                                <td>
                                                    <input type="text" class="px" name="select4" id="select1" value="<?php echo ($reslist['select4']); ?>"></td>
                                                <td>
                                                    <input name="svalue4" class="px" id="svalue" type="text" value="<?php echo ($reslist['svalue4']); ?>" placeholder="选项之间以英文“|”分割"></td>

                                                <td>
                                                    <p><?php if($reslist['select5'] == ''): ?><a class="btnGrayS vm" id="sadd2" href="javascript:sdoaddit(2)">添加</a><?php endif; ?>　<a href="javascript:sdodelit(1)">删除</a><span class="tooltips"><img src="/tpl/Home/138wo/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
                                            <tr id="strtxt2" <?php if($reslist['select5'] == ''): ?>style="display: none"<?php endif; ?>>
                                                <td>下拉框2：</td>
                                                <td>
                                                    <input type="text" name="select5" class="px" id="select2" value="<?php echo ($reslist['select5']); ?>"></td>
                                                <td>
                                                    <input name="svalue5" id="svalue2" class="px" type="text" value="<?php echo ($reslist['svalue5']); ?>" placeholder="选项之间以英文“|”分割"></td>

                                                <td>
                                                    <p><a href="javascript:sdodelit(2)">删除</a><span class="tooltips"><img src="/tpl/Home/138wo/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>多行文字：</td>
                                                <td>
                                                    <input name="datename" class="px" type="text" value="<?php echo (($reslist['datename'])?($reslist['datename']):'留言信息'); ?>"></td>
                                                <td>
                                                    <input name="add[order][]" class="px" type="text" disabled="disabled" value="请输入备注信息" readonly="readonly"></td>

                                                <td>订单默认项</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                                </div>
                                            </div>
                                <div class="control-group" style="display:none">
                                    <label for="" class="control-label">商家通知设置：</label>
                                    <input type="hidden" name="take" value="1" />
                                    <div class="controls">
                                        <div class="row-fluid margin-bm10">
                                            订单通知邮箱：<input type="text" class="input-large" data-rule-email="true" name="email" value="<?php echo ($reslist['email']); ?>"><span class="help-inline"><label class="checkbox inline">
                                                <input type="checkbox" name="open_email" value="1" <?php if($reslist['open_email'] == 1): ?>checked="checked"<?php endif; ?>>
                                                开启
                                            </label>
                                            </span>
                                        </div><p style="margin-left:83px;">当有新订单时，发送邮件到此邮箱</p>
                                    </div>
                                     <div class="controls">
                                        <div class="row-fluid">
                                            订单短信通知：<input type="text" class="input-large" data-rule-mobile="true" name="sms" value="<?php echo ($reslist['sms']); ?>"><span class="help-inline" ><label class="checkbox inline">
                                                <input type="checkbox" name="open_sms" value="1" <?php if($reslist['open_sms'] == 1): ?>checked="checked"<?php endif; ?>>
                                                开启
                                            </label>
                                            </span>
                                        </div><p style="margin-left:83px;">当有新订单时，发送短信到此手机</p>
                                    </div>
                                </div>
                                <div class="form-actions">
            <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btn btn-success">保存</button>　<button type="button" class="btn btn-danger">取消</button>
        </div>
                        </div>

</form>
  </div>
 <script>
 $("#check_form").validationEngine();
 </script>

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