<?php 

class  XqPriceAction extends EallAction {
   
    public function __construct($conn,$cid){
       parent::__construct($conn,$cid);
       $this->setTable("WT_QYJJ");
       
   }
   
   
   
   public function lists($size=10){
       $where = array("j.CID ='".$this->getCID()."' and x.ID=j.DISID");
       $mohu = filterParaByName("mohu");
       if($mohu!=""){
           array_push($where,"x.NAME like '%".$mohu."%'");
       }
       

       array_push($where,getPriL2Con(0,"1PZGL_2XQJG_3CK"));

       
       $listPage =  $this->listPage("j.*,x.NAME PNAME","x.NAME , P_DATE DESC",$where,$size,"WT_QYJJ j ,PZ_DIS x");
      // echo $listPage->getSql();
       return $listPage;
   }
   
   public function add($id=""){
       $id = filterParaAllByName("id");
       
       if ($id!=""){
           $this->sql = "select j.*,x.NAME PNAME from WT_QYJJ j ,PZ_DIS x where x.ID=j.DISID and j.ID = '".$id."'";
           /* echo $this->sql; */
           $stmt = mysql_query($this->sql,$this->getConn());
           $rs = mysql_fetch_array($stmt);
           return $rs;
       }
       return ;
   }
   
   public function save(){
       $id = filterParaAllByName("id");
        
       $a = $this->getColSql();
       if($id!=""){
          
           $this->sql = $this->getUpdateSql($a,$id);
           
       }else{
           
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