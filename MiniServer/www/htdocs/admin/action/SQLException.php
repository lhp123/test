<?php 
class SQLException extends Exception{
    
   public function __construct($sql=""){
       parent::__construct($sql, 0);
       $this->sql = $sql;
   }

    
    public  function getErrorSql(){
        return  "errorsql:".$this->sql;
    }
    
}
?>