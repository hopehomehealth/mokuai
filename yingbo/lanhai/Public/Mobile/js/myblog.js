var isopenclass = false;
var iscollect = false;
//检查名称
function checkblogname(val){
	if(val == ''){
		$("input[name='blog_name']").val('请输入博客名称').addClass('red').attr('disabled',true);
		setTimeout(function(){$("input[name='blog_name']").val('').removeClass('red').attr('disabled',false);},1000);
		return false;
	}
	return true;
}
//检查博客简介
function checkblogdesc(val){
	if(val == ''){
		$("textarea[name='blog_desc']").val('请输入简单介绍').addClass('red').attr('disabled',true);
		setTimeout(function(){$("textarea[name='blog_desc']").val('').removeClass('red').attr('disabled',false);},1000);
		return false;
	}
	return true;
}
//检查验证码
function checkcode(val){
	if(val == ''){
		$("input[name='checkverify']").val('请输入验证码').addClass('red').attr('disabled',true);
		setTimeout(function(){$("input[name='checkverify']").val('').removeClass('red').attr('disabled',false);},1000);
		return false;
	}
	return true;
}
function subblogform(){
	if(!checkblogname($("input[name='blog_name']").val())){
		return false;
	}
	if(!checkblogdesc($("textarea[name='blog_desc']").val())){
		return false;
	}
	if(!checkcode($("input[name='checkverify']").val())){
		return false;
	}
	$.post($("#openblogform").attr('action'),$("#openblogform").serialize(),function(data){
		if(data == 'nologin'){
			myalertbox('请先登录','../../Mobile/User/login');
			return;
		}
		if(data == 'codeerror'){
			$("input[name='checkverify']").val('验证码不正确').addClass('red').attr('disabled',true);
			setTimeout(function(){$("input[name='checkverify']").val('').removeClass('red').attr('disabled',false);},1000);
			return;
		}
		if(data.error == 1){
			myalertbox('你已经开通过','../../Mobile/Blog/myzone');
		}else if(data.error == 2){
			myalertbox('开通博客失败');
		}else if(data.error == 0){
			var i = 3;
			$("#kkk").text(i);
			$(".openblogstatus").show().siblings('.openblogform').hide();
			var timeid = setInterval(function(){
				i--;
				if(i==0){
					clearInterval(timeid);
					location.href="../../Mobile/blog/myzone";
				}else{
					$("#kkk").text(i);
				}
			},1000);
		}
	})
}
//我的收藏
function mycollect(url){
	$.get(url,function(data){
		if(data.error == 0){
			var articlehtml = '';
			for(var i in data.articlelist){
				articlehtml += "<li><p class='set-lis-wz fl'><a href='../art_id/"+data.articlelist[i].art_id+"'>"+data.articlelist[i].title+"</a></p><p class='set-lis-nr fl' style='width:100%'>"+data.articlelist[i].content+"</p><p class='set-lis-plgz fl  fs12'> "+data.articlelist[i].add_time+"</p><p class='set-lis-plgz fr fs12'><span class='pr15'><img src='/Public/Home/images/images_06.png' alt='' />"+data.articlelist[i].comments+"</span><span class='pr15 fl'><img src='/Public/Home/images/images_07.png' alt='' />"+data.articlelist[i].views+"</span></p></li>";
			}
			articlehtml += "<li><ul class='page mypagestyle'>"+data.page+"</ul></li>";
			$("#blogtable").html(articlehtml);
		}
		iscollect = true;
	})
}
//table切换
function changetable(){
	$(".core-tit li").click(function(){
        $(this).addClass('current').siblings().removeClass('current');
        $(".blogtable").eq($(this).index()).show().siblings(".blogtable").hide();
        if($(this).index() == 3){
        	if(!isopenclass){
        		$.get($("#addclassform").attr('action'),function(data){
        			if(data.error == 0){
        				var classhtml =  '';
        				for(var i in data.classlist){
        					classhtml += "<tr><td>"+data.classlist[i].class_name+"</td><td>"+data.classlist[i].number+"</td><td><a class='red' href='javascript:void(0)' classid='"+data.classlist[i].class_id+"' class='delclass' onclick='delclass(this,"+data.classlist[i].class_id+")'>删除</a></td></tr>";
        				}
        				$("#classtable").append(classhtml);
        				isopenclass = true;
        			}
        		});
        	}
        }else if($(this).index() == 4){
        	if(!iscollect){
        		mycollect('../../Home/Blog/mycollect');
        		$(".blogtable").on('click','.page a',function(){
	              //alert(111);
	                var url = $(this).attr("href");
	                mycollect(url);
	                return false;  //让a标签不能跳转
	            })
        	}
        }
    })
}

