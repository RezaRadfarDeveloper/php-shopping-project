<?php
require_once('db_config_guide.php');
function db_connection (){
$connection = mysqli_connect( DB_SERVER, DB_USER, DB_PASS, DB_NAME,DB_PORT);
confirm_db_connect();
return $connection;
}
function db_disconnect($connection){
if(isset($connection)){
mysqli_close($connection);
}
}
function confirm_db_connect(){
if(mysqli_connect_error()){
    $msg = "Failed to connect to database: ";
    $msg .= mysqli_connect_error();
    $msg .= "(".mysqli_connect_errno().")";
    exit($msg);
}
}
function confirm_result_set($result_set){
        if(!$result_set){
        exit("Database Query unsuccessful");
        }
    }

function db_escape($connection,$tring){
     return mysqli_real_escape_string($connection,$tring);
}
?>