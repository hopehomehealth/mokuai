<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 18:30:18
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\minfo\load_dbCod.html" */ ?>
<?php /*%%SmartyHeaderCode:25314566142de273e64-44492639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c629088fd719990068c607cd15f2387593d783d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\minfo\\load_dbCod.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25314566142de273e64-44492639',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566142de3f21a6_53228379',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566142de3f21a6_53228379')) {function content_566142de3f21a6_53228379($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<div class="list01 list-luck">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <dl class="item ui-clr">
        <dt class="ui-clr">
            <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><span class="type-free">霸王餐区</span> <?php }?><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" class="color00"><span class="color01">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span> <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a>
        </dt>
        <dd>
            <div class="db-img"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>120,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
" /></a></div>
            <div class="db-txt color03">
                <p>总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>人次<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<?php }?></p>
                <p>幸运号码：<strong class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</strong></p>
                <p>总共参与：<?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</p>
                <p>揭晓时间：<?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['end_time'],'Y-m-d H:i:s.x');?>
</p>
            </div>
        </dd>
    </dl>
    <?php } ?>
</div>
<div class="foot-btn"><?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
<?php }else{ ?>
<div class="prompt">该用户还没有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
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
            target:load_div
        }).bind('click',function(){
            $('html,body').animate({ scrollTop: '0px' }, 500);
        });
    })
</script><?php }} ?>