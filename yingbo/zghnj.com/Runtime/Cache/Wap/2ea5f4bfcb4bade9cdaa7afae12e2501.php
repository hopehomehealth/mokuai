<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>中国缓粘结网</title>
    <meta name="keywords" content="中国缓粘结网">
    <meta name="description" content="中国缓粘结网">
    <script type="text/javascript" src="<?php echo (WJS_URL); ?>jquery-1.12.3.min.js"></script>
    <link href="<?php echo (WCSS_URL); ?>basic.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo (WCSS_URL); ?>style.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript">
    //     iphone 640px 设计图应用代码，所有长度px除以100加rem即可。
    var timer = null;
    // 事件监听
    if ('addEventListener' in document) {
        document.addEventListener('orientationchange', function () {
            setRem();
        }, false);
        window.addEventListener('resize', function () {
            setRem();
        }, false);
    }

    // 横竖屏时重新调整
    function setRem() {
        clearTimeout(timer);
        // 延迟屏幕横竖转换
        timer = setTimeout(function () {
            document.documentElement.style.fontSize = document.documentElement.clientWidth / 6.4 + 'px';
        }, 200);
    }

    document.documentElement.style.fontSize = document.documentElement.clientWidth / 6.4 + 'px';
</script>
</head>
<body>
<!--*****header*****-->
<div class="container b-white">
    <!--*****header*****-->
    <div class="main">
        <!--*****menu*****-->
        <div class="login">
            <section class="login-con" style="padding-top:0">
                <form action="" method="post">
                    <ul>
                        <li>
                            用户名：<?php echo ($_SESSION['user']['info']['username']); ?>
                        </li>
                        <input type="button" class="w100 login-an b-bule mt0-72" onclick="location.href='/index.php/Wap/User/logout'" value="退&nbsp;出">
                    </ul>
            </section>

        </div>
        <!--*****menuend*****-->
    </div>
</div>
<!--*****footer*****-->
	</div>
<!--*****footer*****-->
<footer>
    <ul>
        <li <?php if(CONTROLLER_NAME == 'Index'): ?>class="shou_a hover"<?php else: ?>class="shou"<?php endif; ?>><a href="/index.php/Wap/Index/index"><i>&nbsp;</i>首页</a></li>
        <li <?php if(CONTROLLER_NAME == 'News'): ?>class="news_a hover"<?php else: ?>class="news"<?php endif; ?>><a href="/index.php/Wap/News/industries"><i>&nbsp;</i>新闻资讯</a></li>
        <li <?php if(CONTROLLER_NAME == 'Exhibition'): ?>class="pro_a hover"<?php else: ?>class="pro"<?php endif; ?>><a href="/index.php/Wap/Exhibition/product"><i>&nbsp;</i>产品与服务</a></li>
        <li <?php if(CONTROLLER_NAME == 'User'): ?>class="man_a hover"<?php else: ?>class="man"<?php endif; ?>><a href="/index.php/Wap/User/ucenter"><i>&nbsp;</i>我</a></li>
    </ul>
</footer>
<!--*****footer*****-->
<script type="text/jscript" src="<?php echo (WJS_URL); ?>idangerous.swiper.min.js"></script>
<script src="<?php echo (WJS_URL); ?>index.js"></script>
<script src="<?php echo (WJS_URL); ?>layout.js"></script>
</body>
</html>

<!--*****footer*****-->
<script type="text/jscript" src="<?php echo (WJS_URL); ?>idangerous.swiper.min.js"></script>
<script src="<?php echo (WJS_URL); ?>index.js"></script>
</body>
</html>