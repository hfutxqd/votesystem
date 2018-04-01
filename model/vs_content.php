<?php
class vs_content extends spModel
{
    var $pk="ct_id";
    var $table="vs_content";
	var $verifier =array(
		"rules"=>array(
			 'ct_name'=>array(
				'notnull'=>TRUE,
			),            
			'ct_content'=>array(
				'notnull'=>TRUE,
			),
			'ct_type'=>array(
			   'notnull'=>TRUE,
			   'maxlength' => 3,
			),
				 
		),
		 
		"messages"=>array(
			'ct_type'=>array(
			   'notnull'=>"可选数量在1~999之间！",
			),
			'ct_name'=>array(
			'notnull'=>"名称不能为空！",
			 ),           
			'ct_content'=>array(
			'notnull'=>"描述不能为空！",
			 ),       
		),
	);
	
	public function isPwdRight($it_id, $passwd)
	{
		$sql = "select ct_passwd from items_pwd where it_id = $it_id";
		$res = $this->findSql($sql);
		return $passwd==$res[0]['ct_passwd'];
	}
	
	public function search($swd)
	{
		if (stripos($swd, 'ID') === 0 && is_numeric(substr($swd, 2))){
			$res[0] = $this->findBy('ct_id', substr($swd, 2));
			return $res;
		}else
		{
			//从针对当前用户的投票中搜索
			$content = spAccess('r', 'content');
			foreach ($content as $key=>$value)
			{
				if (is_int(stripos($value['ct_name'], $swd)))
				{
					$res[$key] = $value;
				}
			}
			return $res;
			//这里从所有无限制的投票中搜索，不符合要求
			//return $this->findAll(" ct_limType = 0 and ct_name like '%$swd%'");
		}
	}
	
}


?>