<?php /* Smarty version Smarty-3.1.13, created on 2016-03-07 21:04:30
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\detail_win.html" */ ?>
<?php /*%%SmartyHeaderCode:1212056dd7c5e0dc722-67338883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6285313922e8d3b202cb0259fe14a50fdb997d27' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\detail_win.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1212056dd7c5e0dc722-67338883',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56dd7c5e18a6f4_26674982',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dd7c5e18a6f4_26674982')) {function content_56dd7c5e18a6f4_26674982($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container detail">
    <ul class="win-list" id="win"></ul>
    <div class="loading getMore_win"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/mobile/js/jquery-pageload.js"></script>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    var type='win';
    $('#'+type).pageload({
        url: '/yunbuy/ajax_'+type,
        param: 'id=<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
',
        trigger: '.getMore_'+type
    });
</script>
<?php }} ?>