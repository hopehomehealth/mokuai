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
                        <li class="active"> <a href="/index.php/Admin/Score/showlist">积分规则 </a> </li>
                        <li> <a href="/index.php/Admin/Rank/showlist">自定义等级 </a> </li>
                    </ul>
                    <!-- .breadcrumb -->
                </div>
                <div style="padding:10px 0;" id="rulescore">
                  <table class="table table-striped table-bordered table-hover" style="margin-bottom:0">
                      <thead>
                      <tr>
                          <th width="5%">ID</th>
                          <th width="20%">操作名称</th>
                          <th width="10%">周期范围</th>
                          <th width="100px">周期内最多奖励次数</th>
                          <th width="10%">积分数量</th>
                          <th width="20%">操作</th>
                      </tr>
                      </thead>
                  </table>
                  <?php if(is_array($scorelist)): foreach($scorelist as $key=>$info): ?><form action="/index.php/Admin/Score/tianjia" method="post" class="scoreform">
                  <table class="table table-striped table-bordered table-hover" style="margin-bottom:0">
                      <tr>

                          <td width="5%"><?php echo ($info["id"]); ?></td>
                          <td width="20%"><input style="border:none;color:#6dbaec;text-align:center;background:rgba(3,34,33,0)!important;" type="text" name="opname" value="<?php echo ($info["opname"]); ?>" readonly></td>
                          <td width="10%">
                            <select name="cycle" style="border:none;background:rgba(3,34,33,0);" disabled="disabled"><option <?php if($info["cycle"] == 1): ?>selected="selected"<?php endif; ?> value="1">每天</option><option <?php if($info["cycle"] == 2): ?>selected="selected"<?php endif; ?> value="2">一次性</option><option <?php if($info["cycle"] == 3): ?>selected="selected"<?php endif; ?> value="3">无周期限制</option></select>
                          </td>
                          <td width="100px"><input class="allowedit" style="border:none;width:100px;color:#6dbaec;text-align:center;background:rgba(3,34,33,0)!important;" type="text" name="counts" value="<?php echo ($info["counts"]); ?>" readonly></td>
                          <td width="10%"><span style="font-size:1.2em;font-weight:bold;color:red">+</span><input class="allowedit" onKeydown="if(this.size < 6)this.size = (this.value.length*1)+1;" size="1" style="border:none;color:#6dbaec;text-align:center;background:rgba(3,34,33,0)!important;" type="text" name="number" value="<?php echo ($info["number"]); ?>" readonly></td>
                          <td width="20%" class="action-buttons"><input type="hidden" name="scoreid" value="<?php echo ($info["id"]); ?>"><a href="javascript:void(0)" class="green status1 editbtn"><i class="icon-pencil bigger-130"></i>&nbsp;编辑</a><?php if(($info["id"] == 1) OR ($info["id"] == 3) OR ($info["id"] == 10) OR ($info["id"] == 11) OR ($info["id"] == 12) OR ($info["id"] == 13) OR ($info["id"] == 14) OR ($info["id"] == 15)): else: ?>&nbsp;<a scoreid="<?php echo ($info["id"]); ?>" href="javascript:void(0)" class="red status1 delbtn"><i class="icon-remove bigger-130"></i>&nbsp;删除</a><?php endif; ?><button style='display:none;border:none;background:rgba(3,34,33,0);outline:none' class='green status2'><i class='icon-save bigger-130'></i>&nbsp;保存</button></td>
                      </tr>
                  </table>
                  </form><?php endforeach; endif; ?>
                  <!--<button id="btnadd" style="width:100%;background:#ddd;height:37px;border:1px solid #ccc;border-top:0;outline:none;font-size:2em;color:#999"><i class="icon-plus"></i></button>-->
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
                //添加规则
                $("#btnadd").click(function(){
                  $(".scoreform").last().after("<form class='scoreform' action='/index.php/Admin/Score/tianjia' method='post'><table class='table table-striped table-bordered table-hover'><tr><td width='5%'></td><td width='5%'></td><td width='20%'><input  style='border:none;border-bottom:1px solid #ccc;color:#6dbaec;text-align:center;background:rgba(3,34,33,0);' type='text' name='opname' value=''></td><td width='10%'><select name='cycle' style='border:none;border-bottom:1px solid #ccc;background:rgba(3,34,33,0);'><option value='1'>每天</option><option value='2'>一次性</option><option value='3'>无周期限制</option></select></td><td width='100px'><input style='border:none;border-bottom:1px solid #ccc;width:100px;color:#6dbaec;text-align:center;background:rgba(3,34,33,0);'' type='text' name='counts' value=''></td><td width='10%'><span style='font-weight:bolder;font-size:1.2em;color:red'>+</span><input onKeydown='if(this.size < 6)this.size = (this.value.length*1)+1;' size='1' style='border:none;border-bottom:1px solid #ccc;color:#6dbaec;text-align:center;background:rgba(3,34,33,0);' type='text' name='number' value=''></td><td width='20%' class='action-buttons'><button type='button' id='savebtn' style='border:none;background:rgba(3,34,33,0);outline:none' class='green'><i class='icon-save bigger-130'></i>&nbsp;确认添加</button></td></tr></table></form>");
                  $(this).attr('disabled',true);
                  $('.scoreform').each(function(){
                    $(this).find(".editbtn").unbind('click');
                  })
                })
                $("#rulescore").on('click','.scoreform #savebtn',function(){
                   var flag = false;
                   $(".scoreform:last input").each(function(){
                      if($(this).val() == ''){alert("内容不能为空");flag=true;return false;}
                   })
                   if(!flag){
                      $(".scoreform:last").submit();
                   }
                })
                //修改编辑规则
                $(".editbtn").click(function(){
                  $(this).hide().siblings('.status1').hide();
                  $(this).siblings('.status2').show();
                  $("#btnadd").attr('disabled',true);
                  $(this).parents("form").siblings('form').each(function(){
                    $(this).find(".status1").each(function(){
                      $(this).show();
                    })
                    $(this).find(".status2").each(function(){
                      $(this).hide();
                    });
                  });
                  $(this).parents("form").find(".allowedit").each(function(){
                    $(this).removeAttr('readonly').css("border-bottom","1px solid #ccc");
                  })
                  /*$(this).parents("form").find("select").each(function(){
                    $(this).attr('disabled',false).css("border-bottom","1px solid #ccc");
                  })*/
                  $(this).parents("form").siblings('form').each(function(){
                    $(this).find("input").each(function(){
                      $(this).attr('readonly','readonly').css("border-bottom","0");
                    });
                    $(this).find("select").each(function(){
                      $(this).attr('disabled',true).css("border-bottom","0");
                    });
                  });
                })
                //修改后保存
                $('.status2').click(function(){
                  var thisobj = $(this);
                  thisobj.parents('form').submit(function(){return false;});
                  $.post("/index.php/Admin/Score/upd",$(this).parents('form').serialize(),function(data){
                    thisobj.parents('form').find('input').each(function(){
                      $(this).attr('readonly','readonly').css("border-bottom","0");
                    });
                    thisobj.parents('form').find('select').each(function(){
                      $(this).attr('disabled',true).css("border-bottom","0");
                    });
                    thisobj.hide().siblings('.status1').show();
                    $("#btnadd").attr('disabled',false);
                    if(data == 'success'){
                      alert('修改成功');
                    }else{
                      alert('修改失败');
                    }
                  })
                })
                //删除积分规则
                $(".delbtn").click(function(){
                  var thisobj = $(this);
                  if(!confirm('你确定删除吗')){
                    return false;
                  }
                  $.post("/index.php/Admin/Score/del",{'id':thisobj.attr('scoreid')},function(data){
                    if(data == 'success'){
                      thisobj.parents('form').remove();
                      alert('删除成功');
                    }else{
                      alert('删除失败');
                    }
                  })
                })
            })
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