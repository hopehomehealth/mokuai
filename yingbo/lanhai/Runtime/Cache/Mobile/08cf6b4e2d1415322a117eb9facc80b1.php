<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta content="北京蓝海长青规划设计研究有限公司,蓝海资讯,蓝海头条,军民融合,长青论坛" name="keywords"/>
    <meta content="北京蓝海长青规划设计研究有限公司，是一家以军事和安全为主，涉及经济、科技、国际战略、管理科学、社会发展、政策研究等领域的商业化新型高端智库，也是一家军民融合产业发展规划设计、建设运营、战略投资、顾问管理公司。" name="description"/>
    <title>蓝海长青</title>
    <script type="text/javascript" src="<?php echo (MJS_URL); ?>jquery-2.1.1.min.js"></script>
    <script src="<?php echo (MJS_URL); ?>js.js"></script>
    <link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<!--*****header*****-->
<header> <a class="headBack" href="<?php echo U('Index/index');?>">&nbsp;</a>
    <div class="headTit">
        <form action="/index.php/Mobile/News/searchlist" method="post">
            <input class="headTit-k" name="search" id="search" type="text" placeholder="请输入您要搜索的内容">
            <button class="search-an" id="shou" type="submit"></button>
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
    <span class="nav fr"></span>
    <ul class="menu">
        <li><a href="<?php echo U('Index/index');?>"><?php echo ($shouye[0]['lan_title']); ?></a></li>
        <li class="menu_1"><?php echo ($guanyu1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
<?php if(is_array($guanyu2)): foreach($guanyu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 11)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 12)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 13)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 14)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 15)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>




        </ul>
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>3));?>"><?php echo ($toutiao1[0]['lan_title']); ?></a></li>
        <li class="menu_1"><?php echo ($lanhaizixun1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
 <?php if(is_array($lanhaizixun2)): foreach($lanhaizixun2 as $key=>$v): if($v["url"] == ''): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

        </ul>
        <li class="menu_1"><?php echo ($junminronghe1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
		    <?php if(is_array($junminronghe2)): foreach($junminronghe2 as $key=>$v): if($v["url"] == ''): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

        </ul>
        <li class="menu_1"><?php echo ($zixunfuwu1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
  <?php if(is_array($zixunfuwu2)): foreach($zixunfuwu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 29)): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 30)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 31)): ?>
<li><a href="<?php echo U('News/falvfagui',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 32)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 38)): ?>
<li><a href="<?php echo U('Tushu/tushulist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 33)): ?>
<li><a href="<?php echo U('Advice/showlist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>


        </ul>

        <li class="menu_1"><?php echo ($changqingluntan1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
  <?php if(is_array($changqingluntan2)): foreach($changqingluntan2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 34)): ?><li><a href="<?php echo U('Bbs/blog',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 35)): ?>
<li><a href="<?php echo U('Bbs/bbs',array('board_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 36)): ?>
<li><a href="<?php echo U('Bbs/mingjia',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 37)): ?>
<li><a href="<?php echo U('Bbs/renwu',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>


        </ul>
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>8));?>"><?php echo ($gongyi[0]['lan_title']); ?></a></li>
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>9));?>"><?php echo ($lanhaifabu[0]['lan_title']); ?></a></li>
    </ul>
</header>

<!--*****header*****-->


<script type="text/javascript" src="<?php echo (MJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>myblog.js"></script>
<!--*****header*****-->
<div class="main">
<div class="clear"></div>
  <section>
    <div class="blog-a pb6 fl">
      <h1><?php echo ($slandinfo["title"]); ?></h1>
      <p class="fl l-gray w100 pt0-5 pb1 b-bd"><span class="post-img fl pr0-5"><img src="<?php echo (MIMG_URL); ?>tb_15.png"><?php echo ($slandinfo["views"]); ?></span><span class="post-img fl"><img src="<?php echo (MIMG_URL); ?>tb_47.png"><?php echo ($slandinfo["comments"]); ?></span></p>
      <div class="fin-twnr fl">
        <?php echo ($slandinfo["content"]); ?>
      </div>
      <ul class="blog-e fl" id="recordslist" slandid="<?php echo ($slandinfo["sland_id"]); ?>">
        <?php if(is_array($comments)): foreach($comments as $key=>$info): ?><li>
          <dl class="blog-b fl">
            <dt><img src="<?php echo ($info["userhead"]); ?>"></dt>
            <dd><?php echo ($info["username"]); ?><span class="fr blog-d"></span><br>
              <span class="fs1 l-gray"><?php echo ($info["add_time"]); ?></span><span class="fr tar l-gray pr0-5"></span></dd>
          </dl>
          <p class="ti2"><?php echo ($info["content"]); ?></p>
        </li><?php endforeach; endif; ?>
      </ul>
    </div>
  </section>
  <div class="aside_1">
    <p class="ftop"><img src="<?php echo (MIMG_URL); ?>2_3.png" alt=""/></p>
