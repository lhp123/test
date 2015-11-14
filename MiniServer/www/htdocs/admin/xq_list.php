<?
include 'include/tools.php';
$POS="list";
$prefix = "xq";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "小区管理";

include 'action/XqAction.php';
$xq = new XqAction($conn,$CID);


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
        	<td width="90">
                <select style="height:27px; padding:3px 3px;width:100px;" name="TYPE">
                  <option value="">小区</option>
                  <?php 
                  	$sql="SELECT DISTINCT NAME  FROM PZ_RE1 WHERE CID='".$CID."'";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["NAME"]."'".($_REQUEST["TYPE"]==$rs[NAME]?"selected":"").">".$rs['NAME']."</option>";
					}
                  ?>
                </select>        
                
            </td>
            
            <td align="right">
            	<input style="height:21px; line-height:21px;" name="mohu" value="<?php echo $_REQUEST["mohu"]?>"type="text" />
            </td>
            <td align="left">
           	  <input value="" type="button"  class="search" />
            </td>
             <td align="right" style="width:600px;margin-right:20px;">
             <?php if(ifSysRoot()||ifSysAdmin()){?>
           	 <input value="重置排序" type="button"  class="reset" />
           	 <?php }?>
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
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>小区名称</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>所属区域</strong></td>
                <td width="240"  align="left" style="border-bottom:#333 1px inset;"><strong>小区地址</strong></td>
                <td width="80"  align="left" style="border-bottom:#333 1px inset;"><strong>所属经纪人</strong></td>
                <td width="50"  align="left" style="border-bottom:#333 1px inset;"><strong>同步</strong></td>
                <td width="130"  align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>            
            </tr>
            <?php
            	$listPage = $xq->control();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td    align='left' class='table_x'>".$rs['NAME']."</td>";
            	    echo "<td    align='left' class='table_x'>".$rs['PPNAME'].$rs["PNAME"]."</td>";
            	    echo "<td    align='left' class='table_x'>".cut_str($rs['ADDRESS'],20)."</td>";
            	    echo "<td    align='left' class='table_x'>".$rs["USER"]."</td>";
            	    echo "<td    align='left' class='table_x'>".($rs["IF_TB"]=="0"?"未同步":"已同步")."</td>";
            	    echo "<td    align='left' class='table_x'>";
            	    if(ifHasPriL2("1PZGL_2XQGL_3XG")){
            	    	echo "<A href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>修改</span></a>&nbsp;&nbsp;";
            	    }
            	    if(ifHasPriL2("1PZGL_2XQGL_3SC")){
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

