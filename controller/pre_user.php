
<?php
class pre_user extends spController
{
    //http://ids1.hfut.edu.cn:81/amserver/UI/Login?goto=http%3A%2F%2Fvote.hfut.edu.cn/votesystem/index.php?c=realname
	function userindex()
	{
		$this->username = $_SESSION['userinfo']['user_name'];
		$this->display("pre_userindex.html");
	}
	
	function userhome()
	{
		$this->display("realname1.html");
	}
	
	function userinfor()
	{
		$this->display("realname1.html");
	}
	
	function editpw()
	{
		$this->aclname = $_SESSION['userinfo']['aclname'];
		$this->display("editpw.html");
	}
	 
	function editpwa()
	{
		$vs_user=spClass("vs_user");
		$old = $this->spArgs('us_oldpassword');
		$new = $this->spArgs('us_newpassword');
		if ($vs_user->update_pw($old, $new))
		{
			$this->success("密码修改成功！");
		}else{
			$this->success("您的原始密码错误！");
		}
	}
	
	function realname()
	{
		$vs_user = spClass('vs_user');
		$user = $_SESSION['userinfo'];
		unset($user['ip']);
		unset($user['browser']);
		$real_user = $_SESSION['realname'];
		
		if ( $real_user != null)
		{
			if ($vs_user->findBy('user_id', $real_user['id']))
			{
				$this->success("学号已被认证过！", spUrl('main', 'login'));
			}
			//更新用户信息
			$user['user_id'] = $real_user['id'];
			$user['user_name'] = $real_user['name'];
			$user['user_school'] = $real_user['school'];
			
			//查找该学院的所有专业
			/* $con['school'] = $real_user['school'];
			$classes = spClass('vs_schoolInfo')->findAll($con);
			unset($classes['school']); */
			
			$user['user_group'] = $real_user['group'];
			$user['aclname'] = 'user';
			/* foreach ($classes as $value)
			{
				$classlist[$value['sc_id']] = $value['class'];
			} */
			//执行更新
			$con2['user_nkname'] = $_SESSION['userinfo']['user_nkname'];
			if($vs_user->update($con2, $user))
			{
				//维持登陆状况，更新识别信息，并重置实名认证
				$_SESSION['userinfo'] = $user;
				unset($_SESSION['realname']);
				//$_SESSION['class'] = $classes;
				spClass('spAcl')->set($user['aclname']);
				//跳转至新用户中心
				//$this->success("认证成功！", spUrl('user', 'editUserInfo'));
				$this->jump(spUrl('main', 'index'));
			}
			$this->success("认证失败！", spUrl('main', 'login'));
		}
		$this->success("认证失败！", spUrl('main', 'login'));
	}

}
?>