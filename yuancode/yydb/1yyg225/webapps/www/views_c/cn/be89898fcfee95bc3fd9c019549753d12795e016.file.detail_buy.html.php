<?php /* Smarty version Smarty-3.1.13, created on 2016-03-03 13:43:46
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\yunbuy\detail_buy.html" */ ?>
<?php /*%%SmartyHeaderCode:423756d7cf12dc4ed6-13475061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be89898fcfee95bc3fd9c019549753d12795e016' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\yunbuy\\detail_buy.html',
      1 => 1456976273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '423756d7cf12dc4ed6-13475061',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'm' => 0,
    'from' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d7cf130f2d67_66518692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d7cf130f2d67_66518692')) {function content_56d7cf130f2d67_66518692($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

">
">
" type="text/javascript"></script>
" type="text/javascript"></script>

 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['m']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->index++;
 $_smarty_tpl->tpl_vars['m']->first = $_smarty_tpl->tpl_vars['m']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['first'] = $_smarty_tpl->tpl_vars['m']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']++;
?>
"<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pics']['first']){?> id="buy_img_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
"<?php }?> /><span></span>
 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['m']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->index++;
 $_smarty_tpl->tpl_vars['m']->first = $_smarty_tpl->tpl_vars['m']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['first'] = $_smarty_tpl->tpl_vars['m']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pics']['iteration']++;
?>
"><span></span>

"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</h3>
</span></span>
" target="_blank" class="color04"><?php echo $_smarty_tpl->tpl_vars['from']->value[0];?>
</a> <i style="color: #999">（采购平台价格会有上下浮动）</i><?php }?></span>
" data-max="<?php echo $_smarty_tpl->tpl_vars['row']->value['end_num'];?>
" style="color: black" value="1">
,'buy')" style="width: 105px">立即购买</a>
','',this)" style="width: 112px"><i class="ico ico-miniCart"></i>加入购物车</a>
" target="_blank">公平公正公开</a></li>
" target="_blank">正品保证</a></li>
" target="_blank">权益保障</a></li>

<?php }} ?>