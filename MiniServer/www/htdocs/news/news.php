<?php 
$pos = "新闻";
$posd = "首页";
?>
<?php include_once '../head.php';?>
<?php include_once 'news_menu.php';?>
<?php 
include_once PATH_WEBROOT.'action/NewsAction.php';
include_once PATH_WEBROOT.'action/CjAction.php';
include_once PATH_WEBROOT.'action/FyAction.php';
include_once PATH_WEBROOT.'action/PhotoAction.php';
$newsAction=new NewsAction($conn, $CID);
$cjAction=new CjAction($conn, $CID);
$fyAction=new FyAction($conn, $CID);
$photoAction=new PhotoAction($conn, $CID);
?>
<div id="center">
  <div id="hot_news">
  	<div id="hot_news_left">  	    
   	  <?php
   	  $i=1;
   	  $result=$newsAction->getNewsByType(9,"行业动态","","TABORDER_NEWSINDEX asc");
   	  while($rs=mysql_fetch_array($result["result"])){
   	  ?>   	  
   	  <?php if($i%3==1){?>
   	  	<div id="hot_news_left_box">
      	<span class="tit1"><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"], 17);?></a></span><br />
      <?php }if($i%3==2){?>
        <span class="tit2">
        <a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"], 22);?></a>
        <br />
      <?php }if($i%3==0){?>
        <a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"], 22);?></a>
        </span>   
	  <?php }if($i==mysql_num_rows($result["result"])||$i%3==0){
		echo "</div>";
	  }
	  	$i++;
		}?>
	    
    </div>
    
    <div id="hot_news_right">
    	<div class="wrapper top-main clearfix" style="position:relative;">
    	<?php 
    	$result=$newsAction->getNewsByType(6,"","焦点话题","TABORDER_NEWSINDEX asc"," IMAGE_PATH <> ''");
    	?>    	
		<div id="apDiv1"> 
			<ul id="smallSlideUl" class="info-btn clearfix">
					<li class="info-cur" id="mypic0" sid="0"><span>1</span></li>
					<?php 			
					for ($i = 1 ; $i <$result["rows"];$i++ ){
					    echo "<li id='mypic".$i."' sid='".$i."'><span>".($i+1)."</span></li>";
					}
					?>			
				</ul>
		</div>
	<div class="main tab mt15">
		<!--切换图片-->
		<div class="slide">
			<ul id="bigSlideUl" class="slide-ul clearfix">
<?php 
		while($rs=mysql_fetch_array($result["result"])){
        	$photo = $rs["IMAGE_PATH"]!=""?$rs["IMAGE_PATH"]:"/images/39.png";
?>				
				<li>
                <table border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td width="380">
                        	<img src="<?php echo $photo?>" width="380" height="270" />
                        </td>
                      <td valign="top" width="350" style="padding-left:30px; padding-top:20px; padding-right:20px;">
                        	<span class="tex16" style="font-size:16px; font-family:'微软雅黑'; line-height:30px;"><a href="news_detail.php?id=<?php echo $rs["ID"]?>">焦点话题</a></span><br />
                            <span class="tex14" style="font-size:14px; font-family:'微软雅黑'; line-height:40px;"><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"], 14)?></a></span><br />
                            <span style="font-size:12px; line-height:22px; color:#9b9b9b;"><a href="news_detail.php?id=<?php echo $rs["ID"]?>"><?php echo cut_str(iconv("GBK","utf-8",strip_tags($rs["CONTENT"])),76)?></a></span>
                      </td>
                    </tr>
                </table>
                	
			  </li>
<?php }?>
               
			</ul>
		</div>
        </div>
		<!--slide 切换按钮-->

</div>
<script type="text/javascript" src="/js/zsucai.js"></script>
    </div>
  </div>
  
  <div id="new_box">
  	<div id="new_box_left">
   	  <div class="new_box_text">
      	<span style="float:left;">连线VIP</span><span class="more" style="float:right;"><a href="news_list.php?type=连线VIP" >更多>></a></span>
      </div>
      <div class="new_box_text1">
      	<span style="float:left;">【总监说房】</span>
      </div>
