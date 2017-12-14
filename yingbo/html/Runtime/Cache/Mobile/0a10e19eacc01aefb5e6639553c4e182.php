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
            <form action="/index.php/Mobile/User/login" method="post" class="login" id="form">
                    <div class="form">
                        <div class="borBot">
                            <input name="iphone" id="username" type="text" class="phone" value="" placeholder="请输入手机号">
                        </div>
                        <div class="borBot">
                            <input id="password" name="password" type="password" class="password" value="" placeholder="请输入密码">
                        </div>
                        <span class="forgetBox">
                            <!-- <a href="/fp" class="forget red">忘记密码？</a> -->
                        </span>
                        <div class="loginBtnBox">
                            <button class="submit loginBtn">登 录</button>
                            <a class="regiter loginBtn" href="/index.php/Mobile/User/register">注 册</a>
                        </div>
                    </div>
                    
               </form>
               <script type="text/javascript">
                  $(function(){
                        var flag=false;
                        $("#form").submit(function(){
                            $.post("/index.php/Mobile/User/dologin",$('#form').serialize(),function(data){
                                if(data.error == 1){
                                    flag = false;
                                    $("input[name='iphone']").val(data.content);
                                    $("input[name='iphone']").css('color','red');
                                    $("input[name='iphone']").attr('readonly','readonly');
                                    setTimeout(function(){$("input[name='iphone']").val('');$("input[name='iphone']").css('color','');$("input[name='iphone']").removeAttr('readonly')},1000);
                                    
                                }else if(data.error == 2){
                                    flag = false;
                                    $("input[name='password']").get(0).type='text';
                                    $("input[name='password']").attr('readonly','readonly');
                                    $("input[name='password']").val(data.content);
                                    $("input[name='password']").css('color','red');
                                    setTimeout(function(){$("input[name='password']").val('');$("input[name='password']").css('color','');$("input[name='password']").removeAttr('readonly');$("input[name='password']").get(0).type='password';$("input[name='password']").removeAttr('readonly')},1000);
                                    
                                }else if(data.error == 3){
                                    flag = false;
                                    $("input[name='password']").get(0).type='text';
                                    $("input[name='password']").attr('readonly','readonly');
                                    $("input[name='password']").val(data.content);
                                    $("input[name='password']").css('color','red');
                                    setTimeout(function(){$("input[name='password']").val('');$("input[name='password']").css('color','');$("input[name='password']").removeAttr('readonly');$("input[name='password']").get(0).type='password';$("input[name='password']").removeAttr('readonly')},1000);
                                    
                                }else if(data.error == 4){
                                    flag = false;
                                    $("input[name='iphone']").val(data.content);
                                    $("input[name='iphone']").css('color','red');
                                    $("input[name='iphone']").attr('readonly','readonly');
                                    setTimeout(function(){$("input[name='iphone']").val('');$("input[name='iphone']").css('color','');$("input[name='iphone']").removeAttr('readonly')},1000);
                                    
                                }else{
                                    flag = true;
                                }
                                if(flag == true){
                                    var myreg = /^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/i;
                                    if(myreg.test($("input[name='iphone']").val())){
                                        flag = true;
                                    }else{
                                        flag = false;
                                        $("input[name='iphone']").val("非法的手机号");
                                        $("input[name='iphone']").css('color','red');
                                        $("input[name='iphone']").attr('readonly','readonly');
                                        setTimeout(function(){$("input[name='iphone']").val('');$("input[name='iphone']").css('color','');$("input[name='iphone']").removeAttr('readonly')},1000);
                                    }
                                }
                            },false)
                            return flag;
                        })
                  })
                </script>
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