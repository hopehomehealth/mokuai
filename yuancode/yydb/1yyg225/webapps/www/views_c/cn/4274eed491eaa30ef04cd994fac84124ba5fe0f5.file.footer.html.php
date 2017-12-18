<?php /* Smarty version Smarty-3.1.13, created on 2016-04-10 15:36:48
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\disk\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:426056cea312dac136-56066501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4274eed491eaa30ef04cd994fac84124ba5fe0f5' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\disk\\footer.html',
      1 => 1459401989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '426056cea312dac136-56066501',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea312e24325_61167538',
  'variables' => 
  array (
    'folder' => 0,
    'm' => 0,
    'L' => 0,
    'foldername' => 0,
    'folderid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea312e24325_61167538')) {function content_56cea312e24325_61167538($_smarty_tpl) {?><!--编辑文件到云购网盘界面-->
<script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script>
<div class="xz_bjfolderBox" style="display:none;">
  <div class="xz_sc">
    <div class="xz_sc_top"><label>编辑文件夹</label><p><a class="a1"></a><a class="a2"></a></p></div>
    <div class="xz_scL">
      <form action="/disk/editfolder" method="POST">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr style="display:none;"><td width="90">移动位置：</td>
          <td>
	          <select name="folderid">
	          	<option value="0">请选择文件夹</option>
	          	<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['folder']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
	          	<option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</option>
	          	<?php } ?>
	          </select>
          </td>
          </tr>
          <tr><td width="90">文件夹名称：</td><td><input name="title" id="title" type="text"></td></tr>
          <tr><td width="90">描述(选填)：</td><td><textarea name="description" id="description"></textarea></td></tr>
          <tr><td width="90"></td><td>
          <input type="hidden" name="folderid" value="" id="folderid"/>
          <input type="submit" value="编辑">
          </td></tr>
        </table>
      </form>
    </div>
  </div>
</div>
<!--编辑文件到云购网盘界面结束-->
<div class="xz_bjBox" style="display:none;">
  <div class="xz_sc">
    <div class="xz_sc_top"><label>编辑文件</label><p><a class="a1"></a><a class="a2"></a></p></div>
    <div class="xz_scL">
      <form action="/disk/editfile" method="POST">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr style="display:none;"><td width="90">移动位置：</td>
          <td>
	          <select name="folderid">
	          	<option value="0">请选择文件夹</option>
	          	<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['folder']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
	          	<option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</option>
	          	<?php } ?>
	          </select>
          </td>
          </tr>
          <tr><td width="90">文件名称：</td><td><input name="title" id="title" type="text"></td></tr>
         
          <tr><td width="90"></td><td>
          <input type="hidden" name="fileid" value="" id="fileid"/>
          <input type="submit" value="编辑">
          </td></tr>
        </table>
      </form>
    </div>
  </div>
</div>
<!--编辑文件到云购网盘界面结束-->
<!--上传文件到云购网盘界面-->
<div class="xz_xjBox" style="display:none;">
  <div class="xz_sc">
    <div class="xz_sc_top"><label>新建文件夹</label><p><a class="a1"></a><a class="a2"></a></p></div>
    <div class="xz_scL">
      <form action="/disk/addfolder" method="POST">
        <table cellpadding="0" cellspacing="0" width="100%">
          <tr style="display:none;"><td width="90">上级文件夹：</td>
          <td>
          <select name="parentid">
          <option value="0">根目录</option>
          
          </select>
          </td>
          </tr>
          <tr><td width="90">文件夹名称：</td><td><input name="title" type="text"></td></tr>
          <tr><td width="90">描述(选填)：</td><td><textarea name="description"></textarea></td></tr>
          <tr><td width="90"></td><td><input type="submit" value="新建"></td></tr>
        </table>
      </form>
    </div>
  </div>
</div>
<!--上传文件到云购网盘界面结束-->
<!--上传文件到云购网盘界面-->
<div class="xz_scBox" style="display:none;">
  <div class="xz_sc">
    <div class="xz_sc_top"><label>上传文件到<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
网盘</label><p><a class="a2"></a></p></div>
    <div class="xz_scL">
      <div class="xz_sc_hd">
      <a onclick="doclick1()"><img src="/images/xz_beij3.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;到：
      <a>我的网盘</a>&nbsp;&nbsp;>&nbsp;&nbsp;<a><?php if ($_smarty_tpl->tpl_vars['foldername']->value){?><?php echo $_smarty_tpl->tpl_vars['foldername']->value;?>
<?php }else{ ?>默认文件夹<?php }?></a>
      </div>
      <form action="/disk/addfile" method="POST" id="form1"  enctype="multipart/form-data">
      <div class="xz_sc_list">
        <ul id="filelist">
        </ul>
      </div>
      <input type="hidden" name="folderid" value="<?php echo $_smarty_tpl->tpl_vars['folderid']->value;?>
"/>
      <div class="xz_sc_button"><a id="form_submit"><img src="/images/xz_beij4.png"></a></div>
      </form>
    </div>
  </div>
</div>
<!--上传文件到云购网盘界面结束-->


<script>
function doclick1(){      
    var inputobj = document.createElement("input");  
    var num = $(".file").length;
    /* inputobj.type = "file";
    inputobj.id = "inputobj";
    inputobj.name = "inputobj"; */
    var name = "images"+num;
    $("#filelist").append("<li class=\"file\"><p><input type=\"file\" id=\""+name+"\" name=\""+name+"\"/></p><i></i></li>");
    var ie = navigator.appName == "Microsoft Internet Explorer" ? true : false;  
  
    if(ie){  
        document.getElementById(name).click();  
    }else{
        var mouseobj = document.createEvent("MouseEvents");  
        mouseobj.initEvent("click", true, true);
        document.getElementById(name).dispatchEvent(mouseobj);  
    }  
}  
  
