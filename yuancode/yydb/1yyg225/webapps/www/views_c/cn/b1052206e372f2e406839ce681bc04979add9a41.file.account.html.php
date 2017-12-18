<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 13:28:05
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/business/account.html" */ ?>
<?php /*%%SmartyHeaderCode:741624077584b926509be08-93289912%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1052206e372f2e406839ce681bc04979add9a41' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/business/account.html',
      1 => 1467709608,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '741624077584b926509be08-93289912',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'member' => 0,
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584b92650f5054_72332215',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584b92650f5054_72332215')) {function content_584b92650f5054_72332215($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link type="text/css" rel="stylesheet" href="/style/css_02/style.css" />
<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css_02/merchant.css" />
<div class="container menu-show">
    <?php echo $_smarty_tpl->getSubTemplate ("business/ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("business/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="fn-right hy-r" id="m">
        <div class="shop-right">
            <h3>资金记录</h3>
        </div>
        <div class="shop-bor">
            <ul class="money box-sizing">
                <li>总收入：<span><?php echo price_format($_smarty_tpl->tpl_vars['data']->value['user_money']);?>
</span></li>
                <li>可用资金：<big><?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</big></li>
            </ul>
            <div class="shop-manage box-sizing">
                <table width="100%">
                    <tr class="shop-manage1">
                        <th width="150">时间</th>
                        <th width="120" nowrap>金额</th>
                        <th>来源</th>
                    </tr>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <tr>
                        <td><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['logtime']);?>
</td>
                        <td class="money-color"><?php echo $_smarty_tpl->tpl_vars['m']->value['user_money'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['m']->value['desc'];?>
</td>
                    </tr>
                    <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
                    <tr>
                        <td colspan="5">无分润记录！</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
</div>
<div class="merchant"></div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/css_02/common_02.js"></script><?php }} ?>