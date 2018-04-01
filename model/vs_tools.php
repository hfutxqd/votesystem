<?php
class vs_tools extends spModel
{	
	public function getType($ct_id)//根据content的id获取其投票类型
	{
		$content = spClass('vs_content');
		$conditions = array(
		'ct_id'=>$ct_id
		);
		$res = $content->find($conditions);
		return $res['ct_type'];
	}
	
	public function delContent($ct_id)//删除投票，以及包括与该投票有关的所有内容
	{
		$content = spClass('vs_content');
		$items = spClass('vs_items');
		$votes = spClass('vs_votes');
		$completed = spClass('vs_completed');
		
		$con = array(
		'ct_id'=>$ct_id
		);
		
		// $res = $content->find($con);
		// $file = $res['ct_images'];
		// if ($file != null){
			// substr($file, 11);
			// if (is_file($file))
			// {
				// unlink($file);
			// }
		// }
		
		$res = $items->findAll($con);
		foreach ($res as $item)
		{
			if ($item['it_image'] != null)
			{
				$file = $item['it_image'];
				if ($file != null)
				{
					substr($file, 11);
					if (is_file($file))
					{
						unlink($file);
					}
				}
			}
		}
		$rtn = $items->delete($con) &&
		$votes->delete($con) &&
		$content->delete($con) &&
		$completed->delete($con);
		return $rtn;
	}
	
	public function getUserCount($user_id, $ct_id)//获取用户对某个投票活动的已投的票数
	{
		$vote = spClass('vs_votes');
		$a = array(
		'user_id'=>$user_id,
		'ct_id'=>$ct_id
		);
		return $vote->findCount($a);
	}
	
	
	public function getRestTime($times)//将秒数转换成时分秒
	{
		$time['day'] = (int)($times/86400);
		$time['hour'] = (int)($times%86400/3600); 
		$time['min'] = (int)($times%3600/60);
		$time['sec'] = (int)$times % 60;
		return  $time;
	}
	
	public function getItemsByCt_id($ct_id)
	{
		$items = spClass('vs_items');
		$con = array(
		'ct_id'=>$ct_id
		);
		return $items->findAll($con);
	}
	
	public function getItems($ncontent)
	{
		foreach($ncontent as $value)
		{
			$new = array(
				'ct_id'=>$value['ct_id']
			);
			$_SESSION['offtime'][$value['ct_id']] = strtotime($value['ct_offtime']);
			$rest_time[$value['ct_id']] = $this->getRestTime($_SESSION['offtime'][$value['ct_id']] - time());
			$items[$value['ct_id']] =spClass('vs_items')->findAll($new);
		}
		$rtn['items'] = $items;
		$rtn['rest_time'] = $rest_time;
		return $rtn;
	}
	
	public function getOrderItems($ncontent)
	{
		foreach($ncontent as $value)
		{
			$ct_id = $value['ct_id'];
			$_SESSION['offtime'][$value['ct_id']] = strtotime($value['ct_offtime']);
			$rest_time[$value['ct_id']] = $this->getRestTime($_SESSION['offtime'][$value['ct_id']] - time());
			$items[$value['ct_id']] =spClass('vs_items')->findSql("select * from vs_items where ct_id=$ct_id order by it_count DESC;");
		}
		$rtn['items'] = $items;
		$rtn['rest_time'] = $rest_time;
		return $rtn;
	}
	
	public function getVoteCountById($ct_id)
	{
		$con = "select count(user_id) count from vs_votes where ct_id = $ct_id;";
		$rtn =  spClass('vs_votes')->findSql($con);
		return $rtn[0]['count'];
	}
	
	
	public function getHotVote()
	{
		$now = time();
		$con = "select * from vs_content where ct_limType=0 and UNIX_TIMESTAMP(ct_offtime) >= $now;";
		return $this->findSql($con);
	}
	
	public function getHotResult()
	{
		$now = time();
		$con = "select * from vs_content where ct_limType=0 and UNIX_TIMESTAMP(ct_offtime) < $now;";
		return $this->findSql($con);
	}
	
