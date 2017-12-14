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
    <?php if(CONTROLLER_NAME == 'Index'): ?><script type="text/javascript">
        try {
        var urlhash = window.location.hash;
        var url= "/index.php/Wap/Index/index";

        if (!urlhash.match("fromapp"))
        {
        if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i)))
        {

        window.location=url;
        }
        }
        }
        catch(err)
        {
        }
      </script><?php endif; ?>
</head>
<body>
<div class="header">
    <div class="column">
        <span class="logo"><img src="<?php echo (HIMG_URL); ?>logo.png" alt="中国缓粘结网"></span>
        <div class="head-r fr">
            <div class="search">
                <form action="/index.php/Home/Index/search" method="get" id="searchform">
                    <input name="keywords" id="" type="text" class="search-iput fl" value="<?php echo ($_GET['keywords']); ?>" placeholder="">
                    <span class="search_an"><a><img src="<?php echo (HIMG_URL); ?>icon_1.png" alt=""></a></span>
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

	<!----banner----><div class="wwindexbanner swiper-container-horizontal">    <ul class="swiper-wrapper clearfix">        <?php if(is_array($slides)): foreach($slides as $key=>$slide): ?><li class="swiper-slide"><a href="<?php echo ((isset($slide["url"]) && ($slide["url"] !== ""))?($slide["url"]):'#'); ?>"> <img src="<?php echo (substr($slide["pic"],1)); ?>" alt=""/></a></li><?php endforeach; endif; ?>    </ul>    <div class="wwindexbannerbtn"></div></div><!----bannerend----><!----ad----><div class="column">    <div class="ad">        <a href="/index.php/Home/News/detail/id/<?php echo ($hot["news_id"]); ?>">        <h4><?php echo ($hot["title"]); ?></h4>        <span><?php echo ($hot["content"]); ?></span>        </a>    </div></div><!----adend----><!----news----><div class="column ov-h indexpos">    <p class="news-tit black">新闻资讯</p>    <?php if(is_array($news)): foreach($news as $key=>$newsinfo): ?><dl class="news-list fl">            <dt>              <a href="/index.php/Home/News/detail/id/<?php echo ($newsinfo["news_id"]); ?>"><img src="<?php echo (substr($newsinfo["pic"],1)); ?>" alt=""></a>            </dt>            <dd>                <p class="news-list-tit"><a href="/index.php/Home/News/detail/id/<?php echo ($newsinfo["news_id"]); ?>"><?php echo ($newsinfo["title"]); ?></a></p>                <p class="news-list-nr"><a href="/index.php/Home/News/detail/id/<?php echo ($newsinfo["news_id"]); ?>"><?php echo ($newsinfo["content"]); ?></a></p>            </dd>        </dl><?php endforeach; endif; ?>    <p class="news-more"><a href="/index.php/Home/News/industries">查看更多新闻 </a></p></div><!----newsend----><!----front----><div class="front indexpos">    <div class="column ov-h">        <p class="front-tit black">技术前沿</p>        <div class="front-news">            <p class="front-news-more fr"><a href="/index.php/Home/Technology/overview">查看详情</a></p>            <p class="front-news-tit white fl">技术<br>前沿</p>            <p class="front-news-nr white fl"><?php echo ($catinfo1["introduce"]); ?></p>        </div>        <ul class="front-news-img">            <?php if(is_array($technology)): foreach($technology as $key=>$info): ?><li>                    <img src="<?php echo (substr($info["pic"],1)); ?>" alt="">                    <div class="front-news-txt">                        <h4><?php echo ($info["title"]); ?></h4>                        <p><?php echo ($info["content"]); ?></p>                        <a class="front-news-more1" href="/index.php/Home/Technology/detail/id/<?php echo ($info["news_id"]); ?>">查看详情</a>                    </div>                </li><?php endforeach; endif; ?>        </ul>    </div></div><!----frontend----><!----developing----><p class="devel-tit black indexpos">产业发展</p><div class="devel">        <div class="devel-l fl">            <p class="devel-l-tit">产业发展</p>            <p class="devel-l-nr white"> <?php echo ($catinfo2["introduce"]); ?></p>            <p class="devel-l-more"><a href="/index.php/Home/Develop/overview">查看详情</a></p>        </div>        <div class="devel-r fr">            <div class="content_middle">                <ul>                    <li style="background:url(<?php echo (HIMG_URL); ?>images_26.jpg) no-repeat center center;opacity: 100;filter: alpha(opacity=1);"></li>                    <li style="background:url(<?php echo (HIMG_URL); ?>images_27.jpg) no-repeat center center;"></li>                    <li style="background:url(<?php echo (HIMG_URL); ?>images_26.jpg) no-repeat center center;"></li>                    <li style="background:url(<?php echo (HIMG_URL); ?>images_27.jpg) no-repeat center center;"></li>                </ul>                <div class="table">                    <a class="small_active"href="javascript:;">电子功能材料</a>                    <a href="javascript:;">新型复合材料</a>                    <a href="javascript:;"> 洁净室净化工程</a>                    <a href="javascript:;">新电子功能材料</a>                </div>                <p class="devel-r-more fl" ><a href="index.html" ><img src="<?php echo (HIMG_URL); ?>images_29.jpg" alt=""><br>查看更多</a></p>            </div>        </div></div><!--developingend--><!--services--><p class="serv-tit black indexpos">产品与服务</p><div class="serv">     <div class="column ov-h">         <ul class="serv-l">            <?php if(is_array($types)): foreach($types as $key1=>$type1): ?><li <?php if($key1 == 0): ?>class="current"<?php endif; ?>><?php echo ($type1["type_name"]); ?></li><?php endforeach; endif; ?>            <span class="serv-l-more"><a href="/index.php/Home/Exhibition/product"><img src="<?php echo (HIMG_URL); ?>images_29.jpg" alt=""><br>查看更多</a></span>         </ul>         <?php if(is_array($types)): foreach($types as $key2=>$type2): ?><div <?php if($key2 == 0): ?>class="serv-nr cur fl"<?php else: ?>class="serv-nr fl"<?php endif; ?>>                <?php if(is_array($type2["products"])): foreach($type2["products"] as $key=>$product): ?><dl class="serv-nr-img fl">                         <dt><a href="/index.php/Home/Exhibition/detail/type_id/<?php echo ($product["type_id"]); ?>/pdt_id/<?php echo ($product["pdt_id"]); ?>"><img src="<?php echo ($product["logo"]); ?>" alt=""></a></dt>                         <dd><a href="/index.php/Home/Exhibition/detail/type_id/<?php echo ($product["type_id"]); ?>/pdt_id/<?php echo ($product["pdt_id"]); ?>">                             <p class="fs15 gblack"><?php echo ($product["pdt_name"]); ?></p><?php echo ($product["features"]); ?>                             </a></dd>                     </dl><?php endforeach; endif; ?>             </div><?php endforeach; endif; ?>     </div></div><!--servicesend--><!--exchange--><p class="serv-tit black indexpos">交流空间</p><div class="exch-nr">      <div class="column ov-h">          <ul class="exch-list fr">              <p class="exch-list-tit white"></p>              <?php if(is_array($analysis)): foreach($analysis as $key=>$analyinfo): ?><li style="cursor:pointer" onclick="location.href='/index.php/Home/Communicate/detail/id/<?php echo ($analyinfo["news_id"]); ?>'"><?php echo (cutstr(strip_tags($analyinfo["title"]),94)); ?></li><?php endforeach; endif; ?>          </ul>          <p class="exch-nr-l fl"><img src="<?php echo (HIMG_URL); ?>images_01.png" alt=""></p>      </div></div><!--exchangeend--><!--customer--><script type="text/javascript">    //js无缝滚动代码    function marquee(i, direction){        var obj = document.getElementById("marquee" + i);        var obj1 = document.getElementById("marquee" + i + "_1");        var obj2 = document.getElementById("marquee" + i + "_2");        if (direction == "up"){            if (obj2.offsetTop - obj.scrollTop <= 0){                obj.scrollTop -= (obj1.offsetHeight + 20);            }else{                var tmp = obj.scrollTop;                obj.scrollTop++;                if (obj.scrollTop == tmp){                    obj.scrollTop = 1;                }            }        }else{            if (obj2.offsetWidth - obj.scrollLeft <= 0){                obj.scrollLeft -= obj1.offsetWidth;            }else{                obj.scrollLeft++;            }        }    }    function marqueeStart(i, direction){        var obj = document.getElementById("marquee" + i);        var obj1 = document.getElementById("marquee" + i + "_1");        var obj2 = document.getElementById("marquee" + i + "_2");        obj2.innerHTML = obj1.innerHTML;        var marqueeVar = window.setInterval("marquee("+ i +", '"+ direction +"')", 20);        obj.onmouseover = function(){            window.clearInterval(marqueeVar);        }        obj.onmouseout = function(){            marqueeVar = window.setInterval("marquee("+ i +", '"+ direction +"')", 20);        }    }</script><div class="column">    <div id="marquee1" class="marqueeleft">        <div style="width:8000px;">            <ul id="marquee1_1">                <?php if(is_array($customers)): foreach($customers as $key=>$customer): ?><li>                        <a class="pic" href="<?php echo ((isset($customer["href"]) && ($customer["href"] !== ""))?($customer["href"]):'#'); ?>"><img src="<?php echo ($customer["picture"]); ?>" alt=""></a>                    </li><?php endforeach; endif; ?>            </ul>            <ul id="marquee1_2"></ul>        </div>    </div><!--marqueeleft end-->    <script type="text/javascript">marqueeStart(1, "left");</script></div><!--customerend--><div class="rightmenu">    <div class="ico-box ico01 wwico-box">        <a href="javascript:;" class="ico-cont ico-cont01">新闻中心</a>    </div>    <div class="ico-box ico02 wwico-box">        <a href="javascript:;" class="ico-cont ico-cont02">技术前沿</a>    </div>    <div class="ico-box ico03 wwico-box">        <a href="javascript:;" class="ico-cont ico-cont03">产业发展</a>    </div>    <div class="ico-box ico04 wwico-box">        <a href="javascript:;" class="ico-cont ico-cont04">产品与服务</a>    </div>    <div class="ico-box ico05 wwico-box">        <a href="javascript:;" class="ico-cont ico-cont05">交流空间</a>    </div>    <div class="ico-box ico06 backtop"></div></div>
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
             <a href="/index.php/Home/Single/contact">联系我们&nbsp;｜</a>
             <a href="/index.php/Home/Single/clare">法律声明&nbsp;｜</a>
             <a href="/index.php/Home/Single/help">帮助中心</a>
         </p>
     </div>
