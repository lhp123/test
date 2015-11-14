<?php 
include_once 'INCLUDE.php';
session_start();
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
	$_SESSION["usrname"]=$rs["usrname"];
	$_SESSION["name"]=get_utf8($rs["name"]);
	$_SESSION["mphone"]=$rs["mphone"];
	$_SESSION["auth"]=$rs["auth"];
	$arr["success"]=1;
	$arr["msg"] = "登陆成功！";
	$arr["uid"]=$rs["id"];
	$arr["username"]=$rs["usrname"];
	$arr["name"]=get_utf8($rs["name"]);
	$arr["mphone"]=$rs["mphone"];
	$arr["auth"]=$rs["auth"];
	}else{
		$arr["success"]=0;
		$arr["msg"] = "用户名或密码错误！"; 

	}
	echo json_encode($arr);

}


/**************退出登录****************************/
elseif($action == "logout"){
	unset($_SESSION); 
    session_destroy(); 
    echo '1';
}

/**************检测用户名****************************/
elseif($action == "checkusr"){
	$username=stripslashes(trim($_POST["username"]));
	$sql="select id,usrname,name,mphone from shareusr_tab where usrname='".$username."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$rs= mysql_fetch_array($stmt);
	if(is_array($rs)){
		$arr["success"]=0;
		$arr["msg"] = "该用户名已被注册！"; 
	}else{
		$arr["success"]=1;
		$arr["msg"] = "该用户名可以使用！";
		}
	echo json_encode($arr);
}

/**************注册****************************/
elseif($action == "register"){
	$username=stripslashes(trim($_POST["username"]));
	$password=stripslashes(trim($_POST["password"]));
	$name=stripslashes(trim($_POST["name"]));
	$mphone=stripslashes(trim($_POST["mphone"]));
	$auth=1;
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
	$sql="insert into shareusr_tab(usrname,password,name,mphone,auth) values('".$username."','".$password."','".get_gbk($name)."','".$mphone."',".$auth.")";
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$sql = "select id,usrname,name,mphone,auth from shareusr_tab where usrname='".$username."'";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$_SESSION["uid"]=$rs["id"];
			$_SESSION["username"]=$rs["usrname"];
			$_SESSION["name"]=get_utf8($rs["name"]);
			$_SESSION["mphone"]=$rs["mphone"];
			$arr["success"]=1;
			$arr["msg"] = "注册成功！";
			$arr["uid"]=$rs["id"];
			$arr["username"]=$rs["usrname"];
			$arr["name"]=get_utf($rs["name"]);
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
	echo json_encode($arr);
}

/**************获取一手楼列表****************************/
elseif ($action=="getnhlist"){
		$state=stripslashes(trim($_POST["state"]));
		$sql="select id,title,img,state,commission,qty,type from sharenh_tab where state=".$state;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["id"]=$rs["id"];
			$detail["title"]=get_utf8($rs["title"]);
			$detail["img"]=$rs["img"];
			$detail["state"]=$rs["state"];
			$detail["commission"]=$rs["commission"];
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
		echo json_encode($arr);
}

/**************获取周全列表****************************/
elseif ($action=="getmorlist"){
		$state=stripslashes(trim($_POST["state"]));
		$sql="select id,title,img,state,commission,type from sharemor_tab where state=".$state;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["id"]=$rs["id"];
			$detail["title"]=get_utf8($rs["title"]);
			$detail["img"]=$rs["img"];
			$detail["state"]=$rs["state"];
			$detail["commission"]=$rs["commission"];
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
		echo json_encode($arr);
}

