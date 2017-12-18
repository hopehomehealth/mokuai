<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 16:37:55
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\yunbuy\lbi\list2.html" */ ?>
<?php /*%%SmartyHeaderCode:14801565fff6351e342-51350713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73e724ca85052986ebe91b2a2ce3d7e22a566c30' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\yunbuy\\lbi\\list2.html',
      1 => 1449131870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14801565fff6351e342-51350713',
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
  'unifunc' => 'content_565fff635eb121_08012083',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fff635eb121_08012083')) {function content_565fff635eb121_08012083($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<div class="new-box">
    <em><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>180,'type'=>0),$_smarty_tpl);?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
"></a></em>
    <h5><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><span>(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span><p><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</p></a></h5>
    <div class="new-index2-1">
        <p><span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num']/$_smarty_tpl->tpl_vars['m']->value['need_num']*100;?>
%"></span></p>
        <dl>
            <dt><span><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</span><i>已参与人次</i></dt>
            <dd class="new-index_zx"><span><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</span><i>总需人次</i></dd>
            <dd class="new-index_zx1"><span><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</span><i>剩余人次</i></dd>
        </dl>
        <div class="new-index-one" >
            <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
">立即云购</a><a onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>free<?php }?>',this)" class="new-index-two"></a>
        </div>
    </div>
</div>
<?php } ?><?php }} ?>