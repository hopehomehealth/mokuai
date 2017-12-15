<h1>内建函数foreach用户列表的使用</h1>
<h1>取出普通的索引数组</h1>
<{foreach from=$arr1 item=temp}>
<{$temp}>
<{/foreach}>
<h1>取出普通的关联数组</h1>
<{foreach from=$arr2 item=temp key=city}>
<{$city}>=<{$temp}>
<{/foreach}>
<h1>取出二维索引数组</h1>
<{foreach   from=$arr3 item=temp}>
<{*temp是一维数组 *}>
<{foreach from=$temp item=person}>
<{$person}>
<{/foreach}>
<{/foreach}>
<h1>取出二维关联数组</h1>
<{foreach from=$arr4 item=item1}>
<{*二次循环*}>
<{foreach from=$item1 item=item2 key=k}>
<{$k}>=<{$item2}>
<{/foreach}>
<br/>
<{/foreach}>
<h1>if else测试案例</h1>
<{if $pagenow>10 }>
pagenow>10
<{else}>
pagenow<=10
<{/if}>