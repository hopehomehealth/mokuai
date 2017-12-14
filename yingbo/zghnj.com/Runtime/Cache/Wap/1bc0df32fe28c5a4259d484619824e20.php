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
    <!--*****menu*****-->
    <div class="login">
        <section class="login-con">
            <form action="" method="post" id="loginform">
                <ul>
                    <li>
                        <input name="username" type="text" class="login-input" value="" placeholder="请输入用户名" />
                    </li>
                    <li>
                        <input name="password" type="password" class="login-input" value="" placeholder="请输入密码" />
                    </li>
                        <input type="button" id="loginbtn" class="w100 login-an b-bule mt0-72" value="登&nbsp;录">
                    <p class="w100 login-sm tac">您还不是会员，请点击<a href="/index.php/Wap/User/register">注册</a></p>
        </section>

    </div>
    <!--*****menuend*****-->
</div>
<script>
    $(function(){
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
                    location.href="/index.php/Wap/User/ucenter";
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
    })
</script>
<div class="tan">
  <div class="login-con login">
      <form action="" method="post">
          <ul>
              <li>
                  <input name="username" type="text" class="login-input" title="" value="请输入用户名" onkeydown="if (event.keyCode==20) {}" onblur="if(this.value=='')value='请输入用户名';" onfocus="if(this.value=='请输入用户名')value='';"/>
              </li>
              <li>
                  <input name="username" type="text" class="login-input" title="" value="请输入密码" onkeydown="if (event.keyCode==20) {}" onblur="if(this.value=='')value='请输入密码';" onfocus="if(this.value=='请输入密码')value='';"/>
              </li>
              <input type="button" class="login-an b-bule mt0-72" value="登&nbsp;录">
              <p class="login-sm tac">您还不是会员，请点击<span class="login-sma">注册</span></p>
          </ul>
      </form>
  </div>
  <div class="login-con register">
      <form action="" method="post">
          <ul>
              <li>
                  <input name="username" type="text" class="login-input" title="" value="请输入用户名" onkeydown="if (event.keyCode==20) {}" onblur="if(this.value=='')value='请输入用户名';" onfocus="if(this.value=='请输入用户名')value='';"/>
              </li>
              <li>
                  <input name="username" type="text" class="login-input" title="" value="请输入密码" onkeydown="if (event.keyCode==20) {}" onblur="if(this.value=='')value='请输入密码';" onfocus="if(this.value=='请输入密码')value='';"/>
              </li>
              <li>
                  <input name="username" type="text" class="login-input" title="" value="请确认密码" onkeydown="if (event.keyCode==20) {}" onblur="if(this.value=='')value='请确认密码';" onfocus="if(this.value=='请确认密码')value='';"/>
              </li>
              <p class="login-sm"><span class="register-xz fl"></span>同意中国缓粘结网《用户使用协议》</p>
              <input type="button" class="login-an b-bule mt0-36" value="注&nbsp;册">
          </ul>
      </form>
  </div>
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

<script>
    $(function(){
        $(".tan").show();
        $(".login-sma").click(function () {
            $(".login").hide().siblings(".register").show();
        });
    })
</script>