
<?php
import("uploadFile.php");
class user extends spController
{
    function vote(){
        $it_id=$this->spArgs('it');
		$ct_id=$this->spArgs('ct');
		$it_id = json_decode($it_id);
		$vs_content = spClass('vs_content');
		$content = $vs_content->findBy('ct_id', $ct_id);
		$offtime = $_SESSION['offtime'][$ct_id];
		$user_id = $_SESSION['userinfo']['user_id'];
		$type = $content['ct_type'];
		$limType = $content['ct_limType'];
		
		$rtn = array(
		'success'=>false,
		'message'=>''
		);
		if ($limType == 2)
		{
			$pwd = $this->spArgs('ct_passwd');
			if ($pwd == '' || $pwd == null)
			{
				//$this->success("密码不能为空！", spUrl('main', 'index'));
				$rtn['message'] = "密码不能为空！";
				echo json_encode($rtn);
				exit();
			}else{
				if ($pwd != $content['ct_passwd'])
				{
					//$this->success("密码不正确！", spUrl('main', 'index'));
					$rtn['message'] = "密码不正确！";
					echo json_encode($rtn);
					exit();
				}
			}
		}else if($limType == 1)
		{
			$contents = spAccess('r', 'content');
			if (!in_array($content, $contents))
			{
				//$this->success("该投票发起者不允许你投票！");
				$rtn['message'] = "该投票发起者不允许你投票！";
				echo json_encode($rtn);
				exit();
			}
		}
		$count = count($it_id);
		if (time()> $offtime)
		{
			//$this->success("投票已经结束！");
			$rtn['message'] = "投票已经结束！";
			echo json_encode($rtn);
			exit();
		}else if ($count  != $type)
		{
			//$this->success("本投票是 $type 选的，而你选了 $count 个！");
			$rtn['message'] = "本投票是"." $type 选的"."，而你选了 $count 个！";
			echo json_encode($rtn);
			exit();
		}else{
			
			$vs_vote = spClass('vs_votes'); 
			foreach($it_id as $item)
			{
				$conditions = array( 'it_id' => $item,
												'user_id'=> $user_id,
												'ct_id'=> $ct_id
									);//用于查找用户给选项的投票
									
				$conditions2 = array('user_id'=> $user_id,
												'ct_id'=> $ct_id
									);//用于查找该投票活动中用户投票的次数
									
				$result = $vs_vote->find($conditions);
				/* $count = $vs_vote->findCount($conditions2);
				if($count >= $type)
				{
					$this->success("投票次数已用完！", spUrl('main', 'index'));
				}else  */
				if ($result != false)
				{
					//$this->success("你已经给他投过票了！", spUrl('main', 'index'));
					$rtn['message'] = "你已经给他投过票了！";
					echo json_encode($rtn);
					exit();
				}else{
					$vs_item = spClass("vs_items");
					$con = array(
								'it_id' => $item
					);
					$res = $vs_item->find($con);
					$res['it_count']++;
					$conditions['vo_ip'] = $_SESSION['userinfo']['ip'];
					$conditions['vo_browser'] = $_SESSION['userinfo']['browser'];
					$vs_item->update($con, $res);
					$vs_vote->create($conditions);
				}
			}
			spClass('vs_completed')->create($conditions2);
			//$this->success("投票成功！" );
			
			$rtn['message'] = "投票成功！";
			$rtn['success'] = true;
			echo json_encode($rtn);
			exit();
		}
    }
	
	function qiandao()
	{
		$points = rand(10, 80);
		$user_id = $_SESSION['userinfo']['user_id'];
		spClass('vs_user')->addPoint($user_id, $points);
		echo json_encode(array('success'=>true,'points'=>$points));
	}
	
	function userindex()
	{
		$this->username = $_SESSION['userinfo']['user_name'];
		$this->display("userindex.html");
	}
	
	function userhome()
	{
		$this->display("userhome.html");
	}
	
	function userinfor()
	{
		$this->userinfo = $_SESSION['userinfo'];
		$this->display("userinfor.html");
	}
	
	function getUserInfo()
	{
		$userinfo = $_SESSION['userinfo'];
		unset($userinfo['user_password']);
		unset($userinfo['user_group']);
		unset($userinfo['user_ckey']);
		unset($userinfo['ip']);
		unset($userinfo['browser']);
		echo json_encode($userinfo);
	}
	
