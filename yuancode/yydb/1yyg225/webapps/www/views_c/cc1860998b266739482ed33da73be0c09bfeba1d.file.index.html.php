<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 14:19:00
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/timing/index.html" */ ?>
<?php /*%%SmartyHeaderCode:157166262958451fce6e1bf3-50732148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc1860998b266739482ed33da73be0c09bfeba1d' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/timing/index.html',
      1 => 1481177938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157166262958451fce6e1bf3-50732148',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451fce7529b6_33310786',
  'variables' => 
  array (
    'data' => 0,
    'L' => 0,
    'system' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451fce7529b6_33310786')) {function content_58451fce7529b6_33310786($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
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
</span>