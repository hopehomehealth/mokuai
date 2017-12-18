$(function(){
    scrollLoading();
});
function scrollLoading(){
    if($(".scrollLoading").length>0)
        $(".scrollLoading").scrollLoading();
}
//确认消息
function zz_confirm(msg,url){
    layer.confirm(msg,function(){ if(url) location.href=url; });
}
//判断时间断，问候
function welcome_time(){
    var now = new Date();
    var hour = now.getHours()
    var str = '';
    if(hour < 6){str="凌晨好！"}
    else if (hour < 9){str="早上好！"}
    else if (hour < 12){str="上午好！"}
    else if (hour < 14){str="中午好！"}
    else if (hour < 17){str="下午好！"}
    else if (hour < 19){str="傍晚好！"}
    else if (hour < 22){str="晚上好！"}
    else {str="夜里好！"}
    document.getElementById('hello').innerHTML = str;
}
//获取验证码 act操作类型
function getSmsVerify(act,btn,mobile){
    mobile = mobile?mobile:$('#mobile').val();
    btn = btn?btn:'#btnSms';
    act = act?act:'sms_register';
    if(!mobile&&act=='sms_register'){
    	mobile = $("#username").val();
    }
    scode = $('#scode').val();
    var D = { act:act, mobile:mobile, scode:scode };
    $.post("/welcome/sms", D,
        function(data){
            var type = 8;
            if(data.error==0){
                RemainTime(btn);
                type = 1;
                if($('#btnVoice').length>0)
                    $('#btnVoice').hide();
            }
            if(data.message) layer.alert(data.message,type);
        }, "json");
}
//短信验证码按钮倒计时
var iTime = zTime = 60;
var Account;
function RemainTime(btn){
    $(btn).attr('disabled',true);
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
            $(btn).attr('disabled',false);
            iTime = zTime;
        }else{
            Account = setTimeout(function(){ RemainTime(btn); },1000);
            iTime=iTime-1;
        }
    }
    $(btn).val(sTime);
}
function getVoiceVerify(btn,mobile){
    mobile = mobile?mobile:$('#mobile').val();
    btn = btn?btn:'#btnVoice';
    var D = {mobile:mobile,submit:'ok' };
    $.post("/welcome/voice", D,
        function(data){
            var type = 8;
            if(data.error==0){
                RemainTime2(btn);
                type = 1;
                if($('#btnSms').length>0)
                    $('#btnSms').hide();
            }
            if(data.message) layer.alert(data.message,type);
        }, "json");
}
function RemainTime2(btn){
    $(btn).attr('disabled',true);
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
            sTime='获取语音验证码';
            $(btn).attr('disabled',false);
            iTime = zTime;
        }else{
            Account = setTimeout(function(){ RemainTime(btn); },1000);
            iTime=iTime-1;
        }
    }
    $(btn).val(sTime);
}
function addToCart(id,type,obj){
    obj = obj?obj:'';
    id = parseInt(id);
    var qty = ($('#qty_'+id).length>0) ? $('#qty_'+id).val() : 1;
    $.post('/yunbuy/addtocart',{id:id,qty:qty,type:type},function(data){
        if(data.error){
            var params = ' ';
            if(data.url){
                params = function(){
                    location.href=data.url;
                };
            }
            layer.alert(data.error,8,params);
        }else{
            if(type=='buy'){
                location.href='/yunbuy/cart';
            }else if(type=='free'){
                location.href='/yunbuy/cart?free';
            }else{
                $('.cartNumber').html(data.cartNum);
                //layer.alert('加入购物车成功','1');
                MoveBox(obj,id);
            }
        }
    },"json");
}
function loadCart(){
    $.post('/yunbuy/loadcart',{u:1},function(data){
        $('#cart_info').html(data.html);
        $('#cartNum').html(data.num);
    },"json");
}
function delCart(id,type){
    type=type?type:0;
    if(id){
        $.post('/yunbuy/delcart/'+id,{id:id},function(data){
            if(type==1){
                location.reload();
            }else{ loadCart(); }
        });
    }
}
//加入购物车特效
function MoveBox(t,id) {
    var divTop = $(t).offset().top;
    var divLeft = $(t).offset().left;
    var cartBox = $("#cartNum").last();
    var src = $('#buy_img_'+id).attr('src');
    $('body').append('<div class="ui-cart-move"><img src="'+src+'" /></div>');
    var obj = $('.ui-cart-move').last();

    obj.css({
        "position": "absolute",
        "z-index": "1000",
        "left": divLeft + "px",
        "top": divTop + "px"
    }).animate({
        "left": cartBox.offset().left + "px",
        "top": cartBox.offset().top + "px"
    },500).fadeTo(0, 0.1, function(){
        obj.remove();
    });
}

// 设置为主页
function SetHome(obj,vrl){
    try{
        obj.style.behavior = url('#default#homepage');
        obj.setHomePage(vrl);
    }
    catch(e){
        if(window.netscape) {
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            }
            catch (e) {
                alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为 true ,双击即可。");
            }
            /*var prefs = Components.classes[ @mozilla.org/preferences-service ].getService(Components.interfaces.nsIPrefBranch);
            prefs.setCharPref( browser.startup.homepage ,vrl);*/
        }else{
            alert("您的浏览器不支持，请按照下面步骤操作：\n1.打开浏览器设置。\n2.点击设置网页。\n3.输入："+vrl+"点击确定。");
        }
    }
}
// 加入收藏 兼容360和IE6
function AddFavorites(sTitle,sURL)
{
    try
    {
        window.external.AddFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}
//第三方登录
function oauth(url){
    //window.open(url,'newwindow','toolbar=no,scrollbars=yes,resizable=no,top=0,left=0,width=500,height=300');
    window.location.href=url;
}

//终端模板切换
function tplDevice(cli){
    var host = '1'+window.location.host;
    var url = '';
    if(host.indexOf('www.')==1){
        if(cli=='mobile'){ url=location.href.replace('www.','m.'); }
    }else if(host.indexOf('m.')==1){
        if(cli=='pc'){ url=location.href.replace('m.','www.'); }
    }else{
        if(location.search){ url=location.href+'&tpl='+cli; }
        else{ url=location.href+'?tpl='+cli; }
    }
    if(url){ location.href=url; }
}

//更新夺宝信息
function updatedb(id){
    var html = '';
    $.get('/home/update_db',{id:id},function(data){
        $("#db"+id).removeClass('jx-z');
        $("#db"+id).addClass('jx-y');
        if(data) $("#db"+id).load('/home/load_db?id='+id);
    });
}