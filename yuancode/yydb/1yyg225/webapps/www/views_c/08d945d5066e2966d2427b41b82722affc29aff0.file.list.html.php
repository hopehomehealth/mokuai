<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 13:10:05
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/mobilecat/list.html" */ ?>
<?php /*%%SmartyHeaderCode:9151003458452024d853a0-24066645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08d945d5066e2966d2427b41b82722affc29aff0' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/mobilecat/list.html',
      1 => 1481178229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9151003458452024d853a0-24066645',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58452024db11d8_40709877',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58452024db11d8_40709877')) {function content_58452024db11d8_40709877($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">分类名称</th>                <th class="w40">导航</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','mobilecat')">更新排序</button>    </div>    </form></div><?php }} ?>