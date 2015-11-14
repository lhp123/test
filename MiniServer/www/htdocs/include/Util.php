<?php 
require_once 'Filter.php';
require_once 'DML.php';


?>
<?php
/**
 * 多城市url
 * @param unknown_type $url
 * @return unknown|string
 */
function changeUrl($url=""){
	$CITYURL=$GLOBALS["CITYURL"];
	if($CITYURL==""){
		return $url;
	}else {
		return "/".$CITYURL.$url;
	}

}
/**
 * 通过JS方式跳转页面
 * @param unknown_type $url
 */
function headerJs($url){
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='".$url."'";
	echo "</script>";
}

/**
 * 为从数据库中读取的带图片的字段提供的方法
 * 区分从erp同步的http://和网站上传/netup/
 * @param unknown_type $url
 * @return unknown
 */
function getPhoto($url){

	$searchStr = trim(strtolower($url));
	if(strpos($searchStr, "http://")===false){
		return changeUrl($url);
	}
	return $url;
}

/**
 * utf-8中文截取
 * 
 * @param unknown_type $sourcestr        	
 * @param unknown_type $cutlength        	
 * @return string
 */
function cut_str($sourcestr, $cutlength,$ifsl=true) {
	$returnstr = '';
	$i = 0;
	$n = 0;
	$str_length = strlen ( $sourcestr ); // 字符串的字节数
	while ( ($n < $cutlength) and ($i <= $str_length) ) {
		$temp_str = substr ( $sourcestr, $i, 1 );
		$ascnum = Ord ( $temp_str ); // 得到字符串中第$i位字符的ascii码
		if ($ascnum >= 224) { // 如果ASCII位高与224，
			$returnstr = $returnstr . substr ( $sourcestr, $i, 3 ); // 根据UTF-8编码规范，将3个连续的字符计为单个字符
			$i = $i + 3; // 实际Byte计为3
			$n ++; // 字串长度计1
		} elseif ($ascnum >= 192) { // 如果ASCII位高与192，
			$returnstr = $returnstr . substr ( $sourcestr, $i, 2 ); // 根据UTF-8编码规范，将2个连续的字符计为单个字符
			$i = $i + 2; // 实际Byte计为2
			$n ++; // 字串长度计1
		} elseif ($ascnum >= 65 && $ascnum <= 90) { // 如果是大写字母，
			
			
			$returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
			$i = $i + 1; // 实际的Byte数仍计1个
			$n ++; // 但考虑整体美观，大写字母计成一个高位字符
		
			
		} elseif($ascnum==38){ //匹配 "&"
			$str =  substr ( $sourcestr, $i, 10 );
			$pattern = "/&#?\w+;/"; //匹配转义字符
			$arr = array();
			preg_match($pattern, $str,$arr);
			$returnstr = $returnstr . $arr[0];
					
			$i = $i + strlen($arr[0]); // 实际的Byte数
			$n = $n+1; // 但考虑整体美观，大写字母计成一个高位字符
		}else{// 其他情况下，包括小写字母和半角标点符号，
			$returnstr = $returnstr . substr ( $sourcestr, $i, 1 );
			$i = $i + 1; // 实际的Byte数计1个
			$n = $n + 1; // 小写字母和半角标点等与半个高位字符宽...
					
		}
	}
	if ($str_length > $i) {
		if($ifsl){
			$returnstr = $returnstr . "..."; // 超过长度时在尾处加上省略号
		}		
	}
	return $returnstr;
}


/**
 * 根据经纪人id得到其出售/出租或者全部房源数目
 *
 * @param unknown_type $conn        	
 * @param unknown_type $CID        	
 * @param unknown_type $userid        	
 * @param unknown_type $type        	
 * @return unknown
 */
function getSameUserCount($conn, $CID, $userid, $type) {
	if ($type == "") {
		$msql = "select count(1) as C from FY where USERID='" . $userid . "'  and CID = '" . $CID . "' AND IFDELETED=0 and IF_SHOW=1";
	} else {
		$msql = "select count(1) as C from FY where USERID='" . $userid . "' and TYPE = '" . $type . "' and CID = '" . $CID . "' AND IFDELETED=0 and IF_SHOW=1";
	}
	
	$mstmt = mysql_query ( $msql, $conn );
	$mrs = mysql_fetch_array ( $mstmt );
	return $mrs ["C"];
}

