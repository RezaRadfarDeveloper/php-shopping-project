<?php

// $user = 'root';
// $password = 'root';
// $db_name = 'php_shopping_project';
// $host = '127.0.0.1';
// $port = '8889';

// $link = mysqli_init();
// $db = mysqli_connect(
   
//    $host,
//    $user,
//    $password,
//    $db_name,
//    $port
// );

define("DB_SERVER", "127.0.0.1");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "php_shopping_project");
define("DB_PORT","8889" );
 $db = db_connection();
 $errors =[];
?> 