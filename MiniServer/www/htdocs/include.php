<?php 
//ini_set('display_errors', true);
// ini_set('display_errors', false);
define("PATH_CITY", "");
define("PATH_WEBROOT", $_SERVER["DOCUMENT_ROOT"].(strpos($_SERVER["DOCUMENT_ROOT"],"/")==strlen($_SERVER["DOCUMENT_ROOT"])?"":"/").PATH_CITY);


include_once PATH_WEBROOT.'include/db/config.php';
include_once PATH_WEBROOT.'include/db/DBCON.php';
include_once PATH_WEBROOT.'include/Filter.php';
include_once PATH_WEBROOT.'include/Util.php';
?>