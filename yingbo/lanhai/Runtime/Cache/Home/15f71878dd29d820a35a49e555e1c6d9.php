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
<notemty name="adinfo0">
<p class="com-banner pt10">
    <?php if(is_array($adinfo0)): foreach($adinfo0 as $key=>$v): ?><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /><?php endforeach; endif; ?>
</p>
</notempty>
<!--banner-->

<!--第一通栏-->
<div class="column-c pt10 ser">
  <div class="ser-left fl">
    <p class="ser-tit fl"><a href="<?php echo U('Index/index');?>" class="bule fwb">首页</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><a href="<?php echo U('Bbs/index',array('lan_id'=>7));?>">长青论坛</a></p>
    <p class="ser-tit fl"><img src="<?php echo (HIMG_URL); ?>images_45.jpg" alt="" /><span class="l-gray">今日：</span><?php echo ((isset($today) && ($today !== ""))?($today):0); ?>&nbsp;<img src="<?php echo (HIMG_URL); ?>images_104.jpg" />&nbsp;<img src="<?php echo (HIMG_URL); ?>images_98.jpg" alt="" /><span class="l-gray">昨日：</span><?php echo ((isset($yesterday) && ($yesterday !== ""))?($yesterday):0); ?>&nbsp;<img src="<?php echo (HIMG_URL); ?>images_104.jpg" />&nbsp;<img src="<?php echo (HIMG_URL); ?>images_98.jpg" alt="" /><span class="l-gray">主题：</span><?php echo ((isset($totalcount) && ($totalcount !== ""))?($totalcount):0); ?>&nbsp;&nbsp;<img src="<?php echo (HIMG_URL); ?>images_98.jpg" alt="" /><span class="l-gray">会员：</span><?php echo ((isset($members) && ($members !== ""))?($members):0); ?></p>
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

