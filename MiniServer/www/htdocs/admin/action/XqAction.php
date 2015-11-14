<?php 
class XqAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("PZ_DIS");
    }
    public function lists(){
        $where = array("CID ='".$this->getCID()."'");
        
        $type = filterParaByName("TYPE");
        if($type!=""){
            array_push($where,"PPNAME='".$type."'");
        }
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"(NAME like '%".$mohu."%' || PNAME LIKE '%".$mohu."%' || PPNAME like '%".$mohu."%' || ADDRESS like '%".$mohu."%'|| USER like '%".$mohu."%')");
        }
        

        array_push($where,getPriL2Con(0,"1PZGL_2XQGL_3CK"));

        
        $listPage =  $this->listPage("*","TABORDER DESC",$where,10);
        
        return $listPage;
    }
    
    public function save(){
        $id = filterParaAllByName("id");
         
       
        $a = $this->getColSql();
        $a = $this->addCol($a,"DESCRIPTION","'".$_REQUEST["DESCRIPTION"]."'");
        $a = $this->addCol($a,"LPJJ","'".$_REQUEST["LPJJ"]."'");
        if($id!=""){
            
            $this->sql = $this->getUpdateSql($a,$id);
             
        }else{
            $id = $this->getIdFromTableWEB_NUM("xq");
            $a = $a = $this->addCol($a,"ID","'".$id."'");
            $this->sql = $this->getInsertSql($a);
        
        }
        
        echo $this->sql;
        if($this->execute($this->sql)){
             
            header("Location:".$this->getUrl());
        }
         
        return ;
    } 
}
?>