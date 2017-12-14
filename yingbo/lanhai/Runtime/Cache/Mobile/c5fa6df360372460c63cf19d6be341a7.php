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


<div class="main">
    <!--*****banner*****-->
    <section>
        <div class="nht-xl fl">
            <p class="lin-tt">在线<span class="d-red">咨询</span><span class="nht-tt fr">&nbsp;</span></p>
            <ul class="nht-sumenu fr">
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
        </div>
    </section>
    <script type="text/javascript">
        $(".nht-tt").click(function(){
            $(".nht-sumenu").slideToggle("1000");
        });
    </script>
    <!--*****banner*****-->
    <section>
        <p class="abo-banner fl">
            <?php if(is_array($adinfo)): foreach($adinfo as $key=>$v): ?><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"><?php endforeach; endif; ?>

        </p>
    </section>
    <!--*****h-l*****-->
    <section>
        <div class="h-l pb1 fl">
            <!--<p class="h-l-tt">在线咨询</p>-->
            <p class="adv-nr-tit fl">您好，欢迎来到北京蓝海长青规划设计研究有限公司！请您留下联系方式，我们会在第一时间为您反馈。</p>
            <ul class="adv-nr fl">
                <form action="/index.php/Mobile/Advice/showlist/lan_id/33.html" method="post" class="form-horizontal" enctype="multipart/form-data" id="form">
                    <li><img src="<?php echo (MIMG_URL); ?>tb_16.png">
                        <input class="adv-nr-k fl w65 h3-3" name="name" placeholder="请输入您的姓名" type="text">
                    </li>
                    <li><img src="<?php echo (MIMG_URL); ?>tb_17.png">
                        <input class="adv-nr-k fl w65 h3-3" name="iphone" placeholder="请输入您的手机号" type="text">
                    </li>
                    <li><img src="<?php echo (MIMG_URL); ?>tb_18.png">
                        <input class="adv-nr-k fl w65 h3-3" name="email" placeholder="请输入您的邮箱" type="text">
                    </li>
                    <li><img src="<?php echo (MIMG_URL); ?>tb_19.png">
                        <input class="adv-nr-k fl w75 h3-3" name="address" placeholder="请输入您的地址" type="text">
                    </li>
                    <li><img src="<?php echo (MIMG_URL); ?>tb_20.png">
                        <textarea name="content" id="content" class="adv-nr-k fl w75 h7" placeholder="请输入您想了解的内容"></textarea>
                    </li>
                        <li>
                            <button type="button" id="bsubmit" class="adv-nr-tj">提交</button>

                        </li>

                </form>
            </ul>
        </div>
    </section>

    <script type="text/javascript">
        $(function(){

            $("#bsubmit").click(function(){

                var name=$("input[name='name']").val();
                if($("input[name='name']").val() == ''){
                    $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:3rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:3rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>"+'姓名不能为空'+"</div>");

                    $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);$("#bsubmit").attr('disabled',true);setTimeout(function(){$("#errormsg").remove();location.reload()},3000);
                    return false;
                }
                if(name.length>=4 && name.length<=2){
                    $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:3rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:3rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>"+'请输入正确的姓名'+"</div>");

                    $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);$("#bsubmit").attr('disabled',true);setTimeout(function(){$("#errormsg").remove();location.reload()},3000);
                    return flase;
                }
                var iphone=$("input[name='iphone']").val();
                var myreg = /^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/i;
                if($("input[name='iphone']").val() == ''){
                    $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:3rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:3rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>"+'手机号不能为空'+"</div>");

                    $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);$("#bsubmit").attr('disabled',true);setTimeout(function(){$("#errormsg").remove();location.reload()},3000);
                    return false;
                }
                if(!myreg.test(iphone)){
                    $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:3rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:3rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>"+'手机号非法'+"</div>");

                    $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);$("#bsubmit").attr('disabled',true);setTimeout(function(){$("#errormsg").remove();location.reload()},3000);
                    return false;
                }

                var email=$("input[name='email']").val();
                if($("input[name='email']").val() == ''){
                    $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:3rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:3rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>"+'邮箱不能为空'+"</div>");

                    $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);$("#bsubmit").attr('disabled',true);setTimeout(function(){$("#errormsg").remove();location.reload()},3000);
                    return false;
                }
                var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
                if(!reg.test(email)){
                    $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:3rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:3rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>"+'邮箱格式不正确'+"</div>");

                    $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);$("#bsubmit").attr('disabled',true);setTimeout(function(){$("#errormsg").remove();location.reload()},3000);
                    return false;
                }

                var address=$("input[name='address']").val();
                if($("input[name='phone']").val() == ''){
                    $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:3rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:3rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>"+'地址不能为空'+"</div>");

                    $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);$("#bsubmit").attr('disabled',true);setTimeout(function(){$("#errormsg").remove();location.reload()},3000);
                    return false;
                }
                var content=  $('#content').val();
                if($("input[name='content']").val() == ''){
                    $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:3rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:3rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>"+'内容不能为空'+"</div>");

                    $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);$("#bsubmit").attr('disabled',true);setTimeout(function(){$("#errormsg").remove();location.reload()},3000);
                    return false;
                }


                $.ajax({
                    url:"/index.php/Mobile/Advice/liuyan",
                    data:{'name':name,'iphone':iphone,'email':email,'address':address,'content':content},
                    dataType:'json',
                    type:'post',
                    success:function(data) {

                            $("body").append("<div id='errormsg' style='display:none;position:fixed;left:50%;top:50%;z-index:9999;width:12rem;height:3rem;margin-left:-6rem;margin-top:-1.5rem;text-align:center;line-height:3rem;color:white;font-weight:bold;font-size:1.5rem;opacity:0.7;background:#666'>" + '感谢您的留言!' + "</div>");

                            $("#errormsg").fadeIn(1500);$("#errormsg").fadeOut(1500);$("#bsubmit").attr('disabled',true);setTimeout(function(){$("#errormsg").remove();location.reload()},3000);
                        }

                });
            })


        })
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