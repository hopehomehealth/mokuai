<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equivmetahttp-equiv="x-ua-compatible"content="IE=7"/>
    <title><?php echo ($basicinfo[0]['name']); ?></title>
    <meta content="<?php echo ($basicinfo[0]['keyword']); ?>" name="keyword">
    <meta content="<?php echo ($basicinfo[0]['description']); ?>" name="description">
    <link href="<?php echo (HCSS_URL); ?>style.css" rel="stylesheet" type="text/css" />
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>jquery-1.12.3.min.js"></script>
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>banner.js"></script>
    <script type="text/javascript">
        (function(a,b){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))window.location=b})(navigator.userAgent||navigator.vendor||window.opera,'http://lehu.ew9t.cn/index.php/Mobile/Index/index.html');
    </script>
</head>

<body>
<div class="head">
    <div class="head_nr">
        <p>乐护服务平台官方网站欢迎您！</p>
        <li><a href="#"></a>热线电话：010-65811808/806</li></div>
</div>
<div class="sideBar">
    <p class="logo fl"><a href="<?php echo U('Index/index');?>"><img src="<?php echo (HIMG_URL); ?>logo.jpg" /></a></p>
    <form class="form-horizontal" action="<?php echo U('News/news');?>" method="post">
        <div class="search fl">

            <input name="username" id="username" type="text" class="search_txt fl" value="" placeholder="请输入您要搜索的关键字">

            <button type="submit" class="search_an fl">搜&nbsp;索</button>

        </div>
    </form>
    <p class="mfdh fr"><img src="<?php echo (HIMG_URL); ?>dh.jpg" /></p>
