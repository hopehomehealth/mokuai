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
        <div class="banner" id="banner" >
            <?php if(is_array($bannerinfo1)): foreach($bannerinfo1 as $key=>$v): ?><a href="<?php echo ($v["url"]); ?>" class="d1"><img src="<?php echo (SITE_URL); echo ($v["pic_big"]); ?>" alt=""></a><?php endforeach; endif; ?>


            <div class="d2" id="banner_id">
                <ul>
                    <?php if(is_array($bannerinfo1)): foreach($bannerinfo1 as $key=>$v): ?><li></li><?php endforeach; endif; ?>

                </ul>
            </div>
        </div>
        <script type="text/javascript">banner()</script>
    </section>
    <!--*****banner*****-->
    <!--*****menu*****-->
    <section>
    <ul class="xg-menu fl">
    <li class="b-bule"><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><span class="nav-k fl"><img src="<?php echo (MIMG_URL); ?>tb_01.png" alt=""><br /><?php echo ($guanyu1[0]['lan_title']); ?></span></a></li>
    <li class="b-green"><a href="<?php echo U('News/newslist',array('lan_id'=>3));?>"><span class="nav-k fl"><img src="<?php echo (MIMG_URL); ?>tb_02.png" alt=""><br /><?php echo ($toutiao1[0]['lan_title']); ?></span></a></li>
                        <li class="b-bule"><a href="<?php echo U('News/lanhailist',array('pid'=>4));?>"><span class="nav-k fl"><img src="<?php echo (MIMG_URL); ?>tb_03.png" alt=""><br /><?php echo ($lanhaizixun1[0]['lan_title']); ?></span></a></li>
                        <li class="b-green"><a href="<?php echo U('News/lanhailist',array('pid'=>5));?>"><span class="nav-k fl"><img src="<?php echo (MIMG_URL); ?>tb_04.png" alt=""><br /><?php echo ($junminronghe1[0]['lan_title']); ?></span></a></li>
                        <li class="b-green"><a href="<?php echo U('News/lanhailist',array('pid'=>6));?>"><span class="nav-k fl"><img src="<?php echo (MIMG_URL); ?>tb_05.png" alt=""><br /><?php echo ($zixunfuwu1[0]['lan_title']); ?></span></a></li>
                        <li class="b-bule"><a href="<?php echo U('Bbs/blog');?>"><span class="nav-k fl"><img src="<?php echo (MIMG_URL); ?>tb_06.png" alt=""><br /><?php echo ($changqingluntan1[0]['lan_title']); ?></span></a></li>
                        <li class="b-green"><a href="<?php echo U('News/newslist',array('lan_id'=>8));?>"><span class="nav-k fl"><img src="<?php echo (MIMG_URL); ?>tb_07.png" alt=""><br /><?php echo ($gongyi[0]['lan_title']); ?></span></a></li>
                        <li class="b-bule"><a href="<?php echo U('News/newslist',array('lan_id'=>9));?>"><span class="nav-k fl"><img src="<?php echo (MIMG_URL); ?>tb_08.png" alt=""><br /><?php echo ($lanhaifabu[0]['lan_title']); ?></span></a></li>

    </ul>
        <!--<div class="find_nav">
            <div class="find_nav_left">
                <div class="find_nav_list">
                    <ul>
                        <li class="find_nav_cur"><a href="<?php echo U('News/gongsijianjie');?>"><span class="nav-k fl b-bule"><img src="<?php echo (MIMG_URL); ?>tb_01.png" alt=""><?php echo ($guanyu1[0]['lan_title']); ?></span></a></li>
                        <li><a href="<?php echo U('News/newslist',array('lan_id'=>3));?>"><span class="nav-k fl b-green"><img src="<?php echo (MIMG_URL); ?>tb_02.png" alt=""><?php echo ($toutiao1[0]['lan_title']); ?></span></a></li>
                        <li><a href="<?php echo U('News/newslist',array('lan_id'=>18));?>"><span class="nav-k fl b-bule"><img src="<?php echo (MIMG_URL); ?>tb_03.png" alt=""><?php echo ($lanhaizixun1[0]['lan_title']); ?></span></a></li>
                        <li><a href="<?php echo U('News/newslist',array('lan_id'=>24));?>"><span class="nav-k fl b-green"><img src="<?php echo (MIMG_URL); ?>tb_04.png" alt=""><?php echo ($junminronghe1[0]['lan_title']); ?></span></a></li>
                        <li><a href="<?php echo U('News/newslist',array('lan_id'=>29));?>"><span class="nav-k fl b-bule"><img src="<?php echo (MIMG_URL); ?>tb_05.png" alt=""><?php echo ($zixunfuwu1[0]['lan_title']); ?></span></a></li>
                        <li><a href="<?php echo U('Bbs/blog');?>"><span class="nav-k fl b-green"><img src="<?php echo (MIMG_URL); ?>tb_06.png" alt=""><?php echo ($changqingluntan1[0]['lan_title']); ?></span></a></li>
                        <li><a href="<?php echo U('News/newslist',array('lan_id'=>8));?>"><span class="nav-k fl b-bule"><img src="<?php echo (MIMG_URL); ?>tb_07.png" alt=""><?php echo ($gongyi[0]['lan_title']); ?></span></a></li>
                        <li><a href="<?php echo U('News/newslist',array('lan_id'=>24));?>"><span class="nav-k fl b-green"><img src="<?php echo (MIMG_URL); ?>tb_08.png" alt=""><?php echo ($lanhaifabu[0]['lan_title']); ?></span></a></li>
                    </ul>
                </div>
            </div>
        </div>-->
    </section>
    <!--*****menu*****-->
    <!--*****headline*****-->
    <section>
        <div class="h-l pb1 fl">
            <p class="h-l-tt">蓝海<span class="d-red">头条</span><span class="fr pr2 fs1"><a href="<?php echo U('News/newslist',array('lan_id'=>3));?>">更多>></a></span></p>
            <div class="h-l-ad">
                <ul class="hiSlider hiSlider3">
                    <?php if(is_array($toutiaoinfo1)): foreach($toutiaoinfo1 as $key=>$v): ?><li class="hiSlider-item"><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picmobile"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>  alt="<?php echo ($v["news_title"]); ?>"></a> </li><?php endforeach; endif; ?>
                </ul>
            </div>
            <ul class="h-l-list fl">
                <?php if(is_array($toutiaoinfo2)): foreach($toutiaoinfo2 as $key=>$v): ?><li><span class="dian fl"></span><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><?php echo ($v["news_title"]); ?></a>
					<!--<span class="fr fs1 l-gray"><?php echo ($v["add_time"]); ?></span>-->
					</li><?php endforeach; endif; ?>
            </ul>
        </div>
    </section>
    <!--*****headline*****-->
    <!--*****news*****-->
    <section>
        <div class="h-l pb1 fl">
            <p class="h-l-tt">蓝海<span class="d-red">资讯</span><span class="fr pr2 fs1"><a href="<?php echo U('News/lanhailist',array('pid'=>4));?>">更多>></a></span></p>
            <div class="news-list fl">
                <?php if(is_array($lanhaizixunclickinfo)): foreach($lanhaizixunclickinfo as $key=>$v): ?><dl class="news-pic fl">
                        <dt><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>></a></dt>
                        <dd><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["news_title"])),0,60,'utf-8')); ?></a>
                            <p class="fl fs1 l-gray rqi"><?php echo ($v["add_time"]); ?></p>
                        </dd>
                    </dl><?php endforeach; endif; ?>

            </div>
        </div>
    </section>
    <!--*****news*****-->
    <!--*****fuse*****-->
    <section>
        <div class="h-l pb1 fl">
            <p class="h-l-tt">军民<span class="d-red">融合</span><span class="fr pr2 fs1"><a href="<?php echo U('News/lanhailist',array('pid'=>5));?>">更多>></a></span></p>
            <div class="news-list fl">
                <?php if(is_array($junminrongheinfo)): foreach($junminrongheinfo as $key=>$v): ?><dl class="news-pic fl">
                        <dt><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>></a></dt>
                        <dd><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["news_title"])),0,60,'utf-8')); ?></a>
                            <p class="fl fs1 l-gray rqi"><?php echo ($v["add_time"]); ?></p>
                        </dd>
                    </dl><?php endforeach; endif; ?>
            </div>
        </div>
    </section>
    <!--*****fuse*****-->
    <!--*****advice*****-->
    <section>
        <div class="h-l pb1 fl">
            <p class="h-l-tt">咨询<span class="d-red">服务</span><span class="fr pr2 fs1"><a href="<?php echo U('News/lanhailist',array('pid'=>6));?>">更多>></a></span></p>
            <div class="news-list fl">
                <?php if(is_array($zixunfuwuinfo)): foreach($zixunfuwuinfo as $key=>$v): ?><dl class="news-pic fl">
                        <dt><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>></a></dt>
                        <dd><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["news_title"])),0,60,'utf-8')); ?></a>
                            <p class="fl fs1 l-gray rqi"><?php echo ($v["add_time"]); ?></p>
                        </dd>
                    </dl><?php endforeach; endif; ?>


            </div>
        </div>
    </section>
    <!--*****advice*****-->
    <!--*****ad*****-->
    <section>
        <p class="ad">
                 <?php if(is_array($bannerinfo2)): foreach($bannerinfo2 as $key=>$v): ?><a href="<?php echo ($v["url"]); ?>"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"></a><?php endforeach; endif; ?>
        </p>
    </section>
    <!--*****ad*****-->
    <!--*****forum*****-->
    <section>
        <div class="h-l pb1 fl">
            <p class="h-l-tt">长青<span class="d-red">论坛</span><span class="fr pr2 fs1"> <a href="<?php echo U('Bbs/bbs');?>">更多>></a> </span></p>
            <div class="news-list fl">
                <?php if(is_array($boards)): $i = 0; $__LIST__ = $boards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><dl class="forum-pic fl">
                    <dt><a href="/index.php/Mobile/Posts/postlist/board_id/<?php echo ($info["board_id"]); ?>"><?php if($info["board_img"] != ''): ?><img src="<?php echo ($info["board_img"]); ?>"><?php else: ?><img src="<?php echo (MIMG_URL); ?>images_13.png"><?php endif; ?></a></dt>
                    <dd><a href="/index.php/Mobile/Posts/postlist/board_id/<?php echo ($info["board_id"]); ?>"><?php echo ($info["board_title"]); ?></a>
                        <p class="w100 fl l-gray fs1">今日：<?php echo ($info["todposts"]); ?>　帖数：<?php echo ($info["posts"]); ?></p>
                        <p class="w100 fl l-gray fs1-2 t-w"><a href="/index.php/Mobile/Posts/detail/post_id/<?php echo ($info["post_id"]); ?>"><?php echo ($info["topic"]); ?></a>  <?php echo ($info["ctime"]); ?>  <?php echo ($info["username"]); ?></p>
                    </dd>
                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </section>
    <!--*****forum*****-->

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