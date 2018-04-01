<?php
//**********************************************************************
/**
 *	Copyright (C) 四川金智. All rights reserved.
 *	Project	:	
 *	Content	:	PHP IDSTAR接口代理程序
 *	Owner	:	蒋钦
 *	History	:	20071213	成都		新建
 */
//**********************************************************************

require_once("class_http.php");
require_once("idstarClientConfig.php");

$method=isset($_GET['method'])?"?method=".$_GET['method']:"";
$wParam=isset($_GET['wParam'])?"&wParam=".$_GET['wParam']:"";
$lParam=isset($_GET['lParam'])?"&lParam=".$_GET['lParam']:"";

$proxy_url=idsProxyURL.$method.$wParam.$lParam;
if (!$h = new http()) 
{
    header("HTTP/1.0 501 Script Error");
    echo "proxy.php failed trying to initialize the http object";
    exit();
}

$h->url = $proxy_url;
$h->postvars = $_POST;
if (!$h->fetch($h->url)) {
    header("HTTP/1.0 501 Script Error");
    echo "proxy.php had an error attempting to query the url";
    exit();
}
// 设置输出的xml的编码形式，否则将不支持中文
header("Content-type: text/xml; charset=GBK");
// Send the response body to the client.
echo $h->body;
?>

