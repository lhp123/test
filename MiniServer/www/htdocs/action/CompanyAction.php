<?php 
require_once 'EallAction.php';
class CompanyAction extends EallAction{
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("XT_COM t");
		
	}
	/**
	 * 获取二维码信息
	 * @param unknown_type $type
	 * @param unknown_type $position
	 * @return multitype:Ambigous <string, unknown> string
	 */
	public function get2WEI(){
		$where=array(" ID='".$this->cid."'");
		$result=$this->getResultOfListNoPage(0,"WXERWM,PADERWM,MBLERWM",$where,"");		
		$erwm=null;
		if($rs=mysql_fetch_array($result["result"])){
			$erwm=array("WXERWM"=>$rs["WXERWM"],"PADERWM"=>$rs["PADERWM"],"MBLERWM"=>$rs["MBLERWM"]);
		}
		return $erwm;
	}
	
	public function getQQ(){
		$where=array(" ID='".$this->cid."'");
		$result=$this->getResultOfListNoPage(0,"WXERWM,PADERWM,MBLERWM",$where,"");
		$erwm=null;
		if($rs=mysql_fetch_array($result["result"])){
			$erwm=array("WXERWM"=>$rs["WXERWM"],"PADERWM"=>$rs["PADERWM"],"MBLERWM"=>$rs["MBLERWM"]);
		}
		return $erwm;
	}
}
?>