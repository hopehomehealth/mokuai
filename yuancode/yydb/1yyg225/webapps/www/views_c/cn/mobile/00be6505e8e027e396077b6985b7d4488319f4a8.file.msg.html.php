<?php /* Smarty version Smarty-3.1.13, created on 2015-12-09 11:43:54
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\msg.html" */ ?>
<?php /*%%SmartyHeaderCode:20336565fa9e662a711-24958648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00be6505e8e027e396077b6985b7d4488319f4a8' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\msg.html',
      1 => 1449221298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20336565fa9e662a711-24958648',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fa9e66a81d6_22453838',
  'variables' => 
  array (
    'message' => 0,
    'link' => 0,
    'm' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fa9e66a81d6_22453838')) {function content_565fa9e66a81d6_22453838($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="content" class="container main tc">
    <div class="empty"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['link']->value){?>
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['link'];?>
" class="color02" style="margin:0 5px;font-size:14px;"><?php echo $_smarty_tpl->tpl_vars['m']->value['text'];?>
</a>
    <?php } ?>
    <?php }else{ ?>
    <script type="text/javascript">
        setTimeout(function(){ location.href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
' },3*1000);
    </script>
    <?php }?>
</div><?php }} ?>