	function getClasslist()
	{
		$user_school = $_SESSION['userinfo']['user_school'];
		$rtn = spClass('vs_tools')->findSql("select class from vs_schoolinfo where school='$user_school';");
		$rtn = array_column($rtn, 'class');
		echo json_encode($rtn);
	}
	
	function editUserInfo()
	{
		$user = spClass('vs_user');
		$class = $this->spArgs('major');
		$color = $this->spArgs('color');
		$rtn = array(
		'success'=>false
		);
		if ($class != '' || $class!=null)
		{
			$nkname = $_SESSION['userinfo']['user_nkname'];
			$grade = $this->spArgs('grade');
			$classroom = $this->spArgs('classroom');
			if (($grade > 1950 && $grade <= 2020) && ($classroom > 0 && $classroom < 50))
			{
				if (!ereg("#[a-fA-F0-9]{6}$",$color))
				{
					$rtn['message']="颜色值错误！";
					echo json_encode($rtn);
					exit();
				}
				$con = "update vs_user set user_class='$class', user_grade=$grade, user_room=$classroom, user_color='$color' where user_nkname='$nkname'";
				$user->findSql($con);
				$_SESSION['userinfo']['user_class'] = $class;
				$_SESSION['userinfo']['user_grade'] = $grade;
				$_SESSION['userinfo']['user_room'] = $classroom;
				$_SESSION['userinfo']['user_color'] = $color;
				$rtn['success'] = true;
				echo json_encode($rtn);
				//$this->jump(spUrl(user, userindex));
				
			}else{
				//$this->success("请认真填写！");
				$rtn['message']="填写的信息错的离谱。。。";
				echo json_encode($rtn);
			}
		}else{
			// $this->userinfo = $_SESSION['userinfo'];
			// $con['school'] = $_SESSION['userinfo']['user_school'];
			// $classes = spClass('vs_schoolInfo')->findAll($con);
			// unset($classes['school']); 
			// $this->classlist = $classes;
			// $this->display("editUserInfo.html");
			$rtn['message']="专业不能为空！";
			echo json_encode($rtn);
		}
	}
	
	
	/* function add_vote()
	{
		$classlist = spClass('vs_schoolInfo')->findAll();
		$this->classlist  = $classlist;
		$this->display("user_add_vote.html");
	} */
	
	function upload()
	{
		$rtn = array(
		'success'=>false,
		'message'=>''
		);
		$file = new uploadFile('voteitems');
		$res = $file->upload_file($_FILES['it_image']);
		if (!$res){
			//var_dump($_FILES);
			//var_dump($args);
			//$this->error('图片'.$var.':'.$file->errmsg);
			$rtn['message'] = $file->errmsg;
			echo json_encode($rtn);
			exit();
		}else{
			$rtn['success'] = true;
			$rtn['message'] = $file->uploaded;
			echo json_encode($rtn);
			exit();
		}
	}
	
	 function newvote()
	 {
		 $this->display('newvote3.html');
	 }
	 
	function add_vote()
	{
		$rtn = array(
		'success'=>false,
		'message'=>''
		);
		$vs_content=spClass("vs_content");
		$newrow = array(
		'ct_type' => $this->spArgs('ct_type'),
		'ct_limType' => $this->spArgs('ct_limType'),
		'ct_name' => $this->spArgs('ct_name'),
		'ct_content' => $this->spArgs('ct_content'),
		'ct_count' => $this->spArgs('count'),
		'ct_offtime' => $this->spArgs('ct_offtime'),
		'user_id'=>$_SESSION['userinfo']['user_id'],
		);
		
		if ($newrow['ct_limType'] == 1){//班级限制
			$newrow['ct_school']  = $this->spArgs('ct_school');
			$newrow['ct_class']  = $this->spArgs('ct_class');
			$newrow['ct_grade']  = $this->spArgs('ct_grade');
			$newrow['ct_classrm'] = $this->spArgs('ct_classrm');
		}else if($newrow['ct_limType'] == 2){//密码限制
			$newrow['ct_passwd']  = $this->spArgs('ct_passwd');
		}
		
		/* $file = new uploadFile('content');
		$res = $file->upload_file($_FILES['ct_images']);
		if ($res){
			$newrow['ct_images'] = $file->uploaded;
		}else{
			$this->error($file->errmsg);
			exit();
		} */
		$it_name = $this->spArgs('it_name');
		$it_content = $this->spArgs('it_content');
		$it_images = $this->spArgs('it_images');
		$bool = $vs_content->spVerifier($newrow);
		if (false == $bool)
		{
			if ($ct_id = $vs_content->create($newrow))
			{
				$this->addvote_item($ct_id, $it_name, $it_content, $it_images);
			}else{
				$rtn['message'] = '创建投票失败！';
				echo json_encode($rtn);
				exit();
			}
		}else{
			/* foreach($bool as $item)
			{
				foreach($item as $msg)
				{
					$this->error($msg);
				}
			} */
			$rtn['message'] = '数据不完整！';
			$rtn['error']= $bool;
			echo json_encode($rtn);
			exit();
		}
	}
	
