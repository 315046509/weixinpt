<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no"/>
<title><?php echo ($metaTitle); ?></title>
<script src="../tpl/static/hotels/js/piwik.js"></script>
<script src="../tpl/static/hotels/js/zepto.min.js"></script>
<script src="../tpl/static/hotels/js/underscore-min.js"></script>
<script src="../tpl/static/hotels/js/backbone-min.js"></script>
<script src="../tpl/static/hotels/js/jquery.hammer.min.js"></script>
<script src="../tpl/static/hotels/js/common.js"></script>
<script src="../tpl/static/hotels/js/hotel.js"></script>
<link rel="stylesheet" type="text/css" href="../tpl/static/hotels/css/common.css" media="all" />
</head>
<body>
	<div class="html">
		<div class="main">
			<header>
	<a class="ico-hd arr-hd" href="javascript:history.go(-1);"></a>
	<h1>订单详情</h1>
</header>
<div class="contxt cont-artical">
	<div class="box-cont box-order">
		<div class="hd">
			<b>在线预订客房<?php echo ($company['name']); ?></b>
			<i><?php echo ($order['housename']); ?></i> | <i><?php echo ($order['nums']); ?>间</i>
		</div>
		<div class="bd box-txt">
			<p><span>入住日期</span><b><?php echo ($order['startdate']); ?></b></p>
			<p><span>离店日期</span><b><?php echo ($order['enddate']); ?> </b></p>
			<p><span>订单状态</span><?php if($order['status'] == 1): ?><b>完成入住</b><?php else: ?><b>未完成</b><?php endif; ?></p>
		</div>
		<div class="ft box-txt">
			<p><span>联系人电话：</span><b><?php echo ($order['tel']); ?></b></p>
			<p><span>总 金 额：</span><b>￥<?php echo ($order['price']); ?></b></p>
		</div>
	</div>
	<br><br>
</div>
		</div>
	</div>
</body>

<script type="text/javascript">
window.shareData = {  
            "moduleName":"Hotels",
            "moduleID":"<?php echo ($company[0]['id']); ?>",
            "imgUrl": "<?php echo ($company[0]['logourl']); ?>", 
            "timeLineLink": "<?php echo C('site_url') . U('Hotels/detail',array('token' => $_GET['token']));?>",
            "sendFriendLink": "<?php echo C('site_url') . U('Hotels/detail',array('token' => $_GET['token']));?>",
            "weiboLink": "<?php echo C('site_url') . U('Hotels/detail',array('token' => $_GET['token']));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>