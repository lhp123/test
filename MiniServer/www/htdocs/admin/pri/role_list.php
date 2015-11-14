<?
include '../include/tools.php';
$POS="list";
$prefix = "role";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "角色管理";


$role = new RoleAction($conn,$CID);

include '../head.php';
?>


<div id="main">
  <?  include '../menu.php'; ?>
  <div id="main_right">
  <div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"",1,ifHasPriL2("1QXGL_2JSGL_3TJ"),"pri/"); ?>
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
    <div id="main_right_main_lb">
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="58" height="30" style="border-bottom:#333 1px inset;"></td>
                <td width="150"  align="left" style="border-bottom:#333 1px inset;"><strong>角色名称</strong></td>
                <td width="150"  align="left" style="border-bottom:#333 1px inset;"><strong>角色类型</strong></td>
                <td width="150"  align="left" style="border-bottom:#333 1px inset;"><strong>备注</strong></td>
                <td width="150"  align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>             
            </tr>
            <?php
                $listPage = $role->lists();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x' >".$rs['NAME']."</td>";
            	    echo "<td   align='left' class='table_x' >".$rs['TYPE']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['MEMO']."</td>";
            	    echo "<td   align='left' class='table_x'>";
            	    if(ifHasPriL2("1QXGL_2JSGL_3XG")){
	            	    echo "<a href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>修改</span></a>&nbsp;&nbsp;";            	    
	            	    echo "<a href='".$detail."?action=del&id=".$rs["ID"]."' onclick = 'return confirm(\"删除后将无法恢复,确定要删除吗?\")' title='删除'>删除</a>&nbsp;&nbsp;";
            	    }
            	    if(ifHasPriL2("1QXGL_2JSGL_3SC")){
            	    	echo "<a href='pri_list.php?action=search&rolename=".$rs["NAME"]."'><span class='db'>权限</span></a>&nbsp;&nbsp;";
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

<?include '../tail.php';?>

