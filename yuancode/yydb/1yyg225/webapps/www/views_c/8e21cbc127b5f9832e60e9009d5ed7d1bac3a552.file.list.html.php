<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:15:16
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/brand/list.html" */ ?>
<?php /*%%SmartyHeaderCode:161397650558452214cbd348-56258227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e21cbc127b5f9832e60e9009d5ed7d1bac3a552' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/brand/list.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161397650558452214cbd348-56258227',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58452214cf9b04_92975136',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58452214cf9b04_92975136')) {function content_58452214cf9b04_92975136($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">品牌名称</th>                <th class="w40">显示</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','brand')">更新排序</button>    </div>    </form></div><?php }} ?>