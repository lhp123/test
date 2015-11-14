<?php 

$arr_para_sy = $_REQUEST["arr_para_sy"]; //没有用到
$time_rates = $_REQUEST["time_rates"];  //没有用到

$type = $_REQUEST["type"]; 
$repay = $_REQUEST["repay"];
$total = $_REQUEST["total"];
$mortgage = $_REQUEST["mortgage"];
$rate = $_REQUEST["rate"];

//组合贷款
$total_gjj = $_REQUEST["total_gjj"];
$total_sy = $_REQUEST["total_sy"];
$rate_gjj = $_REQUEST["rate_gjj"];
$rate_sy = $_REQUEST["rate_sy"];

//ECHO "type:".$type;
//echo "<br>";
//echo "arr_para_sy:".$arr_para_sy;
//echo "<br>";
//echo "time_rates:".$time_rates;
//echo "repay:".$repay;
//echo "total:".$total;
//echo "mortgage:".$mortgage;
//echo "rate:".$rate;


if($type == "1"){
    if($repay =="bx"){
        $s = pow((1+$rate/100/12),($mortgage*12));
    
        $bxh = 10000 * $total * $rate  * $s / 100/12;
        
  
        $everyrepay = $bxh / ($s - 1);
        $bxh = $everyrepay * $mortgage * 12;
        $lx = $bxh - (10000 * $total);
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
}elseif ($type == "3"){
    if($repay =="bx"){
        //商业贷款
        $s_sy = pow((1+$rate_sy/100/12),($mortgage*12));
        $bxh_sy = 10000 * $total_sy * $rate_sy  * $s_sy / 100/12;
  
        $everyrepay_sy = $bxh_sy / ($s_sy - 1);
        $bxh_sy = $everyrepay_sy * $mortgage * 12;
        $lx_sy = $bxh_sy - (10000 * $total_sy);
    
        //公基金贷款
        $s_gjj = pow((1+$rate_gjj/100/12),($mortgage*12));
        $bxh_gjj = 10000 * $total_gjj * $rate_gjj  * $s_gjj / 100/12;
  
        $everyrepay_gjj = $bxh_gjj / ($s_gjj - 1);
        $bxh_gjj = $everyrepay_gjj * $mortgage * 12;
        $lx_gjj = $bxh_gjj - (10000 * $total_gjj);
        
        //总和
        
        $total = $total_gjj+$total_sy;
        $bxh = $bxh_gjj +$bxh_sy;
        $lx = $lx_gjj + $lx_sy;
        $everyrepay = $everyrepay_gjj + $everyrepay_sy;
        
        
    }elseif ($repay =="bj"){
        //商业贷款
        $paymonth = $mortgage*12;
        $rate_month_sy = $rate_sy/100/12;
    
        $lx_sy = ($paymonth + 1) * $total_sy * 10000 * $rate_month_sy /2;
        $bxh_sy = $lx_sy+ $total_sy * 10000;
        $everyrepay_sy = $bxh_sy / $paymonth;
        $pay_up_sy = 10000* $total_sy * $rate_month_sy + 10000* $total_sy / $paymonth ;
        $pay_down_sy = 10000* $total_sy / $paymonth * ($rate_month + 1) ;
        
        //公基金贷款
        $paymonth = $mortgage*12;
        $rate_month_gjj = $rate_gjj/100/12;
        
        $lx_gjj = ($paymonth + 1) * $total_gjj * 10000 * $rate_month_gjj /2;
        $bxh_gjj = $lx_gjj+ $total_gjj * 10000;
        $everyrepay_gjj = $bxh_gjj / $paymonth;
        $pay_up_gjj = 10000* $total_gjj * $rate_month_gjj + 10000* $total_gjj / $paymonth ;
        $pay_down_gjj = 10000* $total_gjj / $paymonth * ($rate_month_gjj + 1) ;
        
        
        //总和
        $total = $total_gjj+$total_sy;
        $bxh = $bxh_gjj +$bxh_sy;
        $lx = $lx_gjj + $lx_sy;
        $everyrepay = $everyrepay_gjj + $everyrepay_sy;
        $pay_up = $pay_up_gjj + $pay_up_sy;
        $pay_down = $pay_down_gjj + $pay_down_sy; 
    }
    
}

//echo "<br>";
//echo "还款方式：".($repay=='bx'?'等额本息':'等额本金');
//echo "<br>";
//echo "贷款利率：".$rate."%";
//echo "<br>";
//echo "按揭年数: ".$mortgage;
//echo "<br>";
//echo "还款总额：".round($bxh/10000,3)."万";
//echo "<br>";
//echo "支付利息：".round($lx/10000,3)."万";
//echo "<br>";
//echo "月均还款：".round($everyrepay,2)."元";
//echo "<br>";
//echo "首月还款：".round($pay_up,2)."元";
//echo "<br>";
//echo "末月还款：".round($pay_down,2)."元";




?>