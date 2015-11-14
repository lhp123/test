<?php
//ini_set('display_errors', true);
global $city_path;
$city_path = "";
global $webpath;
$webpath= $_SERVER["DOCUMENT_ROOT"].(strrpos($_SERVER["DOCUMENT_ROOT"],"/")==(strlen($_SERVER["DOCUMENT_ROOT"])-1)?"":"/").$city_path;

$adminpath = "/admin/";

include_once $webpath.'include/db/config.php';
include_once $webpath.'include/db/DBCON.php';
include_once $webpath.'include/Util.php';
include_once $webpath.'include/Filter.php';
?>