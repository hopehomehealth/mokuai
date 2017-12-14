<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta content="北京蓝海长青规划设计研究有限公司,蓝海资讯,蓝海头条,军民融合,长青论坛" name="keywords"/>
    <meta content="北京蓝海长青规划设计研究有限公司，是一家以军事和安全为主，涉及经济、科技、国际战略、管理科学、社会发展、政策研究等领域的商业化新型高端智库，也是一家军民融合产业发展规划设计、建设运营、战略投资、顾问管理公司。" name="description"/>
    <title>蓝海长青</title>
    <script type="text/javascript" src="<?php echo (MJS_URL); ?>jquery-2.1.1.min.js"></script>
    <script src="<?php echo (MJS_URL); ?>js.js"></script>
    <link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<!--*****header*****-->
<header> <a class="headBack" href="<?php echo U('Index/index');?>">&nbsp;</a>
    <div class="headTit">
        <form action="/index.php/Mobile/News/searchlist" method="post">
            <input class="headTit-k" name="search" id="search" type="text" placeholder="请输入您要搜索的内容">
            <button class="search-an" id="shou" type="submit"></button>
        </form>
    </div>
	<script type="text/javascript">

$(function(){
    $('#shou').click(function(){
    var name = $('#search').val();
    if(name == ''){
        alert('搜索内容不能为空');
        return false;
    }
    });

});
</script>
    <span class="nav fr"></span>
    <ul class="menu">
        <li><a href="<?php echo U('Index/index');?>"><?php echo ($shouye[0]['lan_title']); ?></a></li>
        <li class="menu_1"><?php echo ($guanyu1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
<?php if(is_array($guanyu2)): foreach($guanyu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 11)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 12)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 13)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 14)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 15)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>




        </ul>
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>3));?>"><?php echo ($toutiao1[0]['lan_title']); ?></a></li>
        <li class="menu_1"><?php echo ($lanhaizixun1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
 <?php if(is_array($lanhaizixun2)): foreach($lanhaizixun2 as $key=>$v): if($v["url"] == ''): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

        </ul>
        <li class="menu_1"><?php echo ($junminronghe1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
		    <?php if(is_array($junminronghe2)): foreach($junminronghe2 as $key=>$v): if($v["url"] == ''): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

        </ul>
        <li class="menu_1"><?php echo ($zixunfuwu1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
  <?php if(is_array($zixunfuwu2)): foreach($zixunfuwu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 29)): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 30)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 31)): ?>
<li><a href="<?php echo U('News/falvfagui',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 32)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 38)): ?>
<li><a href="<?php echo U('Tushu/tushulist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 33)): ?>
<li><a href="<?php echo U('Advice/showlist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>


        </ul>

        <li class="menu_1"><?php echo ($changqingluntan1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
  <?php if(is_array($changqingluntan2)): foreach($changqingluntan2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 34)): ?><li><a href="<?php echo U('Bbs/blog',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 35)): ?>
<li><a href="<?php echo U('Bbs/bbs',array('board_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 36)): ?>
<li><a href="<?php echo U('Bbs/mingjia',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 37)): ?>
<li><a href="<?php echo U('Bbs/renwu',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>


        </ul>
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>8));?>"><?php echo ($gongyi[0]['lan_title']); ?></a></li>
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>9));?>"><?php echo ($lanhaifabu[0]['lan_title']); ?></a></li>
    </ul>
</header>

<!--*****header*****-->


<div class="main">
<div class="banner_2">
	<a href="#"><span>设置</span>管理</a>
	<div><a href="/index.php/Mobile/Blog/myzone">博客主页</a> | <a href="/index.php/Mobile/Blog/createart">发表博文</a></div>
</div>
<aside>
	<span class="fr clo"><img src="<?php echo (MIMG_URL); ?>ion_6.png" alt=""></span>
	<p>个人信息</p>
	<div class="nametou"><img src="<?php echo ($bloginfo["userhead"]); ?>" alt=""><p><?php echo ($bloginfo["username"]); ?></p></div>
	<ul class="geren">
		<li>今日访问: <span><?php echo ($bloginfo["today"]); ?></span></li>
        <li>总访问量: <span><?php echo ($bloginfo["counts"]); ?></span></li>
        <li>开博时间: <span><?php echo (date('Y-m-d',$bloginfo["ctime"])); ?></span></li>
        <li>博客排名: <span>1023</span></li>
	</ul>
