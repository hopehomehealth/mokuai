<?php /* Smarty version Smarty-3.1.13, created on 2016-04-14 13:55:30
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\goodscat\list.html" */ ?>
<?php /*%%SmartyHeaderCode:1512256ce7bda7626c0-38150377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '079b48a09e801e839e7fb2125984f6f8142f824c' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\goodscat\\list.html',
      1 => 1460613202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1512256ce7bda7626c0-38150377',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce7bda954894_33648951',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce7bda954894_33648951')) {function content_56ce7bda954894_33648951($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w30">排序</th>                <th class="w30">ID</th>                <th align="left">分类名称</th>                <th class="w40">导航</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','goods_cat')">更新排序</button>    </div>    </form></div><?php }} ?>