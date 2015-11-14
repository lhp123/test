<?
include 'include/tools.php';
$POS="list";
$prefix = "pz_users";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "用户配置";

include 'action/PzUserAction.php';
$dept = new PzUserAction($conn,$CID);


include 'head.php';
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
      	
            <td align="right">
            	<input style="height:21px; line-height:21px;"  value="<?php echo $_REQUEST["mohu"]?>"type="text" name="mohu"/>
            </td>
            <td align="left">
           	  <input value="" type="button" class="search"/>
            </td>
         
        </tr>
      </table>
      </form>	
      </div>
     
    </div>
    <div id="main_right_main_lb">
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="30" height="30" style="border-bottom:#333 1px inset;"></td>
                <td width="60"  align="left" style="border-bottom:#333 1px inset;"><strong>用户类型</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>出售房源条数</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>出售房源有效期</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>出售需求条数</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>出售需求有效期</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>出租房源条数</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>出租房源有效期</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>出租需求条数</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>出租需求有效期</strong></td>
                <td width="60"  align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
                
            </tr>
           <?php
            	$listPage =$dept->control();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x'>".$rs['TYPE']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['MMFYNUM']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['MMFYYXDATE']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['MMXQNUM']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['MMXQYXDATE']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['ZLFYNUM']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['ZLFYYXDATE']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['ZLXQNUM']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['ZLXQYXDATE']."</td>";
            	    echo "<td   align='left' class='table_x'><A  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>修改</span></a></td>";
            	
            	    echo "</tr>";
            	}
            	
            ?>
        </table>
     <?php  $listPage->getPageBar2();?>
    </div>
  </div>
</div>

<?include 'tail.php';?>

