<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:13:50
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/menus/list.html" */ ?>
<?php /*%%SmartyHeaderCode:1570550348584521be9fa168-49723006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acc613e8d5789e17c81360bd6ac2d29f95f09e10' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/menus/list.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1570550348584521be9fa168-49723006',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584521beb4f2f9_28795331',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584521beb4f2f9_28795331')) {function content_584521beb4f2f9_28795331($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">菜单名称</th>                <th class="w40">状态</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','menus')">更新排序</button>    </div>    </form></div><?php }} ?>