<?
include '../include/tools.php';
$POS="list";
$prefix = "model";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "模块管理";


$model = new ModelAction($conn, $CID);

include '../head.php';
?>


<div id="main">
  <?include '../menu.php';?>
  <div id="main_right">
  <div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix); ?>
      <div id="title_box_2">
      <!-- 查询表单 -->
      <form id= "search" action="<?php echo $page?>" method="get">
      <table border="0" cellpadding="0" cellspacing="0">
      	<tr>
            <td width="90">
                
                  <select name="parent" style="height:27px; padding:3px 3px;width:100px;">
                  				<option value=""  >选择菜单</option>
                  				<option value="-1" <?php echo -1==filterParaNumberByName("parent")?"selected":""; ?> >一级菜单</option>
                        	     <?php 
                        	     	$arr = $model->getParents(true);
                        	     	foreach ($arr as $val){
										$a = split(";",$val );
										$value = $a[0];
										$name = $a[1];
                        	     ?>
                        	    	<option value="<?php echo $value;?>"  <?php echo $value==filterParaNumberByName("parent")?"selected":""; ?>><?php echo $name;?></option>
                        	     <?php }?>
                 </select>
                  
                
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
    <div id="main_right_main_lb">
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="58" height="30" style="border-bottom:#333 1px inset;"></td>
                <td width="130"  align="left" style="border-bottom:#333 1px inset;"><strong>模块名称</strong></td>
                <td width="280"  align="left" style="border-bottom:#333 1px inset;"><strong>链接</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>一级菜单</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>显示顺序</strong></td>                
                <td width="130"  align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>                
            </tr>
            <?php
                $listPage = $model->lists();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x' >".$rs['NAME']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['LINK']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['PARENT']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['TABORDER']."</td>";
            	    echo "<td   align='left' class='table_x'><A  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>修改</span></a>&nbsp;&nbsp;<a href='".$detail."?action=del&id=".$rs["ID"]."' onclick = 'return confirm(\"删除后将无法恢复,确定要删除吗?\")' title='删除'>删除</A></td>";
            	    echo "</tr>";
            	}
            	
            ?>
        </table>
     <?php $listPage->getPageBar2(); ?>
    </div>
  </div>
</div>

<?include '../tail.php';?>

