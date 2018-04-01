<?php
require_once("idstarClientConfig.php");
require_once("class_http.php");

/**
function getIP()
{
    $ip = "";
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    return $ip;
}**/

/**
 *
 *	功能：  调用认证服务器端的文件，取指定函数的返回值，XML格式
 *	参数：
 *	        $method:   string, 调用的方法
 *	 	$wParam:   string, 方法的第一个参数
 *		$lParam:   string, 方法的第二个参数
 *	返回：	见$return
 */

function idstarProxyGetDataXML($method,$wParam="",$lParam="") {
	$return=array(
		"returnCode"=>200,  //返回HTML代码，200:成功, 501: Script Error
		"returnText"=>"",	  //returnCode==200时，返回函数调用的结果
		"errorMessage"=>""
	);
	
	$method=trim($method);
	$queryString="";
	$queryString=$queryString.($method==""?"":($queryString==""?"?":"&")."method=".urlencode($method));
	$queryString=$queryString.($wParam==""?"":($queryString==""?"?":"&")."wParam=".urlencode($wParam));
	$queryString=$queryString.($lParam==""?"":($queryString==""?"?":"&")."lParam=".urlencode($lParam));
	$url=idsProxyURL.$queryString;
	//echo $url;
	if (!$h = new http()) {
	    	$return["returnCode"]=501;
		$return["errorMessage"]="初始化http对象失败";
	} else {
		$h->url = $url;
		$h->postvars = $_POST;
		if (!$h->fetch($h->url)) {
			$return["returnCode"]=501;
			$return["errorMessage"]="调用认证服务器端的文件时出现错误";
		} else {
			$return["returnText"]=$h->body;
		}
		
	}
	
	return $return;
}


/**
 *	功能:	解释指定的XML数据，取得需要值
 *	参数:
 *			dataXMLText	:	string, 指定的XML文本
 *	返回:	string[](results), 方法调用的结果，数组的第一个元素如果为""，则成功，不为""则失败
 */
