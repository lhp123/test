<?php
class SeoAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_KEYWORDS");
    }

    public function lists(){
        $where = array("CID ='".$this->getCID()."' ");

        $type = filterParaByName("TYPE");
        if($type!=""){
            array_push($where,"TYPE='".$type."'");
        }
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array($where,"(TYPE like '%".$mohu."%' || CONTENT LIKE '%".$mohu."%'  )");
        }
        
        array_push($where,getPriL2Con(0,"1WZGL_2WZYH_3CK"));

        
        $listPage =  $this->listPage("*","ID ",$where,10);

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