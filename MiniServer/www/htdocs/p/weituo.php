<?include_once 'INCLUDE.php'; ?>
<?
$MENU="wt";
$MPOS="wt";
include_once 'head.php'; 

$act=filterParaAllByName("act");
if($act=="save"){
	$t=filterParaAllByName("t");
	if($t=="cs"){
		$sql="insert into WT_FY (CID,WTDATE,TYPE,LINKNAME,LINKTEL,MEMO) values('".$CID."',sysdate(),'".get_gbk("出售")."','".get_gbk(filterParaByName("LINKNAME"))."','".get_gbk(filterParaAllByName("LINKTEL"))."','".get_gbk(filterParaByName("MEMO"))."')";
		execute($sql);
		echo "<script>location.href='?s=1';</script>";
	}
	else if($t=="cz"){
		$sql="insert into WT_FY (CID,WTDATE,TYPE,LINKNAME,LINKTEL,MEMO) values('".$CID."',sysdate(),'".get_gbk("出租")."','".get_gbk(filterParaByName("LINKNAME"))."','".get_gbk(filterParaAllByName("LINKTEL"))."','".get_gbk(filterParaByName("MEMO"))."')";
		execute($sql);
		echo "<script>location.href='?s=1';</script>";
	}
	else if($t=="qz"){
		$sql="insert into WT_XQ (CID,WTDATE,TYPE,LINKNAME,LINKTEL,MEMO) values('".$CID."',sysdate(),'".get_gbk("求租")."','".get_gbk(filterParaByName("LINKNAME"))."','".get_gbk(filterParaAllByName("LINKTEL"))."','".get_gbk(filterParaByName("MEMO"))."')";
		execute($sql);
		echo "<script>location.href='?s=1';</script>";
	}
	else if($t=="qg"){
		$sql="insert into WT_XQ (CID,WTDATE,TYPE,LINKNAME,LINKTEL,MEMO) values('".$CID."',sysdate(),'".get_gbk("求购")."','".get_gbk(filterParaByName("LINKNAME"))."','".get_gbk(filterParaAllByName("LINKTEL"))."','".get_gbk(filterParaByName("MEMO"))."')";
		execute($sql);
		echo "<script>location.href='?s=1';</script>";
	}
}
?>

 <link href="netcss/weituo.css" rel="stylesheet" type="text/css" />
 <link href="css/List.css" rel="stylesheet" type="text/css" />
 <link href="netcss/tail.css" rel="stylesheet" type="text/css" />
  <div class="container list sousuo" pagename="Anjuke_Prop_List" id="prop_list">
   <div class="L"><div class="H">
        <a class="back" id="prop_view_header" href="javascript:void(0);" onclick="history.back()" data-id="" data-city="tj"> <span></span> <i></i> <span>返回</span> </a>委托房源
       </div>
<?include_once 'menu.php';?>
   
    <div class="ipad_right">
     <div class="list_header_container">
      <div id="list_header">

       
       
       
      </div>
     </div>
     
     <div class="weituo">委托类型</div>
     <br/>
     <div class="weituo2">
     <a href="#" class="search1" id="buy3" onclick="javascript:search1(3)">出售&nbsp;</a> | 
     <a href="#" class="search2" id="buy4" onclick="javascript:search1(4)">&nbsp;出租&nbsp;</a> | 
     <a href="#" class="search2" id="buy1" onclick="javascript:search1(1)">&nbsp;求购&nbsp;</a> | 
     <a href="#" class="search2" id="buy2" onclick="javascript:search1(2)">&nbsp;求租</a>
     </div>
     <br/>
     <div style="text-align:center;">
     <?
     $msg=filterParaAllByName("s");
     if($msg=="1"){
     	echo "提交成功！";
     }
     ?></div>
       <form id="qgform" name="qgform" action="weituo.php?act=save&t=qg" method="post">
  
<!-- 
<div id="" class="userpeo" >TEST</div>
 -->

<?include_once 'tail2.php'; ?>
<script>
var house;
function search1(house){
/*alert(house);*/
	for(i=1;i<5;i++){
		if(i==house){
			document.getElementById("buy"+i).className="search1";
			document.getElementById("drop"+i).style.display="block";
			
	
		}else{
			document.getElementById("buy"+i).className="search2";
			document.getElementById("drop"+i).style.display="none";
			
		}
	}
}
search1(3);
</script>