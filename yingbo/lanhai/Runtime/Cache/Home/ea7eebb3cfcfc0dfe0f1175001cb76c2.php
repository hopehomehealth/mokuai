<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equivmetahttp-equiv="x-ua-compatible"content="IE=7"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <title>蓝海长青</title>
    <link href="<?php echo (HCSS_URL); ?>basic.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo (HCSS_URL); ?>style.css" rel="stylesheet" type="text/css"/>
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>jquery-1.8.3.min.js"></script>
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>banner.js"></script>
   <!--<script type="text/javascript">
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
}</script>-->


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
        <li <?php if((ACTION_NAME == lanhaizixun) OR ($lan_id == 18) OR ($lan_id == 19) OR ($lan_id == 20) OR ($lan_id == 21) OR ($lan_id == 22) OR ($lan_id == 23)): ?>class="cur"<?php endif; ?>>
            <a href="<?php echo U('News/lanhaizixun');?>"><?php echo ($lanhaizixun1[0]['lan_title']); ?></a>
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
<a href="<?php echo U('News/falvfagui',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
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

<!--banner-->
<!-- <p class="su-banner pt10"><img src="<?php echo (HIMG_URL); ?>images_43.jpg" /></p>
 --><!--banner-->

<!--第一通栏-->
<div class="column-c pt10 ser">
  <div class="ser-left fl">
    <!--****左边第一通栏****-->
    <p class="ser-tit fl"><a href="<?php echo U('Index/index');?>" class="bule fwb">首页</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><a href="<?php echo U('Bbs/index',array('lan_id'=>7));?>">长青论坛</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><a href="<?php echo U('Posts/postlist',array('lan_id'=>35));?>">巅峰论剑</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" />中国空军大批战机护轰6K突防</p>
    <p class="ser-tit fl"><a href="/index.php/Home/Posts/createpost"><img src="<?php echo (HIMG_URL); ?>images_113.jpg" /></a></p>
  </div>
  <p class="pt30 fr"> <a href="ser_list.html"><img src="<?php echo (HIMG_URL); ?>images_114.jpg" alt="" /></a> </p>
