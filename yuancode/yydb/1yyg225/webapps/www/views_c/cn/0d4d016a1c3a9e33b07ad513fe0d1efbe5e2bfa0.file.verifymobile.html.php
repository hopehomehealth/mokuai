<?php /* Smarty version Smarty-3.1.13, created on 2016-05-12 13:36:54
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\verifymobile.html" */ ?>
<?php /*%%SmartyHeaderCode:193905660f768bd7775-86600759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d4d016a1c3a9e33b07ad513fe0d1efbe5e2bfa0' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\verifymobile.html',
      1 => 1462429042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193905660f768bd7775-86600759',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f768cc5010_92575340',
  'variables' => 
  array (
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f768cc5010_92575340')) {function content_5660f768cc5010_92575340($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <div class="fn-clear hy-r">
            <div style="color:red;font-size:14px;font-weight:bold;padding:10px;">请先绑定您的常用手机号（以便<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
后系统第一时间通知到您）。</div>
            <div class="hy-box">
                <div class="hy-yhk">
                    <form action="" target="iframeNews" method="post" id="submit_form">
                        <table>
                            <tr>
                                <th style="width: 100px;">手机号：</th>
                                <td><input name="mobile" id="mobile" type="text" class="inpt-style2" /> <?php if (statusTpl('sms_verifymobile')){?><input type="button" value="获取短信验证码" onclick="getSmsVerify('sms_verifymobile')" id="btnSms" /><?php }?></td>
                            </tr>
                            <tr>
                                <th>短信验证码：</th>
                                <td><input type="text" name="sms_code" id="sms_code" class="inpt-style2" value=""></td>
                            </tr>
                            <tr>
                                <th> &nbsp;</th>
                                <td class="">
                                    <input type="hidden" name="Submit" value="1">
                                    <input type="submit" value="确定" class="hy-btn2 fn-left"/>
                                    <input type="button" value="返回" class="hy-btn2" onclick="window.history.go(-1)" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>