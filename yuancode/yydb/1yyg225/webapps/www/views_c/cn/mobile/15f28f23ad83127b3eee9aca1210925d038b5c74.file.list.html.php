<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 16:31:32
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/lbi/list.html" */ ?>
<?php /*%%SmartyHeaderCode:172123842558451d3a4bbf06-71321572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15f28f23ad83127b3eee9aca1210925d038b5c74' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/yunbuy/lbi/list.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172123842558451d3a4bbf06-71321572',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451d3a4f0258_46490096',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451d3a4f0258_46490096')) {function content_58451d3a4f0258_46490096($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
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
">（第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期）<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
        <p class="price">总需<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
人次<?php if ($_smarty_tpl->tpl_vars['m']->value['price']>1){?><span class="zq_ico" style="margin-left: 10px;"><?php echo num2char($_smarty_tpl->tpl_vars['m']->value['price']);?>
元<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_area'];?>
</span><?php }?></p>
        <div class="progressBar">
            <p class="wrap-bar">
                <span class="bar" style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num']/$_smarty_tpl->tpl_vars['m']->value['need_num']*100;?>
%"></span>
            </p>
            <div class="txt ui-clr">
                <span class="ui-left"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
人已参与</span>
                <span class="ui-right">剩余<?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</span>
            </div>
        </div>
    </div>
    <button class="add-btn" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>free<?php }?>',this)"><span class="ap-icon icon-cart"></span></button>
</li>
<?php } ?><?php }} ?>