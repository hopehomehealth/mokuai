<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 20:52:23
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/luck.html" */ ?>
<?php /*%%SmartyHeaderCode:25819586758762a87b1d540-91094558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0f873fbebccd3a5bf413c4217dcd3fe7fb4463e' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/luck.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25819586758762a87b1d540-91094558',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58762a87b6ae70_83478955',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58762a87b6ae70_83478955')) {function content_58762a87b6ae70_83478955($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="list01 list-luck">
        <dl class="item ui-clr"></dl>
    </div>
    <div class="loading getMore"></div>
</div>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('.list-luck').more({
            'address': '/member/luck',
            'amount' : 10
        })
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['site_config']->value['a_money']==1){?>

<script type="text/javascript">
    function a_money(id){
        var D = {
            id: id,
            type: 3,
            act: 'money'
        };
        $.layer({
            shade: [0],
            area: ['auto','auto'],
            dialog: {
                msg: '确认折现并选择折现方式!',
                btns: 2,
                type: 4,
                btn: ['折现到余额','直接提现'],
                yes: function(){
                    layer.close();
                    $.post('/order/buy',D,function(result){
                        if(!result.error){
                            layer.msg(result.msg,2,1);
                            location.reload();
                        }else{
                            layer.alert(result.msg,8,function(){
                                if(result.url){
                                    location.href=result.url;
                                }
                            });
                        }
                    },'json');
                }, no: function(){
                    layer.close();
                    D['tx'] = 1;
                    $.post('/order/buy',D,function(result){
                        if(!result.error){
                            layer.msg(result.msg,2,1);
                            location.reload();
                        }else{
                            layer.alert(result.msg,8,function(){
                                if(result.url){
                                    location.href=result.url;
                                }
                            });
                        }
                    },'json');
                }
            }
        });
    }
</script>

<?php }?><?php }} ?>