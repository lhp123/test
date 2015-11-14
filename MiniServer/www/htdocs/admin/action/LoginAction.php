<?php 
class LoginAction extends  EallAction {

    public function __construct($conn,$cid){
        parent::__construct($conn,$cid);
        $this->setTable("XT_USER");
    }
    
    public function loginCheck(){
        
        $uri = $_SERVER['REQUEST_URI'];
        if(strpos($uri,"login.php")>1){
            return ;
        }
        
        session_start();
        
        $SID=$_SESSION['USERID'];
    
        $SDEPTID=$_SESSION['DEPTID'];
    
        $SUSERNAME=$_SESSION['USERNAME'];
    
        $PASSWORD=$_SESSION['PASSWORD'];
    
        $IFSYS=$_SESSION['IFSYS'];   
        if($SID==""||!isset($_SESSION['last_access'])||(time()-$_SESSION['last_access'])>60*60){
    
            $cd_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
            setcookie("cd_url",$cd_url,time()+200);
    
            header('Location:'.$GLOBALS["adminpath"].'login.php');
    
            return;
        }
        $_SESSION['last_access'] = time();
    }
    
    public function loginOut(){
        $tc=filterParaNumber($_REQUEST["loginout"]);
        if($tc==1){
            session_start();
            $_SESSION["USERID"]="";
            $_SESSION['last_access'] ="";
            unset($_SESSION["USERID"]);
            unset($_SESSION["last_access"]);
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
            
            $this->sql="SELECT u.*,r.PRI1,r.PRI2 FROM XT_USER u LEFT OUTER JOIN XT_ROLE r on u.PRI=r.NAME WHERE u.LOGINNAME='".$loginname."' AND u.CID='".$this->getCID()."' ";
            echo $this->sql;
            $stmt=$this->execute($this->sql);
            if($code==$_SESSION["helloweba_char"]){
                if ($rs=mysql_fetch_array($stmt)){
                    if($rs["PASSWORD"]==$PASSWORD){
                        session_start();
                        $_SESSION["USERNAME"]=$rs["USERNAME"];
                        $_SESSION["LOGINNAME"]=$rs["LOGINNAME"];
                        $_SESSION["DEPTID"]=$rs["FK_DEPTID"];
                        $_SESSION["USERID"]=$rs["ID"];
                        $_SESSION["IFSYS"]=$rs["IFSYS"];
                        $_SESSION["PASSWORD"]=$rs["PASSWORD"];
                        $_SESSION["PRI"]=$rs["PRI"];
                        $_SESSION["PRI1"]=$rs["PRI1"];
                        $_SESSION["PRI2"]=$rs["PRI2"];
                        
                        $cd_url = $_COOKIE["cd_url"];
                        $_SESSION['last_access'] = time();
                        
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