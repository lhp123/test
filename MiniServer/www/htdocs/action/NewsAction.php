<?php 
require_once 'EallAction.php';
class NewsAction extends EallAction{
	
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("XT_NEWS");
	}
	
	/**
	 * 新闻列表查询
	 * @param int $pageSize 列表显示的条数，默认显示10条
	 * @return resource
	 */
	public function getNewsList($pageSize=""){		
		if($pageSize!="") $this->setPagesize($pageSize);
		$where=array("CID='".$this->cid."'");
		
		$type = filterParaByName("type");		
		if($type!=""){
			array_push($where,"TYPE='".$type."'");
		}
		
		$subtype = filterParaByName("subtype");
		if($subtype!=""){
			array_push($where,"SUBTYPE='".$subtype."'");
		}		

		$ordern = filterParaALLByName("ordern");
		if($ordern=="") $ordern="default";
		$ordert = filterParaALLByName("ordert");
		if($ordern=="default"){
			$ordern="INPUT_DATE";
			$ordert="DESC";
		}else{
			if($ordert=="up") $ordert="asc";
			else if($ordert=="down") $ordert="desc";
		}
		return $this->getResultOfListpage("*",$where,($ordern.$ordert!=""?$ordern." ".$ordert:""));
	}
	/**
	 * 查找某新闻类型或子类型下的新闻信息
	 * @param int $rows 	查找记录数
	 * @param string $type	新闻类型
	 * @param string $subtype	新闻子类型
	 * @param string $orderby	排序方式
	 * @param string $where		附加条件
	 * @return multitype:resource array
	 */	
	public function getNewsByType($rows=6,$type="",$subtype="",$orderby="",$where=""){
		$where_=array(" CID='".$this->cid."' ");
		if($where_!=""){
			array_push($where_, $where);
		}
		if($type!=""){
			array_push($where_, " TYPE='".$type."'");
		}
		if($subtype!=""){
			array_push($where_," SUBTYPE='".$subtype."'");
		}
		return $this->getResultOfListNoPage($rows,"",$where_,($orderby!=""?$orderby:" INPUT_DATE DESC"));
	}
	
	/**
	 * 获取某新闻类型的所有子类型
	 * @param string $type
	 * @return multitype:resource unknown
	 */
	public function getSubtypeByType($type){
		$where=" where TYPE='".$type."' and CID='".$this->cid."' ";		
		return $this->getResultOfListNoPageBySql("select NAME from PZ_PROFILE_SUB ".$where." order by taborder");
	}
	
	/**
	 * 获取业主谈小区信息
	 * @param int $rows
	 * @return multitype:resource unknown
	 */
	public function getYztxq($rows){		
		$type="业主谈小区";		
		$where=" where t.TYPE='".$type."' AND t.CID = '".$this->cid."' ";
		if($rows!="" && $rows>0){
			$where.="  limit 0,".$rows;
		}
		$tables=" ".$this->getTable()." as t inner JOIN PZ_DIS D ON t.DISNAME = D.NAME ";
 		//echo "select t.*,D.ID DID,D.NAME DISNAME ,D.PNAME ,D.ADDRESS,D.JUNJIA, D.SJT DPHOTO from ".$tables." ".$where;
		return $this->getResultOfListNoPageBySql("select t.*,D.ID DID,D.NAME DISNAME ,D.PNAME ,D.ADDRESS,D.JUNJIA, D.SJT DPHOTO from ".$tables." ".$where);
	}
	/**
	 * 根据ID获取一条新闻
	 * @param int $nid
	 * @param string $select
	 */
	public function getNewsDetail($nid,$select=""){
		$where = " CID='".$this->cid."' and id='".$nid."'";
		return $this->getResultOfFirstrow($select,$where);
	}
	/**
	 * 新闻点击率+1
	 * @param unknown_type $nid
	 * @return Ambigous <string, Ambigous>|string
	 */
	public function addNewsClick($nid){
		$success=$this->executeUpdate(array("NUM"=>"NUM+1"), "ID = '".$nid."'");
		if($success){
			return $this->getColValue("NUM","ID = '".$nid."'");
		}
		return "0";
	}
	/**
	 * 感兴趣的新闻
	 * 查询规则：最新录入的显示在最前台，日期相同的按点击率倒序
	 * @param string $type
	 * @return resource
	 */
	public function getXingquNews($rows=6,$type=""){
		$where=array("cid='".$this->cid."'");
		if($type!=""){
			array_push($where, " type='".$type."'");
		}
		return $this->getResultOfListNoPage($rows,"",$where," input_date desc,num desc");
	}
	/**
	 * 大家关注的新闻
	 * 查询规则：点击率高的排在最前面
	 * @return resource
	 */
	public function getGuanzhuNews($rows=6){
		return $this->getResultOfListNoPage($rows,""," cid='".$this->cid."' "," num desc ");
	}
	/**
	 * 大家关注的新闻类型
	 * 查询规则：点击率高的排在最前面
	 * @param unknown_type $rows
	 * @return resource
	 */
	public function getGuanzhuNewsType($rows=6){
		return $this->getResultOfListNoPage($rows,"distinct TYPE,SUBTYPE","cid='".$this->cid."'","num desc");
	}
	
	/**
	 * 获取某类型新闻的总条数
	 * @param unknown_type $type
	 * @param unknown_type $subtype
	 * @return Ambigous <>
	 */
	public function getNewscountByType($type,$subtype){
		$rs=$this->getResultOfFirstrow("count(1)","cid='".$this->cid."' and type='".$type."' and subtype='".$subtype."'");
		return $rs[0];
	}

	
	
	
}


?>