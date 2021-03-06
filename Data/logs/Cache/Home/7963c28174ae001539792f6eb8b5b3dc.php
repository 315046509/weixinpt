<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, user-scalable=no">
<meta content="<?php echo C('keyword');?>" name="Keywords">
<meta content="<?php echo C('content');?>" name="Description">
<title><?php echo C('site_name');?>-微信公众平台互动营销专家</title>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/base.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/auth.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style-price.css"/>
<script type="text/javascript" src="<?php echo RES;?>/js/jQuery.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/sea.js"></script>
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

                <div id="logo">

                    <a href="/" class="logocover"></a>

                    <a href="/" title="" hidefocus="true" class="logo-ornament logo-animation" id="logo_ornament"></a>

                </div>

                <ul>

                    <li><a href="/" class="hover" title="首页">首页</a></li>

                    <li class="divider"></li>

                    <li><a href="<?php echo U('Home/Index/about');?>">关于宏宏CMS</a></li>

                    <li class="divider"></li>

                    <li><a href="<?php echo U('Home/Index/service');?>">功能介绍</a></li>

                    <li class="divider"></li>

                    <li><a href="<?php echo U('Home/Index/case');?>">案例展示</a></li>

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

                    <li><a href="/#" onClick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" >退出</a></li><?php endif; ?>

                    <?php if($_SESSION[uid]==false): ?><li class="divider"></li>

                    <li class="header-account"><a href="<?php echo U('Home/Index/reg');?>" class="create">创建一个账号</a><a href="<?php echo U('Home/Index/index');?>" class="login">登录</a></li>

                    <?php else: ?>

                    <li class="header-account"><a href="#" class="a" id="tiduser" onMouseOver="ying();" ><span><?php echo (session('uname')); ?></span></a></li><?php endif; ?>

              </ul>

            </div>

        </div>

    </div>

</div>

