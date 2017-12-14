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

<link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<!--*****header*****-->
<header class="bb-b"> <a class="head_back1" href="Javascript:window.history.go(-1)">&nbsp;</a>
  <div class="headTit1">我的</div>
   <?php if($signature["status"] == '0'): ?><span class="headqd" id="signatured" style="display:none;background:#ccc">已签到</span><span class="headqd" id="signature">签到</span><?php else: ?><span class="headqd" id="signatured" style="background:#ccc">已签到</span><span class="headqd" id="signature" style="display:none">签到</span><?php endif; ?>
</header>

<!--*****header*****-->
<div class="main">
  <!--*****for*****-->
  <section>
  <div class="my-top">
  <div class="my-bj fl">
  <p class="my-img"><img src="<?php echo ($detail["userhead"]); ?>"></p>
  <p class="my-txt fl"><img src="<?php echo (MIMG_URL); ?>tb_45.png"><?php echo ($detail["username"]); ?><br><span class="l-gray"><?php echo ($detail["mysign"]); ?></span></p>
  </div>
  <div class="my-menu fl">
  <ul class="my-list">
  <li><a href="/index.php/Mobile/User/myposts"><img src="<?php echo (MIMG_URL); ?>tb_36.png"><br>我的帖子</a></li>
  <li><a href="/index.php/Mobile/User/myfollows"><img src="<?php echo (MIMG_URL); ?>tb_37.png"><br>我的关注</a></li>
    <li><a href="/index.php/Mobile/User/mycollect"><img src="<?php echo (MIMG_URL); ?>tb_38.png"><br>我的收藏</a></li>
  <li><a href="/index.php/Mobile/User/myscore"><img src="<?php echo (MIMG_URL); ?>tb_39.png"><br>我的积分</a></li>
  </ul>
</div>
  </div>

  </section>
  <!--*****for-c*****-->
   <section>
<ul class="my-list-a fl pb6">
<li><a href="/index.php/Mobile/Blog/myzone"><span class="fl my-list-img pl1 w50"><img src="<?php echo (MIMG_URL); ?>tb_40.png">我的博客</span><span class="fr my-list-more"><img src="<?php echo (MIMG_URL); ?>tb_46.png"></span></a></li>
<li><a href="/index.php/Mobile/User/invite"><span class="fl my-list-img pl1 w50"><img src="<?php echo (MIMG_URL); ?>tb_41.png">邀请好友</span><span class="fr my-list-more"><img src="<?php echo (MIMG_URL); ?>tb_46.png"></span></a></li>
<li><a href="/index.php/Mobile/User/personal"><span class="fl my-list-img pl1 w50"><img src="<?php echo (MIMG_URL); ?>tb_42.png">个人资料</span><span class="fr my-list-more"><img src="<?php echo (MIMG_URL); ?>tb_46.png"></span></a></li>
<li><a href="/index.php/Mobile/User/set"><span class="fl my-list-img pl1 w50"><img src="<?php echo (MIMG_URL); ?>tb_43.png">设置管理</span><span class="fr my-list-more"><img src="<?php echo (MIMG_URL); ?>tb_46.png"></span></a></li>
</ul>
  </section>

</div>
<script src="<?php echo (MJS_URL); ?>jquery.hiSlider.min.js"></script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>msgbox.js"></script>
<script>
	$('.hiSlider3').hiSlider({
		isFlexible: true,
		isSupportTouch: true,
		titleAttr: function(curIdx){
			return $('img', this).attr('alt');
		}
	});
</script>
<script type="text/javascript">
    $(function(){
      $("#signature").click(function(){
        $.get("/index.php/Mobile/User/signature",function(data){
          if(data == 'success'){
              $("#signatured").fadeIn();
              $("#signature").hide();
              myalertbox('签到成功');
          }else{
              myalertbox('签到失败');
          }
        })
      })
    })
</script>
</body>
</html>