<?php 
class PriAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_ROLE");
    }
    public function add($id=""){
        $rolename = filterParaByName("rolename");
        if($rolename!=""){
            $this->sql = "SELECT * FROM XT_ROLE WHERE CID='".$this->getCID()."' AND NAME='".$rolename."'";
        }
        
        $stmt = $this->execute($this->sql);
        $rs = mysql_fetch_array($stmt);
    	
//        echo $this->sql;
        return $rs;
    }
        
    public function save(){
        $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        $this->sql = "";
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }
//         echo $this->sql;
        if($this->execute($this->sql)){
//         	echo $this->getUrl();
        	header("Location:".$this->getUrl());
        }
        return ;
    }
    
    public function getPri(){
    	session_start();
    	$pri = $_SESSION["R_HT_PRI"];
    	
    	$this->sql = "select PRI1 ,PRI2 FROM XT_ROLE WHERE NAME='".$pri."' LIMIT 1";
//     	echo $this->sql;
    	$stmt = $this->execute($this->sql);
    	$rs = mysql_fetch_array($stmt);
    	$arr = array();
    	$arr = $this->array_add($arr, "pri1",$rs["PRI1"]);
    	$arr = $this->array_add($arr, "pri2",$rs["PRI2"]);
    	return $arr;
    }
          
}




?>