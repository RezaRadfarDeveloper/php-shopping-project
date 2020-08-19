<?php
ob_start();
session_start();
define('PRIVATE_PATH', dirname(__FILE__));
define('PROJECT_PATH', dirname(PRIVATE_PATH));
define('PUBLIC_PATH', PROJECT_PATH.'/public');
define('SHARED_PATH', PRIVATE_PATH.'/shared');
define('IMAGE_PATH', PUBLIC_PATH.'/img'.'/');
$private_start = strpos($_SERVER['SCRIPT_NAME'],'/private');
$doc_root = substr($_SERVER['SCRIPT_NAME'],0,$private_start);
// define('WWW_ROOT', $doc_root);
define('WWW_ROOT', '/~rezaradfar/php-shopping-project');
require_once('database.php');
require_once(PRIVATE_PATH.'/validation_functions.php');
require_once(PRIVATE_PATH.'/query_functions.php');
require_once(PRIVATE_PATH.'/query_function_product.php');
require_once('auth_functions.php');
?>