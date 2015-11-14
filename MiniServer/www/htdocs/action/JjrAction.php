<?php 
require_once 'EallAction.php';
class JjrAction extends EallAction{
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("XT_USER t");
	}
	
	/**
	 * 经纪人列表查询
	 * @param unknown_type $pageSize 列表显示的条数，默认显示10条
	 * @return resource
	 */
	public function getJjrList($pageSize=""){		
		if($pageSize=="") $pageSize=$this->pageSize;
		$where=array("a.CID='".$this->cid."' AND a.IFDELETED = 0  AND d.IFDELETED = 0  and a.IF_SHOW=1");
		$re1 = filterParaByName("re1");
		$re2 = filterParaByName("re2");
		if($re2!=""){
			array_push($where,"a.RE2='".$re2."'");
		}
		if($re1!=""){
			array_push($where,"a.RE1='".$re1."'");
		}
		
		$mohu=filterParaByName("mohu");
		if ($mohu !=""){
			array_push($where, " CONCAT(IFNULL(a.RE1,''),IFNULL(a.re2,''),IFNULL(a.USERNAME,''),IFNULL(a.ZGXQ,''),IFNULL(a.FWSQ,''),IFNULL(d.DEPTNAME,'')) like '%".$mohu."%'");
		}		
		$ordern = filterParaALLByName("ordern");
		if($ordern=="") $ordern="default";
		if($ordern=="default"){
			$ordern="DK_NUM DESC";
		}else if($ordern=="zl"){
			$ordern="a.ZLFY_NUM DESC";
		}else if($ordern=="mm"){
			$ordern="a.MMFY_NUM DESC";
		}
	
		return $this->getResultOfListpage("a.*,d.DEPTNAME",$where,$ordern," XT_USER a LEFT JOIN XT_DEPT d ON a.FK_DEPTID=d.ID ");
	}
	
	
	/**
	 * 获取经纪人列表,不分页
	 * @param int $rows 获取多少条，为空时为全部
	 * @param boolean $iftj
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
	public function getJjr($rows,$iftj=""){

		$where=array(" CID = '".$this->cid."' and IF_SHOW = 1 AND IFDELETED = 0 ");

		if($iftj!=""){

			if($iftj){

				array_push($where, " IF_TJ = 1");

			}else if(!$iftj){

				array_push($where, " IF_TJ = 0");

			}

		}		

		return $this->getResultOfListNoPage($rows,"*",$where," TABORDER");	

	}
	
	/**
	 * 通过小区ID获取经纪人信息列表
	 * @param int $rows
	 * @param int $xqid
	 * @param boolean $iftj
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
	public function getJjrByXq($rows,$xqid,$iftj=""){
		$sql="select DISTINCT u.* from FY f,PZ_DIS d,XT_USER u ";
		$sql.=" where f.DISID=d.ID AND f.USERID=u.ID  and d.CID=f.CID and u.CID=f.CID ";
		$sql.=" and u.IFDELETED=0 and f.IFDELETED=0 and f.CID=".$this->cid." and d.id='".$xqid."' ";
		if($iftj!=""){
			if($iftj){
				$sql.=" and u.IF_TJ = 1";
			}else if(!$iftj){
				array_push($where, " and u.IF_TJ = 0");
			}
		}		
		$sql.=" ORDER BY TABORDER";
		return $this->getResultOfListNoPageBySql($sql);
	}
	
	/**
	 * 经纪人店铺点击率自增
	 * @param unknown_type $nid
	 * @return Ambigous <string, Ambigous>|string
	 */
	public function addJjrClick($nid){
		$success=$this->executeUpdate(array("NUM"=>"NUM+1"), "ID = '".$nid."'");
		if($success){
			return $this->getColValue("NUM","ID = '".$nid."'");
		}
		return "0";
	}
	/**
	 * 获取经纪人信息 
	 * @param unknown_type $jjrid
	 * @return multitype:
	 */
	public function getJjrDetail($jjrid){
		$sql="select u.*, d.DEPTNAME from XT_USER u LEFT JOIN XT_DEPT d on u.FK_DEPTID =d.ID where u.CID = '".$this->cid."' AND u.ID = '".$jjrid."' ";
		return $this->getResultOfFirstrowBySql($sql);
	}
	
}


?>