<?php 

class  LpAction extends EallAction {
   
    public function __construct($conn,$cid){
       parent::__construct($conn,$cid);
       $this->setTable("NEWHOUSE");
   }
   
   
   
   public function lists($size=10){
       $where = array("CID ='".$this->getCID()."'");
       $re1 = filterParaByName("re1");
       if($re1!=""){
           array_push($where,"RE1 = '".$re1."'");
       }
       
       $area_up = filterParaNumberByName("area_up");
       $area_down = filterParaNumberByName("area_down");
       if($area_up!=""){
           array_push($where,"BUILD_AREA<=".$area_up);
       }
       if($area_down!=""){
           array_push($where,"BUILD_AREA>=".$area_down);
       }
       
       $price_up = filterParaNumberByName("price_up");
       $price_down = filterParaNumberByName("price_down");
       if($price_up!=""){
           array_push($where,"JUNJIA <=".$price_up);
       }
       if($price_down!=""){
           array_push($where,"JUNJIA >=".$price_down);
       }
       
       /* $username = filterParaByName("username");
       if($username!=""){
           array_push($where,"USERNAME = '".$username."'");
       } */
       
       $mohu = filterParaByName("mohu");
       if($mohu!=""){
           array_push($where, "CONCAT(IFNULL(re1,''),IFNULL(re2,''),IFNULL(lpname,''),IFNULL(title,'')) like '%".$mohu."%'");           
       }
       
       array_push($where,getPriL2Con(1,"1FYGL_2LPDL_3CK", "userid"));

       
       $listPage =  $this->listPage("*","INPUT_DATE DESC",$where,$size);
       
       return $listPage;
   }
   
   
   
   public function save(){
       $id = filterParaAllByName("id");
        
       $a = $this->getColSql();
       $a = $this->addCol($a,"LPZK","'".$_REQUEST["LPZK"]."'");
       if($id!=""){
          
           $this->sql = $this->getUpdateSql($a,$id);
            
       }else{
           $a = $this->addCol($a,"INPUT_DATE","SYSDATE()");
           $this->sql = $this->getInsertSql($a);
       
       }
      //echo $this->sql;
       if( $this->execute($this->sql)){
            
           header("Location:". $this->getUrl());
       }
        
       return ;
   }
  
}
?>