<?php
//import("uploadFile.php");
//header('Content-type: application/json');
class main extends spController
{
	
	function index()
	{
		$this->display("index3.html");
	}
	
	function getIndexData(){
		
		$tool = spClass('vs_tools');
        $vs_items = spClass("vs_items");
		$content = $tool->getUserIndexContent();
		
		foreach($content as $key=>$value){
			unset($value['ct_passwd']);
			unset($value['ct_school']);
			unset($value['ct_class']);
			unset($value['ct_grade']);
			unset($value['ct_classrm']);
			unset($value['ct_time']);
			unset($value['user_id']);
			$ncontent[$key] = $value;
		}
		
		spAccess('w', 'content', $ncontent);
		foreach($ncontent as $value)
		{
			$new = array(
				'ct_id'=>$value['ct_id']
			);
			$_SESSION['offtime'][$value['ct_id']] = strtotime($value['ct_offtime']);
			$rest_time[$value['ct_id']] = $tool->getRestTime($_SESSION['offtime'][$value['ct_id']] - time());
			$items[$value['ct_id']] =$vs_items->findAll($new);
			// if (isset($_SESSION['userinfo']))
			// {
				// $count[$value['ct_id']] = $tool->getUserCount($_SESSION['userinfo']['user_id'], $value['ct_id']); 
			// }
		}
		// if (isset($_SESSION['userinfo']))
		// {
			// $this->login = true;
			// $this->user_name = $_SESSION['userinfo']['user_name'];
		// }else
		// {
			// $this->login = false;
			// $this->user_name = '';
		// }
		// $this->rest_time = $rest_time;
		// $this->content = $ncontent;
		//$this->count = $count;
		// $this->items = $items;
		
		$json = array(
		'rest_time'=>$rest_time,
		'content'=>$ncontent,
		'items'=>$items
		);
		//dump($json);
		echo  $json = json_encode($json);
		//$this->display("index.html");
	}
	
	function discoverPage()
	{
		$this->display('discover3.html');
	}
	
	function resultPage()
	{
		$this->display('result3.html');
	}
	
	function test()
	{
		var_dump($_SESSION);
		$res = spClass('vs_tools')->getVoteCountById('142');
		var_dump($res);
		/* $this->display('upload.html'); */
	}
	
	function getVoteCount()
	{
		$id = $this->spArgs('id');
		$res = spClass('vs_tools')->getVoteCountById($id);
		echo json_encode(array('count'=>$res));
		
	}
	
	function getFreedomVote()
	{
		$votes = spClass('vs_tools')->getHotVote();
		$rtn = spClass('vs_tools')->getOrderItems($votes);
		$rtn['content'] = $votes;
		//var_dump($rtn);
		echo json_encode($rtn);
	}
	
	function getFreedomResult()
	{
		$votes = spClass('vs_tools')->getHotResult();
		$rtn = spClass('vs_tools')->getOrderItems($votes);
		$rtn['content'] = $votes;
		//var_dump($rtn);
		echo json_encode($rtn);
	}
	
	function isNameExist()
	{
		$name = $this->spArgs('user_nkname');
		$user = spClass('vs_user');
		$res = array(
			'avalible'=>false
			);
		if ($user->findBy('user_nkname', $name))
		{
			echo json_encode($res);
		}else{
			$res['avalible']= true;
			echo json_encode($res);
		}
	}
	
	function register()
	{
		$this->display("register3.html");
	}
	
