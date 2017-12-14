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

<script type="text/javascript" src="<?php echo (HJS_URL); ?>jquery-1.8.3.min.js"></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.config.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.all.min.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/lang/zh-cn/zh-cn.js' ></script>
<script type="text/javascript" src='<?php echo (HJS_URL); ?>createposts.js' ></script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<!--banner-->
<!-- <p class="su-banner pt10"><img src="<?php echo (HIMG_URL); ?>images_43.jpg" /></p> -->
<!--banner-->

<!--第一通栏-->
<div class="column-c pt10">
  <div class="ser-left fl">
    <!--****第二通栏****-->
    <p class="ser-tit fl"><a href="<?php echo U('Index/index');?>" class="bule fwb">首页</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><a href="<?php echo U('Bbs/index',array('lan_id'=>7));?>">长青论坛</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><a href="<?php echo U('Posts/postlist',array('lan_id'=>35));?>">巅峰论剑</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" /><?php echo ($postinfo["topic"]); ?></p>
    <p class="ser-tit fl"><a href="/index.php/Home/Posts/createpost"><img src="<?php echo (HIMG_URL); ?>images_113.jpg" /></a><!--<a href="javascript:void(0)"><img src="<?php echo (HIMG_URL); ?>qiujing.jpg" /></a>--></p>
  </div>
  <p class="pt30 fr"> <a href="/index.php/Home/Posts/postlist/board_id/<?php echo ($postinfo["board_id"]); ?>/lan_id/35"><img src="<?php echo (HIMG_URL); ?>images_114.jpg" alt="" /></a> </p>
</div>
<!--****第三通栏****-->
<div class="column-c pt10 pb30">
<div class="ser-fin fl">
<!--****左边第一通栏****-->
<div class="ser-fin-l fl">
<p class="ser-fin-lit fl fs12 bbd2 tac w160 pl0">浏览:<span class="red"><?php echo ($postinfo["views"]); ?></span>&nbsp;|&nbsp;回复:<span class="red"><?php echo ($postinfo["replys"]); ?></span></p>
<p class="ser-fin-lit fl fs12 bbd red w140"><?php echo ($postinfo["username"]); ?></p>
<dl class="ser-fin-lpic fl fs12 pt15">
<dt><img src="<?php echo ($postinfo["userhead"]); ?>" /></dt>
<dd><span class="red"><?php echo ($postinfo["level"]); ?></span>&nbsp;<img style="padding-top:5px" src="<?php echo ($postinfo["level_img"]); ?>"><br />签到天数 <?php echo ($postinfo["signdays"]); ?> 天<br />
<span class="tac fl bdr mr15 pr10 bbl pl10 mt20 mb20"><?php echo ($postinfo["posts"]); ?><br />帖子</span>
<span class="tac fl bdr pr10 mt20 mb20"><?php echo ($postinfo["score"]); ?><br />积分</span>
</dd>
</dl>
</div>
<!--****右边第一通栏****-->
<div class="ser-fin-r fl">
<div class="ser-fin-lit fl fs20 bbd2 w817 ot-wd"><p class="fr pr15 pt15"><?php if($prevAndnext[0]['post_id'] != ''): ?><a title="<?php echo ($prevAndnext[0]['topic']); ?>" href="/index.php/Home/Posts/detail/post_id/<?php echo ($prevAndnext[0]['post_id']); ?>"><img src="<?php echo (HIMG_URL); ?>images_169.jpg" /></a><?php else: ?><a style="opacity:0.3" href="javascript:void(0)"><img src="<?php echo (HIMG_URL); ?>images_169.jpg" /></a><?php endif; if($prevAndnext[1]['post_id'] != ''): ?><a title="<?php echo ($prevAndnext[1]['topic']); ?>" class="ml28" href="/index.php/Home/Posts/detail/post_id/<?php echo ($prevAndnext[1]['post_id']); ?>"><img src="<?php echo (HIMG_URL); ?>images_170.jpg" /></a><?php else: ?><a style="opacity:0.3" class="ml28" href="javascript:void(0)"><img src="<?php echo (HIMG_URL); ?>images_170.jpg" /></a><?php endif; ?></p><?php echo ($postinfo["topic"]); ?></div>
<div class="pl20 pr20 fl w797">
<p class="fl fs12 ser-fin-wz bbd"><span class="fr" style="color:red;font-weight:bolder">楼主</span>发表于 <?php echo (date("Y-m-d H:i:s",$postinfo["ctime"])); ?></p>
<div class="ser-fin-cn fl pt15" style="min-height:235px">
  <?php echo ($postinfo["body"]); ?>
