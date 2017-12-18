<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 01:57:40
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/wxreply/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1092624376584af09404ce51-77872952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dae5116185263fa32e59758456606271ebac16b' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/wxreply/index.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1092624376584af09404ce51-77872952',
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
  'unifunc' => 'content_584af09408e8f1_27413117',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584af09408e8f1_27413117')) {function content_584af09408e8f1_27413117($_smarty_tpl) {?><h3 class="info-tag media-cate">
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