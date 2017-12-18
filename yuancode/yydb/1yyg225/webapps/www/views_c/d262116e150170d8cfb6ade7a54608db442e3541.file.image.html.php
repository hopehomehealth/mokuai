<?php /* Smarty version Smarty-3.1.13, created on 2016-12-11 20:55:31
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/upload/media/image.html" */ ?>
<?php /*%%SmartyHeaderCode:1650064208584d4cc3c09253-68638004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd262116e150170d8cfb6ade7a54608db442e3541' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/upload/media/image.html',
      1 => 1481177906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1650064208584d4cc3c09253-68638004',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'common' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584d4cc3ca84f7_76249306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584d4cc3ca84f7_76249306')) {function content_584d4cc3ca84f7_76249306($_smarty_tpl) {?><h3 class="info-tag media-cate">    <a href="#!upload/media/1/image" class="<?php if ($_smarty_tpl->tpl_vars['type']->value=='image'){?>on <?php }?>">图片管理        <b class="z1">◆</b><b class="z0">◆</b>    </a>    <a href="#!upload/media/1/file" class="<?php if ($_smarty_tpl->tpl_vars['type']->value=='file'){?>on <?php }?>">文件管理        <b class="z1">◆</b><b class="z0">◆</b>    </a>    <?php if ($_smarty_tpl->tpl_vars['common']->value['cloudsave']){?>    <a href="javascript:;" class="uiBtn e3-upload-cloudImg">生成云图片</a>    <?php }?>    <span></span></h3><style type="text/css"></style><div class="html-box">    <div class="media-box clear tab-mod" id="media-box">        <?php if ($_smarty_tpl->tpl_vars['type']->value=='file'){?>        <?php echo $_smarty_tpl->getSubTemplate ('manage/upload/media/file_list.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
        <?php }else{ ?>        <?php echo $_smarty_tpl->getSubTemplate ('manage/upload/media/image_list.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
        <?php }?>    </div>    <div class="clear"></div></div><script type="text/javascript">    $.loadJs('/admin/js/upload.js',function(){        upload.params = { id:100};    });</script><?php }} ?>