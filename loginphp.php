<?php

include("db.php"); //veritabanını ekliyoruz
$reg=FALSE;
$errmail="";
if (isset($_POST['registerBtn'])) {
    extract( $_POST);
$sql="SELECT * FROM user WHERE user_email = '$email' AND user_password= '$password'";
$row=$db->query($sql);
$result=$row->fetch();
$admindb= $result['admin'];
if ($row->rowCount()==0) {
    $err="Email or Password is Incorrect";
    echo $err;
}
else
{
session_start();
$_SESSION["loggedin"] = TRUE;
$_SESSION["email"] = $email;
$_SESSION["admin"] = $admindb; 
//header("location: main.php?name=".$row['user_fullname']."&admin=".$row['admin'].""); 
header("location:main.php"); 
}
}

?>