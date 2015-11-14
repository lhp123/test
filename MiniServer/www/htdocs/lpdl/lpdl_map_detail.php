<?php 
include_once '../include.php';
include_once '../action/LpAction.php';
$lpid = filterParaNumberByName("lpid");
$lpAction = new LpAction($conn, $CID);
$rs = $lpAction->getLpDetail($lpid);
?>
<div id="map" >
		<script type="text/javascript" src="/js/jquery-1.9.0.min.js"></script>
    	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=1WTlnFzDw4NyLb9UvTI3VDlv"></script>
		<script type="text/javascript" 	src="/js/ditu.js"></script>			
		<script type="text/javascript">
			    $(function (){
			    	$("#map").css({
						width:$(window).width(),
						height:$(window).height()
			         });
			         
			        opts = {
							x:<?php echo $rs["MAP_X"];?>,
							y:<?php echo $rs["MAP_Y"];?>,
							zoom:17,
							errorMessage:'未找到对应坐标信息', 
							overlay :"custom",//marker,custom
							text:'<?php echo $rs["LPNAME"];?>', 
							mouseoverTxt:'<?php echo $rs["LPNAME"];?>' 
					}
					
					$("#map").getMap(opts);
			})
		</script>
</div>