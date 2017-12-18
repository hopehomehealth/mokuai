<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:47:43
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\category\list.html" */ ?>
<?php /*%%SmartyHeaderCode:212935660f87fae7a97-32528860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db16f8677b4afaac3970e68ad4a53274ba51743b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\category\\list.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212935660f87fae7a97-32528860',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f87fb88d34_64429610',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f87fb88d34_64429610')) {function content_5660f87fb88d34_64429610($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">栏目名称</th>                <th class="w80">所属模型</th>                <th class="w40">导航</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','category')">更新排序</button>    </div>    </form></div><?php }} ?>