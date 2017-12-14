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
<?php if(is_array($guanyu2)): foreach($guanyu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><li><a href="<?php echo U('News/gongsijianjie',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 11)): ?>
<li><a href="<?php echo U('News/qiyejingshen',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 12)): ?>
<li><a href="<?php echo U('News/yewufanwei',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 13)): ?>
<li><a href="<?php echo U('News/zuzhijiagou',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 14)): ?>
<li><a href="<?php echo U('News/zhuanjiaduiwu',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 15)): ?>
<li><a href="<?php echo U('News/rencaizhaopin',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
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
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>24));?>"><?php echo ($lanhaifabu[0]['lan_title']); ?></a></li>
    </ul>
</header>

<!--*****header*****-->


<div class="main"> 
  <!--*****banner*****-->
  <section>
    <div class="nht-xl fl">
      <p class="lin-tt">蓝海<span class="d-red">头条</span><span class="nht-tt fr">&nbsp;</span></p>
      <ul class="nht-sumenu fr">
        <li><a href="nhtt.html">蓝海视点</a></li>
        <li><a href="nhtt.html">军事动态</a></li>
        <li><a href="nhtt.html">安全纵横</a></li>
        <li><a href="nhtt.html">尖端科技</a></li>
        <li><a href="nhtt.html">思海揽胜</a></li>
        <li><a href="nhtt.html">开心乐园</a></li>
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
        <li class="hiSlider-item"><img src="images/images_10.png" alt="中国隐形轰炸机曝光 空军司令员发话"></li>
        <li class="hiSlider-item"><img src="images/images_03.png" alt="外媒称中国鼓励缅甸内战获利 专家:低估中国"></li>
        <li class="hiSlider-item"><img src="images/images_10.png" alt="俄媒：印欲向俄购买射程缩短版口径巡航导弹"></li>
        <li class="hiSlider-item"><img src="images/images_03.png" alt="战机赴俄参赛 火箭弹对地攻击唯一全中"></li>
        <li class="hiSlider-item"><img src="images/images_10.png" alt="中国隐形轰炸机曝光 空军司令员发话"></li>
      </ul>
    </div>
  </section>
  <!--*****banner*****--> 
  <!--*****news*****-->
  <section>
    <div class="h-l pb1 fl">
      <p class="h-l-tt">蓝海<span class="d-red">视点</span></p>
      <div class="news-list fl">
        <dl class="news-pic fl">
          <dt><a href="nhtt_final.html"><img src="images/images_22.png"></a></dt>
          <dd><a href="nhtt_final.html">越南出兵改变南海现状 黄岩岛中国来了</a>
            <p class="fl fs1 l-gray rqi">2016-09-05  12:56:59</p>
          </dd>
        </dl>
        <dl class="news-pic fl">
          <dt><a href="nhtt_final.html"><img src="images/images_25.png"></a></dt>
          <dd><a href="nhtt_final.html">越南出兵改变南海现状 黄岩岛中国来了</a>
            <p class="fl fs1 l-gray rqi">2016-09-05  12:56:59</p>
          </dd>
        </dl>
        </dl>
        <dl class="news-pic fl">
          <dt><a href="nhtt_final.html"><img src="images/images_27.png"></a></dt>
          <dd><a href="nhtt_final.html">越南出兵改变南海现状 黄岩岛中国来了</a>
            <p class="fl fs1 l-gray rqi">2016-09-05  12:56:59</p>
          </dd>
        </dl>
      </div>
    </div>
    <div class="h-l pb1 fl">
      <p class="h-l-tt">蓝海<span class="d-red">视点</span></p>
      <div class="news-list fl">
        <dl class="news-pic fl">
          <dt><a href="nhtt_final.html"><img src="images/images_22.png"></a></dt>
          <dd><a href="nhtt_final.html">越南出兵改变南海现状 黄岩岛中国来了</a>
            <p class="fl fs1 l-gray rqi">2016-09-05  12:56:59</p>
          </dd>
        </dl>
        <dl class="news-pic fl">
          <dt><a href="nhtt_final.html"><img src="images/images_25.png"></a></dt>
          <dd><a href="nhtt_final.html">越南出兵改变南海现状 黄岩岛中国来了</a>
            <p class="fl fs1 l-gray rqi">2016-09-05  12:56:59</p>
          </dd>
        </dl>
        </dl>
        <dl class="news-pic fl">
          <dt><a href="nhtt_final.html"><img src="images/images_27.png"></a></dt>
          <dd><a href="nhtt_final.html">越南出兵改变南海现状 黄岩岛中国来了</a>
            <p class="fl fs1 l-gray rqi">2016-09-05  12:56:59</p>
          </dd>
        </dl>
      </div>
    </div>
    <div class="h-l pb1 fl">
      <p class="h-l-tt">蓝海<span class="d-red">视点</span></p>
      <div class="news-list fl">
        <dl class="news-pic fl">
          <dt><a href="nhtt_final.html"><img src="images/images_22.png"></a></dt>
          <dd><a href="nhtt_final.html">越南出兵改变南海现状 黄岩岛中国来了</a>
            <p class="fl fs1 l-gray rqi">2016-09-05  12:56:59</p>
          </dd>
        </dl>
        <dl class="news-pic fl">
          <dt><a href="nhtt_final.html"><img src="images/images_25.png"></a></dt>
          <dd><a href="nhtt_final.html">越南出兵改变南海现状 黄岩岛中国来了</a>
            <p class="fl fs1 l-gray rqi">2016-09-05  12:56:59</p>
          </dd>
        </dl>
        </dl>
        <dl class="news-pic fl">
          <dt><a href="nhtt_final.html"><img src="images/images_27.png"></a></dt>
          <dd><a href="nhtt_final.html">越南出兵改变南海现状 黄岩岛中国来了</a>
            <p class="fl fs1 l-gray rqi">2016-09-05  12:56:59</p>
          </dd>
        </dl>
      </div>
    </div>
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