<?php /* Smarty version Smarty-3.0.8, created on 2015-04-26 13:56:35
         compiled from "E:\wamp\www\votesystem/tpl\user_add_vote.html" */ ?>
<?php /*%%SmartyHeaderCode:29712553cd27385d8d1-40551029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8777f45dfa4bf652a1d2f8449b71980de2edb92d' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\user_add_vote.html',
      1 => 1430049366,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29712553cd27385d8d1-40551029',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<title>新增投票</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap-theme.min.css"/>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/xheditor-1.1.14-zh-cn.js"></script> 
    <script src="kindeditor/kindeditor.js" charset="utf8"></script>
    <script src="kindeditor/lang/zh_CN.js" charset="utf8"></script>
<style>
body{margin: 0px;border: 0px;}
</style>    
    		<script>
			KindEditor.ready(function(K) {
				var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : 'php/upload_json.php?dir=file',
					afterUpload : function(data) {
						if (data.error === 0) {
							var url = K.formatUrl(data.url, 'absolute');
							K('#url').val(url);
						} else {
							alert(data.message);
						}
					},
					afterError : function(str) {
						alert('自定义错误信息: ' + str);
					}
				});
				uploadbutton.fileBox.change(function(e) {
					uploadbutton.submit();
				});
			});
		</script>
</head>
<body>
<div style="margin-top: 10px;text-align: left;">
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'add_vote_go'),$_smarty_tpl);?>
" method="POST" enctype="multipart/form-data" >
<p>名称：<input type="text" name="ct_name" size="30"/></p>
<p>图片：<input type="file"  id="url" name="ct_images"  size="25"/></p> 
<p>描述：<br><textarea  type="text" name="ct_content" style="height:150px; width: 350px"/></textarea></p>
<p>选项数量：<input type="text" name="count" size="5" /></p>
<p>可选数量：<input type="text" name="ct_type" size="5" /></p>
<p>投票限制：<select name = "hasLimit">
						<option value = "0">无限制</option>
						<option value = "1">班级限制</option>
						<option value = "2">密码限制</option>
						</select>
</p>
<p>班级限制：	<select name = "ct_school">
						<?php  $_smarty_tpl->tpl_vars['class'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('classlist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['class']->key => $_smarty_tpl->tpl_vars['class']->value){
?>
						<?php if ($_smarty_tpl->getVariable('tmp')->value!=$_smarty_tpl->tpl_vars['class']->value['school']){?>
						<option value = "<?php echo $_smarty_tpl->tpl_vars['class']->value['school'];?>
"><?php echo $_smarty_tpl->tpl_vars['class']->value['school'];?>
</option>
						<?php $_smarty_tpl->tpl_vars['tmp'] = new Smarty_variable($_smarty_tpl->tpl_vars['class']->value['school'], null, null);?>
						<?php }?>
						<?php }} ?>
						</select>
						<select name = "ct_class">
						<option value = "">全部专业</option>
						<?php  $_smarty_tpl->tpl_vars['class'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('classlist')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['class']->key => $_smarty_tpl->tpl_vars['class']->value){
?>
						<option value = "<?php echo $_smarty_tpl->tpl_vars['class']->value['class'];?>
"><?php echo $_smarty_tpl->tpl_vars['class']->value['class'];?>
</option>
						<?php }} ?>
						</select>
						<input type="text" name="ct_grade" size="5"/>级
						<input type="text" name="ct_classrm" size="2"/>班
<p>密码限制：<input type="text" name="ct_passwd" size="30"/></p>
<p>结束时间：<input size="25" type="text"  readonly="" class="form_datetime" name="ct_offtime" /></p>
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
    $('a[href^="#"]').click(function(){  
        var the_id = $(this).attr("href");  
        $('html, body').animate({  
            scrollTop:$(the_id).offset().top  
        }, 'slow');  
        return false;  
    });
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii', forceParse: true});
  </script>

<p style="margin-left: 200px;">
<input type="submit" value="下一步" class="btn btn-primary"/></p>
</form>
</div>


</body>
</html>