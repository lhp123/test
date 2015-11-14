<?php 

class  FyPjAction extends EallAction {
   
    public function __construct($conn,$cid){
       parent::__construct($conn,$cid);
       $this->setTable("FY_PJ");
       
   }
   
   
   
   public function lists($size=10){
       $where = array("pj.CID ='".$this->getCID()."' AND f.ID=pj.FK_FYID ");
       $fyid = filterParaAllByName("fyid");
       if($fyid!=""){
       	array_push($where, "pj.FK_FYID = '".$fyid."'");
       }
       
       array_push($where,getPriL2Con(1,"1FYGL_2FYPJ_3CK", "pj.FK_USERID"));
     
       
       $mohu = filterParaByName("mohu");
       if($mohu!=""){
           array_push($where,"(pj.TITLE like '%".$mohu."%' || pj.CONTENT LIKE '%".$mohu."%' || pj.FK_USERNAME like '%".$mohu."%'||f.CONTRACT_CODE='%".$mohu."%' )");
       }
       $listPage =  $this->listPage("pj.*,f.CONTRACT_CODE,f.TITLE FYTITLE","pj.INPUT_DATE DESC",$where,$size,"FY_PJ pj ,FY f");
       
       return $listPage;
   }
   
   
   
   public function save(){
   		session_start();
   		$username = $_SESSION["USERNAME"];
   		$userid = $_SESSION["USERID"];
       $id = filterParaAllByName("id");
        
       $a = $this->getColSql();
       $a = $this->addCol($a,"MOD_DATE","SYSDATE()");
       $a = $this->addCol($a,"FK_USERID","'".$userid."'");
       $a = $this->addCol($a,"FK_USERNAME","'".$username."'");
       $a = $this->addCol($a,"CONTENT","'".$_REQUEST["CONTENT"]."'");
       
       if($id!=""){
       	   
           $this->sql = $this->getUpdateSql($a,$id);
            
       }else{
           $id = $this->getIdFromTableWEB_NUM("fy");
           $a = $this->addCol($a,"ID","'".$id."'");
           $a = $this->addCol($a,"INPUT_DATE","SYSDATE()");
           $this->sql = $this->getInsertSql($a);
       
       }
         //echo $this->sql;
         if( $this->execute($this->sql)){
                
              header("Location:". $this->getUrl());
         }
       
       return ;
   }
   
  public function getFyDetail($fyid=""){
  	$this->sql = "select * from FY where ID='".$fyid."'";
  	$stmt = $this->execute($sql);
  	$rs = mysql_fetch_array($stmt);
  	return $rs;
  }
   
  
}
?>