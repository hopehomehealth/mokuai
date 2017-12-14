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


    <!-- <!DOCTYPE html>
 <html>
 <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <title>微信安全支付</title>
    <head> -->
    <div class="main">
       <span style="float:left;height:2rem;line-height:2rem;margin-left: 0.875rem;width:100%;color: #636363;font-size: 1.2rem;"><b style="color:black">交易类型：</b>订单支付</span>
       <span style="float:left;height:2rem;line-height:2rem;margin-left: 0.875rem;width:100%;color: #636363;font-size: 1.2rem;"><b style="color:black">支付方式：</b>微信支付</span>
       <span style="float:left;height:2rem;line-height:2rem;margin-left: 0.875rem;width:100%;color: #636363;font-size: 1.2rem;"><b style="color:black">订单编号：</b><?php echo ($orderinfo["ordernumber"]); ?></span>
       <span style="float:left;height:2rem;line-height:2rem;margin-left: 0.875rem;width:100%;color: #636363;font-size: 1.2rem;"><b style="color:black">订单总额：</b>￥<?php echo ($orderinfo["ssum"]); ?></span>
    </div>
    <script type="text/javascript">
        //调用微信JS api 支付
        function jsApiCall()
        {
                //var code="<?php echo ($code); ?>";
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                <?php echo $jsApiParameters; ?>,
                function(res){
                    if(res.err_msg == "get_brand_wcpay_request:ok" ) {
                        location.href="<?php echo $return_url?>";
                    } else {
                        alert('支付失败');
                        history.go(-1);
                    }
                    // WeixinJSBridge.log(res.err_msg);
                    // alert(res.err_code+res.err_desc+res.err_msg);
                    //  window.location.href="/Mobile/Wxpay/notifyf";
                    //alert("<?php echo ($jsApiParameters); ?>");
                }
            );
        }
        // function callpay()
        // {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        // }
    </script>
   <!--  </head> -->
<!--  <body>
    </br></br></br></br>
    <div align="center">
        <button style="width:210px; height:30px; background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" >立即支付</button>
    </div>
 </body> -->
 </html>

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