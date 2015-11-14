<?
ob_start();
include_once 'INCLUDE.php'; 
?>
<?	
	$action=filterParaAllByName("action");
	if($action=="jjrsearch"){
		jjrsearch($conn,$CID,filterParaNumberByName("page"),10);
		ob_end_flush();
		return;
	}
	else if($action=="jjrfysearch"){
		JjrFyList($conn,$CID,filterParaNumberByName("page"),10,filterParaAllByName("id"));
		ob_end_flush();
		return;
	}
?>
<?php
function jjrsearch($conn,$cid,$page,$size,$JJRDEFPHOTO="img/peoType.png"){	
		//header('Content-type: text/html;charset=GBK');
		include_once 'picys/ImageCompressUse.php';
		$condition="";
		$mohu=filterParaByName("mohu");
		//echo $mohu."<br><br>";
		if($mohu!=""){
			$condition.=" and (U.USERNAME like '%".$mohu."%' or U.TEL like '%".$mohu."%')";
		}
		$sqlin="SELECT @rownum:=0,D.DEPTNAME,U.* FROM XT_DEPT D,XT_USER U WHERE D.ID=U.FK_DEPTID ".$condition." AND D.IFDELETED=0 AND U.IFDELETED=0 AND U.CID='".$cid."' AND U.IF_SHOW=1";
		$count="select count(a.id) from (".$sqlin.") a";
		$mstmtc=mysql_query(get_gbk($count),$conn);
		$mrsc=mysql_fetch_array ( $mstmtc );
		$rows=$mrsc[0];
		$msql="SELECT @rownum:=@rownum+1 ROW,b.* FROM (".$sqlin." ORDER BY U.TABORDER limit ".($size*$page).",".$size.") b ";
		$mstmt=mysql_query(get_gbk($msql),$conn);		
		while ( $mrs=mysql_fetch_array ( $mstmt ) ){	
			if($mrs["ROW"]==1){
				echo "<div class='Gb2'>".($size*$page+1)."-".($size*($page+1))."条</div>";//
			}
			echo "<a href='jjrdetail.php?id=".$mrs["ID"]."' class='Gb2'> ";
			$photo=($mrs["PHOTO"]==""?$JJRDEFPHOTO:$mrs["PHOTO"]);
			echo "<img src='".getCompressPic($photo)."'></img>";
			$tel=strlen($mrs["TEL"])>11?substr($mrs["TEL"],1,11):$mrs["TEL"];
			echo "<span class='Gb1'><span><div class='name'>".get_utf8($mrs["USERNAME"])."</div><label class='b1a2 Gf1'><i>".$tel."</i></label></span>
	  <span>所属门店：".get_utf8($mrs["DEPTNAME"])."</span>";
			echo "<span>服务商圈：".get_utf8($mrs["FWSQ"])."</span></span>";
			echo "</a>";
			if((($size*$page)+$i+1)==$rows)
				echo "<br/><br/><br/>";
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

		$sqlin="SELECT @rownum:=0,IF(F.FXT='',F.PHOTO,CONCAT((IF(F.PHOTO='','',CONCAT(F.PHOTO,';'))),F.FXT)) FXTPHOTO,F.* FROM XT_USER U,FY F WHERE U.ID=F.USERID AND F.USERID='".$uid."' AND F.IFDELETED=0 AND U.IFDELETED=0 AND U.IF_SHOW=1 AND F.IF_SHOW=1 AND F.IFDELETED=0 AND U.IFDELETED=0 AND U.CID='".$cid."' AND F.CID='".$cid."'";
		$count="select count(a.id) from (".$sqlin.") a";
		$mstmtc=mysql_query(get_gbk($count),$conn);
		$mrsc=mysql_fetch_array ( $mstmtc );
		$rows=$mrsc[0];
		
		$msql="SELECT @rownum:=@rownum+1 ROW,b.* FROM (".$sqlin." ORDER BY F.INPUT_DATE DESC limit ".($size*$page).",".$size.") b ";

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
			p_gbk("<span>".$mrs["H_SHI"]."室".$mrs["H_TING"]."厅&nbsp;&nbsp;".number_format($mrs["BUILD_AREA"],0)."平米<label class='b1a Gf1'><i>".number_format($mrs["PRICE"],0)."</i>".(get_utf8($mrs["TYPE"])=='出售'?'万':'元/月')."</label></span></span> </a>");
			//echo "".($size*$page).",".(($size*$page)+$i+2).",".$i.",".$rows;
			if((($size*$page)+$i+1)==$rows)
				echo "<br/><br/><br/>";
			$i++;
		}
		return;    
}
function getJjrFyCount($conn,$CID,$uid){
	$msql="SELECT COUNT(1) as C FROM XT_USER U,FY F WHERE U.ID=F.USERID AND F.USERID='".$uid."' AND F.IFDELETED=0 AND U.IFDELETED=0 AND U.IF_SHOW=1 AND F.IF_SHOW=1";
	//echo $msql;
		$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs["C"];
    
}
?>