<?php 
$result=$newsAction->getNewsByType(2,"连线VIP","总监说房","TABORDER_NEWSINDEX asc");
while ($rs = mysql_fetch_array($result["result"])){
?>
      <div id="new_box_text2">
      	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td style="padding:12px 0;">
                	<span class="tit3"><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"],20)?></a></span>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom:7px; padding-top:10px;">
                	<span style="color:#9b9b9b;"><?php echo cut_str(strip_tags(iconv("GBK","utf-8",$rs["CONTENT"])),75)?></span><span class="xq"><a href="news_detail.php?id=<?php echo $rs["ID"]?>">[详细]</a></span>
                </td>
            </tr>
            <tr>
                <td align="right">
                	<?php echo $rs["SOURCE"]."&nbsp;".$rs["AUTHOR"]?>
                </td>
            </tr>
            </tr>
        </table>
      </div>
 <?php }?>   
    </div>
    
    
    <div id="new_box_right">
    	<div class="new_box_text">
      	<span style="float:left;">楼市研究</span><span class="more" style="float:right;"><a href="news_list.php?type=楼市研究" >更多>></a></span>
      </div>
      <div class="lsyj_box">
      	<div class="lsyn_tit">
        	楼市动态
        </div>
        <div id="lsyj_box_1">
        	<table width="100%" border="0" cellpadding="0" cellspacing="0">
        	
<?php 
$i=0;
$result=$newsAction->getNewsByType(6,"楼市研究","楼市动态","TABORDER_NEWSINDEX asc");
$rs = mysql_fetch_array($result["result"]);
$photo = $rs["IMAGE_PATH"]!=""?$rs["IMAGE_PATH"]:"/images/img_tj3.jpg";
 ?>
            	<tr>
                	<td width="125">
               	    <img src="<?php echo $photo?>" width="123" height="95" /></td>
                    <td valign="top" style="padding-top:10px; padding-left:5px;">
                    	<span class="tit3"><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"],8)?></a></span><br />
                        <span style="color:#9b9b9b; line-height:20px;"><?php echo cut_str(strip_tags(iconv("GBK","utf-8",$rs["CONTENT"])),35)?></span>
                        <span class="xq"><a href="news_detail.php?id=<?php echo $rs["ID"]?>">[详细]</a></span>
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="rmdt">
          <ul>
<?php 
while ($rs = mysql_fetch_array($result["result"])){
?>
              <li><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"],35)?></a></li>
<?php }?>
          </ul>
        </div>
          <div><?php $photo=$photoAction->showPhotoImage("新闻首页广告位1",true); echo $photo["photohtml"];?></div>
      </div>
      <div class="lsyj_box" style="margin-right:0px;">
      	<div class="lsyn_tit">市场监测</div>
         <div id="lsyj_box_1">
<?php 
$i=0;
$result=$newsAction->getNewsByType(6,"楼市研究","市场监测","TABORDER_NEWSINDEX asc");
$rs = mysql_fetch_array($result["result"]);
$photo = $rs["IMAGE_PATH"]!=""?$rs["IMAGE_PATH"]:"/images/img_tj3.jpg";
?>
        	<table width="100%" border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td width="125">
               	    <img src="<?php echo $photo?>" width="123" height="95" /></td>
                    <td valign="top" style="padding-top:10px; padding-left:5px;">
                    	<span class="tit3"><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"],8)?></a></span><br />
                        <span style="color:#9b9b9b; line-height:20px;"><?php echo cut_str(strip_tags(iconv("GBK","utf-8",$rs["CONTENT"])),35)?></span><span class="xq"><a href="news_detail.php?id=<?php echo $rs["ID"]?>">[详细]</a></span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="rmdt">
          <ul>
<?php 
while ($rs = mysql_fetch_array($result["result"])){
?>
              <li><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"],35)?></a></li>
<?php }?>
          </ul>
        </div>
          <div><?php $photo=$photoAction->showPhotoImage("新闻首页广告位2",true); echo $photo["photohtml"];?></div>
      </div>
    </div>
  </div>