	public function getUserIndexContent(){//获取针对用户的投票
		$nowtime = time();
		$vs_content=spClass("vs_content");
		if (isset($_SESSION['userinfo'])){//已登录的所有用户
			if ($_SESSION['userinfo']['aclname'] == 'user'){//已经实名认证的用户
				$user_id = $_SESSION['userinfo']['user_id'];
				$shcool = $_SESSION['userinfo']['user_school'];
				$class = $_SESSION['userinfo']['class'];
				$grade = $_SESSION['user_grade'];
				$room = $_SESSION['user_room'];
				
				if ($class == null){//实名认证，但没有填写详细资料的用户
					$con = "select * from vs_content where (ct_limType=0 ".
					"or (ct_limType=1 and ct_school='$shcool' and ct_class is".
					" null and ct_classrm is null and ct_grade is null))  and unix_timestamp(ct_offtime) > $nowtime ".
					"and ct_id not in (SELECT ct_id FROM vs_completed WHERE user_id=$user_id) ORDER BY ct_limType DESC;";
					return $vs_content->findSql($con);
				}else//实名认证，填写了详细资料的用户
				{
					$con = "select * from vs_content where (ct_limType=0 or (ct_limType=1 and ct_school='$shcool'))".
								" and unix_timestamp(ct_offtime) > $nowtime and ".
								"ct_id not in (SELECT ct_id FROM vs_completed WHERE user_id=$user_id) ORDER BY ct_limType DESC;";
					$res = $vs_content->findSql($con);//查找所有无限制和
					foreach($res as $key=>$value)
					{
						if ($value['ct_limType'] == 0){
							$res1[$key] = $value;
						}else if ($value['ct_limType'] == 1)
						{
							if ($value['ct_classrm'] == null || $value['ct_classrm'] == ''){//如果班级没有限制
								if ($grade == $value['ct_grade']  && $class == $value['ct_class']){//就对比年级和专业
									$res1[$key] = $value;
								}
								if ($value['ct_grade'] == null || $value['ct_grade'] == ''){//如果班级和年级没有限制
									if ($class == $value['ct_class']){//就对比专业
										$res1[$key] = $value;
									}
									if ($value['ct_class'] == null || $value['ct_class'] == ''){//如果都没有限制
										$res1[$key] = $value;
									}
								}
							}
						}
					}
					return $res1;
				}
				
			}else if($_SESSION['userinfo']['aclname'] == 'admin'){
				return $vs_content-findAll();
			}
		}else{//未登陆和未实名认证的用户
			return  $vs_content->findSql("select * from vs_content where ct_limType=0 and unix_timestamp(ct_offtime) > $nowtime;");
		}
	}
	
	public function getIP()//获取当前用户IP
	{
		return $_SERVER["REMOTE_ADDR"];
	}
	
	/* public function errFileInfo()
	{
		$MAX_SIZE = 512000;
		$type;
		foreach($_FILES as $key=>$item)
		{
			if (!file_exists($item['tmp_name']))
			{
				return '文件不存在！';
			}
			if (!GetImageSize($item['tmp_name']))
			{
				return '不是有效的图片文件！';
			}
			if ($item['size'] > $MAX_SIZE)
			{
				return '文件过大！单个文件不能大于500KB';
			}
		}
		return false;
	}
	
	public function getImageUrl($dir)
	{
		$M_SIZE = 512000;
		if ($_FILES)
		{
			$subdir = 'attached/'.$dir.'/'.date('ymdhis',time()).rand(100,999);
			if (!file_exists($dir)){
				 mkdir('attached/'.$dir,0777,true);
			}
			foreach($_FILES as $key=>$item)
			{
				if ($item['size'] > $M_SIZE)
				{
					return false;
				}
				$file[$key] = $subdir.'.'.substr($item['type'], 6);
				move_uploaded_file($item['tmp_name'], $file[$key]);
			}
			return $file;
		}
	} */
}
