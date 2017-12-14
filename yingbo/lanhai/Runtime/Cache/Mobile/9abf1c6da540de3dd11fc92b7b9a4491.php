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
<title><?php echo ($imginfo["title"]); ?></title>
<script type="text/javascript" src="<?php echo (MJS_URL); ?>jquery-2.1.1.min.js"></script>
<!-- <script type="text/jscript" src="<?php echo (MJS_URL); ?>banner.js"></script> -->
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.config.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.all.min.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/lang/zh-cn/zh-cn.js' ></script>
<link href="<?php echo (MCSS_URL); ?>basic.css" type="text/css" rel="stylesheet" />
<link href="<?php echo (MCSS_URL); ?>style.css" type="text/css" rel="stylesheet" />
<style type="text/css">
  /* #edui1_iframeholder{height:auto!important;min-height:20rem;} */
  div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video, input, button { line-height: 2.5rem!important; padding-bottom: 1rem!important;  }
  a{ color: #004084!important;}
  .moban{width:100%;text-align: center;padding: 1rem 0rem;  font-size: 1.8rem; background: #004084; color: #fff; font-weight: bold;}
  .moban-tit {width:100%;text-align: right;padding:0rem  1.2rem; font-size: 1.4rem;padding-bottom: 0rem!important; color:#909090; border-bottom: 1px #004084 dotted;}

</style>
</head>

<body style="background: #fafafa;">
<!--*****header*****-->
<header style="border-bottom: none; background: #fafafa;">
 <p class="moban fl"><?php echo ($imginfo["title"]); ?></p>
 <p class="moban-tit fr"><?php echo ($imginfo["addtime"]); ?></p>
</header>

<!--*****header*****-->
<div class="main">
  <!--*****for*****-->
   <section>
   <div  class="fin-nr">
  <div class="fin-twnr fl" style="padding-top:2rem;">
           <?php echo ($imginfo["descs"]); ?>
       </div>
       </div>
     </section>
   </div>
   </body>
   </html>