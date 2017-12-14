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
  <!--*****banner*****-->
  <section>
    <div class="nht-xl fl">
      <p class="lin-tt"><?php echo (mb_substr($pidname,0,2,'utf-8')); ?><span class="d-red"><?php echo (mb_substr($pidname,2,22,'utf-8')); ?></span><span class="nht-tt fr">&nbsp;</span></p>
      <ul class="nht-sumenu fr">
	  <?php if(is_array($catinfo)): foreach($catinfo as $key=>$v): ?><li><a <?php if($v["lan_id"] == 31): ?>href="<?php echo U('News/falvfagui',array('lan_id'=>$v['lan_id']));?>"<?php elseif($v["lan_id"] == 33): ?>href="<?php echo U('Advice/showlist',array('lan_id'=>$v['lan_id']));?>"<?php elseif($v["lan_id"] == 38): ?>href="<?php echo U('Tushu/tushulist',array('lan_id'=>$v['lan_id']));?>"<?php else: ?>href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"<?php endif; ?>><?php echo ($v["lan_title"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </section>
  <script type="text/javascript">
    $(".nht-tt").click(function(){
        $(".nht-sumenu").slideToggle("1000");
    });
</script>
  <section>
    <div class="lin-ad mb0">
      <ul class="hiSlider hiSlider3">
	  <?php if(is_array($clickinfo)): foreach($clickinfo as $key=>$v): ?><li class="hiSlider-item"><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> alt="<?php echo ($v["news_title"]); ?>"></a></li><?php endforeach; endif; ?>

      </ul>
    </div>
  </section>
  <!--*****banner*****-->
  <!--*****news*****-->
  <section>
  <?php if(is_array($catinfo)): foreach($catinfo as $k=>$v): ?><div class="h-l pb1 fl">
      <p class="h-l-tt"><?php echo (mb_substr($v["lan_title"],0,2,'utf-8')); ?><span class="d-red"><?php echo (mb_substr($v["lan_title"],2,50,'utf-8')); ?></span><span class="fr pr2 fs1"><a <?php if($v["lan_id"] == 31): ?>href="<?php echo U('News/falvfagui',array('lan_id'=>$v['lan_id']));?>"<?php elseif($v["lan_id"] == 33): ?>href="<?php echo U('Advice/showlist',array('lan_id'=>$v['lan_id']));?>"<?php elseif($v["lan_id"] == 38): ?>href="<?php echo U('Tushu/tushulist',array('lan_id'=>$v['lan_id']));?>"<?php else: ?>href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"<?php endif; ?>><?php if($v["lan_id"] == 33): ?>点击留言>><?php else: ?>更多>><?php endif; ?></a></span></p>
      <?php if(is_array($v["info"])): foreach($v["info"] as $kk=>$vv): if($vv["lan_id"] == 31): ?><div class="h-l pb1 fl">
            <ul class="news-list fl">
                  <li>
                       <a href="<?php echo U('News/detail',array('news_id'=>$vv['news_id']));?>"><?php echo ($vv["news_title"]); ?></a>
                            <p class="fl fs1 l-gray w100"><?php echo ($vv["add_time"]); ?></p>
                   </li>
            </ul>
        </div>
		<?php elseif($vv["lan_id"] == 38): ?>
 <div class="news-list fl">
        <dl class="lib-list-a fl">
          <dt><a href="<?php echo U('News/detail',array('news_id'=>$vv['news_id']));?>"><img <?php if(($vv["pic"] != '') AND ($vv["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($vv["pic"]); ?>"
<?php elseif(($vv["match"] == 'http') AND ($vv["pic"] == '')): ?>src="<?php echo ($vv["picfirst"]); ?>"
<?php elseif(($vv["match"] == 'http') AND ($vv["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($vv["picfirst"]); ?>"
<?php elseif(($vv["match"] != 'http') AND ($vv["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($vv["picfirst"]); ?>"
<?php elseif(($vv["match"] != 'http') AND ($vv["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($vv["picfirst"]); ?>"<?php endif; ?>></a></dt>
          <dd><a href="<?php echo U('News/detail',array('news_id'=>$vv['news_id']));?>"><h1><?php echo ($vv["news_title"]); ?></h1><p class="lib-list-wz fl"><?php echo ($vv["description"]); ?></p></a>
            <p class="fl fs1 l-gray rqi-a"><?php echo ($vv["add_time"]); ?></p>
          </dd>
        </dl>
      </div>
	  <?php else: ?>
	  	  <div class="news-list fl">
        <dl class="news-pic fl">
          <dt><a href="<?php echo U('News/detail',array('news_id'=>$vv['news_id']));?>"><img <?php if(($vv["pic"] != '') AND ($vv["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($vv["pic"]); ?>"
<?php elseif(($vv["match"] == 'http') AND ($vv["pic"] == '')): ?>src="<?php echo ($vv["picfirst"]); ?>"
<?php elseif(($vv["match"] == 'http') AND ($vv["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($vv["picfirst"]); ?>"
<?php elseif(($vv["match"] != 'http') AND ($vv["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($vv["picfirst"]); ?>"
<?php elseif(($vv["match"] != 'http') AND ($vv["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($vv["picfirst"]); ?>"<?php endif; ?>></a></dt>
          <dd><a href="<?php echo U('News/detail',array('news_id'=>$vv['news_id']));?>"><?php echo ($vv["news_title"]); ?></a>
            <p class="fl fs1 l-gray rqi"><?php echo ($vv["add_time"]); ?></p>
          </dd>
        </dl>
      </div><?php endif; endforeach; endif; ?>
    </div><?php endforeach; endif; ?>
  </section>

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