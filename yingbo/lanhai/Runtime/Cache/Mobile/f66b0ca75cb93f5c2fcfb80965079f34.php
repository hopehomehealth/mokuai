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
<script type="text/javascript" src="<?php echo (MJS_URL); ?>jquery-2.1.1.min.js"></script>
<link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<!--*****header*****-->
<header class="bb-b"> <a class="head_back1" href="Javascript:window.history.go(-1)">&nbsp;</a>
  <div class="headTit1">我的帖子</div>
</header>

<!--*****header*****-->
<style type="text/css">
  .zhiding{color:#950909;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #950909;transform:rotate(-7deg);-ms-transform:rotate(-7deg);   /* IE 9 */-moz-transform:rotate(-7deg);  /* Firefox */-webkit-transform:rotate(-7deg); /* Safari 和 Chrome */-o-transform:rotate(-7deg); }
  .jinghua{color:#c27a4a;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #c27a4a;transform:rotate(-7deg);-ms-transform:rotate(-7deg);   /* IE 9 */-moz-transform:rotate(-7deg);  /* Firefox */-webkit-transform:rotate(-7deg); /* Safari 和 Chrome */-o-transform:rotate(-7deg); }
  .xintie{color:#eb0909;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #eb0909;transform:rotate(-7deg);-ms-transform:rotate(-7deg);   /* IE 9 */-moz-transform:rotate(-7deg);  /* Firefox */-webkit-transform:rotate(-7deg); /* Safari 和 Chrome */-o-transform:rotate(-7deg); }
  .putong{color:#999;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #999; }

</style>
<div class="main">
  <!--*****for-c*****-->
  <div class="for-c fl">
    <div class="for-con cur" id="recordslist" boardid="<?php echo ($_GET['board_id']); ?>">
      <?php if(is_array($postlist)): foreach($postlist as $key=>$info): ?><dl class="for-list fl">
        <dt></dt>
        <dd style="width:97%">
          <p class="w100 t-w pb3-5" style="padding-bottom:2.5rem"><a href="/index.php/Mobile/Posts/detail/post_id/<?php echo ($info["post_id"]); ?>"><?php if($info["sort"] == 3): ?><span class="zhiding">置顶</span><?php elseif($info["sort"] == 2): ?><span class="jinghua">精华</span><?php elseif($info["sort"] == 1): ?><span class="xintie">新帖</span><?php elseif($info["sort"] == 0): ?><span class="putong">普通</span><?php endif; ?>&nbsp;<?php echo ($info["topic"]); ?></a></p>
          <p class="w100 fl"><span class="fl w30 t-w"><?php echo ($info["username"]); ?></span><span class="fr pl1"><?php echo ($info["ctime"]); ?></span><span class="fr for-list-tb"></span> </p>
        </dd>
      </dl><?php endforeach; endif; ?>
    </div>
    <div id="loading" style="display:none;float:left;width:100%;text-align:center;font-size:1.5rem;color:#999;background:#fff;line-height:2rem;height:2rem;margin-bottom:0.5rem;margin-top:0.5rem">没有更多数据</div>
    </div>
  </div>
</div>
<!-- 滚动加载 -->
<script type="text/javascript">
  $(function(){
    var boardid = $("#recordslist").attr('boardid');
    var scrollstatus = false;
    var haveend = false;
    var nowpage = 1;
    function ajax_request(boardid,nowpage){
      var html = '';
      var recordslist = $("#recordslist");//放数据的容器
      $.get("/index.php/Mobile/User/mycollect",{'p':nowpage},function(data){
        if(data.error == 0){
          var status = '';
          for(var i in data.content){
            if(data.content[i].sort == 0){
              status = "<span class='putong'>普通</span>";
            }else if(data.content[i].sort == 1){
              status = "<span class='xintie'>新帖</span>";
            }else if(data.content[i].sort == 2){
              status = "<span class='jinghua'>精华</span>";
            }else if(data.content[i].sort == 3){
              status = "<span class='zhiding'>置顶</span>";
            }

            html += "<dl class='for-list fl'><dt></dt><dd style='width:97%'><p class='w100 t-w pb3-5' style='padding-bottom:2.5rem'><a href='/index.php/Mobile/Posts/detail/post_id/"+data.content[i].post_id+"'>"+status+"&nbsp;"+data.content[i].topic+"</a></p><p class='w100 fl'><span class='fl w30 t-w'>"+data.content[i].username+"</span><span class='fr pl1'>"+data.content[i].nctime+"</span><span class='fr for-list-tb'></span> </p></dd></dl>";
          }
        }else{
          if(!haveend){
            $("#loading").fadeIn(1000);$("#loading").fadeOut(1000);
          }

          haveend = true;
        }
        recordslist.append(html);
        //$("#loading").css("display",'none');
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
          ajax_request(boardid,nowpage);
        }
      }
    });
   });
</script>
</body>
</html>