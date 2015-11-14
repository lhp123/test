<?php
/*放入  /include/db 目录下*/
ini_set('display_errors', false);
include_once('config.php');
include_once('DBCON.php');
mysql_query("set names 'gb2312'");
function execute($sql){

	global $conn;

	$stmt=mysql_query($sql,$conn);

	return $stmt;

}

function IndexOf($str,$c){

	if(count(explode($str,$c))<=0){

    	return false;

    }

    return true;

}
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
	$value=get_utf8(mysql_real_escape_string(get_gbk($value)));
	$value=htmlentities($value,ENT_COMPAT,"UTF-8");
	return $value;
}
/*
* 过滤带中文的变量
 *
 * @param unknown_type $value
 * @return unknown
 */
function filterParaByName($paraname){
	$value=$_REQUEST[$paraname];
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
	$value=mysql_real_escape_string($value);
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
	$value=$_REQUEST[$paraname];
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
	$value=mysql_real_escape_string($value);
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
	$value=$_REQUEST[$paraname];
	$value=filterParaNumber($value);
	return $value;
}

?>