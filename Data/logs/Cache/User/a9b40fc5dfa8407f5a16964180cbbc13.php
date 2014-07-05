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
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<div class="content" style="width:95%; background:none; margin-left:25px; border:none; margin-bottom:30px; margin-top:10px;" >
  <div class="cLineB">
    <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="<?php echo U('Taobao/index',array('token'=>$token));?>"> <i class="icon-bullhorn"></i> 淘宝天猫 </a> </li>
      <li class="bg_dy"> <a href="<?php echo U('Api/index',array('token'=>$token));?>"> <i class="icon-resize-full"></i> 第三方</a> </li>
      <li class="bg_lg"> <a href="<?php echo U('Reply/index',array('token'=>$token));?>"> <i class="icon-book"></i> 留言板</a> </li>
      <li class="bg_ly"> <a href="<?php echo U('Greeting_card/index',array('token'=>$token));?>"> <i class="icon-envelope"></i> 微贺卡 </a> </li>
      <li class="bg_lo"> <a href="<?php echo U('Shake/index',array('token'=>$token));?>"> <i class="icon-bolt"></i> 摇一摇 </a> </li>
      <li class="bg_ls"> <a href="<?php echo U('Wxq/index',array('token'=>$token));?>"> <i class="icon-reorder"></i> 微信墙</a> </li>
      <li class="bg_lr"> <a href="<?php echo U('Kefu/index',array('token'=>$token));?>"> <i class="icon-question-sign"></i> 智能客服</a> </li>
      <li class="bg_db"> <a href="javascript:history.go(-1);"> <i class="icon-share-alt"></i> 返回</a> </li>
    </ul>
  </div>
          <h4><?php echo C('site_my');?>微信墻----活动不可缺少</h4><a href="javascript:history.go(-1);"  class="right btn btn-info" style="margin-top:-27px" >返回</a></div>
<div class="msgWrap">
  <form class="form" method="post"   action="<?php echo U('Wxq/insert');?>"  target="_top" enctype="multipart/form-data" >
<TABLE class="userinfoArea" style=" margin:20px 0 0 0;" border="0" cellSpacing="0" cellPadding="0" width="100%">
  <THEAD>
<TR>
  <TH valign="top"><label for="keyword">关键词：</label></TH>
  <TD><input type="input" class="px" id="keyword" value="" name="keyword" style="width:400px" ><br />
                 例如: 我要上墙&nbsp;上墙&nbsp;毕业典礼墻   </TD>
  <TD>&nbsp;</TD>
</TR>
                            <TR>
  <TH valign="top">是否审核：</TH>
  <TD><label for="radio1"><input id="radio1" class="radio" type="radio" name="isshow" value="1"  checked="checked"> 开启审核，需要公众号拥有者审核之后才会显示!</label><br /><label for="radio2"><input class="radio" id="radio2" type="radio" name="isshow" value="0"> 关闭审核，用户发送内容均可显示<span class="red"></span>)</label></TD>
</TR>
                            </THEAD>
  <TBODY>
<TR>
  <TH valign="top"><label for="keyword">活动主题：</label></TH>
  <TD><input type="input" class="px" id="keyword" value="" name="title" style="width:400px" ></TD>
  <TD>&nbsp;</TD>
</TR>

<TR>
  <TH valign="top"><label for="keyword">进入提示：</label></TH>
  <TD><input type="input" class="px" id="keyword" value="" name="enter_tips" style="width:400px" ></TD>
  <TD>(进入微信墙活动的提示语！)</TD>
</TR>

<TR>
  <TH valign="top"><label for="keyword">退出提示：</label></TH>
  <TD><input type="input" class="px" id="keyword" value="" name="quit_tips" style="width:400px" ></TD>
  <TD>(退出微信墙活动的提示语！)</TD>
</TR>

<TR>
  <TH valign="top"><label for="keyword">发表提示：</label></TH>
  <TD><input type="input" class="px" id="keyword" value="" name="send_tips" style="width:400px" ></TD>
  <TD>(用户发布消息后，微信端显示的成功消息提示！)</TD>
</TR>


<TR>
  <TH valign="top"><label for="keyword">退出指令：</label></TH>
  <TD><input type="input" class="px" id="keyword" value="" name="quit_command" style="width:100px" ></TD>
  <TD>(用户输入退出指令后，退出上墙模式，发布的文字均不会上墙！)</TD>
</TR>

<TR>
  <TH valign="top"><label for="keyword">超时时间：</label></TH>
  <TD><input type="input" class="px" id="keyword" value="" name="timeout" style="width:100px" ></TD>
  <TD>单位(s/秒)(用户输入上墙指令后，超过此时间发送的内容不算上墙内容！)</TD>
