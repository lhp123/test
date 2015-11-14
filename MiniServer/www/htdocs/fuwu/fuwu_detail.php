<?php
$pos="服务";
$posd="";
?>
<?php include_once '../head.php';?>
<?php 
include_once '../action/NewsAction.php';
$id = filterParaAllByName("id");
$newsAction=new NewsAction($conn, $CID);
$newsAction->addNewsClick($id);
$rs=$newsAction->getNewsDetail($id);
$type = $rs["TYPE"];
$subtype=$rs["SUBTYPE"];
?>

<div id="center">
  <div id="fysm"> <span class="blu"><a href="/index.php">首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="#"><?php echo $type ?></a></span>&nbsp;>&nbsp;<span class="blu"><a href="fuwu_list.php?subtype=<?php echo $subtype?>"><?php echo $subtype?></a></span></div>
  
<?php include_once 'fuwu_left.php';?>
  <div id="jjr_list">
  	<div class="nrtit"><?php echo $rs["TITLE"]?></div>
    <div class="hui">浏览：<?php echo $rs["NUM"]?> | 更新：<?php echo $rs["INPUT_DATE"]?> </div>
    <div class="xwnr_main">
    	<?php echo filterContents(iconv("GBK","utf-8",$rs["CONTENT"]));?>
     </div>
    
  </div>
</div>

<?php include_once '../tail.php';?>
