<?php 
session_start();
include_once 'db2.php';
$action=$_POST["action"];
if($action=="gettype"){
$sql="SELECT * FROM `sharetype_tab`";
$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
		$detail["id"]=$rs["id"];
		$detail["pid"]=$rs["pid"];
		$detail["name"]=get_utf8($rs["name"]);
		$data[]=$detail;	
	}
	if(count($data)>0){
				$arr["success"]=1;
				$arr["data"]=$data;
			}
			else{
				$arr["success"]=0;
				$arr["msg"]="没有数据！";
			}
	mysql_free_result($rs);
	echo json_encode($arr);
}




mysql_close($conn);
?>