<style type="text/css">
<!--
.STYLE1 {
    color: #00FF00;
    font-weight: bold;
}
.STYLE2 {color: #FF0000}
-->
</style>
<div class="content-area">
<div class="content-box">
<div class="Public-content clearfix">
    <div class="Public">
        <div class="document faq">
            <div class="normalTitle"><h2>资费</h2></div>
            <div class="normalContent">
                <div class="section lastSection">
                	<table width="100%" border="0" cellpadding="0" cellspacing="0" class=" ListProduct8">
<thead>
                			<tr>
                				<th class="lefttitle"><strong>微信号流量套餐</strong></th>
                				<th width="250">vip0</th>
                				<th width="250">vip1</th>
                				<th width="250">vip2</th>
                				<th width="250" class="norightborder">vip3</th>
               				</tr>
</thead>
<tbody>
                			<tr>
                				<td height="60" valign="middle" class="lefttitle">VIP价格
                					<a  class="tooltips" ><img src="<?php echo RES;?>/images/price_help.png" align="absmiddle" /><span>
<p>VIP只是流量套餐（自定义数和赠送的请求数不同而已），点击问号查看详细购买流程！</p>
</span></a></td>
                				<td><span class=><?php echo C('vip0');?>
                				    元 / 月
           				      </span>                				  <p class="STYLE1"><?php echo C('vip0m');?> 元 / 年 </p></td>
                				<td><span class=><?php echo C('vip1');?>
                				    元 / 月
                				    <p class="STYLE1"><?php echo C('vip1m');?> 元 / 年</p>
                				</span></td>
                				<td><span class=><?php echo C('vip2');?>
                				    元 / 月
                				        <p class="STYLE1"><?php echo C('vip2m');?> 元 / 年</p>
                				</span></td>
                				<td><span class=><?php echo C('vip3');?>
                				    元 / 月
           				      </span>                				  <p class="STYLE1"><?php echo C('vip3m');?> 元 / 年 </p></td>
               				</tr>
                			<tr>
                				<td height="32" class="lefttitle">自定义条数限额 <span class="tooltips" ><img src="<?php echo RES;?>/images/price_help.png" align="absmiddle" /><span>
<p><strong>什么是自定义限额数？</strong></p>
<p>自定义分：自定义文本、自定义图文、自定义语音。意思是，你写一个图文就少一个自定义图文〔vip0图文、文本、语音都有2000自定义，够挥霍了。〕</p>
</span></span></td>
                				<td>2000</td>
                				<td>3000</td>
                				<td>40000</td>
                				<td class="norightborder">50000</td>
               				</tr>
                			<tr>
                				<td height="32" class="lefttitle">赠送月请求次数 <span class="tooltips"><img src="<?php echo RES;?>/images/price_help.png" align="absmiddle" />
<span>
<p><strong>什么是请求数？</strong></p>
<p>用户发送一句话，就代表一个请求。
比如：用户发送 "你好！"，系统回复"你也好！"
这就算一个请求，如果系统没回复，则不计。
〔温馨提示：3G功能〔分类功能〕请求也算在内。3G请求看不到，只是粉丝在浏览里3G网站时候，浏览一篇文章，或者重新打开一个分类就算一个请求。〕</p>
<p><strong>什么是赠送请求？</strong></p>
<p>用户购买VIP流量套餐后会赠送用户一些功能和请求数，这个请求数被 称为赠送请求数。</p>
</span></span></td>
                				<td>1000</td>
                				<td>3000</td>
                				<td>40000</td>
                				<td class="norightborder">100000</td>
               				</tr>
                            <tr >
                				<td height="50" class="lefttitle">每月免收活动创建费次数<span class="tooltips"><img src="<?php echo RES;?>/images/price_help.png" align="absmiddle" />
<span>
<p><strong>什么是活动创建费？</strong></p>
<p>创建1次活动的基础费是10元,这就是活动创建费。免收活动创建费就是免10元，无其他任何费用！</p>
</span></span></td>
                				<td>0次</td>
                				<td>5次</td>
                				<td>10次</td>
                				<td class="norightborder">20次</td>
               				</tr>
                            <tr >
                				<td height="50" class="lefttitle">可绑定帐号数<span class="tooltips"><img src="<?php echo RES;?>/images/price_help.png" align="absmiddle" />
<span>
<p><strong>什么是可绑定帐号数？</strong></p>
<p>用户可自己添加绑定帐号，等级越高的VIP可绑定的公众帐号数量也就越多！一个VIP3可以供多个帐号同时使用，而且功能设置互相不冲突！</p>
</span></span></td>
                				<td>1个</td>
                				<td>1个</td>
                				<td>2个</td>
                				<td class="norightborder">3个</td>
               				</tr> 
					  <td class="lefttitle">会员卡数量</td>
                				<td class="error">&nbsp;</td>
                				<td class=" ">1</td>
                				<td class="">5</td>
                				<td class=" ">10</td>
                            <tr >
                				<td height="50" class="lefttitle">底部版权信息<span class="tooltips"><img src="<?php echo RES;?>/images/price_help.png" align="absmiddle" />
<span>
<p><strong>版权信息？</strong></p>
<p>	V0 页面有:此页面是由【<a href="<?php echo C('site_url');?>"><?php echo C('site_name');?>接口平台</a>】系统生成 版权信息</p>
</span></span></td>
                				<td>有</td>
                				<td>无</td>
                				<td>无</td>
                				<td class="norightborder">无</a></td>
               				</tr>
                			<tr >
               				  <td height="50" class="lefttitle"> <span class="red STYLE2"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes"target="_blank">点击联系管理员QQ</a><br>自助开通VIP服务</span></td>
                				<td><a class="btnGreens"  href="<?php echo U('User/Alipay/index',array('gid'=>0));?>"><em>免费使用</em></a></td>
                				<td><a class="btnGreens"  href="<?php echo U('User/Alipay/index',array('gid'=>1));?>"><em>立即充值</em></a></td>
                				<td><a class="btnGreens"  href="<?php echo U('User/Alipay/index',array('gid'=>2));?>"><em>立即充值</em></a></td>
                				<td><a class="btnGreens"  href="<?php echo U('User/Alipay/index',array('gid'=>3));?>"><em>立即充值</em></a></td>
               				</tr>
                			<tr>
                				<td height="36" class="lefttitle"><strong>基础功能</strong></td>
                				<td></td>
                				<td></td>
                				<td></td>
                				<td class="norightborder"></td>
               				</tr>
                			<tr>
                				<td class="lefttitle">天气</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">查快递</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">翻译</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">百科</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">手机归属地查询</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">身份证查询</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">糗事</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">笑话</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">藏头藏尾诗</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">解梦</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">健康指数计算器</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">公交查询</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">火车查询</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">网络音乐搜索</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
<tr>
                				<td class="lefttitle">翻译朗读开关</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
<tr>
<td class="lefttitle">发地理位置直接显示周边</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
									<tr>
                				<td class="lefttitle">域名查询</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
                				</tr>
<tr >
                				<td class="lefttitle">自定义LBS数据</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
<tr>
<td class="lefttitle">文本回复模糊匹配</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
<tr >
                				<td class="lefttitle">图文回复包含匹配</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
<tr>
<td class="lefttitle">回答不上启用第三方接口</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td height="36" class="lefttitle"><strong>高级功能（不需要单独收费）</strong></td>
                				<td></td>
                				<td></td>
                				<td></td>
                				<td class="norightborder"></td>
               				</tr>
							<tr>
                				<td align="left" class="lefttitle">微信会员卡<span></span></td>
                				<td class="error">&nbsp;</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
               				</tr>
							<tr>
                				<td align="left" class="lefttitle">会员资料管理<span></span></td>
                				<td class="error">&nbsp;</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
               				</tr>
                            <tr>
                				<td align="left" class="lefttitle">在线留言<span></span></td>
                				<td class="error">&nbsp;</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
               				</tr>
                			<tr>
                				<td class="lefttitle"><a class="tooltips" href="forum.php?mod=viewthread&amp;tid=498&amp;extra=page=1" target="999"><span><p>&nbsp;</p>
</span></a>刮刮卡活动</td>
                				<td class="error">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">大转盘活动</td>
                				<td class="error">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">优惠券活动<span></span></td>
                				<td class="error">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                      <tr>
                				<td class="lefttitle">砸金蛋活动</td>
                				<td class="error">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
<tr>
                				<td class="lefttitle">微投票</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">店铺管理</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
               				</tr>
                			<tr>
                				<td class="lefttitle">第三方接口融合</td>
                				<td class="error">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
<tr>
                				<td align="left" class="lefttitle">淘宝商城<span></span></td>
                				<td class="error">&nbsp;</td>
                				<td class="checked">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">3G网站</td>
                				<td class="error " >&nbsp;</td>
                				<td class="error " >&nbsp;</td>
                				<td class="checked " >&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
                      <tr>
                				<td class="lefttitle">百套网站模板</td>
                				<td class="error " >&nbsp;</td>
                				<td class="error " >&nbsp;</td>
                				<td class="checked " >&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
                      <tr>
                				<td class="lefttitle">微相册</td>
                				<td class="error " >&nbsp;</td>
                				<td class="error " >&nbsp;</td>
                				<td class="checked " >&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">自定义语音</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">自定义图文</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder ">&nbsp;</td>
       				  </tr>
                			<tr>
                				<td class="lefttitle">自定义文本</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
                      <tr>
                				<td class="lefttitle">自定义菜单</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
								<tr>
                				<td align="left" class="lefttitle">自定义宣传页<span></span></td>
                				<td class="error">&nbsp;</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
               				</tr>
								<tr>
                				<td align="left" class="lefttitle">无线订餐<span></span></td>
                				<td class="error">&nbsp;</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
               				</tr>
							<tr>
                				<td align="left" class="lefttitle">在线商城<span></span></td>
                				<td class="error">&nbsp;</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
               				</tr>
							<tr>
                				<td align="left" class="lefttitle">在线团购<span></span></td>
                				<td class="error">&nbsp;</td>
                				<td class="error">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
               				</tr>
                            <tr>
                				<td class="lefttitle">在线预约</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
                				</tr>
							<tr>
                				<td class="lefttitle">微喜帖</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
       				  </tr>
								<tr>
                				<td class="lefttitle">360全景</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
                				</tr>
                                <tr>							<tr>
                				<td class="lefttitle">微医疗</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
                				</tr>
                                <tr>							<tr>
                				<td class="lefttitle">微房产</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
                				</tr>
                                <tr>
                				<td class="lefttitle">微酒店</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
                				</tr>
                                <tr>
                				<td class="lefttitle">微调研</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
                				</tr>
                                <tr>
                				<td class="lefttitle">微贺卡</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
                				</tr>
                                <tr>
                				<td class="lefttitle">微信墙(新功能)</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
                				</tr>
                                <tr>
                				<td class="lefttitle">摇一摇(新功能)</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="error ">&nbsp;</td>
                				<td class="checked norightborder">&nbsp;</td>
                				</tr>
</tbody>
       			  </table>
                </div>
            <div class="section lastSection">
<p><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo C('site_qq');?>&site=qq&menu=yes" target="999" class="red">点击QQ交谈</a><br>微我网面向全国招收代理，有意者请联系管理员QQ：<span class="foot-menu"><?php echo C('site_qq');?></span> ，验证信息注明：代理。</p>
       		  </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="footer">

	<div class="divider-panel"></div>

	<div class="wPage">

        <div class="about">

        	<div class="copyright"><?php echo C('site_name');?>-微信智能公众平台 版权所有</div>

        </div>

        <div class="glink">

        	<ul>

            	<li><a href="/" class="hover" title="首页">网站首页</a></li>

                <li><a href="<?php echo U('Home/Index/about');?>">关于宏宏CMS</a></li>

                <li><a href="<?php echo U('Home/Index/service');?>">功能介绍</a></li>

                <li><a href="<?php echo U('Home/Index/case');?>">案例展示</a></li>

                <li><a href="<?php echo U('Home/Index/help');?>">帮助教程</a></li>

                <li><a href="<?php echo U('Home/Index/contact');?>">联系我们</a></li>

            </ul>

            <div class="beian"><a href="#" target="_blank">备案号：<?php echo C('ipc');?></a></div>

        </div>

    </div>

</div>
<div style="display:none">
<?php echo C('counts');?>
</div>
</body></html>