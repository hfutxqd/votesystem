﻿<?php /* Smarty version Smarty-3.0.8, created on 2014-11-18 17:16:13
         compiled from "D:\www\votesystem/tpl\config.html" */ ?>
<?php /*%%SmartyHeaderCode:4079546b0e5d9f9f55-57905777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f2c9cbd3d83e82ec00a8f1c9039b84657086fc3' => 
    array (
      0 => 'D:\\www\\votesystem/tpl\\config.html',
      1 => 1416302170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4079546b0e5d9f9f55-57905777',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="梦想瞬智网络科技" />
	<title>系统设置</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
<link href="http://www.kindsoft.net/ke4/themes/default/default.css" rel="stylesheet" type="text/css" />
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/xheditor-1.1.14-zh-cn.js"></script> 
    <script src="kindeditor/kindeditor.js" charset="gb2312"></script>
    <script src="kindeditor/lang/zh_CN.js" charset="gb2312"></script>
    <link href="http://cdn.bootcss.com/twitter-bootstrap/2.2.2/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://www.bootcss.com/p/bootstrap-datetimepicker/css/docs.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/prettify/r224/prettify.css" rel="stylesheet">
    <link href="http://www.bootcss.com/p/bootstrap-datetimepicker/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet">
<style>
body{margin: 0px;border: 0px;}
</style>    
    		<script>
			KindEditor.ready(function(K) {
				var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : 'php/upload_json.php?dir=file',
					afterUpload : function(data) {
						if (data.error === 0) {
							var url = K.formatUrl(data.url, 'absolute');
							K('#url').val(url);
						} else {
							alert(data.message);
						}
					},
					afterError : function(str) {
						alert('自定义错误信息: ' + str);
					}
				});
				uploadbutton.fileBox.change(function(e) {
					uploadbutton.submit();
				});
			});
		</script>
        <script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script> 
</head>
<body>
<div style="margin-top: 10px;text-align: left;">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'configgo'),$_smarty_tpl);?>
" method="POST">
<p>网站名称：&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cf_name" size="100" value="<?php echo $_smarty_tpl->getVariable('result')->value['cf_name'];?>
"/></p>
<p>备案号：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cf_icp" size="100" value="<?php echo $_smarty_tpl->getVariable('result')->value['cf_icp'];?>
"/></p>
<p>联系方式：&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cf_tel"  size="100" value="<?php echo $_smarty_tpl->getVariable('result')->value['cf_tel'];?>
"/></p>
<p>顶部banner：<input type="text" id="url" value="<?php echo $_smarty_tpl->getVariable('result')->value['cf_images'];?>
" readonly="readonly" name="cf_images" style="width: 550px;"/> <input type="button" id="uploadButton" value="上传图片"/></p> 
<p>开始时间：&nbsp;&nbsp;&nbsp;&nbsp;<input size="18" type="text" value="<?php echo $_smarty_tpl->getVariable('result')->value['cf_ontime'];?>
" readonly="" class="form_datetime1" name="cf_ontime"/></p>
<p>结束时间：&nbsp;&nbsp;&nbsp;&nbsp;<input size="18" type="text" value="<?php echo $_smarty_tpl->getVariable('result')->value['cf_offtime'];?>
" readonly="" class="form_datetime2" name="cf_offtime"/></p>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
    $('a[href^="#"]').click(function(){  
        var the_id = $(this).attr("href");  
        $('html, body').animate({  
            scrollTop:$(the_id).offset().top  
        }, 'slow');  
        return false;  
    });

    $(".form_datetime1").datetimepicker({format: 'yyyy-mm-dd hh:ii', forceParse: true});
$(".form_datetime2").datetimepicker({format: 'yyyy-mm-dd hh:ii', forceParse: true});
  </script>
<p>底部版权：<textarea name="cf_bq" rows="10" cols="120" class="xheditor {upImgUrl:'upload.php'}"><?php echo $_smarty_tpl->getVariable('result')->value['cf_bq'];?>
</textarea></p>
<p>顶部描述：<textarea name="cf_content" rows="10" cols="120" class="xheditor {upImgUrl:'upload.php'}"><?php echo $_smarty_tpl->getVariable('result')->value['cf_content'];?>
</textarea></p>
<p style="margin-left: 200px;">
<input type="submit" value="修改系统设置" class="btn btn-primary"/></p>
</form>
    </div>


</body>
</html>