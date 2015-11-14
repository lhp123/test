<?
ob_start();
include_once 'INCLUDE.php'; 
?>
<?	
	$action=filterParaAllByName("action");
	if($action=="indextjlist"){
		indexTjFy($conn,$CID,filterParaNumberByName("page"),10);
		ob_end_flush();
		return;
	}
	if($action=="fysearch"){
		fysearch($conn,$CID,filterParaNumberByName("page"),10);
		ob_end_flush();
		return;
	}	
?>
<?php
function indexTjFy($conn,$cid,$page,$size){
		header('Content-type: text/html;charset=GBK'); 	
		include_once 'picys/ImageCompressUse.php';
		p_gbk("<div class='Gt'>".($size*$page+1)."-".($size*($page+1))."条</div>");
		$msql="SELECT * FROM (SELECT f.* FROM FY f WHERE IF_TJ=1 AND IF_SHOW=1 AND IFDELETED=0 AND CID='".$cid."' AND TYPE='出售' ORDER BY INPUT_DATE DESC) b limit 0,".$size;
		//p_gbk($msql);
		$mstmt=mysql_query(get_gbk($msql),$conn);
		while ( $mrs=mysql_fetch_array ( $mstmt ) ){ 
			echo "<a href='fydetail.php?id=".$mrs["ID"]."' class='Gb'> ";
			$photo=$mrs["PHOTO"];
			$photo=explode(";",$photo);
			echo "<img src='".getCompressPic($photo[0])."'> ";
			echo "<span class='Gb1'><span>".$mrs["TITLE"]."</span><span>".$mrs["DEPTNAME"]."&nbsp;&nbsp;<em class='b1b'>".$mrs["DISNAME"]."</em></span>";
			p_gbk("<span>".$mrs["H_SHI"]."室".$mrs["H_TING"]."厅&nbsp;&nbsp;".number_format($mrs["BUILD_AREA"],0)."平米<label class='b1a Gf1'><i>".number_format($mrs["PRICE"],0)."</i>万</label></span></span> </a>");
		}
		return;
}
function fysearch($conn,$cid,$page,$size){	
		header('Content-type: text/html;charset=GBK'); 
		include_once 'picys/ImageCompressUse.php';
		$y=filterParaAllByName("y");
		$condition="";
		$re1=filterParaByName("re1");
		if($re1!=""){
			$condition.=" and RE1='".$re1."'";
		}
		$re2=filterParaByName("re2");
		if($re2!=""){
			$condition.=" and RE2='".$re2."'";
		}
		$re3=$_REQUEST["re3"];
		if($re3!=""){
			$condition.=" and DISNAME='".$re3."'";
		}
		$mohu=filterParaByName("mohu");
		if($mohu!=""){
			$condition.=" and (RE1 like '%".$mohu."%'   or RE2 like '%".$mohu."%' or DISNAME like '%".$mohu."%' or FWLABLE like '%".$mohu."%' or TITLE like '%".$mohu."%' )";
		}
		$price=filterParaAllByName("price");
		if($price!=""){
			$p_str=explode("_",$price);
			$condition.=" and PRICE>=".$p_str[0]." and PRICE<=".$p_str[1]."";
		}
		$h_shi=filterParaNumberByName("h_shi");
		if($h_shi!=""){
			if($h_shi==6)
				$condition.=" and H_SHI>='".$h_shi."'";
			else 
				$condition.=" and H_SHI='".$h_shi."'";
		}
		$label=filterParaNumberByName("label");
		if($label!=""){
			$condition.=" and LABLES like '%".$label."%'";
		}

		$sqlin="SELECT @rownum:=0,IF(f.FXT='',f.PHOTO,CONCAT(IFNULL(IF(f.PHOTO='','',CONCAT(f.PHOTO,';')),''),IFNULL(f.FXT,''))) FXTPHOTO,f.* FROM FY f WHERE IF_SHOW=1 AND IFDELETED=0 ".$condition." AND CID='".$cid."' AND TYPE='".($y=="mm"?"出售":"出租")."'";
		$count="select count(a.id) from (".$sqlin.") a";
		$mstmtc=mysql_query(get_gbk($count),$conn);
		$mrsc=mysql_fetch_array ( $mstmtc );
		$rows=$mrsc[0];
		
		$msql="SELECT @rownum:=@rownum+1 ROW,b.* FROM (".$sqlin." ORDER BY INPUT_DATE DESC limit ".($size*$page).",".$size.") b ";

		//p_gbk($msql);
		$mstmt=mysql_query(get_gbk($msql),$conn);
		//p_gbk("<div class='Gb'>".($size*$page+1)."-".($size*($page+1))."-".$i."条</div>");//,IF(f.FXT='',f.PHOTO,CONCAT(f.PHOTO,';',f.FXT)) FXTPHOTO
		
		while ( $mrs=mysql_fetch_array ( $mstmt ) ){	
			if($mrs["ROW"]==1){
				p_gbk("<div class='Gb'>".($size*$page+1)."-".($size*($page+1))."条</div>");//
			}
			echo "<a href='fydetail.php?id=".$mrs["ID"]."&y=".$y."' class='Gb'> ";
			$photo=$mrs["FXTPHOTO"];
			$photo=explode(";",$photo);//getCompressPic($photo[0])	
			echo "<img src='".getCompressPic($photo[0])."'> ";
			echo "<span class='Gb1'><span>".$mrs["TITLE"]."</span><span>".$mrs["DEPTNAME"]."&nbsp;&nbsp;<em class='b1b'>".$mrs["DISNAME"]."</em></span>";
			p_gbk("<span>".$mrs["H_SHI"]."室".$mrs["H_TING"]."厅&nbsp;&nbsp;".number_format($mrs["BUILD_AREA"],0)."平米<label class='b1a Gf1'>");
			if($y=="mm"){
				p_gbk("<i>".number_format($mrs["PRICE"],0)."</i>万");
			}else{
				if($mrs["PRICE"]>=10000){
					p_gbk("<i>".number_format($mrs["PRICE"]/10000,0)."</i>万元");
				}else{
					p_gbk("<i>".number_format($mrs["PRICE"],0)."</i>元");
				}
			}
			p_gbk("</label></span>");
			$color = array("RGB(255, 240, 157)","RGB(241, 241, 255)","RGB(243, 255, 230)");
			if($mrs["FWLABLE"]!=""){
		    $wflb = explode(";",$mrs["FWLABLE"]);
			for( $i=0;$i<count($wflb);$i++){
				if($wflb[$i]){
				  
				  echo " <span style='float: left;line-height: 15px;padding-top: 2px;border-top: 1px rgba(51, 53, 49, 0.1) solid;border-bottom: 1px rgba(51, 53, 49, 0.1) solid;margin-right: 3px;background-color: ".$color[$i].";'>".$wflb[$i]."</span>";
				   
				}
			}
		}
			if((($size*$page)+$i+1)==$rows)
				echo "<br/><br/><br/>";
			$i++;
		}
		return;
}



