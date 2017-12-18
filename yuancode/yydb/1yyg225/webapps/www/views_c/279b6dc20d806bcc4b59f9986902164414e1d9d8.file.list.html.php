<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 15:33:54
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\mobilecat\list.html" */ ?>
<?php /*%%SmartyHeaderCode:1301356ceae629c25b3-56272894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '279b6dc20d806bcc4b59f9986902164414e1d9d8' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\mobilecat\\list.html',
      1 => 1456385624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1301356ceae629c25b3-56272894',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ceae62a68075_34315081',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ceae62a68075_34315081')) {function content_56ceae62a68075_34315081($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w40">排序</th>                <th class="w30">ID</th>                <th align="left">分类名称</th>                <th class="w40">导航</th>                <th class="w100">操作</th>            </tr>        </thead>        <tbody>            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>
        </tbody>    </table>    <div class="foot-btn">        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','yuncat')">更新排序</button>    </div>    </form></div><?php }} ?>