<?php /* Smarty version Smarty-3.1.13, created on 2017-02-24 19:11:56
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/content/windjxajaxindex.html" */ ?>
<?php /*%%SmartyHeaderCode:1769706177584d46f9c11293-83603306%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5aec13d94ad8b8ff6f05faeca2c52890e4c39e4c' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/content/windjxajaxindex.html',
      1 => 1487758180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1769706177584d46f9c11293-83603306',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584d46f9c68484_05476668',
  'variables' => 
  array (
    'listDjx' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584d46f9c68484_05476668')) {function content_584d46f9c68484_05476668($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['listDjx']->value['list']){?>
<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listDjx']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['wait_status']==0){?>
<div class="item itemDjx" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" id="itemDjx<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" q="<?php echo $_smarty_tpl->tpl_vars['m']->value['qihao'];?>
">
    <div class="icon"></div>
    <div class="pic">
        <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>102,'height'=>102,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" /></a>
    </div>
    <p><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><!--<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu_name'];?>
 --><?php if ($_smarty_tpl->tpl_vars['m']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
<?php }?></a></p>

    商品总需：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</span>人次<br>
    <span class="color03">已满员</span><br>
    <div class="jx-count">
        <label>剩余时间：</label>
        <strong id="leftTimeJx<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
">00:00:00</strong>
    </div>
    <div class="jx-count jx-ing" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_kaijiang'];?>
计算中...</div>
    <script type="text/javascript">
        $(document).ready(function(){
            onload_leftTime_jx('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
',"<?php echo $_smarty_tpl->tpl_vars['m']->value['has_time'];?>
",'index');
        });
    </script>
</div>
<?php }?>
<?php } ?>
<?php }?><?php }} ?>