<?php 
require_once 'EallAction.php';
class XqAction extends EallAction{

	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("PZ_DIS t");
	}
	
	/**
	 * 小区列表查询
	 * @param unknown_type $pageSize 列表显示的条数，默认显示10条
	 * @return resource
	 */
	public function getXqList($pageSize=""){       
		if($pageSize=="") $pageSize=$this->pageSize;
		$where=array("CID='".$this->cid."' AND IFDELETED = 0");	
		
		$mohu=filterParaByName("mohu");
		if($mohu!=""){
			array_push($where, " CONCAT(IFNULL(PNAME,''),IFNULL(PPNAME,''),IFNULL(NAME,''),IFNULL(DESCRIPTION,''),IFNULL(ADDRESS,''),IFNULL(ZX,''),IFNULL(LX,''),IFNULL(JG,''),IFNULL(XZ,''),IFNULL(WYGS,'')) like '%".$mohu."%'");
		}
		
		$iftj=filterParaNumberByName("iftj");
		if($iftj!=""){
			array_push($where," if_tj=1 ");
		}
		
		$re1 = filterParaByName("re1");
		$re2 = filterParaByName("re2");
		if($re2!=""){
			array_push($where,"PNAME='".$re2."'");
		}elseif($re1!=""){
			array_push($where,"PPNAME='".$re1."'");
		}
		
		$pricedown = filterParaNumberByName("pricedown");
		$priceup =   filterParaNumberByName("priceup");
		if($pricedown!=""&&$priceup!=""){
			array_push($where,"JUNJIA >='".$pricedown."' AND JUNJIA <='".$priceup."'");
		}
		

		
		$zzlx = filterParaByName("zzlx");
		if($zzlx!=""){
			array_push($where,"YT='".$zzlx."'");
		}
		
		$jzlx = filterParaByName("jzlx");
		if($jzlx!=""){
			array_push($where,"JG='".$jzlx."'");
		}
		
		$jz_year = filterParaByName("jz_year");
		if($jz_year!=""){
			$y=explode("-", $jz_year);
			if(count($y)>1){
				array_push($where,"if(ND='','0',if(ND>=1000,EXTRACT(YEAR FROM NOW())-ND,ND))>=".$y[0]);
				array_push($where,"if(ND='','0',if(ND>=1000,EXTRACT(YEAR FROM NOW())-ND,ND))<=".$y[1]);
			}
		}
		
		
		$ordern = filterParaALLByName("ordern");
		if($ordern=="") $ordern="default";
		$ordert = filterParaALLByName("ordert");
		if($ordern=="default"){
			$ordern="TABORDER";
			$ordert="desc";
		}else{
			if($ordert=="up") $ordert="asc";
			else if($ordert=="down") $ordert="desc";
		}
	
		return $this->getResultOfListpage("*",$where,($ordern.$ordert!=""?$ordern." ".$ordert:""));
	}
	/**
	 * 通过ID获取小区详细信息
	 * @param string $xqid
	 * @param string $select
	 * @return multitype:
	 */
	public function XqDetail($xqid,$select=""){
		$where = array(" CID='".$this->cid."' and ifdeleted=0 and id='".$xqid."'");
		if($select=="") $select="*";
		return $this->getResultOfFirstrow($select,$where);
	}
	
	/**
	 * 获取推荐小区
	 * @param int $rows
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
	public function getTjXq($rows,$iftj="",$ifpic=""){
		$where=array(" CID='".$this->cid."' ");
		if($iftj!=""){
			if($iftj)
				array_push($where, " IF_ZD=1 ");
			else 
				array_push($where, " IF_ZD=0 ");
		}
		if($ifpic){
			array_push($where, "concat(sjt,bwt)!=''");
		}
		return $this->getResultOfListNoPage($rows,"",$where," IF_ZD DESC,TABORDER DESC");
	}
	public function doActionIn(){
		$action = filterParaAllByName("action");
	
		if($action=="searchByName"){
				
			$this->searchByName();
		}
	}
	
	/**
	 * 首页查询小区,输入小区名称,返回小区id,name
	 */
	public  function searchByName(){
		$where=array(" CID='".$this->cid."'  AND ifdeleted=0 ");
	
		$query = filterParaByName("q");
		if($query!=""){
			array_push($where, "NAME LIKE '%".$query."%'");
		}
		$limit = filterParaAllByName("limit");
		$result = $this->getResultOfListNoPage($limit,"ID,NAME",$where,"  TABORDER DESC");
		$arr =array();
		while ($rs = mysql_fetch_array($result["result"])){
			$array = array("id"=>$rs["ID"],"name"=>$rs["NAME"]);
			array_push($arr, $array);
		}
	
		echo $this->toJSON($arr);
	}
	
}



?>