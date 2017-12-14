<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equivmetahttp-equiv="x-ua-compatible"content="IE=7"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta content="北京蓝海长青规划设计研究有限公司,蓝海资讯,蓝海头条,军民融合,长青论坛" name="keywords"/>
    <meta content="北京蓝海长青规划设计研究有限公司，是一家以军事和安全为主，涉及经济、科技、国际战略、管理科学、社会发展、政策研究等领域的商业化新型高端智库，也是一家军民融合产业发展规划设计、建设运营、战略投资、顾问管理公司。" name="description"/>
    <title><?php echo ($title); ?></title>
<!-- <base target="_blank"/> -->
    <link href="<?php echo (HCSS_URL); ?>basic.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo (HCSS_URL); ?>style.css" rel="stylesheet" type="text/css"/>
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>jquery-1.8.3.min.js"></script>
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>banner.js"></script>
   <script type="text/javascript">
try {
var urlhash = window.location.hash;
var url= "<?php echo U('Mobile/Index/index');?>";

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
}</script>


</head>
<body>
<!--header-->
<div class="header">
    <div class="column-c">
        <p class="header-hy fl">蓝海长青—强军梦  中国梦</p>
        <ul class="header-m fr">
            <li><a href="">收藏本站</a></li>
            <li><a href="">设为首页</a></li>
        </ul>
    </div>
</div>
<div class="column-c">
    <p class="logo fl"><a href="<?php echo U('Index/index');?>"><img src="<?php echo (HIMG_URL); ?>images_03.jpg" alt="蓝海长青" /></a></p>
    <form action="/index.php/Home/News/searchlist" method="post">
        <div class="search fr">
            <p class="search_tp" > <input id="search" name="search" class="search_k fl" type="text" placeholder="请输入您要搜索的内容" />
            <button type="submit" id="shou" class="search-an"></button></p>


        </div>
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

