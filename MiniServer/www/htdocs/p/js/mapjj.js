	var y = "";

	var x = "";	

	var panoLatLng ;

function jiejingmaponload() {

//	var panoLatLng = new soso.maps.LatLng(x, y);

	//创建街景

	var pano = new soso.maps.Panorama(document.getElementById('JIEJINGDIV'));

	var pano_service = new soso.maps.PanoramaService();

	pano_service.getPano(panoLatLng, 200, function(result){

		try{

	 pano.setPano(result.svid);

	 var x1 = result.latlng.lng;

	 var y1 = result.latlng.lat;

	 var x2 = y;

	 var y2 = x;

	

	 var alpha = Math.acos((y2 - y1) / Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2)));

		if (x2 - x1 < 0) {

			alpha = Math.PI * 2 - alpha;

		}

	

		pano.setPov({heading : alpha/Math.PI*180, pitch : 0});

		}catch (e) {

			alert("系统未获取到该小区街景");

		}

	});

}





curCity="从化市";

function init() {

	var map,

		  infoWin,

		  MID,

		  label,

		  markerArray=[],

		  latlngBounds = new soso.maps.LatLngBounds(),	

		  searchService=new soso.maps.SearchService({

		  	complete : function(results){

	

			  each(markerArray,function(n,ele){

					ele.setMap(null);

				});

				markerArray.length=0;

				each(results.detail.pois,function(n,ele){

					latlngBounds.extend(ele.latLng);

					var left=n*27;

//					var marker=new soso.maps.Marker({

//						map: map,

//						position:ele.latLng,

//						zIndex:10

//					});

//					marker.index=n;

//					marker.isClicked=false;

//					markerArray.push(marker);

					

					panoLatLng = new soso.maps.LatLng(ele.latLng.getLat(), ele.latLng.getLng());

					jiejingmaponload();

					//alert(ele.latLng.getLat().toFixed(6)+"，"+ele.latLng.getLng().toFixed(6));

				});

				}	

		  }),

		  CityService = new soso.maps.CityService({

		  	complete : function(results){

			  

			  searchService.setLocation(curCity);

//				map=new soso.maps.Map(container,{

//					center:latlng,

//					zoom:10

//				});

				

			  searchService.search(document.getElementById("XQNAME").value);//

			  		//panoLatLng=results.detail.latLng;

			  		//jiejingmaponload();

				}

		  });

	

	CityService.searchLocalCity();

	

	

}

function each(obj,fn){

	try{

		for(var n=0;n<obj.length;n++){

			if(n==0){

				fn.call(obj[n],n,obj[n]);

			}

		}

	}catch (err) {

		alert("系统未获取到该小区街景");

	}

}

init();



