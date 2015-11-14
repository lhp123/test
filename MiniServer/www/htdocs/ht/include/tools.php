<?php 
ob_start();
include_once 'include.php';
include_once ('HTML.php');
include_once ($webpath.'admin/include/ListPage.php');
include_once ($webpath.'admin/action/EallAction.php');
include_once ($webpath.'ht/action/LoginAction.php');
include_once ($webpath.'ht/action/ModelAction.php');
include_once ($webpath.'admin/action/RoleAction.php');
include_once ($webpath.'ht/action/PriAction.php');


$logincheck = new LoginAction($conn,$CID);
$logincheck->loginOut();
$logincheck->loginCheck();

$SPRI = $_SESSION['R_HT_PRI'];
$SPRI1 = $_SESSION['R_HT_PRI1'];
$SPRI2 = $_SESSION['R_HT_PRI2'];

$model = new ModelAction($conn, $CID);
$menu = $model->getMenu();
$menu1 = $menu["menu1"];
$menu2 = $menu["menu2"];

$role = new RoleAction($conn, $CID);

$pri = new PriAction($conn, $CID);



/*判断是否有权限*/
function ifHasPri($allpri,$checkpri,$return=""){
	if(strpos(";;".$allpri.";",";".$checkpri.";")>0){
		if($return!=""){ return $return;}
		return true;
	}
	return false;
}
 
function ifHasPriMohu($allpri,$checkpri,$return=""){
	if(strpos(";".$allpri.";",$checkpri)>0){
		if($return!=""){ return $return;}
		return true;
	}
	return false;
}

function ifHasPriL1($checkpri){
	if(ifSysRoot()) return true;
	$allpri=$_SESSION["R_HT_PRI1"];
	if(strpos(";;".$allpri.";",";".$checkpri.";")>0){
		return true;
	}
	return false;
}
function ifHasPriL2($checkpri){
	if(ifSysRoot()) return true;
	$allpri=$_SESSION["R_HT_PRI2"];
	if(strpos(";".$allpri.";",$checkpri)>0){
		return true;
	}
	return false;
}
function checkPriL2($checkpri,$useridval){
	if(ifHasPriL2($checkpri."BR")&&getUserid()==$useridval) return true;
	else if(ifHasPriL2($checkpri."SY")) return true;
	else return false;
}

/**
 * 通过一级权限获取查询条件
 * @param unknown_type $checkpri
 * @return string
 */
function getPriL1Con($checkpri){
	if($this->ifHasPriL1($checkpri)) return "";
	return "1=2";
}
/**
 * 通过二级权限获取查询条件
 * @param unknown_type $checkpri
 * @return string
 */
function getPriL2Con($checktype=0,$checkpri,$useridcol=""){
	if(ifSysRoot()) return "";
	if(ifHasPriL2($checkpri)){
		//区分本人和所有
		if($checktype==1){
			//本人
			if(ifHasPriL2($checkpri."BR")){
				return " ".$useridcol."='".getUserid()."' ";
			}
			//所有
			else if(ifHasPriL2($checkpri."SY")){
				return "";
			}
			return " 1=2 ";			
		}		
		//不区分本人和所有
		else if($checktype==0){
			return "";
		}
		return " 1=2 ";
	}
	return " 1=2 ";	
}

/**
 * 判断是否是ROOT
 * @return boolean
 */
function ifSysRoot(){
	if($_SESSION["R_HT_IFSYS"]==2) return true;
	return false;
}
/**
 * 判断是否是ADMIN
 * @return boolean
 */
function ifSysAdmin(){
	if($_SESSION["R_HT_IFSYS"]==1) return true;
	return false;
}

function getUserid(){
	return $_SESSION["R_HT_USERID"];
}
function getUsername(){
	return $_SESSION["R_HT_USERNAME"];
}

?>