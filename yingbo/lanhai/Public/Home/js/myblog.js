var isopenclass = false;
var iscollect = false;
var iscommentmes = false;
var ismyarticles = false;
var ismycomments = false;
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
			myalertbox('请先登录','../../Home/User/login');
			return;
		}
		if(data == 'codeerror'){
			$("input[name='checkverify']").val('验证码不正确').addClass('red').attr('disabled',true);
			setTimeout(function(){$("input[name='checkverify']").val('').removeClass('red').attr('disabled',false);},1000);
			return;
		}
		if(data.error == 1){
			myalertbox('你已经开通过','../../Home/Blog/myblog');
		}else if(data.error == 2){
			myalertbox('开通博客失败');
		}else if(data.error == 0){
			var i = 3;
			$(".openblogerror").find('.fs16').text(i);
			$(".openblogerror").show().siblings('.logon').hide();
			var timeid = setInterval(function(){
				i--;
				if(i==0){
					clearInterval(timeid);
					location.href="../../Home/Blog/myblog";
				}else{
					$(".openblogerror").find('.fs16').text(i);
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
				articlehtml += "<li><p class='set-lis-wz fl'><a href='../../Home/Blog/detail/art_id/"+data.articlelist[i].art_id+"'>"+data.articlelist[i].title+"</a><a class='fr cancelcoll' style='height:40px;width:40px;background:url(/Public/Home/images/images_165.jpg) no-repeat center' href='../../Home/Blog/cancelcoll/art_id/"+data.articlelist[i].art_id+"'></a></p><p class='set-lis-nr fl' style='width:100%'>"+data.articlelist[i].content+"</p><p class='set-lis-plgz fl  fs12'> "+data.articlelist[i].add_time+"</p><p class='set-lis-plgz fr fs12'><span class='pr15'><img src='/Public/Home/images/images_06.png' alt='' />"+data.articlelist[i].comments+"</span><span class='pr15 fl'><img src='/Public/Home/images/images_07.png' alt='' />"+data.articlelist[i].views+"</span></p></li>";
			}
			articlehtml += "<li><ul class='page mypagestyle'>"+data.page+"</ul></li>";
			$("#blogtable").html(articlehtml);
			//取消收藏博文
			$("#blogtable").on('click','.cancelcoll',function(){
				var url = $(this).attr('href');
				var thisobj = $(this).parents('li');
				$.get(url,function(data){
					if(data == 'success'){
						thisobj.remove();
					}
				})
				return false;
			})
			

		}
		iscollect = true;
	})
}
//table切换
function changetable(){
	$(".core-tit li").click(function(){
        $(this).addClass('current').siblings().removeClass('current');
        $(".blogtable").eq($(this).index()).show().siblings(".blogtable").hide();
        if($(this).index() == 1){
			if(!ismyarticles){
				myarticles("../../Home/Blog/myarticles");
			}
		}else if($(this).index() == 2){
			if(!iscommentmes){
				commentme("../../Home/Blog/mycomments/comtype/1");
			}
		}else if($(this).index() == 3){
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
//切换到设置管理
function blogset(){
	$(".set-lis-l").eq(0).show().siblings(".set-lis-l").hide();
}
//切换到发博文
function sendbowen(){
	$(".set-lis-l").eq(1).show().siblings(".set-lis-l").hide();
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
			myalertbox('请先登录','../../Home/User/login');
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
			$("#classtable").append("<tr><td>"+$("input[name='class_name']").val()+"</td><td>"+0+"</td><td><a class='red' href='javascript:void(0)' classid='"+data.classid+"' class='delclass' onclick='delclass(this,"+data.classid+")'>删除</a></td></tr>");
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
	$.get('../../Home/Blog/delclass',{'class_id':classid},function(data){
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
	if(!checkcode($("input[name='checkverify']").val())){
		return false;
	}
	$.post('../../Home/Blog/createart',$("#articleform").serialize(),function(data){
		if(data == 'nologin'){
			myalertbox('请先登录','../../Home/User/login');
			return;
		}
		if(data.error == 'illegalword'){
			myalertmidbox(data.content);
			ue.setContent(data.result);
			return;
		}
		if(data == 'codeerror'){
			$("input[name='checkverify']").val('验证码不正确').addClass('red').attr('disabled',true);
			setTimeout(function(){$("input[name='checkverify']").val('').removeClass('red').attr('disabled',false);},1000);
			return;
		}
		if(data == 'stopping'){
			myalertbox('请勿频繁操作');
			return;
		}
		if(data.error == 0){
			$("input[name='title']").val('');
			$("input[name='checkverify']").val('');
			myalertbox('发表成功','../../Home/Blog/detail/art_id/'+data.art_id);
		}else{
			myalertbox('发表失败');
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
			ue.setContent(data.result);
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
			$(".set-fi-wy-lb").prepend("<li id='newcom'><dl class='set-fi-wy-lis fl'><dt><img style='border-radius:50%' src='"+data.comment.userhead+"' alt='' /></dt><dd><span class='fl bule'>"+data.comment.username+"</span><span class='fr l-gray'>"+data.comment.add_time+"</span><div class='fl pt10' style='width:605px;'>"+data.comment.content+"</div><p class='fr'><span class='fl red'><b>0</b>&nbsp;&nbsp;<img src='/Public/Home/images/images_115.jpg' onclick='giveup(this,"+data.comment.com_id+")' /></span></p></dd></dl></li>")
			ue.setContent('');
			myalertbox('评论成功');
		}else{
			myalertbox('评论失败');
		}
	})
}
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
			myalertbox('请先开通博客',"/index.php/Home/Blog/openblog");
		}else{
			myalertbox('收藏失败');
		}
	})
}
//查询我的文章
function myarticles(url,datas){
	/*if(typeof(datas) == 'undefined'){
		datas = {'datas':''};
	}*/
	$.get(url,datas,function(data){
		if(data.error == 0){

			var articlehtml = "";
			var page = '';
			for(var i in data.content){
				articlehtml += "<tr class='article-item'><td>"+data.content[i].title+"</td><td>"+data.content[i].add_time+"</td><td>"+data.content[i].views+"</td><td>"+data.content[i].comments+"</td><td id'brn'><a href='../../Home/Blog/editart/art_id/"+data.content[i].art_id+"' class='pr20 red'>编辑</a><a href='../../Home//Blog/delarticle/art_id/"+data.content[i].art_id+"' class='delarticle red'>删除</a></td></tr>";
			}
			page = "<div style='margin:0 auto' class='fl'><ul class='page mypagestyle'>"+data.page+"</ul></div>";
			$('.article-item').remove();
			$('.article-tit').after(articlehtml);
			$(".mypagestyle2").html(page);
			$(".mypagestyle2").on('click','a',function(){
				var url = $(this).attr('href');
				myarticles(url);
				return false;
			})
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
			myalertbox('请先登录','../../Home/User/login');
			return;
		}
		if(data.error == 'illegalword'){
			ue.setContent(data.result);
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
//评论列表切换
function changecom(){
	$('.comment-a').click(function(){
		$(this).addClass('bule').siblings('.comment-a').removeClass('bule');
		$('.comments-ul').eq($(this).index()).show().siblings('.comments-ul').hide();
		if($(this).index() == 1){
			if(!ismycomments){
				mycomments('../../Home/Blog/mycomments/comtype/2');
			}
		}
	})
}
//评论我的
function commentme(url){
	$.get(url,function(data){
		if(data.error == 0){
			var commentmehtml = '';
			for(var i in data.content){
				commentmehtml += "<li><dl class='tion fl pt15'><dt><a href='javascript:void(0)'><img src='"+data.content[i].userhead+"' alt='' /></a></dt><dd><p class='tion-wz fl pb10'><a class='fr delcom' href='../../Home/Blog/delcom/com_id/"+data.content[i].com_id+"'><img src='/Public/Home/images/images_165.jpg' /></a><span class='bule pr10'>"+data.content[i].username+"</span>评论<span class='bule pl10'><a href='../../Home/Blog/detail/art_id/"+data.content[i].art_id+"'>"+data.content[i].title+"</a></span></p><p class='set-lis-nr fl'>"+data.content[i].content+"</p><p class='set-lis-plgz fl  fs12'>"+data.content[i].add_time+"</p></dd></dl></li>";
			}
			commentmehtml += "<div style='margin:0 auto' class='fl'><ul class='page mypagestyle'>"+data.page+"</ul></div>";
			
			$('.comments-ul').eq(0).html(commentmehtml);
			$(".comments-ul").eq(0).on('click','.mypagestyle a',function(){
				var url = $(this).attr('href');
				commentme(url);
				return false;
			})
			$(".comments-ul").on('click','.delcom',function(){
				var url = $(this).attr('href');
				var thiobj = $(this).parents('li');
				$.get(url,function(data){
					if(data == 'success'){
						thiobj.remove();
					}
				})
				return false;
			})
		}
	})
}
//我评论的
function mycomments(url){
	$.get(url,function(data){
		if(data.error == 0){
			var mycommenthtml = '';
			for(var i in data.content){
				mycommenthtml += "<li><dl class='tion fl pt15'><dt><a style='display:inline-block;width:55px;height:55px' href='javascript:void(0)'></a></dt><dd><p class='tion-wz fl pb10'><span class='fr'><a class='delcom' href='../../Home/Blog/delcom/com_id/"+data.content[i].com_id+"'><img src='/Public/Home/images/images_165.jpg' /></a></span><span class='bule pr10'>评论</span></p><p class='set-lis-nr fl b-gray pt10 pl10 pb10' style='width:100%'><span class=''>&nbsp;<b class='bule'>"+data.content[i].username+"</b>&nbsp;的博文：</span><a href='../../Home/Blog/detail/art_id/"+data.content[i].art_id+"'>"+data.content[i].title+"</a></p><p class='set-lis-nr fl pb10'>"+data.content[i].content+"</p><p class='set-lis-plgz fl fs12 w100'>"+data.content[i].add_time+"</p></dd></dl></li>";
			}
			mycommenthtml += "<div style='margin:0 auto' class='fl'><ul class='page mypagestyle'>"+data.page+"</ul></div>";
			$('.comments-ul').eq(1).html(mycommenthtml);
			$(".comments-ul").eq(1).on('click','.mypagestyle a',function(){
				var url = $(this).attr('href');
				mycomments(url);
				return false;
			})
		}
	})
}


