<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限管理</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<script src="<?php echo STATICS;?>/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/function.js" type="text/javascript"></script>
<meta http-equiv="x-ua-compatible" content="ie=7" />
</head>
<body class="warp">
<div id="artlist">
	<div class="mod kjnav">
		<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($action.'/'.$vo['name'],array('pid'=>$_GET['pid'],'level'=>3,'title'=>urlencode ($vo['title'])));?>"><?php echo ($vo['title']); ?></a>
		<?php if(($action == 'Article') or ($action == 'Img') or ($action == 'Text') or ($action == 'Voiceresponse')): break; endif; endforeach; endif; else: echo "" ;endif; ?>
	</div>   	
</div>
<div class="cr"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
	  <tr>
		 <tr>
					<th class="select">选择</th>
					<th class="">名称</th>
					<th class="">MAC</th>
					<th class="">IP</th>
					<th class="">位置</th>
					<th class="">在线人数</th>
					<th class="">3G网站</th>

					<th class="">时间</th>
					<th class="">状态</th>
                    <th class="">管理操作</td>
	  </tr>
	    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($i % 2 );++$i;?><tr>
                  <td>  <input type="checkbox" name="del_id[]" value="<?php echo ($o["id"]); ?>" class="checkitem"></td>
                  <td><?php echo ($o["name"]); ?></td>
                  <td><?php echo ($o["mac"]); ?></td>
                   <td><?php echo ($o["addr"]); ?></td>
					 <td><?php echo ($o["device_location"]); ?></td>
					<td><?php echo ($o["usernum"]); ?></td>
					<td><?php echo ($o["token"]); ?></td>
                    <td><?php echo ($o["addtime"]); ?></td>
                    <td><?php if($o['deploy_status'] == 1): ?>已连通<?php else: ?>未连通<?php endif; ?></td>
                    <td><a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('Ap/del/',array('id'=>$vo['id']));?>','确定删除该用户吗?')">删除</a></td>
                
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
     <tr bgcolor="#FFFFFF"> 
	 
      <td colspan="9"><div class="listpage"><?php echo ($page); ?></div></td>
     
    </tr>
   
</table>


</body>
</html>