<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>中国缓粘结网</title>
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>reset.css">
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>dl-dl.css">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        #banner_list{
            width:100%;
            height:400px;
            overflow: hidden;
            margin: 0 auto;
        }
        #banner_list .box a{
            display: block;
            width:100%;
            height:400px;
        }
        #box img{
            width:100%;
            height:400px;
        }
    </style>
</head>
<body>
<div class="con">
    <div class="nav">
        <ul>

            <li class="logo2"><img src="<?php echo (IMG_URL); ?>logo.jpg" style="width: 51px;height: 51px;"></li>


        </ul>
    </div>
    <div id="banner">
        <div id="banner_list">
            <div class="box">
                <a href="#" target="_blank"><img src="<?php echo (IMG_URL); ?>banner.jpg" title="" alt="" style="width:100%;height: 100%;"/></a>
                <a href="#" target="_blank"><img src="<?php echo (IMG_URL); ?>banner1.jpg" title="" alt="" style="width:100%;height: 100%;" /></a>
                <a href="#" target="_blank"><img src="<?php echo (IMG_URL); ?>banner2.jpg" title="" alt="" style="width:100%;height: 100%;"/></a>
                <a href="#" target="_blank"><img src="<?php echo (IMG_URL); ?>banner3.jpg" title="" alt="" style="width:100%;height: 100%;"/></a>
            </div>
        </div>
    </div>
    <script language="JavaScript" type="text/javascript" src="<?php echo (JS_URL); ?>FormValid.js"></script>
    <script type="text/javascript">
        function customFuntion(inp,frms) {

            if (inp.value || frms['sj'].value) {
                return true;
            }
            return false;
        }
    </script>

    <form name="login" action="" method="post" onsubmit="return validator(this)">
        <div class="dl">
            <h2>
                中国缓粘结网后台登录
            </h2>
            <p>用户名：
                <input name="username" id="admin_name" class="kuang w150" type="text" valid='required' errmsg="用户名必填"/>
            </p>
            <p>密&nbsp;&nbsp;&nbsp;码：
                <input name="password" id="admin_pwd" class="kuang w150" type="password" valid='required' errmsg="密码必填"/>
            </p>


            <input id="submit" name="submit" value="登录" class="btn btn-primary btn-lg" onclick="login()" type="submit"/>
        </div>
    </form>
    <div class="footer">
        <ul style="width: 500px;">
            <li>中国缓粘结网后台管理平台　|</li>
            <li>北京市石景山区实兴大街30号院 </li>
        </ul>
        <br/>
        <p>Copyright @2016 www.xnytx369.com All Right Reserved.　版权所有 京ICP备16032945号</p>
    </div>


</div>

<script src="<?php echo (JS_URL); ?>jquery-2.1.3.min.js"></script>
<script type="text/javascript">
    var w=400;
    var s=0;
    function autoPlay(){
        s++;
        if(s>3){
            s=0
        }

        $(".box").animate({"marginTop":-w*s+"px"},1000);
        ;
    }
    setInterval(autoPlay,3000)
</script>

</body>
</html>