<!--header-->
<!--menu-->
<div class="menu">
    <ul class="menu_nr">
        <li <?php if(CONTROLLER_NAME == Index): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Index/index');?>"><?php echo ($shouye[0]['lan_title']); ?></a></li>
        <li <?php if((ACTION_NAME == gongsijianjie) OR (ACTION_NAME == qiyejingshen) OR (ACTION_NAME == yewufanwei) OR (ACTION_NAME == zuzhijiagou) OR (ACTION_NAME == zhuanjiaduiwu) OR (ACTION_NAME == rencaizhaopin)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/gongsijianjie');?>"><?php echo ($guanyu1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
<?php if(is_array($guanyu2)): foreach($guanyu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><a href="<?php echo U('News/gongsijianjie',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 11)): ?>
<a href="<?php echo U('News/qiyejingshen',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 12)): ?>
<a href="<?php echo U('News/yewufanwei',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 13)): ?>
<a href="<?php echo U('News/zuzhijiagou',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 14)): ?>
<a href="<?php echo U('News/zhuanjiaduiwu',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 15)): ?>
<a href="<?php echo U('News/rencaizhaopin',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] > 40)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>




            </div>
        </li>
        <li <?php if((CONTROLLER_NAME == News) AND ($lan_id == 3)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/newslist',array('lan_id'=>3));?>"><?php echo ($toutiao1[0]['lan_title']); ?></a></li>
        <li <?php if((ACTION_NAME == lanhaizixun) OR ($lan_id == 4) OR ($lan_id == 18) OR ($lan_id == 19) OR ($lan_id == 20) OR ($lan_id == 21) OR ($lan_id == 22) OR ($lan_id == 23)): ?>class="cur"<?php endif; ?>>            <a href="<?php echo U('News/lanhaizixun');?>"><?php echo ($lanhaizixun1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
 <?php if(is_array($lanhaizixun2)): foreach($lanhaizixun2 as $key=>$v): if($v["url"] == ''): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>
                </div>
        </li>
        <li <?php if((ACTION_NAME == junminronghe) OR ($lan_id == 5) OR ($lan_id == 24) OR ($lan_id == 25) OR ($lan_id == 26) OR ($lan_id == 27) OR ($lan_id == 28)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/junminronghe');?>"><?php echo ($junminronghe1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
    <?php if(is_array($junminronghe2)): foreach($junminronghe2 as $key=>$v): if($v["url"] == ''): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>


                </div>
        </li>
        <li <?php if((ACTION_NAME == zixunfuwu) OR ($lan_id == 6) OR ($lan_id == 29) OR ($lan_id == 30) OR ($lan_id == 31) OR ($lan_id == 32) OR ($lan_id == 33) OR ($lan_id == 38) OR (CONTROLLER_NAME == Tushu) OR (CONTROLLER_NAME == Advice)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/zixunfuwu');?>"><?php echo ($zixunfuwu1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
                    <?php if(is_array($zixunfuwu2)): foreach($zixunfuwu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 29)): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 30)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 31)): ?>
<a href="<?php echo U('Fagui/falvfagui',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 32)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 38)): ?>
<a href="<?php echo U('Tushu/tushulist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 33)): ?>
<a href="<?php echo U('Advice/showlist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?></div>
        </li>
        <li <?php if((CONTROLLER_NAME == 'Bbs') OR (CONTROLLER_NAME == 'Blog') OR (CONTROLLER_NAME == 'Posts') OR (CONTROLLER_NAME == 'Famous')): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Bbs/index',array('lan_id'=>7));?>"><?php echo ($changqingluntan1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
    <?php if(is_array($changqingluntan2)): foreach($changqingluntan2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 34)): ?><a href="<?php echo U('Blog/index',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 35)): ?>
<a href="<?php echo U('Posts/postlist',array('lan_id'=>35));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 36)): ?>
<a href="<?php echo U('Famous/famousbbs',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 37)): ?>
<a href="<?php echo U('Famous/character',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>


            </div>
        </li>
        <li <?php if($lan_id == 8): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/newslist',array('lan_id'=>8));?>"><?php echo ($gongyi[0]['lan_title']); ?></a></li>
        <li id="zuih" <?php if($lan_id == 9): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/newslist',array('lan_id'=>9));?>"><?php echo ($lanhaifabu[0]['lan_title']); ?></a></li>
    </ul>
</div>
<!--menu-->



<!--banner-->
<div class="banner" id="banner" >
    <?php if(is_array($bannerinfo1)): foreach($bannerinfo1 as $key=>$v): ?><a target="_blank" href="<?php echo ($v["url"]); ?>" class="d1" style="background: url(<?php echo (SITE_URL); echo ($v["pic"]); ?>) center no-repeat #fff;
 background-size:cover;"></a><?php endforeach; endif; ?>

    <div class="d2" id="banner_id">
        <ul>
            <?php if(is_array($bannerinfo1)): foreach($bannerinfo1 as $key=>$v): ?><li></li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>
<script type="text/javascript">banner()</script>
<!------banner-->
 <style type="text/css">

	.hiSlider{
		overflow: hidden;
		height: 300px;
		width: 310px;
		background: #eee;
	}
	.hiSlider-item{
		float: left;
		width: 310px; height: 300px;
	}
	.hiSlider-item img{
		width: 310px; height: 300px;
	}
	.hiSlider-pages, .hiSlider-title {
	position: absolute;
	z-index: 3
}


.hiSlider-title {
	bottom: 0;
	width: 100%;
	padding: 6px 0;
	color: #fff;
	text-indent: 10px;
	background: rgba(0,0,0,.6);
	z-index: 2;
	 overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block;
}
.hiSlider-pages {
	bottom:40px;
	right: 10px;
	text-align: right
}
.hiSlider-pages a {
	height: 8px;
	width: 8px;
	margin: 0 3px;
	display: inline-block;
	overflow: hidden;
	text-indent: -100px;
	font-size: 0;
	border-radius: 50%;
	background: #ddd
}
.hiSlider-pages a.active {
	background: #5472BF
}

</style>
<!--第一通栏-->
<div class="column-c pt22">
    <!--ad------>
    <div class="ad fl">
    <ul class="hiSlider hiSlider1">
    <?php if(is_array($tuiinfo)): foreach($tuiinfo as $key=>$v): ?><li data-title="<?php echo ($v["news_title"]); ?>" class="hiSlider-item"><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>></a></li><?php endforeach; endif; ?>


	</ul>
        <!--<div class="container" id="idTransformView2">
            <ul class="slider slider2" id="idSlider2">
                <?php if(is_array($tuiinfo)): foreach($tuiinfo as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"/></a>
                        <div class="idSiideer-pos1 ot-wd"><?php echo ($v["news_title"]); ?></div>
                        <div class="idSiideer-pos3"></div>
                    </li><?php endforeach; endif; ?>
            </ul>
            <ul class="num" id="idNum2">
                <?php if(is_array($tuiinfo)): foreach($tuiinfo as $key=>$v): ?><li></li><?php endforeach; endif; ?>
            </ul>
        </div>-->
    </div>
    <!-------headlines------>
    <div class="headlines fl pl20">
        <p class="hlines-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$toutiaoinfo[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_10.jpg" alt="蓝海头条" /></p>
        <ul class="hlines-list li">
            <?php if(is_array($toutiaoinfo)): foreach($toutiaoinfo as $key=>$v): ?><li>
                    <h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$toutiaoinfo[0]['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <span> <?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,53,'utf-8')); ?>...</span>
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
    <!-------rank------>
    <div class="pl20 rank fl">
        <p class="rank-t"><img src="<?php echo (HIMG_URL); ?>images_37.jpg" alt="点击排行" /></p>
        <ul class="rank-list fl">
            <?php if(is_array($clickinfo)): foreach($clickinfo as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>

        </ul>
    </div>
</div>
<!-------第二通栏------>
<div class="column-c pt10">
    <p class="view"><span class="fr"><a target="_blank" href="<?php echo U('News/lanhaizixun');?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_16.jpg" alt="蓝海资讯" /></p>

    <div class="pt30">
        <div class="view-a pr20 fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$shidianinfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_22.jpg" alt="蓝海视点" /></p>
            <dl>
                <?php if(is_array($shidianinfo1)): foreach($shidianinfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($shidianinfo2)): foreach($shidianinfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="view-a pr20 fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$anquanzonghenginfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_24.jpg" alt="安全纵横" /></p>
            <dl>
                <?php if(is_array($anquanzonghenginfo1)): foreach($anquanzonghenginfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($anquanzonghenginfo2)): foreach($anquanzonghenginfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="view-a fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$sihailanshenginfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_26.jpg" alt="思海揽胜" /></p>
            <dl>
                <?php if(is_array($sihailanshenginfo1)): foreach($sihailanshenginfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($sihailanshenginfo2)): foreach($sihailanshenginfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="view-a pr20 fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$junshidongtaiinfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_40.jpg" alt="军事动态" /></p>
            <dl>
                <?php if(is_array($junshidongtaiinfo1)): foreach($junshidongtaiinfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>/></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($junshidongtaiinfo2)): foreach($junshidongtaiinfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="view-a pr20 fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$jianduankejiinfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_41.jpg" alt="尖端科技" /></p>
            <dl>
                <?php if(is_array($jianduankejiinfo1)): foreach($jianduankejiinfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($jianduankejiinfo2)): foreach($jianduankejiinfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="view-a fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$kaixinleyuaninfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_42.jpg" alt="开心乐园" /></p>
            <dl>
                <?php if(is_array($kaixinleyuaninfo1)): foreach($kaixinleyuaninfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($kaixinleyuaninfo2)): foreach($kaixinleyuaninfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
</div>
<!-------第三通栏------>
<div class="column-c pt10">
    <p class="view"><span class="fr"><a target="_blank" href="<?php echo U('News/junminronghe');?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_55.jpg" alt="军民融合" /></p>
    <div class="pt30 view-a fl pr20 ">
        <div class="view-a fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$lanhaifabuinfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_59.jpg" alt="蓝海发布" /></p>
            <dl>
                <?php if(is_array($lanhaifabuinfo1)): foreach($lanhaifabuinfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>/></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($lanhaifabuinfo2)): foreach($lanhaifabuinfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="view-a fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$chanyefazhaninfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_69.jpg" alt="产业发展" /></p>
            <dl>
                <?php if(is_array($chanyefazhaninfo1)): foreach($chanyefazhaninfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>/></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($chanyefazhaninfo2)): foreach($chanyefazhaninfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
    <div class="view-b pr20 fl pt30">
        <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$jiaoyupeixuninfo[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_61.jpg" alt="教育培训" /></p>
        <dl>
            <?php if(is_array($jiaoyupeixuninfo)): foreach($jiaoyupeixuninfo as $key=>$v): ?><dt>
                <p class="view-b-wz"><?php echo ($v["news_title"]); ?></p>   <a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>">
                <img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>  alt="教育培训" /></a></dt><?php endforeach; endif; ?>
        </dl>
    </div>
    <div class="pt30 fl view-a">
        <div class="view-a fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$wenhuachuanmeiinfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_62.jpg" alt="文化传媒" /></p>
            <dl>
                <?php if(is_array($wenhuachuanmeiinfo1)): foreach($wenhuachuanmeiinfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img   <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($wenhuachuanmeiinfo2)): foreach($wenhuachuanmeiinfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="view-a fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$anquanluntaninfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_70.jpg" alt="安全论坛" /></p>
            <dl>
                <?php if(is_array($anquanluntaninfo1)): foreach($anquanluntaninfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($anquanluntaninfo2)): foreach($anquanluntaninfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
</div>
<!-------第四通栏------>
<div class="column-c pt10">
    <p class="view"><span class="fr"><a target="_blank" href="<?php echo U('News/zixunfuwu');?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_76.jpg" alt="咨询服务" /></p>
    <div class="pt30 view-a fl pr20 ">
        <div class="view-a fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$yuanqujiansheinfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_80.jpg" alt="园区建设" /></p>
            <dl>
                <?php if(is_array($yuanqujiansheinfo1)): foreach($yuanqujiansheinfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($yuanqujiansheinfo2)): foreach($yuanqujiansheinfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="view-a fl">
            <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$kejifuwuinfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_90.jpg" alt="科技服务" /></p>
            <dl>
                <?php if(is_array($kejifuwuinfo1)): foreach($kejifuwuinfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                    <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul>
                <?php if(is_array($kejifuwuinfo2)): foreach($kejifuwuinfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
    <div class="view-d pr20 fl pt30">
        <p class="view-a-t fl"><span class="fr"><a target="_blank" href="<?php echo U('Tushu/tushulist');?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_81.jpg" alt="图书馆" /></p>
        <dl>
            <?php if(is_array($tushuguaninfo)): foreach($tushuguaninfo as $key=>$v): ?><dt>    <a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>">
                <p class="view-b-wza"><?php echo ($v["news_title"]); ?></p>
                <img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>  /></a></dt><?php endforeach; endif; ?>
        </dl>
    </div>
    <div class="pt30 fl view-a"style="width: 305px;">
        <div class="view-a-a fl">
            <p class="view-a-t fl"style="width: 305px;"><span class="fr"><a target="_blank" href="<?php echo U('Fagui/falvfagui',array('cat_id'=>1,'lan_id'=>31));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_83.jpg" alt="法规政策" /></p>

            <ul>
                <?php if(is_array($faguizhengceinfo2)): foreach($faguizhengceinfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('Fagui/falvfagui',array('cat_id'=>$v['cat_id'],'lan_id'=>31));?>"><strong><?php echo ($v["name"]); ?></strong><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["description"])),0,21,'utf-8')); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
        <div class="view-a fl" style="width: 305px;">
            <p class="view-a-t fl" style="width:305px;"><span class="fr"><a target="_blank" href="<?php echo U('News/newslist',array('lan_id'=>$rencaijiaoliuinfo1[0]['lan_id']));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_91.jpg" alt="人才交流" /></p>
            <dl style="width:305px;">
                <?php if(is_array($rencaijiaoliuinfo1)): foreach($rencaijiaoliuinfo1 as $key=>$v): ?><h5><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></h5>
                    <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img  <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                    <dd style="width: 195px;"><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["content"])),0,200,'utf-8')); ?></a></dd><?php endforeach; endif; ?>

            </dl>
            <ul style="width:305px;">
                <?php if(is_array($rencaijiaoliuinfo2)): foreach($rencaijiaoliuinfo2 as $key=>$v): ?><li style="width: 288px;"><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
</div>
<!-------第五通栏------>
<?php if(!empty($bannerinfo2)): ?><p class="column-c pt10 ad1">
    <?php if(is_array($bannerinfo2)): foreach($bannerinfo2 as $key=>$v): ?><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /><?php endforeach; endif; ?>
</p><?php endif; ?>
<!-------第六通栏------>
<div class="column-c pt22">
    <p class="view"><span class="fr"><a target="_blank" href="<?php echo U('Bbs/index',array('lan_id'=>7));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_34.jpg" alt="" /></p>
    <ul class="view-c fl">
        <?php if(is_array($boardlist)): $i = 0; $__LIST__ = $boardlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$twoinfo): $mod = ($i % 2 );++$i;?><li <?php if(($i == count($boardlist)) OR ($i == count($boardlist)-1)): ?>style="width:480px;border-bottom:0"<?php else: ?>style="width:480px;"<?php endif; ?>>
          <dl class="fl">
            <dt><a style="display:inline-block;width:30px;height:30px;overflow:hidden" href="/index.php/Home/Posts/postlist/board_id/<?php echo ($twoinfo["board_id"]); ?>/lan_id/35"><?php if($twoinfo["board_img"] != ''): ?><img style="width:30px" src="<?php echo ($twoinfo["board_img"]); ?>" /><?php else: ?><img style="width:30px" src="<?php echo (HIMG_URL); ?>images_36.jpg" /><?php endif; ?></a></dt>
            <dd>
              <p class="view-c-t fl"><a target="_blank" href="/index.php/Home/Posts/postlist/board_id/<?php echo ($twoinfo["board_id"]); ?>/lan_id/35"><?php echo ($twoinfo["board_title"]); ?></a></p>
              <p class="fl fs12">今日：<?php echo ($twoinfo["todposts"]); ?>　帖数：<?php echo ($twoinfo["posts"]); ?></p>
              <p class="fl fs12" style="clear:right;width:100%"><span class="fl view-c-t1"><a target="_blank" href="/index.php/Home/Posts/detail/post_id/<?php echo ($twoinfo["post_id"]); ?>"><?php echo (str_replace('...','',cutstr($twoinfo["topic"],10))); ?></a></span> <span class="fr gray"><?php echo ($twoinfo["ctime"]); ?></span> &nbsp;&nbsp;<?php echo ($twoinfo["username"]); ?></p>
            </dd>
          </dl>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<!-------第七通栏------>
<div class="column-c pt22">
    <ul class="Links-tit fl">
        <p class="Links-last fl"><img src="<?php echo (HIMG_URL); ?>images_106.jpg" alt="友情链接" /></p>
        <li class="current">合作伙伴</li>
        <li>政府军方网站</li>
        <li>知名智库网站</li>
        <li>知名门户网站</li>
        <span class="fr"><a target="_blank" href="<?php echo U('Link/linklist');?>">更多》</a></span>
    </ul>
    <div>
        <div class="Links-txt fl current">
            <dl class="links-list fl">
                <?php if(is_array($linkinfo1)): foreach($linkinfo1 as $key=>$v): if($v["is_no"] == 0): ?><dt><a target="_blank" href="<?php echo ($v["url"]); ?>" rel="nofollow"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /></a></dt>
                        <?php else: ?>
                        <dt><a target="_blank" href="<?php echo ($v["url"]); ?>"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /></a></dt><?php endif; endforeach; endif; ?>
            </dl>
        </div>
        <div class="Links-txt fl">
            <dl class="links-list fl">
                <?php if(is_array($linkinfo2)): foreach($linkinfo2 as $key=>$v): if($v["is_no"] == 0): ?><dt><a target="_blank" href="<?php echo ($v["url"]); ?>" rel="nofollow"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /></a></dt>
                        <?php else: ?>
                        <dt><a target="_blank" href="<?php echo ($v["url"]); ?>"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /></a></dt><?php endif; endforeach; endif; ?>

            </dl>
        </div>
        <div class="Links-txt fl">
            <dl class="links-list fl">
                <?php if(is_array($linkinfo3)): foreach($linkinfo3 as $key=>$v): if($v["is_no"] == 0): ?><dt><a target="_blank" href="<?php echo ($v["url"]); ?>" rel="nofollow"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /></a></dt>
                        <?php else: ?>
                        <dt><a target="_blank" href="<?php echo ($v["url"]); ?>"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /></a></dt><?php endif; endforeach; endif; ?>

            </dl>
        </div>
        <div class="Links-txt fl">
            <dl class="links-list fl">
                <?php if(is_array($linkinfo4)): foreach($linkinfo4 as $key=>$v): if($v["is_no"] == 0): ?><dt><a target="_blank" href="<?php echo ($v["url"]); ?>" rel="nofollow"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /></a></dt>
                        <?php else: ?>
                        <dt><a target="_blank" href="<?php echo ($v["url"]); ?>"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /></a></dt><?php endif; endforeach; endif; ?>

            </dl>
        </div>
    </div>
</div>


<!--footer-->
<div class="footer">
    <div class="column-c">
        <p class="rwm fl"><img src="<?php echo (HIMG_URL); ?>images_109.jpg" alt="二维码" /></p>
        <div class="fr w848">
            <ul class="subnav fl w285">
                <p class="subnav_t fl"><?php echo ($lanhaizixun1[0]['lan_title']); ?></p>
				 <?php if(is_array($lanhaizixun3)): foreach($lanhaizixun3 as $key=>$v): if($v["url"] == ''): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

            </ul>
            <ul class="subnav fl w285">
                <p class="subnav_t fl"><?php echo ($guanyu1[0]['lan_title']); ?></p>
             <?php if(is_array($guanyu3)): foreach($guanyu3 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><li><a href="<?php echo U('News/gongsijianjie',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
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
            <ul class="subnav fl w190" id="br-n">
                <p class="subnav_t fl"><?php echo ($changqingluntan1[0]['lan_title']); ?></p>

				    <?php if(is_array($changqingluntan3)): foreach($changqingluntan3 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 34)): ?><li><a href="<?php echo U('Blog/index',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 35)): ?>
<li><a href="<?php echo U('Posts/postlist',array('lan_id'=>35));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 36)): ?>
<li><a href="<?php echo U('Famous/famousbbs',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 37)): ?>
<li><a href="<?php echo U('Famous/character',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

            </ul>
            <p class="copyright fl">Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved. 蓝海长青 版权所有<br />
                京ICP备16050700号-1</p>
        </div>
    </div>
</div>
<div class="izl-rmenu">
    <a class="consult" target="_blank"><div class="phone" style="display:none;">联系电话：<?php echo ($webphone); ?></div></a>
    <a class="cart"><div class="pic"></div></a>
    <a href="javascript:void(0)" class="btn_top" style="display: block;"></a>
</div>
<!--footer-->
<script src="<?php echo (HJS_URL); ?>jquery.hiSlider.min.js"></script>
<script>
	$('.hiSlider1').hiSlider();
</script>
<script type="text/jscript" src="<?php echo (HJS_URL); ?>index.js"></script>
</body>
</html>