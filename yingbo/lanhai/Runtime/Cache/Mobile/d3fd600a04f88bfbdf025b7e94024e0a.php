<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title>蓝海长青</title>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>banner.js"></script>
<link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<!--*****header*****-->
<header class="bb-b"> <a class="head_back1" href="Javascript:window.history.go(-1)">&nbsp;</a>

  <div class="headTit1">我的关注</div>
</header>

<!--*****header*****-->
<div class="main">
  <!--*****for*****-->
   <section>
<ul class="post-list fl pb1" style="width:100%" id="recordslist">
  <?php if(is_array($famous)): foreach($famous as $key=>$famousinfo2): ?><li style="position:relative">
    <dl class="for-fig-pic fl" style="border-bottom:0;">
      <dt style="width:6.5rem;height:6.5rem;overflow:hidden"><a href="/index.php/Mobile/Famous/slanders2/f_id/<?php echo ($famousinfo2["f_id"]); ?>"><img style="height:6.5rem;" src="<?php echo ($famousinfo2["f_photo"]); ?>"></a></dt>
      <dd>
        <p class="w100 fl t-w"><a href="/index.php/Mobile/Famous/slanders2/f_id/<?php echo ($famousinfo2["f_id"]); ?>"><?php echo ($famousinfo2["f_name"]); ?></a><span class=" for-fig-gz fr pr0-5"></span></p>
        <p class="w100 fl l-gray fs1"><span class=" for-fig-tb"><img src="<?php echo (MIMG_URL); ?>tb_29.png"></span><?php echo ($famousinfo2["f_province"]); ?></p>
        <p class="w100 fl fs1-2"><span class="l-gray">发表文章：</span><?php echo ($famousinfo2["f_artnums"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="l-gray">粉丝：</span><?php echo ($famousinfo2["f_fans"]); ?></p>
      </dd>
    </dl>
    <a href="javascript:void(0)" onclick="cancelfollow(this,'/index.php/Mobile/User/cancelfollow/f_id/'+<?php echo ($famousinfo2['f_id']); ?>)" style="position:absolute;display:inline-block;right:1rem;top:1rem"><img src="/Public/Home/images/images_152.jpg" alt=""></a>
    <div style="clear:both"></div>
    </li><?php endforeach; endif; ?>
</ul>
<div id="loading" style="display:none;float:left;width:100%;text-align:center;font-size:1.5rem;color:#999;background:#fff;line-height:2rem;height:2rem;margin-bottom:0.5rem;margin-top:0.5rem">没有更多数据</div>
  </section>

</div>
<script type="text/javascript">
        $(function(){
            $(".post li").click(function(){
                $(this).addClass("cur").siblings().removeClass("cur");
                $(".post-con").eq($(this).index()).addClass("cur").siblings().removeClass("cur");
            })
        })
</script>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>msgbox.js"></script>
<!-- 滚动加载 -->
<script type="text/javascript">
  //取消加关注
	function cancelfollow(obj,url){
		thisobj = $(obj);
		$.get(url,function(data){
			if(data == 'nologin'){
				myalertbox('请先登录');
				return;
			}
			if(data == 'success'){
				thisobj.parents('li').remove();
				myalertbox('取消关注成功');
			}else{
				myalertbox('取消关注失败');
			}
		})
	}
  $(function(){
    var scrollstatus = false;
    var haveend = false;
    var nowpage = 1;
    function ajax_request(nowpage){
      var html = '';
      var recordslist = $("#recordslist");//放数据的容器
      $.get("/index.php/Mobile/User/myfollows",{'p':nowpage},function(data){
        if(data.error == 0){
          for(var i in data.myfollows){

            html += "<li style='position:relative'><dl class='for-fig-pic fl' style='border-bottom:0;'><dt style='width:6.5rem;height:6.5rem;overflow:hidden'><a href='/index.php/Mobile/Famous/slanders2/f_id/"+data.myfollows[i].f_id+"'><img style='height:6.5rem;' src='"+data.myfollows[i].f_photo+"'></a></dt><dd><p class='w100 fl t-w'><a href='/index.php/Mobile/Famous/slanders2/f_id/"+data.myfollows[i].f_id+"'>"+data.myfollows[i].f_name+"</a><span class=' for-fig-gz fr pr0-5'></span></p><p class='w100 fl l-gray fs1'><span class=' for-fig-tb'><img src='/Public/Mobile/images/tb_29.png'></span>"+data.myfollows[i].f_province+"</p><p class='w100 fl fs1-2'><span class='l-gray'>发表文章：</span>"+data.myfollows[i].f_artnums+"&nbsp;&nbsp;&nbsp;&nbsp;<span class='l-gray'>粉丝：</span>"+data.myfollows[i].f_fans+"</p></dd></dl><a href='javascript:void(0)' onclick='cancelfollow(this,\"/index.php/Mobile/User/cancelfollow/f_id/"+data.myfollows[i].f_id+"\")' style='position:absolute;display:inline-block;right:1rem;top:1rem'><img src='/Public/Home/images/images_152.jpg' alt=''></a><div style='clear:both'></div></li>";
          }
        }else{
          if(!haveend){
            $("#loading").fadeIn(1000);$("#loading").fadeOut(1000);
          }

          haveend = true;
        }
        recordslist.append(html);
        scrollstatus = false;
      },false);
    }
    $(window).scroll(function () {
      var scrollTop = $(this).scrollTop();
      var scrollHeight = $(document).height();
      var windowHeight = $(this).height();
      if (scrollTop + windowHeight == scrollHeight && scrollstatus == false) {
        scrollstatus = true;
        nowpage++;
        if(!haveend){
          ajax_request(nowpage);
        }
      }
    });
   });
</script>
</body>
</html>