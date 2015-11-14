<?php 
$pos = "新闻";
$posd = "列表";
?>
<?php include_once '../head.php';?>
<?php 
include_once '../action/NewsAction.php';
$newsAction=new NewsAction($conn, $CID);
$type=filterParaByName("type");
$subtype=filterParaByName("subtype");
?>
<?php include_once 'news_menu.php';?>


<div id="center">
  <div id="fysm"> 
      <span class="blu"><a href="/index.php">首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="news.php">资讯首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="news_list.php?type=<?php echo $type?>"><?php echo $type?></a></span>
     <?php
         if($subtype!=""){
             echo "&gt;&nbsp;<span class='blu'><a href='news_list.php?type=".$type."&subtype=".$subtype."'>".$subtype."</a></span>";
         }
     ?>
  </div>
  <div id="jjr_list">
  <div id="news_main"> 
  <?php 
  if($type!="") {
		$row=0;
		$typeinfo=$newsAction->getSubtypeByType($type);
		$totalrows=$typeinfo["rows"];
		$stmt=$typeinfo["result"];
		while ($type_rs = mysql_fetch_array($stmt)){
			$row++;
			if($row==1)
				echo "<div class='news_list'><span class='news_list_sp1'>".$type."</span><br /><br />";
            echo "<span class='".($subtype==$type_rs[0]?"a1":"news_list_sp2")."'><a href='news_list.php?type=".$type."&subtype=".$type_rs[0]."'>".$type_rs[0]."(".$newsAction->getNewscountByType($type,$type_rs[0]).")</a></span>";
            if($row%5==0) echo "<br/>";
            if($row==$totalrows)
            	echo "</div>";            
        }
  }
  ?>  
  <?php  	  
      $result=$newsAction->getNewsList();
      while($rs = mysql_fetch_array($result["result"])){
  ?>
  	<div id="news_main_div" class="changeColor">
    	<span class="blu ft"><a href="news_detail.php?id=<?php echo $rs["ID"]?>"><?php echo $rs["TITLE"]?></a></span>
        <p><?php echo cut_str(iconv("GBK","utf-8",filterContents(strip_tags($rs["CONTENT"]))),150)?><span class="blu"><a href="news_detail.php?id=<?php echo $rs["ID"]?>">[详情]</a></span></p>
        <span class="hui"><?php echo $rs["INPUT_DATE"]?></span>
    </div>
    
<?php }?>

<?php echo $result["pagebar"];?>
 
  </div>
  </div>  
  
<?php include_once 'news_right.php';?>
  </div>


<?php include_once '../tail.php';?>