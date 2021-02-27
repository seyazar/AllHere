<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="deneme.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>
		
	</title>
</head>
<body>
      
        <a href="main.php" id="logo"><img src="img/logo.jpg" style="height: 160px; width: 160px; margin: 0;"></a>
          
    

    <?php
//        $err=$_GET['error'];
        if (!empty($error)) {
            echo "<p>This Email is Already Used</p>";
        }
    ?>
    <div class="registercontainer">
        <div class="registerinnercontainer1">
            <h1 class="registerheader" style="text-align: center;color: #AEC6CF">Register Page</h1>
    <?php
//        $err=$_GET['error'];
        if (!empty($error)) {
            echo "<p>This Email is Already Used</p>";
        }
    ?>
        <form action="registerphp.php" method="post">
            <table class="registertable">

                <tr>
                    <td class="registertag">Full Name :</td>
                    <td ><input class="registerinput" type="text" name="fullname" required=""></td>
                </tr>
                <tr class="registertr">
                    <td class="registertag">Password :</td>
                    <td ><input class="registerinput" type="password" name="password" required=""></td>
                </tr>
                <tr class="registertr">
                    <td class="registertag">Email</td>
                    <td ><input class="registerinput" type="email" name="email" required=""></td>
                </tr>
                                <tr class="registertr">
                    <td class="registertag">Address :</td>
                    <td ><textarea class="registerinput" name="address"></textarea></td>
                </tr>
                <tr class="registertr">
                    <td class="registertag">Admin :</td>
                    <td ><input class="registercb" type="checkbox" name="admin"></td>
                </tr>

                <tr class="registertr">
                    <td colspan="2">
                       <a href=#> <input class="submitbtn" type="submit" value="Register" name="registerBtn" style="display: block;
margin: auto;"></a>
                    </td>
                </tr>

            </table>
        </form>
        </div>

        <div class="registerinnercontainer2">
            <h2 class="registerheader"  style="text-align: center;color: #759BA9;">Why All Here?</h2>
            <p>orem ipsum dolor sit amet, consectetur adipiscing elit. Praesent blandit faucibus nisl quis semper. Fusce mollis sem mi, et auctor est tempor ullamcorper. Nulla accumsan nisi nec magna lacinia varius. Suspendisse erat nisl, vestibulum in maximus eget, tincidunt eget tellus. Nullam non libero semper, eleifend elit et, ornare lectus. Nunc nec diam ante. Nam porta nulla dapibus consequat fringilla. Fusce euismod neque at nulla scelerisque tempor vitae ut velit. Duis porttitor orci sed turpis scelerisque euismod tempor eget ante. Donec eu risus ullamcorper, efficitur nulla sit amet, ullamcorper dolor.</p>
            
        </div>
    </div>
</body>
</html>
