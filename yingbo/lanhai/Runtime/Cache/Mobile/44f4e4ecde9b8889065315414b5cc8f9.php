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
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
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
    <!--*****内容*****-->
    <style>
    .fin-twnr section img{ max-width:100%;}
    </style>
    <div class="fin-nr">
        <h1><?php echo ($info["news_title"]); ?></h1>
        <p class="w100 fl t-w l-gray fs1 pt0-5 pb1"><?php echo ($info["author"]); ?>&nbsp;&nbsp;</p>
        <p class="w100 fl t-w l-gray fs1 pb1"><?php echo ($info["add_time"]); ?><span class="fin-nr-img"><img src="<?php echo (MIMG_URL); ?>tb_15.png"><?php echo ($info["click"]); ?></span></p>
        <div class="fin-twnr fl">
          <?php echo ($info["content"]); ?>
        </div>
    </div>
    <input type='hidden' id='news_id' value='<?php echo ($info["news_id"]); ?>'>
    <div class="fin-zxpl fl">
        <p class="fin-zxpl-t fl">最新评论 </p> <p class="fr fin-npl"><span><?php echo ($info["talk"]); ?></span>条评论</p>
        <div class="fin-zxpl-c fl" id="recordslist" totalPages="<?php echo ($totalPages); ?>">
            <?php if(is_array($cominfo)): foreach($cominfo as $key=>$v): ?><dl class="fin-zxpl-pic fl">
                <dt><img src="<?php echo (MIMG_URL); ?>images_03.jpg"></dt>
                <dd><span class="fl l-gray fs1-2"><?php echo (date('Y-m-d H:i:s',$v["add_time"])); ?></span><spans class="w100 fl"><?php echo ($v["content"]); ?></spans>
                </dd>
            </dl><?php endforeach; endif; ?>
        </div>

    </div> <div style="text-align:center;display:none;" id="loading"><img src="<?php echo (MIMG_URL); ?>loader.gif" width="" height="" border="0" alt="" /></div>
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
    <!-- 滚动加载 -->
    <script type="text/javascript">

        $(function(){
            var news_id = $('#news_id').val();
            var scrollstatus = false;
            var totalPages = $("#recordslist").attr('totalPages');
            var nowpage = 1;
            function ajax_request(nowpage){
                var html = '';
                var recordslist = $("#recordslist");//放数据的容器
                $.post("/index.php/Mobile/News/detail/p/"+nowpage,{news_id:news_id},function(data){
                    if(data.error == 0){
                        for(var i in data.content){
                            html += "<dl class='fin-zxpl-pic fl'><dt><img src='<?php echo (MIMG_URL); ?>images_03.jpg'></dt><dd><span class='fl l-gray fs1-2'>"+data.content[i].add_time+"</span><p class='w100 fl'>"+data.content[i].content+"</p></dd></dl>";
                        }
                    }
                    recordslist.append(html);
                    $("#loading").css("display",'none');
                    scrollstatus = false;
                });
            }
            $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();
                var scrollHeight = $(document).height();
                var windowHeight = $(this).height();
                if (scrollTop + windowHeight == scrollHeight && scrollstatus == false) {
                    scrollstatus = true;
                    nowpage++;
                    if(nowpage <= totalPages){
                        $("#loading").css("display",'block');
                        setTimeout(function(){ajax_request(nowpage)},2000);
                    }
                }
            });
        });
    </script>
    <!--*****news*****-->

    <script style="text/javascript">
        function send_comment(){
            var content= $("input[name='content']").val();
            if(content==''){

			 $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:5rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:5rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>"+'评论内容不能为空'+"</div>");

                    $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);setTimeout(function(){$("#errormsg").remove();},3000);
                    return false;
                return;
            }
            var news_id = $('#news_id').val();
            $.ajax({
                url:"/index.php/Mobile/Ncomment/sendComment",
                data:{'content':content,'news_id':news_id},
                dataType:'json',
                type:'post',
                success:function(data){
				if(data.error == 'illegalword'){


			 $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:5rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:5rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>"+data.mingan+"</div>");

                    $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);setTimeout(function(){$("#errormsg").remove();},3000);
                    return false;

		}else{
		  var s = '<dl class="fin-zxpl-pic fl"><dt><img src="<?php echo (MIMG_URL); ?>images_03.jpg"></dt><dd><span class="fl l-gray fs1-2">'+data.add_time+'</span><p class="w100 fl">'+data.content+'</p></dd></dl>';
                    $('.fin-zxpl-c').prepend(s);
                    $("input[name='content']").val('',false);
		}

                }
            });
        }
    </script>
</div>
<!--*****footer*****-->
<footer>
    <p class="copyright" style="padding-bottom: 5rem;">Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved.<br>
        蓝海长青 版权所有</p>
</footer>
<!--*****footer*****-->
<div class="fin-pbpl">
    <a class="fin-pbpl-an1 fl"  href="Javascript:window.history.go(-1)"><img src="<?php echo (MIMG_URL); ?>tb_14.png"></a>
    <input class="fin-pbpl-k fl" name="content" type="text" >
    <a class="fin-pbpl-an fl" onclick="send_comment()"><img src="<?php echo (MIMG_URL); ?>tb_11.png"></a>
</div>
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