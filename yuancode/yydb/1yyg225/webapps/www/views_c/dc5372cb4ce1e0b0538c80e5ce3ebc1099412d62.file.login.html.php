<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 15:25:16
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/login/login.html" */ ?>
<?php /*%%SmartyHeaderCode:105065783458451f9db9ac20-38274833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc5372cb4ce1e0b0538c80e5ce3ebc1099412d62' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/login/login.html',
      1 => 1481177860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105065783458451f9db9ac20-38274833',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451f9dbfb944_23276456',
  'variables' => 
  array (
    'L' => 0,
    'favicon' => 0,
    'common' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451f9dbfb944_23276456')) {function content_58451f9dbfb944_23276456($_smarty_tpl) {?><!doctype html><html><head>    <meta charset="UTF-8">    <title><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
后台管理</title>    <?php echo $_smarty_tpl->tpl_vars['favicon']->value;?>
    <link rel="stylesheet" href="/admin/css/manage/login.css" type="text/css" />    <script type="text/javascript" src="/style/jquery-1.8.3.min.js"></script>    <script type="text/javascript" src="/style/layer/layer.min.js"></script>    <script type="text/javascript" src="/style/common.js"></script></head><body><style type="text/css">    body{ overflow: auto; }    #foot{height:24px; position:absolute; bottom:10px; left:10px; z-index:1; line-height:24px; color:#888; right:10px}    #foot div{padding:0 10px; text-align:right}    #foot span{display:inline-block; vertical-align:top; line-height:24px}    #foot a{color:#999}    #foot a:hover{color:#f60; text-decoration:underline}</style><div class="login-bg" id="login">    <div style="height:24px; line-height:24px;">        <div id="tips" style="display:none; height:24px; line-height:24px; text-align:center; color:#090">载入中,请稍等...</div>    </div>    <form id="loginform" class="loginform" action="/manage/login/submit" method="post" target="iframeNewsTarget">        <h4><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
后台管理系统</h4>        <div class="form-unit">            <input type="text" class="form-input" id="username" name="username" placeholder="用户名">            <i class="iconfont">&#xe61a;</i>        </div>        <div class="form-unit">            <input type="password" class="form-input" id="password" name="password" placeholder="密码">            <i class="iconfont">&#xe618;</i>        </div>        <?php if (isset($_smarty_tpl->tpl_vars['common']->value['verify_admin'])&&$_smarty_tpl->tpl_vars['common']->value['verify_admin']){?>        <div class="clear"></div>        <div class="form-unit verify-code">            <i class="iconfont">&#xe624;</i>            <input class="form-input codebox" type="text" id="scode" name="scode" placeholder="验证码">        </div>        <div class="verify-image">            <img src="/welcome/scode" class="imgcode" onclick="this.src='/welcome/scode?xrand='+Math.random();" width="65" height="26">        </div>        <?php }?>        <?php if (isset($_smarty_tpl->tpl_vars['common']->value['managesms'])&&$_smarty_tpl->tpl_vars['common']->value['managesms']){?>        <div class="clear"></div>        <div class="form-unit verify-code">            <i class="iconfont">&#xe612;</i>            <input class="form-input codebox" name="sms_code" id="sms_code" type="text" placeholder="短信验证码">        </div>        <div class="verify-image">            <a class="btn-sms" onclick="getSmsVerify('sms_manage')" id="btnSms">发送短信验证码</a>            <input type="hidden" id="mobile" value="" />        </div>        <?php }?>        <div class="login-btn">            <input class="sub-btn" type="submit" value="提交">            <a href="javascript:;" class="form-btn" onclick="$('#loginform').submit();">登录</a>        </div>    </form></div><div id="foot">    <div>        <span><a href="/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
</a></span>    </div></div><iframe name="iframeNewsTarget" style="display: none;"></iframe></body></html><?php }} ?>