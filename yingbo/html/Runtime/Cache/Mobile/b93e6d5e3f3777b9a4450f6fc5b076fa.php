<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>乐护首页 </title>
    <link rel="stylesheet" type="text/css" href="<?php echo (MBCSS_URL); ?>swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (MBCSS_URL); ?>reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (MBCSS_URL); ?>hzw-city-picker.css">
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>hzw-city-picker.min.js"></script>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>city-data.js"></script>
</head>
<body>
<div id="box" class="indexBox">
    <header>
        <?php if($daohang["first"] == '乐护首页'): ?><div class="headTit"><?php echo ($daohang["first"]); ?></div>
            <a href="<?php echo U('User/login');?>" class="headlogin"></a>
            <?php elseif($daohang["first"] != '乐护首页'): ?>
            <a href="Javascript:window.history.go(-1)" class="headBack"></a>
            <div class="headTit"><?php echo ($daohang["first"]); ?></div>
            <a href="<?php echo U('User/login');?>" class="headlogin"></a><?php endif; ?>
    </header>


            <div class="main">
            <div class="pgzx">
                <?php if(empty($info["photo"])): ?><span class="pgzx_tu" style="background-image:url(<?php echo (MBIMG_URL); ?>pgtu.jpg)"></span><?php endif; ?>
                <?php if(!empty($info["photo"])): ?><span class="pgzx_tu" style="background-image:url(/Public/<?php echo ($info["photo"]); ?>)"></span><?php endif; ?>
                <span class="pgzx_dh"><?php echo ($info["iphone"]); ?></span>
                <i class="moreUser1"></i>
            </div>
            <ul class="txNav">
                <li>
                    <a href="#" class="borRight">
                        <span><?php if($info["unfinished"] == ''): ?>0<?php else: echo ($info["unfinished"]); endif; ?><em>个</em></span>
                        <span>待评估</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="borRight">
                        <span><?php if($info["finishing"] == ''): ?>0<?php else: echo ($info["finishing"]); endif; ?><em>个</em></span>
                        <span>评估中</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span><?php if($info["finished"] == ''): ?>0<?php else: echo ($info["finished"]); endif; ?><em>个</em></span>
                        <span>已评估</span>
                    </a>
                </li>
            </ul>
            <ul class="userList borBot">
                <li class="borTop">
                    <a href="/index.php/Mobile/Assess/allOrder">
                        <i class="ico"></i>
                        我的订单
                        <i class="moreUser"></i>
                    </a>
                </li>
            </ul>
            <ul class="userList borBot">
                <li class="borTop">
                    <a href="/index.php/Mobile/Assess/xinxi">
                        <i class="ico  ico_07"></i>
                        个人信息
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borTop">
                    <a href="/index.php/Mobile/Assess/timetable">
                        <i class="ico ico_08"></i>
                        作息时间
                        <i class="moreUser"></i>
                    </a>
                </li>
            </ul>
            <ul class="userList borBot">
                <li class="borTop">
                    <a href="/index.php/Mobile/Assess/cash">
                        <i class="ico ico_cash"></i>
                        提现 
                        <i class="moreUser"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>base.js"></script>

    <div class="jy_footerBox">
        <ul>
            <li>
                <a href="<?php echo U('Index/index');?>">
                    <p <?php if(CONTROLLER_NAME == Index): ?>id="shou_x"<?php endif; ?> class="shou"></p>
                    首页
                </a>
            </li>
            <li>
                <a href="<?php echo U('Medical/medical');?>">
                    <p class="zhisi" <?php if(CONTROLLER_NAME == Medical): ?>id="zhisi_x"<?php endif; ?>></p>
                    知识
                </a>
            </li>
            <li>
                <a href="<?php echo U('Product/fuwu');?>">
                    <p class="fuwuk" <?php if(CONTROLLER_NAME == Product): ?>id="fuwuk_x"<?php endif; ?>></p>
                    服务
                </a>
            </li>
            <li>
                <a href="/index.php/Mobile/<?php echo ($autoChange); ?>">
                    <p class="wode" <?php if((CONTROLLER_NAME == Patient) OR (CONTROLLER_NAME == Assess) OR (CONTROLLER_NAME == Nurse) OR (CONTROLLER_NAME == User)): ?>id="wode_x"<?php endif; ?>></p>
                    我的
                </a>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript" src="<?php echo (MBJS_URL); ?>jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo (MBJS_URL); ?>base.js"></script>
<script type="text/javascript" src="<?php echo (MBJS_URL); ?>swiper.min.js"></script>
<script type="text/javascript">
    var mySwiper = new Swiper ('.banner', {
        pagination: '.swiper-pagination',
        autoplay : 3000,
        speed:500,
        loop:true,
        autoplayDisableOnInteraction : false
    });
</script>
</body>
</html>