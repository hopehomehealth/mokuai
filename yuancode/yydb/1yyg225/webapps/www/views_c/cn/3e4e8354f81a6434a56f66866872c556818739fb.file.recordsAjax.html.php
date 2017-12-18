<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:45:30
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\content\recordsAjax.html" */ ?>
<?php /*%%SmartyHeaderCode:18820565d885a01f1b8-95883798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e4e8354f81a6434a56f66866872c556818739fb' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\content\\recordsAjax.html',
      1 => 1446428290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18820565d885a01f1b8-95883798',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'k' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d885a098340_36422108',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d885a098340_36422108')) {function content_565d885a098340_36422108($_smarty_tpl) {?><table class="records_list" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <td>云购时间</td>
        <td>会员帐号</td>
        <td>云购商品名称</td>
        <td>云购人次</td>
    </tr>
    </thead>
    <tbody>
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
    <tr<?php if ($_smarty_tpl->tpl_vars['k']->value%2==1){?> class="odd"<?php }?>>
        <td><?php if ($_smarty_tpl->tpl_vars['m']->value['db_time']){?><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'Y-m-d H:i:s.x');?>
<?php }?></td>
        <td><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
" target="_blank" class="a1"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></td>
        <td><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" class="a2">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a></td>
        <td><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</td>
    </tr>
    <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
    <tr><td colspan="4">暂无云购记录！</td></tr>
    <?php } ?>
    </tbody>
</table>
<?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#load_records').find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"<span class='loading'>拼命加载中...</span>",
            target:'#load_records'
        }).bind('click',function(){
            $('html').animate({ scrollTop: '0' }, 500);
        });
    });
</script><?php }} ?>