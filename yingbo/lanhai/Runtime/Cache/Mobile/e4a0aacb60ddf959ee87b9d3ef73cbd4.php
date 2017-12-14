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
  <!--*****for*****-->
  <section>
    <div class="for fl bb-b">
      <p class="fl pl0-5 fwb">长青<span class="d-red">论坛</span></p>
      <p class="fr pr0-5 fs1"><?php if($_SESSION['flag']== ''): ?><a href="/index.php/Mobile/User/register">注册</a> | <a href="/index.php/Mobile/User/login">登录</a><?php else: ?><a href="/index.php/Mobile/User/ucenter"><b style="text-decoration:underline;color:#004084"><?php echo ($_SESSION['userInfo']['username']); ?></b></a> | <a href="/index.php/Mobile/User/logout">退出</a><?php endif; ?> |
        <a href="/index.php/Mobile/Posts/createpost">发帖</a> |
        <?php if($_SESSION['flag']== ''): ?><a href="/index.php/Mobile/Blog/openblog">开通博客</a>
        <?php else: ?>
          <?php if($_SESSION['userInfo']['is_blog']== '1'): ?><a href="/index.php/Mobile/Blog/myzone">我的博客</a>
          <?php else: ?>
            <a href="/index.php/Mobile/Blog/openblog">开通博客</a><?php endif; endif; ?>
        </p>
    </div>
  </section>
  <!--*****for-c*****-->
  <div class="for-c fl">
    <ul class="for-t fl">
      <li><a href="/index.php/Mobile/Bbs/blog">长青博客</a></li>
      <li><a href="/index.php/Mobile/Bbs/bbs">巅峰论剑</a></li>
      <li class="cur"><a href="/index.php/Mobile/Bbs/mingjia">名家讲坛</a></li>
      <li><a href="/index.php/Mobile/Bbs/renwu">蓝海人物</a></li>
    </ul>
    <div class="for-con cur" id="recordslist">
      <?php if(is_array($famous1)): foreach($famous1 as $key=>$info3): ?><dl class="for-for-pic fl">
        <dt><a href="/index.php/Mobile/Famous/slanders1/f_id/<?php echo ($info3["f_id"]); ?>"><img src="<?php echo ($info3["f_photo"]); ?>"></a></dt>
        <dd>
          <p class="w100 fl t-w"><a href="/index.php/Mobile/Famous/slanders1/f_id/<?php echo ($info3["f_id"]); ?>"><?php echo ($info3["f_name"]); ?></a></p>
          <p class="w100 fl l-gray fs1">文章：<?php echo ($info3["f_artnums"]); ?></p>
          <p class="w100 fl fs1-2"><span class="w45 t-w fl"><a href="/index.php/Mobile/Famous/detail/sland_id/<?php echo ($info3["sland_id"]); ?>"><?php echo ($info3["title"]); ?></a></span><span class="fl l-gray pl0-5"></span> <span class="fr fs1 pr0-5"><?php echo ($info3["add_time"]); ?></span></p>
        </dd>
      </dl><?php endforeach; endif; ?>
    </div>
    <div id="loading" style="display:none;float:left;width:100%;text-align:center;font-size:1.5rem;color:#999;background:#fff;line-height:2rem;height:2rem;margin-bottom:0.5rem;margin-top:0.5rem">没有更多数据</div>
    </div>
  </div>
</div>
<!-- 滚动加载 -->
<script type="text/javascript">
  $(function(){
    var scrollstatus = false;
    var haveend = false;
    var nowpage = 1;
    function ajax_request(nowpage){
      var html = '';
      var recordslist = $("#recordslist");//放数据的容器
      $.get("/index.php/Mobile/Bbs/mingjia",{'p':nowpage},function(data){
        if(data.error == 0){
          for(var i in data.content){

            html += "<dl class='for-for-pic fl'><dt style='width:5rem;height:5rem;overflow:hidden'><a href='/index.php/Mobile/Famous/slanders1/f_id/"+data.content[i].f_id+"'><img style='height:5rem;border-radius:50%' src='"+data.content[i].f_photo+"'></a></dt><dd><p class='w100 fl t'w'><a href='/index.php/Mobile/Famous/slanders1/f_id/"+data.content[i].f_id+"'>"+data.content[i].f_name+"</a></p><p class='w100 fl l-gray fs1'>文章："+data.content[i].f_artnums+"</p><p class='w100 fl fs1-2'><span class='w45 t-w fl'><a href='/index.php/Mobile/Famous/detail/sland_id/"+data.content[i].sland_id+"'>"+data.content[i].title+"</a></span><span class='fl l-gray pl0-5'></span> <span class='fr  pr0-5'>"+data.content[i].add_time+"</span></p></dd></dl>";
          }
        }else{
          if(!haveend){
            $("#loading").fadeIn(1000);$("#loading").fadeOut(1000);
          }

          haveend = true;
        }
        recordslist.append(html);
        //$("#loading").css("display",'none');
        scrollstatus = false;
      },false);
    }
    $(window).scroll(function () {
      var scrollTop = $(this).scrollTop();
      var scrollHeight = $(document).height();
      var windowHeight = $(this).height();
      if (scrollTop + windowHeight == scrollHeight && scrollstatus == false) {
        scrollstatus = true;
        nowpage++;
        if(!haveend){
          ajax_request(nowpage);
        }
      }
    });
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