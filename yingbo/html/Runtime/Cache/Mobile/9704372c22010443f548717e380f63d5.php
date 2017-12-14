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
                    <span>待评估</span>
                </li>
                <li>
                    <span>评估中</span>
                </li>
                <li>
                    <span>已评估</span>
                </li>
            </ul>
            
         <div>
                <div class="orderlist cur"> 
                    <div class="wddd">
                  <ul class="wmc_con">
                  <?php if(is_array($orderList)): foreach($orderList as $key=>$info): if(empty($info["pingctime"])): ?><li>   
                    <p class="wmc_tb wmc_bj"></p>
                    <div class="wmc_list">
                    <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>/tx.jpg"></p>
                    <p class="wmc_wz"><?php echo ($info["username"]); ?><br>联系电话：<?php echo ($info["iphone"]); ?><br>联系地址：<?php echo ($info["area"]); ?></p>
                    <p class="wmc_an doAssess">去评估</p><input type="hidden" class="orderid" name="orderid" value="<?php echo ($info["orderid"]); ?>">
                    </div>
                    </li><?php endif; endforeach; endif; ?>
                <!-- <li>   
                  <p class="wmc_tb wmc_bj1"></p>
                  <div class="wmc_list">
                  <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>/tx.jpg"></p>
                  <p class="wmc_wz">孙女士<br>联系电话：13552899898<br>联系地址：北京市海淀区中关村</p>
                  <p class="wmc_an">去评估</p>
                  </div>
                 </li>    -->
      
                  </ul>
                  </div>
                </div>
                <div class="orderlist"> 
                   <div class="wddd">
                  <ul class="wmc_con">
                  <?php if(is_array($orderList)): foreach($orderList as $key=>$info): if($info["pingctime"] AND ($info["pingwtime"] == null)): ?><li>   
                    <p class="wmc_tb wmc_bj"></p>
                    <div class="wmc_list">
                    <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>/tx.jpg"></p>
                    <p class="wmc_wz"><?php echo ($info["username"]); ?><br>联系电话：<?php echo ($info["iphone"]); ?><br>联系地址：<?php echo ($info["area"]); ?></p>
                    </div>
                      <p class="ypg_con borTop borBot">
                   <span>患者自述：</span><?php echo ((isset($info["casexl"]) && ($info["casexl"] !== ""))?($info["casexl"]):"脊柱康复（胸、腰）针对椎间盘突出、腰肌劳损、坐骨神经损伤等
  引起的腰背部腿部疼痛不适..."); ?>
                    </p>
                    <div class="jxz_con">
                  
                    <form action="/index.php/Mobile/Assess/submitReport" method="post">
  <textarea name="evaluate" placeholder="输入评估内容..."></textarea>
  <input type="hidden" name="odrid" value="<?php echo ($info["orderid"]); ?>">
  <span class="jxz_an"><a class="subAssess">提&nbsp;交</a></span>

                    </form>
                    </div>
                   </li><?php endif; endforeach; endif; ?>
                  <!-- <li>   
                  <p class="wmc_tb wmc_bj1"></p>
                  <div class="wmc_list">
                  <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>/tx.jpg"></p>
                  <p class="wmc_wz">孙女士<br>联系电话：13552899898<br>联系地址：北京市海淀区中关村</p>
                  </div>
                    <p class="ypg_con borTop borBot">
                                   <span>患者自述：</span>脊柱康复（胸、腰）针对椎间盘突出、腰肌劳损、坐骨神经损伤等
                  引起的腰背部腿部疼痛不适...
                  </p>
                  <div class="jxz_con">
                  <form action="" method="get">
                  <textarea name="username" placeholder="输入评估内容..."></textarea>
                  <span class="jxz_an"><a href="">提&nbsp;交</a></span>
                  </form>
                  </div>
                                   </li> -->
                  </ul>
                  </div>
                </div>
                <div class="orderlist"> 
                   <div class="wddd">
                  <ul class="wmc_con">
                  <?php if(is_array($orderList)): foreach($orderList as $key=>$info): if(!empty($info["pingwtime"])): ?><li>   
                    <p class="wmc_tb wmc_bj"></p>
                    <div class="wmc_list">
                    <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>/tx.jpg"></p>
                    <p class="wmc_wz"><?php echo ($info["username"]); ?><br>联系电话：<?php echo ($info["iphone"]); ?><br>联系地址：<?php echo ($info["area"]); ?></p>
                    </div>
                    <p class="ypg_con borTop">
                   <span>患者自述：</span><?php echo ((isset($info["casexl"]) && ($info["casexl"] !== ""))?($info["casexl"]):"脊柱康复（胸、腰）针对椎间盘突出、腰肌劳损、坐骨神经损伤等
  引起的腰背部腿部疼痛不适..."); ?>
                    </p>
                    <p class="ypg_con wmc_bj2"><span>评估结果：</span><?php echo ($info["evaluate"]); ?></p>
                   </li><?php endif; endforeach; endif; ?>
                  <!-- <li>   
                  <p class="wmc_tb wmc_bj1"></p>
                  <div class="wmc_list">
                  <p class="wmc_tp"><img src="<?php echo (MBIMG_URL); ?>/tx.jpg"></p>
                  <p class="wmc_wz">孙女士<br>联系电话：13552899898<br>联系地址：北京市海淀区中关村</p>
                  </div>
                   <p class="ypg_con borTop">
                                   <span>患者自述：</span>脊柱康复（胸、腰）针对椎间盘突出、腰肌劳损、坐骨神经损伤等
                  引起的腰背部腿部疼痛不适...
                  </p>
                  <p class="ypg_con wmc_bj2"><span>评估结果：</span>脊柱康复（胸、腰）针对椎间盘突出、腰肌劳损、坐骨
                  神经损伤等引起的腰背部腿部疼痛不适...</p>
                                   </li> -->
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
            $(".doAssess").click(function(){
                $.post("/index.php/Mobile/Assess/doAssess",{"step":"doAssess","orderid":$(this).siblings('.orderid').val()},function(data){
                      if(data.error == 1){
                      }else{
                          $(".orderNav li:nth-child(2)").addClass('cur').siblings().removeClass('cur');
                          $(".orderlist").eq(1).addClass("cur").siblings().removeClass('cur');
                          $(".orderlist").eq(1).html(data.content);
                      }
                },"json")
            })
            $(".subAssess").click(function(){
                //alert($(this).parent().parent().serialize());
                $.post("/index.php/Mobile/Assess/submitReport",$(this).parent().parent().serialize(),function(data){
                    if(data.error){
                    }else{
                        $(".orderNav li:nth-child(3)").addClass('cur').siblings().removeClass('cur');
                        $(".orderlist").eq(2).addClass("cur").siblings().removeClass('cur');
                        $(".orderlist").eq(2).html(data.content);
                        $(".orderlist").eq(1).html('');
                    }
                })
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