<?php /* Smarty version Smarty-3.1.13, created on 2016-03-07 22:47:24
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\newbie\home.html" */ ?>
<?php /*%%SmartyHeaderCode:2787456dd947c180543-80319548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba83dcb38fec37a00ae97ed33e9af021f53c605b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\newbie\\home.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2787456dd947c180543-80319548',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56dd947c22aa29_69651483',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dd947c22aa29_69651483')) {function content_56dd947c22aa29_69651483($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container main">
    <div style="padding: 30px 0 0;font-size: 14px;text-align: center">抱歉，暂未开通！<a href="<?php echo url('/content/newbie');?>
" class="color02">访问电脑版</a> </div>
</div><?php }} ?>