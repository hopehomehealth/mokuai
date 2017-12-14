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
<div class="main">
    <!--*****banner*****-->
    <div class="wwindexbanner swiper-container-horizontal">
        <ul class="swiper-wrapper clearfix">
            <?php if(is_array($slides)): foreach($slides as $key=>$slide): ?><li class="swiper-slide"><a href="<?php echo ((isset($slide["url"]) && ($slide["url"] !== ""))?($slide["url"]):'#'); ?>"> <img src="<?php echo (substr($slide["picmobile"],1)); ?>" alt=""/></a></li><?php endforeach; endif; ?>
        </ul>
        <div class="wwindexbannerbtn"></div>
    </div>
    <!--*****bannerend*****-->

    <!--*****menu*****-->
    <section class="menu">
        <ul>
            <li>
                <?php if(is_array($category)): foreach($category as $key=>$info): if($info["cat_id"] == 1): ?><a href="/index.php/Wap/Technology/overview">
                        <dl class="menu-list">
                            <dt><img src="<?php echo (WIMG_URL); ?>jsqy.png" alt=""></dt>
                            <dd>
                                <h3>技术前沿</h3>高效 智能 环保
                            </dd>
                        </dl>
                    </a><?php endif; endforeach; endif; ?>
                <?php if(is_array($category)): foreach($category as $key=>$info): if($info["cat_id"] == 8): ?><a href="/index.php/Wap/Develop/overview">
                        <dl class="menu-list">
                            <dt><img src="<?php echo (WIMG_URL); ?>cyfz.png" alt=""></dt>
                            <dd>
                                <h3>产业发展</h3>高效 智能 环保
                            </dd>
                        </dl>
                    </a><?php endif; endforeach; endif; ?>
            </li>
            <li>
                <?php if(is_array($category)): foreach($category as $key=>$info): if($info["cat_id"] == 13): ?><a href="/index.php/Wap/Exhibition/product">
                        <dl class="menu-list">
                            <dt><img src="<?php echo (WIMG_URL); ?>cpfw.png" alt=""></dt>
                            <dd>
                                <h3>产品与服务</h3>高效 智能 环保
                            </dd>
                        </dl>
                    </a><?php endif; endforeach; endif; ?>
                <?php if(is_array($category)): foreach($category as $key=>$info): if($info["cat_id"] == 21): ?><a href="<?php echo ((isset($info["href"]) && ($info["href"] !== ""))?($info["href"]):'#'); ?>">
                        <dl class="menu-list">
                            <dt><img src="<?php echo (WIMG_URL); ?>shop.png" alt=""></dt>
                            <dd>
                                <h3>网上商城</h3>高效 智能 环保
                            </dd>
                        </dl>
                    </a><?php endif; endforeach; endif; ?>
            </li>
            <li>
                <?php if(is_array($category)): foreach($category as $key=>$info): if($info["cat_id"] == 18): ?><a href="/index.php/Wap/Communicate/knowledge">
                        <dl class="menu-list">
                            <dt><img src="<?php echo (WIMG_URL); ?>jlkj.png" alt=""></dt>
                            <dd>
                                <h3>交流空间</h3>高效 智能 环保
                            </dd>
                        </dl>
                    </a><?php endif; endforeach; endif; ?>
                <?php if(is_array($category)): foreach($category as $key=>$info): if($info["cat_id"] == 5): ?><a href="/index.php/Wap/News/industries">
                        <dl class="menu-list">
                            <dt><img src="<?php echo (WIMG_URL); ?>news.png" alt=""></dt>
                            <dd>
                                <h3>新闻资讯</h3>高效 智能 环保
                            </dd>
                        </dl>
                    </a><?php endif; endforeach; endif; ?>
            </li>
        </ul>
    </section>
    <!--*****menuend*****-->
</div>

</div>
<div class="tan">
  <div class="login-con login">
      <form action="" method="post" id="loginform">
          <ul>
            <li>
                <input name="username" type="text" class="login-input" value="" placeholder="请输入用户名" />
            </li>
            <li>
                <input name="password" type="password" class="login-input" value="" placeholder="请输入密码" />
            </li>
                <input type="button" id="loginbtn" class="login-an b-bule mt0-72" value="登&nbsp;录">
                <p class="login-sm tac">您还不是会员，请点击<span class="login-sma">注册</span></p>
          </ul>
      </form>
  </div>
  <div class="login-con register">
      <form action="" method="post" id="regform">
          <ul>
            <li>
                <input name="username" type="text" class="login-input" value="" placeholder="请输入用户名" />
            </li>
            <li>
                <input name="password" type="password" class="login-input" value="" placeholder="请输入密码" />
            </li>
            <li>
                <input name="repassword" type="password" class="login-input" value="" placeholder="请确认密码" />
            </li>
            <span class="login-sm"><span class="register-xz fl inputlabel"></span><span class="inputlabel">同意中国缓粘结网</span><a href="/index.php/Wap/User/protocol" style="color:#207f9c;cursor:pointer">《用户使用协议》</a></span>
            <input type="checkbox" style="display:none" name="isallow" value="1">
            <input type="button" id="regbtn" class="login-an b-bule mt0-36" value="注&nbsp;册">
          </ul>
      </form>
  </div>
