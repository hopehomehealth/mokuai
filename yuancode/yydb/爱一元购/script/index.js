/**
 * Created by waco on 16/5/8.
 */
//previous page id, current page id
var prevPid='',curPid='',jpush='',index=0;
//save opened frame name
var frameArr = [];
//frame whether open
function isOpened(frmName) {
	var i = 0, len = frameArr.length;
	var mark = false;
	for (i; i < len; i++) {
		if (frameArr[i] === frmName) {
			mark = true;
			return mark;
		}
	}
	return mark;
}
//初始化
function funIniGroup(y,h){
    var eHeaderLis = $api.domAll('#header div.header1'),
        frames = [],name;
    for (var i = 0,len = eHeaderLis.length; i < len; i++) {
        name = $api.attr(eHeaderLis[i], 'data-name');
        if (name== 'yunbuy') {
        	var b = false;
        } else {
        	var b = true;
        }
        frames.push( {
            name: name,
            url: './html/'+ name +'.html',
            bgColor : 'rgba(255,255,255,.2)',
            vScrollBarEnabled:false,
            bounces:b
        } )
    }
    api.openFrameGroup({
        name: 'group',
        scrollEnabled: false,
        rect: {
            x: 0,
            y: y,
            w: api.winWidth,
            h: h
        },
        index: 0,
        frames: frames
    }, function (ret, err) {

    });
}
function clearprevPid(){
   curPid = '';
   api.closeFrame({
		name:'yunbuy'
   });
}
//open tab
function openTab(type, pageparam){
    uid = $api.getStorage('uid');
	if (type === 'user') {
		//login
		if (!uid) {
			api.openWin({
				name : 'userLogin',
				url : './html/login.html',
				opaque : true,
				vScrollBarEnabled : false
			});
			return;
		}
	}
	var eHeaderLis = $api.domAll('#header div.header1'),
	    eNavLis = $api.domAll('#foot div.aui-bar-tab-item'),name;
	for (var i = 0,len = eHeaderLis.length; i < len; i++) {
        name = $api.attr(eHeaderLis[i], 'data-name');
        if(name==type){
          $api.addCls(eNavLis[i], 'aui-active');
          $api.removeCls(eHeaderLis[i], 'aui-hide');
        }else{
          $api.removeCls(eNavLis[i], 'aui-active');
          $api.addCls(eHeaderLis[i], 'aui-hide');
        }
    }
	
	var width = api.winWidth;
	var header_h = $api.dom('#header').offsetHeight;
	var height = $api.dom('#main').offsetHeight;
	var footer_h = $api.dom('#foot').offsetHeight;
        height = api.winHeight-header_h-footer_h;
	
	type = type || 'main';

	//record page id
	prevPid = curPid;
	curPid = type;
	if (prevPid !== curPid) {
        if (type== 'yunbuy') {
        	var b = false;
        } else {
        	var b = true;
        }
		api.openFrame({
			name : type,
			url : 'html/' + type + '.html',
			bounces : b,
			opaque : true,
			vScrollBarEnabled : false,
			pageParam : pageparam,
			bgColor:'#fff',
			reload:true,	
			rect : {
				x : 0,
				y : header_h,
				w : width,
				h : height
			}
		});

		if (prevPid) {
			api.closeFrame({
			    name: prevPid
			});

		}
		if (!isOpened(type)) {
			//save frame name
			frameArr.push(type);
		}
	}

}
//加载购物车
function loadcart(){
  var cart = $api.getStorage('cart');
  var cart_num = $api.dom("#cart_num");
  ajaxRequest('yunbuy/cart', 'POST', {values:{'cart':cart}}, function (ret, err) {
        if (ret.data.num) {
          $api.html(cart_num, ret.data.num);
        }else{
          $api.html(cart_num, '0');
        }
  });
}
function setTab(opentype,param){
   curPid = '';
   openTab(opentype,param);
}
function getlogo(){
   ajaxRequest('home/getsiteconfig', 'GET', {}, function (ret, err) {
	  var data = ret.data;
	  var logo = $api.dom('#logo');
	  console.log('logo'+logo);
	  if(data.app_logo){
	    $api.attr(logo,'src',data.app_logo);
	  }else{
	    $("#logo").parent('.title').html(data.site_name);
	  }
   });
}
function reloadNav(tag,reload){
   var isreload = reload ? true : false;
   var eNavLis = $api.domAll('#foot div.aui-bar-tab-item'),
        eHeaderLis = $api.domAll('#header div.header1');
    for (var i = 0,len = eNavLis.length; i < len; i++) {
        if( tag == eNavLis[i].getAttribute('data-name') ){
            index = i;
            $api.addCls(eNavLis[i], 'aui-active');
            $api.removeCls(eHeaderLis[i], 'aui-hide');
        }else{
            $api.removeCls(eNavLis[i], 'aui-active');
            $api.addCls(eHeaderLis[i], 'aui-hide');
        }
    }
    api.setFrameGroupIndex({
        name: 'group',
        reload: isreload,
        scroll: false,
        index: index
    });
}
// 随意切换按钮
function switchNav(tag,tomain) {
    uid = $api.getStorage('uid');
    if (tag.getAttribute('data-name') == 'user' || tag.getAttribute('data-name') == 'cart') {
	    //login
		if (!uid) {
			api.openWin({
				name : 'userLogin',
				url : './html/login.html',
				opaque : true,
				vScrollBarEnabled : false
			});
			if(api.systemType!='ios'){ return; }
		}
	}
    
    for(i=0;i<frameArr.length;i++){
       api.closeFrame({
	       name: frameArr[i]
       });
    }
    prevPid = '', curPid = '';
    if( tag == $api.dom('#foot div.aui-active') )return;
    var eNavLis = $api.domAll('#foot div.aui-bar-tab-item'),
        eHeaderLis = $api.domAll('#header div.header1');
    for (var i = 0,len = eNavLis.length; i < len; i++) {
        if( tag == eNavLis[i] ){
            index = i;
            $api.addCls(eNavLis[i], 'aui-active');
            $api.removeCls(eHeaderLis[i], 'aui-hide');
            
        }else{
            $api.removeCls(eNavLis[i], 'aui-active');
            $api.addCls(eHeaderLis[i], 'aui-hide');
        }
    }
    uid = $api.getStorage('uid');
	isreload = index == '3'||index == '4' ? true : false;
    api.setFrameGroupIndex({
        name: 'group',
        reload: isreload,
        scroll: false,
        index: index
    });
    if(tomain && uid){api.sendEvent({
	    name:'showivtadafterlogin'
    });}
}

