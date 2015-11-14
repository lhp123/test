<?php


class StaffAction extends EallAction {
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_USER");
    }
    public function lists(){
        $where = array("u.CID ='".$this->getCID()."' and d.CID ='".$this->getCID()."' and u.ifsys=0");
        array_push($where,"u.IFDELETED = 0 and d.IFDELETED = 0");


        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"(u.USERNAME like '%".$mohu."%' || u.LOGINNAME LIKE '%".$mohu."%' || d.DEPTNAME like '%".$mohu."%' )");
        }
        

        array_push($where,getPriL2Con(0,"1RSGL_2YGGL_3CK"));

        
        $listPage =  $this->listPage("u.*,d.DEPTNAME","u.TABORDER DESC",$where,10,"XT_USER u LEFT JOIN XT_DEPT d ON u.FK_DEPTID = d.ID");
        return $listPage;
    }
    public function save(){
        $id = filterParaAllByName("id");
        
        $a = $this->getColSql();
        $a = $this->addCol($a,"MEMO","'".$_REQUEST["MEMO"]."'");
        if($id!=""){           
           
            $this->sql = $this->getUpdateSql($a,$id);
             
        }else{
            $id = $this->getIdFromTableWEB_NUM("user");
            $a = $this->addCol($a,"ID","'".$id."'");    
            $a = $this->addCol($a,"PASSWORD","'123456'"); 
            $this->sql = $this->getInsertSql($a);
//         echo $this->sql;
        }

        if($this->execute($this->sql)){
             
            header("Location:".$this->getUrl());
        }
         
        return ;
    }
    
    public function checkLoginName (){
        $id = filterParaAllByName("id");
        $loginname = filterParaByName("loginname");
        $this->sql = "select * FROM XT_USER WHERE  LOGINNAME = '".$loginname."' and ID != '".$id."'";
        $stmt = $this->execute($this->sql);
        if($rs=mysql_fetch_array($stmt)){
            return "{'flag':'1'}"; //登录名重复!
        }
        return "{'flag':'2'}";  //登录名可以使用!
    }
} 