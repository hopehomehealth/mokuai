<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:52:09
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\minfo\load_fri.html" */ ?>
<?php /*%%SmartyHeaderCode:9954565d89e92b29a2-74127760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7bf7fa11fd2393c91887037cb87d28de76be82ec' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\minfo\\load_fri.html',
      1 => 1421845772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9954565d89e92b29a2-74127760',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d89e933b546_96387704',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d89e933b546_96387704')) {function content_565d89e933b546_96387704($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<div class="friList fn-clear">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <dl class="item">
        <dt class="scrollLoadingDiv"><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']);?>
"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" /></a></dt>
        <dd>
            <p class="name"><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']);?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></p>
            <p class="desc">
                <?php if ($_smarty_tpl->tpl_vars['m']->value['intro']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['intro'];?>
<br><?php }?>
                经验值：<?php echo $_smarty_tpl->tpl_vars['m']->value['rank_points'];?>

            </p>
        </dd>
    </dl>
    <?php } ?>
</div>
<div class="foot-btn">
    <?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }else{ ?>
<div class="m-blank">该用户还没有好友！</div>
<?php }?>

<script type="text/javascript">
    var load_div = '#load_fri';
    $(document).ready(function(){
        $(load_div).find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"拼命加载中...",
            target:load_div,
            success:function(){
                scrollLoading();
            }
        }).bind('click',function(){
            $('html,body').animate({ scrollTop: '400px' }, 500);
        });
    });
</script><?php }} ?>