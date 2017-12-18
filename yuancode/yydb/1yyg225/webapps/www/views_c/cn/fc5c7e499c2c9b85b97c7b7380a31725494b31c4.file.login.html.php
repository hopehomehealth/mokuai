<?php /* Smarty version Smarty-3.1.13, created on 2015-12-16 14:52:18
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\member\login.html" */ ?>
<?php /*%%SmartyHeaderCode:2620565d719d504053-75579190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc5c7e499c2c9b85b97c7b7380a31725494b31c4' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\member\\login.html',
      1 => 1450248735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2620565d719d504053-75579190',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d719d544fc5_88086477',
  'variables' => 
  array (
    'site_config' => 0,
    'back_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d719d544fc5_88086477')) {function content_565d719d544fc5_88086477($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['mod'])) {$_smarty_tpl->tpl_vars['mod'] = clone $_smarty_tpl->tpl_vars['mod'];
$_smarty_tpl->tpl_vars['mod']->value = 'login'; $_smarty_tpl->tpl_vars['mod']->nocache = null; $_smarty_tpl->tpl_vars['mod']->scope = 0;
} else $_smarty_tpl->tpl_vars['mod'] = new Smarty_variable('login', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css/validform.css" />
<div class="dl-box login-box fn-clear">
    <a href="<?php echo url('/content/chart');?>
" class="atip" title="【导购流程、了解商城】"></a>
    <form action="/member/act_login" target="iframeNews" id="login_form" method="post">
        <input name="username" type="text" class="input input-user" autocomplete="false" placeholder="账户名/邮箱/手机号" />
        <input name="password" type="password" class="input input-pass" placeholder="输入密码" />

        <div class="dl-btna fn-clear">
            <div class="ui-left oauth">
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['qq_login']){?><a href="javascript:void(0);" onclick="oauth('<?php echo url('/member/oauth/qq?open=1');?>
')"><img src="/style/images/qq.png" /> QQ登录</a><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['weibo_login']){?><a href="javascript:void(0);"  onclick="oauth('<?php echo url('/member/oauth/weibo?open=1');?>
')"><img src="/style/images/weibo.png" /> 微博登录</a><?php }?>
            </div>
            <a href="<?php echo url('/member/regist');?>
" style="margin-right: 10px;" class="ui-left">注册会员</a>
            <a href="<?php echo url('/member/forget');?>
" class="ui-left">忘记密码？</a>
            <span id="msgTip" style="margin-left:30px;"></span>
        </div>

        <input type="hidden" name="back_url" value="<?php echo $_smarty_tpl->tpl_vars['back_url']->value;?>
">
        <input name="Submit" type="submit" value=" " class="hy-btn" id="submit-button" />
    </form>
    <div class="fn-left dl-boxr"></div>
</div>


<script type="text/javascript" src="/style/Validform_min.js"></script>
<script type="text/javascript">
$(function(){
    $("#login_form").Validform({
        showAllError:true,
        label:".label",
        tiptype:function(msg,o,cssctl){ validTip(msg,o,cssctl); }
    });
});
</script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>