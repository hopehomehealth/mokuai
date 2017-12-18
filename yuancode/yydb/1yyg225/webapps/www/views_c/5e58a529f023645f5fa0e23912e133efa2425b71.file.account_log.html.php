<?php /* Smarty version Smarty-3.1.13, created on 2016-03-22 22:32:06
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\member\account_log.html" */ ?>
<?php /*%%SmartyHeaderCode:243625661049db34fa5-35612348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e58a529f023645f5fa0e23912e133efa2425b71' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\member\\account_log.html',
      1 => 1458651567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243625661049db34fa5-35612348',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5661049dd96315_47180235',
  'variables' => 
  array (
    'page_total' => 0,
    'total' => 0,
    'L' => 0,
    'row' => 0,
    'stages' => 0,
    'm' => 0,
    'points' => 0,
    'sortorder' => 0,
    'list' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5661049dd96315_47180235')) {function content_5661049dd96315_47180235($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h3 class="info-tag">
    明细列表(共<?php echo $_smarty_tpl->tpl_vars['page_total']->value;?>
个明细)<span></span>&nbsp;&nbsp;&nbsp;&nbsp;
    <b>资金总计: </b>
    第三方支付￥<span><?php echo $_smarty_tpl->tpl_vars['total']->value['amount'];?>
</span>
    可用余额￥<span><?php echo $_smarty_tpl->tpl_vars['total']->value['user_money'];?>
</span>
    冻结余额￥<span><?php echo $_smarty_tpl->tpl_vars['total']->value['frozen_money'];?>
</span>
    <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
 <span><?php echo $_smarty_tpl->tpl_vars['total']->value['db_points'];?>
</span>
</h3>

<div class="html-box">

    <form class="cond-form clear" action="#!member/account_log/<?php echo $_smarty_tpl->tpl_vars['row']->value['mid'];?>
" id="searchForm" method="get">
        <input type="hidden" value="" name="page" id="page">
        <input type="hidden" value="<?php echo $_GET['mid'];?>
" name="mid">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="desc" <?php if ($_GET['k']=='desc'){?>selected<?php }?>>描述</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_GET['q'];?>
" type="text">
            <div class="l">
                <select name="stage">
                    <option value="">-操作类型-</option>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['key'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['key']==$_GET['stage']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</option>
                    <?php } ?>
                </select>
            </div>
            <div class="l">
                <select name="points">
                    <option value="">-币值-</option>
                    <option value="amount"<?php if ($_smarty_tpl->tpl_vars['points']->value=='amount'){?> selected<?php }?>>第三方支付</option>
                    <option value="user_money"<?php if ($_smarty_tpl->tpl_vars['points']->value=='user_money'){?> selected<?php }?>>可用余额</option>
                    <option value="frozen_money"<?php if ($_smarty_tpl->tpl_vars['points']->value=='frozen_money'){?> selected<?php }?>>冻结金额</option>
                    <option value="db_points"<?php if ($_smarty_tpl->tpl_vars['points']->value=='db_points'){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</option>
                    <option value="pay_points"<?php if ($_smarty_tpl->tpl_vars['points']->value=='pay_points'){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</option>
                    <option value="rank_points"<?php if ($_smarty_tpl->tpl_vars['points']->value=='rank_points'){?> selected<?php }?>>经验值</option>
                </select>
                <select name="sortorder" id="sortorder">
                    <option value="">-排序-</option>
                    <option value="DESC" <?php if ($_smarty_tpl->tpl_vars['sortorder']->value=='DESC'){?>selected<?php }?>>降序</option>
                    <option value="ASC" <?php if ($_smarty_tpl->tpl_vars['sortorder']->value=='ASC'){?>selected<?php }?>>升序</option>
                </select>
            </div>
            <label class="ui-label w60">操作时间：</label>
            <div class="l">
                <input class="form-i w120 sitem" name="start_time" value="<?php echo $_GET['start_time'];?>
" autocomplete="off" onclick="WdatePicker()" type="text">
                <input style="margin-left:-1px" class="form-i w120 sitem" name="end_time" value="<?php echo $_GET['end_time'];?>
" autocomplete="off" onclick="WdatePicker()" type="text">
            </div>
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue e2-member-searchlog-1">搜索</button>
        </div>
    </form>

    <table class="list">
        <thead>
        <tr>
            <th class="w40">ID</th>
            <th>会员名</th>
            <th class="w80">第三方支付</th>
            <th class="w80">可用余额</th>
            <th class="w80">冻结金额</th>
            <th class="w80"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</th>
            <th class="w80"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</th>
            <th class="w80">经验值</th>
            <th class="w160">操作类型</th>
            <th class="w160">操作时间</th>
            <th class="title">操作描述</th>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <tr class="opera">
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['amount']>0){?><b class="c-green"><?php echo $_smarty_tpl->tpl_vars['m']->value['amount'];?>
</b><?php }elseif($_smarty_tpl->tpl_vars['m']->value['amount']<0){?><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['amount'];?>
</b><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['amount'];?>
<?php }?></td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['user_money']>0){?><b class="c-green"><?php echo $_smarty_tpl->tpl_vars['m']->value['user_money'];?>
</b><?php }elseif($_smarty_tpl->tpl_vars['m']->value['user_money']<0){?><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['user_money'];?>
</b><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['user_money'];?>
<?php }?></td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['frozen_money']>0){?><b class="c-green"><?php echo $_smarty_tpl->tpl_vars['m']->value['frozen_money'];?>
</b><?php }elseif($_smarty_tpl->tpl_vars['m']->value['frozen_money']<0){?><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['frozen_money'];?>
</b><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['frozen_money'];?>
<?php }?></td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['db_points']>0){?><b class="c-green"><?php echo $_smarty_tpl->tpl_vars['m']->value['db_points'];?>
</b><?php }elseif($_smarty_tpl->tpl_vars['m']->value['db_points']<0){?><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['db_points'];?>
</b><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['db_points'];?>
<?php }?></td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['pay_points']>0){?><b class="c-green"><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_points'];?>
</b><?php }elseif($_smarty_tpl->tpl_vars['m']->value['pay_points']<0){?><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_points'];?>
</b><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_points'];?>
<?php }?></td>
            <td><?php if ($_smarty_tpl->tpl_vars['m']->value['rank_points']>0){?><b class="c-green"><?php echo $_smarty_tpl->tpl_vars['m']->value['rank_points'];?>
</b><?php }elseif($_smarty_tpl->tpl_vars['m']->value['rank_points']<0){?><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['rank_points'];?>
</b><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['rank_points'];?>
<?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['stage'];?>
</td>
            <td><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['logtime']);?>
</td>
            <td class="title"><?php echo $_smarty_tpl->tpl_vars['m']->value['desc'];?>
</td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php echo $_smarty_tpl->tpl_vars['page']->value;?>


</div>

<script src="/js/manage/member.js"></script>

<script>
    $.loadJs('/admin/js/manage/member.js',function(){
    });
    var menus = $('#page_container a'), i;
    for(i = 0;i < menus.length;i++){
        menus[i].onclick = function() {
            var page = this.rel;
            member.search(page);
        }
    }
</script>
<?php }} ?>