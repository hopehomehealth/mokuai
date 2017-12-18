<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 13:08:29
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/store/info.html" */ ?>
<?php /*%%SmartyHeaderCode:80771392958576b4dc05351-70725335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7b1933f5aca05204e5b1c31f4035ac943e7ddf0' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/store/info.html',
      1 => 1481177860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80771392958576b4dc05351-70725335',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'business_row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58576b4dc51b88_99595818',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58576b4dc51b88_99595818')) {function content_58576b4dc51b88_99595818($_smarty_tpl) {?><div class="merchant-right">
    <div class="merchant-pd merchant-right1">
        <h2>欢迎光临本小店</h2>
        <em class="v"><img src="<?php echo default_pic($_smarty_tpl->tpl_vars['business_row']->value['bus_logo'],'store');?>
" /><span></span></em>
        <p>店主：<span><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_name'];?>
</span></p>
        <p>电话：<span><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_tel'];?>
</span></p>
        <p class="merchant-btn">
            <?php if ($_smarty_tpl->tpl_vars['business_row']->value['bus_qq']){?>
            <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_qq'];?>
&site=qq&menu=yes" target="_blank" class="merchant-a1">在线客服</a>
            <?php }?>
            <a href="<?php echo url();?>
" class="merchant-a2">商城首页</a>
        </p>
    </div>
    <div class="merchant-pd">
        <div class="merchant-top"><strong>店铺资料</strong></div>
        <div class="merchant-right2">
            <em class="v"><img src="<?php echo default_pic($_smarty_tpl->tpl_vars['business_row']->value['bus_logo'],'store');?>
" /><span></span></em>
            <p>商家名称：<span><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_name'];?>
</span></p>
            <?php if ($_smarty_tpl->tpl_vars['business_row']->value['bus_company_type']){?>
            <p>实体类型：<span><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_company_type'];?>
</span></p>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['business_row']->value['bus_company']){?>
            <p>实体名称：<span><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_company'];?>
</span></p>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['business_row']->value['bus_scope']){?>
            <p>经营范围：<span><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_scope'];?>
</span></p>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['business_row']->value['bus_area']){?>
            <p>所属地区：<span><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_area'];?>
</span></p>
            <?php }?>
            <p>联系地址：<span><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_address'];?>
</span></p>
            <?php if ($_smarty_tpl->tpl_vars['business_row']->value['bus_tel']){?>
            <p>客服电话：<span><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_tel'];?>
</span></p>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['business_row']->value['bus_qq']){?>
            <p>客服QQ号：<span><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_qq'];?>
&site=qq&menu=yes" target="_blank"><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_qq'];?>
</a></span></p>
            <?php }?>
            <p>入驻时间：<span><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['business_row']->value['time_open']);?>
</span></p>
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['business_row']->value['bus_intro']){?>
    <div class="merchant-pd">
        <div class="merchant-top"><strong>商家介绍</strong></div>
        <div class="merchant-right2 merchant-right2-1">
            <p><?php echo stripcslashes($_smarty_tpl->tpl_vars['business_row']->value['bus_intro']);?>
</p>
        </div>
    </div>
    <?php }?>
</div><?php }} ?>