	/* function addvote_item($ct)
	{
		$this->loop = $ct['ct_count'];
		$this->ct_id = $ct['ct_id'];
		$this->display("user_addvote_item.html");
	} */
	 
	function addvote_item($ct_id, $it_name, $it_content, $it_images)
	{
		$ct_id = json_decode($ct_id);
		$it_name = json_decode($it_name);
		$it_content = json_decode($it_content);
		$it_images = json_decode($it_images);
		$rtn = array(
		'success'=>false,
		'message'=>''
		);
		$vs_items = spClass("vs_items");
		
		// $ct_id = $args['ct_id'];
		$count = count($it_name);
		//var_dump($_FILES);
		//$file = new uploadFile('voteitems');
		for ($var = 0; $var < $count; $var++)
		{
			// $afile = array(
			// 'name'=>$_FILES['it_images']['name'][$var],
			// 'type'=>$_FILES['it_images']['type'][$var],
			// 'tmp_name'=>$_FILES['it_images']['tmp_name'][$var],
			// 'error'=>$_FILES['it_images']['error'][$var],
			// 'size'=>$_FILES['it_images']['size'][$var],
			// );
			// $res = $file->upload_file($afile);
			// if (!$res){
				// var_dump($_FILES);
				// var_dump($args);
				// $this->error('图片'.$var.':'.$file->errmsg);
				// $rtn['message'] = $file->errmsg;
				// echo json_encode($rtn);
				// exit();
			// }
				$new = array(
				'it_name'=>$it_name[$var],
				'it_content'=>$it_content[$var],
				'it_image'=>$it_images[$var],
				'ct_id'=>$ct_id
				);
				if (!$vs_items->create($new))
				{
					$rtn['message'] = '在创建第'.($var+1).'个投票选项时失败!';
					echo json_encode($rtn);
					exit();
				}
			}
			//var_dump($file->uploaded);
			//$this->success("新增成功！", spUrl('user', 'add_vote'));
		$rtn['success'] = true;
		$rtn['message'] = $ct_id;
		echo json_encode($rtn);
		exit();
	}
	
	function myVote()
	{
		$rtn=array(
		'success'=>false
		);
		$con['user_id'] = $_SESSION['userinfo']['user_id'];
		$content = spClass("vs_content");
		if ($res = $content->findAll($con))
		{
			foreach($res as $key=>$value){
				unset($value['ct_passwd']);
				unset($value['ct_school']);
				unset($value['ct_class']);
				unset($value['ct_grade']);
				unset($value['ct_classrm']);
				unset($value['ct_time']);
				unset($value['user_id']);
				$ncontent[$key] = $value;
			}
			$rtn['success'] = true;
			$rtn['content'] = $ncontent;
			$res = spClass('vs_tools')->getItems($ncontent);
			$rtn['items'] = $res['items'];
			
			echo json_encode($rtn);
			exit();
		}else{
			//$this->error("空");
			$rtn['message'] = "值为空！";
			echo json_encode($rtn);
			exit();
		}
	}
	
	function partVote()
	{
		$rtn=array(
		'success'=>false
		);
		$user_id= $_SESSION['userinfo']['user_id'];
		$con = "select distinct ct_id from vs_votes where user_id=$user_id;";
		$votes = spClass('vs_votes');
		$content = spClass('vs_content');
		if ($res = $votes->findSql($con))
		{
			foreach($res as $key=>$value)
			{
				//$con = array('ct_id'=>$value['ct_id']);
				if ($res2 = $content->findBy('ct_id', $value['ct_id']))
				{
					unset($res2['ct_passwd']);
					unset($res2['ct_school']);
					unset($res2['ct_class']);
					unset($res2['ct_grade']);
					unset($res2['ct_classrm']);
					unset($res2['ct_time']);
					unset($res2['user_id']);
					$newcon[$key] = $res2;
				}else{
					//$this->error("空");
					// echo json_encode($rtn);
					// exit();
				}
			}
			$rtn['success'] = true;
			$rtn['content'] = $newcon;
			$res = spClass('vs_tools')->getItems($newcon);
			$rtn['items'] = $res['items'];
			echo json_encode($rtn);
			exit();
		}else{
			$rtn['message'] = "值为空！";
			echo json_encode($rtn);
			exit();
		}
	}
	
