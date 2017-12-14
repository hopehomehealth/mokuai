<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equivmetahttp-equiv="x-ua-compatible" content="IE=7"/>
    <title><?php echo ($title); ?></title>
    <meta name="keywords" content="<?php echo ($sysconfig["keywords"]); ?>">
    <meta name="description" content="<?php echo ($sysconfig["description"]); ?>">
    <link href="<?php echo (HCSS_URL); ?>basic.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo (HCSS_URL); ?>style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo (CSS_URL); ?>page.css" rel="stylesheet" type="text/css"/>
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>jquery-1.12.3.min.js"></script>
</head>
<body>
<div class="header">
    <div class="column">
        <span class="logo"><img src="<?php echo (HIMG_URL); ?>logo.png" alt="中国缓粘结网"></span>
        <div class="head-r fr">
            <div class="search">
                <form action="" method="get">
                    <input name="" id="" type="text" class="search-iput fl" value="" placeholder="">
                    <span class="search_an"><a href=""><img src="<?php echo (HIMG_URL); ?>icon_1.png" alt=""></a></span>
                </form>
            </div>
            <div class="head-r-b fr">
                <p class="head-r-tit1"><img src="<?php echo (HIMG_URL); ?>images_05.jpg" alt=""></p>
                <!-- <ul class="head-r-list1">
                    <li><a href=""><img src="<?php echo (HIMG_URL); ?>images_07.jpg" alt=""></a></li>
                    <li><a href=""><img src="<?php echo (HIMG_URL); ?>images_08.jpg" alt=""></a></li>
                </ul> -->
            </div>
            <div class="head-r-a fr">
                <p class="head-r-tit">成员企业网站群</p>
                <ul class="head-r-list">
                    <li><a href="">功能材料事业群</a></li>
                    <li><a href="">功能材料事业群</a></li>
                    <li><a href="">功能材料事业群</a></li>
                    <li><a href="">功能材料事业群</a></li>
                    <li><a href="">功能材料事业群</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="menu-bj">
	<div class="column">
		<?php if($_SESSION['loginstatus'] == ''): ?><div class="menu-r fr">
			<p class="login fl">登&nbsp;录</p>
			<p class="register fl">注&nbsp;册</p>
		</div>
		<?php else: ?>
		<div class="fr" style="padding-top:0px;width:157px">
			<p style="height:46px;line-height:46px;color:white"><?php echo ($_SESSION['user']['info']['username']); ?>　<a href="/index.php/Home/User/logout" style="text-decoration:underline;color:white;cursor:pointer">退出</a></p>
		</div><?php endif; ?>
		<ul class="menu_nr">
			<li <?php if(CONTROLLER_NAME == 'Index'): ?>class="cur"<?php endif; ?>><a href="http://www.zghnj.com/index.php/Home/Index/index">首页</a></li>
			<li <?php if(CONTROLLER_NAME == 'Technology'): ?>class="cur"<?php endif; ?>><a>技术前沿</a>
				<div class="childnavin">
					<a href="http://www.zghnj.com/index.php/Home/Technology/overview">技术概览</a>
					<a href="http://www.zghnj.com/index.php/Home/Technology/academicForum">学术园地</a>
					<a href="http://www.zghnj.com/index.php/Home/Technology/lectureRoom">大家讲堂</a>
				</div>
			</li>
			<li <?php if(CONTROLLER_NAME == 'News'): ?>class="cur"<?php endif; ?>><a>新闻资讯</a>
				<div class="childnavin">
					<a href="http://www.zghnj.com/index.php/Home/News/industries">行业新闻</a>
					<a href="http://www.zghnj.com/index.php/Home/News/activities">行业活动</a>
				</div>
			</li>
			<li <?php if(CONTROLLER_NAME == 'Develop'): ?>class="cur"<?php endif; ?>><a>产业发展</a>
				<div class="childnavin">
					<a href="http://www.zghnj.com/index.php/Home/Develop/overview">产业概览</a>
					<a href="http://www.zghnj.com/index.php/Home/Develop/material">工程材料与机具</a>
					<a href="http://www.zghnj.com/index.php/Home/Develop/designer">工程设计与施工</a>
					<a href="http://www.zghnj.com/index.php/Home/Develop/check">产品检验检测</a>
				</div>
			</li>
			<li <?php if(CONTROLLER_NAME == 'Exhibition'): ?>class="cur"<?php endif; ?>><a>产品与服务</a>
				<div class="childnavin">
					<a href="http://www.zghnj.com/index.php/Home/Exhibition/product">产品系列</a>
					<a href="http://www.zghnj.com/index.php/Home/Exhibition/cases">应用案例</a>
					<a href="http://www.zghnj.com/index.php/Home/Exhibition/customer">应用客户</a>
				</div>
			</li>
			<li <?php if(CONTROLLER_NAME == 'Communicate'): ?>class="cur"<?php endif; ?>><a>交流空间</a>
				<div class="childnavin">
					<a href="http://www.zghnj.com/index.php/Home/Communicate/knowledge">常识解答</a>
					<a href="http://www.zghnj.com/index.php/Home/Communicate/exclusive">会员专属</a>
					<a href="http://www.zghnj.com/index.php/Home/Communicate/analysis">经典解析</a>
				</div>
			</li>
			<li <?php if(CONTROLLER_NAME == ''): ?>class="cur"<?php endif; ?>><a href="http://www.zghnj.com/index.php/Home//">网上商城</a></li>
		</ul>
	</div>
