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
        <form action="/index.php/Mobile/User/perfectData" method="post">
            <ul class="userList zrXx">
                <li class="borBot">
                    <a href="#">
                        姓名  
                        <span><input style="text-align:right" type="text" name="user" value=""></span>                      
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borBot">
                    <a href="#">
                        联系电话   
                        <span><input style="text-align:right" type="text" name="iphone" value=""></span>                        
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borBot">
                    <a href="#">
                        身份 
                        <span><select class="shenfen" name="shenfen">
                        <option value="">请选择</option>
                        <option value="1">普通用户</option>
                        <option value="2">评估师</option>
                        <option value="3">护士</option>
                    </select></span>                        
                        <i class="moreUser"></i>
                    </a>
                </li>
            </ul>
            <div class="updateBox">
                <?php if(is_array($userInfo)): foreach($userInfo as $k=>$v): ?><input type="hidden" name="old<?php echo ($k); ?>" value="<?php echo ($v); ?>"><?php endforeach; endif; ?>
                <input type="hidden" name="itemNum" value="<?php echo ($itemNum); ?>">
                <button class="submit updateBtn">保 存 资 料</button>
            </div>
        </form>
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