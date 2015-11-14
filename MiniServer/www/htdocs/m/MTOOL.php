<?
/*mobile Function*/
 //include_once('../eall/DBCON_YD.php');
 include_once('../include/db/DBCON_YD_QJ.php');
function p_gbk($str){
	echo iconv('utf-8', 'GBK', $str);
}
function p_utf8($str){
	echo iconv('GBK//TRANSLIT', 'utf-8//TRANSLIT', $str);
}
function get_gbk($str){
	return iconv('utf-8', 'GBK', $str);
}
function get_utf8($str){
	return iconv('GBK', 'utf-8', $str);
}
function  getIndexImage($wz="",$conn){
	$sql = "select * from XT_PHOTO where sywz='".$wz."' and type='图片' limit 0,1";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs = mysql_fetch_array($stmt);
	$str ="<img src='".$rs["SRC"]."' width='100%' id='bgimg'/>";
	return $str;
}
?>