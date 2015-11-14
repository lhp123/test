<?php 
$pos="小区";
$posd="详细";

?>
<?php include_once '../head.php';?>
<?php 
include_once '../action/XqAction.php';
include_once '../action/CjAction.php';
include_once '../action/FyAction.php';
include_once '../action/JjrAction.php';
include_once '../action/DkAction.php';
?>
<?php 
$id = filterParaAllByName("xqid");
$fyAction=new FyAction($conn,$CID);
$cjAction=new CjAction($conn,$CID);
$xqAction=new XqAction($conn,$CID);
$jjrAction=new JjrAction($conn,$CID);
$DkAction=new DkAction($conn,$CID);
$rs=$xqAction->XqDetail($id);
?>

<div id="center">
<?php
$menu = "小区概况"; 
$xq_re1=$rs["PPNAME"];
$xq_re2=$rs["PNAME"];
$xq_disname=$rs["NAME"];
$xq_id=$rs["ID"];
$xq_address=$rs["ADDRESS"];
include_once 'xq_menu.php';
?>
  <div id="tit_main">
  	<div id="tit_main_img">
    <?php 
    $DPhotoAlt=$rs["TITLE"]==""?$rs["PPNAME"].$rs["PNAME"].$rs["NAME"]:$rs["TITLE"];
    $DPhotos=getPicsWithAll($rs["SJT"],$rs["BWT"]);
    //var_dump($DPhotos);
    include_once '../fy_img_scroll_detail.php';
    ?>
    </div>
    <div id="tit_main_tex">
    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td style="line-height:22px; padding-bottom:20px;">
                	售价：<span class="org" style="font-size:16px; font-weight:bold;"><?php echo numberFormatBySelf($rs["JUNJIA"])?>元</span>/平米 <span style="margin-left:10px; font-size:12px;" class="org">2.03%↑</span><br />
                	出售：<span class="blu" style="font-size:14px;"><strong><?php echo getFyCountByDistrict($rs["ID"],"出售",$CID,$conn)?></strong></span>套 &nbsp;&nbsp;
                	出租：<span class="blu" style="font-size:14px;"><strong><?php echo getFyCountByDistrict($rs["ID"],"出租",$CID,$conn)?></strong></span>套
                </td>
            </tr>
            <tr>
           	  <td style="line-height:22px; padding-bottom:20px;">
	           	  房屋类型:<?php echo $rs["YT"]?><br />
	           	  建筑类型:<?php echo  str_replace(",",";",$rs["JG"])?><br />
	           	  建成年代:<?php echo substr($rs["ND"],0,4)?><br />
	           	  物 业 费:<?php echo $rs["WYF"]?>元/平米<br />
	           	  物业公司：<?php echo $rs["WYGS"]?><br />
	           	  开 发 商：<?php echo $rs["KFS"]?>
           	   </td>
            </tr>
            <tr>
           	  <td style="line-height:22px; padding-bottom:20px; ">
                	楼栋总数：<?php echo $rs["LDZS"]?>栋&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 容积率：<?php echo $rs["RJL"]?><br />
                    房屋总数：<?php echo $rs["FWZS"]?>户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 绿化率：<?php echo $rs["LHL"]?>%
              </td>
            </tr>
              <tr>
           	  <td style="line-height:22px; ">
                	成交量：<span class="blu"><?php echo $cjAction->getXqCjTaoshu($id,30)?></span>套<span style="color:#999;">（近30天成交）</span>
              </td>
            </tr>
        </table>
    </div>
    
	<iframe src="xq_map_detail.php?xqid=<?php echo $rs["ID"]?>&overlay=custom" name="xq_map" width="382px" height="310px" frameborder=0 scrolling=no marginheight=0 marginwidth=0></iframe>
  <!--  -->

  </div>


