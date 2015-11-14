<?
include 'include/tools.php';
$POS="list";
$prefix = "pz";
$page=$prefix."_list.php";
$type=$_REQUEST["type"];
$title = ($type=="pt"?"普通配置":"区间配置");
if($type=="pt"){
	$pritj="1PZGL_2PTPZ_3TJ";
}
else{
	$pritj="1PZGL_2QJPZ_3TJ";
}

include 'action/PzAction.php';
$news = new PzAction($conn,$CID);

include 'head.php';
?>


<div id="main">
  <?include 'menu.php';?>
  <div id="main_right">
  <div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"",1,ifHasPriL2($pritj)); ?>
      <div id="title_box_2">
          <!-- 查询表单 -->
          <form id= "search" action="<?php echo $page?>" method="get">
          <input type="hidden" name="type" value="<?php echo $type;?>">
              <table border="0" cellpadding="0" cellspacing="0">
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
    <script type="text/javascript">
    $(document).ready(function (){
    	$("#main_right_main_lb table tr ").eq(1).find(".db").click();
    	$("#list2").height(height-$("#wz").height()-$("#title").height());    	
    });
    </script>
     <div id="main_right_main_lb">
       <div style="width:270px; float:left; margin-right:10px; background:#FFFFFF;">
       <table width="100%" border="0" cellpadding="0" cellspacing="0" >
        	<tr>
        	     <td height="35" style="border-bottom:#333 1px inset;"><strong></strong></td>
                <td width="200px" height="30" align="left" style="border-bottom:#333 1px inset;"><strong>名称</strong></td>
               
            </tr>
            <?php
                $listPage = $news->control();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td  class='table_x'></td>";
            	    if($rs["SORT"]=="普通配置"){
            	        echo "<td align='left' class='table_x'><a href='pt_list.php?type=".$rs["TYPE"]."' target='list2'><span class='db'>".$rs["TYPE"]."</span></a> </td>";
            	    }elseif($rs["SORT"]=="区间配置"){
                        echo "<td align='left' class='table_x'><a href='qj_list.php?type=".$rs["TYPE"]."' target='list2'><span class='db'>".$rs["TYPE"]."</span></a> </td>";
                    }           	   
            	   
            	    echo "</tr>";
            	}
            	
            ?>
           </table>
            <?php $listPage->getPageBar3();?>
       </div>
      <div style="width:480px; float:left; background:#FFFFFF;">
       	<iframe id="list2" name="list2" scrolling="no" width="480px" height="auto" style="border:none;" ></iframe>
      </div>
    </div>
  </div>
</div>

<?include 'tail.php';?>

