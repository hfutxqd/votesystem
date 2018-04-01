
<?php
import("uploadFile.php");
class admin extends spController
{
	  
	function adminindex()
	{
		$this->username = $_SESSION['userinfo']['user_name'];
		$this->display("adminindex.html");
	}
	 
	 
	function adminhome()
	{
		$this->display("adminhome.html");
	}
	 
	function editpw()
	{
		$this->aclname = $_SESSION['userinfo']['aclname'];
		$this->display("editpw.html");
	}
	 
	function editpwa()
	{
		
		/* $conditions = array( 'user_id' => $_SESSION['userinfo']['user_id'] );
		$result = $vs_user->find($conditions); 
		$b=$result['user_password'];
		$c=$a['old'];
		if($b==$c)
		{
			$row = array('user_password'=>$a['new']);
			$vs_user->update($conditions, $row);
			$this->success("密码修改成功！");
		}else
		{
			$this->success("您的原始密码错误！");
		} */
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
	 
	function add_vote()
	{
		$this->display("add_vote.html");
	}
	 
	 
	function add_vote_go()
	{
		$vs_content=spClass("vs_content");
		$newrow = array(
		'ct_type' => $this->spArgs('ct_type'),
		'ct_name' => $this->spArgs('ct_name'),
		//'ct_images' => $this->spArgs('ct_images'),
		'ct_content' => $this->spArgs('ct_content'),
		'ct_count' => $this->spArgs('count'),
		'ct_offtime' => $this->spArgs('ct_offtime'),
		'user_id'=>$_SESSION['userinfo']['user_id']
		);
		$file = new uploadFile('content');
		$res = $file->upload_file($_FILES['ct_images']);
		if ($res){
			$newrow['ct_images'] = $file->uploaded;
		}else{
			$this->error($file->errmsg);
			exit();
		}
		$bool = $vs_content->spVerifier($newrow);
		if (false == $bool)
		{
			$newrow['ct_id'] = $vs_content->create($newrow);
			$this->addvote_item($newrow);
		}else{
			foreach($bool as $item)
			{
				foreach($item as $msg)
				{
					$this->error($msg);
				}
			}   
		}
	}
	
	/* function add_vote2_go()
	{
		if (isset($_FILES))
		{
			var_dump($_FILES);
			$vs_content=spClass("vs_content");
			if ($err = spClass('vs_tools')->errFileInfo())
			{
				$this->error($err);
				exit();
			}
			$urls = spClass('vs_tools')->getImageUrl();
			var_dump($urls );
			$newrow = array(
			'ct_type' => $this->spArgs('ct_type'),
			'ct_name' => $this->spArgs('ct_name'),
			'ct_images' => $urls['file'],
			'ct_content' => $this->spArgs('ct_content'),
			'ct_count' => $this->spArgs('count'),
			'ct_offtime' => $this->spArgs('ct_offtime'),
			);
		}
		$bool = $vs_content->spVerifier($newrow);
		if (false == $bool)
		{
			$newrow['ct_id'] = $vs_content->create($newrow);
			$this->addvote_item($newrow);
		}else{
			foreach($bool as $item)
			{
				foreach($item as $msg)
				{
					$this->error($msg);
				}
			}   
		}
	} */


	function addvote_item($ct)
	{
		$this->loop = $ct['ct_count'];
		$this->ct_id = $ct['ct_id'];
		$this->display("addvote_item.html");
	}
	 
	function addvote_item_go()
	{
		$vs_items = spClass("vs_items");
		$args = $this->spArgs("");
		
		$ct_id = $args['ct_id'];
		$count = $args['count'];
		//var_dump($_FILES);
		$file = new uploadFile('voteitems');
		for ($var = 1; $var <= $count; $var++)
		{
			$tmpname = "it_images".$var;
			//var_dump($tmpname);
			$res = $file->upload_file($_FILES[$tmpname]);
			if (!$res){
				//var_dump($_FILES);
				//var_dump($args);
				$this->error('图片'.$var.':'.$file->errmsg);
				exit();
			}
			//var_dump($file->uploaded);
			$new = array(
			'it_name'=>$args["it_name".$var],
			'it_content'=>$args["it_content".$var],
			'it_image'=>$file->uploaded,
			'ct_id'=>$ct_id
			);
			$vs_items->create($new);
		}
		$this->success("新增成功！", spUrl('admin', 'add_vote'));
		/* $vs_content=spClass("vs_content");
		$a=$this->spArgs('ct_count');
		if($a != null)
		{
			$b=$a;
		}else
		{
			$b=0;
		} 
		$newrow = array(
		'ct_name' => $this->spArgs('ct_name'), 
		'ct_type' => $this->spArgs('ct_type'),
		'ct_images' => $this->spArgs('ct_images'),
		'ct_content' => $this->spArgs('ct_content'),
		'ct_count' => $b,
		);
		$vs_content->verifier=$vs_content->verifier_vote;
		$new=$vs_content->spVerifier($newrow);
		if(false==$new)
		{
			$vs_content->create($newrow); 
			$this->success("添加投票成功！", spUrl("main","addvote"));
		}else
		{
			foreach($new as $item)
			{
				foreach($item as $msg)
				{
					$this->error($msg);
				}
			}    
		} */
	}
	 
	/* function editvote()
	{
		$a=array( 'ct_id' => $this->spArgs('id') );
		$vs_content = spClass('vs_content');
		$result = $this->result=$vs_content->find($a);
		$this->display("editvote.html");
	}
	 
		
	 
	function editvotego()
	{
		$vs_content=spClass("vs_content");
		$conditions = array('ct_id'=>$this->spArgs('ct_id'));
		$newrow = array(
		'ct_type' => $this->spArgs('ct_type'),
		'ct_images' => $this->spArgs('ct_images'),
		'ct_content' => $this->spArgs('ct_content'),
		'ct_count' => $this->spArgs('ct_count'),
		'ct_name' => $this->spArgs('ct_name'),
		);
		$vs_content->update($conditions, $newrow);	
		$this->success("修改成功！", spUrl("admin","showvote")); 
	} */
	 
	function votehistory()
	{
		$vs_ip = spClass('vs_votes'); 
		$result=$this->result=$vs_ip->findAll();
		$this->display("votehistory.html");
	}
	
	function votedetail()
	{
		$vo_id = $this->spArgs('id');
		$vs_votes = spClass('vs_votes');
		$vs_user = spClass('vs_user');
		$vs_items = spClass('vs_items');
		$vs_content = spClass('vs_content');
		$con['vo_id'] = $vo_id;
		if ($vote = $vs_votes->find($con)){
			unset($con);
			$con['user_id'] = $vote['user_id'];
			$user = $vs_user->find($con);
			unset($con);
			$con['it_id'] = $vote['it_id'];
			$item = $vs_items->find($con);
			unset($con);
			$con['ct_id'] = $vote['ct_id'];
			$content = $vs_content->find($con);
			var_dump($user);
			var_dump($vote);
			var_dump($content);
			var_dump($item);
		}else{
			echo "该记录不存在！";
		}
	}

	function deluservote()
	{
		$conditions = array('ip_id'=>$this->spArgs('ip_id'));
		$vs_ip = spClass('vs_ip'); 
		$vs_ip->delete($conditions);	
		$this->success("删除记录成功！"); 
	}
		
	function delvote()
	{
		spClass('vs_tools')->delContent($this->spArgs('id'));
		$this->success("删除成功！");
	}
	function showvote()
	{
		$vs_content=spClass("vs_content");
		$result =$vs_content->findAll();
		$this->result = $result;
		$this->display("showvote.html");
	}
}
?>