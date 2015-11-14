<?php 
class  PwdAction extends EallAction {
   
    public function __construct($conn,$cid){
       parent::__construct($conn,$cid);
       $this->setTable("XT_USER");
       
   }
   
   public function  check(){
       session_start();
       $pass = $_SESSION["PASSWORD"];
       
       $old_pass = filterParaByName("old_pass");
       $new_pass = filterParaByName("new_pass");
       $r_pass = filterParaByName("r_pass");
       if($pass!=$old_pass){
           return "{'flag':'1'}";
       }
       if($new_pass!=$r_pass){
           return "{'flag':'2'}";
       }
       return "{'flag':'3'}";
   }
   public function pwd(){
       session_start();
       $id =  $_SESSION["USERID"];
       $pass = $_SESSION["PASSWORD"];
       $old_pass = filterParaByName("old_pass");
       $new_pass = filterParaByName("new_pass");
       $r_pass = filterParaByName("r_pass");
       if($pass!=$old_pass){
           return "{'flag':'1'}";
       }
       if($new_pass!=$r_pass){
           return "{'flag':'2'}";
       }
       if($id!=""){
           $this->sql = "update XT_USER  set PASSWORD = '".$new_pass."' where ID='".$id."'";
          
       }
        
       if( $this->execute($this->sql)){
            
           return "{'flag':'3'}";
       
       }   
      
       return ;
   }
  
}
?>