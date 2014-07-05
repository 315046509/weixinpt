<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/wap/review.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/wap/back.css" media="all">
<script type="text/javascript" src="<?php echo STATICS;?>/vhouse/wap/share.js"></script>
<script type="text/javascript" src="<?php echo STATICS;?>/vhouse/wap/common.js"></script>
<script type="text/javascript" src="<?php echo STATICS;?>/vhouse/wap/review.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/waphome.css" media="all">
<link rel="stylesheet" type="text/css" href="<?php echo STATICS;?>/vhouse/reset.css" media="all">
<script type="text/javascript" src="<?php echo STATICS;?>/vhouse/jQuery.js"></script>
<script type="text/javascript" src="<?php echo STATICS;?>/vhouse/swipe.js"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo COMMON;?>/wap/buttons/css/buttons.css">
<script type="text/javascript" src="<?php echo COMMON;?>/wap/buttons/js/buttons.js"></script>
<title>专家点评</title>
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<!-- Mobile Devices Support @begin -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<!-- Mobile Devices Support @end -->
<script src="<?php echo STATICS;?>/vhouse/wap/sharedata.js"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
<style type="text/css">
    .review_man h3{font-size:18px;}
    #impress a{
        overflow:hidden;
    }
    .review_man h3{font-size:18px;}
    .is_1 a[style*='flex:0'], .is_2 a[style*='flex:0']{
        display:none;
    }
</style>
<!--script>
    
    function iswitch_panel(obj){
        var ipm = $('#impress');
        var pro = $('#professional');
         
        if(obj==0){
            ipm.show();
            pro.hide();
        }else{
            ipm.hide();
            pro.show();
        }
    }
</script-->
<div class="wrapper">
  <!-- start -->
  <ul class="nav_top" id="navTop" style="display: -webkit-box;">
    <!--li><a href="javascript:void(0);" onclick="iswitch_panel(0);return false;" class="current">房友印象</a></li-->
    <li><a href="javascript:void(0);" onClick="iswitch_panel(1);return false;">专家点评</a></li>
  </ul>
  <!-- end -->
  <div id="impress" style="display: none;" class="impress">
    <h3>选择您的楼盘印象，喜欢就赞我吧</h3>
    <?php if(is_array($impress)): $i = 0; $__LIST__ = $impress;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($i%2) == 0): if(($i%4) == 2): ?><a href="#" id="<?php echo ($vo['id']); ?>" onClick="getId('id',<?php echo ($vo['id']); ?>)" class="button button-circle button-caution"><span><?php echo ($vo['title']); ?> <?php echo ($vo['comment']); ?>赞</span></a>
          <?php else: ?>
          <a href="#" id="<?php echo ($vo['id']); ?>" onClick="getId('id',<?php echo ($vo['id']); ?>)" class="button button-circle button-action"><span><?php echo ($vo['title']); ?> <?php echo ($vo['comment']); ?>赞</span></a><?php endif; ?>
        <?php else: ?>
        <?php if(($i%3) == 3): ?><a href="" id="<?php echo ($vo['id']); ?>" onClick="getId('id',<?php echo ($vo['id']); ?>)" class="button button-circle button-primary" ><span><?php echo ($vo['title']); ?> <?php echo ($vo['comment']); ?>赞</span> </a>
          <?php else: ?>
          <a href="#" id="<?php echo ($vo['id']); ?>" onClick="getId('id',<?php echo ($vo['id']); ?>)" class="button button-circle button-highlight"><span><?php echo ($vo['title']); ?> <?php echo ($vo['comment']); ?>赞</span></a><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <!--专家-->
  <div id="professional" style="display:block;">
    <?php if(is_array($expert)): $i = 0; $__LIST__ = $expert;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$exp): $mod = ($i % 2 );++$i;?><div class="review_box">
        <div class="review_man"> <img src="<?php echo ($exp['face']); ?>" width="70" height="70" style="width:70px!important; height:70px!important; " alt="">
          <h3><?php echo ($exp['name']); ?><em><br>
            <?php echo ($exp['position']); ?></em></h3>
          <p><?php echo ($exp['description']); ?></p>
        </div>
        <div class="review_word">
          <h2><?php echo ($exp['title']); ?></h2>
          <p><?php echo ($exp['comment']); ?></p>
        </div>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
