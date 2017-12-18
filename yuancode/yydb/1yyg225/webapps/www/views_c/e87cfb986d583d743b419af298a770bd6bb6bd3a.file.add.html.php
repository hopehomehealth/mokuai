<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 11:00:25
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\robots\add.html" */ ?>
<?php /*%%SmartyHeaderCode:148956611001caaa26-91589398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e87cfb986d583d743b419af298a770bd6bb6bd3a' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\robots\\add.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '148956611001caaa26-91589398',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56611001d3e3a4_84441522',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56611001d3e3a4_84441522')) {function content_56611001d3e3a4_84441522($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/robots/add">
        <table class="table-list">
            <tbody>
            <tr>
                <td class="td-label"><label>批量添加机器人：</label></td>
                <td class="td-input">
                    <textarea rows="15" style="height: auto" name="member"></textarea>
                    <p class="form-tip">会员名 昵称 一行表示一个会员 会员名必填昵称可留空(用户名最少4个字符)<br/>例:<br/>asdasd 张三<br>xxzz1 李四<br>aazz</p>
                </td>
            </tr>
            <tr class="tr-btn">

                <td class="td-label"></td>

                <td class="td-input td-button">

                    <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>

                    <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>

                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div><?php }} ?>