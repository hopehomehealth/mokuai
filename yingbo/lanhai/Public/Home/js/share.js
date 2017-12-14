function loadshare(signPackage,shareData){
	wx.config({
	    appId: signPackage.appId,
		timestamp: signPackage.timestamp,
		nonceStr: signPackage.nonceStr,
		signature: signPackage.signature,
	   jsApiList: [
			'checkJsApi',
			'onMenuShareTimeline',
			'onMenuShareAppMessage',
			'onMenuShareQQ',
			'onMenuShareWeibo'
		  ]
	});             
	wx.ready(function () {
		  // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
		wx.checkJsApi({
		  jsApiList: [
			'getNetworkType',
			'previewImage',
			 'onMenuShareTimeline',
			'onMenuShareAppMessage',
			'onMenuShareQQ',
			'onMenuShareWeibo'
		  ],            
		});
	  wx.onMenuShareAppMessage(shareData);
	  wx.onMenuShareTimeline(shareData);
	  wx.onMenuShareQQ(shareData);
	  wx.onMenuShareWeibo(shareData);
	});
}
$('.closeshare').click(function(){
	$(".sharetoweixin2").hide();
	$("body").unbind("touchmove");
})
$(".sharetoweixin").click(function(){
	$(".sharetoweixin2").show();
	$('body').bind( "touchmove", function (e) {
	   e.preventDefault();
	});
})
function sharetoweixin(sharedata){
  wx.onMenuShareAppMessage(shareData);
}
function sharetoqq(shareData){
  wx.onMenuShareQQ(shareData);
}
function sharetozone(shareData){
  wx.onMenuShareQZone(shareData);
}