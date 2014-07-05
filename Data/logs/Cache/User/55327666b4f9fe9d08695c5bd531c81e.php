<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($wall["title"]); ?>信息管理后台</title>
<meta name="keywords" content="<?php echo C('site_name');?>微信墻" />
<meta name="description" content="<?php echo C('site_name');?>微信墻" />
<link type="text/css" rel="stylesheet" href="<?php echo RES;?>/wxq/resource/style/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="<?php echo RES;?>/wxq/resource/style/font-awesome.css" />
<link type="text/css" rel="stylesheet" href="<?php echo RES;?>/wxq/resource/style/common.css" />
<script type="text/javascript" src="<?php echo RES;?>/wxq/resource/script/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/wxq/resource/script/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/wxq/resource/script/common.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/wxq/resource/script/emotions.js"></script>
<script type="text/javascript">
   function shenHe(id){
   $.getJSON("<?php echo U('Wxq/operateOne');?>",{"id":id,"type":'shenhe'},
    function(data){
        if(data['info'] == "ok") {
            $('#shenhe'+id).removeClass('btn btn-primary');
        } else {
            alert('信息已经审核请刷新页面或者审核出错');
        }
    });
}

function del(id){
    $.getJSON("<?php echo U('Wxq/operateOne');?>",{"id":id,"type":'del'},
    function(data){
        if(data['info'] == "ok") {
            $('#tr_'+id).hide();
        } else {
            alert(data['data']);
        }
    })
}

function buShen(id){
    $.getJSON("<?php echo U('Wxq/operateOne');?>",{"id":id,"type":'bushen'},
    function(data){
        if(data['info'] == "ok") {
            $('#bushen'+id).removeClass('btn btn-primary');
        }
    })
}
function selectall(){
	$("input[type=checkbox]").each(function() {
		$(this).attr("checked",true);
	});
}
function noSelect(){
    $("input[type=checkbox]").each(function(){
       $(this).attr("checked", false);
    })
}
</script>

