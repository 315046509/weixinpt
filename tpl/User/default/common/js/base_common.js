define(function(require, exports, module){
	if ($.browser.msie&&$.browser.version<9){
		var isIETemp = '<div style="height:80px;line-height:80px; text-align:center; background:#FC6;border-bottom:3px #F00 solid;border-top:3px #F00 solid;  font-family:宋体;">您使用的游览器太落后了，游览微我网将会受到影响。建议你下载一个最新的游览器。<a href="https://www.google.com/intl/zh-CN/chrome/browser/" target="_blank" style="color: #06F">谷歌游览器</a></div>';
		$("body").prepend(isIETemp);
	}
	$("#logo_ornament").addClass("logo-animation");
	$("#WYY_header_top .color-part").each(function(t){
		var self = $(this);
		setTimeout(function(){self.addClass("show-color-part");},t*200);	
	})
	$(function(){
		require.async("external/panelservice/js/panel.js",function(){});
	});
})