function parseResultXML($dataXMLText)
{
	$results = array();
	$xmlDoc = NULL;
	$dataXMLText=trim($dataXMLText);
   //echo $dataXMLText;
	if ($dataXMLText == "")	{
		$results[0] = "指定的XML中无内容。";
		return $results;
	}

//	$dataXMLText="<results><aa><results>asdf</results></aa></results>";
	$xp=xml_parser_create("utf-8");
	xml_parser_set_option($xp, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($xp, XML_OPTION_SKIP_WHITE,1);

	if (xml_parse_into_struct($xp,$dataXMLText,$vals,$index)==1) {
	//print_r($vals);
		if (!isset($index["results"])) {
			$results[0]="error";
			$results[1]="返回数据格式不正确";
		} else {
			$j=0;
			$results[$j++]="";
			if (isset($index["results"][1])) {
				for ($i=$index["results"][0]+1;$i<$index["results"][1];$i++) {	
					//index["results"][0]是xml中results节点首次出现在$vals中的索引，而[1]则是第二次出现的索引，这两个索引中间是results节点的内xml节点
					$results[$j++]=mb_convert_encoding(@$vals[$i]["value"],"GBK","UTF-8");
				}
			}
//			print_r($vals);
			//print_r($results);
		}
	} else {
		$results[0]="error";
		$results[1]="返回值不是XML格式";
	}
	xml_parser_free($xp);
	return $results;
}


/**
 *	功能:	从认证服务获取指定用户标识的用户ID
 *	参数:
 *			userToken	:	string, 指定的用户标识
 *	返回:	string(user), 用户ID，如果出错则返回""
 */
function ids_GetCurrentUser($userToken) {

  /**  $clientIP = getIP();
    if ($clientIP != "")
        $userToken = $userToken . "||" . $clientIP;**/

	$idstarReturn= idstarProxygetDataXML("getCurrentUser", urlencode($userToken));
	// ECHO $idstarReturn["returnText"];
	if ($idstarReturn["returnCode"]!=200 || $idstarReturn["returnText"]=="") {
		return "";
	}
	$results = parseResultXML($idstarReturn["returnText"]);
	 
	if ($results[0] == "") {
		return $results[1];
	}
	return "";
}

function idsGetCurrentUser() {
	$userToken=@$_COOKIE[idsUserTokenName];
	if (isset($userToken)) return ids_GetCurrentUser($userToken);
	else return "";
}
/**
 *	功能:	从认证服务获取指定用户ID的所属组名称
 *	参数:
 *			currentUser	:	string, 指定的用户ID
 *	返回:	string[](group), 用户组
 */
function ids_GetUserGroup($currentUser) {
	$userGroup = array();
	$idstarReturn= idstarProxygetDataXML("getUserGroup", urlencode($currentUser));
	//echo $idstarReturn["returnText"];
	if ($idstarReturn["returnCode"]!=200 || $idstarReturn["returnText"]=="") {
		return $userGroup;
	}
	//print_r($idstarReturn);
	$results = parseResultXML($idstarReturn["returnText"]);
		//echo $results[0];
	//echo $results[1];
	if ($results[0] == "") {
		for ($i=1; $i<count($results);$i++) {
			$userGroup[$i-1]=$results[$i];
		}
	}
	return $userGroup;
}

/**
 *	功能:	从认证服务获取登录页面地址
 *	参数:
 *			gotoURL	:	string，指定的登录成功后的转到页面
 *	返回:	string(url), 登录页面地址，如果出错则返回""
 */
function ids_GetLoginURL($gotoURL) {
	$idstarReturn= idstarProxygetDataXML("getLoginURL", $gotoURL);
	if ($idstarReturn["returnCode"]!=200 || $idstarReturn["returnText"]=="") {
		return "";
	}
	$results = parseResultXML($idstarReturn["returnText"]);
	if ($results[0] == "") {
//		print_r($results);
		return $results[1];
	}
	return "";
}

/**
 *	功能:	从认证服务获取注销页面地址
 *	参数:
 *			gotoURL	:	string，指定的注销后的转到页面
 *	返回:	string(url), 注销页面地址，如果出错则返回""
 */
function ids_GetLogoutURL($gotoURL) {
	$idstarReturn= idstarProxygetDataXML("getLogoutURL", $gotoURL);
	if ($idstarReturn["returnCode"]!=200 || $idstarReturn["returnText"]=="") {
		return "";
	}
	$results = parseResultXML($idstarReturn["returnText"]);
	if ($results[0] == "") {
		return $results[1];
	}
	return "";
}

/**
 *	功能:	从认证服务获取指定用户ID的用户名
 *	参数:
 *			currentUser	:	string, 指定的用户ID
 *	返回:	string(userName), 用户名，如果出错则返回""
 */
function ids_GetUserNameByID($currentUser) {
	//但是为了保证校内应用的连续性，idsGetCurrentUser返回的仍然是工资号或学号
	//所以这里传到后台的仍是工资号或学号
	$idstarReturn= idstarProxygetDataXML("getUserNameByID", $currentUser);
    //ECHO $idstarReturn["returnText"];
	if ($idstarReturn["returnCode"]!=200 || $idstarReturn["returnText"]=="") {
		return "";
	}
	$results = parseResultXML($idstarReturn["returnText"]);

	if ($results[0] == "") {
		return $results[1];
	}
	return "";
}

function idsGetCurrentUserName(){
	$user=idsGetCurrentUser();
	//ECHO $user;
	if ($user=="") return "";
    
	return ids_GetUserNameByID($user);
	
}

/**
 *	功能:	从认证服务获取指定用户ID的指定属性值
 *	参数:
 *			currentUser		:	string, 指定的用户ID
 *			attributeName	:	string, 指定的属性名称
 *	返回:	string[](userAtrribute), 属性值
 */
function ids_GetUserAttribute($currentUser, $attributeName){
	$userAtrribute = array();
	$idstarReturn= idstarProxygetDataXML("getUserAttribute", $currentUser,$attributeName);
	//echo $currentUser;
	//echo $attributeName;
	if ($idstarReturn["returnCode"]!=200 || $idstarReturn["returnText"]=="") {
		return $userAtrribute;
	}
	//print_r($idstarReturn);
	$results = parseResultXML($idstarReturn["returnText"]);
	//echo $results[1];

	if ($results[0] == "") {
		for ($i=1; $i<count($results);$i++) {
			$userAtrribute[$i-1]=$results[$i];
		}
	}
	//echo $userAtrribute[0];
	return $userAtrribute;
}
?>