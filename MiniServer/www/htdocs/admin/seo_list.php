<?
include 'include/tools.php';
$POS="list";
$prefix = "seo";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "网站优化";

include 'action/SeoAction.php';
$seo = new SeoAction($conn,$CID);

include 'head.php';

?>


<div id="main">
  <?include 'menu.php';?>
  <div id="main_right">
  	<div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"",1,ifHasPriL2("1WZGL_2WZYH_3TJ")); ?>
      <div id="title_box_2">
      <!-- 查询表单 -->
      <form id= "search" action="<?php echo $page?>" method="get">
      <table border="0" cellpadding="0" cellspacing="0">
      	<tr>
        	<td width="90">
                <select style="height:27px; padding:3px 3px;width:100px;" name="TYPE">
                  <option value="">模块类型</option>
                  <?php                   
                  	$sql="SELECT DISTINCT TYPE  FROM XT_KEYWORDS WHERE CID='".$CID."' ";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["TYPE"]."'".($_REQUEST["TYPE"]==$rs[TYPE]?"selected":"").">".$rs['TYPE']."</option>";
					}
                  ?>
                </select>        
                
            </td>
            
            <td align="right">
            	<input style="height:21px; line-height:21px;" name="mohu" value="<?php echo $_REQUEST["mohu"]?>"type="text"/>
            </td>
            <td align="left">
           	  <input value="" type="button"  class="search" />
            </td>
        </tr>
      </table>
     </form>
      </div>
    </div>
    <div id="main_right_main_lb">
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="7%" height='30' style="border-bottom:#333 1px inset;"></td>
                <td width="12%" height='30' align="left" style="border-bottom:#333 1px inset;"><strong>模块类型</strong></td>
                <td width="12%" height='30' align="left" style="border-bottom:#333 1px inset;"><strong>内容类型</strong></td>
                <td width="15%" height='30' align="left" style="border-bottom:#333 1px inset;"><strong>模块名称</strong></td>
                <td width="45%" height='30' align="left" style="border-bottom:#333 1px inset;"><strong>内容</strong></td>
                <td width="10%" height='30' align="center" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>           
            </tr>
           <?php
            	$listPage = $seo->control();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td width='58'  align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td width='200'  align='left' class='table_x'>".$rs['TYPE']."</td>";
            	    echo "<td width='100'  align='left' class='table_x'>".$rs['NAME']."</td>";
            	    echo "<td width='100'  align='left' class='table_x'>".$rs['POSITION']."</td>";
            	    echo "<td width='100'  align='left' class='table_x'>".$rs['CONTENT']."</td>";
            	    if(ifHasPriL2("1WZGL_2WZYH_3XG")){
            	    	echo "<td width='120'  align='center' class='table_x'><A href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>修改</span></a></td>";
            		}
            	    echo "</tr>";
            	}
            	
            ?>
        </table>
        <?php $listPage->getPageBar2(); ?>
    </div>
  </div>
</div>

<?include 'tail.php';?>

