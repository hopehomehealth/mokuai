<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta content="北京蓝海长青规划设计研究有限公司,蓝海资讯,蓝海头条,军民融合,长青论坛" name="keywords"/>
    <meta content="北京蓝海长青规划设计研究有限公司，是一家以军事和安全为主，涉及经济、科技、国际战略、管理科学、社会发展、政策研究等领域的商业化新型高端智库，也是一家军民融合产业发展规划设计、建设运营、战略投资、顾问管理公司。" name="description"/>
    <title>蓝海长青</title>
    <script type="text/javascript" src="<?php echo (MJS_URL); ?>jquery-2.1.1.min.js"></script>
    <script src="<?php echo (MJS_URL); ?>js.js"></script>
    <link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<!--*****header*****-->
<header> <a class="headBack" href="<?php echo U('Index/index');?>">&nbsp;</a>
    <div class="headTit">
        <form action="/index.php/Mobile/News/searchlist" method="post">
            <input class="headTit-k" name="search" id="search" type="text" placeholder="请输入您要搜索的内容">
            <button class="search-an" id="shou" type="submit"></button>
        </form>
    </div>
	<script type="text/javascript">

$(function(){
    $('#shou').click(function(){
    var name = $('#search').val();
    if(name == ''){
        alert('搜索内容不能为空');
        return false;
    }
    });

});
</script>
    <span class="nav fr"></span>
    <ul class="menu">
        <li><a href="<?php echo U('Index/index');?>"><?php echo ($shouye[0]['lan_title']); ?></a></li>
        <li class="menu_1"><?php echo ($guanyu1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
<?php if(is_array($guanyu2)): foreach($guanyu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 11)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 12)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 13)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 14)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 15)): ?>
<li><a href="<?php echo U('News/guanyuwomen',array('zilanid'=>10,'lan_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>




        </ul>
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>3));?>"><?php echo ($toutiao1[0]['lan_title']); ?></a></li>
        <li class="menu_1"><?php echo ($lanhaizixun1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
 <?php if(is_array($lanhaizixun2)): foreach($lanhaizixun2 as $key=>$v): if($v["url"] == ''): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

        </ul>
        <li class="menu_1"><?php echo ($junminronghe1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
		    <?php if(is_array($junminronghe2)): foreach($junminronghe2 as $key=>$v): if($v["url"] == ''): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

        </ul>
        <li class="menu_1"><?php echo ($zixunfuwu1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
  <?php if(is_array($zixunfuwu2)): foreach($zixunfuwu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 29)): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 30)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 31)): ?>
<li><a href="<?php echo U('News/falvfagui',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 32)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 38)): ?>
<li><a href="<?php echo U('Tushu/tushulist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 33)): ?>
<li><a href="<?php echo U('Advice/showlist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>


        </ul>

        <li class="menu_1"><?php echo ($changqingluntan1[0]['lan_title']); ?><span class="xia"></span></li>
        <ul class="menu_2">
  <?php if(is_array($changqingluntan2)): foreach($changqingluntan2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 34)): ?><li><a href="<?php echo U('Bbs/blog',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 35)): ?>
<li><a href="<?php echo U('Bbs/bbs',array('board_id'=>2));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 36)): ?>
<li><a href="<?php echo U('Bbs/mingjia',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 37)): ?>
<li><a href="<?php echo U('Bbs/renwu',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>


        </ul>
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>8));?>"><?php echo ($gongyi[0]['lan_title']); ?></a></li>
        <li><a href="<?php echo U('News/newslist',array('lan_id'=>9));?>"><?php echo ($lanhaifabu[0]['lan_title']); ?></a></li>
    </ul>
</header>

<!--*****header*****-->


<div class="main">
    <section>
        <div class="nht-xl fl">
            <p class="lin-tt"><?php echo (mb_substr($pidname,0,2,'utf-8')); ?><span class="d-red"><?php echo (mb_substr($pidname,2,2,'utf-8')); ?></span> <?php if($pid != 0): ?><span class="nht-tt fr">&nbsp;</span><?php endif; ?></p>
            <ul class="nht-sumenu fr">
                <?php if($pid == 4): ?><li> <a href="<?php echo U('News/newslist',array('lan_id'=>18));?>">蓝海视点</a> </li>
                    <li><a href="<?php echo U('News/newslist',array('lan_id'=>19));?>">军事动态</a> </li>
                    <li><a href="<?php echo U('News/newslist',array('lan_id'=>20));?>">安全纵横</a> </li>
                    <li> <a href="<?php echo U('News/newslist',array('lan_id'=>21));?>">尖端科技</a> </li>
                    <li> <a href="<?php echo U('News/newslist',array('lan_id'=>22));?>">思海揽胜</a> </li>
                    <li> <a href="<?php echo U('News/newslist',array('lan_id'=>23));?>">开心乐园</a> </li>
                      <?php if(is_array($lanhaizixun)): foreach($lanhaizixun as $key=>$v): if(($v["url"] == '') AND ($v["content1"] != '')): ?><li>
