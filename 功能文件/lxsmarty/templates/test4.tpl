<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<h1>smarty 语法细节举例</h1>
<{*注释对不对　*}>
<h1>所得税</h1>
<{$sal*0.08+200}><br/>
<{$sal*$tax_rate}>--
<{$sal*$smarty.const.TAX_RATE}>
<h1>如何取出常量</h1>
<{$smarty.const.TAX_RATE}>
<h1>单词首字母大写</h1>
<{$str|capitalize}>
<h1>使用我自己的调节器</h1>
<{"acDdjfl"|mycap:"Hello"}>
<h1>统计有多少个字符</h1>
<{$str|count_characters}>
<h1>段落数</h1>
<{$str2|count_paragraphs}>
<h1>句子数</h1>
<{$str3|count_sentences }>
<h1>计算单词数</h1>
<{$str4|count_words}>
<h1>显示当前时间</h1>
<{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}>
<h1>default使用</h1>
<{$aa|default:"没有值"}>
<h1>escape使用</h1>
<{$bb|escape}>
<h1>文章</h1>
<{$article|nl2br}>
<h1>正则表达式应用</h1>
<{$cc|regex_replace:"/(\d\d\d\d)/":"这里本来有四个数"}>
<h1>spacify使用</h1>
<{"abc"|spacify:"^^"}>
<h1>strip使用</h1>
<{$dd|strip:"||"}>
<h1>truncate使用</h1>
<a href='#' title='<{$ee}>'><{$ee|truncate:10:"...":true}></a>
<h1>行宽的约束</h1>
<{$hh|wordwrap:50:"<br/>"}>
<h1>ismail</h1>
<{"hsp.@souhu.com"|ismail}>
<h1>组合使用</h1>
<{$kk|upper|truncate:8}>


<h1>输出分隔符</h1>
<{ldelim}> <{rdelim}>
<h1>literal</h1>
<{literal}>
<{$hello}>
<{/literal}>
<h1>section/sectionelse</h1>
<{section name=fruit loop=$arr1}>
<{$arr1[fruit]}>
<{/section}>
<br/>

<{section name=member loop=$arr2}>
<{$arr2[member].id}><{$arr2[member].name}>
<br/>
<{/section}>
</html>