<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:36:24
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/upload/image/box.html" */ ?>
<?php /*%%SmartyHeaderCode:190712048258452708c25212-13925338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aebae5a1deec9fece1f7ba12093d210721f3dad4' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/upload/image/box.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190712048258452708c25212-13925338',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58452708d83960_60989820',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58452708d83960_60989820')) {function content_58452708d83960_60989820($_smarty_tpl) {?><div class="xwin-box">    <a class="sprite close e2-upload-hidebox" href="" hidefocus="true"></a>    <div class="e-drag">选择图片</div>    <div class="xHtml">        <div class="iTab e1-com-iTab clear" id="imglib-box">            <a href="javascript:;" class="tab-btn e0-upload-showUp">上传图片</a>            <a href="javascript:;" class="tab-btn on e0-upload-imglib">图库</a>        </div>        <div class="tab-mod imgSeler imgUpBox" id="ubox_2"></div>        <div class="tab-mod imgSeler imgSelBox" style="display:block">            <div id="galleryBox">                <?php echo $_smarty_tpl->getSubTemplate ('manage/upload/image/list.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
            </div>            <div class="check inblock">                <a class="uiBtn btn-cancel e2-upload-hidebox" href="javascript:;">取&nbsp;消</a>                <a class="uiBtn btn-true btnFocus e1-upload-getCheckedItem" href="javascript:;">确&nbsp;认</a>            </div>        </div>    </div></div><?php }} ?>