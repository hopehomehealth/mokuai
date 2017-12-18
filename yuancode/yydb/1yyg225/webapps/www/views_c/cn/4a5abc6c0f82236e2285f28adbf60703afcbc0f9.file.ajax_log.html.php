<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 17:49:46
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\auction\ajax_log.html" */ ?>
<?php /*%%SmartyHeaderCode:4256565ebebada0850-27033800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a5abc6c0f82236e2285f28adbf60703afcbc0f9' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\auction\\ajax_log.html',
      1 => 1421804808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4256565ebebada0850-27033800',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565ebebae9a897_81189855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565ebebae9a897_81189855')) {function content_565ebebae9a897_81189855($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\projects\\web\\lnest\\1yyg225\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['logList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
<dl class="zj-list">
    <dt class="fn-left">
        <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['bid_user']));?>
#auc" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" alt="" /></a>
    </dt>
    <dd class="fn-left">
        <p>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['type']==1&&$_smarty_tpl->tpl_vars['key']->value==0&&($_GET['page']==1||!$_GET['page'])){?>
            <b class="color01">领先</b>
            <?php }?>
            <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['bid_user']));?>
#auc" target="_blank"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a>
            <?php if ($_smarty_tpl->tpl_vars['m']->value['first']==1){?><span class="bg-01">首次出价</span><?php }?> &nbsp;
            <i style="color: #999;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['bid_time'],'Y-m-d H:i:s');?>
</i>
        </p>
        <p>
            出价：<span class="color01"><?php if ($_smarty_tpl->tpl_vars['m']->value['bid_price']>0){?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bid_price']);?>
<?php }?></span>
            <?php if ($_smarty_tpl->tpl_vars['m']->value['paib']>0){?><span class="color02"><?php echo $_smarty_tpl->tpl_vars['m']->value['paib'];?>
拍币</span><?php }?> &nbsp;
            <?php if ($_smarty_tpl->tpl_vars['m']->value['first']==1){?>
            随机码：<span class="color02"><?php echo $_smarty_tpl->tpl_vars['m']->value['cod'];?>
</span> &nbsp;
            <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==0){?>
            <span>开奖日期：<?php echo $_smarty_tpl->tpl_vars['m']->value['kj_time'];?>
</span>
            <?php }else{ ?>
            <span>已开奖</span>
            <?php }?>
            <?php }?>
        </p>
    </dd>
    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']>0){?>
    <dd class="fn-right">
        <img src="/style/images/zj-ico.png" alt="" />
    </dd>
    <?php }?>
</dl>
<?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
<dl class="empty">暂无<?php if ($_smarty_tpl->tpl_vars['data']->value['status']=='cod'){?>中奖<?php }else{ ?>出价<?php }?>记录</dl>
<?php } ?>

<div style="clear:both"></div>
<?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    var ID = "<?php if ($_smarty_tpl->tpl_vars['data']->value['status']=='cod'){?>cod<?php }else{ ?>log<?php }?>";
    $(document).ready(function(){
        $('#'+ID).find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"拼命加载中...",
            target:'#'+ID
        });
    });
</script><?php }} ?>