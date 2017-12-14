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


        



<div class="banner" id="banner" >
    <?php if(is_array($adinfoup)): foreach($adinfoup as $k=>$v): ?><a href="<?php echo ($v["url"]); ?>" ><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" class="d1" style="background: url(<?php echo (SITE_URL); echo ($v["pic"]); ?>) center no-repeat #fff;background-size:cover;"></a><?php endforeach; endif; ?>

    <div class="d2" id="banner_id">
        <ul>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>
<script type="text/javascript">banner()</script>
<div class="sideBar">
    <p class="xzfw">选择服务<br />
        <span>乐护服务平台，服务项目</span></p>
    <div class="xzfw_con fl">
        <ul class="xzfw_list fl">

                <?php if(is_array($info1)): foreach($info1 as $k=>$v): ?><li><a href="javascript:;" class="modmore"><img src="<?php echo (SITE_URL); echo (substr($v["pic"],2)); ?>" alt="">
                        <p class="ser">
                            <p class="ser_zwz"><span class="ser_yw"><?php echo ($v["english"]); ?></span><br />乐护&nbsp;&nbsp;<?php echo ($v["china"]); ?>  </p>
                        </p>

                        <p class="ser_erm">
                            <?php echo (mb_substr(str_replace(array(" ","　","t","n","r"),array("","","","",""),strip_tags($v["introduce"])),0,66,'utf-8')); ?>
                            <span class="er"><img src='<?php echo (HIMG_URL); ?>erm.jpg'  width='120' height='120'></span>
                        </p>
                    </a></li><?php endforeach; endif; ?>
        </ul>
        <ul class="xzfw_list1 fl">
            <?php if(is_array($info2)): foreach($info2 as $k=>$v): ?><li><a href="javascript:;" class="modmore"><img src="<?php echo (SITE_URL); echo (substr($v["pic"],2)); ?>" alt="">
                    <p class="ser">
                    <p class="ser_zwz"><span class="ser_yw"><?php echo ($v["english"]); ?></span><br />乐护&nbsp;&nbsp;<?php echo ($v["china"]); ?>  </p>
                    </p>

                    <p class="ser_erm">
                        <?php echo (mb_substr(str_replace(array(" ","　","t","n","r"),array("","","","",""),strip_tags($v["introduce"])),0,66,'utf-8')); ?>
                        <span class="er"><img src='<?php echo (HIMG_URL); ?>erm.jpg' id='' width='120' height='120'></span>
                    </p>
                </a></li><?php endforeach; endif; ?>

        </ul>
        <p class="showMore"><span class="showMore_t fl"></span> </p>
    </div>
</div>
<div class="fwlc_con">
    <div class="sideBar">
        <p class="xzfw">服务流程<br />
            <span>乐护服务平台，基本工作服务流程</span></p>

        <ul class="lc_con fl">
            <li class="lc1"><a>客户<br />提出需求</a>
                <div class="second lc_bd">专业评估<br /><span class="yellow fl">Professional Assessment</span><br /><span class="nr_wz fl">乐护的评估专员会亲临患者及家属的居住地，现场对患者状况、居住环境进行评估，同时针对延续护理服务答疑</span></div>
            </li>
            <li class="lc2"><a style="padding-top:58px;" >初始评估</a>
                <div class="second lc_bd">专业评估<br /><span class="yellow fl">Professional Assessment</span><br /><span class="nr_wz fl">乐护的评估专员会亲临患者及家属的居住地，现场对患者状况、居住环境进行评估，同时针对延续护理服务答疑</span></div>
            </li>
            <li class="lc3"><a style="padding-top:58px;" >专业评估</a>
                <div class="third lc_bd1">专业评估<br /><span class="yellow fl">Professional Assessment</span><br /><span class="nr_wz fl">乐护的评估专员会亲临患者及家属的居住地，现场对患者状况、居住环境进行评估，同时针对延续护理服务答疑</span></div>
            </li>
            <li class="lc4"><a >选派专业<br />护理人员</a>
                <div class="third lc_bd1">专业评估<br /><span class="yellow fl">Professional Assessment</span><br /><span class="nr_wz fl">乐护的评估专员会亲临患者及家属的居住地，现场对患者状况、居住环境进行评估，同时针对延续护理服务答疑</span></div>
            </li>
            <li class="lc5"><a >专业延续<br />护理服务</a>
                <div class="third lc_bd1">专业评估<br /><span class="yellow fl">Professional Assessment</span><br /><span class="nr_wz fl">乐护的评估专员会亲临患者及家属的居住地，现场对患者状况、居住环境进行评估，同时针对延续护理服务答疑</span></div>
            </li>
            <li class="lc7" style="float:right;"><a >专业延续<br />护理服务</a>
                <div class="fourth lc_bd2">专业评估<br /><span class="yellow fl">Professional Assessment</span><br /><span class="nr_wz fl">乐护的评估专员会亲临患者及家属的居住地，现场对患者状况、居住环境进行评估，同时针对延续护理服务答疑</span></div>
            </li>

        </ul>

    </div>
</div>
<div class="sideBar">
    <p class="xzfw" style="padding-top:0px;">服务案例<br />
        <span>乐护服务平台，服务案例展示</span></p>
</div>
<div class="DB_tab25">
    <ul class="DB_imgSet">
        <?php if(is_array($adinfodown)): foreach($adinfodown as $k=>$v): ?><li onclick="javascript:window.location.href='';">
            <a href='<?php echo ($v["url"]); ?>' ><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" />  </a>
        </li><?php endforeach; endif; ?>
    </ul>
    <div class="DB_menuWrap">

        <div class="DB_next">
            <img src="<?php echo (HIMG_URL); ?>nextArrow.png" alt="NEXT" />
        </div>
        <div class="DB_prev">
            <img src="<?php echo (HIMG_URL); ?>prevArrow.png" alt="PREV" />
        </div>
    </div>
</div>




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