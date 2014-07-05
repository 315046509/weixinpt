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

     <script>
var OAK = OAK || {};
OAK.Dom = {};
OAK.Shop = {};
OAK.Util = {};
OAK.Dom.setAttributes = function (el, prop) {
    for (var i in prop) {
        el.setAttribute(i, prop[i]);
    }
    return el;
}
OAK.Util.setProps = function (s, prop) {
    //alert(prop);
	for (var i in prop) {
        s[i] = prop[i];
    }
	//alert(s);
    return s;
}
OAK.Util.isEqualInConditions = function (o, conditions) {
    for (var i in conditions) {
        if (o[i] != conditions[i]) {
            return false;
        }
    }
    return true;
}
OAK.Util.copy = function (o) {
    var res = new Object();
    for (var i in o) {
        res[i] = o[i];
    }
    return res;
}
OAK.Util.setParam = function (name, value) {
    localStorage.setItem(name, value);
}
OAK.Util.getParam = function (name) {
    return localStorage.getItem(name);
}
OAK.Shop.Product = function (prop) {
    var prod = {
        id: 0,
        name: "",
        specId: 0,
        price: 0.00,
        number: 0,
        categoryId: 0
    };
    return new OAK.Util.setProps(prod, prop);
}
OAK.Shop.Cart = function () {
    if (typeof OAK.Shop.Cart.single_instance === "undefined") {
        this._totalNumber = 0;
        this._totalAmount = 0.00;
        this._products = [];
        this.onBeforeAdd = null;
        this.onAfterAdd = null;
        this.onBeforeUpdate = null;
        this.onAfterUpdate = null;
        this.onBeforeDelete = null;
        this.onAfterDelete = null;
        OAK.Shop.Cart.single_instance = this;
    }
    return OAK.Shop.Cart.single_instance;
}
OAK.Shop.Cart.prototype = {
//口味
    specs: {1: "正辣", 2: "微辣", 3: "不辣"},
    //公司信息
	categories:{"1":"\u5ddd\u83dc","2":"\u95fd\u83dc","3":"\u6e58\u83dc"},
	//起送价格
	total:50,
	//保存
    saveToCache: function () {
        OAK.Util.setParam("ShoppingdiancaiCart1", JSON.stringify(this));
    },
	//获取
    getFromCache: function () {
        var ShoppingdiancaiCart1 = OAK.Util.getParam("ShoppingdiancaiCart1");
		if (ShoppingdiancaiCart1 != null && ShoppingdiancaiCart1 != "") {
//alert(ShoppingdiancaiCart1);
            OAK.Util.setProps(this, JSON.parse(ShoppingdiancaiCart1));
        }
    },
    clear:function(){
        //localStorage.clear();
        OAK.Util.setParam("ShoppingdiancaiCart1",null);
        this._totalNumber = 0;
        this._totalAmount = 0.00;
        this._products = [];
    },
	//add购物车商品数量
    addProduct: function (p, conditions) {
        this.onBeforeAdd !== null && this.onBeforeAdd(this, p, conditions);
        var _conditions = conditions || {id: p.id, specId: p.specId, ref: true};
        var alreadyExistProduct = this.getProduct(_conditions);
        var ret_num = 0;
        //一元鸭翅活动
        if(p.name == "一元鸭翅" && this.existProduct({name:p.name})){
            alert("每单只能购买一盒一元鸭翅");
            return;
        }
        if (alreadyExistProduct !== null){
            alreadyExistProduct.number += p.number;
        }
        else
            this._products.push(p);
        this._totalNumber += p.number;
        this._totalAmount += p.number * p.price;
        this.onAfterAdd !== null && this.onAfterAdd(this, alreadyExistProduct ? alreadyExistProduct.number : p.number, _conditions);
    },
    getQuantity: function () {
        return {totalNumber: this._totalNumber, totalAmount: this._totalAmount};
    },
	//更新购物车数量
    updateNumber: function (num, conditions) {
        this.onBeforeUpdate !== null && this.onBeforeUpdate(this, num, conditions);
        conditions.ref = true;
        var alreadyExistProduct = this.getProduct(conditions);
        if (alreadyExistProduct !== null) {
            this._totalNumber += (parseInt(num) - parseInt(alreadyExistProduct.number));
            this._totalAmount += ((parseInt(num) * parseFloat(alreadyExistProduct.price)) - parseInt(alreadyExistProduct.number) * parseFloat(alreadyExistProduct.price));
            alreadyExistProduct.number = num;
        }
        this.onAfterUpdate !== null && this.onAfterUpdate(this, alreadyExistProduct ? alreadyExistProduct.number : 0, conditions);
    },
    //获取购物车中的所有商品
    getProductList: function () {
        return this._products;
    },
    getProduct: function (conditions) {
        var ref = conditions.ref;
        delete conditions.ref;
        for (var i in this._products) {
            if (OAK.Util.isEqualInConditions(this._products[i], conditions))
                return ref ? this._products[i] : OAK.Util.copy(this._products[i]);
        }
        return null;
    },
	//获取已点数量
    getProductNumber: function (conditions) {
        for (var i in this._products) {
            if (OAK.Util.isEqualInConditions(this._products[i], conditions))
                return this._products[i].number;
        }
        return null;
    },
    existProduct: function (conditions) {
        for (var i in this._products) {
            if (OAK.Util.isEqualInConditions(this._products[i], conditions))
                return true;
        }
        return false;
    },
    deleteProduct: function (conditions) {
        this.onBeforeDelete !== null && this.onBeforeDelete(this, conditions);
        for (var i in this._products) {
            if (OAK.Util.isEqualInConditions(this._products[i], conditions)) {
                this._totalNumber -= parseInt(this._products[i].number);
                this._totalAmount -= parseInt(this._products[i].number) * parseFloat(this._products[i].price);
                this._products.splice(i, 1);
                break;
            }
        }
        this.onAfterDelete !== null && this.onAfterDelete(this, conditions);
    },
    sortAsc:function(a,b){
        if(a.categoryId> b.categoryId){
            return 1;
        }else if(a.categoryId == b.categoryId){
            if(a.id> b.id)
                return 1;
            else if(a.id == b.id)
                return  a.specId> b.specId?1:-1;
            return -1;
        }
        return -1;
    }
}
</script>
    <script>
         
        function g(id) {
            return document.getElementById(id);
        }
 
    </script>
    <script>
