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
            <form action="/index.php/Mobile/Patient/addCount" method="post" class="cash_z">
                    <div class="form1 cash">
                        <div class="borBot">
                            <span>账户类型：</span>
                            <select class="shenfen" name="count_type" style='font-size:0.875rem;margin-left:0.5rem' id="countType">
                                <option value='1'>支付宝</option>
                                <option value='2'>银行卡</option>
                            </select>
                        </div>
                        <div class="borBot pay-alipay">
                            <span>支付宝：</span>
                            <input name="count_no" type="text" placeholder="请输入支付宝账号">
                        </div>
                        <div class="borBot pay-bank">
                            <span>银行(名)：</span>
                            <input name="bankname" type="text" placeholder="请输入银行名">
                        </div>
                        <div class="borBot pay-bank">
                            <span>银行卡号：</span>
                            <input name="card_no" type="text" placeholder="请输入银行卡号">
                        </div>
                        <div class="borBot">
                            <span>收款姓名：</span>
                            <input name="count_name" type="text" placeholder="请输入账户名">
                        </div>            
                        <div class="cashBtnbox">
                            <button class="submit cashBtn" type="submit">确定添加</button>
                        </div>
                    </div>
               </form>
        </div>   
    </div>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(".pay-bank").css("display","none");
        $(function(){
            $("#countType").change(function(){
                if($(this).val() == '1'){
                    $(".pay-alipay").css("display","block");
                    $(".pay-bank").css("display","none");
                }else if($(this).val() == '2'){
                    $(".pay-alipay").css("display","none");
                    $(".pay-bank").css("display","block");
                }
            })
        })
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