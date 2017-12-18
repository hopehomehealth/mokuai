<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 16:36:54
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\minfo\load_share.html" */ ?>
<?php /*%%SmartyHeaderCode:665056cebd26c9dba2-27177027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b9d07cd5d274710c9d16b2abbcc7988d72e3298d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\minfo\\load_share.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '665056cebd26c9dba2-27177027',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cebd26eff324_54390147',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cebd26eff324_54390147')) {function content_56cebd26eff324_54390147($_smarty_tpl) {?><div class="shareA container" style="width:800px;padding: 0 0 10px 0;text-align: right">
    <a href="<?php echo url('/member/order');?>
"><img src="/style/images/shareB.png" /></a>
</div>
<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<div class="m-shareList fn-clear">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['iteration']++;
?>
    <div class="item <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['list']['iteration']%3==0){?>last<?php }?>">
        <div class="pic"><a href="javascript:;" onclick="mLoad('share#vid='+<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
)" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb'],'width'=>255,'type'=>0),$_smarty_tpl);?>
"></a></div>
        <div class="name"><a href="javascript:;" onclick="mLoad('share#vid='+<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
)">
            <?php if ($_smarty_tpl->tpl_vars['m']->value['extension_code']==@constant('CART_DB')){?>(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php }?>
            <?php echo $_smarty_tpl->tpl_vars['m']->value['obj_name'];?>

            <span class="color01" style="white-space: nowrap">【<?php if ($_smarty_tpl->tpl_vars['m']->value['extension_code']==@constant('CART_DB')){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
<?php }elseif($_smarty_tpl->tpl_vars['m']->value['extension_code']==@constant('CART_WIN')){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
<?php }elseif($_smarty_tpl->tpl_vars['m']->value['extension_AUC']==@constant('CART_DB')){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
获得<?php }?>】</span>
        </a></div>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['extension_code']==@constant('CART_DB')){?>
        <div class="code">幸运号码：<strong class="txt-impt"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</strong></div>
        <?php }?>
        <div class="post">
            <div class="title">
                <a href="javascript:;" onclick="mLoad('share#vid='+<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
)"><strong><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</strong></a>
            </div>
            <div class="time"><?php echo date('m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</div>
            <div class="abbr"><?php echo $_smarty_tpl->tpl_vars['m']->value['content'];?>
</div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="foot-btn fn-clear"><?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
<?php }else{ ?>
<div class="m-blank">该用户还没有晒单记录！</div>
<?php }?>
<script type="text/javascript">
    var load_div = '#load_share';
    $(document).ready(function(){
        $(load_div).find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"拼命加载中...",
            target:load_div
        }).bind('click',function(){
            $('html,body').animate({ scrollTop: '400px' }, 500);
        });
    });
</script>

<script type="text/javascript" src="<?php echo url('/style/jquery.masonry.min.js');?>
"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var $container = $('.m-shareList');
        $container.imagesLoaded( function(){
            $container.masonry({
                itemSelector: '.item',
                columnWidth: 3,
                isAnimated: true
            });
        });
    });
</script><?php }} ?>