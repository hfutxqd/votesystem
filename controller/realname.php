
<?php
import("idstarClient.php");
class realname extends spController
{
	function index()
	{
		//获取用户ID，教师为工号，学生为学号
		$userid=idsGetCurrentUser();
		//获取用户姓名
		$name=idsGetCurrentUserName();
		//获取用户群组 bzks	本科生,YJS	研究生,JZG	教职工,XY	校友（非在校人员）
		$ugroup = ids_GetUserGroup($userid);
		//获取用户属性信息，比如单位
		$dwmc=ids_GetUserAttribute($userid,'eduPersonOrgDN');
		$_SESSION['realname'] = array(
											'id'=>iconv('GB2312', 'UTF-8', $userid),
											'name'=>iconv('GB2312', 'UTF-8', $name),
											'group'=>iconv('GB2312', 'UTF-8', $ugroup[0]),
											'school'=>iconv('GB2312', 'UTF-8', $dwmc[0])
											);
		$this->jump(spUrl('pre_user', 'realname'));
	}
}
