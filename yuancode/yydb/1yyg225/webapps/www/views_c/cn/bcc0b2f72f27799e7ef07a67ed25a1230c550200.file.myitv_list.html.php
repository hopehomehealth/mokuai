<?php /* Smarty version Smarty-3.1.13, created on 2016-12-26 20:30:46
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/member/myitv_list.html" */ ?>
<?php /*%%SmartyHeaderCode:212884585758610d76d12060-85759291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcc0b2f72f27799e7ef07a67ed25a1230c550200' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/member/myitv_list.html',
      1 => 1481177860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212884585758610d76d12060-85759291',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'site_config' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58610d76d9aa16_57602147',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58610d76d9aa16_57602147')) {function content_58610d76d9aa16_57602147($_smarty_tpl) {?><table>
    <tbody>
    <tr>
        <th>注册会员</th>
        <th>注册时间</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <tr>
        <td class="username"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</td>
        <td>
            <?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['c_time']);?>

            <?php if (isset($_smarty_tpl->tpl_vars['m']->value['is_award'])){?>
            <?php if ($_smarty_tpl->tpl_vars['m']->value['is_award']==0){?>
            <a id="mid<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
" class="hy-btn2" href="javascript:;" onclick="award_btn('<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
')">领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['ivt1'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a>
            <?php }else{ ?>
            <a class="hy-btn1" href="javascript:;">已领取</a>
            <?php }?>
            <?php }?>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>

<?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#load_'+'<?php echo $_GET['type'];?>
').find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"<span class='loading'>拼命加载中...</span>",
            target:'#load_'+'<?php echo $_GET['type'];?>
',
            success:function(){ }
        });
    });
</script><?php }} ?>