<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:56:36
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\yunbuy\lbi_yunbuy.html" */ ?>
<?php /*%%SmartyHeaderCode:2393956597a548efa43-89012709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37d8368e697d972064179bb540f2f8c127d46aa3' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\yunbuy\\lbi_yunbuy.html',
      1 => 1427103936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2393956597a548efa43-89012709',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56597a54980692_85223826',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56597a54980692_85223826')) {function content_56597a54980692_85223826($_smarty_tpl) {?><li class="w-quickBuyList-item">
    <?php if ($_smarty_tpl->tpl_vars['m']->value['member']==-1){?>
    <img class="sale_db" src="/style/images/member_db.png" style="right: 5px; top:5px;" />
    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['notjoin']==1){?>
    <img class="sale_db" src="/style/images/nxdb.png" style="right: 5px; top:5px;" />
    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['buynum']>0||$_smarty_tpl->tpl_vars['m']->value['usernum']>0){?>
    <img class="sale_db" src="/style/images/sale_db.png" style="right: 5px; top:5px;" />
    <?php }?>

    <div class="w-goods w-goods-l w-goods-ing">
        <div class="w-goods-pic scrollLoadingDiv">
            <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">
                <img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>250,'height'=>150,'type'=>0),$_smarty_tpl);?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" />
            </a></div>
        <p class="w-goods-title f-txtabb">
            <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><span class="color01">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span> <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
        <p class="w-goods-price">总需 <?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次</p>
        <div class="w-progressBar" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%">
            <p class="w-progressBar-wrap"><span class="w-progressBar-bar" style="width: <?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%;"></span></p>
            <ul class="w-progressBar-txt f-clear">
                <li class="w-progressBar-txt-l">
                    <p><b class="color01 ft18 fwb"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b></p>
                    <p>已参与人次</p>
                </li>
                <li class="color03" style="text-align: center;  width: 70px;">
                    <p class="ft18 fwb"><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</p>
                    <p>总需人次</p>
                </li>
                <li class="w-progressBar-txt-r">
                    <p><b class="color02 ft18 fwb"><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                    <p>剩余人次</p>
                </li>
            </ul>
        </div>
        <p class="w-goods-progressHint"><b class="txt-blue">
            2739</b>人次已参与，赶快去参加吧！剩余<b class="txt-red"><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b>人次
        </p>
        <div class="w-goods-opr">
            我要参与：
            <div class="w-goods-opr-number">
                <div id="pro-view-3" class="w-number w-number-inline">
                    <input class="w-number-input" id="qty_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" data-max="<?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
" value="10">
                    <a class="w-number-btn w-number-btn-plus" href="javascript:void(0);">+</a>
                    <a class="w-number-btn w-number-btn-minus" href="javascript:void(0);">-</a> </div>
            </div>
            人次
            <p class="w-goods-opr-buy">
                <a class="w-button w-button-main w-button-l" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','buy');" href="javascript:;" style="width: 90px;">立即夺宝</a>
                <a class="w-button w-button-l" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','',this)" href="javascript:;" style="width:90px;">加入购物车</a> </p>
        </div>
    </div>
</li><?php }} ?>