<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
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
<?php if(is_array($guanyu2)): foreach($guanyu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><li><a href="<?php echo U('News/gongsijianjie',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
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
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>24));?>"><?php echo ($lanhaifabu[0]['lan_title']); ?></a></li>
    </ul>
</header>
<!--*****header*****-->
<div class="main">
  <section>
    <div class="blog-a pb6 fl">
      <h1><?php echo ($postinfo["topic"]); ?></h1>
      <p class="fl l-gray w100 pt0-5 pb1 b-bd"><span class="post-img fl pr0-5"><img src="<?php echo (MIMG_URL); ?>tb_15.png"><?php echo ($postinfo["views"]); ?></span><span class="post-img fl"><img src="<?php echo (MIMG_URL); ?>tb_47.png"><?php echo ($postinfo["replys"]); ?></span></p>
      <dl class="blog-b fl">
        <dt style="width:3.5rem;height:3.5rem;overflow:hidden"><img style="width:3.5rem" src="<?php echo ($postinfo["userhead"]); ?>"></dt>
        <dd><?php echo ($postinfo["username"]); ?><span class="blog-c fr" style="color:red">楼主</span><br>
          <span class="fs1 l-gray"><?php echo (date("Y-m-d H:i:s",$postinfo["ctime"])); ?></span></dd>
      </dl>
      <div class="fin-twnr fl">
        <?php echo ($postinfo["body"]); ?>
      </div>
      <ul class="blog-e fl" style="width:100%" id="recordslist" postid="<?php echo ($postinfo["post_id"]); ?>">
        <?php if(is_array($replylist)): foreach($replylist as $key=>$replyinfo): ?><li>
          <dl class="blog-b fl">
            <dt style="width:3.5rem;height:3.5rem;overflow:hidden"><img style="width:3.5rem" src="<?php echo ($replyinfo["userhead"]); ?>"></dt>
            <dd><?php echo ($replyinfo["username"]); ?><span class="blog-c fr" style="color:#af1e25"><?php echo ($replyinfo["thefloor"]); ?></span><br>
              <span class="fs1 l-gray"><?php echo ($replyinfo["ctime"]); ?></span><a class="replythis" href="javascript:void(0)" replypid="<?php echo ($replyinfo["reply_id"]); ?>"><span class='fr' style="clear:both;padding-right:0.5rem">回复</span><span class="fr blog-d"><img src="<?php echo (MIMG_URL); ?>tb_47.png"></span></a></dd>
          </dl>
          <?php if(!empty($replyinfo["reply_body1"])): ?><ul class="blog-f fl">
            <li style="background:rgba(0,0,0,.1);border-radius:2px;padding:0.5rem 0.5rem">
              <p class="fl w100">回复&nbsp;<span class="c-bule"><?php echo ($replyinfo["username1"]); ?></span><span class="fr fs1 l-gray"><?php echo (date('Y-m-d H:i:s',$replyinfo["ctime1"])); ?></span></p>
              <p class="w100 t-w"><?php echo ($replyinfo["reply_body1"]); ?></p>
            </li>
          </ul><?php endif; ?>
          <p class="ti2"> <?php echo ($replyinfo["reply_body"]); ?></p>
        </li><?php endforeach; endif; ?>
      </ul>
    </div>

  </section>
   <div class="fin-pbpl">
    <form action="/index.php/Mobile/posts/reply" method="post" id="replyform">
      <a class="fin-pbpl-an1 fl" href="Javascript:window.history.go(-1)"><img src="<?php echo (MIMG_URL); ?>tb_14.png"></a>
      <input type="hidden" name="post_id" value="<?php echo ($postinfo["post_id"]); ?>">
      <input type="hidden" name="replypid" value="0"><!--回复的pid 默认为0是回复楼主，否则为回复其他人-->
      <input class="fin-pbpl-k1 fl" name="reply_body" type="text" style="width:59%">
      <a class="fin-pbpl-an fl" href="javascript:void(0)" id="replybtn"><img src="<?php echo (MIMG_URL); ?>tb_11.png"></a> <a class="fin-pbpl-an fl" href="javascript:void(0)" <?php if($postinfo["allow"] == 1): ?>onclick="collect(this,'/index.php/Mobile/Posts/collect/post_id/'+<?php echo ($postinfo["post_id"]); ?>)" <?php else: endif; ?>><?php if($postinfo["allow"] == 1): ?><img src="<?php echo (MIMG_URL); ?>tb_12.png"><?php else: ?><img src="<?php echo (MIMG_URL); ?>tb_12.png" style="opacity:0.5"><?php endif; ?></a> <a class="fin-pbpl-an fl" href="javascript:void(0)"><img src="<?php echo (MIMG_URL); ?>tb_13.png"></a>
    </form>
  </div>
</div>
<!--*****footer*****-->
<footer>
    <p class="copyright" style="padding-bottom: 5rem;">Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved.<br>
        蓝海长青 版权所有</p>
</footer>
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
<!--*****footer*****-->
<script type="text/javascript" src="<?php echo (MJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src='<?php echo (MJS_URL); ?>createposts.js' ></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>share.js"></script>
<script type="text/javascript">
  $(function(){
    $("#recordslist").on('click','.replythis',function(){
      $("input[name='replypid']").val($(this).attr('replypid'));
      $("input[name='reply_body']").focus();
    })
	var signPackage = <?php echo ($signPackage); ?>;//签名数据包
	var shareData = <?php echo ($shareData); ?>;//分享信息
	loadshare(signPackage,shareData);
  })
</script>
<!-- 滚动加载 -->
<script type="text/javascript">
  $(function(){
    var postid = $("#recordslist").attr('postid');
    var scrollstatus = false;
    var haveend = false;
    var nowpage = 1;
    function ajax_request(postid,nowpage){
      var html = '';
      var recordslist = $("#recordslist");//放数据的容器
      $.get("/index.php/Mobile/Posts/detail/post_id/"+postid,{'p':nowpage},function(data){
        if(data.error == 0){
          var commenthtml = '';
		  var comment1 = '';
          for(var i in data.content){
			if((data.content[i].reply_body1 != '') && (data.content[i].reply_body1 !== null)){
				comment1 = "<ul class='blog-f fl'><li style='background:rgba(0,0,0,.1);border-radius:2px;padding:0.5rem 0.5rem'><p class='fl w100'>回复&nbsp;<span class='c-bule'>"+data.content[i].username1+"</span><span class='fr fs1 l-gray'>"+data.content[i].ctime1+"</span></p><p class='w100 t-w'>"+data.content[i].reply_body1+"</p></li></ul>";
			}else{
				comment1 = '';
			}
            commenthtml += "<li><dl class='blog-b fl'><dt style='width:3.5rem;height:3.5rem;overflow:hidden'><img style='width:3.5rem' src='"+data.content[i].userhead+"'></dt><dd>"+data.content[i].username+"<span class='blog-c fr' style='color:#af1e25'>"+data.content[i].thefloor+"</span><br><span class='fs1 l-gray'>"+data.content[i].ctime+"</span><a class='replythis' href='javascript:void(0)' replypid='"+data.content[i].reply_id+"'><span class='fr' style='clear:both;padding-right:0.5rem'>回复</span><span class='fr blog-d'><img src='/Public/Mobile/images/tb_47.png'></span></a></dd></dl>"+comment1+"<p class='ti2'> "+data.content[i].reply_body+"</p></li>";
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
          ajax_request(postid,nowpage);
        }
      }
    });
   });
</script>


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