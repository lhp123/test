  <?php include_once 'action/CjAction.php';?>
  <?php 
  $disid=filterParaAll($disid);
  $cjAction=new CjAction($conn, $CID);
  if ($pos=="租房"){
	 $result=$cjAction->getCjFyByDis($disid,"租赁",3);
  }else if ($pos=="二手房"){
	  $result=$cjAction->getCjFyByDis($disid,"买卖",3);
  }

  ?>
  <div id="fyjs_main_box2">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr align="center">
        <td height="32" class="box2_td_bg">&nbsp;</td>
        <td height="32" class="box2_td_bg">户型</td>
        <td height="32" class="box2_td_bg">面积</td>
        <td height="32" class="box2_td_bg">签约日期</td>
        <td height="32" class="box2_td_bg">成交价</td>
        <td height="32" class="box2_td_bg">成交单价</td>
        <td height="32" class="box2_td_bg">经纪人</td>
        <!-- <td height="32" class="box2_td_bg">数据来源</td> -->
      </tr>
      <?php 
      while($rscj=mysql_fetch_array($result["result"])){
      ?>
      <tr align="center">
        <td height="70" class="box2_td_bg1"><img src="images/img_6.jpg" width="77" height="58" /></td>
        <td valign="top" height="70" class="box2_td_bg1"><strong><?php echo $rscj["H_SHI"];?></strong>室<strong><?php echo $rscj["H_TING"];?></strong>厅</td>
        <td valign="top" height="70" class="box2_td_bg1"><strong><?php echo numberFormatBySelf($rscj["BUILD_AREA"]);?></strong>平米</td>
        <td valign="top" height="70" class="box2_td_bg1"><span class="org"><strong><?php echo $rscj["CJ_DATE"];?></strong></span></td>
        <td valign="top" height="70" class="box2_td_bg1"><strong><?php echo numberFormatBySelf($rscj["CJ_PRICE"]/10000);?></strong>万</td>
        <td valign="top" height="70" class="box2_td_bg1"><span class="org"><strong><?php echo number_format(($rscj["CJ_PRICE"]*10000)/$rscj["BUILD_AREA"],2);?></strong>元/平米</span></td>
        <td valign="top" height="70" class="box2_td_bg1"><span class="blu" style="font-size:12px;"><?php echo $rscj["USERNAME"]?>&nbsp;<?php echo $rscj["USERTEL"]?></span></td>
        <!--  <td valign="top" height="70" class="box2_td_bg1"><span style="font-size:12px;">ERP数据</span></td>-->
      </tr>
      <?php }?>
    </table>
  </div>