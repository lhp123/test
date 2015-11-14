<?
include_once 'INCLUDE.php'; 
?>
<?	
	$action=filterParaAllByName("action");
	if($action=="jjrsearch"){
		jjrsearch($conn,$CID,filterParaNumberByName("page"),10);
		return;
	}
	else if($action=="jjrfysearch"){
		JjrFyList($conn,$CID,filterParaNumberByName("page"),10,filterParaAllByName("id"));
		return;
	}
?>
<?php
function jjrsearch($conn,$cid,$page,$size,$JJRDEFPHOTO="img/peoType.png"){	
		header('Content-type: text/html;charset=GBK'); 
		include_once 'picys/ImageCompressUse.php';
        $condition="";
		$mohu=filterParaByName("mohu");
		//echo $mohu."<br><br>";
		if($mohu!=""){
			$condition.=" and (U.USERNAME like '%".$mohu."%' or U.TEL like '%".$mohu."%')";
		}
		$msql="SELECT @rownum:=@rownum+1 ROW,b.* FROM (SELECT @rownum:=0,D.DEPTNAME,U.* FROM XT_DEPT D,XT_USER U WHERE D.ID=U.FK_DEPTID ".$condition." AND D.IFDELETED=0 AND U.IFDELETED=0 AND U.CID='".$cid."' AND U.IF_SHOW=1 ORDER BY U.TABORDER limit ".($size*$page).",".$size.") b ";
		//p_gbk($msql);
		$mstmt=mysql_query(get_gbk($msql),$conn);
		while ( $mrs=mysql_fetch_array ( $mstmt ) ){	
			if($mrs["ROW"]==1){
				p_gbk("<div class='Gb2'>".($size*$page+1)."-".($size*($page+1))."条</div>");//
			}
			echo "<a href='jjrdetail.php?id=".$mrs["ID"]."' class='Gb2'> ";
			//echo getCompressPic($mrs["PHOTO"]);
			$photo=($mrs["PHOTO"]==""?$JJRDEFPHOTO:getCompressPic($mrs["PHOTO"]));
			echo "<img src='".$photo."' width='90' height='120'>";
			$tel=strlen($mrs["TEL"])>11?substr($mrs["TEL"],1,11):$mrs["TEL"];
			p_gbk("<span class='Gb1' style='margin-top:20px;'><span><div class='name'>".get_utf8($mrs["USERNAME"])."</div><label class='b1a2 Gf1'><i>".$tel."</i></label></span><span>所属门店：".get_utf8($mrs["DEPTNAME"])."</span>");
			p_gbk("<span>服务商圈：".get_utf8($mrs["FWSQ"])."</span></span>");
			echo "</a>";
			$i++;
		}
		return;
}

function jjrdetail($conn,$cid,$uid){
	$msql="SELECT D.DEPTNAME,U.* FROM XT_DEPT D,XT_USER U WHERE D.ID=U.FK_DEPTID AND D.IFDELETED=0 AND U.IFDELETED=0 AND U.CID='".$cid."' AND U.ID='".$uid."'";
	$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs;
}
function JjrFyList($conn,$cid,$page,$size,$uid){
		header('Content-type: text/html;charset=GBK'); 
		include_once 'picys/ImageCompressUse.php';
		$msql="SELECT @rownum:=@rownum+1 ROW,b.* FROM (SELECT @rownum:=0,IF(F.FXT='',F.PHOTO,CONCAT((IF(F.PHOTO='','',CONCAT(F.PHOTO,';'))),F.FXT)) FXTPHOTO,F.* FROM XT_USER U,FY F WHERE U.ID=F.USERID AND F.USERID='".$uid."' AND F.IFDELETED=0 AND U.IFDELETED=0 AND U.IF_SHOW=1 AND F.IF_SHOW=1 AND F.IFDELETED=0 AND U.IFDELETED=0 AND U.CID='".$cid."' AND F.CID='".$cid."' AND F.TYPE='".(filterParaAllByName("y")=="mm"?"出售":"出租")."' ORDER BY F.INPUT_DATE DESC limit ".($size*$page).",".$size.") b ";
		//p_gbk($msql);
		$mstmt=mysql_query(get_gbk($msql),$conn);
		while ( $mrs=mysql_fetch_array ( $mstmt ) ){ 
			if($mrs["ROW"]==1){
				p_gbk("<div class='Gb2'>".($size*$page+1)."-".($size*($page+1))."条</div>");//
			}
			echo "<a href='fydetail.php?id=".$mrs["ID"]."' class='Gb'> ";
			$photo=$mrs["PHOTO"];
			$photo=explode(";",$photo);
			echo "<img src='".getCompressPic($photo[0])."'></img> ";
			echo "<span class='Gb1'><span>".$mrs["TITLE"]."</span><span>".$mrs["DEPTNAME"]."&nbsp;&nbsp;<em class='b1b'>".$mrs["DISNAME"]."</em></span>";
			p_gbk("<span>".$mrs["H_SHI"]."室".$mrs["H_TING"]."厅&nbsp;&nbsp;".number_format($mrs["BUILD_AREA"],0)."平米<label class='b1a Gf1'><i>".number_format($mrs["PRICE"],0)."</i>万</label></span></span> </a>");
		}
		return;    
}
function getJjrFyCount($conn,$CID,$uid){
	$msql="SELECT COUNT(1) as C FROM XT_USER U,FY F WHERE U.ID=F.USERID AND F.USERID='".$uid."' AND F.IFDELETED=0 AND U.IFDELETED=0 AND U.IF_SHOW=1 AND F.IF_SHOW=1";
		$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs["C"];
    
}
?>