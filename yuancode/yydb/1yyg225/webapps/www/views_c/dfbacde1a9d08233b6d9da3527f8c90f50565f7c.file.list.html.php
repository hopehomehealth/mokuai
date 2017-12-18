<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 16:23:52
         compiled from "F:\WWW\1yyg225\webapps\www\views\manage\menus\list.html" */ ?>
<?php /*%%SmartyHeaderCode:11968565d59188f92e9-50076071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfbacde1a9d08233b6d9da3527f8c90f50565f7c' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\manage\\menus\\list.html',
      1 => 1435210353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11968565d59188f92e9-50076071',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d591896f131_34841578',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d591896f131_34841578')) {function content_565d591896f131_34841578($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">菜单名称</th>                <th class="w40">状态</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','menus')">更新排序</button>    </div>    </form></div><?php }} ?>