<?php 

class  FyWtAction extends EallAction {
   
    public function __construct($conn,$cid){
       parent::__construct($conn,$cid);
       $this->setTable("WT_FY");
       
   }
   
   
   
   public function lists($size=10){
       $where = array("CID ='".$this->getCID()."'");
       
       $stime = filterParaByName("stime");
       $dtime = filterParaByName("dtime");
       if($stime!=""){
           array_push($where,"TO_DAYS(WTDATE)-TO_DAYS('".$stime."') >=0");
       }
       if($dtime!=""){
           array_push($where,"TO_DAYS(WTDATE)-TO_DAYS('".$dtime."')<=0");
       }
       $mohu = filterParaByName("mohu");
       if($mohu!=""){
           array_push($where,"(LINKNAME like '%".$mohu."%' || LINKTEL LIKE '%".$mohu."%' || DISNAME like '%".$mohu."%' )");
       }
       
       array_push($where,getPriL2Con(0,"1FYGL_2FYWT_3CK"));

       
       $listPage =  $this->listPage("*","WTDATE DESC",$where,$size);
       
       return $listPage;
   }
   
   
   
   public function save(){
      /*  $id = filterParaAllByName("id");
        
       $a = $this->getColSql();
      
       if($id!=""){
          
           $this->sql = $this->getUpdateSql($a,$id);
            
       }else{
           $this->sql = $this->getInsertSql($a);
       
       }
      
       if( $this->execute($this->sql)){
            
           header("Location:". $this->getUrl());
       }
        
       return ; */
   }
  
}
?>