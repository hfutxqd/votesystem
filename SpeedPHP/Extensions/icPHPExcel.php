<?php

import(SP_PATH.'/Extensions/icPHPExcel/PHPExcel.php');
import(SP_PATH.'/Extensions/icPHPExcel/PHPExcel/IOFactory.php');

class icPHPExcel{

	/**
	 * $VERSION函数定义了本类的版本信息
	 * 该信息有助于后续版本的延伸
	 * @var array
	 */
	protected $VERSION = array('UTF','20110223','Alpha');
	
	/**
	 * needle用于将PHPExcel类实例化以便进行下一步操作
	 * @version	2011-01-31
	 */
	private $needle;
	
	
	
	/**
	 * excel_version用于指定excel的版本，默认为Excel5版本，可选Excel2007版本
	 * 该变量使用函数switch_excel_version($version)变更
	 * @var string
	 * @version	2011-01-31
	 */
	private $excel_version = 'Excel5';
	
	/**
	 * tbl_id是当前操作表的编号
	 * 你可以通过TblList()获取所有表信息
	 * 然后通过Tbl_Set()设置该值
	 * @var int
	 */
	private $tbl_id = 0;
	
	/**
	 * 构造函数
	 * 当定例化pe类时，将同时实例化PHPExcel到$needle中
	 */
	public function __construct()
	{
		$this -> needle = new PHPExcel();
		$this -> currentsheet = $this -> getSheet(0); 
	}
	
	/**
	 * 通过Tbl_Set()设置当前操作表
	 * @param int $tbl_id 表的编号
	 */
	public function Tbl_Set($tbl_id){
		$this -> tbl_id = $tbl_id;
	}
	
	/**
	 * 返回Excel中的表信息
	 * 该函数将返回一维数组，键名为表编号，键值为表名
	 */
	public function TblList(){
		return $this -> needle -> getSheetNames();
	}
	
	/**
	 * 此函数用于变更excel的版本
	 * 若变更版本成功则返回bool TRUE，应输入'Excel5'或'Excel2007'
	 * @param string $version
	 * @return bool
	 * @category	ICase
	 * @package	ICase-ext-phpexcel
	 * @author Pony Cui
	 * @version 2011-01-31
	 */
	public function switch_excel_version($version)
	{
		if($version != 'Excel5' && $version != 'Excel2007'){return FALSE;}
		$this -> excel_version = $version;
		return TRUE;
	}
	
	/**
	 * Select_Suitable_Reader函数用于获取适合文件的阅读器，以便进一步读取文件
	 * 函数会检测文件是何种格式，并设置$excel_version
	 * @param string $filepath 文件路径
	 * @return object 阅读器指针
	 */
	public function Select_Suitable_Reader($filepath)
	{
		import(SP_PATH.'/Extensions/icPHPExcel/PHPExcel/Reader/Excel2007.php');
		import(SP_PATH.'/Extensions/icPHPExcel/PHPExcel/Reader/Excel5.php');
		$PHPReader = new PHPExcel_Reader_Excel2007();
		if(!$PHPReader->canRead($filepath))
		{      
 			$PHPReader = new PHPExcel_Reader_Excel5();    
 			if(!$PHPReader->canRead($filepath))
 			{            
  				return FALSE;   
 			}
 			else
 			{
 				$this -> switch_excel_version('Excel5');
 			}
		}
		else
		{
			$this -> switch_excel_version('Excel2007');
		}
		return $PHPReader;
	}
	
	/**
	 * Load_Excel函数用于将Excel文件读取到$needle指针中
	 * @param string $filepath 文件的绝对路径
	 */
	public function Load_Excel($filepath)
	{
		if(!is_file($filepath)){return FALSE;}
		$Reader = $this -> Select_Suitable_Reader($filepath);
		$this -> needle = $Reader -> load($filepath);
		return TRUE;
	}

	/**
	 * find函数用于读取其中一个单元格的值
	 * 必需指定col和row
	 * @param string $col 列A/B/C/D......
	 * @param int $row 行1/2/3/4......
	 */
	public function find($col,$row)
	{
		return $this -> getSheet($this->tbl_id) -> getCell($col.$row) -> getValue();
	}
	
	/**
	 * findAll()函数用于将整个excel表格保存成数组然后返回结果
	 * @return array 返回整个表格的数据，以二维数组显示
	 */
	public function findAll()
	{
		$col_max = $this -> getSheet($this->tbl_id) -> getHighestColumn();
		$row_max = $this -> getSheet($this->tbl_id) -> getHighestRow();
		$output = array();
		for($r=1;$r <= $row_max;$r++){
			for($c='A',$output[$r] = array();$c <= $col_max;$c++)
			{
				$output[$r][$c] = $this -> find($c, $r);
			}
		}
		return array($output);
	}
	
	/**
	 * create函数用于设置其中一个单元格的值
	 * @param string $col 列，取值A/B/C/D......
	 * @param int $row 行，取数字值
	 * @param string $val 值
	 */
	public function create($col,$row,$val)
	{
		$this -> getSheet($this->tbl_id) -> setCellValue($col.$row, $val);
	}
	
	/**
	 * createAll函数用于将整个数组中的值赋予表中
	 * @param array $array 将要进行赋值的数值
	 */
	public function createAll($thearray)
	{
		reset($thearray);
		while($r = each($thearray)){
			while($c = each($thearray[$r['key']])){
				$this -> create($c['key'], $r['key'], $c['value']);
			}
		}
	}
	
	/**
	 * 将excel表保存到文件以便下载
	 * saveExcel函数用于将指针中的excel表保存到文件，$filepath用于指于文件路径
	 * @param string $filepath 文件的输出路径
	 * @return string 返回文件相对路径
	 */
	public function saveExcel($filepath)
	{
		$Writer = PHPExcel_IOFactory::createWriter($this -> needle, $this -> excel_version);
		$Writer -> save($filepath);
		return array($filepath);
	}
	
	public function __call($func, $args){
		return call_user_func_array ( array($this -> needle,$func), $args);
	}
}