<?php /* Smarty version Smarty-3.1.13, created on 2016-12-11 20:43:10
         compiled from "/data/01/html/1yyg225/webapps/www/views/tpl/mail_cod.html" */ ?>
<?php /*%%SmartyHeaderCode:1471124108584d49de16fb73-01173253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a8ee41ae4984efd14cda2f26d4c31ff042ef60f' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/tpl/mail_cod.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1471124108584d49de16fb73-01173253',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'goodsname' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584d49de192ed1_06951182',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584d49de192ed1_06951182')) {function content_584d49de192ed1_06951182($_smarty_tpl) {?>恭喜获奖！<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
，获奖商品：<?php echo $_smarty_tpl->tpl_vars['goodsname']->value;?>
；请登陆我们的官网领取！领取后3-7个工作日内发货！有任何问题可致电<?php echo $_smarty_tpl->tpl_vars['site_config']->value['tel'];?>
咨询客服！欢迎你来，拍你所想，拍你所爱。www.225.net<?php }} ?>