<div id="bd">
	  	<div id="mmbd_tit">
   	  <div id="mmbd_tit_1">买卖宝典</div><span class="more" style="float:right;"><a href="news_list.php?type=买卖宝典" >更多>></a></span>
    </div>
    <div id="bd_main">
   	  <div id="bd_main_box1" style="margin-bottom:20px;">
      	<div class="lsyn_tit1">
        <span style="float:left;">买房准备</span><span class="more" style="float:right;"><a href="news_list.php?type=买卖宝典&subtype=买房准备" >更多>></a></span>	
        </div>
        <div class="mmbd_tex_div">
        	<div class="rmdt">
          <ul>
 <?php 
 	  $result=$newsAction->getNewsByType(5,"买卖宝典","买房准备","TABORDER_NEWSINDEX asc");
      while($rs = mysql_fetch_array($result["result"])){
          ?>      
              <li><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo  cut_str($rs["TITLE"], 19)?></a></li>
    <?php  }   ?>               
          </ul>
        </div>
        </div>
      </div>
      <div id="bd_main_box1">
      	<div class="lsyn_tit1">
        <span style="float:left;">售前技巧</span><span class="more" style="float:right;"><a href="news_list.php?type=买卖宝典&subtype=售前技巧" >更多>></a></span>	
        </div>
        <div class="mmbd_tex_div">
        	<div class="rmdt">
          <ul>
             <?php              
             $result=$newsAction->getNewsByType(5,"买卖宝典","售前技巧","TABORDER_NEWSINDEX asc");
             while($rs = mysql_fetch_array($result["result"])){
          ?> 
              <li><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo  cut_str($rs["TITLE"], 19)?></a></li>
    	<?php  }   ?> 
          </ul>
        </div>
        </div>
      </div>
    </div>
    <div id="bd_main">
    	   	  <div id="bd_main_box1" style="margin-bottom:20px;">
      	<div class="lsyn_tit1">
        <span style="float:left;">看房技巧</span><span class="more" style="float:right;"><a href="news_list.php?type=买卖宝典&subtype=看房技巧" >更多>></a></span>	
        </div>
        <div class="mmbd_tex_div">
        	<div class="rmdt">
          <ul>
             <?php 
             $result=$newsAction->getNewsByType(5,"买卖宝典","看房技巧","TABORDER_NEWSINDEX asc");
             while($rs = mysql_fetch_array($result["result"])){
          ?>
             <li><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo  cut_str($rs["TITLE"], 19)?></a></li>
    <?php  }   ?> 
          </ul>
        </div>
        </div>
      </div>
      <div id="bd_main_box1">
      	<div class="lsyn_tit1">
        <span style="float:left;">委托指导</span><span class="more" style="float:right;"><a href="news_list.php?type=买卖宝典&subtype=委托指导" >更多>></a></span>	
        </div>
        <div class="mmbd_tex_div">
        	<div class="rmdt">
          <ul>
             <?php 
             $result=$newsAction->getNewsByType(5,"买卖宝典","委托指导","TABORDER_NEWSINDEX asc");
             while($rs = mysql_fetch_array($result["result"])){
          ?>      
              <li><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo  cut_str($rs["TITLE"], 19)?></a></li>
    <?php  }   ?> 
          </ul>
        </div>
        </div>
      </div>
    </div>
    <div id="bd_main" style="border-right:none; margin-right:0px;">
    	   	  <div id="bd_main_box1" style="margin-bottom:20px;">
      	<div class="lsyn_tit1">
        <span style="float:left;">风险防范</span><span class="more" style="float:right;"><a href="news_list.php?type=买卖宝典&subtype=风险防范" >更多>></a></span>	
        </div>
        <div class="mmbd_tex_div">
        	<div class="rmdt">
          <ul>
             <?php 
             $result=$newsAction->getNewsByType(5,"买卖宝典","风险防范","TABORDER_NEWSINDEX asc");
             while($rs = mysql_fetch_array($result["result"])){
          ?>
              <li><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo  cut_str($rs["TITLE"], 19)?></a></li>
    <?php  }   ?> 
          </ul>
        </div>
        </div>
      </div>
      <div id="bd_main_box1">
      	<div class="lsyn_tit1">
        <span style="float:left;">定价策略</span><span class="more" style="float:right;"><a href="news_list.php?type=买卖宝典&subtype=定价策略" >更多>></a></span>	
        </div>
        <div class="mmbd_tex_div">
        	<div class="rmdt">
          <ul>
             <?php 
             $result=$newsAction->getNewsByType(5,"买卖宝典","定价策略","TABORDER_NEWSINDEX asc");
             while($rs = mysql_fetch_array($result["result"])){
          ?>
              <li><a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo  cut_str($rs["TITLE"], 19)?></a></li>
    <?php  }   ?> 
          </ul>
        </div>
        </div>
      </div>
    </div>
    
