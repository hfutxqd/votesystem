<?php /* Smarty version Smarty-3.0.8, created on 2015-04-25 12:17:52
         compiled from "E:\wamp\www\votesystem/tpl\register.html" */ ?>
<?php /*%%SmartyHeaderCode:16070553b69d0b60432-66272277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a54aa7601ae1d60b7becf48bb4134e036bcd0256' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\register.html',
      1 => 1429956955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16070553b69d0b60432-66272277',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" /> 
	<title>注册</title>
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
			<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'registergo'),$_smarty_tpl);?>
" method="POST">
				<div id="loginboxBottomTop">
					<input class="inputstyle" type="text" name="user_nkname" placeholder='用户名'>
					<input class="inputstyle" type="password" name="user_password" placeholder='输入密码'>
					<input class="inputstyle" type="password" name="user_password2" placeholder='确定密码'>
				</div>
				
				<div id="loginboxBottomBottom">
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'login'),$_smarty_tpl);?>
">登录</a>
					<span><b>或</b></span>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'index'),$_smarty_tpl);?>
">浏览网站</a>
					
					<input class="buttonstyle" type="submit" value = "注册" />
				</div>
			</from>
			</div>
		</div>
	</div>
</body>
</html>