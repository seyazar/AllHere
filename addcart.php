<?php
  header("Content-Type: application/json") ;

  session_start() ;
  require_once "db.php" ;
  $stmt = $db->prepare("SELECT * FROM product where product_id = ?") ;
  $stmt->execute([$_GET["id"]]);


 // $stmt->execute([$_GET["id"]]) ;

  if ( !isset($_SESSION["cart"])) $_SESSION["cart"] = [] ;
  array_push($_SESSION["cart"], $stmt->fetch()) ;
   header("Location: cart.php?id={$_GET['id']}") ;
  
 // echo json_encode([ "result" => "success"]) ;