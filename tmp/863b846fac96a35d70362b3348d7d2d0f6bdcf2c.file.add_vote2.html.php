<?php /* Smarty version Smarty-3.0.8, created on 2015-04-17 08:37:19
         compiled from "E:\wamp\www\votesystem/tpl\add_vote2.html" */ ?>
<?php /*%%SmartyHeaderCode:7955530aa1f98cae5-29565788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '863b846fac96a35d70362b3348d7d2d0f6bdcf2c' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\add_vote2.html',
      1 => 1429252635,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7955530aa1f98cae5-29565788',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<title>新增投票</title>
<style>
body{margin: 0px;border: 0px;}
</style>    
    		
</head>
<body>
<div style="margin-top: 10px;text-align: left;">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'add_vote_go'),$_smarty_tpl);?>
" method="POST"  enctype="multipart/form-data" >
<p>名称：<input type="text" name="ct_name" size="30"/></p>
<p>图片：
	<input type="file" name="ct_images" size="5" value="上传图片"/>
</p> 
<p>描述：<br><textarea  type="text" name="ct_content" style="height:150px; width: 350px"/></textarea></p>
<p>选项数量：<input type="text" name="count" size="5" /></p>
<p>可选数量：<input type="text" name="ct_type" size="5" /></p>
<p>持续时间：<input size="3" type="text" name="ct_days" />天
						<input size="3" type="text" name="ct_hours" />小时
						<input size="3" type="text" name="ct_mins" />分
</p>


<p style="margin-left: 200px;">
<input type="submit" value="下一步" class="btn btn-primary"/></p>
</form>
</div>


</body>
</html>