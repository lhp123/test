<?php 
class ReAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("PZ_RE1");
    }
    public function lists(){
        $where = array("CID ='".$this->getCID()."'");
        
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"NAME like '%".$mohu."%' ");
        }
        
        array_push($where,getPriL2Con(0,"1PZGL_2PQGL_3CK"));

        
        $listPage =  $this->listPage("*","ID",$where,10);
       // echo $listPage->getSql();
        return $listPage;
    }
    
    
    public function save(){
        /* $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }else{
            //$this->sql = $this->getInsertSql($a);
        }
        //echo $this->sql;
        $this->execute($this->sql);
        return ; */
    }
    
}



?>