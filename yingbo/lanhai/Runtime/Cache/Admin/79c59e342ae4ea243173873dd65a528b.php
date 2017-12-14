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
        
                <script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.config.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/ueditor.all.min.js' ></script>
<script type="text/javascript" src='<?php echo (PLUGIN_URL); ?>ueditor/lang/zh-cn/zh-cn.js' ></script>
		<div class="main-content">
          <div class="page-content">
            <div class="row">
              <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-cogs"></i>系统配置</h3>
                    </div>
                </div>
                <div class="breadcrumbs" style="margin-bottom:20px">
                    <ul>
                        <li class="active"> <a href="#">前台分页 </a></li>
                         <li> <a href="#">网站电话 </a></li>
						<li> <a href="#">邮箱设置 </a></li>
						<li> <a href="#">服务条款 </a></li>
						<li> <a href="#">蓝海长青公约 </a></li>
                        <li> <a href="#">敏感词处理 </a></li>

                        <!-- <li> <a href="/index.php/Admin/Keyword/index">关键词回复 </a></li>
                        <li> <a href="/index.php/Admin/Tnews/index">图文消息回复 </a></li> -->


                    </ul>
                    <!-- .breadcrumb -->
                </div>
                <div style="margin-top:15px">
                    <form action="/index.php/Admin/Sysconfig/base" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label">长青论坛轮播数目 : </label>
                            <div class="controls pull-left">
                                <input type="text" name="pc_scroll_index" value="<?php echo ($set["pc_scroll_index"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">长青论坛博文数目 : </label>
                            <div class="controls pull-left">
                                <input type="text" name="pc_bg_index" value="<?php echo ($set["pc_bg_index"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">长青论坛新帖数量 : </label>
                            <div class="controls pull-left">
                                <input type="text" name="pc_new_index" value="<?php echo ($set["pc_new_index"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">长青论坛名家数量 : </label>
                            <div class="controls pull-left">
                                <input type="text" name="pc_famous1_index" value="<?php echo ($set["pc_famous1_index"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">长青论坛人物数量 : </label>
                            <div class="controls pull-left">
                                <input type="text" name="pc_famous2_index" value="<?php echo ($set["pc_famous2_index"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <input type="hidden" name="setid" value="<?php echo ($set["id"]); ?>">
                            <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存</button>
                        </div>
                    </form>
                    <form action="/index.php/Admin/Sysconfig/base" method="post" class="form-horizontal"  style="display:none">
                        <div class="form-group" >
                            <label class="control-label">网站电话: </label>
                            <div class="controls pull-left">
                                <input type="text" name="phone" value="<?php echo ($set["phone"]); ?>" class="input-large">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label"></label>
                            <input type="hidden" name="setid" value="<?php echo ($set["id"]); ?>">
                            <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存</button>
                        </div>
                    </form>
					<form action="/index.php/Admin/Sysconfig/base" method="post" class="form-horizontal"  style="display:none">
                        <div class="form-group" >
                            <label class="control-label">系统发件邮箱: </label>
                            <div class="controls pull-left">
                                <input type="text" name="email" value="<?php echo ($set["email"]); ?>" class="input-large">
                            </div>
                        </div>
						 <div class="form-group" >
                            <label class="control-label">系统邮箱密码: </label>
                            <div class="controls pull-left">
                                <input type="text" name="emailpwd" value="<?php echo ($set["emailpwd"]); ?>" class="input-large">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <input type="hidden" name="setid" value="<?php echo ($set["id"]); ?>">
                            <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存</button>
                        </div>
                    </form>
					<form action="/index.php/Admin/Sysconfig/base" method="post" class="form-horizontal"  style="display:none">
							<div class="form-group" id="detail-tab-show">

								<div class="controls" style="height:50px;font-size:1.5em;font-weight:bolder">《服务条款》:</div>
								<div class="controls">
									<textarea rows="5" cols="15" id='tiaokuan' name='tiaokuan' style='width:650px;height:350px;'><?php echo ($set["tiaokuan"]); ?></textarea>
								</div>
								<script type="text/javascript">
									var ue1 = UE.getEditor('tiaokuan',{toolbars: [[
										'fullscreen', 'source', '|', 'undo', 'redo', '|',
										'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
										'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
										'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
										'directionalityltr', 'directionalityrtl', 'indent', '|',
										'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase'
									]]});
								</script>
								<div class="form-group">
									<label class="control-label"></label>
									<input type="hidden" name="setid" value="<?php echo ($set["id"]); ?>">
									<button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存</button>
								</div>
							</div>
                    </form>
					<form action="/index.php/Admin/Sysconfig/base" method="post" class="form-horizontal"  style="display:none">
							<div class="form-group" id="detail-tab-show">

								<div class="controls" style="height:50px;font-size:1.5em;font-weight:bolder">蓝海长青公约:</div>
								<div class="controls">
									<textarea rows="5" cols="15" id='gongyue' name='gongyue' style='width:650px;height:350px;'><?php echo ($set["gongyue"]); ?></textarea>
								</div>
								<script type="text/javascript">
									var ue2 = UE.getEditor('gongyue',{toolbars: [[
										'fullscreen', 'source', '|', 'undo', 'redo', '|',
										'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
										'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
										'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
										'directionalityltr', 'directionalityrtl', 'indent', '|',
										'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase'
									]]});
								</script>
								<div class="form-group">
									<label class="control-label"></label>
									<input type="hidden" name="setid" value="<?php echo ($set["id"]); ?>">
									<button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存</button>
								</div>
							</div>
                    </form>
                    <form action="/index.php/Admin/Sysconfig/addword" method="post" id="newword" class="form-horizontal" style="display:none">
						<div class="form-group">
							<label class="control-label" style="width:100px;line-height:28px;padding-top:0">敏感词： </label>
							<div class="controls pull-left">
							  <input type="text" class="input-medium" name="word" value="" placeholder="请输入敏感词">
							  <button type="button" id="addword" class="btn btn-sm btn-primary">添加</button>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label" style="width:100px;line-height:28px;padding-top:0">敏感词库 : </label>
							<div class="form-group">
								<label class="control-label"></label>
								<div class="controls pull-left">
								  <button type="button" id="editbtn" class="btn btn-sm btn-primary">保存修改</button>
								</div>
							</div>
							<div class="controls pull-left">
							<textarea class="input-large" id="description" style="margin: 0px; height: 500px; width: 400px;" name="description"><?php echo ($wordlist); ?></textarea>
							</div>
						</div>
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
                $(".breadcrumbs ul li").click(function(){
                    $(this).addClass("active").siblings().removeClass('active');
                    $("form").eq($(this).index()).css("display","block").siblings().css("display","none");
                })
				$("#addword").click(function(){
					$.post($("#newword").attr('action'),$("#newword").serialize(),function(data){
						if(data == 'success'){
							alert('添加成功');
						}else{
							alert('已存在');
						}
					})
				})
				$("#editbtn").click(function(){
					$.post("/index.php/Admin/Sysconfig/upd",{'description':$("#description").val()},function(data){
						if(data == 'success'){
							alert('修改成功');
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