apiready = function(){
	$api.setStorage('adcount',0);
	$api.setStorage('adlastshow',1);
	$api.setStorage('showivtad',0);
	$api.setStorage('version-checked',0);
  	ajaxRequest('home/getsiteconfig', 'GET', {}, function (ret, err) {
    	$api.setStorage('ssl',ret.data.openssl);
  	});
  	ssl = $api.getStorage('ssl') ? $api.getStorage('ssl') : 0;
	if (ssl==1) {
		RootUrl = RootUrl.replace(/http:/, "https:");
	}
    //适配iOS 7+，Android 4.4+状态栏
    var header = $api.byId('header');
    $api.fixStatusBar(header);
    //设置状态栏样式
    api.setStatusBarStyle({
        style: 'dark',
        color:'#000'
    });
    var header_h = $api.dom('#header').offsetHeight,
        main_h = $api.dom('#main').offsetHeight,
        footer_h = $api.dom('#foot').offsetHeight;
        main_h = api.winHeight-header_h-footer_h;
    //缓存头部高度
    $api.setStorage('header_h',header_h);
    //缓存底部高度
    $api.setStorage('footer_h',footer_h);
//  var zhuge = api.require('zhuge');
//	zhuge.initZhuge();
//	zhuge.openLog();
//	zhuge.openDebug();
	api.addEventListener({
	    name:'viewappear'
	}, function(ret, err){
	   uid = $api.getStorage('uid') ? $api.getStorage('uid') : '';
	   if(index==4 && !uid){
	    openWin('./html/login');
	    return;
	   }
	   if(index==3 || index==4){
	      api.setFrameGroupIndex({
		        name: 'group',
		        reload: true,
		        scroll: false,
		        index: index
		  });
	   }
	});
    //初始化推送
    funIniGroup(header_h,main_h);
    loadcart();
    jpush = api.require('ajpush');
	jpush.init(function(ret){
	 if(ret && ret.status){
	 }
	});
	api.addEventListener({name:'appintent'}, function(ret,err){
	    //监听推送返回
	    if(ret.appParam.ajpush){
	      var data = JSON.parse(ret.appParam.ajpush.extra);
	    }else{
	    //监听外部应用打开
	      var data = ret.appParam;
	    }
	    
	    if(data.winpage!=''){
	      openWin(data.winpage,data);
	    }
	})
	api.addEventListener({name:'pause'}, function(ret,err){
		onPause();//监听应用进入后台，通知jpush暂停事件
	});
		
	api.addEventListener({name:'resume'}, function(ret,err) {
		onResume();//监听应用恢复到前台，通知jpush恢复事件
	})
};
//统计-app恢复
function onResume(){
	jpush.onResume();
	console.log('JPush onResume');
}

//统计-app暂停
function onPause(){
	jpush.onPause();
	console.log('JPush onPause');
}