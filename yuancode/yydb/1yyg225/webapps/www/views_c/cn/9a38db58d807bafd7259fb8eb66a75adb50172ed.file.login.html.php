<?php /* Smarty version Smarty-3.1.13, created on 2016-03-08 11:24:34
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\login.html" */ ?>
<?php /*%%SmartyHeaderCode:136905660f6eb6753e3-81324514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a38db58d807bafd7259fb8eb66a75adb50172ed' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\login.html',
      1 => 1457406985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136905660f6eb6753e3-81324514',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f6eb6fda26_32310968',
  'variables' => 
  array (
    'site_config' => 0,
    'mobile' => 0,
    'back_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f6eb6fda26_32310968')) {function content_5660f6eb6fda26_32310968($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['mod'])) {$_smarty_tpl->tpl_vars['mod'] = clone $_smarty_tpl->tpl_vars['mod'];
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
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['weibo_login']){?><a href="javascript:void(0);" onclick="oauth('<?php echo url('/member/oauth/weibo?open=1');?>
')"><img src="/style/images/weibo.png" /> 微博登录</a><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['wxpc_login']&&$_smarty_tpl->tpl_vars['mobile']->value!=1){?><a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?php echo $_smarty_tpl->tpl_vars['site_config']->value['wxpc_appid'];?>
&redirect_uri=<?php echo urlencode(url(''));?>
&response_type=code&scope=snsapi_login&state=22138#wechat_redirect"><img src="/style/images/wechat.png"/> 微信登录</a><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['sync_login']&&$_smarty_tpl->tpl_vars['mobile']->value!=1){?><a href="<?php echo url('/member/wx_scan');?>
"><img src="/style/images/wechat.png"/> 微信登录</a><?php }?>
            </div>
            <a href="<?php echo url('/member/regist');?>
" style="margin-right: 10px;" class="ui-left">注册会员</a>
            <a href="<?php echo url('/member/forget/mobile');?>
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