var gjsearch = [];

var map = null;

var geocoder = null;

var xMin, xMax, yMin, yMax;

deptOverlay = [];

// ///////////////////////////

function maponload() {	
	map = new BMap.Map(document.getElementById("FYDIV"));
	map.enableDoubleClickZoom();
	map.enableScrollWheelZoom();
	map.enableContinuousZoom(); //启用滚轮放大缩小
	map.enablePinchToZoom();
	map.addControl(new BMap.NavigationControl()); 
////	map.disableDoubleClickZoom();

//
//	map.enableScrollWheelZoom();                  
//	
////	map.enableScrollWheelZoom(true);
//	
//	map.enablePinchToZoom();
//	map.enableContinuousZoom();  
	
	map.enableKeyboard();   

	map.addControl(new BMap.NavigationControl());  

	geocoder = new BMap.Geocoder();

	map.addEventListener("moveend", function() {

				map.clearOverlays();
				var gLatLngBounds = map.getBounds();
				xMin = parseFloat(gLatLngBounds.getSouthWest().lng);
				xMax = parseFloat(gLatLngBounds.getNorthEast().lng);
				yMin = parseFloat(gLatLngBounds.getSouthWest().lat);
				yMax = parseFloat(gLatLngBounds.getNorthEast().lat);
				
				setDeptMap();
				if(!flag){
					adddept();
				}
				setMap();
				

			});	

	if (geocoder) {

		geocoder.getPoint(cityname, function(point) {
					if (!point) {

						map.centerAndZoom(cityname, 13);
						//var bdPoint = new BMap.Point(118.360623,34.621936);
						//map.centerAndZoom(bdPoint, 15);
					} else {

						map.centerAndZoom(point, 13);
						//var bdPoint = new BMap.Point(118.360623,34.621936);
						//map.centerAndZoom(bdPoint, 15);
						// setDitie();

					}

				},cityname);

	}

}

maponload();

var point, html, marker, markerLatLng, orgLat, orgLng,myCompOverlay;

function setMap() {
	for (var m = 0; m < mapdate.length; m++) {

		point=new BMap.Point(mapdate[m].MAP_X,mapdate[m].MAP_Y);

		orgLat=point.lat;

		orgLng=point.lng;	

		var  junjia = mapdate[m].JUNJIA;

		var txt = "<div id=MAPMAIN"	+ m	+ " style='position:absolute;z-index:0;'>"
				
				+"<div onMouseOut=out("+m+ ") onMouseOver=over("+ m+ ")    class=marker></div>"
					
				+"<div class=map_show onMouseOut=out("+m+ ") onMouseOver=over("+ m+ ") >"+junjia+"</div>"
				
				+"<div   id=MAPD" + m +  " onMouseOut=out("+m+ ") onMouseOver=over("+ m+ ") onclick=fy('"+mapdate[m].ID+"')  class=map2_commname_hover>"
				+"</span><span style='float:left;' class=map_image_span><image src='"+mapdate[m].IMAGE+"' width=60px height=47px></span>"
				+"<span style='float:left; padding-left:5px;' class=map_dept_span><p>"+ mapdate[m].NAME.substr(0,6)+" </p>"
				
				+"<p>"+junjia+"/平&nbsp;"+mapdate[m].NUM+"套</p>"
				
				//+"<p>"+mapdate[m].LABLES+"</p>"

				
				
				+"</div>"
				
				+ "</div>";	


		
		myCompOverlay = new ComplexCustomOverlay(point, txt);	
		
		


		
		if (orgLng < xMin || orgLng > xMax || orgLat < yMin || orgLat > yMax) {

			continue;

		}else{
			
			map.addOverlay(myCompOverlay);

		}

	}

}



