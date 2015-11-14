<?php
/**
 * 过滤特殊字符
 *
 * @param unknown_type $value
 * @return unknown
 */
function filterSpecialChar($value){
	$value=str_replace("'","",$value);
	$value=str_replace("\"","",$value);
	$value=str_replace("(","",$value);
	$value=str_replace(")","",$value);
	$value=str_replace("?","",$value);
	$value=str_replace("<script","",$value);
	$value=str_replace("/script>","",$value);
	$value=str_replace("<","",$value);
	$value=str_replace(">","",$value);
	$value=str_replace("\\","",$value);
	return $value;
}
/**
 * 过滤带中文的变量
 *
 * @param unknown_type $value
 * @return unknown
 */
function filterPara($value){
	$value=filterSpecialChar($value);
	$value=stripslashes($value);
	$value=mysql_escape_string(iconv("utf-8", "gb2312", $value));
	$value = iconv("gb2312", "utf-8", $value);
	$value=htmlentities($value,ENT_COMPAT,"utf-8");
	//	$value=htmlspecialchars($value);
	return $value;
}
function filterPara1($value){
	$value=stripslashes($value);
	$value=mysql_escape_string(iconv("utf-8", "gb2312", $value));
	$value = iconv("gb2312", "utf-8", $value);
	$value=htmlentities($value,ENT_COMPAT,"utf-8");
	//	$value=htmlspecialchars($value);
	return $value;
}
/**
 * 过滤带中文的变量
 *
 * @param unknown_type $value
 * @return unknown
 */
function filterParaByName($paraname){
	$value=$_GET[$paraname];
	$value=$value==""?$_POST[$paraname]:$value;
	$value=filterPara($value);
	return $value;
}

/**
 * 过滤不带中文的变量
 *
 * @param unknown_type $value
 * @return unknown
 */
function filterParaAll($value){
	$value=filterSpecialChar($value);
	$value=stripslashes($value);
	$value=mysql_escape_string(iconv("utf-8", "gbk", $value));
	$value = iconv("gbk", "utf-8", $value);
	$value=htmlentities($value);
	$value=str_replace("?","",$value);
	return $value;
}
function filterParaAll1($value){
	$value=stripslashes($value);
	$value=mysql_escape_string(iconv("utf-8", "gbk", $value));
	$value = iconv("gbk", "utf-8", $value);
	$value=htmlentities($value);
	$value=str_replace("?","",$value);
	return $value;
}
/**
 * 过滤不带中文的变量
 *
 * @param unknown_type $value
 * @return unknown
 */
function filterParaAllByName($paraname){
	$value=$_GET[$paraname];
	$value=$value==""?$_POST[$paraname]:$value;
	$value=filterParaAll($value);
	return $value;
}


/**
 * 过滤数值型变量
 *
 * @param unknown_type $value
 * @return unknown
 */
function filterParaNumber($value){
	$value=filterSpecialChar($value);
	$value=stripslashes($value);
	$value=mysql_escape_string(iconv("utf-8", "gb2312", $value));
	$value = iconv("gb2312", "utf-8", $value);
	$value=htmlentities($value);
	$value=str_replace("?","",$value);
	if(is_numeric($value)) return $value;
	else return "";
}
function filterParaNumber1($value){
	$value=stripslashes($value);
	$value=mysql_escape_string(iconv("utf-8", "gbk", $value));
	$value = iconv("gbk", "utf-8", $value);
	$value=htmlentities($value);
	$value=str_replace("?","",$value);
	if(is_numeric($value)) return $value;
	else return "";
}
/**
 * 过滤数值型变量
 *
 * @param unknown_type $value
 * @return unknown
 */
function filterParaNumberByName($paraname){
	$value=$_GET[$paraname];
	$value=$value==""?$_POST[$paraname]:$value;
	$value=filterParaNumber($value);
	return $value;
}
/**
 * 过滤由在线编辑器编辑的文档
 * @param unknown_type $value
 * @return string
 */
function filterContents($value){
	$value=str_replace("'","‘",$value);
	$value=str_replace("\"","",$value);
	$value=str_replace("(","（",$value);
	$value=str_replace(")","）",$value);
	$value=str_replace("?","？",$value);
	$value=str_replace("<script","",$value);
	$value=str_replace("/script>","",$value);
	// 	$value=str_replace("<","&lt;",$value);
	// 	$value=str_replace(">","&gt;",$value);
	$value=str_replace("\\","",$value);
	$value=str_replace("%","％",$value);

	$value=stripslashes($value);
	// 	$value=mysql_real_escape_string($value);
	// 	$value=htmlentities($value,ENT_COMPAT,"utf-8");
	return $value;
}
?>