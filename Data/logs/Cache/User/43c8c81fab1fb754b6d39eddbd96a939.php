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
</div>
<link rel="stylesheet" href="<?php echo STATICS;?>/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="./tpl/User/default/common/css/cymain.css" />
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src="<?php echo RES;?>/js/date/WdatePicker.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo STATICS;?>/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<style>
    #myClas ul li {
    margin-left: 5px;
    }

    .tooltips span {
display: none;
}
    .tooltips:hover span {
        text-align:left;
        display: block;
        position: absolute;
        margin:0 auto;
        width: 310px;
        border: 1px solid #CCC;
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        border-radius: 6px;
        padding: 10px;
        font-size: 12px;
        line-height: 22px;
        color: #333;
    }

</style>

<div class="tab" id="myClas">
<ul>
<li class="<?php if(ACTION_NAME == 'index'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('School/index',array('token'=>$token,'type'=>'semester'));?>">分类管理</a></li>
<li class="<?php if(ACTION_NAME == 'students'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('School/students',array('token'=>$token));?>">学员管理</a></li>
<!-- <li class="<?php if(ACTION_NAME == 'paycost'): ?>current<?php endif; ?> tabli" id="tab2">
<a href="<?php echo U('School/paycost',array('token'=>$token));?>">缴费管理</a></li> -->
<li class="<?php if((ACTION_NAME == 'assess') OR (ACTION_NAME == 'assess_add')): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('School/assess',array('token'=>$token));?>">教师管理</a></li>
<li class="<?php if((ACTION_NAME == 'curriculum') OR (ACTION_NAME == 'assess_course')): ?>current<?php endif; ?> tabli" id="tab3"><a href="<?php echo U('School/curriculum',array('token'=>$token));?>">课程安排</a></li>
<li class="<?php if(ACTION_NAME == 'subscribe' OR (ACTION_NAME == 'subscribe_add')): ?>current<?php endif; ?> tabli" id="tab4"><a href="<?php echo U('School/subscribe',array('token'=>$token));?>">课程预约</a></li>
<li class="<?php if(ACTION_NAME == 'scoresearch' ): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('School/scoresearch',array('token'=>$token));?>">成绩查询</a></li>
<!-- <li class="<?php if(ACTION_NAME == 'campusnews'): ?>current<?php endif; ?> tabli" id="tab6"><a href="<?php echo U('School/campusnews',array('token'=>$token));?>">校内新闻</a></li> -->
<li class="<?php if(ACTION_NAME == 'cookbook'): ?>current<?php endif; ?> tabli" id="tab6"><a href="<?php echo U('School/cookbook',array('token'=>$token));?>">食谱安排</a></li>
<li class="<?php if(ACTION_NAME == 'introduction'): ?>current<?php endif; ?> tabli" id="tab7"><a href="<?php echo U('School/introduction',array('token'=>$token));?>">菜单/回复配置</a></li>
</ul>
</div>
  <h4>您的位置: 分类管理 >
  <?php if($type == 'semester'): ?>学期管理|== <a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a>
  <?php elseif($type == 'theclass'): ?>
   班级管理 |== <a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a>
  <?php elseif($type == 'score'): ?>
  成绩管理|== <a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a>
  <?php elseif($type == 'subject'): ?>
  科目管理|== <a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a>
  <?php elseif($type == 'timeframe'): ?>
  时段管理|== <a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a>
  <?php elseif($type == 'week'): ?>
  星期管理|== <a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'semester'));?>">学期管理</a>||<a href="<?php echo U('School/index',array('token'=>$token ,'type'=>'theclass'));?>">班级管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'score'));?>">成绩管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'subject'));?>">科目管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'timeframe'));?>">时段管理</a>||<a href="<?php echo U('School/index',array('token'=>$token,'type'=>'week'));?>">星期管理</a><?php endif; ?><a href="javascript:window.location.reload();" class="right btnGrayS vm" style="margin-top:-27px">刷新</a>
   </h4>  
 <style>
.cLine {
    overflow: hidden;
    padding: 5px 0;
  color:#000000;
}
.alert {
padding: 8px 35px 0 10px;
text-shadow: none;
-webkit-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
-moz-box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
background-color: #f9edbe;
border: 1px solid #f0c36d;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
color: #333333;
margin-top: 5px;
}
.alert p {
margin: 0 0 10px;
display: block;
}
.alert .bold{
font-weight:bold;
}
 </style>
<div class="cLine">
    <div class="alert">
    <p><span class="bold">使用方法：</span>
    <?php if($type == 'semester'): ?>填写学期,如 2014第一学期,2014第二学期,2015第一学期....<br/>
   <strong><font color='red'>特别提醒: 当你删除该学期项的时候,该学期项下相关的所有数据都会被删除,请谨慎操作!以免丢失数据!</font></strong>
  <?php elseif($type == 'theclass'): ?>
   填写班级,如 一年级,二年级,三年级....
  <?php elseif($type == 'score'): ?>
   填写成绩分类,如 第一期,第二期,第三期....
  <?php elseif($type == 'subject'): ?>
   填写科目,如 语文,数学,英语....
  <?php elseif($type == 'timeframe'): ?>
   填写时段,如 09:00-09:45 , 10:00-10:45 , 11:00-11:45....
  <?php elseif($type == 'week'): ?>
   填写班级,如 星期一,星期二,星期三....<?php endif; ?>
    </p>
    </div>
</div>

