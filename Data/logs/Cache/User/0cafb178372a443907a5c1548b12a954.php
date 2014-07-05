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
<div id="content" style="margin-top:50px; margin-left:15px;">
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/cymain.css" />  
<div class="tab">
<ul>
<li class='<?php if((ACTION_NAME == 'autobind_add')): ?>current<?php endif; ?> tabli' id="tab5"><a href="<?php echo U('Index/autobind_add');?>">一键绑定</a></li>
<li class='<?php if((ACTION_NAME == 'add')): ?>current<?php endif; ?> tabli' id="tab5"><a href="<?php echo U('Index/add');?>">手动绑定</a></li>
</ul>
</div>
                      <div class="box-content">
                             <div class="alert"><strong>温馨提示：</strong>在此处添加微信公众号后将自动绑定，请确认您已打开微信公众平台中的开发模式</div>

                            <form method="post"  enctype="multipart/form-data">
								<div class="control-group">
                                    <label for="plc_name" class="control-label">微信公众平台帐号：</label>
                                    <div class="controls">
                                        <input type="text" name="username" value="" class="px" tabindex="1" size="40"><span class="maroon">*您登录官方公众平台的那个邮件地址</span>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label for="wechat_id" class="control-label">微信公众平台密码：</label>
                                    <div class="controls">
                                        <input type="password" required="" class="px" tabindex="1" value="" name="password" size="25"><span class="maroon">*绑定大概要5秒钟时间，本站不会记录任何数据，如果不放心请使用手动绑定模式！</span>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">绑定</button>
                                    <a class="btn" href="Javascript:window.history.go(-1)">取消</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>