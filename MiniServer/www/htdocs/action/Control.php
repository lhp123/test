<?php
ob_start();
session_start();
require_once ('../include.php');
$_action=filterParaByName("a");
if($_action!=""){
	Control::getInstance($_action)->doAction($conn, $CID);
}

class Control{
	
 	static private $instance=null;
 	private $_action="";
 	
	private function __construct($classname){
		$this->_action=$classname;
	}
	static public function getInstance($classname){
		if(self::$instance==null){
			self::$instance=new Control($classname);
		}
		return self::$instance;
	}
	
	
	
	public function doAction($conn,$cid){		
		$allActions=array(
				"login"=>"LoginAction"
				,"loginht"=>"LoginHtAction"
				,"cj"=>"CjAction"
				,"dk"=>"DkAction"
				,"fy"=>"FyAction"
				,"jjr"=>"JjrAction"
				,"kw"=>"KwAction"
				,"lp"=>"LpAction"
				,"news"=>"NewsAction"
				,"photo"=>"PhotoAction"
				,"pj"=>"PjAction"
				,"xq"=>"XqAction"
				,"company"=>"CompanyAction"
		);		
		foreach ($allActions as $k=>$v){
			if($this->_action==$k){
				include_once (PATH_WEBROOT.'action/'.$v.".php");
				$a=new $v($conn,$cid);	
				$a->doAction();
				return;
			}
		}
	}
	
}
?>