<?include_once 'head_jsq.php'; ?>
<?include_once 'fd_js.php';?>

<!--计算器 begin-->
<div class="ipad_left">
    <div class="ipad_left_menu">
      <ul>
        <li class="ipad_left_menu1"><div class="menu_tb"><img src="../netimages/ipad1.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad1.png',sizingMethod='image'); " /> <div class="menu_name">二手房</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad2.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad2.png',sizingMethod='image'); " /> <div class="menu_name">租房</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad3.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad3.png',sizingMethod='image'); " /> <div class="menu_name">小区</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad4.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad4.png',sizingMethod='image'); " /> <div class="menu_name">新房</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad5.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad5.png',sizingMethod='image'); " /> <div class="menu_name">经纪人</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad6.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad6.png',sizingMethod='image'); " /> <div class="menu_name">委托</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad7.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad7.png',sizingMethod='image'); " /> <div class="menu_name">关于</div></div></li>
        <li class="ipad_left_menu2"><div class="menu_tb"><img src="../netimages/ipad8.png" width="25" height="24" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='../netimages/ipad8.png',sizingMethod='image'); " /> <div class="menu_name">地图</div></div></li>
        <li><input type="text" name="textfield3" style="width:55%; float:left; margin-top:10px; margin-left:20px; height:22px; border:1px solid #ccc;"><input name="button" type="submit" class="search" id="button" value="查询"  style="width:25%; float:left; margin-top:10px; margin-left:10px; background-color:#28a2a7; border:0; height:25px; color:#FFF;"/></li>
      </ul>
    </div>
   </div>
<article class="jsqmain" style="width:74%; float:right;">
    <div class="jsqname">
        <div class="td03">商业贷款计算结果</div>
    </div>
    <dl class="jsqtr01">
        <dt>还款方式</dt>
        <dd><?= $repay=='bx'?'等额本息':'等额本金'?></dd>
    </dl>
    <dl class="jsqtr01">
        <dt>贷款总额</dt>
        <dd><?= $total."万元"?> </dd>
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
    <div class="jsqbotton"><a href="fdjsq_sy.php"><input type="button" value="重新计算"></a></div>
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

<?include_once 'tail_jsq.php'; ?>