<?php /* Smarty version Smarty-3.1.13, created on 2016-03-15 10:12:56
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\lbi\list_buy.html" */ ?>
<?php /*%%SmartyHeaderCode:1078156e76fa8b1f320-02910882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93c586056f4befbc0aa20447269fde49112bee7c' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\lbi\\list_buy.html',
      1 => 1456976273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1078156e76fa8b1f320-02910882',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56e76fa8cca161_01567259',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e76fa8cca161_01567259')) {function content_56e76fa8cca161_01567259($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<li class="ui-clr">
    <div class="pic">
        <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src']),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" /></a>
    </div>
    <div class="info">
        <p class="title"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
        <p class="price">价格：<b><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['custom_price']);?>
</b></p>
    </div>
    <button class="add-btn" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>free<?php }?>',this)"><span class="ap-icon icon-cart"></span></button>
</li>
<?php } ?><?php }} ?>