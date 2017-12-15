
<h1>取出二维关联数组</h1>
<{foreach from=$arr item=item1}>
<{if $item1.age>23 }>
年龄ok=<{$item1.age}> <br/>
<{/if}>
<{/foreach}>