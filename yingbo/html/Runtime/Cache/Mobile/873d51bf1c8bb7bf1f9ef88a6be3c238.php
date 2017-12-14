<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title><?php echo ($daohang["first"]); ?></title>
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
            <a href="/index.php/Mobile/<?php echo ($autoChange); ?>" class="headlogin"></a>
            <?php elseif($daohang["first"] != '乐护首页'): ?>
            <a href="Javascript:window.history.go(-1)" class="headBack"></a>
            <div class="headTit"><?php echo ($daohang["first"]); ?></div>
            <a href="/index.php/Mobile/<?php echo ($autoChange); ?>" class="headlogin"></a><?php endif; ?>
    </header>


    
        <div class="main">
               <form action="/index.php/Mobile/Patient/payorder" method="post" enctype='multipart/form-data'>
                   <div>
                       <img src="<?php echo (SITE_URL); echo ($info["pic"]); ?>" />
                   </div>
                   <div class="storwList">
                       <span><?php echo ($info["china"]); ?>：</span>
                       <div class="storwDate">
                           <em >￥<?php echo ($info["price"]); ?>/小时</em>
                       </div>
                   </div>
                   <!--<div class="storwList">-->
                       <!--<span>VIP会员价：充值2000送200    充值5000送500</span>-->
                   <!--</div>-->
                   <div class="storeListD">
                       <p class="storeListDTxt">
                           <strong>内容介绍：</strong>
                    <span>
                        <?php echo ($info["introduce"]); ?>
                    </span>
                       </p>
                       <!--<p class="storeListDTxt">-->
                           <!--<strong>理疗时间：</strong>-->
                    <!--<span>-->
                        <!--60分钟-->
                    <!--</span>-->
                       <!--</p>-->
                       <!--<p class="storeListDTxt">-->
                           <!--<strong>护理手法：</strong>-->
                    <!--<span>-->
                        <!--产后泌乳护理-->
                    <!--</span>-->
                       <!--</p>-->

                       <div class="xj_cp">
                           <p class="xj_cp_t">购买次数：</p>
                           <p class="xj_cp_n"><!--<em>+</em>-->
                           <div class="gw_num">
                               <em class="jian">-</em>
                               <input type="text" name="number" value="1" class="num" />
                               <em class="add">+</em>
                           </div>
                           </p>
                       </div>

                   </div>
                   <div class="yuyBtn"  >
                        <input type="hidden" name="shopid" value="<?php echo ($info["pro_id"]); ?>">
                       <a><input id="bsubmit" type="submit"  value="预约服务" style="color: #ffffff;"/></a>
                   </div>
               </form>



        </div>
    </div>


    </div>

    <script type="text/javascript">
        $(document).ready(function(){
//加的效果
            $(".add").click(function(){
                var n=$(this).prev().val();
                var num=parseInt(n)+1;
                if(num==0){ return;}
                $(this).prev().val(num);
            });
//减的效果
            $(".jian").click(function(){
                var n=$(this).next().val();
                var num=parseInt(n)-1;
                if(num==0){ return}
                $(this).next().val(num);
            });
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