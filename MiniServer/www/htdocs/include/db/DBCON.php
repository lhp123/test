<?php
global $conn;
$conn=mysql_connect(DB_IP,DB_USERNAME,DB_PASSWORD) or die("不能连接数据库服务器： ".mysql_error()); 
mysql_select_db(DB_DATABASE,$conn) or die ("不能选择数据库: ".mysql_error()); 
mysql_query("set names 'utf8'");


$sql="SELECT * FROM XT_COM WHERE ID='".$CID."'";
$result_company=mysql_query($sql,$conn);
if($row_company=mysql_fetch_array($result_company)){
	$COMPANYNAME=$row_company["CNAME"];
	$COMPANYJXNAME=$row_company["NAMEJX"];
	$COMADDRESS=$row_company["ADDRESS"];
	$COMTEL=$row_company["TEL"];
	$BEIAN=$row_company["BEIAN"];
	$BANQUAN=$row_company["BANQUAN"];
	$E_BANQUAN = $row_company["BANQUAN2"];
	$DOMAIN=$row_company["WZ"];
	$NTNAME=$row_company["TITLE"];
	$CITYNAME=$row_company["CITYNAME"];
}
?>