/**************获取一手楼详细****************************/
elseif ($action=="getnhdetail"){
		$id=stripslashes(trim($_POST["id"]));
		$sql="select id,title,img,state,content,commission,qty,attach,type from sharenh_tab where id=".$id;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["state"]=$rs["state"];
			$arr["content"]=get_utf8($rs["content"]);
			$arr["commission"]=$rs["commission"];
			$arr["qty"]=$rs["qty"];
			$arr["attach"]=$rs["attach"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		echo json_encode($arr);
}

/**************获取周全详细****************************/
elseif ($action=="getmordetail"){
		$id=stripslashes(trim($_POST["id"]));
		$sql="select id,title,img,state,content,commission,attach,type from sharenh_tab where id=".$id;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["state"]=$rs["state"];
			$arr["content"]=get_utf8($rs["content"]);
			$arr["commission"]=$rs["commission"];
			$arr["attach"]=$rs["attach"];
		}else{
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
	if(empty($commission)){
		echo "佣金不能为空！";
		exit;
	}
	if(empty($img)){
		echo "图片不能为空！";
		exit;
	}
	$sql="insert into sharenh_tab(title,content,attach,state,qty,commission,img,type) values('".$title."','".$content."','".$att."',".$state.",".$qty.",'".$commission."','".$img."',".$type.")";
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
	if(empty($commission)){
		echo "佣金不能为空！";
		exit;
	}
	if(empty($img)){
		echo "图片不能为空！";
		exit;
	}
	$sql="insert into sharemor_tab(title,content,att,state,qty,commission,img,type) values('".$title."','".$content."','".$att."',".$state.",".$qty.",'".$commission."','".$img."',".$type.")";
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
	if(empty($commission)){
		echo "佣金不能为空！";
		exit;
	}
	if(empty($img)){
		echo "图片不能为空！";
		exit;
	}
	$sql="update sharenh_tab set title='".$title."',content='".$content."',attach='".$att."',img='".$img."',commission='".$commission."',qty=".$qty.",state=".$state." where id=".$pid;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$sql="select id,title,img,state,content,commission,qty,attach,type from sharenh_tab where id=".$pid;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["state"]=$rs["state"];
			$arr["content"]=get_utf8($rs["content"]);
			$arr["commission"]=$rs["commission"];
			$arr["attach"]=$rs["attach"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="修改失败！";
		}
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
		echo "佣金不能为空！";
		exit;
	}
	if(empty($img)){
		echo "图片不能为空！";
		exit;
	}
	$sql="update sharemor_tab set title='".$title."',content='".$content."',attach='".$att."',img='".$img."',commission='".$commission."',state=".$state." where id=".$pid;
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$sql="select id,title,img,state,content,commission,attach,type from sharemor_tab where id=".$pid;
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["pid"]=$rs["id"];
			$arr["title"]=get_utf8($rs["title"]);
			$arr["img"]=$rs["img"];
			$arr["state"]=$rs["state"];
			$arr["content"]=get_utf8($rs["content"]);
			$arr["commission"]=$rs["commission"];
			$arr["attach"]=$rs["attach"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="修改失败！";
		}
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
	$auth=stripslashes(trim($_POST["auth"]));
	if(empty($username)){
		echo '用户名不能为空'; 
        exit; 
	}
	/*if(empty($password)){
		echo '密码不能为空'; 
        exit; 
	}*/
	if(empty($name)){
		echo '姓名不能为空'; 
        exit; 
	}
	if(empty($mphone)){
		echo '手机号不能为空'; 
        exit; 
	}
	if(empty($auth)){
		echo '权限不能为空'; 
        exit; 
	}
	$sql="update shareusr_tab set name='".get_gbk($name)."',mphone='".$mphone."',auth=".$auth." where usrname='".get_gbk($username)."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
	if($stmt){
		$sql="select usrname,name,mphone,auth from shareusr_tab where usrname='".$username."'";
		$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["username"]=$rs["usrname"];
			$arr["name"]=get_utf8($rs["name"]);
			$arr["mphone"]=$rs["mphone"];
			$arr["auth"]=$rs["auth"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="修改失败！";
		}
	}else{
		$arr["success"]=2;
		$arr["msg"]="修改失败！";
	}
	echo json_encode($arr);
}

/**************获取用户详细****************************/
elseif ($action=="getusrdetail"){
	$username=stripslashes(trim($_POST["username"]));
	if(empty($username)){
		echo '用户名不能为空'; 
        exit; 
	}
	$sql="select usrname,name,mphone,auth from shareusr_tab where usrname='".$username."'";
	$stmt = mysql_query(get_gbk($sql),$conn);
		$rs= mysql_fetch_array($stmt);
		if(is_array($rs)){
			$arr["success"]=1;
			$arr["username"]=$rs["usrname"];
			$arr["name"]=get_utf8($rs["name"]);
			$arr["mphone"]=$rs["mphone"];
			$arr["auth"]=$rs["auth"];
		}else{
			$arr["success"]=0;
			$arr["msg"]="没有数据！";
		}
		echo json_encode($arr);
}

/**************删除用户****************************/
elseif($action=="delusr"){
	$username=stripslashes(trim($_POST["username"]));
	if(empty($username)){
		echo '用户名不能为空'; 
        exit; 
	}
	$sql="delete from shareusr_tab where usrname='".$username."'";
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
	$sql="select usrname,name,mphone,auth from shareusr_tab";
	$stmt = mysql_query(get_gbk($sql),$conn);
	$data=array();
		while($rs = mysql_fetch_array($stmt)){
			$detail["usrname"]=$rs["usrname"];
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
		echo json_encode($arr);
}

/**************购买项目****************************/
 elseif ($action=="buypg"){
	$uid=stripslashes(trim($_POST["uid"]));
	$pid=stripslashes(trim($_POST["pid"]));
	$link=stripslashes(trim($_POST["link"]));
	$cphone=stripslashes(trim($_POST["cphone"]));
	$type=stripslashes(trim($_POST["type"]));
	$sql="insert into sharelink_tab(uid,pid,link,cphone,date,type) values(".$uid.",".$pid.",'".$link."','".$cphone."',SYSDATE(),".$type.")";
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

?>