var cart = new OAK.Shop.Cart();
function addProduct(productId, specId,name,price,categoryId,addnum) {
    cart.addProduct(OAK.Shop.Product({id: productId, specId: specId, number: addnum, price: price, name: name,categoryId:categoryId}));
}
function reduceProduct(productId, specId,num) {
    var oldnum = cart.getProductNumber({id: productId, specId: specId});
    if (oldnum !== null) {
        if (oldnum -num > 0) {
            cart.updateNumber(oldnum - num, {id: productId, specId: specId});
        } else {
            cart.deleteProduct({id: productId, specId: specId});
        }
    }
}
function showAll(){
    var dts = document.getElementsByTagName("dt");
    for(var i in dts){
        if(dts[i].innerText != null){
            dts[i].style.display = "";
            var dd = dts[i].nextElementSibling;
            while(dd != null && dd.tagName != 'DT' ){
                dd.style.display = "";
                dd = dd.nextElementSibling
            }
        }
    }
    showMenu(false);
}
function showProducts(categoryName){
    showAll();
    var dts = document.getElementsByTagName("dt");
    for(var i in dts){
        if(dts[i].innerText != null && dts[i].innerText != categoryName){
            dts[i].style.display = "none";
            var dd = dts[i].nextElementSibling;
            while(dd != null && dd.tagName != 'DT' ){
                dd.style.display = "none";
                dd = dd.nextElementSibling
            }
        }
    }
}
cart.showProductNum =  function(productId,specId,num){
    if(num>0){
        g("num_" + productId+"_"+specId).className = "count";
        g("del_" + productId+"_"+specId).style.display = "";
    }else{
        g("num_"  + productId+"_"+specId).className = "count_zero";
        g("del_"  + productId+"_"+specId).style.display = "none";
    }
    g("num_" + productId+"_"+specId).innerHTML = parseInt(num);
}
cart.showTotalNum = function(){
    var quant = cart.getQuantity();
   // g("cartN").innerHTML = ""+quant.totalNumber+"份 ￥"+quant.totalAmount;
   SetCookie("diancai1",quant.totalNumber);
g("cartN2").innerHTML = ""+quant.totalNumber;
};
cart.showCartInfo=function () {
    var products = cart.getProductList();
    for(var i in products){
        var product_id = products[i].id;
        var spec_id =  products[i].specId;

		if(products[i].categoryId==1){
				cart.showProductNum(product_id, spec_id,cart.getProductNumber({id:product_id,specId:spec_id})||0);
		}
    }
    cart.showTotalNum();
};
cart.onAfterAdd = function(obj,num,conditions){
    cart.showProductNum(conditions.id,conditions.specId,num);
    cart.showTotalNum();
    cart.saveToCache();
};
cart.onAfterUpdate = function(obj,num,conditions){
    cart.showProductNum(conditions.id,conditions.specId,num);
    cart.showTotalNum();
    cart.saveToCache();
};
cart.onAfterDelete = function(obj,conditions){
    cart.showProductNum(conditions.id,conditions.specId,0);
    cart.showTotalNum();
    cart.saveToCache();
};
/*cart.getFromCache();
cart.showCartInfo();*/
function showMenu(is_show) {
		if (typeof(is_show) == "undefined") {
			if (hasClass(g("menu"), "sort_on"))
				removeClass(g("menu"), "sort_on");
			else
				addClass(g("menu"), "sort_on");
		} else {
			if (is_show) {
				addClass(g("menu"), "sort_on");
			} else {
				removeClass(g("menu"), "sort_on");
			}
		}
	}

	function hasClass(obj, cls) {
		return obj.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
	}

	function addClass(obj, cls) {
		if (!this.hasClass(obj, cls)) obj.className += " " + cls;
	}

	function removeClass(obj, cls) {
		if (hasClass(obj, cls)) {
			var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
			obj.className = obj.className.replace(reg, ' ');
		}
	}
	window.onload = function () {
// cart.categories = {"1":"\u5ddd\u83dc","2":"\u95fd\u83dc","3":"\u6e58\u83dc"};
	  //cart.total = 40;
		cart.getFromCache();
		cart.showCartInfo();
		setHeight();
	}

