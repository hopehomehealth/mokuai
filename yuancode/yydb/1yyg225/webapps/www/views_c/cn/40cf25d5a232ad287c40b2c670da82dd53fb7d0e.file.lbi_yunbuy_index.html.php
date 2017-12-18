<?php /* Smarty version Smarty-3.1.13, created on 2017-02-14 11:58:46
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/lbi_yunbuy_index.html" */ ?>
<?php /*%%SmartyHeaderCode:20373070405849035e606ac8-60417452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40cf25d5a232ad287c40b2c670da82dd53fb7d0e' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/lbi_yunbuy_index.html',
      1 => 1487044724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20373070405849035e606ac8-60417452',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5849035e6a7d23_57122099',
  'variables' => 
  array (
    'm' => 0,
    'pre' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5849035e6a7d23_57122099')) {function content_5849035e6a7d23_57122099($_smarty_tpl) {?><li>
    <div class="pic v scrollLoadingDiv"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>210,'height'=>180,'type'=>0),$_smarty_tpl);?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
<?php echo $_smarty_tpl->tpl_vars['pre']->value;?>
" /></a><span></span></div>
    <p class="title"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
    <p class="num">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次<?php if ($_smarty_tpl->tpl_vars['m']->value['price']>1){?><span class="zq_ico" style="float: right;"><?php echo num2char($_smarty_tpl->tpl_vars['m']->value['price']);?>
元<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_area'];?>
</span><?php }?></p>
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
            <div class="txt-r">
                <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                <p>剩余人次</p>
            </div>
        </div>
    </div>
    <div class="btn-go-box">
        <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>
        <a class="btn-go-green" href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','free')"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>
        <?php }else{ ?>
        <a class="btn-go" href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','buy')"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>
        <a class="btn-go btn-go-cart" href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','',this,'<?php echo $_smarty_tpl->tpl_vars['pre']->value;?>
')"></a>
        <?php }?>
    </div>
</li>
<?php }} ?>