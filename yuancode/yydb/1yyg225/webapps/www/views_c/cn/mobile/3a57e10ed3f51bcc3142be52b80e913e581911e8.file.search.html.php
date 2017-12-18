<?php /* Smarty version Smarty-3.1.13, created on 2016-05-24 11:09:07
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\search.html" */ ?>
<?php /*%%SmartyHeaderCode:198325743c5d3a7d8c1-54052945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a57e10ed3f51bcc3142be52b80e913e581911e8' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\search.html',
      1 => 1464059344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198325743c5d3a7d8c1-54052945',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5743c5d3aba952_86822976',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5743c5d3aba952_86822976')) {function content_5743c5d3aba952_86822976($_smarty_tpl) {?><div class="f-search">
    <table cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <div class="f-search-input">
                <table cellpadding="0" cellspacing="0">
                <tr>
                    <td class="f-search-img"><img src="/style/mobile/images/search1.png" /></td>
                    <td><input id="SEARCHQ" value="<?php echo $_GET['q'];?>
" placeholder="搜索您需要的商品" /></td>
                </tr>
                </table>
            </div>
        </td>
        <td class="f-search-btn">
            <a id="search-btn">搜索</a>
            <input type="hidden" id="zq" value="<?php echo $_GET['zq'];?>
" />
        </td>
    </tr>
    </table>
    <script type="text/javascript">
        $("#search-btn").click(function(){
            location.href='/yunbuy?zq='+$('#zq').val()+'&q='+encodeURIComponent($('#SEARCHQ').val());
            return false;
        });
    </script>
</div><?php }} ?>