/**
 * 得到高/中/低楼层
 * 
 * @param unknown_type $totle        	
 * @param unknown_type $current        	
 * @return string
 */
function getFloor($totle, $current) {
	if ($totle == "" || $totle == "0") {
		return $current . "层";
	} elseif ($current / $totle > 2 / 3) {
		return "高层楼";
	} elseif ($current / $totle < 1 / 3) {
		return "低层楼";
	} else {
		return "中层楼";
	}
}

/**
 * 得到每平米均价
 *
 * @param unknown_type $prcie        	
 * @param unknown_type $area        	
 * @param unknown_type $type        	
 * @return string
 */
function getUnitPrice($prcie, $area, $type) {
	if ($type == "出售") {
		$result = $prcie / $area * 10000;
	} else {
		$result = $prcie / $area;
	}
	return round ( $result, 1 ) . "元/平米";
}

/**
 * 根据$type得到房源价格
 * 
 * @param unknown_type $price        	
 * @param unknown_type $type        	
 * @return string
 */
function getPrice($price, $type) {
	if ($type == "出售") {
		return round ( $price, 2 ) . "万";
	} else {
		if ($price > 10000) {
			return round ( $price / 10000, 2 ) . "万";
		}
		
		return round ( $price ) . "元";
	}
}

/**
 * 根据小区$disid得到小区待出售/出租或者全部的 房源数目
 *
 * @param unknown_type $disid        	
 * @param unknown_type $type        	
 * @param unknown_type $cid        	
 * @param unknown_type $conn        	
 * @return unknown
 */
function getFyCountByDistrict($disid, $type, $cid, $conn) {
	if ($type == "") {
		$sql = "select count(*) num from FY where CID='" . $cid . "' and IF_SHOW = 1 AND IFDELETED = 0 AND DISID='" . $disid . "'";
	} else {
		$sql = "select count(*) num from FY where CID='" . $cid . "' and TYPE='" . $type . "' and IF_SHOW = 1 AND IFDELETED = 0 AND DISID='" . $disid . "'";
	}
	// echo $sql;
	$stmt = mysql_query ( $sql, $conn );
	$rs = mysql_fetch_array ( $stmt );
	return $rs ["num"];
}




/**
 * 获得小区环比升降值，正代表升，负代表降
 * 
 * @param unknown_type $last        	
 * @param unknown_type $curent        	
 * @return string number
 */
function getXqHuanBiPer($last, $curent) {
	if ($last == "" || $last == 0) {
		return "-";
	}
	$val=($curent - $last) / $last * 100;
	return round($val,2);
}


/**
 * 格式化数字 。按数字本身的小数位显示，最多显示2位小数，小于2位不补0。
 * 
 * @param float $number        	
 * @return string
 */
function numberFormatBySelf($number) {
	$pointLen = 0;
	$remainder = $number * 100 % 100;
	if ($remainder == 0) {
		$pointLen = 0;
	} else if ($remainder > 10) {
		if ($remainder % 10 == 0) {
			$pointLen = 1;
		} else if ($remainder % 10 > 0) {
			$pointLen = 2;
		}
	} else {
		$pointLen = 2;
	}
	$number_=number_format ( $number, $pointLen );
	$number_=explode(",", $number_);
	$number_=implode("", $number_);
	return $number_;
}

/**
 * 获取客户足迹
 * @param unknown_type $fyid
 * @param unknown_type $type
 * @param unknown_type $cid
 * @param unknown_type $conn
 * @return Ambigous <>
 */
function getKfzj($fyid,$type,$cid,$conn) {
	$sql = "select count(1) from FY_DK where CID='".$cid."' AND TYPE='".$type."' AND FK_FYID='".$fyid."'";
	$stmt = mysql_query ( $sql, $conn );
	$rs=mysql_fetch_array($stmt);
	return $rs[0];
}





/**
 * 修改排序图片
 * @param unknown_type $curordern
 * @param unknown_type $ordern
 * @param unknown_type $ordert
 * @param unknown_type $pxdef
 */
