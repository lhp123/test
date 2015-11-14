<?php 
require_once 'EallAction.php';
class KwAction extends EallAction{
	private $WEBTYPE="PC";
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("XT_KEYWORDS t");
		
	}
	/**
	 * 获取关键字
	 * @param unknown_type $type
	 * @param unknown_type $position
	 * @return multitype:Ambigous <string, unknown> string
	 */
	public function getTDK($type,$position=""){
		$where=array(" CID='".$this->cid."' and WEBTYPE='".$this->WEBTYPE."' ");
		if($type!=""){
			array_push($where," type='".$type."'");
		}
		if($position!=""){
			array_push($where, " position='".$position."'");
		}
		$result=$this->getResultOfListNoPage(0,"NAME,CONTENT",$where,"");		
		$t="";
		$d="";
		$k="";
		while($rs=mysql_fetch_array($result["result"])){
			if($rs["NAME"]=="TITLE") $t=$rs["CONTENT"];
			else if($rs["NAME"]=="DESCRIPTION") $d=$rs["CONTENT"];
			else if($rs["NAME"]=="KEYWORDS") $k=$rs["CONTENT"];			
		}
		return array("TITLE"=>$t,"DESCRIPTION"=>$d,"KEYWORDS"=>$k);
	}
}
?>