</div>
<div class="menu">
    <ul id="menu_nr" class="menu_nr">
        <li <?php if(CONTROLLER_NAME == Index): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Index/index');?>">首页</a></li>
        <li <?php if((CONTROLLER_NAME == About) OR (CONTROLLER_NAME == News) OR (CONTROLLER_NAME == Trailer)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('About/about');?>">关于乐护</a>
            <div class="childnavin"><a href="<?php echo U('News/news');?>">新闻中心</a><a href="<?php echo U('About/about');?>">公司简介</a><a href="<?php echo U('About/qywh');?>">企业文化</a><a href="<?php echo U('Trailer/showlist');?>">宣传片</a></div>
        </li>
        <li <?php if(CONTROLLER_NAME == Service): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Product/showlist');?>">乐护服务</a></li>
        <li <?php if(CONTROLLER_NAME == Train): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Train/showlist');?>">乐护培训</a></li>
        <li <?php if(CONTROLLER_NAME == Medical): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Medical/showlist');?>">医学知识</a></li>
        <li <?php if(CONTROLLER_NAME == Example): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Example/showlist');?>">服务案例</a></li>
        <li <?php if((CONTROLLER_NAME == TeamAssess) OR (CONTROLLER_NAME == TeamExpert) OR (CONTROLLER_NAME == TeamManage) OR (CONTROLLER_NAME == Contact)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('TeamAssess/showlist');?>">加入乐护</a>
            <div class="childnavin"><a href="<?php echo U('TeamAssess/showlist');?>">服务团队</a><a href="<?php echo U('TeamExpert/showlist');?>">专家顾问团队</a><a href="<?php echo U('TeamManage/showlist');?>">管理团队</a><a href="<?php echo U('Contact/showlist');?>">联系我们</a></div>
        </li>
        <li id="link_tab" <?php if(CONTROLLER_NAME == Link): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Link/showlist');?>">合作单位</a></li>
    </ul>
</div>
<script type="text/javascript">
    $(function(){
        $('#menu_nr li').click(function(){
            $('#menu_nr li').attr('class','tab-back')
            $(this).attr('class','cur');
        });
    });
</script>


        <style type="text/css">
    body, html,#allmap {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";font-size:14px;}
    #l-map{height:500px;width:100%;}
    #r-result{width:100%;}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=frEjyig7HjiA4baxIrZNpxGGKPqaGWFl"></script>
<?php if(is_array($adinfofen)): foreach($adinfofen as $k=>$v): ?><div class="su_banner"><a href="<?php echo ($v["url"]); ?>"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /></a>  </div><?php endforeach; endif; ?>


<div class="sideBar">
    <div class="about fl">
        <p class="about_tit fl">加入乐护</p><p class="about_yw fl">Join&nbsp;Le&nbsp;Armor</p>
    </div>


    <div class="about_zc fl">
        <ul class="news_list_tit">
            <li><a href="<?php echo U('TeamAssess/showlist');?>">服务团队</a></li>
            <li><a href="<?php echo U('TeamExpert/showlist');?>">专家顾问团队</a></li>
            <li><a href="<?php echo U('TeamManage/showlist');?>">管理团队</a></li>
            <li class="current"><a href="<?php echo U('Contact/showlist');?>">联系我们</a></li>
        </ul>

        <div class="contact">
            <p><span class="blue">乐护服务平台</span><br />
                地址：北京市朝阳区光华路甲8号和乔大厦C座806<br />
                热线：010-65811808/806<br />
                电话：010-65811808/806<br />
                官网： http://www.LEHU.com</p>
            <p class="co_ditu fl">
            <div id="l-map"></div>
            <div id="r-result"></div>
            </p>
            <ul class="zxly fl">

                <script language="JavaScript" type="text/javascript" src="<?php echo (HJS_URL); ?>FormValid.js"></script>
                <script type="text/javascript">
                    function customFuntion(inp,frms) {

                        if (inp.value || frms['sj'].value) {
                            return true;
                        }
                        return false;
                    }
                </script>
                <form action="" method="post" enctype='multipart/form-data' onsubmit="return validator(this)">
                    <h1 class='blue'>在线留言 </h1>
                    <li><span class="fl fw">方便回访时间：</span>

                        <label>
                            <input type="radio" name="visit" value="0" checked="checked" />
                            随时</label>

                        <label>
                            <input type="radio" name="visit" value="1" />
                            上班时间</label>

                        <label>
                            <input type="radio" name="visit" value="2"  />
                            下班时间</label>

                        <label>
                            <input type="radio" name="visit" value="3"  />
                            周末</label>

                    </li>
                    <li><span class="fw">姓名：</span></li>
                    <li><input name="name" id="xingming" class="kuang w150" type="text" valid='required|isChinese' errmsg="姓名必填|姓名必须为中文"/><em>*</em><label>
                        <input type="radio" name="sex" value="0" checked="checked" />
                        先生</label>

                        <label>
                            <input type="radio" name="sex" value="1" />
                            女士</label>
                    </li>
                    <li><span class="fw">联系电话：</span></li>
                    <li>
                        <input name="iphone" id="iphone" class="kuang w204" valid='custom|isMobile' custom="customFuntion" errmsg="座机或手机必填一个|手机格式错误" type="text"/>
                        <em>*</em>
                    </li>
                    <li><span class="fw">你的地址：</span></li>
                    <li><input name="address" id="address" class="kuang w350" type="text" />
                    </li>
                    <li><span class="fw">留言咨询：</span></li>
                    <li>
                        <textarea name="content" id="content" class="kuang1 w350"></textarea>
                    </li>

                    <li ><span id="liuyan1" class="tj_an">
                         <input id="bsubmit" type="submit"  value="" onclick="liuyan()" style="width:72px;height:27px;background:url('<?php echo (HIMG_URL); ?>tj_an.jpg');color: #ffffff"; />
                        </span></li>
                </form>
            </ul>
            <script type="text/javascript">
                $('form').submit(function(){
                return false;
            });
                function liuyan(){
                    var visit = $('input[name=visit]:checked').val();
                    var xingming = $('#xingming').val();
                    var sex = $('input[name=sex]:checked').val();
                    var iphone = $('#iphone').val();
                    var address = $('#address').val();
                    var content = $('#content').val();

                    $.ajax({
                        url:"/index.php/Home/Contact/liuYan",
                        data:{'visit':visit,'xingming':xingming,'sex':sex,'iphone':iphone,'address':address,'content':content},
                        dataType:'json',
                        type:'post',
                        success:function(data){
                            //console.log(data);
                            if(data.name && data.iphone && data.address && data.content !== 'empty'){
                                var s = "<div id='bal_err_msg' style='position:relative;width:350px;height:20px;font-size:14px;color:#ff0000;z-index:999;left:50%;top:70%;margin-left:43px;margin-top:-17px'>感谢您的留言，客服会及时与您联系！</div>";
                                //追加s变量到页面上
                                $('#liuyan1').append(s);


                                $('input[name=visit]').val([0]);
                                $('input[name=sex]').val([0]);
                                $('#xingming').val('', false);
                                $('#iphone').val('', false);
                                $('#address').val('', false);
                                $('#content').val('', false);
                                setTimeout(function(){
                                    $('#bal_err_msg').remove();
                                }, 3000);
                            }

                        }

                    });

                }

            </script>
        </div>


    </div>
</div>


<script type="text/javascript">
    // 百度地图API功能
    var sContent ="<h4 class='blue' style='margin:0 0 5px 0;padding:0.2em 0'>和乔大厦C座806</h4>" +
    "<img style='float:right;margin:4px' id='imgDemo' src='http://lehu.ew9t.cn/Public/Home/images/ditu.png' width='139' height='104' title='和乔大厦C座806'/>" +
    "<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'>北京市朝阳区光华路甲8号和乔大厦C座806</p>" +
    "</div>";
    var map = new BMap.Map("l-map");
    var point = new BMap.Point(116.478037,39.919096);
    map.centerAndZoom(point, 15);
    var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象
    map.openInfoWindow(infoWindow,point); //开启信息窗口
//    document.getElementById("r-result").innerHTML = "信息窗口的内容是：<br />" + infoWindow.getContent();
</script>


<div class="foot_bj">
    <div class="foot">
        <div class="foot_con fl">
            <p class="foot_logo fl"><a href="<?php echo U('Index/index');?>"><img src="<?php echo (HIMG_URL); ?>db_logo.png" alt="" width="209" height="62" /></a></p>
            <p class="foot_sumenu fl"><a href="<?php echo U('Index/index');?>">首页</a><a href="<?php echo U('About/about');?>">关于乐护</a><a href="<?php echo U('Contact/showlist');?>">联系我们</a><a href="<?php echo U('Medical/showlist');?>">医学知识</a></p>
            <p class="foot_bq fl">乐护服务平台  地址：北京市朝阳区光华路甲8号和乔大厦C座806
                <br />
                Copyright @2015 www.ew9t.cn All Right Reserved. 乐护服务平台 版权所有 </p>
            <p class="foot_bq fl">京ICP备16032945号 </p>
        </div>
        <div class="foot_righr fl">
            <p class="foot_dh fl">010-65811808/806<br />
                <span>工作日 10:00-19:00</span></p>
            <p class="foot_kf fl">扫一扫 关注我们</p>
            <dl class="foot_erm fl">
                <dt><img src="<?php echo (HIMG_URL); ?>erm.jpg" alt="二维码图片" width="150" height="150" />
                    <!--<a href="<?php echo U('weibo.com');?>"><img src="<?php echo (HIMG_URL); ?>sina.png" width="66" height="66" /></a>-->
                </dt>
                <!--<dd>地址：朝阳区光华路甲8号和乔大厦C座806<br />-->
                    <!--热线电话：010-65811808/806 </dd>-->
            </dl>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo (HJS_URL); ?>jquery.DB_tabMotionBanner.min.js"></script>
<script type="text/jscript" src="<?php echo (HJS_URL); ?>index.js"></script>
<script type="text/javascript">
    $('.DB_tab25').DB_tabMotionBanner({
        key: 'b28551',
        autoRollingTime: 6000,
        bgSpeed: 500
    })
</script>



<div class="dock">
    <ul class="icons">
        <li class="up"><i></i></li>
        <li class="im"> <a href="<?php echo U('Contact/showlist');?>"><i></i></a>  </li>
        <li class="wechat"> <i></i>
            <p><img src="<?php echo (HIMG_URL); ?>erm.jpg" alt="扫描关注网站建设微信公众账号"></p>
        </li>
        <li class="tel"> <i></i>
            <p>咨询热线：<br />
                010-65811808/806<br />
                服务时间：<br />
                早10:00-晚19:00</p>
        </li>
        <li class="down"><i></i></li>
    </ul>
    <a class="switch"></a> </div>

<script type="text/javascript">var pageIndex=1;function getScrollTop(){var a=0;a=a!==0?a:(window.pageYOffset?window.pageYOffset:0);a=a!==0?a:(document.documentElement?document.documentElement.scrollTop:0);a=a!==0?a:(document.body?document.body.scrollTop:0);return a}
function getScrollBottom(){$("html, body").animate({scrollTop:$(document).height()-$(window).height()})}
function getScrollableElement(a){for(var b=0,c=arguments.length;b<c;b++){var d=arguments[b],e=$(d);if(e.scrollTop()>0)return d;else{e.scrollTop(1);var f=e.scrollTop()>0;e.scrollTop(0);if(f)return d}}
    return[]}
function dockEvent(){$(".dock").height($(".dock ul.icons li").length*50+$(".dock a.switch").height()+20).css("top",($(window).height()-$(".dock").height())/2+35);$(".dock ul.icons li i").bind("mouseover click touchstart",function(){$(".dock ul.icons li").removeClass("active");$(this).parent().addClass("active")});$(".dock ul.icons li").bind("mouseleave",function(){$(".dock ul.icons li").removeClass("active")});$(".dock ul.icons li.up i").bind("click touchstart",function(a){pageIndex--;a.preventDefault();var b=getScrollableElement('html','body');$(b).animate({scrollTop:0},400);pageSwitching()});$(".dock ul.icons li.down i").bind("click touchstart",function(a){pageIndex++;getScrollBottom();pageSwitching()});$(".dock a.switch").bind("click",function(){if($(this).hasClass("off")){$(".dock").removeClass("close");$(this).removeClass("off")}else{$(".dock ul.icons li").removeClass("active");$(".dock").addClass("close");$(this).addClass("off")}})}
$(window).bind("resize",function(e){$(".dock").css("top",($(window).height()-$(".dock").height())/2+35)});$(document).ready(function(){$(".dock").css("top",($(window).height()-$(".dock").height())/2+35);dockEvent()})</script>

</body>
</html>