<a href="<?php echo U('News/landetail',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] != '') AND ($v['content1'] == '')): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>
                    <?php elseif($pid == 5): ?>
                       <!-- <li> <a href="<?php echo U('News/newslist',array('lan_id'=>24));?>">蓝海发布</a> </li>-->
                        <li> <a href="<?php echo U('News/newslist',array('lan_id'=>25));?>">产业发展</a> </li>
                        <li> <a href="<?php echo U('News/newslist',array('lan_id'=>26));?>">教育培训</a> </li>
                        <li><a href="<?php echo U('News/newslist',array('lan_id'=>27));?>">文化传媒</a> </li>
                        <li><a href="<?php echo U('News/newslist',array('lan_id'=>28));?>">安全与发展论坛</a></li>
                         <?php if(is_array($junminronghe)): foreach($junminronghe as $key=>$v): if(($v["url"] == '') AND ($v["content1"] != '')): ?><li>
<a href="<?php echo U('News/landetail',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] != '') AND ($v['content1'] == '')): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>
                        <?php elseif($pid == 6): ?>
                            <li> <a href="<?php echo U('News/newslist',array('lan_id'=>29));?>">园区建设</a> </li>
                            <li><a href="<?php echo U('News/newslist',array('lan_id'=>30));?>">科技服务</a> </li>
                            <li> <a href="<?php echo U('News/falvfagui');?>">法规政策</a> </li>
                            <li><a href="<?php echo U('Tushu/tushulist');?>">新书推荐</a> </li>
                            <li><a href="<?php echo U('News/newslist',array('lan_id'=>32));?>">人才交流</a> </li>
                            <li><a href="<?php echo U('Advice/showlist');?>">在线咨询</a></li>
                              <?php if(is_array($zixunfuwu)): foreach($zixunfuwu as $key=>$v): if(($v["url"] == '') AND ($v["content1"] != '')): ?><li>
