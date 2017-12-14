function checktopic(){
	var topic = $("input[name='topic']");
	if(topic.val() == ''){
		topic.val('帖子标题不能为空！').addClass('red').attr('disabled',true);
		setTimeout(function(){topic.val('').removeClass('red').attr('disabled',false);},1000);
		return false;
	}
	return true;
}
function checkboardid(){
	var boardid = $("select[name='board_id']");
	if(boardid.val() == 0){
		myalertbox('请选择分类');
		return false;
	}
	return true;
}
function checkbody(){
	var content = $("textarea[name='body']");
	if(content.val().length < 12){
		myalertmidbox('发表内容字数不小于12');
		return false;
	}
	return true;
}
function checkreply(){
	var reply_body = $("input[name='reply_body']");
	if(reply_body.val().length < 12){
		myalertmidbox('回复内容字数不小于12');
		return false;
	}
	return true;
}
function checkcode(){
	var verifycode = $("input[name='verifycode']");
	if(verifycode.val() == ''){
		verifycode.val('请输入验证码').addClass('red').attr('disabled',true);
		setTimeout(function(){verifycode.val('').removeClass('red').attr('disabled',false);},1000);
		return false;
	}
	return true;
}
//发表帖子
$("#postbtn").click(function(){
	if(!checktopic()){
		return false;
	}
	if(!checkboardid()){
		return false;
	}
	if(!checkbody()){
		return false;
	}
	/*if(!checkcode()){
		return false;
	}*/
	//$("#postform").submit();
	$.post('../../Mobile/Posts/createpost',$("#postform").serialize(),function(data){
		if(data.error == 'illegalword'){
			myalertmidbox(data.content);
			return;
		}
		if(data.error == 0){
			$("input[name='topic']").val('');
			myalertbox('发表成功','../../Mobile/Posts/detail/post_id/'+data.post_id);
		}else if(data == 'stopping'){
			myalertbox('请勿频繁操作');
		}else{
			myalertbox('发表失败');
		}
	})
})

//发表回复
$("#replybtn").click(function(){
  if(!checkreply()){
    return false;
  }
  $.post($("#replyform").attr('action'),$("#replyform").serialize(),function(data){
	if(data.error == 'illegalword'){
		myalertmidbox(data.content);
		return;
	}
   	if(data.error == 0){
   	  $("input[name='reply_body']").val('');
      myalertbox('回复成功');
	  var preplyinfo = '';
	  if(typeof(eval(data.replyinfo)) == 'undefined'){
	  }else{
		preplyinfo = "<ul class='blog-f fl'><li style='background:rgba(0,0,0,.1);border-radius:2px;padding:0.5rem 0.5rem'><p class='fl w100'>回复&nbsp;<span class='c-bule'>"+data.replyinfo.username+"</span><span class='fr fs1 l-gray'>"+data.replyinfo.ctime+"</span></p><p class='w100 t-w'>"+data.replyinfo.reply_body1+"</p></li></ul>";
	  }
	  $("#recordslist").append("<li id='newreply'><dl class='blog-b fl'><dt style='width:3.5rem;height:3.5rem;overflow:hidden'><img style='width:3.5rem' src='"+data.content.userhead+"'></dt><dd>"+data.content.username+"<span class='blog-c fr' style='color:#af1e25'>"+data.content.thefloor+"</span><br><span class='fs1 l-gray'>"+data.content.ctime+"</span><a class='replythis' href='javascript:void(0)' replypid='"+data.content.reply_id+"'><span class='fr' style='clear:both;padding-right:0.5rem'>回复</span><span class='fr blog-d'><img src='/Public/Mobile/images/tb_47.png'></span></a></dd></dl>"+preplyinfo+"<p class='ti2'> "+data.content.reply_body+"</p></li>");
		location.href="#newreply";
	}else if(data == 'stopping'){
    	myalertbox('请勿频繁操作');
    }else{
      myalertbox('回复失败');
    }
  })
})
//帖子收藏
function collect(obj,url){
	thisobj = $(obj);
	$.get(url,function(data){
		if(data == 'nologin'){
			myalertbox('请登录');
			return;
		}
		if(data == 'success'){
			thisobj.attr('onclick','');
			thisobj.children('img').css('opacity',0.5);
			myalertbox('收藏成功');
		}else{
			myalertbox('收藏失败');
		}
	})
}