</div>

	<!----banner----><div class="banner">    <?php if(is_array($slides)): foreach($slides as $key=>$slide): ?><img src="<?php echo (substr($slide["pic"],1)); ?>" alt=""><?php endforeach; endif; ?></div><!----bannerend----><!----front----><div class="su-front">    <div class="column-a">        <ul id="0" class="su-front-tit">            <?php if(is_array($category)): foreach($category as $key=>$cateinfo): ?><li <?php if(ACTION_NAME == $cateinfo['action']): ?>class="cur-a"<?php endif; ?>><a href="/index.php/Home/<?php echo ($cateinfo['ctrl']); ?>/<?php echo ($cateinfo['action']); ?>#0"><?php echo ($cateinfo["cat_name"]); ?></a></li><?php endforeach; endif; ?>        </ul>        <div class="su-content">          <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i; if(($mod) == "1"): echo ($vo["name"]); ?>              <div class="su-anal fl">                <span class="su-anal-img fr"><img src="<?php echo (substr($info["pic"],1)); ?>" alt="">                  <span class="su-anal-sjy"><img src="<?php echo (HIMG_URL); ?>icon_17.png" alt=""></span>                </span>                <span class="su-anal-txt ml38 fl">                    <h3><?php echo ($info["title"]); ?></h3>                    <i></i>                    <span class="su-anal-txt1 fl">                       <?php echo ($info["content"]); ?>                    </span>                    <span class="su-exch-more pt30 fl"><a href="/index.php/Home/Communicate/detail/id/<?php echo ($info["news_id"]); ?>">查看详情</a></span>                </span>              </div><?php endif; ?>            <?php if(($mod) == "0"): echo ($vo["name"]); ?>              <div class="su-anal fl">                <span class="su-anal-img fl"><img src="<?php echo (substr($info["pic"],1)); ?>" alt="">                  <span class="su-anal-sjz"><img src="<?php echo (HIMG_URL); ?>icon_16.png" alt=""></span>                </span>                <span class="su-anal-txt mr38 fr">                  <h3><?php echo ($info["title"]); ?></h3>                  <i></i>                   <span class="su-anal-txt1 fl">                       <?php echo ($info["content"]); ?>                   </span>                    <span class="su-exch-more pt30 fl"><a href="/index.php/Home/Communicate/detail/id/<?php echo ($info["news_id"]); ?>">查看详情</a></span>                </span>              </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>          <style type="text/css">            .technorati li{float:left;}          </style>          <div style="margin-top:30px" class="technorati fl"><?php echo ($page); ?></div>        </div>    </div></div><!----frontend---->
<!--footer-->
<div class="footer">
    <div class="column">
        <ul class="sumenu fl">
	<li>
		<a href="http://www.zghnj.com/index.php/Home/Technology/overview">技术概览</a>
		<a href="http://www.zghnj.com/index.php/Home/Technology/academicForum">学术园地</a>
		<a href="http://www.zghnj.com/index.php/Home/Technology/lectureRoom">大家讲堂</a>
	</li>
	<li>
		<a href="http://www.zghnj.com/index.php/Home/News/industries">行业新闻</a>
		<a href="http://www.zghnj.com/index.php/Home/News/activities">行业活动</a>
	</li>
	<li>
		<a href="http://www.zghnj.com/index.php/Home/Develop/overview">产业概览</a>
		<a href="http://www.zghnj.com/index.php/Home/Develop/material">工程材料与机具</a>
		<a href="http://www.zghnj.com/index.php/Home/Develop/designer">工程设计与施工</a>
		<a href="http://www.zghnj.com/index.php/Home/Develop/check">产品检验检测</a>
	</li>
	<li>
		<a href="http://www.zghnj.com/index.php/Home/Exhibition/product">产品系列</a>
		<a href="http://www.zghnj.com/index.php/Home/Exhibition/cases">应用案例</a>
		<a href="http://www.zghnj.com/index.php/Home/Exhibition/customer">应用客户</a>
	</li>
	<li>
		<a href="http://www.zghnj.com/index.php/Home/Communicate/knowledge">常识解答</a>
		<a href="http://www.zghnj.com/index.php/Home/Communicate/exclusive">会员专属</a>
		<a href="http://www.zghnj.com/index.php/Home/Communicate/analysis">经典解析</a>
	</li>
