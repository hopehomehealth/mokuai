function myalertbox(msg,url){
	$("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:35%;z-index:9999;width:100px;min-height:25px;text-align:center;padding:5px 5px;line-height:25px;margin-left:-50px;color:white;font-weight:bold;font-weight:bolder;opacity:0.7;background:#666'>"+msg+"</div>");
	$("#errormsg").fadeIn(1000);$("#errormsg").fadeOut(1000);setTimeout(function(){$("#errormsg").remove();if(typeof(url) != 'undefined'){location.href=url};},2000);
}
function myalertmidbox(msg,url){
	$("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:35%;z-index:9999;width:150px;min-height:25px;text-align:center;padding:5px 5px;line-height:25px;margin-left:-75px;color:white;font-weight:bold;font-weight:bolder;opacity:0.7;background:#666'>"+msg+"</div>");
	$("#errormsg").fadeIn(1000);$("#errormsg").fadeOut(1000);setTimeout(function(){$("#errormsg").remove();if(typeof(url) != 'undefined'){location.href=url};},2000);
}
function myalertbox2(msg,url){
	$("section").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:35%;z-index:9999;width:100px;min-height:25px;text-align:center;padding:5px 5px;line-height:25px;margin-left:-50px;color:white;font-weight:bold;font-weight:bolder;opacity:0.7;background:#666'>"+msg+"</div>");
	$("#errormsg").fadeIn(1000);$("#errormsg").fadeOut(1000);setTimeout(function(){$("#errormsg").remove();if(typeof(url) != 'undefined'){location.href=url};},2000);
}