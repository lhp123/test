<?include_once 'INCLUDE.php'; ?>
<?
$MENU="gy";
$MPOS="about";
include_once 'head.php'; 
$sql="SELECT JIANJIE FROM XT_COM WHERE ID='".$CID."'";
$stmt=mysql_query($sql,$conn);
$rs=mysql_fetch_array($stmt);
?>

 <link href="netcss/weituo.css" rel="stylesheet" type="text/css" />
 <link href="css/List.css" rel="stylesheet" type="text/css" />
 <link href="netcss/tail.css" rel="stylesheet" type="text/css" />
  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">
   <div class="L"><div class="H">
        <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$fydrs["ID"] ?>" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>
        关于我们</span>
       </div>
<?include_once 'menu.php';?>
       
    <div class="ipad_right">
     <div class="list_header_container">
      <div id="list_header">

       
       
       
      </div>
     </div>
     
     <div class="guanyu"><img src="netimages/gy.jpg" width="" /></div>
     <div class="guanyu2">
     <?=get_utf8($rs[0]) ?>
     </div>
     </div>
    </div>
   </div>
  </div>
  
  
<!-- 
<div id="" class="userpeo" >TEST</div>
 -->

<?include_once 'tail2.php'; ?>
