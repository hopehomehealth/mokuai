<?php /* Smarty version Smarty-3.1.13, created on 2016-06-22 15:37:46
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\mobilecat\list.html" */ ?>
<?php /*%%SmartyHeaderCode:16803576a404a2901b8-42589931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f9876373a0597229d1d0a50baea592c7fa4c5c1' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\mobilecat\\list.html',
      1 => 1456385624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16803576a404a2901b8-42589931',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a404a2d3f88_59494191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a404a2d3f88_59494191')) {function content_576a404a2d3f88_59494191($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">分类名称</th>                <th class="w40">导航</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','yuncat')">更新排序</button>    </div>    </form></div><?php }} ?>