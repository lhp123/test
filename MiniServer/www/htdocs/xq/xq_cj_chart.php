<?php
$posd="详细";
include_once '../include.php';
include_once '../action/XqAction.php';
include_once '../action/CjAction.php';


$id =filterParaAllByName("xqid");
//$id=542;
$xqAction = new XqAction($conn, $CID);
$cjAction = new CjAction($conn, $CID);
$rs = $xqAction->XqDetail($id);

$time=mktime(0,0,0,date("m"),1,date("Y"));
$m = (int)date("n",$time);
$categories = array();
$date = array();
for ($i=0;$i<=12-$m;$i++){
	array_push($categories, "'".date("y/m",strtotime("-1 year +".$i." month",$time))."'");
	array_push($date, date("y/m",strtotime("-1 year +".$i." month",$time)));
}

for ($i=($m-1);$i>0;$i--){
	//echo $i."  "."'".date("y-m",strtotime(" -".$i." month",$time))."'"."<br/>";
	array_push($categories, "'".date("y/m",strtotime(" -".$i." month",$time))."'");
	array_push($date, date("y/m",strtotime(" -".$i." month")));
}
//echo implode(",", $categories);
$lineChart = $cjAction->getXqCjPrice_lastyear($id,"买卖");
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





$pieChart = $cjAction->getXqCJByShi($id);
$piedata = array();
$str= "";
while ($rst = mysql_fetch_array($pieChart["result"])){
	
	$str .="['".$rst["H_SHI"]."室,".$rst["num"]."套',".$rst["num"]."]";
	array_push($piedata, $str);
	$str="";
}
if(count($piedata)==0){
	$str .="['0室,0套',1]";

	array_push($piedata, $str);

	$str="";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>小区成交统计</title>
<meta name="description" content="小区成交统计" />
<script type="text/javascript" src="/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="/js/highcharts.js"></script>
<script type="text/javascript" src="/js/highcharts-3d.js"></script>

<script type="text/javascript" >
$(function () {
    $('#linchart').highcharts({
        title: {
            text: '<?php echo $rs["NAME"];?>成交趋势',
            x: -20 //center
        },
        subtitle: {
            text: '统计<?php echo date("Y/m",strtotime("-1 year ",$time))."-".date("Y/m",strtotime("-1  month",$time)); echo  $rs["NAME"];?>二手房成交趋势',
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
            name: '<?php echo $rs["NAME"];?>',
            data: [<?php echo implode(",", $linedata);?>]
        }],
        noData :'抱歉,没有数据可统计!'
    });

    $('#piechart').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 0
            }
        },
        title: {
            text: '<?php echo $rs["NAME"];?>累计成交统计'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>',
            style: {
                'font-weight': 'bold'
            }
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
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 10,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}',
                    style: {
                        'font-weight': 'bold'
                    }
                }
            }
        },
        series: [{
      	  type: 'pie',
          name: '成交量',
          data: [<?php echo implode(",", $piedata);?>]
        }]
        
    });



    
});






</script>


<!--[if IE]>
<script src="http://explorercanvas.googlecode.com/svn/trunk/excanvas.js"></script>
<![endif]-->

</head>
<body>

	<div id="container">
		<div id="linchart" style="width: 700px; height: 300px; margin: 0 auto;float: left;"></div>
		<div id="piechart"  style=" height:300px;width:300px; margin: 0 auto;float: right;"></div>
	</div>

</body>
</html>

