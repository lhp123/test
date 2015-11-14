<?php 
session_start();
include_once 'db2.php';
$action=$_POST["action"];
/**************登录****************************/
if($action=="login"){
	$username=stripslashes(trim($_POST["username"]));
	$password=stripslashes(trim($_POST["password"]));
	if(empty($username)){
		echo '用户名不能为空'; 
        exit; 
	}
	if(empty($password)){
		echo '密码不能为空'; 
        exit; 
	}
	$sql="select id,usrname,name,mphone,auth from shareusr_tab where usrname='".$username."' and password='".$password."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(is_array($rs)){
	$_SESSION["uid"]=$rs["id"];
	$_SESSION["usrname"]=get_utf8($rs["usrname"]);
	$_SESSION["name"]=get_utf8($rs["name"]);
	$_SESSION["mphone"]=$rs["mphone"];
	$_SESSION["auth"]=$rs["auth"];
	$arr["success"]=1;
	$arr["msg"] = "登陆成功！";
	$arr["uid"]=$rs["id"];
	$arr["username"]=get_utf8($rs["usrname"]);
	$arr["name"]=get_utf8($rs["name"]);
	$arr["mphone"]=$rs["mphone"];
	$arr["auth"]=$rs["auth"];
	}else{
		$arr["success"]=0;
		$arr["msg"] = "用户名或密码错误！"; 

	}
	mysql_free_result($rs);
	echo json_encode($arr);
}
/*******************检测登录*******************************/
elseif($action == "checklogin"){
	if($_SESSION["uid"]){
		$arr["success"]=1;
		$arr["msg"] = "已登录";
	}else{
		$arr["success"]=0;
		$arr["msg"]="未登录";
	}
	echo json_encode($arr);
}

/********************检测管理人员登录*********************************/
elseif($action == "checkadminlogin"){
	$mode=stripslashes(trim($_POST["mode"]));
	if($_SESSION["uid"]){
		switch($mode){
			case 1:
				if($_SESSION["uid"]!=7&&$_SESSION["uid"]!=1){
					$arr["success"]=1;
					$arr["auth"]=$_SESSION["auth"];
				}else{
					$arr["success"]=2;
					$arr["auth"]=$_SESSION["auth"];
				}
				break;
			case 2:
				if($_SESSION["uid"]==2||$_SESSION["uid"]==9){
					$arr["success"]=1;
					$arr["auth"]=$_SESSION["auth"];
				}else{
					$arr["success"]=2;
					$arr["auth"]=$_SESSION["auth"];
				}
				break;
			case 3:
				if($_SESSION["uid"]==2||$_SESSION["uid"]==9||$_SESSION["uid"]==5){
					$arr["success"]=1;
					$arr["auth"]=$_SESSION["auth"];
				}else{
					$arr["success"]=2;
					$arr["auth"]=$_SESSION["auth"];
				}
				break;
			case 4:
				if($_SESSION["uid"]==9||$_SESSION["uid"]==5||$_SESSION["uid"]==3||$_SESSION["uid"]==4){
					$arr["success"]=1;
					$arr["auth"]=$_SESSION["auth"];
				}else{
					$arr["success"]=2;
					$arr["auth"]=$_SESSION["auth"];
				}
				break;
			case 5:
				if($_SESSION["uid"]==9){
					$arr["success"]=1;
					$arr["auth"]=$_SESSION["auth"];
				}else{
					$arr["success"]=2;
					$arr["auth"]=$_SESSION["auth"];
				}
				break;
			case 6:
				if($_SESSION["uid"]==1||$_SESSION["uid"]==7){
					$arr["success"]=1;
					$arr["auth"]=$_SESSION["auth"];
				}else{
					$arr["success"]=2;
					$arr["auth"]=$_SESSION["auth"];
				}
				break;
			}
		}	
	else{
		$arr["success"]=0;
		$arr["msg"]="未登录";
	}
	echo json_encode($arr);
}
/*****************自动登录****************************/
elseif($action == "autologin"){
	$username=stripslashes(trim($_POST["username"]));
	$sql="select id,usrname,name,mphone,auth from shareusr_tab where usrname='".$username."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(is_array($rs)){
	$_SESSION["uid"]=$rs["id"];
	$_SESSION["usrname"]=get_utf8($rs["usrname"]);
	$_SESSION["name"]=get_utf8($rs["name"]);
	$_SESSION["mphone"]=$rs["mphone"];
	$_SESSION["auth"]=$rs["auth"];
	$arr["success"]=1;
	$arr["msg"] = "登陆成功！";
	$arr["uid"]=$rs["id"];
	$arr["username"]=get_utf8($rs["usrname"]);
	$arr["name"]=get_utf8($rs["name"]);
	$arr["mphone"]=$rs["mphone"];
	$arr["auth"]=$rs["auth"];
	}else{
		$arr["success"]=0;
		$arr["msg"] = "用户名或密码错误！"; 

	}
	mysql_free_result($rs);
	echo json_encode($arr);
}

/**************退出登录****************************/
elseif($action == "logout"){
	session_unset();
	if($_SESSION["uid"]){
		$arr["success"]=0;
	}else{
		$arr["success"]=1;
	}
    echo json_encode($arr);
}

/**************检测用户名****************************/
elseif($action == "checkusr"){
	$username=stripslashes(trim($_POST["username"]));
	$sql="select id from shareusr_tab where usrname='".$username."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(is_array($rs)){
		$arr["success"]=0;
		$arr["msg"] = "该用户名已被注册！"; 
	}else{
		$arr["success"]=1;
		$arr["msg"] = "该用户名可以使用！";
	}
	mysql_free_result($rs);
	echo json_encode($arr);
}

/**************注册****************************/
elseif($action == "register"){
	$username=stripslashes(trim($_POST["username"]));
	$password=stripslashes(trim($_POST["password"]));
	$name=stripslashes(trim($_POST["name"]));
	$mphone=stripslashes(trim($_POST["mphone"]));
	$auth=7;
	if(empty($username)){
		echo '用户名不能为空'; 
        exit; 
	}
	if(empty($password)){
		echo '密码不能为空'; 
        exit; 
	}
	if(empty($name)){
		echo '姓名不能为空'; 
        exit; 
	}
	if(empty($mphone)){
		echo '手机号不能为空'; 
        exit; 
	}
	$sql="select id from shareusr_tab where usrname='".$username."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(!is_array($rs)){
		$sql="insert into shareusr_tab(usrname,password,name,mphone,auth,createtime) values('".$username."','".$password."','".$name."','".$mphone."',".$auth.",SYSDATE())";
		$stmt = mysql_query(get_gbk($sql),$conn);
		if($stmt){
			$sql = "select id,usrname,name,mphone,auth from shareusr_tab where usrname='".$username."'";
			$stmt = mysql_query(get_gbk($sql),$conn);
			$rs= mysql_fetch_array($stmt);
			if(is_array($rs)){
				$_SESSION["uid"]=$rs["id"];
				$_SESSION["usrname"]=get_utf8($rs["usrname"]);
				$_SESSION["name"]=get_utf8($rs["name"]);
				$_SESSION["mphone"]=$rs["mphone"];
				$_SESSION["auth"]=$rs["auth"];
				$arr["success"]=1;
				$arr["msg"] = "注册成功！";
				$arr["uid"]=$rs["id"];
				$arr["username"]=get_utf8($rs["usrname"]);
				$arr["name"]=get_utf8($rs["name"]);
				$arr["mphone"]=$rs["mphone"];
				$arr["auth"]=$rs["auth"];
			}else{
				$arr["success"]=0;
				$arr["msg"] = "注册失败！";
			}
		}else{
			$arr["success"]=0;
			$arr["msg"] = "注册失败！";
		}
	}else{
		$arr["success"]=0;
		$arr["msg"] = "该用户名已被注册！";
	}
	mysql_free_result($rs);
	echo json_encode($arr);
}