<div class="column-c pt10">
  <!--ad-->
  <style>
    /**********hiSlider滚动*****************/
    .hiSlider{
      overflow: hidden;
      height:295px;
      width: 540px;
      background: #eee;
    }
    .hiSlider-item{
      float: left;
      overflow: hidden;
      width: 540px;
    }
    .hiSlider-item img{
      width:540px;
      height:295px;
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
  <div class="coniner fl">
  <ul class="hiSlider hiSlider1">
   <?php if(is_array($scrolllist)): foreach($scrolllist as $key=>$info): ?><li data-title="<?php echo ($info["title"]); ?>" class="hiSlider-item"><a href="/index.php/Home/Famous/detail/sland_id/<?php echo ($info["sland_id"]); ?>"><img src="<?php echo ($info["sland_img"]); ?>"/></a></li><?php endforeach; endif; ?>
	</ul>
 </div>
  <div class="set-jh fr" style="min-height:324px">
    <ul class="set-tit-a fl">
      <li class="current">新主题</li>
      <li>精华贴</li>
      <!-- <li>新动态</li> -->
    </ul>
    <div>
      <div class="set-txt-a fl current">
        <ul class="set-list fl">
          <?php if(is_array($xintie)): foreach($xintie as $key=>$xininfo): ?><li><a href="/index.php/Home/Posts/detail/post_id/<?php echo ($xininfo["post_id"]); ?>"><span class="red">[<?php echo ($xininfo["board_title"]); ?>]</span><?php echo ($xininfo["topic"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
      </div>
      <div class="set-txt-a fl">
        <ul class="set-list fl">
          <?php if(is_array($jinghua)): foreach($jinghua as $key=>$jinghuainfo): ?><li><a href="/index.php/Home/Posts/detail/post_id/<?php echo ($jinghuainfo["post_id"]); ?>"><span class="red">[<?php echo ($jinghuainfo["board_title"]); ?>]</span><?php echo ($jinghuainfo["topic"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
      </div>

  </div>
</div>

<!--第三通栏-->
<div class="column-c">
  <p class="view"><span class="fr"><a href="<?php echo U('Blog/index',array('lan_id'=>34));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_99.jpg" alt="常青博客" /></p>
  <div class="set-bk fl" style="width:1000px">
    <ul class="set-bk-list fl" style="width:100%">
      <?php if(is_array($articles)): foreach($articles as $key=>$info): ?><li style="width:32%"><a href="/index.php/Home/Blog/detail/art_id/<?php echo ($info["art_id"]); ?>"><?php echo (str_replace('...','',cutstr($info["title"],20))); ?></a></li><?php endforeach; endif; ?>
    </ul>

  </div>
</div>

<!--第四通栏-->
<div class="column-c pt22">
  <p class="view"><span class="fr"><a href="<?php echo U('Posts/postlist',array('lan_id'=>35));?>">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_100.jpg" alt="<?php echo ($oneinfo["board_title"]); ?>" /></p>

  <!-- <p class="view"><span class="fr"><a href="/index.php/Home/Posts/postlist}">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_101.jpg" alt="<?php echo ($oneinfo["board_title"]); ?>" /></p> -->

  <ul class="view-c fl">
    <?php if(is_array($boards)): $i = 0; $__LIST__ = $boards;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$twoinfo): $mod = ($i % 2 );++$i;?><li style="width:480px;">
      <dl class="fl">
        <dt><a style="display:inline-block;width:30px;height:30px;overflow:hidden" href="/index.php/Home/Posts/postlist/board_id/<?php echo ($twoinfo["board_id"]); ?>/lan_id/35"><?php if($twoinfo["board_img"] != ''): ?><img style="width:30px" src="<?php echo ($twoinfo["board_img"]); ?>" /><?php else: ?><img style="width:30px" src="<?php echo (HIMG_URL); ?>images_36.jpg" /><?php endif; ?></a></dt>
        <dd>
          <p class="view-c-t fl"><a href="/index.php/Home/Posts/postlist/board_id/<?php echo ($twoinfo["board_id"]); ?>/lan_id/35"><?php echo ($twoinfo["board_title"]); ?></a></p>
          <p class="fl fs12">今日：<?php echo ($twoinfo["todposts"]); ?>　帖数：<?php echo ($twoinfo["posts"]); ?></p>
          <p class="fl fs12" style="clear:right;width:100%"><span class="fl view-c-t1"><a href="/index.php/Home/Posts/detail/post_id/<?php echo ($twoinfo["post_id"]); ?>"><?php echo (str_replace('...','',cutstr($twoinfo["topic"],10))); ?></a></span> <span class="fr gray"><?php echo ($twoinfo["ctime"]); ?></span> &nbsp;&nbsp;<?php echo ($twoinfo["username"]); ?></p>
        </dd>
      </dl>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</div>
<!--广告位-->
<?php if(!empty($adinfo1)): ?><p class="column-c ad1 pt10">
    <?php if(is_array($adinfo1)): foreach($adinfo1 as $key=>$v): ?><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /><?php endforeach; endif; ?>
</p><?php endif; ?>
<!--名家讲坛-->
<div class="column-c pt22">
  <p class="view"><span class="fr"><a href="/index.php/Home/Famous/famousbbs/lan_id/36">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_101.jpg" alt="名家讲坛" /></p>
  <ul class="view-c fl">
  <?php if(is_array($famous1)): $i = 0; $__LIST__ = $famous1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info1): $mod = ($i % 2 );++$i;?><li style="width:480px;">
    <dl class="fl">
      <dt style="width:26px;height:26px;overflow:hidden;border-radius:50%"><a href="/index.php/Home/Famous/slanders1/f_id/<?php echo ($info1["f_id"]); ?>"><img style="width:26px" src="<?php echo ($info1["f_photo"]); ?>" /></a></dt>
      <dd>
        <p class="view-c-t fl"><a href="/index.php/Home/Famous/slanders1/f_id/<?php echo ($info1["f_id"]); ?>"><?php echo ($info1["f_name"]); ?></a></p>
        <p class="fl fs12">文章：<?php echo ($info1["f_artnums"]); ?>　<!-- 粉丝：<?php echo ($info1["f_fans"]); ?> --></p>
        <p class="fl fs12" style='clear:both;width:100%'><span class="view-c-t1 fl"><a href="/index.php/Home/Famous/detail/sland_id/<?php echo ($info1["sland_id"]); ?>"><?php echo (str_replace('...','',cutstr($info1["title"],20))); ?></a></span> <span class="fr gray">&nbsp;<?php echo ($info1["add_time"]); ?></span></p>
      </dd>
    </dl>
  </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<!--第七通栏-->
<div class="column-c pt22">
  <p class="view"><span class="fr"><a href="/index.php/Home/Famous/character/lan_id/37">更多》</a></span><img src="<?php echo (HIMG_URL); ?>images_102.jpg" alt="名家讲坛" /></p>
  <ul class="set-rw-c fl">
    <?php if(is_array($famous2)): $i = 0; $__LIST__ = $famous2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info2): $mod = ($i % 2 );++$i;?><li <?php if(($i == count($famous2)) OR ($i == count($famous2)-1) OR ($i == count($famous2)-2)): ?>style="width:320px;border-bottom:0"<?php else: ?>style="width:320px;"<?php endif; ?>>
      <dl class="set-rw fl">
        <dt><a href="/index.php/Home/Famous/slanders2/f_id/<?php echo ($info2["f_id"]); ?>"><img src="<?php echo ($info2["f_photo"]); ?>" alt="" /></a></dt>
        <dd><a href="/index.php/Home/Famous/slanders2/f_id/<?php echo ($info2["f_id"]); ?>"><?php echo ($info2["f_name"]); ?></a><br />
          <span class="l-gray fs12"><img src="<?php echo (HIMG_URL); ?>images_92.jpg" alt="" />&nbsp;<?php echo ($info2["f_province"]); ?></span><br />
          <span class="l-gray fs12">发表文章：</span><span class="fs12 pr20"><?php echo ($info2["f_artnums"]); ?></span> <span class="l-gray fs12">粉丝：</span><span class="fs12"><?php echo ($info2["f_fans"]); ?></span><br />
          <a href="javascript:void(0)" onclick="follow('/index.php/Home/Famous/follow/f_id/'+<?php echo ($info2['f_id']); ?>)"><img src="<?php echo (HIMG_URL); ?>images_93.jpg" /></a></dd>
      </dl>
    </li><?php endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</div>
</div>
<!--第八通栏-->
<?php if(!empty($adinfo2)): ?><p class="column-c ad1 pb30">
    <?php if(is_array($adinfo2)): foreach($adinfo2 as $key=>$v): ?><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /><?php endforeach; endif; ?>
</p><?php endif; ?>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>famous.js"></script>



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