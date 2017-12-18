<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:49:04
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\robots\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2931756610ff54cdb91-91469214%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c093cf8d09c7173d76aa90e452b5f3d20c68748' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\robots\\index.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2931756610ff54cdb91-91469214',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610ff5582ec8_90197706',
  'variables' => 
  array (
    'L' => 0,
    'robots_num' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610ff5582ec8_90197706')) {function content_56610ff5582ec8_90197706($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <span class="form-tip">本程序将从机器人随机提取会员<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</span>
    <form target="_blank" method="post" action="/manage/robots/done" >
        <table class="table-list" width="100%">
            <tbody>
            <tr>
                <td class="td-label"><label>当前机器人总数：</label></td>
                <td class="td-input"><?php echo $_smarty_tpl->tpl_vars['robots_num']->value;?>
</td>
            </tr>
            <tr>
                <td class="td-label"><label>随机人次最大数：</label></td>
                <td class="td-input"><input class="form-i w140" name="buy_num" value="1" type="text"> <span class="form-tip">设置为1以上，全站商品总价格以下的正数。</span></td>
            </tr>
            <tr>
                <td class="td-label"><label>随机间隔购买时间间隔最大数：</label></td>
                <td class="td-input"><input class="form-i w140" name="buy_time" value="1" type="text"> <span>秒</span> <span class="form-tip">设置为1秒以上</span></td>
            </tr>
            <tr>
                <td class="td-label"><label>参与最大数：</label></td>
                <td class="td-input"><input class="form-i w140" name="join_max" value="" type="text"> <span class="form-tip">当商品参与人数等于该值时机器人不再参与。</span></td>
            </tr>
            <tr>
                <td class="td-label"><label>指定购买的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品：</label></td>
                <td class="td-input" id="choose_goods">

                </td>
            </tr>
            <tr>
                <td colspan="2">
                 <table width="100%">
                     <thead>
                     <tr>
                         <th width="5%">ID</th>
                         <th width="45%">商品标题</th>
                         <th width="15%">已参与/总需</th>
                         <th width="10%">机器人共参与</th>
                         <th  width="10%">单价(元)</th>
                         <th width="15%">期数/最大期数</th>
                     </tr>
                     </thead>
                     <tbody id="goodsbody">

                     </tbody>
                     <tfoot>
                     <tr>
                         <td colspan="20" align="center">
                             <button class="uiBtn BtnBlue" type="button" onclick="prev();">上一页</button>
                             <button class="uiBtn BtnBlue" type="button" onclick="next();">下一页</button></td>
                     </tr>
                     </tfoot>
                 </table>
                </td>
            </tr>
            <tr>
                <td class="td-label">&nbsp;</td>
                <td><button class="uiBtn BtnGreen" name="Submit" type="submit">执行</button></td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" id="current_page" value="1">
        <input type="hidden" id="page_total" value="1">
        <input type="hidden" name="ids" id="ids" value="0,">
    </form>
</div>
<script type="">
load_db(1);

function prev(){
    var current_page = G('current_page').value*1;
    var page_total = G('page_total').value*1;
    if(current_page==1) return false;
    load_db(current_page-1);
}
function next(){
    var current_page = G('current_page').value*1;
    var page_total = G('page_total').value*1;
    if(current_page==page_total) return false;
    load_db(current_page+1);
}
function load_db(page){
    var D={
        ids:G('ids').value
    };
    var url = "robots/load_db/"+page;
    $post( { url:url,method:'get',data:D,dataType:'json',callback:function(x){
        G('goodsbody').innerHTML= x.html;
        G('current_page').value= x.current_page;
        G('page_total').value= x.page_total;
    } } );
}
function choose(obj,id){
    if(obj.checked){
        G('choose_goods').innerHTML += '<p id="choose'+id+'">'+G('tit'+id).innerHTML+'</p>';
        G('ids').value+= id+",";
    }else{
        G('choose'+id).innerHTML = "";
        G('choose'+id).id = "";
        var str = G('ids').value;
        G('ids').value = str.replace(','+id+',',',');
    }
}
</script><?php }} ?>