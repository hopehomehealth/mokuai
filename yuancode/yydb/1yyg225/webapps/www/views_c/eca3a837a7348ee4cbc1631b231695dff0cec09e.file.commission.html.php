<?php /* Smarty version Smarty-3.1.13, created on 2017-01-12 15:27:38
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/commission.html" */ ?>
<?php /*%%SmartyHeaderCode:794745070584905801a5aa1-32099089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eca3a837a7348ee4cbc1631b231695dff0cec09e' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/commission.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '794745070584905801a5aa1-32099089',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58490580210843_76055968',
  'variables' => 
  array (
    'page_total' => 0,
    'total' => 0,
    'q' => 0,
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58490580210843_76055968')) {function content_58490580210843_76055968($_smarty_tpl) {?><h3 class="info-tag">
    明细列表(共<?php echo $_smarty_tpl->tpl_vars['page_total']->value;?>
个记录) 佣金统计:<span>￥<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>
</h3>

<div class="html-box">
    <form class="cond-form clear" action="#!member/commission" id="searchForm" method="get">
        <input type="hidden" value="" name="page" id="page">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="username" <?php if ($_GET['k']=='username'){?>selected<?php }?>>会员名</option>
                <option value="mid" <?php if ($_GET['k']=='mid'){?>selected<?php }?>>会员ID</option>
                <option value="ivt_username" <?php if ($_GET['k']=='ivt_username'){?>selected<?php }?>>被邀请会员</option>
                <option value="ivt_mid" <?php if ($_GET['k']=='ivt_mid'){?>selected<?php }?>>被邀请会员ID</option>
                <option value="desc" <?php if ($_GET['k']=='desc'){?>selected<?php }?>>描述</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <label class="ui-label w60">操作时间：</label>
            <div class="l">
                <input class="form-i w120 sitem" name="start_time" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_GET['start_time']);?>
" type="text" autocomplete="off" onclick="WdatePicker()">
                <input style="margin-left:-1px" class="form-i w120 sitem" name="end_time" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_GET['end_time']);?>
" type="text"  autocomplete="off" onclick="WdatePicker()">
            </div>
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue e2-member-searchlog-1">搜索</button>
        </div>
    </form>

    <table class="list" style="width:100%">
        <tr>
            <th class="w40"><input type="checkbox" class="checkall"></th>
            <th class="w40">ID</th>
            <th class="w80">会员名称</th>
            <th class="w80">被邀请会员</th>
            <th class="w80">订单总价</th>
            <th class="w80">获取佣金</th>
            <th>描述</th>
            <th class="w160">操作时间</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <tr class="opera">
            <td><input type="checkbox" name="id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"></td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
<span class="c-gray"> (<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
)</span></td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['ivt_username'];?>
<span class="c-gray"> (<?php echo $_smarty_tpl->tpl_vars['m']->value['ivt_mid'];?>
)</span></td>
            <td><b style="color:#f80"><?php echo $_smarty_tpl->tpl_vars['m']->value['total'];?>
</b></td>
            <td><b style="color:#f80"><?php echo $_smarty_tpl->tpl_vars['m']->value['commission'];?>
</b></td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['desc'];?>
</td>
            <td><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</td>
        </tr>
        <?php } ?>
    </table>
    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

</div>

<script src="/js/manage/member.js"></script><?php }} ?>