var isgetposts = false;
var isfollow = false;
var iscollect = false;
var ismyscore = false;
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
				posthtml +="<li><p class='set-lis-wz fl'><a href='../../Home/Posts/detail/post_id/"+data.postlist[i].post_id+"'>"+poststatus+"&nbsp;"+data.postlist[i].topic+"</a></p><p class='set-lis-nr fl'>"+data.postlist[i].body+"</p><p class='set-lis-plgz fl  fs12'>"+data.postlist[i].ctime+"</p><p class='set-lis-plgz fr fs12'><span class='pr15'><img src='/Public/Home/images/images_06.png' alt='' />"+data.postlist[i].comments+"</span><span class='pr15 fl'><img src='/Public/Home/images/images_07.png' alt='' />"+data.postlist[i].views+"</span></p></li>";
			}
			posthtml += "<li><ul class='page mypagestyle'>"+data.page+"</ul></li>";
			$('#myposts-list').html(posthtml);
			isgetposts = true;
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
        if($(this).index() == 4){
	      	if(!isgetposts){
	      		myposts('../../Home/User/myposts');
	      		$("#myposts-list").on('click','.page a',function(){
	              //alert(111);
	                var url = $(this).attr("href");
	                myposts(url);
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
	$("#form").submit();
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
			myalertbox('密码重置成功','../../Mobile/User/login');
		}else if(data.error == 1){
			$("input[name='oldpwd']").val('原密码不正确').addClass('red').attr('disabled',true);
			$("input[name='oldpwd']").get(0).type="text";
			setTimeout(function(){$("input[name='oldpwd']").val('').removeClass('red').attr('disabled',false);$("input[name='oldpwd']").get(0).type="password";},1000);
		}else{
			myalertbox('密码重置失败');
		}
	})
}