//提交博客设置
function subblogset(){
	if(!checkblogname($("input[name='blog_name']").val())){
		return false;
	}
	if(!checkblogdesc($("textarea[name='blog_desc']").val())){
		return false;
	}

	$.post($("#blogsetform").attr('action'),$("#blogsetform").serialize(),function(data){
		if(data == 'nologin'){
			myalertbox('请先登录','../../Mobile/User/login');
			return;
		}
		if(data.error == 1){
			myalertbox('设置失败');
		}else if(data.error == 0){

			myalertbox('设置成功');
		}
	})
}
/*添加博客分类*/
//检查分类名
function checkclassname(val){
	if(val == ''){
		$("input[name='class_name']").val('请输入分类名').addClass('red').attr('disabled',true);
		setTimeout(function(){$("input[name='class_name']").val('').removeClass('red').attr('disabled',false);},1000);
		return false;
	}
	return true;
}
function subclassform(){
	if(!checkclassname($("input[name='class_name']").val())){
		return false;
	}
	$.post($("#addclassform").attr('action'),$("#addclassform").serialize(),function(data){
		if(data.error == 0){
			$("#classtable").append("<tr><td>"+$("input[name='class_name']").val()+"</td><td>"+0+"</td><td><a href='javascript:void(0)' style='padding-right:0' classid='"+data.classid+"' class='delclass' onclick='delclass(this,"+data.classid+")'>删除</a></td></tr>");
			$("input[name='class_name']").val('');
			myalertbox('添加成功');
		}else{
			myalertbox('添加失败');
		}
	});
}
//删除分类
function delclass(obj,classid){
	var thisobj = $(obj);
	$.get('../../Mobile/Blog/delclass',{'class_id':classid},function(data){
		if(data.error == 0){
			thisobj.parent().parent().remove();
			myalertbox('删除成功');
		}else{
			myalertbox('删除失败');
		}
	})
}
//检查文章标题
function checktitle(){
	if($("input[name='title']").val() == ''){
		$("input[name='title']").val('请输入文章标题！').addClass('red').attr('disabled',true);
		setTimeout(function(){$("input[name='title']").val('').removeClass('red').attr('disabled',false);},1000)
		return false;
	}
	return true;
}
//检查文章内容
function checkcontent(){
	var content = $("textarea[name='content']");
	if(content.val().length < 12){
		myalertmidbox('发表内容字数不小于12');
		return false;
	}
	return true;
}
//提交文章
function subarticleform(){
	if(!checktitle($("input[name='title']").val())){
		return false;
	}
	if(!checkcontent($("textarea[name='content']").val())){
		return false;
	}
	$.post('../../Mobile/Blog/createart',$("#articleform").serialize(),function(data){
		if(data == 'nologin'){
			myalertbox('请先登录','../../Mobile/User/login');
			return;
		}
		if(data.error == 'illegalword'){
			myalertmidbox(data.content);
			return;
		}
		if(data == 'stopping'){
			myalertbox('请勿频繁操作');
			return;
		}
		if(data.error == 0){
			$("input[name='title']").val('');
			$("input[name='checkverify']").val('');
			$("textarea[name='content']").val('');
			myalertbox('发表成功','../../Mobile/Blog/detail/art_id/'+data.art_id);
		}else{
			myalertbox('发表失败');
		}	
	})
}
//修改文章
function subarticleform2(){
	if(!checktitle($("input[name='title']").val())){
		return false;
	}
	if(!checkcontent($("textarea[name='content']").val())){
		return false;
	}
	$.post($("#articleform2").attr('action'),$("#articleform2").serialize(),function(data){
		if(data == 'nologin'){
			myalertbox('请先登录','../../Mobile/User/login');
			return;
		}
		if(data.error == 'illegalword'){
			myalertmidbox(data.content);
			return;
		}
		if(data.error == 0){
			$("input[name='title']").val('');
			myalertbox('修改成功');
		}else{
			myalertbox('修改失败');
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
/*function subcommentform(){
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
		if(data == 'stopping'){
			myalertbox('请勿频繁操作');
			return;
		}
		if(data.error == 0){
			var thenum = $("#comnumber");
			if(!isNaN(thenum.text())){
				thenum.text(parseInt(thenum.text()) + 1);
			}
			$(".mypagestyle").parent().before("<li><dl class='set-fi-wy-lis fl'><dt><img style='border-radius:50%' src='"+data.comment.userhead+"' alt='' /></dt><dd><span class='fl bule'>"+data.comment.username+"</span><span class='fr l-gray'>"+data.comment.add_time+"</span><div class='fl pt10' style='width:605px;'>"+data.comment.content+"</div><p class='fr'><span class='fl red'><b>0</b>&nbsp;&nbsp;<img src='/Public/Home/images/images_115.jpg' onclick='giveup(this,"+data.comment.com_id+")' /></span></p></dd></dl></li>")
			myalertbox('评论成功');
		}else{
			myalertbox('评论失败');
		}
	})
}*/
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
//查询出指定博主的文章
function getarticles(url){
	$.get(url,function(data){
		if(data.error == 0){

			var articlehtml = "<p class='nhtt-tit fl'><img src='/Public/Home/images/images_159.jpg' alt='博文' /></p><ul class='set-lis_lb fl'>";
			for(var i in data.articlelist){
				articlehtml += "<li><p class='set-lis-wz fl'><a href='../art_id/"+data.articlelist[i].art_id+"'>"+data.articlelist[i].title+"</a></p><p class='set-lis-nr fl' style='width:100%'>"+data.articlelist[i].content+"</p><p class='set-lis-plgz fl  fs12'> "+data.articlelist[i].add_time+"</p><p class='set-lis-plgz fr fs12'><span class='pr15'><img src='/Public/Home/images/images_06.png' alt='' />"+data.articlelist[i].comments+"</span><span class='pr15 fl'><img src='/Public/Home/images/images_07.png' alt='' />"+data.articlelist[i].views+"</span></p></li>";
			}
			articlehtml += "</ul><ul id='breakpageul' class='page'>"+data.page+"</ul>";
			$('.set-lis-l').html(articlehtml);
		}
	})
}
//文章收藏
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
		}else if(data == 'noopen'){
			location.href="../../Mobile/Blog/openblog";
		}else{
			myalertbox('收藏失败');
		}
	})
}

