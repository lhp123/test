<?
include 'include/tools.php';
$POS="list";
$prefix = "fywt";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "房源委托信息";


include 'action/FyWtAction.php';
$fy = new FyWtAction($conn,$CID);

include_once 'head.php';
?>


<div id="main">
  <?include 'menu.php';?>
  <div id="main_right">
  <div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"",0); ?>
      <div id="title_box_2">
      
      <!-- 查询表单 -->
      <form id= "search" action="<?php echo $page?>" method="get">
      <table border="0" cellpadding="0" cellspacing="0">
      	<tr>
        <tr>
            <td nowrap>时间搜索:
               <input type="text" name="stime" value="<?php echo $_REQUEST["stime"]?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})"style="width:80px;" />&nbsp;-&nbsp;<input type="text" name="dtime" value="<?php echo $_REQUEST["dtime"]?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" style="width:80px;margin-right:20px;" />
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
            	<td width="58" height="30"  style="border-bottom:#333 1px inset;"></td>
            	<td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>联系人</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>电话</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>委托日期</strong></td>
                <td width="70"  align="left" style="border-bottom:#333 1px inset;"><strong>类型</strong></td>
                <td width="70"   align="left" style="border-bottom:#333 1px inset;"><strong>面积</strong></td>
                <td width="80"   align="left" style="border-bottom:#333 1px inset;"><strong>价格</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>小区</strong></td>
                <td width="70"  align="left" style="border-bottom:#333 1px inset;"><strong>装修情况</strong></td>
                <td width="120"  align=left style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
            </tr>
            <?php
                $listPage = $fy->control(10);
                //echo $fy->getSql();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x' >".$rs[LINKNAME]."</td>";
            	    echo "<td   align='left' class='table_x' >".$rs[LINKTEL]."</td>";
            	    echo "<td   align='left' class='table_x' >".substr($rs["WTDATE"],0,10)."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs["TYPE"]."</td>";
            	    echo "<td   align='left' class='table_x'>".round($rs["AREA"])."㎡</td>";
            	    echo "<td   align='left' class='table_x' >".$rs["PRICE"]."</td>";
            	    echo "<td   align='left' class='table_x' title='".$rs["RE1"]."&nbsp;".$rs["DISNAME"]."'>".$rs["DISNAME"]."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['FITMENT']."</td>";
            	    echo "<td   align='left' class='table_x'>";
            	    if(ifHasPriL2("1FYGL_2FYWT_3CK")){
            	    	echo "<A  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>查看</span></a>&nbsp;&nbsp;";
            	    }
            	    if(ifHasPriL2("1FYGL_2FYWT_3SC")){
            	    	echo "<a href='".$detail."?action=del&id=".$rs["ID"]."' onclick = 'return confirm(\"删除后将无法恢复,确定要删除吗?\")' title='删除'>删除</A>";
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

