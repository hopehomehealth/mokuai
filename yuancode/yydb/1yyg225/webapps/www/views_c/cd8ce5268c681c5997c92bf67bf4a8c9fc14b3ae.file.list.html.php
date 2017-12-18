<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 11:13:20
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/list.html" */ ?>
<?php /*%%SmartyHeaderCode:109480766958451fd96cd679-35683130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd8ce5268c681c5997c92bf67bf4a8c9fc14b3ae' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/list.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109480766958451fd96cd679-35683130',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451fd97e32e4_37821747',
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'ranklist' => 0,
    'm' => 0,
    'rank_id' => 0,
    'online' => 0,
    'status' => 0,
    'verify_mobile' => 0,
    'sortby' => 0,
    'L' => 0,
    'sortorder' => 0,
    'list' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451fd97e32e4_37821747')) {function content_58451fd97e32e4_37821747($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form class="cond-form clear" action="#!member/index" onsubmit="return xForm.submit(this)">
        <input type="hidden" value="" name="page" id="page">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='username'){?>selected<?php }?>>用户名</option>
                <option value="nickname" <?php if ($_smarty_tpl->tpl_vars['k']->value=='nickname'){?>selected<?php }?>>昵称</option>
                <option value="realname" <?php if ($_smarty_tpl->tpl_vars['k']->value=='realname'){?>selected<?php }?>>姓名</option>
                <option value="itv" <?php if ($_smarty_tpl->tpl_vars['k']->value=='itv'){?>selected<?php }?>>推荐人</option>
                <option value="mobile" <?php if ($_smarty_tpl->tpl_vars['k']->value=='mobile'){?>selected<?php }?>>手机</option>
                <option value="email" <?php if ($_smarty_tpl->tpl_vars['k']->value=='email'){?>selected<?php }?>>邮箱</option>
                <option value="ip" <?php if ($_smarty_tpl->tpl_vars['k']->value=='ip'){?>selected<?php }?>>IP</option>
                <option value="mid" <?php if ($_smarty_tpl->tpl_vars['k']->value=='mid'){?>selected<?php }?>>ID</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <select name="rank_id">
                <option value="">-所有等级-</option>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ranklist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['id']==$_smarty_tpl->tpl_vars['rank_id']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['rank_name'];?>
</option>
                <?php } ?>
            </select>
            <select name="online">
                <option value="">-在线状态-</option>
                <option value="1" <?php if (1==$_smarty_tpl->tpl_vars['online']->value){?>selected<?php }?>>在线</option>
            </select>
            <select name="status">
                <option value="">-用户状态-</option>
                <option value="99" <?php if (99==$_smarty_tpl->tpl_vars['status']->value){?>selected<?php }?>>禁用</option>
                <option value="1" <?php if (1==$_smarty_tpl->tpl_vars['status']->value){?>selected<?php }?>>开启</option>
            </select>
            <select name="verify_mobile">
                <option value="">-手机状态-</option>
                <option value="99" <?php if (99==$_smarty_tpl->tpl_vars['verify_mobile']->value&&isset($_smarty_tpl->tpl_vars['verify_mobile']->value)){?>selected<?php }?>>待认证</option>
                <option value="1" <?php if (1==$_smarty_tpl->tpl_vars['verify_mobile']->value&&isset($_smarty_tpl->tpl_vars['verify_mobile']->value)){?>selected<?php }?>>已认证</option>
                <option value="-1" <?php if (-1==$_smarty_tpl->tpl_vars['verify_mobile']->value&&isset($_smarty_tpl->tpl_vars['verify_mobile']->value)){?>selected<?php }?>>未拨通</option>
            </select>
            <label class="ui-label w60">注册时间：</label>
            <input class="form-i w120 sitem" name="start_time" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_GET['start_time']);?>
" type="text" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd 00:00:00' })" autocomplete="false" />
            <input style="margin-left:-1px" class="form-i w120 sitem" name="end_time" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_GET['end_time']);?>
" type="text" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd 23:59:59' })" autocomplete="false" />

            <select name="sortby" id="sortby">
                <option value="a.mid" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='mid'){?>selected<?php }?>>ID</option>
                <option value="a.user_money" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='user_money'){?>selected<?php }?>>可用余额</option>
                <option value="a.frozen_money" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='frozen_money'){?>selected<?php }?>>冻结余额</option>
                <option value="a.db_points" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='db_points'){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</option>
                <option value="a.pay_points" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='pay_points'){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</option>
                <option value="a.ivt_count" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='ivt_count'){?>selected<?php }?>>推荐数</option>
            </select>
            <select name="sortorder" id="sortorder">
                <option value="DESC" <?php if ($_smarty_tpl->tpl_vars['sortorder']->value=='DESC'){?>selected<?php }?>>降序</option>
                <option value="ASC" <?php if ($_smarty_tpl->tpl_vars['sortorder']->value=='ASC'){?>selected<?php }?>>升序</option>
            </select>

            <button type="submit" id="submit" style="margin:1px 20px 0 10px;float:left;" class="uiBtn BtnBlue" onclick="if($('#batch').val()){ if(!confirm('确认此批量操作吗？')) return false; }">搜索</button>
        </div>
    </form>

    <div class="tips">
        <span id="online">在线人数统计中...</span>
    </div>

    <table class="list">
        <thead>
        <tr>
            <th class="w30"><input type="checkbox" class="checkall"></th>
            <th class="w30">ID</th>
            <th align="left" colspan="2">用户名</th>
            <th align="left">昵称/<span class="c-orange">姓名</span></th>
            <th align="left">手机/邮箱</th>
            <th align="center">推荐人/推荐数</th>
            <th class="w100">可用/冻结余额</th>
            <th class="w100"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
/<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</th>
            <th class="w80">可用佣金</th>
            <th class="w140">状态/创建时间/注册IP</th>
            <th class="w160">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <tr>
            <td align='center'><input type="checkbox" name="id" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
"></td>
            <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
</td>
            <td width="50"><img src="<?php echo photo($_smarty_tpl->tpl_vars['m']->value['photo']);?>
" width="50" style="border-radius: 50%" /></td>
            <td align='left'>
                <a href="<?php echo @constant('RootUrl');?>
welcome/auth_login/<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
" target="_blank" title="点击直接登录"><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
</a><br />
                <?php if ($_smarty_tpl->tpl_vars['m']->value['online']==1){?>
                <span class="c-orange">在线</span>
                <?php }else{ ?>
                <span class="c-disable">离线</span>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['oauth_login']){?>
                <img src="/images/qq.png" style="vertical-align: middle" title="QQ登录用户" />
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['is_robots']){?>
                <img src="/admin/images/robots.png" style="vertical-align: middle" title="机器人" />
                <?php }?>
            </td>
            <td align='left'><?php if ($_smarty_tpl->tpl_vars['m']->value['nickname']){?><a href="<?php echo @constant('RootUrl');?>
welcome/auth_login/<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
" target="_blank" title="点击直接登录"><?php echo $_smarty_tpl->tpl_vars['m']->value['nickname'];?>
</a><br /><?php }?><span class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['realname'];?>
</span></td>
            <td align='left'>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['mobile'];?>

                <?php if ($_smarty_tpl->tpl_vars['m']->value['verify_mobile']==1){?>
                <a class="c-green" href="#!member/edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
?act=mobile&com=xshow|手机状态">已认证</a>
                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['verify_mobile']==-1){?>
                <a class="c-orange" href="#!member/edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
?act=mobile&com=xshow|手机状态">未拨通</a>
                <?php }else{ ?>
                <a class="c-gray" href="#!member/edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
?act=mobile&com=xshow|手机状态">待认证</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['email']){?>
                <br />
                <?php echo $_smarty_tpl->tpl_vars['m']->value['email'];?>

                <?php if ($_smarty_tpl->tpl_vars['m']->value['verify_email']==1){?>
                <span class="c-green">已认证</span>
                <?php }?>
                <?php }?>
            </td>
            <td align='center'><a href="#!member/index?k=itv&q=<?php echo $_smarty_tpl->tpl_vars['m']->value['ivt_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['ivt_name'];?>
</a> / <a href="#!member/index?k=itv&q=<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['ivt_count'];?>
</a></td>
            <td align='center'><b style="color:#f80"><?php echo $_smarty_tpl->tpl_vars['m']->value['user_money'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['m']->value['frozen_money'];?>
</b></td>
            <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_points'];?>
<br /><?php echo $_smarty_tpl->tpl_vars['m']->value['db_points'];?>
</td>
            <td align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['commission'];?>
</td>
            <td align='center'>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>
                <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
','member','status','mid')" class="c-green" title="点击禁用">开启</a>
                <?php }else{ ?>
                <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
','member','status','mid')" class="c-red" title="点击开启">禁用</a>
                <?php }?>
                <span class="c-gray"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['c_time'],'Y-m-d H:i');?>
</span><br>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['ip'];?>

            </td>
            <td class="opera" nowrap>
                <a class="uiBtn" href="#!member/edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
?com=xshow|会员信息">编辑</a>
                <a class="uiBtn" href="#!member/address/<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
?com=xshow|收货地址">收货</a>
                <a class="uiBtn" href="#!member/bankcard/<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
?com=xshow|银行账号">银行</a>
                <a class="uiBtn" href="#!member/account_log/?mid=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
">明细</a>
                <p style="height:5px;"></p>
                <a class="uiBtn" href="#!member/change_account/<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
?com=xshow|调整账户">调整</a>
                <a class="uiBtn" href="#!auction/log?k=bid_user&q=<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
">竞拍</a>
                <a class="uiBtn" href="#!yunbuy/order?k=username&q=<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a>
                <a class="uiBtn" href="#!order/index?k=username&q=<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
">订单</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="foot-btn">
        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
        <select id="type">
            <option value="1" selected>当前勾选的</option>
            <option value="2">所有筛选的</option>
        </select>
        <a class="uiBtn BtnBlue e2-member-batchDelete-1" href="javascript:;">禁用</a>
    </div>
</div>

<script type="text/javascript">
    var checkboxs=document.getElementsByName("id");
    $('.checkall').click(function(){
        var checkboxs=document.getElementsByName("id");
        for (var i=0;i<checkboxs.length;i++) {
            var e=checkboxs[i];
            e.checked=!e.checked;
        }
    });
    $.loadJs('/admin/js/manage/member.js',function(){
        member.online();
        /*window.setInterval(function(){
            member.online();
        },10000);*/
    });
</script>
<script type="text/javascript">
    function exportExcel(){
        var arr = location.hash.split("?");
        var get = arr[1]?('?'+arr[1]):'';
        if(!get){
            com.xtip('导出量较大，请先进行筛选操作！',{ type:1 });
        }else{
            location.href='/manage/member/exportExcel'+get;
        }
    }
</script>
<?php }} ?>