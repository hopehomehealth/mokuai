<?php /* Smarty version Smarty-3.1.13, created on 2017-01-14 15:42:33
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/content/windbitem.html" */ ?>
<?php /*%%SmartyHeaderCode:1141358171585785cb4c85d5-84583987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4302a54bed6dadac996401db6802ee1a72e69f31' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/content/windbitem.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1141358171585785cb4c85d5-84583987',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_585785cb55ada7_25537591',
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585785cb55ada7_25537591')) {function content_585785cb55ada7_25537591($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.truncate.php';
?><div class="item item-db">    <div class="itemc">        <div class="itemL scrollLoadingDiv"><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>150,'type'=>0),$_smarty_tpl);?>
" width="150" /></a></div>        <div class="itemR">            <div class="user-info">                <div class="photo"><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#dbCod" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
" target="_blank"><img class="scrollLoading scrollLoadingDiv" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" width="60" height="60" /></a></div>                <div class="txt">                    <p class="p1">获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#dbCod" target="_blank" class="color02" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></p>                    <p>来自：<?php echo cityIp($_smarty_tpl->tpl_vars['m']->value['ip']);?>
</p>                    <p>幸运号码：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</span></p>                    <p>本期参与：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
</span></p>                </div>            </div>            <div class="pro-info">                <p class="tit"><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['qishu_name'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['goods_name']){?><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['goods_name'],26);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
<?php }?></a></p>                <p>商品总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
人次</p>                <p>揭晓时间：<?php echo formatTime($_smarty_tpl->tpl_vars['m']->value['end_time']);?>
</p>                <p class="button"><span><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank">查看详情</a></span></p>            </div>        </div>    </div></div><?php }} ?>