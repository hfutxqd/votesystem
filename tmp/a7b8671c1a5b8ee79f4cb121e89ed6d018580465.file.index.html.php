<?php /* Smarty version Smarty-3.0.8, created on 2014-11-19 17:22:54
         compiled from "D:\www\votesystem/tpl\index.html" */ ?>
<?php /*%%SmartyHeaderCode:31503546c616ec6d147-39004092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7b8671c1a5b8ee79f4cb121e89ed6d018580465' => 
    array (
      0 => 'D:\\www\\votesystem/tpl\\index.html',
      1 => 1416388969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31503546c616ec6d147-39004092',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="梦想瞬智网络科技" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
	<title><?php echo $_smarty_tpl->getVariable('result')->value['cf_name'];?>
</title>
	<style>
		body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,p,article,aside,details,footer,header,section{margin:0;padding:0}
        body{ font-family: Helvetica,STHeiti STXihei,Microsoft JhengHei,Microsoft YaHei,Tohoma,Arial; color: #666; -webkit-touch-callout: none; -webkit-text-size-adjust: none;}
        
        a, img { -webkit-touch-callout: none; }
        html, body { -webkit-user-select: none; user-select: none; }
		h1,h2,h3,h4,h5,h6{font-size:12px;font-weight:normal}
        ul,li{ list-style: none; overflow: hidden; }
		a{ text-decoration:none; color: #999;}

        .content{ max-width: 640px; width: 100%; margin: 0 auto; overflow: hidden; }
        .logo{ margin: 0 30px; padding: 44px 0 20px; border-bottom: 1px dashed #999; }
		.logo img{ width: 75%; }
		.remark{ margin: 25px 25px 30px 30px; font-size: 0.62em;}

		.user-list li{ padding-top: 10px; padding-bottom: 30px; position:relative; }
        .user-list .left{ margin-left: 10px; width: 60%; }
		.avatar{ width: 60%; }
		.info{ margin-left: 10px; margin-top: -24px; }
		.info .name{ font-size: 0.8em; font-weight: bold; color: #f4a14b; margin-bottom: 6px;}
		.info .title1{ font-size: 0.6em;}
		.info .title2{ font-size: 0.6em; color: #999;}

        .user-list .right{ position:absolute; z-index: 10; right: 10px; top: 0; width: 60%;}
		.intro{ margin: 18px 0 20px; font-size: 0.75em; text-align: right; line-height: 1.5em; }
		.vote{ float: right; position:relative; padding-right: 5px; color: #f4a14b; font-size: 0.6em;}
		.vote b{display: none; position:absolute; z-index: 10; left: 0; top: 0; font-size: 1.5em;}
		.vote a{margin-left: 10px;}
		.vote-action{ display: inline-block; width: 40px; line-height: 20px; height: 20px; text-align: center; border-radius: 3px; border: 2px solid #bdbdbd; }
		.vote .has{ border: 2px solid #666; background-color: #666; color: #fff }

		.wfcintro{ text-align: center; margin-top:30px; line-height: 20px; font-size: 0.75em;}
		.footer{ padding: 30px 0 20px;text-align: center;font-size: 0.75em;}
		.link{ margin-left: 15%; }
        .link img{ width: 70%; }

	</style>
</head>
<body>
	<div class="content">
		<div class="logo"><img src="<?php echo $_smarty_tpl->getVariable('result')->value['cf_images'];?>
"/></div>
        <div class="remark">
      <?php echo $_smarty_tpl->getVariable('result')->value['cf_content'];?>

      <br />
         <b style="font-family: Helvetica,STHeiti STXihei,Microsoft JhengHei,Microsoft YaHei,Tohoma,Arial;font-size: 0.62em;font-weight: bold;color: #B3B3B3;">
         <span style="color: #B3B3B3;">投票开始时间：<?php echo $_smarty_tpl->getVariable('result')->value['cf_ontime'];?>
</span><br /><span style="color: #B3B3B3;">投票结束时间：<?php echo $_smarty_tpl->getVariable('result')->value['cf_offtime'];?>
</span></b></div>
		<div class="wfcintro">
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('results')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
?>  
<div style="width: 99%;background-color: #F2F2F2;height: 30px;line-height: 30px;font-size: 24px;font-family: 黑体;"><?php echo $_smarty_tpl->tpl_vars['value']->value['ct_type'];?>
·行业</div>
<li style="padding-top: 10px;padding-bottom: 30px;position: relative;">
                    <div style="margin-left: 10px;width: 60%;text-align: left;">
                        <img style="width: 60%" src="<?php echo $_smarty_tpl->tpl_vars['value']->value['ct_images'];?>
"/>
						<div style="margin-left: 10px;margin-top: -24px;">
<?php echo $_smarty_tpl->tpl_vars['value']->value['ct_name'];?>

						</div>
                    </div>
                    <div style="position: absolute;z-index: 10;right: 10px;top: 0;width: 60%;">
						<p style="margin: 18px 0 20px;font-size: 0.75em;text-align: 

right;line-height: 1.5em;">
                        <?php echo $_smarty_tpl->tpl_vars['value']->value['ct_content'];?>

                                    </p>
                        <div style="float: right;position: relative;padding-right: 5px;color: #f4a14b;font-size: 

0.6em;">
      <p> <div style="float: left;padding-top: 3px;"><?php echo $_smarty_tpl->tpl_vars['value']->value['ct_num'];?>
&nbsp;票&nbsp;&nbsp;</div>
                         <div style="display: inline-block;width: 40px;line-height: 20px;height: 20px;text-align:center;border-radius: 3px;border: 2px solid #bdbdbd;float: left;">
<?php if ($_smarty_tpl->getVariable('onnowtime')->value>0){?>
    <?php if ($_smarty_tpl->getVariable('offnowtime')->value<0){?>
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'offtime','userip'=>$_smarty_tpl->getVariable('userip')->value,'useryy'=>$_smarty_tpl->getVariable('useryy')->value,'userie'=>$_smarty_tpl->getVariable('userie')->value,'id'=>$_smarty_tpl->tpl_vars['value']->value['ct_id'],'nowtime'=>$_smarty_tpl->getVariable('nowtime')->value),$_smarty_tpl);?>
">投票</a> 
    <?php }else{ ?>
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'vote','userip'=>$_smarty_tpl->getVariable('userip')->value,'useryy'=>$_smarty_tpl->getVariable('useryy')->value,'userie'=>$_smarty_tpl->getVariable('userie')->value,'id'=>$_smarty_tpl->tpl_vars['value']->value['ct_id'],'nowtime'=>$_smarty_tpl->getVariable('nowtime')->value),$_smarty_tpl);?>
">投票</a> 
    <?php }?>
<?php }else{ ?>
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['spUrl'][0][0]->__template_spUrl(array('c'=>'main','a'=>'ontime','userip'=>$_smarty_tpl->getVariable('userip')->value,'useryy'=>$_smarty_tpl->getVariable('useryy')->value,'userie'=>$_smarty_tpl->getVariable('userie')->value,'id'=>$_smarty_tpl->tpl_vars['value']->value['ct_id'],'nowtime'=>$_smarty_tpl->getVariable('nowtime')->value),$_smarty_tpl);?>
">投票</a> 
<?php }?>
                          </div>     
                                </p> 
                                </div>
					</div>
                </li>	
            <?php }} ?>
		</div>
		<div class="footer">
		<p><?php echo $_smarty_tpl->getVariable('result')->value['cf_bq'];?>
</p>
		</div>
        <div class="footer">
                <p><?php echo $_smarty_tpl->getVariable('result')->value['cf_tel'];?>
</p>
        <p><?php echo $_smarty_tpl->getVariable('result')->value['cf_icp'];?>
</p>
        </div>
    </div>
    <div id="time"><span id="liveclock"></span> 
 </div>
</body>
</html>