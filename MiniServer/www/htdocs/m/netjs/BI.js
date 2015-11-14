/*****************各用户留电话比例*************************/
function getclickratio(pid,type){

$.post("action.php",{action:"getclickratio",id:pid,type:type},function(data){
		//alert(data);
		var datas = jQuery.parseJSON(data);
		var arr = datas.data;
		if(arr.length>1){
			var title = arr[0].pt;
			var total = arr[0].qty;
				var data = [];
				for (var i=1;i<arr.length ;i++ )
				{
					var labels = [];
					var dt = (arr[i].qty/total*100).toFixed(1);
					var lab = arr[i].un;
					labels.push(lab);
					labels.push(eval(dt));
					data.push(labels);
				}
			$('#container').highcharts({
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: '各用户留电话比例'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: '总留电话数'+total+'比率',
					data: data
				}]
			});
		}else{
			$('#container').highcharts({
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: '各用户留电话比例'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: '总留电话数0比率',
					data: [['总数',100]]
				}]
			});
		}
	});
}



/******************各用户浏览比例**************************/
function getviewratio(pid,type){
$.post("action.php",{action:"getviewratio",id:pid,type:type},function(data){
		//alert(data);
		var datas = jQuery.parseJSON(data);
		var arr = datas.data;
		if(arr.length>1){
			var title = arr[0].pt;
			var total = arr[0].qty;
				var data = [];
				for (var i=1;i<arr.length ;i++ )
				{
					var labels = [];
					var dt = (arr[i].qty/total*100).toFixed(1);
					var lab = arr[i].un;
					labels.push(lab);
					labels.push(eval(dt));
					data.push(labels);
				}
			$('#container').highcharts({
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: '各用户浏览比例'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: '总浏览数'+total+'比率',
					data: data
				}]
			});
		}else{
			$('#container').highcharts({
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: '各用户浏览比例'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: '总浏览数0比率',
					data: [['总数',100]]
				}]
			});
		}
	});
}

/****************总成交转化比率**************************/
function getturnoverratio(pid,type){
$.post("action.php",{action:"getturnoverratio",id:pid,type:type},function(data){
		//alert(data);
		var datas = jQuery.parseJSON(data);
		var arr = datas.data;
		if(arr.length>1){
			var title = arr[0].pt;
			var total = arr[0].qty;
				var data = [];
				for (var i=1;i<arr.length ;i++ )
				{
					var labels = [];
					var dt = (arr[i].qty/total*100).toFixed(1);
					var lab = arr[i].un;
					labels.push(lab);
					labels.push(eval(dt));
					data.push(labels);
				}
			$('#container').highcharts({
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: '总成交率'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: '总留电话数'+total+'比率',
					data: data
				}]
			});
		}else{
			$('#container').highcharts({
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: '总成交率'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: '总留电话数0比率',
					data: [['总数',100]]
				}]
			});
		}
	});
}

/****************总留电话转化比率**************************/
function getphoneratio(pid,type){
$.post("action.php",{action:"getphoneratio",id:pid,type:type},function(data){
		//alert(data);
		var datas = jQuery.parseJSON(data);
		var arr = datas.data;
		if(arr.length>1){
			var title = arr[0].un;
			var total = arr[0].qty;
			var title1 = arr[1].un;
			var total1 = arr[1].qty;
			var ratio1 = (total1/total*100).toFixed(1);
			var title2 = "未留电话数";
			var total2 = total-total1;
			var ratio2 = (total2/total*100).toFixed(1);
			//alert(data);
			var data = [[title1,eval(ratio1)],[title2,eval(ratio2)]];
			
			$('#container').highcharts({
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: '总留电话率'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: '总浏览数'+total+'比率',
					data: data
				}]
			});
		}else{
			$('#container').highcharts({
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: '总留电话率'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: '总浏览数0比率',
					data: [['总数',100]]
				}]
			});
		}
	});
}


