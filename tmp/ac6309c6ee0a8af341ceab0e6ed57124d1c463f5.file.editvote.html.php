﻿<?php /* Smarty version Smarty-3.0.8, created on 2015-04-17 09:49:26
         compiled from "E:\wamp\www\votesystem/tpl\editvote.html" */ ?>
<?php /*%%SmartyHeaderCode:201735530bb06777bf7-15321626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac6309c6ee0a8af341ceab0e6ed57124d1c463f5' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\editvote.html',
      1 => 1429020641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201735530bb06777bf7-15321626',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html" />
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
<link href="http://www.kindsoft.net/ke4/themes/default/default.css" rel="stylesheet" type="text/css" />
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/xheditor-1.1.14-zh-cn.js"></script> 
    <script src="kindeditor/kindeditor.js" charset="gb2312"></script>
    <script src="kindeditor/lang/zh_CN.js" charset="gb2312"></script>
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
<title>修改投票资料</title>
</head>
<body>
<div style="margin-top: 10px;text-align: left;">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'editvotego'),$_smarty_tpl);?>
" method="POST">
	<p>名称：<input name="ct_name" style="width: 450px;height: 160px;" value="<?php echo $_smarty_tpl->getVariable('result')->value['ct_name'];?>
"></p> 
	<p>描述：<textarea name="ct_content" style="width: 450px;height: 160px;" value="<?php echo $_smarty_tpl->getVariable('result')->value['ct_content'];?>
"></p>
	<p>类型：<input type="text" name="ct_type" style="width: 450px;" value="<?php echo $_smarty_tpl->getVariable('result')->value['ct_type'];?>
"/></p> 
	<p>图片：<input type="text" id="url" value="<?php echo $_smarty_tpl->getVariable('result')->value['ct_images'];?>
" readonly="readonly" name="ct_images" style="width: 450px;"/> 
	<input type="button" id="uploadButton" value="上传图片"/></p>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="hidden" name="ct_id" value="<?php echo $_smarty_tpl->getVariable('result')->value['ct_id'];?>
"/>
	<input type="submit" value="修改投票资料" class="btn btn-primary"/>
</form>
</div>
</body>
</html>