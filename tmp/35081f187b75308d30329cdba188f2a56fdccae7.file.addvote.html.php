<?php /* Smarty version Smarty-3.0.8, created on 2014-11-17 13:43:50
         compiled from "D:\www\votesystem/tpl\addvote.html" */ ?>
<?php /*%%SmartyHeaderCode:951954698b16482ec5-42427686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35081f187b75308d30329cdba188f2a56fdccae7' => 
    array (
      0 => 'D:\\www\\votesystem/tpl\\addvote.html',
      1 => 1416202707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '951954698b16482ec5-42427686',
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
	<title>添加投票</title>
</head>
<body>
<div style="margin-top: 10px;text-align: left;">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'addvotego'),$_smarty_tpl);?>
" method="POST">
       <p>分类：<input type="text" name="ct_type" style="width: 450px;"/></p> 
       <p>票数：<input type="text" name="ct_num" style="width: 450px;"/><span style="color: red;">投票数量，如不填写，将从0开始计算</span></p>
       <p>图片：<input type="text" id="url" value="" readonly="readonly" name="ct_images" style="width: 450px;"/> <input type="button" id="uploadButton" value="上传图片"/></p> 
      <p>名称：<textarea name="ct_name" style="width: 450px;height: 160px;" class="xheditor {upImgUrl:'upload.php'}"></textarea></p> 
       <p>描述：<textarea name="ct_content" style="width: 450px;height: 160px;" class="xheditor {upImgUrl:'upload.php'}"></textarea></p> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="添加投票" class="btn btn-primary"/>
        </form>
        </div>
</body>
</html>