/*****************各用户各用户成交比例*************************/
function getevrphoneratio(pid,type){

$.post("action.php",{action:"getevrphoneratio",id:pid,type:type},function(data){
		//alert(data);
		var datas = jQuery.parseJSON(data);
		var arr = datas.data;
		if(arr.length>1){
			var title = arr[0].pt;
			var total = arr[0].qty;
				var data = [];
				for (var i=1;i<arr.length ;i++ )
				{
					var labels = [];
					var dt = (arr[i].qty/total*100).toFixed(1);
					var lab = arr[i].un;
					labels.push(lab);
					labels.push(eval(dt));
					data.push(labels);
				}
			$('#container').highcharts({
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: '各用户成交比例'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: '总成交数'+total+'比率',
					data: data
				}]
			});
		}else{
			$('#container').highcharts({
				chart: {
					type: 'pie',
					options3d: {
						enabled: true,
						alpha: 45,
						beta: 0
					}
				},
				title: {
					text: '各用户成交比例'
				},
				tooltip: {
					pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						depth: 35,
						dataLabels: {
							enabled: true,
							format: '{point.name}'
						}
					}
				},
				series: [{
					type: 'pie',
					name: '总成交数0比率',
					data: [['总数',100]]
				}]
			});
		}
	});
}

/*****************今天浏览量*************************/
function gettodayratio(pid,type){
$.post("action.php",{action:"gettodayratio",id:pid,type:type},function(data){
		//alert(data);
		var hourdata=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		var datas = jQuery.parseJSON(data);
		
		if(datas.success==1){
			var arr = datas.data;
				for (var i=0;i<arr.length ;i++ )
				{
					var hour = eval(arr[i].hour);
					hourdata[hour] = eval(arr[i].qty);
				}
			 $('#container').highcharts({
				chart: {
					type: 'spline'
				},
				title: {
					text: '今天浏览量'
				},
				xAxis: {
					type: 'datetime',
					labels: {
						overflow: 'justify'
					}
				},
				yAxis: {
					title: {
						text: '浏览人次(次)'
					},
					minorGridLineWidth: 0,
					gridLineWidth: 0,
					alternateGridColor: null
				},
				tooltip: {
					valueSuffix: ' 次'
				},
				plotOptions: {
					spline: {
						lineWidth: 4,
						dataLabels: {
							enabled: true
						},
						states: {
							hover: {
								lineWidth: 5
							}
						},
						marker: {
							enabled: false
						},
						pointInterval: 3600000, // one hour
						pointStart: Date.UTC(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(), 0, 0, 0)
					}
				},
				series: [{
					name: '每小时浏览量',
					data: hourdata
				}],
				navigation: {
					menuItemStyle: {
						fontSize: '10px'
					}
				}
			});
		}
		else{
			 $('#container').highcharts({
					chart: {
						type: 'spline'
					},
					title: {
						text: '今天浏览量'
					},
					xAxis: {
						type: 'datetime',
						labels: {
							overflow: 'justify'
						}
					},
					yAxis: {
						title: {
							text: '浏览人次(次)'
						},
						minorGridLineWidth: 0,
						gridLineWidth: 0,
						alternateGridColor: null
					},
					tooltip: {
						valueSuffix: ' 次'
					},
					plotOptions: {
						spline: {
							lineWidth: 4,
							dataLabels: {
								enabled: true
							},
							states: {
								hover: {
									lineWidth: 5
								}
							},
							marker: {
								enabled: false
							},
							pointInterval: 3600000, // one hour
							pointStart: Date.UTC(new Date().getFullYear, new Date().getMonth(), new Date().getDate(), 0, 0, 0)
						}
					},
					series: [{
						name: '每小时浏览量',
						data: hourdata

					}],
					navigation: {
						menuItemStyle: {
							fontSize: '10px'
						}
					}
				});
		}
	});
}

