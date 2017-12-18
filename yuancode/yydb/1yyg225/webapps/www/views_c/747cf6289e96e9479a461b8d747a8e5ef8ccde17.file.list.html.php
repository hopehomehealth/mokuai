<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 01:57:37
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/wxmedia/list.html" */ ?>
<?php /*%%SmartyHeaderCode:366862242584af091e5bf95-17835876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '747cf6289e96e9479a461b8d747a8e5ef8ccde17' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/wxmedia/list.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '366862242584af091e5bf95-17835876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'wxitem' => 0,
    'm' => 0,
    'index' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584af091f199e8_94892358',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584af091f199e8_94892358')) {function content_584af091f199e8_94892358($_smarty_tpl) {?><h3 class="info-tag">
    <a class="uiBtn r BtnGreen" href="#!wxmedia/appmsg/add">添加图文</a>
    <a class="uiBtn r BtnBlue" style="margin-right:5px" href="#!wxmedia/appmsg/addMutil">添加多图文</a>
    素材管理<span></span>
</h3>

<style type="text/css">
</style>
<div class="html-box">

    <table class="tb-goods" style="width:100%">
        <thead>
        <tr>
            <th class="oid" colspan="3">图文</th>

            <th class="w80">作者</th>
            <th class="w100">正文显示封面</th>
            <th class="w120">点击数</th>
            <th>操作</th>
        </tr>
        </thead>

    <?php  $_smarty_tpl->tpl_vars['wxitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['wxitem']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['wxitem']->key => $_smarty_tpl->tpl_vars['wxitem']->value){
$_smarty_tpl->tpl_vars['wxitem']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['wxitem']->key;
?>
        <tr><td colspan="10" class="sep-row"></td></tr>
        <tr class="order-head"><td colspan="10">
            <?php if (count($_smarty_tpl->tpl_vars['wxitem']->value['items'])==1){?>单图文消息<?php }else{ ?>多图文消息<?php }?>，
            创建时间：<span class="order-date"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['wxitem']->value['c_time']);?>
</span>，
            修改时间：<span class="order-date"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['wxitem']->value['c_time']);?>
</span>

            <a class="uiBtn BtnXs" style="display:none" href="javascript:;" rel="<?php echo $_smarty_tpl->tpl_vars['wxitem']->value['id'];?>
"><i class="iconfont">&#xe633;</i><span>查看预览</span></a>
        </td></tr>

        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['wxitem']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
        <tr>
            <td class="bdl w5"></td>
            <td class="w70"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['m']->value['thumb_size']['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['m']->value['thumb_size']['height'];?>
" /></td>
            <td><div class="oi-name"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</div></td>

            <td class="ac bdr bdl"><?php if ($_smarty_tpl->tpl_vars['m']->value['author']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['author'];?>
<?php }else{ ?>-<?php }?></td>

            <td class="ac bdr">
                <div class="e0-com-sw<?php if ($_smarty_tpl->tpl_vars['m']->value['cover_in_detail']){?> sw-on<?php }else{ ?> sw-off<?php }?> e0-wxnews-setCoverFlag-<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" style="margin:0 auto">
                    <div class="sw-inner">
                        <i class="sl">开启</i><label></label><i class="sr">关闭</i>
                    </div>
                </div>
            </td>
            <td class="ac bdr bdl"><?php echo $_smarty_tpl->tpl_vars['m']->value['view_num'];?>
</td>
            <?php if ($_smarty_tpl->tpl_vars['index']->value==0){?>

            <td class="ac bdr" rowspan="<?php echo count($_smarty_tpl->tpl_vars['wxitem']->value['items']);?>
">
                <?php if (count($_smarty_tpl->tpl_vars['wxitem']->value['items'])==1){?>
                <a href="#!wxmedia/appmsg/edit/<?php echo $_smarty_tpl->tpl_vars['wxitem']->value['id'];?>
" class="uiBtn"><i class="iconfont">&#xe603;</i></a>
                <?php }else{ ?>
                <a href="#!wxmedia/appmsg/editMutil/<?php echo $_smarty_tpl->tpl_vars['wxitem']->value['id'];?>
" class="uiBtn"><i class="iconfont">&#xe603;</i></a>
                <?php }?>

                <a href="javascript:;" class="uiBtn e2-wxnews-rmNews-<?php echo $_smarty_tpl->tpl_vars['wxitem']->value['id'];?>
"><i class="iconfont">&#xe606;</i></a>
            </td>
            <?php }?>

        </tr>
        <?php } ?>

    <?php } ?>
    </table>
    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

</div>
<script type="text/javascript" src="/admin/js/manage/wxnews.js"></script><?php }} ?>