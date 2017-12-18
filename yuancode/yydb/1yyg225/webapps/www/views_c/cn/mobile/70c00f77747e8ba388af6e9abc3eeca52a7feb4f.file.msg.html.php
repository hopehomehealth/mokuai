<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 17:11:22
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\mobile\msg.html" */ ?>
<?php /*%%SmartyHeaderCode:31038565eb5ba646742-35838775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70c00f77747e8ba388af6e9abc3eeca52a7feb4f' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\mobile\\msg.html',
      1 => 1422381080,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31038565eb5ba646742-35838775',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'link' => 0,
    'm' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565eb5ba6a4367_01782220',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565eb5ba6a4367_01782220')) {function content_565eb5ba6a4367_01782220($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="content" class="container main">
    <div class="empty"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['link']->value){?>
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['link'];?>
" class="color02" style="margin:0 5px;font-size:12px;"><?php echo $_smarty_tpl->tpl_vars['m']->value['text'];?>
</a>
    <?php } ?>
    <?php }else{ ?>
    <script type="text/javascript">
        setTimeout(function(){ location.href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
' },3*1000);
    </script>
    <?php }?>
</div><?php }} ?>