<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title><?php echo ($daohang["first"]); ?></title>
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
            <a href="/index.php/Mobile/<?php echo ($autoChange); ?>" class="headlogin"></a>
            <?php elseif($daohang["first"] != '乐护首页'): ?>
            <a href="Javascript:window.history.go(-1)" class="headBack"></a>
            <div class="headTit"><?php echo ($daohang["first"]); ?></div>
            <a href="/index.php/Mobile/<?php echo ($autoChange); ?>" class="headlogin"></a><?php endif; ?>
    </header>


    
        <div class="main">
            <div class="tuXTop">
                <span class="tuxiang" style="background-image:url(<?php echo ($info["photo"]); ?>)"></span>
            </div>
            <ul class="txNav">
                <li>
                    <a href="#" class="borRight">
                        <span style="color:#ff9900"><?php if($info["money"] == 0): ?>0.00<?php else: echo ($info["money"]); endif; ?><em>元</em></span>
                        <span>我的余额</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="borRight">
                        <span><?php if($info["unfinished"] == ''): ?>0<?php else: echo ($info["unfinished"]); endif; ?><em>个</em></span>
                        <span>未完成</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="borRight">
                        <span><?php if($info["finishing"] == ''): ?>0<?php else: echo ($info["finishing"]); endif; ?><em>个</em></span>
                        <span>进行中</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span><?php if($info["finished"] == ''): ?>0<?php else: echo ($info["finished"]); endif; ?><em>个</em></span>
                        <span>已完成</span>
                    </a>
                </li>
            </ul>
            <ul class="userList borBot">
                <li class="borTop">
                    <a href="/index.php/Mobile/Patient/allOrder">
                        <i class="ico"></i>
                        我的订单
                        <i class="moreUser"></i>
                    </a>
                </li>
            </ul>
            <ul class="userList borBot">
                <li class="borTop">
                    <a href="/index.php/Mobile/Patient/xinxi">
                        <i class="ico  ico_07"></i>
                        个人信息
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borTop">
                    <a href="/index.php/Mobile/Patient/pinglist">
                        <i class="ico ico_02"></i>
                        报告评估
                        <i class="moreUser"></i>
                    </a>
                </li>
            </ul>
            <ul class="userList borBot">
                <li class="borTop">
                    <a href="/index.php/Mobile/Patient/vip">
                        <i class="ico ico_06"></i>
                        成为VIP
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borTop">
                    <a href="/index.php/Mobile/Patient/recharge">
                        <i class="ico ico_03"></i>
                        充值 
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borTop">
                    <a href="/index.php/Mobile/Patient/cash">
                        <i class="ico ico_cash"></i>
                        提现 
                        <i class="moreUser"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="yuyueBox">
         <a href="/index.php/Mobile/Patient/yuyue"><button class="submit yuyueBtn">预约评估</button></a>
               <!-- <?php if($info['apointing'] == 1): ?><button class="submit yuyueBtn" disabled='disabled' id="apointment">预约成功</button>
               <?php else: ?>  -->
              <!--<?php endif; ?> -->
        </div>
        <script type="text/javascript">
            /*$(function(){
                $("#apointment").click(function(){
                    $.post("/index.php/Mobile/Patient/yuyue",{"qtype":"ajax"},function(data){
                        if(data.error == 1){

                        }else{
                            $("#apointment").text("预约成功");
                            $("#apointment").attr("disabled",true);
                        }
                    },"json");
                })
            })*/
        </script>
    </div>


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