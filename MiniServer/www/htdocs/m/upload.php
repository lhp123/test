<?php
$path = "uploads/";

$extArr = array("jpg", "png", "gif");

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_FILES['photoimg']['name'];
	$size = $_FILES['photoimg']['size'];
	//echo "90"+$name;
	if(empty($name)){
		echo '请选择要上传的图片';
		exit;
	}
	$ext = extend($name);
	if(!in_array($ext,$extArr)){
		echo '图片格式错误！';
		exit;
	}
	if($size>(1000*1024)){
		echo '图片大小不能超过100KB';
		exit;
	}
	$image_name = time().rand(10000,99999).".".$ext;
	$tmp = $_FILES['photoimg']['tmp_name'];
	if(move_uploaded_file($tmp, $path.$image_name)){
		echo json_encode(array("error"=>"0","pic"=> ($path.$image_name),"name"=>$image_name));
	}else{
		echo '上传出错了！';
	}
	exit;
}
exit;




function extend($file_name){
	$extend = pathinfo($file_name);
	$extend = strtolower($extend["extension"]);
	return $extend;
}
?>