</div>
   <div class="fin-pbpl">
    <form action="/index.php/Mobile/Famous/comment" method="get" id="comform">
      <a class="fin-pbpl-an1 fl" href="Javascript:window.history.go(-1)"><img src="<?php echo (MIMG_URL); ?>tb_14.png"></a>
      <input name="sland_id" type="hidden" value="<?php echo ($slandinfo["sland_id"]); ?>">
      <input class="fin-pbpl-k1 fl" name="content" type="text" style="width:72%">
      <a class="fin-pbpl-an fl subcomment" href="javascript:void(0)"><img src="<?php echo (MIMG_URL); ?>tb_11.png"></a> <a class="fin-pbpl-an fl" href="javascript:void(0)" ><img src="<?php echo (MIMG_URL); ?>tb_12.png"></a> <a class="fin-pbpl-an fl" href="javascript:void(0)"><img src="<?php echo (MIMG_URL); ?>tb_13.png"></a>
    </form>
  </div>
</div>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<!-- <script src="<?php echo (MJS_URL); ?>js.js"></script> -->
<script type="text/javascript">
  $(function(){
    var signPackage = <?php echo ($signPackage); ?>;
    wx.config({
    appId: signPackage.appId,
    timestamp: signPackage.timestamp,
    nonceStr: signPackage.nonceStr,
    signature: signPackage.signature,
     jsApiList: [
      'checkJsApi',
      'onMenuShareTimeline',
      'onMenuShareAppMessage',
      'onMenuShareQQ',
      'onMenuShareWeibo'
      ]
  });             
  wx.ready(function () {
      // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
    wx.checkJsApi({
      jsApiList: [
      'getNetworkType',
      'previewImage',
       'onMenuShareTimeline',
      'onMenuShareAppMessage',
      'onMenuShareQQ',
      'onMenuShareWeibo'
      ],            
    });
    wx.onMenuShareAppMessage(<?php echo ($shareData); ?>);
    wx.onMenuShareTimeline(<?php echo ($shareData); ?>);
    wx.onMenuShareQQ(<?php echo ($shareData); ?>);
    wx.onMenuShareWeibo(<?php echo ($shareData); ?>);
  });
  }) 
</script>
<script type="text/javascript">
$(function () {
    $(".banner_3").click(function () {
        if($("aside").css("display")=="none"){
            $("aside").slideDown(300);
        }else{
            $("aside").slideUp(300);
        }
    });
    $("aside .clo").click(function () {
        $("aside").slideUp(300);
    });
});
</script>
<!-- 滚动加载 -->
<script type="text/javascript">
  $(function(){
    var slandid = $("#recordslist").attr('slandid');
    var scrollstatus = false;
    var haveend = false;
    var nowpage = 1;
    function ajax_request(slandid,nowpage){
      var html = '';
      var recordslist = $("#recordslist");//放数据的容器
      $.get("/index.php/Mobile/Famous/detail/sland_id/"+slandid,{'p':nowpage},function(data){
        if(data.error == 0){
          var commenthtml = '';
          for(var i in data.comments){

            commenthtml += "<li><dl class='blog-b fl'><dt><img src='"+data.comments[i].userhead+"'></dt><dd>"+data.comments[i].username+"<span class='fr blog-d'></span><br><span class='fs1 l-gray'>"+data.comments[i].add_time+"</span><span class='fr tar l-gray pr0-5'></span></dd></dl><p class='ti2'>"+data.comments[i].content+"</p></li>";
          }
        }else{
          haveend = true;
        }

        recordslist.append(commenthtml);
        scrollstatus = false;
      },false);
    }
    $(window).scroll(function () {
      var scrollTop = $(this).scrollTop();
      var scrollHeight = $(document).height();
      var windowHeight = $(this).height();
      if (scrollTop + windowHeight == scrollHeight && scrollstatus == false) {
        scrollstatus = true;
        nowpage++;
        if(!haveend){
          ajax_request(slandid,nowpage);
        }
      }
    });
    $(".subcomment").click(function(){
      if($("input[name='content']").val() == ''){
        myalertbox('评论内容不能为空');
        return;
      }
      $.post($("#comform").attr('action'),$("#comform").serialize(),function(data){
        if(data == 'nologin'){
		  $("input[name='content']").val('');
          myalertbox('请登录后评论');
          return;
        }
		if(data.error == 'illegalword'){
			myalertmidbox(data.content);
			return;
		}
        if(data == 'stopping'){
          myalertbox('请勿频繁操作');
          return;
        }
        if(data.error == 0){
          myalertbox('评论成功');
          $("#recordslist").prepend("<li id='newcoms'><dl class='blog-b fl'><dt><img src='"+data.comment.userhead+"'></dt><dd>"+data.comment.username+"<span class='fr blog-d'></span><br><span class='fs1 l-gray'>"+data.comment.add_time+"</span><span class='fr tar l-gray pr0-5'></span></dd></dl><p class='ti2'>"+data.comment.content+"</p></li>");
		  location.href="#newcoms";
        }else{
          myalertbox('评论失败');
        }
      })
    })
   });
</script>

</div>
<!--*****footer*****-->
<footer>
    <p class="copyright" <?php if((CONTROLLER_NAME == 'Famous') AND (ACTION_NAME == 'detail')): ?>style="margin-bottom:5rem"<?php endif; ?>>Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved.<br>
        蓝海长青 版权所有</p>
</footer>
<!--*****footer*****-->

<div class="aside_1">
    <p class="ftop"><img src="<?php echo (MIMG_URL); ?>images_11.png" alt=""/></p> </div>
<script src="<?php echo (MJS_URL); ?>jquery.hiSlider.min.js"></script>
<script>
    $('.hiSlider3').hiSlider({
        isFlexible: true,
        isSupportTouch: true,
        titleAttr: function(curIdx){
            return $('img', this).attr('alt');
        }
    });
</script>
</body>
</html>