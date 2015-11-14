<?
global $CID;
$CID=10;

global $CITYURL;
$CITYURL="";

global $JJRDEFPHOTO;
$JJRDEFPHOTO="img/peoType.png";

include_once 'MTOOL.php';

global $CITYNAME;
global $TEL400;

$sql = "select TEL,CITYNAME from XT_COM where ID = ".$CID;

$stmtTel = mysql_query(get_gbk($sql),$conn); 
while($rs = mysql_fetch_array($stmtTel)){
    $TEL400=$rs["TEL"];
    $CITYNAME=$rs["CITYNAME"];
}

$sqlt = "select CNAME from XT_COM where id='".$CID."'";
$stmt = mysql_query(get_gbk($sqlt),$conn);
$rs = mysql_fetch_array($stmt);
$companyName = $rs[0];

$sqlp="select * from XT_PHOTO where SYWZ='手机版首页底图' AND TYPE='图片'";
//echo $sqlp;
$stmtp=mysql_query(get_gbk($sqlp),$conn);
while ( $rsp = mysql_fetch_array ( $stmtp ) ){
	$photosy=$rsp["SRC"];
}

$sqlg="select * from XT_PHOTO where SYWZ='手机版关于我们' AND TYPE='图片'";
$stmtg=mysql_query(get_gbk($sqlg),$conn);
while ( $rsg = mysql_fetch_array ( $stmtg ) ){
	$photogy=$rsg["SRC"];
}

$sqlt="select * from XT_KEYWORDS where type='首页' and cid='".$CID."'";
$stmtt=mysql_query(get_gbk($sqlt),$conn);
while ( $rst = mysql_fetch_array ( $stmtt ) ){
    if($rst['NAME']=="TITLE"){
        $TITLE=$rst["CONTENT"];
    }
    else if($rst['NAME']=="KEYWORDS"){
        $Keyword=$rst["CONTENT"];
    }
    else if($rst['NAME']=="DESCRIPTION"){
        $Description=$rst["CONTENT"];
    }
}

$action = $_REQUEST["action"];
if($action=="info"){
    echo "{'Tel':'".$TEL400."','PhotoSy':'".$photosy."','PhotoGy':'".$photogy."','companyName':'".get_utf8($companyName)."','title':'".get_utf8($TITLE)."','Keywords':'".get_utf8($Keyword)."','description':'".get_utf8($Description)."'}";
}

?>

