<?
include 'include/tools.php';
$POS="list";
$prefix = "zp";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "智能招聘";


include 'action/ZpAction.php';
$zp = new ZpAction($conn,$CID);


include 'head.php';
?>


<div id="main">
  <?include 'menu.php';?>
  <div id="main_right">
  	<div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"",1,ifHasPriL2("1WZGL_2ZNZP_3TJ")); ?>
      <div id="title_box_2">
      <!-- 查询表单 -->
      <form id= "search" action="<?php echo $page?>" method="get">
      <table border="0" cellpadding="0" cellspacing="0">
      	<tr>
        	<td width="90">
                <select style="height:27px; padding:3px 3px;width:100px;" name="TYPE">
                  <option value="">招聘类型</option>
                  <?php 
                  	$sql="SELECT DISTINCT TYPE  FROM XT_ZP WHERE CID='".$CID."'";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["TYPE"]."'".($_REQUEST["TYPE"]==$rs[TYPE]?"selected":"").">".$rs['TYPE']."</option>";
					}
                  ?>
                </select>        
                
            </td>
            
            <td align="right">
            	<input style="height:21px; line-height:21px;" name="mohu" value="<?php echo $_REQUEST["mohu"]?>"type="text" />
            </td>
            <td align="left">
           	  <input value="" type="button" class="search" />
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
                <td width="100" height="30" align="left" style="border-bottom:#333 1px inset;"><strong>标题</strong></td>
                <td width="100" height="30" align="left" style="border-bottom:#333 1px inset;"><strong>类型</strong></td>
                <td width="100" height="30" align="left" style="border-bottom:#333 1px inset;"><strong>发布时间</strong></td>
                <td width="100" height="30" align="left" style="border-bottom:#333 1px inset;"><strong>有效期至</strong></td>
                <td width="130" height="30" align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
            </tr>
           <?php
            	$listPage = $zp->control();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td width='58'  align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td width='200'  align='left' class='table_x'>".$rs['TITLE']."</td>";
            	    echo "<td width='100'  align='left' class='table_x'>".$rs['TYPE']."</td>";
            	    echo "<td width='100'  align='left' class='table_x'>".substr($rs['FBDATE'],0,16)."</td>";
            	    echo "<td width='100'  align='left' class='table_x'>".substr($rs['YXDATE'],0,16)."</td>";
            	    echo "<td width='120'  align='left' class='table_x'>";
            	    if(ifHasPriL2("1WZGL_2ZNZP_3XG")){
            	    	echo "<A  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>修改</span></a>&nbsp;&nbsp;";
            	    }
            	    if(ifHasPriL2("1WZGL_2ZNZP_3SC")){
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

