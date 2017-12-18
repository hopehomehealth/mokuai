<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:19:49
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\upload\image\box.html" */ ?>
<?php /*%%SmartyHeaderCode:23177565971b5743b91-57966913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '705506761fee4e38352d320c10c5de2fe0e3144e' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\upload\\image\\box.html',
      1 => 1433937311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23177565971b5743b91-57966913',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565971b57929d7_72201505',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565971b57929d7_72201505')) {function content_565971b57929d7_72201505($_smarty_tpl) {?><div class="xwin-box">    <a class="sprite close e2-upload-hidebox" href="" hidefocus="true"></a>    <div class="e-drag">选择图片</div>    <div class="xHtml">        <div class="iTab e1-com-iTab clear" id="imglib-box">            <a href="javascript:;" class="tab-btn e0-upload-showUp">上传图片</a>            <a href="javascript:;" class="tab-btn on e0-upload-imglib">图库</a>        </div>        <div class="tab-mod imgSeler imgUpBox" id="ubox_2"></div>        <div class="tab-mod imgSeler imgSelBox" style="display:block">            <div id="galleryBox">                <?php echo $_smarty_tpl->getSubTemplate ('manage/upload/image/list.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
            </div>            <div class="check inblock">                <a class="uiBtn btn-cancel e2-upload-hidebox" href="javascript:;">取&nbsp;消</a>                <a class="uiBtn btn-true btnFocus e1-upload-getCheckedItem" href="javascript:;">确&nbsp;认</a>            </div>        </div>    </div></div><?php }} ?>