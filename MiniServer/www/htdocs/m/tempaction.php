<?
session_start();
include_once 'db2.php';
$action=$_POST["action"];
if($action=="addphone"){
	$phone=stripslashes(trim($_POST["phone"]));
	$sql="select *from tempshareusr_tab where phone='".$phone."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(!is_array($rs)){
		$sql="insert into tempshareusr_tab(phone,createtime) values('".$phone."',SYSDATE())";
		$stmt = mysql_query(get_gbk($sql),$conn);
		if($stmt){
			$arr["success"]=1;
		}else{
			$arr["success"]=0;
		}
	}else{
		$arr["success"]=2;
		$arr["puid"]=$rs["puid"];
	}
	mysql_free_result($rs);
	echo json_encode($arr);
}
elseif($action=="addshare"){
	$cphone=stripslashes(trim($_POST["cphone"]));
	$mphone=stripslashes(trim($_POST["mphone"]));
	$pid=stripslashes(trim($_POST["pid"]));
	$type=stripslashes(trim($_POST["type"]));
	$title=stripslashes(trim($_POST["title"]));
	$sql="select *from tempsharelink_tab where cphone='".$cphone."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(!is_array($rs)){
		$sql="insert into tempsharelink_tab(cphone,mphone,type,pid,title,createtime) values('".$cphone."','".$mphone."',".$type.",".$pid.",'".$title."',SYSDATE())";
		$stmt = mysql_query(get_gbk($sql),$conn);
		if($stmt){
			$arr["success"]=1;
		}else{
			$arr["success"]=0;
		}
	}else{
		$arr["success"]=0;
	}
	mysql_free_result($rs);
	echo json_encode($arr);

}
elseif($action=="getlink"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$sql="SELECT a.id,a.cphone,a.mphone,a.title,a.createtime,a.state,c.usrname,c.name FROM tempsharelink_tab a LEFT JOIN tempshareusr_tab b ON a.mphone=b.phone LEFT JOIN shareusr_tab c ON b.puid=c.id where type=".$type." and pid=".$id;
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
		$detail["cphone"]=$rs["cphone"];
		$detail["id"]=$rs["id"];
		$detail["state"]=$rs["state"];
		$detail["mphone"]=$rs["mphone"];
		$detail["title"]=get_utf8($rs["title"]);
		$detail["usrname"]=get_utf8($rs["usrname"]);
		$detail["name"]=get_utf8($rs["name"]);
		$detail["createtime"]=$rs["createtime"];
		$data[]=$detail;
	}
	if(count($data)>0){
		$arr["success"]=1;
		$arr["data"]=$data;
	}else{
		$arr["success"]=0;
	}
	mysql_free_result($rs);
	echo json_encode($arr);

}
/*********************检测邀请码**************************************/
elseif($action=="checkincode"){
	$invitecode=stripslashes(trim($_POST["invitecode"]));
	$sql="SELECT id FROM shareusr_tab where invitecode='".$invitecode."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(is_array($rs)){
		$arr["success"]=1;
	}else{
		$arr["success"]=0;
	}
	mysql_free_result($rs);
	echo json_encode($arr);
}

/***************************加入群组************************************/
elseif($action=="joingroup"){
	$invitecode=stripslashes(trim($_POST["invitecode"]));
	$phone=stripslashes(trim($_POST["phone"]));
	$sql="SELECT id FROM shareusr_tab where invitecode='".$invitecode."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(is_array($rs)){
		$uid = $rs["id"];
		$sql="select *from tempshareusr_tab where phone='".$phone."'";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$sql="update tempshareusr_tab set puid=".$uid." where phone='".$phone."'";
			$stmt = mysql_query(get_gbk($sql),$conn);
			if($stmt){
				$arr["success"]=1;
				$arr["uid"]=$uid;
			}else{
				$arr["success"]=2;
			}
		}else{
			$sql="insert into tempshareusr_tab(phone,createtime,puid) values('".$phone."',SYSDATE(),".$uid.")";
			$stmt = mysql_query($sql,$conn);
			if($stmt){
			$arr["success"]=1;
			$arr["uid"]=$uid;
			}else{
				$arr["success"]=3;
			}
		}
	}else{
			$arr["success"]=0;
	}
	mysql_free_result($rs);
	echo json_encode($arr);
}

/*******************获取留电话列表*************************/
elseif($action=="gettempsharelist"){
		$type=stripslashes(trim($_POST["type"]));
		$sql="select title,pid,COUNT(id)AS qty FROM(SELECT id,title,pid FROM tempsharelink_tab WHERE type=".$type." ORDER BY createtime DESC)a GROUP BY pid";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
				$detail["qty"]=$rs["qty"];
				$detail["pid"]=$rs["pid"];
				$detail["title"]=get_utf8($rs["title"]);
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

 /*************改变点击链接的状态******************/
elseif($action=="tempcomstat"){
	$id=stripslashes(trim($_POST["id"]));
	$state=stripslashes(trim($_POST["state"]));
	$uid=$_SESSION["uid"];
	if($state==1){
	$sqlid = ",confirmid=".$uid;
	}elseif($state==2){
	$sqlid= ",soldid=".$uid;
	}else{
	$sqlid= ",drawid=".$uid;
	}
	$state = $state+1;
	$sql="update tempsharelink_tab set state=".$state."".$sqlid." where id=".$id;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="更新成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]=$sql;
	}
	echo json_encode($arr);
}


mysql_close($conn);
?>