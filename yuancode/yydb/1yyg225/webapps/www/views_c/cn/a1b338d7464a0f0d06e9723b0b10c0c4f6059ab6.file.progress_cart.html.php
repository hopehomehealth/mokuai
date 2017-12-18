<?php /* Smarty version Smarty-3.1.13, created on 2016-04-19 11:39:37
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\yunbuy\progress_cart.html" */ ?>
<?php /*%%SmartyHeaderCode:219595661000aaa5262-14723495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1b338d7464a0f0d06e9723b0b10c0c4f6059ab6' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\yunbuy\\progress_cart.html',
      1 => 1461032854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '219595661000aaa5262-14723495',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5661000aae8ff0_25559474',
  'variables' => 
  array (
    'progress' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5661000aae8ff0_25559474')) {function content_5661000aae8ff0_25559474($_smarty_tpl) {?><div id="progress" class="progress-0<?php echo $_smarty_tpl->tpl_vars['progress']->value;?>
">
    <ul class="fn-clear">
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=1){?> class="dq"<?php }?>><span>1</span><p>提交订单</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=2){?> class="dq"<?php }?>><span>2</span><p>支付订单</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=3){?> class="dq"<?php }?>><span>3</span><p>支付成功，等待揭晓</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=4){?> class="dq"<?php }?>><span>4</span><p>揭晓幸运码</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=5){?> class="dq"<?php }?>><span>5</span><p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
派发</p></li>
    </ul>
</div><?php }} ?>