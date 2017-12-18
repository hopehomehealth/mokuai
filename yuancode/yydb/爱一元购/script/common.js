var pageParam = {};
var uid = $api.getStorage('uid') ? $api.getStorage('uid') : '';
var ssl = $api.getStorage('ssl') ? $api.getStorage('ssl') : 0;
var RootUrl = 'http://www.i1y8.com/';

if (ssl==1) {
	RootUrl = RootUrl.replace(/http:/, "https:");
}
function openWin(name,pageParam) {
    if(name && name.indexOf("member_")>=0 && $api.getStorage('uid')=='') name = 'login';
    api.openWin({
        name: name,
        url: name + '.html',
        pageParam:pageParam,
        opaque: true,
        vScrollBarEnabled: false,
        reload: true,
        animation:{type:'fade'}
    });
}

function getData(url,tempid){
    ajaxRequest(url, 'GET', {}, function (ret, err) {
        if (ret) {
            var content = $api.byId(tempid+'-content');
            var tpl = $api.byId(tempid+'-template').text;
            var tempFn = doT.template(tpl);
            content.innerHTML = tempFn(ret.data)
        } else {
            toast(err.msg);
        }
    });
}
function opentoTab(type,pageparam) {
    closetoWin();
    pageparam = typeof(pageparam) != "undefined" ? JSON.stringify(pageparam) : '{}';
	api.execScript({
       name : 'root',
       script : "setTab('"+type+"',"+pageparam+")"
    });   
}
function clearPid(){
   api.execScript({
       name : 'root',
       script : "clearprevPid()"
   }); 
}
//timestamp => YYYY-MM-DD HH:MM:SS
function formatDate(timestamp, onlyDate) {
    var date = new Date(timestamp);
    var timestr = '';
    timestr += date.getFullYear() + '-';
    timestr += ((date.getMonth() + 1) < 10 ? ('0' + (date.getMonth() + 1)) : (date.getMonth() + 1)) + '-';
    timestr += ((date.getDate() < 10) ? ('0' + date.getDate()) : (date.getDate()));
    if (onlyDate) {
        return timestr;
    }
    timestr += ' ' + ((date.getHours() < 10) ? ('0' + date.getHours()) : date.getHours()) + ':';
    timestr += ((date.getMinutes() < 10) ? ('0' + date.getMinutes()) : date.getMinutes()) + ':';
    timestr += ((date.getSeconds() < 10) ? ('0' + date.getSeconds()) : date.getSeconds());
    return timestr;
}

function temp(data,tempid){
	var content = $api.byId(tempid+'-content');
	var tpl = $api.byId(tempid+'-template').text;
	var tempFn = doT.template(tpl);
	content.innerHTML = tempFn(data);
}
function back(){
   api.historyBack(
	   function(ret, err){
	   if(!ret.status){
	     toast('无路可退了,亲!');
	   }
   });
}
function toast(msg){
  api.toast({msg:msg,duration:1000})
}
function closetoWin(name){
  var name = name ? name : 'root';
  api.closeToWin({
	    name: name,
	    animation: {
	        type: 'flip',
	        subType: 'from_bottom',
	        duration: 500
	    }
  });
}
function backhome(){
  closetoWin();
  opentoTab('main');
}
function addToCart(id,type,obj){
    var uid = $api.getStorage('uid');
	//login
	if (!uid) {
		api.openWin({
			name : 'userLogin',
			url : '../html/login.html',
			opaque : true,
			vScrollBarEnabled : false
		});
		return;
	}
	var cart = $api.getStorage('cart') ? $api.getStorage('cart') : '';
	var qty = ($('#qty_'+id).length>0 && type != 'buy_buy') ? $('#qty_'+id).val() : 1;
	ajaxRequest('yunbuy/addtocart', 'POST', {values:{id:id,qty:qty,cart:cart}}, function (ret, err) {
		    if (ret.data) {
		       $api.setStorage('cart', ret.data.cart);
		       api.execScript({
			       name : 'root',
			       script : "loadcart()"
			   });
			   MoveBox(id);
			   if(type){
				   var cartpageParam = {}
				   if(type=='free') cartpageParam = {'free':1}
				   opentoTab('cart',cartpageParam);
			   }
		    }else{
		       toast(ret.msg);
		    }
	});
}
function MoveBox(id) {
    var divTop = $('#buy_img_'+id).offset().top;
    var divLeft = $('#buy_img_'+id).offset().left;
    var cartBox = $(".cartNum").last();
    var src = $('#buy_img_'+id).attr('src');
    $('body').append('<div class="ui-cart-move"><img src="'+src+'" /></div>');
    var obj = $('.ui-cart-move').last();
    var scrollheight = $("body").scrollTop()*1;
    obj.css({
        "position": "absolute",
        "z-index": "1000",
        "left": divLeft + "px",
        "top": divTop + "px"
    }).animate({
        "left": api.winWidth*0.8+"px",
        "top": api.winHeight*1+scrollheight-50+"px"
    },1000).fadeTo(0, 0.1, function(){
        obj.remove();
    });
}

