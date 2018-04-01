<?php /* Smarty version Smarty-3.0.8, created on 2015-05-05 05:04:37
         compiled from "E:\wamp\www\votesystem/tpl\upload.html" */ ?>
<?php /*%%SmartyHeaderCode:9325554833456b9d31-83353143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70bb0270857f7164efb49380f009b1c5471cc0cf' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\upload.html',
      1 => 1430795074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9325554833456b9d31-83353143',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>test</title>
</head>
<body>
<div class="mt mb">
<form method="POST" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'upload'),$_smarty_tpl);?>
">
  <input type="file" name="it_image"/>
  <input type="submit" value="上传" class="btn" name="up"/>
</form>
</div>

</body>
</html>