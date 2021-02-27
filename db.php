<?php

$dsn = 'mysql:host=localhost;dbname=web256_db;charset=utf8mb4' ;
$user = 'root' ;
$pass = '' ;

try {
    $db = new PDO($dsn, $user, $pass) ;
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
} catch (Exception $ex) {
   echo "DB Connection Error : " .  $ex->getMessage() ;
}
