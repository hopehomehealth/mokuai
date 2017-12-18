<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 10:55:13
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\yunbuy\ajax_share.html" */ ?>
<?php /*%%SmartyHeaderCode:18042565e5d918f2048-73249241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cad34e7822b30dc7fd4d21f97925e5c087e53bd' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\yunbuy\\ajax_share.html',
      1 => 1432259000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18042565e5d918f2048-73249241',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    't' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e5d91a08f62_99539942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e5d91a08f62_99539942')) {function content_565e5d91a08f62_99539942($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'F:\\WWW\\1yyg225\\system\\smarty\\plugins\\modifier.truncate.php';
?><?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<div class="content" style="">
    <ul class="m-detail-shareList-list">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <li>
            <div class="m-detail-shareList-author">
                <a class="avatar" href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
" target="_blank"><img height="90" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo']),$_smarty_tpl);?>
" width="90"></a>
                <a class="nickname f-txtabb" href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></div>
            <div class="m-detail-shareList-detail">
                <i class="ico ico-arrow ico-arrow-grayShareArr"></i>
                <div class="titleWrap">
                    <span class="date"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</span><span class="title">第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期晒单<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#share#vid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" target="_blank"><b><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</b></a></span></div>
                <div class="contentWrap">
                    <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#share#vid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['content'],120);?>
</a></div>
                <div class="imgWrap">
                    <?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = unserialize($_smarty_tpl->tpl_vars['m']->value['thumbs']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                    <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#share#vid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" target="_blank">
                        <div style="display: table-cell; writing-mode: tb-rl; height: 140px; line-height: 140px; vertical-align: middle"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['t']->value),$_smarty_tpl);?>
" width="140"></div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </li>
        <?php } ?>
    </ul>
    <?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }else{ ?>
<div class="empty"><p class="status-empty"><i class="littleU littleU-cry"></i>&nbsp;&nbsp;暂时还没有任何晒单</p></div>
<?php }?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#sharePanel').find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"img",
            loadingMsg:"/style/images/transparent.gif",
            target:'#sharePanel'
        });
        $('#sharePanel').find('*[nc_type="sform"]').ajaxContent({
            event:'change', //mouseover
            loaderType:"img",
            loadingMsg:"/style/images/transparent.gif",
            target:'#sharePanel'
        });
    });
</script>
<?php }} ?>