</div>


<div id="mmbd">
  	<div id="mmbd_tit">
   	  <div id="mmbd_tit_1">业主谈小区</div><span class="more" style="float:right;"><a href="news_list.php?type=业主谈小区" >更多>></a></span>
    </div>
    
		<?php 
		$result=$newsAction->getYztxq(6);
		$rs = mysql_fetch_array($result["result"]);
		?>
    <div id="mmbd_box1">
   	  <div id="mmbd_box1_img">
   	  <img src="<?php  echo getPicWithFirst($rs["DPHOTO"], "", ZW_FY_B);?>" width="346" height="258" /> </div>
      <div id="mmbd_box_txt">

      	<div style="height:35px; border-bottom:1px #CCCCCC solid; height:35px;"><span class="tit1"><a href="xqxxy.php?id=<?php echo $rs["DID"]?>">小区—<?php echo $rs["PNAME"]?></a></span></div>
       
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td style="padding:12px 0;">
                	<span class="tit3"><a href="news_detail.php?id=<?php echo $rs["ID"]?>"  title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"], 33)?></a></span>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom:20px; border-bottom:#CCC 1px dashed;">
                	<span style="color:#9b9b9b; line-height:22px;"><?php echo cut_str(strip_tags(iconv("GBK","utf-8",$rs["CONTENT"])),150)?></span><span class="xq"><a href="news_detail.php?id=<?php echo $rs["ID"]?>">[详细]</a></span>
                </td>
        </table> 
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
    	<td width="250" style="padding-top:20px;">本月均价：<strong class="org"><?php echo numberFormatBySelf($rs["JUNJIA"])?></strong>元/平米</td>
        <td style="padding-top:20px;">二手房：<span class="blu"><?php echo getFyCountByDistrict($rs["DID"],"出售",$CID,$conn)?></span>套</td>
    </tr>
    <tr>
    	<td width="250"  style="padding-top:20px;">
        	<table>
            	<tr>
                	<td> 环比上月：</td>
                	<?php 
                	    $HB = getXqHuanBiPer($cjAction->getXqCjJunjia_LastMonth($rs["DID"]),$cjAction->getXqCjJunjia_CurMonth($rs["DID"]));
                	    if($HB=="-"){
                	        echo "<td> <span class='xq'>".$HB."</span></td>";
                	    }elseif($HB > 0){
                	        echo  "<td> <img src='/images/ico_sj.png' width='8' height='12' /></td>";
                	        echo "<td> <span class='xq'>".abs($HB)."%</span></td>";
                	    }else{
                	        echo  "<td> <img src='/images/ico_js.png' width='8' height='12' /></td>";
                	        echo "<td> <span class='xq'>".abs($HB)."%</span></td>";
                	    }
                	?>
                    
                </tr>
            </table>
       </td>
        <td style="padding-top:20px;">租房：<span class="blu"><?php echo getFyCountByDistrict($rs["ID"],"出租",$CID,$conn)?></span>套</td>
    </tr>
    <tr>
    	<td width="250"  colspan="2" style="padding-top:20px;">小区地址：<?php echo $rs["ADDRESS"]?></td>
    </tr>
