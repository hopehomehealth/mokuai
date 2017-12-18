<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:06:54
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/goodscat/list.html" */ ?>
<?php /*%%SmartyHeaderCode:7725057555845201e221d58-59611239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd07220c902f241644838ed1d115b231e80f449f' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/goodscat/list.html',
      1 => 1460613202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7725057555845201e221d58-59611239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5845201e252285_23017057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5845201e252285_23017057')) {function content_5845201e252285_23017057($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w30">排序</th>                <th class="w30">ID</th>                <th align="left">分类名称</th>                <th class="w40">导航</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','goods_cat')">更新排序</button>    </div>    </form></div><?php }} ?>