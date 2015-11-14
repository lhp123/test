    <?php   
    $posd="详细";
    include_once '../include.php';  
    include_once '../action/XqAction.php';
    $overlay = filterParaAllByName("overlay");
    $id = filterParaAllByName("xqid");
    $xqAction=new XqAction($conn,$CID);
    $rs=$xqAction->XqDetail($id);
    $map_x=$rs["MAP_X"];
    $map_y=$rs["MAP_Y"];
    $xqname = $rs["NAME"];
   
    ?>
    <div id="tit_main_jjr">
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=1WTlnFzDw4NyLb9UvTI3VDlv"></script>
    
    <script type="text/javascript" src="/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="/js/ditu.js"></script>
	
    <div id="map" ><div id="nomap" >未找到小区地图信息!</div></div>
  <script type="text/javascript">

    <?php if($overlay!="custom"){?>

		$(function (){

			$("#map").css({

				width:$("#map",parent.document).width(),
				
				height:$("#map",parent.document).height()

	         });

		})
	<?php }else{?>
		$(function (){
		
			$("#map").css({
		
				width:382,
				
				height:300
		
		     });
		
		})
	
<?php }?>
    </script>
<?php if($overlay=="custom"){?>
    <script type="text/javascript">
    $(function (){
        opts = {
				x:<?php echo $map_x;?>,
				y:<?php echo $map_y;?>,
				zoom:17,
				errorMessage:'未找到对应坐标信息', 
				overlay :"custom",//marker,custom
				text:'<?php echo $xqname ;?>', 
				mouseoverTxt:'<?php echo $xqname ;?>'
				
		}
		$("#map").getMap(opts);
	})
    </script>
<?php }else if($overlay=="marker"){?>
		<script type="text/javascript">
			    $(function (){
			    	var sContent =
                		"<h4 style='margin:0 0 5px 0;padding:0.2em 0'><?php echo $rs["NAME"]?></h4>" + 
                		"<img style='float:right;margin:4px' id='imgDemo' src='<?php $SJT = $rs["SJT"]; $sjts=explode(";",$SJT);echo $SJT==""?ZW_FY_L:$sjts[0];?>' width='139' height='104' title='<?php echo $rs["NAME"]?>'/>" + 
                		"<p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em'><?php echo $rs["DESCRIPTION"]?></p>" + 
                		"</div>";
			        function customCLK(overlaySpan){
			            //自定义 覆盖物事件方法
			            }
			        function markerCLK(type,marker,infoWindow){
						//marker 事件方法
						if(type=="onmouseover"){
							marker.openInfoWindow(infoWindow);
							//图片加载完毕重绘infowindow
							document.getElementById('imgDemo').onload = function (){
		                 	       infoWindow.redraw();   
			                 	    //防止在网速较慢，图片未加载时，生成的信息框高度比图片的总高度小，导致图片部分被隐藏
		                 	   }
						}else if(type=="onmouseout"){
							
							//marker.closeInfoWindow();
						}else if(type=="onclick"){
							//marker.closeInfoWindow();
						}
			        }
			        opts = {
							x:<?php echo $rs["MAP_X"];?>,
							y:<?php echo $rs["MAP_Y"];?>,
							zoom:17,
							errorMessage:'未找到对应坐标信息', 
							overlay :"marker",
							text:sContent, 
							markerOpen:true,
							click:markerCLK,
							mouseover:markerCLK,
							mouseout:markerCLK
					}
					
					$("#map").getMap(opts);
			})
			    </script>
<?php }?>
     </div>
     