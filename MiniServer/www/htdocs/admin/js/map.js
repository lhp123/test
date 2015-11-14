 $(document).ready(function(){


	//百度地图API功能
	//地图上添加标注
		
	function addMarker(bdMap,point, index){   
		var myIcon = new BMap.Icon("http://api.map.baidu.com/img/markers.png", new BMap.Size(23, 25), {
			anchor: new BMap.Size(10, 25),
			imageOffset: new BMap.Size(0, 0 - index * 25) 
		});
		var marker = new BMap.Marker(point, {icon: myIcon});  
		bdMap.addOverlay(marker);   
	}	
		
			
	$("#myform input[stype='map']").click(function() {
		var dialog = K.dialog({
			width : 600,
			height: 500,
			title : '选择地图坐标&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp点击后获得当前地图坐标',
			body : '<div><div style="height:30px;width:580px;margin-top:5px;"><input type="text" id="mapcity" style="width:200px;margin-right:30px;margin-left:30px;"/><input type="button" id="mapsearch" value="搜索城市"/></div><div id=mapDiv style="margin:10px;width:580px;height:430px;"></div></div>',
			closeBtn : {
				name : '关闭',
				click : function(e) {
					dialog.remove();
				}
			},
			noBtn : {
				name : '取消',
				click : function(e) {
					dialog.remove();
				}
			}
		});
		
		$("#mapsearch").click(function (){
			map.centerAndZoom($("#mapcity").val(),13);
		});
		
		var x = $("#MAP_X").val();
		var y = $("#MAP_Y").val();
		var map = new BMap.Map("mapDiv");
		if(x>0&&y>0){
			var bdPoint = new BMap.Point(x,y);
			map.centerAndZoom(bdPoint,16); 
			addMarker(map,bdPoint,0);
		}else{
			map.centerAndZoom("天津",13);                   // 初始化地图,设置城市和地图级别。
		}
		map.enableScrollWheelZoom(); //启用滚轮放大缩小
		map.addEventListener("click", function(e){
			$("#MAP_X").val(e.point.lng);
			$("#MAP_Y").val(e.point.lat);
			dialog.remove();
		});
	});


});