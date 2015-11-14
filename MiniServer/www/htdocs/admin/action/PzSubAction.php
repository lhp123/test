<?php 

class PzAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("PZ_PROFILE");
    }
    public function lists(){
        $ptype = filterParaByName("ptype");
        $where = array("type ='".$ptype."'");
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"TYPE like '%".$mohu."%' ");
        }
        $prick="1PZGL_2PTPZ_3CK";     	
        array_push($where,getPriL2Con(0,$prick));

        $listPage =  $this->listPage("*","TABORDER ",$where,10);
         
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