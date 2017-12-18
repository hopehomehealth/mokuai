<?php /* Smarty version Smarty-3.1.13, created on 2016-03-04 10:51:21
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\forget.html" */ ?>
<?php /*%%SmartyHeaderCode:412256614ca5a77fc3-53013506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd453b01e2975e6a59f2295ea578216d144846146' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\forget.html',
      1 => 1456824000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '412256614ca5a77fc3-53013506',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56614ca60f3f89_87638961',
  'variables' => 
  array (
    'type' => 0,
    'html_code' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56614ca60f3f89_87638961')) {function content_56614ca60f3f89_87638961($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['mod'])) {$_smarty_tpl->tpl_vars['mod'] = clone $_smarty_tpl->tpl_vars['mod'];
$_smarty_tpl->tpl_vars['mod']->value = 'login'; $_smarty_tpl->tpl_vars['mod']->nocache = null; $_smarty_tpl->tpl_vars['mod']->scope = 0;
} else $_smarty_tpl->tpl_vars['mod'] = new Smarty_variable('login', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<div class="dl-box fn-clear">
    <form action="" target="iframeNews"  id="forget_form" method="post">
        <div class="fn-left dl-boxl">
            <?php if ($_smarty_tpl->tpl_vars['type']->value=='mobile'){?>
            <div class="form-box fn-clear">
                <label><font class="label">手机号码</font>：</label><input name="mobile" id="mobile" type="text" class="inpt-style"  nullmsg="请输入您绑定的手机号码" errormsg="手机格式不正确" datatype="m" />
            </div>
            <?php echo $_smarty_tpl->tpl_vars['html_code']->value;?>

            <div class="form-box fn-clear">
                <label><font class="label">短信验证码</font>：</label><input name="sms_code" id="sms_code" type="text" nullmsg="请输入短信验证码" errormsg="邮箱格式不正确" class="inpt-style2" />
                <input type="button" value="获取短信验证码" onclick="getSmsVerify('sms_password')" id="btnSms" />
            </div>
            <div class="form-box fn-clear">
                <label>&nbsp;</label><input name="Submit2" type="submit" value="立即找回" class="hy-btn" />
            </div>

            <?php }else{ ?>
            <div class="form-box fn-clear">
                <label><font class="label">账户名</font>：</label><input name="username" type="text" class="inpt-style" autocomplete="false" datatype="*"/>
            </div>
            <div class="form-box fn-clear">
                <label><font class="label">邮箱</font>：</label><input name="username2" type="text" nullmsg="请输入邮箱" errormsg="邮箱格式不正确" class="inpt-style" datatype="e"/>
            </div>
            <div class="form-box fn-clear">
                <label>&nbsp;</label><input name="Submit" type="submit" value="立即找回" class="hy-btn" />
            </div>
            <?php }?>
        </div>
    </form>
    <div class="fn-left dl-boxr">
        <p>我没有<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
帐号，</p>
        <div class="fn-clear">
            <a href="<?php echo url('/member/regist');?>
" class="hy-a1">立即注册</a>
        </div>
    </div>
</div>


<script type="text/javascript" src="/style/Validform_min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#forget_form").Validform({
            tiptype:3,
            showAllError:true,
            label:".label"
        });
    });
</script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>