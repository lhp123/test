<?php 
require_once 'EallAction.php';
class PjAction extends EallAction{
	
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("FY_PJ t");
	}
	
	/**
	 * 获取某房源的评价总数
	 *
	 * @param $disid 小区ID
	 * @param $cid
	 * @param $conn
	 * @return Ambigous <>
	 */
	function getPjCountByFy($fyid) {
		$where=array("CID='" . $this->cid . "' AND FK_FYID='" . $fyid . "'");
		$rs=$this->getResultOfFirstrow("count(1)",$where);
		return $rs[0];	
	}
	
	
	function getPjListByFy($fyid){
		$where = array("pj.CID='".$this->cid."' AND pj.FK_FYID='".$fyid."' and u.id = pj.FK_USERID");
		
		$select = "pj.TITLE,pj.CONTENT,(case when pj.MOD_DATE-pj.INPUT_DATE>0 then pj.MOD_DATE else pj.INPUT_DATE end ) as MOD_DATE,u.USERNAME,u.PHOTO,u.TEL";
		
		$sql = "select ".$select." from FY_PJ pj,XT_USER u where ".implode(" and ", $where)." order by pj.MOD_DATE DESC";
		//echo $sql ;
		$result = $this->getResultOfListNoPageBySql($sql);
		return $result;
	}
	
	
	
}



?>