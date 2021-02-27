<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="jquery-3.4.1.min.js"></script>
            <link rel="stylesheet" href="deneme.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title></title>
        <style>
            #container { margin: 30px auto; padding: 10px;}
            td { padding: 15px;}
            .profile { width: 400px; }
            .thumbnail { width: 90px; margin-right: 15px;}
            table { border-collapse: collapse; }
            td:first-child { font-weight: bold;}
            .border { border:2px solid blue; }
            .center { text-align: center;}
            
        </style>
        <script type="text/javascript">
                           $(function() {
            // init
            $(".btnAdd").click(function(e) {
               e.preventDefault();
               var href = $(this).attr("href");
              // console.log(href);
              $.get(href, function(data){
                 console.log(data.result);
                 var count = $(".badge").text() ;
                 count++;
                 $(".badge").text(count);
              }) ;
            });
         }) ;
        </script>
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
         session_start();
         $admin=$_SESSION['admin'];
        require_once 'db.php';
        $id = $_GET["id"] ;
        //$photo_index = isset( $_GET["photo"]) ? $_GET["photo"] : 0 ;
        extract($_POST);
            if(isset($addComment)){

                $email = $_SESSION["email"];
                $sqlInsertComment = "INSERT INTO comment (product_id, user_email, comment) VALUES ('$id', '$email', '$comment')";
                $aff = $db->exec($sqlInsertComment);
                $comments = $db->query("select * from comment where product_id=".$id."")->fetchAll(PDO::FETCH_ASSOC) ;
                if($comments != null){
                    $stmt = $db->query("select * from product where product_id = $id");
                    $laptop = $stmt->fetch(PDO::FETCH_ASSOC);
                $rateCount=$db->query("select * from comment")->rowCount();
                $newRate = ($rates + $laptop['product_rate'])/$rateCount;
                $sqlUpdateRate = "UPDATE product SET product_rate=$newRate where product_id=$id.";
                $db->query($sqlUpdateRate);
            }
            }

            //extract( $POST);
  if (isset($_POST['promotiontrue'])) {

  	$sqlupdateone="UPDATE product SET product_promotion=1 WHERE product_id =".$id."";
 	$db->query($sqlupdateone);
 	
 	}
 	else {
 		$sqlupdatezero="UPDATE product SET product_promotion=0 WHERE product_id =".$id."";
 		$db->query($sqlupdatezero);
 		
 	}
  

        try {

            $stmt = $db->query("select * from product where product_id = $id");
            $laptop = $stmt->fetch(PDO::FETCH_ASSOC);




        } catch (Exception $ex) {
            echo "Wrong id" ;
        }
 	
        ?>
        
        <table id="container">
            <tr>
                <td colspan="2"><h2><?= $laptop["product_title"]; ?></h2></td>
            </tr>  
            <tr>
               <td><img src="img/<?= $laptop['product_img'] ?>" class="profile"> </td>
                <td  valign="top">
                    <h3><?= $laptop["product_price"] . " TL"; ?></h3>
                    <table>
                        <tr><td>Brand</td><td><?= $laptop["product_brand"]; ?></td></tr>                     
                        <tr><td>Model</td><td><?= $laptop["product_title"]; ?></td></tr>                     
                        <tr><td>Rate</td><td>
                        <?php
                        if(isset($newRate))
                        {
                          $rate=$newRate;
                        }
                        else{
                          $rate=$laptop['product_rate'];
                        }
                        for($i=0; $i<$rate; $i++){
                            echo "&#9733";
                        }
                        for($j=5-$rate;$j>0; $j--){
                            echo "&#9734";
                        }
                        ?>                     
                        <tr><td colspan="2"><a href="addcart.php?id=<?=$id?>" class="btnAdd"><button class="submitbtn">Add to Cart 🛒</button></a></td></tr>             
                                         
                    </table>
                </td>
            </tr>
            <tr>
                
            </tr>
                  <?php if(isset($_SESSION['loggedin'])){ ?>
            <tr>
                <td colspan="2" class="center">
                    <form action="details.php?id=<?=$id?>" method='POST'>
                        <textarea rows="4" cols="50" name="comment"></textarea><br>
                        <a href="details.php?id=<?=$id?>"><button type="submit" name="addComment">Post Comment</button></a>
                        <select name="rates">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </form>
                </td>
            </tr>
           
            <?php }
           

            
            
            

            if($comments != null){

                foreach ($comments as $comm){
                    if($comm['comment'] !=null){
                    echo "<tr>";
                    echo "<td>";
                    echo $comm['comment']. "<br>"; 
                    echo $comm['user_email'];
                    echo "</td>";
                    echo "</tr>";
                    }
                }
            }
            
            ?>
            <tr>
                <td colspan="2" class="center">
                    <?php
                    if($admin==1){
                    
                    	echo "<form method='POST'>";
                   
                    if($laptop['product_promotion']==1){
                    	?>
                    	<a href="details.php?id=<?=$id?>"><input type="submit"  class='submitbtn' name='promotionfalse' value="Remove Promotion"></a>
                  <?php  }
                    else{?>
                    		 <a href="details.php?id=<?=$id?>"><input type="submit"  class='submitbtn' name='promotiontrue' value="Add Promotion"> </a>
<?php
                    }
                 echo "</form>";
                }
?>



                </td>
            </tr>
        </table>
        
    </body>
</html>

