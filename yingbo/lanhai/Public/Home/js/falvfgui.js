var isfollow = false;


function falvfagui(url){
	$.get(url,function(data){
		if(data.error == 0){
			var posthtml = '';
			//var url = '../../Home/User/nofollow/f_id/';
			for(var i in data.falvfagui){
				posthtml +="<li><p class='set-lis-wz fl'><a href='{:U('News/detail',array('news_id'=>$v['news_id']))}'>{$v.news_title}</a></p><p class='set-lis-nr fl w100'>{$v.content|strip_tags|str_replace=array(' ','　','\t','\n','\r','&bsp;'),array('','','','','',''),###|mb_substr=###,0,88,'utf-8'}</p><p class='set-lis-plgz fl  fs12'>{$v.add_time}</p><p class='set-lis-plgz fr fs12'><span class='pr15'><img src='http://www.bjlhcq.com/Public/Home/images/images_06.png' alt=''>{$v.talk}</span><span class='pr15 fl'><img src='http://www.bjlhcq.com/Public/Home/images/images_07.png' alt=''>{$v.click}</span></p></li>";
			}
			posthtml += "<li><ul class='page mypagestyle'>"+data.page+"</ul></li>";
			$('#faguilist').html(posthtml);
			isfollow = true;
		}
	})
}
