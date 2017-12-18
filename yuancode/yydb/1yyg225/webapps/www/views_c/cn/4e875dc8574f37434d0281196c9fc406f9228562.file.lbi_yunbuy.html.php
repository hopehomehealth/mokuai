<?php /* Smarty version Smarty-3.1.13, created on 2017-02-21 17:36:08
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/lbi_yunbuy.html" */ ?>
<?php /*%%SmartyHeaderCode:8598643925848f5d0c254c9-54681648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e875dc8574f37434d0281196c9fc406f9228562' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/lbi_yunbuy.html',
      1 => 1487069972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8598643925848f5d0c254c9-54681648',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5848f5d0d124c8_86299234',
  'variables' => 
  array (
    'm' => 0,
    'L' => 0,
    'site_config' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5848f5d0d124c8_86299234')) {function content_5848f5d0d124c8_86299234($_smarty_tpl) {?><li class="w-quickBuyList-item">
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
            <!-- <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><span class="color01">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span> <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p> -->
            <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><span class="color01"></span> <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
        <p class="w-goods-price">总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次<?php if ($_smarty_tpl->tpl_vars['m']->value['price']>1){?><span class="zq_ico" style="float: right;"><?php echo num2char($_smarty_tpl->tpl_vars['m']->value['price']);?>
元<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_area'];?>
</span><?php }?></p>
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
" value="<?php echo intval($_smarty_tpl->tpl_vars['site_config']->value['qty']);?>
">
                    <a class="w-number-btn w-number-btn-plus" href="javascript:void(0);">+</a>
                    <a class="w-number-btn w-number-btn-minus" href="javascript:void(0);">-</a> </div>
            </div>
            人次
            <p class="w-goods-opr-buy">
                <?php if ($_smarty_tpl->tpl_vars['type']->value==2){?>
                <a class="w-button w-button-main w-button-l" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','free');" href="javascript:;" style="width: 90px;background: #1FB89A !important">免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a>
                <?php }else{ ?>
                <a class="w-button w-button-main w-button-l" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','buy');" href="javascript:;" style="width: 90px;"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_button'];?>
</a>
                <a class="w-button w-button-l" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','',this)" href="javascript:;" style="width:90px;">加入购物车</a> </p>
                <?php }?>
        </div>
    </div>
</li>
<?php }} ?>