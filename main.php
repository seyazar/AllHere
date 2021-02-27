<?php
session_start();
require_once "db.php";
$promotion = $db->query("select * from product where product_promotion")->fetchAll(PDO::FETCH_ASSOC) ;

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="deneme.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
    <style type="text/css">
      .slideshow-container{
          width: 500px;
  height: 400px;
  margin: 0 auto;
position: relative;
top: 0px;      }
      .slideshow-container img {margin-top: 0px;}
    </style>
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
    <h2 style="text-align: center; color: #759BA9; font-size:40px; margin-top: 10px;">Promotions of the Month!</h2>

<div class="slideshow-container" >

	<?php
foreach ($promotion as $product) {
	echo "<div class='mySlides fade'>";
	echo "<a href=details.php?id=".$product['product_id']."><img src='img/".$product['product_img']."' style='width:100%'></a>";
//        echo "<img src='img/".$product['product_img']."' style='width:100%'>";
	echo "</div>";
}

	?>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  //var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
 
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 2500); // Change image every 2 seconds
}
</script>

</body>
</html>