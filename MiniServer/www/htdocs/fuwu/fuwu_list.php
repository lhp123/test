<?php
$pos="服务";
$posd="列表";
?>
<?php include_once '../head.php';?>
<?php
include_once '../action/NewsAction.php';
$newsAction=new NewsAction($conn, $CID);
$subtype=filterParaByName("subtype");
?>

<div id="center">
  <div id="fysm"> <span class="blu"><a href="/index.php">首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="#">交易工具</a></span>&nbsp;>&nbsp;<span class="blu"><a href="?subtype=<?php echo $subtype?>"><?php echo $subtype ?></a></span></div>
  
<?php include_once 'fuwu_left.php';?>
  <div id="jjr_list">
  <div id="jjr_list_titi">
  	<?php echo $subtype ?>
  </div>
  <div id="news_main">
  
  <?php 

  $result=$newsAction->getNewsList();
  while($rs = mysql_fetch_array($result["result"])){

  ?>
  	<div id="news_main_div" class="changeColor">
    	<span class="blu left"><a style="font-size:16px;" href="fuwu_detail.php?id=<?php echo $rs["ID"]?>"><?php echo $rs["TITLE"]?></a></span><span class="hui right"><?php echo $rs["INPUT_DATE"]?></span>
        <span class="left"><?php echo cut_str(iconv("GBK","utf-8",filterContents(strip_tags($rs["CONTENT"]))),100)?><a href="fuwu_detail.php?id=<?php echo $rs["ID"]?>"  class="blu">[详细]</a></span>
    </div>
 <?php }?>
<?php echo $result["pagebar"];?>

  </div>
  </div>
</div>
<?php include_once '../tail.php';?>
