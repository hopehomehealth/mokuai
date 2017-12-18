<?php /* Smarty version Smarty-3.1.13, created on 2017-02-24 13:31:18
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/content/windbitemindex.html" */ ?>
<?php /*%%SmartyHeaderCode:1329065783584d49d6b6faf2-74691358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06f8a00dc62e7a240dc20c1ee809c5a42dcc9b21' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/content/windbitemindex.html',
      1 => 1487758124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1329065783584d49d6b6faf2-74691358',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584d49d6bf0742_17546705',
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584d49d6bf0742_17546705')) {function content_584d49d6bf0742_17546705($_smarty_tpl) {?><div class="item item-db" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">
    <div class="pic">
        <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>102,'height'=>102,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" /></a>
    </div>
    <p><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
"><!--<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu_name'];?>
--><?php if ($_smarty_tpl->tpl_vars['m']->value['goods_name']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
<?php }?></a></p>

    商品总需：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</span>人次<br>
    揭晓时间：<span class="color01"><?php echo formatTime($_smarty_tpl->tpl_vars['m']->value['end_time']);?>
</span><br>
    获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#dbCod" target="_blank" class="color02" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a><br>

    <!-- <?php if ($_smarty_tpl->tpl_vars['m']->value['new_buy']){?>
    <a class="btn-go-green btn-index-01" href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
">第<?php echo $_smarty_tpl->tpl_vars['m']->value['new_buy']['qishu'];?>
期进行中...</a> 
    <?php }?>-->
</div><?php }} ?>