</head>
<body
    <div class="main">
		<div class="stat">
			<div class="stat-div">
				<div class="navbar navbar-static-top">
					<div class="navbar-inner">
						<span class="pull-right" style="color:red; padding:10px 10px 0 0;">当前在线人数：<?php echo ($wall["onlinenum"]); ?></span>
						<div class="pull-left">
							<ul class="nav">
                                <li <?php if($_GET['isshow']==2): ?>class='active'<?php endif; ?> ><a href="<?php echo U('Wxq/examineInfo',array('id'=>$wall['id'],'isshow'=>2));?>">全部内容</a></li>
                                <li <?php if($_GET['isshow']==0): ?>class='active'<?php endif; ?> ><a href="<?php echo U('Wxq/examineInfo',array('id'=>$wall['id'],'isshow'=>0));?>">待审核</a></li>
                                <li <?php if($_GET['isshow']==1): ?>class='active'<?php endif; ?> ><a href="<?php echo U('Wxq/examineInfo',array('id'=>$wall['id'],'isshow'=>1));?>">已审核</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="sub-item" id="table-list">
					<h4 class="sub-title">详细数据</h4>
					<form action="<?php echo U('Wxq/examine');?>" method="post">
					<div class="sub-content">
						<table class="table table-hover">
							<thead class="navbar-inner">
								<tr>
									<th style="width:40px;" class="row-first">选择</th>
									<th class="row-hover">消息<i></i></th>
									<th style="width:100px;">时间<i></i></th>
									<th style="width:110px;">单条审核</th>
								</tr>
							</thead>
							<tbody>
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="tr_<?php echo ($vo["id"]); ?>">
									<td class="row-first">
                                        <input type="checkbox" name="yes<?php echo ($i); ?>" value="<?php echo ($vo["id"]); ?>" />
                                    </td>
									<td class="row-hover">
                                        <img src="<?php echo ($vo["avatar"]); ?>"  style="float: left;width: 80px;"/>
										<div>
                                            <span style="float: left">【<?php echo ($vo['nickname']); ?>】
                                                <?php if($vo['isblacklist']==1): ?><font color="red">（黑名单）</font><?php endif; ?>
                                            </span>
                                            <span><?php echo ($vo['content']); ?></span>
										</div>
									</td>
									<td style="font-size:12px; color:#666;">
										<div style="margin-bottom:10px;"><?php echo date('Y-m-d', $vo[createtime]);?></div>
										<div><?php echo date('h:i:s', $vo[createtime]);?></div>
									</td>
                                    <td>
                                        <?php if($_GET['isshow']==0): ?><a id="shenhe<?php echo ($vo["id"]); ?>" onClick="javacript:shenHe(<?php echo ($vo["id"]); ?>);" class="btn btn-primary">审核</a>
                                        <a id="bushen<?php echo ($vo["id"]); ?>" onClick="javacript:buShen(<?php echo ($vo["id"]); ?>);" class="btn btn-primary">不审</a>
                                        <a onClick="javacript:del(<?php echo ($vo["id"]); ?>);"  class="btn btn-primary">删除</a>
                                        <?php else: ?>
                                        <a id="bushen<?php echo ($vo["id"]); ?>" onClick="javacript:buShen(<?php echo ($vo["id"]); ?>);" class="btn btn-primary">不审</a>
                                        <a onClick="javacript:del(<?php echo ($vo["id"]); ?>);"  class="btn btn-primary">删除</a><?php endif; ?>
                                    </td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						<table class="table">
							<tr style="width:40px;" class="row-first">
                                <td>全选<input type="radio" name="1" onClick="selectall();" />
                                    不选<input type="radio" name="1" checked="true" onClick="noSelect();" />
                                </td>
								<td>
                                    <input type="hidden" name="max" value="<?php echo ($max); ?>"/>
                                    <?php if($_GET['isshow']==0): ?><input type="submit" name="verify" value="一键审核" class="btn btn-primary" />
                                        <input type="submit" name="delete" value="一键删除" class="btn btn-primary" />
                                        <?php else: ?>
                                        <input type="submit" name="delete" value="一键删除" class="btn btn-primary" /><?php endif; ?>
								</td>
							</tr>
						</table>
					</div>
					</form>
					<?php echo ($page); ?>
				</div>
			</div>
		</div>
    </div>
<script>
$(function() {
	//详细数据相关操作
	var tdIndex;
	$("#table-list thead").delegate("th", "mouseover", function(){
		if($(this).find("i").hasClass("")) {weiwin:
			$("#table-list thead th").each(function() {weiwin:
				if($(this).find("i").hasClass("icon-sort")) $(this).find("i").attr("class", "");
			});
			$("#table-list thead th").eq($(this).index()).find("i").addClass("icon-sort");
		}
	});
	$("#table-list thead th").click(function() {
		if($(this).find("i").length>0) {
			var a = $(this).find("i");
			if(a.hasClass("icon-sort") || a.hasClass("icon-caret-up")) {weiwin: //递减排序
				/*
					数据处理代码位置
				*/
				$("#table-list thead th i").attr("class", "");
				a.addClass("icon-caret-down");
			} else if(a.hasClass("icon-caret-down")) { //递增排序
				/*
					数据处理代码位置
				*/
				$("#table-list thead th i").attr("class", "");
				a.addClass("icon-caret-up");
			}
			$("#table-list thead th,#table-list tbody:eq(0) td").removeClass("row-hover");
			$(this).addClass("row-hover");
			tdIndex = $(this).index();
			$("#table-list tbody:eq(0) tr").each(function() {
				$(this).find("td").eq(tdIndex).addClass("row-hover");
			});
		}
	});
});
</script>
	<div id="footer">
		<span class="pull-left">

		</span>
		<span class="pull-right">

		</span>
	</div>
	<div class="emotions" style="display:none;"></div>
</body>
</html>