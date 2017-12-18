<?php /* Smarty version Smarty-3.1.13, created on 2017-02-14 16:30:40
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/ajax_qishu.html" */ ?>
<?php /*%%SmartyHeaderCode:202500865848f5e230b596-09107719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6dc1508b51ffb2cf1d634e6d985d13fe5cba758' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/ajax_qishu.html',
      1 => 1487052357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202500865848f5e230b596-09107719',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5848f5e2401ab1_49533207',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5848f5e2401ab1_49533207')) {function content_5848f5e2401ab1_49533207($_smarty_tpl) {?><div class="m-detail-period-list f-clear">
    <ul class="list f-clear">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <!-- <li <?php if ($_GET['id']==$_smarty_tpl->tpl_vars['m']->value['buy_id']){?>class="curr"<?php }?>><a href="<?php if ($_GET['id']==$_smarty_tpl->tpl_vars['m']->value['buy_id']){?>javascript:void(0)<?php }else{ ?><?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
<?php }?>"></a></li> -->
        <?php } ?>
    </ul>
</div>
<div id="pro-view-3" class="w-pager w-pager-simple">
    <a class="w-button w-pager-prev w-button-aside <?php if ($_smarty_tpl->tpl_vars['page']->value['nonce']>1){?>demo<?php }else{ ?>w-button-disabled<?php }?>"  <?php echo $_smarty_tpl->tpl_vars['page']->value['prev'];?>
>上一页</a>
    <a class="w-button w-pager-next w-button-aside <?php if ($_smarty_tpl->tpl_vars['page']->value['nonce']<$_smarty_tpl->tpl_vars['page']->value['count']){?>demo<?php }else{ ?>w-button-disabled<?php }?>" <?php echo $_smarty_tpl->tpl_vars['page']->value['next'];?>
>下一页</a>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#qishu').find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"img",
            loadingMsg:"/style/images/transparent.gif",
            target:'#qishu'
        });
        $('#qishu').find('*[nc_type="sform"]').ajaxContent({
            event:'change', //mouseover
            loaderType:"img",
            loadingMsg:"/style/images/transparent.gif",
            target:'#qishu'
        });
    });
</script>
<?php }} ?>