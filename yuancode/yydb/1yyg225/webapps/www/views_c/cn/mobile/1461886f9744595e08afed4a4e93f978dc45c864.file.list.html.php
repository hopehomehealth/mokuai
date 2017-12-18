<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 22:13:06
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\auction\lbi\list.html" */ ?>
<?php /*%%SmartyHeaderCode:9656d451f2e8cf64-07914191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1461886f9744595e08afed4a4e93f978dc45c864' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\auction\\lbi\\list.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9656d451f2e8cf64-07914191',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'auction' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d451f30fff25_53343004',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d451f30fff25_53343004')) {function content_56d451f30fff25_53343004($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value){
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
<li class="ui-clr">
    <div class="pic">
        <a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['auction']->value['imgurl_src'],'width'=>110,'type'=>0),$_smarty_tpl);?>
" /></a>
        <span class="tip"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
<br><i><?php echo $_smarty_tpl->tpl_vars['auction']->value['win'];?>
%</i></span>
    </div>
    <div class="info">
        <p class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
</a></p>
        <p class="price">
            <span class="color"><?php if ($_smarty_tpl->tpl_vars['auction']->value['current_price']>0){?><?php echo price_format($_smarty_tpl->tpl_vars['auction']->value['current_price']);?>
 <?php }?><?php if ($_smarty_tpl->tpl_vars['auction']->value['paib']){?><?php echo $_smarty_tpl->tpl_vars['auction']->value['paib'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<?php }?></span>
            价值：<del><?php echo price_format($_smarty_tpl->tpl_vars['auction']->value['price']);?>
</del>
        </p>
        <?php if ($_smarty_tpl->tpl_vars['auction']->value['status']<@constant('FINISHED')){?>
        <div class="count">
            <i class="ap-icon icon-count"></i>
            <?php if ($_smarty_tpl->tpl_vars['auction']->value['status']==@constant('PRE_START')){?>即将开始：<?php }else{ ?>剩余：<?php }?>
            <span id="leftTime<?php echo $_smarty_tpl->tpl_vars['auction']->value['act_id'];?>
<?php echo $_smarty_tpl->tpl_vars['auction']->value['key'];?>
">请稍等, 载入中...</span>
            <script type="text/javascript">
                onload_leftTime('<?php echo $_smarty_tpl->tpl_vars['auction']->value['act_id'];?>
<?php echo $_smarty_tpl->tpl_vars['auction']->value['key'];?>
',"<?php echo $_smarty_tpl->tpl_vars['auction']->value['diff_time'];?>
","<?php echo $_smarty_tpl->tpl_vars['auction']->value['status'];?>
");
            </script>
        </div>
        <?php }?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
" class="btn-pai">抢拍</a>
    </div>
</li>
<?php } ?><?php }} ?>