<?php /* Smarty version Smarty-3.1.13, created on 2016-05-04 17:17:06
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\yunbuy\list.html" */ ?>
<?php /*%%SmartyHeaderCode:17055660f88444fb84-08340619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04dad1446368e99f598f58d112eebbb4124f4165' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\yunbuy\\list.html',
      1 => 1462353421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17055660f88444fb84-08340619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f88467b1f9_62343042',
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'L' => 0,
    'status' => 0,
    'type' => 0,
    'posid' => 0,
    'price' => 0,
    'limit' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f88467b1f9_62343042')) {function content_5660f88467b1f9_62343042($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form class="cond-form clear" action="#!yunbuy/index" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <select name="k" id="k">
                <option value="title" <?php if ($_smarty_tpl->tpl_vars['k']->value=='title'){?>selected<?php }?>>商品名称</option>
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
                <?php if (@constant('YUN_GO')){?>
                <option value="3" <?php if ($_smarty_tpl->tpl_vars['type']->value==3){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
</option>
                <?php }?>
            </select>
            <select name="posid">
                <option value="">-推荐-</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['posid']->value==1){?>selected<?php }?>>是</option>
                <option value="99" <?php if ($_smarty_tpl->tpl_vars['posid']->value==99){?>selected<?php }?>>否</option>
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
                    <a href="/yunbuy/detail/<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" target="_blank">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期) <?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?> <span class="mark">赠品专区</span><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['gobuy']==1){?> <span class="mark"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品</span><?php }?>
                </td>
                <td align="center" nowrap>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['gobuy']==1){?>
                    购买价格：<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['custom_price']);?>

                    <?php }else{ ?>
                    <?php echo floor($_smarty_tpl->tpl_vars['m']->value['true_price']);?>
 / <?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 / <?php echo floor($_smarty_tpl->tpl_vars['m']->value['price']);?>
 / <?php echo $_smarty_tpl->tpl_vars['m']->value['max_qishu'];?>

                    <?php }?>
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