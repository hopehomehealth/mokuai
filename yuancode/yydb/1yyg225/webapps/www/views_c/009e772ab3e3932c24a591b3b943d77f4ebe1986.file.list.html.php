<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:29:46
         compiled from "F:\WWW\1yyg225\webapps\www\views\manage\auction\list.html" */ ?>
<?php /*%%SmartyHeaderCode:21175565fa91ad95446-50018943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '009e772ab3e3932c24a591b3b943d77f4ebe1986' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\manage\\auction\\list.html',
      1 => 1449048766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21175565fa91ad95446-50018943',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'actTypes' => 0,
    'm' => 0,
    'cat_type' => 0,
    'status' => 0,
    'sortby' => 0,
    'sortorder' => 0,
    'data' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fa91b01a4c7_43803646',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fa91b01a4c7_43803646')) {function content_565fa91b01a4c7_43803646($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

" type="text">
 $_from = $_smarty_tpl->tpl_vars['actTypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['key']==$_smarty_tpl->tpl_vars['cat_type']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</option>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('UNDER_WAY')){?>selected<?php }?>>进行中</option>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('PRE_START')&&$_smarty_tpl->tpl_vars['status']->value!=''){?>selected<?php }?>>即将开始</option>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('FINISHED')){?>selected<?php }?>>已结束(未处理)</option>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('SETTLED')){?>selected<?php }?>>已完成</option>
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>
</td>
" width="60" /></td>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a><span class="c-orange">(<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_id'];?>
)</span> <?php if ($_smarty_tpl->tpl_vars['m']->value['cat_type']=='tiyan'){?><span class="mark">体验区</span><?php }?></td>
</td>
</td>
</td>
&status=1" title="中奖记录"><?php echo $_smarty_tpl->tpl_vars['m']->value['cod_count'];?>
</a> /
" title="出价记录"><?php echo $_smarty_tpl->tpl_vars['m']->value['bid_user_count'];?>
</a>
','goods_activity','posid','act_id')" class="c-green" title="点击设为不推荐">是</a>
','goods_activity','posid','act_id')" class="c-red" title="点击设为推荐">否</a>
','goods_activity','is_show','act_id')" class="c-green" title="点击隐藏">显示</a>
','goods_activity','is_show','act_id')" class="c-red" title="点击显示">隐藏</a>
&act=copy&com=xshow|复制竞拍活动（<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
）' class='iconfont icon-a' title='复制'>&#xe617;</a>
&com=xshow|编辑竞拍活动（<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
）' class='iconfont icon-a' title='编辑'>&#xe603;</a>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
</div>