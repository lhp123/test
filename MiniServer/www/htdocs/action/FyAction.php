<?php 
require_once 'EallAction.php';
class FyAction extends EallAction{
	
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("FY t");
	}	
	
	/**
	 * 买卖房源列表查询
	 * @param unknown_type $pageSize 列表显示的条数，默认显示10条
	 * @return resource
	 */
	public function getMmFyList($pageSize=""){		
		if($pageSize!="") $this->setPagesize($pageSize);
		$where=array("CID='".$this->cid."' AND IFDELETED = 0  and if_show=1 AND TYPE='出售'");
		$mohu=filterParaByName("mohu");
		if($mohu!=""){
			array_push($where, " CONCAT(IFNULL(CONTRACT_CODE,''),IFNULL(re1,''),IFNULL(re2,''),IFNULL(disname,''),IFNULL(lables,''),IFNULL(direction,''),IFNULL(fitment,''),IFNULL(title,'')) like '%".$mohu."%'");
		}
	    $types=filterParaByName("types");
		if($types=="个人"){
			array_push($where, " if_tb=0 ");
		}				
		$ifdj=filterParaNumberByName("ifdj");
		if($ifdj!=""){
			array_push($where, " if_dj=1 ");
		}
		$ifyz=filterParaNumberByName("ifyz");
		if($ifyz!=""){
			array_push($where, " if_yz=1 ");
		}
		$iftj=filterParaNumberByName("iftj");
		if($iftj!=""){
			array_push($where, " if_tj=1 ");
		}
		$xqid=filterParaByName("xqid");
		if($xqid!=""){
			array_push($where, " disid='".$xqid."' ");
		}
		$jjrid=filterParaNumberByName("jjrid");
		if($jjrid!=""){
			array_push($where, " userid='".$jjrid."' ");
		}		
		$re1 = filterParaByName("re1");
		$re2 = filterParaByName("re2");
		if($re2!=""){
			array_push($where,"RE2='".$re2."'");
		}elseif($re1!=""){
			array_push($where,"RE1='".$re1."'");
		}
		
		$disname=filterParaByName("disname");
		if($disname!=""){
			array_push($where, " disname='".$disname."' ");
		}
		
		
		$pricedown = filterParaNumberByName("pricedown");
		$priceup =   filterParaNumberByName("priceup");
		if($pricedown!=""&&$priceup!=""){
			array_push($where,"PRICE >='".$pricedown."' AND PRICE <='".$priceup."'");
		}
		
		$areadown = filterParaNumberByName("areadown");
		$areaup =   filterParaNumberByName("areaup");
		if($areadown!=""&&$areaup!=""){
			array_push($where,"BUILD_AREA >='".$areadown."' AND BUILD_AREA <='".$areaup."'");
		}
		
		$shi = filterParaNumberByName("shi");
		if($shi!=""){
			if($shi==1)
				array_push($where,"H_SHI=1");
			else if($shi==2)
				array_push($where,"H_SHI=2");
			else if($shi==3)
				array_push($where,"H_SHI=3");
			else if($shi==4)
				array_push($where,"H_SHI=4");
			else if($shi==5)
				array_push($where,"H_SHI=5");
			else if($shi>5)
				array_push($where,"H_SHI>5");
		}
		
		$chaoxiang = filterParaByName("chaoxiang");
		if($chaoxiang!=""){
			array_push($where,"DIRECTION='".$chaoxiang."'");
		}
		
		$jz_year = filterParaByName("jz_year");
		if($jz_year!=""){
			$y=explode("-", $jz_year);
			if(count($y)>1){
				array_push($where,"if(JZ_YEAR='','0',if(JZ_YEAR>=1000,EXTRACT(YEAR FROM NOW())-JZ_YEAR,JZ_YEAR))>=".$y[0]);
				array_push($where,"if(JZ_YEAR='','0',if(JZ_YEAR>=1000,EXTRACT(YEAR FROM NOW())-JZ_YEAR,JZ_YEAR))<=".$y[1]);
			}
		}
		
		$floor = filterParaByName("floor");
		if($floor!=""){
			array_push($where,"CASE WHEN FLOOR<1 THEN '地下室' WHEN FLOOR/TOP_FLOOR>2/3 THEN '高层' WHEN FLOOR/TOP_FLOOR<1/3 THEN '低层' ELSE '中层' END='".$floor."'");
		}
		
		$label = filterParaByName("label");
		if($label!=""){
			array_push($where,"LOCATE(';".$label.";',CONCAT(';',LABLES))>0");
		}
		
		$ordern = filterParaALLByName("ordern");
		if($ordern=="") $ordern="default";
		$ordert = filterParaALLByName("ordert");
		if($ordern=="default"){
			$ordern="IF_TB DESC,LAST_OPER_DATE DESC,FPNUM";
			$ordert="DESC";
		}else{
			if($ordert=="up") $ordert="asc";
			else if($ordert=="down") $ordert="desc";
		}
		
		return $this->getResultOfListpage("*",$where,($ordern.$ordert!=""?$ordern." ".$ordert:""));
	}
	/**

	 * 同小区买卖房源列表查询

	 * @param unknown_type $pageSize 列表显示的条数，默认显示10条

	 * @return resource

	 */

	public function getMmFyList1($pageSize="",$xqid){		

		if($pageSize!="") $this->setPagesize($pageSize);

		$where=array("a.CID='".$this->cid."' AND a.IFDELETED = 0  and a.if_show=1 AND a.TYPE='出售' AND a.DISID=b.ID ");

		if ($xqid!=""){
			array_push($where, " a.DISID='".$xqid."'");
		}else{
			array_push($where, " 1=2 ");
		}
		
		$pricedown = filterParaNumberByName("pricedown");
		
		$priceup =   filterParaNumberByName("priceup");
		
		if($pricedown!=""&&$priceup!=""){
		
			array_push($where,"PRICE >='".$pricedown."' AND PRICE <='".$priceup."'");
		
		}
		
		
		
		$areadown = filterParaNumberByName("areadown");
		
		$areaup =   filterParaNumberByName("areaup");
		
		if($areadown!=""&&$areaup!=""){
		
			array_push($where,"BUILD_AREA >='".$areadown."' AND BUILD_AREA <='".$areaup."'");
		
		}
		
		
		
		$shi = filterParaNumberByName("shi");
		
		if($shi!=""){
		
			if($shi==1)
		
				array_push($where,"H_SHI=1");
		
			else if($shi==2)
		
				array_push($where,"H_SHI=2");
		
			else if($shi==3)
		
				array_push($where,"H_SHI=3");
		
			else if($shi==4)
		
				array_push($where,"H_SHI=4");
		
			else if($shi==5)
		
				array_push($where,"H_SHI=5");
		
			else if($shi>5)
		
				array_push($where,"H_SHI>5");
		
		}

		$ordern = filterParaALLByName("ordern");

		if($ordern=="") $ordern="default";

		$ordert = filterParaALLByName("ordert");

		if($ordern=="default"){

			$ordern="a.IF_TB DESC,LAST_OPER_DATE DESC,a.FPNUM";

			$ordert="DESC";

		}else{

			if($ordert=="up") $ordert="asc";

			else if($ordert=="down") $ordert="desc";

		}

		

		return $this->getResultOfListpage("a.*",$where,($ordern.$ordert!=""?$ordern." ".$ordert:""),"FY a,PZ_DIS b");

	}
	
	/**
	 * 租赁房源列表查询
	 * @param unknown_type $pageSize 列表显示的条数，默认显示10条
	 * @return resource
	 */
	public function getZlFyList($pageSize=""){
		if($pageSize!="") $this->setPagesize($pageSize);
		$where=array("CID='".$this->cid."' AND IFDELETED = 0  and if_show=1 AND TYPE='出租'");
		
		$mohu=filterParaByName("mohu");
		if($mohu!=""){
			array_push($where, " CONCAT(IFNULL(CONTRACT_CODE,''),IFNULL(re1,''),IFNULL(re2,''),IFNULL(disname,''),IFNULL(lables,''),IFNULL(direction,''),IFNULL(fitment,''),IFNULL(title,'')) like '%".$mohu."%'");
			
		}
	    $types=filterParaByName("types");
		if($types=="个人"){
			array_push($where, " if_tb=0 ");
		}
		$ifdj=filterParaNumberByName("ifdj");
		if($ifdj!=""){
			array_push($where, " if_dj=1 ");
		}
		$ifyz=filterParaNumberByName("ifyz");
		if($ifyz!=""){
			array_push($where, " if_yz=1 ");
		}
		$iftj=filterParaNumberByName("iftj");
		if($iftj!=""){
			array_push($where, " if_tj=1 ");
		}
		$xqid=filterParaByName("xqid");
		if($xqid!=""){
			array_push($where, " disid='".$xqid."' ");
		}
		$jjrid=filterParaNumberByName("jjrid");
		if($jjrid!=""){
			array_push($where, " userid='".$jjrid."' ");
		}		
		$re1 = filterParaByName("re1");
		$re2 = filterParaByName("re2");
		if($re2!=""){
			array_push($where,"RE2='".$re2."'");
		}elseif($re1!=""){
			array_push($where,"RE1='".$re1."'");
		}
		
		$disname=filterParaByName("disname");
		if($disname!=""){
			array_push($where, " disname='".$disname."' ");
		}
	
		$pricedown = filterParaNumberByName("pricedown");
		$priceup =   filterParaNumberByName("priceup");
		if($pricedown!=""&&$priceup!=""){
			array_push($where,"PRICE >='".$pricedown."' AND PRICE <='".$priceup."'");
		}
	
		$areadown = filterParaNumberByName("areadown");
		$areaup =   filterParaNumberByName("areaup");
		if($areadown!=""&&$areaup!=""){
			array_push($where,"BUILD_AREA >='".$areadown."' AND BUILD_AREA <='".$areaup."'");
		}
	
		$shi = filterParaNumberByName("shi");
		if($shi!=""){
			if($shi==1)
				array_push($where,"H_SHI=1");
			else if($shi==2)
				array_push($where,"H_SHI=2");
			else if($shi==3)
				array_push($where,"H_SHI=3");
			else if($shi==4)
				array_push($where,"H_SHI=4");
			else if($shi==5)
				array_push($where,"H_SHI=5");
			else if($shi>5)
				array_push($where,"H_SHI>5");
		}
	
		$chaoxiang = filterParaByName("chaoxiang");
		if($chaoxiang!=""){
			array_push($where,"DIRECTION='".$chaoxiang."'");
		}
	
		$fw_year = filterParaByName("fw_year");
		if($fw_year!=""){
			$y=explode("-", $fw_year);
			if(count($y)>1){
				array_push($where,"if(JZ_YEAR='','0',if(JZ_YEAR>=1000,EXTRACT(YEAR FROM NOW())-JZ_YEAR,JZ_YEAR))>=".$y[0]);
				array_push($where,"if(JZ_YEAR='','0',if(JZ_YEAR>=1000,EXTRACT(YEAR FROM NOW())-JZ_YEAR,JZ_YEAR))<=".$y[1]);
			}
		}
	
		$floor = filterParaByName("floor");
		if($floor!=""){
			array_push($where,"CASE WHEN FLOOR<1 THEN '地下室' WHEN FLOOR/TOP_FLOOR>2/3 THEN '高层' WHEN FLOOR/TOP_FLOOR<1/3 THEN '低层' ELSE '中层' END='".$floor."'");
		}
	
		$label = filterParaByName("label");
		if($label!=""){
			array_push($where,"LOCATE(';".$label.";',CONCAT(';',LABLES))>0");
		}
	
		$ordern = filterParaALLByName("ordern");
		if($ordern=="") $ordern="default";
		$ordert = filterParaALLByName("ordert");
		if($ordern=="default"){
			$ordern="LAST_OPER_DATE DESC,FPNUM";
			$ordert="DESC";
		}else{
			if($ordert=="up") $ordert="asc";
			else if($ordert=="down") $ordert="desc";
		}
		
		return $this->getResultOfListpage("t.*,DATE_FORMAT(t.LAST_OPER_DATE ,'%m-%d') as FBDATE",$where,($ordern.$ordert!=""?$ordern." ".$ordert:""));
		
	}
	
