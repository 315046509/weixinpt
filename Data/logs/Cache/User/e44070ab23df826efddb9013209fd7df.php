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
<style>
#sideBar ul .ckit{display:none;}
.ListProduct input {
    display: none;
}

.ListProduct td a img {
    border: 0 none;
    vertical-align: middle;
    width: 32px;
}
</style>    
<div class="content" style="width:95%; background:none; margin-left:25px; border:none; margin-bottom:10px; margin-top:10px;" >
﻿  <div class="cLine">
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="<?php echo U('Areply/index',array('token'=>$token));?>"> <i class="icon-comment"></i> 关注回复 </a> </li>
      <li class="bg_dy"> <a href="<?php echo U('Text/index',array('token'=>$token));?>"> <i class="icon-comment-alt"></i> 文本回复</a> </li>
      <li class="bg_lg"> <a href="<?php echo U('Voiceresponse/index',array('token'=>$token));?>"> <i class="icon-headphones"></i> 语音回复</a> </li>
      <li class="bg_ly"> <a href="<?php echo U('Weiwosms/index',array('id'=>session('wxid'),'token'=>$token));?>"> <i class="icon-signal"></i> 短信设置 </a> </li>
      <li class="bg_lo"> <a href="<?php echo U('Weiwoemail/index',array('id'=>session('wxid'),'token'=>$token));?>"> <i class="icon-envelope"></i> 邮箱设置 </a> </li>
      <li class="bg_ls"> <a href="<?php echo U('Company/index',array('token'=>$token));?>"> <i class="icon-picture"></i> 商家设置</a> </li>
      <li class="bg_lr"> <a href="<?php echo U('Alipay_config/index',array('token'=>$token));?>"> <i class="icon-cog"></i> 支付设置</a> </li>
      <li class="bg_lo"> <a href="<?php echo U('Feiyin/index',array('token'=>$token));?>"> <i class="icon-print"></i> 飞印设置</a> </li>
      <li class="bg_lv"> <a href="<?php echo U('Requerydata/index',array('token'=>$token));?>"> <i class="icon-bar-chart"></i> 数据分析</a> </li>
      <li class="bg_lh"> <a href="<?php echo U('Other/index',array('token'=>$token));?>" target="_blank"> <i class="icon-book"></i> 回答不上</a> </li>
    </ul>
  </div>
  <div class="alert">
  <p><span class="bold">拷贝工具的网址和图标网址，粘帖到你需要的地方，所有支持链接的地方均可添加。</span></p>
            </div>
            </div>
        <div class="msgWrap" style="width:95%; background:none; margin-left:25px; border:none;">
          <div class="cLineD"><h4 class="left">查询工具</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://m.hao123.com/a/tianqi"><img src="http://demowx.duapp.com/tools/images/c01.png">
                      <p>天气报告</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.kuaidi100.com/uc/index.html"><img src="http://demowx.duapp.com/tools/images/c03.png" />
    <p>查快递证</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.46644.com/tool/idcard/?tpltype=uc"><img src="http://demowx.duapp.com/tools/images/c07.png" >
                <p>查身份证</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://baidu365.duapp.com/uc/Calendar.html"><img src="http://demowx.duapp.com/tools/images/c09.png" >
                      <p>万年历/黄历</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.wochacha.com/search?gcsid=a54dc4be344dcc0ecd1ed8df68fc5e8f"><img src="http://demowx.duapp.com/tools/images/c11.png" />
                        <p>查商品价</p>
                      </a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.46644.com/tool/aqi/?tpltype=uc"><img src="http://demowx.duapp.com/tools/images/c02.png" />
                        <p>查PM2.5</p>
                      </a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.46644.com/tool/shouji/?tpltype=uc"><img src="http://demowx.duapp.com/tools/images/c08.png" />
                        <p>手机归属地</p>
                      </a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.46644.com/tool/translate/?tpltype=uc"><img src="http://demowx.duapp.com/tools/images/c10.png" />
                        <p>在线翻译</p>
                      </a></td>
                    </tr>
                    <tr>
                      <td align="center"><a target="99" href="http://m.hao123.com/n/v/dianhua">常用电话</a></td>
                      <td align="center"><a target="99" href="http://m.46644.com/tool/zipcode/?tpltype=uc">查邮编</a></td>
                      <td align="center"><a target="99" href="http://m.dabizi.cn/wapsite">查购物返利</a></td>
                      <td align="center"><a target="99" href="http://m.46644.com/tool/areacode/?tpltype=uc">查区号</a></td>
                      <td align="center"><a target="99" href="http://health.sohu.com/eden/anquanqi/jump.html"><i></i>安全期</a></td>
                      <td align="center"><a href="http://fanyi.baidu.com/" target="99">翻译</a></td>
                      <td align="center"><a target="99" href="http://m.mtime.cn/">影讯</a></td>
                      <td align="center">&nbsp;</td>
                    </tr>
                  </tbody>
                </table>