</aside>
<div class="banner_3">
	<img src="<?php echo (MIMG_URL); ?>banner.jpg" alt=""/>
	<dl>
		<dt></dt>
        <dd><?php echo ($bloginfo["blog_name"]); ?></dd>
        <dd>&nbsp;</dd>
        <dd><?php echo ($bloginfo["blog_desc"]); ?></dd>
	</dl>
</div>

<div class="tab">
<p class="xj-hdts fl pl0-5 pt0-5"><img src="<?php echo (MIMG_URL); ?>qianxleft1.png"></p> <p class="xj-hdts fr pr0-5 pt0-5"><img src="<?php echo (MIMG_URL); ?>qianxr1.png"></p>
	<div id="menu">
		<ul class="slide">
			<li><a href="/index.php/Mobile/Blog/blogset">博客设置</a></li>
			<li><a href="/index.php/Mobile/Blog/myarticles">博文管理</a></li>
			<li class="current"><a href="/index.php/Mobile/Blog/mycomments">评论管理</a></li>
			<li><a href="/index.php/Mobile/Blog/myclass">分类管理</a></li>
			<li><a href="/index.php/Mobile/Blog/mycollect">收藏博文</a></li>
			<li><a href="/index.php/Mobile/User/ucenter">个人中心</a></li>
			<li></li>
		</ul>
	</div>

	<div class="settmain comment show">
		<div class="bar">
			<span class="commentme on">评论我的</span>
			<span class="mycomment">我评论的</span>
		</div>
		<div class="commentmes pinglun show">
			<?php if(is_array($commentme)): foreach($commentme as $key=>$info1): ?><div class="row">
				<div class="layer">
					<div class="content">
						<div href='/index.php/Mobile/Blog/delcom/com_id/<?php echo ($info1["com_id"]); ?>' class="delcom" style="height:2.5rem;position: absolute;top: 0rem;right: 0rem;width: 1.5rem;height: 1.5rem;background: url(/Public/Mobile/images/close.png) no-repeat center;"></div>
						<figure>
							<img src="<?php echo ($info1["userhead"]); ?>" alt="头像">
						</figure>
						<div class="wrapper">
							<h4><?php echo ($info1["username"]); ?></h4>
							<p class="neirong">
								<strong>评论：</strong><a href="/index.php/Mobile/Blog/detail/art_id/<?php echo ($info1["art_id"]); ?>"><?php echo ($info1["title"]); ?></a>
							</p>
							<time><?php echo ($info1["add_time"]); ?></time>
						</div>
					</div>
					<p class="txt">
						<?php echo ($info1["content"]); ?>
					</p>
				</div>
			</div><?php endforeach; endif; ?>
		</div>
		<div class="mycomments pinglun">

		</div>
	</div>
	<div id="loading" style="display:none;float:left;width:100%;text-align:center;font-size:1.5rem;color:#999;background:#fff;line-height:2rem;height:2rem;margin-bottom:0.5rem;margin-top:0.5rem">没有更多数据</div>
    </div>
</div>
</div>
<script src="<?php echo (MJS_URL); ?>jquery-2.1.1.min.js"></script>
<script src="<?php echo (MJS_URL); ?>slidemenu.js"></script>
<script type="text/javascript">
	$(function(){
		$(".banner_3").click(function () {
		    if($("aside").css("display")=="none"){
		        $("aside").slideDown(300);
		    }else{
		        $("aside").slideUp(300);
		    }
		});
    });
