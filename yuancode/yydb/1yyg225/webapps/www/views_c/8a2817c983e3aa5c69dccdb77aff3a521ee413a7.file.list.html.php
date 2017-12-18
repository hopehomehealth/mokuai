<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:42:05
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\brand\list.html" */ ?>
<?php /*%%SmartyHeaderCode:17659565d878da8c4c5-84377411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a2817c983e3aa5c69dccdb77aff3a521ee413a7' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\brand\\list.html',
      1 => 1435210208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17659565d878da8c4c5-84377411',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d878dac2fd1_18328899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d878dac2fd1_18328899')) {function content_565d878dac2fd1_18328899($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">品牌名称</th>                <th class="w40">显示</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','brand')">更新排序</button>    </div>    </form></div><?php }} ?>