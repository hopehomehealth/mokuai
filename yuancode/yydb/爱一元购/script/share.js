var title = 'i1y8商城';

function urlToDwz(url,callback){
    api.ajax({
        url: 'http://www.i1y8.com/content/ajax_shorturl?href='+url,
    }, function (ret, err) {
    	console.log(JSON.stringify(ret));
        if (ret && ret.dwz) {
          callback(ret.dwz, err);
        }else{
          toast(err.msg);
          callback(ret.dwz, err);
        }
    });
}


function savethumb(url,callback){
	api.imageCache({
	    url: url
	}, function(ret, err) {
	    callback(ret.url);
	});
}

function qqshare(type){
	showprog();
	urlToDwz(shareurl,function(dwz,err){
		console.log(dwz);
	    var qq = api.require('qq');
		qq.shareNews({
		    url:dwz || shareurl,
		    title:sharetitle || sharetext || title,
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
	});
}

function wxshare(type){
   	showprog();
	urlToDwz(shareurl,function(dwz,err){
		console.log(dwz);
		console.log('before:'+sharepic);
		
		savethumb(sharepic,function(picurl){
			console.log('after:'+picurl);
			var wx = api.require('wx');
			hideprog();
			wx.shareWebpage({
				scene: type,
				title: sharetitle || title,
				description: sharetext,
				contentUrl: dwz || shareurl,
				thumb:picurl || sharepic
			}, function(ret, err){
				hideprog();
				if(ret.status){
				    toast('分享成功');
				}else{
				    var msg = '';
				    switch(err.code){
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
		});
 		
	});   
}