<?php 
$type=filterPara($type);
$subtype=filterPara($subtype);
?>

<div class="left" id="news_right">
  <div id="zjjjr">
  	<?php $photo=$photoAction->showPhotoImage("新闻列表页右侧广告位",true); echo $photo["photohtml"];?>
  	</div>
  <div id="zjjjr">
  	<div id="zjjjr_tit"><span style="margin-left:5px;">您可能还感兴趣的...</span></div>
    <div id="zjjjr_main2">
    	<ul>
<?php 
    $result=$newsAction->getXingquNews(6,$subtype!=""?$type:"");
    while ($rs= mysql_fetch_array($result["result"])){
		$in_type=$rs["TYPE"];
		$in_subtype=$rs["SUBTYPE"];
?>
              <li>[<a href="news_list.php?type=<?php echo $in_type.($in_type!=$in_subtype?("&subtype=".$in_subtype):"")?>"><?php echo $rs["SUBTYPE"]!=""?$rs["SUBTYPE"]:""?></a>]&nbsp;<a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"],12)?></a></li>
              
<?php }?>              
            </ul>
    </div>
  </div>
  
  
  
  
  <div id="zjjjr">
  	<div id="zjjjr_tit"><span style="margin-left:5px;">大家都在关注的...</span></div>
    <div id="zjjjr_main2">
    <?php 
    $result=$newsAction->getGuanzhuNewsType(6);
    while ($rs= mysql_fetch_array($result["result"])){
    ?>
    	<span class="djgz"><a href="news_list.php?type=<?php echo $rs["TYPE"]?>&subtype=<?php echo $rs["SUBTYPE"]?>"><?php echo $rs["SUBTYPE"]?></a></span>
    <?php }?>
    	<ul>
<?php 
    $result=$newsAction->getGuanzhuNews(6);
    while ($rs= mysql_fetch_array($result["result"])){
?>
              <li>[<a href="news_list.php?type=<?php echo $rs["TYPE"]?>"><?php echo $rs["TYPE"]?></a>]&nbsp;<a href="news_detail.php?id=<?php echo $rs["ID"]?>" title="<?php echo $rs["TITLE"];?>"><?php echo cut_str($rs["TITLE"],12)?></a></li>
              
<?php }?>   
            </ul>
    </div>
  </div>
  </div>
