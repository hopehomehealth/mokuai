var title = '我在爱购商城分享了';
function qqshare(type){
    showprog();
    var qq = api.require('qq');
	qq.shareNews({
	    url:shareurl,
	    title:title,
	    description:sharetext,
	    imgUrl:sharepic,
	    type:type
	}, function(ret, err){
	    hideprog();
	    if(ret.status){
	        toast('分享成功');
	    }else{
	        toast(err.msg);
	    }
	});
}
function wxshare(type){
   showprog();
   var wx = api.require('wx');
   wx.shareWebpage({
	    apiKey: wxKey,
	    scene: type,
	    title: title,
	    description: sharetext,
	    contentUrl: shareurl,
	    thumb:sharepic
	}, function(ret, err){
	    hideprog();
	    if(ret.status){
	        toast('分享成功');
	    }else{
	        var msg = '';
	        switch(err.code)
			{
			case -1:
			  msg = '未知错误';
			  break;
			case 0:
			  msg = '成功';
			  break;
			case 1:
			  msg = 'apiKey非法';
			  break;
			case 2:
			  msg = '用户取消';
			  break;
			case 3:
			  msg = '发送失败';
			  break;
			case 4:
			  msg = '授权拒绝';
			  break;
			case 5:
			  msg = '微信服务器返回的不支持错误';
			  break;
			case 6:
			  msg = '当前设备未安装微信客户端';
			  break;
			default:
			  msg = '注册SDK失败';
			}
	        toast(msg);
	    }
	});
}