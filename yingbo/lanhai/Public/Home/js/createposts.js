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
	var reply_body = $("textarea[name='reply_body']");
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
	if(!checkcode()){
		return false;
	}
	//$("#postform").submit();
	$.post('../../Home/Posts/createpost',$("#postform").serialize(),function(data){
		if(data == 'nologin'){
		myalertbox('请先登录');
			return;
		}
		if(data.error == 'illegalword'){
			ue.setContent(data.result);
			myalertmidbox(data.content);
			return;
		}
		if(data == 'stopping'){
			myalertbox('请勿频繁操作');
		}else if(data == 'error'){
			myalertbox('发表失败');
		}else if(data == 'codeerror'){
			$("input[name='verifycode']").val('验证码不正确').addClass('red').attr('disabled',true);
			setTimeout(function(){$("input[name='verifycode']").val('').removeClass('red').attr('disabled',false);},1000);
		}else if(data.error == 0){
			$("input[name='topic']").val('');
			$("input[name='verifycode']").val('');
			myalertbox('发表成功','../../Home/Posts/detail/post_id/'+data.post_id);
		}
	})
})
//发表回复
$("#replybtn").click(function(){
  if(!checkreply()){
    return false;
  }
  if(!checkcode()){
    return false;
  }
  $.post($("#replyform").attr('action'),$("#replyform").serialize(),function(data){
	if(data == 'nologin'){
		myalertbox('请先登录');
		return;
	}
	if(data.error == 'illegalword'){
			ue.setContent(data.result);
			myalertmidbox(data.content);
			return;
		}
    if(data == 'codeerror'){
		$("input[name='verifycode']").val('验证码不正确').css('color','red').attr('disabled',true);
		setTimeout(function(){$("input[name='verifycode']").val('').css('color','').attr('disabled',false);},1000);
    }else if(data.error == 0){
	  ue.setContent('');
      myalertbox('回复成功','./Home/Posts/detail/post_id/'+data.post_id+'/anchor/nowfloor_'+data.reply_id);
    }else if(data == 'stopping'){
    	myalertbox('请勿频繁操作');
    }else{
      myalertbox('回复失败');
    }
  })
})
//文章收藏
function collect(obj,url){
	thisobj = $(obj);
	$.get(url,function(data){
		if(data == 'nologin'){
			myalertbox('请先登录');
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