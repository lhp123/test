<?
include 'include/tools.php';
$POS="list";
$prefix = "user";
$page=$prefix."_list.php";
$detail = $prefix."_detail.php";
$title = "用户管理";

include 'action/UserAction.php';
$user = new UserAction($conn,$CID);


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
      	<!-- 
      	    <td width="120">
                <select style="height:27px; padding:3px 3px;width:130px;" name="TYPE">
                  <option value="">请选择用户类型</option>
                  <option value="个人" <?php echo $_REQUEST["TYPE"]=="个人"?"selected":""?>>个人</option>
                  <option value="公司" <?php echo $_REQUEST["TYPE"]=="公司"?"selected":""?>>公司</option>
                </select>        
                
            </td>
        -->
            <td align="right">
            	<input style="height:21px; line-height:21px;"  value="<?php echo $_REQUEST["mohu"]?>"type="text" name="mohu"/>
            </td>
            <td align="left">
           	  <input value="" type="button" class="search"  />
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
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>用户名</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>电话</strong></td>
                 <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>邮箱</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>用户类型</strong></td>
                <td width="100"  align="left" style="border-bottom:#333 1px inset;"><strong>操作</strong></td>
            </tr>
           <?php
            	$listPage = $user->control();
            	$stmt = $listPage->query();
            	while ( $rs = mysql_fetch_array ( $stmt ) ) {
            	    echo "<tr>";
            	
            	    echo "<td   align='center' class='table_x'><input name='' type='checkbox' value='' /></td>";
            	    echo "<td   align='left' class='table_x'>".$rs['USERNAME']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['TEL']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['EMAIL']."</td>";
            	    echo "<td   align='left' class='table_x'>".$rs['TYPE']."</td>";
            	    echo "<td   align='left' class='table_x'>";
            	    if(ifHasPriL2("1RSGL_2ZCYH_3CK")){
            	    	echo "<A  href='".$detail."?action=add&id=".$rs["ID"]."'><span class='db'>查看</span></a>&nbsp;&nbsp;";
            	    }
            	    if(ifHasPriL2("1RSGL_2ZCYH_3SC")){
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

