<?php /* Smarty version Smarty-3.1.13, created on 2016-05-12 11:42:45
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\login.html" */ ?>
<?php /*%%SmartyHeaderCode:24067566105368985e7-67303023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '313615adad3e298c357aa5602d1f2f444cbcf571' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\login.html',
      1 => 1462962815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24067566105368985e7-67303023',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5661053694ccf7_53594408',
  'variables' => 
  array (
    'back_url' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5661053694ccf7_53594408')) {function content_5661053694ccf7_53594408($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
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

            <input type="hidden" name="back_url" value="<?php echo $_smarty_tpl->tpl_vars['back_url']->value;?>
">
            <input class="btn" name="Submit" type="submit" value="立 即 登 录">
            <div class="ubox-b ui-clr">
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['qq_login']){?><a href="javascript:void(0);" onclick="oauth('<?php echo url('/member/oauth/qq?open=1');?>
')"><img src="/style/images/qq.png" /> QQ登录</a><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['weibo_login']){?><a href="javascript:void(0);"  onclick="oauth('<?php echo url('/member/oauth/weibo?open=1');?>
')"><img src="/style/images/weibo.png" /> 微博登录</a><?php }?>
                <p class="ui-right">
                    <a href="<?php echo url('/member/forget/mobile');?>
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