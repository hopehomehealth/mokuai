<?php /* Smarty version Smarty-3.1.13, created on 2016-06-21 10:35:10
         compiled from "E:\projects\web\1yyg\1yyg225_0016\webapps\www\views\manage\timing\index.html" */ ?>
<?php /*%%SmartyHeaderCode:193495768a7deed1276-94871266%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e179a5b0c0092076aee0fb6c8c79d3c36eced16' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_0016\\webapps\\www\\views\\manage\\timing\\index.html',
      1 => 1464571739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193495768a7deed1276-94871266',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'L' => 0,
    'system' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5768a7df0541e7_62808385',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768a7df0541e7_62808385')) {function content_5768a7df0541e7_62808385($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\projects\\web\\1yyg\\1yyg225_0016\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

开奖</button>
开奖'"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
开奖</button>
</b></a>）（下期开奖日：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cod']['nexttime'],'Y-m-d 15:30');?>
）
</button>
</button>
</b></a>） （所有已结束并未解冻的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
出价<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
，单次最多解冻<?php echo $_smarty_tpl->tpl_vars['data']->value['frozenNum'];?>
条记录）</span>
</span></p>
</span></p>
</span></p>
</span></p>
</span></p>
</span> <a href="http://help.lnest.com/?/article/19" target="_blank">【查看更新】</a></p>