</div>
<div class="set-fi-fx fs12 pt15 pb10 fl" style="clear:both"><a href="javascript:void(0)" <?php if($postinfo["allow"] == 1): ?>onclick="collect(this,'/index.php/Home/Posts/collect/post_id/'+<?php echo ($postinfo["post_id"]); ?>)" <?php else: endif; ?>><?php if($postinfo["allow"] == 1): ?><img src="<?php echo (HIMG_URL); ?>images_116.jpg" /><?php else: ?><img style="opacity:0.5" src="<?php echo (HIMG_URL); ?>images_116.jpg" /><?php endif; ?></a><span  class="fl pt5">分享到：</span><span class="fl pt5 pr15"><a id="sharetoqq" href="javascript:void(0)"><img src="<?php echo (HIMG_URL); ?>images_117.jpg" />QQ好友</a></span><span class="fl pt5 pr15"><a href="javascript:void(0)" onclick="window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(document.location.href)+'&title='+encodeURIComponent('<?php echo ($postinfo["topic"]); ?>'+'_蓝海长青')+'&summary='+'<?php echo (cutstr(strip_tags($postinfo["body"]),50)); ?>'+'&pics='+'http://'+location.host+'<?php echo ($postinfo["userhead"]); ?>');return false;"><img src="<?php echo (HIMG_URL); ?>images_118.jpg" />QQ空间</a></span><span style="cursor:pointer" class="fl pt5 pr15 fxrw"><img src="<?php echo (HIMG_URL); ?>images_120.jpg" />微信</span>
    <p class="dj_xhk fr"><span class="w100 fl">打微"扫一扫"</span><img src="<?php echo ($postinfo["qrcode"]); ?>"><span class="w100 fl">打开网页后点击屏幕右上角分享按妞</span></p>
    <script type="text/javascript">
        $(".fxrw").click(function(){
            $(".dj_xhk").slideToggle("1000");
        });
    </script>
</div>
<p class="fl fs12 ser-fin-wz bbt-d bule" style="margin-top: 10px;"><img src="<?php echo (HIMG_URL); ?>images_171.jpg" />&nbsp;&nbsp;<a href="#thebottom" style="text-decoration:none">回复</a></p>
</div>
</div>
</div>
<?php if(is_array($replylist)): foreach($replylist as $key=>$info): ?><div class="ser-fin fl" id="nowfloor_<?php echo ($info["reply_id"]); ?>">
<!--****左边第一通栏****-->
<div class="ser-fin-l fl">
<p class="ser-fin-lit fl fs12 bbd red w140"><?php echo ($info["username"]); ?></p>
<dl class="ser-fin-lpic fl fs12 pt15">
<dt><img src="<?php echo ($info["userhead"]); ?>" /></dt>
<dd><span class="red"><?php echo ($info["level"]); ?></span>&nbsp;<img style="padding-top:5px" src="<?php echo ($info["level_img"]); ?>"><br />签到天数 <?php echo ($info["signdays"]); ?> 天<br />
<span class="tac fl bdr mr15 pr10 bbl pl10 mt20 mb20"><?php echo ($info["posts"]); ?><br />帖子</span>
<span class="tac fl bdr pr10 mt20 mb20"><?php echo ($info["score"]); ?><br />积分</span>
</dd>
</dl>
</div>
<!--****右边第一通栏****-->
<div class="ser-fin-r fl">
<div class="pl20 pr20 fl w797">
<p class="fl fs12 ser-fin-wz bbd"><?php echo ($info["thefloor"]); ?>发表于 <?php echo (date("Y-m-d H:i:s",$info["ctime"])); ?></p>
<?php if(!empty($info["reply_body1"])): ?><div style="text-indent:2em;margin-left:35px;margin-top:5px;float:left;background:#ccc;opacity:0.3;border-radius:2px;width:90%;"><p style="padding-top:5px"><b><?php echo ($info["username1"]); ?></b>&nbsp;发表于 <?php echo (date("Y-m-d H:i:s",$info["ctime1"])); ?></p><div class="ser-fin-cn pt15" style="padding-left:30px"><?php echo ($info["reply_body1"]); ?></div></div><?php endif; ?>
<div class="ser-fin-cn fl pt15" style="min-height:235px">
  <?php echo ($info["reply_body"]); ?>
