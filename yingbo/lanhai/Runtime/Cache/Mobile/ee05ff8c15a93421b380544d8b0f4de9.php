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
  <div class="headTit1">我的积分</div>
   <a class="poi-head" href="/index.php/Mobile/User/rule">规则</a>
</header>

<!--*****header*****-->
<div class="main">
  <!--*****for*****-->
   <section>
<dl class="poi-img fl">
<dt><img src="<?php echo ($_SESSION['userInfo']['userhead']); ?>"></dt>
<dd><span class="fl">我的积分：</span><span class="fs3 fwb"><?php echo ($userdetail["score"]); ?></span></dd>
</dl>

<ul class="poi-list fl">
<li>
<dl class="poi-list-a fl"><dt><img src="<?php echo (MIMG_URL); ?>tb_48.png"></dt><dd>登录<br>
<span class="fs1-5 fwb"><?php echo ($userdetail["login"]); ?></span></dd></dl>
<dl class="poi-list-a fl"><dt><img src="<?php echo (MIMG_URL); ?>tb_49.png"></dt><dd>签到<br>
<span class="fs1-5 fwb"><?php echo ($userdetail["signature"]); ?></span></dd></dl>
</li>
<li>
<dl class="poi-list-a fl"><dt><img src="<?php echo (MIMG_URL); ?>tb_50.png"></dt><dd>发帖<br>
<span class="fs1-5 fwb"><?php echo ($userdetail["sendpost"]); ?></span></dd></dl>
<dl class="poi-list-a fl"><dt><img src="<?php echo (MIMG_URL); ?>tb_51.png"></dt><dd>回帖<br>
<span class="fs1-5 fwb"><?php echo ($userdetail["replypost"]); ?></span></dd></dl>
</li>
<li>
<dl class="poi-list-a fl"><dt><img src="<?php echo (MIMG_URL); ?>tb_52.png"></dt><dd>点赞<br>
<span class="fs1-5 fwb"><?php echo ($userdetail["giveup"]); ?></span></dd></dl>
<dl class="poi-list-a fl"><dt><img src="<?php echo (MIMG_URL); ?>tb_53.png"></dt><dd>博文<br>
<span class="fs1-5 fwb"><?php echo ($userdetail["sendart"]); ?></span></dd></dl>
</li>
<li>
<dl class="poi-list-a fl"><dt><img src="<?php echo (MIMG_URL); ?>tb_54.png"></dt><dd>评论<br>
<span class="fs1-5 fwb"><?php echo ($userdetail["comments"]); ?></span></dd></dl>
<dl class="poi-list-a fl"><dt><img src="<?php echo (MIMG_URL); ?>tb_55.png"></dt><dd>注册<br>
<span class="fs1-5 fwb"><?php echo ($userdetail["register"]); ?></span></dd></dl>
</li>
</ul>



  </section>

</div>
<script src="<?php echo (MJS_URL); ?>js.js"></script>
<script type="text/javascript">
        $(function(){
            $(".post li").click(function(){
                $(this).addClass("cur").siblings().removeClass("cur");
                $(".post-con").eq($(this).index()).addClass("cur").siblings().removeClass("cur");
            })
        })
    </script>
</body>
</html>