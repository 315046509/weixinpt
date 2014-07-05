<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
<meta http-equiv="x-ua-compatible" content="ie=7" />
</head>
<body class="warp">
<div id="artlist" class="addn">
<?php if(($info["id"]) > "0"): ?><script src="./tpl/User/default/common/js/date/WdatePicker.js"></script>
			<form action="<?php echo U('Users/edit');?>" method="post" name="form" id="myform">
			<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
		<?php else: ?>
			<form action="<?php echo U('Users/add');?>" method="post" name="form" id="myform"><?php endif; ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" id="addn">

				 <tr>
					<th colspan="5"><?php echo ($title); ?></th>
				</tr>
				<tr>
					<td height="48" align="right"><strong>用户名称：</strong></td>
					<td colspan="4" class="lt">
						<input type="text" name="username" class="ipt" size="45" value="<?php echo ($info["username"]); ?>" <?php if(($info["username"]) == "admin"): ?>readonly="readonly"<?php endif; ?>>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>手机号：</strong></td>
					<td colspan="4" class="lt">
						<input type="text" name="mp" class="ipt" size="45" value="<?php echo ($info["mp"]); ?>" />
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>邮箱：</strong></td>
					<td colspan="4" class="lt">
						<input type="text" name="email" class="ipt" size="45" value="<?php echo ($info["email"]); ?>" />
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>用户角色：</strong></td>
					<td colspan="4" class="lt">
						<select name="gid" style="width:136px">
							<?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo["id"]) == $info["gid"]): ?>selected=""<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>到期时间：</strong></td>
					<td colspan="3" class="lt">
						<input type="text" name="viptime" onClick="WdatePicker()" class="ipt" size="45" value="<?php echo (date("Y-m-d",$info["viptime"])); ?>">
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>用户状态：</strong></td>
					<td colspan="4" class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="status" id="status1" <?php if(($info["status"] == 1) OR ($info['status'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="status" id="status2" <?php if(($info["status"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>微路由：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="apenable" id="apenable" <?php if(($info["apenable"] == 1) OR ($info['apenable'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="apenable" id="apenable" <?php if(($info["apenable"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
					<td height="48" align="right"><strong>高级模板：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="mpenable" id="mpenable" <?php if(($info["mpenable"] == 1) OR ($info['mpenable'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="mpenable" id="mpenable" <?php if(($info["mpenable"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</td>
					
				</tr>
                
				<tr>
					<td height="48" align="right"><strong>微餐饮：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="cy" id="cy" <?php if(($info["cy"] == 1) OR ($info['cy'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="cy" id="cy" <?php if(($info["cy"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
                    <td height="48" align="right"><strong>微外卖：</strong></td>
					<td class="lt"><input type="radio" class="radio" class="ipt" value="1" name="wy" id="wy" <?php if(($info["wy"] == 1) OR ($info['wy'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="wy" id="wy" <?php if(($info["wy"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>微预约：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="yy" id="yy" <?php if(($info["yy"] == 1) OR ($info['yy'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="yy" id="yy" <?php if(($info["yy"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
                    <td height="48" align="right"><strong>微房产：</strong></td>
					<td class="lt"><input type="radio" class="radio" class="ipt" value="1" name="fc" id="fc" <?php if(($info["fc"] == 1) OR ($info['fc'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="fc" id="fc" <?php if(($info["fc"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>微酒店：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="jd" id="jd" <?php if(($info["jd"] == 1) OR ($info['jd'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="jd" id="jd" <?php if(($info["jd"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
                    <td height="48" align="right"><strong>微医疗：</strong></td>
					<td class="lt"><input type="radio" class="radio" class="ipt" value="1" name="yl" id="yl" <?php if(($info["yl"] == 1) OR ($info['yl'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="yl" id="yl" <?php if(($info["yl"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>微汽车：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="qc" id="qc" <?php if(($info["qc"] == 1) OR ($info['qc'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="qc" id="qc" <?php if(($info["qc"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
                    <td height="48" align="right"><strong>微电影：</strong></td>
					<td class="lt"><input type="radio" class="radio" class="ipt" value="1" name="dy" id="dy" <?php if(($info["dy"] == 1) OR ($info['dy'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="dy" id="dy" <?php if(($info["dy"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>微美容：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="mr" id="mr" <?php if(($info["mr"] == 1) OR ($info['mr'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="mr" id="mr" <?php if(($info["mr"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
                    <td height="48" align="right"><strong>微酒吧：</strong></td>
					<td class="lt"><input type="radio" class="radio" class="ipt" value="1" name="jb" id="jb" <?php if(($info["jb"] == 1) OR ($info['jb'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="jb" id="jb" <?php if(($info["jb"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>微教育：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="jy" id="jy" <?php if(($info["jy"] == 1) OR ($info['jy'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="jy" id="jy" <?php if(($info["jy"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
                    <td height="48" align="right"><strong>微花店：</strong></td>
					<td class="lt"><input type="radio" class="radio" class="ipt" value="1" name="hd" id="hd" <?php if(($info["hd"] == 1) OR ($info['hd'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="hd" id="hd" <?php if(($info["hd"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>微政务：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="zw" id="zw" <?php if(($info["zw"] == 1) OR ($info['zw'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="zw" id="zw" <?php if(($info["zw"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
                    <td height="48" align="right"><strong>微健身：</strong></td>
					<td class="lt"><input type="radio" class="radio" class="ipt" value="1" name="js" id="js" <?php if(($info["js"] == 1) OR ($info['js'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="js" id="js" <?php if(($info["js"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>微旅游：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="ly" id="ly" <?php if(($info["ly"] == 1) OR ($info['ly'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="ly" id="ly" <?php if(($info["ly"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
                    <td height="48" align="right"><strong>微食品：</strong></td>
					<td class="lt"><input type="radio" class="radio" class="ipt" value="1" name="sp" id="sp" <?php if(($info["sp"] == 1) OR ($info['sp'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="sp" id="sp" <?php if(($info["sp"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</td>
				</tr>
				<tr>
					<td height="48" align="right"><strong>微KTV：</strong></td>
					<td class="lt">
						<input type="radio" class="radio" class="ipt" value="1" name="ktv" id="ktv" <?php if(($info["ktv"] == 1) OR ($info['ktv'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="ktv" id="ktv" <?php if(($info["ktv"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
                    <td height="48" align="right"><strong>微婚庆：</strong></td>
					<td class="lt"><input type="radio" class="radio" class="ipt" value="1" name="hq" id="hq" <?php if(($info["hq"] == 1) OR ($info['hq'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" class="ipt"  value="0" name="hq" id="hq" <?php if(($info["hq"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭</td>
				</tr>
	<tr>
		<td colspan="5">
			<?php if(($info["id"]) > "0"): ?><input class="bginput" type="submit" name="dosubmit" value="修 改" >
				<?php else: ?>
				<input class="bginput" type="submit" name="dosubmit" value="添 加"><?php endif; ?>
			&nbsp;
			<input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回" ></td>
	</tr>
</table>
</form>
<br />
<br />
<br />

</div>
</body>
</html>