</script>
<style>
</style>
</head>
<body class="mode_webapp">

<div class="menu_header"> 
     <div class="menu_topbar">
      <strong class="head-title"><?php if($thisCat["id"] == ""): ?>点菜<?php else: echo ($thisCat["name"]); endif; ?></strong>
     <span class="head_btn_left"><a href="javascript:history.go(-1);"><span>返回</span></a><b></b></span> <a class="head_btn_right" href="<?php echo U('Dining/index',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>1));?>">
      <span><i class="menu_header_home"></i></span><b></b>
      </a>
     </div>
</div>
 
  <input type="hidden" name="formhash" id="formhash" value="4171ab45" />
<div id="mcover" onClick="document.getElementById('mcover').style.display='';">
<div id="Popup">
	<div class="imgPopup">
		<img  id="picsrc" src="/tpl/Wap/default/common/weidingcan/baeimg/qQQk5sy4bu.jpg"><h3 id="h3title" ></h3>
    <p class="jianjie" id="jianjie" > </div>
</div>
    <a class="close" onClick="document.getElementById('mcover').style.display='';">X</a>
</div>	
<script>
//alert(GetCookie("sunshine"));
function htmlit(url,title,intro,fid){
document.getElementById('mcover').style.display='block';
document.getElementById('Popup').style.display='block';
document.getElementById("picsrc").src = url;
document.getElementById("h3title").innerHTML = title;
document.getElementById("jianjie").innerHTML = intro;

}
</script>
<div style="background-color:#FFF">
<div id="navBar">
    	<dl>
            <dt style="text-algin:centent;" ><a href="<?php echo U('Dining/cats',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'dining'=>1));?>">菜单</a></dt>
              <?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i;?><dd <?php if($thisCat['id'] == $hostlist['id']): ?>class="active"<?php endif; ?> ><a  style="width:100%;" href="<?php echo U('Dining/cats',array('token'=>$_GET['token'],'catid'=>$hostlist['id'],'wecha_id'=>$wecha_id,'dining'=>$isDining));?>" ><?php echo ($hostlist["name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>   
	  </dl>
    </div >
    
    <div id="infoSection">
<section class="menu">
    <section class="list listimg">
   <dl>
 
        <div class="ccbg">
      <?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist2): $mod = ($i % 2 );++$i;?><dd>
        <span class="count_zero" id="num_<?php echo ($hostlist2["id"]); ?>_<?php echo ($hostlist2["catid"]); ?>" onClick="addProduct('<?php echo ($hostlist2["id"]); ?>','<?php echo ($hostlist2["catid"]); ?>','<?php echo ($hostlist2["name"]); ?>','<?php echo ($hostlist2["price"]); ?>','1',1);"></span>
          <div class="tupian"><img src="<?php echo ($hostlist2["logourl"]); ?>" onClick="htmlit('<?php echo ($hostlist2["logourl"]); ?>','<?php echo ($hostlist2["name"]); ?>','<?php echo ($hostlist2["intro"]); ?>','<?php echo ($hostlist2["id"]); ?>')">
        <a href="javascript:addProduct('<?php echo ($hostlist2["id"]); ?>','<?php echo ($hostlist2["catid"]); ?>','<?php echo ($hostlist2["name"]); ?>','<?php echo ($hostlist2["price"]); ?>','1',1);" class="add" data-foodid="<?php echo ($hostlist2["id"]); ?>_<?php echo ($hostlist2["catid"]); ?>">
      	<h3><?php echo ($hostlist2["name"]); ?></h3>
              <em>￥<?php echo ($hostlist2["price"]); ?>元/盘<del>原价：<?php echo ($hostlist2["oprice"]); ?>元/盘</del></em>
                    <p class="dpNum"><?php echo ($hostlist2['salecount']+$hostlist2['fakemembercount']); ?>人点过</p></a> 
        <a href="javascript:reduceProduct('<?php echo ($hostlist2["id"]); ?>','<?php echo ($hostlist2["catid"]); ?>',1);" class="reduce" id="del_<?php echo ($hostlist2["id"]); ?>_<?php echo ($hostlist2["catid"]); ?>" style="display:none;"><b class="ico_reduce">减一份</b></a>
		 </div>
		</dd><?php endforeach; endif; else: echo "" ;endif; ?>  
          
    
    </dl>
    </section>
   <!-- <div class="copyright">© 2001-2014 <a href="http://weixin.5cando.com"><?php echo C();?>所有</a></div>-->
</section>

  
  
  
  
  
        </div>  
        
    <div class="clr"></div>  
</div>

<div class="footermenu">
    <ul>
        <li>
            <a href="<?php echo U('Dining/about',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'setid'=>$setid,'dining'=>1));?>">
            <img src="<?php echo RES;?>/weidingcan/baeimg/xxyX63YryG.png">
            <p>关于</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Dining/cats',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'setid'=>$setid,'dining'=>1));?>">
            <img src="<?php echo RES;?>/weidingcan/baeimg/Lngjm86JQq.png">
            <p>点菜</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Dining/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'setid'=>$setid,'dining'=>1));?>">
             <span class="num" id="cartN2">0</span>
            <img src="<?php echo RES;?>/weidingcan/baeimg/2yFKO6TwKI.png">
            <p>去买单</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Dining/dingdan',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'setid'=>$setid,'dining'=>1));?>">
            <img src="<?php echo RES;?>/weidingcan/baeimg/s22KaR0Wtc.png">
            <p>订单</p>
            </a>
        </li>
        <li>
            <a href="<?php echo U('Dining/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id'],'setid'=>$setid,'dining'=>1));?>">
            <img src="<?php echo RES;?>/weidingcan/baeimg/J0uZbXQWvJ.png">
            <p>我的</p>
            </a>
        </li>
    </ul>
</div>

<script type="text/javascript">


    function setHeight(){
        var  cHeight;
        cHeight = document.documentElement.clientHeight;
        cHeight = cHeight +"px"
        document.getElementById("navBar").style.height =  cHeight;
        document.getElementById("infoSection").style.height =  cHeight;
    }

 
    window.onresize = function(){setHeight();}


</script>
<script type="text/javascript">
document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
WeixinJSBridge.call('hideToolbar');
});
</script>
</body>
</html>