<a href="<?php echo U('News/landetail',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] != '') AND ($v['content1'] == '')): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; endif; ?>
            </ul>
        </div>
    </section>

    <script type="text/javascript">
        $(".nht-tt").click(function(){
            $(".nht-sumenu").slideToggle("1000");
        });
    </script>
    <!--*****banner*****-->
    <section>
        <div class="lin-ad mb0">
            <ul class="hiSlider hiSlider3">
                <?php if(is_array($info1)): foreach($info1 as $key=>$v): ?><li class="hiSlider-item"><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picmobile"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?> alt="<?php echo ($v["news_title"]); ?>"></a> </li><?php endforeach; endif; ?>

            </ul>
        </div>
    </section>
    <!--*****banner*****-->
    <!--*****news*****-->
    <section>
        <div class="h-l pb1 fl">
            <?php if(($pid == 8) OR ($pid == 3) OR ($pid == 0) OR ($pid == 9)): ?><p></p>
                <?php else: ?>
                   <p class="h-l-tt"><?php echo (mb_substr($pidname1,0,2,'utf-8')); ?><span class="d-red"><?php echo (mb_substr($pidname1,2,6,'utf-8')); ?></span></p><?php endif; ?>

            <div class="news-list fl" id="recordslist" totalPages="<?php echo ($totalPages); ?>">
                <?php if(is_array($info2)): foreach($info2 as $key=>$v): ?><input type='hidden' id='lan_id' value='<?php echo ($v["lan_id"]); ?>'>
                    <dl class="news-pic fl">
                        <dt><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><img <?php if(($v["pic"] != '') AND ($v["pic"] != './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["pic"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == '')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] == 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == '')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"
<?php elseif(($v["match"] != 'http') AND ($v["pic"] == './Public/Upl/news/')): ?>src="<?php echo (SITE_URL); echo ($v["picfirst"]); ?>"<?php endif; ?>></a></dt>
                        <dd><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id']));?>"><?php echo (mb_substr(str_replace(array(" ","　","t","n","r","&bsp;"),array("","","","","",""),strip_tags($v["news_title"])),0,200,'utf-8')); ?></a>
                            <p class="fl fs1 l-gray rqi"><?php echo ($v["add_time"]); ?></p>
                        </dd>
                    </dl><?php endforeach; endif; ?>
            </div>
            <div style="text-align:center;display:none;" id="loading"><img src="<?php echo (MIMG_URL); ?>loader.gif" width="" height="" border="0" alt="" /></div>
        </div>
    </section>
    <!--*****news*****-->

    <!-- 滚动加载 -->
    <script type="text/javascript">

        $(function(){
            var lan_id = $('#lan_id').val();
            var scrollstatus = false;
            var totalPages = $("#recordslist").attr('totalPages');
            var nowpage = 1;
            function ajax_request(nowpage){
                var html = '';
                var recordslist = $("#recordslist");//放数据的容器
                $.post("/index.php/Mobile/News/newslist/p/"+nowpage,{lan_id:lan_id},function(data){
                    if(data.error == 0){
					var imgsrc='';
					var url = window.location.host;
					var yuming = 'http://'+url;
					var title='';

					var news_title='';
                        for(var i in data.content){
						title= data.content[i].news_title;

						news_title = title.slice(0,200);
					var exp = data.content[i].pic;
						if((exp !== null) && (data.content[i].pic !== '') && (data.content[i].pic !== './Public/Upl/news/')){
							 imgsrc = yuming+data.content[i].pic;

						}else if(data.content[i].match == 'http' && (!exp && typeof exp != "undefined" && exp != 0)){
						 imgsrc = data.content[i].picfirst;
						 }else if(data.content[i].match == 'http' && data.content[i].pic == ''){
						 imgsrc = data.content[i].picfirst;
						}else if(data.content[i].match == 'http' && data.content[i].pic == './Public/Upl/news/'){
						imgsrc = data.content[i].picfirst;
						}else if(data.content[i].match !== 'http' && (!exp && typeof exp != "undefined" && exp != 0)){
						 imgsrc = yuming+data.content[i].picfirst;
						 	}else if(data.content[i].match !== 'http' && data.content[i].pic == ''){
						 imgsrc = yuming+data.content[i].picfirst;
						}else if(data.content[i].match !== 'http' &&  data.content[i].pic == './Public/Upl/news/'){
						imgsrc = yuming+data.content[i].picfirst;
						}
                            html += "<dl class='news-pic fl'><dt><a href='/index.php/Mobile/News/detail/news_id/"+data.content[i].news_id+"'><img src='"+imgsrc+"' alt=''/></a></dt><dd><a href='/index.php/Mobile/News/detail/news_id/"+data.content[i].news_id+"'>"+news_title+"</a><p class='fl fs1 l-gray rqi'>"+data.content[i].add_time+"</p></dd></dl>";
                        }
                    }
                    recordslist.append(html);
                    $("#loading").css("display",'none');
                    scrollstatus = false;
                });
            }
            $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();
                var scrollHeight = $(document).height();
                var windowHeight = $(this).height();
                if (scrollTop + windowHeight == scrollHeight && scrollstatus == false) {
                    scrollstatus = true;
                    nowpage++;
                    if(nowpage <= totalPages){
                        $("#loading").css("display",'block');
                        setTimeout(function(){ajax_request(nowpage)},2000);
                    }
                }
            });
        });
    </script>
</div>
<!--*****footer*****-->
<footer>
    <p class="copyright" <?php if((CONTROLLER_NAME == 'Famous') AND (ACTION_NAME == 'detail')): ?>style="margin-bottom:5rem"<?php endif; ?>>Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved.<br>
        蓝海长青 版权所有</p>
</footer>
<!--*****footer*****-->

<div class="aside_1">
    <p class="ftop"><img src="<?php echo (MIMG_URL); ?>images_11.png" alt=""/></p> </div>
<script src="<?php echo (MJS_URL); ?>jquery.hiSlider.min.js"></script>
<script>
    $('.hiSlider3').hiSlider({
        isFlexible: true,
        isSupportTouch: true,
        titleAttr: function(curIdx){
            return $('img', this).attr('alt');
        }
    });
</script>
</body>
</html>