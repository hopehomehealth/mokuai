<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:51:23
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\minfo\load_dbCod.html" */ ?>
<?php /*%%SmartyHeaderCode:19322565d89bbd2be20-56401668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1713de02278a7b74309a510123d461b121739246' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\minfo\\load_dbCod.html',
      1 => 1428991152,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19322565d89bbd2be20-56401668',
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
  'unifunc' => 'content_565d89bbdd7c54_27870396',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d89bbdd7c54_27870396')) {function content_565d89bbdd7c54_27870396($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'E:\\projects\\web\\lnest\\1yyg225\\system\\smarty\\plugins\\modifier.truncate.php';
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
            <p class="w-goods-info">价值：<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['g_price']);?>
</p>
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
<div class="m-blank">该用户还没有夺宝中奖记录！</div>
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