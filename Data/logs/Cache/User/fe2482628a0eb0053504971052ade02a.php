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
<script src="<?php echo RES;?>/js/date/WdatePicker.js"></script>
 <form class="form" method="post"   action=""  target="_top" enctype="multipart/form-data" >
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
    <h4>编辑<?php echo ($lotteryTypeName); ?>活动开始内容</h4><a href="javascript:history.go(-1);"  class="right btnGrayS vm" style="margin-top:-27px" >返回</a>
</div> 
<div class="msgWrap bgfc"> 
<TABLE class="userinfoArea" style=" margin:0;" border="0" cellSpacing="0" cellPadding="0" width="100%"><TBODY>
<TR>
  <th valign="top"><span class="red">*</span>关键词：</th>
  <TD>
	<input type="hidden" class="px" value="4" name="type" style="width:400px" >
	<input type="input" class="px" id="keyword" value="<?php if($vo['keyword'] == ''): echo ($lotteryTypeName); else: echo ($vo["keyword"]); endif; ?>" name="keyword" style="width:400px" ><br />
  	<span class="red">只能写一个关键词</span>，用户输入此关键词将会触发此活动。
  </TD>
  <TD rowspan="7" valign="top">
	  <div style="margin-left:20px">
		<img id="pic1_src" src="<?php if($vo['starpicurl'] == ''): echo ($f_siteUrl); ?>/tpl/static/luckyFruit/user/start.jpg<?php else: echo ($vo["starpicurl"]); endif; ?>" width="373px" >	
		<br />
		<input class="px"  name="starpicurl" value="<?php if($vo['starpicurl'] == ''): echo ($f_siteUrl); ?>/tpl/static/luckyFruit/user/start.jpg<?php else: echo ($vo["starpicurl"]); endif; ?>" id="pic1" style="width:363px;"  />
		<br />
		  <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('pic1',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('pic1')">预览</a>&nbsp;活动开始图片
	  </div>
  </TD>
</TR>
<TR>
  <th valign="top"><span class="red">*</span>活动名称：</th>
  <TD>
	<input type="input" class="px" id="title" value="<?php if($vo['title'] == ''): echo ($lotteryTypeName); ?>活动开始了<?php else: echo ($vo["title"]); endif; ?>" name="title" style="width:400px" />
  	<br />
  	请不要多于50字!
  </TD>
  <TR>
  	<th valign="top"><span class="red">*</span>兑奖信息：</th>
  	<td>
		<input type="input" class="px" id="txt" value="<?php if($vo['txt'] == ''): ?>兑奖请联系我们，电话138********<?php else: echo ($vo["txt"]); endif; ?>" name="txt" style="width:400px" />
  		<br />请不要多于100字! 这个设定但用户输入兑奖时候的显示信息!
	</td>
  </TR>
 <TR>
  	<th valign="top"><span class="red">*</span>中奖提示：</th>
  	<td><textarea class="px" id="sttxt"  name="sttxt" style="width:400px"  ><?php echo ($vo["sttxt"]); ?></textarea> 中奖后,提示信息
  		 </td>
</TR>
<TR>
	<th><span class="red">*</span>活动时间：</th>
	<td><input type="input" class="px" id="statdate" value="<?php if($vo['statdate'] != ''): echo (date("Y-m-d H:i:s",$vo["statdate"])); endif; ?>" onClick="WdatePicker()" name="statdate" />                
		到
		<input type="input" class="px" id="enddate" value="<?php if($vo['enddate'] != ''): echo (date("Y-m-d H:i:s",$vo["enddate"])); endif; ?>" name="enddate"  onClick="WdatePicker()"  /> 
	</td>
</TR>
<TR>
<th valign="top">活动说明：</th>
<td><textarea  class="px" id="info" name="info"  style="width:400px; height:125px" ><?php if($vo['info'] == ''): ?>亲，请点击进入<?php echo ($lotteryTypeName); ?>活动页面，祝您好运哦！<?php else: echo ($vo["info"]); endif; ?></textarea><br />换行请输入
 &lt;br&gt;
 </td>
</TR>
<TR>
<th><span class="red">*</span>重复抽奖回复：</th>
<td><input type="input" class="px" id="aginfo" value="<?php if($vo['aginfo'] == ''): ?>亲，继续努力哦！<?php else: echo ($vo["aginfo"]); endif; ?>" name="aginfo" style="width:400px" />备注：
如果设置只允许抽一次奖的，请写：你已经玩过了，下次再来。

如果设置可多次抽奖，请写：亲，继续努力哦！</td>
</TR>
</TBODY>
</TABLE>
  </div> 
  
<!--活动结束-->
<div class="cLineB">
          	<h4>活动结束内容</h4></div> 
<div class="msgWrap bgfc">
 
  	<table class="userinfoArea" style=" margin: 0;" border="0" cellspacing="0" cellpadding="0" width="100%">
  		<tbody>
  			<tr>
  				<th valign="top"><span class="red">*</span>活动结束公告主题：</th>
  				<td><input type="input" class="px" id="endtite" value="<?php if($vo['endtite'] == ''): echo ($lotteryTypeName); ?>活动已经结束了<?php else: echo ($vo["endtite"]); endif; ?>" name="endtite" style="width:400px" />
  					<br />
  					请不要多于50字! </td>
  				<td rowspan="4" valign="top"><div style="margin-left:20px"><img  id="pic2_src" src="<?php if($vo['endpicurl'] == ''): echo ($f_siteUrl); ?>/tpl/static/luckyFruit/user/end.jpg<?php else: echo ($vo["endpicurl"]); endif; ?>"  width="373px"/> <br />
  					<input class="px" id="pic2"  name="endpicurl" value="<?php if($vo['endpicurl'] == ''): echo ($f_siteUrl); ?>/tpl/static/luckyFruit/user/end.jpg<?php else: echo ($vo["endpicurl"]); endif; ?>"  style="width:363px;"  />
  					<br />
  					  <script src="/tpl/static/upyun.js"></script><a href="###" onclick="upyunPicUpload('pic2',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('pic2')">预览</a>&nbsp; 活动结束图片网址 </div></td>
  				</tr>
  			<tr>
  				<th valign="top">活动结束说明：</th>
  				<td valign="top"><textarea  class="px" id="endinfo" name="endinfo"  style="width:400px; height:125px" ><?php if($vo['endinfo'] == ''): ?>亲，活动已经结束，请继续关注我们的后续活动哦。<?php else: echo ($vo["endinfo"]); endif; ?></textarea><br />换行请输入
 &lt;br&gt;
  				  </td>
  				</tr>
  			</tbody>
  		</table>
  </div> 
  
  
<!--奖项设置-->
<div class="cLineB">
          	<h4>奖项设置</h4></div> 
<div class="msgWrap bgfc">

<TABLE class="userinfoArea" style=" margin: 0;" border="0" cellSpacing="0" cellPadding="0" width="100%">
<TBODY>
<TR>
<th valign="top"><span class="red">*</span>一等奖奖品设置：</th>
<td><input type="input" class="px" id="fist"  name="fist" value="<?php echo ($vo["fist"]); ?>"  style="width:250px"/>
请不要多于50字! </td>
  <TD rowspan="9" valign="top">&nbsp;</TD>
</TR>
<TR>
<th valign="top"><span class="red">*</span>一等奖奖品数量：</th>
<td><input type="input" class="px" id="fistnums" name="fistnums"      value="<?php echo ($vo["fistnums"]); ?>" style="width:60px" />
  <span class="red">如果是100%中奖,请把一等奖的奖品数量[ 1000就代表前1000人都中奖 ]填写多点</span></td>
</TR>
<TR>
<th valign="top">二等奖奖品设置：</th>
<td><input type="input" class="px" id="second" name="second"     value="<?php echo ($vo["second"]); ?>"  style="width:250px"/>
请不要多于50字! </td>
</TR>
<TR>
<th valign="top">二等奖奖品数量：</th>
<td><input type="input" class="px" id="secondnums" name="secondnums"   value="<?php echo ($vo["secondnums"]); ?>" style="width:60px" />
</td>
</TR>
<TR>
<th valign="top">三等奖奖品设置：</th>
<td><input type="input" class="px" id="third" name="third"   value="<?php echo ($vo["third"]); ?>" style="width:250px" />
请不要多于50字! </td>
</TR>
<TR>
<th valign="top">三等奖奖品数量：</th>
<td><input type="input" class="px" id="thirdnums" name="thirdnums"     value="<?php echo ($vo["thirdnums"]); ?>" style="width:60px" />
</td>
</TR>
<TR>
<th valign="top">四等奖奖品设置：</th>
<td><input type="input" class="px" id="four"  name="four" value="<?php echo ($vo["four"]); ?>"  style="width:250px"/>
请不要多于50字! </td>
  <TD rowspan="9" valign="top">&nbsp;</TD>
</TR>
<TR>
<th valign="top">四等奖奖品数量：</th>
<td><input type="input" class="px" id="fournums" name="fournums"      value="<?php echo ($vo["fournums"]); ?>" style="width:60px" />
 </td>
</TR>
<TR>
<th valign="top">五等奖奖品设置：</th>
<td><input type="input" class="px" id="five"  name="five" value="<?php echo ($vo["five"]); ?>"  style="width:250px"/>
请不要多于50字! </td>
  <TD rowspan="9" valign="top">&nbsp;</TD>
</TR>
<TR>
<th valign="top">五等奖奖品数量：</th>
<td><input type="input" class="px" id="fivenums" name="fivenums"      value="<?php echo ($vo["fivenums"]); ?>" style="width:60px" />
 </td>
</TR>
<TR>
<th valign="top">六等奖奖品设置：</th>
<td><input type="input" class="px" id="six"  name="six" value="<?php echo ($vo["six"]); ?>"  style="width:250px"/>
请不要多于50字! </td>
  <TD rowspan="9" valign="top">&nbsp;</TD>
</TR>
<TR>
<th valign="top">六等奖奖品数量：</th>
<td><input type="input" class="px" id="sixnums" name="sixnums"      value="<?php echo ($vo["sixnums"]); ?>" style="width:60px" />
 </td>
</TR>
  
  </tbody>
 <tbody>
<TR>
<th valign="top"><span class="red">*</span>预计活动的人数：</th>
<td><input type="input" class="px" id="allpeople" name="allpeople"   value="<?php echo ($vo["allpeople"]); ?>" style="width:150px"/>  预估活动人数直接影响抽奖概率：中奖概率 = 奖品总数/(预估活动人数*每人抽奖次数) 如果要确保任何时候都100%中奖建议设置为1人参加!<span class='red'>如果要确保任何时候都100%中奖建议设置为1人参加!并且奖项只设置一等奖.</span></td>
  </TR>
                                <TR>
<th valign="top"><span class="red">*</span>每人最多允许抽奖次数：</th>
<td><input type="input" class="px" id="canrqnums" name="canrqnums"   value="<?php echo ($vo["canrqnums"]); ?>" style="width:150px"/>
必须1-5之间的数字</td>
 </TR>
 <tr>
<th valign="top"><span class="red"></span>每天最多抽奖次数：</th>
<td><input class="px" id="daynums" name="daynums" style="width:150px" value="<?php echo ($vo["daynums"]); ?>" type="input">
必须小于总抽奖次数！ 0 为不限制 抽完总数就不能抽了! 可以抽奖天数 = 总数/每天抽奖次数!</td>
</tr>                                 
<tr style="display:none">
<th valign="top">SN码生成设置：</th>
<td>
    <input class="radio" type="radio" checked name="snimport" value="0">自动生成  
    <input class="radio" type="radio" name="snimport" value="1">手动生成(SN码管理)
</td> 
</tr>
<tr>
<th valign="top">兑奖密码：</th>
<td><input class="px" id="parssword" name="parssword" value="<?php echo ($vo["parssword"]); ?>" style="width:150px" type="input">
消费确认密码长度小于15位 不设置密码,兑奖页面的密码输入框则不出现</td>
                                        </tr>
                                                                       <tr>
<th valign="top">SN码重命名为：</th>
<td><input class="px" id="renamesn" name="renamesn" value="<?php if($vo.renamesn): echo ($vo["renamesn"]); else: ?>SN码<?php endif; ?>" style="width:150px" type="input"> 例如：CND码,充值密码,SN码 这个主意用于修改SN码的名称，不懂请别修改</td>
                                        </tr>
                                         <tr>
<th valign="top">手机号重命名：</th>
<td><input class="px" id="renametel" name="renametel" value="<?php if($vo.renametel): echo ($vo["renametel"]); else: ?>手机号<?php endif; ?>" style="width:150px" type="input"> 例如：QQ号,微信号,手机号等其他联系方式，不懂请别修改</td> 
                                        </tr>
<TR>
	<th valign="top">抽奖页面是否显示奖品数量：</th>
	<td><input class="radio" type="radio" name="displayjpnums" value="1"  <?php if($vo['displayjpnums'] == 1): ?>checked<?php endif; ?> >显示  <input class="radio" type="radio" name="displayjpnums" value="0"  <?php if($vo['displayjpnums'] == 0): ?>checked<?php endif; ?>>不显</td> 
</TR> 
<TR>
	<th valign="top">注册后才能参与：</th>
	<td><input class="radio" type="radio" name="needreg" value="1"  <?php if($vo['needreg'] == 1): ?>checked<?php endif; ?> > 需要先注册  <input class="radio" type="radio" name="needreg" value="0"  <?php if($vo['needreg'] == 0): ?>checked<?php endif; ?>> 不需要先注册</td> 
</TR> 
<TR>
<th>&nbsp;</th>
<td><button type="submit" class="btn btn-success" >保存</button>　<a href=""  class="btn btn-danger">取消</a>　<span class="red"></span></td>
</TBODY>
</TABLE>
    



  </div> 


        </div>
</form>
      
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