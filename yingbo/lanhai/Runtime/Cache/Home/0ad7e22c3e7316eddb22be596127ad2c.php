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


<!-------banner------->
<?php if(!empty($adinfo0)): ?><p class="com-banner pt10">
    <?php if(is_array($adinfo0)): foreach($adinfo0 as $key=>$v): ?><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /><?php endforeach; endif; ?>
</p><?php endif; ?>
<!-------第一通栏------->

<div class="column-c pt10 pb30">
    <!--****左边第一通栏****-->
    <div class="set-lis-l fl">
        <p class="nhtt-tit fl"><img src="<?php echo (HIMG_URL); ?>images_145.jpg" alt="网上图书馆" /></p>
        <ul class="lib-list fl">
            <li>
                <dl class="lib-con fl pt15">
                    <?php if(is_array($info1)): foreach($info1 as $key=>$v): ?><dd>
                            <p class="fl fs22 w100"><?php echo ($v["news_title"]); ?></p>
                            <p class="w100 set-lis-plgz fl fs12 pt10"><?php echo ($v["add_time"]); ?><span class="pl20"><img src="<?php echo (HIMG_URL); ?>images_07.png" alt="" /><?php echo ($v["click"]); ?></span></p>
                            <p><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["description"])),0,230,'utf-8')); ?>...</p>
                            <p class="lib-con-an fl mr20"><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>">在线阅读</a></p>
                            <p class="lib-con-an fl"><a target="_blank" href="<?php echo U('Tushu/downFile',array('news_id'=>$v['news_id']));?>">PDF文件下载</a></p>
                        </dd>
                        <dt><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>/></dt><?php endforeach; endif; ?>

                </dl>
            </li>

            <?php if(is_array($info)): foreach($info as $key=>$v): ?><li>

                    <dl class="lib-con-a fl">
                        <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> /></a></dt>
                        <dd>
                            <a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><p class="fs20 tion-wz fl pb10"><?php echo ($v["news_title"]); ?></p></a>
                            <p class="fr"><a target="_blank" href="<?php echo U('Tushu/downFile',array('news_id'=>$v['news_id']));?>"><img src="<?php echo (HIMG_URL); ?>images_09.png" /><br />
                                下载文件</a></p>
                            <p class="w485"> <?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["description"])),0,66,'utf-8')); ?>... <span class="w100 fl fs12 pt25 l-gray"><?php echo ($v["add_time"]); ?><span class="pl20 fr l-gray"><img src="<?php echo (HIMG_URL); ?>images_07.png" alt="" />&nbsp;<?php echo ($v["click"]); ?></span></span> </p>
                        </dd>
                    </dl>


            </li><?php endforeach; endif; ?>
            <style type="text/css">
                .page { width: 365px; margin: 0px auto; overflow: hidden; padding-top:20px;}
                .page li { border: 1px #ddd solid; float: left; color: #004084; text-align: center; margin-right: 10px; }
                .page li a { color: #004084; padding: 5px 10px; display: block; }
                .page li a:hover { background: #004084; color: #fff; display: block; text-decoration: none; }
            </style>

        </ul>
        <ul class="page">
            <?php echo ($page); ?>
        </ul>
    </div>
    <!--****右边通栏****-->
    <div class="set-lis-r fr">
        <!--****右边第一通栏****-->

        <!--****右边第三通栏****-->
        <div class="set-lis-tj fl">
            <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_108.jpg"  alt=""/></p>
            <ul class="set-lis-list fl pt15">  <?php if(is_array($clickinfo1)): foreach($clickinfo1 as $key=>$v): ?><dl class="set-lis-pic fl pb10">

                        <dt><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>   alt=""/></a></dt>
                        <dd><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r"),array("","","","",""),strip_tags($v["description"])),0,33,'utf-8')); ?>...</a></dd>


                </dl><?php endforeach; endif; ?>
                <?php if(is_array($clickinfo2)): foreach($clickinfo2 as $key=>$v): ?><li><a target="_blank" href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>





                <?php if(!empty($adinfo3)): if(is_array($adinfo3)): foreach($adinfo3 as $key=>$v): ?><p class="pt15"> <img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" />  </p><?php endforeach; endif; endif; ?>
		<?php if(!empty($adinfo4)): if(is_array($adinfo4)): foreach($adinfo4 as $key=>$v): ?><p class="pt15"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /> </p><?php endforeach; endif; endif; ?>
		<?php if(!empty($adinfo5)): if(is_array($adinfo5)): foreach($adinfo5 as $key=>$v): ?><p class="pt15"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /> </p><?php endforeach; endif; endif; ?>
            </ul>
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
    <a class="consult" target="_blank"><div class="phone" style="display:none;">联系电话：010-83671790</div></a>
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