function setDeptMap(){
	deptOverlay =[];
    for (var m = 0; m < mapdeptdate.length; m++) {

        point=new BMap.Point(mapdeptdate[m].MAP_X,mapdeptdate[m].MAP_Y);

        orgLat=point.lat;

        orgLng=point.lng;

        var txt = "<div id=mapdept" + m + "    style='position:absolute;z-index:0;'> "
		
		+"<div   onMouseOut=out2(" + m + ") onMouseOver=over2(" + m + ") class=dept></div>"
		
		+"<div id=deptname"+m+"  class=map2_dept_hover   onMouseOut=out2(" + m + ") onMouseOver=over2(" + m + ") onclick=jjr('"+mapdeptdate[m].ID+"') >"	
		+"<image style='float:left; margin:12px 8px 5px 8px;' src='"+mapdeptdate[m].IMAGE+"' width=80px>"
			
		+"<span style=' color: #333; line-height:18px;' class=map_dept_lable_span><p style='padding-top:5px;'>"+mapdeptdate[m].NAME+"</p>"

		+"<p>店长:"+mapdeptdate[m].DZNAME+"</p>"
		
		+"<p>电话:"+mapdeptdate[m].TEL+"</p>"

		+"<p style='margin-left:5px;'>地址:"+mapdeptdate[m].ADDRESS+"</p></span>"

			

			+"</div>"
			
			+"</div>";

        myCompOverlay = new ComplexCustomOverlay(point, txt);
		
        if (orgLng < xMin || orgLng > xMax || orgLat < yMin || orgLat > yMax) {

            continue;

        }else{
			deptOverlay.push(myCompOverlay);
        }

    }
}


function removedept(){
	for(var i = 0;i<deptOverlay.length;i++){
		map.removeOverlay(deptOverlay[i]);
	}
}

function adddept(){
	for(var i = 0;i<deptOverlay.length;i++){
		map.addOverlay(deptOverlay[i]);
	}
}




function over(obj){
	document.getElementById("MAPMAIN"+obj).parentNode.parentNode.style.zIndex = 9999;
	document.getElementById("MAPD"+obj).style.display = "block";

}
function out(obj){
	document.getElementById("MAPMAIN"+obj).parentNode.parentNode.style.zIndex = 0;
	document.getElementById("MAPD"+obj).style.display ="none";
}


function over2(obj){
	document.getElementById("mapdept"+obj).parentNode.parentNode.style.zIndex = 9999;
	document.getElementById("deptname"+obj).style.display = "block";
	
}
function out2(obj){
	document.getElementById("mapdept"+obj).parentNode.parentNode.style.zIndex = 0;
	document.getElementById("deptname"+obj).style.display ="none";
}

function ComplexCustomOverlay(point, text){		

      this._point = point;

      this._text = text;

}

    ComplexCustomOverlay.prototype = new BMap.Overlay();

    ComplexCustomOverlay.prototype.initialize = function(map){

      this._map = map;

      var div = this._div = document.createElement("div");

      div.style.position = "absolute";

      div.style.zIndex = BMap.Overlay.getZIndex(this._point.lat);

      div.style.height = "40px";

      div.style.lineHeight = "28px";

      div.style.whiteSpace = "nowrap";

      div.style.MozUserSelect = "none"

      var span = this._span = document.createElement("span");

	  span.style.width="200px";

	  span.style.position = "absolute";

      div.appendChild(span);

	  span.innerHTML=this._text;  

      var that = this;



      map.getPanes().labelPane.appendChild(div);

      

      return div;

    }

    ComplexCustomOverlay.prototype.draw = function(){

      var map = this._map;

      var pixel = map.pointToOverlayPixel(this._point);

	  var z = BMap.Overlay.getZIndex(this._point.lat);

      this._div.style.left = pixel.x  + "px";

      this._div.style.top  = pixel.y-47  + "px";

//	  this._div.style.zIndex = z + 1;

    }

	
	
	function fy(id) {

		
		
		
			
		window.location.href="xq/xq_detail.php?xqid="+id;

		

	}


	function jjr(id){
		
		//window.location.href="jjrdp/jjr_dp.php?jjrid="+id;
	}
