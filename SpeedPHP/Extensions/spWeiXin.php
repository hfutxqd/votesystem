<?php
/**
 * <b>SpeedPHP寰俊鎺ュ彛镓╁睍</b>
 * <p>2013骞?链?5镞?08:51:23</p>
 * @author Lee(leeldy[AT]163.com)
 * @version 1.0
 */
class spWeiXin {
 
    //寰俊阃氢俊瀵嗛挜
    private $token;
    //寰俊鍏紬甯愬佛ID
    private $publicuserid;
    //淇℃伅鎺ュ弹钥?
    private $touserid;
 
    public function __construct() {
        $params = spExt('spWeiXin');
        //銮峰彇閰岖疆鍙傛暟
        if (empty($params['TOKEN'])) {
            spError('寰俊鍏紬甯愬佛阃氢俊瀵嗛挜链缃紒');
        }
        $this->token = $params['TOKEN'];
    }
 
    /**
     * 缁戝畾寰俊鎺ュ彛
     * @return string|false
     */
    public function bind() {
 
        //闅忔満瀛楃涓?
        $echoStr = $_GET["echostr"];
        //寰俊锷犲瘑绛惧悕
        $signature = $_GET["signature"];
        //绛惧悕镞堕棿鎴?
        $timestamp = $_GET["timestamp"];
        //锷犲瘑闅忔満鏁?
        $nonce = $_GET["nonce"];
 
        /*
         * 锷犲瘑/镙￠獙娴佺▼锛?
          1. 灏唗oken銆乼imestamp銆乶once涓変釜鍙傛暟杩涜瀛楀吀搴忔帓搴?
          2. 灏嗕笁涓弬鏁板瓧绗︿覆鎷兼帴鎴愪竴涓瓧绗︿覆杩涜sha1锷犲瘑
          3. 寮€鍙戣€呰幏寰楀姞瀵嗗悗镄勫瓧绗︿覆鍙笌signature瀵规瘮锛屾爣璇呜璇锋眰鏉ユ簮浜庡井淇?
         */
        $tmpArr = array($this->token, $timestamp, $nonce);
        sort($tmpArr);
        $_signature = sha1(implode($tmpArr));
 
        if ($_signature != $signature) {
            //绛惧悕涓嶆纭紝杩斿洖false
            $echoStr = false;
        }
 
        return $echoStr;
    }
 
    /**
     * 鎺ユ敹娑堟伅锛岃繑锲炴秷鎭暟缁?
     * @return array
     */
    public function receive() {
        $raw = $this->php_fix_raw_query();
        $msg = false;
        if (!empty($raw)) {
            $msg = (array) simplexml_load_string($GLOBALS['HTTP_RAW_POST_DATA'], 'SimpleXMLElement', LIBXML_NOCDATA);
            $this->publicuserid = $msg['ToUserName'];
            $this->touserid = $msg['FromUserName'];
        }
 
        return $msg;
    }
 
    /**
     * 銮峰彇 POST 鎻愪氦镄勫师濮嬫暟鎹?
     * @author robotreply at gmail dot com (24-Jul-2009 08:17)
     * @return string
     */
    private function php_fix_raw_query() {
 
        // Try globals array
        //璇曞浘浠庡叏灞€鍙橀噺涓幏鍙?
        if (isset($GLOBALS["HTTP_RAW_POST_DATA"])) {
            return $GLOBALS["HTTP_RAW_POST_DATA"];
        }
        // Try globals variable
        //璇曞浘浠庡叏灞€鍙橀噺涓幏鍙?
        if (isset($HTTP_RAW_POST_DATA)) {
            return $HTTP_RAW_POST_DATA;
        }
 
        $post = '';
        // Try stream
        //璇曞浘浠庢祦涓幏鍙?
        if (!function_exists('file_get_contents')) {
            //php://input is not available with enctype="multipart/form-data".
            $fp = fopen("php://input", "r");
            if ($fp) {
                while (!feof($fp)) {
                    $post = fread($fp, 1024);
                }
 
                fclose($fp);
            }
        } else {
            $post = file_get_contents("php://input");
        }
 
        return $post;
    }
 
