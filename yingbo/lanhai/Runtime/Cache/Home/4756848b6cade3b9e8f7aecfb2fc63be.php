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

<style>
  .mypagestyle{width: 530px;margin: 0px auto;float:left;overflow: hidden;margin-top:20px;}
  .mypagestyle > li{width:auto;padding:0;border-bottom:1px #ddd solid}
  .slanderdetail p{max-width:730px;}
</style>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>jquery-1.8.3.min.js"></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.config.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.all.min.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/lang/zh-cn/zh-cn.js' ></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>famous.js"></script>
<!--banner-->
<!-- <p class="su-banner pt10"><img src="<?php echo (HIMG_URL); ?>images_43.jpg" /></p> -->
<!--banner-->
<!--第一通栏-->
<div class="column-c pt10 ser" style="height:50px">
  <div class="ser-left fl">
    <p class="ser-tit fl"><a href="<?php echo U('Index/index');?>" class="bule fwb">首页</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><a href="<?php echo U('Bbs/index',array('lan_id'=>7));?>">长青论坛</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><?php if($slandinfo["f_type"] == '1'): ?><a href="<?php echo U('Famous/famousbbs',array('lan_id'=>36));?>">名家讲坛</a><?php endif; if($slandinfo["f_type"] == '2'): ?><a href="<?php echo U('Famous/character',array('lan_id'=>37));?>">蓝海人物</a><?php endif; ?><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><a href="<?php echo U('Famous/slanders2',array('f_id'=>$slandinfo['f_id']));?>"><?php echo ($slandinfo['f_name']); ?></a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><?php echo ($slandinfo["title"]); ?></p>
    </p>
  </div>
  <?php if($_SESSION['flag']== ''): ?><p class="fr"><a href="/index.php/Home/User/login">登录</a>｜<a href="/index.php/Home/User/register">注册</a></p>
  <?php else: ?>
    <dl class="set-lis fr">
      <dt><a href="/index.php/Home/User/ucenter"><img src="<?php echo ($_SESSION['userInfo']['userhead']); ?>" alt="" /></a></dt>
      <dd><a href="/index.php/Home/User/ucenter" style="line-height:40px"><?php echo ($_SESSION['userInfo']['username']); ?></a>&nbsp;|&nbsp;<a href="/index.php/Home/User/logout" style="line-height:40px;color:#999;cursor:pointer">退出</a><!-- <br />
        <span class="l-gray fs12"><img src="<?php echo (HIMG_URL); ?>images_92.jpg" alt="" />&nbsp;浙江省</span> --></dd>
    </dl><?php endif; ?>
</div>
<div class="column-c pt10 pb30">
  <!--****左边通栏****-->
  <div class="set-lis-l fl">
    <!--****左边第二通栏****-->
    <div class="set-fi-t fl">
      <p class="set-fi-tit fl"><?php echo ($slandinfo["title"]); ?></p>
      <p class="set-fi-sm fl fs12">作者：<span class="bule pr20"><?php echo ($slandinfo["f_name"]); ?></span> <span class="l-gray pr20"><?php echo (date("Y-m-d H:i:s",$slandinfo["add_time"])); ?></span><span class="set-fi-smsz"><?php echo ($slandinfo["views"]); ?></span></p>
    </div>
    <div class="set-fi fl pt15 slanderdetail">
      <p><?php echo ($slandinfo["content"]); ?></p>
    </div>
    <!--****左边第四通栏****-->
    <div class="set-fi-fx fs12 pt15 pb10 fl" style="clear:both"><!-- <a href="javascript:void(0)"><img src="<?php echo (HIMG_URL); ?>images_116.jpg" /></a> --><span  class="fl pt5">分享到：</span><span class="fl pt5 pr15"><a href="javascript:void(0)" id="sharetoqq"><img src="<?php echo (HIMG_URL); ?>images_117.jpg" />QQ好友</a></span><span class="fl pt5 pr15"><a href="javascript:void(0)" onclick="window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(document.location.href)+'&title='+encodeURIComponent('<?php echo ($slandinfo["title"]); ?>'+'_蓝海长青')+'&summary='+'<?php echo (cutstr(strip_tags($slandinfo["content"]),50)); ?>'+'&pics='+'http://'+location.host+'<?php echo ($slandinfo["f_photo"]); ?>');return false;"><img src="<?php echo (HIMG_URL); ?>images_118.jpg" />QQ空间</a></span><span style="cursor:pointer" class="fl pt5 pr15 fxrw"><img src="<?php echo (HIMG_URL); ?>images_120.jpg" />微信</span>
      <p class="dj_xhk fr"><span class="w100 fl">打微"扫一扫"</span><img src="<?php echo ($slandinfo["qrcode"]); ?>"><span class="w100 fl">打开网页后点击屏幕右上角分享按妞</span></p>
      <script type="text/javascript">
        $(".fxrw").click(function(){
          $(".dj_xhk").slideToggle("1000");
        });
      </script>
    </div>
    <!--****左边第五通栏****-->
    <div class="set-fi-wy fl">
      <form action="/index.php/Home/Famous/comment" method="post" id="commentform">
        <p class="set-fi-wytt f1 pb10">网友评论<span class="l-gray pr20 fs12 pl20">文明上网理性发言</span><span class="fr fs12 bule"><b id="comnumber"><?php echo ($slandinfo["comments"]); ?></b>条评论</span></p>
        <textarea  name="content" id=content style="padding:0;border:0;width:698px;height:60px"></textarea><div style="clear:both"></div>
        <p class="fr pt10">
          <input name="sland_id" type="hidden" value="<?php echo ($slandinfo["sland_id"]); ?>" />
          <!-- <input name="" type="checkbox" value="" />
          &nbsp;匿名评论--><a href="javascript:void(0)" onclick="subcommentform()" class="pl20"> <img src="<?php echo (HIMG_URL); ?>images_129.jpg" /></a></p>
      </form>
    </div>
    <script type="text/javascript">
        var ue = UE.getEditor('content',{toolbars: [['emotion']],autoHeightEnabled:false,wordCount:false,elementPathEnabled : false});
    </script>
    <!--****左边第六通栏****-->
    <ul class="set-fi-wy-lb fl" slandid="<?php echo ($slandinfo["sland_id"]); ?>" giveupurl="/index.php/Home/Famous/giveup">

    </ul>
  </div>

  <!--****右边通栏****-->
  <div class="set-lis-r fr">
    <?php if($slandinfo["f_type"] == 1): ?><dl class="fam-t dt img fl pt10 pb10" style="clear:both">
      <dt><a href="/index.php/Home/Famous/slanders1/f_id/<?php echo ($slandinfo["f_id"]); ?>"><img style="border-radius:50%" src="<?php echo ($slandinfo["f_photo"]); ?>" alt="" /></a></dt>
      <dd><a href="/index.php/Home/Famous/slanders1/f_id/<?php echo ($slandinfo["f_id"]); ?>"><?php echo ($slandinfo["f_name"]); ?></a>
        </dd>
    </dl><?php endif; ?>
    <?php if($slandinfo["f_type"] == 2): ?><!--****右边第一通栏****-->
    <dl class="nhtt-list fr pt10 pb10">
      <dt><a href="/index.php/Home/Famous/slanders2/f_id/<?php echo ($slandinfo["f_id"]); ?>"><img src="<?php echo ($slandinfo["f_photo"]); ?>" alt="" /></a></dt>
      <dd><a href="/index.php/Home/Famous/slanders2/f_id/<?php echo ($slandinfo["f_id"]); ?>"><?php echo ($slandinfo["f_name"]); ?></a><br />
        <span class="l-gray fs12 pb5 pt5 fl"><img src="<?php echo (HIMG_URL); ?>images_92.jpg" alt="" />&nbsp;<?php echo ($slandinfo["f_province"]); ?></span><br />
        <a href="javascript:void(0)" onclick="follow('/index.php/Home/Famous/follow/f_id/'+<?php echo ($slandinfo['f_id']); ?>)"><img src="<?php echo (HIMG_URL); ?>images_127.jpg" /></a></dd>
    </dl><?php endif; ?>
    <!--****右边第二通栏****-->
    <div class="set-lis-tj fl">
      <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_107.jpg" alt="" /></p>
      <?php if(is_array($tuijianlist)): foreach($tuijianlist as $key=>$info): if($slandinfo["f_type"] == 1): ?><dl class="fam-t dt img fl pt10 pb10" style="clear:both">
        <dt><a href="/index.php/Home/Famous/slanders1/f_id/<?php echo ($info["f_id"]); ?>"><img style="border-radius:50%" src="<?php echo ($info["f_photo"]); ?>" alt="" /></a></dt>
        <dd><a href="/index.php/Home/Famous/slanders1/f_id/<?php echo ($info["f_id"]); ?>"><?php echo ($info["f_name"]); ?></a>
          </dd>
      </dl><?php endif; ?>
      <?php if($slandinfo["f_type"] == 2): ?><dl class="nhtt-list fr pt10 pb10">
        <dt><a href="/index.php/Home/Famous/slanders2/f_id/<?php echo ($info["f_id"]); ?>"><img src="<?php echo ($info["f_photo"]); ?>" alt="" /></a></dt>
        <dd><a href="/index.php/Home/Famous/slanders2/f_id/<?php echo ($info["f_id"]); ?>"><?php echo ($info["f_name"]); ?></a><br />
          <span class="l-gray fs12 pb5 pt5 fl"><img src="<?php echo (HIMG_URL); ?>images_92.jpg" alt="" />&nbsp;<?php echo ($info["f_province"]); ?></span><br />
          <a href="javascript:void(0)" onclick="follow('/index.php/Home/Famous/follow/f_id/'+<?php echo ($info['f_id']); ?>)"><img src="<?php echo (HIMG_URL); ?>images_127.jpg" /></a></dd>
      </dl><?php endif; endforeach; endif; ?>
      <!-- <ul class="set-lis-list fl pt15">
        <li><a href="cha_final.html">打遍世界所有强国的神秘之师</a></li>
        <li><a href="cha_final.html">古代存在外星人的12铁证</a></li>
        <li><a href="cha_final.html">地球周围竟存神秘入口</a></li>
        <li><a href="cha_final.html">82种外星人与地球接触</a></li>
        <li><a href="cha_final.html">古代存在外星人的12铁证</a></li>
        <li><a href="cha_final.html">地球周围竟存神秘入口</a></li>
        <li><a href="cha_final.html">82种外星人与地球接触</a></li>
        <li><a href="cha_final.html">打遍世界所有强国的神秘之师</a></li>
        <li><a href="cha_final.html">地球周围竟存神秘入口</a></li>
        <li><a href="cha_final.html">82种外星人与地球接触</a></li>
      </ul> -->
    </div>
    <!--****右边第三通栏****-->
    <div class="set-lis-tj fl">
      <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_108.jpg"  alt=""/></p>
      <ul class="set-lis-list fl pt15">
        <!-- <dl class="set-lis-pic fl pb10">
          <dt><a href="cha_final.html"><img src="<?php echo (HIMG_URL); ?>images_112.jpg"  alt=""/></a></dt>
          <dd><a href="cha_final.html">对电信诈骗受害者进行赔偿，银行会更有动力阻止电信诈骗。</a></dd>
        </dl> -->
        <?php if(is_array($hotlist)): foreach($hotlist as $key=>$info): ?><li><a href="/index.php/Home/Famous/detail/sland_id/<?php echo ($info["sland_id"]); ?>"><?php echo ($info["title"]); ?></a></li><?php endforeach; endif; ?>
       <!--  <p class="pt15"><img src="<?php echo (HIMG_URL); ?>images_111.jpg"  alt=""/></p> -->
      </ul>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
    var slandid = $('.set-fi-wy-lb').attr('slandid');
    allcomments("/index.php/Home/Famous/comments/sland_id/"+slandid);
    $(".set-fi-wy-lb").on('click','.mypagestyle a',function(data){
      var url = $(this).attr('href');
      allcomments(url);
      return false;
    })
  })
</script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>famous.js"></script>
<script type="text/javascript">
  $(function(){
    var p = {
		url:location.href, /*获取URL，可加上来自分享到QQ标识，方便统计*/
		desc:'', /*分享理由(风格应模拟用户对话),支持多分享语随机展现（使用|分隔）*/
		title:'<?php echo ($slandinfo["title"]); ?>'+'_蓝海长青', /*分享标题(可选)*/
		summary:'<?php echo (cutstr(htmlspecialchars_decode(strip_tags($slandinfo["content"])),50)); ?>', /*分享摘要(可选)*/
		pics:'http://'+location.host+'<?php echo ($slandinfo["f_photo"]); ?>', /*分享图片(可选)*/
		flash: '', /*视频地址(可选)*/
		site:'', /*分享来源(可选) 如：QQ分享*/
		style:'201',
		width:32,
		height:32
	};
	var s = [];
	for(var i in p){
		s.push(i + '=' + encodeURIComponent(p[i]||''));
	}
	$("#sharetoqq").attr('href',"http://connect.qq.com/widget/shareqq/index.html?"+s.join('&'));
  })
</script>
<script src="http://connect.qq.com/widget/loader/loader.js" widget="shareqq" charset="utf-8"></script>

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