<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
<title> <?php echo C('site_title');?> <?php echo C('site_name');?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/matrix-media.css" />
<link href="<?php echo RES;?>/138/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo RES;?>/138/css/jquery.gritter.css" />
<link href="<?php echo RES;?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo RES;?>/css/stylet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/top_v5.css"/>
<link rel="shortcut icon" href="/favicon.ico" />
<script type="text/javascript" src="<?php echo RES;?>/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/common.js"></script>
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
    <li class="active"><a href="<?php echo U('User/Index/index');?>"><i class="icon-refresh"></i> <span>管理首页</span></a> </li>
    
    <li> <a href="#"><i class="icon-cogs"></i> <span>欢迎您：<?php echo (session('uname')); ?></span></a>
    </li>
    
    <li> <a href="<?php echo U('Alipay/index');?>"><i class="icon-group"></i> <span>帐号充值</span></a>
    </li>
    
    <li> <a href="<?php echo U('Index/add');?>"><i class="icon icon-pencil"></i> <span>添加公众帐号</span></a>
    </li>
    
    <li> <a href="<?php echo U('Index/useredit');?>"><i class="icon-rss"></i> <span>修改密码</span></a>
    </li>
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

<div id="content" style="margin-top:80px; margin-left:15px;">

  <div id="content-header">

  </div>

  <div  class="quick-actions_homepage">

    <ul class="quick-actions">

      <li class="bg_lb"> <a href="<?php echo U('Index/add');?>"> <i class="icon-plus-sign"></i> 添加微信公众帐号 </br> 体验智能微信 </a> </li>

      <li class="bg_lg"> <a href="<?php echo U('Index/autobind_add');?>"> <i class="icon-user"></i> 一键智能绑定公众号 </br> 高效快速</a> </li>

      <li class="bg_ly"> <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=3669955&amp;Site=宏宏CMS客服&amp;Menu=yes"> <i class=" icon-thumbs-up"></i> 官方QQ号 </br> <?php echo C('site_qq');?> </a> </li>

      <li class="bg_lo"> <a href="<?php echo U('Alipay/index');?>"> <i class="icon-money"></i> 在线充值 </br> 体验更多功能 </a> </li>

      <li class="bg_ls"> <a href="<?php echo U('Home/Index/help',array('id'=>$vo['id'],'token'=>$vo['token']));?>"> <i class="icon-random"></i> 手动绑定帐号 </br> 查看手动绑定教程</a> </li>

    </ul>

  </div>

  </div>

  <div class="widget-box">

            <div class="alert alert-error">

              <button class="close" data-dismiss="alert">×</button>

              <strong><?php echo C('site_name');?>申明!</strong> <?php echo C('site_name');?>没有在淘宝等平台售卖任何源码，任何以<?php echo C('site_name');?>名义进行交易的都是骗子，请不要上当受骗。使用破解版会带来各种服务器的不稳定安全因素。唯一官网：<?php echo C('site_url');?></div>

    <div class="row-fluid">

      <div class="span6">

        <div class="widget-box">

          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><a href="#" target="_blank" class="vipimg vip-icon<?php echo $userinfo['taxisid']-1; ?>" title=""></a></span>

            <h5>用户：<?php echo (session('uname')); ?></h5>

          </div>

          <div class="widget-content nopadding collapse in" id="collapseG2">

            <ul class="recent-posts">

            

            <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>

                <div class="user-thumb"><img src="<?php echo ($vo["headerpic"]); ?>" width="40" height="40"></div>

                <div class="article-post"><div class="fr"><a href="<?php echo U('Index/edit',array('id'=>$vo['id']));?>" class="btn btn-primary btn-mini">编辑</a> <a href="<?php echo U('Function/index',array('id'=>$vo['id'],'token'=>$vo['token']));?>" class="btn btn-success btn-mini">功能管理</a> <a href="javascript:drop_confirm('你确定要删除本帐号吗，删除会清除所有资料和设置!', 'index.php?g=User&m=Index&a=del&id=<?php echo ($vo["id"]); ?>');" class="btn btn-danger btn-mini">删除</a></div><span class="user-info"><span class="by label"><?php echo ($vo["wxname"]); ?></span> 等级：<img src="<?php echo RES;?>/images/vip.png" /> 到期时间 / <span class="date badge badge-important"><?php echo (date("Y-m-d",$viptime)); ?></span>

                  <p><a href="<?php echo U('Alipay/index');?>" class="btn btn-danger btn-mini"><em>升级VIP套餐</em></a> <a href="<?php echo U('Home/Index/help',array('id'=>$vo['id'],'token'=>$vo['token']));?>" target="_blank" class="btn btn-success btn-mini">微信绑定TOKEN</a> <a href="<?php echo U('Home/Index/helpyx',array('id'=>$vo['id'],'token'=>$vo['token']));?>" target="_blank" class="btn btn-success btn-mini">易信绑定TOKEN</a></p>

                </div>

              </li><?php endforeach; endif; else: echo "" ;endif; ?>

                <button class="btn btn-warning btn-mini">VIP有效时间：<?php if($_SESSION['viptime'] != 0): echo (date("Y-m-d",$thisUser["viptime"])); else: ?>vip0不限时间<?php endif; ?></button>

              </li>

            </ul>

          </div>

        </div>

      </div>

      <div class="span6">

        <div class="widget-box">

          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>

            <h5>官方最新动态</h5>

          </div>

          <div class="widget-content nopadding updates collapse in" id="collapseG3">

            <div class="new-update clearfix"><i class="icon-rss"></i>

              <div class="update-done"><a title="" href="<?php echo U('Home/Index/news_4');?>" target="_blank"><strong>什么是<?php echo C('site_name');?>智慧WIFI系统？</strong></a> <span><?php echo C('site_name');?>WIFI是由无线wifi广告路由器+智能营销管理系统+CRM客户关系管理系统+PC/Web网站组成……</span> </div>

              <div class="update-date"><span class="update-day">20</span>jan</div>

            </div>

            <div class="new-update clearfix"> <i class="icon-gift"></i> <span class="update-notice"> <a title="" href="<?php echo U('Home/Index/news_2');?>" target="_blank"><strong><?php echo C('site_name');?>WIFI有什么作用？ </strong></a> <span><?php echo C('site_name');?>WIFI 之七大看家武器,1、wifi热点认证管理系统2、PCRM(员工/客户管理)3、在线预定、结账平台4、电子代金券(会员卡)5、商家电脑手机版微站系统6、WIFI在线客服机器人(智能客服)7、WIFI智能推广平台(智能互动营销) </span> </span> <span class="update-date"><span class="update-day">11</span>jan</span> </div>

            <div class="new-update clearfix"> <i class="icon-move"></i> <span class="update-alert"> <a title="" href="<?php echo U('Home/Index/help');?>" target="_blank"><strong>如何手动绑定微信公众帐号！</strong></a> <span>1、注册并登录<?php echo C('site_name');?>接口平台 2、添加公众号 → 功能管理 → 勾选要开启的功能 ...</span> </span> <span class="update-date"><span class="update-day">07</span>Jan</span> </div>

            <div class="new-update clearfix"> <i class="icon-leaf"></i> <span class="update-done"> <a title="" href="<?php echo U('Home/Index/ap');?>" target="_blank"><strong>点击查看<?php echo C('site_name');?>智慧WIFI专题</strong></a> <span><?php echo C('site_name');?>智慧WIFI不仅仅是一个wifi，<?php echo C('site_name');?>智慧WIFI是商家的一个24小时的免费广告机+客户的微信营销平台+饭店的点餐系统+客户营销管理系统。</span> </span> <span class="update-date"><span class="update-day">05</span>jan</span> </div>

            <div class="new-update clearfix"> <i class="icon-question-sign"></i> <span class="update-notice"> <a title="" href="http://sighttp.qq.com/authd?IDKEY=7f34d741a6fb98a20e7070e67f2f3f6eb0daebfeb3ffc8ad" target="_blank"><strong>点击联系在线客服</strong></a> <span>技术支持QQ：<?php echo C('site_qq');?></span> </span> <span class="update-date"><span class="update-day">01</span>jan</span> </div>

          </div>

        </div>

      </div>

    </div>

  <div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>

              <h4 class="alert-heading">欢迎您 <?php echo (session('uname')); ?></h4>

              在任何地方，在任何时间 ！ <?php echo C('site_name');?>，帮你打造最专业、最智能的微信智能公众平台 我们的追求，只为更加完美的你！</div>



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