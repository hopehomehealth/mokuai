<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>乐护首页 </title>
    <link rel="stylesheet" type="text/css" href="<?php echo (MBCSS_URL); ?>swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (MBCSS_URL); ?>reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (MBCSS_URL); ?>hzw-city-picker.css">
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>hzw-city-picker.min.js"></script>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>city-data.js"></script>
</head>
<body>
<div id="box" class="indexBox">
    <header>
        <?php if($daohang["first"] == '乐护首页'): ?><div class="headTit"><?php echo ($daohang["first"]); ?></div>
            <a href="<?php echo U('User/login');?>" class="headlogin"></a>
            <?php elseif($daohang["first"] != '乐护首页'): ?>
            <a href="Javascript:window.history.go(-1)" class="headBack"></a>
            <div class="headTit"><?php echo ($daohang["first"]); ?></div>
            <a href="<?php echo U('User/login');?>" class="headlogin"></a><?php endif; ?>
    </header>


    
        <div class="main">
        <style type="text/css">
.xj_xjpg{ width:100%;  margin: 0rem auto; height: 4.667rem;}
.xj_xjpg span{ width: 100%;  float:left; margin-left:0.8rem; padding: 0.4rem 0rem;}
.xj_xjpg_c{ width:50%; float: left; }
.xj_xjpg i{ width:20%; float:left; height: 2rem; }
.xj_xjpg_h{width:100%; background:url(<?php echo (MBIMG_URL); ?>xinxin_0.png) no-repeat center;background-size: 50% 50%;}
.xj_xjpg_go{width:100%; background:url(<?php echo (MBIMG_URL); ?>xing.jpg) no-repeat center;background-size: 50% 50%;}
        </style>
       
        <form action="" method="post" id="com-form">
         <div class="xj_xjpg borBot">
<span>评星：</span>
        <div class="xj_xjpg_c">
<i class="star xj_xjpg_h"></i><i class="star xj_xjpg_h"></i><i class="star xj_xjpg_h"></i><i class="star xj_xjpg_h"></i><i class="star xj_xjpg_h"></i>
        </div>

        
        </div>
            <div class="pgTxt">
                <textarea name="comment" placeholder="欢迎评论"></textarea>
                <div class="btn">
                	<input type="hidden" name="suborderid" value="<?php echo ($_GET['suborderid']); ?>">
                	<input type="hidden" name="orderid" value="<?php echo ($_GET['orderid']); ?>">
                	<input type="hidden" id="com-star" name="star" value="">
                    <?php if($is_com == '1'): ?><button type="submit" disabled="disabled" style="background:#8b9aa3" id="com-sub">提 交</button>
                    <?php else: ?>
                        <button type="submit" id="com-sub">提 交</button><?php endif; ?>
                </div>
            </div>
		</form>
        </div>
    <script type="text/javascript">
        $(function(){
            $(".star").click(function(){
                $(this).addClass("xj_xjpg_go").prevAll().addClass("xj_xjpg_go");
                $(this).nextAll().removeClass("xj_xjpg_go");
                $("#com-star").val($(this).index()+1);
            })
            $("#com-form").submit(function(){
                alert(111)
            	if($("#com-star").val() == ''){
            		return false;
            	}
            	if($("textarea").val() == ''){
            		return false;
            	}
            	$("#com-sub").attr('disabled',true);
            	$("#com-sub").css("background","#8b9aa3");
            	return true;
            })
        })
    </script>


 

    <div class="jy_footerBox">
        <ul>
            <li>
                <a href="<?php echo U('Index/index');?>">
                    <p <?php if(CONTROLLER_NAME == Index): ?>id="shou_x"<?php endif; ?> class="shou"></p>
                    首页
                </a>
            </li>
            <li>
                <a href="<?php echo U('Medical/medical');?>">
                    <p class="zhisi" <?php if(CONTROLLER_NAME == Medical): ?>id="zhisi_x"<?php endif; ?>></p>
                    知识
                </a>
            </li>
            <li>
                <a href="<?php echo U('Product/fuwu');?>">
                    <p class="fuwuk" <?php if(CONTROLLER_NAME == Product): ?>id="fuwuk_x"<?php endif; ?>></p>
                    服务
                </a>
            </li>
            <li>
                <a href="/index.php/Mobile/<?php echo ($autoChange); ?>">
                    <p class="wode" <?php if((CONTROLLER_NAME == Patient) OR (CONTROLLER_NAME == Assess) OR (CONTROLLER_NAME == Nurse) OR (CONTROLLER_NAME == User)): ?>id="wode_x"<?php endif; ?>></p>
                    我的
                </a>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript" src="<?php echo (MBJS_URL); ?>jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo (MBJS_URL); ?>base.js"></script>
<script type="text/javascript" src="<?php echo (MBJS_URL); ?>swiper.min.js"></script>
<script type="text/javascript">
    var mySwiper = new Swiper ('.banner', {
        pagination: '.swiper-pagination',
        autoplay : 3000,
        speed:500,
        loop:true,
        autoplayDisableOnInteraction : false
    });
</script>
</body>
</html>