<?php
class ComAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_COM");
       
    }
    public function lists(){
     echo "";
    }
    public function add($id=""){
        $id = $this->getCID();

        if ($id!=""){
            $this->sql =$this->getAddSql($id);
            $stmt = mysql_query($this->sql,$this->getConn());
            $rs = mysql_fetch_array($stmt);
            return $rs;
        }
        return ;
    }
    public  function save(){
        $id = filterParaAllByName("id");

        $a = $this->getColSql();
        $a = $this->addCol($a,"JIANJIE",  "'".$_REQUEST["JIANJIE"]."'"); //使用编辑器 不能过滤
        $a = $this->addCol($a,"WENHUA",   "'".$_REQUEST["WENHUA"]."'"); //使用编辑器 不能过滤
        $a = $this->addCol($a,"RONGYU",   "'".$_REQUEST["RONGYU"]."'");//使用编辑器 不能过滤
        $a = $this->addCol($a,"LXWM",     "'".$_REQUEST["LXWM"]."'"); //使用编辑器 不能过滤
        $QQinfo_array=$_REQUEST["QQ"];
        $QQinfo="";
        foreach ($QQinfo_array as $qq){
        	if($qq!="")
        		$QQinfo.=";".$qq;
        }
        if(strlen($QQinfo)>0) $QQinfo=substr($QQinfo, 1);
        $a = $this->addCol($a,"QQ","'".$QQinfo."'");
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }else{
            $this->sql = $this->getInsertSql($a);
        }
//           echo $this->sql;
        
        
        if($this->execute($this->sql)){
            header("Location:".$this->getUrl());
        } 
         
        return ;
    }
   

}

?>