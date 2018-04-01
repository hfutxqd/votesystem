<?php /* Smarty version Smarty-3.0.8, created on 2014-11-16 17:37:09
         compiled from "D:\www\votesystem/tpl\editpw.html" */ ?>
<?php /*%%SmartyHeaderCode:1365654687045993fb4-49497628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26fa1efbd9eed31f6b06be7346f6e6b8b1176db9' => 
    array (
      0 => 'D:\\www\\votesystem/tpl\\editpw.html',
      1 => 1416130581,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1365654687045993fb4-49497628',
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
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'editpwa'),$_smarty_tpl);?>
" method="POST">
<p>原始密码：<input type="password" name="us_oldpassword"/></p>
<p>修改密码：<input type="password" name="us_newpassword"/></p>
<p><input type="submit" value="修改密码" class="btn btn-success"/></p>
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('new')->value['id'];?>
"/>
</form>
</div>

</body>
</html>