/**************获取一手楼列表****************************/
elseif ($action=="getnhlist"){
		$auth=$_SESSION["auth"];
		$sql="select id,title,img,state,commission,qty,type,comm2 from sharenh_tab where state=2 order by createdate desc";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["id"]=$rs["id"];
			$detail["title"]=get_utf8($rs["title"]);
			$detail["img"]=$rs["img"];
			$detail["state"]=$rs["state"];
			if($auth==7){
				$detail["commission"]=get_utf8($rs["comm2"]);
			}else{
				$detail["commission"]=get_utf8($rs["commission"]);
			}
			$detail["qty"]=$rs["qty"];
			$detail["type"]=$rs["type"];
			$data[]=$detail;
		}
		if(count($data)>0){
			$arr["success"]=1;
			$arr["data"]=$data;
		}
		else{
			$arr["success"]=0;
		}
		mysql_free_result($rs);
		echo json_encode($arr);
}
/**********************获取全部一手楼列表************************/
elseif ($action=="getadminnhlist"){
	$sql="select id,title,img,state,commission,qty,type,comm2 from sharenh_tab ";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["id"]=$rs["id"];
			$detail["title"]=get_utf8($rs["title"]);
			$detail["img"]=$rs["img"];
			$detail["state"]=$rs["state"];
			$detail["commission"]=get_utf8($rs["commission"]);
			$detail["comm2"]=get_utf8($rs["comm2"]);
			$detail["qty"]=$rs["qty"];
			$detail["type"]=$rs["type"];
			$data[]=$detail;
		}
		if(count($data)>0){
			$arr["success"]=1;
			$arr["data"]=$data;
		}
		else{
			$arr["success"]=0;
		}
		mysql_free_result($rs);
		echo json_encode($arr);
}

