<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:00:13
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\yuncat\list.html" */ ?>
<?php /*%%SmartyHeaderCode:8318565d7dbd9a32b3-35505775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b57992045e149cfd7104e14849d27c4f05da9ad5' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\yuncat\\list.html',
      1 => 1435210190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8318565d7dbd9a32b3-35505775',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d7dbd9d5f40_08271849',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d7dbd9d5f40_08271849')) {function content_565d7dbd9d5f40_08271849($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">分类名称</th>                <th class="w40">导航</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','yuncat')">更新排序</button>    </div>    </form></div><?php }} ?>