function ajaxRequest(url, method, bodyParam, callBack) {
    var common_url = RootUrl+'/api/';
    var appKey = '0fd1ff545d0df8cc9e464370c5b2eddd';
    var minfo = $api.getStorage('minfo');
    var upsw = minfo && minfo.password ? minfo.password : '';

//测试删除接口参数
//  if(method==='POST' && (url.indexOf('delcart/') != -1)){
//  	alert(url);
//  	alert(JSON.stringify(bodyParam));
//  	alert(callBack);
//  }
    api.ajax({
        url: common_url + url,
        method: method,
        cache: false,
        timeout: 20,
        headers: {
            "AppKey": appKey,
            "UID": $api.getStorage('uid'),
            "UNAME": $api.getStorage('uname'),
            "UPSW": upsw,
        },
        dataType: 'json',
        data: bodyParam
    }, function (ret, err) {
        if (ret) {
          callBack(ret, err);
        }else{
          toast(err.msg);
        }
    });
}
//打开页面
function openFrame(page,y,w,h,pageParam,bounces){
    api.openFrame({
        name: page,
        url: page + '.html',
        rect: {
            x: 0,
            y: y,
            w: w,
            h: h
        },
        pageParam: pageParam,
        bounces: false,
        bgColor: 'rgba(255,255,255,0)'
    });
}
function showprog(){
//  api.showProgress({
//      title: '加载中...',
//      modal: true
//  });
    var y = $api.getStorage('header_h'),
        f = $api.getStorage('footer_h'),
        w = api.winWidth,
        h = api.winHeight - y - f;
    openFrame('loading',y,w,h,{},false);
}
function hideprog(){
//    api.hideProgress();
    api.closeFrame({
        name: 'loading'
    });
}

//获取验证码 act操作类型
function getSmsVerify(act,btn,mobile){
    mobile = mobile?mobile:$('#mobile').val();
    var myreg = /^((1[3-9])+\d{9})$/; 
    
	if(mobile && !myreg.test(mobile)) { 
	    toast('请输入有效的手机号码！');
	    return false; 
	} 
    btn = btn?btn:'#btnSms';
    act = act?act:'sms_register';
    scode = $('#scode').val() ? $('#scode').val() : '';
    var D = {act:act, mobile:mobile, scode:scode};
    RemainTime(btn);
    ajaxRequest('welcome/sms', 'POST', {values:D}, function (ret, err) {
        if(ret.error==0){
            toast(ret.msg);
        }else{
            toast(ret.msg);
        }
    });
}
//短信验证码按钮倒计时
var iTime = zTime = 60;
var Account;
function RemainTime(btn){
    $(btn).attr('disabled',true).css('color','#000');
    var iSecond,sSecond="",sTime="";
    if (iTime >= 0){
        iSecond = parseInt(iTime%60);
        iMinute = parseInt(iTime/60);
        if (iSecond >= 0){
            if(iMinute>0){
                sSecond = iMinute + "分" + iSecond + "秒";
            }else{
                sSecond = iSecond + "秒";
            }
        }
        sTime=sSecond;
        if(iTime==0){
            clearTimeout(Account);
            sTime='获取短信验证码';
            $(btn).attr('disabled',false).css('color','#fff');
            iTime = zTime;
        }else{
            Account = setTimeout(function(){ RemainTime(btn); },1000);
            iTime=iTime-1;
        }
    }
    $(btn).val(sTime);
}



