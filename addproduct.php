<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="deneme.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title></title>
</head>
<body> 
     <a href="main.php" id="logo"><img src="img/logo.jpg" style="height: 160px; width: 160px; margin: 0;"></a>
 
<div class="addcontainer" >
    <h2 style="text-align:center;color: #AEC6CF; ">Add Product</h2>
        <form action="addproductphp.php" method="post"  enctype="multipart/form-data">
            <table class="registertable">

            	  <tr class="addtr">
                    <td class="addtag">Product Category: </td>
                    <td>
                    <select name="product_category" class="categoryselect">
  						<option value="phone">Phone</option>
  						<option value="computer">Computer</option>
					</select>
                    </td>
                </tr>
                <tr class="addtr">
                    <td class="addtag">Product Title:</td>
                    <td ><input class="registerinput" type="text" name="product_title" required=""></td>
                </tr>
                <tr class="addtr">
                    <td class="addtag">Procuct Detail:</td>
                    <td ><textarea class="registerinput" name="product_detail"></textarea></td>
                </tr>
                <tr class="addtr">
                    <td class="addtag">Product Brand:</td>
                    <td ><input class="registerinput" type="text" name="product_brand" required=""></td>
                </tr>
                <tr class="addtr">
                    <td class="addtag">Product Price:</td>
                    <td ><input class="registerinput" type="text" name="product_price" required=""></td> 
                </tr>

				<tr class="addtr">
                    <td class="addtag">Product Image:</td>
                    <td >
                    	<input type="file" name="fileToUpload" id="fileToUpload" class="registerinput">


                    </td> 
                </tr>



                <tr class="addtr">
                    <td colspan="2">
                       <a href=#> <input class="submitbtn" type="submit" value="Add" name="addBtn" style="display: block;
margin: auto;"></a>
                    </td>
                </tr>

            </table>
        </form>
        </div>
</body>
</html>