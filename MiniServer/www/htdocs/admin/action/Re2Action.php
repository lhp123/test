<?php 
class Re2Action extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("PZ_RE2");
    }
    public function lists(){
        $where = array("CID ='".$this->getCID()."'");
        $pid = filterParaByName("pid");
        if($pid!=""){
            array_push($where,"PID = '".$pid."'");
        }
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"NAME like '%".$mohu."%' ");
        }
    
        $listPage =  $this->listPage("*","ID DESC",$where,10);
        //echo $listPage->getSql();
        return $listPage;
    }
    
    
    public function save(){
        $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }else{
           
            $a = $this->addCol($a,"CID",$this->getCID());
            $this->sql = $this->getInsertSql($a);
        }
        //echo $this->sql;
        $this->execute($this->sql);
        return ;
    }
    
    public function del($id=""){
        $id = filterParaAllByName("id");
        $this->sql = "select PID from ".$this->getTable()." where ID = '".$id."'";
        $stmt = $this->execute($this->sql);
        $rs = mysql_fetch_array($stmt);
        $pid = $rs[0];
        
        //echo $this->sql;
        $this->sql = $this->getDelSql($id);
     
         if($this->execute($this->sql)){
                header("Location:".$this->url."?pid=".$pid);
         }
    
    }
    
}



?>