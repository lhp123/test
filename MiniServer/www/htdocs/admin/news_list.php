<?
include 'include/tools.php';
$POS="list";
$prefix = "news";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "新闻管理";

include 'action/NewsAction.php';
$news = new NewsAction($conn,$CID);

include 'head.php';
?>

<div id="main">
  <?include 'menu.php';?>
  <div id="main_right">
  <div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"",1,ifHasPriL2("1WZGL_2XWGL_3TJ")); ?>
      <div id="title_box_2">
      <!-- 查询表单 -->
      <form id= "search" action="<?php echo $page?>" method="get">
      <table border="0" cellpadding="0" cellspacing="0">
      	<tr>
        	<td width="90">
                <select style="height:27px; padding:3px 3px;width:100px;" name="TYPE" >
                  <option value="">新闻类型</option>
                  <?php 
                  	$sql="SELECT DISTINCT TYPE FROM PZ_PROFILE_SUB where PTYPE='新闻类型' and  CID='".$CID."'";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["TYPE"]."'".($_REQUEST["TYPE"]==$rs['TYPE']?"selected":"").">".$rs['TYPE']."</option>";
					}
                  ?>
                </select>  
             </td>
             <td width="90">   
                <select style="height:27px; padding:3px 3px;width:100px;" name="SUBTYPE">
                  <option value="">新闻子类型</option>
                  <?php 
                  	$sql="SELECT DISTINCT NAME FROM PZ_PROFILE_SUB where PTYPE='新闻类型' and  CID='".$CID."'";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["NAME"]."'".($_REQUEST["SUBTYPE"]==$rs['NAME']?"selected":"").">".$rs['NAME']."</option>";
					}
                  ?>
                </select>   
            </td>
            
            <td align="right">
            	<input style="height:21px; line-height:21px;" name="mohu"  value="<?php echo $_REQUEST["mohu"]?>" type="text" />
            </td>
            <td align="left">
           	  <input value="" type="button"  class = "search"  />
            </td>
        </tr>
      </table>
      </form>	
      </div>
    </div>
    <div id="main_right_main_lb">
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="58" height="30" style="border-bottom:#333 1px inset;"></td>
                <td width="280"  align="left" style="border-bottom:#333 1px inset;"><strong>标题</strong></td>
                <td width="130"  align="left" style="border-bottom:#333 1px inset;"><strong>类型</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>来源</strong></td>
                <td width="120"  align="left" style="border-bottom:#333 1px inset;"><strong>录入时间</strong></td>
                <td width="130"  align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
            </tr>
            <?php
                $listPage = $news->control();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x' title='".$rs['TITLE']."'>".cut_str($rs['TITLE'],20)."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['TYPE']."->".$rs['SUBTYPE']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['AUTHOR']."&nbsp;".($rs['SOURCE']!=""?"[".$rs['SOURCE']."]":"")."</td>";
            	    echo "<td   align='left' class='table_x'>".substr($rs['INPUT_DATE'],0,16)."</td>";            	    
            	    echo "<td   align='left' class='table_x'>";
            	    if(ifHasPriL2("1WZGL_2XWGL_3XG")){
            	    	echo "<A  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>修改</span></a>&nbsp;&nbsp;";
            	    }
            	    if(ifHasPriL2("1WZGL_2XWGL_3SC")){
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