</div>
<script>

$(document).ready(function() {

function getId(obj,val){
    var imp_id = val;
    var token="<?php echo ($_GET['token']); ?>";
    var wecha_id="<?php echo ($_GET['wecha_id']); ?>";
    if (wecha_id == '') {
        alert("请认返回上一页面，重新进入。");
        return
    }
    var submitData = {
        imp_id: imp_id,
        token: token,
        wecha_id:wecha_id,
        action: "impress_add"
    },
    $.post("<?php echo U('Estate/impress_add',array('token'=>$token,'wecha_id'=>$wecha_id));?>", submitData,
    function(data) {
        var xobj=eval('('+data+')');
        //alert(xobj.msg);
        if (xobj.success == 1) {
            alert(xobj.msg);
            return
        }else{
            alert("Hi,您已经赞了噢。");
        }
    },
    "json");
 }
})

</script>

<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/font-awesome.css" media="all" />
<p><br/><br/><br/><br/></p>
<section>
            <div style="visibility: visible;" id="navList_box" class="box_swipe">
                <ul style="list-style: none; width: 1280px; transition: 0ms; -webkit-transition: 0ms; -webkit-transform: translate3d(0px, 0, 0);">
                <li style="width: 640px; display: table-cell; vertical-align: top;">
                <a href="<?php echo U('Estate/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>">
                    <span class="icon-home"></span>
                        <img src="<?php echo RES;?>/black/arrow 4.png" alt="楼盘简介">
                        <div>楼盘简介</div>
                </a>
                <a href="<?php echo U('Estate/album',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="weiwin-list-item">
                    <span class="icon-picture"></span>
                    <img src="" alt="楼盘画册">
                    <div>楼盘画册</div>
                            </a>
                <a href="<?php echo U('Estate/housetype',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="weiwin-list-item">
                        <span class="icon-building"></span>
                        <img src="" alt="户型全景">
                        <div>户型全景</div>
                </a>
                <a href="<?php echo U('Estate/impress',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="weiwin-list-item">
                    <span class="icon-check"></span>
                        <img src="" alt="专家点评">
                        <div>专家点评</div>
                </a>
                </li>
                    <li style="width: 640px; display: table-cell; vertical-align: top;">
                    <a href="<?php echo U('Estate/news',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="weiwin-list-item">
                        <span class="icon-rss-sign"></span>
                        <img src="" alt="新闻动态">
                        <div>新闻动态</div>
                    </a>
                    <a href="<?php echo U('Reservation/index',array('token'=>$token,'wecha_id'=>$wecha_id,'rid'=>$rid));?>" class="weiwin-list-item">
                    <span class="icon-edit"></span>
                        <img src="" alt="预约看房">
                        <div>预约看房</div>
                    </a>
                    <a href="<?php echo U('Card/index',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="weiwin-list-item">
                    <span class="icon-credit-card"></span>
                    <img src="" alt="会员尊享">
                    <div>会员尊享</div>
                    </a>
                    <a href="<?php echo U('Estate/aboutus',array('token'=>$token,'wecha_id'=>$wecha_id));?>" class="weiwin-list-item">
                    <span class="icon-phone"></span>
                    <img src="" alt="关于我们">
                    <div>关于我们</div>
                    </a>
                        </li>
                </ul>
                <ol>
                    <a href="javascript:navList_box.prev();">&nbsp;</a>
                    <a href="javascript:navList_box.next();">&nbsp;</a>
                </ol>
            </div>
        </section>
        <script>
            $(document).ready(function(){
                window.navList_box = new Swipe(document.getElementById('navList_box'), {auto:0});
            });
        </script>
</body>
</html>