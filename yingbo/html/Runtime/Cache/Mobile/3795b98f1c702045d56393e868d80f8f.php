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
            <div class="zxsj">
            <p><?php echo ($datestr); ?></p>
            <ul class="zxsj_tit">
            <li>周一</li>
            <li>周二</li>
            <li>周三</li>
            <li>周四</li>
            <li>周五</li>
            <li>周六</li>
            <li>周日</li>
            </ul>
            <?php echo ($dateList); ?>
            <?php echo ($nextDateList); ?>
            </div>
            <div class="updateBox">
                <button class="submit updateBtn" id="selectdate">保 存</button>
            </div>
            <div style="padding-left:1.583rem !important;padding-top:1.583rem !important;padding-right:1.583rem !important;"><p style="color:red;line-height:1.1rem">(说明：1 蓝色标记表示当天可预约。 2 白色未标记表示当天休息。 3 点击白色数字标记为可预约。 4 点击蓝色数字取消标记。)</p></div>
        </div>   
    </div>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>/base.js"></script>
    <script type="text/javascript">
        $(function(){
            var date = new Date();
            var text;
            var month = $('.zxsj button').eq(0).text();
            var thismonth = date.getMonth()+1;
            var day;
            var year = date.getFullYear();
            var thisyear = date.getFullYear();
            var flag;
            var count= new Array();
            var datapacket = new Array();
            
            $(".zxsj button").click(function(){
                $(this).attr("disabled",true).siblings().attr("disabled",false);
                month = $(this).text();
                if(thismonth > month){
                    year = year + 1;
                }
                $(this).addClass('selectmonth').siblings().removeClass('selectmonth');
                $(".zxsj_list").eq($(this).index()).css("display","block").siblings('.zxsj_list').css('display',"none");

            })
            $(".selectdate").toggle(
                    function(){
                        //alert($(this).children(".zxsj_ls").length() > 0);
                        if($(this).children(".zxsj_ls").length > 0){
                            //count++;
                            text = $(this).children(".zxsj_ls").eq(0).text();
                            day = text;
                            flag = false;//false代表删除标记
                            $(this).empty();
                            $(this).text(text);
                            var key = month+day;
                            if(count[key] == "" || typeof(count[key]) == "undefined"){
                                count[key] = 1;
                            }else{
                                count[key]++;
                            }
                            datapacket[key] = {"year":year,"month":month,"day":day,"flag":flag,"count":count[key]};
                                                
                        }else{
                            //count++;
                            flag = true;
                            text = $(this).text();
                            day = text;
                            $(this).text('');
                            $(this).append("<span class='zxsj_ls'>"+text+"</span>");
                            var key = month+day;
                            if(count[key] == "" || typeof(count[key]) == "undefined"){
                                count[key] = 1;
                            }else{
                                count[key]++;
                            }
                            datapacket[key] = {"year":year,"month":month,"day":day,"flag":flag,"count":count[key]};
                        }
                    },
                    function(){

                        if($(this).children(".zxsj_ls").length > 0){
                            //count++;
                            text = $(this).children(".zxsj_ls").eq(0).text();
                            day = text;
                            flag = false;//false代表删除标记
                            $(this).empty();
                            $(this).text(text);
                            var key = month+day;
                            if(count[key] == "" || typeof(count[key]) == "undefined"){
                                count[key] = 1;
                            }else{
                                count[key]++;
                            }
                            datapacket[key] = {"year":year,"month":month,"day":day,"flag":flag,"count":count[key]};
                                                
                        }else{
                            //count++;
                            flag = true;
                            text = $(this).text();
                            day = text;
                            $(this).text('');
                            $(this).append("<span class='zxsj_ls'>"+text+"</span>");
                            var key = month+day;
                            if(count[key] == "" || typeof(count[key]) == "undefined"){
                                count[key] = 1;
                            }else{
                                count[key]++;
                            }
                            datapacket[key] = {"year":year,"month":month,"day":day,"flag":flag,"count":count[key]};
                        }
                    }
                )
            $("#selectdate").click(function(){
                //清楚自动生成的空值
                for(var i=0;i<datapacket.length;i++){ 
                     if(datapacket[i] == "" || typeof(datapacket[i]) == "undefined"){
                      datapacket.splice(i,1);
                      i= i-1;
                }
                } 
                $.post("/index.php/Mobile/Schedule/mark",{"datapacket":datapacket},function(data){
                    if(data.error == 1){

                    }else{
                        $("#selectdate").attr('disabled',true);
                        $("#selectdate").css('background',"#ccc");
                        setTimeout(function(){history.go(-1)},1000);
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