<div class="cLineD"><h4 class="left">商旅 & 旅游</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://12306.uodoo.com"><img src="http://demowx.duapp.com/tools/images/a04.png" ><p>抢火车票</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://hao.uc.cn/bst/flight?uc_param_str=prdnfrpfbivelabtbmntpvsscp"><img src="http://demowx.duapp.com/tools/images/a01.png" ><p>机票预订</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://wx.133.cn/hbrobot/wap"><img src="http://demowx.duapp.com/tools/images/a02.png" >
            <p>航班动态</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.zhuna.cn/?agent_id=194"><img src="http://demowx.duapp.com/tools/images/a03.png" >
            <p>酒店查询</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.tuniu.com"><img src="http://demowx.duapp.com/tools/images/a07.png" >
            <p>旅游线路</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://wap.yikuaiqu.com/?s=uc"><img src="http://demowx.duapp.com/tools/images/a06.png" >
            <p>景点门票</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://lvyou.baidu.com/main/webapp/index"><img src="http://demowx.duapp.com/tools/images/a05.png" >
            <p>景点导览</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.mafengwo.cn/mdd"><img src="http://demowx.duapp.com/tools/images/a08.png" >
                      <p>攻略游记</p></a></td>
                    </tr>
                  </tbody>
                </table>
                
    <div class="cLineD"><h4 class="left">交通出行</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://cha.weiche.me/uc"><img src="http://demowx.duapp.com/tools/images/b08.png">
            <p>违章查询</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.46644.com/tool/bus/?tpltype=uc"><img src="http://demowx.duapp.com/tools/images/b03.png">
            <p>长途客运</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://gj.aibang.com"><img src="http://demowx.duapp.com/tools/images/b01.png">
            <p>公交换乘</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.8684.cn/dt_switch"><img src="http://demowx.duapp.com/tools/images/b02.png">
            <p>地铁线路</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/index/index/foo=bar/vt=map/?third_party=ucsearchbox"><img src="http://demowx.duapp.com/tools/images/b05.png">
            <p>地图导航</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/index/index/foo=bar/vt=map&amp;traffic=on&amp;viewmode=no_ad/?third_party=ucsearchbox"><img src="http://demowx.duapp.com/tools/images/b04.png">
            <p>交通路况</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E5%8A%A0%E6%B2%B9%E7%AB%99/needloc=1?third_party=ucsearchbox"><img src="http://demowx.duapp.com/tools/images/b07.png">
            <p>附近加油站</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E5%81%9C%E8%BD%A6%E5%9C%BA/needloc=1?third_party=ucsearchbox"><img src="http://demowx.duapp.com/tools/images/b06.png">
            <p>附近停车场</p></a></td>
                    </tr>
                  </tbody>
                </table>
          
          <div class="cLineD"><h4 class="left">健康医疗</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://3g.39.net/sex"><img src="http://demowx.duapp.com/tools/images/f08.png">
            <p>两性知识</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://3g.39.net/man"><img src="http://demowx.duapp.com/tools/images/f05.png">
            <p>男性健康</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://3g.39.net/woman"><img src="http://demowx.duapp.com/tools/images/f03.png">
            <p>女性健康</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.soujibing.com"><img src="http://demowx.duapp.com/tools/images/f01.png">
            <p>问医生</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://3g.39.net/care"><img src="http://demowx.duapp.com/tools/images/f06.png">
            <p>养生保健</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://3g.39.net/fitness/ydjf"><img src="http://demowx.duapp.com/tools/images/f07.png">
            <p>运动减肥</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://3g.yao.xywy.com"><img src="http://demowx.duapp.com/tools/images/f02.png">
            <p>用药指南</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://3g.yaolan.com/"><img src="http://demowx.duapp.com/tools/images/f04.png">
            <p>孕产妇婴</p></a></td>
                    </tr>
                    <tr>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E5%8C%BB%E9%99%A2/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近医院</a></td>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E8%8D%AF%E5%BA%97/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近药店</a></td>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E5%81%A5%E8%BA%AB%E5%9B%AD/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近健身苑</a></td>
                      <td align="center"><a target="99" href="http://3g.dxy.cn/">医疗论坛</a></td>
                      <td align="center"><a target="99" href="http://tv.uc.cn/#!/detail/5606">养生堂</a></td>
                      <td align="center"><a target="99" href="http://tv.uc.cn/#!/detail/1286381">我是大医生</a></td>
                      <td align="center"><a target="99" href="http://tv.uc.cn/#!/detail/109469">健康之路</a></td>
                      <td align="center"><a target="99" href="http://tv.uc.cn/#!/detail/129036">健康100FUN</a></td>
                    </tr>
                  </tbody>
                </table>
          
          <div class="cLineD"><h4 class="left">运势占卜</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://m.lnka.cn"><img src="http://demowx.duapp.com/tools/images/h03.png">
            <p>占卜算命</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://infoapp.3g.qq.com/g/s?aid=astro&amp;g_ut=3&amp;g_f=20585#home"><img src="http://demowx.duapp.com/tools/images/h01.png">
            <p>星座运势</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://3g.d1xz.net/sx"><img src="http://demowx.duapp.com/tools/images/h02.png">
            <p>生肖运势</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://3g.d1xz.net/jm"><img src="http://demowx.duapp.com/tools/images/h04.png">
            <p>周公解梦</p></a></td>
                      <td width="12%" align="center">&nbsp;</td>
                      <td width="12%" align="center">&nbsp;</td>
                      <td width="12%" align="center">&nbsp;</td>
                      <td width="12%" align="center"></td>
                    </tr>
                  </tbody>
                </table>
                
          <div class="cLineD"><h4 class="left">彩票购买</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://m.quecai.com/lotteryview/ssq.php?from=lottbst_cata&amp;uc_param_str=cpligiwisndnfrpfbivessupntlaminieisipi&amp;uc_common_param=true"><img src="http://demowx.duapp.com/tools/images/l01.png">
            <p>双色球</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.quecai.com/lotteryview/dlt.php?from=lottbst_cata&amp;uc_param_str=cpligiwisndnfrpfbivessupntlaminieisipi&amp;uc_common_param=true"><img src="http://demowx.duapp.com/tools/images/l02.png">
            <p>大乐透</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.quecai.com/lotteryview/k3.php?from=lottbst_cata&amp;uc_param_str=cpligiwisndnfrpfbivessupntlaminieisipi&amp;uc_common_param=true"><img src="http://demowx.duapp.com/tools/images/l03.png">
            <p>快3</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.quecai.com/lotteryview/syydj.php?from=lottbst_cata&amp;uc_param_str=cpligiwisndnfrpfbivessupntlaminieisipi&amp;uc_common_param=true"><img src="http://demowx.duapp.com/tools/images/l04.png">
            <p>11选5</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.quecai.com/lotteryview/jczq_ht.php?from=lottbst_cata&amp;uc_param_str=cpligiwisndnfrpfbivessupntlaminieisipi&amp;uc_common_param=true">竞足</a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.quecai.com/lotteryview/3d.php?from=lottbst_cata&amp;uc_param_str=cpligiwisndnfrpfbivessupntlaminieisipi&amp;uc_common_param=true">福彩3D</a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.quecai.com/lotteryview/ssc.php?from=lottbst_cata&amp;uc_param_str=cpligiwisndnfrpfbivessupntlaminieisipi&amp;uc_common_param=true">时时彩</a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.quecai.com/notice/index.php?from=lottbst_cata&amp;uc_param_str=cpligiwisndnfrpfbivessupntlaminieisipi&amp;uc_common_param=true">开奖</a></td>
                    </tr>
                  </tbody>
                </table>
                
          <div class="cLineD"><h4 class="left">便民服务</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://m.58.com/ershouche"><img src="http://demowx.duapp.com/tools/images/e02.png">
            <p>二手车辆</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.51job.com/?partner=uc3"><img src="http://demowx.duapp.com/tools/images/e05.png">
            <p>找工作</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.58.com/jianzhi.shtml"><img src="http://demowx.duapp.com/tools/images/e06.png">
            <p>找兼职</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.baihe.com/search.php"><img src="http://demowx.duapp.com/tools/images/e08.png">
            <p>去相亲</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.58.com/sale.shtml"><img src="http://demowx.duapp.com/tools/images/e01.png">
            <p>二手物品</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.soufun.com/zf?sf_source=ucbrowser04"><img src="http://demowx.duapp.com/tools/images/e03.png">
            <p>租房买房</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.58.com/zhongdiangong"><img src="http://demowx.duapp.com/tools/images/e04.png">
            <p>家政/钟点工</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.dianping.com/promo/shanghai"><img src="http://demowx.duapp.com/tools/images/e07.png">
            <p>优惠券</p></a></td>
                    </tr>
                    <tr>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E9%93%B6%E8%A1%8C/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近银行</a></td>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E8%90%A5%E4%B8%9A%E5%8E%85/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近营业厅</a></td>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E9%82%AE%E5%B1%80/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近邮局</a></td>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E7%BE%8E%E5%AE%B9/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近美容</a></td>
                      <td align="center"></td>
                      <td align="center"></td>
                      <td align="center"></td>
                      <td align="center"></td>
                    </tr>
                  </tbody>
                </table>   
                
          <div class="cLineD"><h4 class="left">快乐休闲</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://m.46644.com/tool/tv/?tpltype=u"><img src="http://demowx.duapp.com/tools/images/j01.png">
            <p>电视节目</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://infoapp.3g.qq.com/g/s?aid=astro&amp;g_ut=3&amp;g_f=20585#toplist?tab=new"><img src="http://demowx.duapp.com/tools/images/j11.png">
            <p>心理测试</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.pengfu.com"><img src="http://demowx.duapp.com/tools/images/j09.png">
            <p>幽默笑话</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://sms.waptw.com/lifesearch/ucsms/index?tpl=ucm_sms_index"><img src="http://demowx.duapp.com/tools/images/j12.png">
            <p>祝福短信</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://now.3g.cn?fr=uciapp"><img src="http://demowx.duapp.com/tools/images/j02.png">
            <p>节目直播</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.taoying.com/"><img src="http://demowx.duapp.com/tools/images/j03.png">
            <p>电影资讯</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.weibo.cn/pubs/radio?pos=63&amp;vt=4&amp;from=bst&amp;s2w=bst&amp;wm=ig_0001_bst"><img src="http://demowx.duapp.com/tools/images/j05.png">
            <p>在线广播</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://manhua.yicha.cn"><img src="http://demowx.duapp.com/tools/images/j08.png">
            <p>搞笑漫画</p></a></td>
                    </tr>
                    <tr>
                      <td align="center"><a target="99" href="http://douban.fm/partner/uc">音乐电台</a></td>
                      <td align="center"><a target="99" href="http://duopao.com">玩小游戏</a></td>
                      <td align="center"><a target="99" href="http://m.damai.cn">演出门票</a></td>
                      <td align="center"><a target="99" href="http://tuan.uc.cn/?keyword=%E7%94%B5%E5%BD%B1#!/index">电影票团购</a></td>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=ktv/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近KTV</a></td>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E7%BD%91%E5%90%A7/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近网吧</a></td>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E7%94%B5%E5%BD%B1%E9%99%A2/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近电影院</a></td>
                      <td align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E8%B6%B3%E7%96%97/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox">附近足疗</a></td>
                    </tr>
                  </tbody>
                </table>  
                       
          <div class="cLineD"><h4 class="left">吃货天地</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://home.meishichina.com/wap.php?ac=recipe&amp;t=3&amp;fr=ucapp#utm_source=wap3_popnav_recipe_0"><img src="http://demowx.duapp.com/tools/images/i01.png">
            <p>好吃菜谱</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.meishij.net/html5/list.php?cid=9"><img src="http://demowx.duapp.com/tools/images/i04.png">
            <p>食疗养生</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://tuan.uc.cn/?keyword=%E7%BE%8E%E9%A3%9F#!/index"><img src="http://demowx.duapp.com/tools/images/i03.png">
            <p>美食团购</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://map.baidu.com/mobile/webapp/search/search/qt=s&amp;wd=%E7%BE%8E%E9%A3%9F/needloc=1&amp;viewmode=no_ad/?third_party=ucsearchbox"><img src="http://demowx.duapp.com/tools/images/i02.png">
            <p>附近美食</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://tv.uc.cn/#!/detail/530114">美食地图</a></td>
                      <td width="12%" align="center"><a target="99" href="http://tv.uc.cn/#!/detail/1540713">爱尚美食</a></td>
                      <td width="12%" align="center"><a target="99" href="http://tv.uc.cn/#!/detail/13166">蔡澜叹名菜</a></td>
                      <td width="12%" align="center"><a target="99" href="http://tv.uc.cn/#!/detail/646165">名人厨房</a></td>
                    </tr>
                  </tbody>
                </table>
                
         <div class="cLineD"><h4 class="left">充值支付</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://wvs.m.taobao.com"><img src="http://demowx.duapp.com/tools/images/d01.png">
            <p>话费充值</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://wvs.m.taobao.com/game_card.htm?&amp;pds=qq%23h%23zhichong&amp;type=3&amp;unid=null"><img src="http://demowx.duapp.com/tools/images/d02.png">
            <p>QQ充值</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://wvs.m.taobao.com/game_card.htm?&amp;pds=qq%23h%23zhichong&amp;type=1&amp;unid=null"><img src="http://demowx.duapp.com/tools/images/d03.png">
            <p>游戏充值</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://pay.uc.cn"><img src="http://demowx.duapp.com/tools/images/d04.png">
            <p>U点充值</p></a></td>
                      <td width="12%" align="center"></td>
                      <td width="12%" align="center"></td>
                      <td width="12%" align="center"></td>
                      <td width="12%" align="center"></td>
                    </tr>
                  </tbody>
                </table>
                
          <div class="cLineD"><h4 class="left">教育培训</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://m.jxedt.com"><img src="http://demowx.duapp.com/tools/images/g04.png">
            <p>学车考驾照</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://app.sso56.com/webapp.html?dm=guoxue&amp;fr=uc"><img src="http://demowx.duapp.com/tools/images/g03.png">
            <p>国学经典</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.dm005.com/ergeshipin"><img src="http://demowx.duapp.com/tools/images/g01.png">
            <p>儿歌视频</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://www.gaokao.com/touch"><img src="http://demowx.duapp.com/tools/images/g02.png">
            <p>备战高考</p></a></td>
                      <td width="12%" align="center"></td>
                      <td width="12%" align="center"></td>
                      <td width="12%" align="center"></td>
                      <td width="12%" align="center"></td>
                    </tr>
                  </tbody>
                </table>
                
           <div class="cLineD"><h4 class="left">理财计算</h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <tbody>
                    <tr>
                      <td width="12%" align="center"><a target="99" href="http://dp.sina.cn/dpool/tools/money/single.php?flag=old_per&amp;pos=63&amp;vt=4"><img src="http://demowx.duapp.com/tools/images/k01.png">
            <p>养老险计算</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://auto.sina.com.cn/calculator/"><img src="http://demowx.duapp.com/tools/images/k07.png">
            <p>购车计算</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://house.sina.cn/touch/tools/house_loan.html"><img src="http://demowx.duapp.com/tools/images/k06.png">
            <p>房贷计算</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://dp.sina.cn/dpool/tools/money/single.php?flag=house_per&amp;pos=63&amp;vt=4"><img src="http://demowx.duapp.com/tools/images/k04.png">
            <p>公积金计算</p></a></td>
                      <td width="12%" align="center"><a target="99" href="http://dp.sina.cn/dpool/tools/money/single.php?city_id=1&amp;flag=per_tax&amp;pos=63&amp;vt=4">个税计算</a></td>
                      <td width="12%" align="center"><a target="99" href="http://dp.sina.cn/dpool/tools/money/single.php?flag=health_per&amp;pos=63&amp;vt=4">医疗险计算</a></td>
                      <td width="12%" align="center"><a target="99" href="http://dp.sina.cn/dpool/tools/money/single.php?flag=lose_per&amp;pos=63&amp;vt=4">失业险计算</a></td>
                      <td width="12%" align="center"><a target="99" href="http://m.wap.soso.com/app/forex/index.jsp?g_ut=3&amp;biz=newHome">汇率换算</a></td>
                    </tr>
                  </tbody>
                </table>              
