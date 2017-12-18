<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 18:30:19
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\minfo\load_share.html" */ ?>
<?php /*%%SmartyHeaderCode:24735661440067cea0-76307083%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c5f65b4dbd741cd0b8a1e2753d05f8f03929c64' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\minfo\\load_share.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24735661440067cea0-76307083',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566144007544a0_14993679',
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566144007544a0_14993679')) {function content_566144007544a0_14993679($_smarty_tpl) {?><div class="shareA container" style="padding:10px 15px; text-align:left">
    <a href="<?php echo url('/member/order');?>
"><img src="/style/images/shareB.png" /></a>
</div>
<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<div class="shareList" style="margin-top:0;">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <div class="item">
        <?php echo $_smarty_tpl->getSubTemplate ("content/lbi/list_share.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <?php } ?>
</div>
<div class="foot-btn"><?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
<?php }else{ ?>
<div class="prompt">该用户还没有晒单记录！</div>
<?php }?>
<script type="text/javascript">
    var load_div = '#load_share';
    $(document).ready(function(){
        $(load_div).find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"拼命加载中...",
            target:load_div
        }).bind('click',function(){
            $('html,body').animate({ scrollTop: '0px' }, 500);
        });
    });
</script><?php }} ?>