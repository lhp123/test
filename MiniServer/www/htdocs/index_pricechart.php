<?php
$posd="详细";
include_once 'include.php';
include_once 'action/CjAction.php';


$cjAction = new CjAction($conn, $CID);

$time=mktime(0,0,0,date("m"),1,date("Y"));
$m = (int)date("n",$time);
$categories = array();
$date = array();
for ($i=0;$i<=12-$m;$i++){
	array_push($categories, "'".date("n",strtotime("-1 year +".$i." month",$time))."月'");
	array_push($date, date("y-m",strtotime("-1 year +".$i." month",$time)));
}

for ($i=($m-1);$i>0;$i--){
	//echo $i."  "."'".date("y-m",strtotime(" -".$i." month",$time))."'"."<br/>";
	array_push($categories, "'".date("n",strtotime(" -".$i." month",$time))."月'");
	array_push($date, date("y-m",strtotime(" -".$i." month",$time)));
}
//echo implode(",", $categories);
$lineChart = $cjAction->getCjPrice_lastyear("买卖");
$linedata = array(0,0,0,0,0,0,0,0,0,0,0,0);//长度为12的数组
$str="";
$temp = array();
while($rst = mysql_fetch_array($lineChart["result"])){
	array_push($temp, $rst);
}

//echo var_export($temp,TRUE);
//echo var_export($date,true);

foreach ($temp as $a){
	$i=0;
	
	foreach ($date as $val){
		//echo $a["date"]."    ".$val."<br/>";
		if($val==$a["date"]){
			
			$linedata[$i] = round($a["price"],1);
			//echo "<br/>".$a["date"]."    ".$val."    ".$a["price"]."   ".$linedata[$i];
			
		}
		$i++;
	}
	
}

//echo var_export($linedata,true);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>首页二手房成交统计</title>
<meta name="description" content="首页二手房成交统计" />
<script type="text/javascript" src="/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="/js/highcharts.js"></script>
	<script type="text/javascript">

	$(function() {

		 $('#content').highcharts({
		        title: {
		            text: '',//<?php echo $CITYNAME;?>二手房成交趋势
		            x: -20 //center
		        },
		        subtitle: {
		            text: '统计<?php echo date("Y/m",strtotime("-1 year ",$time))."-".date("Y/m",strtotime("-1  month",$time)); echo  $CITYNAME;?>二手房成交趋势',
		            x: -20
		        },
		        xAxis: {
		            categories: [ <?php echo implode(",", $categories);?>]
		        },
		        yAxis: {
		            title: {
		                text: '成交价格(元)'
		            },
		            plotLines: [{
		                value: 0,
		                width: 1,
		                color: '#808080'
		            }]
		        },
		        tooltip: {
		            valueSuffix: '元/平'
		        },
		        legend: {
		        	enabled:false,
		            layout: 'vertical',
		            align: 'right',
		            verticalAlign: 'top',
		            borderWidth: 0
		        },
		        credits:{

		        	enabled:false,
		        	text: '广嘉在线',
		        	href:'lzgjfc.com',
		        	position: {
		        		align: 'right',
		        		x: -10,
		        		verticalAlign: 'bottom',
		        		y: -5
		        		}
		            },
		        series: [{
		            name: '<?php echo $CITYNAME;?>',
		            data: [<?php echo implode(",", $linedata);?>]
		        }],
		    });
	});

	</script>
</head>
<body>

	<div id="content"  style="height:265px;"></div>

</body>
</html>