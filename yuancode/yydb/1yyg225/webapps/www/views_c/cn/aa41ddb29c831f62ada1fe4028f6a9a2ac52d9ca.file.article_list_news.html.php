<?php /* Smarty version Smarty-3.1.13, created on 2016-04-11 16:47:03
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\article_list_news.html" */ ?>
<?php /*%%SmartyHeaderCode:7071570b64875b8d89-84435032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa41ddb29c831f62ada1fe4028f6a9a2ac52d9ca' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\article_list_news.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7071570b64875b8d89-84435032',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_570b6487c65d47_82028955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570b6487c65d47_82028955')) {function content_570b6487c65d47_82028955($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("public_side_article.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['cat']['catname'];?>
</h2>
                </div>
                <div class="hy-box">
                    <div class="hy-qalist">
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <div class="qa-t">
                            <a href="<?php echo url($_smarty_tpl->tpl_vars['m']->value['url']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a>
                            <i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['createtime'],'Y-m-d H:i:s');?>
</i>
                        </div>
                        <dl class="fn-clear">
                            <dd><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['m']->value['content']),500,'...');?>
</dd>
                        </dl>
                        <?php } ?>
                    </div>
                    <?php if (empty($_smarty_tpl->tpl_vars['data']->value['list'])){?>
                    <div class="empty">没有内容！</div>
                    <?php }?>
                    <?php echo $_smarty_tpl->getSubTemplate ('public_page.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>