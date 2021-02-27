<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	
	<title></title>
        <!--bura product listin cssi-->
      <link rel="stylesheet" href="deneme.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .pageNo{margin: 0 auto;padding: 15px;}
        .pages{
            text-align: center;
        }
    </style>
       
</head>
<body>
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
<?php
require_once "db.php";
extract($_POST);

$products = $db->query("select * from product where product_title LIKE '%$search%' ")->fetchAll(PDO::FETCH_ASSOC) ;
$currentPage = isset($_GET["page"]) ? $_GET["page"] : 1 ; // $_GET["page"] ?? 1
$startIndex = ($currentPage - 1) * 10 ;
$items = $db->query("select * from product where product_title LIKE '%$search%' limit $startIndex,10")->fetchAll(PDO::FETCH_ASSOC) ;
$pageSize = count($items) ;
$size = $db->query("select count(*)  as num from product where product_title LIKE '%$search%'")->fetch()["num"] ;
$totalPage = ceil( $size / 10 );

    
echo "<table class='product_list_table'>";
    echo "<tr style='background-color: #AEC6CF; color: #686868;'>";
    echo "<th>Image</th>";
    echo "<th>Title</th>";
    echo "<th>Price</th>";
    echo "<th>Rating</th>";
    echo "</tr>";
foreach ($items as $pro) {
    


    echo "<tr>";
    echo "<td>";
    echo "<a href='details.php?id={$pro['product_id']}'> <img src='img/".$pro['product_img']."' style='width:70px; height:80px'> </a> </td>";
//    echo "<img src='img/".$pro['product_img']."' style='width:40px; height:40px'> </a> </td>";
    echo "<td>".$pro['product_title']."</td>";
    echo "<td>".$pro['product_price']."</td>";
    if($pro['product_rate']!=0)
    echo "<td>".$pro['product_rate']."</td>";
else
    echo "<td>Not Rated</td>";
    echo "</tr>";
    
}
echo "</table>";
?>


  <div class='pages'>
    <?php //paging
     for ( $i=1; $i <= $totalPage; $i++) {
         if ( $i == $currentPage) {
           echo "<a class='pageNo active' href='?page=$i&search=".$search."'>$i</a>" ;
        } else {
          echo "<a class='pageNo' href='?page=$i&search=".$search."'>$i</a>" ;
       }
     }
    ?> 
    </div>
</body>