</div>

<p class="fl fs12 ser-fin-wz bbt-d bule"><img src="<?php echo (HIMG_URL); ?>images_171.jpg" />&nbsp;&nbsp;<a href="#thebottom" style="text-decoration:none" class="nowreply" replypid="<?php echo ($info["reply_id"]); ?>">回复</a></p>
</div>
</div>
</div><?php endforeach; endif; ?>
 <p class="pt22 fl"><a href="/index.php/Home/Posts/createpost"><img src="<?php echo (HIMG_URL); ?>images_113.jpg" /></a><!--<a style="margin-left:5px" href="javascript:void(0)"><img src="<?php echo (HIMG_URL); ?>qiujing.jpg" /></a>--></p>
  <ul class="page1 fr pt22">
    <?php echo ($page); ?>
  </ul>
<div class="ser-fin fl mt20">
<!--****左边第一通栏****-->
<div class="ser-fin-l fl">
<p <?php if($Think.session.flag): ?>class="ser-fin-lit fl fs12 bbd red w140" <?php else: ?>class="ser-fin-lit fl fs12 red w140"<?php endif; ?>style="text-align:center"><?php if($Think.session.flag): echo ($_SESSION['userInfo']['username']); else: endif; ?></p>
<dl <?php if($Think.session.flag): ?>class="ser-fin-lpic fl fs12 pt15" <?php else: ?>class="fl fs12 pt15"<?php endif; ?>>
<dt><?php if($Think.session.flag): ?><img src="<?php echo ($_SESSION['userInfo']['userhead']); ?>" /><?php else: endif; ?></dt>

</dl>
</div>
<!--****右边第一通栏****-->
<div class="ser-fin-r fl">
<div class="pl20 pr20 fl w797" id="thebottom">
<form action="/index.php/Home/Posts/reply" method="post" id="replyform">
  <ul class="advice fl">
        <li style="width:782px;height:260px"><textarea name="reply_body" id='inputtextarea' class="advice-k w770 fl h150" rows="" cols="" style='padding:0;border:0;width:780px;height:200px' placeholder=""></textarea>
        </li>
        <li><p class="logon-list-t fl">验证码：</p><img class="fl pl20 pr20" onclick="this.src=this.src+'?'+Math.random()" src="/index.php/Home/Posts/VerifyImg" /> <input name="verifycode" type="text" class="logon-list-k1 fl" placeholder="请输入验证码"  /><p class="logon-list-t fl" style="color:#999;width:auto">&nbsp;看不清点击验证码</p>
        </li>
        <input type="hidden" name="post_id" value="<?php echo ($postinfo["post_id"]); ?>">
        <input type="hidden" name="replypid" value="0"><!--回复的pid 默认为0是回复楼主，否则为回复其他人-->
        <li><span class="logon-an fl mb20"><a href="javascript:void(0)" id="replybtn">发表回复</a></span>
        </li>
  </ul>
</form>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    var ue = UE.getEditor('inputtextarea',{toolbars: [[
              'fullscreen', 'bold', 'italic', 'underline','|', 'forecolor', '|',
        'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
        'link', 'unlink', '|',
        'simpleupload', 'emotion'
    ]],autoHeightEnabled:false,wordCount:false,elementPathEnabled : false});
</script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src='<?php echo (HJS_URL); ?>createposts.js' ></script>
<script type="text/javascript">
  $(function(){
    var p = {
		url:location.href, /*获取URL，可加上来自分享到QQ标识，方便统计*/
		desc:'', /*分享理由(风格应模拟用户对话),支持多分享语随机展现（使用|分隔）*/
		title:'<?php echo ($postinfo["topic"]); ?>'+'_蓝海长青', /*分享标题(可选)*/
		summary:'<?php echo (cutstr(htmlspecialchars_decode(strip_tags($postinfo["body"])),50)); ?>', /*分享摘要(可选)*/
		pics:'http://'+location.host+'<?php echo ($postinfo["userhead"]); ?>', /*分享图片(可选)*/
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
    $(".nowreply").click(function(){
      $("input[name='replypid']").val($(this).attr('replypid'));
    })
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