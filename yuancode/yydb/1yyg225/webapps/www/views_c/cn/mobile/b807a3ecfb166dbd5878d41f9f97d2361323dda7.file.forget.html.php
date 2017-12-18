<?php /* Smarty version Smarty-3.1.13, created on 2016-03-04 11:34:06
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\forget.html" */ ?>
<?php /*%%SmartyHeaderCode:1741356d9022e283de6-94954426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b807a3ecfb166dbd5878d41f9f97d2361323dda7' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\forget.html',
      1 => 1456824000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1741356d9022e283de6-94954426',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'html_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d9022e35f892_33918897',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9022e35f892_33918897')) {function content_56d9022e35f892_33918897($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container main">
    <div class="user-box">
        <form action="" target="iframeNews"  id="forgetform" method="post">
            <?php if ($_smarty_tpl->tpl_vars['type']->value=='mobile'){?>
            <div class="form-box">
                <div class="Validform_checktip color01"></div>
                <div class="input">
                    <i class="ap-icon icon-phone"></i>
                    <input name="mobile" id="mobile" class="txt" type="text" placeholder="手机号" datatype="m" nullmsg="请输入手机号" errormsg="手机格式不正确" />
                </div>
            </div>
            <?php echo $_smarty_tpl->tpl_vars['html_code']->value;?>

            <div class="form-box">
                <div class="Validform_checktip color01"></div>
                <div class="input code">
                    <i class="ap-icon icon-code"></i>
                    <input class="txt" type="text" placeholder="短信验证码" name="sms_code" id="sms_code" />
                </div>
                <input type="button" value="获取短信" onclick="getSmsVerify('sms_password')" id="btnSms" style="font-size:12px;" />
            </div>
            <input class="btn" name="Submit2" type="submit" value="立 即 找 回">

            <?php }else{ ?>
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
                    <i class="ap-icon icon-email"></i>
                    <input name="username2" class="txt" type="text" placeholder="邮箱" nullmsg="请输入邮箱" errormsg="邮箱格式不正确" datatype="e" />
                </div>
            </div>
            <input class="btn" name="Submit" type="submit" value="立 即 找 回">
            <?php }?>
        </form>
    </div>
</div>


<script type="text/javascript" src="/style/Validform_min.js"></script>
<script type="text/javascript" src="/style/mobile/js/script.js"></script>
<script type="text/javascript">
    $(function(){
        $("#forgetform").Validform({
            tiptype:function(msg,o,cssctl){ validTip(msg,o,cssctl); },
            showAllError:true
        });
    })
</script>

<iframe name="iframeNews" style="display:none;"></iframe>
</body>
</html><?php }} ?>