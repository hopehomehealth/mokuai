<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>蓝海长青后台登录</title>

    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>loginreset.css">
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>loginsupersized.css">
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>loginstyle.css">



</head>

<body>
<script language="JavaScript" type="text/javascript" src="<?php echo (JS_URL); ?>FormValid.js"></script>
<script type="text/javascript">
    function customFuntion(inp,frms) {

        if (inp.value || frms['sj'].value) {
            return true;
        }
        return false;
    }
</script>

<div class="page-container">

    <h1><img src="<?php echo (IMG_URL); ?>logo.png" alt=""/><span>后台登录</span></h1>
    <form name="login" action="" method="post" onsubmit="return validator(this)">
        <div class="dl">


            <input name="admin_name" placeholder="用户名" id="admin_name" class="kuang w150" type="text" valid='required' errmsg="用户名必填"/>

            <input name="admin_pwd" placeholder="密码" id="admin_pwd" class="kuang w150" type="password" valid='required' errmsg="密码必填"/>


            <button id="submit" name="submit" value="" class="btn btn-primary btn-lg" onclick="login()" type="submit"/>登&nbsp;&nbsp;录</button>

        </div>
    </form>
    <div class="connect">
        <p>Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?>  京ICP备16050700号-1 蓝海长青 版权所有</p>

    </div>
</div>


<script src="<?php echo (JS_URL); ?>jquery-2.1.3.min.js"></script>
<script src="<?php echo (JS_URL); ?>loginsupersized.3.2.7.min.js"></script>
<script src="<?php echo (JS_URL); ?>loginsupersized-init.js"></script>
<script src="<?php echo (JS_URL); ?>loginscripts.js"></script>

</body>

</html>