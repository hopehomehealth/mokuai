<?php /* Smarty version Smarty-3.1.13, created on 2016-03-01 10:02:04
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\detail_join.html" */ ?>
<?php /*%%SmartyHeaderCode:38656d4f81c864138-53529897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f85c4f724bba460ab23579627f842513d918c78f' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\detail_join.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38656d4f81c864138-53529897',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d4f81c9cc849_68961657',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d4f81c9cc849_68961657')) {function content_56d4f81c9cc849_68961657($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
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