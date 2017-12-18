<?php /* Smarty version Smarty-3.1.13, created on 2016-03-09 10:52:10
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\member\member_account.html" */ ?>
<?php /*%%SmartyHeaderCode:224905660ff88933f07-62838228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0171ac30a5946efaee4cd5f8627bfda86e73050' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\member\\member_account.html',
      1 => 1457491916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224905660ff88933f07-62838228',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660ff88b9e412_46462910',
  'variables' => 
  array (
    'page_total' => 0,
    'total' => 0,
    'fee' => 0,
    'payment' => 0,
    'm' => 0,
    'list' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660ff88b9e412_46462910')) {function content_5660ff88b9e412_46462910($_smarty_tpl) {?><h3 class="info-tag">
    申请列表(共<?php echo $_smarty_tpl->tpl_vars['page_total']->value;?>
个记录) 金额统计:<span>￥<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span> 手续费:<span>￥<?php echo $_smarty_tpl->tpl_vars['fee']->value;?>
</span>
</h3>

<div class="html-box">
    <form class="cond-form clear" action="#!member/member_account" id="searchForm" method="get">
        <input type="hidden" value="" name="page" id="page">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="username" <?php if ($_GET['k']=='username'){?>selected<?php }?>>会员名</option>
                <option value="pay_name" <?php if ($_GET['k']=='pay_name'){?>selected<?php }?>>支付方式</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_GET['q'];?>
" type="text">
            <label class="ui-label w60">操作类型：</label>
            <div class="l">
                <select name="type">
                    <option value="">请选择</option>
                    <option value="1" <?php if ($_GET['type']==1){?>selected<?php }?>>充值</option>
                    <option value="2" <?php if ($_GET['type']==2){?>selected<?php }?>>提现</option>
                </select>
            </div>
            <label class="ui-label w60">到款状态：</label>
            <div class="l">
                <select name="status">
                    <option value="">请选择</option>
                    <option value="1" <?php if ($_GET['status']==1){?>selected<?php }?>>待付款</option>
                    <option value="2" <?php if ($_GET['status']==2){?>selected<?php }?>>已完成</option>
                    <option value="3" <?php if ($_GET['status']==3){?>selected<?php }?>>已取消</option>
                </select>
            </div>
            <label class="ui-label w60">支付方式：</label>
            <div class="l">
                <select name="pay_id">
                    <option value="">请选择</option>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['pay_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['pay_id']==$_GET['pay_id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_name'];?>
</option>
                    <?php } ?>
                </select>
            </div>
            <label class="ui-label w60">申请时间：</label>
            <div class="l">
                <input class="form-i w120 sitem" name="start_time" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_GET['start_time']);?>
" type="text" autocomplete="off" onclick="WdatePicker()">
                <input style="margin-left:-1px" class="form-i w120 sitem" name="end_time" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_GET['end_time']);?>
" type="text"  autocomplete="off" onclick="WdatePicker()">
            </div>
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue e2-member-searchlog-1">搜索</button>
        </div>
    </form>

    <table class="list">
        <thead>
        <tr>
            <th class="w30"><input type="checkbox" class="checkall"></th>
            <th class="w30">ID</th>
            <th>会员名称<?php if ($_GET['type']==1){?>/<span class="c-orange">真实姓名</span><?php }?></th>
            <th>手机</th>
            <th class="w80">操作类型</th>
            <th class="w80">金额</th>
            <th class="w100">手续费/到账</th>
            <th class="w160">支付方式<?php if ($_GET['type']==2){?>/<span class="c-orange">真实姓名</span><?php }?></th>
            <th class="w160">到款状态</th>
            <th class="w80">操作员</th>
            <th class="w120">申请时间</th>
            <th class="w80">操作</th>
        </tr>
        </thead>
        <tbody>
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
            <td><a href="#!member/edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
?act=show&com=xshow|会员信息(<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
)"><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</a> <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['realname'];?>
</b><?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['mobile'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['type']==1){?>充值<?php }else{ ?>提现<?php }?></td>
            <td><b style="color:#f80"><?php echo $_smarty_tpl->tpl_vars['m']->value['amount'];?>
</b></td>
            <td><b style="color:#f80"><?php echo $_smarty_tpl->tpl_vars['m']->value['fee'];?>
</b><?php if ($_smarty_tpl->tpl_vars['m']->value['gotime']){?><span class="c-gray"> (<?php echo $_smarty_tpl->tpl_vars['m']->value['gotime'];?>
)</span><?php }?></td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['pay_name'];?>
 <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['realname'];?>
</b><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><br/><?php echo $_smarty_tpl->tpl_vars['m']->value['user_note'];?>
<?php }?>
            </td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>待付款<?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==2){?>已完成<?php }else{ ?>已取消<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['admin_user'];?>
</td>
            <td><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
</td>
            <td>
                <a href="#!member/member_account_edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
?com=xshow|充值/提现申请"  class='iconfont icon-a' title="编辑">&#xe603;</a>
                <a onclick="main.confirm_del('member/member_account_del','<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')"  class='iconfont icon-a'  title="删除">&#xe606;</a></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="foot-btn">
        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
        <a class="uiBtn BtnGreen"  href="javascript:;" onclick="exportAccount()">导出Excel</a>&nbsp;&nbsp;<a class="uiBtn BtnBlue e2-member-batchAccount"  href="javascript:;">批量完成</a>
    </div>
</div>

<script src="/js/manage/member.js"></script>

<script>
    $.loadJs('/admin/js/manage/member.js',function(){
    });
    var checkboxs=document.getElementsByName("id");

    $('.checkall').click(function(){
        var checkboxs=document.getElementsByName("id");
        for (var i=0;i<checkboxs.length;i++) {
            var e=checkboxs[i];
            e.checked=!e.checked;
        }
    });
    function exportAccount(){
        var arr = location.hash.split("?");
        var get = arr[1]?('?'+arr[1]):'';
        if(!get){
            com.xtip('导出量较大，请先进行筛选操作！',{type:1});
        }else{
            location.href='/manage/member/export_account'+get;
        }
    }

    var menus = $('#page_container a'), i;
    for(i = 0;i < menus.length;i++){
        menus[i].onclick = function() {
            var page = this.rel;
            member.search(page);
        }
    }
</script>
<?php }} ?>