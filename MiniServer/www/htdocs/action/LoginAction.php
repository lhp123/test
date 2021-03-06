<?php
require_once 'EallAction.php';
class LoginAction extends EallAction{
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("XT_USER");
	}
	
	protected function doActionIn(){
		$pa=$this->_paraArray;
		$action=filterParaAll($pa["action"]);
		if($action=="loginin"){
			$this->loginIn($pa);
		}
		else if($action=="loginout"){
			$this->loginOut();
		}
	}
	
	protected function doSaveActionIn(){
		$pa=$this->_paraArray;
		$action=filterParaAll($pa["action"]);
		
		if($action=="regist"){
			$this->regist($pa);
		}
	}
	
	protected function doDelActionIn(){
		$pa=$this->_paraArray;
		$action=filterParaAll($pa["action"]);
	}
	
	
	////////////////////////////////////////////////////////////////////////
	public function ifLogin(){
		$session_userid=$_SESSION["USERID"];
		$session_username=$_SESSION["USERNAME"];
		if($session_userid!="" && $session_username!=""){
			return true;
		}
		return false;
	}
	public function getLoginInfo(){
		$session_userid=$_SESSION["USERID"];
		$session_username=$_SESSION["USERNAME"];
// 		$session_deptid=$_SESSION["DEPTID"];
// 		$session_ifsys=$_SESSION["IFSYS"];
		return array("session_userid"=>$session_userid
				,"session_username"=>$session_username
				,"session_deptid"=>$session_deptid
				,"session_ifsys"=>$session_ifsys);
	}
	
	public function loginIn($pa){
		$loginname=filterPara($pa["loginname"]);
		$password=filterParaAll($pa["password"]);
		$logincode=filterParaAll($pa["logincode"]);
		$where="CID='".$this->cid."' AND LOGINNAME='".$loginname."'";
		$urs=$this->getResultOfFirstrow("*",$where);
		if($_SESSION["logincode"]==$logincode){
			if($urs["PASSWORD"]==$password){
				$_SESSION["USERID"]=$urs["ID"];
				$_SESSION["USERNAME"]=$urs["USERNAME"];
				$_SESSION["PASSWORD"]=$urs["PASSWORD"];				
				$_SESSION["LOGINNAME"]=$urs["LOGINNAME"];
				$_SESSION["DEPTID"]=$urs["FK_DEPTID"];
				$_SESSION["IFSYS"]=$urs["IFSYS"];
				$_SESSION["PRI"]=$urs["PRI"];
				$_SESSION["PRI1"]=$urs["PRI1"];
				$_SESSION["PRI2"]=$urs["PRI2"];
				
				$_SESSION["last_access"] = time();	
				$loginInfo=$this->getLoginInfo();
				echo $this->toJSON((array_merge_recursive($loginInfo,array("success"=>1,"errormsg"=>""))));
			}
			else{		
				echo $this->toJSON((array("success"=>0,"errormsg"=>"用户名不存在或密码错误")));
			}
		}else{
			echo $this->toJSON(array("success"=>0,"errormsg"=>"验证码错误"));
		}
	}
	
	public function loginOut(){
		$_SESSION["USERID"]="";
		$_SESSION['last_access'] ="";
		unset($_SESSION["USERID"]);
		unset($_SESSION["last_access"]);
		ob_end_flush();
		echo json_encode(array("success"=>1,"errormsg"=>""));
	}
	
	public function regist($pa){
		$loginname=filterPara($pa["loginname"]);
		$password=filterParaAll($pa["password"]);
		$registcode=filterParaAll($pa["registcode"]);
		$age=filterParaAll($pa["age"]);
// 		echo $_SESSION["registcode"].";".$registcode;
		if($_SESSION["registcode"]==$registcode){
			$where=array("CID='".$this->cid."'");
			array_push($where," loginname='".$loginname."'");
			if($this->getColValue("loginname",$where)!=""){
				echo $this->toJSON(array("success"=>0,"errormsg"=>"用户名已存在！"));
				return;
			}
			
			$insert=array("CID"=>$this->cid);
			$insert=array_merge_recursive($insert,array("loginname"=>"'".$loginname."'"));
			$insert=array_merge_recursive($insert,array("username"=>"'".$loginname."'"));
			$insert=array_merge_recursive($insert,array("password"=>"'".$password."'"));
			$insert=array_merge_recursive($insert,array("age"=>"'".$age."'"));
			if($this->executeInsert($insert)){
				echo $this->toJSON(array("success"=>1,"errormsg"=>"注册成功！"));
			}
		}else{
			echo $this->toJSON(array("success"=>0,"errormsg"=>"验证码错误"));
		}
		

	}
	
}
?>