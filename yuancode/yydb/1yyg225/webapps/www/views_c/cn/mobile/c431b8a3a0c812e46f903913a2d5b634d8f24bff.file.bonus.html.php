<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 20:51:02
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/bonus.html" */ ?>
<?php /*%%SmartyHeaderCode:132122365758762a362c3f94-93031564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c431b8a3a0c812e46f903913a2d5b634d8f24bff' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/bonus.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132122365758762a362c3f94-93031564',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58762a36315a72_53562603',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58762a36315a72_53562603')) {function content_58762a36315a72_53562603($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="list01 list-bonus">
        <dl class="item"></dl>
    </div>
    <div class="loading getMore"></div>
</div>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('.list-bonus').more({
            'address': '/member/bonus',
            'amount' : 10
        })
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>