</div>
<!--****左边第二通栏****-->
<div class="column-c pt10">
  <div class="set-lis-l fl">
    <div class="set-fi-t fl">
      <p class="set-fi-tit fl"><?php echo ($postinfo["topic"]); ?></p>
      <p class="set-fi-sm fl fs12">作者：<span class="bule pr20"><?php echo ($postinfo["username"]); ?></span> <span class="l-gray pr20"><?php echo (date($postinfo["ctime"],"Y-m-d H:i:s")); ?></span><span class="set-fi-smsz"><?php echo ($postinfo["views"]); ?></span></p>
    </div>
    <div class="set-fi fl pt15">
      <?php echo ($postinfo["body"]); ?>
    </div>
    <!--****左边第三通栏****-->
    <ul class="page">
      <li><a href="ser_list.html">首页</a></li>
      <li><a href="">上一页</a></li>
      <li><a href="">1</a></li>
      <li><a href="">2</a></li>
      <li><a href="">3</a></li>
      <li><a href="">4</a></li>
      <li><a href="">5</a></li>
      <li><a href="">下一页</a></li>
    </ul>
    <!--****左边第四通栏****-->
    <div class="set-fi-fx fs12 pt15 pb10 fl"><a href=""><img src="<?php echo (HIMG_URL); ?>images_116.jpg" /></a><span  class="fl pt5">分享到：</span><span class="fl pt5 pr15"><a href=""><img src="<?php echo (HIMG_URL); ?>images_117.jpg" />QQ好友</a></span><span class="fl pt5 pr15"><a href=""><img src="<?php echo (HIMG_URL); ?>images_118.jpg" />QQ空间</a></span><span class="fl pt5 pr15"><a href=""><img src="<?php echo (HIMG_URL); ?>images_119.jpg" />朋友圈间</a></span><span class="fl pt5 pr15 fxrw"><img src="<?php echo (HIMG_URL); ?>images_120.jpg" />微信好友</span>
      <p class="dj_xhk fr"><span class="w100 fl">打微"扫一扫"</span><img src="<?php echo (HIMG_URL); ?>images_109.jpg"><span class="w100 fl">打开网页后点击屏幕右上角分享按妞</span></p>
      <script type="text/javascript">
        $(".fxrw").click(function(){
          $(".dj_xhk").slideToggle("1000");
        });
      </script>
    </div>
    <!--****左边第五通栏****-->
    <div class="set-fi-wy fl" style="margin-top: 20px;">
      <form action="" method="get">
        <p class="set-fi-wytt fl pb10">网友评论<span class="l-gray pr20 fs12 pl20">文明上网理性发言</span><span class="fr fs12 bule">323条评论</span></p>
        <textarea class="set-fi-wyip fl" name="" cols="" rows=""></textarea>
        <div class="set-fi-wybq fl fs12 pt10"><img src="<?php echo (HIMG_URL); ?>images_128.jpg" alt="" />表情</div>
        <p class="fr pt10">
          <input name="" type="checkbox" value="" />
          &nbsp;匿名评论<a href="comment.html" class="pl20"><img src="<?php echo (HIMG_URL); ?>images_129.jpg" /></a></p>
      </form>
    </div>
    <!--****左边第六通栏****-->
    <ul class="set-fi-wy-lb fl">
      <li>
        <form action="" method="get">
          <dl class="set-fi-wy-lis fl">
            <dt><img src="<?php echo (HIMG_URL); ?>images_130.jpg" alt="" /></dt>
            <dd><span class="fl bule">966466107</span> <span class="fr l-gray">1小时前</span>
              <p class="fl pt10">如果员工自杀赖富士康，那公务员自杀又赖谁呢？再好的企业都有走极端的人！压力不仅来自企业，
                也来自生活社会和家庭，更于员工的自身减压能力有关！富士康只是一个企业，中国现在有几个在
                一个生产区内就能容纳几十万人就业的企业呢！他对社会的贡献是其他企业无法比拟和企及的！</p>
              <p class="fr"><span class="fl pr20 red">2&nbsp;&nbsp;<img src="<?php echo (HIMG_URL); ?>images_121.jpg" /></span>0&nbsp;&nbsp;<span class="showMore-t fr"></span></p>
              <div class="set-fi-wy-yinc fl">
                <textarea class="set-fi-wy-yinc-k fl" name="" cols="" rows=""></textarea>
                <div class="set-fi-wybq fl fs12 pt10"><img src="<?php echo (HIMG_URL); ?>images_128.jpg" alt="" />表情</div>
                <p class="fr pt10"><a href="" class="pl20"><img src="<?php echo (HIMG_URL); ?>images_122.jpg" /></a></p>
              </div>
            </dd>
          </dl>
        </form>
      </li>
      <li>
        <form action="" method="get">
          <dl class="set-fi-wy-lis fl">
            <dt><img src="<?php echo (HIMG_URL); ?>images_130.jpg" alt="" /></dt>
            <dd><span class="fl bule">966466107</span> <span class="fr l-gray">1小时前</span>
              <p class="fl pt10">如果员工自杀赖富士康，那公务员自杀又赖谁呢？再好的企业都有走极端的人！压力不仅来自企业，
                也来自生活社会和家庭，更于员工的自身减压能力有关！富士康只是一个企业，中国现在有几个在
                一个生产区内就能容纳几十万人就业的企业呢！他对社会的贡献是其他企业无法比拟和企及的！</p>
              <p class="fr"><span class="fl pr20 red">2&nbsp;&nbsp;<img src="<?php echo (HIMG_URL); ?>images_121.jpg" /></span>0&nbsp;&nbsp;<span class="showMore-t fr"></span></p>
              <div class="set-fi-wy-yinc fl">
                <textarea class="set-fi-wy-yinc-k fl" name="" cols="" rows=""></textarea>
                <div class="set-fi-wybq fl fs12 pt10"><img src="<?php echo (HIMG_URL); ?>images_128.jpg" alt="" />表情</div>
                <p class="fr pt10"><a href="" class="pl20"><img src="<?php echo (HIMG_URL); ?>images_122.jpg" /></a></p>
              </div>
            </dd>
          </dl>
        </form>
      </li>
      <li>
        <form action="" method="get">
          <dl class="set-fi-wy-lis fl">
            <dt><img src="<?php echo (HIMG_URL); ?>images_130.jpg" alt="" /></dt>
            <dd><span class="fl bule">966466107</span> <span class="fr l-gray">1小时前</span>
              <p class="fl pt10">如果员工自杀赖富士康，那公务员自杀又赖谁呢？再好的企业都有走极端的人！压力不仅来自企业，
                也来自生活社会和家庭，更于员工的自身减压能力有关！富士康只是一个企业，中国现在有几个在
                一个生产区内就能容纳几十万人就业的企业呢！他对社会的贡献是其他企业无法比拟和企及的！</p>
              <p class="fr"><span class="fl pr20 red">2&nbsp;&nbsp;<img src="<?php echo (HIMG_URL); ?>images_121.jpg" /></span>0&nbsp;&nbsp;<span class="showMore-t fr"></span></p>
              <div class="set-fi-wy-yinc fl">
                <textarea class="set-fi-wy-yinc-k fl" name="" cols="" rows=""></textarea>
                <div class="set-fi-wybq fl fs12 pt10"><img src="<?php echo (HIMG_URL); ?>images_128.jpg" alt="" />表情</div>
                <p class="fr pt10"><a href="" class="pl20"><img src="<?php echo (HIMG_URL); ?>images_122.jpg" /></a></p>
              </div>
            </dd>
          </dl>
        </form>
      </li>
      <a href="">
      <p class="set-more fl">加载更多</p>
      </a>
    </ul>
  </div>
  <!--****右边通栏****-->
  <div class="set-lis-r fr">
    <!--****右边第一通栏****-->
    <div class="set-lis-tj fl">
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
    </div>
    <!--****右边第二通栏****-->
    <div class="set-lis-tj fl">
      <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_108.jpg"  alt=""/></p>
      <ul class="set-lis-list fl pt15">
        <dl class="set-lis-pic fl pb10">
          <dt><a href="ser_final.html"><img src="<?php echo (HIMG_URL); ?>images_112.jpg"  alt=""/></a></dt>
          <dd><a href="ser_final.html">对电信诈骗受害者进行赔偿，银行会更有动力阻止电信诈骗。</a></dd>
        </dl>
        <li><a href="ser_final.html">打遍世界所有强国的神秘之师</a></li>
        <li><a href="ser_final.html">古代存在外星人的12铁证</a></li>
        <li><a href="ser_final.html">地球周围竟存神秘入口</a></li>
        <li><a href="ser_final.html">82种外星人与地球接触</a></li>
     <!--    <p class="pt15"><img src="<?php echo (HIMG_URL); ?>images_111.jpg"  alt=""/></p> -->
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
    <a class="consult" target="_blank"><div class="phone" style="display:none;">联系电话：0592-1234567</div></a>
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