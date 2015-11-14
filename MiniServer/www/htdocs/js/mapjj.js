	

var  mapjj ={};



mapjj.jiejingmaponload = function () {

			//创建街景

			var pano = new soso.maps.Panorama(document.getElementById('JIEJINGDIV'));

			var pano_service = new soso.maps.PanoramaService();

			pano_service.getPano(panoLatLng, 200, function(result){

				try{

					 pano.setPano(result.svid);

					 var x1 = result.latlng.lng;

					 var y1 = result.latlng.lat;

					 var x2 = mapjj.y;

					 var y2 = mapjj.x;

					

					 var alpha = Math.acos((y2 - y1) / Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2)));

						if (x2 - x1 < 0) {

							alpha = Math.PI * 2 - alpha;

						}

					

						pano.setPov({heading : alpha/Math.PI*180, pitch : 0});

				}catch (e) {

					alert("系统未获取到该小区街景");

				}

			});

};





mapjj.curCity="从化市";

mapjj.init = function () {



	    var map,

		  infoWin,

		  MID,

		  label,

		  markerArray=[],

		  latlngBounds = new soso.maps.LatLngBounds(),	

		  searchService=new soso.maps.SearchService({

		  	complete : function(results){

	

		  		mapjj.each(markerArray,function(n,ele){

					ele.setMap(null);

				});

				markerArray.length=0;

				mapjj.each(results.detail.pois,function(n,ele){

				panoLatLng = new soso.maps.LatLng(ele.latLng.getLat(), ele.latLng.getLng());

				mapjj.jiejingmaponload();

				});

			}	

		  }),

		  CityService = new soso.maps.CityService({

		  	complete : function(results){

			  

			  searchService.setLocation(mapjj.curCity);

				

			  searchService.search(document.getElementById("XQNAME").value);//

				}

		  });

	

	CityService.searchLocalCity();

	

	

};

mapjj.each = function (obj,fn){

				try{

					for(var n=0;n<obj.length;n++){

						if(n==0){

							fn.call(obj[n],n,obj[n]);

						}

					}

				}catch (err) {

					alert("系统未获取到该小区街景");

				}

};



mapjj.init();





