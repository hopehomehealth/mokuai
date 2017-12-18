<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 14:45:27
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\disk\left.html" */ ?>
<?php /*%%SmartyHeaderCode:1943356cea307103305-66705966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83f53d55a7d127724df1c6a4f310561b9a62eeb3' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\disk\\left.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1943356cea307103305-66705966',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'folder' => 0,
    'm' => 0,
    'userdata' => 0,
    'spacedata' => 0,
    'spacebl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea3071943e0_04967712',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea3071943e0_04967712')) {function content_56cea3071943e0_04967712($_smarty_tpl) {?><div class="left">
    <div class="gr_dom_left_top"><a href="/disk/index"><img src="/images/xz_center.png"></a></div>
    <div class="gr_dom_left_list">
      <h3>网盘目录</h3>
      <dl>
        <dt><a href="/disk/lists">我的网盘</a></dt>
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['folder']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <dd><a href="/disk/lists/?id=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><i></i><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></dd>
        <?php } ?>
      </dl>
    </div>
    <div class="gr_dom_left_bil">
      <p><label>网盘容量：</label></p>
      <h5><span></span></h5>
      <p><span><?php echo $_smarty_tpl->tpl_vars['userdata']->value;?>
</span>/<span><?php echo $_smarty_tpl->tpl_vars['spacedata']->value;?>
</span>          <span>(<?php echo $_smarty_tpl->tpl_vars['spacebl']->value;?>
)</span></p>
    </div>
  </div><?php }} ?>