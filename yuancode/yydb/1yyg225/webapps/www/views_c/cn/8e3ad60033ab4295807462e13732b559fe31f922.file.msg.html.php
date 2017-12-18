<?php /* Smarty version Smarty-3.1.13, created on 2016-12-11 20:47:36
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/msg.html" */ ?>
<?php /*%%SmartyHeaderCode:1705590696584d4ae8bd8df4-76923958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e3ad60033ab4295807462e13732b559fe31f922' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/msg.html',
      1 => 1461036446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1705590696584d4ae8bd8df4-76923958',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'icon' => 0,
    'message' => 0,
    'link' => 0,
    'm' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584d4ae8dcbdd9_19922369',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584d4ae8dcbdd9_19922369')) {function content_584d4ae8dcbdd9_19922369($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    .msg{ width:1200px; margin: 30px auto 20px; border:1px solid #e3e3e3; }
    .msg_content{ margin: 50px 20px 70px 120px; }
    .msg_content h2{ font-size: 32px; padding:30px 0 10px 0; line-height: 1.2; font-weight: normal; }
    .msg_content h2 b{ font-size: 50px; }
    .msg_link{ padding-top:10px;}
    .msg_link p{ margin-bottom: 10px; margin-right: 10px; float: left; }
    .msg_link a{ display:inline-block; background: #33cc99; padding: 0 20px; line-height: 40px; color: #fff; font-size: 24px; font-weight: bold; }
</style>
<div class="msg msg_<?php echo $_smarty_tpl->tpl_vars['icon']->value;?>
">
    <div class="msg_content">
        <table>
            <tr>
                <?php if ($_smarty_tpl->tpl_vars['icon']->value==3){?>
                <td width="10" style="padding-right:80px;"><img src="/style/images/msg_3.png" /></td>
                <?php }else{ ?>
                <td width="10" nowrap><img src="/style/images/msg_<?php if ($_smarty_tpl->tpl_vars['icon']->value>1){?><?php echo $_smarty_tpl->tpl_vars['icon']->value;?>
<?php }elseif($_smarty_tpl->tpl_vars['icon']->value>0){?>1<?php }else{ ?>0<?php }?>.gif" /></td>
                <?php }?>
                <td>
                    <h2 class="color01"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h2>
                    <?php if ($_smarty_tpl->tpl_vars['link']->value){?>
                    <div class="msg_link">
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <p><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['text'];?>
</a></p>
                        <?php } ?>
                    </div>
                    <?php }else{ ?>
                    <div class="msg_link">
                        <p><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">点击跳转</a></p>
                    </div>
                    <script type="text/javascript">
                        setTimeout(function(){ location.href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
' },3*1000);
                    </script>
                    <?php }?>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>