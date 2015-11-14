<?php 
class ModelAction extends EallAction{
	private  $pri = "";
    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_MODEL");
        $this->pri = new PriAction($conn, $cid);
    }
    public function lists(){
        $where = array("a.CID ='".$this->getCID()."' ");
        $parent = filterParaNumberByName("parent");
        if($parent!=""){
	        if($parent=="-1"){
	        		array_push($where, "a.LEVEL = 1");
	        	}else {
	        		array_push($where, "a.PARENT = ".$parent);
	        		
	        	}
        	
        }
        
        
        $mohu = filterParaByName("mohu");
    	if($mohu!=""){
            array_push($where,"(a.NAME like '%".$mohu."%' )");
        }
        if($parent!="-1"){
        	array_push($where, "b.ID = a.PARENT");
        	$listPage =  $this->listPage("a.NAME,a.ID,a.LINK,b.NAME PARENT,a.TABORDER","a.TABORDER",$where,10,"XT_MODEL a ,XT_MODEL b");
        }else{
        	$listPage =  $this->listPage("a.NAME,a.ID,a.LINK, '' PARENT,a.TABORDER","a.TABORDER",$where,10,"XT_MODEL a ");
        }        
        //echo $listPage->getSql();
        return $listPage;
    }
    
    
    
    public function save(){
        $id = filterParaAllByName("id");
         
        $a = $this->getColSql1();
        if($id!=""){
            $this->sql = $this->getUpdateSql($a,$id);
        }else{
            $this->sql = $this->getInsertSql($a);
        }
       if( $this->execute($this->sql)){
       		header('Location:'.$this->getUrl());
       }
       
        return ;
    }
    
    public function del($id=""){
        $id = filterParaAllByName("id");
        $this->sql = $this->getDelSql($id);
        
        if($this->execute($this->sql)){
              header("Location:".$this->getUrl());
        } 
    
    }
    
    
    public function  getParents($sy=false){
    	$arr = $this->pri->getPri();
    	$this->sql = "SELECT ID ,NAME,PRINAME FROM XT_MODEL  WHERE CID='".$this->getCID()."'  AND LEVEL =1 order by taborder";    	
		if(!$sy){			
			$this->sql = "SELECT ID ,NAME,PRINAME FROM XT_MODEL  WHERE CID='".$this->getCID()."' AND  POSITION(PRINAME IN '".$arr["pri1"]."') > 0  AND LEVEL =1 order by taborder";
		}  
	
		$stmt = $this->execute($this->sql);
    	$arr = array();
    	while ($rs = mysql_fetch_array($stmt)){
    		array_push($arr, $rs["ID"].";".$rs["NAME"].";".$rs["PRINAME"]);
    	}
    	return $arr;
    	 
    }
   
    public  function getMenu(){
    	$currentUri = $_SERVER["REQUEST_URI"];
    	if(strpos($currentUri, "login.php")){
    		return ;
    	}
    	session_start();
    	$arrMenuLevel1 = $_SESSION["menu1"];
    	$arrMenuLevel2 = $_SESSION["menu2"];
    	$loginname = $_SESSION["LOGINNAME"];
    	$ifsys = $_SESSION["IFSYS"];
    	$pri = $this->pri->getPri();
    	$pri2 = $pri["pri2"];
    	if($arrMenuLevel1==""||!is_array($arrMenuLevel1||empty($arrMenuLevel1))){
    		if($loginname=="EALLROOT"&&$ifsys==2){
    			$arr = $this->getParents(true);
    		}else{
    			$arr = $this->getParents();
    		}
    		$arrMenuLevel1 = array();
       		$arrMenuLevel2 = array();
    		$modelList = array();
    		foreach ($arr as $val){
    			$a = explode(";",$val );
    			$id = $a[0];
    			$name = $a[1];    		
//     			var_dump($arrMenuLevel1);
    			array_push($arrMenuLevel1, $name);
    			if($loginname=="EALLROOT"&&$ifsys==2){
    				$this->sql= "select `NAME`,LINK FROM XT_MODEL WHERE  CID='".$this->getCID()."' AND  PARENT = '".$id."'  AND `LEVEL` =2 order by taborder ";
    			}else{
    				$this->sql= "select `NAME`,LINK FROM XT_MODEL WHERE  CID='".$this->getCID()."' AND POSITION(CONCAT(PRINAME) IN '".$pri2."') > 0 AND  PARENT = '".$id."'  AND `LEVEL` =2 order by taborder ";
    			}
//     			echo $this->sql."<br>";
    			$stmt = $this->execute($this->sql);
    			$arrMenuList = array();
    			while ($rs = mysql_fetch_array($stmt)){
    				$arrMenuList = $this->array_add($arrMenuList,$rs["NAME"] ,$rs["LINK"]);    				
    			}    			 
//     			var_dump($arrMenuList);
//     			echo "<br>";
    			if(!empty($arrMenuList)){
    				$arrMenuLevel2 = $this->array_add($arrMenuLevel2, $name,$arrMenuList);
    				$modelList = array_merge($modelList,$arrMenuList);
    			} 
//     			var_dump($arrMenuLevel2);
//     			echo "<br><br><br><br>";
    		}    		
    		$_SESSION["menu1"] = $arrMenuLevel1;
    		$_SESSION["menu2"] = $arrMenuLevel2;
    		$_SESSION["modelList"] = $modelList;
    	}
//     	var_dump(array("menu1"=>$arrMenuLevel1,"menu2"=>$arrMenuLevel2));
    	return array("menu1"=>$arrMenuLevel1,"menu2"=>$arrMenuLevel2);
    }
   
    public function getAllModel(){
    	session_start();
    	$modelList = $_SESSION["modelList"];
    	if($modelList==""||!is_array($modelList||empty($modelList))){
    		$arr = $this->getParents(true);
    		$modelList = array();
    		foreach ($arr as $val){
    			$a = explode(";",$val );
    			$id = $a[0];
    			$name = $a[1];
    			$this->sql= "select `NAME`,PRINAME FROM XT_MODEL WHERE  CID='".$this->getCID()."'  and  PARENT = '".$id."'  AND `LEVEL` =2 order by taborder";
    			 
    			//echo $this->sql;
    			$stmt = $this->execute($this->sql);
    			$arrMenuList = array();
    			while ($rs = mysql_fetch_array($stmt)){
    				$arrMenuList = $this->array_add($arrMenuList,$rs["NAME"] ,$rs["PRINAME"]);
    			}
    			 
//     			var_dump($arrMenuList);
    		
    			$modelList = $this->array_add($modelList, $name,$arrMenuList);
//     			var_dump($modelList);
    		}
    		$_SESSION["modelList"] = $modelList;
    	}
    	
    	return $modelList;
    }
    
    /*
     public function getModelIdByPri($pri=""){
    	if($pri==""){
    		session_start();
    		$pri = $_SESSION["PRI"];
    	}
    	$this->sql = "SELECT p.* FROM XT_ROLE r ,XT_MODEL_ROLE p,XT_MODEL m WHERE r.ID=p.ROLE_ID and p.MODEL_ID = m.ID and r.PRI = ".$pri;
    	
    	$stmt = $this->execute($this->sql);
    	$arr = array();
    	while ($rs= mysql_fetch_array($stmt)) {
    		array_push($arr, $rs["MODEL_ID"]);
    	}
    	return $arr;
    }
    public function getModel(){
    	session_start();
    	$modelList = $_SESSION["modelList"];
    	//var_dump($modelList);
    	$p = array_merge_recursive($_GET, $_POST);
    	$currentUri = $_SERVER["REQUEST_URI"];
    	$falg = false;
    	if(strpos($currentUri, "nofind.php")){
    		return ;
    	}
    	
    	
    	foreach ($modelList as $modelname=> $link){
    		$arr = explode("?", $link);
    		$uri = $arr[0];
    		if($arr[0]!=$currentUri){
    			$falg = false;
    			continue;
    		}else{
    			$falg = true;
    		}
    		$queryString = $arr[1];
    		$parm = explode("&",$queryString);
    		
    		foreach ($parm as $str){
    			$arr2 = explode("?", $str);
    			$pname= $arr2[0];
    			$pval = $arr2[1];
    			foreach($p as $key=>$val){
    				if($key==$pname&&$val!=$pval){
    					$falg = false; break;
    				}else{
    					$falg = true;
    				}
    			}
    			if(!$falg) break;
    		}
			if($falg){
// 				return array("modelname"=>$modelname,"link"=>$link);
				return $modelname;
			}			    		
    	}
    	
    	//header('Location:'.$GLOBALS["admin"]."nofind.php");
    	
    }
    */
    
}



?>