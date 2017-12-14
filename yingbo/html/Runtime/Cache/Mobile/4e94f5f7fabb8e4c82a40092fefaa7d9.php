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
                  <span style="padding-bottom:0.875rem;color:#00a6d2;display:block">预约评估订单</span>
                  <?php if(is_array($orderList)): foreach($orderList as $key=>$info): if($info["shopid"] == ''): ?><li>   
                    <p class="wmc_tb wmc_bj"></p>
                    <div class="wmc_list">
                       <p class="wwcd_tit">描述<span><?php echo (date("Y-m-d",$info["inputtime"])); ?></span></p>
                       <p class="wwcd_con wwcd_tit">提供中医理疗、慢病回访等服务</p>
                    </div>
                    </li><?php endif; endforeach; endif; ?>
                  <span style="padding-bottom:0.875rem;padding-top:0.875rem;color:#00a6d2;display:block">预约服务订单</span>
                  <?php if(is_array($orderList)): foreach($orderList as $key=>$info): if(($info["auserid"] == '') and ($info["shopid"] != '')): ?><a href="/index.php/Mobile/Patient/orderinfo/orderid/<?php echo ($info["orderid"]); ?>">
                    <li>   
                    <p class="wmc_tb wmc_bj"></p>
                    <div class="wmc_list">
                       <p class="wwcd_tit">描述<span><?php echo (date("Y-m-d",$info["inputtime"])); ?></span></p>
                       <p class="wwcd_con wwcd_tit">提供中医理疗、慢病回访等服务<?php echo ($info['if_say']?"<span style='color:green'>已支付</span>":"<span style='color:red'>未支付</span>"); ?></p>
                    </div>
                    </li>
                    </a><?php endif; endforeach; endif; ?>
                  </ul>
                  </div>
                </div>


                <div class="orderlist" style="color:red"> 
                   <div class="wddd">
                  <ul class="wmc_con">
                  <span style="padding-bottom:0.875rem;color:#00a6d2;display:block">预约评估订单</span>
                  <?php if(is_array($assessorder)): foreach($assessorder as $key=>$assessinfo): if($assessinfo["status"] == '1'): ?><li>   
                    <p class="wmc_tb wmc_bj"></p>
                    <div class="wmc_list">
                    <p class="wmc_tp"><?php if($assessinfo["photo"] == ''): ?><img src="<?php echo (MBIMG_URL); ?>pgtu.jpg"><?php else: ?><img src="/Public/<?php echo ($assessinfo["photo"]); ?>"><?php endif; ?></p>
                    <p class="wmc_wz"><?php echo ($assessinfo["username"]); ?><span class="xinxin"><?php $__FOR_START_1552960199__=0;$__FOR_END_1552960199__=$assessinfo["credit"];for($i=$__FOR_START_1552960199__;$i < $__FOR_END_1552960199__;$i+=1){ ?><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><?php } ?></span><br>联系电话：<?php echo ($assessinfo["iphone"]); ?><br>联系地址：<?php echo ($assessinfo["area"]); ?></p>
                    <p class="jxs_hs gray"><?php echo (date("Y-m-d",$assessinfo["inputtime"])); ?></p>
                    <p class="wmc_an">已接单</p>
                    </div>
                   </li><?php endif; endforeach; endif; ?>
                  <span style="padding-bottom:0.875rem;padding-top:0.875rem;color:#00a6d2;display:block">预约服务订单</span>
                    <?php if(is_array($nurseorder)): foreach($nurseorder as $key=>$nurseinfo): if($nurseinfo["status"] == '1'): ?><a href="/index.php/Mobile/Patient/orderinfo/orderid/<?php echo ($nurseinfo["orderid"]); ?>/suborderid/<?php echo ($nurseinfo["suborder"]["orderid"]); ?>">
                      <li>   
                      <p class="wmc_tb wmc_bj"></p>
                      <div class="wmc_list">
                      <p class="wmc_tp"><?php if($nurseinfo["photo"] == ''): ?><img src="<?php echo (MBIMG_URL); ?>pgtu.jpg"><?php else: ?><img src="/Public/<?php echo ($nurseinfo["photo"]); ?>"><?php endif; ?></p>
                      <p class="wmc_wz"><?php echo ($nurseinfo["suborder"]["username"]); ?><span class="xinxin"><?php $__FOR_START_1928800162__=0;$__FOR_END_1928800162__=$nurseinfo["credit"];for($i=$__FOR_START_1928800162__;$i < $__FOR_END_1928800162__;$i+=1){ ?><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><?php } ?></span><br>联系电话：<?php echo ($nurseinfo["suborder"]["iphone"]); ?><br>联系地址：<?php echo ($nurseinfo["suborder"]["area"]); ?></p>
                      <p class="jxs_hs gray"><?php echo (date("Y-m-d",$nurseinfo["suborder"]["inputtime"])); ?></p>
                      <p class="wmc_an">已接单</p>
                      </div>
                     </li>
                     </a><?php endif; endforeach; endif; ?>
                  </ul>
                  </div>
                </div>
                <div class="orderlist" style="color:blue"> 
                   <div class="wddd">
                  <ul class="wmc_con">
                  <span style="padding-bottom:0.875rem;color:#00a6d2;display:block">预约评估订单</span>
                  <?php if(is_array($assessorder)): foreach($assessorder as $key=>$assessinfo): if($assessinfo["status"] == '2'): ?><li>   
                      <p class="wmc_tb wmc_bj"></p>
                      <div class="wmc_list">
                      <p class="wmc_tp"><?php if($assessinfo["photo"] == ''): ?><img src="<?php echo (MBIMG_URL); ?>pgtu.jpg"><?php else: ?><img src="/Public/<?php echo ($assessinfo["photo"]); ?>"><?php endif; ?></p>
                      <p class="wmc_wz"><?php echo ($assessinfo["username"]); ?><span class="xinxin"><?php $__FOR_START_1229457534__=0;$__FOR_END_1229457534__=$assessinfo["credit"];for($i=$__FOR_START_1229457534__;$i < $__FOR_END_1229457534__;$i+=1){ ?><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><?php } ?></span><br>联系电话：<?php echo ($assessinfo["iphone"]); ?><br>联系地址：<?php echo ($assessinfo["area"]); ?></p>
                      <p class="jxs_hs gray"><?php echo (date("Y-m-d",$assessinfo["inputtime"])); ?></p>
                      </div>
                       <p class="ywc_hs"><a style="color:#00a6d2" href="/index.php/Mobile/Patient/seelist/orderid/<?php echo ($assessinfo["orderid"]); ?>">评估报告</a></p>
                    </li><?php endif; endforeach; endif; ?>
                  <span style="padding-bottom:0.875rem;padding-top:0.875rem;color:#00a6d2;display:block">预约服务订单</span>
                  <?php if(is_array($nurseorder)): foreach($nurseorder as $key=>$nurseinfo): if($nurseinfo["status"] == '2'): ?><a href="/index.php/Mobile/Patient/orderinfo/orderid/<?php echo ($nurseinfo["orderid"]); ?>/suborderid/<?php echo ($nurseinfo["suborder"]["orderid"]); ?>">
                  <li> 
                    <p class="wmc_tb wmc_bj"></p>
                    <div class="wmc_list">
                    <p class="wmc_tp"><?php if($nurseinfo.suborder.photo == ''): ?><img src="<?php echo (MBIMG_URL); ?>pgtu.jpg"><?php else: ?><img src="/Public/<?php echo ($nurseinfo["suborder"]["photo"]); ?>"><?php endif; ?></p>
                    <p class="wmc_wz"><?php echo ($nurseinfo["suborder"]["username"]); ?><span class="xinxin"><?php $__FOR_START_308822376__=0;$__FOR_END_308822376__=$nurseinfo["suborder"]["credit"];for($i=$__FOR_START_308822376__;$i < $__FOR_END_308822376__;$i+=1){ ?><img src="<?php echo (MBIMG_URL); ?>xing.jpg"><?php } ?></span><br>联系电话：<?php echo ($nurseinfo["suborder"]["iphone"]); ?><br>联系地址：<?php echo ($nurseinfo["suborder"]["area"]); ?></p>
                    <p class="jxs_hs gray"><?php echo (date("Y-m-d",$nurseinfo["suborder"]["inputtime"])); ?></p>
                    </div>
                     <ul class="ywc_hsc borTop borBot">
                     <li><?php echo ($nurseinfo["introduce"]); ?></li>
                     </ul>
                     <ul class="ywc_list">
                     <li><span>1</span>已选服务时间/小时</li>
                     <li><span><?php echo ($nurseinfo["number"]); ?></span>已选服务次数</li>
                     </ul>
                     </li>
                     </a><?php endif; endforeach; endif; ?>
                  </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>

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