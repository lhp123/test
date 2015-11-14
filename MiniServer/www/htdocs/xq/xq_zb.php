<?php 
$pos="小区";
$posd="详细";

?>
<?php include_once '../head.php';?>
<?php 
include_once '../action/XqAction.php';
$id = filterParaAllByName("xqid");
$xqAction=new XqAction($conn,$CID);
$rs=$xqAction->XqDetail($id);
?>

<div id="center">
<?php 
$menu = "小区周边实景";
$xq_re1=$rs["PPNAME"];
$xq_re2=$rs["PNAME"];
$xq_disname=$rs["NAME"];
$xq_id=$rs["ID"];
$xq_address=$rs["ADDRESS"];
include_once 'xq_menu.php';
?>


<div class="xq_around">
		<ul>
			<li class="select"
				style="border: 0; border-right: 1px solid rgba(8, 8, 9, 0.21);">小区地图</li>
			<li>小区街景</li>
		</ul>


		<div class="xq_map_content " >
			<iframe src="xq_map_detail.php?xqid=<?php echo $rs["ID"]?>&overlay=marker" name="map" id="map"  width="1000px" height="450px" frameborder=0 scrolling=no marginheight=0 marginwidth=0></iframe>
		</div>

		<div class="xq_jiejing_content display " >
			<iframe src="/mapjj.php?name=<?php echo $xq_re2.$xq_disname;?>" id="mapjj"  style="width:1000px;height:450px;" frameborder=0 scrolling=no marginheight=0 marginwidth=0></iframe>
		</div>
	</div>


<?php include_once '../tail.php';?>