function changePxImg($curordern,$ordern,$ordert,$pxdef="pxdef"){
	if($ordern==$curordern){
		if($ordert=="up"){
			echo "pxup";
		}else if($ordert=="down"){
			echo "pxdown";
		}else{
			echo $pxdef;
		}
	}else{
		echo $pxdef;
	}
}
/**
 * 修改排序顺序
 * @param unknown_type $curordern
 * @param unknown_type $ordern
 * @param unknown_type $ordert
 * @param unknown_type $pxdef
 */
function changePxType($curordern,$ordern,$ordert,$pxdef="down"){
	if($ordern==$curordern){
		if($ordert=="up"){
			echo "down";
		}else if($ordert=="down"){
			echo "up";
		}else{
			echo $pxdef;
		}
	}else{
		echo $pxdef;
	}
}
/**
 * 显示力图片字符串中的第一张图片
 * @param unknown_type $snt
 * @param unknown_type $fxt
 * @param unknown_type $zwPic 默认显示，如果图片字符串为空则显示此图
 * @return unknown|Ambigous <>
 */
function getPicWithFirst($snt,$fxt,$zwPic){
	$photo=$snt;
	if($snt!="") $photo.=";";
	$photo.=$fxt;
	$p=explode(";",$photo);
	if($p[0]=="") 
		return $zwPic;
	else 
		return $p[0];
}
/**
 * 显示图片字符串中的所有图片，返回数组，每个数组元素为一张图片链接
 * @param unknown_type $snt
 * @param unknown_type $fxt
 * @return multitype:
 */
function getPicsWithAll($snt,$fxt){
	$photo=$snt;
	if($snt!="") $photo.=";";
	$photo.=$fxt;
	$p=explode(";",$photo);
	return $p;
}

/**
 * 判断数组是否为空
 * @param unknown_type $arr
 * @return boolean
 */
function isEmpty($arr){
	if($arr==null) return true;
	if(!is_array($arr)) return true;
	if(empty($arr)) return true;
	if(count($arr)<=0) return true;
	foreach($arr as $k=>$v){
		if($v!="") return false;
	}
	
	return true;
}
/**
 * 获取当前访问IP
 * @return unknown
 */
function getip(){
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$online_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
		$online_ip = $_SERVER['HTTP_CLIENT_IP'];
	}else{
		$online_ip = $_SERVER['REMOTE_ADDR'];
	}
	return $online_ip;
}

/**
 * 控制相同IP只能访问一次
 * 如果当前IP第一次访问，则会记录Cookie中并返回true；
 * 否则不再写入Cookie，并返回FALSE；
 * @param unknown_type $cookiename
 * @return boolean
 */
function checkipCookie($id,$cookiename="curip"){
// 	setcookie($cookiename."_".$id,time()-3600);
// 	echo $cookiename."_".$id."********".$_COOKIE[$cookiename."_".$id]."********".getip();
	if(!strpos( ";".$_COOKIE[$cookiename."_".$id].";",";".getip().";")){
		setcookie($cookiename."_".$id,$_COOKIE[$cookiename."_".$id].";".getip());
		return true;
	}
	return false;
}


/**
 * 控制相同城市相同IP只能访问一次
 * 如果当前IP第一次访问，则会记录Cookie中并返回true；
 * 否则不再写入Cookie，并返回FALSE；
 * @param unknown_type $cookiename
 * @return boolean
 */
function checkipCityCookie($id,$cityname,$cookiename="curip"){	
	if($cityname!=""||strpos($cityname, "市")) {
		require 'IpLocation.php';
		$ip=new IpLocation();
		$address=$ip->getaddress(getip());
// 		setcookie($cookiename."_".$id,time()-3600);
// 		echo $cookiename."_".$id."********".$_COOKIE[$cookiename."_".$id]."********".getip()."*********".$address["area1"]."==".$cityname;
		if($address["area1"]==$cityname && !strpos( ";".$_COOKIE[$cookiename."_".$id].";",";".getip().";")){			
			setcookie($cookiename."_".$id,$_COOKIE[$cookiename."_".$id].";".getip());
			return true;
		}
	}
	return false;
}

?>