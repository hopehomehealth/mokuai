<h1>当前的时间是</h1>
<{insert name="mytime"}>
<h1>自定义函数的使用</h1>
<{assign var='aa' value='hello'}>
<{$aa}>
<h1>counter</h1>
<{* counter是一个计数器 start是初始值 skip是步长*}>
<{counter start=0 skip=1 assign=mycounter print=false }>
<table border="1px" width="500px">
<tr><td>id</td><td>name</td><td>nickname</td></tr>
<{foreach from=$hero item=singhero}>
<{counter}>
<{if $mycounter is odd}>
<tr bgcolor='red'><td><{$singhero.id}></td><td><{$singhero.name}></td><td><{$singhero.nickname}></td></tr>
<{else}>
<tr bgcolor='silver'><td><{$singhero.id}></td><td><{$singhero.name}></td><td><{$singhero.nickname}></td></tr>
<{/if}>
<{/foreach}>
</table>

<h1>cycle函数的使用</h1>
<table border="1px" width="500px">
<tr><td>id</td><td>name</td><td>nickname</td></tr>
<{foreach from=$hero item=singhero}>
<tr bgcolor='<{cycle values="red,green"}>'><td><{$singhero.id}></td><td><{$singhero.name}></td><td><{$singhero.nickname}></td></tr>
<{/foreach}>
</table>

<h1>fetch的使用</h1>
<{fetch file="./templates/aa.txt"}>
<h1>html_checkboxes使用,请选择你喜欢的运动有</h1>
<form action="AbcController.php" method="post">
<{html_checkboxes name=hobby options=$hobby selected=$sel separator="--"}>
<input type="submit" value="提交修改" />
</form>

<h1>html_options的使用,选择你喜欢的爱好</h1>
<select name="myhobby" multiple>
<{html_options options=$hobby selected=$sel}>
</select>

<h1>单选按钮使用</h1>
<{html_radios name="sex" options=$sex checked=$selec}>
<hr/>
<{html_select_date start_year=2000 end_year=2012}>
<{html_select_time use_24_hours=true}>

<h1>html_table的使用</h1>
<{html_table cols=2 tr_attr="bgcolor='red'" loop=$cities}>

<h1>联系管理员</h1>
<{mailto address='raingxm@163.com' text='联系管理员' subject='我有急事'}>

<h1>弹出窗口的使用</h1>
<{popup_init src='/smarty/js/overlib417/overlib.js'}>
<a href='#' <{popup caption='我的窗口' textsize=2 bgcolor='pink' sticky=true width=300 height=300 
text="<ul><li>购物1</li><li>shoping2</li><li><img src='/smarty/images/tt.jpg' width=100/>
</li></ul>"}> >myhref.书的信息</a>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>