</table>



      </div>
    </div>

    <div style="position:relative; left:25px; top:-87px; width:336px; height:51px; background:url(/images/img_bgb.png); color:#FFF; padding-left:10px; line-height:51px; font-size:14px;">
    	<?php echo $rs["DISNAME"]?>
    </div>
  </div>
<div id="mmbd_xq">
<?php 
$result=$fyAction->getFyByDis(5,$rs["DID"],"出售");
while($rs = mysql_fetch_array($result["result"])){
?>
	<div id="mmbd_xq_box1">
    <img src="<?php echo getPicWithFirst($rs["PHOTO"], $rs["FXT"], ZW_FY_L);?>" width="172" height="128" /> <br />
   	<a href="xqxxy.php?id=<?php echo $rs["DISID"]?>"><?php echo $rs["DISNAME"]?></a><br />
   	<a href="news_detail.php?id=<?php echo $rs["ID"]?>"><?php echo $rs["TITLE"]?></a></div>
<?php }?>
   
  </div>
  



<div id="bd1">
	  	<div id="mmbd_tit">
   	  <div id="mmbd_tit_1">交易工具</div><span class="more" style="float:right;"><a href="/fuwu/fuwu.php" ><img src="/images/gfjs.png" width="134" height="26" /></a></span>
    </div>
    <div id="bd_main1">
   	  <div id="bd_main_box1" style="margin-bottom:20px;">
      	<div class="lsyn_tit1">
        <span style="float:left;">买房合同下载</span><span class="more" style="float:right;"><a href="/fuwu/fuwu_list.php?type=交易工具&subtype=买房合同下载" >更多>></a></span>	
        </div>
        <div class="mmbd_tex_div">
        	<div class="rmdt">
          <ul>
         <?php 
         $result=$newsAction->getNewsByType(5,"交易工具","买房合同");
         while($rs = mysql_fetch_array($result["result"])){
          ?>          
      
              <li><a href="/fuwu/fuwu_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo  cut_str($rs["TITLE"],18)?></a></li>
    <?php  }   ?>   
          </ul>
        </div>
        </div>
      </div>
      
    </div>
    <div id="bd_main1">
    	   	  <div id="bd_main_box1" style="margin-bottom:20px;">
      	<div class="lsyn_tit1">
        <span style="float:left;">租房合同下载</span><span class="more" style="float:right;"><a href="/fuwu/fuwu_list.php?type=交易工具&subtype=租房合同下载" >更多>></a></span>	
        </div>
        <div class="mmbd_tex_div">
        	<div class="rmdt">
          <ul>
         <?php 
         $result=$newsAction->getNewsByType(5,"交易工具","租房合同");
         while($rs = mysql_fetch_array($result["result"])){
          ?>      
              <li><a href="/fuwu/fuwu_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo  cut_str($rs["TITLE"],18)?></a></li>
    <?php  }   ?>   
          </ul>
        </div>
        </div>
      </div>
      
    </div>
    <div id="bd_main1" style="border-right:none; margin-right:0px;">
    	   	  <div id="bd_main_box1" style="margin-bottom:20px;">
      	<div class="lsyn_tit1">
        <span style="float:left;">看房清单下载</span><span class="more" style="float:right;"><a href="/fuwu/fuwu_list.php?type=交易工具&subtype=看房清单下载" >更多>></a></span>	
        </div>
        <div class="mmbd_tex_div">
        	<div class="rmdt">
          <ul>
         <?php 
         $result=$newsAction->getNewsByType(5,"交易工具","看房清单");
         while($rs = mysql_fetch_array($result["result"])){
          ?> 
              <li><a href="/fuwu/fuwu_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo  cut_str($rs["TITLE"],18)?></a></li>
    <?php  }   ?>   
          </ul>
        </div>
        </div>
      </div>
      
    </div>
    
</div>

</div>   
  
</div>


<?php include_once '../tail.php';?>