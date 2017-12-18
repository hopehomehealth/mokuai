<?php /* Smarty version Smarty-3.1.13, created on 2016-03-02 13:42:44
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\detail_share.html" */ ?>
<?php /*%%SmartyHeaderCode:1928156d67d54511127-39537186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96b72b80ed1f3ec18a6490f84105453a639566c1' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\detail_share.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1928156d67d54511127-39537186',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d67d545fccd4_86176092',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d67d545fccd4_86176092')) {function content_56d67d545fccd4_86176092($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container detail">
    <div class="shareList" style="padding: 0">
        <div class="item"></div>
    </div>
    <div class="loading getMore"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/mobile/js/jquery-pageload.js"></script>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $('.shareList').more({
        'address': '/content/share_ajax/all?goods_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['goods_id'];?>
&type=db',
        'amount' : 10
    })
</script>
<?php }} ?>