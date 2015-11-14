<?php 

class  PersonAction extends EallAction {
   
    public function __construct($conn,$cid){
       parent::__construct($conn,$cid);
       $this->setTable("WEB_USER");
       
   }
   public function add($id=""){
       session_start();
       $id =  getUserid();
       if ($id!=""){
           $this->sql =$this->getAddSql($id);
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
           //不需要添加           
           $this->sql = $this->getInsertSql($a);       
       }
//       echo $this->sql;
       if( $this->execute($this->sql)){
            
           header("Location:". $this->getUrl());
       }
        
       return ; 
   }
  
   public function checkLoginName (){
       $id =  $_SESSION["USERID"];
       $loginname = filterParaByName("loginname");
       $this->sql = "select * FROM XT_USER WHERE  LOGINNAME = '".$loginname."' and ID != '".$id."'";
       $stmt = $this->execute($this->sql);
       if($rs=mysql_fetch_array($stmt)){
            return "{'flag':'1'}"; //登录名重复!
       }
       return "{'flag':'2'}";  //登录名可以使用!
   }
   
   
}
?>