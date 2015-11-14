<?
include 'include/tools.php';
$POS="list";
$prefix = "adv";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "网站广告管理";

include 'action/AdvAction.php';
$adv = new AdvAction($conn,$CID);

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
            	<input style="height:21px; line-height:21px;" name="mohu" value="<?php echo $_REQUEST["mohu"]?>"type="text" />
            </td>
            <td align="left">
           	  <input value="" type="button"  class="search"/>
            </td>
        </tr>
      </table>
      </form>	
      </div>
    </div>
    <div id="main_right_main_lb">
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>

            	<td width="40" height="30" style="border-bottom:#333 1px inset;"></td>
                <td width="150" align="left" style="border-bottom:#333 1px inset;"><strong>名称</strong></td>
                <td width="150" align="left" style="border-bottom:#333 1px inset;"><strong>SRC</strong></td>
                <td width="150" align="left" style="border-bottom:#333 1px inset;"><strong>URL</strong></td>

                <td width="30"  align="left" style="border-bottom:#333 1px inset;"><strong>宽</strong></td>
                <td width="30"  align="left" style="border-bottom:#333 1px inset;"><strong>高</strong></td>
                <td width="80"  align="left" style="border-bottom:#333 1px inset;"><strong>类型</strong></td>
                <td width="80" align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
               
            </tr>
           <?php
               $listPage = $adv->control();
               //echo $adv->getSql();
               $stmt = $listPage->query();
                   while ( $rs = mysql_fetch_array ( $stmt ) ) {
                       echo "<tr>";
                       echo "<td width='40' height='30' align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
                       echo "<td  align='left' class='table_x' title='".$rs['MEMO']."'>".$rs['SYWZ']."</td>";
                       echo "<td  align='left' class='table_x'>".$rs['SRC']."</td>";
                       echo "<td  align='left' class='table_x'><a href='".$rs['URL']."' title='".$rs['URL']."' target='_blank'>".$rs['URL']."</td>";
                       echo "<td  align='left' class='table_x'>".$rs['WIDTH']."</td>";
                       echo "<td  align='left' class='table_x'>".$rs['HEIGHT']."</td>";
                       echo "<td  align='left' class='table_x'>".$rs['TYPE']."</td>";
                       echo "<td width='80'  align='left' class='table_x'>";
                       if(ifHasPriL2("1WZGL_2WZGG_3XG")){
							echo "<A  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>修改</span></a>";
                       }
                       echo "</td>";
                   
                       echo "</tr>";
                   }
            ?>
        </table>
     <?php $listPage->getPageBar2();?>
    </div>
  </div>
</div>

<?include 'tail.php';?>

