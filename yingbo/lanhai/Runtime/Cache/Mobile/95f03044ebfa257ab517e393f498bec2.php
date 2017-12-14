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
  <script src="<?php echo (MJS_URL); ?>js.js"></script>
<link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<!--*****header*****-->
<header class="bb-b"> <a class="head_back1" href="Javascript:window.history.go(-1)">&nbsp;</a>
  <div class="headTit1">注册</div>
</header>

<!--*****header*****-->
<div class="main">
  <section>
    <div class="navbj fl">
      <form action="" method="post" id="regform">
        <ul class="log fl pb4" style="padding-bottom:2rem">
          <li><span class="red log-qz">*<img src="<?php echo (MIMG_URL); ?>tb_23.png"></span>
            <input type="text" name="username" onblur="checkname('/index.php/Mobile/User/checkname')" class="log-k w85" placeholder="请创建您的用户名（3位以上）" type="text">
          </li>
          <li><span class="red log-qz">*<img src="<?php echo (MIMG_URL); ?>tb_24.png"></span>
            <input type="password" name="password" onblur="checkpwd()" class="log-k w85" placeholder="请设置密码" type="text">
          </li>
          <li><span class="red log-qz">*<img src="<?php echo (MIMG_URL); ?>tb_27.png"></span>
            <input type="password" name="repwd" onblur="checkrepwd()" class="log-k w85" placeholder="请确认密码" type="text">
          </li>
          <li><span class="red log-qz">*<img src="<?php echo (MIMG_URL); ?>tb_28.png"></span>
            <input type="text" name="email" onblur="checkemail('/index.php/Mobile/User/checkemail')" class="log-k w85" placeholder="请输入您的邮箱" type="text">
          </li>
          <li><span class="red">*</span>
            <input type="text" name="verifycode" onblur="checkcode('/index.php/Mobile/User/checkcode')" class="log-k w30" placeholder="请输入验证码" type="text">
            <span class="log-yzm"><img style="height:3.1rem;width:auto;border:1px solid #ccc" onclick="this.src=this.src+'?'+Math.random()" src="/index.php/Mobile/User/verifyImg"></span> </li>
          <p class="log-an fl pb4" style="padding-bottom:0">
          <input style="vertical-align:middle" name="xieyi" type="checkbox"/>
          &nbsp;我同意网站<a href="/index.php/Mobile/Sysconfig/tiaokuan">《服务条款》</a></p>
          <p class="log-an fl">
            <button class="b-bule loginBtn fl white" id="regbtn" type="button">注册</button>
          </p>
        </ul>
		<div class="log-dlfs fl pb4">
          <p class="log-dlfs-b fl"><span class="log-dlfs-t">通过下列账号登录</span></p>

          <a href="/index.php/Home/User/otherlogin/type/Qq" class="fl log-dlfs-tb tar pr2 pt1"><img src="<?php echo (MIMG_URL); ?>tb_25.png"></a><a href="/index.php/Home/User/otherlogin/type/Weixin" class="fl log-dlfs-tb tal pl2 pt1"><img src="<?php echo (MIMG_URL); ?>tb_26.png"></a> </div>
      </form>
    </div>
  </section>

  <!--*****footer*****-->
  <footer>
    <p class="copyright">Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved.<br>
      蓝海长青 版权所有</p>
  </footer>
  <!--*****footer*****-->
</div>
<script src="<?php echo (MJS_URL); ?>jquery.hiSlider.min.js"></script>
<script>
	$('.hiSlider3').hiSlider({
		isFlexible: true,
		isSupportTouch: true,
		titleAttr: function(curIdx){
			return $('img', this).attr('alt');
		}
	});
</script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>register.js"></script>
</body>
</html>