<?php /* Smarty version Smarty-3.0.8, created on 2015-04-26 14:17:16
         compiled from "E:\wamp\www\votesystem/tpl\user_addvote_item.html" */ ?>
<?php /*%%SmartyHeaderCode:27730553cd74c690269-03506451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64843ee7f4fe68a162bc690b2686fbebc91b4ee5' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\user_addvote_item.html',
      1 => 1429956912,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27730553cd74c690269-03506451',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
﻿<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
<link href="http://www.kindsoft.net/ke4/themes/default/default.css" rel="stylesheet" type="text/css" />
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
	<title>添加选项</title>
</head>
<body>
<div style="margin-top: 10px;text-align: left;">
	<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'user','a'=>'addvote_item_go'),$_smarty_tpl);?>
" method="POST"  enctype="multipart/form-data" >
		<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['name'] = "loop";
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('loop')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["loop"]['total']);
?>
		<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['loop']['index']+1, null, null);?>
		<p>第<?php echo $_smarty_tpl->getVariable('var')->value;?>
个选项：</p>
		<p>名称：<textarea name="it_name<?php echo $_smarty_tpl->getVariable('var')->value;?>
" style="width: 400px;height: 2em" ></textarea></p> 
		<p>描述：<textarea name="it_content<?php echo $_smarty_tpl->getVariable('var')->value;?>
" style="width: 400px;height: 6em;" ></textarea></p> 
		<p>图片：<input type="file" name="it_images<?php echo $_smarty_tpl->getVariable('var')->value;?>
" style="width: 320px;"/> </p>
		<br><br><br>
		<?php endfor; endif; ?>
		<br>
		<input type="hidden" name = "ct_id" value="<?php echo $_smarty_tpl->getVariable('ct_id')->value;?>
"/>
		<input type="hidden" name = "count" value="<?php echo $_smarty_tpl->getVariable('loop')->value;?>
"/>
        <input type="submit" value="添加" class="btn btn-primary"/>
    </form>
</div>
</body>
</html>