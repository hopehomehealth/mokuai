<?php /* Smarty version Smarty-3.1.13, created on 2016-04-01 12:01:55
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\minfo\load_dbCod.html" */ ?>
<?php /*%%SmartyHeaderCode:634656610d02a5d9a1-59670475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c30ef2accfd30dc04ba65caa53f7581ff2c6c70' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\minfo\\load_dbCod.html',
      1 => 1459251776,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '634656610d02a5d9a1-59670475',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610d02c202f4_19233758',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610d02c202f4_19233758')) {function content_56610d02c202f4_19233758($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.truncate.php';
?><?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<ul class="w-goodsList fn-clear">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
    <li class="w-goodsList-item <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration']%3==0){?>last<?php }?>">
        <div class="w-goods">
            <div class="w-goods-pic v scrollLoadingDiv">
                <a title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" target="_blank" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>230,'height'=>142,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
"></a><span></span>
            </div>
            <p class="w-goods-title"><a title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" target="_blank" href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['goods_name'],50,'');?>
</a></p>
            <p class="w-goods-info">价值：<?php if ($_smarty_tpl->tpl_vars['m']->value['goods_price']){?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['goods_price']);?>
<?php }else{ ?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['g_price']);?>
<?php }?></p>
            <p class="w-goods-info">幸运号码：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</span></p>
            <p class="w-goods-info">总共参与：<span><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</span>人次</p>
            <p class="w-goods-info">揭晓时间：<span style="font-size: 13px;"><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['end_time']);?>
</span></p>
        </div>
    </li>
    <?php } ?>
</ul>
<div class="foot-btn fn-clear"><?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
<?php }else{ ?>
<div class="m-blank">该用户还没有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
记录！</div>
<?php }?>

<script type="text/javascript">
    var load_div = '#load_dbCod';
    $(document).ready(function(){
        $(load_div).find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"拼命加载中...",
            target:load_div,
            success:function(){
                scrollLoading();
            }
        }).bind('click',function(){
            $('html,body').animate({ scrollTop: '400px' }, 500);
        });
    })

    $('.w-goodsList-item').bind('mouseover',function(){
        $(this).addClass('hover');
    }).bind('mouseout',function(){
        $(this).removeClass('hover');
    })
</script><?php }} ?>