<div class="xq_detail">

    <dl class="clearfix">
        <dd class="one">小区信息：</dd>
        <dd class="two two_h" id="j_xq_detail_g">
        	<?php echo $rs["JQ"]!=""?"<a href='javascript:void(0);' class='blue' title='".$rs["JQ"]."' >".$rs["JQ"]."</a>":"" ?> <!-- 几期 -->
        	<?php echo $rs["XQ_AREA"]>0?"<a href='javascript:void(0);' class='blue'  title='小区面积".$rs["XQ_AREA"]."平米' >小区面积".$rs["XQ_AREA"]."平米</a>":"" ?> <!-- 几期 -->
            <?php echo $rs["LX"]!=""?"<a href='javascript:void(0);' class='blue'  title='".$rs["LX"]."' >".$rs["LX"]."</a>":"" ?> <!-- 楼型 -->
            <?php echo $rs["ZX"]!=""?"<a href='javascript:void(0);' class='blue'  title='".$rs["ZX"]."' >".$rs["ZX"]."</a>":"" ?> <!-- 房屋属性 -->
            <?php echo $rs["XZ"]!=""?"<a href='javascript:void(0);' class='blue'  title='".$rs["XZ"]."' >".$rs["XZ"]."</a>":"" ?> <!-- 装修情况 -->
            <?php echo $rs["HXTD"]!=""?"<a href='javascript:void(0);' class='blue'  title='【户型特点】".$rs["HXTD"]."' >【户型特点】".$rs["HXTD"]."</a>":"" ?>
            <?php echo $rs["DCF"]!=""?"<a href='javascript:void(0);' class='blue'  title='停车费".$rs["DCF"]."' >停车费".$rs["DCF"]."</a>":"" ?>
            <?php echo $rs["RQF"]!=""?"<a href='javascript:void(0);' class='blue'  title='燃气费".$rs["RQF"]."' >燃气费".$rs["RQF"]."</a>":"" ?>
            <?php echo $rs["WXF"]!=""?"<a href='javascript:void(0);' class='blue'  title='卫星费".$rs["WXF"]."' >卫星费".$rs["WXF"]."</a>":"" ?>
            <?php echo $rs["SF"]!=""?"<a href='javascript:void(0);' class='blue'  title='水费".$rs["SF"]."' >水费".$rs["SF"]."</a>":"" ?>
            <?php echo $rs["HSF"]!=""?"<a href='javascript:void(0);' class='blue'  title='会所费".$rs["HSF"]."' >会所费".$rs["HSF"]."</a>":"" ?>
            <?php echo $rs["GNF"]!=""?"<a href='javascript:void(0);' class='blue'  title='供暖费".$rs["GNF"]."' >供暖费".$rs["GNF"]."</a>":"" ?>
            <?php echo $rs["KDF"]!=""?"<a href='javascript:void(0);' class='blue'  title='宽带费".$rs["KDF"]."' >宽带费".$rs["KDF"]."</a>":"" ?>
            <?php echo $rs["CWSL"]>0?"<a href='javascript:void(0);' class='blue'  title='【车位数量】".$rs["CWSL"]."个' >【车位数量】".$rs["CWSL"]."个</a>":"" ?>
            <?php echo $rs["BZJZ"]!=""?"<a href='javascript:void(0);' class='blue'  title='【标志建筑】".$rs["BZJZ"]."' >【标志建筑】".$rs["BZJZ"]."</a>":"" ?>
        </dd>
        <dd class="three">
            <a href="javascript:void(0);" title="点击查看更多" >
                <img src="/images/xq_detail_ico1.jpg">
            </a>
        </dd>
    </dl>
    <dl class="clearfix">
        <dd class="one">配套信息：</dd>
        <dd class="two two_h" id="j_xq_detail_b">
            <?php echo $rs["JT"]!=""?"<a href='javascript:void(0);' class='blue' title='【附近公交】".$rs["JT"]."' >【附近公交】".$rs["JT"]."</a>":"" ?>
            <?php echo $rs["XX"]!=""?"<a href='javascript:void(0);' class='blue' title='【附近学校】".$rs["XX"]."' >【附近学校】".$rs["XX"]."</a>":"" ?>            
            <?php echo $rs["YH"]!=""?"<a href='javascript:void(0);' class='blue' title='【附近银行】".$rs["YH"]."' >【附近银行】".$rs["YH"]."</a>":"" ?>  
            <?php echo $rs["SC"]!=""?"<a href='javascript:void(0);' class='blue' title='【附近商场】".$rs["SC"]."' >【附近商场】".$rs["SC"]."</a>":"" ?>          
            <?php echo $rs["YY"]!=""?"<a href='javascript:void(0);' class='blue' title='【附近医院】".$rs["YY"]."' >【附近医院】".$rs["YY"]."</a>":"" ?>
            <?php echo $rs["QT"]!=""?"<a href='javascript:void(0);' class='blue' title='【其他配套】".$rs["QT"]."' >【其他配套】".$rs["QT"]."</a>":"" ?>
            <?php echo $rs["JZHJ"]!=""?"<a href='javascript:void(0);' class='blue' title='【居住环境】".$rs["JZHJ"]."' >【居住环境】".$rs["JZHJ"]."</a>":"" ?>
            <?php echo $rs["DDYS"]!=""?"<a href='javascript:void(0);' class='blue' title='【地段优势】".$rs["DDYS"]."' >【地段优势】".$rs["DDYS"]."</a>":"" ?>
            <?php echo $rs["TZHB"]!=""?"<a href='javascript:void(0);' class='blue' title='【投资回报】".$rs["TZHB"]."' >【投资回报】".$rs["TZHB"]."</a>":"" ?>
            <?php echo $rs["SZKJ"]!=""?"<a href='javascript:void(0);' class='blue' title='【升值空间】".$rs["SZKJ"]."' >【升值空间】".$rs["SZKJ"]."</a>":"" ?>
            <?php echo $rs["QTYS"]!=""?"<a href='javascript:void(0);' class='blue' title='【其他优势】".$rs["QTYS"]."' >【其他优势】".$rs["QTYS"]."</a>":"" ?>
        </dd>
        <dd class="three">
            <a href="javascript:void(0);" title="点击查看更多">
                <img src="/images/xq_detail_ico1.jpg"></a>
        </dd>
    </dl>
    <dl class="clearfix">
        <dd class="one">小区介绍：</dd>
        <dd class="two two_h" id="j_xq_detail_b">
            <a href="javascript:void(0);" class="gray"  > <?php echo $rs["DESCRIPTION"] ?></a>
        </dd>
        <dd class="three">
            <a href="javascript:void(0);" title="点击查看更多">
                <img src="/images/xq_detail_ico1.jpg"></a>
        </dd>
    </dl>
