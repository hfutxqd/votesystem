<?php /* Smarty version Smarty-3.0.8, created on 2015-04-26 14:12:47
         compiled from "E:\wamp\www\votesystem/tpl\editUserInfo.html" */ ?>
<?php /*%%SmartyHeaderCode:60553cd63f0c4230-69517806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a15eff05dd0bf9d3cfef1ae549a420c76f4d1d9d' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\editUserInfo.html',
      1 => 1430050365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60553cd63f0c4230-69517806',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<title>欢迎使用投票系统</title>
<link rel="stylesheet" href="./css/bootstrap.min.css"/>
<link rel="stylesheet" href="./css/bootstrap-theme.min.css"/>
<script src="./jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<style>
body{margin: 0px;border: 0px;background-color: #F2F2F2;}
</style>
</head>
<body style="text-align: center;">
<div style="margin:auto; text-align:left; width: 400px; background:#C4D8F5;">
请完善资料，否则将不能享受所有服务<br>
<br>
	<p>
	学号：<?php echo $_smarty_tpl->getVariable('userinfo')->value['user_id'];?>
<br>
	姓名：<?php echo $_smarty_tpl->getVariable('userinfo')->value['user_name'];?>
<br>
	学院：<?php echo $_smarty_tpl->getVariable('userinfo')->value['user_school'];?>
<br>
	<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'editUserInfo'),$_smarty_tpl);?>
" method="post">
	专业：	<select name = "class" class="form-control">
				<?php  $_smarty_tpl->tpl_vars['class'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('classlist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['class']->key => $_smarty_tpl->tpl_vars['class']->value){
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['class']->value['class'];?>
" ><?php echo $_smarty_tpl->tpl_vars['class']->value['class'];?>
</option>
				<?php }} ?>
				</select><br>
	年级：<input name="grade" class="form-control"  placeholder='填四位数字'/><br>
	班级：<input name="classroom" class="form-control"  placeholder='填数字' /><br>
	<input type="submit" value="确定" class="btn btn-primary"/>
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'userindex'),$_smarty_tpl);?>
" style="float:right; margin-right:10px;">我不想填写</a>
	</form>
	</p>
</div>
</body>
</html>