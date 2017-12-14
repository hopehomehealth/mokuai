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

<style type="text/css">
  .zhiding{color:#950909;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #950909;transform:rotate(-7deg);-ms-transform:rotate(-7deg);   /* IE 9 */-moz-transform:rotate(-7deg);  /* Firefox */-webkit-transform:rotate(-7deg); /* Safari 和 Chrome */-o-transform:rotate(-7deg); }
  .jinghua{color:#c27a4a;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #c27a4a;transform:rotate(-7deg);-ms-transform:rotate(-7deg);   /* IE 9 */-moz-transform:rotate(-7deg);  /* Firefox */-webkit-transform:rotate(-7deg); /* Safari 和 Chrome */-o-transform:rotate(-7deg); }
  .xintie{color:#eb0909;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #eb0909;transform:rotate(-7deg);-ms-transform:rotate(-7deg);   /* IE 9 */-moz-transform:rotate(-7deg);  /* Firefox */-webkit-transform:rotate(-7deg); /* Safari 和 Chrome */-o-transform:rotate(-7deg); }
  .putong{color:#999;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #999; }

</style>
<!--banner-->
<p class="com-banner pt10">
    <?php if(is_array($adinfo)): foreach($adinfo as $key=>$v): if($v["is_area"] == 0): ?><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /><?php endif; endforeach; endif; ?>

</p>
<!--banner-->

<!--第一通栏-->
<div class="column-c pt10 ser">
  <div class="ser-left fl">
    <p class="ser-tit fl"><a href="<?php echo U('Index/index');?>" class="bule fwb">首页</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><a href="<?php echo U('Bbs/index',array('lan_id'=>7));?>">长青论坛</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><a href="<?php echo U('Posts/postlist',array('lan_id'=>35));?>">巅峰论剑</a>
	<?php if(!empty($boardinfo)): ?><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><a href="<?php echo U('Posts/postlist',array('board_id'=>$boardinfo['board_id'],'lan_id'=>35));?>"><?php echo ($boardinfo["board_title"]); ?></a><?php endif; ?>

	</p>
    <p class="ser-tit fl"><img src="<?php echo (HIMG_URL); ?>images_45.jpg" alt="" /><span class="l-gray">今日：</span><?php echo ((isset($today) && ($today !== ""))?($today):0); ?>&nbsp;<img src="<?php echo (HIMG_URL); ?>images_104.jpg" />&nbsp;<span class="l-gray">昨日：</span><?php echo ((isset($yesterday) && ($yesterday !== ""))?($yesterday):0); ?>&nbsp;<img src="<?php echo (HIMG_URL); ?>images_104.jpg" />&nbsp;<img src="<?php echo (HIMG_URL); ?>images_98.jpg" alt="" /><span class="l-gray">主题：</span><?php echo ((isset($totalcount) && ($totalcount !== ""))?($totalcount):0); ?>&nbsp;&nbsp;<img src="<?php echo (HIMG_URL); ?>images_98.jpg" alt="" /><span class="l-gray">会员：</span><?php echo ((isset($members) && ($members !== ""))?($members):0); ?>&nbsp;<a class="pl20" href="/index.php/Home/Posts/createpost"><img src="<?php echo (HIMG_URL); ?>images_105.jpg" /></a></p>
  </div>
  <?php if($_SESSION['flag']== ''): ?><p class="fr"><a href="/index.php/Home/User/login">登录</a>｜<a href="/index.php/Home/User/register">注册</a></p>
  <?php else: ?>
    <dl class="set-lis fr">
      <dt><a href="/index.php/Home/User/ucenter"><img src="<?php echo ($_SESSION['userInfo']['userhead']); ?>" alt="" /></a></dt>
      <dd><a href="/index.php/Home/User/ucenter" style="line-height:40px"><?php echo ($_SESSION['userInfo']['username']); ?></a>&nbsp;|&nbsp;<a href="/index.php/Home/User/logout" style="line-height:40px;color:#999;cursor:pointer">退出</a><!-- <br />
        <span class="l-gray fs12"><img src="<?php echo (HIMG_URL); ?>images_92.jpg" alt="" />&nbsp;浙江省</span> --></dd>
    </dl><?php endif; ?>
</div>
<!--第二通栏-->
<div class="column-c pt10 pb30">
  <!--****左边通栏****-->
  <div class="set-lis-l fl">
    <!--****左边第一通栏****-->
    <ul class="set-lis_lb fl">
      <?php if(is_array($postlist)): foreach($postlist as $key=>$info): ?><li>
        <p class="set-lis-wz fl"><a href="/index.php/Home/Posts/detail/post_id/<?php echo ($info["post_id"]); ?>"><?php if($info["sort"] == 3): ?><span class="zhiding">置顶</span><?php elseif($info["sort"] == 2): ?><span class="jinghua">精华</span><?php elseif($info["sort"] == 1): ?><span class="xintie">新帖</span><?php elseif($info["sort"] == 0): ?><span class="putong">普通</span><?php endif; ?>&nbsp;<?php echo ($info["topic"]); ?></a></p>
        <p class="set-lis-nr fl w100"><?php echo ($info["body"]); ?></p>
        <p class="set-lis-plgz fl  fs12"><span class="pr15 bule"><?php echo ($info["username"]); ?></span> <?php echo (date("Y-m-d H:i:s",$info["ctime"])); ?></p>
        <p class="set-lis-plgz fr fs12"><span class="pr15"><img src="<?php echo (HIMG_URL); ?>images_06.png" alt="" /><?php echo ($info["replys"]); ?></span><span class="pr15 fl"><img src="<?php echo (HIMG_URL); ?>images_07.png" alt="" /><?php echo ($info["views"]); ?></span><!-- <a href=""><img src="<?php echo (HIMG_URL); ?>images_08.png" /></a> --></p>
      </li><?php endforeach; endif; ?>
    </ul>
    <!--****左边第二通栏****-->
    <ul class="page">
      <?php echo ($page); ?>
    </ul>
  </div>
  <!--****右边通栏****-->
  <div class="set-lis-r fr">
    <!--****右边第一通栏****-->
    <!-- <div class="set-lis-tj fl">
      <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_107.jpg" alt="" /></p>
      <ul class="set-lis-list fl pt15">
        <li><a href="ser_final.html">打遍世界所有强国的神秘之师</a></li>
        <li><a href="ser_final.html">古代存在外星人的12铁证</a></li>
        <li><a href="ser_final.html">地球周围竟存神秘入口</a></li>
        <li><a href="ser_final.html">82种外星人与地球接触</a></li>
        <li><a href="ser_final.html">古代存在外星人的12铁证</a></li>
        <li><a href="ser_final.html">地球周围竟存神秘入口</a></li>
        <li><a href="ser_final.html">82种外星人与地球接触</a></li>
        <li><a href="ser_final.html">打遍世界所有强国的神秘之师</a></li>
        <li><a href="ser_final.html">地球周围竟存神秘入口</a></li>
        <li><a href="ser_final.html">82种外星人与地球接触</a></li>
      </ul>
    </div> -->
    <!--****右边第二通栏****-->
    <div class="set-lis-tj fl">
      <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_108.jpg"  alt=""/></p>
      <ul class="set-lis-list fl pt15">
        <!-- <dl class="set-lis-pic fl pb10">
          <dt><a href="ser_final.html"><img src="<?php echo (HIMG_URL); ?>images_112.jpg"  alt=""/></a></dt>
          <dd><a href="ser_final.html">对电信诈骗受害者进行赔偿，银行会更有动力阻止电信诈骗。</a></dd>
        </dl> -->
        <?php if(is_array($hotposts)): foreach($hotposts as $key=>$info): ?><li><a href="/index.php/Home/Posts/detail/post_id/<?php echo ($info["post_id"]); ?>"><?php echo ($info["topic"]); ?></a></li><?php endforeach; endif; ?>
        <?php if(is_array($adinfo)): foreach($adinfo as $key=>$v): if($v["is_area"] == 3): ?><p class="pt15"> <img  src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" />  </p><?php endif; endforeach; endif; ?>
                <?php if(is_array($adinfo)): foreach($adinfo as $key=>$v): if($v["is_area"] == 4): ?><p class="pt15"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /> </p><?php endif; endforeach; endif; ?>
                <?php if(is_array($adinfo)): foreach($adinfo as $key=>$v): if($v["is_area"] == 5): ?><p class="pt15"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /> </p><?php endif; endforeach; endif; ?>
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