</div>



<script type="text/javascript">
$(document).ready(function (){
	 $(".container").each(function (){
			$(this).roll({
	       	 pre       : ".prev",
	         next      : ".next",
	        });
		});
});
</script>
<div id="fyjs_xsfy">
   	  <div id="fyjs_xsfy_tit">
      	<div id="fyjs_xsfy_tit_txt"><?php echo $rs["NAME"]?>优质房源推荐</div>
      </div>
        <div id="fyjs_xsfy_main">

        	<div class="rollBox">
            
            <div style="float:left; padding-top:70px;">
                    <img  class="img1 prev " src="/images/pre.jpg" width="30" height="45" /></div>
     <div class="Cont container" style="float:left;position:relative;" >

       <div id="List1"  style="position:absolute;" class="box">
        <!-- 图片列表 begin -->
        <?php 
            $resultfy=$fyAction->getFyByDis(6,$id,"出售",true);
            while ($rsfy = mysql_fetch_array($resultfy["result"])){
        ?>
         <div id="fyjs_xsfy_main_box1">
       	  <a href="/mmfy_detail.php?id=<?php echo $rsfy["ID"]?>"><img src="<?php $photo = explode(";",$rsfy["PHOTO"]); echo $photo[0];?>" width="172" height="127" /></a> <br />
          <a href="/mmfy_detail.php?id=<?php echo $rsfy["ID"]?>"><span class="org"><?php echo getPrice($rsfy["PRICE"],$rsfy["TYPE"])?></span><?php echo round($rsfy["BUILD_AREA"],0)?>平|<?php echo $rsfy["H_SHI"]?>室|<?php echo $rsfy["DIRECTION"]?></a><br /><?php echo cut_str($rsfy["TITLE"],15)?>
          </div>
          <?php }?>
        <!-- 图片列表 end -->

     
      </div>
     </div>
