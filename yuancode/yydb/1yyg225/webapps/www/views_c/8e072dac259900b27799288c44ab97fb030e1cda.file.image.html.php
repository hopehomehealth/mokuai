<?php /* Smarty version Smarty-3.1.13, created on 2016-06-21 10:36:37
         compiled from "E:\projects\web\1yyg\1yyg225_0016\webapps\www\views\manage\upload\media\image.html" */ ?>
<?php /*%%SmartyHeaderCode:73835768a8355ba5b5-02517512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e072dac259900b27799288c44ab97fb030e1cda' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_0016\\webapps\\www\\views\\manage\\upload\\media\\image.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73835768a8355ba5b5-02517512',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5768a83562c754_43829012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768a83562c754_43829012')) {function content_5768a83562c754_43829012($_smarty_tpl) {?><h3 class="info-tag media-cate">    <a href="#!upload/media/1/image" class="<?php if ($_smarty_tpl->tpl_vars['type']->value=='image'){?>on <?php }?>">图片管理        <b class="z1">◆</b><b class="z0">◆</b>    </a>    <a href="#!upload/media/1/file" class="<?php if ($_smarty_tpl->tpl_vars['type']->value=='file'){?>on <?php }?>">文件管理        <b class="z1">◆</b><b class="z0">◆</b>    </a>    <!--<a href="javascript:;" class="uiBtn e3-upload-cloudImg">生成云图片</a>-->    <span></span></h3><style type="text/css"></style><div class="html-box">    <div class="media-box clear tab-mod" id="media-box">        <?php if ($_smarty_tpl->tpl_vars['type']->value=='file'){?>        <?php echo $_smarty_tpl->getSubTemplate ('manage/upload/media/file_list.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
        <?php }else{ ?>        <?php echo $_smarty_tpl->getSubTemplate ('manage/upload/media/image_list.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
        <?php }?>    </div>    <div class="clear"></div></div><script type="text/javascript">    $.loadJs('/admin/js/upload.js',function(){        upload.params = { id:100};    });</script><?php }} ?>