</div>
<!--*****footer*****-->
<!--<footer>-->
    <!--<ul>-->
        <!--<li <?php if(CONTROLLER_NAME == 'Index'): ?>class="shou_a hover"<?php else: ?>class="shou"<?php endif; ?>><a href="/index.php/Wap/Index/index"><i>&nbsp;</i>首页</a></li>-->
        <!--<li <?php if(CONTROLLER_NAME == 'News'): ?>class="news_a hover"<?php else: ?>class="news"<?php endif; ?>><a href="/index.php/Wap/News/industries"><i>&nbsp;</i>新闻资讯</a></li>-->
        <!--<li <?php if(CONTROLLER_NAME == 'Exhibition'): ?>class="pro_a hover"<?php else: ?>class="pro"<?php endif; ?>><a href="/index.php/Wap/Exhibition/product"><i>&nbsp;</i>产品与服务</a></li>-->
        <!--<li <?php if(CONTROLLER_NAME == 'User'): ?>class="man_a hover"<?php else: ?>class="man"<?php endif; ?>><a href="/index.php/Wap/User/ucenter"><i>&nbsp;</i>我</a></li>-->
    <!--</ul>-->
<!--</footer>-->
<!--*****footer*****-->

<script type="text/jscript" src="<?php echo (WJS_URL); ?>idangerous.swiper.min.js"></script>
<script src="<?php echo (WJS_URL); ?>index.js"></script>
<script src="<?php echo (WJS_URL); ?>layout.js"></script>
<script>
    $(function(){
        var _get_login = "<?php echo isset($_GET['login'])?1:0;?>";
        var _loginstatus  = "<?php echo isset($_SESSION['loginstatus'])?1:0;?>";
        if((_get_login == '1') && (_loginstatus == 0)){
          $(".tan").show();
        }
        $(".login-sma").click(function () {
            $(".login").hide().siblings(".register").show();
        });
        $("#loginbtn").click(function(){
            $("#loginbtn").attr('disabled',true);
            var username = $("#loginform").find("input[name='username']").val();
            var password = $("#loginform").find("input[name='password']").val();
            if (username == '') {
              $("#loginbtn").attr('disabled',false);
              $("#loginform").find("input[name='username']").val("请输入用户名");
              $("#loginform").find("input[name='username']").css('color','red');
              $("#loginform").find("input[name='username']").attr('readonly','readonly');
              setTimeout(function(){$("#loginform").find("input[name='username']").val('');$("#loginform").find("input[name='username']").css('color','');$("#loginform").find("input[name='username']").removeAttr('readonly')},1000);
              return false;
            }
            if (password == '') {
              $("#loginbtn").attr('disabled',false);
              $("#loginform").find("input[name='password']").get(0).type='text';
              $("#loginform").find("input[name='password']").attr('readonly','readonly');
              $("#loginform").find("input[name='password']").val('请输入密码');
              $("#loginform").find("input[name='password']").css('color','red');
              setTimeout(function(){$("#loginform").find("input[name='password']").val('');$("#loginform").find("input[name='password']").css('color','');$("#loginform").find("input[name='password']").removeAttr('readonly');$("#loginform").find("input[name='password']").get(0).type='password';$("#loginform").find("input[name='password']").removeAttr('readonly')},1000);
              return false;
            }
            $.post("/index.php/Wap/User/login",$("#loginform").serialize(),function(data){
                if(data.error == 0){
                    location.href="<?php echo ((isset($_SESSION['user']['redirect']) && ($_SESSION['user']['redirect'] !== ""))?($_SESSION['user']['redirect']):'/index.php/Wap/Index/index'); ?>";
                }else if(data.error == 1){
                    $("#loginbtn").attr('disabled',false);
                    $("#loginform").find("input[name='username']").val(data.errmsg);
                    $("#loginform").find("input[name='username']").css('color','red');
                    $("#loginform").find("input[name='username']").attr('readonly','readonly');
                    setTimeout(function(){$("#loginform").find("input[name='username']").val('');$("#loginform").find("input[name='username']").css('color','');$("#loginform").find("input[name='username']").removeAttr('readonly')},1000);
                }else if(data.error == 2){
                    $("#loginbtn").attr('disabled',false);
                    $("#loginform").find("input[name='password']").get(0).type='text';
                    $("#loginform").find("input[name='password']").css('color','red');
                    $("#loginform").find("input[name='password']").attr('readonly','readonly');
                    $("#loginform").find("input[name='password']").val(data.errmsg);
                    
                    setTimeout(function(){$("#loginform").find("input[name='password']").val('');$("#loginform").find("input[name='password']").css('color','');$("#loginform").find("input[name='password']").removeAttr('readonly');$("#loginform").find("input[name='password']").get(0).type='password';$("#loginform").find("input[name='password']").removeAttr('readonly')},1000);
                }
            })
        })
        $("#regbtn").click(function(){
            $("#regbtn").attr('disabled',true);
            var username = $("#regform").find("input[name='username']").val();
            var password = $("#regform").find("input[name='password']").val();
            var repassword = $("#regform").find("input[name='repassword']").val();
            if (username == '') {
              $("#regbtn").attr('disabled',false);
              $("#regform").find("input[name='username']").val("请输入用户名");
              $("#regform").find("input[name='username']").css('color','red');
              $("#regform").find("input[name='username']").attr('readonly','readonly');
              setTimeout(function(){$("#regform").find("input[name='username']").val('');$("#regform").find("input[name='username']").css('color','');$("#regform").find("input[name='username']").removeAttr('readonly')},1000);
              return false;
            }
            if (password == '') {
              $("#regbtn").attr('disabled',false);
              $("#regform").find("input[name='password']").get(0).type='text';
              $("#regform").find("input[name='password']").attr('readonly','readonly');
              $("#regform").find("input[name='password']").val('请输入密码');
              $("#regform").find("input[name='password']").css('color','red');
              setTimeout(function(){$("#regform").find("input[name='password']").val('');$("#regform").find("input[name='password']").css('color','');$("#regform").find("input[name='password']").removeAttr('readonly');$("#regform").find("input[name='password']").get(0).type='password';$("#regform").find("input[name='password']").removeAttr('readonly')},1000);
              return false;
            }
            if (repassword == '') {
              $("#regbtn").attr('disabled',false);
              $("#regform").find("input[name='repassword']").get(0).type='text';
              $("#regform").find("input[name='repassword']").attr('readonly','readonly');
              $("#regform").find("input[name='repassword']").val('请确认密码');
              $("#regform").find("input[name='repassword']").css('color','red');
              setTimeout(function(){$("#regform").find("input[name='repassword']").val('');$("#regform").find("input[name='repassword']").css('color','');$("#regform").find("input[name='repassword']").removeAttr('readonly');$("#regform").find("input[name='repassword']").get(0).type='password';$("#regform").find("input[name='repassword']").removeAttr('readonly')},1000);
              return false;
            }
            if(password != repassword){
              $("#regbtn").attr('disabled',false);
              $("#regform").find("input[name='repassword']").get(0).type='text';
              $("#regform").find("input[name='repassword']").attr('readonly','readonly');
              $("#regform").find("input[name='repassword']").val('确认密码错误');
              $("#regform").find("input[name='repassword']").css('color','red');
              setTimeout(function(){$("#regform").find("input[name='repassword']").val('');$("#regform").find("input[name='repassword']").css('color','');$("#regform").find("input[name='repassword']").removeAttr('readonly');$("#regform").find("input[name='repassword']").get(0).type='password';$("#regform").find("input[name='repassword']").removeAttr('readonly')},1000);
              return false; 
            }
            if(!$("input[name='isallow']").prop('checked')){
                alert('请阅读同意用户使用协议');
                $("#regbtn").attr('disabled',false);
                return false;
            }
            $.post("/index.php/Wap/User/register",$("#regform").serialize(),function(data){
                if(data.error == 0){
                    location.href="<?php echo ((isset($_SESSION['user']['redirect']) && ($_SESSION['user']['redirect'] !== ""))?($_SESSION['user']['redirect']):'/index.php/Wap/Index/index'); ?>";
                }else if(data.error == 2){
                    $("#regbtn").attr('disabled',false);
                    $("#regform").find("input[name='username']").val(data.errmsg);
                    $("#regform").find("input[name='username']").css('color','red');
                    $("#regform").find("input[name='username']").attr('readonly','readonly');
                    setTimeout(function(){$("#regform").find("input[name='username']").val('');$("#regform").find("input[name='username']").css('color','');$("#regform").find("input[name='username']").removeAttr('readonly')},1000);
                }else if(data.error == 3){
                    alert(data.errmsg);
                    $("#regbtn").attr('disabled',false);
                }else{
                    alert('请填写完整信息');
                    $("#regbtn").attr('disabled',false);
                }
            })
        })
    })
</script>
</body>
</html>