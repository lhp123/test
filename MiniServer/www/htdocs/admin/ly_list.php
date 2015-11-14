<?
include 'include/tools.php';
$POS="list";
$prefix = "ly";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";

$title = "留言管理";



include 'action/LyAction.php';
$wt = new LyAction($conn,$CID);


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
            	<td width="150"  align="left" style="border-bottom:#333 1px inset;"><strong>标题</strong></td>
                <td width="130"  align="left" style="border-bottom:#333 1px inset;"><strong>联系方式</strong></td>
                <td width="200"   align="left" style="border-bottom:#333 1px inset;"><strong>留言内容</strong></td>
                <td width="50"  align="left" style="border-bottom:#333 1px inset;"><strong>类型</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>日期</strong></td>
                <td width="120"  align=left style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
            </tr>
            <?php
                $listPage = $wt->control();
               // echo $wt->getSql();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x' >".$rs[TITLE]."</td>";
            	    echo "<td   align='left' class='table_x' >".$rs[TEL]."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs["CONTENT"]."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs["TYPE"]."</td>";
            	    echo "<td   align='left' class='table_x' >".substr($rs["TSDATE"],0,10)."</td>";
            	    echo "<td   align='left' class='table_x'>";
            	    if(ifHasPriL2("1WZGL_2LYGL_3CK")){
            	    	echo "<A  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>查看</span></a>&nbsp;&nbsp;";
            	    }
            	    if(ifHasPriL2("1WZGL_2LYGL_3SC")){
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

