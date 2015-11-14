<?
include 'include/tools.php';
$POS="list";
$prefix = "fy_pj";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "房源评价管理";

$fyid=filterParaAllByName("fyid");
$type = filterParaByName("type");
$type = $type==""?"出售":$type;

$prixg="1FYGL_2FYPJ_3XG";
$prisc="1FYGL_2FYPJ_3SC";


include 'action/FyPjAction.php';
$fypj = new FyPjAction($conn,$CID);
$listPage = $fypj->control();
include 'head.php';
?>

<div id="main">
  <?include 'menu.php';?>
  <div id="main_right">
  <div id="wz"><!-- <a href="<?php echo $page?>"><?php echo $title?></a>  --></div>
    <div id="title">
   	 <?php  echo_title_box1($title,$prefix,"&fyid=".$fyid,1,($fyid==""?0:ifHasPriL2("1FYGL_2FYPJ_3TJ"))); ?>
      <div id="title_box_2">
      
      <!-- 查询表单 -->
      <form id= "search" action="<?php echo $page?>" method="post">
      <table border="0" cellpadding="0" cellspacing="0">
     	 <input type="hidden" name="fyid" value="<?php echo $fyid;?>" />
        <tr>
            <td align="right">
            	<input style="height:21px; line-height:21px;width:170px;" name="mohu" defaultVal="搜索:标题,经纪人,房源编号"  value="<?php echo $_REQUEST["mohu"]?>"type="text" />
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
    		<?php if($fyid!=""){?>
    		<tr>
    			<th colspan="7"><strong><?php $fyrs = $fypj->getFyDetail($fyid); echo "[".$fyrs["CONTRACT_CODE"]."]".$fyrs["TITLE"];?></strong></th>
    		 </tr>
    		<?php }?>
    		
                              
           
        	<tr>
            	<td width="40" height="30"  style="border-bottom:#333 1px inset;"></td>
            	<td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>房源编号</strong></td>
            	<td width="200"  align="left" style="border-bottom:#333 1px inset;"><strong>标题</strong></td>
                <td width="70"   align="left" style="border-bottom:#333 1px inset;"><strong>评论人</strong></td>
                <td width="260"  align="left" style="border-bottom:#333 1px inset;"><strong>评论内容</strong></td>
                <td width="90"  align="left" style="border-bottom:#333 1px inset;"><strong>评论时间</strong></td>
                <td width="150"  align=left style="border-bottom:#333 1px inset;"><strong>操作</strong></td>                
            </tr>
            <?php
                
//                 echo $fypj->getSql();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x' title='".$rs['FYTITLE']."'>".$rs["CONTRACT_CODE"]."</td>";
            	    echo "<td   align='left' class='table_x' title='".$rs['TITLE']."'>".$rs["TITLE"]."</td>";
            	    echo "<td   align='left' class='table_x' title='".$rs['CONTRACT_CODE']."'>".$rs["FK_USERNAME"]."</td>";
            	    echo "<td   align='left' class='table_x'>".cut_str(strip_tags($rs['CONTENT']), 30)."</td>";
            	    echo "<td   align='left' class='table_x'>".substr($rs['INPUT_DATE'],0,10)."</td>";
            	    
            	    echo "<td   align='left' class='table_x'>";
            	   if(checkPriL2($prixg, $rs["FK_USERID"])){
            	    	echo "<a href='".$detail."?action=add&type=".$type."&fyid=".$fyid."&id=".$rs["ID"]."'><span class='db'>改</span></a>&nbsp;";
            	   }
            	   if(checkPriL2($prisc, $rs["FK_USERID"])){
            	    	echo "<a href='".$detail."?action=del&type=".$rs["TYPE"]."&fyid=".$fyid."&id=".$rs["ID"]."' onclick = 'return confirm(\"删除后将无法恢复,确定要删除吗?\")' title='删除'>删</a>&nbsp;";
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

