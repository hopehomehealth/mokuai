<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 17:44:59
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\auction\ajax_qishu.html" */ ?>
<?php /*%%SmartyHeaderCode:12228565ebd9bd31847-72402114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afe9e737ed89adfa914a4576a1f476feb7becc0d' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\auction\\ajax_qishu.html',
      1 => 1433753292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12228565ebd9bd31847-72402114',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565ebd9bdc20e1_39835015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565ebd9bdc20e1_39835015')) {function content_565ebd9bdc20e1_39835015($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['data']->value['qishuList'])>0){?>
<div class="fn-clear auc_qishu <?php if (count($_smarty_tpl->tpl_vars['data']->value['qishuList'])>27){?>auc_period<?php }?>">
    <div class="period"><!--展开后添加CLASS toggle_close-->
        <a href="javascript:void(0);" class="open">展开 <i></i></a>
        <a href="javascript:void(0);" class="close">收起 <i></i></a>
    </div>

    <ul class="fn-clear">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['qishuList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['m']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['m']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
 $_smarty_tpl->tpl_vars['m']->iteration++;
 $_smarty_tpl->tpl_vars['m']->last = $_smarty_tpl->tpl_vars['m']->iteration === $_smarty_tpl->tpl_vars['m']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f']['last'] = $_smarty_tpl->tpl_vars['m']->last;
?>
        <li<?php if ($_smarty_tpl->tpl_vars['data']->value['id']==$_smarty_tpl->tpl_vars['m']->value['act_id']){?> class="dq"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
">第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期<?php if ($_smarty_tpl->tpl_vars['m']->value['ing']==1){?> <img src="/style/images/ing.gif"/><?php }elseif($_smarty_tpl->tpl_vars['m']->value['ing']==0){?> <img src="/style/images/pre.gif"/><?php }?></a></li>
        <?php if (($_smarty_tpl->tpl_vars['key']->value+1)%9==0&&!$_smarty_tpl->getVariable('smarty')->value['foreach']['f']['last']){?>
        </ul><ul class="fn-clear">
        <?php }?>
        <?php } ?>
    </ul>
</div>
<script type="text/javascript">
    $('.period').bind('click',function(){
        $(this).toggleClass('toggle_close');
        $(this).parent().toggleClass('toggle_qishu');
    })
</script>
<?php }?><?php }} ?>