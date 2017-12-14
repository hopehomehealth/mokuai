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
  <div class="headTit1">设置管理</div>
</header>

<!--*****header*****-->
<div class="main b-n">
  <!--*****for*****-->
  <section>
    <ul class="set-list fl">
      <li class="set-cd">
        <p class="fl w65"><span class="set-img fl"><img src="<?php echo (MIMG_URL); ?>tb_56.png"></span><span class="fl">账户管理</span> </p>
        <p class="fr per-sjia"><img src="<?php echo (MIMG_URL); ?>tb_46.png"></p>
      </li>
      <div class="set-szgl">
        <div class="set-con">
         <p class="set-tit c-bule">账号管理</p>
         <!-- <ul class="set-list-a fl">
         <li><p class="fl">已登录账号：<span>零度空间</span></p><p class="fr set-img-a"><img src="<?php echo (MIMG_URL); ?>tb_61.png"></p></li>
         <li><a href=""><p class="fl">添加账号</p> <p class="fr per-sjia"><img src="<?php echo (MIMG_URL); ?>tb_46.png"></p></a></li>
         </ul> -->
          <a href="/index.php/Mobile/User/logout" class="set-close" style="color:#af1e25;padding-top:6rem">退出当前账号</a> </div>
      </div>
      <li class="b-plain"><a href="/index.php/Mobile/User/modpsword">
        <p class="fl w65"><span class="set-img fl"><img src="<?php echo (MIMG_URL); ?>tb_57.png"></span><span class="fl">修改密码</span> </p>
        <p class="fr per-sjia"><img src="<?php echo (MIMG_URL); ?>tb_46.png"></p>
        </a></li>
      <!-- <li class="set-cdx">
        <p class="fl w65"><span class="set-img fl"><img src="<?php echo (MIMG_URL); ?>tb_58.png"></span><span class="fl">清除缓存</span> </p>
        <p class="fr per-sjia">（0MB）</p>
      </li>
       <div class="set-szglx">
        <div class="set-con">
         <p class="set-tit c-bule">清除缓存</p>
         <p class="set-tit">清除后，图片、视频等多媒体消息需要重新下载查看。确定清除？</p>
         <a href="" class="set-close-a fr c-bule">确定</a> <a href="#0" class="set-closex fr">取消</a> </div>
      </div>
      <li class="b-plain">
        <p class="fl w65"><span class="set-img fl"><img src="<?php echo (MIMG_URL); ?>tb_59.png"></span><span class="fl">夜间模式</span> </p>
        <p class="fr per-sjia1 w15"><img src="<?php echo (MIMG_URL); ?>images_27.jpg"></p>另一个<p class="fr per-sjia1 w15"><img src="<?php echo (MIMG_URL); ?>images_28.jpg"></p>
      </li> -->
      <!-- <li><a href="about.html">
        <p class="fl w65"><span class="set-img fl"><img src="<?php echo (MIMG_URL); ?>tb_60.png"></span><span class="fl">关于常青论坛</span> </p>
        <p class="fr per-sjia"><img src="<?php echo (MIMG_URL); ?>tb_46.png"></p>
        </a></li> -->
    </ul>
  </section>
</div>

<script type="text/javascript" src="<?php echo (MJS_URL); ?>js.js"></script>
</body>
</html>