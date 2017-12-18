<?php /* Smarty version Smarty-3.1.13, created on 2016-12-11 20:25:50
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/yunbuy/list_1.html" */ ?>
<?php /*%%SmartyHeaderCode:953472282584d45ce92ebc3-37216040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2295ebb3b2d0ad13d571d6cf934f00551f62c580' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/yunbuy/list_1.html',
      1 => 1481178229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '953472282584d45ce92ebc3-37216040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'business_power' => 0,
    'q' => 0,
    'is_show' => 0,
    'posid' => 0,
    'publish' => 0,
    'data' => 0,
    'm' => 0,
    'L' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584d45cea117f4_11726821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584d45cea117f4_11726821')) {function content_584d45cea117f4_11726821($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form class="cond-form clear" action="#!yunbuy/index" onsubmit="return xForm.submit(this)">
        <div class="f-unit">
            <input type="hidden" name="gobuy" value="<?php echo $_GET['gobuy'];?>
" />
            <select name="k" id="k">
                <option value="title" <?php if ($_smarty_tpl->tpl_vars['k']->value=='title'){?>selected<?php }?>>商品名称</option>
                <?php if ($_smarty_tpl->tpl_vars['business_power']->value){?>
                <option value="b.bus_name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='b.bus_name'){?>selected<?php }?>>商家名称</option>
                <?php }?>
                <option value="buy_id" <?php if ($_smarty_tpl->tpl_vars['k']->value=='buy_id'){?>selected<?php }?>>ID</option>
            </select>
            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">
            <select name="is_show">
                <option value="">-上架状态-</option>
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['is_show']->value==1){?>selected<?php }?>>上架</option>
                <option value="99" <?php if ($_smarty_tpl->tpl_vars['is_show']->value==99){?>selected<?php }?>>下架</option>
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
            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>
        </div>
    </form>

    <table class="list">
        <thead>
            <tr>
                <th class="w30">排序</th>
                <th class="w30">ID</th>
                <th align="left">商品名称</th>
                <th class="w120">价格/市场价</th>
                <th class="w120">库存/销量</th>
                <th class="w80">点击</th>
                <th class="w40">推荐</th>
                <th class="w80">是否上架</th>
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
                    <a href="<?php echo @constant('RootUrl');?>
yunbuy/detail/<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['gobuy']==1){?> <span class="mark"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
</span><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['bus_name']){?>
                    <p><span style="color:#f00" class="">商家：<?php echo $_smarty_tpl->tpl_vars['m']->value['bus_name'];?>
； 平台分佣：<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bus_money_manage']);?>
</span></p>
                    <?php }?>
                </td>
                <td align="center" nowrap>
                    <b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['custom_price'];?>
</b> / <?php echo $_smarty_tpl->tpl_vars['m']->value['goods_price'];?>

                </td>
                <td align="center"><b class="c-orange"><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</b> / <?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
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
                <td align="center">
                	<?php if ($_smarty_tpl->tpl_vars['m']->value['is_show']){?>
                    <a href='javascript:;' class='c-green' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
","yunbuy","is_show","buy_id")' title='点击设为下架'>上架</a>
                    <?php }else{ ?>
                    <a href='javascript:;' class='c-red' onclick='main.chang_status("<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
","yunbuy","is_show","buy_id")' title='点击设为上架'>下架</a>
                    <?php }?>
				</td>
                <td class='opera' align='center' nowrap>
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