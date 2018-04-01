<?php
class vs_items extends spModel
{
    var $pk="it_id";
    var $table="vs_items";
    
        var $verifier =array(
			"rules"=>array(
				'it_name'=>array(
					'notnull'=>TRUE,
				),            
				'it_content'=>array(
					'notnull'=>TRUE,
				),
				
				'it_image'=>array(
					'notnull'=>TRUE,
				),
			),
        "messages"=>array(
            'it_image'=>array(
               'notnull'=>"图片不能为空！",
             ),
            'it_name'=>array(
            'notnull'=>"标题不能为空！"
             ),           
            'it_content'=>array(
            'notnull'=>"内容不能为空！",
             ),       
        ),
    );        
}


?>