</ul>

        <p class="rwm">
            <img src="<?php echo ($sysconfig["logo"]); ?>" alt=""><br>扫描二维码，关注我们
        </p>
    </div>
</div>
<div class="copyright">
     <div class="column">
         <p class="pr108 fr"><?php echo ($sysconfig["records"]); ?></p>
         <p class="fl">
             <a href="">联系我们&nbsp;｜</a>
             <a href="">法律声明&nbsp;｜</a>
             <a href="">帮助中心</a>
         </p>
     </div>
</div>
<!--footerend-->
<!--tan-->
<div class="tan">
    <div class="login-nr">
        <form action="" method="post" id="loginform">
            <p class="login-logo"><img src="<?php echo (HIMG_URL); ?>logo_1.png" alt=""></p>
            <ul class="login-con">
                <li>
                    <input name="username"  type="text" class="logo-iput" title="" value="" placeholder="请输入用户名"  />
                </li>
                <li>
                    <input name="password"  type="password" class="logo-iput" title="" value="" placeholder="请输入密码"  />
                </li>
                <input type="button" id="loginbtn" class="login-an white" value="登&nbsp;录">
                <p class="login-text">您还不是会员？请点击<span class="login-hover login-register">注册</span></p>
            </ul>
        </form>
    </div>
</div>
<!--tanend-->
<!--tan-->
<div class="tan-a">
    <div class="register-nr">
        <form action="" method="post" id="regform">
            <p class="login-logo"><img src="<?php echo (HIMG_URL); ?>logo_1.png" alt=""></p>
            <ul class="login-con">
                <li>
                    <input name="username"  type="text" class="logo-iput" title="" value="" placeholder="请输入用户名"  />
                </li>
                <li>
                    <input name="password"  type="password" class="logo-iput" title="" value="" placeholder="请输入密码"  />
                </li>
                <li>
                    <input name="repassword"  type="password" class="logo-iput" title="" value="" placeholder="请确认密码"  />
                </li>
                <span class="registe-text" style="width:160px"><span class="registe-dui fl" style="margin: 3px 10px 0 1px;"></span>同意中国缓粘结网</span><a href="#" style="float:left;color:#207f9c;cursor:pointer">《用户使用协议》</a>
                <input type="checkbox" style="display:none" name="isallow" value="1">
                <input type="button" id="regbtn" class="login-an white" value="注&nbsp;册">
            </ul>
        </form>
    </div>
</div>
<script>
    $(function(){
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
            $.post("/index.php/Home/User/register",$("#regform").serialize(),function(data){
                if(data.error == 0){
                    window.location.reload();
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
            $.post("/index.php/Home/User/login",$("#loginform").serialize(),function(data){
                if(data.error == 0){
                    window.location.reload();
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
<!--tanend-->
<?php if((CONTROLLER_NAME == 'Index') AND (ACTION_NAME == 'index')): else: ?>
    <div class="rightmenuin">
        <div class="ico-box ico06 backtop"></div>
    </div><?php endif; ?>
<script type="text/jscript" src="<?php echo (HJS_URL); ?>idangerous.swiper.min.js"></script>
<script type="text/jscript" src="<?php echo (HJS_URL); ?>index.js"></script>
<script type="text/jscript" src="<?php echo (HJS_URL); ?>focus.js"></script>
<script>
    $(function () {
        //-------- 判断分辨率 --------

        $(window).resize(function () {

        })

        $(window).load(function () {
            positioncont2();
            $(window).resize(function () {
                positioncont2();
            })
        })

        function positioncont2() {

            var overflowwid2 = $("body").css("overflow", "hidden").width();
            var windowwid2 = $("body").removeAttr("style").width();
            var scrollwid2 = overflowwid2 - windowwid2;

            if (windowwid2 + scrollwid2 > 991) {
                $('.rightmenuin').addClass('rightmenuins')
                $('.rightmenu').show();
            }
            else {
                $('.rightmenuin').removeClass('rightmenuins')
                $('.rightmenu').hide();
            };
        }

    })
</script>
</body>
</html>