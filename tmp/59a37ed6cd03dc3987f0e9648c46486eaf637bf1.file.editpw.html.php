<?php /* Smarty version Smarty-3.0.8, created on 2015-04-25 12:40:34
         compiled from "E:\wamp\www\votesystem/tpl\editpw.html" */ ?>
<?php /*%%SmartyHeaderCode:1327552cf87b64cf81-30457448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59a37ed6cd03dc3987f0e9648c46486eaf637bf1' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\editpw.html',
      1 => 1429954319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1327552cf87b64cf81-30457448',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<title>修改密码</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
body{margin: 0px;border: 0px;}
</style>
</head>
<body>
<div style="margin-top: 10px;">
	<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>$_smarty_tpl->getVariable('aclname')->value,'a'=>'editpwa'),$_smarty_tpl);?>
" method="POST">
	<p>原始密码：<input type="password" name="us_oldpassword"/></p>
	<p>修改密码：<input type="password" name="us_newpassword"/></p>
	<p><input type="submit" value="修改密码" class="btn btn-success"/></p>
	</form>
</div>

</body>
</html>