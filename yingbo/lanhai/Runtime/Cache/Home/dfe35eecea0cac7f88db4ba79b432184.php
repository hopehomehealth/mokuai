<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equivmetahttp-equiv="x-ua-compatible"content="IE=7"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta content="北京蓝海长青规划设计研究有限公司,蓝海资讯,蓝海头条,军民融合,长青论坛" name="keywords"/>
    <meta content="北京蓝海长青规划设计研究有限公司，是一家以军事和安全为主，涉及经济、科技、国际战略、管理科学、社会发展、政策研究等领域的商业化新型高端智库，也是一家军民融合产业发展规划设计、建设运营、战略投资、顾问管理公司。" name="description"/>
    <title><?php echo ($title); ?></title>
	<base target="_blank"/>
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
        <li <?php if((ACTION_NAME == lanhaizixun) OR ($lan_id == 18) OR ($lan_id == 19) OR ($lan_id == 20) OR ($lan_id == 21) OR ($lan_id == 22) OR ($lan_id == 23)): ?>class="cur"<?php endif; ?>>            <a href="<?php echo U('News/lanhaizixun');?>"><?php echo ($lanhaizixun1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
 <?php if(is_array($lanhaizixun2)): foreach($lanhaizixun2 as $key=>$v): if($v["url"] == ''): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>
                </div>
        </li>
        <li <?php if((ACTION_NAME == junminronghe) OR ($lan_id == 24) OR ($lan_id == 25) OR ($lan_id == 26) OR ($lan_id == 27) OR ($lan_id == 28)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/junminronghe');?>"><?php echo ($junminronghe1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
    <?php if(is_array($junminronghe2)): foreach($junminronghe2 as $key=>$v): if($v["url"] == ''): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>


                </div>
        </li>
        <li <?php if((ACTION_NAME == zixunfuwu) OR ($lan_id == 29) OR ($lan_id == 30) OR ($lan_id == 31) OR ($lan_id == 32) OR ($lan_id == 33) OR (CONTROLLER_NAME == Tushu) OR (CONTROLLER_NAME == Advice)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/zixunfuwu');?>"><?php echo ($zixunfuwu1[0]['lan_title']); ?></a>
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
        <li id="zuih" <?php if((ACTION_NAME == fabu) AND (CONTROLLER_NAME == News)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/fabu');?>"><?php echo ($lanhaifabu[0]['lan_title']); ?></a></li>
    </ul>
</div>
<!--menu-->

<div style="width:1000px;height:450px;margin:20px auto">
<?php echo ($gongyue); ?>
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