<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title>蓝海长青</title>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>jquery-2.1.1.min.js"></script>

<link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<!--*****header*****-->
<header class="bb-b"> <a class="head_back1" href="Javascript:window.history.go(-1)">&nbsp;</a>
  <div class="headTit1">密码重置</div>
</header>

<!--*****header*****-->
<div class="main">
  <section>
    <div class="navbj fl">
      <form action="/index.php/Home/Email/uppassword" method="post" id="form">
        <ul class="log fl pb4">
          <li><span class="red log-qz">*<img src="<?php echo (MIMG_URL); ?>tb_24.png"></span>
            <input type="password" name="password" class="log-k w85" placeholder="请输入新密码" type="text">
          </li>
		  <li><span class="red log-qz">*<img src="<?php echo (MIMG_URL); ?>tb_27.png"></span>
            <input type="password" name="repassword" class="log-k w85" placeholder="请再次输入" type="text">
          </li>
          <p class="log-an fl">
            <button class="b-bule loginBtn fl white" id="subform" type="button">确认重置</button>
        </ul>
      </form>
    </div>
  </section>
</div>
<!--*****footer*****-->
<footer>
  <p class="copyright">Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved.<br>
    蓝海长青 版权所有</p>
</footer>
<!--*****footer*****-->
<script type="text/javascript" src="<?php echo (MJS_URL); ?>msgbox.js"></script>
<script type="text/javascript">
	$(function(){
		$("#subform").click(function(){
			$('#subform').attr('disabled',true);
			if($("input[name='password']").val() == ''){
				$('#subform').attr('disabled',false);
				$("input[name='password']").get(0).type='text';
				$("input[name='password']").val("请输入新密码");
				$("input[name='password']").css('color','red');
				$("input[name='password']").attr('readonly','readonly');
				setTimeout(function(){$("input[name='password']").val('');$("input[name='password']").get(0).type='password';$("input[name='password']").css('color','');$("input[name='password']").removeAttr('readonly')},2000);
				return false;
			}
			if($("input[name='repassword']").val() == ''){
				$('#subform').attr('disabled',false);
				$("input[name='repassword']").get(0).type='text';
				$("input[name='repassword']").val("请再次输入");
				$("input[name='repassword']").css('color','red');
				$("input[name='repassword']").attr('readonly','readonly');
				setTimeout(function(){$("input[name='repassword']").val('');$("input[name='repassword']").get(0).type='password';$("input[name='repassword']").css('color','');$("input[name='repassword']").removeAttr('readonly')},2000);
				return false;
			}
			if($("input[name='repassword']").val() != $("input[name='password']").val()){
				$('#subform').attr('disabled',false);
				$("input[name='repassword']").get(0).type='text';
				$("input[name='repassword']").val("确认密码错误");
				$("input[name='repassword']").css('color','red');
				$("input[name='repassword']").attr('readonly','readonly');
				setTimeout(function(){$("input[name='repassword']").val('');$("input[name='repassword']").get(0).type='password';$("input[name='repassword']").css('color','');$("input[name='repassword']").removeAttr('readonly')},2000);
				return false;
			}
			$.post($("#form").attr('action'),$("#form").serialize(),function(data){
				if(data.error == 0){
					myalertbox(data.content,'/index.php/Home/User/login');
				}else if(data.error == 1){
					$('#subform').attr('disabled',false);
					$("input[name='password']").get(0).type='text';
					$("input[name='password']").val(data.content);
					$("input[name='password']").css('color','red');
					$("input[name='password']").attr('readonly','readonly');
					setTimeout(function(){$("input[name='password']").val('');$("input[name='password']").get(0).type='password';$("input[name='password']").css('color','');$("input[name='password']").removeAttr('readonly')},2000);
				}else if(data.error == 2){
					$('#subform').attr('disabled',false);
					$("input[name='repassword']").get(0).type='text';
					$("input[name='repassword']").val(data.content);
					$("input[name='repassword']").css('color','red');
					$("input[name='repassword']").attr('readonly','readonly');
					setTimeout(function(){$("input[name='repassword']").val('');$("input[name='repassword']").get(0).type='password';$("input[name='repassword']").css('color','');$("input[name='repassword']").removeAttr('readonly')},2000);
				}else if(data.error == 3){
					myalertbox(data.content);
				}
			})
		})
	})
</script>
</body>
</html>