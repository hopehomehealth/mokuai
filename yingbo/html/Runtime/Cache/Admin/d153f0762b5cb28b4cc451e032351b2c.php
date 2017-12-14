<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>乐护后台登录</title>
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>reset.css">
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>dl-dl.css">
    <style>
        #box {
            width: 1440px;
            height: 349px;
            margin: 10px auto;
            overflow: hidden;
            position: relative;

        }

        #box ul {
            width: 5760px;
            height: 349px;
            position: absolute;
            left: 0;
            top: 0;
        }

        #box ul li {
            float: left;
            width: 1440px;
            height: 349px;
        }
    </style>
</head>
<body>
<div class="con">
    <div class="nav">
        <ul>
            <li class="logo2"><img src="<?php echo (IMG_URL); ?>logo2.gif"></li>
        </ul>
    </div>
    <div id="box">
        <ul>
            <li>
                <img src="<?php echo (IMG_URL); ?>banner.gif"/>
            </li>
            <li>
                <img src="<?php echo (IMG_URL); ?>banner.gif"/>
            </li>
            <li>
                <img src="<?php echo (IMG_URL); ?>banner.gif"/>
            </li>
            <li>
                <img src="<?php echo (IMG_URL); ?>banner.gif"/>
            </li>
        </ul>
    </div>
    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
    <script language="JavaScript" type="text/javascript" src="<?php echo (HJS_URL); ?>FormValid.js"></script>
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
                乐护总后台登录
            </h2>
            <p>用户名：
                <input name="admin_name" id="admin_name" class="kuang w150" type="text" valid='required' errmsg="姓名必填"/>
            </p>
            <p>密&nbsp&nbsp&nbsp码：
                <input name="admin_pwd" id="admin_pwd" class="kuang w150" type="password" valid='required' errmsg="密码必填"/>
            </p>
            <button type="submit" value="登录" onclick="login()">登录</button>
            <!--<a onclick="form_submit()">登陆</a>-->
            <!--<h3><a>代理商登陆></a></h3>-->
        </div>
    </form>








    <div class="footer">
        <ul>
            <li>乐护服务平台　|</li>
            <li>北京市朝阳区光华路甲8号和乔大厦C座806 </li>
            <!--<li>放入收藏夹 |</li>-->
            <!--<li>免责声明 |</li>-->
        </ul>
        <br/>
        <p>Copyright @2015 www.ew9t.cn All Right Reserved.　版权所有 京ICP备16032945号</p>
    </div>

</div>

<script src="<?php echo (JS_URL); ?>jquery-1.8.3.min.js"></script>
<script>
    $(function () {
        var i = 0,
                len = $("#box ul li").length,
                W = $("#box ul li").width();
        //j = $(this).index();
        //var o = $("#box ol li").length;
        //console.log(o)
        //自动轮播
        function autoPlay() {
            i++;
            if (i > $("#box ul li").length - 1) {
                i = 0;
            }
            $("#box ul").stop().animate({
                "marginLeft": -W
            }, 600, function () {
                $("#box ul li").first().appendTo($("#box ul"));
                $(this).css(
                        "marginLeft", "0"
                );

            });
            $("#box ol li").eq(i).addClass("bg").siblings().removeClass();
        }
        timer = setInterval(autoPlay, 1500)
        //鼠标滑过盒子
        $("#box").on("mouseover", function () {
            clearInterval(timer);
            $("span").show();
        }).on("mouseout", function () {
            timer = setInterval(autoPlay, 1500);
            $("span").hide();
        })
        //鼠标点击上下键
        $(".right").on("click", function () {
            autoPlay();
        })
        $(".left").on("click", function () {
            i--;
            if (i < 0) {
                i = $("#box ul li").length - 1;
            }
            $("#box ul li").last().prependTo("#box ul");
            $("#box ul").css({
                "marginLeft": -W
            });
            $("#box ul").stop().animate({
                "marginLeft": "0"
            }, 600);
            $("#box ol li").eq(i).addClass("bg").siblings().removeClass();
        })
        //点击按钮与图片相对应
        $("#box ol li").on("mouseover", function () {
            $("#box ul").stop().animate({
                marginLeft: -W* $(this).index()
            }, 600);
            $("#box ol li").eq($(this).index()).addClass("bg").siblings().removeClass("bg");
            i = $(this).index();
        })
    })



</script>

</body>
</html>