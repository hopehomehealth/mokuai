<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:29:46
         compiled from "F:\WWW\1yyg225\webapps\www\views\manage\auction\list.html" */ ?>
<?php /*%%SmartyHeaderCode:21175565fa91ad95446-50018943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '009e772ab3e3932c24a591b3b943d77f4ebe1986' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\manage\\auction\\list.html',
      1 => 1449048766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21175565fa91ad95446-50018943',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'actTypes' => 0,
    'm' => 0,
    'cat_type' => 0,
    'status' => 0,
    'sortby' => 0,
    'sortorder' => 0,
    'data' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565fa91b01a4c7_43803646',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565fa91b01a4c7_43803646')) {function content_565fa91b01a4c7_43803646($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form class="cond-form clear" action="#!auction/index" onsubmit="return xForm.submit(this)">        <div class="f-unit">            <select name="k" id="k">                <option value="title" <?php if ($_smarty_tpl->tpl_vars['k']->value=='title'){?>selected<?php }?>>竞拍商品</option>                <option value="goods_name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='goods_name'){?>selected<?php }?>>商品名称</option>                <option value="goods_id" <?php if ($_smarty_tpl->tpl_vars['k']->value=='goods_id'){?>selected<?php }?>>商品ID</option>                <option value="act_id" <?php if ($_smarty_tpl->tpl_vars['k']->value=='act_id'){?>selected<?php }?>>ID</option>            </select>            <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">            <select name="cat_type">                <option value="">-竞拍类型-</option>                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actTypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>                <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['key'];?>
" <?php if ($_smarty_tpl->tpl_vars['m']->value['key']==$_smarty_tpl->tpl_vars['cat_type']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</option>                <?php } ?>            </select>            <select name="status">                <option value="">-竞拍状态-</option>                <option value="<?php echo @constant('UNDER_WAY');?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('UNDER_WAY')){?>selected<?php }?>>进行中</option>                <option value="<?php echo @constant('PRE_START');?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('PRE_START')&&$_smarty_tpl->tpl_vars['status']->value!=''){?>selected<?php }?>>即将开始</option>                <option value="<?php echo @constant('FINISHED');?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('FINISHED')){?>selected<?php }?>>已结束(未处理)</option>                <option value="<?php echo @constant('SETTLED');?>
" <?php if ($_smarty_tpl->tpl_vars['status']->value==@constant('SETTLED')){?>selected<?php }?>>已完成</option>            </select>            <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button>        </div>        <div class="f-unit">            <select name="sortby" id="sortby">                <option value="act_id" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='act_id'){?>selected<?php }?>>ID</option>                <option value="end_time" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='end_time'){?>selected<?php }?>>结束时间</option>                <option value="listorder" <?php if ($_smarty_tpl->tpl_vars['sortby']->value=='listorder'){?>selected<?php }?>>排序值</option>            </select>            <select name="sortorder" id="sortorder">                <option value="DESC" <?php if ($_smarty_tpl->tpl_vars['sortorder']->value=='DESC'){?>selected<?php }?>>降序</option>                <option value="ASC" <?php if ($_smarty_tpl->tpl_vars['sortorder']->value=='ASC'){?>selected<?php }?>>升序</option>            </select>        </div>    </form>    <form name="formlist" target="iframeNewsTarget" method="post" action="">    <table class="list">        <thead>            <tr>                <th class="w30">排序</th>                <th class="w30">ID</th>                <th align="left" colspan="2">竞拍商品/商品ID</th>                <th>保证金</th>                <th class="w120">开始时间</th>                <th class="w120">结束时间</th>                <th class="w80">中奖人数</th>                <th class="w40">推荐</th>                <th class="w80">状态</th>                <th class="w80">是否显示</th>                <th class="w80">操作</th>            </tr>        </thead>        <tbody>            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>            <tr>                <td align='center'><input type='text' class='form-i-s w30' name='listorders[<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>                <td class='id' align='center'><?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
</td>                <td width="60"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['imgurl_thumb'];?>
" width="60" /></td>                <td><a href="/auction/view/<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a><span class="c-orange">(<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_id'];?>
)</span> <?php if ($_smarty_tpl->tpl_vars['m']->value['cat_type']=='tiyan'){?><span class="mark">体验区</span><?php }?></td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['deposit'];?>
</td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['start_time'];?>
</td>                <td align="center"><?php echo $_smarty_tpl->tpl_vars['m']->value['end_time'];?>
</td>                <td align="center" class="c-gray">                    <a href="#!auction/log/?k=act_id&q=<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
&status=1" title="中奖记录"><?php echo $_smarty_tpl->tpl_vars['m']->value['cod_count'];?>
</a> /                    <a href="#!auction/log/?k=act_id&q=<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
" title="出价记录"><?php echo $_smarty_tpl->tpl_vars['m']->value['bid_user_count'];?>
</a>                </td>                <td align='center'>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['posid']==1){?>                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
','goods_activity','posid','act_id')" class="c-green" title="点击设为不推荐">是</a>                    <?php }else{ ?>                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
','goods_activity','posid','act_id')" class="c-red" title="点击设为推荐">否</a>                    <?php }?>                </td>                <td align="center">                    <?php if ($_smarty_tpl->tpl_vars['m']->value['status']==@constant('PRE_START')){?>                    <span>即将开始</span>                    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==@constant('UNDER_WAY')){?>                    <span class="c-orange">进行中</span>                    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['status']==@constant('FINISHED')&&$_smarty_tpl->tpl_vars['m']->value['type']==1){?>                    <span class="c-gray">已结束<span class="c-red">(未处理)</span></span>                    <?php }else{ ?>                    <span class="c-gray">已完成</span>                    <?php }?>                </td>                <td align='center'>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['is_show']==1){?>                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
','goods_activity','is_show','act_id')" class="c-green" title="点击隐藏">显示</a>                    <?php }else{ ?>                    <a href="javascript:;" onclick="main.chang_status('<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
','goods_activity','is_show','act_id')" class="c-red" title="点击显示">隐藏</a>                    <?php }?>                </td>                <td class='opera' align='center' nowrap>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['copy']<=0){?>                    <a href='#!auction/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
&act=copy&com=xshow|复制竞拍活动（<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
）' class='iconfont icon-a' title='复制'>&#xe617;</a>                    <?php }?>                    <a href='#!auction/edit/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
&com=xshow|编辑竞拍活动（<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
）' class='iconfont icon-a' title='编辑'>&#xe603;</a>                    <?php if ($_smarty_tpl->tpl_vars['m']->value['bid_user_count']>0){?><?php }else{ ?>                    <a href='javascript:;' onclick="main.confirm_del('auction/del','<?php echo $_smarty_tpl->tpl_vars['m']->value['act_id'];?>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>                    <?php }?>                </td>            </tr>            <?php } ?>        </tbody>    </table>    <div class="foot-btn">        <div class="pager r"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>        <button type="button" class="uiBtn BtnGreen" onclick="main.batch_order('formlist','order','goods_activity','','act_id')">更新排序</button>    </div>    </form></div><?php }} ?>