function fydetail($conn,$CID,$fyid){
	$msql="SELECT IF(F.FXT='',F.PHOTO,CONCAT(IFNULL(IF(F.PHOTO='','',CONCAT(F.PHOTO,';')),''),IFNULL(F.FXT,''))) PHOTOS,F.* FROM FY F WHERE F.ID='".$fyid."'";
	//echo $msql;
	$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs;
}


function fyJjr($conn,$CID,$jjrid){
	$msql="SELECT U.USERNAME,U.TEL UTEL,U.PHOTO UPHOTO FROM XT_USER U WHERE U.IFDELETED=0 AND U.ID='".$jjrid."'";
	//echo $msql;
	$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs;
}

function getSameDisCount($conn,$CID,$disname,$type){
	$msql="select count(1) as C from FY where DISNAME='".$disname."' and IFDELETED=0 and IF_SHOW=1 and type='".$type."' AND CID='".$CID."'";
	//echo get_utf8($msql);
	$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs["C"];
    
}

function getSameDisCount1($conn,$CID,$did,$re1,$type){
	$msql="select count(1) as C from FY where DISID='".$did."' and RE1='".$re1."' and IFDELETED=0 and IF_SHOW=1 and type='".$type."' AND CID='".$CID."'";
	//echo get_utf8($msql);
	$mstmt=mysql_query($msql,$conn);
	$mrs=mysql_fetch_array ( $mstmt );
	return $mrs["C"];
    
}
/**

*

* @param unknown_type $param1 当前楼层数

* @param unknown_type $param2 总楼层数

* @return string

*/

function getFloor($param1,$param2){
    
    if($param2==0){
        return $param1."层";
    }
    if($param1/$param2 > 2/3){

        return "高层";

    }elseif($param1/$param2 < 1/3){

        return "低层";

    }else{

        return "中层";

    }



}
?>