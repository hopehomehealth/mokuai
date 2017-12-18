<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 13:08:11
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\content\win.html" */ ?>
<?php /*%%SmartyHeaderCode:260935660fafe7d5000-79749244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c53dc0b6d104371d185e45a5c82b7f1be658105' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\content\\win.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '260935660fafe7d5000-79749244',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fafe88da59_31810698',
  'variables' => 
  array (
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fafe88da59_31810698')) {function content_5660fafe88da59_31810698($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/win.css');?>
">
<script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script>
<script src="/style/lefttime_jx.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="fn-clear win-box">
    <ul class="fn-clear taba">
        <li class="li_db" onclick="mLoad('db',true)">最新<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
揭晓</li>
        <!--<li class="li_auc" onclick="mLoad('auc',true)">最新<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
揭晓</li>-->
    </ul>
    <div class="load" id="load_db"><div class="loading">拼命加载中...</div></div>
    <div class="load" id="load_auc"><div class="loading">拼命加载中...</div></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
var hash = 'db';
var idsTime = false;
var isLoad = {
    "db":false,
    "auc":false
};
if(location.hash){ hash = location.hash.substr(1); }
mLoad(hash,true);

function mLoad(hash, load){
    var arr=hash.split("#");
    var type = arr[0];

    var loadDiv = '#load_'+type;

    $('.taba li').removeClass('hover');
    $('.li_'+type).addClass('hover');
    $('.load').hide();

    var info = '';
    if(arr[1] != undefined){
        var arr2=arr[1].split("=");
        info = '?'+arr[1];
        loadDiv += '_'+arr2[0];
    }
    $(loadDiv).show();

    load=load?load:false;
    if('#load_'+type != loadDiv || isLoad[type] == false || load==true){
        $(loadDiv).load('/content/win/1?type='+type,function(){
            scrollLoading();
            itemhover();
            //加载待揭晓
            if(type=='db'){
                compaceIds();
                if(idsTime==false){
                    idsTime = setInterval('compaceIds()',5*1000);
                }
            }else{
                if(idsTime){
                    window.clearInterval(idsTime);
                    idsTime = false;
                }
            }
        });
        if('#load_'+type == loadDiv) isLoad[type] = true;
    }

    location.href='/content/win#'+type;
}
function compaceIds(){
    $.post('/content/ajaxIds','ids='+$('#ids').val(),function(data){
        if(data.error==1){
            scrollLoading();
            $('#ids').val(data.ids);
            $('#win-list').prepend(data.html);
        }
    },'json');
}
</script><?php }} ?>