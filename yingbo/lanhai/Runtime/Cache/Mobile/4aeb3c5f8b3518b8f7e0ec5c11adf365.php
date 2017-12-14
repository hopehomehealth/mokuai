<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>开通博客</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="<?php echo (MCSS_URL); ?>basic.css"/>
    <link rel="stylesheet" href="<?php echo (MCSS_URL); ?>style.css"/>
    <!--[if lt IE 9]>
    　　<script src="js/html5shiv.js"></script>
    　　<script src="js/respond.js"></script>
    <![endif]-->
</head>
<body>
<header class="bb-b"> <a class="head_back1" href="Javascript:window.history.go(-1)">&nbsp;</a>
    <div class="headTit1">开通博客</div>
</header>
<div class="main"> 
<article class='openblogform'>
    <form action="/index.php/Mobile/Blog/openblog" class="open_2" method="post" id="openblogform">
        <p class="fs24 openp_1 w100"><span class="w25 fl">博客名称：</span>
            <input name="blog_name" type="text" onblur="checkblogname(this.value)" placeholder="您输入博客名称" class="w65 webkitinput"></p>
        <p class="fs24 openp_2 w100"><span class="w25 fl">博客简介：</span>
            <textarea class="w65 fl" name="blog_desc" style="resize: none;outline:none" onblur="checkblogdesc(this.value)" placeholder="输入简单介绍" webkitinput></textarea></p>
        <p class="fs24 openp_3 w100"><span class="w25"> &nbsp;&nbsp;&nbsp;&nbsp;验证码：</span>
            <input type="text" name="checkverify" onblur="checkcode(this.value)" class="w30 webkitinput">
        <p class="fs24 openp_3 w100"><span class="w25"> &nbsp;&nbsp;&nbsp;&nbsp;</span>
            <img style="height:3.1rem;width:auto;border:1px solid #ccc" id="codeimg" src="/index.php/Mobile/Blog/VerifyImg" onclick="this.src=this.src+'?'+Math.random()"> <a href="javascript:void(0)" onclick="document.getElementById('codeimg').src = document.getElementById('codeimg').src+'?'+Math.random()">看不清</a></p>
        <button type="button" class="openk w100" onclick="subblogform()">开通</button>
    </form>
</article>
<article class="openblogstatus" style="display:none">
    <div class="loding">
      <p>您已成功开通个人博客！<a href="">进入博客</a>
          <span id="kkk" class="blue"></span>秒后自动进入个人博客页面！</p>
    </div>
</article>
</div>
<!-- <script>
    var t = 6;
    function showTime(){
        t -= 1;
        document.getElementById('kkk').innerHTML= t;
        if(t==0){
            location.href='myblog.html';
        }
        setTimeout("showTime()",1000);
    }
    showTime();
</script> -->
</body>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>myblog.js"></script>
</html>