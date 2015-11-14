<?php
include_once 'include.php';
if($pos=="首页"){
	include_once(PATH_WEBROOT.'INHEAD/'.INDEX_HEAD_STYLE.'.php');
}
if($pos=="经纪人店铺"||$pos=="二手房"||$pos=="租房"||$pos=="小区"||$pos=="新闻"||$pos=="对比"||$pos=="楼盘代理"){
	include_once(PATH_WEBROOT.'INHEAD/fy_head.php');
}
if($pos=="经纪人"||$pos=="关于我们"||$pos=="招聘"||$pos=="服务"||$pos=="客户需求"){
	include_once(PATH_WEBROOT.'INHEAD/qy_head.php');
}

?>
