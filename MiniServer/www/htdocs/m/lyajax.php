<?php
include_once 'INCLUDE.php';
$act=$_POST['act'];
if($act=="saves"){
	$phone=stripslashes(trim($_POST["phone"]));
	$TEL=stripslashes(trim($_POST["TEL"]));
	$uid=stripslashes(trim($_POST["uid"]));
	$wechat=stripslashes(trim($_POST["wechat"]));

	$sql="insert into XT_TS (CID,TSDATE,TEL,TYPE,TITLE,IP,CONTENT) values('".$CID."',SYSDATE(),'".$TEL."','".get_gbk('手机')."','".$phone."','".$uid."','".$wechat."')";
	execute($sql);
	echo 1;

}
if($act=="save"){
	$TEL=stripslashes(trim($_POST["TEL"]));
	$TITLE=stripslashes(trim($_POST["title"]));
	$sql="select *from XT_TS where TEL='".$TEL."' and TITLE='".$TITLE."'";
	 $stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
		if(!is_array($rs)){
	$sql="insert into XT_TS (CID,TSDATE,TITLE,TEL,TYPE) values('".$CID."',SYSDATE(),'".get_gbk($TITLE)."','".$TEL."','".get_gbk('手机')."')";
	execute($sql);
	echo 1;
	}
}
if($act=="get"){
 $id=stripslashes(trim($_POST["id"]));
 $sql="select phone,title,button,footer,tips,content from temusr_tab where id=".$id;
 $stmt = mysql_query($sql,$conn);
 $rs= mysql_fetch_array($stmt);
 if(is_array($rs)){
	$arr["success"]=1;
	$arr["title"]=get_utf8($rs["title"]);
	$arr["button"]=get_utf8($rs["button"]);
	$arr["tips"]=get_utf8($rs["tips"]);
	$arr["phone"]=$rs["phone"]; 
	$arr["footer"]=get_utf8($rs["footer"]);
	$arr["content"]=get_utf8($rs["content"]);
 }
 else{
	 $arr["success"]=0;
 }
echo json_encode($arr);
}
if($act=="temsave"){
	$phone=stripslashes(trim($_POST["phone"]));
	$title=stripslashes(trim($_POST["title"]));
	$button=stripslashes(trim($_POST["button"]));
	$footer=stripslashes(trim($_POST["footer"]));
	$content=stripslashes(trim($_POST["content"]));
	$tips=stripslashes(trim($_POST["tips"]));
	$sql="insert into temusr_tab (phone,title,button,footer,tips,content) values('".$phone."','".get_gbk($title)."','".get_gbk($button)."','".get_gbk($footer)."','".get_gbk($tips)."','".get_gbk($content)."')";
	execute($sql);
	$arr["success"]=1;
	$arr["link"]="http://www.dtdc007.com/m/ly2.php?id=".mysql_insert_id($conn);

	echo json_encode($arr);
}
if($act=="del"){
	$img=stripslashes(trim($_POST["df"]));
	if(file_exists ( $img )){
		unlink ( $img );
		$arr["success"]=1;
	}else{
		$arr["success"]=0;
	}
	echo json_encode($arr);
}

?>