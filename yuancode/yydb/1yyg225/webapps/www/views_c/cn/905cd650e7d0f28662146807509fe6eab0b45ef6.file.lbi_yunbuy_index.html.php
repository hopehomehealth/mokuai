<?php /* Smarty version Smarty-3.1.13, created on 2016-04-20 16:12:45
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\yunbuy\lbi_yunbuy_index.html" */ ?>
<?php /*%%SmartyHeaderCode:23478571480959c6716-46101735%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '905cd650e7d0f28662146807509fe6eab0b45ef6' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\yunbuy\\lbi_yunbuy_index.html',
      1 => 1461139958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23478571480959c6716-46101735',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57148095a40832_38391701',
  'variables' => 
  array (
    'm' => 0,
    'pre' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57148095a40832_38391701')) {function content_57148095a40832_38391701($_smarty_tpl) {?><li>
    <div class="pic v scrollLoadingDiv"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>210,'height'=>180,'type'=>0),$_smarty_tpl);?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
<?php echo $_smarty_tpl->tpl_vars['pre']->value;?>
" /></a><span></span></div>
    <p class="title"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
    <p class="num">价值：￥<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_price'];?>
 人次</p>
    <div class="progressBar">
        <p class="progressBar-wrap">
            <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%"></span>
        </p>
        <div class="progressBar-txt">
            <div class="txt-l">
                <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b></p>
                <p>已参与人次</p>
            </div>
            <div class="txt-c" style="padding-left: 5px;">
                <p class="color03"><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</p>
                <p>总需人数</p>
            </div>
            <div class="txt-r">
                <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                <p>剩余人次</p>
            </div>
        </div>
    </div>
    <div class="btn-go-box">
        <a class="btn-go" href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','buy')"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>
        <a class="btn-go btn-go-cart" href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','',this,'<?php echo $_smarty_tpl->tpl_vars['pre']->value;?>
')"></a>
    </div>
</li><?php }} ?>