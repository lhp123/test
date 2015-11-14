<?
include_once 'INCLUDE.php'; 
?>
<?	
	$action=filterParaAllByName("action");
	if($action=="xfsearch"){
		xfsearch($conn,$CID,filterParaNumberByName("page"),10);
		return;
	}	
?>
<?php
function xfsearch($conn,$cid,$page,$size){	
		header('Content-type: text/html;charset=GBK'); 
		include_once 'picys/ImageCompressUse.php';
		$condition="";
		$re1=filterParaByName("re1");
		if($re1!=""){
			$condition.=" and RE1='".$re1."'";
		}
		$re2=filterParaByName("re2");
		if($re2!=""){
			$condition.=" and RE2='".$re2."'";
		}
		$re3=filterParaByName("re3");
		if($re3!=""){
			$condition.=" and LPNAME='".$re3."'";
		}
		$mohu=filterParaByName("mohu");
		if($mohu!=""){
//			$condition.=" and RE1||RE2||LPNAME like '%".$mohu."%'";
            $condition.=" and (RE1 like '%".$mohu."%' or RE2 like '%".$mohu."%' or LPNAME like '%".$mohu."%')";
		}
		$price=filterParaAllByName("price");
		if($price!=""){
			$p_str=explode("_",$price);
			$condition.=" and PRICE>=".$p_str[0]." and PRICE<=".$p_str[1]."";
		}
		$msql="SELECT @rownum:=@rownum+1 ROW,b.* FROM (SELECT @rownum:=0,IF(f.HXT='',f.PHOTO,CONCAT((IF(f.PHOTO='','',CONCAT(f.PHOTO,';'))),f.HXT)) HXTPHOTO, f.* FROM NEWHOUSE f WHERE IF_SHOW=1 ".$condition." AND CID='".$cid."'  ORDER BY INPUT_DATE DESC limit ".($size*$page).",".$size.") b ";
		
		$mstmt=mysql_query(get_gbk($msql),$conn);
		//p_gbk("<div class='Gb'>".($size*$page+1)."-".($size*($page+1))."-".$i."条</div>");//,IF(f.FXT='',f.PHOTO,CONCAT(f.PHOTO,';',f.FXT)) FXTPHOTO
		while ( $mrs=mysql_fetch_array ( $mstmt ) ){	
			if($mrs["ROW"]==1){
				p_gbk("<div class='Gb'>".($size*$page+1)."-".($size*($page+1))."条</div>");//
			}
			echo "<a href='xfdetail.php?id=".$mrs["ID"]."' class='Gb'> ";
			$photo=$mrs["HXTPHOTO"];
			$photo=explode(";",$photo);
			echo "<img src='".getCompressPic($photo[0])."'> ";
			echo "<span class='Gb1'><span style='height:25px; line-height:25px;'>".$mrs["LPNAME"]."</span><span>".get_gbk("主推:").$mrs["ZTHX"]."&nbsp;&nbsp;<br/><em class='b1b'>".get_gbk("面积:".($mrs["JZMJ"]>=10000?number_format($mrs["JZMJ"]/10000,1)."万":$mrs["JZMJ"])."平米")."</em></span>";
			echo "<span>".get_gbk("开发商:").$mrs["KFS"]."<br/><label class='Gf1'>".get_gbk("热线:")."<i>".$mrs["TEL"]."</i></label></span>
			</span> </a>";
			$i++;
		}
		return;
}

function xfdetail($conn,$CID,$fyid){
	$msql="SELECT IF(f.HXT='',f.PHOTO,CONCAT((IF(f.PHOTO='','',CONCAT(f.PHOTO,';'))),f.HXT)) HXTPHOTO, f.* FROM NEWHOUSE f WHERE f.IF_SHOW=1 AND f.CID='".$CID."' AND f.ID='".$fyid."'";
	//p_gbk($msql);
	$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs;
}

function getSameDisCount($conn,$CID,$disname){
	$msql="select count(1) as C from FY where DISNAME='".$disname."' and IFDELETED=0 and IF_SHOW=1";
	$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs["C"];
    
}
?>