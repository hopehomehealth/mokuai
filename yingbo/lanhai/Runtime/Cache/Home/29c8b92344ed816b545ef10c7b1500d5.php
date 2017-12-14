<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equivmetahttp-equiv="x-ua-compatible"content="IE=7"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta content="北京蓝海长青规划设计研究有限公司,蓝海资讯,蓝海头条,军民融合,长青论坛" name="keywords"/>
    <meta content="北京蓝海长青规划设计研究有限公司，是一家以军事和安全为主，涉及经济、科技、国际战略、管理科学、社会发展、政策研究等领域的商业化新型高端智库，也是一家军民融合产业发展规划设计、建设运营、战略投资、顾问管理公司。" name="description"/>
    <title><?php echo ($title); ?></title>
<!-- <base target="_blank"/> -->
    <link href="<?php echo (HCSS_URL); ?>basic.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo (HCSS_URL); ?>style.css" rel="stylesheet" type="text/css"/>
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>jquery-1.8.3.min.js"></script>
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>banner.js"></script>
   <script type="text/javascript">
try {
var urlhash = window.location.hash;
var url= "<?php echo U('Mobile/Index/index');?>";

if (!urlhash.match("fromapp"))
{
if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i)))
{

window.location=url;
}
}
}
catch(err)
{
}</script>


</head>
<body>
<!--header-->
<div class="header">
    <div class="column-c">
        <p class="header-hy fl">蓝海长青—强军梦  中国梦</p>
        <ul class="header-m fr">
            <li><a href="">收藏本站</a></li>
            <li><a href="">设为首页</a></li>
        </ul>
    </div>
</div>
<div class="column-c">
    <p class="logo fl"><a href="<?php echo U('Index/index');?>"><img src="<?php echo (HIMG_URL); ?>images_03.jpg" alt="蓝海长青" /></a></p>
    <form action="/index.php/Home/News/searchlist" method="post">
        <div class="search fr">
            <p class="search_tp" > <input id="search" name="search" class="search_k fl" type="text" placeholder="请输入您要搜索的内容" />
            <button type="submit" id="shou" class="search-an"></button></p>


        </div>
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

