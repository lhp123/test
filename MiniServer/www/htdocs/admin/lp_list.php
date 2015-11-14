<?
include 'include/tools.php';
$POS="list";
$prefix = "lp";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "楼盘代理管理";

include 'action/LpAction.php';
$lp = new LpAction($conn,$CID);

include_once 'head.php';
?>


<div id="main">
  <?include 'menu.php';?>
  <div id="main_right">
  <div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"",1,ifHasPriL2("1FYGL_2LPDL_3TJ")); ?>
      <div id="title_box_2">
      
      <!-- 查询表单 -->
      <form id= "search" action="<?php echo $page?>" method="get">
      <table border="0" cellpadding="0" cellspacing="0">
      	<tr>
        <tr>
        	<td width="90">
                <select style="height:27px; padding:3px 3px;width:100px;" name="re1"">
                  <option value="">行政区</option>
                  <?php 
                  	$sql="SELECT ID,NAME FROM PZ_RE1 WHERE CID='".$CID."'";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["NAME"]."'".($_REQUEST["re1"]==$rs[NAME]?"selected":"").">".$rs['NAME']."</option>";
					}
                  ?>
                </select>        
                
            </td>
            
            <td width="120">
                <select style="height:27px; padding:3px 3px;width:120px;" name="area" stype="qujian">
                  <option value="">主推户型面积</option>
                  <?php 
                  	$sql="select * from PZ_BOUND where TYPE = '面积区间' AND CID='".$CID."' order by TABORDER";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["MEMO"]."'".($_REQUEST["area"]==$rs[MEMO]?"selected":"")." down='".$rs["DOWN"]."' up='".$rs["UP"]."' >".$rs['MEMO']."</option>";
					}
                  ?>
                </select>
                <input type="hidden" id="up" name="area_up" value="<?php echo $_REQUEST["area_up"]?>"/>
                <input type="hidden" id="down" name="area_down" value="<?php echo $_REQUEST["area_down"]?>"/>
            </td>
           
            <td width="90">
                <select style="height:27px; padding:3px 3px;width:100px;"  name="price" stype="qujian">
                  <option value="">均价</option>
                  <?php 
                  	$sql="select * from PZ_BOUND where TYPE = '楼盘价格区间' AND CID='".$CID."' order by TABORDER";
                  	$stmt = mysql_query ( $sql, $conn );
					while ( $rs = mysql_fetch_array ( $stmt ) ) {
						echo "<option value='".$rs ["MEMO"]."'".($_REQUEST["price"]==$rs[MEMO]?"selected":"")." down='".$rs["DOWN"]."' up='".$rs["UP"]."' >".$rs['MEMO']."</option>";
					}
                  ?>
                </select>
                <input type="hidden" id="up" name="price_up" value="<?php echo $_REQUEST["price_up"]?>"/>
                <input type="hidden" id="down" name="price_down" value="<?php echo $_REQUEST["price_down"]?>"/>
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
            	<td width="58px" height="30"  style="border-bottom:#333 1px inset;"></td>
            	<td width="100px"  align="left" style="border-bottom:#333 1px inset;"><strong>楼盘名称</strong></td>
            	<td width="140px"  align="left" style="border-bottom:#333 1px inset;"><strong>标题</strong></td>
                <td width="140px"  align="left" style="border-bottom:#333 1px inset;"><strong>楼盘地址</strong></td>
                <td width="90px"   align="left" style="border-bottom:#333 1px inset;"><strong>主推户型</strong></td>
                <td width="90px"   align="left" style="border-bottom:#333 1px inset;"><strong>均价</strong></td>
                <td width="100px"  align="left" style="border-bottom:#333 1px inset;"><strong>开发商</strong></td>
                <td width="120px"  align=left style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
            </tr>
            <?php
                $listPage = $lp->control(10);
                //echo $fy->getSql();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x' title='".$rs['LPNAME']."'>".cut_str($rs["LPNAME"],8)."</td>";
            	    echo "<td   align='left' class='table_x' title='".$rs['LPNAME']."'>".($rs["TITLE"])."</td>";
            	    echo "<td   align='left' class='table_x' title='".$rs['LPDZ']."'>".cut_str($rs["LPDZ"],9)."</td>";
            	    echo "<td   align='left' class='table_x' >".$rs["ZXZK"].($rs["H_SHI"]!=""?$rs["H_SHI"]."室":"").($rs["BUILD_AREA"]!=""?$rs["BUILD_AREA"]."平":"")."</td>";
            	    echo "<td   align='left' class='table_x' >".$rs["JUNJIA"]."万/㎡</td>";
            	    echo "<td   align='left' class='table_x'>".$rs["KFS"]."</td>";
            	    echo "<td   align='left' class='table_x'>";
            	    if(checkPriL2("1FYGL_2LPDL_3XG", $rs["USERID"])){
            	    	echo "<A  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>修改</span></a>&nbsp;&nbsp;";
            	    }
            	    if(checkPriL2("1FYGL_2LPDL_3SC", $rs["USERID"])){
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