/*****************一天浏览量*************************/
function getonedayratio(pid,type,date){
$.post("action.php",{action:"getonedayratio",id:pid,type:type,date:date},function(data){
		//alert(data);
		var hourdata=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		var datas = jQuery.parseJSON(data);
		if(datas.success==1){
			var arr = datas.data;
				for (var i=0;i<arr.length ;i++ )
				{
					var hour = eval(arr[i].hour);
					hourdata[hour] = eval(arr[i].qty);
				}
			 $('#container').highcharts({
				chart: {
					type: 'spline'
				},
				title: {
					text: '一天浏览量'
				},
				xAxis: {
					type: 'datetime',
					labels: {
						overflow: 'justify'
					}
				},
				yAxis: {
					title: {
						text: '浏览人次(次)'
					},
					minorGridLineWidth: 0,
					gridLineWidth: 0,
					alternateGridColor: null
				},
				tooltip: {
					valueSuffix: ' 次'
				},
				plotOptions: {
					spline: {
						lineWidth: 4,
						dataLabels: {
							enabled: true
						},
						states: {
							hover: {
								lineWidth: 5
							}
						},
						marker: {
							enabled: false
						},
						pointInterval: 3600000, // one hour
						pointStart: Date.UTC(date.substr(0,4), date.substr(5,2), date.substr(8,2), 0, 0, 0)
					}
				},
				series: [{
					name: '每小时浏览量',
					data: hourdata
				}],
				navigation: {
					menuItemStyle: {
						fontSize: '10px'
					}
				}
			});
		}
		else{
			 $('#container').highcharts({
					chart: {
						type: 'spline'
					},
					title: {
						text: '一天浏览量'
					},
					xAxis: {
						type: 'datetime',
						labels: {
							overflow: 'justify'
						}
					},
					yAxis: {
						title: {
							text: '浏览人次(次)'
						},
						minorGridLineWidth: 0,
						gridLineWidth: 0,
						alternateGridColor: null
					},
					tooltip: {
						valueSuffix: ' 次'
					},
					plotOptions: {
						spline: {
							lineWidth: 4,
							dataLabels: {
								enabled: true
							},
							states: {
								hover: {
									lineWidth: 5
								}
							},
							marker: {
								enabled: false
							},
							pointInterval: 3600000, // one hour
							pointStart: Date.UTC(date.substr(0,4), date.substr(5,2), date.substr(8,2), 0, 0, 0)
						}
					},
					series: [{
						name: '每小时浏览量',
						data: hourdata

					}],
					navigation: {
						menuItemStyle: {
							fontSize: '10px'
						}
					}
				});
		}
	});
}

/*****************按时间段浏览量分析*************************/
function gettimeratio(pid,type){
$.post("action.php",{action:"gettimeratio",id:pid,type:type},function(data){
		//alert(data);
		var hourdata=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		var datas = jQuery.parseJSON(data);
		
		if(datas.success==1){
			var arr = datas.data;
				for (var i=0;i<arr.length ;i++ )
				{
					var hour = eval(arr[i].hour);
					hourdata[hour] = eval(arr[i].qty);
				}
			 $('#container').highcharts({
				chart: {
					type: 'spline'
				},
				title: {
					text: '按时间段浏览量分析'
				},
				xAxis: {
					type: 'datetime',
					labels: {
						overflow: 'justify'
					}
				},
				yAxis: {
					title: {
						text: '浏览人次(次)'
					},
					minorGridLineWidth: 0,
					gridLineWidth: 0,
					alternateGridColor: null
				},
				tooltip: {
					valueSuffix: ' 次'
				},
				plotOptions: {
					spline: {
						lineWidth: 4,
						dataLabels: {
							enabled: true
						},
						states: {
							hover: {
								lineWidth: 5
							}
						},
						marker: {
							enabled: false
						},
						pointInterval: 3600000, // one hour
						pointStart: Date.UTC(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(), 0, 0, 0)
					}
				},
				series: [{
					name: '每小时浏览量',
					data: hourdata
				}],
				navigation: {
					menuItemStyle: {
						fontSize: '10px'
					}
				}
			});
		}
		else{
			 $('#container').highcharts({
					chart: {
						type: 'spline'
					},
					title: {
						text: '按时间段浏览量分析'
					},
					xAxis: {
						type: 'datetime',
						labels: {
							overflow: 'justify'
						}
					},
					yAxis: {
						title: {
							text: '浏览人次(次)'
						},
						minorGridLineWidth: 0,
						gridLineWidth: 0,
						alternateGridColor: null
					},
					tooltip: {
						valueSuffix: ' 次'
					},
					plotOptions: {
						spline: {
							lineWidth: 4,
							dataLabels: {
								enabled: true
							},
							states: {
								hover: {
									lineWidth: 5
								}
							},
							marker: {
								enabled: false
							},
							pointInterval: 3600000, // one hour
							pointStart: Date.UTC(new Date().getFullYear, new Date().getMonth(), new Date().getDate(), 0, 0, 0)
						}
					},
					series: [{
						name: '每小时浏览量',
						data: hourdata

					}],
					navigation: {
						menuItemStyle: {
							fontSize: '10px'
						}
					}
				});
		}
	});
}


