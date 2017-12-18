<?php /* Smarty version Smarty-3.1.13, created on 2016-03-02 10:33:03
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\share.html" */ ?>
<?php /*%%SmartyHeaderCode:1766256d650df003249-27371979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f133d23dd2de94ffc5ed8a0456645b7eac62bd92' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\share.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1766256d650df003249-27371979',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d650df1f91f1_14142033',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d650df1f91f1_14142033')) {function content_56d650df1f91f1_14142033($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="hy-tjxh fn-clear">
                <ul class="fn-clear db-tab">
                    <li><a href="<?php echo url('/member/db');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</a></li>
                    <li><a href="<?php echo url('/member/luck');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
记录</a></li>
                    <li class="dq"><a href="<?php echo url('/member/share');?>
">晒单</a></li>
                </ul>
                <div class="db-nrbox fn-clear">
                    <?php if ($_smarty_tpl->tpl_vars['list']->value){?>
                    <ul class="db-zjxx fn-clear">
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                        <li>
                            <div class="zjxx-box">
                                <a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#share#vid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" target="_blank" style="display: block; text-align: center;"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb'],'width'=>250,'height'=>175,'type'=>1),$_smarty_tpl);?>
" alt="" /></a>
                                <div class="df-qh">
                                    <p><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['obj_name'],16);?>
</a></p>
                                    <p>幸运号码：<strong class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</strong></p>
                                </div>
                            </div>
                            <div class="zjxx-sdtxt">
                                <h2><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</h2>
                                <div><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</div>
                                <div class="zj-sd-tx"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['content'],50);?>
</div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="foot-btn">
                        <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    </div>
                    <?php }else{ ?>
                    <div class="m-user-blank" id="dvBlank" style="">只有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
且签收了才可以晒单哦，去 <a href="<?php echo url('/member/order');?>
">订单管理</a> 看看吧！</div>
                    <?php }?>
                </div>
            </div>

        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>