<!--header-->
<!--menu-->
<div class="menu">
    <ul class="menu_nr">
        <li <?php if(CONTROLLER_NAME == Index): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Index/index');?>"><?php echo ($shouye[0]['lan_title']); ?></a></li>
        <li <?php if((ACTION_NAME == gongsijianjie) OR (ACTION_NAME == qiyejingshen) OR (ACTION_NAME == yewufanwei) OR (ACTION_NAME == zuzhijiagou) OR (ACTION_NAME == zhuanjiaduiwu) OR (ACTION_NAME == rencaizhaopin)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/gongsijianjie');?>"><?php echo ($guanyu1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
<?php if(is_array($guanyu2)): foreach($guanyu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><a href="<?php echo U('News/gongsijianjie',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 11)): ?>
<a href="<?php echo U('News/qiyejingshen',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 12)): ?>
<a href="<?php echo U('News/yewufanwei',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 13)): ?>
<a href="<?php echo U('News/zuzhijiagou',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 14)): ?>
<a href="<?php echo U('News/zhuanjiaduiwu',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 15)): ?>
<a href="<?php echo U('News/rencaizhaopin',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] > 40)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>




            </div>
        </li>
        <li <?php if((CONTROLLER_NAME == News) AND ($lan_id == 3)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/newslist',array('lan_id'=>3));?>"><?php echo ($toutiao1[0]['lan_title']); ?></a></li>
        <li <?php if((ACTION_NAME == lanhaizixun) OR ($lan_id == 4) OR ($lan_id == 18) OR ($lan_id == 19) OR ($lan_id == 20) OR ($lan_id == 21) OR ($lan_id == 22) OR ($lan_id == 23)): ?>class="cur"<?php endif; ?>>            <a href="<?php echo U('News/lanhaizixun');?>"><?php echo ($lanhaizixun1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
 <?php if(is_array($lanhaizixun2)): foreach($lanhaizixun2 as $key=>$v): if($v["url"] == ''): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>
                </div>
        </li>
        <li <?php if((ACTION_NAME == junminronghe) OR ($lan_id == 5) OR ($lan_id == 24) OR ($lan_id == 25) OR ($lan_id == 26) OR ($lan_id == 27) OR ($lan_id == 28)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/junminronghe');?>"><?php echo ($junminronghe1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
    <?php if(is_array($junminronghe2)): foreach($junminronghe2 as $key=>$v): if($v["url"] == ''): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>


                </div>
        </li>
        <li <?php if((ACTION_NAME == zixunfuwu) OR ($lan_id == 6) OR ($lan_id == 29) OR ($lan_id == 30) OR ($lan_id == 31) OR ($lan_id == 32) OR ($lan_id == 33) OR ($lan_id == 38) OR (CONTROLLER_NAME == Tushu) OR (CONTROLLER_NAME == Advice)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/zixunfuwu');?>"><?php echo ($zixunfuwu1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
                    <?php if(is_array($zixunfuwu2)): foreach($zixunfuwu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 29)): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 30)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 31)): ?>
<a href="<?php echo U('Fagui/falvfagui',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 32)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 38)): ?>
<a href="<?php echo U('Tushu/tushulist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 33)): ?>
<a href="<?php echo U('Advice/showlist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?></div>
        </li>
        <li <?php if((CONTROLLER_NAME == 'Bbs') OR (CONTROLLER_NAME == 'Blog') OR (CONTROLLER_NAME == 'Posts') OR (CONTROLLER_NAME == 'Famous')): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Bbs/index',array('lan_id'=>7));?>"><?php echo ($changqingluntan1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
    <?php if(is_array($changqingluntan2)): foreach($changqingluntan2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 34)): ?><a href="<?php echo U('Blog/index',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 35)): ?>
<a href="<?php echo U('Posts/postlist',array('lan_id'=>35));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 36)): ?>
<a href="<?php echo U('Famous/famousbbs',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 37)): ?>
<a href="<?php echo U('Famous/character',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>


            </div>
        </li>
        <li <?php if($lan_id == 8): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/newslist',array('lan_id'=>8));?>"><?php echo ($gongyi[0]['lan_title']); ?></a></li>
        <li id="zuih" <?php if($lan_id == 9): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/newslist',array('lan_id'=>9));?>"><?php echo ($lanhaifabu[0]['lan_title']); ?></a></li>
    </ul>
</div>
<!--menu-->


<script type="text/javascript" src='<?php echo (SITE_URL); ?>/Public/Home/ueditor/ueditor.config.js' ></script>
<script type="text/javascript" src='<?php echo (SITE_URL); ?>/Public/Home/ueditor/ueditor.all.min.js' ></script>
<script type="text/javascript" src='<?php echo (SITE_URL); ?>/Public/Home/ueditor/lang/zh-cn/zh-cn.js' ></script>




<script type="text/javascript">
    var pageCount = 1;//总页数
    var regExp = /_ueditor_page_break_tag_/;//根据某处字符来分页
    var saveContent;//用于保存分页数据
    var content, pageList;//保存全局ID

    $(document).ready(function(){
        UeInitialize("#content-box","#page");
    });
    UeInitialize = function (id,page) {
        var cTxt = $(id).html();
        content = $(id);
        pageList = $(page);
        if (cTxt != null && regExp.test(cTxt)) {

            saveContent = cTxt.split(regExp);

            pageCount = saveContent.length;

        }
        window.UePageContent(1);
    };

    UePageContent = function (pageIndex) {
        if (pageIndex >= 1 && pageIndex <= pageCount && saveContent != null && saveContent.length >= 0) {
            var pageHtml = pageList;
            if ((parseInt(pageIndex) - 1) <= saveContent.length) {
                content.html(saveContent[parseInt(pageIndex) - 1]);
            }

            pageHtml.html("");
            var innHtml = "<li><a>页数：" +pageIndex +"/"+pageCount+"</a></li>";
            innHtml += "<li><a target='_self' href='javascript:UePageContent(1)'>首页</a></li>";
            if (pageIndex > 1) {
                innHtml += "<li><a target='_self' href='javascript:UePageContent(" + (parseInt(pageIndex) - 1) + ")'>上一页</a></li>";
            }
            if (pageIndex < pageCount) {
                innHtml += "<li><a target='_self' href='javascript:UePageContent(" + (parseInt(pageIndex) + 1) + ")'>下一页</a></li>";
            }
            innHtml += "<li><a target='_self' href='javascript:UePageContent(" + pageCount + ")'>末页</a></li>";
            pageHtml.html(innHtml);
        }
    }
</script>


<!-------banner------>

<p class="su-banner pt10">
<?php if(!empty($adinfo0)): if(is_array($adinfo0)): foreach($adinfo0 as $key=>$v): ?><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /><?php endforeach; endif; endif; ?>
</p>

<!----banner---->
<div class="column-c pt10 ser">
    <div class="ser-left fl">
        <?php if($pid == 0): ?><p class="ser-tit fl"><a href="<?php echo U('Index/index');?>" class="bule fwb">首页</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" />
                <a href="<?php echo ($daohang["first_url"]); ?>"><?php echo ($daohang["first"]); ?></a> </p>
            <?php else: ?>
            <p class="ser-tit fl"><a href="<?php echo U('Index/index');?>">首页</a><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" />
                 <a href="<?php echo ($daohang["second_url"]); ?>"><?php echo ($daohang["second"]); ?></a>
                <img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" />
                <a href="<?php echo ($daohang["first_url"]); ?>"><?php echo ($daohang["first"]); ?></a></p><?php endif; ?>
    </div>
</div>
<!-------第一通栏------->
<div class="column-c pt10 pb30">
    <!--****左边边通栏****-->
    <div class="set-lis-l fl">
        <!--****左边第一通栏****-->

        <div class="set-fi-t fl">

            <h1 class="set-fi-tit fl"><?php echo ($info["news_title"]); ?></h1>
            <p class="set-fi-sm fl fs12"><span class="bule pr20"><?php echo ($info["author"]); ?></span> <span class="l-gray pr20"><?php echo ($info["add_time"]); ?></span><span class="set-fi-smsz"><?php echo ($info["click"]); ?></span></p>

        </div>
        <!--****左边第二通栏****-->
        <div  id="content-box" class="set-fi fl pt15">
            <p><?php echo ($info["content"]); ?></p>
        </div>

        <!--****左边第三通栏****-->
        <ul class="page" id="page">
        </ul>
        <!--****左边第四通栏****-->
        <!--<p class="set-fi-fx fs12 pt15 pb10"><span  class="fl pt5">分享到：</span><span class="fl pt5 pr15"><a href=""><img src="<?php echo (HIMG_URL); ?>images_117.jpg" />QQ好友</a></span><span class="fl pt5 pr15"><a href=""><img src="<?php echo (HIMG_URL); ?>images_118.jpg" />QQ空间</a></span><span class="fl pt5 pr15"><a href=""><img src="<?php echo (HIMG_URL); ?>images_119.jpg" />朋友圈间</a></span><span class="fl pt5 pr15"><a href=""><img src="<?php echo (HIMG_URL); ?>images_120.jpg" />微信好友</a></span></p>-->
        <!--****左边第五通栏****-->
        <input type='hidden' id='news_id' value='<?php echo ($info["news_id"]); ?>'>
        <div class="set-fi-wy fl" style="padding-top: 5px; height:157px;">
                <p class="set-fi-wytt fl pb10 ">网友评论<span class="l-gray pr20 fs12 pl20">文明上网理性发言</span><span class="fr fs12 bule"><?php echo ($commenttotal); ?>条评论</span>
                </p>

            <textarea  id="content" cols="" rows="" style='width:700px; height:30px;padding-top: 32px;'></textarea>
            <input type="button" class="sub_btn" value="评论" onclick="send_comment()">
        </div>
         <style type="text/css">
             .sub_btn {
                 float: right;
                 display: inline-block;
                 zoom: 1; /* zoom and *display = ie7 hack for display:inline-block */
                 *display: inline;
                 vertical-align: baseline;
                 margin: 6px 2px;
                 outline: none;
                 cursor: pointer;
                 text-align: center;
                 font: 14px/100% Arial, Helvetica, sans-serif;
                 padding: .5em 2em .55em;
                 text-shadow: 0 1px 1px rgba(0,0,0,.6);
                 -webkit-border-radius: 3px;
                 -moz-border-radius: 3px;
                 border-radius: 3px;
                 -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
                 -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
                 box-shadow: 0 1px 2px rgba(0,0,0,.2);
                 color: #e8f0de;
                 border: solid 1px #004084;
                 background: #004084;
                 background: -webkit-gradient(linear, left top, left bottom, from(#004084), to(#004084));
                 background: -moz-linear-gradient(top,  #004084,  #004084);
                 filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#004084', endColorstr='#004084');
             }
             .sub_btn:hover {
                 background: #004084;
                 background: -webkit-gradient(linear, left top, left bottom, from(#004084), to(#004084));
                 background: -moz-linear-gradient(top,  #004084,  #004084);
                 filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#004084', endColorstr='#004084');
             }
         </style>
        <script type="text/javascript">
            var ue = UE.getEditor('content',{toolbars: [['emotion']]});
        </script>
<script style="text/javascript">
      function send_comment(){
          var content= UE.getEditor('content').getContent();//"富文本textarea"获得信息方法
          if(content==''){
              alert('内容不能为空!');
              return;
          }
          var news_id = $('#news_id').val();
          $.ajax({
              url:"/index.php/Home/Ncomment/sendComment",
              data:{'content':content,'news_id':news_id},
              dataType:'json',
              type:'post',
              success:function(data){
			  if(data.error == 'illegalword'){
			ue.setContent(data.result);
			alert(data.mingan);
			return;
		}
                  var s = '<ul class="set-fi-wy-lb fl"><li><dl class="set-fi-wy-lis fl"><dt><img src="<?php echo (HIMG_URL); ?>images_130.jpg" alt="" /></dt><dd><span class="fr l-gray">'+data.add_time+'</span><p class="fl pt10">'+data.content+'</p></dd></dl></li></ul>';
                  //追加s变量到页面上
                  $('.set-fi-wy').after(s);

                  UE.getEditor('content').setContent('', false);

//                  $(document).scrollTop(500px);//设置滚动条的显示位置(向下卷起700px)
              }
          });
      }
</script>

        <!--****左边第六通栏****-->

            <ul class="set-fi-wy-lb fl">  <?php if(is_array($cominfo)): foreach($cominfo as $key=>$v): ?><li><dl class="set-fi-wy-lis fl"><dt><img src="<?php echo (HIMG_URL); ?>images_130.jpg" alt="" /></dt><dd><span class="fr l-gray"><?php echo ($v["add_time"]); ?></span><p class="fl pt10"><?php echo ($v["content"]); ?></p></dd></dl></li><?php endforeach; endif; ?>
            </ul>


<script type="text/jscript" src="<?php echo (PLUGIN_URL); ?>jquerypage/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>jquerypage/jquery-page.js' ></script>
<link href="<?php echo (PLUGIN_URL); ?>jquerypage/page.css" rel="stylesheet" type="text/css"/>
        <input type='hidden' id='commenttotal' value='<?php echo ($commenttotal); ?>' />
        <script type="text/javascript">
            $(function(){
                (function() {

                    //获得记录的总条数
                    var num_entries = $("#commenttotal").val();

                    if(num_entries == 0){
                        $('#Pagination').hide();
                    } else{
                        // 创建分页,并显示到#Pagination所在的元素中
                        $("#Pagination").pagination(num_entries, {

                            num_edge_entries: 1, //边缘页数
                            num_display_entries: 10, //主体页数
                            callback: pageselectCallback,
                           items_per_page:10//每页显示1项

                        });
                    }
                })();

                //点击“页码列表”时的回调函数
                function pageselectCallback(page_index, jq){
                    var news_id = $('#news_id').val();
                    //page_index:"当前页码-1"后的数据
                    //console.log(page_index);
                    //Ajax根据page_index获得分页的数据
                    //在CommentController::getCommentInfo里边获得数据
                    $.ajax({
                        url:"/index.php/Home/Ncomment/getCommentInfo",
                        data:{'news_id':news_id,'page':page_index},
                        dataType:'json',
                        type:'post',
                        success:function(data){

                         console.log(data);
                            //data 与 html标签 做结合 并显示给页面
                            var s = "";
                            $.each(data,function(m,n){
                                //console.log(n.cmt_content);
                                //m:是遍历出来元素的各个下标
                                //n:是遍历出来各个元素对象
                                s += '<ul class="set-fi-wy-lb fl"><li><dl class="set-fi-wy-lis fl"><dt><img src="<?php echo (HIMG_URL); ?>images_130.jpg" alt="" /></dt><dd><span class="fr l-gray">'+n.add_time+'</span><p class="fl pt10">'+n.content+'</p></dd></dl></li></ul>';
                            });
                            $('.set-fi-wy-lb').remove();//清除之前旧数据
                            $('.set-fi-wy').after(s);//追加
                        }
                    });
                }
            });
        </script>

        <!-- 分页信息 start -->
        <div id="Pagination" class="pagination">
        </div>
    </div>


    <div class="set-lis-r fr">
        <!--****右边第一通栏****-->
        <div class="set-lis-tj fl pb10">
            <p class="set-lis-tjtt fl"><img src="<?php echo (HIMG_URL); ?>images_142.jpg" alt="" /></p>
            <ul class="nhtt-list-a fl pt15">
                <?php if(is_array($clickinfo)): foreach($clickinfo as $key=>$v): ?><li><a href="<?php echo U('News/detail',array('news_id'=>$v['news_id'],'lan_id'=>$v['lan_id']));?>"><?php echo ($v["news_title"]); ?></a></li><?php endforeach; endif; ?>

            </ul>
        </div>
		<?php if(!empty($adinfo3)): if(is_array($adinfo3)): foreach($adinfo3 as $key=>$v): ?><p class="pt15"> <img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" />  </p><?php endforeach; endif; endif; ?>
		<?php if(!empty($adinfo4)): if(is_array($adinfo4)): foreach($adinfo4 as $key=>$v): ?><p class="pt15"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /> </p><?php endforeach; endif; endif; ?>
		<?php if(!empty($adinfo5)): if(is_array($adinfo5)): foreach($adinfo5 as $key=>$v): ?><p class="pt15"><img src="<?php echo (SITE_URL); echo ($v["pic"]); ?>" /> </p><?php endforeach; endif; endif; ?>
    </div>
</div>



<script type="text/javascript">
    /*
     * 根据元素的id获得其坐标(x轴和y轴)
     */
    function getElementPos(elementId) {
        var ua = navigator.userAgent.toLowerCase();
        var isOpera = (ua.indexOf('opera') != -1);
        var isIE = (ua.indexOf('msie') != -1 && !isOpera); // not opera spoof
        var el = document.getElementById(elementId);
        if(el.parentNode === null || el.style.display == 'none') {
            return false;
        }
        var parent = null;
        var pos = [];
        var box;
        if(el.getBoundingClientRect) {   //IE
            box = el.getBoundingClientRect();
            var scrollTop = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
            var scrollLeft = Math.max(document.documentElement.scrollLeft, document.body.scrollLeft);
            return {
                x:box.left + scrollLeft,
                y:box.top + scrollTop
            };
        }else if(document.getBoxObjectFor) {   // gecko
            box = document.getBoxObjectFor(el);
            var borderLeft = (el.style.borderLeftWidth)?parseInt(el.style.borderLeftWidth):0;
            var borderTop = (el.style.borderTopWidth)?parseInt(el.style.borderTopWidth):0;
            pos = [box.x - borderLeft, box.y - borderTop];
        }else {   // safari & opera
            pos = [el.offsetLeft, el.offsetTop];
            parent = el.offsetParent;
            if (parent != el) {
                while (parent) {
                    pos[0] += parent.offsetLeft;
                    pos[1] += parent.offsetTop;
                    parent = parent.offsetParent;
                }
            }
            if (ua.indexOf('opera') != -1 || ( ua.indexOf('safari') != -1 && el.style.position == 'absolute' )) {
                pos[0] -= document.body.offsetLeft;
                pos[1] -= document.body.offsetTop;
            }
        }
        if (el.parentNode) {
            parent = el.parentNode;
        } else {
            parent = null;
        }
        while (parent && parent.tagName != 'BODY' && parent.tagName != 'HTML') { // account for any scrolled ancestors
            pos[0] -= parent.scrollLeft;
            pos[1] -= parent.scrollTop;
            if (parent.parentNode) {
                parent = parent.parentNode;
            } else {
                parent = null;
            }
        }
        return {
            x:pos[0],
            y:pos[1]
        };
    }

</script>



<!--footer-->
<div class="footer">
    <div class="column-c">
        <p class="rwm fl"><img src="<?php echo (HIMG_URL); ?>images_109.jpg" alt="二维码" /></p>
        <div class="fr w848">
            <ul class="subnav fl w285">
                <p class="subnav_t fl"><?php echo ($lanhaizixun1[0]['lan_title']); ?></p>
				 <?php if(is_array($lanhaizixun3)): foreach($lanhaizixun3 as $key=>$v): if($v["url"] == ''): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

            </ul>
            <ul class="subnav fl w285">
                <p class="subnav_t fl"><?php echo ($guanyu1[0]['lan_title']); ?></p>
             <?php if(is_array($guanyu3)): foreach($guanyu3 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><li><a href="<?php echo U('News/gongsijianjie',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 11)): ?>
<li><a href="<?php echo U('News/qiyejingshen',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 12)): ?>
<li><a href="<?php echo U('News/yewufanwei',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 13)): ?>
<li><a href="<?php echo U('News/zuzhijiagou',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 14)): ?>
<li><a href="<?php echo U('News/zhuanjiaduiwu',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 15)): ?>
<li><a href="<?php echo U('News/rencaizhaopin',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>
            </ul>
            <ul class="subnav fl w190" id="br-n">
                <p class="subnav_t fl"><?php echo ($changqingluntan1[0]['lan_title']); ?></p>

				    <?php if(is_array($changqingluntan3)): foreach($changqingluntan3 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 34)): ?><li><a href="<?php echo U('Blog/index',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 35)): ?>
<li><a href="<?php echo U('Posts/postlist',array('lan_id'=>35));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 36)): ?>
<li><a href="<?php echo U('Famous/famousbbs',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 37)): ?>
<li><a href="<?php echo U('Famous/character',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

            </ul>
            <p class="copyright fl">Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved. 蓝海长青 版权所有<br />
                京ICP备16050700号-1</p>
        </div>
    </div>
</div>
<div class="izl-rmenu">
    <a class="consult" target="_blank"><div class="phone" style="display:none;">联系电话：<?php echo ($webphone); ?></div></a>
    <a class="cart"><div class="pic"></div></a>
    <a href="javascript:void(0)" class="btn_top" style="display: block;"></a>
</div>
<!--footer-->
<script src="<?php echo (HJS_URL); ?>jquery.hiSlider.min.js"></script>
<script>
	$('.hiSlider1').hiSlider();
</script>
<script type="text/jscript" src="<?php echo (HJS_URL); ?>index.js"></script>
</body>
</html>