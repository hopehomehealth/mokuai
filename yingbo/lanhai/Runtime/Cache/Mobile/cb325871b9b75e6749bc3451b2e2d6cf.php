<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title>蓝海长青</title>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>myblog.js"></script>
<link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
<style type="text/css">
  .fin-twnr p{width:100%!important;font-size:1.7rem!important;line-height:2.3rem!important; padding-top:2rem;}
</style>
</head>

<body>
<!--*****header*****-->
<header class="bb-b"> <a class="head_back1" href="Javascript:window.history.go(-1)">&nbsp;</a>
  <div class="headTit1">博客主页</div>
</header>

<!--*****header*****-->
<div class="main">
  <?php if($_SESSION['flag']!= ''): if($artinfo['user_id'] == $_SESSION['userInfo']['user_id']): ?><div class="banner_2">
      <a href="#"><span>我的</span>博客</a>
      <div><a href="/index.php/Mobile/Blog/blogset">设置管理</a>&nbsp;|&nbsp;<a href="/index.php/Mobile/Blog/createart">发表博文</a></div>
    </div><?php endif; endif; ?>
<div class="banner_3">
    <img src="<?php echo (MIMG_URL); ?>banner.jpg" alt=""/>
    <dl>
        <dt></dt>
        <dd><?php echo ($artinfo["blog_name"]); ?></dd>
        <dd>&nbsp;</dd>
        <dd><?php echo ($artinfo["blog_desc"]); ?></dd>
    </dl>
</div>
<aside>
    <span class="fr clo"><img src="<?php echo (MIMG_URL); ?>ion_6.png" alt=""></span>
    <p>个人信息</p>
    <div class="nametou"><img src="<?php echo ($artinfo["userhead"]); ?>" alt=""><p><?php echo ($artinfo["username"]); ?></p></div>
    <ul class="geren">
        <li>今日访问: <span><?php echo ($artinfo["today"]); ?></span></li>
        <li>总访问量: <span><?php echo ($artinfo["counts"]); ?></span></li>
        <li>开博时间: <span><?php echo (date('Y-m-d',$artinfo["ctime"])); ?></span></li>
        <li>博客排名: <span>1023</span></li>
    </ul>
</aside>
<div class="clear"></div>
  <section>
    <div class="blog-a pb6 fl">
      <h1><?php echo ($artinfo["title"]); ?></h1>
      <p class="fl l-gray w100 pt0-5 pb1 b-bd"><span class="post-img fl pr0-5"><img src="<?php echo (MIMG_URL); ?>tb_15.png"><?php echo ($artinfo["views"]); ?></span><span class="post-img fl"><img src="<?php echo (MIMG_URL); ?>tb_47.png"><?php echo ($artinfo["comments"]); ?></span></p>
      <div class="fin-twnr fl" style="padding-top:1rem">
        <?php echo ($artinfo["content"]); ?>
      </div>
      <ul class="blog-e fl" id="recordslist" artid="<?php echo ($artinfo["art_id"]); ?>">
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
    <form action="/index.php/Mobile/Blog/comment" method="get" id="comform">
      <a class="fin-pbpl-an1 fl" href="Javascript:window.history.go(-1)"><img src="<?php echo (MIMG_URL); ?>tb_14.png"></a>
      <input name="art_id" type="hidden" value="<?php echo ($artinfo["art_id"]); ?>">
      <input class="fin-pbpl-k1 fl" name="content" type="text" style="width:59%">
      <a class="fin-pbpl-an fl subcomment" href="javascript:void(0)"><img src="<?php echo (MIMG_URL); ?>tb_11.png"></a> <a class="fin-pbpl-an fl" href="javascript:void(0)" <?php if($artinfo["allow"] == 1): ?>onclick="collect(this,'/index.php/Mobile/Blog/collect/art_id/'+<?php echo ($artinfo["art_id"]); ?>)" <?php else: endif; ?>><?php if($artinfo["allow"] == 1): ?><img src="<?php echo (MIMG_URL); ?>tb_12.png"><?php else: ?><img style="opacity:0.5" src="<?php echo (MIMG_URL); ?>tb_12.png"><?php endif; ?></a> <a class="fin-pbpl-an fl" href="javascript:void(0)"><img src="<?php echo (MIMG_URL); ?>tb_13.png"></a>
    </form>
  </div>
</div>
<!--*****footer*****-->
<footer>
    <p class="copyright" style="padding-bottom: 5rem;">Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved.<br>
        蓝海长青 版权所有</p>
</footer>
<!--*****footer*****-->
<!-- <script src="<?php echo (MJS_URL); ?>js.js"></script> -->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>share.js"></script>
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
//返回顶部
$(function () {
    $(".ftop").hide();
    $(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 500) {
                $(".ftop").fadeIn(500);

            }
            else {
                $(".ftop").fadeOut(500);
            }
        });
        $(".ftop").click(function () {
            $('body,html').animate({scrollTop: 0}, 250);
            return false;
        });
		var signPackage = <?php echo ($signPackage); ?>;//签名数据包
		var shareData = <?php echo ($shareData); ?>;//分享信息
		loadshare(signPackage,shareData);
    });
})
</script>
<!-- 滚动加载 -->
<script type="text/javascript">
  $(function(){
    var artid = $("#recordslist").attr('artid');
    var scrollstatus = false;
    var haveend = false;
    var nowpage = 1;
    function ajax_request(artid,nowpage){
      var html = '';
      var recordslist = $("#recordslist");//放数据的容器
      $.get("/index.php/Mobile/Blog/detail/art_id/"+artid,{'p':nowpage},function(data){
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
          ajax_request(artid,nowpage);
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
          $("#recordslist").prepend("<li id='newitem'><dl class='blog-b fl'><dt><img src='"+data.comment.userhead+"'></dt><dd>"+data.comment.username+"<span class='fr blog-d'></span><br><span class='fs1 l-gray'>"+data.comment.add_time+"</span><span class='fr tar l-gray pr0-5'></span></dd></dl><p class='ti2'>"+data.comment.content+"</p></li>");
		  location.href="#newitem";
        }else{
          myalertbox('评论失败');
        }
      })
    })
   });
</script>
</body>
</html>