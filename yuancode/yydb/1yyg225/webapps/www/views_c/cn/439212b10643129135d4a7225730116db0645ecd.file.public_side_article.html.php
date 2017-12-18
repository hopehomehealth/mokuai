<?php /* Smarty version Smarty-3.1.13, created on 2017-02-07 09:43:01
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/public_side_article.html" */ ?>
<?php /*%%SmartyHeaderCode:43749912658992625d399f1-88490946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '439212b10643129135d4a7225730116db0645ecd' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/public_side_article.html',
      1 => 1458896514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43749912658992625d399f1-88490946',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'tagMenu' => 0,
    'tagData' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58992625d8f0c5_06320356',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58992625d8f0c5_06320356')) {function content_58992625d8f0c5_06320356($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','var'=>'tagMenu','field'=>'id,catname,ismenu','catid'=>$_smarty_tpl->tpl_vars['data']->value['cat']['id'],'type'=>'top'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['tagMenu']->value['ismenu']==1){?>
<div class="fn-left hy-l side-article">
    <h4><?php echo $_smarty_tpl->tpl_vars['tagMenu']->value['catname'];?>
</h4>
    <div class="hy-lnav">
        <ul class="fn-clear">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','field'=>'id,catname,url,ismenu','catid'=>$_smarty_tpl->tpl_vars['data']->value['catlist'][1],'type'=>'child','child'=>0),$_smarty_tpl);?>

            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1){?>
            <li<?php if ($_smarty_tpl->tpl_vars['data']->value['cat']['id']==$_smarty_tpl->tpl_vars['m']->value['id']){?> class="dq"<?php }?>><a href="<?php echo url($_smarty_tpl->tpl_vars['m']->value['url']);?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
			<?php }?>
            <?php } ?>
        </ul>
    </div>
</div>
<?php }?><?php }} ?>