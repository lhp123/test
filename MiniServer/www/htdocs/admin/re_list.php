<?
include 'include/tools.php';
$POS="list";
$prefix = "re";
$page=$prefix."_list.php";
$title = "片区管理";

include 'action/ReAction.php';
$news = new ReAction($conn,$CID);

include 'head.php';
?>


<div id="main">
  <?include 'menu.php';?>
  <div id="main_right">
  <div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"",1,ifHasPriL2("1PZGL_2PQGL_3TJ")); ?>
      <div id="title_box_2">
          <!-- 查询表单 -->
          <form id= "search" action="<?php echo $page?>" method="get">
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
                <td width="200px" height="30" align="left" style="border-bottom:#333 1px inset;"><strong>行政区名称</strong></td>
               
            </tr>
            <?php
                $listPage = $news->control();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td  class='table_x'></td>";
                    echo "<td align='left' class='table_x'><a href='re2_list.php?pid=".$rs["ID"]."' target='list2'><span class='db'>".$rs["NAME"]."</span></a> </td>";
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

