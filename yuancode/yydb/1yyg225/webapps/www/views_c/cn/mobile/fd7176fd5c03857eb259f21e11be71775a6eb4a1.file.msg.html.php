<?php /* Smarty version Smarty-3.1.13, created on 2016-04-19 11:40:23
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\msg.html" */ ?>
<?php /*%%SmartyHeaderCode:3272756ce71de6ddfb7-44571877%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd7176fd5c03857eb259f21e11be71775a6eb4a1' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\msg.html',
      1 => 1461036445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3272756ce71de6ddfb7-44571877',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce71de7ff232_37343589',
  'variables' => 
  array (
    'icon' => 0,
    'message' => 0,
    'link' => 0,
    'm' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce71de7ff232_37343589')) {function content_56ce71de7ff232_37343589($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="content" class="container main tc">
    <?php if ($_smarty_tpl->tpl_vars['icon']->value==3){?>
    <img src="/style/images/msg_3.png" style="max-width: 60%;margin: 30px auto 0;" />
    <?php }?>
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