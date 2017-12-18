<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 16:32:03
         compiled from "F:\WWW\1yyg225\webapps\www\views\manage\category\list.html" */ ?>
<?php /*%%SmartyHeaderCode:13727565d5b03a1c129-56866812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d5b340dc573864ca32e0c7bab7771d58725128c' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\manage\\category\\list.html',
      1 => 1435210457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13727565d5b03a1c129-56866812',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d5b03a6fe30_32044712',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d5b03a6fe30_32044712')) {function content_565d5b03a6fe30_32044712($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">栏目名称</th>                <th class="w80">所属模型</th>                <th class="w40">导航</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','category')">更新排序</button>    </div>    </form></div><?php }} ?>