<div style="float:left; padding-top:70px;">
<img    class="img2 next " src="/images/next.jpg" width="30" height="45" /></div>
    </div>
 

        </div>

  </div>
  <div id="fyjs_xsfy">
   	  <div id="fyjs_xsfy_tit">
      	<div id="fyjs_xsfy_tit_txt">本小区服务经纪人</div>
      </div>
        <div id="fyjs_xsfy_main">

        	<div class="rollBox">
            <div style="float:left; padding-top:90px;"><img  class="img1 prev" src="/images/pre.jpg" width="30" height="45" /></div>
     <div class="Cont container" style="float:left;position:relative;" >

       <div  style="position:absolute;" class="box">
        <!-- 图片列表 begin -->
        <?php 
        $resultjjr=$jjrAction->getJjrByXq(10, $id);
        while ($rsjjr = mysql_fetch_array($resultjjr["result"])){
        ?>
         <div id="fyjs_xsfy_main_box2">
       	  	<table width="100%" height="175" border="0" cellpadding="0" cellspacing="0" >
            	<tr>
                	<td valign="top" align="center" style="position:relative;">
                    <a href="/jjrdp/jjr_dp.php?jjrid=<?php echo $rsjjr["ID"]?>">
               	    <img src="<?php echo $rsjjr["PHOTO"]?>" width="100" height="130" /></a> 
               	    <span class="xqjjr"><a href="/jjrdp/jjr_dp.php?jjrid=<?php echo $rsjjr["ID"]?>"><?php echo $rsjjr["USERNAME"]?></a></span> 
               	    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center" valign="">
                    	带看：<span class="org"><?php echo $DkAction->getDkJjrCountByFy($rsjjr["ID"])==""?0:$DkAction->getDkJjrCountByFy($rsjjr["ID"]);?></span>&nbsp;待售：<span class="org"><?php echo getSameUserCount($conn,$CID,$rsjjr["ID"],"出售")?></span>套
               	    </td>
                </tr>
                 <tr>
                    <td colspan="2" valign="bottom" align="center" style="background:url(/images/phone2.jpg) no-repeat; padding-left:20px;">
                    	<span class="org" style="padding:0px;"><?php echo $rsjjr["TEL"]?></span>
               	    </td>
                </tr>
            </table> 
         </div>
          <?php }?>
        <!-- 图片列表 end -->
       </div>
      
 
     </div>
<div style="float:left; padding-top:90px;">
<img  class="img2 next" src="/images/next.jpg" width="30" height="45" /></div>
    </div>
 

        </div>

  </div>
  
  <div id="fyjs_img">
  <a id="photo"></a>
  	<div id="fyjs_img_tit">
    	小区图片
    </div>
    <div id="fyjs_img_div">
    	
      <?php
      if($rs["SJT"]!="") {
            foreach(explode(";",$rs["SJT"]) AS $photo){
            
                echo "<div class='fy_img_box1'> <img src='".$photo."' width='422' height='301' /> </div>";
            
            }
      }
     
      if($rs["BWT"]!=""){
           echo "<div class='fy_img_box1'> <img src='".$rs["BWT"]."' width='422' height='301' /> </div>";     
        }
        ?>
       
     
        
    </div>

