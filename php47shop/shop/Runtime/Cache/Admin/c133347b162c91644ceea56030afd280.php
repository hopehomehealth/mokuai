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
<!--为使用富文本编辑器，引入3个js文件-->
<script type="text/javascript" src="<?php echo C('PLUGIN_URL');?>ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo C('PLUGIN_URL');?>ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="<?php echo C('PLUGIN_URL');?>ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript" src="<?php echo C('AD_JS_URL');?>uploadPreview.js"></script>

<style type="text/css">
#tabbar-div {
    background: none repeat scroll 0 0 #80BDCB;
    height: 22px;
    padding-left: 10px;
    padding-top: 1px;
    font-size:12px;
}
#tabbar-div p {
    margin: 2px 0 0;
}
.tab-front {
    background: none repeat scroll 0 0 #BBDDE5;
    border-right: 2px solid #278296;
    cursor: pointer;
    font-weight: bold;
    line-height: 20px;
    padding: 4px 15px 4px 18px;
}
.tab-back {
    border-right: 1px solid #FFFFFF;
    color: #FFFFFF;
    cursor: pointer;
    line-height: 20px;
    padding: 4px 15px 4px 18px;
}
</style>

  <tr>
    <td colspan='100'>
<script type="text/javascript">
//"页面加载"完毕就给span标签设置点击高亮显示的onclick事件
$(function(){
  $('#tabbar-div span').click(function(){
    //对应标签高亮显示
    $('#tabbar-div span').attr('class','tab-back');//全部span标签变暗
    $(this).attr('class','tab-front');//当前点击的标签"高亮""

    //标签切换对应内容显示
    $('table[id$=cont]').hide();//全部的table区域隐藏
    //当前点中标签对应的table区域显示
    var idflag = $(this).attr('id');
    $('#'+idflag+'-cont').show();
  });
});
</script>

      <div id="tabbar-div">
        <p>
          <span id="general-tab" class="tab-front">通用信息</span>
          <span id="detail-tab" class="tab-back">详细描述</span>
          <span id="mix-tab" class="tab-back">其他信息</span>
          <span id="properties-tab" class="tab-back">商品属性</span>
          <span id="gallery-tab" class="tab-back">商品相册</span>
          <span id="linkgoods-tab" class="tab-back">关联商品</span>
          <span id="groupgoods-tab" class="tab-back">配件</span>
          <span id="article-tab" class="tab-back">关联文章</span>
        </p>
      </div>
    </td>
  </tr>
  <tr>
    <td>
    <form action="/index.php/Admin/Goods/tianjia.html" method="post" enctype="multipart/form-data">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce"
    id="general-tab-cont">
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品名称：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="text" name="goods_name" />
        </div></td>
      </tr>      
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6">
<script type="text/javascript">
  //根据flag标识分类 获得 次级别分类信息
  function show_cat(flag){
    var cat_id = $('#cat_id_'+flag).val();//获得当前选中的主分类信息

    //ajax带着cat_id去服务器端获得第2级别分类信息
    $.ajax({
      url:"/index.php/Admin/Category/getCatByPid",
      data:{'cat_id':cat_id},
      dataType:'json',
      type:'get',
      success:function(msg){
        //console.log(msg);//[Object { cat_id="16", cat_name="数字音乐", cat_pid="15", 更多...}, Object { cat_id="22", cat_name="文艺", cat_pid="15", 更多...}]

        //遍历msg，与html标签结合，最后追加给页面
        var s = "<option value='0'>-请选择-</option>";
        $.each(msg,function(n,v){
          s += '<option value="'+v.cat_id+'">'+v.cat_name+'</option>';
        });
        //第2/3级别分类归位
        if(flag==1){
          $('#cat_id_2').html("<option value='0'>-请选择-</option>");
          $('#cat_id_3').html("<option value='0'>-请选择-</option>");
        }

        //把s追加给页面
        nextflag = flag+1;
        $('#cat_id_'+nextflag).html(s);//有覆盖旧信息效果
      }
    });
  }
</script>

        <div align="right"><span class="STYLE19">商品分类(主)：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <select id="cat_id_1" name='cat_id' onchange="show_cat(1)">
          <option value='0'>-请选择-</option>
          <?php if(is_array($catinfoA)): foreach($catinfoA as $key=>$v): ?><option value='<?php echo ($v["cat_id"]); ?>'><?php echo ($v["cat_name"]); ?></option><?php endforeach; endif; ?>
        </select>

        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">商品分类(扩展)：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <select name='ext_cat[]' id="cat_id_2" onchange="show_cat(2)">
          <option value='0'>-请选择-</option>
        </select>
        <select name='ext_cat[]' id="cat_id_3">
          <option value='0'>-请选择-</option>
        </select>
        </div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">价格：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="goods_price" /></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">数量：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="goods_number" /></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">重量：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left"><input type="text" name="goods_weight" /></div></td>
      </tr>      
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">logo图片：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        <input type="file" name="goods_logo" id="goods_logo" /></div>
        <div id="div_goods_logo"><img id="img_goods_logo" src="" alt="" style='width:100px; height:100px'></div>
        </td>
      </tr>
    </table>
<script type="text/javascript">
//页面加载好，给logo图片设置“选中立即”显示效果
$(function(){
    new uploadPreview({ UpBtn: "goods_logo", DivShow: "div_goods_logo", ImgShow: "img_goods_logo" });
});
</script>

    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce"
    id="detail-tab-cont" style='display:none;'>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19">详情描述：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="left">
        
        <textarea id="goods_introduce" name="goods_introduce"
          style="width:520px; height:210px;"
        ></textarea>

        </div></td>
      </tr> 
    </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce"
    id="mix-tab-cont" style='display:none;'>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6">其他信息</td>
      </tr> 
    </table>

