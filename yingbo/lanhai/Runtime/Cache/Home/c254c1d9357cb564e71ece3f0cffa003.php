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
        <li id="zuih" <?php if((ACTION_NAME == fabu) AND (CONTROLLER_NAME == News)): ?>class="cur"<?php endif; if($lan_id == 9): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/fabu');?>"><?php echo ($lanhaifabu[0]['lan_title']); ?></a></li>
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
<script type="text/javascript" src='<?php echo (HJS_URL); ?>myblog.js' ></script>
<!--banner-->
<div class="bow">
  <div style="width:1000px;margin:0 auto;position:relative">
  <div class="bow-c" style="padding-top:0;left:0;height:auto">
    <p class="fs30 white" style="padding-top:18px"><?php echo ($bloginfo["blog_name"]); ?></p>
    <p class="bow-c-w pt15">
	<!-- <a class="white" href="http://hetaohetao.blog.tianya.cn" target="_blank">http://hetaohetao.blog.tianya.cn</a> -->
	<br />
      <?php echo ($bloginfo["blog_desc"]); ?></p>
  </div>
  </div>
  <img src="<?php echo (HIMG_URL); ?>bow_banner.jpg" />
</div>
<ul style="width: 1000px;margin:0 auto;background: url(<?php echo (HIMG_URL); ?>images_10.png) no-repeat left bottom;line-height: 36px;height:36px;display:block;margin-top:-36px;z-index:999;position:relative">
  <li style="float:left;"><a style="color:#fff;height:36px" onclick="blogset()" href="javascript:void(0)">设置管理</a></li>
  <li style="padding-left:30px; float:left;"><a style="color:#fff;height:36px" onclick="sendbowen()" href="javascript:void(0)">发布博文</a></li>
</ul>
<!--banner-->

<!--第一通栏-->

