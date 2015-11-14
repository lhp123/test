<?php


class ZpAction extends EallAction{
    public  function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_ZP");
    }
    public function lists(){
        $where = array(" CID ='".$this->getCID()."'");

        $type = filterParaByName("TYPE");
        if($type!=""){
            array_push($where,"TYPE='".$type."'");
        }
        $mohu = filterParaByName("mohu");
        if($mohu!=""){
            array_push($where,"(TITLE like '%".$mohu."%'  )");
        }
        

        array_push($where,getPriL2Con(0,"1WZGL_2ZNZP_3CK"));

        
        $listPage =  $this->listPage("*","FBDATE DESC",$where,10);

        return $listPage;
    }
    
    public function save(){
        $id = filterParaAllByName("id");
         
        $a = $this->getColSql();
        
        $a = $this->addCol($a,"DUTY","'".$_REQUEST["DUTY"]."'");  //使用编辑器不能filter过滤
        $a = $this->addCol($a,"ZIGE","'".$_REQUEST["ZIGE"]."'");  //使用编辑器不能filter过滤
         
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }else{
            $this->sql = $this->getInsertSql($a);
        }
        // echo $this->sql;
        if($this->execute($this->sql)){
            header("Location:".$this->getUrl());
        }
         
        return ;
    }
} 