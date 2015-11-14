<?php 
$type = $_REQUEST["type"];
$arr_para_sy = $_REQUEST["arr_para_sy"];
$time_rates = $_REQUEST["time_rates"];
$repay = $_REQUEST["repay"];
$total = $_REQUEST["total"];
$mortgage = $_REQUEST["mortgage"];
$rate = $_REQUEST["rate"];

ECHO "type:".$type;
echo "<br>";
echo "arr_para_sy:".$arr_para_sy;
echo "<br>";
echo "time_rates:".$time_rates;
echo "repay:".$repay;
echo "total:".$total;
echo "mortgage:".$mortgage;
echo "rate:".$rate;

$bxh = 0 ;
$lx = 0;
$everyrepay = 0;
if($type == "1"){
    if($repay =="bx"){
        $s = pow((1+$rate/100/12),($mortgage*12));
    
        $bxh = 10000 * $total * $rate  * $s / 100/12;
        
  
        $everyrepay = $bxh / ($s - 1);
        $bxh = $everyrepay * $mortgage * 12;
        $lx = $bxh - (10000 * $total);
    
    }elseif ($repay =="bj"){
        $paymonth = $mortgage*12;
        $rate_month = $rate/100/12;
    
        $lx = ($paymonth + 1) * $total * 10000 * $rate_month /2;
        $bxh = $lx+ $total * 10000;
        $everyrepay = $bxh / $paymonth;
        $pay_up = 10000* $total * $rate_month + 10000* $total / $paymonth ;
        $pay_down = 10000* $total / $paymonth * ($rate_month + 1) ;
    }
}elseif ($type == "2"){
    if($repay =="bx"){
        $s = pow((1+$rate/100/12),($mortgage*12));
    
        $bxh = 10000 * $total * $rate  * $s / 100/12;
        
  
        $everyrepay = $bxh / ($s - 1);
        $bxh = $everyrepay * $mortgage * 12;
        $lx = $bxh - (10000 * $total);
    
    }elseif ($repay =="bj"){
        $paymonth = $mortgage*12;
        $rate_month = $rate/100/12;
    
        $lx = ($paymonth + 1) * $total * 10000 * $rate_month /2;
        $bxh = $lx+ $total * 10000;
        $everyrepay = $bxh / $paymonth;
        $pay_up = 10000* $total * $rate_month + 10000* $total / $paymonth ;
        $pay_down = 10000* $total / $paymonth * ($rate_month + 1) ;
    }
}

echo "<br>";
echo "还款方式：".($repay=='bx'?'等额本息':'等额本金');
echo "<br>";
echo "贷款利率：".$rate."%";
echo "<br>";
echo "按揭年数: ".$mortgage;
echo "<br>";
echo "还款总额：".round($bxh/10000,3)."万";
echo "<br>";
echo "支付利息：".round($lx/10000,3)."万";
echo "<br>";
echo "月均还款：".round($everyrepay,2)."元";
echo "<br>";
echo "首月还款：".round($pay_up,2)."元";
echo "<br>";
echo "末月还款：".round($pay_down,2)."元";




?>