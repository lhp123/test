<?php 
class EallAction{
   
    private  $pageSize=10;
    private  $tablename="";
    protected   $sql="";
    private  $conn="";
    private  $cid="";
    private  $url="";
    public function  __construct($conn,$cid){
         $this->conn=$conn;
         $this->cid=$cid;
    }
    public function setTable($tablename){
        $this->tablename=$tablename;
    } 
    public function getTable(){
        return  $this->tablename;
    }
    
    public function getSql(){
        return $this->sql;
    }
    public function getCID(){
        return $this->cid;
    }
    public  function getConn(){
        return $this->conn;
    }
    public  function setUrl($url){
        $this->url = $url;
    }
    public function getUrl(){
        return $this->url;
    }
    public function getErrorUrl(){
        return "error.php";
    }
    
    /**
     * 从request中获取请求参数.
     * 带有sname的form表单元素将会被自动添加到sql中
     * @return string
     */
   public function getColSql(){
    
        $a[0]="";
        $a[1]="";
        $a[2]="";
        $sname = explode(";",$_POST["sname"]);
        foreach( $sname as $var){
            if(strlen($var)>0){
                $str=$var;
                $a[0].=",".$str;
                $a[1].=",'".filterPara($_REQUEST[$str])."'";
                $a[2].=",".$str."='".filterPara($_REQUEST[$str])."'";
            }
        }
        return $a;
    }
   public function getColSql1(){
    
        $a[0]="";
        $a[1]="";
        $a[2]="";
        $sname = explode(";",$_POST["sname"]);
        foreach( $sname as $var){
            if(strlen($var)>0){
                $str=$var;
                $a[0].=",".$str;
                $a[1].=",'".filterPara1($_REQUEST[$str])."'";
                $a[2].=",".$str."='".filterPara1($_REQUEST[$str])."'";
            }
        }
        return $a;
    }

    /**
     * 添加 sql 字段
     * @param $a
     * @param $col
     * @param $val
     * @return mixed
     */
    public function addCol($a,$col,$val){
        if(strlen($col)==0){
            return $a;
        }
        $a[0]=$a[0].",".$col;
        $a[1]=$a[1].",".$val;
        $a[2]=$a[2].",".$col." = ".$val;
        return $a;
    }

    /**
     * add sql
     * @param $id
     */
    public function getAddSql($id){
        $this->sql = "select * from ".$this->tablename." where ID='".$id."' ;";
        return $this->sql;
    }


    /**
     * 生成Insert Sql
     * @param unknown_type $a 
     * @return unknown
     */
    public function getInsertSql($a){
        $col = substr($a[0],1);
        $val = substr($a[1],1);
        $this->sql = "insert into ".$this->tablename."(".$col.") values(".$val.")";
        return $this->sql;
    }
    
    /**
     * update sql
     * @param unknown_type $a
     * @param unknown_type $id
     */
    public function getUpdateSql($a,$id){
        $this->sql = "update ".$this->tablename." set ".substr($a[2],1)." where ID = '".$id."'";
        return $this->sql;
    }
    
    /**
     * del sql
     * @param unknown_type $id
     */
    public function getDelSql($id){
        $this->sql = "delete from ".$this->tablename." where ID = '".$id."' ";
        return  $this->sql;
    }
    
    
    /**
     * 总的控制器
     * @param unknown_type $id
     */
    public function control(){
          
         $m = filterParaByName("action");//方法名称
         
         $m = ($m==""?"lists":$m);
         if($m=="lists"){
             
             return $this->lists();
         }elseif($m=="add"){
             return $this->add();
         }elseif ($m=="save"){
             $this->save();
             return ;
         }elseif($m=="del"){
             $this->del();
             return ;
         }elseif($m=="resetTB"){
             if($this->tablename=="XT_USER"||$this->tablename=="XT_DEPT"||$this->tablename=="PZ_DIS"){
                 $this->resetTB();
                 return  $this->lists();
             }
         }else{
             $this->$m();
         }
    }
    
    /**
     * 执行数据库更新
     *
     * @param unknown_type $sql
     * @return unknown
     */
    public function execute($sql){
        $this->sql = $sql!=""?$sql:$this->sql;
        $stmt=mysql_query($this->sql,$this->conn);
        return $stmt;
    }
    
