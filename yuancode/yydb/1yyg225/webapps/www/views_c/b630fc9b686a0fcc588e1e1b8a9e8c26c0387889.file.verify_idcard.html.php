<?php /* Smarty version Smarty-3.1.13, created on 2017-01-12 14:49:12
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/member/verify_idcard.html" */ ?>
<?php /*%%SmartyHeaderCode:17582809875845208c26c5f5-86143312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b630fc9b686a0fcc588e1e1b8a9e8c26c0387889' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/member/verify_idcard.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17582809875845208c26c5f5-86143312',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5845208c3e9432_54759224',
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'status' => 0,
    'list' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5845208c3e9432_54759224')) {function content_5845208c3e9432_54759224($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">

    <form class="cond-form clear" action="#!member/verify_idcard" id="searchForm" method="get">
        <input type="hidden" value="" name="page" id="page">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='username'){?>selected<?php }?>>会员名</option>
                <option value="mid" <?php if ($_smarty_tpl->tpl_vars['k']->value=='mid'){?>selected<?php }?>>会员ID</option>
                <option value="card" <?php if ($_smarty_tpl->tpl_vars['k']->value=='card'){?>selected<?php }?>>身份证号</option>
                <option value="realname" <?php if ($_smarty_tpl->tpl_vars['k']->value=='realname'){?>selected<?php }?>>真实姓名</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <div class="l">
                <select name="status">
                    <option value="">-状态-</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value=='1'){?>selected<?php }?>>待审核</option>
                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value=='2'){?>selected<?php }?>>已通过</option>
                    <option value="3" <?php if ($_smarty_tpl->tpl_vars['status']->value=='3'){?>selected<?php }?>>未通过</option>
                </select>
            </div>
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue e2-member-searchlog-1">搜索</button>
        </div>
    </form>

    <table class="list">
        <thead>
        <tr>
            <th class="w30">ID</th>
            <th class="w120">会员名/手机</th>
            <th class="w200"><b class="c-orange">认证姓名</b>/身份证号</th>
            <th>身份证图片</th>
            <th class="w120">提交时间</th>
            <th class="w80">状态</th>
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
            <td><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
</td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
 <span class="c-gray">(<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
)</span>
                <br /><?php echo $_smarty_tpl->tpl_vars['m']->value['mobile'];?>

                <?php if ($_smarty_tpl->tpl_vars['m']->value['is_voice']==1){?>
                <span class='iconfont icon-a c-orange' title='已语音验证'>&#xe63b;</span>
                <?php }else{ ?>
                <span class='iconfont icon-a' title='短信验证'>&#xe612;</span>
                <?php }?>
            </td>
            <td>
                <b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['realname'];?>
</b><br /><?php echo $_smarty_tpl->tpl_vars['m']->value['card'];?>
<a href="http://www.baidu.com/s?wd=%E8%BA%AB%E4%BB%BD%E8%AF%81%E5%8F%B7%E7%A0%81%E6%9F%A5%E8%AF%A2&rsv_spt=1&issp=1&f=3&rsv_bp=0&rsv_idx=2&ie=utf-8&tn=baiduhome_pg&rsv_enter=1&rsv_sug3=21&rsv_sug6=7&rsv_sug1=19&rsv_pq=ce6639f2000c9926&rsv_t=eb5dsKSUWglHCEVkd%2FKpBAt37VsPobuWgLu%2B6n7tRJrJ9fb4wNWK9jOsG5vVUsvm7wMJ&oq=%E8%BA%AB%E4%BB%BD%E8%AF%81%E5%8F%B7&rsv_sug2=1&rsp=0&inputT=5437&rsv_sug4=5437&qq-pf-to=pcqq.discussion" target="_blank">检测</a>
            </td>
            <td align="center"><img src="<?php echo picurl($_smarty_tpl->tpl_vars['m']->value['card_image'],1);?>
" width="100" /></td>
            <td nowrap><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==1){?>
                <span class="c-red">待审核</span>
                <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==2){?>
                <span class="c-green">已审核</span>
                <?php }else{ ?>
                <span class="c-gary">未通过</span>
                <?php }?>
            </td>
            <td><a href="#!member/verify_idcard_edit/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">查看</a> </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="foot-btn">
        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
    </div>
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