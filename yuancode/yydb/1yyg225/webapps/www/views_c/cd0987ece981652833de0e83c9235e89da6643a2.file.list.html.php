<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:48:22
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\brand\list.html" */ ?>
<?php /*%%SmartyHeaderCode:120645660fe6a2356c1-51981397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd0987ece981652833de0e83c9235e89da6643a2' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\brand\\list.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120645660fe6a2356c1-51981397',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fe6a2cdaf2_18762804',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fe6a2cdaf2_18762804')) {function content_5660fe6a2cdaf2_18762804($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">品牌名称</th>                <th class="w40">显示</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','brand')">更新排序</button>    </div>    </form></div><?php }} ?>