</div>
<!--footerend-->
<!--tan-->
<div class="tan">
    <div class="login-nr">
        <form action="" method="post" id="loginform">
            <span class="cuo"><img src="<?php echo (HIMG_URL); ?>cuo.png" alt=""></span>
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
            <span class="cuo"><img src="<?php echo (HIMG_URL); ?>cuo.png" alt=""></span>
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
                <span class="registe-text" style="width:160px"><span class="registe-dui fl" style="margin: 3px 10px 0 1px;"></span>同意中国缓粘结网</span><a href="/index.php/Home/User/protocol" style="float:left;color:#207f9c;cursor:pointer">《用户使用协议》</a>
                <input type="checkbox" style="display:none" name="isallow" value="1">
                <input type="button" id="regbtn" class="login-an white" value="注&nbsp;册">
            </ul>
        </form>
    </div>
</div>
<script>
    $(function(){
        var _get_login = "<?php echo isset($_GET['login'])?1:0;?>";
        var _get_register = "<?php echo isset($_GET['register'])?1:0;?>";
        var _loginstatus  = "<?php echo isset($_SESSION['loginstatus'])?1:0;?>";
        if((_get_login == '1') && (_loginstatus == 0)){
          $(".tan").show();
        }
        if((_get_register == '1') && (_loginstatus == 0)){
          $(".tan-a").show();
        }
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
                    var redirecturl = "<?php echo ((isset($_SESSION['user']['redirect']) && ($_SESSION['user']['redirect'] !== ""))?($_SESSION['user']['redirect']):''); ?>";
                    if(redirecturl != ''){
                      location.href=redirecturl;
                    }else{
                      window.location.reload();
                    }
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
                    var redirecturl = "<?php echo ((isset($_SESSION['user']['redirect']) && ($_SESSION['user']['redirect'] !== ""))?($_SESSION['user']['redirect']):''); ?>";
                    if(redirecturl != ''){
                      location.href=redirecturl;
                    }else{
                      window.location.reload();
                    }
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
        $(".search_an").click(function(){
          $("#searchform").removeAttr('onsubmit');
          $("#searchform").submit();
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