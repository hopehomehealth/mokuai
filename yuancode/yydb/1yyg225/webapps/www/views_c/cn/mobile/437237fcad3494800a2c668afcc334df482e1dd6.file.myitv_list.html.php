<?php /* Smarty version Smarty-3.1.13, created on 2016-04-15 16:34:09
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\myitv_list.html" */ ?>
<?php /*%%SmartyHeaderCode:2743256f0be5b4e7091-95522591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '437237fcad3494800a2c668afcc334df482e1dd6' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\myitv_list.html',
      1 => 1458650126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2743256f0be5b4e7091-95522591',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56f0be5b600eb1_51987855',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f0be5b600eb1_51987855')) {function content_56f0be5b600eb1_51987855($_smarty_tpl) {?><table cellpadding="0" cellspcing="0">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <tr>
        <th>注册会员</th>
        <td>
            <?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
 <span style="color: #999; font-size: 10px;">[<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['c_time']);?>
]</span>
            <?php if (isset($_smarty_tpl->tpl_vars['m']->value['is_award'])){?>
            <?php if ($_smarty_tpl->tpl_vars['m']->value['is_award']==0){?>
            <a id="mid<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
" class="btn-small" href="javascript:;" onclick="award_btn('<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
')">领取<?php echo $_smarty_tpl->tpl_vars['site_config']->value['ivt1'];?>
拍币</a>
            <?php }else{ ?>
            <a class="btn-small btn-disable" href="javascript:;">已领取</a>
            <?php }?>
            <?php }?>
        </td>
    </tr>
    <?php } ?>
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