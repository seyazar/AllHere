<?php
session_start();
extract($_GET);
//var_dump($_GET);

?>

<!DOCTYPE html>
<html>
<head>
  
        <script src="jquery-3.4.1.min.js"></script>
            <link rel="stylesheet" href="deneme.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>All Here -Cart</title>   
    <style type="text/css">
      #buybtn{width: 20%;}
    </style> 

</head>
 
<body>
  <div  class="navbox" >
    <div class="navone">
      <ul class="nav_one_ul">
       <li class="nav_one_li"> <a href="main.php" id="logo"><img src="img/logo.jpg" style="height: 160px; width: 160px;"></a></li>
        
        <li class="nav_one_li"><form action="search.php" method='POST' class="searchform">
            <input type="text" placeholder="Search.." name="search" class="searchbox">
            <button type="submit" class="searchbtn"><i class="fa fa-search"></i></button>
        </form></li>
           <li  class="nav_one_li carta"> <a href="cart.php" >Cart 🛒</a></li>
           <?php if(isset($_SESSION['loggedin'])){?>
           <li class="nav_one_li logouta"> <a href="logout.php" class="buttonStyle"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a></li><?php
         }?>
          </ul>
          </div>

          <div class="navtwo">
            <div class="navtwocontainer">
              <nav><ul class="nav_two_ul">
          <?php if(!isset($_SESSION['loggedin'])){?>
            <li class="nav_two_li"><a href="register.php" class="buttonStyle">Register</a></li>
            <li class="nav_two_li"><a href="login.php" class="buttonStyle">Login</a></li>
           <li class="nav_two_li dropdown"> <a href="#" class="buttonStyle" class="dropbtn">Categories</a>
                <div class="dropdown-content">
      <a href="product.php?category=phone">Phones</a>
      <a href="product.php?category=computer">Computers</a>
    
    </div>
           </li>
            

          <?php } 
          else {?>
            
                       <li class="nav_two_li dropdown"> <a href="#" class="buttonStyle" class="dropbtn">Categories</a>
                <div class="dropdown-content">
      <a href="product.php?category=phone">Phones</a>
      <a href="product.php?category=computer">Computers</a>
    
    </div>
           </li>
            <li class="nav_two_li"><a href="orders.php" class="buttonStyle">My Orders</a></li>
            
            <?php if($_SESSION["admin"]==1){ ?>
            <li class="nav_two_li"><a href="addproduct.php" class="buttonStyle">Add Product</a></li>
             <?php }?> 
           

          <?php
           //echo $_SESSION["admin"];
           } ?>
           </ul>
           </nav>
           </div>
       </div>
    </div>      
        <table id='cart'>
            <tr>
                <th colspan='3'>My Shopping Cart</th>
            </tr>
            <?php
                $total = 0;
                if ( isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
                   
                   foreach( $_SESSION["cart"] as $item ) {
                   
                    $total += (int)$item['product_price'] ; 
                    echo "<tr>
                            <td><img src='img/{$item['product_img']}' class='thumbnail' style='width:100px;height:100px;'></td>
                            <td>{$item['product_title']} <br><br><a href='delete.php?id={$item['product_id']}' class='btn btnDelete'>Delete</a></td>
                            <td class='price'><span>{$item['product_price']}</span> TL</td>
                       </tr>" ;
                   }
                   $_SESSION['totalprice']=$total;
                   echo "<tr><td colspan='2'>Total Price</td><td class='total'><span>$total</span> TL</td>" ;
                } else {
                    echo "<tr><td colspan='3'>Empty</td></tr>" ;
            }
            ?>
            
            </tr>    
        </table>
        <?php
  if ( isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
   echo "<a href=buy.php?id=".$id."><button class='submitbtn' id='buybtn'>BUY</button></a>";}
    ?>
    
    
    </body>
</html>