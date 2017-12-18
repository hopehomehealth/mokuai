<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 16:17:04
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/detail_join.html" */ ?>
<?php /*%%SmartyHeaderCode:1095181444585797807592f9-61965432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c65b38163fe3f87d485fb0ec8d8b68171307689' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/detail_join.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1095181444585797807592f9-61965432',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_585797807e4512_01251243',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585797807e4512_01251243')) {function content_585797807e4512_01251243($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container detail">
    <div class="record" id="join">
        <div class="t-clock"><span class="ap-icon icon-clock"></span></div>
    </div>
    <div class="loading getMore_join"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/mobile/js/jquery-pageload.js"></script>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    var type='join';
    $('#'+type).pageload({
        url: '/yunbuy/ajax_'+type,
        param: 'id=<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
',
        trigger: '.getMore_'+type
    });
</script>
<?php }} ?>