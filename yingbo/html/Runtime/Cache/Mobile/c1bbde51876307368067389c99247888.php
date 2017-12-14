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
            <ul class="orderNav borBot">    
                <li class="cur">
                    <span>未完成</span>
                </li>
                <li>
                    <span>进行中</span>
                </li>
                <li>
                    <span>已完成</span>
                </li>
            </ul>
            <div>
                <div class="orderlist cur"> 
                   <div class="wddd">
                      <ul class="wmc_con">
                        <?php if(is_array($orderList)): foreach($orderList as $key=>$info): if($info["status"] == '0'): ?><a href="/index.php/Mobile/Nurse/orderinfo/orderid/<?php echo ($info["orderid"]); ?>">
                          <li>   
                          <p class="wmc_tb wmc_bj"></p>
                          <div class="wmc_list">
                          <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>tx.jpg"></p>
                          <p class="wmc_wz"><?php echo ($info["username"]); ?><br>联系电话：<?php echo ($info["iphone"]); ?><br>联系地址：<?php echo ($info["area"]); ?></p>
                          <p class="jxs_hs gray"><?php echo (date("Y-m-d",$info["inputtime"])); ?></p>
                           </div>
                         </li>
                         </a><?php endif; endforeach; endif; ?>
                      </ul>
                  </div>
                </div>
                <div class="orderlist"> 
                  <div class="wddd">
                  <ul class="wmc_con">
                  <?php if(is_array($orderList)): foreach($orderList as $key=>$info): if($info["status"] == '1'): ?><a href="/index.php/Mobile/Nurse/orderinfo/orderid/<?php echo ($info["orderid"]); ?>">
                    <li>  
                    <p class="wmc_tb wmc_bj"></p>
                    <div class="wmc_list">
                    <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>tx.jpg"></p>
                    <p class="wmc_wz"><?php echo ($info["username"]); ?><br>联系电话：<?php echo ($info["iphone"]); ?><br>联系地址：<?php echo ($info["area"]); ?></p>
                    <p class="jxs_hs gray"><?php echo (date("Y-m-d",$info["inputtime"])); ?></p>
                    </div>
                    </li>
                    </a><?php endif; endforeach; endif; ?>
      
                  </ul>
                  </div>
                </div>
                <div class="orderlist"> 
                  <div class="wddd">
                  <ul class="wmc_con">
                   <?php if(is_array($orderList)): foreach($orderList as $key=>$info): if($info["status"] == '2'): ?><a href="/index.php/Mobile/Nurse/orderinfo/orderid/<?php echo ($info["orderid"]); ?>">
                    <li>   
                    <p class="wmc_tb wmc_bj"></p>
                    <div class="wmc_list">
                    <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>tx.jpg"></p>
                    <p class="wmc_wz"><?php echo ($info["username"]); ?><br>联系电话：<?php echo ($info["iphone"]); ?><br>联系地址：<?php echo ($info["area"]); ?></p>
                    <p class="jxs_hs gray"><?php echo (date("Y-m-d",$info["inputtime"])); ?></p>
                   </div>
                   <p class="ywc_hs">服务内容</p>
                    
                    <ul class="ywc_hsc borTop borBot">
                    <?php if(is_array($info["introduce"])): foreach($info["introduce"] as $k=>$indu): ?><li><i><?php echo ($k+1); ?></i><?php echo ($indu["introduce"]); ?></li><?php endforeach; endif; ?>
                    </ul>
                     <ul class="ywc_list">
                     <li><span>1</span>已选服务时间/小时</li>
                     <li><span>1</span>已选服务次数</li>
                     </ul>
                        <p class="ywc_hs borTop borBot">评价</p>
                        <ul class="ywc_list1">
                        <?php if(is_array($info["comment"])): foreach($info["comment"] as $key=>$com): ?><li>
                        <p class="ywc_list1_n"><span class="ywc_st_xm"><?php echo ($com["username"]); ?></span><span class="ywc_st_dz"><?php echo ($com["city"]); ?></span><span class="ywc_st_dh"><?php echo ($com["iphone"]); ?></span><span class="ywc_st_sj"><?php echo ($com["comment"]); ?></span></p>
                        <p class="ywc_st_hy">{}</p>
                        </li><?php endforeach; endif; ?>
                        </ul>
                   </li>
                   </a><?php endif; endforeach; endif; ?>
                  </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>base.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".orderNav li").click(function(){
                $(this).addClass("cur").siblings().removeClass("cur");
                $(".orderlist").eq($(this).index()).addClass("cur").siblings().removeClass("cur");
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