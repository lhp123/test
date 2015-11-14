<?php 
require_once 'EallAction.php';
class CjAction extends EallAction{
	
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("FY_CJ t");
	}
	


	/**
	 * 获取小区成交房源列表
	 * @param string $disid
	 * @param int $rows
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
	function getCjFyByDis($disid,$type="",$rows=3){
		$sql="SELECT c.H_SHI,c.H_TING,c.BUILD_AREA,c.CJ_DATE,c.CJ_PRICE,c.CJ_PRICE*10000/c.BUILD_AREA,u.USERNAME,u.TEL USERTEL ";
		$sql.=" from FY_CJ c LEFT JOIN XT_USER u ON c.FK_USERID=u.ID ";
		$sql.=" where c.CID='".$this->cid."' and c.STATUS='有效' and type='".$type."' and c.ifdeleted=0 and c.FK_DISID='".$disid."'";
		if($rows!=""&&$rows>0){
			$sql.=" limit 0,".$rows;
		}
		// 		echo $sql;
		return $this->getResultOfListNoPageBySql($sql);
	}
	
	function getCj($rows=3){
		$sql="SELECT t.*,DATE_FORMAT(t.CJ_DATE,'%m月%d日') FMDATE from FY_CJ t where t.CID='".$this->cid."' and t.STATUS='有效' and t.ifdeleted=0 order by cj_date desc";
		if($rows!=""&&$rows>0){
			$sql.=" limit 0,".$rows;
		}
		// 		echo $sql;
		return $this->getResultOfListNoPageBySql($sql);
	}
	
	/**
	 * 统计当前月的小区成交均价
	 * @param strubg $disid 小区ID
	 * @return Ambigous <>
	 */
	function getXqCjJunjia_CurMonth($disid,$type="买卖") {
		$where=array("CID='" . $this->cid . "' and IFDELETED=0 and TYPE='".$type."' and STATUS='有效' AND FK_DISID='" . $disid . "' AND DATE_FORMAT(CJ_DATE,'%Y-%m')=DATE_FORMAT(NOW(),'%Y-%m')");
		if($type=="买卖"){
			$rs=$this->getResultOfFirstrow("AVG(CJ_PRICE/IFNULL(BUILD_AREA,1))",$where);
		}else{
			$rs=$this->getResultOfFirstrow("AVG(CJ_PRICE)",$where);
		}
		return $rs[0];
	
	}
	/**
	 * 统计1个月内的小区成交均价
	 * @param string $disid 小区ID
	 * @return Ambigous <>
	 */
	function getXqCjJunjia_OneMonth($disid,$days=30) {
		$where=array("CID='" . $this->cid . "' and IFDELETED=0 and STATUS='有效' AND FK_DISID='" . $disid . "' ");
		if($days!="")
			array_push($where," DATEDIFF(NOW(),CJ_DATE)<=".$days." ");
		$rs=$this->getResultOfFirstrow("AVG(CJ_PRICE/IFNULL(BUILD_AREA,1))",$where);
		return $rs[0];
	
	}
	/**
	 * 统计上月的小区成交均价
	 * @param unknown_type $disid
	 * @return Ambigous <>
	 */
	function getXqCjJunjia_LastMonth($disid) {
		$where=array(" CID='" . $this->cid . "' and IFDELETED=0 and STATUS='有效' AND FK_DISID='" . $disid . "' AND DATE_FORMAT(CJ_DATE,'%Y-%m')=DATE_FORMAT(date_sub(NOW(),interval 1 month),'%Y-%m') ");
		$rs=$this->getResultOfFirstrow("AVG(CJ_PRICE/IFNULL(BUILD_AREA,1))",$where);
		return $rs[0];
	}
	
	/**
	 * 统计小区成交总套数(N天内的成交套数)
	 * @param string $disid
	 * @param int $days
	 * @return Ambigous <>
	 */
	function getXqCjTaoshu($disid,$days=0) {
		$where=array(" CID='" . $this->cid . "' and IFDELETED=0 and STATUS='有效' AND FK_DISID='" . $disid . "' ");
		if($days>0){
			array_push($where, " DATEDIFF(NOW(),CJ_DATE)<=".$days);
		}
		$rs = $this->getResultOfFirstrow("count(1)",$where);
		return $rs [0];
	}
	
	/**
	 * 统计1个月内小区成交总套数
	 * @param string $disid
	 * @param string $where
	 * @return Ambigous <>
	 */
	function getXqCjTaoshu_OneMonth($disid,$type="",$days=30) {
		$where=array(" CID='" . $this->cid . "' and IFDELETED=0 and STATUS='有效' AND FK_DISID='" . $disid . "'");
		if($days!="")
			array_push($where," DATEDIFF(NOW(),CJ_DATE)<=".$days." ");
		if($type!=""){
			array_push($where, " type='".$type."'");
		}
		$rs = $this->getResultOfFirstrow("count(1)",$where);
		return $rs [0];
	}
	
