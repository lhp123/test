/**

 * author  Wang YanDong

 * Date 2014-4-23

 */

;(function ($){

	$.fn.extend({

		getMap : function (opts){

			var defaults = {

						x 			: 0.0,

						y 			: 0.0,

						zoom 		: 17,

						cityName 	: '从化市', // 地图坐标不存在默认显示的城市

						errorMessage : '未找到对应坐标信息', // 地图坐标不存在默认提示信息

						overlay 	: "custom",// marker,custom

						text 		: '', // infoWindow,自定义覆盖物默认显示信息,如果重写了click,mouseover,mouseout,并对overlaySpan.innerHTML/infoWindow

									// = new

									// BMap.InfoWindow(options.text)进行操作之后将不再起作用

						mouseoverTxt : '', // 自定义 移动到覆盖物上显示的信息

											// 如果重写了click,mouseover,mouseout,并对overlaySpan.innerHTML进行操作之后将不再起作用

						markerOpen : false, // 只对overlay:'marker'时起作用



						click 		: null,

						mouseover 	: null,

						mouseout 	: null

			}

			var options = $.extend(defaults, opts);

			//var mp = new BMap.Map($(options.container));

			

			



				// 复杂的自定义覆盖物

				function ComplexCustomOverlay(point, text, mouseoverText){

						  this._point = point;

						  this._text = text;

						  this._overText = mouseoverText;

				}

				ComplexCustomOverlay.prototype = new BMap.Overlay();

				ComplexCustomOverlay.prototype.initialize = function(map){

						  this._map = map;

						  var div = this._div = document.createElement("div");

						  div.style.position = "absolute";

						  div.style.zIndex = BMap.Overlay.getZIndex(this._point.lat);

						  div.style.backgroundColor = "#EE5D5B";

						  div.style.border = "1px solid #BC3B3A";

						  div.style.color = "white";

						  div.style.height = "18px";

						  div.style.padding = "2px";

						  div.style.lineHeight = "18px";

						  div.style.whiteSpace = "nowrap";

						  div.style.MozUserSelect = "none";

						  div.style.fontSize = "12px"

						  var span = this._span = document.createElement("span");

						  div.appendChild(span);

						  span.appendChild(document.createTextNode(this._text));      

						  var that = this;



						  var arrow = this._arrow = document.createElement("div");

						  arrow.style.background = "url(http://map.baidu.com/fwmap/upload/r/map/fwmap/static/house/images/label.png) no-repeat";

						  arrow.style.position = "absolute";

						  arrow.style.width = "11px";

						  arrow.style.height = "10px";

						  arrow.style.top = "22px";

						  arrow.style.left = "10px";

						  arrow.style.overflow = "hidden";

						  div.appendChild(arrow);

						 

						  div.onmouseover = function(event){

							  	var e = event||window.event;

								var span = this.getElementsByTagName("span")[0];

								if(jQuery.isFunction(options.mouseover)){

									options.mouseover(e.type,span);

								}else {

									this.style.backgroundColor = "#6BADCA";

									this.style.borderColor = "#0000ff";

									this.getElementsByTagName("span")[0].innerHTML = that._overText;

									arrow.style.backgroundPosition = "0px -20px";

								}

						  

						  }



						  div.onmouseout = function(event){

							    var e = event||window.event;

						        var span = this.getElementsByTagName("span")[0];

								if(jQuery.isFunction(options.mouseout)){

									options.mouseout(e.type,span);

								}else {

									this.style.backgroundColor = "#EE5D5B";

									this.style.borderColor = "#BC3B3A";

									this.getElementsByTagName("span")[0].innerHTML = that._text;

									arrow.style.backgroundPosition = "0px 0px";

								}

								

						 



						  }

						  div.onclick = function (event){

							    var e = event||window.event;

							    if(jQuery.isFunction(options.click)){

							    	options.click(e.type,span);

							    }

						  };

						  mp.getPanes().labelPane.appendChild(div);

						  

						  return div;

				}

				ComplexCustomOverlay.prototype.draw = function(){

				  var map = this._map;

				  var pixel = map.pointToOverlayPixel(this._point);

				  this._div.style.left = pixel.x - parseInt(this._arrow.style.left) + "px";

				  this._div.style.top  = pixel.y - 30 + "px";

				}



			



			var mp = new BMap.Map($(this).get(0));

			

			mp.enableScrollWheelZoom();



		    if(options.x>0&&options.y>0){

				var p  = new BMap.Point(options.x,options.y);

				mp.centerAndZoom(p,options.zoom); 



				if(options.overlay=="marker"){

					

					var marker = new BMap.Marker(p);  // 创建标注

					mp.addOverlay(marker);              // 将标注添加到地图中

					marker.setAnimation(BMAP_ANIMATION_BOUNCE);//跳动的动画

					

					var infoWindow = new BMap.InfoWindow(options.text); // 创建信息窗口对象

					marker.openInfoWindow(infoWindow);

					if(options.markerOpen){

						 mp.openInfoWindow(infoWindow,p);

					}

                   marker.addEventListener("click",function (event){

                	   

						if(jQuery.isFunction(options.click)){

							options.click(event.type,this,infoWindow);

						}else{

							marker.openInfoWindow(infoWindow);

						}

				   });

				   marker.addEventListener("mouseover",function (event){

						if(jQuery.isFunction(options.mouseover)){

							options.mouseover(event.type,this,infoWindow);

						}else{

							marker.openInfoWindow(infoWindow);

						}

						

				   });

				    marker.addEventListener("mouseout",function (event){

						if(jQuery.isFunction(options.mouseout)){

							options.mouseout(event.type,this,infoWindow);

						}else{

							marker.openInfoWindow(infoWindow);

						}

						

				   });

                    	

                   

                    	

				}else if(options.overlay=="custom"){

					

					var myCompOverlay = new ComplexCustomOverlay(p,options.text,options.mouseoverTxt);

				    mp.addOverlay(myCompOverlay);

				}

					

			}else {

				mp.centerAndZoom(options.cityName);

		    	//alert(options.errorMessage);   

			}

			

			

			

			

			

			

			

				

		}

	})

})(jQuery)