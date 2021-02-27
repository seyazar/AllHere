<?php
  session_start() ;
  header("Content-Type: application/json") ;
  require_once 'db.php';

  if ( isset($_SESSION['cart'])) {
      foreach( $_SESSION['cart'] as $key => $item) {
          if( $item['product_id'] == $_GET['id']) {
              unset($_SESSION['cart'][$key]) ;
              break ;
          }
      }
   }
  // echo json_encode([ "result" => "success"]) ;
  header("Location:cart.php ") ;