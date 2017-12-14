<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>蓝海长青后台管理系统</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>page.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>style.css">

</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>蓝海长青管理后台 </small>
            </a>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li >
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <i class="icon-user bigger-140"></i><?php echo (session('admin_name')); ?>
                    </a>
                    <!--<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">-->
                        <!--<li>-->
                            <!--<a href="">-->
                                <!--<i class="icon-edit"></i>-->
                                <!--修改密码-->
                            <!--</a>-->
                        <!--</li>-->
                    <!--</ul>-->
                </li>
                <li >
                    <a href="<?php echo U('Manager/logout');?>" target="_top"
                       onclick="if(confirm('确认要退出系统么？')==false){return false;}">
                        <i class="icon-off bigger-130"></i>退出
                    </a>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.navbar-container-->
</div><!-- /.navbar-->
<div class="main-container">
    <div class="main-container-inner">
        <div class="sidebar" id="sidebar">
            <ul class="nav nav-list">
                <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): if(($v["auth_c"] != '') AND ($v["auth_a"] != '')): ?><li <?php if((CONTROLLER_NAME == $v['auth_c']) AND (ACTION_NAME == $v['auth_a'])): ?>class="active"<?php endif; ?>>

                            <a href="/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>">
                                <e><img src="<?php echo (IMG_URL); ?>tb.png" alt="" style="padding-left: 6px;padding-right: 6px;"/></e>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?></span>
                            </a>         
                        </li>
                    <?php elseif(($v["auth_a"] == '') AND ($v["auth_c"] == '')): ?>
                        <li>
                            <a class="dropdown-toggle">
                                <e><img src="<?php echo (IMG_URL); ?>tb.png" alt="" style="padding-left: 6px;padding-right: 6px;"/></e>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                                <b class="arrow icon-angle-down"></b>
                            </a>
                            <ul class="submenu">
                                <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><li <?php if((CONTROLLER_NAME == $vv['auth_c']) AND (ACTION_NAME == $vv['auth_a'])): ?>class="active"<?php endif; ?>>
                                            <a href="/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>">
                                                <i class="icon-double-angle-right"></i> <?php echo ($vv["auth_name"]); ?>
                                            </a>
                                        </li><?php endif; endforeach; endif; ?>
                            </ul>
                         </li><?php endif; endforeach; endif; ?>
            </ul>
            <!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>
        
                <style type="text/css">
          .rankinfo{width:400px;float:left;margin-right:10px;border:3px solid #ccc;margin-bottom:3px;padding:5px 5px;text-align:center;border-radius:2px;}
          .rankinfo span{display:inline-block;width:25%;height:30px;line-height:30px;text-align:left;color:#a39599}
          .clear{clear:both;}
        </style>
        <div class="main-content">
          <div class="page-content">
            <div class="row">
              <div class="page-content box">
              	<div class="box-title margin_bot_20">
                  	<div class="span10">
                   		<h3><i class="icon-cogs"></i>论坛设置中心</h3>
                  	</div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li> <a href="/index.php/Admin/Bbs/base">基本设置 </a> </li>
                        <li> <a href="/index.php/Admin/Score/showlist">积分规则 </a> </li>
                        <li class="active"> <a href="/index.php/Admin/Rank/showlist">自定义等级 </a> </li>
                    </ul>
                    <!-- .breadcrumb -->
                </div>
                <div style="padding:10px 0;display:inline-block" id="ranktable">
                  <?php if(is_array($ranklist)): foreach($ranklist as $key=>$info): ?><div class="action-buttons rankinfo" rankid="<?php echo ($info["id"]); ?>"><span>级别: <b style="color:#f06808" class="rankname"><?php echo ($info["rank_name"]); ?></b></span><span>积分值: <b style="color:#f06808" class="score"><?php echo ($info["score"]); ?></b></span><span>图标：<div style="display:inline-block;width:50px;height:30px;overflow:hidden;vertical-align:middle"><img style="width:30px" class="rankimg" src="<?php echo ($info["rank_img"]); ?>"></div></span><span><a href="javascript:void(0)" class="xiugai green"><i class="icon-pencil bigger-130"></i>&nbsp;</a><a href="/index.php/Admin/Rank/del/id/<?php echo ($info["id"]); ?>" onclick="return confirm('确定要删除吗?')" class="red"><i class="icon-remove bigger-130"></i>&nbsp;</a></span></div><?php endforeach; endif; ?>
                  <div class="clear"></div>
                </div>
                <div style="padding:0px 0;">
                  <button id="addline" style="width:400px;background:#ddd;height:37px;border:1px solid #ccc;border-top:0;outline:none;font-size:2em;color:#999"><i class="icon-plus"></i></button>
                </div>
                <div id="editoradd" style="display:none">
                <form id="form" action="/index.php/Admin/Rank/tianjia" method="post" enctype="multipart/form-data">
                  <table class="table table-striped table-bordered table-hover" style="margin-bottom:0">
                      <thead>
                      <tr>
                          <th width="240px">等级名称</th>
                          <th width="240px">积分值</th>
                          <th width="240px">图标</th>
                          <th width="240px">选择图标</th>
                          <th width="240px">操作</th>
                      </tr>
                      </thead>
                      <tbody>

                      <tr>
                          <td><input  style="border:none;border-bottom:1px solid #ccc;color:#6dbaec;text-align:center;background:rgba(3,34,33,0);" type="text" name="rank_name" value=""></td>
                          <td><input style="border:none;border-bottom:1px solid #ccc;width:100px;color:#6dbaec;text-align:center;background:rgba(3,34,33,0);" type="text" name="score" value=""></td>
                          <td>
                            <div style="display:inline-block;height:30px;width:60px;overflow:hidden"><img style="height:30px" id="preview" src=""></div>
                          </td>
                          <td><div id="localImag" style="display:inline-block;width:60px;height:30px;line-height:30px;background:#9d2105;color:#fff;font-weight:bolder;border-radius:2px 2px;position:relative;">设置图标<input style="position:absolute;left:0;top:0px;width:100%;height:100%;opacity:0;cursor:pointer" onchange="javascript:setImagePreview();" type="file" id="selectpic" name="rank_img"></div></td>
                          <input type="hidden" name="id" value="">
                          <td class="action-buttons"><a href="javascript:void(0)" id="savebtn" class="green"><i class="icon-save bigger-130"></i>&nbsp;保存</a></td>
                      </tr>
                      </tbody>
                  </table>
                </form>
                </div>
              </div>
            </div>
            <!--/.box-->
          </div><!-- /.page-content -->
        </div><!-- /.main-content -->
        <script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
        <script type="text/javascript">
            $(function(){
                //选项卡
                $(".breadcrumbs .filterorder").click(function(){
                    $(this).addClass("active").siblings().removeClass('active');
                    var filter = $(this).attr("filter");
                    ajax_page("/index.php/Admin/Order/filterorder",filter);
                    $(".technorati").on('click','a',function(){
                      //alert(111);
                        var url = $(this).attr("href");
                        ajax_page(url);
                        return false;  //让a标签不能跳转
                    })
                })
                //添加自定义级别头衔
                $("#addline").click(function(){
                  /*var lastline = $("#ruletable tbody tr").last();
                  var No = parseInt(lastline.children("td").first().text())+1;
                  $(".clear").before("<div class='action-buttons rankinfo'><span>级别:司令</span><span>积分值:1000</span><span>图标：V</span><span><a href='' class='green'><i class='icon-pencil bigger-130'></i>&nbsp;</a><a href='' class='red'><i class='icon-remove bigger-130'></i>&nbsp;</a></span></div>");*/
                  $(this).attr('disabled',true);
                  $("#editoradd").fadeIn(500);
                })
                //修改
                $(".xiugai").click(function(){
                  var thisobj = $(this);
                  $("#editoradd").fadeIn(500);
                  $("input[name='id']").val(thisobj.parent().parent().attr('rankid'));
                  $("input[name='rank_name']").val(thisobj.parent().parent().find('.rankname').text());
                  $("input[name='score']").val(thisobj.parent().parent().find('.score').text());
                  $("#preview").attr('src',thisobj.parent().parent().find('.rankimg').attr('src'));
                })
                $("input[name='score']").blur(function(){
                  if(isNaN($("input[name='score']").val())){
                    $("input[name='score']").val(0);
                  }else{
                    var score = Math.ceil(Math.abs($("input[name='score']").val()));
                    $("input[name='score']").val(score);
                  }
                })
                $("#savebtn").click(function(){
                  if($("input[name='rank_name']").val() == ''){
                    alert('名称不等为空');
                    return false;
                  }
                  if($("input[name='score']").val() == ''){
                    alert('积分不能为空');
                    return false;
                  }
                  /*if($("input[name='rank_img']").val() == ''){
                    alert('请选择图标');
                    return false;
                  }*/

                  $("#form").submit();
                })
            })
        </script>
        <script type="text/javascript">
          function setImagePreview(avalue) {
            var docObj=document.getElementById("selectpic");

            var imgObjPreview=document.getElementById("preview");
            if(docObj.files &&docObj.files[0])
            {
            //火狐下，直接设img属性
            imgObjPreview.style.display = 'block';
            imgObjPreview.style.width = '100px';
            imgObjPreview.style.height = '100px';
            //imgObjPreview.src = docObj.files[0].getAsDataURL();

            //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
            imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
            }
            else
            {
            //IE下，使用滤镜
            docObj.select();
            var imgSrc = document.selection.createRange().text;
            var localImagId = document.getElementById("localImag");
            //必须设置初始大小
            localImagId.style.width = "100px";
            localImagId.style.height = "100px";
            //图片异常的捕捉，防止用户修改后缀来伪造图片
            try{
            localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
            localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
            }
            catch(e)
            {
            alert("您上传的图片格式不正确，请重新选择!");
            return false;
            }
            imgObjPreview.style.display = 'none';
            document.selection.empty();
            }
            return true;
          }
      </script>


    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->


<script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript">
    $('.active').parent().parent().addClass("active open");
</script>
<script src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script src="<?php echo (JS_URL); ?>ace.min.js"></script>
</body>
</html>