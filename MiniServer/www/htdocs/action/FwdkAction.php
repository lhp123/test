<?php 

class  Fwdk {
    private  $fwprice = 0;//房屋总额
    private  $dktotal = 0;//贷款总额
    private  $dktotalSy = 0;//贷款总额  商业贷款
    private  $dktotalGjj = 0;//贷款总额 公积金贷款
    private  $rate = 0 ;  //每月利率
    private  $rateSy = 0 ;  //每月利率
    private  $rateGjj = 0 ;  //每月利率
    private  $month = 0;//还款月数
    private  $total = 0; //还款总额
    private  $lx =0 ;       //利息总额
    private  $monthMoney = 0;//月均还款
    private  $monthFirst = 0;//首期付款
    private  $monthMoney2 = array(""); //每月还款数
    private  $result = array(); //返回的结果集
    
    public function array_add($arr,$key,$val=""){
        $arr = array_merge($arr,array($key=>$val));
        return $arr;
    }
    public  function  getResult(){
       $arr = array();
       $arr = $this->array_add($arr,"result_fwprice",$this->fwprice==0?"略":number_format($this->fwprice,2));
       $arr = $this->array_add($arr,"result_dktotal",number_format($this->dktotal,2));
       $arr = $this->array_add($arr,"result_total",number_format($this->total,2));
       $arr = $this->array_add($arr,"result_lx",number_format($this->lx,2));
       $arr = $this->array_add($arr,"result_month",$this->month);
       $arr = $this->array_add($arr,"result_monthfirst",$this->monthFirst==0?$this->monthFirst:number_format($this->monthFirst,2));
       $arr = $this->array_add($arr,"result_monthmoney",number_format($this->monthMoney,2));
       $monthMoney2 = $this->monthMoney2;
       $monthMoney2Str = "";
       for($i=1;$i<=$this->month;$i++){
          $monthMoney2Str = $monthMoney2Str.$i."月,".number_format($monthMoney2[$i],2)."(元)\n";
       }
       $arr = $this->array_add($arr,"result_monthmoney2",$monthMoney2Str);

       return json_encode($arr);
   }
   
    public function bx($dknumber="",$rate=""){
        
        $dknumber = ($dknumber==""?$this->dktotal:$dknumber);
        $rate = $rate==""?$this->rate:$rate;
        $s = pow((1+$rate),$this->month);
        $monthmoney = $dknumber*$s*$rate / ($s - 1) ; //月均还款
        $this->monthMoney = $this->monthMoney + $monthmoney; //月均还款
        $total = $monthmoney*$this->month; //本息和
        $this->total = $this->total + $total;  
        $this->lx = $this->lx + $total - $dknumber; //利息
       
        
    }
    
    public function bj($dknumber="",$rate=""){
        $dknumber = $dknumber==""?$this->dktotal:$dknumber;
        $rate = $rate==""?$this->rate:$rate;
        
        $lx = $dknumber*($this->month+1)*$rate/2; //利息
        $this->lx = $this->lx + $lx; //利息
        $this->total = $this->total + $dknumber + $lx;
        $monthMoney2 = $this->monthMoney2;
        $arr = array();
        array_push($arr,0);
        for($i=1;$i<=$this->month;$i++){
            $pay = $dknumber/$this->month + $dknumber *$rate *($this->month + 1 - $i)/$this->month;
            array_push($arr,($monthMoney2[$i] + $pay));
        }
        $this->monthMoney2 = $arr;
        
    }
    public function init (){
        $this->month = filterParaByName("anjieyear")*12;
        $dktype = filterParaByName("dktype");
        $jstype = filterParaByName("jstype");
        $hkfs = filterParaByName("hkfs");
        if($dktype =="sydk"||$dktype =="gjj"){
            if($jstype=="mianji"){
                $danjia = filterParaNumberByName("danjia");
                $fyarea = filterParaNumberByName("fyarea");
                $anjie = filterParaNumberByName("anjie");
                $this->fwprice = $danjia*$fyarea;
                $this->dktotal  = $this->fwprice*$anjie/10;
                $this->monthFirst = $this->fwprice*0.3;
                
            }elseif($jstype=="zonge"){
                $this->dktotal = filterParaNumberByName("total")*10000;
            }
            if($dktype =="sydk"){
                $this->rate = filterParaByName("rate_sy")/12/100;
               
            }elseif ($dktype =="gjj"){
                $this->rate = filterParaByName("rate_gjj")/12/100;
                
            }
           
            if($hkfs=="bx"){
                $this->bx();
            }elseif ($hkfs=="bj"){
                $this->bj();
            }
            
        }elseif ($dktype =="zuhe"){
            $this->dktotalSy = filterParaNumberByName("total_sy")*10000;
            $this->dktotalGjj = filterParaNumberByName("total_gjj")*10000;
            $this->dktotal = $this->dktotalSy + $this->dktotalGjj;
            $this->rateSy = filterParaNumberByName("rate_sy")/12/100;
            $this->rateGjj = filterParaNumberByName("rate_gjj")/12/100;
            
            if($hkfs=="bx"){
               
                $this->bx($this->dktotalSy,$this->rateSy);
                $this->bx($this->dktotalGjj,$this->rateGjj);
            }elseif ($hkfs=="bj"){
                $this->bj($this->dktotalSy,$this->rateSy);
                $this->bj($this->dktotalGjj,$this->rateGjj);
            }
        }
    
       
        return $this->getResult();
    }

}

?>