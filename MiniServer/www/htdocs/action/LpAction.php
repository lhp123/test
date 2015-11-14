<?php 
require_once 'EallAction.php';
/**
 * @author Wang YanDong
 *
 */
class LpAction extends EallAction{
	public function __construct($conn,$cid){
		parent::__construct($conn,$cid);
		$this->setTable("NEWHOUSE ");
	}
	
	/**
	 * 得到代理楼盘 列表结果集  
	 * @param int $pageSize
	 * @return Ambigous <ListPage, multitype:unknown string >
	 */
	public function getLpList($pageSize=""){
	    if ($pageSize!="") {
	    	$this->setPagesize($pageSize);
	    }
	    $where = array("CID='".$this->cid."' and IF_SHOW = 1 ");
	    
	    $mohu = filterParaByName("mohu");
	    if($mohu!=""){
	    	array_push($where, "CONCAT(IFNULL(re1,''),IFNULL(re2,''),IFNULL(lpname,''),IFNULL(title,'')) like '%".$mohu."%'");
	    }
	    
	    $re1 = filterParaByName("re1");
	    $re2 = filterParaByName("re2");
	    if($re2!=""){
	    	array_push($where, "re2='".$re2."'");
	    }elseif ($re1!=""){
	    	array_push($where, "re1 ='".$re1."'");
	    }
	    
	    $pricedown 	= filterParaNumberByName("pricedown");
	    $priceup 	= filterParaNumberByName("priceup");
	    if($pricedown!=""){
	    	array_push($where, "PRICE >='".$pricedown."'");
	    }
	    if($priceup!=""){
	    	array_push($where, "PRICE <='".$priceup."'");
	    }
	    
	    $areadown = filterParaNumberByName("areadown");
	    $areaup = filterParaNumberByName("areaup");
	    if($areadown!=""){
	    	array_push($where, "BUILD_AREA>='".$areadown."'");
	    }
	    if($areaup!=""){
	    	array_push($where, "BUILD_AREA<='".$areaup."'");
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
		
		$label = filterParaByName("label");
		if($label!=""){
			array_push($where,"LOCATE(';".$label.";',CONCAT(CONCAT(';',LABLES),';'))>0");
		}	
		
		$ifrt = filterParaAllByName("ifrt");
		$ifcx = filterParaAllByName("ifcx");
		if($ifrt==1){
			array_push($where, "IF_ZD=1");
		}
		if($ifcx==1){
			array_push($where, "IF_CX=1");
		}
		
	    
	    $ordern = filterParaByName("ordern");
	    if($ordern==""){ $ordern = "default";}
	    $ordert = filterParaByName("ordert");
	    if($ordern=="default"){
	    	$ordern = "input_date ";
	    	$ordert = "desc";
	    }else{
	    	if($ordert=="up"){
	    		$ordert = "asc";
	    	}elseif($ordert=="down"){
	    		$ordert = "desc";
	    	}
	    }
	    
	    return $this->getResultOfListpage("*",$where,($ordern.$ordert!=""?$ordern." ".$ordert:""));
	}
	
	/**
	 * 根据类型type(1,2,3,4,5,6)返回指定大小num的结果集
	 * @param String $type
	 * @param int $num
	 * @return Ambigous <multitype:number, multitype:number resource >
	 */
    public function getLpWithType($type,$num=10){
        $where = array("CID='".$this->cid."' AND IF_SHOW = 1");
        if($type=="1"){//最新楼盘推荐
            $orderby = "INPUT_DATE DESC";
        }elseif($type=="2"){//热门楼盘推荐
            array_push($where,"IF_ZD = 1");
            array_push($where,"IF_CX = 1");
            $orderby = "INPUT_DATE DESC";
        }
        elseif($type=="3"){//热推楼盘
            array_push($where,"IF_ZD = 1");
            $orderby = "TABORDER DESC";
        }
        elseif($type=="4"){//促销楼盘
            array_push($where,"IF_CX = 1");
            $orderby = "TABORDER DESC";
        }
        elseif($type=="5"){//精品楼盘推荐
            array_push($where,"IF_CX = 1");
            $orderby = "TABORDER DESC";
        }
        elseif($type=="6"){//热销楼盘排行
            array_push($where,"IF_ZD = 1");
            $orderby = "TABORDER DESC";
        }
        return $this->getResultOfListNoPage($num,"",$where,$orderby);
    }
	
    

	

	/**
     * 通过lpid得到楼盘详细信息
     * @param int $lpid
     * @param Sting $select
     * @return multitype:
     */
	public  function getLpDetail($lpid,$select=""){
		$where = array("CID='".$this->cid."' and IF_SHOW = 1 and ID='".$lpid."'");
		if($select==""){ $select = "*";}
		return $this->getResultOfFirstrow($select,$where);
	}
	
	/* (non-PHPdoc)
	 * @see EallAction::doActionIn()
	*/protected function doActionIn() {
	
	$pa = $this->_paraArray;
	$action = filterParaAll($pa["action"]);
	if($action=="dengji"){
		$this->dengji($pa);
	}
	
	}
	/**
	 * 楼盘代理 客户意向登记
	 * @param $pa 参数数组
	 * @return json
	 */
	public  function dengji($pa){
		$val = "";
		$name = "";
		foreach($pa as $key=>$value){
			if($key !="a"&&$key!="action"){
				$name .=",".$key;
				$val .=",'".filterPara($value)."'";
			}
		}
		$name .=",TYPE,CID,INPUT_DATE";
		$val  .=",'楼盘登记','".$this->cid."',SYSDATE()";
		
		$insertsql = "insert into XT_BBS(".substr($name,1).") values(".substr($val,1).")";
		//echo $insertsql;
		$result = $this->executeInsertBySql($insertsql);
		if($result){
			$arr = array('message'=>'信息登记成功!','flag'=>'1');
		}else{
			$arr = array('message'=>'信息登记失败,请稍后!','flag'=>'0');
		}	
		echo json_encode($arr);	
	}
	
	
}


?>