/**************获取周全列表****************************/
elseif ($action=="getmorlist"){
		$auth=$_SESSION["auth"];
		$sql="select id,title,img,state,commission,type,comm2 from sharemor_tab where state=2 order by createdate desc";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["id"]=$rs["id"];
			$detail["title"]=get_utf8($rs["title"]);
			$detail["img"]=$rs["img"];
			$detail["state"]=$rs["state"];
			if($auth==7){
				$detail["commission"]=get_utf8($rs["comm2"]);
			}else{
				$detail["commission"]=get_utf8($rs["commission"]);
			}
			$detail["type"]=$rs["type"];
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

/**********************获取全部周全列表************************/
elseif ($action=="getadminmorlist"){
		$sql="select id,title,img,state,commission,type,comm2 from sharemor_tab";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["id"]=$rs["id"];
			$detail["title"]=get_utf8($rs["title"]);
			$detail["img"]=$rs["img"];
			$detail["state"]=$rs["state"];
			$detail["commission"]=get_utf8($rs["commission"]);
			$detail["comm2"]=get_utf8($rs["comm2"]);
			$detail["type"]=$rs["type"];
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

/**************获取二手楼列表****************************/
elseif ($action=="getshhlist"){
		$auth=$_SESSION["auth"];
		$sql="select id,title,img,state,commission,type,comm2 from shareshh_tab where state=2 order by createdate desc";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["id"]=$rs["id"];
			$detail["title"]=get_utf8($rs["title"]);
			$detail["img"]=$rs["img"];
			$detail["state"]=$rs["state"];
			if($auth==7){
				$detail["commission"]=get_utf8($rs["comm2"]);
			}else{
				$detail["commission"]=get_utf8($rs["commission"]);
			}
			$detail["type"]=$rs["type"];
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

/**********************获取全部二手楼列表************************/
elseif ($action=="getadminshhlist"){
		$sql="select id,title,img,state,commission,type,comm2 from shareshh_tab";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["id"]=$rs["id"];
			$detail["title"]=get_utf8($rs["title"]);
			$detail["img"]=$rs["img"];
			$detail["state"]=$rs["state"];
			$detail["commission"]=get_utf8($rs["commission"]);
			$detail["comm2"]=get_utf8($rs["comm2"]);
			$detail["type"]=$rs["type"];
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

/*****************获取详细*************************/
elseif ($action=="getdetail"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$auth=$_SESSION["auth"];
	$state=2;
	if($type=="1"){
		$sql="select id,title,img,state,content,commission,qty,attach,type,comm2,btnwords,tel from sharenh_tab where id=".$id." and state=".$state;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["state"]=$rs["state"];
			$arr["content"]=get_utf8($rs["content"]);
			if($auth==7){
				$arr["commission"]=get_utf8($rs["comm2"]);
			}else{
				$arr["commission"]=get_utf8($rs["commission"]);
			}
			$arr["qty"]=$rs["qty"];
			$arr["att"]=$rs["attach"];
			$arr["type"]=$rs["type"];
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];

		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	elseif($type=="2"){
		$state=2;
		$sql="select id,title,img,state,content,commission,attach,type,comm2,btnwords,tel from sharemor_tab where id=".$id." and state=".$state;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["state"]=$rs["state"];
			$arr["content"]=get_utf8($rs["content"]);
			if($auth==7){
				$arr["commission"]=get_utf8($rs["comm2"]);
			}else{
				$arr["commission"]=get_utf8($rs["commission"]);
			}
			$arr["attach"]=$rs["attach"];
			$arr["type"]=$rs["type"];
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	elseif ($type=="3"){
		$state=2;
		$sql="select id,title,attach,state,img,commission,layout,area,orientation,age,renaration,floor,price,supporting,traffic,content,type,comm2,btnwords,tel from shareshh_tab where id=".$id." and state=".$state;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["state"]=$rs["state"];
			$arr["layout"]=get_utf8($rs["layout"]);
			if($auth==7){
				$arr["commission"]=get_utf8($rs["comm2"]);
			}else{
				$arr["commission"]=get_utf8($rs["commission"]);
			}
			$arr["attach"]=$rs["attach"];
			$arr["area"]=$rs["area"];
			$arr["orientation"]=get_utf8($rs["orientation"]);
			$arr["age"]=$rs["age"];
			$arr["renaration"]=get_utf8($rs["renaration"]);
			$arr["floor"]=$rs["floor"];
			$arr["price"]=$rs["price"];
			$arr["supporting"]=get_utf8($rs["supporting"]);
			$arr["traffic"]=get_utf8($rs["traffic"]);
			$arr["content"]=get_utf8($rs["content"]);
			$arr["type"]=$rs["type"];
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];

		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	else{
		$arr["success"]=0;
		$arr["msg"]="没有数据！";
	}
	
	echo json_encode($arr);
}

/*****************获取所有详细*************************/
elseif ($action=="getadmindetail"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	if($type=="1"){
		$sql="select id,title,img,state,content,commission,qty,attach,type,comm2,btnwords,tel from sharenh_tab where id=".$id;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["state"]=$rs["state"];
			$arr["content"]=get_utf8($rs["content"]);
			$arr["commission"]=get_utf8($rs["commission"]);
			$arr["qty"]=$rs["qty"];
			$arr["att"]=$rs["attach"];
			$arr["type"]=$rs["type"];
			$arr["comm2"]=get_utf8($rs["comm2"]);
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];

		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	elseif($type=="2"){
		$id=stripslashes(trim($_POST["id"]));
		$type=stripslashes(trim($_POST["type"]));
		$sql="select id,title,img,state,content,commission,attach,type,comm2,btnwords,tel from sharemor_tab where id=".$id;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["state"]=$rs["state"];
			$arr["content"]=get_utf8($rs["content"]);
			$arr["commission"]=get_utf8($rs["commission"]);
			$arr["attach"]=$rs["attach"];
			$arr["type"]=$rs["type"];
			$arr["comm2"]=get_utf8($rs["comm2"]);
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	elseif ($type=="3"){
		$id=stripslashes(trim($_POST["id"]));
		$type=stripslashes(trim($_POST["type"]));
		$sql="select id,title,attach,state,img,commission,layout,area,orientation,age,renaration,floor,price,supporting,traffic,content,type,comm2,btnwords,tel from shareshh_tab where id=".$id;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["state"]=$rs["state"];
			$arr["layout"]=get_utf8($rs["layout"]);
			$arr["commission"]=get_utf8($rs["commission"]);
			$arr["attach"]=$rs["attach"];
			$arr["area"]=$rs["area"];
			$arr["orientation"]=get_utf8($rs["orientation"]);
			$arr["age"]=$rs["age"];
			$arr["renaration"]=get_utf8($rs["renaration"]);
			$arr["floor"]=get_utf8($rs["floor"]);
			$arr["price"]=get_utf8($rs["price"]);
			$arr["supporting"]=get_utf8($rs["supporting"]);
			$arr["traffic"]=get_utf8($rs["traffic"]);
			$arr["content"]=get_utf8($rs["content"]);
			$arr["type"]=$rs["type"];
			$arr["comm2"]=get_utf8($rs["comm2"]);
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];

		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	else{
		$arr["success"]=0;
		$arr["msg"]="没有数据！";
	}
	
	echo json_encode($arr);
}



/**************添加一手楼****************************/
elseif ($action=="addnh"){
	$title=stripslashes(trim($_POST["title"]));
	$content=stripslashes(trim($_POST["content"]));
	$att=stripslashes(trim($_POST["att"]));
	$state=stripslashes(trim($_POST["state"]));
	$qty=stripslashes(trim($_POST["qty"]));
	$img=stripslashes(trim($_POST["img"]));
	$commission=stripslashes(trim($_POST["commission"]));
	$comm2=stripslashes(trim($_POST["comm2"]));
	$btnwords=stripslashes(trim($_POST["btnwords"]));
	$tel=stripslashes(trim($_POST["tel"]));
	$uid=$_SESSION["uid"];
	$type="1";
	if(empty($title)){
		echo "标题不能为空！";
		exit;
	}
	if(empty($content)){
		echo "内容不能为空！";
		exit;
	}
	if(empty($att)){
		echo "附加不能为空！";
		exit;
	}
	if(empty($state)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($qty)){
		echo "数量不能为空！";
		exit;
	}
	if(empty($img)){
		echo "图片不能为空！";
		exit;
	}
	if(empty($tel)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($btnwords)){
		echo "数量不能为空！";
		exit;
	}
	if(empty($comm2)){
		$comm2="";
	}
	if(empty($commission)){
		$commission="";
	}
	$sql="insert into sharenh_tab(title,content,attach,state,qty,commission,img,type,createid,comm2,tel,btnwords,createdate) values('".$title."','".$content."','".$att."',".$state.",".$qty.",'".$commission."','".$img."',".$type.",".$uid.",'".$comm2."','".$tel."','".$btnwords."',SYSDATE())";
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="插入成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="插入失败！";
	}
	echo json_encode($arr);
}

/**************添加周全****************************/
elseif ($action=="addmor"){
	$title=stripslashes(trim($_POST["title"]));
	$content=stripslashes(trim($_POST["content"]));
	$att=stripslashes(trim($_POST["att"]));
	$state=stripslashes(trim($_POST["state"]));
	$img=stripslashes(trim($_POST["img"]));
	$commission=stripslashes(trim($_POST["commission"]));
	$uid=$_SESSION["uid"];
	$comm2=stripslashes(trim($_POST["comm2"]));
	$btnwords=stripslashes(trim($_POST["btnwords"]));
	$tel=stripslashes(trim($_POST["tel"]));
	$type="2";
	if(empty($title)){
		echo "标题不能为空！";
		exit;
	}
	if(empty($content)){
		echo "内容不能为空！";
		exit;
	}
	if(empty($att)){
		echo "附加不能为空！";
		exit;
	}
	if(empty($state)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($tel)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($btnwords)){
		echo "数量不能为空！";
		exit;
	}
	if(empty($comm2)){
		$comm2="";
	}
	if(empty($commission)){
		$commission="";
	}
	if(empty($img)){
		echo "图片不能为空！";
		exit;
	}
	$sql="insert into sharemor_tab(title,content,attach,state,commission,img,type,createid,comm2,tel,btnwords,createdate) values('".$title."','".$content."','".$att."',".$state.",'".$commission."','".$img."',".$type.",".$uid.",'".$comm2."','".$tel."','".$btnwords."',SYSDATE())";
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="插入成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="插入失败！";
	}
	echo json_encode($arr);
}


/***************添加二手楼*****************************/
elseif ($action=="addshh"){
	$title=stripslashes(trim($_POST["title"]));
	$att=stripslashes(trim($_POST["att"]));
	$state=stripslashes(trim($_POST["state"]));
	$img=stripslashes(trim($_POST["img"]));
	$commission=stripslashes(trim($_POST["commission"]));
	$layout=stripslashes(trim($_POST["layout"]));
	$area=stripslashes(trim($_POST["area"]));
	$orientation=stripslashes(trim($_POST["orientation"]));
	$age=stripslashes(trim($_POST["age"]));
	$renaration=stripslashes(trim($_POST["renaration"]));
	$floor=stripslashes(trim($_POST["floor"]));
	$price=stripslashes(trim($_POST["price"]));
	$supporting=stripslashes(trim($_POST["supporting"]));
	$traffic=stripslashes(trim($_POST["traffic"]));
	$content=stripslashes(trim($_POST["content"]));
	$uid=$_SESSION["uid"];
	$comm2=stripslashes(trim($_POST["comm2"]));
	$btnwords=stripslashes(trim($_POST["btnwords"]));
	$tel=stripslashes(trim($_POST["tel"]));
	$type="3";
	if(empty($title)){
		echo "标题不能为空！";
		exit;
	}
	if(empty($layout)){
		echo "户型不能为空！";
		exit;
	}
	if(empty($att)){
		echo "附加不能为空！";
		exit;
	}
	if(empty($state)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($tel)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($btnwords)){
		echo "数量不能为空！";
		exit;
	}
	if(empty($comm2)){
		$comm2="";
	}
	if(empty($commission)){
		$commission="";
	}
	if(empty($img)){
		echo "图片不能为空！";
		exit;
	}
	if(empty($age)){
		echo "年代不能为空！";
		exit;
	}
	if(empty($renaration)){
		echo "年代不能为空！";
		exit;
	}
	if(empty($floor)){
		echo "楼层不能为空！";
		exit;
	}
	if(empty($price)){
		echo "价格不能为空！";
		exit;
	}
	if(empty($supporting)){
		echo "配套不能为空！";
		exit;
	}
	if(empty($traffic)){
		echo "交通不能为空！";
		exit;
	}
	if(empty($content)){
		echo "内容不能为空！";
		exit;
	}
	$sql="insert into shareshh_tab(title,attach,state,img,commission,layout,area,orientation,age,renaration,floor,price,supporting,traffic,content,type,createid,comm2,tel,btnwords,createdate) values('".$title."','".$att."',".$state.",'".$img."','".$commission."','".$layout."','".$area."','".$orientation."','".$age."','".$renaration."','".$floor."','".$price."','".$supporting."','".$traffic."','".$content."',".$type.",".$uid.",'".$comm2."','".$tel."','".$btnwords."',SYSDATE())";
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="插入成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="插入失败！";
	}
	echo json_encode($arr);
}

/**************删除一手楼****************************/
elseif ($action=="delnh"){
	$pid=stripslashes(trim($_POST["pid"]));
	$sql="delete from sharenh_tab where id=".$pid;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="删除成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="删除失败！";
	}
	echo json_encode($arr);
}

/**************删除周全****************************/
elseif ($action=="delmor"){
	$pid=stripslashes(trim($_POST["pid"]));
	$sql="delete from sharemor_tab where id=".$pid;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="删除成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="删除失败！";
	}
	echo json_encode($arr);
}

/**************删除二手楼****************************/
elseif ($action=="delshh"){
	$pid=stripslashes(trim($_POST["pid"]));
	$sql="delete from shareshh_tab where id=".$pid;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="删除成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="删除失败！";
	}
	echo json_encode($arr);
}

