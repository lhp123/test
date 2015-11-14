<?php 
//区间配置
$JsonStr = "";
$Msql = "select *  from PZ_BOUND  where CID='".$CID."' ORDER BY TYPE , TABORDER ";
$stmt = mysql_query($Msql,$conn);
while ($mrs = mysql_fetch_array($stmt)){
	$JsonStr.="addqj('".$mrs["MEMO"]."','".$mrs["TYPE"]."','".$mrs["DOWN"]."','".$mrs["UP"]."');";
}
echo "<script type='text/javascript'>".get_utf8($JsonStr)."</script>";


//行政区
$JsonStr = "";
$Msql = "select * from PZ_RE1 WHERE CID='".$CID."' ";
$stmt = mysql_query($Msql);
while ( $mrs = mysql_fetch_array($stmt)){
	$JsonStr.="addre1('".$mrs["ID"]."','".$mrs["NAME"]."');";
}
echo "<script type='text/javascript'>".get_utf8($JsonStr)."</script>";


//片区
$JsonStr = "";
$Msql = "select * from PZ_RE1 R1,PZ_RE2 R2 WHERE R2.CID='".$CID."' AND R2.PID= R1.ID ";
$stmt = mysql_query($Msql);
while ( $mrs = mysql_fetch_array($stmt)){
	$JsonStr.="addre2('".$mrs["ID"]."','".$mrs["NAME"]."','".$mrs["PID"]."','');";
}
echo "<script type='text/javascript'>".get_utf8($JsonStr)."</script>";


////小区
//$JsonStr = "";
//$Msql = "select * from PZ_RE1 R1,PZ_RE2 R2，PZ_DIS D  WHERE D.CID='".$CID."' AND D.PID=R2.ID AND D.PPID= R1.ID ";
//$stmt = mysql_query($Msql);
//while ( $mrs = mysql_fetch_array($stmt)){
//    $JsonStr.="addre3('".$mrs["ID"]."','".$mrs["NAME"]."','".$mrs["PID"]."','".$mrs["PPID"]."','');";
//}
//echo "<script type='text/javascript'>".get_utf8($JsonStr)."</script>";

//标签
$JsonStr = "";
$Msql = "select *  from PZ_PROFILE  where TYPE='房屋标签' and CID='".$CID."' ORDER BY TABORDER ";
$stmt = mysql_query($Msql);
while ($mrs = mysql_fetch_array($stmt)){
	$JsonStr.="addlab('".$mrs["ID"]."','".$mrs["NAME"]."');";
}
echo "<script type='text/javascript'>".get_utf8($JsonStr)."</script>";


?>