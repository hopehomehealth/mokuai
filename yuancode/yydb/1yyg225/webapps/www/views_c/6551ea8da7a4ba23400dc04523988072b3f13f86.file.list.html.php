<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:29:46
         compiled from "F:\WWW\1yyg225\webapps\www\views\manage\goodscat\list.html" */ ?>
<?php /*%%SmartyHeaderCode:17846565fa91a0d7247-01405329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6551ea8da7a4ba23400dc04523988072b3f13f86' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\manage\\goodscat\\list.html',
      1 => 1418283576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17846565fa91a0d7247-01405329',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fa91a129524_94999551',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fa91a129524_94999551')) {function content_565fa91a129524_94999551($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form name="formlist" target="iframeNewsTarget" method="post" action="">
    <table class="list">
        <thead>
            <tr>
                <th class="w30">排序</th>
                <th class="w30">ID</th>
                <th align="left">分类名称</th>
                <th class="w40">导航</th>
                <th class="w100">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $_smarty_tpl->tpl_vars['data']->value['list'];?>

        </tbody>
    </table>

    <div class="foot-btn">
        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','goodscat')">更新排序</button>
    </div>
    </form>

</div>

<?php }} ?>