<?php
 /**
  * 鏂囦欢涓娄紶绫?  */
 class uploadFile {

 	public $max_size = '1000000';//璁剧疆涓娄紶鏂囦欢澶у皬
 	public $file_name = 'date';//閲嶅懡鍚嶆柟寮忎唬琛ㄤ互镞堕棿锻藉悕锛屽叾浠栧垯浣跨敤缁欎篑镄勫悕绉? 	public $allow_types;//鍏佽涓娄紶镄勬枃浠舵墿灞曞悕锛屼笉鍚屾枃浠剁被鍨嬬敤钬渱钬濋殧寮€
 	public $errmsg = '';//阌栾淇℃伅
 	public $uploaded = '';//涓娄紶鍚庣殑鏂囦欢鍚?鍖呮嫭鏂囦欢璺缎)
 	public $save_path;//涓娄紶鏂囦欢淇濆瓨璺缎
 	private $files;//鎻愪氦镄勭瓑寰呬笂浼犳枃浠? 	private $file_type = array();//鏂囦欢绫诲瀷
 	private $ext = '';//涓娄紶鏂囦欢镓╁睍鍚?
 	/**
 	 * 鏋勯€犲嚱鏁帮紝鍒濆鍖栫被
 	 * @access public
 	 * @param string $file_name 涓娄紶鍚庣殑鏂囦欢鍚? 	 * @param string $save_path 涓娄紶镄勭洰镙囨枃浠跺す
 	 */
 	public function __construct($save_path = './upload/',$file_name = 'date',$allow_types = '') {
		$this->file_name   = $file_name;//閲嶅懡鍚嶆柟寮忎唬琛ㄤ互镞堕棿锻藉悕锛屽叾浠栧垯浣跨敤缁欎篑镄勫悕绉?		$this->save_path   = (preg_match('/\/$/',$save_path)) ? $save_path : $save_path . '/';
		$this->allow_types = $allow_types == '' ? 'jpg|gif|png|zip|rar' : $allow_types;
 	}

 	/**
 	 * 涓娄紶鏂囦欢
 	 * @access public
 	 * @param $files 绛夊緟涓娄紶镄勬枃浠?琛ㄥ崟浼犳潵镄?_FILES[])
 	 * @return boolean 杩斿洖甯冨皵链? 	 */
	public function upload_file($files) {
		$name = $files['name'];
		$type = $files['type'];
		$size = $files['size'];
		$tmp_name = $files['tmp_name'];
		$error = $files['error'];

		switch ($error) {
			case 0 : $this->errmsg = '';
				break;
			case 1 : $this->errmsg = '瓒呰绷浜唒hp.ini涓枃浠跺ぇ灏?;
				break;
			case 2 : $this->errmsg = '瓒呰绷浜哅AX_FILE_SIZE 阃夐」鎸囧畾镄勬枃浠跺ぇ灏?;
				break;
	 	    case 3 : $this->errmsg = '鏂囦欢鍙湁閮ㄥ垎琚笂浼?;
				break;
			case 4 : $this->errmsg = '娌℃湁鏂囦欢琚笂浼?;
				break;
			case 5 : $this->errmsg = '涓娄紶鏂囦欢澶у皬涓?';
				break;
		    default : $this->errmsg = '涓娄紶鏂囦欢澶辫触锛?;
				break;
			}
		if($error == 0 && is_uploaded_file($tmp_name)) {
			//妫€娴嬫枃浠剁被鍨?			if($this->check_file_type($name) == FALSE){
				return FALSE;
			}
			//妫€娴嬫枃浠跺ぇ灏?			if($size > $this->max_size){
				$this->errmsg = '涓娄紶鏂囦欢<font color=red>'.$name.'</font>澶ぇ锛屾渶澶ф敮鎸?font color=red>'.ceil($this->max_size/1024).'</font>kb镄勬枃浠?;
				return FALSE;
			}
			$this->set_save_path();//璁剧疆鏂囦欢瀛樻斁璺缎
			$new_name = $this->file_name != 'date' ? $this->file_name.'.'.$this->ext : date('YmdHis').'.'.$this->ext;//璁剧疆鏂版枃浠跺悕
			$this->uploaded = $this->save_path.$new_name;//涓娄紶鍚庣殑鏂囦欢鍚?			//绉诲姩鏂囦欢
			if(move_uploaded_file($tmp_name,$this->uploaded)){
				$this->errmsg = '鏂囦欢<font color=red>'.$this->uploaded.'</font>涓娄紶鎴愬姛锛?;
				return TRUE;
			}else{
				$this->errmsg = '鏂囦欢<font color=red>'.$this->uploaded.'</font>涓娄紶澶辫触锛?;
				return FALSE;
			}

		}
	}

 	/**
 	 * 妫€镆ヤ笂浼犳枃浠剁被鍨? 	 * @access public
 	 * @param string $filename 绛夊緟妫€镆ョ殑鏂囦欢鍚? 	 * @return 濡傛灉妫€镆ラ€氲绷杩斿洖TRUE 链€氲绷鍒栾繑锲濬ALSE鍜岄敊璇秷鎭? 	 */
    public function check_file_type($filename){
		$ext = $this->get_file_type($filename);
		$this->ext = $ext;
  		$allow_types = explode('|',$this->allow_types);//鍒嗗壊鍏佽涓娄紶镄勬枃浠舵墿灞曞悕涓烘暟缁?  		//echo $ext;
  		//妫€镆ヤ笂浼犳枃浠舵墿灞曞悕鏄惁鍦ㄨ鍏佽涓娄紶镄勬枃浠舵墿灞曞悕涓?  		if(in_array($ext,$allow_types)){
  			return TRUE;
  		}else{
  			$this->errmsg = '涓娄紶鏂囦欢<font color=red>'.$filename.'</font>绫诲瀷阌栾锛屽彧鏀寔涓娄紶<font color=red>'.str_replace('|',',',$this->allow_types).'</font>绛夋枃浠剁被鍨?';
  			return FALSE;
  		}
    }

    /**
     * 鍙栧缑鏂囦欢绫诲瀷
     * @access public
     * @param string $filename 瑕佸彇寰楁枃浠剁被鍨嬬殑鐩爣鏂囦欢鍚?     * @return string 鏂囦欢绫诲瀷
     */
    public function get_file_type($filename){
    	$info = pathinfo($filename);
    	$ext = $info['extension'];
    	return $ext;
    }

	/**
	 * 璁剧疆鏂囦欢涓娄紶鍚庣殑淇濆瓨璺缎
	 */
	public function set_save_path(){
		$this->save_path = (preg_match('/\/$/',$this->save_path)) ? $this->save_path : $this->save_path . '/';
		if(!is_dir($this->save_path)){
			//濡傛灉鐩綍涓嶅瓨鍦紝鍒涘缓鐩綍
			$this->set_dir();
		}
	}


	/**
	 * 鍒涘缓鐩綍
	 * @access public
	 * @param string $dir 瑕佸垱寤虹洰褰旷殑璺缎
	 * @return boolean 澶辫触镞惰繑锲为敊璇秷鎭拰FALSE
	 */
	public function set_dir($dir = null){
		//妫€镆ヨ矾寰勬槸鍚﹀瓨鍦?		if(!$dir){
			$dir = $this->save_path;
		}
		if(is_dir($dir)){
			$this->errmsg = '闇€瑕佸垱寤虹殑鏂囦欢澶瑰凡缁忓瓨鍦紒';
		}
		$dir = explode('/', $dir);
		foreach($dir as $v){
			if($v){
				$d .= $v . '/';
				if(!is_dir($d)){
					$state = mkdir($d, 0777);
					if(!$state)
						$this->errmsg = '鍦ㄥ垱寤虹洰褰?font color=red>' . $d . '镞跺嚭阌欙紒';
				}
			}
		}
		return true;
	}
 }