	// function registergo()
	// {
		// $user_id = $this->spArgs('user_id');
		// $password = $this->spArgs('user_password');
		// $password2 = $this->spArgs('user_password2');
		// if ($password == $password2)
		// {
			// $vs_user = spClass('vs_user');
			// $new = array(
			// 'user_id'=>$user_id
			// );
			// if ($vs_user->find($new))
			// {
				// $this->success('该学号已被注册！');
			// }else{
				// $new['user_password'] = $password;
				// $res = $vs_user->spVerifier($new);
				// if ($res = false)
				// {
					// $vs_user->create($new);
					// $this->success('注册成功！');
				// }else{
					// $this->success($res[0]);
				// }
			// }
		// }else{
			// $this->success('两次输入密码不一致！');
		// }
	// }
	
	
	function registergo()
	{
		$user_nkname = $this->spArgs('user_nkname');
		$password = $this->spArgs('user_password');
		$password2 = $this->spArgs('user_password2');
		
		$retn = array(
		'success'=>false,
		'errorInfo'=>''
		);
		
		if ($password == $password2)
		{
			$vs_user = spClass('vs_user');
			$res = $vs_user->register($user_nkname, $password);
			if ($res == false)//返回false注册成功
			{
				//$this->success('注册成功！');
				$retn['success'] = true;
				echo json_encode($retn);
			}else{
				// foreach($res as $item)
				// {
					// $this->success($item[0];;
					// echo $item[0];
				// }
				$retn['errorInfo'] = $res;
				echo json_encode($retn);
			}
		}else{
			//$this->success('两次输入密码不一致！');
			$retn['errorInfo'] = array(
			'user_password'=>array(0=>"两次输入密码不一致！")
			);
			echo json_encode($retn);
		}
	}
    
	function acljump()
	{
		if ($_SESSION['userinfo']['aclname'] == 'admin')
			{
				$this->jump(spUrl("admin","adminindex"));   
			}else if($_SESSION['userinfo']['aclname'] == 'user')
			{
				$this->jump(spUrl("user","userindex"));
			}else if($_SESSION['userinfo']['aclname'] == 'pre_user')
			{
				$this->jump(spUrl("pre_user","userindex"));
			}
	}
	
	
    function login()
	{
		
		if ($_SESSION['userinfo'] != null)
		{
			//$this->acljump();
			$this->jump(spUrl("main","index"));
		}
		if(isset($_COOKIE['user_nkname']))
		{
			$id = base64_decode($_COOKIE['user_id']);
			$name = base64_decode($_COOKIE['user_name']);
			$con = array(
			'user_id'=>$id,
			'user_name'=>$name
			);
			$vs_user=spClass("vs_user");
			$result = $vs_user->find($con);
			if ($result != null)
			{
				$_SESSION['userinfo'] = $result;
				spClass('spAcl')->set($result['aclname']); 
				// if ($_SESSION['userinfo']['aclname'] == 'admin')
				// {
					// $this->jump(spUrl("admin","adminindex"));   
				// }else if($_SESSION['userinfo']['aclname'] == 'user')
				// {
					// $this->jump(spUrl("user","userindex"));
				// }else if($_SESSION['userinfo']['aclname'] == 'pre_user')
				// {
					// $this->jump(spUrl("pre_user","userindex"));
				// }
				$this->jump(spUrl("main","index"));
			}
			if ($res = spClass('vs_user')->loginByCookie()){
					$this->login();
			}else{
				$ip = spClass('vs_tools')->getIP();
				spClass('vs_user')->logout();
				$this->success("cookie被篡改！您的IP：$ip 已被记下！", spUrl('main', 'login'));
			}
		}
        $this->display("login3.html");
    }
    
	 
	function logingo()
	{
		if (isset($_COOKIE['user_nkname']) || $_SESSION['userinfo'] != null)
		{
			$this->jump(spUrl('main', 'login'));
		}else {
			$vs_user=spClass("vs_user");
			$new=array(
			$us_id=$this->spArgs('user_id'),  
			$us_password=$this->spArgs('user_password'), 
			);
			$nd_rem = $this->spArgs('remember');
			$new=$vs_user->spVerifier($this->spArgs());
			if(false==$new)
			{
				$res = array(
				'success'=>false	,
				'acl'=>'',
				'errorInfo'=>''
				);
				if(false==$vs_user->userlogin($us_id,$us_password, $nd_rem))
				{
					//$this->error("用户名或密码错误，请重新输入！");
					$res['errorInfo'] = '用户名或密码错误!';
					echo json_encode($res);
				}else
				{
					$res['success'] = true;
					$res['acl'] = $_SESSION['userinfo']['aclname'];
					echo json_encode($res);
					//$this->acljump();
				}
			}else
			{
			   // foreach($new as $item)
			   // {
					// foreach($item as $msg)
					// {
						// $this->error($msg,spUrl("main","login"));
						// echo $msg;
					// }
				// }
				$res['errorInfo'] = $new;
				echo json_encode($res);
			}
		}
	} 
	 
