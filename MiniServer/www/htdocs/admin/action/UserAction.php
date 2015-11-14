<?php


class UserAction extends EallAction{
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("WEB_USER");
    }
    public function lists(){
        $where = array("CID ='".$this->getCID()."'");

        $type = filterParaByName("TYPE");
        if($type!=""){
            array_push($where,"TYPE like '%".$type."%'");
        }
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"CONCAT(IFNULL(USERNAME,''),IFNULL(LOGINNAME,''),IFNULL(GZDD,''),IFNULL(SCGS,''),IFNULL(TEL,''),IFNULL(EMAIL,'')) like '%".$mohu."%' ");
        }


        array_push($where,getPriL2Con(0,"1RSGL_2ZCYH_3CK"));
       

        $listPage =  $this->listPage("*","",$where,10);


        return $listPage;
    }
    
    
    public function save(){
        $id = filterParaAllByName("id");
        
        $a = $this->getColSql();
        if($id!=""){
            
            $this->sql = $this->getUpdateSql($a,$id);
           
        
        }else{
            $idsql="select USERID from WEB_NUM";
            $idstmt=mysql_query($idsql,$this->getConn());
            $idrs=mysql_fetch_array($idstmt);
            $a = $this->addCol($a,"ID","WEB_".$idrs["USERID"]);
            $this->sql = $this->getInsertSql($a);
        
        }

        if($this->execute($this->sql)){
        
            header("Location:".$this->getUrl());
        }
        
        return ;
        
    }
} 