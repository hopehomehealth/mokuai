<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
body { 
    margin-left: 3px;
    margin-top: 0px;
    margin-right: 3px;
    margin-bottom: 0px;
}
.STYLE1 {
    color: #e1e2e3;
    font-size: 12px;
}
.STYLE6 {color: #000000; font-size: 12; }
.STYLE10 {color: #000000; font-size: 12px; }
.STYLE19 {
    color: #344b50;
    font-size: 12px;
}
.STYLE21 {
    font-size: 12px;
    color: #3b6375;
}
.STYLE22 {
    font-size: 12px;
    color: #295568;
}
a:link{
    color:#3b6375; text-decoration:none;
}
a:visited{
    color:#3b6375; text-decoration:none;
}
-->
</style>
<script type="text/javascript" src="<?php echo C('JS_URL');?>jquery-1.8.3.min.js"></script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="6%" height="19" valign="bottom"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>tb.gif" width="14" height="14" /></div></td>
                <td width="94%" valign="bottom"><span class="STYLE1"> <?php echo ($daohang["title1"]); ?> -> <?php echo ($daohang["title2"]); ?></span></td>
              </tr>
            </table></td>
            <td><div align="right"><span class="STYLE1">
              <a href="<?php echo ($daohang["act_link"]); ?>" target='_self'><img src="<?php echo C('AD_IMG_URL');?>add.gif" width="10" height="10" /> <?php echo ($daohang["act"]); ?></a>   &nbsp; 
              </span>
              <span class="STYLE1"> &nbsp;</span></div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>

<!--代表，分表代表 不不同页面的主体部分-->
<script type="text/javascript">
  //根据当前选中的类型 获得 对应的属性列表信息
  function show_attr(){
    var type_id = $('#type_id').val(); //选中类型的id信息

    //ajax带着type_id去服务器端获得对应的属性信息
    $.ajax({
      url:"/index.php/Admin/Attribute/getAttrByType",
      data:{'type_id':type_id},
      dataType:'json',
      //type:'get',
      success:function(msg){
        //console.log(msg);

        //遍历msg使得与html标签结合 并最终追加给页面
        var s = "";
        $.each(msg,function(n,v){
          //n  代表遍历出来子级元素的下标序号(0/1/2/...)
          //this 和 v 代表遍历出来的子级对象
          s += '<tr> <td height="20" bgcolor="#FFFFFF"><div align="center"> <input type="checkbox" id="checkbox2" name="checkbox2"> </div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE6"> <div align="center"><span class="STYLE19">'+v.attr_id+'</span></div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE19"> <div align="left">'+v.attr_name+'</div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE19"> <div align="center">'+v.type_name+'</div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE19"> <div align="center">';
          s += v.attr_sel=='0'?'唯一':'多选';
          s += '</div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE19"> <div align="center">';
          s += v.attr_write=='0'?'手工录入':'从列表选择';
          s += '</div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE19"> <div align="center">'+v.attr_vals+'</div></td> <td height="20" bgcolor="#FFFFFF"><div align="center" class="STYLE21"> <img width="10" height="10" src="/Public/Admin/images/del.gif"> 删除 | 查看 | <img width="10" height="10" src="/Public/Admin/images/edit.gif"> <a href="/index.php/Admin/Attribute/upd.html" class="STYLE21">编辑</a></div></td> </tr>';
        });
        $('#attr_data_show tr:gt(0)').remove();//清除旧的数据
        $('#attr_data_show').append(s);//追加新的数据
      }
    });
  }

//页面加载完毕就调用show_attr()以便展示对应的属性信息
$(function(){
  show_attr();
});

</script>

  <tr>
    <td colspan='100' class="STYLE10"  bgcolor="d3ea01">
      按商品类型显示:
        <select name="type_id" id="type_id" onchange="show_attr()">
          <option value='0'>-请选择-</option>
          <?php if(is_array($typeinfo)): foreach($typeinfo as $key=>$v): ?><option value='<?php echo ($v["type_id"]); ?>'
            <?php if(($v["type_id"]) == $_GET['type_id']): ?>selected="selected"<?php endif; ?>
            ><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
        </select>
    </td>
  </tr>

  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce" id="attr_data_show">
      <tr>
        <td width="4%" height="20" bgcolor="d3eaef" class="STYLE10"><div align="center">
          <input type="checkbox" name="checkbox" id="checkbox" />
        </div></td>
        <td width="10%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">属性id</span></div></td>
        <td width="15%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">属性名称</span></div></td>
        <td width="7%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">所属类型</span></div></td>
        <td width="7%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">是否单选</span></div></td>
        <td width="7%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">属性值的录入方式</span></div></td>
        <td width="14%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">可选值列表</span></div></td>
        <td width="*" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="33%"><div align="left"><span class="STYLE22">&nbsp;&nbsp;&nbsp;&nbsp;共有<strong> 243</strong> 条记录，当前第<strong> 1</strong> 页，共 <strong>10</strong> 页</span></div></td>
        <td width="67%"><table width="312" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_54.gif" width="40" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_56.gif" width="45" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_58.gif" width="45" height="15" /></div></td>
            <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_60.gif" width="40" height="15" /></div></td>
            <td width="37" class="STYLE22"><div align="center">转到</div></td>
            <td width="22"><div align="center">
              <input type="text" name="textfield" id="textfield"  style="width:20px; height:12px; font-size:12px; border:solid 1px #7aaebd;"/>
            </div></td>
            <td width="22" class="STYLE22"><div align="center">页</div></td>
            <td width="35"><img src="<?php echo C('AD_IMG_URL');?>main_62.gif" width="26" height="15" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>




</body>
</html>