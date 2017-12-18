<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:12:29
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\manage\upload\image\box.html" */ ?>
<?php /*%%SmartyHeaderCode:13241565d809daa9478-08380792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75992eb7c82eb47a09098fd0ba0f42f874247bb4' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\manage\\upload\\image\\box.html',
      1 => 1433937311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13241565d809daa9478-08380792',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d809dad4400_21912824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d809dad4400_21912824')) {function content_565d809dad4400_21912824($_smarty_tpl) {?><div class="xwin-box">    <a class="sprite close e2-upload-hidebox" href="" hidefocus="true"></a>    <div class="e-drag">选择图片</div>    <div class="xHtml">        <div class="iTab e1-com-iTab clear" id="imglib-box">            <a href="javascript:;" class="tab-btn e0-upload-showUp">上传图片</a>            <a href="javascript:;" class="tab-btn on e0-upload-imglib">图库</a>        </div>        <div class="tab-mod imgSeler imgUpBox" id="ubox_2"></div>        <div class="tab-mod imgSeler imgSelBox" style="display:block">            <div id="galleryBox">                <?php echo $_smarty_tpl->getSubTemplate ('manage/upload/image/list.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
            </div>            <div class="check inblock">                <a class="uiBtn btn-cancel e2-upload-hidebox" href="javascript:;">取&nbsp;消</a>                <a class="uiBtn btn-true btnFocus e1-upload-getCheckedItem" href="javascript:;">确&nbsp;认</a>            </div>        </div>    </div></div><?php }} ?>