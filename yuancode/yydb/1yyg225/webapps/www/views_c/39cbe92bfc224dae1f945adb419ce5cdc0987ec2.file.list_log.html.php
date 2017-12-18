<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 14:07:20
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\auction\list_log.html" */ ?>
<?php /*%%SmartyHeaderCode:1206556610a243872e0-13533814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39cbe92bfc224dae1f945adb419ce5cdc0987ec2' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\auction\\list_log.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1206556610a243872e0-13533814',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610a24730208_75424672',
  'variables' => 
  array (
    'k' => 0,
    'L' => 0,
    'q' => 0,
    'title' => 0,
    'username' => 0,
    'status' => 0,
    'frozen' => 0,
    'sortby' => 0,
    'sortorder' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610a24730208_75424672')) {function content_56610a24730208_75424672($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <div class="f-unit clear">
        <form class="cond-form" action="#!auction/log" onsubmit="return xForm.submit(this)">
            <div class="clear">
                <select name="k" id="k">
                    <option value="act_id" <?php if ($_smarty_tpl->tpl_vars['k']->value=='act_id'){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
商品ID</option>
                    <option value="bid_user" <?php if ($_smarty_tpl->tpl_vars['k']->value=='bid_user'){?>selected<?php }?>>会员ID</option>
                </select>
                <input id="q" class="form-i w100 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
                <label class="l">&nbsp;商品名称：</label>
                <input id="title" class="form-i w160 sitem" name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" type="text">
                <label class="l">&nbsp;用户名：</label>
                <input id="username" class="form-i w100 sitem" name="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" type="text">
                <select name="status">
                    <option value="99">-<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
状态-</option>
                    <option value="<?php echo @constant('OKWIN');?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('OKWIN')){?>selected<?php }?>>已<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
，未领取</option>
                    <option value="<?php echo @constant('FINWIN');?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('FINWIN')){?>selected<?php }?>>已<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
，已领取</option>
                    <option value="<?php echo @constant('DEFWIN');?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('DEFWIN')){?>selected<?php }?>>等待开奖</option>
                    <option value="<?php echo @constant('NOWIN');?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('NOWIN')){?>selected<?php }?>>未<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
</option>
                    <option value="<?php echo @constant('DISWIN');?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('DISWIN')){?>selected<?php }?>>已失效</option>
                </select>
                <label class="l">&nbsp;出价时间：</label>
                <input class="form-i w80 sitem" name="start_time" value="<?php echo get('start_time');?>
" type="text" onclick="WdatePicker()">
                <input style="margin-left:-1px" class="form-i w80 sitem" name="end_time" value="<?php echo get('end_time');?>
" type="text" onclick="WdatePicker()">
                <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
            </div>
            <div class="clear">
                <select name="frozen" id="frozen">
                    <option value="">-解冻状态-</option>
                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['frozen']->value=='1'){?>selected<?php }?>>已解冻</option>
                    <option value="99" <?php if ($_smarty_tpl->tpl_vars['frozen']->value=='99'){?>selected<?php }?>>未解冻</option>
                    <option value="98" <?php if ($_smarty_tpl->tpl_vars['frozen']->value=='98'){?>selected<?php }?>>待解冻</option>
                </select>
                <select name="sortby" id="sortby">
                    <option value="log_id" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='log_id'){?>selected<?php }?>>ID</option>
                    <option value="goods_name" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='goods_name'){?>selected<?php }?>>商品名称</option>
                </select>
                <select name="sortorder" id="sortorder">
                    <option value="DESC" <?php if ($_smarty_tpl->tpl_vars['sortorder']->value=='DESC'){?>selected<?php }?>>降序</option>
                    <option value="ASC" <?php if ($_smarty_tpl->tpl_vars['sortorder']->value=='ASC'){?>selected<?php }?>>升序</option>
                </select>
            </div>
        </form>
    </div>

    <form name="formlist" target="iframeNewsTarget" method="post" action="">
    <table class="list">
        <thead>
            <tr>
                <th class="w30">ID</th>
                <th align="left">商品</th>
                <th align="left" class="w120">买家 / 电话</th>
                <th class="w160">出价/<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
</th>
                <th class="w160">出价时间</th>
                <th class="w120"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
时间</th>
                <th class="w60">随机码</th>
                <th class="w80">状态</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
            <tr>
                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['log_id'];?>
</td>
                <td>
                    <a href="/auction/view/<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['cat_type']=='tiyan'){?><span class="mark">体验区</span><?php }?>
                </td>
                <td align="left" nowrap><?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
 <span class="c-gray">/</span> <?php echo $_smarty_tpl->tpl_vars['m']->value['mobile'];?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['bid_price'];?>
/<?php if ($_smarty_tpl->tpl_vars['m']->value['first']==1&&$_smarty_tpl->tpl_vars['m']->value['deposit']>0){?><?php if ($_smarty_tpl->tpl_vars['m']->value['frozen']==1){?><?php echo $_smarty_tpl->tpl_vars['m']->value['deposit'];?>
<?php }else{ ?><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['deposit'];?>
</b><?php }?><?php }else{ ?>0.00<?php }?></td>
                <td align="center"><?php echo microtime_format($_smarty_tpl->tpl_vars['m']->value['bid_time'],'Y-m-d H:i:s.x');?>
</td>
                <td align="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['cod_time'],'Y-m-d H:i:s');?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['cod'];?>
</td>
                <td align="center">
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['last_mid']==$_smarty_tpl->tpl_vars['m']->value['bid_user']){?><span class="c-orange">领先</span><br><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==@constant('NOWIN')){?><span class="c-disable">未<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
</span>
                    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==@constant('DISWIN')||$_smarty_tpl->tpl_vars['m']->value['disabled']==1){?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['log_id'];?>
','auction_log','fdis','log_id')" title="点击设为永不失效" class="c-disable">已失效</a>
                    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==@constant('OKWIN')){?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['log_id'];?>
','auction_log','fdis','log_id')" title="<?php if ($_smarty_tpl->tpl_vars['m']->value['fdis']==1){?>点击设为开奖7天后失效<?php }else{ ?>点击设为永不失效<?php }?>" class="c-red">已<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
</a>
                    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==@constant('FINWIN')){?><span class="c-green">已领奖</span>
                    <?php }else{ ?>等待开奖
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_show']==1){?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['log_id'];?>
','auction_log','is_show','log_id')" class="c-green" title="点击设为隐藏">显示</a>
                    <?php }else{ ?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['log_id'];?>
','auction_log','is_show','log_id')" class="c-red" title="点击设为显示">隐藏</a>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['m']->value['fdis']==1){?>
                    <br><span class="c-gray">永不失效</span>
                    <?php }?>
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