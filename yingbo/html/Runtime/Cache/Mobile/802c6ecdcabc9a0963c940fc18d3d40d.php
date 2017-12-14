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


    ﻿    <div id="box">
        <div class="main">
            <ul class="caseBox">
                <li>
                订单信息
                   <ul class="pgdet_xq borTop">
                   <li>订单编号：<?php echo ($orderinfo["ordernumber"]); ?></li>
                   <li>下单时间：<?php echo (date("Y-m-d H:i:s",$orderinfo["inputtime"])); ?></li>
                   </ul>
                </li>
                <li class="pgdet">
                   <a href="#">
                        <?php echo ($orderinfo["china"]); ?>
                        <span>￥<?php echo ($orderinfo["price"]); ?>/小时</span>                      
                    </a>
                </li>
                <li class="pgdet">
                   <a href="#">
                        已选服务次数
                        <span><?php echo ($orderinfo["number"]); ?></span>                      
                    </a>
                </li>
                <li class="pgdet">
                   <a href="#">
                        总额
                        <span>￥<?php echo ($orderinfo["ssum"]); ?></span>                      
                    </a>
                </li>
                <form method="get" id="payform" action="">
                <li class="pgdet">
                  <label>支付方式</label>
                  <label>
                   &nbsp;&nbsp;&nbsp;<input type="radio" name="payType" value="balance" checked />
                   余额支付&nbsp;&nbsp;&nbsp;</label>
                   <?php if(is_array($payList)): foreach($payList as $key=>$payinfo): ?><label>
                   <input type="radio" name="payType" value="<?php echo ($payinfo["type"]); ?>"  />
                   <?php echo ($payinfo["name"]); ?>&nbsp;&nbsp;&nbsp;</label><?php endforeach; endif; ?>
                   <label>     
                </li>
                <?php if($orderinfo["if_say"] == '0'): ?><input type="hidden" name="orderid" value="<?php echo ($orderinfo["orderid"]); ?>">
                  <input type="hidden" name="china" value="<?php echo ($orderinfo["china"]); ?>">
                  <li><button class="submit updateBtn" type="submit">立即支付</button></li><?php endif; ?>
               </form>
            </ul> 
        </div>
        <script type="text/javascript">
           $(function(){
              var url="/index.php/Mobile/Balance/pay";
              var payType="balance";
              var flag = true;
              $("#payform input[name=payType]").click(function(){

                if($(this).val() == 'wxpay'){
                  $('#payform button').unbind("click")
                  payType = 'wxpay';
                  url="/index.php/Mobile/Wxpay/js_api_call";
                  flag = true;
                  $("#payform").submit(function(){
                    return flag;
                  })
                }else if($(this).val() == "baidu"){
                  $('#payform button').unbind("click")
                  payType = 'baidu';
                  url="/index.php/Mobile/Baidu/pay";
                   flag = true;
                  $("#payform").submit(function(){
                    return flag;
                  })
                }else if($(this).val() == "balance"){
                  $('#payform button').unbind("click")
                  payType = 'balance';
                  url ="/index.php/Mobile/Balance/pay";
                  flag = false;
                  $("#payform").submit(function(){
                  return flag;
                  })
                  var parameters = $('#payform').serialize();
                  $("#payform button").click(function(){
                      if(confirm("确认支付")){
                      }else{
                        return false;
                      }
                      $.post(url,parameters,function(data){
                        if(data.error == 1){
                          alert(data.content);
                        }else{
                          alert(data.content);
                          location.href=data.url;
                          $("#payform button").parent().css("display","none");
                        }
                      },"json",false);
                  })
                }else{
                  url="";
                }
                if(url == ""){
                }else{
                  //$("#payform button").attr("disabled",false);
                  $("#payform").attr("action",url);
                }
              })
              if(payType == "balance"){
                flag = false;
                $("#payform").submit(function(){
                  return flag;
                  })
                var parameters = $('#payform').serialize();
                $("#payform button").click(function(){
                    if(confirm("确认支付")){
                      }else{
                        return false;
                      }
                    $.post(url,parameters,function(data){
                      if(data.error == 1){
                        alert(data.content);
                      }else{
                        alert(data.content);
                        location.href=data.url;
                        $("#payform button").parent().css("display","none");
                      }
                    },"json",false);
                })
              }
           })
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