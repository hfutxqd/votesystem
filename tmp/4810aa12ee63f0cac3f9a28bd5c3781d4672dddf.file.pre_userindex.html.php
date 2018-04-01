<?php /* Smarty version Smarty-3.0.8, created on 2015-04-25 12:10:22
         compiled from "E:\wamp\www\votesystem/tpl\pre_userindex.html" */ ?>
<?php /*%%SmartyHeaderCode:320485535adfb5fb2d7-72718673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4810aa12ee63f0cac3f9a28bd5c3781d4672dddf' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\pre_userindex.html',
      1 => 1429954319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '320485535adfb5fb2d7-72718673',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<title>投票系统-VOTE SYSTEM</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
<style>
body{margin: 0px;border: 0px;}
</style>
</head>

<body>
<div style="width: 100%;">
    <div style="width: 100%;height: 118px;background-image: url(images/1.jpg);">
       <div style="width: 100%;height: 118px;background-color: #6D9EE6;">
		<div style="width: 400px;float: left;padding-top: 30px;padding-left: 30px;">
           <span style="color: #ffffff;font-size: 28px;"><b>欢迎您，<?php echo $_smarty_tpl->getVariable('username')->value;?>
</b></span>
        </div>   
		<div style="width: 220px;float: right;color: #FFFFFF;padding-top: 67px;">
			<ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'adminindex'),$_smarty_tpl);?>
">后台首页</a></li>
            <li role="presentation"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
" target="_blank"><span style="color: black;">前台首页</span></a></li>
          </ul>
		</div>    
    </div>    
    </div>
    <div style="width: 100%;height: 550px;">
		<div style="width: 20%;height: 100%;background-color: #6DC7E6;float: left;padding-top: 5px;line-height: 20px;padding-left: 45px;">
            <p>&nbsp;&nbsp;<b><span style="color: #FFFFFF;">功能</span></b></p>
			<p class="btn btn-default"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pre_user','a'=>'userinfor'),$_smarty_tpl);?>
" target="iframe">个人信息</a></p><br /><br /> 
			<p class="btn btn-default"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pre_user','a'=>'editpw'),$_smarty_tpl);?>
" target="iframe">修改密码</a></p><br /><br />  
            <p class="btn btn-default"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'logout'),$_smarty_tpl);?>
">退出系统</a></p> 
		</div>
		<div style="height: 550px;float: left;width: 80%;">
			<iframe src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'pre_user','a'=>'userhome'),$_smarty_tpl);?>
" name="iframe" frameborder="0" height="550px" width="100%"></iframe>
        </div>    
    </div>
</div>
</body>
</html>