var isgetposts = false;
var isfollow = false;
var iscollect = false;
var ismyscore = false;
//我的收藏
function mycollect(url){

}
//我的帖子
function myposts(url){
	$.get(url,function(data){
		if(data.error == 0){
			var posthtml = '';
			for(var i in data.postlist){
				var poststatus = '';
				if(data.postlist[i].sort == 3){
					poststatus = "<span class='zhiding'>置顶</span>";
				}else if(data.postlist[i].sort == 2){
					poststatus = "<span class='jinghua'>精华</span>";
				}else if(data.postlist[i].sort == 1){
					poststatus = "<span class='xintie'>新帖</span>";
				}else{
					poststatus = "<span class='putong'>普通</span>";
				}
				posthtml +="<li><p class='set-lis-wz fl'><a href='../../Home/Posts/detail/post_id/"+data.postlist[i].post_id+"'>"+poststatus+"&nbsp;"+data.postlist[i].topic+"</a></p><p class='set-lis-nr fl'><div>"+data.postlist[i].body+"</div></p><p class='set-lis-plgz fl  fs12'>"+data.postlist[i].ctime+"</p><p class='set-lis-plgz fr fs12'><span class='pr15'><img src='/Public/Home/images/images_06.png' alt='' />"+data.postlist[i].replys+"</span><span class='pr15 fl'><img src='/Public/Home/images/images_07.png' alt='' />"+data.postlist[i].views+"</span></p></li>";
			}
			posthtml += "<li><ul class='page mypagestyle'>"+data.page+"</ul></li>";
			$('#myposts-list').html(posthtml);
			isgetposts = true;
		}
	})
}
//我的收藏
function mycollect(url){
	$.get(url,function(data){
		if(data.error == 0){
			var posthtml = '';
			for(var i in data.mycollect){
				var poststatus = '';
				if(data.mycollect[i].sort == 3){
					poststatus = "<span class='zhiding'>置顶</span>";
				}else if(data.mycollect[i].sort == 2){
					poststatus = "<span class='jinghua'>精华</span>";
				}else if(data.mycollect[i].sort == 1){
					poststatus = "<span class='xintie'>新帖</span>";
				}else{
					poststatus = "<span class='putong'>普通</span>";
				}
				posthtml +="<li><p class='set-lis-wz fl'><a href='../../Home/Posts/detail/post_id/"+data.mycollect[i].post_id+"'>"+poststatus+"&nbsp;"+data.mycollect[i].topic+"</a><a class='fr cancelcoll' style='height:40px;width:40px;background:url(/Public/Home/images/images_165.jpg) no-repeat center' href='../../Home/Posts/cancelcoll/post_id/"+data.mycollect[i].post_id+"'></a></p><p class='set-lis-nr fl'><div>"+data.mycollect[i].body+"</div></p><p class='set-lis-plgz fl  fs12'><span class='pr15 bule'>"+data.mycollect[i].username+"</span>"+data.mycollect[i].ctime+"</p><p class='set-lis-plgz fr fs12'><span class='pr15'><img src='/Public/Home/images/images_06.png' alt='' />"+data.mycollect[i].replys+"</span><span class='pr15 fl'><img src='/Public/Home/images/images_07.png' alt='' />"+data.mycollect[i].views+"</span></p></li>";
			}
			posthtml += "<li><ul class='page mypagestyle'>"+data.page+"</ul></li>";
			$('#mycollect-list').html(posthtml);
			iscollect = true;
			//取消收藏帖子
			$("#mycollect-list").on('click','.cancelcoll',function(){
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
	})
}
//我的关注
function myfollows(url){
	$.get(url,function(data){
		if(data.error == 0){
			var posthtml = '';
			//var url = '../../Home/User/nofollow/f_id/';
			for(var i in data.myfollows){
				posthtml +="<li style='width:365px'><dl class='fol fl pt15'><dt><a href='../../Home/Famous/slanders2/f_id/"+data.myfollows[i].f_id+"'><img src='"+data.myfollows[i].f_photo+"' alt='' /></a></dt><dd><a href='../../Home/Famous/slanders2/f_id/"+data.myfollows[i].f_id+"'>"+data.myfollows[i].f_name+"</a><br /><p class='l-gray fs12 fl'><img src='/Public/Home/images/images_92.jpg' alt='' />&nbsp;"+data.myfollows[i].f_province+"</p><p class='fs12 fl'><span class='l-gray'>&nbsp;&nbsp;文章：</span>"+data.myfollows[i].f_artnums+" <span class='l-gray pl20'>粉丝：</span>"+data.myfollows[i].f_fans+"</p><p class='fl pt22'><a href='javascript:void(0)' onclick='nofollow(this,\"../../Home/User/nofollow/f_id/"+data.myfollows[i].f_id+"\")'><img src='/Public/Home/images/images_152.jpg' alt='' /></a></p></dd></dl></li>";
			}
			posthtml += "<li><ul class='page mypagestyle'>"+data.page+"</ul></li>";
			$('#myfollows-list').html(posthtml);
			isfollow = true;
		}
	})
}
//我的积分
function myscore(){
	$.post('../../Home/User/myscore',function(data){
		if(data.error == 0){
			var rulehtml = '';
			for(var i in data.rulelist){
				rulehtml += "<tr><td>"+data.rulelist[i].opname+"</td><td>"+data.rulelist[i].cycle+"</td><td>"+data.rulelist[i].counts+"</td><td>"+data.rulelist[i].number+"</td></tr>";
			}
			$("#tit-scorerule").after(rulehtml);
			ismyscore = true;
		}
	})
}
//计算字符串长度
function getstrlen(val){
	var len = 0;
	for (var i = 0; i < val.length; i++) {
		if (val[i].match(/[^\x00-\xff]/ig) != null){  //全角
			len += 3;
		}
		else{
			len += 1;
		}
	}
	return len;
}
//table切换
function changetable(){
	$(".core-tit li").click(function(){
		if($(this).index()+1 == $(".core-tit li").length){
			return;
		}
        $(this).addClass('current').siblings().removeClass('current');
        $(".usertable").eq($(this).index()).show().siblings(".usertable").hide();
        if($(this).index() == 5){
        	if(!isfollow){
        		myfollows('../../Home/User/myfollows');
        		$("#myfollows-list").on('click','.page a',function(){
	              //alert(111);
	                var url = $(this).attr("href");
	                myfollows(url);
	                return false;  //让a标签不能跳转
	            })
        	}
        }else if($(this).index() == 4){
	      	if(!isgetposts){
	      		myposts('../../Home/User/myposts');
	      		$("#myposts-list").on('click','.page a',function(){
	              //alert(111);
	                var url = $(this).attr("href");
	                myposts(url);
	                return false;  //让a标签不能跳转
	            })
	      	}
        }else if($(this).index() == 3){
        	if(!iscollect){
        		mycollect('../../Home/User/mycollect');
	      		$("#mycollect-list").on('click','.page a',function(){
	              //alert(111);
	                var url = $(this).attr("href");
	                mycollect(url);
	                return false;  //让a标签不能跳转
	            })
        	}
        }else if($(this).index() == 2){
        	if(!ismyscore){
        		myscore();
        	}
        }
    })
}
//切换到编辑用户图像
function userheadedit(){
	$(".userheadedit").show().siblings('.usertable').hide();
	$(".core-tit li").removeClass('current');
}
//切换到编辑用户资料
function userdataedit(){
	$(".core-tit li").eq(0).addClass('current').siblings().removeClass('current');
	$(".usertable").eq(0).show().siblings('.usertable').hide();
}
//检查个性签名长度
function checkmysign(val){
	var len = getstrlen(val);
	if(len > 60){
		$("input[name='mysign']").next('span').addClass('red');
		return false;
	}else{
		$("input[name='mysign']").next('span').removeClass('red');
	}
	return true;
}
//检查用户名长度
/*function checknamelen(val){
	alert(val)
	var len = getstrlen(val);
	if(len > 24){
		$("input[name='username']").next('span').text('用户名过长');
		return false;
	}else{
		$("input[name='username']").next('span').text('');
	}
	return true;
}*/

function subziliaoform(){
	if(!checkmysign($("input[name='mysign']").val())){
		return true;
	}
	/*if(!checknamelen($("input[name='username']").val())){
		return true;
	}*/
	$.post('../../Home/User/upd',$("#udataform").serialize(),function(data){
		if(data.error == 0){
			myalertbox('资料修改成功');
		}else{
			myalertbox('资料修改失败');
		}
	})
}
//图片上传预览
function setImagePreview(avalue) {
  var docObj=document.getElementById("selectpic");
   
  var imgObjPreview=document.getElementById("preview");
  if(docObj.files &&docObj.files[0])
  {
  //火狐下，直接设img属性
  imgObjPreview.style.display = 'block';
  imgObjPreview.style.width = '168px';
  imgObjPreview.style.height = '168px'; 
  //imgObjPreview.src = docObj.files[0].getAsDataURL();
   
  //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
  imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
  }
  else
  {
  //IE下，使用滤镜
  docObj.select();
  var imgSrc = document.selection.createRange().text;
  var localImagId = document.getElementById("localImag");
  //必须设置初始大小
  localImagId.style.width = "168px";
  localImagId.style.height = "168px";
  //图片异常的捕捉，防止用户修改后缀来伪造图片
  try{
  localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
  localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
  }
  catch(e)
  {
  alert("您上传的图片格式不正确，请重新选择!");
  return false;
  }
  imgObjPreview.style.display = 'none';
  document.selection.empty();
  }
  return true;
}
//ajax上传
function edituserhead(){
	$("#editimgform").ajaxSubmit({
		type:'post',
		url:'../../Home/User/edituserhead',
		success:function(data){
			if(data.error == 0){
				$("#rightuserhead").attr('src',data.userhead);
				myalertbox('图像修改成功');
			}
			if(data.error == 1){
				myalertbox('图像修改失败');
			}

		},
		error:function(XmlHttpRequest,textStatus,errorThrown){
			console.log(XmlHttpRequest);
			console.log(textStatus);
			console.log(errorThrown);
		}
	});
}
//检查密码
function checkoldpwd(val){
	if(val == ''){
		$("input[name='oldpwd']").val('请输入旧密码').addClass('red').attr('disabled',true);
		$("input[name='oldpwd']").get(0).type="text";
		setTimeout(function(){$("input[name='oldpwd']").val('').removeClass('red').attr('disabled',false);$("input[name='oldpwd']").get(0).type="password";},1000);
		return false;
	}
	return true;
}
function checknewpwd(val){
	if(val == ''){
		$("input[name='newpwd']").val('新密码不能为空').addClass('red').attr('disabled',true);
		$("input[name='newpwd']").get(0).type="text";
		setTimeout(function(){$("input[name='newpwd']").val('').removeClass('red').attr('disabled',false);$("input[name='newpwd']").get(0).type="password";},1000);
		return false;
	}
	return true;
}
function checkrenewpwd(val){
	if(val == ''){
		$("input[name='renewpwd']").val('确认密码不能为空').addClass('red').attr('disabled',true);
		$("input[name='renewpwd']").get(0).type="text";
		setTimeout(function(){$("input[name='renewpwd']").val('').removeClass('red').attr('disabled',false);$("input[name='renewpwd']").get(0).type="password";},1000);
		return false;
	}else{
		if(val != $("input[name='newpwd']").val()){
			$("input[name='renewpwd']").val('确认密码不正确').addClass('red').attr('disabled',true);
			$("input[name='renewpwd']").get(0).type="text";
			setTimeout(function(){$("input[name='renewpwd']").val('').removeClass('red').attr('disabled',false);$("input[name='renewpwd']").get(0).type="password";},1000);
			return false;
		}
	}
	return true;
}
//提交修改密码表单
function subnewpwdform(){
	if(!checkoldpwd($("input[name='oldpwd']").val())){
		return false;
	}
	if(!checknewpwd($("input[name='newpwd']").val())){
		return false;
	}
	if(!checkrenewpwd($("input[name='renewpwd']").val())){
		return false;
	}
	$.post($("#modpwdform").attr('action'),$("#modpwdform").serialize(),function(data){
		if(data.error == 0){
			myalertbox('密码重置成功','../../Home/User/login');
		}else if(data.error == 1){
			$("input[name='oldpwd']").val('原密码不正确').addClass('red').attr('disabled',true);
			$("input[name='oldpwd']").get(0).type="text";
			setTimeout(function(){$("input[name='oldpwd']").val('').removeClass('red').attr('disabled',false);$("input[name='oldpwd']").get(0).type="password";},1000);
		}else{
			myalertbox('密码重置失败');
		}
	})
}