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
  <script src="<?php echo (MJS_URL); ?>js.js"></script>
<link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
</head>

<body>
<!--*****header*****-->
<header class="bb-b"> <a class="head_back1" href="Javascript:window.history.go(-1)">&nbsp;</a>
  <div class="headTit1">积分规则</div>
</header>

<!--*****header*****-->
<div class="main">
  <!--*****for*****-->
   <section>
<table class="rul-con fl" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="b-gray">
    <th>动作名称 </th>
    <th>周期范围 </th>
    <th> 周期内最多奖励次数</th>
    <th>积分</th>
  </tr>
  <?php if(is_array($rulelist)): foreach($rulelist as $key=>$info): ?><tr>
    <td><?php echo ($info["opname"]); ?></td>
    <td><?php echo ($info["cycle"]); ?></td>
    <td><?php echo ($info["counts"]); ?></td>
    <td><?php echo ($info["number"]); ?></td>
  </tr><?php endforeach; endif; ?>
</table>
<p class="rul-sm fl l-gray">以上事件动作，会得到积分奖励。不过，在一个周期内，您最多得到
的奖励次数有限制。</p>
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
</body>
</html>