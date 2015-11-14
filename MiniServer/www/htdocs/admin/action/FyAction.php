<?php 

class  FyAction extends EallAction {
   
    public function __construct($conn,$cid){
       parent::__construct($conn,$cid);
       $this->setTable("FY");
       
   }
   
   
   
   public function lists($size=10){
       $where = array("CID ='".$this->getCID()."'");
       $type = filterParaByName("type");
       if($type==""||$type=="出售"){
           array_push($where,"TYPE='出售'");
           array_push($where,getPriL2Con(1,"1FYGL_2MMFY_3CK", "userid"));
       }elseif($type=="出租"){
           array_push($where,"TYPE='出租'");
           array_push($where,getPriL2Con(1,"1FYGL_2ZLFY_3CK", "userid"));

       }
       
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
           array_push($where,"PRICE <=".$price_up);
       }
       if($price_down!=""){
           array_push($where,"PRICE >=".$price_down);
       }
       
       $username = filterParaByName("username");
       if($username!=""){
           array_push($where,"USERNAME = '".$username."'");
       }
       
       $mohu = filterParaByName("mohu");
       if($mohu!=""){
           array_push($where,"CONCAT(IFNULL(RE1,''),IFNULL(RE2,''),IFNULL(DISNAME,''),IFNULL(TITLE,''),IFNULL(CONTRACT_CODE,''),IFNULL(USERNAME,'')) like '%".$mohu."%'");
       }
       $listPage =  $this->listPage("*","INPUT_DATE DESC",$where,$size);
       
      // echo $listPage->getSql();
 
       return $listPage;
   }
   
   
   
   public function save(){
       $id = filterParaAllByName("id");
       $deptid = filterParaAllByName("DEPTID");
       $a = $this->getColSql();
       if($deptid!=""){
	       $deptstmt = mysql_query("SELECT ID,DEPTNAME FROM XT_DEPT WHERE ID='".$deptid."' AND CID ='".$this->getCID()."'",$this->getConn());
	       $rs_dept = mysql_fetch_array($deptstmt);
	       $a = $this->addCol($a,"DEPTNAME","'".$rs_dept["DEPTNAME"]."'");
       }
       $a = $this->addCol($a,"MEMO","'".$_REQUEST["MEMO"]."'");
       if($id!=""){
          
           $this->sql = $this->getUpdateSql($a,$id);
            
       }else{
           $id = $this->getIdFromTableWEB_NUM("fy");
           $a = $a = $this->addCol($a,"ID","'".$id."'");
           $a = $this->addCol($a,"INPUT_DATE","SYSDATE()");
           
           $this->sql = $this->getInsertSql($a);
       
       }
//        echo $this->sql;
         if( $this->execute($this->sql)){
                
              header("Location:". $this->getUrl());
         }
       
       return ;
   }
   
  
   
  
}
?>