<?php /* Smarty version Smarty-3.1.13, created on 2015-12-11 13:47:50
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:27301565d5896e04416-11341756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b0592071b70eab3f298fc47b33bab5bf7f99f2d' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\footer.html',
      1 => 1449812758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27301565d5896e04416-11341756',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d5896edd106_63462943',
  'variables' => 
  array (
    'tagData' => 0,
    'm' => 0,
    'site_config' => 0,
    'nav' => 0,
    'main' => 0,
    'mod' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d5896edd106_63462943')) {function content_565d5896edd106_63462943($_smarty_tpl) {?><div class="f-promise">
    <ul>
        <li class="li1"><a href="<?php echo url('/content/index/80');?>
"><em></em><span>100%公平公正</span><br />参与过程公开透明，用户可随时查看</a></li>
        <li class="li2"><a href="<?php echo url('/content/index/75');?>
"><em></em><span>100%正品保证</span><br />精心挑选优质商家，100%品牌正品</a></li>
        <li class="li3"><a href="<?php echo url('/content/index/52');?>
"><em></em><span>全国免运费</span><br />全场商品全国包邮（港澳台地区除外）</a></li>
    </ul>
</div>
<div class="full footer">
    <div class="f-service">
        <div class="container">
            <div class="f-row ui-clr">
                <ul class="group-list">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','field'=>'id,catname,url','catid'=>@constant('HELP_ID'),'type'=>'child','child'=>0,'item'=>4),$_smarty_tpl);?>

                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tagData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                    <li class="group-item">
                        <h2><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</h2>
                        <ul>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','field'=>'id,catname,url','catid'=>$_smarty_tpl->tpl_vars['m']->value['id'],'type'=>'child','child'=>0,'limit'=>4),$_smarty_tpl);?>

                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                            <li><a href="<?php echo url($_smarty_tpl->tpl_vars['m']->value['url']);?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
                <div class="f-worktime">
                    <p class="time"><?php echo nl2br($_smarty_tpl->tpl_vars['site_config']->value['work']);?>
</p>
                    <p class="tell">热线电话：<i><?php echo $_smarty_tpl->tpl_vars['site_config']->value['tel'];?>
</i></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="full footer">
    <div class="f-contact">
        <div class="container">
            <div class="f-row ui-clr">
                <dl class="f-weixin">
                    <dt>官方微信</dt>
                    <dd><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['site_config']->value['weixin_logo']),$_smarty_tpl);?>
" width="90" style="border-radius: 5px;background: #fff;padding:2px;" /></dd>
                </dl>
                <dl class="f-con">
                    <dt>CONTACT US</dt>
                    <dd>
                        <?php if ($_smarty_tpl->tpl_vars['site_config']->value['tel']){?>
                        <p class="tell"><i></i><?php echo $_smarty_tpl->tpl_vars['site_config']->value['tel'];?>
</p>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['site_config']->value['email']){?>
                        <p class="mail"><i></i><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['site_config']->value['email'];?>
"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['email'];?>
</a></p>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['site_config']->value['address']){?>
                        <p class="add"><i></i><?php echo $_smarty_tpl->tpl_vars['site_config']->value['address'];?>
</p>
                        <?php }?>
                    </dd>
                </dl>
                <div class="f-msg">
                    <form action="/content/index/gbook" method="post" class="mutualForm" id="messageForm" target="iframeNews">
                        <textarea class="area" name="post[content]" onfocus="if(this.value=='您希望上架的产品链接') this.value='';" onblur="if(this.value=='') this.value='您希望上架的产品链接'">您希望上架的产品链接</textarea>
                        <input class="txt" name="post[name]" type="text" value="您的姓名或昵称" onfocus="if(this.value=='您的姓名或昵称') this.value='';" onblur="if(this.value=='') this.value='您的姓名或昵称'" />
                        <input class="txt txt2" name="post[email]" type="text" value="您的联系方式" onfocus="if(this.value=='您的联系方式') this.value='';" onblur="if(this.value=='') this.value='您的联系方式'" />
                        <input class="btn" type="submit" name="Submit" value="您希望我们上什么商品" />
                    </form>
                </div>
                <dl class="f-time">
                    <dt>服务器时间</dt>
                    <dd id="clock">载入中...</dd>
                </dl>
                <script type="text/javascript">
                    tick();
                    function showLocale(obj){
                        var str;
                        var hh = obj.getHours();
                        if(hh<10) hh = '0' + hh;
                        var mm = obj.getMinutes();
                        if(mm<10) mm = '0' + mm;
                        var ss = obj.getSeconds();
                        if(ss<10) ss = '0' + ss;
                        str = "<b>"+hh + "</b><span>:</span><b>" + mm + "</b><span>:</span><b>" + ss + "</b>";
                        return(str);
                    }
                    function tick(){
                        var today = new Date();
                        document.getElementById("clock").innerHTML = showLocale(today);
                        window.setTimeout("tick()", 1000);
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="f-foot">
        <div class="container">
            <div class="f-row ui-clr">
                <div class="f-logo ui-left" style="display: none;"><a href="<?php echo url();?>
"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
</a></div>
                <div class="copyright ui-left">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'footer'),$_smarty_tpl);?>

                </div>
                <div class="f-links ui-right">
                    <?php if (isset($_smarty_tpl->tpl_vars["nav"])) {$_smarty_tpl->tpl_vars["nav"] = clone $_smarty_tpl->tpl_vars["nav"];
$_smarty_tpl->tpl_vars["nav"]->value = nav(2); $_smarty_tpl->tpl_vars["nav"]->nocache = null; $_smarty_tpl->tpl_vars["nav"]->scope = 0;
} else $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable(nav(2), null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                    <a href="<?php echo url($_smarty_tpl->tpl_vars['m']->value['linkurl']);?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['isblank']){?> target="_blank"<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a>
                    <?php } ?>
                    <div class="f-imgs" id="loadScript"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<iframe name="iframeNews" style="display:none;"></iframe>
<script type="text/javascript">
    var logCount = '<?php echo $_smarty_tpl->tpl_vars['main']->value['logCount'];?>
';
    $('#loadScript').load('/content/html/js?jsMod='+'<?php echo $_smarty_tpl->tpl_vars['mod']->value;?>
');
</script>
<script type="text/javascript" src="/style/foot.js"></script>
</body>
</html><?php }} ?>