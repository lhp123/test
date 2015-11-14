<?php 

class PzAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("PZ_BASE");
    }
    public function lists(){
        $type = filterParaByName("type");
        $sort = ($type=="pt"?"普通配置":"区间配置");
        $where = array("SORT ='".$sort."'");
    
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"TYPE like '%".$mohu."%' ");
        }
        
        if($type=="pt"){
        	$prick="1PZGL_2PTPZ_3CK";
        }
        else{
        	$prick="1PZGL_2QJPZ_3CK";
        }
        if(ifHasPriL2($prick)){        	
        	array_push($where,getPriL2Con(0,$prick));
        }
        $listPage =  $this->listPage("*","ID ",$where,10);
         
        return $listPage;
         
    }
    
    
    public function save(){
      /*   $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        $a = $this->addCol($a,"CONTENT","'".iconv("utf-8","GBK",$_REQUEST["CONTENT"])."'");
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }else{
            $a = $this->addCol($a,"INPUT_DATE","SYSDATE()");
            $this->sql = $this->getInsertSql($a);
        }
        //echo $this->sql;
        if($this->execute($this->sql)){
            header("Location:".$this->getUrl());
        }
 */    
    }
    
}



?>