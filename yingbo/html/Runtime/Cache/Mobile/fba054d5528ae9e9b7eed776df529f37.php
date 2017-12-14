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
                       城市  
                        <span>
                            <select name="province_id" class="province selectarea">
                                <option value="0"><?php if($userInfo["city"] == ''): ?>省<?php else: echo ($userInfo["city"]); endif; ?></option>
                                <?php if(is_array($provincelist)): foreach($provincelist as $key=>$provinceinfo): ?><option value="<?php echo ($provinceinfo["id"]); ?>"><?php echo ($provinceinfo["name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                            <select name="city_id" class="city selectarea selectareahd">
                            </select>
                            <select name="country_id" class="country selectarea selectareahd">
                            </select>
                        </span>      
                        <input type="hidden" name="city" value="<?php echo ($userInfo["city"]); ?>">                  
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
                <button class="submit updateBtn">保 存</button>
            </div>
            <script type="text/javascript">
                $(function(){
                    var provinceid,cityid,countryid; 
                    var provincename,cityname,countryname;
                    var areaname;
                    $(".province").change(function(){
                        var index = $(this).get(0).selectedIndex;
                        if(index == 0){
                            return;
                        }else{
                            $(".city").removeClass("selectareahd").siblings('.selectarea').addClass('selectareahd');
                            provinceid = $(this).val();
                            provincename = $(".province option:selected").text();
                            //alert(provincename);
                            $.post("/index.php/Mobile/Patient/getcity",{'upid':provinceid},function(data){
                                if(data.error ==  1){

                                }else{
                                    var cityhtml = "<option value='0'>市</option>";
                                    var datalist = data.content;
                                    for(var i in datalist){
                                        cityhtml+="<option value='"+datalist[i].id+"'>"+datalist[i].name+"</option>";
                                    }
                                    $(".city").eq(0).html(cityhtml);
                                }
                            })
                        }
                        //计算出选择省在数组中的下标
                    })
                    $(".city").change(function(){
                        var index = $(this).get(0).selectedIndex;
                        if(index == 0){
                            return;
                        }else{
                            $(".country").removeClass("selectareahd").siblings('.selectarea').addClass('selectareahd');
                            cityid = $(this).val();
                            cityname = $(".city option:selected").text();
                            //alert(cityid);
                            $.post("/index.php/Mobile/Patient/getcity",{'upid':cityid},function(data){
                                if(data.error ==  1){

                                }else{
                                    var countryhtml = "<option value='0'>县/区</option>";
                                    var datalist = data.content;
                                    for(var i in datalist){
                                        countryhtml+="<option value='"+datalist[i].id+"'>"+datalist[i].name+"</option>";
                                    }
                                    $(".country").eq(0).html(countryhtml);
                                }
                            })
                        }
                        //计算出选择省在数组中的下标
                    })
                    $(".country").change(function(){
                        var index = $(this).get(0).selectedIndex;
                        if(index == 0){
                            return;
                        }else{
                            countryid = $(this).val();
                            countryname = $(".country option:selected").text();
                            areaname = provincename+cityname+'市'+countryname;
                            $(".country option:selected").text(areaname);
                            $("input[name='city']").val(areaname);
                        }
                    })
                })
                /*var cityPicker = new HzwCityPicker({
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

                cityPicker.init();*/
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