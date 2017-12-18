<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 17:30:42
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\auction\lbi_auction.html" */ ?>
<?php /*%%SmartyHeaderCode:27466565eba4298fb56-79520871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cc5651b38b8a53a2b0969369ea4d315e96a92e9' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\auction\\lbi_auction.html',
      1 => 1422425004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27466565eba4298fb56-79520871',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'auction' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565eba42adfaa8_26150346',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565eba42adfaa8_26150346')) {function content_565eba42adfaa8_26150346($_smarty_tpl) {?><li class="aucli">
    <div class="img scrollLoadingDiv"><a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['auction']->value['imgurl_src'],'width'=>$_smarty_tpl->tpl_vars['auction']->value['imgw'],'height'=>$_smarty_tpl->tpl_vars['auction']->value['imgh'],'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
" /></a></div>
    <h2><a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
</a></h2>

    <?php if ($_smarty_tpl->tpl_vars['auction']->value['cat_type']=='tiyan'){?>
    <div class="tj-jg">
        <b>价值</b>
        <b><?php echo price_format($_smarty_tpl->tpl_vars['auction']->value['price']);?>
</b>
        <?php if ($_smarty_tpl->tpl_vars['auction']->value['paib']){?>
        仅需<b class="color01"><?php echo $_smarty_tpl->tpl_vars['auction']->value['paib'];?>
<em><a href="<?php echo url('/content/tiyan');?>
" title="做任务，赚拍币" target="_blank">拍币</a></em></b>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['auction']->value['current_price']>0){?>
        当前价<b class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['auction']->value['current_price']);?>
</b>
        <?php }?>
    </div>
    <?php }else{ ?>
    <div class="tj-jg">
        <strong class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['auction']->value['current_price']);?>
</strong>
        <span><?php echo price_format($_smarty_tpl->tpl_vars['auction']->value['price']);?>
</span>
        <?php if ($_smarty_tpl->tpl_vars['auction']->value['paib']){?>
        <b class="color01"><?php echo $_smarty_tpl->tpl_vars['auction']->value['paib'];?>
<em><a href="<?php echo url('/content/tiyan');?>
" title="做任务，赚拍币" target="_blank">拍币</a></em></b>
        <?php }?>
    </div>
    <?php }?>

    <div class="tj-zjl">
        <?php if ($_smarty_tpl->tpl_vars['auction']->value['cat_type']=='tiyan'){?>体验<?php }?>中奖率：<span><?php echo $_smarty_tpl->tpl_vars['auction']->value['win'];?>
%</span>，
        已有<span class="color01"><?php echo $_smarty_tpl->tpl_vars['auction']->value['bid_user_count'];?>
</span>人<?php if ($_smarty_tpl->tpl_vars['auction']->value['cat_type']=='tiyan'){?>免费<?php }?>参与
    </div>

    <?php if ($_smarty_tpl->tpl_vars['auction']->value['status']<@constant('FINISHED')){?>
    <div class="p4"><?php if ($_smarty_tpl->tpl_vars['auction']->value['status']==@constant('PRE_START')){?>即将开始<?php }else{ ?>剩余<?php }?>：<i id="leftTime<?php echo $_smarty_tpl->tpl_vars['auction']->value['act_id'];?>
<?php echo $_smarty_tpl->tpl_vars['auction']->value['key'];?>
">请稍等, 载入中...</i></div>
    <script type="text/javascript">
        onload_leftTime('<?php echo $_smarty_tpl->tpl_vars['auction']->value['act_id'];?>
<?php echo $_smarty_tpl->tpl_vars['auction']->value['key'];?>
',"<?php echo $_smarty_tpl->tpl_vars['auction']->value['diff_time'];?>
","<?php echo $_smarty_tpl->tpl_vars['auction']->value['status'];?>
");
    </script>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['auction']->value['status']==@constant('PRE_START')){?>
    <div class="btn-qg btn-jjts fn-clear">
        <a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
" target="_blank">即将推出</a>
    </div>
    <?php }elseif($_smarty_tpl->tpl_vars['auction']->value['status']==@constant('UNDER_WAY')){?>
    <div class="btn-qg fn-clear">
        <a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
" target="_blank">抢拍</a>
    </div>
    <?php }else{ ?>
    <div class="btn-qg btn-lscj fn-clear">
        <span class="fn-left jp-jsl">已经结束</span>
        <a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
" target="_blank">去看看</a>
    </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['auction']->value['win']>0){?>
    <div class="winz <?php if ($_smarty_tpl->tpl_vars['auction']->value['user']==1){?>winzUser<?php }?>"><i><?php echo $_smarty_tpl->tpl_vars['auction']->value['win'];?>
<span>%</span></i></div>
    <?php }?>
</li><?php }} ?>