<?
include 'include/tools.php';
$POS="list";
$prefix = "fy";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
if($_REQUEST["type"]==""){
	$type="出售";
}else{
	$type = $_REQUEST["type"];
}
if($type == ""||$type=="出售"){
    $title = "买卖房源管理";
    $prixg="1FYGL_2MMFY_3XG";
    $prisc="1FYGL_2MMFY_3SC";
}elseif($type=="出租"){
    $title = "租赁房源管理";
    $prixg="1FYGL_2ZLFY_3XG";
    $prisc="1FYGL_2ZLFY_3SC";
}

include 'action/FyAction.php';
$fy = new FyAction($conn,$CID);
$listPage = $fy->control();
include 'head.php';
?>

<div id="main">
  <?include 'menu.php';?>
  <div id="main_right">
  <div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"&type=".$type,1,ifHasPriL2("1FYGL_2MMFY_3TJ")); ?>
      <div id="title_box_2">
      
      <!-- 查询表单 -->
      <form id= "search" action="<?php echo $page?>?type=<?php echo $type?>" method="post">
      <table border="0" cellpadding="0" cellspacing="0">
      	<tr>
        <tr>
        	<td width="90">
                <select style="height:27px; padding:3px 3px;width:100px;" name="re1"">
                  <option value="">行政区</option>
                  <?php 
                  	$sql="SELECT ID,NAME FROM PZ_RE1 WHERE CID='".$CID."'";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["NAME"]."'".($_REQUEST["re1"]==$rs[NAME]?"selected":"").">".$rs['NAME']."</option>";
					}
                  ?>
                </select>        
                
            </td>
            
            <td width="90">
                <select style="height:27px; padding:3px 3px;width:100px;" name="area" stype="qujian">
                  <option value="">面积</option>
                  <?php 
                  	$sql="select * from PZ_BOUND where TYPE = '面积区间' AND CID='".$CID."' order by TABORDER";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["MEMO"]."'".($_REQUEST["area"]==$rs[MEMO]?"selected":"")." down='".$rs["DOWN"]."' up='".$rs["UP"]."' >".$rs['MEMO']."</option>";
					}
                  ?>
                </select>
                <input type="hidden" id="up" name="area_up" value="<?php echo $_REQUEST["area_up"]?>"/>
                <input type="hidden" id="down" name="area_down" value="<?php echo $_REQUEST["area_down"]?>"/>
            </td>
           
            <td width="90">
                <select style="height:27px; padding:3px 3px;width:100px;"  name="price" stype="qujian">
                  <option value="">价格</option>
                  <?php 
                  	$sql="select * from PZ_BOUND where TYPE = '".($type=="出售"?"":"租赁")."价格区间' AND CID='".$CID."' order by TABORDER";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["MEMO"]."'".($_REQUEST["price"]==$rs[MEMO]?"selected":"")." down='".$rs["DOWN"]."' up='".$rs["UP"]."' >".$rs['MEMO']."</option>";
					}
                  ?>
                </select>
                <input type="hidden" id="up" name="price_up" value="<?php echo $_REQUEST["price_up"]?>"/>
                <input type="hidden" id="down" name="price_down" value="<?php echo $_REQUEST["price_down"]?>"/>
            </td>
            
            <td width="90">
                <select style="height:27px; padding:3px 3px;width:100px;" name="username">
                  <option value="">经纪人</option>
                  <?php 
                  	$sql="select ID,USERNAME from XT_USER where IF_SHOW=1 AND CID='".$CID."' order by ID";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["USERNAME"]."'".($_REQUEST["username"]==$rs[USERNAME]?"selected":"").">".$rs['USERNAME']."</option>";
					}
                  ?>
                </select>
            </td>
            
            <td align="right">
            	<input style="height:21px; line-height:21px;" name="mohu" value="<?php echo $_REQUEST["mohu"]?>"type="text" />
            </td>
            <td align="left">
           	  <input value="" type="button"  class = "search"  />
            </td>
        </tr>
      </table>
      </form>	
      </div>
    </div>
   
   
   <!-- 列表 -->
    <div id="main_right_main_lb">
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="40" height="30"  style="border-bottom:#333 1px inset;"></td>
            	<td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>标题</strong></td>
                <td width="80"  align="left" style="border-bottom:#333 1px inset;"><strong>房源编号</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>所属小区</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>户型</strong></td>
                <td width="80"   align="left" style="border-bottom:#333 1px inset;"><strong>面积</strong></td>
                <td width="90"   align="left" style="border-bottom:#333 1px inset;"><strong>价格</strong></td>
                <td width="80"  align="left" style="border-bottom:#333 1px inset;"><strong>经纪人</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>访问/点击</strong></td>
                <td width="90"  align=left style="border-bottom:#333 1px inset;"><strong>操作</strong></td>                
            </tr>
            <?php
                
                //echo $fy->getSql();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x' title='".$rs['TITLE']."'>".$rs['TITLE']."</td>";
            	    echo "<td   align='left' class='table_x' title='".$rs['CONTRACT_CODE']."'>".$rs['CONTRACT_CODE']."</td>";
            	    echo "<td   align='left' class='table_x' title='".($rs["RE1"]."&nbsp;".$rs["RE2"]."&nbsp;".$rs["DISNAME"])."'>".$rs["DISNAME"]."</td>";
            	    $hx = ($rs["H_SHI"]!=""?$rs["H_SHI"]."室":"").($rs["H_TING"]!=""?$rs["H_TING"]."厅":"").($rs["H_WEI"]!=""?$rs["H_WEI"]."卫":"");
            	    echo "<td   align='left' class='table_x'>".$hx."</td>";
            	    echo "<td   align='left' class='table_x'>".round($rs["BUILD_AREA"])."㎡</td>";
            	    $price = $rs["TYPE"]=="出售"?round($rs["PRICE"],1)."万":round($rs["PRICE"])."元/月";
            	    echo "<td   align='left' class='table_x' >".$price."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['USERNAME']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['NUMIP']."/".$rs['NUM']."</td>";
            	    
            	    echo "<td   align='left' class='table_x'>";
//             	    echo $prixg."---".$prisc;
            	    if(checkPriL2($prixg, $rs["USERID"])){
            	    	echo "<a href='".$detail."?action=add&type=".$type."&id=".$rs["ID"]."'><span class='db'>改</span></a>&nbsp;&nbsp;";
            	    }
            	    if(checkPriL2($prisc, $rs["USERID"])){
            	    	echo "<a href='".$detail."?action=del&type=".$rs["TYPE"]."&id=".$rs["ID"]."' onclick = 'return confirm(\"删除后将无法恢复,确定要删除吗?\")' title='删除'>删</a>";
            	    }
            	    echo "</td>";
            	    
            	    echo "</tr>";
            	}
            	
            ?>
        </table>
     <?php $listPage->getPageBar2(); ?>
    </div>
  </div>
</div>

<?include 'tail.php';?>

