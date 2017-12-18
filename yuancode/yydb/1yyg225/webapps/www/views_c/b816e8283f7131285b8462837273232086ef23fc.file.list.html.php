<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 19:26:11
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\brand\list.html" */ ?>
<?php /*%%SmartyHeaderCode:2562956598f53cf6705-77896087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b816e8283f7131285b8462837273232086ef23fc' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\brand\\list.html',
      1 => 1435210208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2562956598f53cf6705-77896087',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56598f53d46b89_96888946',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56598f53d46b89_96888946')) {function content_56598f53d46b89_96888946($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">品牌名称</th>                <th class="w40">显示</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','brand')">更新排序</button>    </div>    </form></div><?php }} ?>