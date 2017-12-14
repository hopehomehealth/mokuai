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
            <form action="/index.php/Mobile/Nurse/cash" id="form-cash" method="post" class="cash_z">
                    <div class="form1 cash">
                        <div class="borBot" id="pos-error-msg" style="position:relative;">
                                <span>可提现金额：</span>
                                <p><?php echo ($money); ?>元</p>
                                <span style="position:absolute;right:2rem;top:0.875rem"><a style="color:green;font-size:0.875rem" href="/index.php/Mobile/Nurse/records">历史提现记录</a></span>
                        </div>
                        <div class="borBot">
                            <span>金额(元)：</span>
                            <input name="balance" type="text" placeholder="请输入提现金额">
                        </div>
                        <div class="borBot">
                            <span>账户：</span>
                            <select class="shenfen" name="count_id" style='font-size:0.875rem;margin-left:0.5rem' id="countType">
                                <option value='0'>请选择提现账户</option>
                                <?php if(is_array($accountList)): foreach($accountList as $key=>$info): ?><option value='<?php echo ($info["count_id"]); ?>'><?php if(empty($info["bankname"])): echo ($info["count_no"]); endif; if(empty($info["count_no"])): echo ($info["bankname"]); endif; ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                        <div class="borBot">
                            <span></span>
                            <a style="margin-left:0.5rem;color:green" href="/index.php/Mobile/Nurse/addCount">添加提现账户</a>
                        </div>
                        <div class="cashBtnbox">
                            <button class="submit cashBtn" id="sub-cash" type="submit">确定提交</button>
                        </div>
                    </div>
               </form>
        </div>   
    </div>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(function(){

            $("#form-cash").submit(function(){
                return false;
            })
            $("#sub-cash").click(function(){
                $.post("/index.php/Mobile/Nurse/cash",$("#form-cash").serialize(),function(data){
                    if(data.error == 1){
                        $("#pos-error-msg").append("<span id='error-msg' style='position:absolute;right:10rem;top:0.875rem;color:red;font-size:0.875rem'>"+data.content+"</span>");
                    }else{
                        $("#pos-error-msg").append("<span id='error-msg' style='position:absolute;right:10rem;top:0.875rem;color:green;font-size:0.875rem'>"+data.content+"</span>");
                        $("#pos-error-msg").children("p").text(data.money+"元");
                    }
                },'json');
                setTimeout(function(){$("#error-msg").remove()},1000);
                /*if($("#countType").val()==0){
                    $(this).append("<div style='position:absolute;width:60%;height:30%;margin:auto;z-index:9999'>请选择账户类型</div>");
                    return false;
                }*/
            })
        })
    </script>
    <script type="text/javascript" src="<?php echo (MBJS_URL); ?>/base.js"></script>



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