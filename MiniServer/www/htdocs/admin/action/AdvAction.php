<?php 

class AdvAction extends EallAction{
    public  function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_PHOTO");
    }
    public function lists(){
         
        $where = array("CID ='".$this->getCID()."'");
    
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"MEMO like '%".$mohu."%'");
        }

        array_push($where,getPriL2Con(0,"1WZGL_2WZGG_3CK"));
        
        $listPage =  $this->listPage("*","TABORDER",$where,10);
        
        return $listPage;
    }
    
    
    public function save(){
        $id = filterParaAllByName("id");
        
        $a = $this->getColSql1();
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }else{
            $this->sql = $this->getInsertSql($a);
        
        }
//       echo $this->sql;
        if($this->execute($this->sql)){
             header("Location:".$this->getUrl());
        }
         
        return ;
    }
}
?>