/**************修改一手楼****************************/
elseif ($action=="modifynh"){
	$title=stripslashes(trim($_POST["title"]));
	$content=stripslashes(trim($_POST["content"]));
	$att=stripslashes(trim($_POST["att"]));
	$state=stripslashes(trim($_POST["state"]));
	$qty=stripslashes(trim($_POST["qty"]));
	$img=stripslashes(trim($_POST["img"]));
	$commission=stripslashes(trim($_POST["commission"]));
	$pid=stripslashes(trim($_POST["pid"]));
	$uid=$_SESSION["uid"];
	$comm2=stripslashes(trim($_POST["comm2"]));
	$btnwords=stripslashes(trim($_POST["btnwords"]));
	$tel=stripslashes(trim($_POST["tel"]));
	if(empty($title)){
		echo "标题不能为空！";
		exit;
	}
	if(empty($content)){
		echo "内容不能为空！";
		exit;
	}
	if(empty($att)){
		echo "附加不能为空！";
		exit;
	}
	if(empty($state)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($qty)){
		echo "数量不能为空！";
		exit;
	}
	if(empty($tel)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($btnwords)){
		echo "数量不能为空！";
		exit;
	}
	if(empty($comm2)){
		$comm2="";
	}
	if(empty($commission)){
		$commission="";
	}
	if(empty($img)){
		echo "图片不能为空！";
		exit;
	}
	$sql="update sharenh_tab set title='".$title."',content='".$content."',attach='".$att."',img='".$img."',commission='".$commission."',qty=".$qty.",state=".$state.",alterid=".$uid.",comm2='".$comm2."',tel='".$tel."',btnwords='".$btnwords."',alterdate=SYSDATE() where id=".$pid;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="修改成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="修改失败！";
	}
	echo json_encode($arr);
}

/**************修改周全****************************/
elseif ($action=="modifymor"){
	$title=stripslashes(trim($_POST["title"]));
	$content=stripslashes(trim($_POST["content"]));
	$att=stripslashes(trim($_POST["att"]));
	$state=stripslashes(trim($_POST["state"]));
	$img=stripslashes(trim($_POST["img"]));
	$commission=stripslashes(trim($_POST["commission"]));
	$pid=stripslashes(trim($_POST["pid"]));
	$uid=$_SESSION["uid"];
	$comm2=stripslashes(trim($_POST["comm2"]));
	$btnwords=stripslashes(trim($_POST["btnwords"]));
	$tel=stripslashes(trim($_POST["tel"]));
	if(empty($title)){
		echo "标题不能为空！";
		exit;
	}
	if(empty($content)){
		echo "内容不能为空！";
		exit;
	}
	if(empty($att)){
		echo "附加不能为空！";
		exit;
	}
	if(empty($state)){
		echo "状态不能为空！";
		exit;
	}

	if(empty($commission)){
		$commission="";
	}
	if(empty($tel)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($btnwords)){
		echo "数量不能为空！";
		exit;
	}
	if(empty($comm2)){
		$comm2="";
	}
	if(empty($img)){
		echo "图片不能为空！";
		exit;
	}
	$sql="update sharemor_tab set title='".$title."',content='".$content."',attach='".$att."',img='".$img."',commission='".$commission."',state=".$state.",alterid=".$uid.",comm2='".$comm2."',tel='".$tel."',btnwords='".$btnwords."',alterdate=SYSDATE() where id=".$pid;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="修改成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="修改失败！";
	}
	echo json_encode($arr);
}


/**************修改二手楼****************************/
elseif ($action=="modifyshh"){
	$title=stripslashes(trim($_POST["title"]));
	$att=stripslashes(trim($_POST["att"]));
	$state=stripslashes(trim($_POST["state"]));
	$img=stripslashes(trim($_POST["img"]));
	$commission=stripslashes(trim($_POST["commission"]));
	$layout=stripslashes(trim($_POST["layout"]));
	$area=stripslashes(trim($_POST["area"]));
	$orientation=stripslashes(trim($_POST["orientation"]));
	$age=stripslashes(trim($_POST["age"]));
	$renaration=stripslashes(trim($_POST["renaration"]));
	$floor=stripslashes(trim($_POST["floor"]));
	$price=stripslashes(trim($_POST["price"]));
	$supporting=stripslashes(trim($_POST["supporting"]));
	$traffic=stripslashes(trim($_POST["traffic"]));
	$content=stripslashes(trim($_POST["content"]));
	$uid=$_SESSION["uid"];
	$type="3";
	$pid=stripslashes(trim($_POST["pid"]));
	$comm2=stripslashes(trim($_POST["comm2"]));
	$btnwords=stripslashes(trim($_POST["btnwords"]));
	$tel=stripslashes(trim($_POST["tel"]));
	if(empty($title)){
		echo "标题不能为空！";
		exit;
	}
	if(empty($layout)){
		echo "户型不能为空！";
		exit;
	}
	if(empty($att)){
		echo "附加不能为空！";
		exit;
	}
	if(empty($state)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($commission)){
		$commission="";
	}
	if(empty($tel)){
		echo "状态不能为空！";
		exit;
	}
	if(empty($btnwords)){
		echo "数量不能为空！";
		exit;
	}
	if(empty($comm2)){
		$comm2="";
	}
	if(empty($img)){
		echo "图片不能为空！";
		exit;
	}
	if(empty($age)){
		echo "年代不能为空！";
		exit;
	}
	if(empty($renaration)){
		echo "年代不能为空！";
		exit;
	}
	if(empty($floor)){
		echo "楼层不能为空！";
		exit;
	}
	if(empty($price)){
		echo "价格不能为空！";
		exit;
	}
	if(empty($supporting)){
		echo "配套不能为空！";
		exit;
	}
	if(empty($traffic)){
		echo "交通不能为空！";
		exit;
	}
	if(empty($content)){
		echo "内容不能为空！";
		exit;
	}
	$sql="update shareshh_tab set title='".$title."',layout='".$layout."',attach='".$att."',img='".$img."',commission='".$commission."',state=".$state.",area='".$area."',orientation='".$orientation."',age='".$age."',renaration='".$renaration."',floor='".$floor."',price='".$price."',supporting='".$supporting."',traffic='".$traffic."',content='".$content."',type=".$type.",alterid=".$uid.",comm2='".$comm2."',tel='".$tel."',btnwords='".$btnwords."',alterdate=SYSDATE() where id=".$pid;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="修改成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="修改失败！";
	}
	echo json_encode($arr);
}

