<?php /* Smarty version Smarty-3.1.13, created on 2016-06-24 15:41:07
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\cn\public_side_help.html" */ ?>
<?php /*%%SmartyHeaderCode:7198576ce4138fda17-13471532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fc72ff0eb4d28d78733184311ba78f48c262258' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\cn\\public_side_help.html',
      1 => 1458896512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7198576ce4138fda17-13471532',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tagData' => 0,
    'm' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576ce4139554c4_09341769',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576ce4139554c4_09341769')) {function content_576ce4139554c4_09341769($_smarty_tpl) {?><div class="fn-left hy-l ffbz">
    <h4>帮助中心</h4>
    <div class="hy-lnav">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','field'=>'id,catname,url,ismenu','catid'=>@constant('HELP_ID'),'type'=>'child','child'=>0),$_smarty_tpl);?>

        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1){?>
            <h3 class="fn-clear"><span></span><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
 </h3>
            <ul class="fn-clear">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','field'=>'id,catname,url,ismenu','catid'=>$_smarty_tpl->tpl_vars['m']->value['id'],'type'=>'child','child'=>0),$_smarty_tpl);?>

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
			<?php }?>
        <?php } ?>
    </div>
</div><?php }} ?>