/** 
 * 湖南雅商网络科技有限公司
 * 倒计时插件
 * 刘文建
 */
(function($){
$.fn.yomi=function(){
	var data="";
	var _DOM=null;
	var TIMER;
	createdom =function(dom){
		_DOM=dom;
		data=$(dom).attr("data");
		data = data.replace(/-/g,"/");
		data = Math.round((new Date(data)).getTime()/1000);
		//$(_DOM).append("<ul class='yomi'><li class='yomiday'></li><li class='split'>天</li><li class='yomihour'></li><li class='split'>:</li><li class='yomimin'></li><li class='split'>:</li><li class='yomisec'></li></ul>")
		$(_DOM).append("<div class='yomi'><span class='split'>剩余：</span><b class='yomiday'></b><span class='split'>天</span><b class='yomihour'></b><span class='split'>时</span><b class='yomimin'></b><span class='split'>分</span><b class='yomisec'></b><span class='split'>秒</span></div>")
		reflash();

	};
	reflash=function(){
		var	range  	= data-Math.round((new Date()).getTime()/1000),
					secday = 86400, sechour = 3600,
					days 	= parseInt(range/secday),
					hours	= parseInt((range%secday)/sechour),
					min		= parseInt(((range%secday)%sechour)/60),
					sec		= ((range%secday)%sechour)%60;
		$(_DOM).find(".yomiday").html(days);
		$(_DOM).find(".yomihour").html(hours);
		$(_DOM).find(".yomimin").html(min);
		$(_DOM).find(".yomisec").html(sec);

	};
	TIMER = setInterval( reflash,1000 );
	nol = function(h){
					return h>9?h:'0'+h;
	}
	return this.each(function(){
		var $box = $(this);
		createdom($box);
	});
}
})(jQuery);
$(function(){
	$(".yomibox").each(function(){
		$(this).yomi();
	});
});