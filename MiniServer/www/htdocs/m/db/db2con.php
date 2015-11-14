<?php
global $conn;
$conn=mysql_connect(DB_IP,DB_USERNAME,DB_PASSWORD) or die("不能连接数据库服务器： ".mysql_error()); 
mysql_select_db(DB_DATABASE,$conn) or die ("不能选择数据库: ".mysql_error()); 
mysql_query("set names 'utf8'");
?>