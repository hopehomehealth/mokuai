<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 10:29:42
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/verifymobile.html" */ ?>
<?php /*%%SmartyHeaderCode:1757315501587598966fd432-82181991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0c8e29f2779b650f47611d0fa14eeb91c574715' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/verifymobile.html',
      1 => 1467784254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1757315501587598966fd432-82181991',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58759896771324_60819067',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58759896771324_60819067')) {function content_58759896771324_60819067($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<link rel="stylesheet" href="/style/mobile/css/member.css"><div id="content" class="container main">    <div class="tips-m">        <div class="prompt">请先绑定您的常用手机号（以便<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
后系统第一时间通知到您）。</div>    </div>    <div class="form-m">        <form action="" target="iframeNews" method="post" id="submit_form">        <div class="item ui-clr">            <dl>                <dt class="color03">手机号：</dt>                <dd>                    <div style="position: relative;border-right: 1px solid #e6e6e6; width:90%;">                        <input type="text" class="input-m" name="mobile" id="mobile" value="" />                    </div>                </dd>            </dl>        </div>        <div class="item ui-clr">            <dl>                <dt class="color03">验证码：</dt>                <dd>                    <div style="position:relative;width:90%;">                        <input type="text" id="scode" name="scode" value="" class="input-m" style="width: 50%" placeholder="请输入答案" />                        <img src="/welcome/scode" class="imgcode" onclick="this.src='/welcome/scode?xrand='+Math.random();" style="vertical-align: middle;float: right" />                    </div>                </dd>            </dl>        </div>        <div class="item ui-clr">            <dl>                <dt class="color03">短信验证码：</dt>                <dd>					<div style="position:relative;width:90%;">                    <input type="text" name="sms_code" id="sms_code-m" class="input-m" style="width: 50%" value="">					 <?php if (statusTpl('sms_verifymobile')){?><input type="button" value="获取短信验证码" onclick="getSmsVerify('sms_verifymobile')" id="btnSms" class="yzm-btn" /><?php }?>					 </div>                </dd>            </dl>        </div>        <input type="hidden" name="Submit" value="1">        <input type="submit" value="确定" class="btn" />        </form>    </div></div><?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>