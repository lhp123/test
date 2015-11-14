<?
include_once 'INCLUDE.php'; 
?>
<?	
	$action=filterParaAll($_REQUEST["action"]);
	
	if($action=="fysearch"){
		fysearch($conn,$CID,filterParaNumber($_REQUEST["page"]),10);
		return;
	}	
?>
<?php

function fysearch($conn,$cid,$page,$size){	
		//header('Content-type: text/html;charset=GBK'); 
		include_once 'picys/ImageCompressUse.php';
		$condition="";
		$y=filterParaAll($_REQUEST["y"]);
		if($y!=""){
			$condition.=" and f.type='".($y=="mm"?"出售":"出租")."'";
		}
		$re1=filterPara($_REQUEST["re1"]);
		if($re1!=""){
			$condition.=" and f.RE1='".$re1."'";
		}
		$re2=filterPara($_REQUEST["re2"]);
		if($re2!=""){
			$condition.=" and f.RE2='".$re2."'";
		}
		$re3=filterPara($_REQUEST["re3"]);
		if($re3!=""){
			$condition.=" and f.DISNAME='".$re3."'";
		}
		$mohu=filterPara($_REQUEST["mohu"]);
		if($mohu!=""){
			$condition.=" and (RE1 like '%".$mohu."%' or RE2 like '%".$mohu."%' or DISNAME like '%".$mohu."%')";
		}
		$price=filterParaAll($_REQUEST["price"]);
		if($price!=""){
			$p_str=explode("_",$price);
			$condition.=" and f.PRICE>=".$p_str[0]." and f.PRICE<=".$p_str[1]."";
		}
		$h_shi=filterParaNumber($_REQUEST["h_shi"]);
		if($h_shi!=""){
			if($h_shi==6)
				$condition.=" and f.H_SHI>='".$h_shi."'";
			else 
				$condition.=" and f.H_SHI='".$h_shi."'";
		}
		
		// 只在第一次加载 或者 条件查询时 执行地图数据加载
		if($page == "0"){ 
		    
           $msql2="SELECT P.MAP_X  MAP_X ,P.MAP_Y MAP_Y,P.ID PID,P.NAME NAME ,COUNT(P.ID) NUM , f.TYPE TYPE FROM FY f  ,PZ_DIS P WHERE f.DISNAME=P.NAME AND f.IF_SHOW=1 AND f.IFDELETED=0  AND f.CID='".$cid."'".$condition."  GROUP BY P.ID ";

           $stmtmap = mysql_query (get_gbk($msql2), $conn);
	       echo "<sc>";
           while ( $maprs = mysql_fetch_array ( $stmtmap ) ) {
               echo "mapdate.push({MAP_Y:'" . $maprs["MAP_Y"] . "',MAP_X:'" . get_utf8($maprs ["MAP_X"]) . "',NAME:'" . get_utf8($maprs ["NAME"]) ."',NUM:'".get_utf8($maprs["NUM"])."',TYPE:'".get_utf8($maprs["TYPE"])."'});";
           }
           echo "</sc>";
		}
		
		
       
		$msql="SELECT @rownum:=@rownum+1 ROW,b.* FROM (SELECT @rownum:=0,IF(f.FXT='',f.PHOTO,CONCAT((IF(f.PHOTO='','',CONCAT(f.PHOTO,';'))),f.FXT)) FXTPHOTO,f.* FROM FY f WHERE IF_SHOW=1 AND IFDELETED=0 ".$condition." AND CID='".$cid."'  ORDER BY INPUT_DATE DESC limit ".($size*$page).",".$size.") b ";
//	    echo $msql;
		$mstmt=mysql_query(get_gbk($msql),$conn);
		//p_gbk("<div class='Gb'>".($size*$page+1)."-".($size*($page+1))."-".$i."条</div>");//,IF(f.FXT='',f.PHOTO,CONCAT(f.PHOTO,';',f.FXT)) FXTPHOTO
		while ( $mrs=mysql_fetch_array ( $mstmt ) ){	
			if($mrs["ROW"]==1){
				echo "<div class='Gb'>".($size*$page+1)."-".($size*($page+1))."条</div>";//
			}
			echo "<a href='fydetail.php?id=".$mrs["ID"]."&y=".filterParaAll($_REQUEST["y"])."' class='Gb'> ";
			$photo=$mrs["PHOTO"];
			$photo=explode(";",$photo);//getCompressPic($photo[0])
			//$picstr=getCompressPic($photo[0]);
			echo "<img src='".getCompressPic($photo[0])."' style='width:130px;height:100px;'> ";
			echo "<span class='Gb1'><span>".get_utf8($mrs["TITLE"])."</span><span>".get_utf8($mrs["DEPTNAME"])."&nbsp;&nbsp;<em class='b1b'>".get_utf8($mrs["DISNAME"])."</em></span>";
			echo "<span>".$mrs["H_SHI"]."室".$mrs["H_TING"]."厅&nbsp;".number_format($mrs["BUILD_AREA"],0)."平米"."&nbsp;待".get_utf8($mrs["TYPE"])."</span>";
			echo "<span><label class='b1a Gf1'><i>".(filterParaAll($_REQUEST['y'])=='mm'?number_format($mrs["PRICE"],0)."万":($mrs["PRICE"]>10000?($mrs["PRICE"]/10000)."万":number_format($mrs["PRICE"],0)))."</i>元</label></span></span> </a>";
			$i++;
		}


}


?>