<?php if (!defined('THINK_PATH')) exit();?> 

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>乐护 </title>
    <link rel="stylesheet" type="text/css" href="<?php echo (MBCSS_URL); ?>swiper.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (MBCSS_URL); ?>reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (MBCSS_URL); ?>hzw-city-picker.css">

</head>
<body>


    <div class="main companyBox" style="margin: 0rem; padding: 0rem;">

        <div class="companyBoxIn" style="margin: 0rem;padding:0rem;">
                <h4 style="font-size: 1.25rem; line-height:3.583rem; color: #fff;
    background: #00a6d2; padding: 0rem 0.917rem;"><?php echo ($info["title"]); ?></h4>
                <span style="padding: 0rem 0.917rem;margin-top:1rem;font-size:1rem;">时间：<?php echo ($info["addtime"]); ?>  </span>
<div style="padding: 0rem 0.917rem;">
               <?php echo ($info["descs"]); ?>
</div>
        </div>
    </div>
</div>