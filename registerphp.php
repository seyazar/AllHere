<?php



include("db.php"); //veritabanını ekliyoruz
$reg=FALSE;
$errmail="";
if (isset($_POST['registerBtn'])) {
    extract( $_POST);
    if (isset($admin)) {
        $admindb=TRUE;
    }
    else{
        $admindb=0;
    }

    $sql="INSERT INTO user (user_fullname, user_email,user_address, user_password, admin) VALUES ('".$fullname."', '".$email."', '".$address."','".$password."','".$admindb."')";
    if (!checkEmail($email,$db)) {
    if($db->query($sql));
    $reg=TRUE;  
}
else{
    $errmail="emailerror";
    header("location:register.php?error=".$errmail);
}

}

function checkEmail($email,$dbhelp)
{
    $sqlfind="SELECT * FROM user";
    foreach ($dbhelp->query($sqlfind) as $row) {
        if (strcmp($row['user_email'], $email)==0) 
            return TRUE;
        

    }
    return FALSE;
}
if ($reg==TRUE)
{
session_start();
$_SESSION["loggedin"] = TRUE;
$_SESSION["email"] = $email;
$_SESSION["admin"] = $admindb; 
header("location: main.php");  


}


?>