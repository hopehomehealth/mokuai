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
  <div class="headTit1">蓝海公约</div>
</header>

<!--*****header*****-->
<div class="main">
  <section style="height:auto;min-height:100%">
	<?php echo ($gongyue); ?>
  </section>
</div>
<!--*****footer*****-->
  <footer>
    <p class="copyright">Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved.<br>
      蓝海长青 版权所有</p>
  </footer>
<!--*****footer*****-->
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