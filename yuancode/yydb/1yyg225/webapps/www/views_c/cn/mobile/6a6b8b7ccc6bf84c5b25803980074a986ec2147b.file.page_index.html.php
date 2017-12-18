<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 16:27:23
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/page_index.html" */ ?>
<?php /*%%SmartyHeaderCode:1777570633585799ebbf34b5-47325081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a6b8b7ccc6bf84c5b25803980074a986ec2147b' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/page_index.html',
      1 => 1458896512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1777570633585799ebbf34b5-47325081',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'topData' => 0,
    'tagData' => 0,
    'm' => 0,
    'tagCate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_585799ebcf5b23_55132087',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585799ebcf5b23_55132087')) {function content_585799ebcf5b23_55132087($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','var'=>'topData','type'=>'parent','catid'=>$_smarty_tpl->tpl_vars['data']->value['cat']['id']),$_smarty_tpl);?>

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