/**************修改用户****************************/
elseif ($action=="modifyusr"){
	$username=stripslashes(trim($_POST["username"]));
	//$password=stripslashes(trim($_POST["password"]));
	$name=stripslashes(trim($_POST["name"]));
	$mphone=stripslashes(trim($_POST["mphone"]));
	$age=stripslashes(trim($_POST["age"]));
	$industry=stripslashes(trim($_POST["industry"]));
	$addr=stripslashes(trim($_POST["addr"]));
	if(empty($username)){
		echo '用户名不能为空'; 
        exit; 
	}

	if(empty($name)){
		echo '姓名不能为空'; 
        exit; 
	}
	if(empty($mphone)){
		echo '手机号不能为空'; 
        exit; 
	}
	$sql="update shareusr_tab set name='".$name."',mphone='".$mphone."',age=".$age.",industry=".$industry.",addr=".$addr." where usrname='".$username."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$sql="select usrname,name,mphone,auth from shareusr_tab where usrname='".$username."'";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$_SESSION["name"]=get_utf8($rs["name"]);
			$_SESSION["mphone"]=$rs["mphone"];
			$arr["success"]=1;
			$arr["username"]=get_utf8($rs["usrname"]);
			$arr["name"]=get_utf8($rs["name"]);
			$arr["mphone"]=$rs["mphone"];
			$arr["auth"]=$rs["auth"];
			$arr["age"]=$rs["age"];
			$arr["industry"]=$rs["industry"];
			$arr["addr"]=$rs["addr"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="修改失败！";
		}
		mysql_free_result($rs);
	}else{
		$arr["success"]=2;
		$arr["msg"]="修改失败！";
	}
	
	echo json_encode($arr);
}


/**************admin修改用户****************************/
elseif ($action=="modifyadminusr"){
	$username=stripslashes(trim($_POST["username"]));
	//$password=stripslashes(trim($_POST["password"]));
	$name=stripslashes(trim($_POST["name"]));
	$mphone=stripslashes(trim($_POST["mphone"]));
	$auth=stripslashes(trim($_POST["auth"]));
	$age=stripslashes(trim($_POST["age"]));
	$industry=stripslashes(trim($_POST["industry"]));
	$addr=stripslashes(trim($_POST["addr"]));
	if(empty($username)){
		echo '用户名不能为空'; 
        exit; 
	}

	if(empty($name)){
		echo '姓名不能为空'; 
        exit; 
	}
	if(empty($mphone)){
		echo '手机号不能为空'; 
        exit; 
	}
	$sql="update shareusr_tab set name='".$name."',mphone='".$mphone."',auth=".$auth.",age=".$age.",industry=".$industry.",addr=".$addr." where usrname='".$username."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$sql="select usrname,name,mphone,auth,age,industry,addr from shareusr_tab where usrname='".$username."'";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["username"]=get_utf8($rs["usrname"]);
			$arr["name"]=get_utf8($rs["name"]);
			$arr["mphone"]=$rs["mphone"];
			$arr["auth"]=$rs["auth"];
			$arr["age"]=$rs["age"];
			$arr["industry"]=$rs["industry"];
			$arr["addr"]=$rs["addr"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="修改失败！";
		}
		mysql_free_result($rs);
	}else{
		$arr["success"]=2;
		$arr["msg"]="修改失败！";
	}
	
	echo json_encode($arr);
}

/**************获取用户详细****************************/
elseif ($action=="getusrdetail"){
	$uid=stripslashes(trim($_POST["uid"]));
	if(empty($uid)){
		echo '用户名不能为空'; 
        exit; 
	}
	$sql="select usrname,name,mphone,auth,age,industry,addr,invitecode from shareusr_tab where id=".$uid;
	$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["id"]=$uid;
			$arr["username"]=get_utf8($rs["usrname"]);
			$arr["name"]=get_utf8($rs["name"]);
			$arr["mphone"]=$rs["mphone"];
			$arr["auth"]=$rs["auth"];
			$arr["age"]=$rs["age"];
			$arr["industry"]=$rs["industry"];
			$arr["addr"]=$rs["addr"];
			$arr["invitecode"]=$rs["invitecode"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
		echo json_encode($arr);
}

/**************获取当前用户*******************************/
elseif($action=="getlocaluser"){
	if($_SESSION["uid"]){
		$arr["success"]=1;
		$arr["uid"] = $_SESSION["uid"];
		$arr["username"] = $_SESSION["usrname"];
		$arr["name"] = $_SESSION["name"];
		$arr["mphone"] = $_SESSION["mphone"];
		$arr["auth"] = $_SESSION["auth"];
	}else{
		$arr["success"]=0;
	}
	echo json_encode($arr);
}

/**************删除用户****************************/
elseif($action=="delusr"){
	$uid=stripslashes(trim($_POST["uid"]));
	if(empty($uid)){
		echo '用户名不能为空'; 
        exit; 
	}
	$sql="delete from shareusr_tab where id=".$uid;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="删除成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="删除失败！";
	}
	echo json_encode($arr);
}

/**************获取用户列表****************************/
elseif ($action=="getusrlist"){
	$sql="select usrname,name,mphone,auth,id from shareusr_tab";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["id"]=$rs["id"];
			$detail["usrname"]=get_utf8($rs["usrname"]);
			$detail["name"]=get_utf8($rs["name"]);
			$detail["mphone"]=$rs["mphone"];
			$detail["auth"]=$rs["auth"];
			$data[]=$detail;		
		}
		if(!empty($data)){
			$arr["success"]=1;
			$arr["data"]=$data;
		}
		else{
			$arr["success"]=0;
		}
		mysql_free_result($rs);
		echo json_encode($arr);
}

