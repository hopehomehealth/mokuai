<?php /* Smarty version Smarty-3.1.13, created on 2016-03-25 19:51:45
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\public_side_help.html" */ ?>
<?php /*%%SmartyHeaderCode:185485661020cda4484-52595565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8cbc5b5dd6c83e67e9c20bd4af320bcac3c1f7a' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\public_side_help.html',
      1 => 1458896512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185485661020cda4484-52595565',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5661020ce6bc30_73571503',
  'variables' => 
  array (
    'tagData' => 0,
    'm' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5661020ce6bc30_73571503')) {function content_5661020ce6bc30_73571503($_smarty_tpl) {?><div class="fn-left hy-l ffbz">
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