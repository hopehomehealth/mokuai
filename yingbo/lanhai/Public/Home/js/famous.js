//评论列表
function allcomments(url){
	$.get(url,function(data){
		if(data.error == 0){
			var commenthtml = '';
			var giveup = '';
			for(var i in data.comments){
				if(data.comments[i].allow == 1){
					giveup = "<img src='/Public/Home/images/images_115.jpg' onclick='giveup(this,"+data.comments[i].com_id+")' />";
				}else if(data.comments[i].allow == 2){
					giveup = "<img src='/Public/Home/images/images_115.jpg' />";
				}else{
					giveup = "<img src='/Public/Home/images/images_121.jpg' />";
				}
			
				commenthtml += "<li><dl class='set-fi-wy-lis fl'><dt><img style='border-radius:50%' src='"+data.comments[i].userhead+"' alt='' /></dt><dd><span class='fl bule'>"+data.comments[i].username+"</span><span class='fr l-gray'>"+data.comments[i].add_time+"</span><div class='fl pt10' style='width:605px;'>"+data.comments[i].content+"</div><p class='fr'><span class='fl red'><b>"+data.comments[i].zan+"</b>&nbsp;&nbsp;"+giveup+"</span></p></dd></dl></li>";
			}
			commenthtml += "<li><ul class='page mypagestyle'>"+data.page+"</ul></li>";
			$('.set-fi-wy-lb').html(commenthtml);

		}
	})
}
function checkcomment(){
	if($("textarea[name='content']").val() == ''){
		myalertmidbox('评论内容不能为空');
		return false;
	}
	return true;
}
function subcommentform(){
	if(!checkcomment()){
		return false;
	}
	$.post($('#commentform').attr('action'),$('#commentform').serialize(),function(data){
		if(data == 'nologin'){
			myalertbox('请登录后评论');
			return;
		}
		if(data.error == 'illegalword'){
			myalertmidbox(data.content);
			return;
		}
		if(data.error == 0){
			var thenum = $("#comnumber");
			if(!isNaN(thenum.text())){
				thenum.text(parseInt(thenum.text()) + 1);
			}
			$(".mypagestyle").parent().prepend("<li id='newcom'><dl class='set-fi-wy-lis fl'><dt><img style='border-radius:50%' src='"+data.comment.userhead+"' alt='' /></dt><dd><span class='fl bule'>"+data.comment.username+"</span><span class='fr l-gray'>"+data.comment.add_time+"</span><div class='fl pt10' style='width:605px;'>"+data.comment.content+"</div><p class='fr'><span class='fl red'><b>0</b>&nbsp;&nbsp;<img src='/Public/Home/images/images_115.jpg' onclick='giveup(this,"+data.comment.com_id+")' /></span></p></dd></dl></li>")
			location.href='#newcom';
			myalertbox('评论成功');
		}else{
			myalertbox('评论失败');
		}
	})
}
function giveup(obj,val){
	var thisobj = $(obj);
	var url = $('.set-fi-wy-lb').attr('giveupurl')+'/com_id/'+val;
	$.get(url,function(data){
		if(data.error == 0){
			var thenum = thisobj.prev('b').text();
			if(!isNaN(thenum)){
				thisobj.prev('b').text(parseInt(thenum) + 1);
			}
			thisobj.attr('onclick','');
			thisobj.get(0).src = '/Public/Home/images/images_121.jpg';	
		}
	})
}
//加关注
function follow(url){
	$.get(url,function(data){
		if(data == 'nologin'){
			myalertbox('请先登录');
			return;
		}
		if(data == 'followed'){
			myalertbox('已关注过');
			return;
		}
		if(data == 'success'){
			myalertbox('关注成功');
		}else{
			myalertbox('关注失败');
		}
	})
}
//取消加关注
function nofollow(obj,url){
	thisobj = $(obj);
	$.get(url,function(data){
		if(data == 'nologin'){
			myalertbox('请先登录');
			return;
		}
		if(data == 'success'){
			thisobj.parents('li').remove();
			myalertbox('取消关注成功');
		}else{
			myalertbox('取消关注失败');
		}
	})
}
