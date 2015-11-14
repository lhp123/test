<?php 
class PtAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("PZ_PROFILE");
    }
    public function lists(){
        $where = array("CID ='".$this->getCID()."'");
        $type = filterParaByName("type");
        if($type!=""){
            array_push($where,"TYPE='".$type."'");
        }
        
       	array_push($where,getPriL2Con(0,"1PZGL_2PTPZ_3CK"));
    
        $listPage =  $this->listPage("*","TABORDER DESC",$where,10);
       // echo $listPage->getSql();
        return $listPage;
    }
    
    
    public function save(){
        $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }else{
            $a = $this->addCol($a,"TYPE","'".filterParaByName("TYPE")."'");
            $a = $this->addCol($a,"CID",$this->getCID());
            $this->sql = $this->getInsertSql($a);
        }
       
        $this->execute($this->sql);
        return ;
    }
    
    public function del($id=""){
        $id = filterParaAllByName("id");
        $this->sql = "select TYPE from ".$this->getTable()." where ID = '".$id."'";
        $stmt = $this->execute($this->sql);
        $rs = mysql_fetch_array($stmt);
        $type = $rs[0];
    
    
        $this->sql = $this->getDelSql($id);
         
        if($this->execute($this->sql)){
              header("Location:".$this->url."?type=".$type);
        } 
    
    }
    
    
}



?>