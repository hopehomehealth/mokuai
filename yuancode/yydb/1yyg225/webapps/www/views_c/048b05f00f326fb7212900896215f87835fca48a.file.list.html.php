<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:06:58
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/yuncat/list.html" */ ?>
<?php /*%%SmartyHeaderCode:95065542158452022f25698-10921096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '048b05f00f326fb7212900896215f87835fca48a' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/yuncat/list.html',
      1 => 1468926724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95065542158452022f25698-10921096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58452023015932_35001000',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58452023015932_35001000')) {function content_58452023015932_35001000($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<link type="text/css" rel="stylesheet" href="/style/theme_01/fontYC/iconfontYC.css"><div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">分类名称</th>                <th class="w40">导航</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','yuncat')">更新排序</button>    </div>    </form></div><?php }} ?>