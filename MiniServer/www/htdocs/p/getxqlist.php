<?ob_start();
include_once 'INCLUDE.php'; 
?>
<?	
	$action=filterParaAll($_REQUEST["action"]);
	if($action=="xqsearch"){
		xqsearch($conn,$CID,filterParaNumber($_REQUEST["page"]),10);		ob_end_flush();
		return;
	}	
?>
<?php
function xqsearch($conn,$cid,$page,$size){	
		header('Content-type: text/html;charset=GBK'); 
		include_once 'picys/ImageCompressUse.php';
		$condition="";
		$re1=filterPara($_REQUEST["re1"]);
		if($re1!=""){
			$condition.=" and PPNAME='".$re1."'";
		}
		$re2=filterPara($_REQUEST["re2"]);
		if($re2!=""){
			$condition.=" and PNAME='".$re2."'";
		}
		$re3=filterPara($_REQUEST["re3"]);
		if($re3!=""){
			$condition.=" and NAME='".$re3."'";
		}
		$mohu=filterPara($_REQUEST["mohu"]);
		if($mohu!=""){
//			$condition.=" and PPNAME||PNAME||NAME like '%".$mohu."%'";
			$condition.=" and (PPNAME like '%".$mohu."%' or PNAME like '%".$mohu."%' or NAME like '%".$mohu."%')";
		}

		$msql="SELECT @rownum:=@rownum+1 ROW,b.* FROM (SELECT @rownum:=0,IF(D.SJT='',D.BWT,CONCAT((IF(D.SJT='','',CONCAT(D.SJT,';'))),D.BWT)) DISPHOTO,U.TEL USERTEL,D.* FROM XT_USER U,PZ_DIS D WHERE U.ID=D.FK_USERID AND U.IFDELETED=0 AND D.IFDELETED=0 ".$condition." AND U.CID='".$cid."' AND D.CID='".$cid."' ORDER BY D.TABORDER limit ".($size*$page).",".$size.") b ";
		//p_gbk($msql);
		$mstmt=mysql_query(get_gbk($msql),$conn);
		//p_gbk("<div class='Gb'>".($size*$page+1)."-".($size*($page+1))."-".$i."条</div>");//,IF(f.FXT='',f.PHOTO,CONCAT(f.PHOTO,';',f.FXT)) FXTPHOTO
		while ( $mrs=mysql_fetch_array ( $mstmt ) ){	
			if($mrs["ROW"]==1){
				p_gbk("<div class='Gb'>".($size*$page+1)."-".($size*($page+1))."条</div>");//
			}
			echo "<a href='xqdetail.php?id=".$mrs["ID"]."' class='Gb'> ";
			$photo=$mrs["DISPHOTO"];
			$photo=explode(";",$photo);
			echo "<img src='".getCompressPic($photo[0])."'> ";
			echo "<span class='Gb1'><span>".$mrs["NAME"]."</span><span>".$mrs["PNAME"]."&nbsp;&nbsp;<em class='b1b'>".get_gbk("买卖:")."<b>".getSameDisCountByType1($conn,$cid,$mrs["ID"],get_gbk("出售"))."</b><lable>".get_gbk("套&nbsp;&nbsp;租赁:")."<b>".getSameDisCountByType1($conn,$cid,$mrs["ID"],get_gbk("出租")).get_gbk("</b>"."套")."</em></span>";
			echo"<span> <label class='Gf1'>".$mrs["USER"]."&nbsp;<i style='color:'>".$mrs["USERTEL"]."</i></label></span>
			</span> </a>";
			$i++;
		}
		return;
}

function xqdetail($conn,$CID,$fyid){
	$msql="SELECT IF(D.SJT='',D.BWT,CONCAT((IF(D.SJT='','',CONCAT(D.SJT,';'))),D.BWT)) DISPHOTO,D.* FROM PZ_DIS D WHERE  D.IFDELETED=0 AND  D.CID='".$CID."' AND D.ID='".$fyid."'";    
	//echo $msql;
	$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs;
}function  xqdetail_jjr($fk_id,$CID){
    $sql = " select U.TEL USERTEL , U.PHOTO UPHOTO ,D.DEPTNAME DEPTNAME FROM XT_USER U RIGHT JOIN XT_DEPT D  ON U.FK_DEPTID = D.ID  WHERE  D.CID='".$CID."' AND U.CID = '".$CID."' AND  U.ID = '".$fk_id."'" ;

    //p_gbk($sql);

    $stmt=mysql_query($sql,$GLOBALS["conn"]);

    $rs=mysql_fetch_array ( $stmt );

    return $rs;
}
function getSameDisCountByType($conn,$CID,$disname,$yewu){
	$msql="select count(1) as C from FY where DISNAME='".$disname."' and TYPE='".$yewu."' and IFDELETED=0 and IF_SHOW=1";
	//echo $msql;
	$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs["C"];    
}function getSameDisCountByType1($conn,$CID,$did,$yewu){	$msql="select count(1) as C from FY where DISID='".$did."' and TYPE='".$yewu."' and IFDELETED=0 and IF_SHOW=1";	//echo $msql;	$mstmt=mysql_query($msql,$conn);	$mrs=mysql_fetch_array ( $mstmt );	return $mrs["C"];    }
?>