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
    <style>
       html body{
           color: #000000;
       }
        
    </style>
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
            <div>  
                <div style="color:blue"> 
                   <div class="wddd">
                  <ul class="wmc_con">
                  <?php if(is_array($assessorder)): foreach($assessorder as $key=>$assessinfo): ?><li>   
                      <p class="wmc_tb wmc_bj"></p>
                      <div class="wmc_list">
                      <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>tx.jpg"></p>
                      <p class="wmc_wz"><?php echo ($assessinfo["username"]); ?><span class="xinxin"><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><img src="<?php echo (MBIMG_URL); ?>xing.jpg"></span><br>联系电话：<?php echo ($assessinfo["iphone"]); ?><br>联系地址：<?php echo ($assessinfo["area"]); ?></p>
                      <p class="jxs_hs gray"><?php echo (date("Y-m-d",$assessinfo["inputtime"])); ?></p>
                      <p class="wmc_an"><a href="/index.php/Mobile/Patient/comment/orderid/<?php echo ($assessinfo["orderid"]); ?>">去评价</a></p>
                      </div>
                    </li><?php endforeach; endif; ?>
                          
                  <?php if(is_array($nurseorder)): foreach($nurseorder as $key=>$nurseinfo): ?><li> 
                    <p class="wmc_tb wmc_bj"></p>
                    <div class="wmc_list">
                    <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>tx.jpg"></p>
                    <p class="wmc_wz"><?php echo ($nurseinfo["username"]); ?><span class="xinxin"><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><img src="<?php echo (MBIMG_URL); ?>xing.jpg"></span><br>联系电话：<?php echo ($nurseinfo["iphone"]); ?><br>联系地址：<?php echo ($nurseinfo["area"]); ?></p>
                    <p class="jxs_hs gray"><?php echo (date("Y-m-d",$nurseinfo["inputtime"])); ?></p>
                    <p class="wmc_an"><a href="/index.php/Mobile/Patient/comment/suborderid/<?php echo ($nurseinfo["orderid"]); ?>/orderid/<?php echo ($nurseinfo["parent_id"]); ?>">去评价</a></p>
                    </div>
                     </li><?php endforeach; endif; ?>
                  </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>

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