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
            <ul class="pgxq_list">
                <li>
                <div class="wmc_list">
                  <p class="wmc_tp"><?php if($orderinfo["photo"] == ''): ?><img src="<?php echo (MBIMG_URL); ?>pgtu.jpg"><?php else: ?><img src="/Public/<?php echo ($orderinfo["photo"]); ?>"><?php endif; ?></p>
                  <p class="wmc_wz"><?php echo ($orderinfo["username"]); ?><span class="xinxin"><?php $__FOR_START_1287211356__=0;$__FOR_END_1287211356__=$orderinfo["credit"];for($i=$__FOR_START_1287211356__;$i < $__FOR_END_1287211356__;$i+=1){ ?><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><?php } ?></span><br>联系电话：<?php echo ($orderinfo["iphone"]); ?><br>联系地址：<?php echo ($orderinfo["area"]); ?></p>
                  <p class="jxs_hs gray"><?php echo (date("Y-m-d",$orderinfo["inputtime"])); ?></p>
                  </div>
                </li>
                 <li>
                 <p class="ywc_hs">患者自述</p>
 <p class="pgxq_con borTop"><?php echo ($orderinfo["casexl"]); ?></p>
                </li>
              <li>
                 <p class="ywc_hs">评估师记录（支付看更多评估结果）</p>
 <p class="pgxq_con borTop"><?php echo ($orderinfo["evaluate"]); ?></p>
                </li>
                <!--  <li>
                <p class="ywc_hs">评估报告</p>
                 <p class="pgxq_con borTop borBot">针对椎间盘突出、腰肌劳损、坐骨神经损伤等引起的腰背部腿部疼痛不适、活动受限等人群</p>
                  <ul class="ywc_list">
                  <li><span>1</span>已选服务时间/小时</li>
                  <li><span>2</span>已选服务次数</li>
                  </ul>
                                </li> -->
            </ul> 
            <?php if($orderinfo["if_say"] == '0'): ?><li><p class="zfan"><a href="/index.php/Mobile/Patient/payassess/orderid/<?php echo ($orderinfo["orderid"]); ?>">支&nbsp;付</a></p></li><?php endif; ?>
             <?php if(($orderinfo["if_say"] == '1') AND ($orderinfo["is_com"] == '0')): ?><li><p class="zfan"><a href="/index.php/Mobile/Patient/comment/orderid/<?php echo ($orderinfo["orderid"]); ?>">评&nbsp;价</a></p></li><?php endif; ?>
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