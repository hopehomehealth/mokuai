<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title><?php echo ($title); ?></title>
    <meta name="keywords" content="中国缓粘结网">
    <meta name="description" content="中国缓粘结网">
    <script type="text/javascript" src="<?php echo (WJS_URL); ?>jquery-1.12.3.min.js"></script>
    <link href="<?php echo (WCSS_URL); ?>basic.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo (WCSS_URL); ?>style.css" type="text/css" rel="stylesheet"/>
    <?php if(CONTROLLER_NAME == 'Index'): ?><script type="text/javascript">
        try {
        var urlhash = window.location.hash;
        var url= "/index.php/Home/Index/index";

        if (!urlhash.match("fromapp"))
        {
        if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i)))
        {
        }else{window.location=url;}
        }
        }
        catch(err)
        {
        }
      </script><?php endif; ?>
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
<header>
    <div class="fr">
        <span class="navico fr"></span>
        <span class="search"></span>
        <div class="search-con">
            <div class="search-con-a">
                <form method="GET" action="/index.php/Wap/Index/search">
                    <input class="search-input fl" type="text" name="keywords" value="<?php echo ($_GET['keywords']); ?>">
                    <input class="search-img fr" type="submit" value="">
                </form>
            </div>
        </div>
        <div class="nav clearfix navphone">
          <ul class="clearfix">
	<li>
		<h3 class="yjchan">
			<a href="http://www.zghnj.com/index.php/Wap/Index/index" class="cur">首页</a>
		</h3>
	</li>
	<li>
		<h3>
			<a>技术前沿</a>
			<span></span>
		</h3>
		<div class="navlist" style="display: none;">
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Technology/overview">技术概览</a>
				</h4>
			</div>
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Technology/academicForum">学术园地</a>
				</h4>
			</div>
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Technology/lectureRoom">大家讲堂</a>
				</h4>
			</div>
		</div>
	</li>
	<li>
		<h3>
			<a>新闻资讯</a>
			<span></span>
		</h3>
		<div class="navlist" style="display: none;">
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/News/industries">行业新闻</a>
				</h4>
			</div>
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/News/activities">行业活动</a>
				</h4>
			</div>
		</div>
	</li>
	<li>
		<h3>
			<a>产业发展</a>
			<span></span>
		</h3>
		<div class="navlist" style="display: none;">
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Develop/overview">产业概览</a>
				</h4>
			</div>
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Develop/material">工程材料与机具</a>
				</h4>
			</div>
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Develop/designer">工程设计与施工</a>
				</h4>
			</div>
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Develop/check">产品检验检测</a>
				</h4>
			</div>
		</div>
	</li>
	<li>
		<h3>
			<a>产品与服务</a>
			<span></span>
		</h3>
		<div class="navlist" style="display: none;">
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Exhibition/product">产品系列</a>
				</h4>
			</div>
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Exhibition/cases">应用案例</a>
				</h4>
			</div>
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Exhibition/customer">应用客户</a>
				</h4>
			</div>
		</div>
	</li>
	<li>
		<h3>
			<a>交流空间</a>
			<span></span>
		</h3>
		<div class="navlist" style="display: none;">
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Communicate/knowledge">常识解答</a>
				</h4>
			</div>
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Communicate/exclusive">会员专属</a>
				</h4>
			</div>
			<div class="navdrop">
				<h4>
					<a href="http://www.zghnj.com/index.php/Wap/Communicate/analysis">经典解析</a>
				</h4>
			</div>
		</div>
	</li>
	<li>
		<h3 class="yjchan">
			<a href="http://www.zghnj.com/index.php/Wap//" class="cur">网上商城</a>
		</h3>
	</li>

        </div>
    </div>
    <a class="logo fl" href="index.html"><img src="<?php echo (WIMG_URL); ?>logo.png" alt=""></a>
</header>
<!--*****header*****-->
<div class="main">
    <!--*****banner*****-->
    <div class="su-banner">
        <?php if(is_array($slides)): foreach($slides as $key=>$slide): ?><img src="<?php echo (substr($slide["picmobile"],1)); ?>" alt=""><?php endforeach; endif; ?>
    </div>
    <!--*****bannerend*****-->

    <!--*****menu*****-->
    <section class="su-menu-b b-white">
        <ul>
            <?php if(is_array($category)): foreach($category as $key=>$cateinfo): ?><li <?php if($detail['cat_id'] == $cateinfo['cat_id']): ?>class="cur"<?php endif; ?>><a href="/index.php/Wap/<?php echo ($cateinfo['ctrl']); ?>/<?php echo ($cateinfo['action']); ?>"><?php echo ($cateinfo["cat_name"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
    </section>
    <!--*****menuend*****-->
    <!--*****su-con*****-->
    <section class="su-con">
        <div class="su-fron">
            <div class="su-news-fina">
                <h1><?php echo ($detail["title"]); ?></h1>
                <p class="su-news-rq"><?php echo (date("Y年m月d日 i:s",$detail["upd_time"])); ?> <?php echo ($author); ?></p>
            </div>
            <?php echo ($detail["content"]); ?>

            <div class="su-news-sx">
                <?php if(!empty($prenews)): ?><p><a href="/index.php/Wap/News/detail/id/<?php echo ($prenews["news_id"]); ?>"><span class="c-blue">上一篇：</span><?php echo ($prenews["title"]); ?></a></p><?php endif; ?>
                <?php if(!empty($nextnews)): ?><p><a href="/index.php/Wap/News/detail/id/<?php echo ($nextnews["news_id"]); ?>"><span class="c-blue">下一篇：</span><?php echo ($nextnews["title"]); ?></a></p><?php endif; ?>
            </div>
        </div>

    </section>

    <!--*****su-conend*****-->
</div>
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