/**************购买项目****************************/
 elseif ($action=="buypg"){
	$uid=stripslashes(trim($_POST["uid"]));
	$pid=stripslashes(trim($_POST["pid"]));
	$link=stripslashes(trim($_POST["link"]));
	$cphone=stripslashes(trim($_POST["cphone"]));
	$type=stripslashes(trim($_POST["type"]));
	$sql="select *from sharelink_tab where uid=".$uid." and type=".$type." and cphone='".$cphone."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(!is_array($rs)){
		$sql="insert into sharelink_tab(uid,pid,link,cphone,date,type,state) values(".$uid.",".$pid.",'".$link."','".$cphone."',SYSDATE(),".$type.",1)";
		$stmt = mysql_query(get_gbk($sql),$conn);
		if($stmt){
			$arr["id"]=mysql_insert_id();
			$sql = "select usrname from shareusr_tab where id=".$pid;
			$stmt = mysql_query(get_gbk($sql),$conn);
			$rs= mysql_fetch_array($stmt);
			if(is_array($rs)){
				$username = $rs["usrname"];
				$sql="update sharelink_tab set un='".$username."' where id=".$arr["id"];
				$stmt = mysql_query($sql,$conn);
				if($stmt){
					if($type==1){
						$sql = "select title from sharenh_tab where id=".$uid;
					}elseif($type==2){
						$sql = "select title from sharemor_tab where id=".$uid;
					}else{
						$sql = "select title from shareshh_tab where id=".$uid;
					}
					$stmt = mysql_query($sql,$conn);
					$rs= mysql_fetch_array($stmt);
					if(is_array($rs)){
						$title=get_utf8($rs["title"]);
						$sql="update sharelink_tab set pt='".$title."' where id=".$arr["id"];
						$stmt = mysql_query(get_gbk($sql),$conn);
						if($stmt){
							$arr["success"]=1;
							$arr["msg"]="插入成功！";
						}
						else{
							$arr["success"]=3;
							$arr["msg"]="插入失败！";
						}
					}
					else{
							$arr["success"]=4;
							$arr["msg"]="插入失败！";
						}
				}
				else{
							$arr["success"]=5;
							$arr["msg"]="插入失败！";
						}
			}else{
							$arr["success"]=6;
							$arr["msg"]="插入失败！";
						}
			
		}else{
			$arr["success"]=0;
			$arr["msg"]="插入失败！";
		}
	}else{
		$arr["success"]=2;
		$arr["msg"]="插入失败！";
	}
	mysql_free_result($rs);
	echo json_encode($arr);
}

/****************客户链接***********************/
 elseif ($action=="getsharedetail"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	if($type=="1"){
		$sql="select id,title,img,content,qty,attach,type,btnwords,tel from sharenh_tab where id=".$id." and state=2";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["content"]=get_utf8($rs["content"]);
			$arr["qty"]=$rs["qty"];
			$arr["att"]=$rs["attach"];
			$arr["type"]=$rs["type"];
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];

		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	elseif($type=="2"){
		$sql="select id,title,img,content,attach,type,btnwords,tel from sharemor_tab where id=".$id." and state=2";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["content"]=get_utf8($rs["content"]);
			$arr["attach"]=$rs["attach"];
			$arr["type"]=$rs["type"];
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	elseif ($type=="3"){
		$sql="select id,title,attach,img,layout,area,orientation,age,renaration,floor,price,supporting,traffic,content,type,btnwords,tel from shareshh_tab where id=".$id." and state=2";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["layout"]=get_utf8($rs["layout"]);
			$arr["attach"]=$rs["attach"];
			$arr["area"]=$rs["area"];
			$arr["orientation"]=get_utf8($rs["orientation"]);
			$arr["age"]=$rs["age"];
			$arr["renaration"]=get_utf8($rs["renaration"]);
			$arr["floor"]=$rs["floor"];
			$arr["price"]=$rs["price"];
			$arr["supporting"]=get_utf8($rs["supporting"]);
			$arr["traffic"]=get_utf8($rs["traffic"]);
			$arr["content"]=get_utf8($rs["content"]);
			$arr["type"]=$rs["type"];
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	else{
		$arr["success"]=0;
		$arr["msg"]="没有数据！";
	}

	echo json_encode($arr);
 }


 /****************预览链接***********************/
 elseif ($action=="getpreviewdetail"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	if($type=="1"){
		$sql="select id,title,img,content,qty,attach,type,btnwords,tel from sharenh_tab where id=".$id;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["content"]=get_utf8($rs["content"]);
			$arr["qty"]=$rs["qty"];
			$arr["att"]=$rs["attach"];
			$arr["type"]=$rs["type"];
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];

		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	elseif($type=="2"){
		$sql="select id,title,img,content,attach,type,btnwords,tel from sharemor_tab where id=".$id;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["content"]=get_utf8($rs["content"]);
			$arr["attach"]=$rs["attach"];
			$arr["type"]=$rs["type"];
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	elseif ($type=="3"){
		$sql="select id,title,attach,img,layout,area,orientation,age,renaration,floor,price,supporting,traffic,content,type,btnwords,tel from shareshh_tab where id=".$id;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["layout"]=get_utf8($rs["layout"]);
			$arr["attach"]=$rs["attach"];
			$arr["area"]=$rs["area"];
			$arr["orientation"]=get_utf8($rs["orientation"]);
			$arr["age"]=$rs["age"];
			$arr["renaration"]=get_utf8($rs["renaration"]);
			$arr["floor"]=$rs["floor"];
			$arr["price"]=$rs["price"];
			$arr["supporting"]=get_utf8($rs["supporting"]);
			$arr["traffic"]=get_utf8($rs["traffic"]);
			$arr["content"]=get_utf8($rs["content"]);
			$arr["type"]=$rs["type"];
			$arr["btnwords"]=get_utf8($rs["btnwords"]);
			$arr["tel"]=$rs["tel"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		mysql_free_result($rs);
	}
	else{
		$arr["success"]=0;
		$arr["msg"]="没有数据！";
	}

	echo json_encode($arr);
 }

 /********所有点击链接***********/
elseif($action=="getallsharelink"){
		$state=stripslashes(trim($_POST["state"]));
		$uid=stripslashes(trim($_POST["id"]));
		$type=stripslashes(trim($_POST["type"]));
		$auth=$_SESSION["auth"];
		$sql="select a.cphone as cphone,a.date as date,a.un as usrname,b.name as name,a.pt as title,a.state as state,a.id as id from sharelink_tab a left join shareusr_tab b on a.pid=b.id where a.uid=".$uid." and a.type=".$type;
		if($auth==3){
			$sql .= " and state<4";
		}
		if($auth==4){
			$sql .= " and state<4";
		}
		if($auth==5){
			$sql .= " and state>2";
		}
		$sql .= " order by a.date";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["cphone"]= $rs["cphone"];
			$detail["date"]= $rs["date"];
			$detail["usrname"]= get_utf8($rs["usrname"]);
			$detail["name"]= get_utf8($rs["name"]);
			$detail["title"]=get_utf8($rs["title"]);
			$detail["state"]=$rs["state"];
			$detail["id"]=$rs["id"];
			$data[]=$detail;
		}
		if(!empty($data)){
			$arr["success"]=1;
			$arr["data"]=$data;
		}
		else{
			$arr["success"]=0;
		}
		mysql_free_result($rs);
		echo json_encode($arr);
 }
 /********我的点击链接***********/
 elseif($action=="getmysharelink"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$username=$_SESSION["usrname"];
	$sql="select a.cphone as cphone,a.date as date,a.un as usrname,b.name as name,a.pt as title,a.state as state from sharelink_tab a left join shareusr_tab b on a.pid=b.id where a.un='".$username."' and a.uid=".$id." and a.type=".$type;
	$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["cphone"]= $rs["cphone"];
			$detail["date"]= $rs["date"];
			$detail["usrname"]= get_utf8($rs["usrname"]);
			$detail["name"]= get_utf8($rs["name"]);
			$detail["title"]=get_utf8($rs["title"]);
			$detail["state"]=$rs["state"];
			$data[]=$detail;
		}
		if(!empty($data)){
			$arr["success"]=1;
			$arr["data"]=$data;
		}
		else{
			$arr["success"]=0;
		}
		mysql_free_result($rs);
		echo json_encode($arr);
 }

 /*************改变点击链接的状态******************/
elseif($action=="comstat"){
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
	$sql="update sharelink_tab set state=".$state."".$sqlid." where id=".$id;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="更新成功！";
	}else{
		$arr["success"]=0;
		$arr["msg"]="更新失败！";
	}
	echo json_encode($arr);
}

/*************获取已销售的点击链接******************/
elseif($action=="getcom"){
	$sql="select a.cphone as cphone,a.date as date,a.un as usrname,b.name as name,a.pt as title,a.state as state from sharelink_tab a left join shareusr_tab b on a.pid=b.id where state=3";
	$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["cphone"]= $rs["cphone"];
			$detail["date"]= $rs["date"];
			$detail["usrname"]= get_utf8($rs["usrname"]);
			$detail["name"]= get_utf8($rs["name"]);
			$detail["title"]=get_utf8($rs["title"]);
			$detail["state"]=get_utf8($rs["state"]);
			$data[]=$detail;
		}
		if(!empty($data)){
			$arr["success"]=1;
			$arr["data"]=$data;
		}
		else{
			$arr["success"]=0;
		}
		mysql_free_result($rs);
		echo json_encode($arr);
}