Date.prototype.format = function (format) {
    var o = {
        "M+": this.getMonth() + 1, //month
        "d+": this.getDate(), //day
        "H+": this.getHours(), //hour
        "m+": this.getMinutes(), //minute
        "s+": this.getSeconds(), //second
        "q+": Math.floor((this.getMonth() + 3) / 3), //quarter
        "S": this.getMilliseconds() //millisecond
    }
    if (/(y+)/.test(format)) format = format.replace(RegExp.$1,(this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o) if (new RegExp("(" + k + ")").test(format))format = format.replace(RegExp.$1,RegExp.$1.length == 1 ? o[k] :("00" + o[k]).substr(("" + o[k]).length));
    return format;
}
function reload(tag,reload){
    var re = reload ? 'true' : 'false';
    api.execScript({
       name : 'root',
       script : "reloadNav('"+tag+"',"+reload+")"
	});
}
function act_login(user){
	$api.setStorage('uid',user.mid);
	$api.setStorage('uname',user.username);
	$api.setStorage('minfo',user);
	uid = user.mid;
	$api.setStorage('cart','');
	api.historyBack({
	},function(ret,err){
	    closetoWin();
        reload('user',true);
        //opentoTab('user');
	});
	//绑定别名推送
	var jpush = api.require('ajpush');
	var param = {
	alias : user.username
	};
	jpush.bindAliasAndTags(param, function(ret) { 
	});
}

var android_download_url, ios_download_url;
function checkUpdate(){
    ajaxRequest('home/getIosUrl', 'GET', {}, function (ret, err) {
	    if (ret) {
            ios_download_url = ret.data;
	    } else {
	        toast(err.msg);
	    }
	});
	ajaxRequest('home/getAndroidUrl', 'GET', {}, function (ret, err) {
	    if (ret) {
            android_download_url = ret.data;
	    } else {
	        toast(err.msg);
	    }
	});
    ajaxRequest('home/getVersion', 'GET', {}, function (ret, err) {
	    if (ret) {
	        if(parseInt($api.getStorage("version-checked")) == 0){
	            var now = parseInt(api.appVersion.replace(/\./g, ''));
	            var latest = parseInt(ret.data.replace(/\./g, ''));
                //alert("最新版本:" + latest);
                //alert("当前版本" + now);
                if(now < latest){
                    var dialogBox = api.require('dialogBox');
					dialogBox.confirm({
					    tapClose: false,
					    msg: {
					        content:'检测到了最新版本，请前往更新！',
					        leftBtnTitle: '取消',
					        rightBtnTitle:'升级'
					    }, 
					    styles: {
					        bg: '#fff',                
					        maskBg:'rgba(0,0,0,0.5)', 
					        h: 110, 
					        msg :{            
					            color : '#000000', 
					            size  : 20,
					            maginLR: 30,
                                align : 'center'     
					        },                     
					        leftBtn :{ 
					            bg: '#eee',                    
					            color: '#fff', 
					            highlightBg:'#eee',
					            size: 12
					        },
					        rightBtn :{                  
					            bg: '#009bd3',
					            highlightBg:'#009bd3',
					            color: '#FFF',
					            size: 12
					        }
					    }
					}, function(ret) {
					    dialogBox.close({dialogName:'confirm'});
					    if(ret.eventType === 'ok'){
					        if(api.systemType == 'ios'){
					            var u =ios_download_url;
							    var browser = api.require('webBrowser');
							    browser.open({url:u,titleBar:{bg:'#e54048',textColor:'#ffffff'}});
					        }else if(api.systemType == 'android'){
					            //window.open('weixin://open');
					            //window.open("http://www.baidu.com");
					            /*
					            var u = android_download_url;
							    var browser = api.require('webBrowser');
							    browser.open({url:u,titleBar:{bg:'#e54048',textColor:'#ffffff'}});
							    */
							   api.openApp({
	                               androidPkg: 'android.intent.action.VIEW',
	                               mimeType: 'text/html',
	                               uri:android_download_url,
                               },function(ret,err){
                               	
                               });
					        }
					    }else if(ret.eventType === 'cancel'){
					    }
					});
                }
                $api.setStorage("version-checked", 1);
	        }else{
	            //alert("检查过了");
	        }
	    } else {
	        toast(err.msg);
	    }
	});
}


window.addEventListener('load', function() {
  FastClick.attach(document.body);
}, false);

