<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 15:54:34
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/search.html" */ ?>
<?php /*%%SmartyHeaderCode:4804527158451d3a42fa91-34865587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21d730d4d7aa23bdd99c026860fc1581c4f84f30' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/search.html',
      1 => 1464059346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4804527158451d3a42fa91-34865587',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451d3a43b696_03061541',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451d3a43b696_03061541')) {function content_58451d3a43b696_03061541($_smarty_tpl) {?><div class="f-search">
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