<script type="text/javascript">
  //添加商品时，根据"类型"显示对应"属性"的表单域项目
  function show_goods_attr(){
    var type_id = $('#type_id').val(); //当前选中的类型id
    $.ajax({
      url:"/index.php/Admin/Attribute/getAttrByType2",
      data:{'type_id':type_id},
      dataType:'json',
      //type:,
      success:function(msg){
        //遍历msg的同时与html结合，并把生成的信息追加给页面
        var s = "";
        $.each(msg,function(n,v){

          if(v.attr_sel=='0'){
            //1)唯一属性表单域
            s += '<tr><td class="STYLE6" bgcolor="#FFFFFF"><div align="right"><span class="STYLE19">'+v.attr_name+'：</span></div></td><td bgcolor="#FFFFFF"  class="STYLE6"><div align="left">';
            s += '<input type="text" size="40" value="" name="attrids['+v.attr_id+'][]">';
            s += '</div></td></tr>';
          }else{
            //2)多选属性表单域
            s += '<tr><td class="STYLE6" bgcolor="#FFFFFF"><div align="right"><span class="STYLE19"><span onclick="add_attr_item(this)">[+]</span><e>'+v.attr_name+'：</e></span></div></td><td bgcolor="#FFFFFF"  class="STYLE6"><div align="left">';
            //设置下拉列表的显示内容
            var attr_vals_arr = v.attr_vals.split(',');//String--->Array
            s += '<select name="attrids['+v.attr_id+'][]"><option value="0">-请选择-</option>';
            $.each(attr_vals_arr,function(nn,vv){
              s += '<option value="'+vv+'">'+vv+'</option>';
            });
            s += '</select>';
            s += '</div></td></tr>';
          }
        });
        //页面属性表单域 需要清除旧的，追加新的
        $('#properties-tab-cont tr:gt(0)').remove();
        $('#properties-tab-cont').append(s);
      }
    });
  }

//点击[+]号复制表单域(多选属性表单域情形)
function add_attr_item(obj){
  var dst_tr = $(obj).parent().parent().parent().parent();//目标tr
  var fu_tr = dst_tr.clone();//复制项目

  //把fu_tr内部的[+]号变为[-]号
  fu_tr.find('span.STYLE19 span').remove();//找到并删除内部的[+]号span
  fu_tr.find('span.STYLE19 e').before('<span onclick="$(this).parent().parent().parent().parent().remove()">[-]</span>');//再追加一个[-]号的span

  //把复制好的tr进行追加
  dst_tr.after(fu_tr);  //兄弟关系追加
}
</script>

    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce"
    id="properties-tab-cont" style='display:none;'>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6" width="40%"><div align="right"><span class="STYLE19">商品类型：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE19" width="*"><div align="left">
        
        <select name="type_id" id="type_id" onchange="show_goods_attr()">
          <option value='0'>-请选择-</option>
          <?php if(is_array($typeinfo)): foreach($typeinfo as $key=>$v): ?><option value='<?php echo ($v["type_id"]); ?>'><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
        </select>

        </div></td>
      </tr>
    </table>

<script type="text/javascript">
//页面加载完毕，给“第一个相册”设置选中图片立即显示效果
$(function(){
  new uploadPreview({ UpBtn: "goods_pics_0", DivShow: "div_goods_pics_0", ImgShow: "img_goods_pics_0" });
});
</script>   
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce"
    id="gallery-tab-cont" style='display:none;'>
      
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19" onclick="add_pics()" style='cursor:pointer;'>[+]商品相册：</span></div></td>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6">
          <input type="file" name="goods_pics[]" id="goods_pics_0"/>
          <div id="div_goods_pics_0"><img id="img_goods_pics_0" src="" alt="" style="width:100px; height:100px" /></div>
        </td>
      </tr> 

    </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce"
    id="linkgoods-tab-cont" style='display:none;'>
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6">关联商品</td>
      </tr> 
    </table>

    <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
      <tr>
        <td height="20" bgcolor="#FFFFFF" class="STYLE6" colspan='100'>
          <div align="center"><input type="submit" value='添加商品' /></div>
        </td>
      </tr>
    </table>

    </form>
    </td>
  </tr>
</table>

<script type="text/javascript">
var pics_num = 1;//给增加的相册图片计数(全局变量)
//增加相册
function add_pics(){
  //本质：给table追加tr元素而已
  $('#gallery-tab-cont').append('<tr><td height="20" bgcolor="#FFFFFF" class="STYLE6"><div align="right"><span class="STYLE19" onclick="$(this).parent().parent().parent().remove()">[-]商品相册：</span></div></td> <td height="20" bgcolor="#FFFFFF" class="STYLE6"> <input type="file" name="goods_pics[]" id="goods_pics_'+pics_num+'" /><div id="div_goods_pics_'+pics_num+'"><img id="img_goods_pics_'+pics_num+'" src="" alt="" style="width:100px; height:100px" /></div></td></tr>');

  //给追加的相册设置“选中图片”立即显示效果
  new uploadPreview({ UpBtn: "goods_pics_"+pics_num, DivShow: "div_goods_pics_"+pics_num, ImgShow: "img_goods_pics_"+pics_num });
  pics_num++;
}

  var ue = UE.getEditor('goods_introduce',{toolbars: [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|','simpleupload', 'insertimage','rowspacingtop'
        ]]});
</script>



</body>
</html>