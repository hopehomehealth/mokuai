<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 11:46:36
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\upload\image\box.html" */ ?>
<?php /*%%SmartyHeaderCode:242515660f8e0345e52-99000847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f0cf0eba7b9dce93e2fcfb1e866dd53ccb16b9d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\upload\\image\\box.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '242515660f8e0345e52-99000847',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f8e03cbfb0_81112711',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f8e03cbfb0_81112711')) {function content_5660f8e03cbfb0_81112711($_smarty_tpl) {?><div class="xwin-box">    <a class="sprite close e2-upload-hidebox" href="" hidefocus="true"></a>    <div class="e-drag">选择图片</div>    <div class="xHtml">        <div class="iTab e1-com-iTab clear" id="imglib-box">            <a href="javascript:;" class="tab-btn e0-upload-showUp">上传图片</a>            <a href="javascript:;" class="tab-btn on e0-upload-imglib">图库</a>        </div>        <div class="tab-mod imgSeler imgUpBox" id="ubox_2"></div>        <div class="tab-mod imgSeler imgSelBox" style="display:block">            <div id="galleryBox">                <?php echo $_smarty_tpl->getSubTemplate ('manage/upload/image/list.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
            </div>            <div class="check inblock">                <a class="uiBtn btn-cancel e2-upload-hidebox" href="javascript:;">取&nbsp;消</a>                <a class="uiBtn btn-true btnFocus e1-upload-getCheckedItem" href="javascript:;">确&nbsp;认</a>            </div>        </div>    </div></div><?php }} ?>