﻿<?php /* Smarty version Smarty-3.0.8, created on 2015-04-17 14:27:08
         compiled from "E:\wamp\www\votesystem/tpl\showvote.html" */ ?>
<?php /*%%SmartyHeaderCode:213545530fc1c8ed633-83117202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fb50026a87759a553876a5394382a2a3cdb57cc' => 
    array (
      0 => 'E:\\wamp\\www\\votesystem/tpl\\showvote.html',
      1 => 1429273626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213545530fc1c8ed633-83117202',
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
	<title>投票查看</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link href="http://fineui.com/bootstrap/css/bootstrap.css" rel="stylesheet"/>
    <link href="http://fineui.com/bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
    <link href="http://fineui.com/res/css/docs.css" rel="stylesheet"/>
	<!--[if lt IE 9]>
		<script src="http://fineui.com/lib/html5shim/html5.js"></script>
	<![endif]-->	
	<link href="http://fineui.com/res/lightbox/css/lightbox.css" rel="stylesheet"/>
<style>
body{margin: 0px;border: 0px;}
#masonry
{
	padding: 0;
	min-height: 450px;
	margin: 0 auto;
}
#masonry .thumbnail
{
	width: 330px;
	margin: 20px;
	padding: 0;
	border-width: 1px;
	-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
			box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
}
#masonry .thumbnail .imgs
{
	padding: 10px;
}
#masonry .thumbnail .imgs img
{
	margin-bottom: 5px;
}
#masonry .thumbnail .caption
{
	background-color: #fff;
	padding-top: 0;
	font-size: 13px;
}
#masonry .thumbnail .caption .title
{
	font-size: 13px;
	font-weight: bold;
	margin: 5px 0;
	text-align: right;
}
#masonry .thumbnail .caption .author
{
	font-size: 11px;
	text-align: left;
}


.lightbox .lb-image
{
	max-width: none;
}
		
</style>
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
        <div style="margin-top: 10px;float: left;"> 
            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>  
			<li style="padding-top: 10px;padding-bottom: 30px;position: relative;width: 580px;padding-left: 40px;">
                    <div style="margin-left: 10px;width: 60%;">
                        <img style="width: 230px;height: 190px;" src="<?php echo $_smarty_tpl->tpl_vars['value']->value['ct_images'];?>
"/>
                    </div>
                    <div style="position: absolute;z-index: 10;right: 10px;top: 0;width: 100%;">
						<div style="float: right; width:250px">
							<p style="margin: 18px 0 20px;font-size: 0.75em;text-align: left;line-height: 1.5em;">标题：<?php echo $_smarty_tpl->tpl_vars['value']->value['ct_name'];?>
</p>
							<p style="margin: 18px 0 20px;font-size: 0.75em;text-align: left;line-height: 1.5em;">内容：<?php echo $_smarty_tpl->tpl_vars['value']->value['ct_content'];?>
</p>
							<p style="margin: 18px 0 20px;font-size: 0.75em;text-align: left;line-height: 1.5em;">类型：<?php echo $_smarty_tpl->tpl_vars['value']->value['ct_type'];?>
选</p>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'admin','a'=>'delvote','id'=>$_smarty_tpl->tpl_vars['value']->value['ct_id']),$_smarty_tpl);?>
" class="btn btn-danger" style="float: right;">删除</a>
						</div>
					</div>
            </li>	
            <?php }} ?>	
    <footer class="footer">
		<div class="container">
			<p class="pull-right"><a href="#">回到顶部</a></p>
		</div>
	</footer>
</div>
 <script src="http://fineui.com/lib/jquery/jquery-1.8.2.min.js"></script>
    <script src="http://fineui.com/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://fineui.com/res/js/main.js"></script>	
	<script src="http://fineui.com/lib/masonry.pkgd.min.js"></script>
	<script src="http://fineui.com/lib/imagesloaded.pkgd.min.js"></script>
	<script src="http://fineui.com/lib/lightbox-2.6.min.js"></script>	
	<script>
		$(function() {		
			var ghostNode = $('#masonry_ghost').find('.thumbnail'), i, ghostIndexArray = [];
			var ghostCount = ghostNode.length;
			for(i=0; i<ghostCount; i++){
				ghostIndexArray[i] = i; 
			}
		
			var currentIndex = 0;
			var masNode = $('#masonry');
			var imagesLoading = false;
			
			
			function getNewItems() {
				var newItemContainer = $('<div/>');
				for(var i=0; i<6; i++) {
					if(currentIndex < ghostCount) {
						newItemContainer.append(ghostNode.get(ghostIndexArray[currentIndex]));
						currentIndex++;
					}
				}
				return newItemContainer.find('.thumbnail');
			}			
			function processNewItems(items) {
				items.each(function() {
					var $this = $(this);
					var imgsNode = $this.find('.imgs');
					var title = $this.find('.title').text();
					var author = $this.find('.author').text();
					title += '&nbsp;&nbsp;(' + author + ')';
					var lightboxName = 'lightbox_'; // + imgNames[0];
					
					var imgNames = imgsNode.find('input[type=hidden]').val().split(',');
					$.each(imgNames, function(index, item) {
						imgsNode.append('');
					});
				});
			}			
			function initMasonry() {
				var items = getNewItems().css('opacity', 0);
				processNewItems(items);
				masNode.append(items);
				
				imagesLoading = true;
				items.imagesLoaded(function(){
					imagesLoading = false;
					items.css('opacity', 1);
					masNode.masonry({
						itemSelector: '.thumbnail',
						isFitWidth: true
					});
				});
			}			
			function appendToMasonry() {
				var items = getNewItems().css('opacity', 0);
				processNewItems(items);
				masNode.append(items);				
				imagesLoading = true;
				items.imagesLoaded(function(){
					imagesLoading = false;
					items.css('opacity', 1);
					masNode.masonry('appended',  items);
				});
			}						
			initMasonry();			
			$(window).scroll(function() {				
				if($(document).height() - $(window).height() - $(document).scrollTop() < 10) {					
					if(!imagesLoading) {
						appendToMasonry();
					}					
				}				
			});			
			function randomColor() {
				var rand = Math.floor(Math.random() * 0xFFFFFF).toString(16);
				for (; rand.length < 6;) {
					rand = '0' + rand;
				}
				return '#' + rand;
			}			
		});
	</script>
</body>
</html>