/*************获取所有列表**************************************/
elseif($action=="getalllist"){
	$sql="select title,img,id,type,state from sharenh_tab where state>1 UNION select title,img,id,type,state from sharemor_tab where state>1 UNION select title,img,id,type,state from shareshh_tab where state>1";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["id"]=$rs["id"];
			$detail["title"]=get_utf8($rs["title"]);
			$detail["img"]=$rs["img"];
			$detail["state"]=$rs["state"];
			$detail["type"]=$rs["type"];
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

/*********获取各用户留电话比率***********/
elseif($action=="getclickratio"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$sql="SELECT count(id)qty,'合计' AS un FROM sharelink_tab WHERE type=".$type." AND uid=".$id." UNION select *from(SELECT COUNT(un)qty,un FROM sharelink_tab WHERE type=".$type." AND uid=".$id." GROUP BY un ORDER BY qty DESC)a";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["qty"]=$rs["qty"];
		
			$detail["un"]=get_utf8($rs["un"]);
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
/***************获取各用户浏览比率***********************************/
elseif($action=="getviewratio"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$sql="SELECT count(ip) qty,'合计' as usrname FROM sharecount_tab WHERE pid=".$id." AND type=".$type." UNION select * from(SELECT count(a.ip) qty,b.usrname FROM sharecount_tab a LEFT JOIN shareusr_tab b ON a.uid=b.id where a.pid=".$id." AND a.type=".$type." GROUP BY b.usrname ORDER BY qty DESC)a";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["qty"]=$rs["qty"];
		
			$detail["un"]=get_utf8($rs["usrname"]);
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

/*********************总成交转化比率**************************************/
elseif($action=="getturnoverratio"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$sql="SELECT count(id)qty,'合计' AS un FROM sharelink_tab WHERE type=".$type." AND uid=".$id." UNION SELECT COUNT(id) as qty,'成交' as un FROM sharelink_tab WHERE type=".$type." AND uid=".$id." and state=3 union select count(id) as qty,'未成交' as un from sharelink_tab where type=".$type." AND uid=".$id." and state<3";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["qty"]=$rs["qty"];
			$detail["un"]=get_utf8($rs["un"]);
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

/************************总留电话转化比率******************************/
elseif($action=="getphoneratio"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$sql="SELECT count(ip)qty,'合计' AS un FROM sharecount_tab WHERE type=".$type." AND pid=".$id." UNION SELECT COUNT(id) as qty,'留电话数' as un FROM sharelink_tab WHERE type=".$type." AND uid=".$id;
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["qty"]=$rs["qty"];
			$detail["un"]=get_utf8($rs["un"]);
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

/*******************各用户成交比*************************/
elseif($action=="getevrphoneratio"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$sql="SELECT count(id)qty,'合计' AS un FROM sharelink_tab WHERE type=".$type." AND uid=".$id." and state=3 UNION select *from(SELECT COUNT(un)qty,un FROM sharelink_tab WHERE type=".$type." AND uid=".$id." and state=3 GROUP BY un ORDER BY qty DESC)a";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["qty"]=$rs["qty"];
			$detail["un"]=get_utf8($rs["un"]);
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

/********************今天浏览量****************************************/
elseif($action=="gettodayratio"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$sql="SELECT COUNT(date) as qty, DATE_FORMAT(date,'%H') AS hour from(SELECT * from sharecount_tab WHERE type=".$type." AND pid=".$id." AND DATE_FORMAT(date,'%Y-%m-%d')=DATE_FORMAT(SYSDATE(),'%Y-%m-%d'))a GROUP BY DATE_FORMAT(date,'%H')";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["qty"]=$rs["qty"];
			$detail["hour"]=$rs["hour"];
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

/********************按时间段浏览量分析****************************************/
elseif($action=="gettimeratio"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$sql="SELECT COUNT(date) as qty, DATE_FORMAT(date,'%H') AS hour from(SELECT * from sharecount_tab WHERE type=".$type." AND pid=".$id.")a GROUP BY DATE_FORMAT(date,'%H')";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["qty"]=$rs["qty"];
			$detail["hour"]=$rs["hour"];
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

/********************一天浏览量****************************************/
elseif($action=="getonedayratio"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$date=stripslashes(trim($_POST["date"]));
	$sql="SELECT COUNT(date) as qty, DATE_FORMAT(date,'%H') AS hour from(SELECT * from sharecount_tab WHERE type=".$type." AND pid=".$id." AND DATE_FORMAT(date,'%Y-%m-%d')=DATE_FORMAT('".$date."','%Y-%m-%d'))a GROUP BY DATE_FORMAT(date,'%H')";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["qty"]=$rs["qty"];
			$detail["hour"]=$rs["hour"];
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

/********************一月浏览量****************************************/
elseif($action=="getonemonratio"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$date=stripslashes(trim($_POST["date"]));
	$sql="SELECT COUNT(date) as qty, DATE_FORMAT(date,'%Y-%m-%d') AS day from(SELECT * from sharecount_tab WHERE type=".$type." AND pid=".$id." AND DATE_FORMAT(date,'%Y-%m')=DATE_FORMAT('".$date."','%Y-%m'))a GROUP BY DATE_FORMAT(date,'%Y-%m-%d') ORDER BY day";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["qty"]=$rs["qty"];
			$detail["day"]=$rs["day"];
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

/********************自选日期日浏览量****************************************/
elseif($action=="getcustomerratio"){
	$id=stripslashes(trim($_POST["id"]));
	$type=stripslashes(trim($_POST["type"]));
	$begindate=stripslashes(trim($_POST["begindate"]));
	$enddate=stripslashes(trim($_POST["enddate"]));
	$sql="SELECT COUNT(date) as qty, DATE_FORMAT(date,'%Y-%m-%d') AS day from(SELECT * from sharecount_tab WHERE type=".$type." AND pid=".$id." AND DATE_FORMAT('".$begindate."','%Y-%m-%d')<=DATE_FORMAT(date,'%Y-%m-%d') AND DATE_FORMAT(date,'%Y-%m-%d')<=DATE_FORMAT('".$enddate."','%Y-%m-%d'))a GROUP BY DATE_FORMAT(date,'%Y-%m-%d') ORDER BY day";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
	while($rs = mysql_fetch_array($stmt)){
			$detail["qty"]=$rs["qty"];
			$detail["day"]=$rs["day"];
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


/********************统计浏览量*****************************/
elseif($action=="getcountip"){
		$reIP=$_SERVER["REMOTE_ADDR"];
		$uid=stripslashes(trim($_POST["uid"]));
		$pid=stripslashes(trim($_POST["pid"]));
		$type=stripslashes(trim($_POST["type"]));
		$sql = "select ip as qty from sharecount_tab where ip='".$reIP."' and pid=".$pid." and type=".$type;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(!is_array($rs)){
			$sql="insert into sharecount_tab(uid,pid,ip,date,type) values(".$uid.",".$pid.",'".$reIP."',SYSDATE(),".$type.")";
			$stmt = mysql_query(get_gbk($sql),$conn);
			if($stmt){
				$arr["success"]=1;
			}else{
				$arr["success"]=0;
			}
		}
		$sql="select count(ip) as qty from sharecount_tab where pid=".$pid." and type=".$type;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			if(empty($arr["success"])){
				$arr["success"]=2;
			}
			$arr["qty"]=$rs["qty"];
		}else{
			$arr["success"]=3;
		}
		$arr["ip"]=$reIP;
		mysql_free_result($rs);
		echo json_encode($arr);
}

/*******************获取留电话列表*************************/
elseif($action=="getsharelist"){
		$type=stripslashes(trim($_POST["type"]));
		$sql="select pt,uid,COUNT(id)AS qty FROM(SELECT id,pt,uid FROM `sharelink_tab` WHERE type=".$type." ORDER BY date DESC)a GROUP BY uid";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
				$detail["qty"]=$rs["qty"];
				$detail["uid"]=$rs["uid"];
				$detail["pt"]=get_utf8($rs["pt"]);
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

/*******************获取我的留电话列表*************************/
elseif($action=="getmysharelist"){
		$type=stripslashes(trim($_POST["type"]));
		$usrname=$_SESSION["usrname"];
		$sql="select pt,uid,COUNT(id)AS qty FROM(SELECT id,pt,uid FROM `sharelink_tab` WHERE type=".$type." and un='".$usrname."' ORDER BY date DESC)a GROUP BY uid";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
				$detail["qty"]=$rs["qty"];
				$detail["uid"]=$rs["uid"];
				$detail["pt"]=get_utf8($rs["pt"]);
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

/***********************修改密码**********************/
elseif($action=="changepsw"){
		$opassword=stripslashes(trim($_POST["opassword"]));
		$npassword=stripslashes(trim($_POST["npassword"]));
		$username=$_SESSION["usrname"];
		$sql="select id from shareusr_tab where password='".$opassword."' and usrname='".$username."'";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$sql="update shareusr_tab set password='".$npassword."' where usrname='".$username."'";
			$stmt = mysql_query(get_gbk($sql),$conn);
			if($stmt){
				$arr["success"]=1;
				$arr["msg"]="修改成功";
			}else{
				$arr["success"]=0;
				$arr["msg"]="修改不成功";
			}
		}else{
				$arr["success"]=2;
				$arr["msg"]="你输入的旧密码不对";
		}
		mysql_free_result($rs);
		echo json_encode($arr);
}

/*******************添加条款*****************************/
elseif($action=="addclause"){
	$title=stripslashes(trim($_POST["title"]));
	$content=stripslashes(trim($_POST["content"]));
	$img=stripslashes(trim($_POST["img"]));
	$sql="insert into shareclause_tab(title,content,img) values('".$title."','".$content."','".$img."')";
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="添加成功";
	}else{
		$arr["success"]=0;
		$arr["msg"]="添加失败";
	}
	echo json_encode($arr);
}

/**********************修改条款***********************************/
elseif($action=="alterclause"){
	$id=stripslashes(trim($_POST["id"]));
	$title=stripslashes(trim($_POST["title"]));
	$content=stripslashes(trim($_POST["content"]));
	$img=stripslashes(trim($_POST["img"]));
	$sql="update shareclause_tab set title='".$title."',content='".$content."',img='".$img."' where id=".$id;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="添加成功";
	}else{
		$arr["success"]=0;
		$arr["msg"]="添加失败";
	}
	echo json_encode($arr);
}
/*******************获取条款*****************************/
elseif($action=="getclause"){
	$sql="select *from shareclause_tab";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(is_array($rs)){
		$arr["success"]=1;
		$arr["id"]=$rs["id"];
		$arr["title"]=get_utf8($rs["title"]);
		$arr["content"]=get_utf8($rs["content"]);
		$arr["img"]=get_utf8($rs["img"]);
		
	}else{
		$arr["success"]=0;
	}
	mysql_free_result($rs);
	echo json_encode($arr);
}

/*************************添加用户完整资料*******************************/
elseif($action=="addfulldetail"){
	$age=stripslashes(trim($_POST["age"]));
	$industry=stripslashes(trim($_POST["industry"]));
	$addr=stripslashes(trim($_POST["addr"]));
	$id = $_SESSION["uid"];
	$sql = "update shareusr_tab set age=".$age.",industry=".$industry.",addr=".$addr." where id=".$id;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$arr["success"]=1;
		$arr["msg"]="添加成功";
	}else{
		$arr["success"]=0;
		$arr["msg"]="添加失败";
	}
	echo json_encode($arr);
}

/**********************生成邀请码******************************/
elseif($action=="addinvitecode"){
	$invitecode=stripslashes(trim($_POST["invitecode"]));
	$username=stripslashes(trim($_POST["username"]));
	$sql = "select invitecode from shareusr_tab where auth<>7 and binary invitecode='".$invitecode."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(!is_array($rs)){
		$sql="UPDATE shareusr_tab SET invitecode='".$invitecode."' WHERE usrname='".$username."' LIMIT 1";
		$stmt = mysql_query(get_gbk($sql),$conn);
		if($stmt){
			$arr["success"]=1;
		}else{
			$arr["success"]=2;
		}
	}else{
		$arr["success"]=0;
	}
	mysql_free_result($rs);
	echo json_encode($arr);
}



mysql_close($conn);
?>