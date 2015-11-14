<?php 
class LoginAction extends  EallAction {

    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("WEB_USER");
    }
    
    public function loginCheck(){        
        $uri = $_SERVER['REQUEST_URI'];
        if(strpos($uri,"login.php")>1){
            return ;
        }
        
        session_start();
        
        $SID=$_SESSION['R_HT_USERID'];    
        $SDEPTID=$_SESSION['R_HT_DEPTID'];    
        $SUSERNAME=$_SESSION['R_HT_USERNAME'];    
        $PASSWORD=$_SESSION['R_HT_PASSWORD'];            
        $IFSYS=$_SESSION['R_HT_IFSYS'];   
        
        if($SID==""||!isset($_SESSION['R_ht_last_access'])||(time()-$_SESSION['R_ht_last_access'])>60*60){
    
            $cd_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
            setcookie("cd_url",$cd_url,time()+200);
    
            header('Location:'.$GLOBALS["adminpath"].'login.php');
    
            return;
        }
        $_SESSION['R_ht_last_access'] = time();
    }
    
    public function loginOut(){
        $tc=filterParaNumber($_REQUEST["loginout"]);
        if($tc==1){
            session_start();
            $_SESSION["R_HT_USERID"]="";
            $_SESSION['R_ht_last_access'] ="";
            unset($_SESSION["R_HT_USERID"]);
            unset($_SESSION["R_ht_last_access"]);
            header('Location:'.$GLOBALS["adminpath"].'login.php');
            ob_end_flush();
            return;
        }
    }
    
    
    public function loginIn(){
        session_start();
        
        $action = filterParaAllByName('action');
        if($action=="login"){
            
            $loginname = filterParaByName("LOGINNAME");
            $code      = trim(filterParaAllByName('code_char1'));
            $PASSWORD  = filterParaAllByName("PASSWORD");            
            $this->sql="SELECT u.*,r.PRI1,r.PRI2 FROM ".$this->getTable()." u LEFT OUTER JOIN XT_ROLE r on u.PRI=r.NAME WHERE u.LOGINNAME='".$loginname."' AND u.CID='".$this->getCID()."' ";
            $stmt=$this->execute($this->sql);
            if($code==$_SESSION["helloweba_char"]){
                if ($rs=mysql_fetch_array($stmt)){
                    if($rs["PASSWORD"]==$PASSWORD){
                        session_start();
                        $_SESSION["R_HT_USERNAME"]=$rs["USERNAME"];
                        $_SESSION["R_HT_LOGINNAME"]=$rs["LOGINNAME"];
                        $_SESSION["R_HT_DEPTID"]=$rs["FK_DEPTID"];
                        $_SESSION["R_HT_USERID"]=$rs["ID"];
                        $_SESSION["R_HT_IFSYS"]=$rs["IFSYS"];
                        $_SESSION["R_HT_PASSWORD"]=$rs["PASSWORD"];
                        $_SESSION["R_HT_PRI"]=$rs["PRI"];
                        $_SESSION["R_HT_PRI1"]=$rs["PRI1"];
                        $_SESSION["R_HT_PRI2"]=$rs["PRI2"];
                        
                        $cd_url = $_COOKIE["cd_url"];
                        $_SESSION['R_ht_last_access'] = time();
                        
                        if($cd_url==""){
                            header('Location: fy_list.php');
                        }else {
                            header('Location: '.$cd_url);
                        }
                        return;
                    }else {
                        header('Location: '.$GLOBALS["adminpath"].'login.php?msg=密码错误');
                        return;
                    }
                }else {
                    header('Location: '.$GLOBALS["adminpath"].'login.php?msg=用户名不存在');
                    return ;
                }
            }else{
                header('Location: '.$GLOBALS["adminpath"].'login.php?msg=验证码错误');
            }
            return;
        }
    }
    
    
}

?>