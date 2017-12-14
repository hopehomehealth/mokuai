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
    <section class="su-menu b-white">
        <ul>
            <?php if(is_array($category)): foreach($category as $key=>$cateinfo): ?><li <?php if(ACTION_NAME == $cateinfo['action']): ?>class="cur"<?php endif; ?>><a href="/index.php/Wap/<?php echo ($cateinfo['ctrl']); ?>/<?php echo ($cateinfo['action']); ?>"><?php echo ($cateinfo["cat_name"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
    </section>
    <!--*****menuend*****-->
    <!--*****su-con*****-->
    <section class="su-con">
        <div class="su-fron">
            <p>　　缓粘结预应力是我国乃至国际预应力技术领域中的一项新兴技术，由上世纪80 年代的日本兴起，因其在秉承无粘结预应力与有粘结预应力技术优点的同时克服了二者的技术弊端而受到业内的广泛关注，发展迅猛。</p>
            <p class="fs0-28 c-blue">技术原理</p>
            <p>　　缓粘结预应力技术的核心是缓粘结预应力钢绞线产品，其是由预应力钢绞线、内外层具有一定高度与宽度的对称横肋的护套及一定厚度的填充并紧密封裹于护套和预应力钢绞线之间的缓凝粘合剂构成。缓凝粘合剂初期具有一定流动性及对钢绞线良好的附着性，在工程施工阶段可保障预应力钢绞线自由地伸缩、变形。在工程施工完成后，缓凝粘合剂在预定时间内固化，达到一定强度并与预应力钢绞线、护套粘结为一体，通过缓凝粘合剂与护套共同的横肋与混凝土形成咬合，实现预应力钢绞线与混凝土的一体化，共同受力工作。</p>
            <p><img src="<?php echo (WIMG_URL); ?>images_04.jpg" alt=""></p>
            <p class="fs0-28 c-blue">技术优势</p>
            <p>　　施工工艺简便： 缓粘结预应力相比有粘结预应力减少埋设波纹管与灌浆工序，施工简便易行，缩短了工期、节省了工程造价。质量易于控制：缓粘结预应力筋工厂化制造、现场人工操作少，可有效避免有粘结预应力孔道塌陷、积水、灌浆不密实等施工缺陷。节点布置灵活：缓粘结预应力钢绞线单根布置，锚具小，使用不受限，节点交汇处混凝土浇注易密实，施工质量有保障。耐久性能优异：缓凝粘合剂具有较高的强度，较好的耐候性、耐水性、耐碱性，整体缓粘结预应力钢绞线的抗腐蚀能力大幅提升。力学性能突出：缓粘结预应力结构具有与有粘结预应力结构相当的抗震延性、抗裂性、承载力，以及更高的抗疲劳性和粘结锚固性能。工程经济性强：缓粘结预应力工程相比有粘结预应力工程减少多道工序，工期缩短近半，用工少、模板周转率高，工程综合经济效益突出。</p>
            <p><img src="<?php echo (WIMG_URL); ?>images_04.jpg" alt=""></p>
            <p class="fs0-28 c-blue">应用领域</p>
            <p>　　缓粘结预应力技术可使用于铁路与公路桥梁、水利工程、市政工程、海洋工程、核工业燃料储存工程、特种工程及工业与民用建筑工程等各类预应力混凝土结构，如：在民用建筑机场航站楼、铁路站房、大型场馆、广场、办公楼等大跨混凝土结构中应用；在铁路、公路桥梁的桥面筋、T型、箱型梁横向、纵向以及桩体竖向筋进行应用；在水利领域的坝体、地下工厂等大跨重载区域混凝土梁、板进行应用；在特种结构筒仓、水池、抗震试验台等特种结构进行应用。尤其对于动荷载较大、疲劳荷载较高、抗侵蚀性较强的大跨度混凝土结构，具有突出的经济与技术优势。</p>
            <p><img src="<?php echo (WIMG_URL); ?>images_04.jpg" alt=""></p>
        </div>

    </section>
    <!--*****su-conend*****-->
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