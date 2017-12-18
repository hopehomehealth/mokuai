<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 15:20:05
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/withdraw_commission.html" */ ?>
<?php /*%%SmartyHeaderCode:1668990716584909a5c46577-89078617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b88527befcee599ba55076c8c954c668a5f19ae' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/withdraw_commission.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1668990716584909a5c46577-89078617',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_total' => 0,
    'total' => 0,
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584909a5cdec35_88202047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584909a5cdec35_88202047')) {function content_584909a5cdec35_88202047($_smarty_tpl) {?><h3 class="info-tag">
    提现列表(共<?php echo $_smarty_tpl->tpl_vars['page_total']->value;?>
个记录) 佣金统计:<span>￥<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>
</h3>

<div class="html-box">
    <form class="cond-form clear" action="#!member/commission" id="searchForm" method="get">
        <input type="hidden" value="" name="page" id="page">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="username" <?php if ($_GET['k']=='username'){?>selected<?php }?>>会员名</option>
                <option value="bankname" <?php if ($_GET['k']=='bankname'){?>selected<?php }?>>提现银行</option>
                <option value="bankcard" <?php if ($_GET['k']=='bankcard'){?>selected<?php }?>>提现账号</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="" type="text">
            <label class="ui-label w60">操作时间：</label>
            <div class="l">
                <input class="form-i w120 sitem" name="start_time" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_GET['start_time']);?>
" type="text" autocomplete="off" onclick="WdatePicker()">
                <input style="margin-left:-1px" class="form-i w120 sitem" name="end_time" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_GET['end_time']);?>
" type="text"  autocomplete="off" onclick="WdatePicker()">
            </div>
            <label class="ui-label w60">状态：</label>
            <div class="l">
                <select name="status">
                    <option value="">请选择</option>
                    <option value="1" <?php if ($_GET['status']==1){?>selected<?php }?>>待处理</option>
                    <option value="2" <?php if ($_GET['status']==2){?>selected<?php }?>>处理中</option>
                    <option value="3" <?php if ($_GET['status']==3){?>selected<?php }?>>已处理</option>
                </select>
            </div>
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue e2-member-searchlog-1">搜索</button>
        </div>
    </form>

    <table class="list" style="width:100%">
        <tr>
            <th class="w40"><input type="checkbox" class="checkall"></th>
            <th class="w40">ID</th>
            <th class="w80">会员名称</th>
            <th class="w80">提现银行</th>
            <th class="w80">提现账号</th>
            <th class="w80">提现佣金(元)</th>
            <th class="w80">手续费(元)</th>
            <th class="w80">营业税(元)</th>
            <th class="w80">所得税(元)</th>
            <th class="w80">到账金额(元)</th>
            <th class="w160">状态</th>
            <th class="w160">操作时间</th>
            <th>操作</th>
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
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['bankname'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['bankcard'];?>
</td>
            <td><b style="color:#f80"><?php echo $_smarty_tpl->tpl_vars['m']->value['commission'];?>
</b></td>
            <td><b style="color:#f80"><?php echo $_smarty_tpl->tpl_vars['m']->value['fee'];?>
</b></td>
            <td><b style="color:#f80"><?php echo $_smarty_tpl->tpl_vars['m']->value['sales_tax'];?>
</b></td>
            <td><b style="color:#f80"><?php echo $_smarty_tpl->tpl_vars['m']->value['income_tax'];?>
</b></td>
            <td><b style="color:#f80"><?php echo $_smarty_tpl->tpl_vars['m']->value['amount'];?>
</b></td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>待处理<?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==2){?>处理中<?php }else{ ?>已处理<?php }?></td>
            <td><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</td>
            <td><a href="#!member/withdraw_commission_edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
?com=xshow|申请佣金提现">查看</a></td>
        </tr>
        <?php } ?>
    </table>
    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

</div>

<script src="/js/manage/member.js"></script><?php }} ?>