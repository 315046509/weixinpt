<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>会员卡</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link href="<?php echo RES;?>/card/style/style.css" rel="stylesheet" type="text/css">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
</head>

<body id="cardunion" class="mode_webapp2" >
<div class="cardexplain"> 

<ul class="round">
<li><?php if($cardsCount == 0): ?><a href="###"><span>您还没有领取任何会员卡</span></a><?php else: ?><a href="/index.php?g=Wap&m=Card&a=index&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&mycard=1"><span>我的会员卡<em class="ok"><?php echo ($cardsCount); ?></em></span></a><?php endif; ?></li>
</ul>

<ul class="round">
<?php if($allCardsCount != 0): if(is_array($allCards)): $i = 0; $__LIST__ = $allCards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><li class="dandanb"><a href="/index.php?g=Wap&m=Card&a=card&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&cardid=<?php echo ($c["id"]); ?>"><span class="none"><img src="<?php echo ($c["clogo"]); ?>"><h2><?php echo ($c["cardname"]); ?></h2>
<p><?php echo ($c["msg"]); ?></p> <?php if($c['applied']){ ?><em class="error">用卡</em><?php }else{ ?><em class="ok">领卡</em><?php } ?></span></a>
</li>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
<?php else: ?>
<li class="dandanb"><a href="###"><span>商家暂时未设置会员卡</span></a>
</li><?php endif; ?>
</ul>


<ul class="round">
<li class="tel"><a href="tel:<?php echo ($thisCompany["tel"]); ?>"><span><?php if($thisCompany["tel"] != ''): echo ($thisCompany["tel"]); else: ?>商家未设置电话<?php endif; ?></span></a></li>
<li class="address"><a href="/index.php?g=Wap&m=Card&a=companyMap&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&companyid=<?php echo ($thisCompany["id"]); ?>"><span><?php if($thisCompany["address"] != ''): echo ($thisCompany["address"]); else: ?>商家未设置地址<?php endif; ?></span></a></li>
<li class="detail"><a href="/index.php?g=Wap&m=Card&a=companyDetail&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&companyid=<?php echo ($thisCompany["id"]); ?>"><span>查看详情</span></a></li>
</ul>
</div>

<div class="footermenu">
    <ul>
    <li>
            <a href="javascript:history.go(-1);">
            <img src="<?php echo RES;?>/card/images/return.png">
            <p>返回</p>
            </a>
        </li>
    <li>
            <a <?php if($infoType=='memberCardHome'){ ?>class="active"<?php } ?> href="/index.php?g=Wap&m=Card&a=index&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>">
            <img src="<?php echo RES;?>/card/images/home.png">
            <p>会员卡首页</p>
            </a>
        </li>
        <li>
            <a <?php if($infoType=='companyDetail'){ ?>class="active"<?php } ?> href="/index.php?g=Wap&m=Card&a=companyDetail&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&companyid=<?php echo ($thisCompany["id"]); ?>">
            <img src="<?php echo RES;?>/card/images/detaila.png">
            <p>商家详情</p>
            </a>
        </li>
        <li>
            <a <?php if($infoType=='myCard'){ ?>class="active"<?php } ?> href="/index.php?g=Wap&m=Card&a=index&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>&mycard=1">
            <span class="num2" ><?php echo ($cardsCount); ?></span><img src="<?php echo RES;?>/card/images/my.png">
            <p>我的会员卡</p>
            </a>
        </li>
    </ul>
</div>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Card",
            "moduleID":"0",
            "imgUrl": "", 
            "sendFriendLink": "<?php echo ($f_siteUrl); echo U('Card/index',array('token'=>$token));?>",
            "tTitle": "会员卡",
            "tContent": ""
};
</script>
<?php echo ($shareScript); ?>
</body>
</html>