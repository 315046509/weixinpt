<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title><?php echo ($metaTitle); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?php echo RES;?>/weidingcan/index/css/diancai.css" rel="stylesheet" type="text/css">
<script src="<?php echo RES;?>/weidingcan/index/js/cookie.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/weidingcan/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>

<style type="text/css">
/*点餐首页------------------------------------------------------------------------------------------------*/
.new_ybody{ background:#efefef;}
.dctext{ margin-top:50px;}
.dctext H{ width:100%; color:#0fa4bb; font-size:20px; line-height:35px;}
.dctext p{ width:100%; color:#a4a4a4; font-size:16px;}
.dctext p span{ color:#ec6969;}
.logo{ text-align:center; margin-top:10px;}
.biaoyu{text-align:center; margin-top:10px;}
.dcsybox{ padding:20px;}
.dcsybox .bd{ width:100%; height:150px; background-color:#FFF; border:solid #cfcfcf 1px; -webkit-box-sizing: border-box;-moz-box-sizing: border-box;-o-box-sizing: border-box;box-sizing: border-box;}
.dcsybox .bd_ul{ width:100%; height:50px; color:#595959; border-bottom:solid #cfcfcf 1px; line-height:50px; }
.dcsybox .bd_ul2{ width:100%; height:50px; color:#595959; line-height:50px; display:block;}
.dcsybox .bd ul li{ width:50%; height:50px; font-size:16px; float:left;}
.dcsybox .bd ul li img{ width:24px; height:28px; display:block;-webkit-background-size:24px;-moz-background-size:24px;background-size:24px; margin-top:11px; float:right; margin-right:10px;}
.dcsyfoot{  width:100%; position:fixed; bottom:30px; }
.dcsyfoot p{ width:100%; text-align:center; color:#bfbfbf; font-size:12px; display:inline-block;}
.homepic{text-align:center;}
</style>
</head>
<body class="new_ybody">
	<?php if($logourl != ''): ?><div class="logo"><img src="<?php echo ($logourl); ?>"/></div><?php endif; ?>
    <div class="biaoyu">您随身携带的移动餐厅！</div>
	<article class="dcsybox">
		<div class="bd rdu6">
			<a href="<?php echo U('Dining/stores',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dtype'=>'2'));?>">
			<ul class="bd_ul">
				<li><img src="<?php echo RES;?>/weidingcan/dcsy_ico2.png" /></li>
				<li>外 卖</li>
			</ul>
			</a>
            <a href="<?php echo U('Dining/stores',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dtype'=>'1'));?>">
			<ul class="bd_ul">
				<li><img src="<?php echo RES;?>/weidingcan/dcsy_ico1.png" /></li>
				<li>点 餐</li>
			</ul>
			</a>
			<a href="<?php echo U('Dining/stores',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dtype'=>'3'));?>">
			<ul class="bd_ul2">
				<li><img src="<?php echo RES;?>/weidingcan/dcsy_ico3.png" /></li>
				<li>订 座</li>
			</ul>
			</a>
		</div>
	</article>
	<?php if($homepic != ''): ?><div class="homepic"><img src="<?php echo ($homepic); ?>" width="98%"/></div><?php endif; ?>
</body>
</html>