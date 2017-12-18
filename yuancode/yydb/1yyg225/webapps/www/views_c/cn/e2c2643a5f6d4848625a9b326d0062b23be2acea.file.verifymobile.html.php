<?php /* Smarty version Smarty-3.1.13, created on 2016-12-26 20:55:39
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/member/verifymobile.html" */ ?>
<?php /*%%SmartyHeaderCode:10053990125861134ba0bf79-67689745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2c2643a5f6d4848625a9b326d0062b23be2acea' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/member/verifymobile.html',
      1 => 1467783072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10053990125861134ba0bf79-67689745',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5861134ba728a6_41691705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5861134ba728a6_41691705')) {function content_5861134ba728a6_41691705($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                                <th>验证码：</th>
                                <td>
                                    <input type="text" id="scode" name="scode" value="" class="inpt-style2" placeholder="请输入答案" />
                                    <img src="/welcome/scode" class="imgcode" onclick="this.src='/welcome/scode?xrand='+Math.random();" />
                                </td>
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