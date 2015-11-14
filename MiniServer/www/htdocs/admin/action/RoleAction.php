<?php 
class RoleAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_ROLE");
    }
    public function lists(){
        $where = array("CID ='".$this->getCID()."'");
    	$mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"(NAME like '%".$mohu."%' )");
        }
        if(!ifSysRoot()){
        	array_push($where, "TYPE!='管理员'");
        }
        array_push($where,getPriL2Con(0,"1QXGL_2JSGL_3CK"));

    
        $listPage =  $this->listPage("*","",$where,10);
       // echo $listPage->getSql();
        return $listPage;
    }
    
    
    public function save(){
        $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }else{
            $this->sql = $this->getInsertSql($a);
        }
    	if( $this->execute($this->sql)){
                
              header("Location:". $this->getUrl());
         }
    }
    
    public function del($id=""){
        $id = filterParaAllByName("id");
    
        $this->sql = $this->getDelSql($id);
         
        if($this->execute($this->sql)){
              header("Location:".$this->getUrl());
        } 
    
    }
    
    public function getRoleByType($type=""){
    	if($type==""){
    		$this->sql="SELECT NAME FROM XT_ROLE WHERE   CID='".$this->getCID()."'";
    	}else{
    		$this->sql="SELECT NAME FROM XT_ROLE WHERE TYPE='".$type."' AND CID='".$this->getCID()."'";
    	}
    	//echo $this->sql;
    	$arr = array();
    	$stmt  = $this->execute($this->sql);
    	while($rs = mysql_fetch_array($stmt)){
    		array_push($arr, $rs[0]);
    	}
    	return $arr;
    }
  
}



?>