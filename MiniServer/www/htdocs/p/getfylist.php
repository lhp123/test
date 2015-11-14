<?
include_once 'INCLUDE.php'; 
?>
<?	
	$action=filterParaAll($_REQUEST["action"]);
	if($action=="indextjlist"){
		indexTjFy($conn,$CID,filterParaNumber($_REQUEST["page"]),10);
		return;
	}
	if($action=="fysearch"){
		fysearch($conn,$CID,filterParaNumber($_REQUEST["page"]),10);
		return;
	}	
?>
<?php
function indexTjFy($conn,$cid,$page,$size){
		header('Content-type: text/html;charset=GBK'); 	
		include_once 'picys/ImageCompressUse.php';
		p_gbk("<div class='Gt'>".($size*$page)."-".($size*($page+1))."条</div>");//,IF(f.FXT='',f.PHOTO,CONCAT(f.PHOTO,';',f.FXT)) FXTPHOTO
		$msql="SELECT * FROM (SELECT f.* FROM FY f WHERE IF_TJ=0 AND IF_SHOW=1 AND IFDELETED=0 AND CID='".$cid."' AND TYPE='出售' ORDER BY INPUT_DATE DESC) b limit 0,".$size;
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
		$condition="";
		$y=filterParaAll($_REQUEST["y"]);
		if($y!=""){
			$condition.=" and type='".($y=="mm"?"出售":"出租")."'";
		}
		$re1=filterPara($_REQUEST["re1"]);
		if($re1!=""){
			$condition.=" and RE1='".$re1."'";
		}
		$re2=filterPara($_REQUEST["re2"]);
		if($re2!=""){
			$condition.=" and RE2='".$re2."'";
		}
		$re3=filterPara($_REQUEST["re3"]);
		if($re3!=""){
			$condition.=" and DISNAME='".$re3."'";
		}
		$mohu=filterPara($_REQUEST["mohu"]);
		if($mohu!=""){
		    $condition.=" and (RE1 like '%".$mohu."%'   or RE2 like '%".$mohu."%' or DISNAME like '%".$mohu."%' or FWLABLE like '%".$mohu."%' or TITLE like '%".$mohu."%' )";
		    //$condition.=" and RE1||RE2||DISNAME||FWLABLE||TITLE like '%".$mohu."%' ";
		}
		$price=filterParaAll($_REQUEST["price"]);
		if($price!=""){
			$p_str=explode("_",$price);
			$condition.=" and PRICE>=".$p_str[0]." and PRICE<=".$p_str[1]."";
		}
		$h_shi=filterParaNumber($_REQUEST["h_shi"]);
		if($h_shi!=""){
			if($h_shi==6)
				$condition.=" and H_SHI>='".$h_shi."'";
			else 
				$condition.=" and H_SHI='".$h_shi."'";
		}
		$disid = filterParaAllByName("did");
		if($disid!=""){
		    $condition.=" and DISID ='".$disid."'";
		}
		$msql="SELECT @rownum:=@rownum+1 ROW,b.* FROM (SELECT @rownum:=0,IF(f.FXT='',f.PHOTO,CONCAT(IFNULL(IF(f.PHOTO='','',CONCAT(f.PHOTO,';')),''),IFNULL(f.FXT,''))) FXTPHOTO,f.* FROM FY f WHERE IF_SHOW=1 AND IFDELETED=0 ".$condition." AND CID='".$cid."' AND TYPE='".(filterParaAll($_REQUEST["y"])=="mm"?"出售":"出租")."' ORDER BY INPUT_DATE DESC limit ".($size*$page).",".$size.") b ";
        //p_gbk($msql);
		$mstmt=mysql_query(get_gbk($msql),$conn);
		//p_gbk("<div class='Gb'>".($size*$page+1)."-".($size*($page+1))."-".$i."条</div>");//,IF(f.FXT='',f.PHOTO,CONCAT(f.PHOTO,';',f.FXT)) FXTPHOTO
		while ( $mrs=mysql_fetch_array ( $mstmt ) ){	
			if($mrs["ROW"]==1){
				p_gbk("<div class='Gb'>".($size*$page+1)."-".($size*($page+1))."条</div>");//
			}
			echo "<a href='fydetail.php?id=".$mrs["ID"]."&y=".filterParaAll($_REQUEST["y"])."' class='Gb'> ";
			$photo=$mrs["PHOTO"];
			$photo=explode(";",$photo);//getCompressPic($photo[0])
			//$picstr=getCompressPic($photo[0]);
			echo "<img src='".getCompressPic($photo[0])."'> ";
			echo "<span class='Gb1'><span>".$mrs["TITLE"]."</span><span>".$mrs["DEPTNAME"]."&nbsp;&nbsp;<em class='b1b'>".$mrs["DISNAME"]."</em></span>";
			p_gbk("<span>".$mrs["H_SHI"]."室".$mrs["H_TING"]."厅&nbsp;&nbsp;".number_format($mrs["BUILD_AREA"],0)."平米<label class='b1a Gf1'><i>".
			p_gbk("<span>".get_utf8($mrs["RE2"]."&nbsp;".$mrs["DISNAME"])." ，".($mrs["JZ_YEAR"]!=""?$mrs["JZ_YEAR"]." 年建 ，":"").get_utf8($mrs["FYFL"])."</span>").
			(filterParaAll($_REQUEST['y'])=='mm'?number_format($mrs["PRICE"],0)."万":($mrs["PRICE"]>10000?($mrs["PRICE"]/10000)."万":number_format($mrs["PRICE"],0)))."</i></label></span>");
			if ($mrs["FWLABLE"]!=""){
				$wflb = explode(";",$mrs["FWLABLE"]);
				for( $i=0;$i<count($wflb)&&$i<3;$i++){
					if($wflb[$i]!=""){
					    if($i %2==0){
					        echo "<span style='float:left;line-height: 15px;padding-top:2px;border: 1px rgb(171, 240, 96) solid;margin-right: 5px;'>".$wflb[$i]."</span>";
					    }else {
					        echo "<span style='float:left;line-height: 15px;padding-top:2px;border: 1px rgb(238, 125, 184) solid;margin-right: 5px;'>".$wflb[$i]."</span>";
					    }
					}
				}
			}
			p_gbk("</span> </a>");
			
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
function getSameDisCount($conn,$CID,$disname){
	$msql="select count(1) as C from FY where DISNAME='".$disname."' and IFDELETED=0 and IF_SHOW=1";
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