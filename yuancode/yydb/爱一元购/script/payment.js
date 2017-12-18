function wxpay(back_info,type){
    var wxPay = api.require('wxPay');
	wxPay.config({
	         apiKey: back_info.appid,
		     mchId: back_info.mchid,
		     partnerKey: back_info.appkey,
		     notifyUrl: back_info.notifyurl
	}, function(ret, err){
	     if(ret.status){
	        wxPay.pay({
			     description: '充值',
			     totalFee: back_info.totalfee,
			     tradeNo: back_info.tradeno,
			     attach: back_info.attach
			},function(ret, err){
			     if(ret.status){
			         openWin('respon',{result:1});
			     }else{
			         if(err.code==-2){
			            toast('用户取消');
			         }else if(err.code==-1){
			            toast(err.msg);
			         }
			     }
			});
	     }else{
	         toast(err.code);
	     }
	});
  
}
/*支付宝*/
function alipay(back_info){
    var aliPay = api.require('aliPay');
	aliPay.payOrder({
	  orderInfo:back_info.url
	  },function(ret,err) {
	  var msg;
	  switch(ret.code){
	        case '6001':
	        msg = '用户中途取消支付操作';
	        break;
	        case '6000':
	        msg = '支付服务正在进行升级操作';
	        break;
	        case '4010':
	        msg = '重新绑定账户';
	        break;
	        case '4006':
	        msg = '订单支付失败';
	        break;
	        case '4005':
	        msg = '绑定失败或没有绑定';
	        break;
	        case '4004':
	        msg = '该用户已解除绑定';
	        break;
	        case '4003':
	        msg = '该用户绑定的支付宝账户被冻结或不允许支付';
	        break;
	        case '4001':
	        msg = '数据格式不正确';
	        break;
	        case '4000':
	        msg = '系统异常';
	        break;
	        case '9000':
	        openWin('respon',{result:1});
	        break;
	        default:
	        msg = ret.code;
	  }
	  toast(msg);
	});
}
/*爱贝支付*/
function aibei(back_info){
  var aibeiPay = new AiBeiPay();
  var transId = back_info.transid;
  if (transId == undefined){
//  alert(JSON.stringify(back_info.msg));
    return false;
  }
  var data = {};
  data.transId = transId;
  data.retFunc = "callbackData";
  data.baseZIndex = 88;
  data.closeTxt="返回应用"
  data.redirecturl = back_info.redirecturl;
  data.sign = back_info.sign;
  aibeiPay.clickAibei(data);
}
function callbackData(data){
  if(data.OrderStatus=='0'){
     openWin('respon',{result:1});
  }else if(data.OrderStatus==1){
     toast('支付失败');
  }else if(data.OrderStatus==2){
     toast('待支付');
  }else if(data.OrderStatus==3){
     toast('正在处理');
  }else{
     toast('系统异常');
  }
}
/*现在支付*/
function ipaynow(back_info){
  var uzmoduledemo = api.require('ipaynow');
  function generatePresignMessage(channel_type){
	var param = {appId:back_info.app_id,
				mhtCharset:"UTF-8",
				mhtCurrencyType:"156",
				mhtOrderAmt:back_info.order_amount*100,
				mhtOrderDetail:"充值",
				mhtOrderName:"充值",
				mhtOrderNo:order_sn+'_'+back_info.log_id,
				mhtorderStartTime:no,
				mhtOrderType:"01",
				notifyUrl:back_info.notify_url};
	if(channel_type!=null&&!channel_type==""){
		param["payChannelType"]=channel_type;
	}
	uzmoduledemo.generatePresignMessage(param, doSignature);
  }
  function doSignature(ret, err){
	if(ret.result=="fail"){
        alert(ret.msg);
    }
    var preSignStr=ret.preSignStr;
    var param = {preSignStr:preSignStr,post_content:"paydata="+preSignStr,post_url:ipayurl};
    uzmoduledemo.doSignature(param, pay);
}

function pay(ret, err){
    if(ret.result=="fail"){
        alert(ret.msg);
    }
    var paydata=ret.preSignStr+"&"+ret.resultStr;
    var param = {data:paydata};
    uzmoduledemo.pay(param, callBack);
}

function callBack(ret, err){
    //alert("响应吗:"+ret.respCode+"\n"+"错误码:"+ret.errorCode+"错误信息:"+ret.errorMsg);
    if(ret.respCode=='00'){
      openWin('respon',{result:1});
    }
    if(ret.errorMsg){
      toast("错误码:"+ret.errorCode+"错误信息:"+ret.errorMsg);
    }
}
  generatePresignMessage('');
}
/*聚宝付*/
var Random = (Math.random() + "").replace(".", "");
var ZIndex = 0;
function jubaopay(back_info){
    api.openFrame({
	    name: 'webform',
	    url: RootUrl+'api/yunbuy/pay_order/'+order_sn
	});
	var btnW = api.winWidth-110;
	var btnH = api.winHeight-50;
	api.openFrame({
	    name: 'backbtn',
	    url: 'backbtn.html',
	    rect: {
	        x:btnW,
		    y:btnH,
		    w:70,
		    h:30
	    },
	    bgColor: '#fff'
	});
}
function closeCallback(){
    api.closeFrame({
	    name: 'backbtn'
	});
	api.closeFrame({
	    name: 'webform'
	});
    showprog();
    ajaxRequest('yunbuy/success/'+order_sn, 'GET',{}, function (ret, err) {
      if(ret.data.status==2){
        toast('支付成功');
        openWin('respon',{result:1});
      }else{
        toast('支付失败');
      }
	});
	hideprog();
}
/*京东支付*/
function jdpay(back_info){
    api.openFrame({
	    name: 'webform',
	    url: RootUrl+'api/yunbuy/pay_order/'+order_sn
	});
	var btnW = api.winWidth-320;
	var btnH = api.winHeight-40;
	api.openFrame({
	    name: 'backbtn',
	    url: 'backbtn.html',
	    rect: {
	        x:10,
		    y:btnH,
		    w:70,
		    h:30
	    },
	    bgColor: '#fff'
	});
}
/*聚合付*/
function jhpay(back_info){
	jh = api.require('jhfPay');
	console.log(JSON.stringify(back_info));
    jh.jhfpay({
        msg:back_info.productdesc || 'Hello App!',
        productName:back_info.productname || '充值',
        money:back_info.paymoney*100,
        merid:back_info.merid,
        mername:back_info.mername,
        merorderid:back_info.merorderid,
        userid:back_info.userid,
        username:back_info.username,
        extra:back_info.extra,
        
    },function(ret,err){
        if(ret.resCode==1){
	        toast('支付成功');
	        openWin('respon',{result:1});
        }else if(ret.resCode=='-2'){
            toast('支付取消');
        }else{
            toast('支付失败');
        }
    });
}
/*汇付宝*/
function heepaywechat(back_info){
    api.openFrame({
	    name: 'webform',
	    url: RootUrl+'api/yunbuy/pay_order/'+order_sn
	});
	var btnW = api.winWidth-110;
	var btnH = api.winHeight-50;
	api.openFrame({
	    name: 'backbtn',
	    url: 'backbtn.html',
	    rect: {
	        x:btnW,
		    y:btnH,
		    w:70,
		    h:30
	    },
	    bgColor: '#fff'
	});
}
/*威付通*/
function swiftpass(back_info){
    wft = api.require('wftPay');
    //alert(JSON.stringify(back_info));
    wft.pay({
        msg:back_info.body,
        mch_id:back_info.mch_id,
        out_trade_no:back_info.out_trade_no,
        body:back_info.body,
        attach:back_info.attach,
        total_fee:back_info.total_fee,
        mch_create_ip:back_info.mch_create_ip,
        notify_url:back_info.notify_url
    },function(ret,err){
    	if(ret.resCode==0){
	        toast('支付成功');
	        openWin('respon',{result:1});
        }else if(ret.resCode=='-1'){
            toast('支付取消');
        }else{
            toast('支付失败');
        }
    });
}