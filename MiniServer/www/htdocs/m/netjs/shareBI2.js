$(function(){
var pid=GetRequest()["id"];
	var type=GetRequest()["type"];
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
			$('#container2').highcharts({
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

});