<div id="cjfy">
    <a id="jgzs"></a>
	<div id="fyjs_img_tit">
    		小区成交行情
   	</div>
     <div id="cjfy_main">
    	 <div id="cjfy_main" >
	      <div><span style="font-size:14px;"><?php echo $rs["NAME"]?><?php echo date("m",time());?>月二手房成交<span class="org"><?php echo $cjAction->getXqCjTaoshu_CurMonth($rs["ID"],"买卖")?></span>套，成交均价<span class="org"><?php echo $cjAction->getXqCjJunjia_CurMonth($rs["ID"])?></span>元/平米，环比上月<span class="org"><?php 
	      $lastMonth =$cjAction->getXqCjJunjia_LastMonth($rs["ID"]);
	      $curMonth = $cjAction->getXqCjJunjia_CurMonth($rs["ID"]);	      
	      if($lastMonth>0){
	      	$hb = getXqHuanBiPer($lastMonth,$curMonth);
	      }
	      if($hb>0){
	      	echo "↑".round($hb,2);
	      }else if($hb<0){
	      	echo "↓".round($hb,2);
	      }
	      //echo "↑2.14%";
	      ?></spa></span></div>
	      <div id="cjfy_main_box1" >
			  <iframe src="xq_cj_chart.php?xqid=<?php echo $rs["ID"]?>&type=mm" name="map" id="map" width="1003px" height="310px" frameborder=0 scrolling=no marginheight=0 marginwidth=0></iframe>
		 
		  </div>
    </div>
</div>
    
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
            <td height="32" class="box2_td_bg">数据来源</td>
        </tr>
             <?php 
            $cj_sql = "select f.* ,cj.CJ_PRICE,cj.CJ_DATE,u.USERNAME,u.TEL from FY_CJ cj ,FY f, XT_USER u where cj.FK_USERID = u.ID and f.ID = cj.FK_ID AND cj.IFDELETED = 0 limit 0,5";
           // echo $cj_sql;
            $cj_stmt = mysql_query($cj_sql,$conn);
            while ($cj_rs = mysql_fetch_array($cj_stmt)){
                $photos = explode(";",$cj_rs["PHOTO"]) ;
        ?>
          <tr align="center">
          <td height="70" class="box2_td_bg1"><img src="<?php echo $photos[0] ?>" width="77" height="58" /></td>
          <td valign="middle" height="70" class="box2_td_bg1"><strong><?php echo $cj_rs["H_SHI"] ?></strong>室<strong><?php echo $cj_rs["H_TING"] ?></strong>厅</td>
          <td valign="middle" height="70" class="box2_td_bg1"><strong><?php echo $cj_rs["BUILD_AREA"] ?></strong>平米</td>
          <td valign="middle" height="70" class="box2_td_bg1"><span class="org"><strong><?php echo substr($cj_rs["CJ_DATE"],0,10)?></strong></span></td>
          <td valign="middle" height="70" class="box2_td_bg1"><strong><?php echo $cj_rs["CJ_PRICE"]?></strong>万</td>
          <td valign="middle" height="70" class="box2_td_bg1"><span class="org"><strong><?php echo round(($cj_rs["CJ_PRICE"]*10000)/$cj_rs["BUILD_AREA"]*1000,1)?></strong>元/平米</span></td>
          <td valign="middle" height="70" class="box2_td_bg1"><span class="blu" style="font-size:12px;"><?php echo $cj_rs["USERNAME"]."&nbsp;".$cj_rs["TEL"]?></span></td>
          <td valign="middle" height="70" class="box2_td_bg1"><span style="font-size:12px;">来自系统</span></td>
         </tr>
          <?php }?>
        
      </table>
    </div>
    
    
  </div>
</div>


<?php include_once '../tail.php';?>