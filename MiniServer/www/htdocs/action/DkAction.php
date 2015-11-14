<?php 
require_once 'EallAction.php';
class DkAction extends EallAction{
	
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("FY_DK t");
	}
	/**
	 * 获取某条房源的带看信息
	 * @param unknown_type $fyid
	 * @param unknown_type $type
	 * @return Ambigous <ListPage, multitype:unknown string >
	 */
	public function getDkListByFy($fyid,$type=""){
		$where=array();
		if($fyid!=""){
			array_push($where, "dk.FK_FYID='".$fyid."'");
		}
		if($type!=""){
			array_push($where, " TYPE='".$type."' ");
		}	
		return $this->getResultOfListpageWithPagesize(5
				,"max(INPUT_DATE) as INPUT_DATE,FK_USERID,FK_USERNAME USERNAME,COUNT(FK_XQID) C,u.TEL USERTEL,u.PHOTO USERPHOTO"
				,$where
				,"INPUT_DATE DESC"
				,"FY_DK dk LEFT JOIN XT_USER u ON dk.FK_USERID=u.ID"
				,"GROUP BY FK_FYID,FK_USERID");
	}
	/**
	 * 获取某经纪人的最新带看信息
	 * @param number $jjrid
	 * @param string $type
	 * @return Ambigous <ListPage, multitype:unknown string >
	 */
	public function getDkListByJjr($jjrid,$type=""){
		$where=array();
		if($jjrid!=""){
			array_push($where, "dk.FK_USERID='".$jjrid."'");
		}
		if($type!=""){
			array_push($where, " TYPE='".$type."' ");
		}
// 		return $this->getResultOfListpageWithPagesize(3
// 				,"DATE_FORMAT(dk.FK_FYID,dk.INPUT_DATE,'%Y-%m-%d') INDATE,fy.DISID,fy.DISNAME,fy.H_SHI,fy.H_TING,fy.BUILD_AREA,fy.PRICE"
// 				,$where
// 				,"dk.INPUT_DATE DESC"
// 				,"FY_DK dk LEFT inner JOIN FY fy ON dk.FK_FYID=fy.ID"
// 				,"");
		return $this->getResultOfListpageWithPagesize(3	
				,"dk.FK_FYID,DATE_FORMAT(dk.INPUT_DATE,'%Y-%m-%d') INDATE,fy.DISID,fy.DISNAME,fy.H_SHI,fy.H_TING,fy.BUILD_AREA,fy.PRICE"		
				,$where		
				,"dk.INPUT_DATE DESC"		
				,"FY_DK dk LEFT JOIN FY fy ON dk.FK_FYID=fy.ID"
				,"");
		
	}
	/**
	 * 获取带看冠军
	 * @param number $fyid
	 * @param string $type
	 * @return multitype:
	 */
	public function getDkGuanjun($fyid,$type=""){
		$sql="SELECT FK_USERID,FK_USERNAME USERNAME,u.TEL USERTEL,u.PHOTO USERPHOTO ";
		$sql.=" FROM FY_DK dk LEFT JOIN XT_USER u ON dk.FK_USERID=u.ID ";
		if($type!=""){
			$sql.=" where TYPE='".$type."'";
		}
		$sql.=" GROUP BY FK_FYID,FK_USERID ORDER BY COUNT(FK_XQID) DESC";
		return $this->getResultOfFirstrowBySql($sql);
	}
	
	/**
	 * 获取某房源的带看总数（N天内的带看次数）
	 * @param string $fyid 房源ID
	 * @param int $days 天数
	 * @return Ambigous <>
	 */
	public function getDkCountByFy($fyid,$days=0) {
		$where=array("CID='" . $this->cid . "' AND FK_FYID='" . $fyid . "'");
		if($days>0){
			array_push($where, " DATEDIFF(NOW(),INPUT_DATE)<=".$days);
		}
		$rs=$this->getResultOfFirstrow("count(1)",$where);
		return $rs[0];	
	}

	/**
	 * 获取某房源的带看客户总数（N天内的带看客户数）
	 * @param string $fyid
	 * @param int $days
	 * @return Ambigous <>
	 */
	public function getDkKhCountByFy($fyid,$days=0) {
		$where=array("CID='" . $this->cid . "' AND FK_FYID='" . $fyid . "'");
		if($days>0){
			array_push($where, " DATEDIFF(NOW(),INPUT_DATE)<=".$days);
		}
		$rs=$this->getResultOfFirstrow("count(distinct FK_XQID)",$where);
		return $rs[0];
	}
	/**
	 * 获取某经纪人的带看总房源数（N天内的带看客户数）
	 * @param string $fyid
	 * @param int $days
	 * @return Ambigous <>
	 */
	public function getDkJjrCountByFy($jjrid,$days=0) {
		$where=array("CID='" . $this->cid . "'");	
		if($jjrid!=""){
			array_push($where, "  FK_USERID='".$jjrid."' GROUP BY FK_USERID");
		}
		$rs=$this->getResultOfFirstrow("count(distinct FK_FYID)",$where);
		return $rs[0];
	}
	
	
	
}


?>