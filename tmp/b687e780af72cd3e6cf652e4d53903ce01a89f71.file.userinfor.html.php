<?php /* Smarty version Smarty-3.0.8, created on 2015-04-26 14:10:01
         compiled from "E:\wamp\www\votesystem/tpl\userinfor.html" */ ?>
<?php /*%%SmartyHeaderCode:7689553cd599875c62-33959844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b687e780af72cd3e6cf652e4d53903ce01a89f71' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\userinfor.html',
      1 => 1430050198,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7689553cd599875c62-33959844',
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
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<style>
body{margin: 0px;border: 0px;background-color: #F2F2F2;}
</style>
</head>
<body>
<p>
学号：<?php echo $_smarty_tpl->getVariable('userinfo')->value['user_id'];?>
<br>
姓名：<?php echo $_smarty_tpl->getVariable('userinfo')->value['user_name'];?>
<br>
学院：<?php echo $_smarty_tpl->getVariable('userinfo')->value['user_school'];?>
<br>
专业：<?php echo $_smarty_tpl->getVariable('userinfo')->value['user_class'];?>
<br>
年级：<?php echo $_smarty_tpl->getVariable('userinfo')->value['user_grade'];?>
<br>
班级：<?php echo $_smarty_tpl->getVariable('userinfo')->value['user_room'];?>
<br>
<br><br>
<?php if ($_smarty_tpl->getVariable('userinfo')->value['user_class']==null||$_smarty_tpl->getVariable('userinfo')->value['user_grade']==null||$_smarty_tpl->getVariable('userinfo')->value['user_room']==null){?>

<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'editUserInfo'),$_smarty_tpl);?>
" target="_blank" class="btn btn-primary">完善个人信息</a>
<?php }else{ ?>
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'editUserInfo'),$_smarty_tpl);?>
" target="_blank" class="btn btn-primary">修改个人信息</a>
<?php }?>

</p>
</body>
</html>