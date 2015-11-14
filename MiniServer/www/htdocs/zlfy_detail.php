<?php 

ob_start();

$pos = "租房";

$posd="详细";

$yewu = "出租";

?>

<?php include_once 'head.php';?>

<?php 

include_once 'action/FyAction.php';

include_once 'action/CjAction.php';

include_once 'action/PjAction.php';

include_once 'action/DkAction.php';

?>

<?php 

$fyid=filterParaAllByName("id");

$pjAction=new PjAction($conn, $CID);

$dkAction=new DkAction($conn, $CID);

$cjAction=new CjAction($conn, $CID);

$fyAction=new FyAction($conn, $CID);

$fyAction->addFyIPClick($fyid);

$fyAction->addFyIPCityClick($CITYNAME,$fyid);

$rs=$fyAction->getFyDetailWithUser($fyid);

?>

<!-- 房源详细页  主体 -->

<div id="center">

  <div id="fysm"> <span class="blu"><a href="index.php">首页</a></span>&nbsp;&gt;&nbsp;

  <span class="blu"><a href="zlfy_list.php">租房</a></span>&nbsp;&gt;&nbsp;

  <span class="blu"><a href="zlfy_list.php?re1=<?php echo $rs["RE1"];?>" target="_blank"><?php echo $rs["RE1"];?></a></span>&nbsp;&gt;&nbsp;

  <span class="blu"><a href="zlfy_list.php?re1=<?php echo $rs["RE1"];?>&re2=<?php echo $rs["RE2"];?>" target="_blank"><?php echo $rs["RE2"];?></a></span>&nbsp;&gt;&nbsp;

  <span class="blu"><a href="xq_detail.php?id=<?php echo $rs["DISID"];?>" target="_blank"><?php echo $rs["DISNAME"];?></a></span>&nbsp;</div>

  <div id="xxy_tit">

    <table width="100%"  border="0" cellpadding="0" cellspacing="0">

      <tr>

        <td align="left" style="padding-left:10px; padding-right:10px; width:25px;" ><img src="images/ico_zu.jpg" width="25" height="25" /></td>

        <td align="left"  style="padding-right:10px;"><strong style="float:left;"><?php echo $rs["TITLE"]?></strong>

        <?

        $color=array("","#f55823","#f29219","#8fc843","#f96fab");

        $labels=explode(";",$rs["LABLES"]);

        for($li=0;$li<(count($labels)<5?count($labels)-1:5);$li++){

		?>

		<div class="tex2_bq" style="background:<?php echo $color[$li]?>;"><?php echo $labels[$li];?></div>

		<?		

		} 

		?>

          </td>

        <td align="right"><span style="font-size:14px; margin-right:10px;">房源编号：<?php echo $rs["CONTRACT_CODE"]?></span></td>

      </tr>

    </table>

  </div>

  <div id="tit_main">

    <div id="tit_main_img">

    <?php 

    $DPhotoAlt=$rs["TITLE"]==""?$rs["RE2"].$rs["DISNAME"].$rs["FITMENT"].$rs["H_SHI"]."居":$rs["TITLE"];

    $DPhotos=getPicsWithAll($rs["PHOTO"],$rs["FXT"]);

    include_once 'fy_img_scroll_detail.php';

    ?>

    </div>

    <div id="tit_main_tex">

      <table width="100%" border="0" cellpadding="0" cellspacing="0">

        <tr>

          <td style="line-height:22px; padding-bottom:20px;"> 租价:<span class="org" style="font-size:16px; font-weight:bold;"><?php echo numberFormatBySelf($rs["PRICE"])?></span>元/月 <br />

            单价：<?php echo numberFormatBySelf($rs["JUNJIA"])?>元/平米 </td>

        </tr>

        <tr>

          <td style="line-height:22px; padding-bottom:20px;"> 房型:<font style="font-size:20px;font-weight:bold;"><?php echo $rs["H_SHI"]?></font>&nbsp;室&nbsp;<font style="font-size:20px;font-weight:bold;"><?php echo $rs["H_TING"]?></font>&nbsp;厅/<?php echo $rs["FITMENT"]?><br />

            朝向:<?php echo $rs["DIRECTION"]?><br />

            楼层:<?php echo getFloor($rs["TOP_FLOOR"],$rs["FLOOR"]);?><?php //echo $rs["TOP_FLOOR"]?><br />

            小区:<span class="blu"><a href="/xq/xq_detail.php?xqid=<?php echo $rs["DISID"]?>" target="_blank"><?php echo $rs["DISNAME"]?></a></span>/<?php echo $rs["JZ_YEAR"]?>年<?php echo $rs["FRAME"];?> &nbsp;&nbsp;<span class="blu"><a href="/xq/xq_fy_list.php?type=mm&xqid=<?php echo $rs["DISID"]; ?>"  target="_blank" ><?php echo $fyAction->getFyCountByDis($rs["DISID"],"出租");?>套出租中</a></span></td>

        </tr>

        <tr>

          <td style="line-height:22px; "> 抢手指数：<span class="blu"><a href="#fyjs_fypj"><?php echo $pjAction->getPjCountByFy($fyid)?>条房源评价</a></span><br />            

            看房记录：<span class="blu"><a href="#fyjs_img_kfjl"><?php echo $dkAction->getDkCountByFy($fyid)?>个客户看过</a></span><br />

            小区成交：<?php echo $cjAction->getXqCjTaoshu($rs["DISID"])?>套&nbsp;<span class="blu"><a href="#cjfy">查看成交价</a></span><br />

        </td></tr>

      </table>

    </div>

    <div id="tit_main_jjr">

      <div id="tit_main_jjr_photo"> <a href="/jjrdp/jjr_dp.php?jjrid=<?php echo $rs["USERID"];?>"><img src="<?php echo ($rs["USERPHOTO"]==""?ZW_JJR:$rs["USERPHOTO"])?>" width="106" height="139" /></a> </div>

      <div id="tit_main_jjr_name"> <a href="/jjrdp/jjr_dp.php?jjrid=<?php echo $rs["USERID"];?>"><?php echo $rs["USERNAME"]?></a> </div>

      <div id="tit_main_jjr_phone"><span class="org"><?php echo $rs["USERTEL"]?></span></div>

      <div id="tit_main_jjr_main"> "我是本房委托代理人，电话咨询时请告知您是从<?php echo $COMPANYNAME;?>看到的" </div>

    </div>

  </div>

  <div id="fyjs_tit">

    <ul>

      <li style="background:#f7ab00; color:#FFF;" class="fy_tit1"><a href="#fyjs_fypj">房源评价</a></li>

      <li class="fy_tit2"><a href="#">房源介绍</a></li>

      <li class="fy_tit2"><a href="#fyjs_img">房源图片</a></li>

      <li class="fy_tit2"><a href="#fyjs_img_kfjl">客户看房记录</a></li>

      <li class="fy_tit2"><a href="#cjfy">小区成交房源</a></li>

      <li class="fy_tit2"><a href="#fyjs_map">地理位置</a></li>

    </ul>

  </div>

      	<div id="fyjs_fypj">

    	

	<ul>

	<?php 

		$fypj = $pjAction->getPjListByFy($fyid);

		while($pjrs = mysql_fetch_array($fypj["result"])){

			

		

	?>

		    	<li>

		       	  <div class="pjbox1">

		            	<div ><img width="90" height="120" src="<?php echo $pjrs["PHOTO"]?>" /></div>

		                <div id="tit_main_jjr_name1"> <?php echo $pjrs["USERNAME"]?> </div>

					 <div id="tit_main_jjr_phone1"><span class="org"><?php echo $pjrs["TEL"]?></span></div>

				 </div>

				<div class="pjbox2">

						<span>

							<strong><?php echo $pjrs["TITLE"]?></strong></span>

						<span class="pjnr">

							<?php echo $pjrs["CONTENT"]?>

						</span>

						<span class="pjtime"><?php echo $pjrs["MOD_DATE"] ?> 更新</span>

				</div>

			 </li>

     	<?php }?>

    	</ul>

    <?php //echo $fypj["pagebar"]?>

  </div>

  <div class="ckqb">

  	<a href="#" >共有<?php echo $fypj["rows"]?>条房源评价，点击查看全部</a> 

  </div>

  

  

  <div id="fyjs_main">

	  <div id="fyjs_img_tit"> 房源介绍</div>

	  <?php echo $rs["MEMO"]?>

  </div>

  <div id="fyjs_img">

    <div id="fyjs_img_tit"> 房源图片 </div>

    <div id="fyjs_img_div">

    <?php 

    $photos=getPicsWithAll($rs["PHOTO"],$rs["FXT"]);

    foreach ($photos as $p){

		if($p!=""){

			echo "<div class='fy_img_box1'> <img src='".($p==""?ZW_FY_B:$p)."' width='422' height='301' /> </div>";

		}

    	

    }

    ?>

    </div>

  </div>

  <div id="fyjs_img_kfjl">

    <div id="fyjs_img_tit"> 客户看房记录 </div>

      <?php 

	  $yewu="求租";

	  $kffyid=$fyid;

	  include_once 'fy_daikan.php';

	  ?>

  </div>

  <div id="cjfy">

    

     <div id="fyjs_img_tit"> 小区成交房源 </div>

    <div id="cjfy_main" >

      <div><span style="font-size:14px;"><?php echo $rs["DISNAME"]?><?php echo date("m",time());?>月二手房成交<span class="org"><?php echo $cjAction->getXqCjTaoshu_OneMonth($rs["DISID"],"租赁")?></span>套，成交均价<span class="org"><?php echo round($cjAction->getXqCjJunjia_CurMonth($rs["DISID"],"租赁"),0)?></span>元/月/套，环比上月<span class="org"><?php 

      $lastMonth =$cjAction->getXqCjJunjia_LastMonth($rs["DISID"]);

      $curMonth = $cjAction->getXqCjJunjia_CurMonth($rs["DISID"]);

	  $hb = 0;

      if($lastMonth!=""&&$curMonth!=""){

      	$hb = getXqHuanBiPer($lastMonth,$curMonth);

      }

	  $hb=abs(round($hb,2));

      if($hb>0){

      	echo "↑";

      }else if($hb<0){

      	echo "↓";

      }

      echo $hb."%";

      ?></spa></span></div>

      <div id="cjfy_main_box1" >

		  <iframe src="xq/xq_cj_chart.php?xqid=<?php echo $rs["DISID"]?>&type=mm" name="map" id="map" width="1003px" height="300px" frameborder=0 scrolling=no marginheight=0 marginwidth=0></iframe>

	 

	  </div>

    </div>

  </div>

  <?php 

  $disid=$rs["DISID"];

  $fytype="租赁";

  include_once 'fy_cj.php';

  ?>  

  <div id="fyjs_map">

    <div id="fyjs_img_tit"> 地理位置 </div>

    <div><!-- <img src="images/map1.jpg" width="1003" height="251" /> -->

    	<iframe src="xq/xq_map_detail.php?xqid=<?php echo $rs["DISID"]?>&overlay=marker" id="map" name="map" width="1003px" height="251px" frameborder=0 scrolling=no marginheight=0 marginwidth=0></iframe>

    </div>

  </div>

  <div id="fyjs_xsfy">

    <div id="fyjs_xsfy_tit">

      <div id="fyjs_xsfy_tit_txt"><?php echo $rs["DISNAME"]?> 相似房源</div>

    </div>

    <div id="fyjs_xsfy_main">

      <div class="rollBox">

        <div style="float:left; padding-top:70px;"> <img onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()"  class="img1" src="images/pre.jpg" width="30" height="45" /></div>

        <div class="Cont" style="float:left;" id="ISL_Cont">

          <div class="ScrCont">

            <div id="List1"> 

              <!-- 图片列表 begin -->

              <?php 

              $result=$fyAction->getSimilarFy($fyid, 5,"出租");

              while($rsxs=mysql_fetch_array($result["result"])){

              ?>

              <div id="fyjs_xsfy_main_box1"> <a href="/zlfy_detail.php?id=<?php echo $rsxs["ID"]?>" target="_blank"><img src="<?php echo getPicWithFirst($rsxs["PHOTO"], $rsxs["FXT"], ZW_FY_L)?>" width="172" height="127" /> <br />

                <span class="org"><?php echo numberFormatBySelf($rsxs["PRICE"])?></span>万 <?php echo numberFormatBySelf($rsxs["BUILD_AREA"])?>平 | <?php $rsxs["H_SHI"]?>室 | <?php echo $rsxs["DIRECTION"]?>

                <br /> <?php echo $rsxs["TITLE"];?></a></div>

                 <?php }?>

              <!-- 图片列表 end --> 

            </div>

            <div id="List2"></div>

          </div>

        </div>

        <div style="float:left; padding-top:70px;"> <img  onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()"  class="img2" src="images/next.jpg" width="30" height="45" /></div>

      </div>

    </div>

  </div>

</div>

<?php include_once 'tail.php';?>