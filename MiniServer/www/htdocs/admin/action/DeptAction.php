<?php

class DeptAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_DEPT");
    }
    
    
    public function lists(){
        $where = array("CID ='".$this->getCID()."'  AND IFDELETED = 0 ");
        
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"(DEPTNAME like '%".$mohu."%' || DZNAME LIKE '%".$mohu."%' || ADDRESS like '%".$mohu."%' )");
        }

        array_push($where,getPriL2Con(0,"1RSGL_2MDGL_3CK"));

        
        $listPage =  $this->listPage("*","TABORDER DESC",$where,10);

        return $listPage;
       
        
    }
    
    
    public function save(){
        $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        if($id!=""){
             
            $this->sql = $this->getUpdateSql($a,$id);
             
        }else{
            
            $id = $this->getIdFromTableWEB_NUM("dept");
            $a = $a = $this->addCol($a,"ID","'".$id."'");
            $this->sql = $this->getInsertSql($a);
        
        }
         
        if($this->execute($this->sql)){
        
            header("Location:".$this->getUrl());
        }
         
        return ;
    }
}
?>