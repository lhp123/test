var gjsearch = [];

var map = null;

var geocoder = null;

var xMin, xMax, yMin, yMax;

var mapdate = [];

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

				setMap();

			});	

	if (geocoder) {

		geocoder.getPoint(cityname, function(point) {

					if (!point) {

						map.centerAndZoom(cityname, 15);
						//var bdPoint = new BMap.Point(118.360623,34.621936);
						//map.centerAndZoom(bdPoint, 15);
					} else {

						map.centerAndZoom(point, 15);
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

		point=new BMap.Point(mapdate[m].MAP_X, mapdate[m].MAP_Y);

		orgLat=point.lat;

		orgLng=point.lng;	

		var txt = "<div id=MAPMAIN"

				+ m

				+ " style='position:absolute;z-index:0;'><div onMouseOver=over(this,"

				+ m + ") onMouseOut=out(this," + m + ")  onclick=fy('"+mapdate[m].TYPE+"','"+mapdate[m].NAME+"') class=marker><b>" + mapdate[m].NUM

				+ "套</b></div><div style='z-index:0;display:;' id=MAPD" + m

				+ " class=map2_commname_hover>" + mapdate[m].NAME

				+ "</div></div>";	



		myCompOverlay = new ComplexCustomOverlay(point, txt);		

		if (orgLng < xMin || orgLng > xMax || orgLat < yMin || orgLat > yMax) {

			continue;

		}else{

			map.addOverlay(myCompOverlay);

		}

	}

}

function over(obj, i) {

	obj.className = "marker marker_hover";

	document.getElementById("MAPD" + i).style.display = "";

	document.getElementById("MAPMAIN" + i).style.zIndex = 10000;

}

function out(obj, i) {

	document.getElementById("MAPMAIN" + i).style.zIndex = 0;

	document.getElementById("MAPD" + i).style.display = "none";

	obj.className = "marker";

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

	function fy(type,name) {

		
		
		if(type=="出售"){
			
			window.location.href="fylist.php?y=mm&re3="+name;

		}else{
			
			window.location.href="fylist.php?y=zl&re3="+name;

		}

	}




	function fy(type,name) {

		
		
		if(type=="出售"){
			
			window.location.href="fylist.php?y=mm&re3="+name;

		}else{
			
			window.location.href="fylist.php?y=zl&re3="+name;

		}

	}