	function result()
	{
		$rtn=array(
		'success'=>false
		);
		$nowtime = time();
		$user_id = $_SESSION['userinfo']['user_id'];
		$con = "select * from vs_content where user_id =$user_id  and unix_timestamp(ct_offtime) < $nowtime;";
		//查询用户发起且投票已经结束的投票
		$content = spClass("vs_content");
		if ($res = $content->findSql($con))
		{
			$i = 0;
			foreach($res as $key=>$value){
				unset($value['ct_passwd']);
				unset($value['ct_school']);
				unset($value['ct_class']);
				unset($value['ct_grade']);
				unset($value['ct_classrm']);
				unset($value['ct_time']);
				unset($value['user_id']);
				$ncontent[$i] = $value;
				$i++;
			}
			$rtn['success'] = true;
			$rtn['content'] = $ncontent;
			$res = spClass('vs_tools')->getOrderItems($ncontent);
			$rtn['items'] = $res['items'];
			echo json_encode($rtn);
			exit();
		}else{
			//$this->error("空");
			$rtn['message'] = "值为空！";
			echo json_encode($rtn);
			exit();
		}
	}
	
	function partResult()
	{
		$rtn=array(
		'success'=>false
		);
		$nowtime = time();
		$user_id = $_SESSION['userinfo']['user_id'];
		$con = "select distinct ct_id from vs_votes where user_id=$user_id;";//查询该用户参与的投票ID
		$votes = spClass('vs_votes');
		$content = spClass('vs_content');
		if ($res = $votes->findSql($con))
		{
			$i = 0;
			foreach($res as $key=>$value)
			{
				//dump($res);
				$ct_id = $value['ct_id'];
				$con2 = "select it_id from vs_votes where user_id=$user_id and ct_id=$ct_id";
				$con = "select * from vs_content where ct_id=$ct_id and unix_timestamp(ct_offtime) < $nowtime;";
				//查询用户参与且投票已经结束的投票
				if (($res2 = $content->findSql($con)) && ($selected = $votes->findSql($con2)))
				{
					//dump($res2);
					unset($res2[0]['ct_passwd']);
					unset($res2[0]['ct_school']);
					unset($res2[0]['ct_class']);
					unset($res2[0]['ct_grade']);
					unset($res2[0]['ct_classrm']);
					unset($res2[0]['ct_time']);
					unset($res2[0]['user_id']);
					$newcon[$i] = $res2[0];
					$newselect[$ct_id] = array_column($selected, 'it_id');
					$i++;
				}else{
					//$this->error("空");
					// $rtn['message'] = "值为空！";
					// echo json_encode($rtn);
					// exit();
				}
			}
			$rtn['success'] = true;
			$rtn['content'] = $newcon;
			$res = spClass('vs_tools')->getOrderItems($newcon);
			foreach($res['items'] as $key=>$value)
			{
				foreach($value as $key2=>$value2)
				{
					if (in_array($value2['it_id'], $newselect[$key]))
					{
						$res['items'][$key][$key2]['selected'] = true;
					}else{
						$res['items'][$key][$key2]['selected'] = false;
					}
				}
			}
			// var_dump($newselect);
			// var_dump($res['items']);
			$rtn['items'] = $res['items'];
			echo json_encode($rtn);
			exit();
		}else{
			//$this->error("空");
			$rtn['message'] = "用户参与的投票不存在！";
			//echo json_encode($rtn);
			exit();
		}
	}
	
	function delvote()
	{
		$user_id = $_SESSION['userinfo']['user_id'];
		
		$id = $this->spArgs('id');
		$idList = spClass('vs_content')->findSql("select ct_id from vs_content where user_id = 2013214400;");
		$idList = array_column($idList, 'ct_id');
		if (in_array($id, $idList))
		{
			if (spClass('vs_tools')->delContent($id))
			{
				$rtn['success'] = true;
				echo json_encode($rtn);
				exit();
			}
			$rtn['success'] = false;
			$rtn['message'] = '未知错误！';
			echo json_encode($rtn);
			exit();
		}
		//$this->success("删除成功！");
		$rtn['success'] = false;
		$rtn['message'] = '越权删除！';
		echo json_encode($rtn);
		exit();
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

}
?>