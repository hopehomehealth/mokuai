<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:50:05
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\wxreply\index.html" */ ?>
<?php /*%%SmartyHeaderCode:770756ce6bdd8e82e9-07328475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60afe3e7f521e632646964143cd700c4a96729f3' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\wxreply\\index.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '770756ce6bdd8e82e9-07328475',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'data' => 0,
    'msg_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce6bdd9e5942_41290646',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce6bdd9e5942_41290646')) {function content_56ce6bdd9e5942_41290646($_smarty_tpl) {?><h3 class="info-tag media-cate">
    <a class="tab-btn<?php if ($_smarty_tpl->tpl_vars['type']->value=='subscribe'){?> on<?php }?>" href="#!wxreply/subscribe">被关注自动回复
        <b class="z1">◆</b><b class="z0">◆</b>
    </a>
    <a class="tab-btn<?php if ($_smarty_tpl->tpl_vars['type']->value=='autoreply'){?> on<?php }?>" href="#!wxreply/autoreply">消息自动回复
        <b class="z1">◆</b><b class="z0">◆</b>
    </a>
    <a class="tab-btn<?php if ($_smarty_tpl->tpl_vars['type']->value=='normal'){?> on<?php }?>" href="#!wxreply/smartreply">关键词自动回复
        <b class="z1">◆</b><b class="z0">◆</b>
    </a>
    <span></span>
</h3>




<style type="text/css">
</style>

<div class="html-box">

    <div class="wxeditor" style="padding-top:10px">
        <div id="wxeditor"></div>
        <div class="f-unit" style="text-align:right">
            <input type="hidden" name="reply_type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
" id="reply_type" />
            <a href="javascript:;" class="uiBtn BtnGreen e2-wxmenu-saveAutoReply">保&nbsp;存</a>
        </div>
    </div>

    <div class="clear"></div>
</div>
<script type="text/javascript">
$.loadJs('/admin/js/manage/wxreply.js',function(){
$.loadJs('/admin/js/manage/wxmenu.js',function(){
    wxmenu.createWxEditor('wxeditor',{
        data:'<?php echo $_smarty_tpl->tpl_vars['data']->value;?>
',
        type:'<?php echo $_smarty_tpl->tpl_vars['msg_type']->value;?>
'
    });
});
});
</script>

<?php }} ?>