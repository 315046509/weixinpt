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
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.css" />
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script>
	KindEditor.ready(function(K){
		var editor = K.editor({
			allowFileManager:true
		});
		K('#upload').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					fileUrl : K('#pic').val(),
					clickFn : function(url, title) {
						if(url.indexOf("http") > -1){
							K('#pic').val(url);
						}else{
							K('#pic').val("<?php echo C('site_url');?>"+url);
						}
						editor.hideDialog();
					}
				});
			});
		});
	});
</script>
<!--tab start-->
<div id="content" style="margin-top:55px; margin-left:15px;">
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/cymain.css" />  
<div class="tab">
<ul>
<li class='<?php if((ACTION_NAME == 'autobind_add')): ?>current<?php endif; ?> tabli' id="tab5"><a href="<?php echo U('Index/autobind_add');?>">一键绑定</a></li>
<li class='<?php if((ACTION_NAME == 'add')): ?>current<?php endif; ?> tabli' id="tab5"><a href="<?php echo U('Index/add');?>">手动绑定</a></li>
</ul>
</div>
<!--tab end-->
<div class="content" style="width:98%; background:none; margin-left:15px; border:none; margin-bottom:30px;" >
          
          <form method="post" action="<?php echo U('User/Index/insert');?>" enctype="multipart/form-data">
          <div class="msgWrap">
            <table class="userinfoArea" border="0" cellspacing="0" cellpadding="0" width="100%">
              <thead>
                <tr>
                  <th><span class="red">*</span>公众号名称：</th>
                  <td><input type="text" required="" class="px" name="wxname" value="" tabindex="1" size="25">
                  </td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th><span class="red">*</span>微信公众号原始id：</th>
                  <td><input type="text" required="" name="wxid" value="" onmouseup="this.value=this.value.replace('_430','')" class="px" tabindex="1" size="25">　<span class="red">请认真填写，错了不能修改。</span>比如：gh_423dwjkeww3 <a href="/tpl/static/getoid.htm" target="_blank"><img src="<?php echo RES;?>/images/help.png" class="vm helpimg" title="帮助"></a></td>
                </tr>
              <tr>
                  <th><span class="red">*</span>易信公众号原始id：</th>
                  <td><input type="text" required="" name="yxid" value="" onmouseup="this.value=this.value.replace('_430','')" class="px" tabindex="1" size="25">　<span class="red">非必填项！可联系客服帮助获取</span></td>
                </tr>    
                
                <tr>
                  <th><span class="red">*</span>微信号：</th>
                  <td><input type="text" required="" name="weixin" value="" class="px" tabindex="1" size="25">　比如：138wo </td>
                </tr>
                <tr>
                  <th><span class="red"></span>AppID：</th>
                  <td><input type="text" name="appid" value="" class="px" tabindex="1" size="25">　用于自定义菜单等高级功能，可以不填 </td>
                </tr>
                <tr>
                  <th><span class="red"></span>AppSecret：</th>
                  <td><input type="text" name="appsecret" value="" class="px" tabindex="1" size="25">　用于自定义菜单等高级功能，可以不填 </td>
                </tr>
                
                <tr>
                  <th><span class="red"></span>微信号类型：</th>
                  <td><select id="winxintype" name="winxintype">                  
                  <option value="1">订阅号</option>
                  <option value="2">服务号</option>
                  <option value="3">高级服务号</option>
                  </select>　高级服务号是指每年向微信官方交300元认证费的公众号 </td>
                </tr>
                  <tr style="display:none">
                  <th><span class="red">*</span>头像地址（url）:</th>
                  <td><input class="px" name="headerpic" value="<?php echo RES;?>/images/portrait.jpg" size="60">请填写图片外链地址 <a onclick="alert('请填写以jpg,png,gif,bmp等后缀的图文')" target="_blank"><img src="<?php echo RES;?>/images/help.png" class="vm helpimg" title="帮助"></a></td>
                </tr>
                 <tr style="display:none">
                  <th><span class="red">*</span>TOKEN</th>
                  <td><input type="text" name="token" value="<?php echo ($tokenvalue); ?>" class="px" tabindex="1" size="40">(填写你的公众号)例：weiwinweixin,请勿填写文,或者其它特殊字符，此处token和腾讯平台必须一致!</td>
                </tr>
                
                <tr style="display:none">
                  <th><span class="red">*</span>地区</th>
                  <td>
                  <input type="text" class="px" id="province" value="p" name="province" tabindex="1" size="20"> 省  <input id="city" value="c" type="text" name="city" class="px" tabindex="1" value="c" size="20"> 市
               （此处关联公交等本地化查询）
                  </td>
                </tr>
                <tr style="display:none">
                  <th><span class="red">*</span>公众号邮箱：</th>
                  <td><input type="text" required="" class="px" tabindex="1" value="<?php echo ($email); ?>" name="qq" size="25"></td>
                </tr>
                 <tr style="display:none">
                  <th><span class="red">*</span>粉丝数：</th>
                  <td><input type="text" required="" name="wxfans" value="0" class="px" tabindex="1" size="25"></td>
                </tr>
             
                <tr style="display:none">
                  <th>类型：</th>
                  <td><select id="type" name="type">                  
                  <option value="1,情感">情感</option>
                  <option value="2,数码">数码</option>
                  <option value="3,娱乐">娱乐</option>
                  <option value="4,IT">IT</option>
                  <option value="5,数码">数码</option>
                  <option value="6,购物">购物</option>
                  <option value="7,生活">生活</option>
                  <option value="8,服务" selected>服务</option>
                  </select></td>
                </tr>
              
                <tr>
                  <th></th>
                  <td><button type="submit" class="btn btn-success" id="saveSetting">保存</button></td>
                </tr>
              </tbody>
            </table>
            
          </div>
          </form>
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