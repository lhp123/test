<?php

class PzUserAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("PZ_WEBUSER");
    }
    
    
    public function lists(){
        $where = array("CID ='".$this->getCID()."' ");
        
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"");
        }
        
        array_push($where,getPriL2Con(0,"1PZGL_2YHPZ_3CK"));

        
        $listPage =  $this->listPage("*","",$where,10);

        return $listPage;
       
        
    }
    
    
    public function save(){
        $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        if($id!=""){
             
            $this->sql = $this->getUpdateSql($a,$id);
             
        }else{
            
            $idsql="select DEPTID from WEB_NUM";
            $idstmt=mysql_query($idsql,$this->getConn());
            $idrs=mysql_fetch_array($idstmt);
            $a = $this->addCol($a,"ID","WEB_".$idrs["DEPTID"]);
            $this->sql = $this->getInsertSql($a);
        
        }
         
        if($this->execute($this->sql)){
        
            header("Location:".$this->getUrl());
        }
         
        return ;
    }
}
?>