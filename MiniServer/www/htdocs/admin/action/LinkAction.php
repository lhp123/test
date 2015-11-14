<?php 
class LinkAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_LINK");
    }
   public function lists(){
        $where = array("CID ='".$this->getCID()."'");
    
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"MEMO like '%".$mohu."%'");
        }
    
        array_push($where,getPriL2Con(0,"1WZGL_2YQLJ_3CK"));

        
        $listPage =  $this->listPage("*","TABORDER DESC",$where,10);
         
        return $listPage;
    }
    
    
    public  function save(){
        $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        if($id!=""){
            
            $this->sql = $this->getUpdateSql($a,$id);
            
        }else{
            
            $this->sql = $this->getInsertSql($a);
            
        }
       
        if($this->execute($this->sql)){
             
            header("Location:".$this->getUrl());
        }
         
        return ;
    }
}
?>