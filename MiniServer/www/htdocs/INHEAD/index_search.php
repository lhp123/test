<!-- 首页搜索 开始 -->

<?php 

include_once PATH_WEBROOT.'action/FyAction.php';

include_once PATH_WEBROOT.'action/PhotoAction.php';



$fyAction=new FyAction($conn, $CID);

$photoAction=new PhotoAction($conn, $CID);

?>



<div id="center">

<div style="width:100%; height:100%; overflow:hidden;">

<?php $photo=$photoAction->showPhotoImage("首页横幅底图"); echo $photo["photohtml"];?>

</div>

  <div id="banner" style="position:absolute; top:0px; left:50%; margin-left:-500px;">

    <div id="banner_left">

      <div id="banner_left_top">

      <span style=" font-size:15px;">今日新增在售二手房源<span style=" color:#f7ab00; font-size:16px; margin:0 3px;"><?php echo $fyAction->getFyCount_Today()?></span>套&nbsp;&nbsp;|&nbsp;&nbsp;</span>

      <span style="font-size:15px;"><?php echo $CITYNAME?>真实在售二手房源<span style=" color:#f7ab00; font-size:16px; margin:0 3px;"><?php echo $fyAction->getFyCountByDis("","出售")?></span>套</span></div>

      <form id ="indexsearchform" action="mmfy_list.php" method="get" style="margin-top:0px;"> 

      <div id="banner_left_bot">

        <div>

          <ul>

            <li>区域：</li>

		  <?php 

		       $i= 0;

		       $re1 = array();

		       $stmt1 = mysql_query("select * from PZ_RE1 where CID = '".$CID."' and IF_TB = 1",$conn);

		       while($rs1 = mysql_fetch_array($stmt1)){

		            $i++;

		            $re1[$i] = array('name' =>$rs1["NAME"],'i'=>$i );

		            echo "<li><a href='mmfy_list.php?re1=".$rs1["NAME"]."'>".$rs1["NAME"]."</a></li>";

		        }

		       

		   ?>

          </ul>

          <ul stype="bound">

            <li>价格：</li>            

  <?php 

      $stmt = mysql_query("select * from PZ_BOUND where TYPE='价格区间' and CID='".$CID."' order by TABORDER limit 0,7");

      while($rs = mysql_fetch_array($stmt)){

          echo "<li><a href='mmfy_list.php?pricedown=".$rs["DOWN"]."&priceup=".$rs["UP"]."'>".$rs["MEMO"]."</a></li>";

      }

  ?>    

          </ul>

          <ul>

            <li>面积：</li>            

		  <?php 

		      $stmt = mysql_query("select * from PZ_BOUND where TYPE='面积区间' and CID='".$CID."' order by TABORDER limit 0,7");

		      while($rs = mysql_fetch_array($stmt)){

		          echo "<li><a href='mmfy_list.php?areadown=".$rs["DOWN"]."&areaup=".$rs["UP"]."'>".$rs["MEMO"]."</a></li>";

		      }

		  ?>         

          </ul>

          <ul>

            <li>户型：</li>

			<li><a href="mmfy_list.php?shi=1" value="1" >1室</a> </li>

			<li><a href="mmfy_list.php?shi=2" value="2" >2室</a></li>

			<li><a href="mmfy_list.php?shi=3" value="3" >3室</a></li>

			<li><a href="mmfy_list.php?shi=4" value="4" >4室</a></li>

			<li><a href="mmfy_list.php?shi=5" value="5" >5室</a></li>

			<li><a href="mmfy_list.php?shi=6" value="6" >5室以上</a></li>

          </ul>

        </div>

        <div>

          <div style="width:419px; height:43px; background:url(/images/search.png); float:left;">

            <input id="indexmohu" name="mohu" type="text" title="请输入城区，商圈或小区名......" value="" style="width:347px; height:25px; margin-left:6px; margin-top:3px; line-height:23px; color:#666; font-size:14px; font-family:'微软雅黑'; " />

          </div>

          <div style="width:98px; height:43px; background:url(/images/butt.png); float:left;">         

            <input id="indexsearch" name="indexsearch" type="button" value="找二手房" style="background:none; width:85px; border:0; margin-left:10px; height:34px; font-size:14px; color:#FFF; font-family:'微软雅黑';"  />

          </div>

          <div style="float:left; width:127px; height:43px; line-height:43px; padding-left:10px;"><img src="/images/map.png" width="11" height="16" /> <a href="map.php" target="_blank" style=" margin:0 3px;font-size:14px;font-weight:bold;">地图找房</a></div>

        </div>

      </div>

      </form>

    </div>

    <div id="banner_right"> 

	<?php 

    $pinfo=$photoAction->getPhotoInfo("首页横幅底图_上浮图(右)");

    $def_pinfo=$pinfo["SRC"];

    if($def_pinfo==""){$def_pinfo="/images/banner_add.png";}

    ?>  

    <img usemap="#Map" src="<?php echo $def_pinfo;?>" width="<?php echo $pinfo["WIDTH"];?>" height="<?php echo $pinfo["HEIGHT"];?>" /> 

     <?php if($pinfo["SRC"]!=""){?>

      <map name="Map" id="Map">

        <area shape="circle" coords="252,83,30" href="/map.php" />

        <area shape="circle" coords="37,203,27" href="/map.php" />

      </map><br />      

      <span class="map_tel">联系电话：<?php echo $COMTEL;?></span>

      <?php }else{?>

      <?php $photo=$photoAction->showPhotoImage("首页横幅底图_上浮图(右)",true); echo $photo["photohtml"];?>      

      <?php }?>

    </div>

  </div>

  <!-- 首页搜索 结束 -->