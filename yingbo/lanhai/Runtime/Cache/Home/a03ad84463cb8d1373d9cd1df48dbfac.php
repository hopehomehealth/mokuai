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
</style>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>jquery-1.8.3.min.js"></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.config.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.all.min.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/lang/zh-cn/zh-cn.js' ></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>myblog.js"></script>
<!--banner-->
<div class="bow">
  <div style="width:1000px;margin:0 auto;position:relative">
  <div class="bow-c" style="padding-top:0;left:0;height:auto">
    <p class="fs30 white" style="padding-top:18px"><?php echo ($artinfo["blog_name"]); ?></p>
    <p class="bow-c-w pt15">
<!-- 	<a class="white" href="http://hetaohetao.blog.tianya.cn" target="_blank">http://hetaohetao.blog.tianya.cn</a> -->
	<br />
      <?php echo ($artinfo["blog_desc"]); ?></p>
  </div>
  </div>
  <img src="<?php echo (HIMG_URL); ?>bow_banner.jpg" />
</div>

  <!-- <ul style="width: 1000px;margin:0 auto;background: url(<?php echo (HIMG_URL); ?>images_10.png) no-repeat left bottom;line-height: 36px;height:36px;display:block;margin-top:-36px;z-index:999;position:relative">
    <li style="float:left;"><a style="color:#fff;height:36px" onclick="blogset()" href="javascript:void(0)">设置管理</a></li>
    <li style="padding-left:30px; float:left;"><a style="color:#fff;height:36px" onclick="sendbowen()" href="javascript:void(0)">发布博文</a></li>
  </ul> -->

<!--banner-->
<!--第一通栏-->