/**
	 * 统计当前月内小区成交总套数
	 * @param string $disid
	 * @param string $where
	 * @return Ambigous <>
	 */
	function getXqCjTaoshu_CurMonth($disid,$type="买卖") {
		$where=array(" CID='" . $this->cid . "' and IFDELETED=0 and STATUS='有效' AND FK_DISID='" . $disid . "' and DATE_FORMAT(CJ_DATE,'%Y-%m')=DATE_FORMAT(NOW(),'%Y-%m')");
		if($type!=""){
			array_push($where, " type='".$type."'");
		}
		$rs = $this->getResultOfFirstrow("count(1)",$where);
		return $rs [0];
	}
	
	/**
	 * 统计近30天内小区成交,居室比例
	 * @param string $xqid
	 * @param string $type 租/售/无
	 * @param int $day 默认为0
	 */
	function getXqCjByShi($xqid,$type="买卖",$day=0) {
		
		$con = "";
		if($type!=""){
			$con .=" and type='".$type."'";
		}
		
		if($day>0){
			$con .=" AND DATEDIFF(NOW(),CJ_DATE)<= ".$day;
		}
		$sql = "SELECT H_SHI,COUNT(H_SHI) num FROM FY_CJ WHERE  CID='".$this->cid."' and IFDELETED=0 and STATUS='有效' AND FK_DISID='".$xqid."' ".$con." GROUP BY H_SHI";
		//echo $sql;
		$result = $this->getResultOfListNoPageBySql($sql);
		return  $result;
	}
	
	/**
	 * 统计近一年某小区 12个月成交均价
	 * @param string $xqid
	 * @param string $type
	 */
	function  getXqCjPrice_lastyear($xqid,$type="买卖"){
		$time = time();
		$m = date("n",$time);
		$time=mktime(0,0,0,date("m"),1,date("Y"));
		$categories = array();
	
		for ($i=0;$i<=12-$m;$i++){
			array_push($categories, "'".date("Y-m",strtotime("-1 year +".$i." month",$time))."'");
		}
		for ($i=$m;$i>=1;$i--){
			array_push($categories, "'".date("Y-m",strtotime(" -".$i." month",$time))."'");
		}
	
		$con = " STATUS='有效'  AND FK_DISID='".$xqid."' AND CID='".$this->cid."'";
		if($type!=""){
			$con.=" AND TYPE='".$type."'";
		}
		$con.=" AND LEFT(CJ_DATE,7) IN (".implode(",", $categories).")";
	
		$sql = "SELECT  RIGHT(a.date,5) date ,AVG(a.CJ_PRICE/IFNULL(a.BUILD_AREA,1))  price	FROM (
				SELECT LEFT(date_format(CJ_DATE,'%Y/%m'),7)  date , cj.*   FROM FY_CJ  cj WHERE ".$con."
			) a  GROUP BY a.date";
	
		//ECHO $sql;
		$result = $this->getResultOfListNoPageBySql($sql);
	
		return $result;
	
	}
	
	/**
	 * 统计仅1年成交价格
	 * @param string $type
	 *
	 */
	function getCjPrice_lastyear($type="买卖"){
		$time = time();
		$m = date("n",$time);
		$time=mktime(0,0,0,date("m"),1,date("Y"));
		$categories = array();
	
		for ($i=0;$i<=12-$m;$i++){
			array_push($categories, "'".date("Y-m",strtotime("-1 year +".$i." month",$time))."'");
		}
		for ($i=$m;$i>=1;$i--){
			array_push($categories, "'".date("Y-m",strtotime(" -".$i." month",$time))."'");
		}
	
		$con = " STATUS='有效'   AND CID='".$this->cid."'";
		if($type!=""){
			$con.=" AND TYPE='".$type."'";
		}
		$con.=" AND LEFT(CJ_DATE,7) IN (".implode(",", $categories).")";
	
		$sql = "SELECT  RIGHT(a.date,5) date ,AVG(a.CJ_PRICE/IFNULL(a.BUILD_AREA,1))  price	FROM (
				SELECT LEFT(CJ_DATE,7)  date , cj.*   FROM FY_CJ  cj WHERE ".$con."
			) a  GROUP BY a.date";
	
		//ECHO $sql;
		$result = $this->getResultOfListNoPageBySql($sql);
	
		return $result;
	}
	
	/**
	 * 统计当前月总的成交均价
	 * @return Ambigous <>
	 */
	function getCjJunjia_CurMonth(){
		$where=array("CID='" . $this->cid . "' and IFDELETED=0 and STATUS='有效' AND DATE_FORMAT(CJ_DATE,'%Y-%m')=DATE_FORMAT(NOW(),'%Y-%m')");
		$rs=$this->getResultOfFirstrow("AVG(CJ_PRICE/IFNULL(BUILD_AREA,1))",$where);
		return round($rs[0],1);
	}
	function getMmCjJunjia_CurMonth(){
		$where=array("CID='" . $this->cid . "' and IFDELETED=0 and STATUS='有效' AND TYPE='买卖' and DATE_FORMAT(CJ_DATE,'%Y-%m')=DATE_FORMAT(NOW(),'%Y-%m')");
		$rs=$this->getResultOfFirstrow("AVG(CJ_PRICE/IFNULL(BUILD_AREA,1))",$where);
		return round($rs[0],1);
	}
	/**
	 * 统计上月总的成交均价
	 * @return Ambigous <>
	 */
	function getCjJunjia_LastMonth() {
		$where=array(" CID='" . $this->cid . "' and IFDELETED=0 and STATUS='有效'  AND DATE_FORMAT(CJ_DATE,'%Y-%m')=DATE_FORMAT(date_sub(NOW(),interval 1 month),'%Y-%m') ");
		$rs=$this->getResultOfFirstrow("AVG(CJ_PRICE/IFNULL(BUILD_AREA,1))",$where);
		return round($rs[0],1);
	}
	
	
	
}


?>