<?php

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>
   <div id="header" class="sections" >
        <a href="main.php" id="exmachina"><img src="img/logo.jpeg" style="height: 60px;"></a>
        <div id="nav">
        <form action="search.php" method='POST'>
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
            
          <?php if(!isset($_SESSION['loggedin'])){?>
            <a href="register.php" class="buttonStyle">Register</a>
            <a href="login.php" class="buttonStyle">Login</a>
            <a href="categories.php" class="buttonStyle">Categories</a>
            <a href="#" class="buttonStyle">Cart 🛒</a>

          <?php } 
          else {?>            
            <a href="#" class="buttonStyle">Categories</a>
            <a href="#" class="buttonStyle">Cart 🛒</a>
            <a href="register.php" class="buttonStyle">My Orders</a>
            <?php if($_SESSION["admin"]==1){?>
            <a href="addproduct.php" class="buttonStyle">Add New Product</a><br>

             <?php }?> 
            <a href="logout.php" class="buttonStyle">Log Out</a><br>

          <?php
           echo $_SESSION["email"];
           } ?>
        </div>
    </div>
    <a href="product.php?category=phone"  class="buttonStyle" name="laptop" >Phones</a><br>
    <a href="product.php?category=computer"  class="buttonStyle" name="laptop" >Computers</a><br>
    <!--<a href="product.php?category=computer"  class="buttonStyle" name="laptop" >Laptops</a>-->

</body>

