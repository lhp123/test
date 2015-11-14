<?php 

class NewsAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_NEWS");
    }
    public function lists(){
        $where = array("CID ='".$this->getCID()."'");
    
        $type = filterParaByName("TYPE");
        if($type!=""){
            array_push($where,"TYPE='".$type."'");
        }
        $subtype = filterParaByName("SUBTYPE");
        if($subtype!=""){
        	array_push($where,"SUBTYPE='".$subtype."'");
        }
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"CONCAT(IFNULL(TITLE,''),IFNULL(SOURCE,''),IFNULL(AUTHOR,'')) like '%".$mohu."%'");            
        }
        
        array_push($where,getPriL2Con(0,"1WZGL_2XWGL_3CK"));

        
        $listPage =  $this->listPage("*","INPUT_DATE DESC",$where,10);
         
        return $listPage;
         
    }
    
    
    public function save(){
        $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        $a = $this->addCol($a,"CONTENT","'".iconv("utf-8","GBK",$_REQUEST["CONTENT"])."'");
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }else{
            $a = $this->addCol($a,"INPUT_DATE","SYSDATE()");
            $this->sql = $this->getInsertSql($a);
        }
        if($this->execute($this->sql)){
            header("Location:".$this->getUrl());
        }
    }
    
}



?>