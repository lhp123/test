<?
include 'include/tools.php';
$POS="list";
$prefix = "dis_price";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "小区价格";

include 'action/XqPriceAction.php';
$dept = new XqPriceAction($conn,$CID);
$listPage =$dept->control();

include 'head.php';
?>



<div id="main">
  <?include 'menu.php';?>
  <div id="main_right">
  	<div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"",1,ifHasPriL2("1PZGL_2XQJG_3TJ")); ?>
     	
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
                <td width="60"  align="left" style="border-bottom:#333 1px inset;"><strong>小区名称</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>价格</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>日期</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>类型</strong></td>
                <td width="60"  align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
            </tr>
           <?php
            	
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x'>".$rs['PNAME']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['AVGPRICE']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['P_DATE']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['TYPE']."</td>";
            	    echo "<td   align='left' class='table_x'>";
            	    if(ifHasPriL2("1PZGL_2XQJG_3XG")){
            	    	echo "<a  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>修改</span></a>&nbsp;&nbsp;";
            	    }
            	    if(ifHasPriL2("1PZGL_2XQJG_3SC")){
            	    	echo "<a href='".$detail."?action=del&id=".$rs["ID"]."' onclick = 'return confirm(\"删除后将无法恢复,确定要删除吗?\")' title='删除'>删除</a>";
            	    }
            	    echo "</td>";
            	    echo "</tr>";
            	}
            	
            ?>
        </table>
     <?php  $listPage->getPageBar2();?>
    </div>
  </div>
</div>

<?include 'tail.php';?>