<div class="column-c pt10 pb30">
  <!--****左边通栏****-->
  <div class="set-lis-l fl">
    <!--****左边第一通栏****-->
    <p class="nhtt-tit fl"><img src="<?php echo (HIMG_URL); ?>images_163.jpg" alt="设置管理" /></p>
    <!--****左边第二通栏****-->
    <ul class="core-tit fl pt25">
      <li class="items current"><a href="javascript:void(0)">博客设置</a></li>
      <li><a href="javascript:void(0)">博文管理</a></li>
      <li><a href="javascript:void(0)">评论管理</a></li>
      <li><a href="javascript:void(0)">分类管理</a></li>
      <li><a href="javascript:void(0)">收藏博文</a></li>
	  <li><a href="/index.php/Home/User/ucenter">个人中心</a></li>
    </ul>
    <div class="blogtable">
      <ul class="advice fl h590">
        <form action="/index.php/Home/Blog/set" method="post" id="blogsetform">
          <li>
            <p class="dat-t fl">博文名称：</p>
            <input name="blog_name" class="advice-k w385 fl" onblur="checkblogname(this.value)" value="<?php echo ($bloginfo["blog_name"]); ?>" placeholder="请输入博客名称" type="text" />
          </li>
           <li><p class="dat-t fl">博客简介：</p><p class="fl">
           <textarea name="blog_desc" class="advice-k w385 h150" onblur="checkblogdesc(this.value)" style="resize:none" placeholder="输入简单的介绍~"><?php echo ($bloginfo["blog_desc"]); ?></textarea>
         </p></li>
          <!--<li>
            <p class="dat-t fl">访问权限：</p>
            <p class="fl lh34">
              <label>
                <input type="radio" name="is_open" value="1" <?php echo ($bloginfo['is_open']?"checked":""); ?> id="RadioGroup1_0" />
                公开</label>
              <label>
                <input type="radio" name="is_open" value="0" <?php echo ($bloginfo['is_open']?"":"checked"); ?> id="RadioGroup1_1" />
                不公开</label>
            </p>
          </li>-->
          <li>
            <p class="dat-t fl">&nbsp;</p>
            <p class="advice-an fl"><a href="javascript:void(0)" onclick="subblogset()">确&nbsp;定</a></p>
          </li>
        </form>
      </ul>
    </div>
    <div class="blogtable" style="display:none">
		<form action="/index.php/Home/Blog/myarticles" method="get" id="filterart">
        <p class="pt30 fl"><span class="fl lh34" style="padding-left:15px"> 博文分类：</span>
        <select class="poster-k fl" name="class_id">
            <option style="color:#666;" value='0'>&nbsp;&nbsp;&nbsp;&nbsp;选择分类</option>
            <?php if(is_array($classlist)): foreach($classlist as $key=>$classinfo): ?><option style="color:#666;" value='<?php echo ($classinfo["class_id"]); ?>'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($classinfo["class_name"]); ?></option><?php endforeach; endif; ?>
          </select>
        <span class="pl40 fl lh34">关键字：</span><span class="pr15 fl">
        <input name="keywords" class="advice-k w190 fl" placeholder="" type="text" />
        </span><span class="fl logon-an"><a href="javascript:void(0)" id="filterbtn">查询</a></span></p></form>
        <table id="tablecontent" width="100%"  class="gem fl" border="0" cellspacing="0" cellpadding="0">
          <tr class="article-tit">
            <th class="w-40">标题</th>
            <th>时间</th>
            <th>访问</th>
            <th>评论</th>
            <th>操作</th>
          </tr>

        </table>
		<div style='margin:0 auto' class='fl'><ul class='page mypagestyle mypagestyle2'></ul></div>
    </div>
    <div class="blogtable" style="display:none">
      <p class="core-tit fl b-gray mt20"><span style="padding-left:15px;cursor:pointer" class="comment-a pr15 pl10 bule">评论我的</span><span style="padding-left:15px;cursor:pointer" class="comment-a pr15 pl10">我的评论</span></p>
     <ul class="set-lis_lb fl comments-ul">

      </ul>
	  <ul class="set-lis_lb fl comments-ul" style="display:none">

      </ul>
    </div>
    <div class="blogtable" style="display:none">
      <form method="post" action="/index.php/Home/Blog/bgclass" id="addclassform">
      <p class="pt30 fl">
        <span class="fl lh34" style="padding-left:15px">添加新分类：</span>
        <input type="text" class="poster-k fl" style="height:33px" name="class_name" onblur="checkclassname(this.value)" value="" placeholder="请输入分类名">
        <!-- <select class="poster-k fl" name="">
          <option>未分类</option>
          <option>蓝海头条</option>
          <option>军民融合</option>
        </select> -->
        <span class="fl logon-an ml28"><a href="javascript:void(0)" onclick="subclassform()">添加</a></span>
      </p>
      </form>
      <table width="100%"  class="gem fl" border="0" cellspacing="0" cellpadding="0" id="classtable">
        <tr>
          <th class="w-40">分类</th>
          <th>博文数</th>
          <th>管理</th>
        </tr>
      </table>
    </div>
    <div class="blogtable" style="display:none">
      <ul class="set-lis_lb fl" id="blogtable">

      </ul>
    </div>
  </div>
  <div class="set-lis-l fl" style="display:none">
    <p class="nhtt-tit fl"><img src="<?php echo (HIMG_URL); ?>images_164.jpg" alt="发表博文" /></p>
    <!--****左边第一通栏****-->
    <form action="" method="post" id="articleform">
     <ul class="advice fl">
      <li>
          <p class="poster-t fl">标题：</p>
          <input name="title" class="advice-k w520 fl" placeholder="请输入文章标题！" type="text" />
          <select class="poster-k fl ml28" name="class_id">
            <option style="color:#666;" value='0'>&nbsp;&nbsp;&nbsp;&nbsp;选择分类</option>
            <?php if(is_array($classlist)): foreach($classlist as $key=>$classinfo): ?><option style="color:#666;" value='<?php echo ($classinfo["class_id"]); ?>'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($classinfo["class_name"]); ?></option><?php endforeach; endif; ?>
          </select>
          </p>
        </li>
        <li>
          <p class="poster-t fl">内容：</p> <textarea rows="5" cols="25" id='content' name="content" class="w653 fl" style='padding:0;border:0;width:663px;height:455px;'></textarea><div style="clear:both"></div>
        </li>
        <script type="text/javascript">
          var ue = UE.getEditor('content',{toolbars: [[
                    'fullscreen', 'source', '|',
              'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'pasteplain', '|', 'forecolor', 'selectall', 'cleardoc', '|',
              'rowspacingtop', 'rowspacingbottom', 'lineheight',
              'fontfamily', 'fontsize','indent',
              'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
              'link', 'unlink', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
              'simpleupload', 'emotion', '|',
              'inserttable', 'deletetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts'
          ]]});
        </script>
      <li>
        <p class="poster-t fl">&nbsp;</p><p class="lh34"><span class="l-gray">请遵守<a href="/index.php/Home/Sysconfig/gongyue" class="bule">蓝海长青公约</a>言论规则，不得违反国家法律法规</span> </p>
      </li>
      <li>
        <p class="poster-t fl">&nbsp;</p> <input name="checkverify" type="text" class="logon-list-k1 fl mr15" placeholder="请输入验证码"  />
        <img src="/index.php/Home/Blog/verifyImg" onclick="this.src=this.src+'?'+Math.random()" /><span class="logon-an fr mr15"><a href="javascript:void(0)" onclick="subarticleform()">发&nbsp;表</a></span>
      </li>
    </ul>
    </form>
  </div>
  <!--****右边通栏****-->
  <div class="set-lis-r fr">
    <!--****右边第一通栏****-->
    <?php if(($_SESSION['flag']!= '') AND ($_SESSION['userInfo']['is_blog']== 1)): ?><p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_160.jpg"  alt=""/></p>
      <dl class="bow-r fl" style="padding-top:10px;padding-bottom:10px">
        <dt><a href="/index.php/Home/Blog/myblog"><img src="<?php echo ($_SESSION['userInfo']['userhead']); ?>" alt="" /></a></dt>
        <dd>
          <p class="fs22 pt10"><a href="/index.php/Home/Blog/myblog"><?php echo ($_SESSION['userInfo']['username']); ?></a></p>
        </dd>
      </dl>
       <!--****右边第二通栏****-->
      <ul class="bow-list fl pt15" style="padding-bottom:10px">
      <li>今日访问：<?php echo ($bloginfo["today"]); ?></li>
      <li>总访问量：<?php echo ($bloginfo["counts"]); ?></li>
      <li>开博时间：<?php echo (date("Y-m-d",$bloginfo["ctime"])); ?></li>
      <li>博客排名：<span class="bule">1023</span></li>
      </ul>
    <?php else: ?>
      <p class="fl blog-kt"><a href="/index.php/Home/Blog/openblog">开通博客</a></p><?php endif; ?>

    <!--****右边第三通栏****-->
    <div class="set-lis-tj fl pt15">
      <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_161.jpg" alt="" /></p>
      <ul class="set-lis-list fl pt15">
        <?php if(is_array($classlist)): foreach($classlist as $key=>$classinfo): ?><li><a href="javascript:void(0)"><?php echo ($classinfo["class_name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
   <!--  <p class="pt15 fl"><img src="<?php echo (HIMG_URL); ?>images_111.jpg"  alt=""/></p> -->
  </div>
</div>
<script type="text/javascript">
  $(function(){
    changetable();
	changecom();
	$('.mypagestyle a').click(function(){
		var url = $(this).attr('href');
		myarticles(url);
		return false;
	})
	$("#filterbtn").click(function(){
	//alert($("#filterart").attr('action'))
		var datas = $("#filterart").serialize();
		myarticles($("#filterart").attr('action'),datas);
	})
	$("#tablecontent").on('click','.delarticle',function(){
		var thisobj = $(this);
		var arturl = $(this).attr('href');
		$.get(arturl,function(data){
			if(data == 'success'){
				thisobj.parents('tr').remove();
				myalertbox('删除成功');
			}else{
				myalertbox('删除失败');
			}
		})
		return false;
	})
  })
</script>



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