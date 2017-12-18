<?php /* Smarty version Smarty-3.1.13, created on 2017-05-05 08:41:48
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:3878290715845176a3d4293-79906054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '368c992aa5b798929876b855529562bae02c86d8' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/footer.html',
      1 => 1493870189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3878290715845176a3d4293-79906054',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5845176a470522_92229614',
  'variables' => 
  array (
    'site_config' => 0,
    'foot_cate' => 0,
    'm' => 0,
    'i' => 0,
    'n' => 0,
    'j' => 0,
    'nav' => 0,
    'mod' => 0,
    'qrcode' => 0,
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5845176a470522_92229614')) {function content_5845176a470522_92229614($_smarty_tpl) {?><div class="f-promise">
    <ul>
        <?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?>
        <li class="li4"><a href="<?php echo url('/content/index/73');?>
"><em></em><span>无忧售后</span><br />7天无理由退换货</a></li>
        <?php }else{ ?>
        <li class="li1"><a href="<?php echo url('/content/index/55');?>
"><em></em><span>100%公平公正</span><br />参与过程公开透明，用户可随时查看</a></li>
        <?php }?>
        <li class="li2"><a href="<?php echo url('/content/index/75');?>
"><em></em><span>100%正品保证</span><br />精心挑选优质商家，100%品牌正品</a></li>
        <li class="li3"><a href="<?php echo url('/content/index/52');?>
"><em></em><span>全国免运费</span><br />全场商品全国包邮（港澳台地区除外）</a></li>
    </ul>
</div>
<style>
<!--
.love{ font-size: 16px;padding:5px 0;clear: both;overflow: hidden; line-height:28px }
.love p{ color: #fff500;padding-left: 30px; background:url(/style/images/love.png) no-repeat 0 center }
.love strong{ display:block; font-family: "arial black";font-size:22px; }
-->
</style>
<div class="full footer">
    <div class="f-service">
        <div class="container">
            <div class="f-row ui-clr">
                <ul class="group-list">
                    <?php if (isset($_smarty_tpl->tpl_vars['i'])) {$_smarty_tpl->tpl_vars['i'] = clone $_smarty_tpl->tpl_vars['i'];
$_smarty_tpl->tpl_vars['i']->value = 0; $_smarty_tpl->tpl_vars['i']->nocache = null; $_smarty_tpl->tpl_vars['i']->scope = 0;
} else $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
                    <?php if (isset($_smarty_tpl->tpl_vars["foot_cate"])) {$_smarty_tpl->tpl_vars["foot_cate"] = clone $_smarty_tpl->tpl_vars["foot_cate"];
$_smarty_tpl->tpl_vars["foot_cate"]->value = cate(0); $_smarty_tpl->tpl_vars["foot_cate"]->nocache = null; $_smarty_tpl->tpl_vars["foot_cate"]->scope = 0;
} else $_smarty_tpl->tpl_vars["foot_cate"] = new Smarty_variable(cate(0), null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['foot_cate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1&&$_smarty_tpl->tpl_vars['m']->value['parentid']==@constant('HELP_ID')&&$_smarty_tpl->tpl_vars['i']->value<4){?><?php if (isset($_smarty_tpl->tpl_vars['i'])) {$_smarty_tpl->tpl_vars['i'] = clone $_smarty_tpl->tpl_vars['i'];
$_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['i']->value+1; $_smarty_tpl->tpl_vars['i']->nocache = null; $_smarty_tpl->tpl_vars['i']->scope = 0;
} else $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                    <li class="group-item">
                        <h2><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</h2>
                        <ul>
                            <?php if (isset($_smarty_tpl->tpl_vars['j'])) {$_smarty_tpl->tpl_vars['j'] = clone $_smarty_tpl->tpl_vars['j'];
$_smarty_tpl->tpl_vars['j']->value = 0; $_smarty_tpl->tpl_vars['j']->nocache = null; $_smarty_tpl->tpl_vars['j']->scope = 0;
} else $_smarty_tpl->tpl_vars['j'] = new Smarty_variable(0, null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['foot_cate']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['n']->key;
?>
                            <?php if ($_smarty_tpl->tpl_vars['n']->value['ismenu']==1&&$_smarty_tpl->tpl_vars['n']->value['parentid']==$_smarty_tpl->tpl_vars['m']->value['id']&&$_smarty_tpl->tpl_vars['j']->value<4){?><?php if (isset($_smarty_tpl->tpl_vars['j'])) {$_smarty_tpl->tpl_vars['j'] = clone $_smarty_tpl->tpl_vars['j'];
$_smarty_tpl->tpl_vars['j']->value = $_smarty_tpl->tpl_vars['j']->value+1; $_smarty_tpl->tpl_vars['j']->nocache = null; $_smarty_tpl->tpl_vars['j']->scope = 0;
} else $_smarty_tpl->tpl_vars['j'] = new Smarty_variable($_smarty_tpl->tpl_vars['j']->value+1, null, 0);?>
                            <li><a href="<?php echo url($_smarty_tpl->tpl_vars['n']->value['url']);?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['catname'];?>
</a></li>
                            <?php }?>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }?>
                    <?php } ?>
                </ul>
                <div class="f-worktime">
                    <p class="time"><?php echo nl2br($_smarty_tpl->tpl_vars['site_config']->value['work']);?>
</p>
                    <p class="tell"><!-- 热线电话：-->客服QQ： <i><?php echo $_smarty_tpl->tpl_vars['site_config']->value['tel'];?>
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
                    <?php if ($_smarty_tpl->tpl_vars['site_config']->value['gjj_status']==1&&$_smarty_tpl->tpl_vars['site_config']->value['index_skin']!=2){?>
                    <div class="love">
				        <p>云购公益基金</p>
				        <strong id="GJJ">0.00</strong>
				    </div>
				    <?php }?>
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
                <div style="text-align: center; line-height: 18px; color: #ccc;">
                    <a href="<?php echo url();?>
" style="color: #ccc;"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
</a>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'footer'),$_smarty_tpl);?>

                </div>
<!--
                <div class="f-logo ui-left" style="display: none;"><a href="<?php echo url();?>
"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
</a></div>
                <div class="copyright ui-left">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'footer'),$_smarty_tpl);?>

                    <?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['site_config']->value['cnnz']);?>

                </div>
-->
            </div>
            <div class="f-row ui-clr">
                <div class="f-links" style="text-align: center; margin-right: 22px;">
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
                </div>
            </div>
            <div class="f-row ui-clr">
                <div style="text-align: center;">
                    <?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['site_config']->value['cnnz']);?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['mod']->value=='home'&&(trim($_smarty_tpl->tpl_vars['site_config']->value['ios_url'])||trim($_smarty_tpl->tpl_vars['site_config']->value['and_url']))){?>
<div class="app-bg">
    <div class="container app-container">
        <a class="app-close" href="javascript:;"></a>
        <!-- <img class="app-qr" src="<?php echo $_smarty_tpl->tpl_vars['qrcode']->value;?>
" /> -->
        <img class="app-qr" src="/upload/images/qrcode.png" />
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('.app-close').click(function(){
            $('.app-bg').hide();
        })
    });
</script>
<?php }?>

<iframe name="iframeNews" style="display:none;"></iframe>
<script type="text/javascript">
    var logCount = '<?php echo $_smarty_tpl->tpl_vars['main']->value['logCount'];?>
';
</script>
<script type="text/javascript" src="/style/foot.js?v=<?php echo $_smarty_tpl->tpl_vars['main']->value['vjs'];?>
"></script>
</body>
</html>
<?php }} ?>