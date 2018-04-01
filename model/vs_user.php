<?php
class vs_user extends spModel
{
    var $pk="user_nkname";
    var $table="vs_user";
    var $verifier=array(
         "rules"=>array(
            'user_password'=>array(
                'notnull'=>TRUE,
                'minlength'=>6,
                'maxlength'=>16,
            ),
			'user_id'=>array(
               'minlength'=>4,
               'maxlength'=>14,
            ),
         ),
         
         "messages"=>array(
             'user_password'=>array(
               'notnull'=>"密码不能为空！",
               'minlength'=>"密码最小不能少于6个字符",
               'maxlength'=>"密码最大不能大于16个字符",
             ),
			  'user_id'=>array(
               'minlength'=>"用户名不正确！",
               'maxlength'=>"用户名不正确！",
             ),
         ),
    );
	
	public function signIn(){
		$user_nkname = $_SESSION['userinfo']['user_nkname'];
		if ($res =  $this->findBy('user_nkname', $user_nkname)){
			$res['user_point'] = $res['user_point'] + 10;
			$con['user_nkname'] = $user_nkname;
			$this->update($con, $res);
			return true;
		}
		return false;
	}

    public function userlogin($us_id,$us_password, $remember){
		if ((int)$us_id != 0){
			$conditions=array(
			   'user_id'=>$us_id,
			   'user_password'=>$us_password,
			);
		}else{
			$conditions=array(
			   'user_nkname'=>$us_id,
			   'user_password'=>$us_password,
			);
		}
        	if($result = $this->find($conditions))
			{
				spClass('spAcl')->set($result['aclname']);
				
				$_SESSION["userinfo"] = $result;
				$_SESSION["userinfo"]["ip"] = $_SERVER["REMOTE_ADDR"];
				$_SESSION["userinfo"]["browser"] = $_SERVER['HTTP_USER_AGENT'];
				if ($remember === true || $remember == 'true')
				{
					$result['user_ckey'] = $this->randStr(16);
					$this->update($conditions, $result);
					$user_nkname = $this->encode($result['user_nkname'], 'hfutxqd');
					$userpwd = $this->encode($result['user_password'], $result['user_ckey']);
					setcookie('user_nkname', $user_nkname, time()+604800);
					setcookie('user_password', $userpwd, time()+604800);
				}
				return true;
			}else{
					return false;
			}
    }
	
	public function loginByCookie()
	{
		if (isset($_COOKIE['user_nkname'])){
			$user_nkname = $this->uncode($_COOKIE['user_nkname'], 'hfutxqd');
			$res = $this->findBy('user_nkname', $user_nkname);
			$key = $res['user_ckey'];
			$user_pwd = $this->uncode($_COOKIE['user_password'], $key);
			return $this->userlogin($user_nkname, $user_pwd, null);
		}else{
			return false;
		}
	}
	
	public function logout(){
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) 
		{
			setcookie(session_name(), '', time()-1);
		}
		if (isset($_COOKIE['user_nkname']))
		{
			setcookie('user_nkname', '', time()-1);
		}
		if (isset($_COOKIE['user_password']))
		{
			setcookie('user_password', '', time()-1);
		}
		session_destroy();
		return true;
	}
  
	public function update_pw($old_pw, $new_pw){
		
		$con = array(
		'user_id'=>$_SESSION['userinfo']['user_id']
		);
		$res = $this->find($con);
		if ($res['user_password'] == $old_pw)
		{
			$res['user_password'] = $new_pw;
			$this->update($con, $res);
			return true;
		}
		return false;
	}
	//产生长度为length的随机字符串
	private function randStr($length)
	{ 
		$str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';//62个字符 
		$strlen = 62; 
		while($length > $strlen){ 
		$str .= $str; 
		$strlen += 62; 
		}
		$str = str_shuffle($str); 
		return substr($str,0,$length); 
	}
	
	public function encode($str, $key)
	{
		$mc = new SysCrypt($key);
		return $mc->php_encrypt($str);
	}
	
	public function uncode($en, $key)
	{
		$mc = new SysCrypt($key);
		return $mc->php_decrypt($en);
	}
	
	public function register($user_nkname, $password)
	{
		$new = array(
		'user_id'=>$user_nkname,
		'user_password'=>$password
		);
		$res = $this->spVerifier($new);
		if ($res == false)
		{
			if ((int)$user_nkname != 0)
			{
				$err['user_nkname'][0] = '用户名不能以数字开始！';
				return $err;
			}
			if (strlen($user_nkname) < 4 || strlen($user_nkname)  > 14)
			{
				$err['user_nkname'][0] = '用户名最短4位，最长14位！';
				return $err;
			}
			$con['user_nkname'] = $user_nkname;
			if ($this->find($con))
			{
				$err['user_nkname'][0] = '用户名已存在！';
				return $err;
			}
			$con['user_password'] = $password;
			$this->create($con);
			return false;
		}
		return $res;
	}
	
	public function addPoint($user_id, $point)
	{
		if ($res = $this->findBy('user_id', $user_id)){
			$res['user_point'] = $res['user_point'] + $point;
			$this->update(array('user_id'=>$user_id), $res);
			return true;
		}
		return false;
	}
	
	public function minusPoint($user_id, $point)
	{
		if ($res = $this->findBy('user_id', $user_id)){
			$res['user_point'] = $res['user_point'] - $point;
			if ($res['user_point'] < 0){
				$res['user_point'] = 0;
			}
			$this->update(array('user_id'=>$user_id), $res);
			return true;
		}
		return false;
	}
	
	public function acljump(){ 
	$url = spUrl("main","index");
	echo "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\"><script>function sptips(){alert(\"您没有权限进行此操作，请登录！\");}</script></head><body onload=\"sptips()\"></body></html>";
	exit;
	}
}

class SysCrypt {
 
private $crypt_key;
 
// 构造函数
public function __construct($crypt_key) {
   $this -> crypt_key = $crypt_key;
}
 
public function php_encrypt($txt) {
   srand((double)microtime() * 1000000);
   $encrypt_key = md5(rand(0,32000));
   $ctr = 0;
   $tmp = '';
   for($i = 0;$i<strlen($txt);$i++) {
    $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
    $tmp .= $encrypt_key[$ctr].($txt[$i]^$encrypt_key[$ctr++]);
   }
   return base64_encode(self::__key($tmp,$this -> crypt_key));
}
 
public function php_decrypt($txt) {
   $txt = self::__key(base64_decode($txt),$this -> crypt_key);
   $tmp = '';
   for($i = 0;$i < strlen($txt); $i++) {
    $md5 = $txt[$i];
    $tmp .= $txt[++$i] ^ $md5;
   }
   return $tmp;
}
 
private function __key($txt,$encrypt_key) {
   $encrypt_key = md5($encrypt_key);
   $ctr = 0;
   $tmp = '';
   for($i = 0; $i < strlen($txt); $i++) {
    $ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
    $tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
   }
   return $tmp;
}
 
public function __destruct() {
   $this -> crypt_key = null;
}
}
?>