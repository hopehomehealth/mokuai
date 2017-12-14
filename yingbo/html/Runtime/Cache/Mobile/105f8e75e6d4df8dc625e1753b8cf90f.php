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
    <style>
       html body{
           color: #000000;
       }
        
    </style>
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
            <ul class="caseBox">
                <li class="pgdet">
                   <a href="#">
                        <?php echo ($orderinfo["china"]); ?>
                        <span>￥<?php echo ($orderinfo["price"]); ?>/小时</span>                      
                    </a>
                </li>
                <li>
                  进度
                  <div class="pgdet_jd borTop borBot">
                  <p <?php if(($suborderInfo["nurseid"] != '') and ($suborderInfo["status"] == '0')): ?>class="list"<?php endif; if(($suborderInfo["status"] == '1') and ($suborderInfo["is_com"] == '0')): ?>class="list1"<?php endif; if(($suborderInfo["status"] == '2') and ($suborderInfo["is_com"] == '0')): ?>class="list2"<?php endif; if($suborderInfo["is_com"] == 1): ?>class="list3"<?php endif; ?>></p>
                  <ul class="pgdet_list">
                  <li>已下单</li>
                  <li>今日护士</li>
                  <li>上门护理</li>
                  <li>护理结束</li>
                  <li>已评价</li>
                  </ul>
                  </div>
                   <ul class="pgdet_list1">
                   <li><span>1</span>已选服务时间/小时</li>
                   <li><span><?php echo ($orderinfo["number"]); ?></span>已选服务次数</li>
                   </ul>
                   <li>
                   订单信息
                   <ul class="pgdet_xq borTop">
                   <li>订单编号：<?php echo ($orderinfo["ordernumber"]); ?></li>
                   <li>下单时间：<?php echo (date("Y-m-d H:i:s",$orderinfo["inputtime"])); ?></li>
                   <li>订单总额：￥<?php echo ($orderinfo["ssum"]); ?></li>
                   </ul>
                   </li>
                   </li>
                   <?php if($orderinfo["if_say"] == '0'): ?><li><a href="/index.php/Mobile/Patient/payorder/orderid/<?php echo ($orderinfo["orderid"]); ?>"><button class="submit updateBtn">去支付</button></a></li>
                   <?php elseif(($orderinfo["if_say"] == '1') AND ($suborderInfo["status"] == '2') AND ($suborderInfo["if_nay"] == '0')): ?>
                    <li><a href="/index.php/Mobile/Patient/confirm/suborderid/<?php echo ($suborderInfo["orderid"]); ?>/orderid/<?php echo ($orderinfo["orderid"]); ?>"><button class="submit updateBtn">确认服务</button></a></li>
                   <?php elseif(($orderinfo["if_say"] == '1') AND ($suborderInfo["status"] == '2') AND ($suborderInfo["if_nay"] == '1') AND ($suborderInfo["is_com"] == '0')): ?>
                   <li><a href="/index.php/Mobile/Patient/comment/suborderid/<?php echo ($suborderInfo["orderid"]); ?>/orderid/<?php echo ($orderinfo["orderid"]); ?>"><button class="submit updateBtn">评价服务</button></a></li>
                   <?php else: endif; ?>
            </ul>
        </div>
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