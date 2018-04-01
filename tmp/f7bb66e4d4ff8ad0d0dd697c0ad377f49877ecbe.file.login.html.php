<?php /* Smarty version Smarty-3.0.8, created on 2015-04-25 12:17:46
         compiled from "E:\wamp\www\votesystem/tpl\login.html" */ ?>
<?php /*%%SmartyHeaderCode:11425553b69ca61e296-43206515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7bb66e4d4ff8ad0d0dd697c0ad377f49877ecbe' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\login.html',
      1 => 1429956967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11425553b69ca61e296-43206515',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" /> 
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div id="box">
		<div id="choices"></div>
		<div id="loginbox">
			<div id="loginboxTop">
				<p>让自己帮别人做选择<br/>让别人帮自己做选择</p>
			</div>
			<div id="loginboxBottom">
			<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'logingo'),$_smarty_tpl);?>
" method="POST" onsubmit="return aclcode();">
				<div id="loginboxBottomTop">
					<input class="inputstyle" type="text" name="user_id" placeholder='学号/用户名'>
					<input class="inputstyle" type="password" name="user_password" placeholder='密码'>
					
					<div id="loginboxBottomMiddle">
						<input type="checkbox" name="remember">记住我的登录状态
						<span>|</span>
					</div>
				</div>
				
				<div id="loginboxBottomBottom">
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'register'),$_smarty_tpl);?>
">注册</a>
					<span><b>或</b></span>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
">浏览网站</a>
					
					<input class="buttonstyle" type="submit" value = "登录" />
				</div>
			</from>
			</div>
		</div>
	</div>
</body>
</html>