function doclick2(){  
    var ie = navigator.appName == "Microsoft Internet Explorer" ? true : false;  
  
    if(ie){  
        document.getElementById('fileid').click();  
    }else{            
        var mouseobj = document.createEvent("MouseEvents");  
        mouseobj.initEvent("click", true, true);    
        document.getElementById('fileid').dispatchEvent(mouseobj);  
    }  
}  
</script>  
<script>
 $(function(){
  var $rai = $(".gr_dom .right table .td3 .ra1 .editfile");
  $(".xz_ny tr:odd td:not(:first)").css("background-color","#fff4f5");
  $rai.click(function(){
	$(this).css("background","url(/images/xz_a11.png) no-repeat left center")  ;
	$(this).siblings(".ra1").css("background","url(/images/xz_a10.png) no-repeat left center")  ;
	  }); 
  /*弹窗*/
  $(".xz_but").click(function(){
	$(".xz_scBox").show(); 
	  });
  var $a_close = $(".xz_sc_top .a2");
  $a_close.click(function(){
	$(".xz_scBox").hide(); 
	  });
  var $i_close = $(".xz_sc_list ul li i");
  $i_close.click(function(){
	$(this).parent().hide();
	  });
  $("#upload_button").click(function(){
	  $(".xz_scBox").show();
  }) ;
  $("#form_submit").click(function(){
	  $("#form1").submit();
  });
  var $a_close = $(".xz_sc_top .a2");
  $a_close.click(function(){
	$(".xz_xjBox").hide(); 
	  });
  var $i_close = $(".xz_sc_list ul li i");
  $i_close.click(function(){
	$(this).parent().hide();
	  });
  $("#folder_button").click(function(){
	  $(".xz_xjBox").show();
  }) ;
  var $a_close = $(".xz_sc_top .a2");
  $a_close.click(function(){
	$(".xz_bjBox").hide(); 
	  });
  $(".editfile").click(function(){
	  $.post('/disk/Ajaxedit','id='+$(this).attr('value'),function(data){
		  if(data.error==1){
	        	$("#title").val(data.file.title);
	        	$("#description").html(data.file.description);
	        	$("#fileid").val(data.file.id);
	        }
	    },'json');
	  $(".xz_bjBox").show();
  }) ;
  var $a_close = $(".xz_sc_top .a2");
  $a_close.click(function(){
	$(".xz_bjfolderBox").hide(); 
	  });
  $(".editfolder").click(function(){
	  $.post('/disk/Ajaxfolderedit','id='+$(this).attr('value'),function(data){
		  if(data.error==1){
	        	$("#title").val(data.folder.title);
	        	$("#description").html(data.folder.description);
	        	$("#folderid").val(data.folder.id);
	        }
	    },'json');
	  $(".xz_bjfolderBox").show();
  }) ;
 
	 })
</script>
<?php }} ?>