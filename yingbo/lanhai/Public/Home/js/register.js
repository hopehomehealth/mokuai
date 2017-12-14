var one = false;
var two = false;
var three = false;
var four = false;
var five = false;
function isemail(email){
	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/;
    return reg.test(email);
}
function checkname(url){
	var flag = true;
	var username = $("input[name='username']");
	if(username.val().length < 3){
		flag = false;
		username.next('span').text('不得小于3个字符').css('color','red');
		return flag;
	}/*else{
		username.next('span').text('用户名正确').css('color','green');
	}*/
	$.get(url,{"username":username.val()},function(data){
		if(data == 'error'){
			flag = false;
			username.next('span').text('用户名已存在').css('color','red');
			return flag;
		}else{
			flag = true;
			one = true;
			username.next('span').text('用户名可用').css('color','green');
		}
	});
	return flag;
}
function checkpwd(){
	var flag = true;
	var pwd = $("input[name='password']");
	if(pwd.val().length < 6){
		flag = false;
		pwd.next('span').text('最小长度为6个字符').css('color','red');
		return flag;
	}else{
		flag = true;
		two = true;
		pwd.next('span').text('密码正确').css('color','green');
		return flag;
	}
}
function checkrepwd(){
	var flag = true;
	var repwd = $("input[name='repwd']");
	var pwd = $("input[name='password']");
	if(pwd.val() != repwd.val()){
		flag = false;
		repwd.next('span').text('两次输入密码不一致').css('color','red');
		return flag;
	}else{
		if(pwd.val() != ''){
			flag = true;
			three = true;
			repwd.next('span').text('确认密码正确').css('color','green');
		}
		return flag;
	}
}
function checkemail(url){
	var flag = true;
	var email = $("input[name='email']");
	if(email.val().length == 0){
		flag = false;
		email.next('span').text('邮箱不能为空').css('color','red');
		return flag;
	}
	if(!isemail(email.val())){
		flag = false;
		email.next('span').text('邮箱格式不正确').css('color','red');
		return flag;
	}
	$.get(url,{"email":email.val()},function(data){
		if(data == 'error'){
			flag = false;
			email.next('span').text('邮箱已注册').css('color','red');
		}else{
			flag = true;
			four = true;
			email.next('span').text('邮箱正确').css('color','green');
		}
	});
	return flag;
}
function checkcode(url){
	var flag = true;
	var verifycode = $("input[name='verifycode']");
	if(verifycode.val() == ''){
		flag = false;
        verifycode.val("请输入验证码");
        verifycode.css('color','red');
        verifycode.attr('readonly','readonly');
        setTimeout(function(){verifycode.val('');verifycode.css('color','');verifycode.removeAttr('readonly')},1000);
	}else{
		flag = true;
		five = true;
		/*$.get(url,{"verifycode":verifycode.val()},function(data){
			if(data == 'error'){
				flag = false;
				verifycode.val('').attr('placeholder','验证码不正确').attr('disabled',true);
				setTimeout(function(){verifycode.attr('placeholder','').attr('disabled',false);},1000);
			}else{
				flag = true;
				five = true;
			}
		});*/
	}
	return flag;
}
function allcheck(){
	if(one && two && three && four && five){
		return true;
	}else{
		return false;
	}
}
//点击注册提交表单
$("#regbtn").click(function(){
	if(!$("input[name='xieyi']").prop('checked')){
		myalertbox('请阅读服务条款');
		return;
	}	
	if(!allcheck()){}else{
		$.post('../../Home/User/register',$("#regform").serialize(),function(data){
			if(data.error == 1){
				document.getElementById('codeimg').src = document.getElementById('codeimg').src+'?'+Math.random();
				myalertbox('注册失败');
			}else if(data.error == 2){
				$("input[name='verifycode']").val("验证码不正确");
		        $("input[name='verifycode']").css('color','red');
		        $("input[name='verifycode']").attr('readonly','readonly');
		        setTimeout(function(){$("input[name='verifycode']").val('');$("input[name='verifycode']").css('color','');$("input[name='verifycode']").removeAttr('readonly')},1000);
				document.getElementById('codeimg').src = document.getElementById('codeimg').src+'?'+Math.random();
			}else if(data.error == 0){
				myalertbox('注册成功','../../Home/User/login');
			}
		})
	}
});
//点击登陆提交表单
$("#loginbtn").click(function(){
	$("#loginbtn").attr('disabled',true);
	if($("input[name='username']").val() == ''){
		$("#loginbtn").attr('disabled',false);
        $("input[name='username']").val("用户名不能为空");
        $("input[name='username']").css('color','red');
        $("input[name='username']").attr('readonly','readonly');
        setTimeout(function(){$("input[name='username']").val('');$("input[name='username']").css('color','');$("input[name='username']").removeAttr('readonly')},1000);
		return false;
	}
	if($("input[name='password']").val() == ''){
		$("#loginbtn").attr('disabled',false);
		$("input[name='password']").get(0).type='text';
        $("input[name='password']").attr('readonly','readonly');
        $("input[name='password']").val('密码不能为空');
        $("input[name='password']").css('color','red');
        setTimeout(function(){$("input[name='password']").val('');$("input[name='password']").css('color','');$("input[name='password']").removeAttr('readonly');$("input[name='password']").get(0).type='password';$("input[name='password']").removeAttr('readonly')},1000);
		return false;
	}
	if(!five){
		return false;
	}
		$.post('../../Home/User/login',$("#loginform").serialize(),function(data){
			if(data.error != 0){
				document.getElementById('codeimg').src = document.getElementById('codeimg').src+'?'+Math.random()
			}
			if(data.error == 1){
				$("#loginbtn").attr('disabled',false);
				$("input[name='password']").get(0).type='text';
        		$("input[name='password']").attr('readonly','readonly');
        		$("input[name='password']").val('密码不正确');
        		$("input[name='password']").css('color','red');
        setTimeout(function(){$("input[name='password']").val('');$("input[name='password']").css('color','');$("input[name='password']").removeAttr('readonly');$("input[name='password']").get(0).type='password';$("input[name='password']").removeAttr('readonly')},1000);
			}else if(data.error == 2){
				$("#loginbtn").attr('disabled',false);
		        $("input[name='username']").val("用户不存在");
		        $("input[name='username']").css('color','red');
		        $("input[name='username']").attr('readonly','readonly');
		        setTimeout(function(){$("input[name='username']").val('');$("input[name='username']").css('color','');$("input[name='username']").removeAttr('readonly')},1000);
			}else if(data.error == 3){
				$("#loginbtn").attr('disabled',false);
		        $("input[name='verifycode']").val("验证码不正确");
		        $("input[name='verifycode']").css('color','red');
		        $("input[name='verifycode']").attr('readonly','readonly');
		        setTimeout(function(){$("input[name='verifycode']").val('');$("input[name='verifycode']").css('color','');$("input[name='verifycode']").removeAttr('readonly')},1000);
			}else if(data.error == 0){
				myalertbox('登录成功','../../Home/Bbs/index/lan_id/7');
			}
		})
})