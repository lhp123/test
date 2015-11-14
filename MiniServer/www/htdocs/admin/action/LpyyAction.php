<?php 

class  LpyyAction extends EallAction {
   
    public function __construct($conn,$cid){
       parent::__construct($conn,$cid);
       $this->setTable("XT_BBS");
       
   }
   
   
   
   public function lists($size=10){
       $where = array("p.CID ='".$this->getCID()."'");
       array_push($where,"b.TYPE='楼盘登记' AND p.ID=b.FK_ID");
       $mohu = filterParaByName("mohu");
       if($mohu!=""){
           array_push($where,"(p.LPNAME like '%".$mohu."%' || b.KHNAME LIKE '%".$mohu."%' || b.KHTEL like '%".$mohu."%' )");
       }
       
       array_push($where,getPriL2Con(0,"1FYGL_2YYDJ_3CK"));

       
       $select = "LPNAME,KHNAME,KHTEL,EMAIL,b.INPUT_DATE INPUT_DATE,FK_ID,b.ID";
       
       $listPage =  $this->listPage($select,"b.INPUT_DATE DESC",$where,$size,"XT_BBS b ,NEWHOUSE p");
       //echo $listPage->getSql();
       return $listPage;
   }
   
   public function add($id=""){
      $id = filterParaAllByName("id");
      if ($id!=""){
          $this->sql ="select b.*,p.LPNAME from XT_BBS b ,NEWHOUSE p where b.TYPE='楼盘登记' AND p.ID=b.FK_ID and b.ID='".$id."'";
          $stmt = mysql_query($this->sql,$this->getConn());
          $rs = mysql_fetch_array($stmt);
          return $rs;
      }
      return ;
      
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