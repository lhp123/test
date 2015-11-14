<?php
ob_start();
session_start();
$pos="首页";
include_once('head.php');
include_once(PATH_WEBROOT.'INDEX/'.INDEX_STYLE.'.php');
include_once(PATH_WEBROOT.'tail.php');
?>
