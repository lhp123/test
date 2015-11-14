<?
include 'include/tools.php';
$POS="list";
$prefix = "lpyy";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "预约楼盘登记";

include 'action/LpyyAction.php';
$plyy = new LpyyAction($conn,$CID);

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
            	<td width="150"  align="left" style="border-bottom:#333 1px inset;"><strong>楼盘名称</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>预约人</strong></td>
                <td width="130"  align="left" style="border-bottom:#333 1px inset;"><strong>电话</strong></td>
                <td width="130"  align="left" style="border-bottom:#333 1px inset;"><strong>电子邮箱</strong></td>
                <td width="130"   align="left" style="border-bottom:#333 1px inset;"><strong>录入时间</strong></td>
                <td width="120"  align=left style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
            </tr>
            <?php
                $listPage = $plyy->control();
                //echo $plyy->getSql();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x' >".$rs["LPNAME"]."</td>";
            	    echo "<td   align='left' class='table_x' >".$rs["KHNAME"]."</td>";
            	    echo "<td   align='left' class='table_x' >".$rs["KHTEL"]."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs["EMAIL"]."</td>";
            	    echo "<td   align='left' class='table_x'>".substr($rs["INPUT_DATE"],0,16)."</td>";
            	    echo "<td   align='left' class='table_x'>";
            	    if(ifHasPriL2("1FYGL_2YYDJ_3CK")){
            	   		echo "<A  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>查看</span></a>&nbsp;&nbsp;";
            	    }
            	    if(ifHasPriL2("1FYGL_2YYDJ_3SC")){
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

