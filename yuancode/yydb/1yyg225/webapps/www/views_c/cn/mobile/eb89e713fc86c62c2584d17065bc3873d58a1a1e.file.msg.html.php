<?php /* Smarty version Smarty-3.1.13, created on 2016-12-14 16:32:27
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/msg.html" */ ?>
<?php /*%%SmartyHeaderCode:13915683515851039b1d3e65-09724733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb89e713fc86c62c2584d17065bc3873d58a1a1e' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/msg.html',
      1 => 1481177921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13915683515851039b1d3e65-09724733',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'icon' => 0,
    'message' => 0,
    'link' => 0,
    'm' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5851039b235a08_32732525',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5851039b235a08_32732525')) {function content_5851039b235a08_32732525($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    if(top.location!=self.location){ top.location=self.location; }
</script>
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