<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 15:02:20
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/member_rank.html" */ ?>
<?php /*%%SmartyHeaderCode:13478799035849057c0ebe83-91743585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98db40962ba2754f548f4d344e7f207f7f9ad15c' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/member_rank.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13478799035849057c0ebe83-91743585',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5849057c188a07_84286989',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5849057c188a07_84286989')) {function content_5849057c188a07_84286989($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form name="formlist" target="iframeNewsTarget" method="post" action="">
    <table class="list">
        <thead>
            <tr>
                <th class="w30">ID</th>
                <th align="left">会员等级</th>
                <th class="w120">积分下限</th>
                <th class="w120">积分上限</th>
                <th class="w80">特殊会员组</th>
                <th class="w120">允许分享次数</th>
                <th class="w100">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <tr>
                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['rank_name'];?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['min_points'];?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['max_points'];?>
</td>
                <td align='center'>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['special']==1){?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','member_rank','special')" class="c-green" title="点击设为否">是</a>
                    <?php }else{ ?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
','member_rank','special')" class="c-red" title="点击设为是">否</a>
                    <?php }?>
                </td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['allow_time'];?>
</td>
                <td class='opera' align='center' nowrap>
                    <a href='#!member_rank/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&com=xshow|编辑会员等级（<?php echo $_smarty_tpl->tpl_vars['m']->value['rank_name'];?>
）' class='iconfont icon-a' title='编辑'>&#xe603;</a>
                    <a href='javascript:;' onclick="main.confirm_del('member_rank/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="foot-btn">
        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
    </div>
    </form>
</div>

<?php }} ?>