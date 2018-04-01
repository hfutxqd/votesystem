<?php /* Smarty version Smarty-3.0.8, created on 2015-05-05 05:02:34
         compiled from "E:\wamp\www\votesystem/tpl\test.html" */ ?>
<?php /*%%SmartyHeaderCode:20758554832cad00046-16554143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cf51e5fea1c067c62af80051a99efdc7c097262' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\test.html',
      1 => 1430379569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20758554832cad00046-16554143',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<!DOCTYPE html>
<html>
<head>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
function abc()
{
	alert("sdsdfsdf");
}
$(document).ready(function(){
  $("#b01").click(function()
  {
	  alert("debug");
});
</script>
</head>
<body>

<div id="myDiv"><h2>显示结果</h2></div>
<button id="b01" type="button" click="script:abc();">注册</button>

</body>


</body>
</html>
