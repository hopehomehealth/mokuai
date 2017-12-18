<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 20:11:25
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\member\login.html" */ ?>
<?php /*%%SmartyHeaderCode:127065660316d5733d4-03942780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0735417c7d49c3dd0849ac3b5f7db2ca143126c' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\member\\login.html',
      1 => 1433091932,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127065660316d5733d4-03942780',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660316d63f503_73500748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660316d63f503_73500748')) {function content_5660316d63f503_73500748($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container main">
    <div class="user-box">
        <form action="/member/act_login" target="iframeNews" id="loginform" method="post">
            <div class="form-box">
                <div class="Validform_checktip color01"></div>
                <div class="input">
                    <i class="ap-icon icon-name"></i>
                    <input name="username" class="txt" type="text" placeholder="账号" autocomplete="false" datatype="*" nullmsg="请输入用户名/邮箱/手机" />
                </div>
            </div>
            <div class="form-box">
                <div class="Validform_checktip color01"></div>
                <div class="input">
                    <i class="ap-icon icon-psw"></i>
                    <input name="password" class="txt" type="password" placeholder="密码" datatype="*" nullmsg="请输入登陆密码" />
                </div>
            </div>
            <input class="btn" name="Submit" type="submit" value="立 即 登 录">
            <div class="ubox-b ui-clr">
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['qq_login']){?><a href="javascript:void(0);" onclick="oauth('<?php echo url('/member/oauth/qq?open=1');?>
') "class="ui-left log-qq color04">QQ登录</a><?php }?>
                <p class="ui-right">
                    <a href="<?php echo url('/member/forget');?>
" class="color04">忘记密码？</a>
                    <a href="<?php echo url('/member/regist');?>
" class="color04">注册账号</a>
                </p>
            </div>
        </form>
    </div>
</div>


<script type="text/javascript" src="/style/Validform_min.js"></script>
<script type="text/javascript" src="/style/mobile/js/script.js"></script>
<script type="text/javascript">
    $(function(){
        $("#loginform").Validform({
            tiptype:function(msg,o,cssctl){ validTip(msg,o,cssctl); },
            showAllError:true
        });
    })
</script>

<iframe name="iframeNews" style="display:none;"></iframe>
</body>
</html><?php }} ?>