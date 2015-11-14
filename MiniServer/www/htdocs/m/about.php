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
 <link href="netcss/tail.css" rel="stylesheet" type="text/css" />
 <link href="netcss/View.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">
   <div class="L">
    <div>
     <div class="list_header_container">
      <div id="list_header">

       <div class="H" id="topbar">
        <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="<?=$fydrs["ID"] ?>" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>
        加入我们</span>
       </div>
       
       
      </div>
     </div>
    
     <div class="guanyu"><img src="<?php echo $photogy==""?"netimages/hr.jpg":$photogy;?>" width="100%" id="gy_img"
	 onclick="weixinSendAppMessage('test','test','test','test')"/></div>

	  
<div style="float:center;text-align: center" width="100%">
	  <a href="tel:<?=$TEL400 ?>" >	 
	  <img  src="netimages/tel.png" width="95%" />
	  </a>
</div>

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