    /**
     * <b>锲炲鏂囨湰娑堟伅</b>
     * <p>瀵逛簬姣忎竴涓狿OST璇锋眰锛屽紑鍙戣€呭湪鍝嶅簲鍖呬腑杩斿洖鐗瑰畾xml缁撴瀯</p>
     * <p>瀵硅娑堟伅杩涜鍝嶅簲锛堢幇鏀寔锲炲鏂囨湰銆佸浘鏂囥€佽阔炽€佽棰戙€侀煶涔愬拰瀵规敹鍒扮殑娑堟伅杩涜鏄熸爣鎿崭綔锛?/p>
     * <p>寰俊链嶅姟鍣ㄥ湪浜旗鍐呮敹涓嶅埌鍝嶅簲浼氭柇鎺夎繛鎺ャ€?/p>
     * @param string $Content  锲炲镄勬秷鎭唴瀹?
     * @return string|false
     */
    public function replyText($Content) {
        $msg = false;
 
        if (!empty($Content)) {
            //CreateTime     娑堟伅鍒涘缓镞堕棿
            $CreateTime = time();
 
            $msg = <<<XML
<xml>
    <ToUserName><![CDATA[{$this->touserid}]]></ToUserName>
    <FromUserName><![CDATA[{$this->publicuserid}]]></FromUserName>
    <CreateTime>{$CreateTime}</CreateTime>
    <MsgType><![CDATA[text]]></MsgType>
    <Content><![CDATA[{$Content}]]></Content>
</xml>
XML;
        }
 
        return $msg;
    }
 
    /**
     * <b>锲炲阔充箰娑堟伅</b>
     * @param string $Title 镙囬
     * @param string $Description 鎻忚堪
     * @param string $MusicUrl 阔充箰阈炬帴
     * @param string $HQMusicUrl 楂樿川閲忛煶涔愰摼鎺ワ紝WIFI鐜浼桦厛浣跨敤璇ラ摼鎺ユ挱鏀鹃煶涔?
     * @return string|false
     */
    public function replyMusic($Title, $Description, $MusicUrl, $HQMusicUrl) {
        $msg = false;
 
        if (!empty($MusicUrl)) {
            //CreateTime     娑堟伅鍒涘缓镞堕棿
            $CreateTime = time();
 
            $msg = <<<XML
<xml>
    <ToUserName><![CDATA[{$this->touserid}]]></ToUserName>
    <FromUserName><![CDATA[{$this->publicuserid}]]></FromUserName>
    <CreateTime>{$CreateTime}</CreateTime>
    <MsgType><![CDATA[music]]></MsgType>
    <Music>
        <Title><![CDATA[{$Title}]]></Title>
        <Description><![CDATA[{$Description}]]></Description>
        <MusicUrl><![CDATA[{$MusicUrl}]]></MusicUrl>
        <HQMusicUrl><![CDATA[{$HQMusicUrl}]]></HQMusicUrl>
    </Music>
</xml>
XML;
        }
 
        return $msg;
    }
 
    /**
     * 锲炲锲炬枃娑堟伅
     * @param type $Articles 鏂囩珷鍒楄〃 array(array(Title,PicUrl,Url))
     * @return string|false
     */
    public function replyNews($Articles) {
        $msg = false;
 
        $articlesStr = '';
        //锲炬枃娑堟伅涓暟锛岄檺鍒朵负10鏉′互鍐?
        $ArticleCount = 0;
        foreach ($Articles as $_art) {
            if (!empty($_art['Title']) && !empty($_art['PicUrl']) && !empty($_art['Url'])) {
                $ArticleCount++;
                $articlesStr .= "
    <item>
        <Title><![CDATA[{$_art['Title']}]]></Title>
        <Description><![CDATA[{$_art['Description']}]]></Description>
        <PicUrl><![CDATA[{$_art['PicUrl']}]]></PicUrl>
        <Url><![CDATA[{$_art['Url']}]]></Url>
    </item>";
            }
        }
 
        if (!empty($ArticleCount)) {
            //CreateTime     娑堟伅鍒涘缓镞堕棿
            $CreateTime = time();
 
            $msg = <<<XML
<xml>
    <ToUserName><![CDATA[{$this->touserid}]]></ToUserName>
    <FromUserName><![CDATA[{$this->publicuserid}]]></FromUserName>
    <CreateTime>{$CreateTime}</CreateTime>
    <MsgType><![CDATA[news]]></MsgType>
    <ArticleCount>{$ArticleCount}</ArticleCount>
    <Articles>{$articlesStr}
    </Articles>
</xml>
XML;
        }
 
        return $msg;
    }
 
    /**
     * 杩愯
     * @return type
     */
    function run() {
        //寰俊链嶅姟鍣ㄦ疮娆¤姹傞兘浼氩皢signature,timestamp,nonce涓変釜鍙傛暟GET鍒版帴鍙?
        //鍙兘阃氲绷鏄惁瀛桦湪echostr鏉ュ垽鏂槸鍚︽槸鎺ュ彛缁戝畾锷ㄤ綔
        if (isset($_GET['echostr'])) {
            //缁戝畾
            exit($this->bind());
        } else {
            //鏀跺埌淇℃伅
            return $this->receive();
        }
    }
 
}
 
?>