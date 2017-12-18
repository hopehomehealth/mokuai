function showad(islogin){
	$api.setStorage('adcount',(parseInt($api.getStorage('adcount'))+1));
	purl0 = 'http://www.i1y8.com/upload/images/mobile-home1.png';
	purl1 = 'http://www.i1y8.com/upload/images/mobile-home2.png';
	savethumb((islogin?purl1:purl0),function(url){
		var dialogBox = api.require('dialogBox');
		var nw = $(window).width()*0.9;
		var nh = nw * 290 / 366;
		if(islogin){$api.setStorage('showivtad',(parseInt($api.getStorage('showivtad'))+1));}
		dialogBox.discount({
		    rect: {
		        w: nw,
		        h: nh
		    },
		    styles: {
		        bg: 'rgba(0,0,0,0)',
		        image: {
		            path: url,
		            marginB: 200
		        },
		        cancel: {
		            icon: 'widget://image/mobile-homeclose.png',
		            w: nw,
		            h: nw * 37 /293,
		            marginB: 200+nh
		        }
		    }
		}, function(ret) {
		    dialogBox.close({dialogName: 'discount'});
		    if (ret.eventType == 'image') {
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
				openWin('member_myivt');
			}
			if(ret.eventType == 'cancel'){
			    checkUpdate();
			}
		});
	});
}

function savethumb(url,callback){
	api.imageCache({
	    url: url,
	    policy:'no-cache',
	    thumbnail:false
	}, function(ret, err) {
	    callback(ret.url);
	});
}
