<div id="ad2"> 
<?php 
include_once PATH_WEBROOT.'action/PhotoAction.php';
?>
<?
$photoAction=new PhotoAction($conn, $CID);

$ifad=false;
if($pos=="二手房"){
	$photo=$photoAction->showPhotoImage("二手房底部广告位",true);
}
else if($pos=="租房"){
	$photo=$photoAction->showPhotoImage("租房底部广告位",true);
}
else if($pos=="小区"){
	$photo=$photoAction->showPhotoImage("小区底部广告位",true);
}
else if($pos=="首页"){
	$photo=$photoAction->showPhotoImage("首页底部广告位",true);
}
else if($pos=="楼盘代理"){
	$photo=$photoAction->showPhotoImage("楼盘代理底部广告位",true);
}
echo $photo["photohtml"];
$ifad=$photo["ifHasAdv"];

if($ifad){
}else {?>
<!-- 
<img src="/images/wy.jpg" width="1003" height="70" usemap="#Map" border="0" />
<map name="Map" id="Map">
  <area shape="rect" coords="320,3,493,71" href="/wy.php?我要买房" />
  <area shape="rect" coords="494,2,658,68" href="#" />
  <area shape="rect" coords="662,2,826,70" href="#" />
  <area shape="rect" coords="828,4,1001,70" href="#" />
</map>
 -->
<?}?>
</div>