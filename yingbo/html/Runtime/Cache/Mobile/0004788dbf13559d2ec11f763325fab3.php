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
        <form action="/index.php/Mobile/Patient/xinxi" method="post">
            <ul class="userList zrXx">
                <li class="borBot">
                    <a href="#">
                        姓名  
                        <span><input style="text-align:right;color:#636363" type="text" name="username" value="<?php echo ($userInfo["username"]); ?>"></span>                      
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borBot">
                    <a href="#">
                        性别                        
                         <span style="color:#636363"><input type="radio" style="background:#d1d1d1;" name="sex" value="0" <?php echo ($userInfo['sex']?"":"checked"); ?>>女<input type="radio"style="background:#d1d1d1;" name="sex" value="1" <?php echo ($userInfo['sex']?"checked":""); ?>>男</span>
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borBot">
                    <a href="#">
                        年龄   
                        <span><input style="text-align:right;color:#636363" type="text" name="age" value="<?php echo ($userInfo["age"]); ?>"></span>                        
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borBot">
                    <a href="#">
                       <span style="float: left;"> 城市</span>   
                        <span style="float: left; width:77%;"><input style="text-align:right;color:#636363; width:100%;" " type="text" id="cityChoice" name="city" value="<?php echo ($userInfo["city"]); ?>" readonly></span>                        
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borBot">
                    <a href="#">
                        居住地址   
                        <span><input style="text-align:right;color:#636363" type="text" name="area" value="<?php echo ($userInfo["area"]); ?>"></span>                        
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borBot">
                    <a href="#">
                        联系电话   
                        <span><input style="text-align:right;color:#636363" type="text" name="iphone" value="<?php echo ($userInfo["iphone"]); ?>"></span>                        
                        <i class="moreUser"></i>
                    </a>
                </li>
                <li class="borBot">
                    <a href="#">
                        与患者关系   
                        <span><input style="text-align:right;color:#636363" type="text" name="relationship" value="<?php echo ($userInfo["relationship"]); ?>"></span>                        
                        <i class="moreUser"></i>
                    </a>
                </li>
            </ul>
            <div class="updateBox">
                <?php if(is_array($userInfo)): foreach($userInfo as $k=>$v): ?><input type="hidden" name="old<?php echo ($k); ?>" value="<?php echo ($v); ?>"><?php endforeach; endif; ?>
                <input type="hidden" name="itemNum" value="<?php echo ($itemNum); ?>">
                <button class="submit updateBtn">保 存</button>
            </div>
            <script>
                var cityPicker = new HzwCityPicker({
                    data: data,
                    target: 'cityChoice',
                    valType: 'k-v',
                    hideCityInput: {
                        name: 'city',
                        id: 'city'
                    },
                    hideProvinceInput: {
                        name: 'province',
                        id: 'province'
                    },
                    callback: function(){
                        
                    }
                });

                cityPicker.init();
            </script>
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