<div class="cLineD"><h4 class="left">网页小游戏 <span class="red">（点击复制按钮，拷贝网址）</span></h4></div>
                <table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
                  <thead>
                    <tr>
                      <th class="span2">小游戏</th>
                      <th class="span5">操作</th>
                      <th class="span2">其他工具</th>
                      <th class="span5">操作</th>
                      <th class="span2">其他工具</th>
                      <th class="span5">操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>问答游戏</td>
                      <td><input type='text' id='textid1_text' value='http://u.3g.cn/qasuperman/?fr=wdcr' />
                        <div id='textid1' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>爱星座</td>
                      <td><input type='text' id='textid301_text' value='http://infoapp.3g.qq.com/g/s?g_f=22207&amp;aid=astro#home' />
                        <div id='textid301' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>租房</td>
                      <td><input type='text' id='textid201_text' value='http://m.soufun.com' />
                        <div id='textid201' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>画画游戏</td>
                      <td><input type='text' id='textid2_text' value='http://hc.3g.cn/Index.aspx?fr=grzx' />
                        <div id='textid2' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>中国天气网</td>
                      <td><input type='text' id='textid302_text' value='http://mobile.weather.com.cn/' />
                        <div id='textid302' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>运势</td>
                      <td><input type='text' id='textid202_text' value='http://dp.sina.cn/dpool/astro/starent/xingyun.php' />
                        <div id='textid202' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>神器泡泡</td>
                      <td><input type='text' id='textid3_text' value='http://m.edianyou.com/h5game/bubbleHit.html' />
                        <div id='textid3' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>下厨房</td>
                      <td><input type='text' id='textid303_text' value='http://m.xiachufang.com/' />
                        <div id='textid303' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>算命</td>
                      <td><input type='text' id='textid203_text' value='http://www.aqioo.cn/free' />
                        <div id='textid203' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>一笔一划</td>
                      <td><input type='text' id='textid4_text' value='http://line.3g.cn/?fr=grzx' />
                        <div id='textid4' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>好大夫</td>
                      <td><input type='text' id='textid304_text' value='http://m.haodf.com/touch' />
                        <div id='textid304' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>解梦</td>
                      <td><input type='text' id='textid204_text' value='http://www.aqioo.cn/dream' />
                        <div id='textid204' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>你被点名了</td>
                      <td><input type='text' id='textid5_text' value='http://ltldev.sinaapp.com/wx_apps/dianming/index.php?from=wx_xlnl' />
                        <div id='textid5' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>艺龙酒店预订</td>
                      <td><input type='text' id='textid305_text' value='http://m.elong.com/hotel/' />
                        <div id='textid305' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>房贷计算</td>
                      <td><input type='text' id='textid205_text' value='http://house.sina.cn/touch/tools/house_loan.html' />
                        <div id='textid205' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>谁是卧底</td>
                      <td><input type='text' id='textid6_text' value='http://fanzhuo.sinaapp.com/wodiwx/creater.html' />
                        <div id='textid6' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>彩票开奖查询</td>
                      <td><input type='text' id='textid306_text' value='http://loto.sina.cn/index.do?vt=5&amp;sid=fc055b3a-d72c-41bf-96bc-b8e436ea79ea&amp;agentId=233258' />
                        <div id='textid306' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>股票</td>
                      <td><input type='text' id='textid206_text' value='http://finance.sina.cn/?sa=t60d13v512&amp;pos=63&amp;vt=4' />
                        <div id='textid206' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>斗地主</td>
                      <td><input type='text' id='textid7_text' value='http://h.lexun.com/game/DouDiZhu/play.aspx' />
                        <div id='textid7' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>快递查询</td>
                      <td><input type='text' id='textid307_text' value='http://m.kuaidi100.com/' />
                        <div id='textid307' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>个税计算</td>
                      <td><input type='text' id='textid207_text' value='http://dp.sina.cn/dpool/tools/money/single.php?city_id=1&amp;flag=per_tax&amp;pos=63&amp;vt=4' />
                        <div id='textid207' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>大家来找同</td>
                      <td><input type='text' id='textid8_text' value='http://resource.duopao.com/duopao/games/small_games/weixingame/sameclick/sameclick.htm' />
                        <div id='textid8' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>航班查询</td>
                      <td><input type='text' id='textid308_text' value='http://wx.133.cn/hbrobot/wap' />
                        <div id='textid308' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>医疗保险计算</td>
                      <td><input type='text' id='textid208_text' value='http://dp.sina.cn/dpool/tools/money/single.php?flag=health_per&amp;pos=63&amp;vt=4' />
                        <div id='textid208' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>神秘方块</td>
                      <td><input type='text' id='textid9_text' value='http://resource.duopao.com/duopao/games/small_games/weixingame/unitem/Unitem.htm' />
                        <div id='textid9' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>火车余票查询</td>
                      <td><input type='text' id='textid309_text' value='http://12306.uodoo.com/#!/index' />
                        <div id='textid309' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>养老保险</td>
                      <td><input type='text' id='textid209_text' value='http://dp.sina.cn/dpool/tools/money/single.php?flag=old_per&amp;pos=63&amp;vt=4' />
                        <div id='textid209' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>梦幻农场连连看</td>
                      <td><input type='text' id='textid10_text' value='http://resource.duopao.com/duopao/games/small_games/weixingame/DreamFarmLink/DreamFarmLink.htm' />
                        <div id='textid10' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>住房公积金计算</td>
                      <td><input type='text' id='textid210_text' value='http://dp.sina.cn/dpool/tools/money/single.php?flag=house_per&amp;pos=63&amp;vt=4' />
                        <div id='textid210' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>小怪物吃饼干</td>
                      <td><input type='text' id='textid11_text' value='http://resource.duopao.com/duopao/games/small_games/weixingame/bouffecookie/bouffecookie.htm' />
                        <div id='textid11' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>常用电话</td>
                      <td><input type='text' id='textid211_text' value='http://m.46644.com/tool/tel/' />
                        <div id='textid211' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>塔罗占卜</td>
                      <td><input type='text' id='textid212_text' value='http://ast.sina.cn/?sa=t282d771v166&amp;pos=19&amp;vt=4' />
                        <div id='textid212' onmouseover='move_swf(this)' class='btn btn-success'>复制</div></td>
                    </tr>
                  </tbody>
                </table>
                <div class="clr"></div>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
<script src="http://www.wxapi.cn/index/js/ZeroClipboard.js" type="text/javascript"></script> 
<script language="JavaScript">
////copy to clip
    var clip = null;
   
    ZeroClipboard.setMoviePath("http://www.wxapi.cn/index/js/ZeroClipboard.swf")
      clip = new ZeroClipboard.Client();
      clip.setHandCursor( true );
   
 
   function move_swf(ee)
   {    
      copything = document.getElementById(ee.id+"_text").value;
      clip.setText(copything);
 
         if (clip.div)
         {    
            clip.receiveEvent('mouseout', null);
            clip.reposition(ee.id);
         }
         else{ clip.glue(ee.id);   }
  
         clip.receiveEvent('mouseover', null);
   }    
   clip.addEventListener( "complete", function(){  
    alert("复制网址成功,请粘帖到您需要的地方！");   
});  
</script> 
<!--底部-->
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