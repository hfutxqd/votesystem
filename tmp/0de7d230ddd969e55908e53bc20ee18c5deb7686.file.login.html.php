<?php /* Smarty version Smarty-3.0.8, created on 2014-11-16 17:02:26
         compiled from "D:\www\votesystem/tpl\login.html" */ ?>
<?php /*%%SmartyHeaderCode:88654686822b397d4-60524328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0de7d230ddd969e55908e53bc20ee18c5deb7686' => 
    array (
      0 => 'D:\\www\\votesystem/tpl\\login.html',
      1 => 1416128529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88654686822b397d4-60524328',
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
	<title>投票系统后台</title>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"/>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
    body{background-image: url(images/loginbg.jpg);text-align: center;}
    </style>
</head>
<body>
<div style="width: 556px;height: 350px;margin:0 auto;background-image: url(images/loginjz.jpg);margin-top: 150px;">
    <div style="font-size: 28px;font-family: 黑体;line-height: 80px;text-align: center;">投票系统后台 beta1.0</div>
    <div style="width: 275px;height: 200px;margin-top: 20px;margin-left: 230px;">
    <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'logingo'),$_smarty_tpl);?>
" method="POST" onsubmit="return aclcode();">
        <p>帐号：<input type="text" name="user_name"/></p>
        <p>密码：<input type="password" name="user_password"/></p>
          <p>验证码：<input type="text" name="verifycode" class="input-medium" placeholder="右侧验证码" size="8"/><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'loginverifycode'),$_smarty_tpl);?>
"/></p>
        <input type="submit" value="登陆后台" class="btn btn-primary"/>
        </form>
        </div>
    </div>

</body>
</html>