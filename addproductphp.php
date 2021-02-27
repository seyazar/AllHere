<?php

require_once 'db.php';
require_once './authadmin.php';
$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["addBtn"])) {

extract( $_POST);
var_dump($_POST);

$sql="INSERT INTO product (product_category, product_title,product_detail, product_img, product_brand,product_price,product_rate) VALUES ('".$product_category."', '".$product_title."', '".$product_detail."','".$target_file."','".$product_brand."','".$product_price."','0')";
//echo $imgname;


    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       if($db->query($sql));
		echo "eklendi";  
    } 
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
  


header("location: main.php"); 




}



?>