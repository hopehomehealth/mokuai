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

<body class="b-bule" style="position:relative">
<!--*****header*****-->
<header class="bb-b"> <a class="head_back1" href="javascript:void(0)">&nbsp;</a>
  <div class="headTit1">邀请好友</div>
</header>

<!--*****header*****-->
<div class="main b-n">
  <!--*****for*****-->
   <section>
<div class="inv-con fl">
<p class="inv-img fl"><img src="<?php echo (MIMG_URL); ?>images_49.png"></p>
<p class="inv-img fl" style="display:block;margin:0 auto;width:100%;"><img src="<?php echo (HIMG_URL); ?>inviteregqr.png"></p>
<p class="tac fs1-5 w100 fl">面对面邀请好友</p>
<p class="inv-aoq b-bule w100 fl"><a href="javascript:void(0)" class="sharetoweixin">分享给好友</a></p>
</div>
  </section>

</div>
<div class="sharetoweixin2" style="position:fixed;background:rgba(0,0,0,0.5);top:0;left:0;opacity:0.9;display:none;width:100%;height:100%">
	<div class="closeshare" style="margin:6rem auto;width:20rem;height:4rem;line-height:4rem;color:orange;text-align:center;border:2px solid orange;border-radius:2rem 2rem;font-size:2.5rem">点击右上角分享</div>
	<div class="closeshare" style="margin:6rem auto;width:15rem;height:4rem;line-height:4rem;color:white;text-align:center;border:2px solid white;border-radius:2rem 2rem;font-size:2.5rem">我 知 道 了</div>
</div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>share.js"></script>
<script type="text/javascript">
        $(function(){
            $(".post li").click(function(){
                $(this).addClass("cur").siblings().removeClass("cur");
                $(".post-con").eq($(this).index()).addClass("cur").siblings().removeClass("cur");
            })
			var signPackage = <?php echo ($signPackage); ?>;//签名数据包
			var shareData = <?php echo ($shareData); ?>;//分享信息
			loadshare(signPackage,shareData);
		})
</script>
</body>
</html>