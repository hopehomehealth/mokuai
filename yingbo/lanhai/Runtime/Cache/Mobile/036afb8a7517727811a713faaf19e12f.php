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
  <div class="headTit1">修改密码</div>
</header>

<!--*****header*****-->
<div class="main">
  <section>
    <div class="navbj fl">
      <form action="/index.php/Mobile/User/modpsword" method="post" id="modpwdform">
        <ul class="log fl pb4">
          <li><span class="red log-qz">*<img src="<?php echo (MIMG_URL); ?>tb_24.png"></span>
            <input name="oldpwd" class="log-k w85" placeholder="请输入您的原密码" onblur="checkoldpwd(this.value)" type="password" <?php if($userinfo["openid"] != ''): ?>disabled=true<?php endif; ?>>
          </li>
          <li><span class="red log-qz">*<img src="<?php echo (MIMG_URL); ?>tb_27.png"></span>
            <input name="newpwd" class="log-k w85" placeholder="请输入您的新密码" onblur="checknewpwd(this.value)" type="password" <?php if($userinfo["openid"] != ''): ?>disabled=true<?php endif; ?>>
          </li>
          <li><span class="red log-qz">*<img src="<?php echo (MIMG_URL); ?>tb_24.png"></span>
            <input name="renewpwd" class="log-k w85" placeholder="请再次确认您的新密码" onblur="checkrenewpwd(this.value)" type="password" <?php if($userinfo["openid"] != ''): ?>disabled=true<?php endif; ?>>
          </li>
		  <?php if($userinfo["openid"] == ''): ?><p class="log-an fl pb12">
            <button class="b-bule loginBtn fl white" id="subaplay" onclick="subnewpwdform()" type="button">提交</button>
          </p>
      <?php else: ?>
          <p style="color:red">
            （快捷登录不可操作）
          </p><?php endif; ?>
        </ul>
      </form>
    </div>
  </section>


</div>
<script src="<?php echo (MJS_URL); ?>jquery.hiSlider.min.js"></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src='<?php echo (HJS_URL); ?>ucenter.js' ></script>
<script>
	$('.hiSlider3').hiSlider({
		isFlexible: true,
		isSupportTouch: true,
		titleAttr: function(curIdx){
			return $('img', this).attr('alt');
		}
	});
</script>
</body>
</html>