	function logout()
	{
		spClass('vs_user')->logout();
		//$this->success("成功退出！", spUrl("main","login"));
		$rtn = array('success'=>true);
		echo json_encode($rtn);
	}
	
	function result()
	{
		$rtn=array(
		'success'=>false
		);
		$nowtime = time();
		$con = "select * from vs_content where ct_limType=0 and unix_timestamp(ct_offtime) < $nowtime;";
		$content = spClass("vs_content");
		if($res = $content->findSql($con))
		{
			$rtn['success'] = true;
			$rtn['content'] = $res;
			$res = spClass('vs_tools')->getOrderItems($res);
			$rtn['items'] = $res['items'];
			echo json_encode($rtn);
			exit();
		}else{
			echo json_encode($rtn);
			exit();
		}
	}
	
	function getSchoolInfo()
	{
		$rtn = array(
		'success'=>false
		);
		if ($school = spClass('vs_schoolInfo')->findSql("SELECT DISTINCT school from vs_schoolinfo;"))
		{
			foreach($school as $key=>$value)
			{
				$sch = $value['school'];
				if (!$school[$key]['classlist'] = spClass('vs_schoolInfo')->findSql("SELECT DISTINCT class from vs_schoolinfo where school = '$sch';"))
				{
					$rtn['message'] = "获取$sch的专业失败！";
					echo json_encode($rtn);
					exit();
				}
			}
		}else{
			$rtn['success'] = true;
			$rtn['message'] = "获取学院失败！";
			echo json_encode($rtn);
			exit();
		}
		$rtn['message']  = $school;
		echo json_encode($rtn);
	}
	
	function search()
	{
		
		$swd=$this->spArgs('swd');
		$content = spClass('vs_content')->search($swd);
		$tool = spClass('vs_tools');
        $vs_items=spClass("vs_items");
		foreach($content as $value)
		{
			$new = array(
				'ct_id'=>$value['ct_id']
			);
			$_SESSION['offtime'][$value['ct_id']] = strtotime($value['ct_offtime']);
			$rest_time[$value['ct_id']] = $tool->getRestTime($_SESSION['offtime'][$value['ct_id']] - time());
			$items[$value['ct_id']] =$vs_items->findAll($new);	
			// if (isset($_SESSION['userinfo']))
			// {
				// $count[$value['ct_id']] = $tool->getUserCount($_SESSION['userinfo']['user_id'], $value['ct_id']); 
			// }
		}
		// if (isset($_SESSION['userinfo']))
		// {
			// $this->login = true;
			// $this->user_name = $_SESSION['userinfo']['user_name'];
		// }else
		// {
			// $this->login = false;
			// $this->user_name = '';
		// }
		// $this->content = $content;
		// $this->rest_time = $rest_time;
		//$this->count = $count;
		// $this->items = $items;
		// $this->display("search.html");
		
		foreach($content as $key=>$value){
			unset($value['ct_passwd']);
			unset($value['ct_school']);
			unset($value['ct_class']);
			unset($value['ct_grade']);
			unset($value['ct_classrm']);
			unset($value['ct_time']);
			unset($value['user_id']);
			$ncontent[$key] = $value;
		}
		$json = array(
		'rest_time'=>$rest_time,
		'content'=>$ncontent,
		'items'=>$items
		);
		//dump($json);
		echo  $json = json_encode($json);
	}

}
?>