<div class="column-c pt10 pb30">
  <!--****左边通栏****-->
  <div class="set-lis-l fl">
    <p class="nhtt-tit fl"><img src="<?php echo (HIMG_URL); ?>images_159.jpg" alt="博文" /></p>
    <!--****左边第二通栏****-->
    <div class="set-fi-t fl">
      <p class="set-fi-tit fl"><?php echo ($artinfo["title"]); ?></p>
      <p class="set-fi-sm fl fs12">作者：<span class="bule pr20"><?php echo ($artinfo["username"]); ?></span> <span class="l-gray pr20"><?php echo (date("Y-m-d H:i:s",$artinfo["add_time"])); ?></span><span class="set-fi-smsz"><?php echo ($artinfo["views"]); ?></span></p>
    </div>
    <div class="set-fi fl pt15">
      <?php echo ($artinfo["content"]); ?>
    </div>
    <!--****左边第四通栏****-->
    <div class="set-fi-fx fs12 pt15 pb10 fl" style="clear:both"><a href="javascript:void(0)" <?php if($artinfo["allow"] == 1): ?>onclick="collect(this,'/index.php/Home/Blog/collect/art_id/'+<?php echo ($artinfo["art_id"]); ?>)" <?php else: endif; ?>><?php if($artinfo["allow"] == 1): ?><img src="<?php echo (HIMG_URL); ?>images_116.jpg" /><?php else: ?><img style="opacity:0.5" src="<?php echo (HIMG_URL); ?>images_116.jpg" /><?php endif; ?></a><span  class="fl pt5">分享到：</span><span class="fl pt5 pr15"><a href="javascript:void(0)" id="sharetoqq"><img src="<?php echo (HIMG_URL); ?>images_117.jpg" />QQ好友</a></span><span class="fl pt5 pr15"><a href="javascript:void(0)" onclick="window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(document.location.href)+'&title='+encodeURIComponent('<?php echo ($artinfo["title"]); ?>')+'&summary='+'<?php echo (cutstr(strip_tags($artinfo["content"]),50)); ?>'+'&pics='+'http://'+location.host+'<?php echo ($artinfo["userhead"]); ?>');return false;"><img src="<?php echo (HIMG_URL); ?>images_118.jpg" />QQ空间</a></span><span class="fl pt5 pr15 fxrw" style="cursor:pointer"><img src="<?php echo (HIMG_URL); ?>images_120.jpg" />微信</span>
      <p class="dj_xhk fr"><span class="w100 fl">打微"扫一扫"</span><img src="<?php echo ($artinfo["qrcode"]); ?>"><span class="w100 fl">打开网页后点击屏幕右上角分享按妞</span></p>
      <script type="text/javascript">
        $(".fxrw").click(function(){
          $(".dj_xhk").slideToggle("1000");
        });
      </script>
    </div>
    <!--****左边第五通栏****-->
    <div class="set-fi-wy fl" style="margin-top: 20px;">
      <form action="/index.php/Home/Blog/comment" method="post" id="commentform">
        <p class="set-fi-wytt f1 pb10">网友评论<span class="l-gray pr20 fs12 pl20">文明上网理性发言</span><span class="fr fs12 bule"><b id="comnumber"><?php echo ($artinfo["comments"]); ?></b>条评论</span></p>
        <textarea  name="content" id=content style="padding:0;border:0;width:698px;height:60px"></textarea><div style="clear:both"></div>
        <p class="fr pt10">
          <input name="art_id" type="hidden" value="<?php echo ($artinfo["art_id"]); ?>" />
          <!-- <input name="" type="checkbox" value="" />
          &nbsp;匿名评论--><a href="javascript:void(0)" onclick="subcommentform()" class="pl20"> <img src="<?php echo (HIMG_URL); ?>images_129.jpg" /></a></p>
      </form>
    </div>
    <script type="text/javascript">
        var ue = UE.getEditor('content',{toolbars: [['emotion']],autoHeightEnabled:false,wordCount:false,elementPathEnabled : false});
    </script>
    <!--****左边第六通栏****-->
    <ul class="set-fi-wy-lb fl" artid="<?php echo ($artinfo["art_id"]); ?>" giveupurl="/index.php/Home/Blog/giveup">

    </ul>
  </div>

  <!--****右边通栏****-->
  <div class="set-lis-r fr">
    <!--****右边第一通栏****-->
    <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_160.jpg"  alt=""/></p>
    <dl class="bow-r fl">
      <dt><?php if(($artinfo['user_id']) == ($_SESSION['userInfo']['user_id'])): ?><a href="/index.php/Home/Blog/myblog"><img src="<?php echo ($artinfo["userhead"]); ?>" alt="" /></a><?php else: ?><a href="javascript:void(0)"><img src="<?php echo ($artinfo["userhead"]); ?>" alt="" /></a><?php endif; ?></dt>
      <dd>
        <p class="fs22 pt10"><?php if(($artinfo['user_id']) == ($_SESSION['userInfo']['user_id'])): ?><a href="/index.php/Home/Blog/myblog"><?php echo ($artinfo["username"]); ?></a><?php else: ?><span class="bule"><?php echo ($artinfo["username"]); ?></span><?php endif; ?></p>
      </dd>
    </dl>
     <!--****右边第二通栏****-->
    <ul class="bow-list fl pt15">
    <li>今日访问：<?php echo ($bloginfo["today"]); ?></li>
    <li>总访问量：<?php echo ($bloginfo["counts"]); ?></li>
    <li>开博时间：<?php echo (date("Y-m-d",$bloginfo["ctime"])); ?></li>
    <li>博客排名：<span class="bule">1023</span></li>
    </ul>

     <!--****右边第三通栏****-->
    <div class="set-lis-tj fl pt15">
      <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_161.jpg" alt="" /></p>
      <ul class="set-lis-list fl pt15">
        <li><a href="/index.php/Home/Blog/myarticle/user_id/<?php echo ($bloginfo["user_id"]); ?>" style="font-weight:bold">全部博文</a></li>
        <?php if(is_array($classlist)): foreach($classlist as $key=>$classinfo): ?><li><a href="/index.php/Home/Blog/myarticle/user_id/<?php echo ($classinfo["user_id"]); ?>/class_id/<?php echo ($classinfo["class_id"]); ?>">--<?php echo ($classinfo["class_name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
     <!--****右边第三通栏****-->
    <!-- <div class="set-lis-tj fl pt15">
      <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_162.jpg" alt="" /></p>
      <ul class="bow-list-a fl pt15">
        <li><a href="bowen_final.html">1. 中国大肆抛售美债 日本急了敲美闷棍<br />这个文章写得非常好感觉<br />
        <span class="fr bule">— 青玉伏案</span></a></li>
      </ul>
    </div> -->
<!--     <p class="pt15 fl"><img src="<?php echo (HIMG_URL); ?>images_111.jpg"  alt=""/></p> -->
  </div>
</div>
<script type="text/javascript">
  $(function(){
    var artid = $('.set-fi-wy-lb').attr('artid');
    allcomments("/index.php/Home/Blog/comments/art_id/"+artid);
    $(".set-fi-wy-lb").on('click','.mypagestyle a',function(data){
      var url = $(this).attr('href');
      allcomments(url);
      return false;
    })
    $(".set-lis-tj a").click(function(){
      var url = $(this).attr('href');
      getarticles(url,'/index.php/Home/Home/Blog/detail');
      return false;
    })
    $(".set-lis-l").on('click','#breakpageul a',function(){
      var url = $(this).attr('href');
      getarticles(url,'/index.php/Home/Home/Blog/detail');
      return false;
    })
  })
</script>
<script type="text/javascript">
  $(function(){
    var p = {
		url:location.href, /*获取URL，可加上来自分享到QQ标识，方便统计*/
		desc:'<?php echo (cutstr(strip_tags($artinfo["content"]),50)); ?>', /*分享理由(风格应模拟用户对话),支持多分享语随机展现（使用|分隔）*/
		title:'<?php echo ($artinfo["title"]); ?>', /*分享标题(可选)*/
		summary:'<?php echo (cutstr(strip_tags($artinfo["content"]),50)); ?>', /*分享摘要(可选)*/
		pics:'http://'+location.host+'<?php echo ($artinfo["userhead"]); ?>', /*分享图片(可选)*/
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