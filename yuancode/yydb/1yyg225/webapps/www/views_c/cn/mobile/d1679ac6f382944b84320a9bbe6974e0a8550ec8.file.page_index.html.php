<?php /* Smarty version Smarty-3.1.13, created on 2016-03-25 19:51:46
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\page_index.html" */ ?>
<?php /*%%SmartyHeaderCode:1468656611e33dc7bb0-77585435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1679ac6f382944b84320a9bbe6974e0a8550ec8' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\page_index.html',
      1 => 1458896511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1468656611e33dc7bb0-77585435',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56611e3406ac00_50406069',
  'variables' => 
  array (
    'data' => 0,
    'topData' => 0,
    'tagData' => 0,
    'm' => 0,
    'tagCate' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56611e3406ac00_50406069')) {function content_56611e3406ac00_50406069($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','var'=>'topData','type'=>'parent','catid'=>$_smarty_tpl->tpl_vars['data']->value['cat']['id']),$_smarty_tpl);?>

<?php $_smarty_tpl->createLocalArrayVariable('row', null, 0);
$_smarty_tpl->tpl_vars['row']->value['head'] = $_smarty_tpl->tpl_vars['topData']->value['catname'];?>
<?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/content.css">
<div id="content" class="container main">
    <div class="nav-m ui-clr">
        <ul>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','field'=>'id,catname,url,ismenu','catid'=>$_smarty_tpl->tpl_vars['data']->value['cat']['id']),$_smarty_tpl);?>

            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1){?>
            <li<?php if ($_smarty_tpl->tpl_vars['data']->value['cat']['id']==$_smarty_tpl->tpl_vars['m']->value['id']){?> class="on"<?php }?>><a href="<?php echo url($_smarty_tpl->tpl_vars['m']->value['url']);?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
			<?php }?>
            <?php } ?>
        </ul>
    </div>
    <div class="page_content">
        <div class="t"><?php echo $_smarty_tpl->tpl_vars['data']->value['page']['title'];?>
</div>
        <div class="c ui-clr"><?php echo stripcslashes($_smarty_tpl->tpl_vars['data']->value['page']['content']);?>
</div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['data']->value['catlist'][1]==7){?>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','var'=>'tagCate','field'=>'id,catname,url,ismenu','catid'=>$_smarty_tpl->tpl_vars['data']->value['catlist'][1]),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->tpl_vars['tagCate']->value){?>
    <div class="nav-m-f ui-clr">
        <ul>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagCate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1){?>
            <li<?php if ($_smarty_tpl->tpl_vars['data']->value['cat']['id']==$_smarty_tpl->tpl_vars['m']->value['id']){?> class="on"<?php }?>><span>|</span><a href="<?php echo url($_smarty_tpl->tpl_vars['m']->value['url']);?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
			<?php }?>
            <?php } ?>
        </ul>
    </div>
    <?php }?>
    <?php }?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>