</TR>
<TR>
  <TH valign="top"><label for="keyword">轮换时间：</label></TH>
  <TD><input type="input" class="px" id="keyword" value="" name="showtime" style="width:100px" ></TD>
  <TD>值=秒*1000(我的墙面倒计时时间，上墙内容自动刷新！)</TD>
</TR>
<tr>
    <TH valign="top"><label for="keyword">企业Logo：</label></TH>
    <td valign="top" width="400">
        <input class="px"  name="logourl" id="logourl" value="" style="width:380px; margin: 5px 0"  />
        <script src="/tpl/static/upyun.js"></script>
        <a href="###" onclick="upyunPicUpload('logourl',300,300,'<?php echo ($token); ?>')" class="ChooseImage">上传</a>
        <a href="###" onclick="viewImg('logourl')" class="ChooseImage">预览</a>
    </td>
    <td>上传二维码，便于用户关注发上墙言</td>
</tr>
<tr>
    <TH valign="top"><label for="keyword">公众号二维码：</label></TH>
    <td valign="top" width="400">
        <input class="px"  name="qrcode" id="qrcode" value="" style="width:380px; margin: 5px 0"  />
        <script src="/tpl/static/upyun.js"></script>
        <a href="###" onclick="upyunPicUpload('qrcode',300,300,'<?php echo ($token); ?>')" class="ChooseImage">上传</a>
        <a href="###" onclick="viewImg('qrcode')" class="ChooseImage">预览</a>
    </td>
    <td>上传二维码，便于用户关注发上墙言</td>
</tr>

<tr>
    <TH valign="top"><label for="keyword">墙面背景：</label></TH>
    <td valign="top" width="400">
        <input class="px"  name="background" id="background" value="" style="width:380px; margin: 5px 0"  />
        <script src="/tpl/static/upyun.js"></script>
        <a href="###" onClick="chooseFile('background','hdbg')" class="ChooseImage">选择</a>
        <a href="###" onclick="upyunPicUpload('background',1600,1000,'<?php echo ($token); ?>')" class="ChooseImage">上传</a>
        <a href="###" onclick="viewImg('background')" class="ChooseImage">预览</a>
    </td>
    <td>你选择的图片系统会以1600(宽度)*1000(高度)的大小显示</td>
</tr>

<TR>
  <TH valign="top"><label for="keyword">背景音乐：</label></TH>
  <TD valign="top" width="400">
  <input type="input" class="px" id="bgmp3" value="" name="bgmp3" style="width:380px; margin: 5px 0" >
  <script src="/tpl/static/upyun.js"></script><a href="###" onClick="upyunPicUpload('bgmp3',700,420,'<?php echo ($token); ?>')" class="ChooseImage">上传</a>
  <a href="###" onclick="chooseFile('bgmp3','music')" class="ChooseImage">选择</a>
  </TD>
  <TD>如果添加音乐，微信墙开启直接播放！</TD>
</TR>
<TR>
  <TH valign="top"><label for="text">活动描述：</label></TH>
  <TD><textarea  class="px" id="Hfcontent" name="description" style="width:500px; height:150px"></textarea><br />请尽量精简


</TD>
  <TD rowspan="2" valign="top"><div style="margin-left:20px" class="zdhuifu">
  	<h4 class="red">亲，您好：</h4>
    请你用简单、有深意的话儿来形容词语，谢谢
</div></TD>

