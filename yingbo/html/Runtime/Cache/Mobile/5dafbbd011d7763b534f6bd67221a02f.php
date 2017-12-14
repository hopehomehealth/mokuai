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
            <form action="/index.php/Mobile/Patient/recharge" id="recharge-form" method="post" class="cash_z">
                    <div class="form1 cash">
                        <div class="borBot">
                            <span>充值金额(元)：</span>
                            <input name="amount" id="input-amount" type="text" placeholder="请输入金额">
                        </div>
                        <div class="cashBtnbox">
                            <button class="submit cashBtn" type="submit">提&nbsp;交</button>
                        </div>
                    </div>
            </form>
        </div>   
    </div>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#recharge-form").submit(function(){
                var amount = $("input[name='amount']").val();
                //alert(amount);
                var newamount = '';
                if(isNaN(amount)){
                    amount = '0.00';
                }else{
                    amount = Math.abs(amount)+'';
                    if(amount.indexOf('.') == -1){
                        amount += '.00'; 
                    }else{
                        for(var i=0;i<amount.length;i++){
                            newamount += amount[i];
                            if(amount[i] == '.'){
                                if(typeof(amount[i+1]) == 'undefined'){
                                    newamount += '0';
                                    break;
                                }else{
                                    newamount += amount[i+1];
                                }
                                if(typeof(amount[i+2]) == 'undefined'){
                                    newamount += '0';
                                }else{
                                    newamount += amount[i+2];
                                }
                                break;
                            }
                                //newamount += newamount; 
                        }
                        amount = newamount;
                    }
                }
                $("input[name='amount']").val(amount);
                //alert($("input[name='balance']").val());
                if($("#input-amount").val() == '0.00'){
                    $("#input-amount").val("请输入金额");
                    $("#input-amount").attr('readonly','readonly');
                    $("#input-amount").css('color','red');
                    setTimeout(function(){
                        $("#input-amount").val("");
                        $("#input-amount").removeAttr('readonly');
                        $("#input-amount").css('color','');
                    },1300);
                    return false;
                }else{
                    $("#recharge-form button").attr("disabled",true);
                    $("#recharge-form button").css("background","#ccc");
                    return true;
                }
            })
        })
      /* window.onload=function(){ 

        var userName="xiaoming"; 

        alert(userName); 
      } */
    </script>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>/base.js"></script>



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