/*****************一月浏览量*************************/
function getonemonratio(pid,type,date){
$.post("action.php",{action:"getonemonratio",id:pid,type:type,date:date+"-01"},function(data){
		var datas = jQuery.parseJSON(data);
		if(datas.success==1){
			var arr = datas.data;
			var data1=[];
			for (var i=0;i<arr.length ;i++ )
			{
				
				var day = [Date.UTC((arr[i].day).substr(0,4), (arr[i].day).substr(5,2), (arr[i].day).substr(8,2)),eval(arr[i].qty)];
				data1.push(day);
			}
			  $('#container').highcharts({
				chart: {
					type: 'spline'
				},
				title: {
					text: date+"日浏览量"
				},
				xAxis: {
					type: 'datetime',
					dateTimeLabelFormats: { // don't display the dummy year
						month: '%e. %b',
						year: '%b'
					}
				},
				yAxis: {
					title: {
						text: '浏览人次(次)'
					},
					min: 0
				},
				tooltip: {
					headerFormat: '<b>{series.name}</b><br>',
					pointFormat: '{point.x:%e. %b}: {point.y:.2f} 次'
				},

				plotOptions: {
					spline: {
						dataLabels: {
								enabled: true
							},
						marker: {
							enabled: false
						}
					}
				},

				series: [{
					name: date+"日浏览量",
					data: data1
				}]
			});
		}
		else{
			 $('#container').highcharts({
				chart: {
					type: 'spline'
				},
				title: {
					text: date+"日浏览量"
				},
				xAxis: {
					type: 'datetime',
					dateTimeLabelFormats: { // don't display the dummy year
						month: '%e. %b',
						year: '%b'
					}
				},
				yAxis: {
					title: {
						text: '浏览人次(次)'
					},
					min: 0
				},
				tooltip: {
					headerFormat: '<b>{series.name}</b><br>',
					pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
				},

				plotOptions: {
					spline: {
						dataLabels: {
								enabled: true
							},
						marker: {
							enabled: false
						}
					}
				},

				series: [{
					name: date+"日浏览量",
					data: []
				}]
			});
		}
	});
}


/*****************自选日期日浏览量*************************/
function getcustomerratio(pid,type,begindate,enddate){
$.post("action.php",{action:"getcustomerratio",id:pid,type:type,begindate:begindate,enddate:enddate},function(data){
		var datas = jQuery.parseJSON(data);
		if(datas.success==1){
			var arr = datas.data;
			var data1=[];
			for (var i=0;i<arr.length ;i++ )
			{
				
				var day = [Date.UTC((arr[i].day).substr(0,4), (arr[i].day).substr(5,2), (arr[i].day).substr(8,2)),eval(arr[i].qty)];
				data1.push(day);
			}
			  $('#container').highcharts({
				chart: {
					type: 'spline'
				},
				title: {
					text: begindate+"至"+enddate+"日浏览量"
				},
				xAxis: {
					type: 'datetime',
					dateTimeLabelFormats: { // don't display the dummy year
						month: '%e. %b',
						year: '%b'
					}
				},
				yAxis: {
					title: {
						text: '浏览人次(次)'
					},
					min: 0
				},
				tooltip: {
					headerFormat: '<b>{series.name}</b><br>',
					pointFormat: '{point.x:%e. %b}: {point.y:.2f} 次'
				},

				plotOptions: {
					spline: {
						dataLabels: {
								enabled: true
							},
						marker: {
							enabled: false
						}
					}
				},

				series: [{
					name: begindate+"至"+enddate+"日浏览量",
					data: data1
				}]
			});
		}
		else{
			 $('#container').highcharts({
				chart: {
					type: 'spline'
				},
				title: {
					text: begindate+"至"+enddate+"日浏览量"
				},
				xAxis: {
					type: 'datetime',
					dateTimeLabelFormats: { // don't display the dummy year
						month: '%e. %b',
						year: '%b'
					}
				},
				yAxis: {
					title: {
						text: '浏览人次(次)'
					},
					min: 0
				},
				tooltip: {
					headerFormat: '<b>{series.name}</b><br>',
					pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
				},

				plotOptions: {
					spline: {
						dataLabels: {
								enabled: true
							},
						marker: {
							enabled: false
						}
					}
				},

				series: [{
					name: begindate+"至"+enddate+"日浏览量",
					data: []
				}]
			});
		}
	});
}