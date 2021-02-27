<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>All Here	-My Orders</title>
	    <link rel="stylesheet" href="deneme.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <div  class="navbox" >
    <div class="navone">
      <ul class="nav_one_ul">
       <li class="nav_one_li"> <a href="main.php" id="logo"><img src="img/logo.jpg" style="height: 160px; width: 160px;"></a></li>
        
        <li class="nav_one_li"><form action="search.php?page=1" method='POST' class="searchform">
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


    <?php
require_once "db.php";

extract($_SESSION);
$orders = $db->query("select * from orders where email LIKE '%$email%'")->fetchAll(PDO::FETCH_ASSOC) ;

echo "<table class='product_list_table'>";
echo "<tr style='background-color: #AEC6CF; color: #686868;'>";

echo "<td> Product ID </td>"; 
echo "<td> Product Price</td>";
echo "<td> Order Date</td>";
echo "<td colspan='3'>Total Amount</td>";
echo "</tr>";

foreach ($orders as $o){
    echo "<tr>";

    echo "<td>{$o['product_id']}</td>";
    echo "<td>{$o['product_price']} TL</td>";
    echo "<td>{$o['order_date']}</td>";
    echo "<td> {$o['order_price']} TL</td>";
    echo "</tr>";
    
}
echo "</table>";
?>

</body>
</html>