<div class="msgWrap bgfc" style="margin-top:-10px;">
      <form class="form" method="post" action="" target="_top" enctype="multipart/form-data">
        <div class="bdrcontent">
<div id="div_ptype">
<table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">


<script type="text/javascript">


function addDeltbody(i) {

    if (i != 1) {
       document.getElementById("div_add_del_" + i).style.display = "none";
       document.getElementById("add" + i).style.display = "";

    }
}
function addTabody(i) {

     document.getElementById('div_add_del_' + i).style.display = "";
     document.getElementById('add' + i).style.display = "none";
     document.getElementById("addssort_" + i).value = 1;
}

function delrow(obj, tbody,objid) {
   removeElement(tbody);
   var obj = {sid:objid}
   $.post("<?php echo U('School/del_item',array('deltype'=>$type));?>", obj,function(data) {if(data.errno==1)alert('删除成功');},"json");
}

function removeElement(obj){
  var obj = document.getElementById(obj);
  var _parenElment = obj.parentNode;
  if(_parenElment){
    _parenElment.removeChild(obj);
  }
}



  </script>
<tbody>
<tr>

    <td width="260">名称</td>
    <td width="50">排序</td>
    <td class="norightborder">操作</td>
</tr>
</tbody>


<?php if($semester != ''): if(is_array($semester)): $i = 0; $__LIST__ = $semester;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ivo): $mod = ($i % 2 );++$i;?><tbody id="div_add_del_<?php echo ($i+500); ?>" name="div_add_del">
<tr>
    <input type="hidden" name="add[sid][]"   value="<?php echo ($ivo["sid"]); ?>" style="width:20px;">
    <td width="120"><input type="text" name="add[sname][]" value="<?php echo ($ivo["sname"]); ?>" class="px" style="width:120px;"></td>
    <td width="20"><input type="text" name="add[ssort][]" value="<?php echo ($ivo["ssort"]); ?>" style="width:20px;" class="px"></td>
    <td width="50" class="norightborder"><a href="javascript:;" onclick="delrow(this, 'div_add_del_<?php echo ($i+500); ?>',<?php echo ($ivo["sid"]); ?>);">删除</a></td>
</tr>
 </tbody><?php endforeach; endif; else: echo "" ;endif; endif; ?>


<tbody id="div_add_del_1" name="div_add_del">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:20px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" id="addssort_1" value="1" style="width:20px;" class="px">
        </td>
        <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(1)">删除</a>
          <a href="javascript:;" id="add2" onclick="addTabody(2)">添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_2" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:20px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value=""  id="addssort_2"  style="width:20px;" class="px">
        </td>
        <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(2)">删除</a>
          <a href="javascript:;" id="add3" onclick="addTabody(3)">添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_3" name="div_add_del" style="display:none">
    <tr>
      <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_3" style="width:20px;" class="px">
        </td>

        <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(3)">删除</a>
          <a href="javascript:;" id="add4" onclick="addTabody(4)">添加</a></td>
    </tr>
</tbody>


<tbody id="div_add_del_4" name="div_add_del" style="display:none">
    <tr>
      <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" placeholder="请填写选项标题" value="" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_4" style="width:20px;" class="px">
        </td>
        <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(4)">删除</a>
          <a href="javascript:;" id="add5" onclick="addTabody(5)">添加</a></td>
    </tr>
</tbody>


<tbody id="div_add_del_5" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_5" style="width:20px;" class="px">
        </td>
        <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(5)">删除</a>
          <a href="javascript:;" id="add6" onclick="addTabody(6)">添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_6" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_6" style="width:20px;" class="px">
        </td>
        <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(6)">删除</a>
          <a href="javascript:;" id="add7" onclick="addTabody(7)">添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_7" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_7" style="width:20px;" class="px">
        </td>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(7)">删除</a>
          <a href="javascript:;" id="add8" onclick="addTabody(8)">添加</a></td>
    </tr>
</tbody>
<tbody id="div_add_del_8" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_8" style="width:20px;" class="px">
        </td>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(8)">删除</a>
          <a href="javascript:;" id="add9" onclick="addTabody(9)">添加</a></td>
    </tr>
</tbody>
<tbody id="div_add_del_9" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value="" id="addssort_9" style="width:20px;" class="px">
        </td>
         <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(9)">删除</a>
          <a href="javascript:;" id="add10" onclick="addTabody(10)">添加</a></td>
    </tr>
</tbody>

<tbody id="div_add_del_10" name="div_add_del" style="display:none">
    <tr>
     <input type="hidden" name="add[sid][]" readonly="readonly" disabled="disabled" value="" style="width:50px;">
        <td width="120">
            <input type="text" name="add[sname][]" value="" placeholder="请填写选项标题" class="px" style="width:120px;">
        </td>
        <td>
            <input type="text" name="add[ssort][]" value=""  id="addssort_10" style="width:20px;" class="px">
        </td>
          <td width="50" class="norightborder"><a href="javascript:;" onclick="addDeltbody(10)">删除</a>
          </td>
    </tr>
</tbody>
<tbody>
        <tr>
            <td colspan="4" class="norightborder">
                添加顶级分类
        </td></tr>
  </tbody>
  <tbody>
       <tr>
        <td>
        <button type="submit" name="button" class="btnGreen">保存</button>
        <a href="<?php echo U('Vote/index');?>" class="btnGray vm">取消</a>
        </td>
        </tr>
  </tbody>
</table>

</div>
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