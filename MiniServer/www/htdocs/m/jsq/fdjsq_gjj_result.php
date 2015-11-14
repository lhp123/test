<?include_once 'head_jsq.php'; ?>
<?include_once 'fd_js.php';?>

<?
$MPOS="ly";
?>
<!-- tools/inc.header.html compiled file created on 2013-11-19 13:55:39 -->
<!--计算器 begin-->
<article class="jsqmain">
    <div class="jsqname">
        <div class="td03">公积金贷款计算结果</div>
    </div>
    <dl class="jsqtr01">
        <dt>还款方式</dt>
        <dd><?= $repay=='bx'?'等额本息':'等额本金'?></dd>
    </dl>
    <dl class="jsqtr01">
        <dt>贷款总额</dt>
        <dd><?= $total."万元"?></dd>
    </dl>
    <dl class="jsqtr01">
              <dt>贷款利率</dt>
       <dd><?= $rate."%" ?></dd>
           </dl>
    <dl class="jsqtr01">
        <dt>按揭年数</dt>
        <dd><?= $mortgage."年(".($mortgage*12)."期)" ?></dd>
    </dl>
    <dl class="jsqtr01">
        <dt>还款总额</dt>
        <dd><?= round($bxh/10000,3)."万元" ?></dd>
    </dl>
    <dl class="jsqtr01">
        <dt>支付利息</dt>
        <dd><?= round($lx/10000,3)."万元" ?></dd>
    </dl>
     <?php if($repay == "bx"){?>
        <dl class="jsqtr01">
        <dt>月均还款</dt>
        <dd><?= round($everyrepay,2)."元" ?></dd>
    </dl>
    <?php }elseif ($repay == "bj"){?>
    	<a href="javascript:void(0);" >
        <dl class="jsqtr01 arrowdown" id="arrow">
            <dt>首月还款</dt>
            <dd><?= round($pay_up,2)."元" ?></dd>
        </dl>
    	</a>
    <div style="display:none" id="arrowshow">
            <?php 
                for ($i = 2; $i < $mortgage*12 ; $i++) {
                     $pay = 10000*$total/$paymonth + 10000*$total *$rate_month *($paymonth-$i+1)/$paymonth;
                 if($i<13){
                        echo "<p class='a1down'>".($i%12==0?"12":$i%12)."月".round($pay,2 )."元</p>";
                    }else{
                        echo "<p class='a1down'>第".number_format($i/12+1,0)."年".($i%12==0?"12":$i%12)."月".round($pay ,2 )."元</p>";
                    }
                    
                }
            ?>
  </div>
    <dl class="jsqtr01">
       <dt>末月还款</dt>
       <dd><?= round( $pay_down,2)."元" ?></dd>
    </dl> 
    
    <?php }?>
        <p class="cknotes">*以上结果仅供参考</p>
    <div class="jsqbotton"><a href="fdjsq_gjj.php?price=<?=$price?>"><input type="button" value="重新计算" ></a></div>
</article>
<!--计算器 end-->

<script>
$('#arrow').click(function(){
    if($('#arrow').hasClass('arrowdown'))
    {
        $('#arrow').removeClass('arrowdown');
        $('#arrow').addClass('arrowup');
        $('#arrowshow').show();
        getPageSize();
    }
    else
    {
        $('#arrow').removeClass('arrowup');
        $('#arrow').addClass('arrowdown');
        $('#arrowshow').hide();
        getPageSize();
    }
});
</script>





				