    /**
     * 分页查询,返回分页对象
     * @param unknown_type $select
     * @param unknown_type $orderCol
     * @param unknown_type $where
     * @param unknown_type $pageSize
     * @return listPage
     */
    public function listPage($select,$orderCol="",$where,$pageSize,$tablename=""){
        $this->pageSize = ($pageSize!="" ? $pageSize : $this->pageSize);
        $tablename = ($tablename==""?$this->tablename:$tablename);
        $listPage = new listPage($this->conn,$tablename,$this->pageSize,$orderCol);        
        $listPage->getResult($select,$where);
//         echo $this->getSql();
        $this->sql=$listPage->creatSql($select);
        return  $listPage;
    }
    /**
     * 添加add
     * @param unknown_type $id
     * @return unknown
     */
    public function add($id=""){
        $id = ($id!=""?$id:filterParaAllByName("id"));

        if ($id!=""){
            $this->sql =$this->getAddSql($id);
            $stmt = mysql_query($this->sql,$this->conn);
            $rs = mysql_fetch_array($stmt);
            return $rs;
        }
        return ;
    }
    /**
     * 删除del
     * @param unknown_type $id
     * @param unknown_type $redirect_url
     */
    public function del($id=""){
        $id = filterParaAllByName("id");
        $this->sql = $this->getDelSql($id);
//         echo $this->sql;
        try {
            if($this->execute($this->sql)){
                header("Location:".$this->url);
            }else{
                throw new SQLException($this->sql);
            }
            
        } catch (SQLException $e) {
            echo $e->getErrorSql();
            header("Location:".$this->getErrorUrl());
        }catch (Exception $e){
            echo $e->getMessage();
        }
        
    }
    /**
     * 又子类重写save()
     */
    public function save(){
        echo "请初始化方法";
    }
    
    /**
     * 由子类重写该lists()
     */
    public function lists(){
        //echo "请初始化方法";
    }
    public function resetTB(){
        $this->sql = "update ".$this->tablename." set TABORDER = 9999";
        $this->execute($this->sql);
    }
    
    public function getIdFromTableWEB_NUM($type){
        $select = "";
        switch ($type){
            case "fy": $select="FYID";break;
            case "xq": $select="DISID";break;
            case "user": $select="USERID";break;
            case "dept": $select="DEPTID";break;
        }
        $this->sql = "select ".$select." from  WEB_NUM where ID = 1";
        $stmt = $this->execute($this->sql);
        $rs = mysql_fetch_array($stmt);
        $id = $rs[0];
        
        $this->sql = "update WEB_NUM  set ".$select." = ".$select." +1";
        $this->execute($this->sql);
        return  "WEB_".$id;
    }
    
    
    
    
    
    /**
     * 输出javascript 到页面
     */
    public function setJs($str){
        echo "<script type='text/javascript'> ".$str." </script>";
    }
    public function setJs2($str){
        echo "<script type='text/javascript' src='js/".$str."'></script>";
    }
   
    
    /**
     * 输出行政区,片区json数组到页面
     * 
     */
    public function setDeptJson(){
        $stmt=$this->execute("select ID,NAME from PZ_RE1 where  CID='".$this->cid."'");
        $Jscode="";
        while($rs=mysql_fetch_array($stmt)){
            $Jscode.=",{'NAME':'".$rs["NAME"]."','ID':'".$rs["ID"]."'}";
        }
        if(strlen($Jscode)>0){
            $Jscode=substr($Jscode,1);
        }
        $this->setJs("  re1 = [".$Jscode."];"); //行政区
    
    
        $stmt=$this->execute("select ID,NAME,PID from PZ_RE2 where   CID='".$this->cid."' and IF_TB = 1");
        $Jscode="";
        while($rs=mysql_fetch_array($stmt)){
            $Jscode.=",{'NAME':'".$rs["NAME"]."','ID':'".$rs["ID"]."','PID':'".$rs["PID"]."'}";
        }
        if(strlen($Jscode)>0){
            $Jscode=substr($Jscode,1);
        }
        $this->setJs("  re2 = [".$Jscode."];"); //片区
        $this->setJs2("getRe.js"); 
       
    }
    
    
    /**
     * 输出小区json数组到页面
     */
    private  $diaoyong1 = FALSE;
    public function setXqJson(){
        $stmt = $this->execute("select ID,PPNAME,PNAME,NAME FROM PZ_DIS WHERE CID='".$this->cid."' AND  IFDELETED=0");
        $jscode="";
        while($rs = mysql_fetch_array($stmt)){
            $jscode.=",{'NAME':'".$rs["NAME"]."','ID':'".$rs["ID"]."','PNAME':'".$rs["PNAME"]."','PPNAME':'".$rs["PPNAME"]."'}";
        }
        if(strlen($jscode)>0){
            $jscode = substr($jscode,1);
        }
        $this->setJs(" xq = [".$jscode."]");
        if(!$this->diaoyong1){
            $this->setJs2("getXq.js");
            $this->diaoyong1 = true;
        }
    }
    /**

     * 输出小区json数组到页面

     */