/*************************************************
 * 锲剧墖澶勭悊绫? *
 * 鍙互瀵瑰浘鐗囱繘琛岀敓鎴愮缉鐣ュ浘锛屾墦姘村嵃绛夋搷浣? * 链被榛樿缂栫爜涓篣TF8 濡傛灉瑕佸湪GBK涓嬩娇鐢ㄨ灏唅mg_mark鏂规硶涓墦涓枃瀛楃涓叉按鍗癷conv娉ㄩ喷铡绘帀
 *
 * 鐢变簬UTF8姹夊瓧鍜岃嫳鏂囧瓧姣嶅ぇ灏?镀忕礌)涓嶅ソ纭畾锛屽湪涓嫳鏂囨贩鍚埚嚭鐜板お澶氭椂鍙兘浼氩嚭鐜板瓧绗︿覆锅忓乏
 * 鎴栧亸鍙?璇锋抵鎹」鐩幆澧冨get_mark_xy鏂规硶涓殑$strc_w = strlen($this->mark_str)*7+5杩? * 琛岃皟鏁? * 闇€瑕丢D搴撴敮鎸侊紝涓烘洿濂戒娇鐢ㄦ湰绫绘帹钻愪娇鐢℅D搴?.0+
 *
 * @author kickflip@php100 QQ263340607
 *************************************************/

 class uploadImg extends uploadFile {

	public $mark_str = 'kickflip@php100';  //姘村嵃瀛楃涓?	public $str_r = 0; //瀛楃涓查鑹睷
	public $str_g = 0; //瀛楃涓查鑹睾
	public $str_b = 0; //瀛楃涓查鑹睟
	public $mark_ttf = './upload/SIMSUN.TTC'; //姘村嵃鏂囧瓧瀛椾綋鏂囦欢(鍖呭惈璺缎)
	public $mark_logo = './upload/logo.png';    //姘村嵃锲剧墖
	public $resize_h;//鐢熸垚缂╃暐锲鹃佩
	public $resize_w;//鐢熸垚缂╃暐锲惧
	public $source_img;//婧愬浘鐗囨枃浠?	public $dst_path = './upload/';//缂╃暐锲炬枃浠跺瓨鏀剧洰褰曪紝涓嶅～鍒欎负婧愬浘鐗囧瓨鏀剧洰褰?
	/**
	 * 鐢熸垚缂╃暐锲?鐢熸垚鍚庣殑锲?	 * @access public
	 * @param integer $w 缂╁皬鍚庡浘鐗囩殑瀹斤纸px锛?	 * @param integer $h 缂╁皬鍚庡浘鐗囩殑楂桡纸px锛?	 * @param string $source_img 婧愬浘鐗?璺缎+鏂囦欢鍚?
	 */
	public function img_resized($w,$h,$source_img = NULL){
		$source_img = $source_img == NULL ? $this->uploaded : $source_img;//鍙栧缑婧愭枃浠剁殑鍦板潃锛屽鏋滀负绌哄垯榛樿涓轰笂娆′笂浼犵殑锲剧墖
		if(!is_file($source_img)) { //妫€镆ユ簮锲剧墖鏄惁瀛桦湪
			$this->errmsg = '鏂囦欢'.$source_img.'涓嶅瓨鍦?;
			return FALSE;
		}
		$this->source_img = $source_img;
		$img_info = getimagesize($source_img);
		$source = $this->img_create($source_img); //鍒涘缓婧愬浘鐗?		$this->resize_w = $w;
		$this->resize_h = $h;
		$thumb = imagecreatetruecolor($w,$h);
		imagecopyresized($thumb,$source,0,0,0,0,$w,$h,$img_info[0],$img_info[1]);//鐢熸垚缂╃暐锲剧墖
		$dst_path = $this->dst_path == '' ? $this->save_path : $this->dst_path; //鍙栧缑鐩爣鏂囦欢澶硅矾寰?		$dst_path = (preg_match('/\/$/',$dst_path)) ? $dst_path : $dst_path . '/';//灏嗙洰镙囨枃浠跺す鍚庡姞涓?
		if(!is_dir($dst_path)) $this->set_dir($dst_path); //濡傛灉涓嶅瓨鍦ㄧ洰镙囨枃浠跺す鍒椤垱寤?		$dst_name = $this->set_newname($source_img);
		$this->img_output($thumb,$dst_name);//杈揿嚭锲剧墖
		imagedestroy($source);
		imagedestroy($thumb);
	}

	/**
	 *镓撴按鍗?	 *@access public
	 *@param string $source_img 婧愬浘鐗囱矾寰?鏂囦欢鍚?	 *@param integer $mark_type 姘村嵃绫诲瀷(1涓鸿嫳鏂囧瓧绗︿覆锛?涓轰腑鏂囧瓧绗︿覆锛?涓哄浘鐗噇ogo,榛樿涓鸿嫳鏂囧瓧绗︿覆)
	 *@param integer $mark_postion 姘村嵃浣岖疆(1涓哄乏涓嬭,2涓哄彸涓嬭,3涓哄乏涓婅,4涓哄彸涓婅,榛樿涓哄彸涓嬭);
	 *@return 镓扑笂姘村嵃镄勫浘鐗?	 */
	public function img_mark($source_img = NULL,$mark_type = 1,$mark_postion = 2) {
		$source_img = $source_img == NULL ? $this->uploaded : $source_img;//鍙栧缑婧愭枃浠剁殑鍦板潃锛屽鏋滀负绌哄垯榛樿涓轰笂娆′笂浼犵殑锲剧墖
		if(!is_file($source_img)) { //妫€镆ユ簮锲剧墖鏄惁瀛桦湪
			$this->errmsg = '鏂囦欢'.$source_img.'涓嶅瓨鍦?;
			return FALSE;
		}
		$this->source_img = $source_img;
		$img_info = getimagesize($source_img);
		$source = $this->img_create($source_img); //鍒涘缓婧愬浘鐗?		$mark_xy = $this->get_mark_xy($mark_postion);//鍙栧缑姘村嵃浣岖疆
		$mark_color = imagecolorallocate($source,$this->str_r,$this->str_g,$this->str_b);

		switch($mark_type) {

			case 1 : //锷犺嫳鏂囧瓧绗︿覆姘村嵃
			$str = $this->mark_str;
			imagestring($source,5,$mark_xy[0],$mark_xy[1],$str,$mark_color);
			$this->img_output($source,$source_img);
			break;

            case 2 : //锷犱腑鏂囧瓧绗︿覆姘村嵃
            if(!is_file($this->mark_ttf)) { //妫€镆ュ瓧浣撴枃浠舵槸鍚﹀瓨鍦?				$this->errmsg = '镓撴按鍗板け璐ワ细瀛椾綋鏂囦欢'.$this->mark_ttf.'涓嶅瓨鍦?';
			return FALSE;
			}
			$str = $this->mark_str;
			//$str = iconv('gbk','utf-8',$str);//杞崲瀛楃缂栫爜 濡傛灉浣跨敤GBK缂栫爜璇峰幓鎺夋琛屾敞閲?			imagettftext($source,12,0,$mark_xy[2],$mark_xy[3],$mark_color,$this->mark_ttf,$str);
			$this->img_output($source,$source_img);
			break;

			case 3 : //锷犲浘鐗囨按鍗?			if(is_file($this->mark_logo)){  //濡傛灉瀛桦湪姘村嵃logo镄勫浘鐗囧垯鍙栧缑logo锲剧墖镄勫熀链俊鎭?涓嶅瓨鍦ㄥ垯阃€鍑?				$logo_info = getimagesize($this->mark_logo);
			}else{
				$this->errmsg = '镓撴按鍗板け璐ワ细logo鏂囦欢'.$this->mark_logo.'涓嶅瓨鍦紒';
				return FALSE;
			}

			$logo_info = getimagesize($this->mark_logo);
			if($logo_info[0]>$img_info[0] || $logo_info[1]>$img_info[1]) { //濡傛灉婧愬浘鐗囧皬浜巐ogo澶у皬鍒欓€€鍑?				$this->errmsg = '镓撴按鍗板け璐ワ细婧愬浘鐗?.$this->source_img.'姣?.$this->mark_logo.'灏忥紒';
				return FALSE;
			}

			$logo = $this->img_create($this->mark_logo);
			imagecopy ( $source, $logo, $mark_xy[4], $mark_xy[5], 0, 0, $logo_info[0], $logo_info[1]);
			$this->img_output($source,$source_img);
			break;

			default: //鍏跺畠鍒欎负鏂囧瓧锲剧墖
			$str = $this->mark_str;
			imagestring($source,5,$mark_xy[0],$mark_xy[1],$str,$mark_color);
			$this->img_output($source,$source_img);
			break;
		}
		imagedestroy($source);
	}

	/**
	 * 鍙栧缑姘村嵃浣岖疆
	 * @access private
	 * @param integer $mark_postion 姘村嵃镄勪綅缃?1涓哄乏涓嬭,2涓哄彸涓嬭,3涓哄乏涓婅,4涓哄彸涓婅,鍏跺畠涓哄彸涓嬭)
	 * @return array $mark_xy 姘村嵃浣岖疆镄勫潗镙?绱㈠紩0涓鸿嫳鏂囧瓧绗︿覆姘村嵃鍧愭爣X,绱㈠紩1涓鸿嫳鏂囧瓧绗︿覆姘村嵃鍧愭爣Y锛?	 * 绱㈠紩2涓轰腑鏂囧瓧绗︿覆姘村嵃鍧愭爣X锛岀储寮?涓轰腑鏂囧瓧绗︿覆姘村嵃鍧愭爣Y,绱㈠紩4涓烘按鍗板浘鐗囧潗镙嘪锛岀储寮?涓烘按鍗板浘鐗囧潗镙嘫)
	 */
	private function get_mark_xy($mark_postion){
		$img_info = getimagesize($this->source_img);

		$stre_w = strlen($this->mark_str)*9+5 ; //姘村嵃鑻辨枃瀛楃涓茬殑闀垮害(px)(5鍙峰瓧镄勮嫳鏂囧瓧绗﹀ぇ灏忕害涓?px 涓轰简缇庤鍐嶅姞5px)
		//(12鍙峰瓧镄勪腑鏂囧瓧绗﹀ぇ灏忎负12px,鍦╱tf8閲屼竴涓眽瀛楅昵搴︿负3涓瓧鑺备竴涓瓧鑺?px 钥屼竴涓嫳鏂囧瓧绗﹂昵搴︿竴涓瓧鑺傚ぇ灏忓ぇ绾︿负9px
		// 涓轰简鍦ㄤ腑鑻辨枃娣峰悎镄勬儏鍐典笅鏄剧ず瀹屽叏 璁惧畠镄勯昵搴︿负瀛楄妭鏁?7px)
		$strc_w = strlen($this->mark_str)*7+5 ; //姘村嵃涓枃瀛楃涓茬殑闀垮害(px)

		if(is_file($this->mark_logo)){ //濡傛灉瀛桦湪姘村嵃logo镄勫浘鐗囧垯鍙栧缑logo锲剧墖镄勫熀链俊鎭?			$logo_info = getimagesize($this->mark_logo);
		}

		//鐢变簬imagestring鍑芥暟鍜宨magettftext鍑芥暟涓浜庡瓧绗︿覆寮€濮嬩綅缃笉鍚屾墍浠ヨ嫳鏂囧拰涓枃瀛楃涓茬殑Y浣岖疆涔熸湁镓€涓嶅悓
		//imagestring鍑芥暟鏄粠鏂囧瓧镄勫乏涓婅涓哄弬镦?imagettftext鍑芥暟鏄粠鏂囧瓧宸︿笅瑙掍负鍙傜収
		switch($mark_postion){

			case 1: //浣岖疆宸︿笅瑙?			$mark_xy[0] = 5; //姘村嵃鑻辨枃瀛楃涓插潗镙嘪
			$mark_xy[1] = $img_info[1]-20;//姘村嵃鑻辨枃瀛楃涓插潗镙嘫
			$mark_xy[2] = 5; //姘村嵃涓枃瀛楃涓插潗镙嘪
			$mark_xy[3] = $img_info[1]-5;//姘村嵃涓枃瀛楃涓插潗镙嘫
			$mark_xy[4] = 5;//姘村嵃锲剧墖鍧愭爣X
			$mark_xy[5] = $img_info[1]-$logo_info[1]-5;//姘村嵃锲剧墖鍧愭爣Y
			break;

			case 2: //浣岖疆鍙充笅瑙?			$mark_xy[0] = $img_info[0]-$stre_w; //姘村嵃鑻辨枃瀛楃涓插潗镙嘪
			$mark_xy[1] = $img_info[1]-20;//姘村嵃鑻辨枃瀛楃涓插潗镙嘫
			$mark_xy[2] = $img_info[0]-$strc_w; //姘村嵃涓枃瀛楃涓插潗镙嘪
			$mark_xy[3] = $img_info[1]-5;//姘村嵃涓枃瀛楃涓插潗镙嘫
			$mark_xy[4] = $img_info[0]-$logo_info[0]-5;//姘村嵃锲剧墖鍧愭爣X
			$mark_xy[5] = $img_info[1]-$logo_info[1]-5;//姘村嵃锲剧墖鍧愭爣Y
			break;

			case 3: //浣岖疆宸︿笂瑙?			$mark_xy[0] = 5; //姘村嵃鑻辨枃瀛楃涓插潗镙嘪
			$mark_xy[1] = 5;//姘村嵃鑻辨枃瀛楃涓插潗镙嘫
			$mark_xy[2] = 5; //姘村嵃涓枃瀛楃涓插潗镙嘪
			$mark_xy[3] = 15;//姘村嵃涓枃瀛楃涓插潗镙嘫
			$mark_xy[4] = 5;//姘村嵃锲剧墖鍧愭爣X
			$mark_xy[5] = 5;//姘村嵃锲剧墖鍧愭爣Y
			break;

			case 4: //浣岖疆鍙充笂瑙?			$mark_xy[0] = $img_info[0]-$stre_w; //姘村嵃鑻辨枃瀛楃涓插潗镙嘪
			$mark_xy[1] = 5;//姘村嵃鑻辨枃瀛楃涓插潗镙嘫
			$mark_xy[2] = $img_info[0]-$strc_w; //姘村嵃涓枃瀛楃涓插潗镙嘪
			$mark_xy[3] = 15;//姘村嵃涓枃瀛楃涓插潗镙嘫
			$mark_xy[4] = $img_info[0]-$logo_info[0]-5;//姘村嵃锲剧墖鍧愭爣X
			$mark_xy[5] = 5;//姘村嵃锲剧墖鍧愭爣Y
			break;

			default : //鍏跺畠榛樿涓哄彸涓嬭
			$mark_xy[0] = $img_info[0]-$stre_w; //姘村嵃鑻辨枃瀛楃涓插潗镙嘪
			$mark_xy[1] = $img_info[1]-5;//姘村嵃鑻辨枃瀛楃涓插潗镙嘫
			$mark_xy[2] = $img_info[0]-$strc_w; //姘村嵃涓枃瀛楃涓插潗镙嘪
			$mark_xy[3] = $img_info[1]-15;//姘村嵃涓枃瀛楃涓插潗镙嘫
			$mark_xy[4] = $img_info[0]-$logo_info[0]-5;//姘村嵃锲剧墖鍧愭爣X
			$mark_xy[5] = $img_info[1]-$logo_info[1]-5;//姘村嵃锲剧墖鍧愭爣Y
			break;
		}
		return $mark_xy;
	}

	/**
	 * 鍒涘缓婧愬浘鐗?	 * @access private
	 * @param string $source_img 婧愬浘鐗?璺缎+鏂囦欢鍚?
	 * @return img 浠庣洰镙囨枃浠舵柊寤虹殑锲惧儚
	 */
	private function img_create($source_img) {
		$info = getimagesize($source_img);
		switch ($info[2]){
            case 1:
            if(!function_exists('imagecreatefromgif')){
            	$source = @imagecreatefromjpeg($source_img);
            }else{
            	$source = @imagecreatefromgif($source_img);
            }
            break;
            case 2:
            $source = @imagecreatefromjpeg($source_img);
            break;
            case 3:
            $source = @imagecreatefrompng($source_img);
            break;
            case 6:
            $source = @imagecreatefromwbmp($source_img);
            break;
            default:
			$source = FALSE;
			break;
        }
		return $source;
	}

 /**
  * 閲嶅懡鍚嶅浘鐗?  * @access private
  * @param string $source_img 婧愬浘鐗囱矾寰?鏂囦欢鍚?  * @return string $dst_name 閲嶅懡鍚嶅悗镄勫浘鐗囧悕(璺缎+鏂囦欢鍚?
  */
 private function set_newname($sourse_img) {
 	$info = pathinfo($sourse_img);
 	$new_name = $this->resize_w.'_'.$this->resize_h.'_'.$info['basename'];//灏嗘枃浠跺悕淇敼涓猴细瀹絖楂榑鏂囦欢鍚? 	if($this->dst_path == ''){ //濡傛灉瀛樻斁缂╃暐锲捐矾寰勪负绌哄垯榛樿涓烘簮鏂囦欢鍚屾枃浠跺す
 		$dst_name = str_replace($info['basename'],$new_name,$sourse_img);
 	}else{
 		$dst_name = $this->dst_path.$new_name;
 	}
 	return $dst_name;
 }

 /**
  * 杈揿嚭锲剧墖
  * @access private
  * @param $im 澶勭悊鍚庣殑锲剧墖
  * @param $dst_name 杈揿嚭鍚庣殑镄勫浘鐗囧悕(璺缎+鏂囦欢鍚?
  * @return 杈揿嚭锲剧墖
  */
 public function img_output($im,$dst_name) {
 	$info = getimagesize($this->source_img);
 	switch ($info[2]){
            case 1:
            if(!function_exists('imagegif')){
            	imagejpeg($im,$dst_name);
            }else{
            	imagegif($im, $dst_name);
            }
            break;
            case 2:
            imagejpeg($im,$dst_name);
            break;
            case 3:
            imagepng($im,$dst_name);
            break;
            case 6:
            imagewbmp($im,$dst_name);
            break;
        }
 }

 }
?>