<TR>
  <TH></TH>
  <TD><button type="submit"  name="button"  class="btn btn-success left" >保存</button>
  	<div class="right" style="margin-right:10px"  >
  		<ul>
  			<li class="biaoqing"><span>表情</span>
  				<ul>
  					<li><img src="<?php echo RES;?>/images/face/0.gif" alt="微笑" onclick="jsbq('微笑')"></li>
  					<li><img src="<?php echo RES;?>/images/face/1.gif" alt="撇嘴" onclick="jsbq('撇嘴')"></li>
  					<li><img src="<?php echo RES;?>/images/face/2.gif" alt="色" onclick="jsbq('色')"></li>
  					<li><img src="<?php echo RES;?>/images/face/3.gif" alt="发呆" onclick="jsbq('发呆')"></li>
  					<li><img src="<?php echo RES;?>/images/face/4.gif" alt="得意" onclick="jsbq('得意')"></li>
  					<li><img src="<?php echo RES;?>/images/face/5.gif" alt="流泪" onclick="jsbq('流泪')"></li>
  					<li><img src="<?php echo RES;?>/images/face/6.gif" alt="害羞" onclick="jsbq('害羞')"></li>
  					<li><img src="<?php echo RES;?>/images/face/7.gif" alt="闭嘴" onclick="jsbq('闭嘴')"></li>
  					<li><img src="<?php echo RES;?>/images/face/8.gif" alt="睡" onclick="jsbq('睡')"></li>
  					<li><img src="<?php echo RES;?>/images/face/9.gif" alt="大哭" onclick="jsbq('大哭')"></li>
  					<li><img src="<?php echo RES;?>/images/face/10.gif" alt="尴尬" onclick="jsbq('尴尬')"></li>
  					<li><img src="<?php echo RES;?>/images/face/11.gif" alt="发怒" onclick="jsbq('发怒')"></li>
  					<li><img src="<?php echo RES;?>/images/face/12.gif" alt="调皮" onclick="jsbq('调皮')"></li>
  					<li><img src="<?php echo RES;?>/images/face/13.gif" alt="呲牙" onclick="jsbq('呲牙')"></li>
  					<li><img src="<?php echo RES;?>/images/face/14.gif" alt="惊讶" onclick="jsbq('惊讶')"></li>
  					<li><img src="<?php echo RES;?>/images/face/15.gif" alt="难过" onclick="jsbq('难过')"></li>
  					<li><img src="<?php echo RES;?>/images/face/16.gif" alt="酷" onclick="jsbq('酷')"></li>
  					<li><img src="<?php echo RES;?>/images/face/17.gif" alt="冷汗" onclick="jsbq('冷汗')"></li>
  					<li><img src="<?php echo RES;?>/images/face/18.gif" alt="抓狂" onclick="jsbq('抓狂')"></li>
  					<li><img src="<?php echo RES;?>/images/face/19.gif" alt="吐" onclick="jsbq('吐')"></li>
  					<li><img src="<?php echo RES;?>/images/face/20.gif" alt="偷笑" onclick="jsbq('偷笑')"></li>
  					<li><img src="<?php echo RES;?>/images/face/21.gif" alt="可爱" onclick="jsbq('可爱')"></li>
  					<li><img src="<?php echo RES;?>/images/face/22.gif" alt="白眼" onclick="jsbq('白眼')"></li>
  					<li><img src="<?php echo RES;?>/images/face/23.gif" alt="傲慢" onclick="jsbq('傲慢')"></li>
  					<li><img src="<?php echo RES;?>/images/face/24.gif" alt="饥饿" onclick="jsbq('饥饿')"></li>
  					<li><img src="<?php echo RES;?>/images/face/25.gif" alt="困" onclick="jsbq('困')"></li>
  					<li><img src="<?php echo RES;?>/images/face/26.gif" alt="惊恐" onclick="jsbq('惊恐')"></li>
  					<li><img src="<?php echo RES;?>/images/face/27.gif" alt="流汗" onclick="jsbq('流汗')"></li>
  					<li><img src="<?php echo RES;?>/images/face/28.gif" alt="憨笑" onclick="jsbq('憨笑')"></li>
  					<li><img src="<?php echo RES;?>/images/face/29.gif" alt="大兵" onclick="jsbq('大兵')"></li>
  					<li><img src="<?php echo RES;?>/images/face/30.gif" alt="奋斗" onclick="jsbq('奋斗')"></li>
  					<li><img src="<?php echo RES;?>/images/face/31.gif" alt="咒骂" onclick="jsbq('咒骂')"></li>
  					<li><img src="<?php echo RES;?>/images/face/32.gif" alt="疑问" onclick="jsbq('疑问')"></li>
  					<li><img src="<?php echo RES;?>/images/face/33.gif" alt="嘘" onclick="jsbq('嘘')"></li>
  					<li><img src="<?php echo RES;?>/images/face/34.gif" alt="晕" onclick="jsbq('晕')"></li>
  					<li><img src="<?php echo RES;?>/images/face/35.gif" alt="折磨" onclick="jsbq('折磨')"></li>
  					<li><img src="<?php echo RES;?>/images/face/36.gif" alt="衰" onclick="jsbq('衰')"></li>
  					<li><img src="<?php echo RES;?>/images/face/37.gif" alt="骷髅" onclick="jsbq('骷髅')"></li>
  					<li><img src="<?php echo RES;?>/images/face/38.gif" alt="敲打" onclick="jsbq('敲打')"></li>
  					<li><img src="<?php echo RES;?>/images/face/39.gif" alt="再见" onclick="jsbq('再见')"></li>
  					<li><img src="<?php echo RES;?>/images/face/40.gif" alt="擦汗" onclick="jsbq('擦汗')"></li>
  					<li><img src="<?php echo RES;?>/images/face/41.gif" alt="抠鼻" onclick="jsbq('抠鼻')"></li>
  					<li><img src="<?php echo RES;?>/images/face/42.gif" alt="鼓掌" onclick="jsbq('鼓掌')"></li>
  					<li><img src="<?php echo RES;?>/images/face/43.gif" alt="糗大了" onclick="jsbq('糗大了')"></li>
  					<li><img src="<?php echo RES;?>/images/face/44.gif" alt="坏笑" onclick="jsbq('坏笑')"></li>
  					<li><img src="<?php echo RES;?>/images/face/45.gif" alt="左哼哼" onclick="jsbq('左哼哼')"></li>
  					<li><img src="<?php echo RES;?>/images/face/46.gif" alt="右哼哼" onclick="jsbq('右哼哼')"></li>
  					<li><img src="<?php echo RES;?>/images/face/47.gif" alt="哈欠" onclick="jsbq('哈欠')"></li>
  					<li><img src="<?php echo RES;?>/images/face/48.gif" alt="鄙视" onclick="jsbq('鄙视')"></li>
  					<li><img src="<?php echo RES;?>/images/face/49.gif" alt="委屈" onclick="jsbq('委屈')"></li>
  					<li><img src="<?php echo RES;?>/images/face/50.gif" alt="快哭了" onclick="jsbq('快哭了')"></li>
  					<li><img src="<?php echo RES;?>/images/face/51.gif" alt="阴险" onclick="jsbq('阴险')"></li>
  					<li><img src="<?php echo RES;?>/images/face/52.gif" alt="亲亲" onclick="jsbq('亲亲')"></li>
  					<li><img src="<?php echo RES;?>/images/face/53.gif" alt="吓" onclick="jsbq('吓')"></li>
  					<li><img src="<?php echo RES;?>/images/face/54.gif" alt="可怜" onclick="jsbq('可怜')"></li>
  					<li><img src="<?php echo RES;?>/images/face/55.gif" alt="菜刀" onclick="jsbq('菜刀')"></li>
  					<li><img src="<?php echo RES;?>/images/face/56.gif" alt="西瓜" onclick="jsbq('西瓜')"></li>
  					<li><img src="<?php echo RES;?>/images/face/57.gif" alt="啤酒" onclick="jsbq('啤酒')"></li>
  					<li><img src="<?php echo RES;?>/images/face/58.gif" alt="篮球" onclick="jsbq('篮球')"></li>
  					<li><img src="<?php echo RES;?>/images/face/59.gif" alt="乒乓" onclick="jsbq('乒乓')"></li>
  					<li><img src="<?php echo RES;?>/images/face/60.gif" alt="咖啡" onclick="jsbq('咖啡')"></li>
  					<li><img src="<?php echo RES;?>/images/face/61.gif" alt="饭" onclick="jsbq('饭')"></li>
  					<li><img src="<?php echo RES;?>/images/face/62.gif" alt="猪头" onclick="jsbq('猪头')"></li>
  					<li><img src="<?php echo RES;?>/images/face/63.gif" alt="玫瑰" onclick="jsbq('玫瑰')"></li>
  					<li><img src="<?php echo RES;?>/images/face/64.gif" alt="凋谢" onclick="jsbq('凋谢')"></li>
  					<li><img src="<?php echo RES;?>/images/face/65.gif" alt="示爱" onclick="jsbq('示爱')"></li>
  					<li><img src="<?php echo RES;?>/images/face/66.gif" alt="爱心" onclick="jsbq('爱心')"></li>
  					<li><img src="<?php echo RES;?>/images/face/67.gif" alt="心碎" onclick="jsbq('心碎')"></li>
  					<li><img src="<?php echo RES;?>/images/face/68.gif" alt="蛋糕" onclick="jsbq('蛋糕')"></li>
  					<li><img src="<?php echo RES;?>/images/face/69.gif" alt="闪电" onclick="jsbq('闪电')"></li>
  					<li><img src="<?php echo RES;?>/images/face/70.gif" alt="炸弹" onclick="jsbq('炸弹')"></li>
  					<li><img src="<?php echo RES;?>/images/face/71.gif" alt="刀" onclick="jsbq('刀')"></li>
  					<li><img src="<?php echo RES;?>/images/face/72.gif" alt="足球" onclick="jsbq('足球')"></li>
  					<li><img src="<?php echo RES;?>/images/face/73.gif" alt="瓢虫" onclick="jsbq('瓢虫')"></li>
  					<li><img src="<?php echo RES;?>/images/face/74.gif" alt="便便" onclick="jsbq('便便')"></li>
  					<li><img src="<?php echo RES;?>/images/face/75.gif" alt="月亮" onclick="jsbq('月亮')"></li>
  					<li><img src="<?php echo RES;?>/images/face/76.gif" alt="太阳" onclick="jsbq('太阳')"></li>
  					<li><img src="<?php echo RES;?>/images/face/77.gif" alt="礼物" onclick="jsbq('礼物')"></li>
  					<li><img src="<?php echo RES;?>/images/face/78.gif" alt="拥抱" onclick="jsbq('拥抱')"></li>
  					<li><img src="<?php echo RES;?>/images/face/79.gif" alt="强" onclick="jsbq('强')"></li>
  					<li><img src="<?php echo RES;?>/images/face/80.gif" alt="弱" onclick="jsbq('弱')"></li>
  					<li><img src="<?php echo RES;?>/images/face/81.gif" alt="握手" onclick="jsbq('握手')"></li>
  					<li><img src="<?php echo RES;?>/images/face/82.gif" alt="胜利" onclick="jsbq('胜利')"></li>
  					<li><img src="<?php echo RES;?>/images/face/83.gif" alt="抱拳" onclick="jsbq('抱拳')"></li>
  					<li><img src="<?php echo RES;?>/images/face/84.gif" alt="勾引" onclick="jsbq('勾引')"></li>
  					<li><img src="<?php echo RES;?>/images/face/85.gif" alt="拳头" onclick="jsbq('拳头')"></li>
  					<li><img src="<?php echo RES;?>/images/face/86.gif" alt="差劲" onclick="jsbq('差劲')"></li>
  					<li><img src="<?php echo RES;?>/images/face/87.gif" alt="爱你" onclick="jsbq('爱你')"></li>
  					<li><img src="<?php echo RES;?>/images/face/88.gif" alt="NO" onclick="jsbq('NO')"></li>
  					<li><img src="<?php echo RES;?>/images/face/89.gif" alt="OK" onclick="jsbq('OK')"></li>
  					<li><img src="<?php echo RES;?>/images/face/90.gif" alt="爱情" onclick="jsbq('爱情')"></li>
  					<li><img src="<?php echo RES;?>/images/face/91.gif" alt="飞吻" onclick="jsbq('飞吻')"></li>
  					<li><img src="<?php echo RES;?>/images/face/92.gif" alt="跳跳" onclick="jsbq('跳跳')"></li>
  					<li><img src="<?php echo RES;?>/images/face/93.gif" alt="发抖" onclick="jsbq('发抖')"></li>
  					<li><img src="<?php echo RES;?>/images/face/94.gif" alt="怄火" onclick="jsbq('怄火')"></li>
  					<li><img src="<?php echo RES;?>/images/face/95.gif" alt="转圈" onclick="jsbq('转圈')"></li>
  					<li><img src="<?php echo RES;?>/images/face/96.gif" alt="磕头" onclick="jsbq('磕头')"></li>
  					<li><img src="<?php echo RES;?>/images/face/97.gif" alt="回头" onclick="jsbq('回头')"></li>
  					<li><img src="<?php echo RES;?>/images/face/98.gif" alt="跳绳" onclick="jsbq('跳绳')"></li>
  					<li><img src="<?php echo RES;?>/images/face/99.gif" alt="挥手" onclick="jsbq('挥手')"></li>
  					<li><img src="<?php echo RES;?>/images/face/100.gif" alt="激动" onclick="jsbq('激动')"></li>
  					<li><img src="<?php echo RES;?>/images/face/101.gif" alt="街舞" onclick="jsbq('街舞')"></li>
  					<li><img src="<?php echo RES;?>/images/face/102.gif" alt="献吻" onclick="jsbq('献吻')"></li>
  					<li><img src="<?php echo RES;?>/images/face/103.gif" alt="左太极" onclick="jsbq('左太极')"></li>
  					</ul>
  				</li>
  			</ul>
  		</div><div class="clr"></div>
  	<script type="text/javascript">
function jsbq(srt){
document.getElementById("Hfcontent").value=document.getElementById("Hfcontent").value+"/"+srt;
}
</script></TD>
  </TR>
  </TBODY>
</TABLE>
  </form>



  </div>

        </div>

        <div class="clr"></div>
      </div>
    </div>
  </div>

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