    private  $diaoyong4 = FALSE;

    public function setXqJson1(){

        $stmt = $this->execute("select ID,NAME,PID,PPID,PNAME,PPNAME FROM PZ_DIS WHERE CID='".$this->cid."' AND  IFDELETED=0");

        $jscode="";

        while($rs = mysql_fetch_array($stmt)){

             $jscode.=",{'NAME':'".$rs["NAME"]."','ID':'".$rs["ID"]."','PID':'".$rs["PID"]."','PPID':'".$rs["PPID"]."','PPNAME':'".$rs["PPNAME"]."','PNAME':'".$rs["PNAME"]."'}";
        	
        }

        if(strlen($jscode)>0){

            $jscode = substr($jscode,1);

        }

        $this->setJs(" xq = [".$jscode."]");

        if(!$this->diaoyong4){

            $this->setJs2("getXq.js");

            $this->diaoyong4 = true;

        }

    }
    
 /**
     * 输出经纪人json数组到页面
     */
	 private  $diaoyong3 = FALSE;
    public function setUserJson(){
        $stmt = $this->execute(" select ID,FK_DEPTID,USERNAME NAME from XT_USER WHERE CID='".$this->cid."' AND IFDELETED=0");
        $jscode="";
        while($rs = mysql_fetch_array($stmt)){
            $jscode.=",{'NAME':'".$rs["NAME"]."','FK_DEPTID':'".$rs["FK_DEPTID"]."','ID':'".$rs["ID"]."'}";
        }
        if(strlen($jscode)>0){
            $jscode = substr($jscode,1);
        }
        $this->setJs(" users = [".$jscode."]");
        if(!$this->diaoyong3){
            $this->setJs2("getUser.js");
            $this->diaoyong3 = true;
        }
    }
    /**
     * 从 PZ_PROFILE_SUB,PZ_PROFILE 得到新闻类型 ,
     * @param unknown_type $jsonname ,json数组名称
     * @param unknown_type $type , 类型
     */
    public function setNewsJson(){
       
        $stmt = $this->execute("select ID, NAME,TYPE from PZ_PROFILE_SUB where PTYPE='新闻类型' AND CID ='".$this->cid."' ORDER BY TABORDER");
        $jscode ="";
        while ($rs = mysql_fetch_array($stmt)) {
            $jscode.=",{'NAME':'".$rs["NAME"]."','TYPE':'".$rs["TYPE"]."'}";
        }
        if(strlen($jscode)>0){
            $jscode=substr($jscode,1);
        }
        $this->setJs("newstype = [".$jscode."];");
        $this->setJs2("getNewsType.js");
    }
    
    /**
     * 从 PZ_PROFILE 得到普通配置 ,
     * @param unknown_type $jsonname ,json数组名称
     * @param unknown_type $type , 类型
     */
    private  $diaoyong2 = FALSE;
    public function setPtJson($jsonname,$type){
        $stmt = $this->execute("select ID,NAME from PZ_PROFILE where TYPE='".$type."' AND CID ='".$this->cid."' ORDER BY TABORDER");
        $jscode ="";
        while ($rs = mysql_fetch_array($stmt)) {
            $jscode.=",{'NAME':'".$rs["NAME"]."','ID':'".$rs["ID"]."'}";
        }
        if(strlen($jscode)>0){
            $jscode=substr($jscode,1);
        }
        
        $this->setJs($jsonname." = [".$jscode."];");
        if(!$this->diaoyong2){
            $this->setJs2("getPt.js");
            $this->diaoyong2 = true;
        }
         
    }
    
    public function array_add($arr,$key,$val=""){
    
    	$arr = array_merge($arr,array($key=>$val));
    	return $arr;
    }
    
}

?>