</script>
<!-- 滚动加载 -->
<script type="text/javascript">
  $(function(){
  	var ismycomment = false;
    var scrollstatus1 = false;
    var scrollstatus2 = false;
    var scrollstatus;
    var haveend1 = false;
    var haveend2 = false;
    var nowpage1 = 1;
    var nowpage2 = 1;
    var comtype = 1;
    var recordslist = $(".commentmes");//(默认是评论我的)放数据的容器
    $(".commentme").click(function(){
    	comtype = 1;
    	recordslist = $(".commentmes");
    });
    $(".mycomment").click(function(){
    	comtype = 2;
    	recordslist = $(".mycomments");
    	if(!ismycomment){
    		scrollstatus2 = true;
    		ajax_request(recordslist,comtype,nowpage2);
    		ismycomment = true;
    	}
    })

    function ajax_request(obj,comtype,nowpage){
      var html = '';
      $.get("/index.php/Mobile/Blog/mycomments",{'p':nowpage,'comtype':comtype},function(data){
        if(data.error == 0){
          for(var i in data.content){
            if(comtype == 1){
            	html += "<div class='row'><div class='layer'><div class='content'><div href='/index.php/Mobile/Blog/delcom/com_id/"+data.content[i].com_id+"' class='delcom' style='height:2.5rem;position: absolute;top: 0rem;right: 0rem;width: 1.5rem;height: 1.5rem;background: url(/Public/Mobile/images/close.png) no-repeat center;'></div><figure><img src='"+data.content[i].userhead+"' alt='头像'></figure><div class='wrapper'><h4>"+data.content[i].username+"</h4><p class='neirong'><strong>评论：</strong><a href='/index.php/Mobile/Blog/detail/art_id/"+data.content[i].art_id+"'>"+data.content[i].title+"</a></p><time>"+data.content[i].add_time+"</time></div></div><p class='txt'>"+data.content[i].content+"</p></div></div>";
            }
            if(comtype == 2){
            	html += "<div class='row'><div class='layer'><div class='content'><div  href='/index.php/Mobile/Blog/delcom/com_id/"+data.content[i].com_id+"' class='delcom' style='position: absolute;height:2.5rem;top: 0rem;right: 0rem;width: 1.5rem;height: 1.5rem;background: url(/Public/Mobile/images/close.png) no-repeat center;'></div><div class='wrapper'><h4>评论：&nbsp;&nbsp;</h4><p class='neirong'><user style='color: #004084;font-weight: bold;'>"+data.content[i].username+"&nbsp;</user>的博文：<a href='/index.php/Mobile/Blog/detail/art_id/"+data.content[i].art_id+"'>"+data.content[i].title+"</a></p><time>"+data.content[i].add_time+"</time></div></div><p class='txt'>"+data.content[i].content+"</p></div></div>";
            }
          }
        }else{
          if(comtype == 1){
          	if(!haveend1){
	           $("#loading").fadeIn(1000);$("#loading").fadeOut(1000);
	        }
	        haveend1 = true;
          }
          if(comtype == 2){
          	if(!haveend2){
	           $("#loading").fadeIn(1000);$("#loading").fadeOut(1000);
	        }
	        haveend2 = true;
          }
        }
		$(".pinglun").on('click','.delcom',function(){
			var url = $(this).attr('href');
			var thiobj = $(this).parents('.row');
			$.get(url,function(data){
				if(data == 'success'){
					thiobj.remove();
				}
			})
			return false;
		})
        obj.append(html);
        if(comtype == 1){
        	scrollstatus1 = false;
        }
        if(comtype == 2){
        	scrollstatus2 = false;
        }
      },false);
    }
    $(window).scroll(function () {
      var scrollTop = $(this).scrollTop();
      var scrollHeight = $(document).height();
      var windowHeight = $(this).height();
      var scrollstatus;
      if(comtype == 1){
      	scrollstatus = scrollstatus1;
      }
      if(comtype == 2){
      	scrollstatus = scrollstatus2;
      }
      if (scrollTop + windowHeight == scrollHeight && scrollstatus == false) {
      	if(comtype == 1){
      		scrollstatus1 = true;
	        nowpage1++;
	        if(!haveend1){
	          ajax_request(recordslist,comtype,nowpage1);
	        }
      	}
        if(comtype == 2){
      		scrollstatus2 = true;
	        nowpage2++;
	        if(!haveend2){
	          ajax_request(recordslist,comtype,nowpage2);
	        }
      	}
      }
    });
	$(".pinglun").on('click','.delcom',function(){
		var url = $(this).attr('href');
		var thiobj = $(this).parents('.row');
		$.get(url,function(data){
			if(data == 'success'){
				thiobj.remove();
			}
		})
		return false;
	})
   });
</script>


</div>
<!--*****footer*****-->
<footer>
    <p class="copyright" <?php if((CONTROLLER_NAME == 'Famous') AND (ACTION_NAME == 'detail')): ?>style="margin-bottom:5rem"<?php endif; ?>>Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved.<br>
        蓝海长青 版权所有</p>
</footer>
<!--*****footer*****-->

<div class="aside_1">
    <p class="ftop"><img src="<?php echo (MIMG_URL); ?>images_11.png" alt=""/></p> </div>
<script src="<?php echo (MJS_URL); ?>jquery.hiSlider.min.js"></script>
<script>
    $('.hiSlider3').hiSlider({
        isFlexible: true,
        isSupportTouch: true,
        titleAttr: function(curIdx){
            return $('img', this).attr('alt');
        }
    });
</script>
</body>
</html>