<?php /* Smarty version Smarty-3.1.13, created on 2017-02-21 17:31:46
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/yunbuy/list.html" */ ?>
<?php /*%%SmartyHeaderCode:14958022905845201ff27351-20072292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41fb2499d8575c4aac351e7e29bca180830cd885' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/yunbuy/list.html',
      1 => 1487149406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14958022905845201ff27351-20072292',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584520200f7e42_37026900',
  'variables' => 
  array (
    'k' => 0,
    'business_power' => 0,
    'q' => 0,
    'L' => 0,
    'status' => 0,
    'type' => 0,
    'posid' => 0,
    'publish' => 0,
    'price' => 0,
    'limit' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584520200f7e42_37026900')) {function content_584520200f7e42_37026900($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form class="cond-form clear" action="#!yunbuy/index" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="title" <?php if ($_smarty_tpl->tpl_vars['k']->value=='title'){?>selected<?php }?>>商品名称</option>
                <?php if ($_smarty_tpl->tpl_vars['business_power']->value){?>
                <option value="b.bus_name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='b.bus_name'){?>selected<?php }?>>商家名称</option>
                <?php }?>
                <option value="buy_id" <?php if ($_smarty_tpl->tpl_vars['k']->value=='buy_id'){?>selected<?php }?>>ID</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <select name="status">
                <option value="">-<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
状态-</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['status']->value==1){?>selected<?php }?>>进行中</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['status']->value==2){?>selected<?php }?>>已开奖</option>
                <option value="3" <?php if ($_smarty_tpl->tpl_vars['status']->value==3){?>selected<?php }?>>待揭晓</option>
                <option value="4" <?php if ($_smarty_tpl->tpl_vars['status']->value==4){?>selected<?php }?>>期数已满</option>
            </select>
            <select name="type">
                <option value="">-<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
类型-</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['type']->value==1){?>selected<?php }?>>普通</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['type']->value==2){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</option>
            </select>
            <select name="posid">
                <option value="">-推荐-</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['posid']->value==1){?>selected<?php }?>>是</option>
                <option value="99" <?php if ($_smarty_tpl->tpl_vars['posid']->value==99){?>selected<?php }?>>否</option>
            </select>
            <select name="publish">
                <option value="">发布来源</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['publish']->value==1){?> selected<?php }?>>后台发布</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['publish']->value==2){?> selected<?php }?>>商家发布</option>
            </select>
            <span style="float: left;">单次购买价格</span><input class="form-i w160 sitem" name="price" value="<?php echo $_smarty_tpl->tpl_vars['price']->value;?>
" type="text">
            <select name="limit">
                <option value="">-是否限购-</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['limit']->value==1){?>selected<?php }?>>是</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['limit']->value==2){?>selected<?php }?>>否</option>
            </select>
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>

    <table class="list">
        <thead>
            <tr>
                <th class="w30">排序</th>
                <th class="w30">ID</th>
                <th align="left">商品名称</th>
                <th class="w120">价值/总需/单次/期数</th>
                <th class="w120">已参与/总需人数</th>
                <th class="w80">点击</th>
                <th class="w40">推荐</th>
                <th class="w80">状态</th>
                <th class="w80">是否显示</th>
                <th class="w80">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <tr>
                <td align='center'><input class="form-i-s w30" name="listorders[<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['listorders'];?>
" type="text"></td>
                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
</td>
                <td>
                    <!-- <a href="<?php echo @constant('RootUrl');?>
yunbuy/detail/<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a> -->
                    <a href="<?php echo @constant('RootUrl');?>
yunbuy/detail/<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" class="item_title" target="_blank">(<?php echo date("Ymd",$_smarty_tpl->tpl_vars['m']->value['add_time']);?>
)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a> 
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?> <span class="mark">赠品专区</span><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['bus_name']){?>
                    <p><span style="color:#f00" class="">商家：<?php echo $_smarty_tpl->tpl_vars['m']->value['bus_name'];?>
； 平台分佣：<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bus_money_manage']);?>
</span></p>
                    <?php }?>
                </td>
                <td align="center" nowrap>
                    <?php echo floor($_smarty_tpl->tpl_vars['m']->value['true_price']);?>
 / <?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 / <?php echo floor($_smarty_tpl->tpl_vars['m']->value['price']);?>
 / <?php echo $_smarty_tpl->tpl_vars['m']->value['max_qishu'];?>

                </td>
                <td align="center"><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b> / <?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_click'];?>
</td>
                <td align='center'>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['posid']==1){?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','yunbuy','posid','buy_id')" class="c-green" title="点击设为不推荐">是</a>
                    <?php }else{ ?>
                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','yunbuy','posid','buy_id')" class="c-red" title="点击设为推荐">否</a>
                    <?php }?>
                </td>
                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['status'];?>
</td>
                <td align="center">
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_off']==1){?>
                	<a href='javascript:;' class='c-red' >已下架</a>
                	<?php }else{ ?>
                	<?php if ($_smarty_tpl->tpl_vars['m']->value['is_show']){?>
                    <a href='javascript:;' class='c-green' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
","yunbuy","is_show","buy_id")' title='点击设为隐藏'>显示</a>
                    <?php }else{ ?>
                    <a href='javascript:;' class='c-red' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
","yunbuy","is_show","buy_id")' title='点击设为显示'>隐藏</a>
                    <?php }?>
                	<?php }?>
				</td>
                <td class='opera' align='center' nowrap>
					<a href='javascript:;' onclick="main.confirm_off('yunbuy/off','<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
')" class='c-red' title='点击设为下架'>下架</a>
                    <a href='#!yunbuy/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
&com=xshow|编辑<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
（<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
）' class='iconfont icon-a' title='编辑'>&#xe603;</a>
                    <a href='javascript:;' onclick="main.confirm_del('yunbuy/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="foot-btn">
        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','yunbuy','listorders','buy_id')">更新排序</button>
    </div>

</div>
 
<?php }} ?>