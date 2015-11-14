<?php 
$pos = "新闻";
$posd = "详细";
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
<?php include_once 'news_menu.php';?>
<div id="center">
  <div id="fysm"> <span class="blu"><a href="/index.php">首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="news.php">资讯首页</a></span>&nbsp;>&nbsp;<span class="blu"><a href="news_list.php?type=<?php echo $type?>"><?php echo $type?></a></span>
  <?php if($subtype!=""){?>
  &gt;&nbsp;<span class="blu"><a href="news_list.php?type2=<?php echo $subtype?>"><?php echo $subtype?></a></span>&nbsp;
  <?php }?>
  &gt;&nbsp;详细</div>
  
<?php 
if($rs["ID"]==""){
	echo "<div id='jjr_list'>该新闻已被删除！</div>";	
}else{
?>

  <div id="jjr_list">
  	<div class="nrtit"><?php echo $rs["TITLE"]?></div>
    <div class="hui">浏览：<?php echo $rs["NUM"]?> | 更新：<?php echo $rs["INPUT_DATE"]?> 
    <!-- 
    标签：<span class="blu"><a href="#">房产税</a>&nbsp;&nbsp;<a href="#">房产调控</a>
     -->
    </div>
    <div class="xwnr_main">
    	<?php echo filterContents(iconv("GBK","utf-8",$rs["CONTENT"]));?>
    </div>
    
    <div id="zjjjr" style=" margin-left:0px; margin-top:20px;">
  	<div id="zjjjr_tit" style="padding-left:0px;"><span>相关资讯</span></div>
    <div id="zjjjr_main2" class="blu">
    	<ul>
<?php 
$result=$newsAction->getNewsByType(6,$type,"","INPUT_DATE DESC");
while($rs = mysql_fetch_array($result["result"])){
?>
              <li><a href="news_detail.php?id=<?php echo $rs["ID"]?>"><?php echo $rs["TITLE"]?></a></li>
              
<?php }?>             
            </ul>
    </div>
  </div>
  
  </div>  
<?php }?>
  <?php include_once 'news_right.php';?>
</div>

<?php include_once '../tail.php';?>