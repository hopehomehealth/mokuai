<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 16:21:48
         compiled from "F:\WWW\1yyg225\webapps\www\views\manage\login\login.html" */ ?>
<?php /*%%SmartyHeaderCode:23243565d589ce1cc99-33475855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4264f7acf896c87f1ef1bb5b802fdb6adcd8b1ba' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\manage\\login\\login.html',
      1 => 1446429753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23243565d589ce1cc99-33475855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'favicon' => 0,
    'common' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d589ce9f986_11480664',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d589ce9f986_11480664')) {function content_565d589ce9f986_11480664($_smarty_tpl) {?><!doctype html><html><head>    <meta charset="UTF-8">    <title>一元云购后台管理</title>    <?php echo $_smarty_tpl->tpl_vars['favicon']->value;?>
    <link rel="stylesheet" href="/admin/css/manage/login.css" type="text/css" />    <script src="/admin/js/g.js"></script>    <script src="/admin/js/ipost.js"></script>    <script src="/admin/js/ulogin.js"></script></head><body><style type="text/css">    #foot{height:24px; position:absolute; bottom:10px; left:10px; z-index:1; line-height:24px; color:#888; right:10px}    #foot div{padding:0 10px; text-align:right}    #foot span{display:inline-block; vertical-align:top; line-height:24px}    #foot a{color:#999}    #foot a:hover{color:#f60; text-decoration:underline}</style><div class="login-bg">    <div style="height:24px; line-height:24px;">        <div id="tips" style="display:none; height:24px; line-height:24px; text-align:center; color:#090">载入中,请稍等...</div>    </div>    <form class="loginform" action="/manage/login/submit" method="post" target="subform" onsubmit="return login.submit()">        <h4>一元云购后台管理系统</h4>        <div class="form-unit">            <input type="text" class="form-input" id="username" placeholder="用户名">            <i class="iconfont">&#xe61a;</i>        </div>        <div class="form-unit">            <input type="password" class="form-input" id="password" placeholder="密码">            <i class="iconfont">&#xe618;</i>        </div>        <?php if (isset($_smarty_tpl->tpl_vars['common']->value['verify_admin'])&&$_smarty_tpl->tpl_vars['common']->value['verify_admin']){?>        <div class="clear"></div>        <div class="form-unit verify-code">            <i class="iconfont">&#xe624;</i>            <input class="form-input codebox" type="text" id="scode" placeholder="验证码">        </div>        <div class="verify-image">            <img src="/welcome/scode" class="imgcode" onclick="login.reloadScode(this)" width="65" height="26">        </div>        <?php }?>        <div class="login-btn">            <input class="sub-btn" type="submit" value="提交">            <a href="javascript:;" class="form-btn" onclick="login.submit()">登录</a>        </div>    </form></div><div id="foot">    <div>        <span><a href="/" target="_blank">一元云购</a></span>    </div></div><script type="text/javascript" src="/style/foot.js"></script></body></html><?php }} ?>