/**

	 * 同小区租赁房源列表查询

	 * @param unknown_type $pageSize 列表显示的条数，默认显示10条

	 * @return resource

	 */

	public function getZlFyList1($pageSize="",$xqid){

		if($pageSize!="") $this->setPagesize($pageSize);

		$where=array("a.CID='".$this->cid."' AND a.IFDELETED = 0  and a.if_show=1 AND a.TYPE='出租' AND a.DISID=b.ID");

		

		$mohu=filterParaByName("mohu");

		if ($xqid!=""){
			array_push($where, " a.DISID='".$xqid."' ");
		}else{
			array_push($where, " 1=2 ");
		}
		 
		$pricedown = filterParaNumberByName("pricedown");
		
		$priceup =   filterParaNumberByName("priceup");
		
		if($pricedown!=""&&$priceup!=""){
		
			array_push($where,"PRICE >='".$pricedown."' AND PRICE <='".$priceup."'");
		
		}
		
		
		
		$areadown = filterParaNumberByName("areadown");
		
		$areaup =   filterParaNumberByName("areaup");
		
		if($areadown!=""&&$areaup!=""){
		
			array_push($where,"BUILD_AREA >='".$areadown."' AND BUILD_AREA <='".$areaup."'");
		
		}
		
		
		
		$shi = filterParaNumberByName("shi");
		
		if($shi!=""){
		
			if($shi==1)
		
				array_push($where,"H_SHI=1");
		
			else if($shi==2)
		
				array_push($where,"H_SHI=2");
		
			else if($shi==3)
		
				array_push($where,"H_SHI=3");
		
			else if($shi==4)
		
				array_push($where,"H_SHI=4");
		
			else if($shi==5)
		
				array_push($where,"H_SHI=5");
		
			else if($shi>5)
		
				array_push($where,"H_SHI>5");
		
		}

		$ordern = filterParaALLByName("ordern");

		if($ordern=="") $ordern="default";

		$ordert = filterParaALLByName("ordert");

		if($ordern=="default"){

			$ordern="a.LAST_OPER_DATE DESC,a.FPNUM";

			$ordert="DESC";

		}else{

			if($ordert=="up") $ordert="asc";

			else if($ordert=="down") $ordert="desc";

		}

		

		return $this->getResultOfListpage("a.*",$where,($ordern.$ordert!=""?$ordern." ".$ordert:"")," FY a,PZ_DIS b ");

		

	}
	
	/**
	 * 通过FYID得到房源详细信息
	 * @param string $fyid
	 * @param string $yewu
	 * @return multitype:
	 */
	public function getFyDetail($fyid,$select=""){
		$where = array(" CID='".$this->cid."' and ifdeleted=0 and id='".$fyid."'");
		if($select=="") $select="*";
		return $this->getResultOfFirstrow($select,$where);
	}
	/**
	 * 通过FYID得到房源详细，联合查询用户信息。
	 * @param string $fyid
	 * @return multitype:
	 */
	public function getFyDetailWithUser($fyid){
		$sql=" select fy.*,u.TEL USERTEL,u.PHOTO USERPHOTO from FY fy left join XT_USER u on u.id=fy.userid where fy.CID='".$this->cid."' and fy.ifdeleted=0  and fy.if_show=1 and fy.id='".$fyid."'";		
		return $this->getResultOfFirstrowBySql($sql);
	}

	/**
	 * 获取相似条件的房源
	 * @param string $fyid
	 * @param int $rows
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
	public function getSimilarFy($fyid,$rows,$type="出售"){
		$where=array(" CID='".$this->cid."' and ifdeleted=0  and if_show=1 and id='".$fyid."' AND TYPE='".$type."'");
		$rs=$this->getResultOfFirstrow("*",$where);
		$disname=$rs["DISNAME"];
		$area=$rs["BUILD_AREA"];
		$junjia=$rs["JUNJIA"];
		$h_shi=$rs["H_SHI"];
		$floor=$rs["FLOOR"]/($rs["TOP_FLOOR"]==""?1:$rs["TOP_FLOOR"]);
		
		$where=array("CID='".$this->cid."' and ifdeleted=0 and id!='".$fyid."'");
		if($disname!=""){
			array_push($where," disname='".$disname."'");
		}
		if($area!=""){
			array_push($where, " build_area between ".($area-10)." and ".($area+10));
		}
		if($junjia!=""){
			array_push($where, " junjia between ".($junjia-2000)." and ".($junjia+2000));
		}
		if($h_shi!=""){
			array_push($where, " h_shi <= ".$h_shi);
		}
		if($floor!=""){
			if($floor<1/3){
				array_push($where, " floor/top_floor<1/3 ");
			}
			else if($floor>2/3){
				array_push($where, " floor/top_floor>2/3 ");
			}
			else {
				array_push($where, " floor/top_floor between 1/3 and 2/3 ");
			}			
		}	

		return $this->getResultOfListNoPage($rows,"",$where," LAST_OPER_DATE desc");
	}


	
	/**
	 * 获取独家新上房_首页
	 * @param int $rows
	 * @param string $type
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
	public function getDjNewFyForIndex($rows,$type="出售",$day=0,$ifdj=""){
		$where=array(" CID='".$this->cid."' and ifdeleted=0 and if_show=1 and length(photo)-length(replace(photo,';',''))>=3 ");
		if($day>0){
			array_push($where, " DATEDIFF(NOW(),LAST_OPER_DATE)<=".$day." ");
		}
		if($ifdj!=""){
			if($ifdj){
				array_push($where, " IF_DJ=1 ");
			}else if(!$ifdj){
				array_push($where, " IF_DJ=0 ");
			}
		}		
		if($type!=""){
			array_push($where, " TYPE='".$type."' ");
		}
		return $this->getResultOfListNoPage($rows,"*",$where," IF_DJ DESC,(case when DATEDIFF(INPUT_DATE,IFNULL(LAST_OPER_DATE,INPUT_DATE))>=0 then INPUT_DATE else LAST_OPER_DATE end ) DESC ");		
	}
	/**
	 * 获取优质房源_首页
	 * @param int $rows
	 * @param string $type
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
	public function getYzFyForIndex($rows,$type="出售",$ifyz=""){
		$where=array(" CID='".$this->cid."' and ifdeleted=0 and if_show=1 and length(photo)-length(replace(photo,';',''))>=3 ");
		if($type!=""){
			array_push($where, " TYPE='".$type."' ");
		}
		if($ifyz!=""){
			if($ifyz){
				array_push($where, " IF_YZ=1 ");
			}else if(!$ifyz){
				array_push($where, " IF_YZ=0 ");
			}
		}
		return $this->getResultOfListNoPage($rows,"*",$where," IF_YZ DESC,(case when DATEDIFF(INPUT_DATE,IFNULL(LAST_OPER_DATE,INPUT_DATE))>=0 then INPUT_DATE else LAST_OPER_DATE end ) DESC ");
	}
	/**
	 * 获取推荐房源
	 * @param int $rows
	 * @param string $type
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
	public function getFyForIndex($rows,$type="出售",$iftj=""){
		$where=array(" CID='".$this->cid."' and ifdeleted=0 and if_show=1 ");
		if($iftj!=""){
			if($iftj){
				array_push($where, " IF_TJ=1 ");
			}else if(!$iftj){
				array_push($where, " IF_TJ=0 ");
			}
		}
		if($type!=""){
			array_push($where, " TYPE='".$type."' ");
		}
		return $this->getResultOfListNoPage($rows,"*",$where," IF_TJ DESC,(case when DATEDIFF(INPUT_DATE,IFNULL(LAST_OPER_DATE,INPUT_DATE))>=0 then INPUT_DATE else LAST_OPER_DATE end ) DESC ");
	}
	
	
	/**
	 * 获取某小区在售房源列表
	 * @param int $rows
	 * @param string $disid
	 * @param string $type
	 * @param boolean $iftj 是否推荐
	 * @return Ambigous <>
	 */
	public function getFyByDis($rows,$disid="",$type="",$iftj=""){
		$where=array(" CID='".$this->cid."' and ifdeleted=0  and if_show=1 ");
		if($disid!=""){
			array_push($where, " disid='".$disid."' ");
		}
		if($type!=""){
			array_push($where," type='".$type."'");
		}
		if($iftj!=""){
			if($iftj){
				array_push($where, " if_tj=1 ");
			}else if(!$iftj){
				array_push($where, " if_tj=0 ");
			}
		}
		return $this->getResultOfListNoPage($rows,"*",$where," LAST_OPER_DATE DESC");
	}
	
	
	/**
	 * 获取某经纪人在售房源列表
	 * @param int $rows
	 * @param string $disid
	 * @param string $type
	 * @param boolean $iftj 是否推荐
	 * @return Ambigous <>
	 */
	public function getFyByJjr($rows,$jjrid="",$type="",$iftj=""){
		$where=array(" CID='".$this->cid."' and ifdeleted=0  and if_show=1 ");
		if($jjrid!=""){
			array_push($where, " userid='".$jjrid."' ");
		}
		if($type!=""){
			array_push($where," type='".$type."'");
		}
		if($iftj!=""){
			if($iftj){
				array_push($where, " if_tj=1 ");
			}else if(!$iftj){
				array_push($where, " if_tj=0 ");
			}
		}
		return $this->getResultOfListNoPage($rows,"*",$where," LAST_OPER_DATE DESC");
	}
	/**
	 * 通过房源ID获取房源信息列表
	 * @param unknown_type $rows
	 * @param unknown_type $fyids
	 * @param unknown_type $type
	 * @param unknown_type $iftj
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
	public function getFyByFyids($rows,$fyids="",$type="",$iftj=""){
		$where=array(" CID='".$this->cid."' and ifdeleted=0  and if_show=1 ");
		if($fyids!=""){
			array_push($where, " id in ('".str_replace(",", "','",$fyids)."')");
		}
		if($type!=""){
			array_push($where," type='".$type."'");
		}
		if($iftj!=""){
			if($iftj){
				array_push($where, " if_tj=1 ");
			}else if(!$iftj){
				array_push($where, " if_tj=0 ");
			}
		}
		return $this->getResultOfListNoPage($rows,"*",$where," LAST_OPER_DATE DESC");
	}
	
	/*统计类函数*/
	/**
	 * 统计某小区在售房源总数
	 * @param string $disid
	 * @param string $type
	 * @param boolean $iftj 是否推荐
	 * @return Ambigous <>
	 */
	public function getFyCountByDis($disid="",$type="",$iftj=""){
		$where=array(" CID='".$this->cid."' and ifdeleted=0  and if_show=1 ");
		if($disid!=""){
			array_push($where, " disid='".$disid."' ");
		}
		if($type!=""){
			array_push($where," type='".$type."'");
		}
		if($iftj!=""){
			if($iftj){
				array_push($where, " if_tj=1 ");
			}else if(!$iftj){
				array_push($where, " if_tj=0 ");
			}
		}
		$rs=$this->getResultOfFirstrow("count(1)",$where);
		return $rs[0];
	}
	
	/**
	 * 统计当日新增房源总数
	 * @param string $type
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
	public function getFyCount_Today($type=""){
		$where=array(" CID='".$this->cid."' and ifdeleted=0 and if_show=1 and DATEDIFF(NOW(),INPUT_DATE)<=1");
		if($type!=""){
			array_push($where, " TYPE='".$type."' ");
		}
		$rs=$this->getResultOfFirstrow("count(1)",$where);
		return $rs[0];
	}
	
	/**
	 * 房源点击率+1
	 * @param string $nid
	 * @return number
	 */
	public function addFyIPClick($nid){		
		if(checkipCookie($nid,"curip")){
			$this->executeUpdate(array("NUM"=>"NUM+1"), "ID = '".$nid."'");			
		}
		return $this->getColValue("NUM","ID = '".$nid."'");
	}
	
	/**
	 * IP点击率+1
	 * @param string $nid
	 * @return number
	 */
	public function addFyIPCityClick($cityname,$nid){
		if(checkipCityCookie($nid,$cityname,"cityip")){
			$this->executeUpdate(array("NUMIP"=>"NUMIP+1"), "ID = '".$nid."'");				
		}
		return $this->getColValue("NUMIP","ID = '".$nid."'");		
	}
}


?>