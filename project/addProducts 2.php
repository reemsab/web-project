<?php
include("config.php");
//td: add session handler
if(!isset($_SESSION['adminAccess']))
{
    //header("Location: admin.php");
} 
 
?>
<html>
<head>
<title> Add Products</title>
</head>
<body>
<h1>Add Products</h1>
 <form name="form" action="" method="post" id="form">
        <input type="text"  id="name" name= "name" placeholder="Enter producct name">
        <input type ="file" id="img" name="img" >
        <input type="number" step="0.01" name="price" id ="price" placeholder="Enter producct price" >
        <input type=number step=1 id="quant" name="quant" placeholder="Enter producct quantity">
        <textarea id = "desc" name ="desc" form="form" placeholder="Enter product descritipn" ></textarea>
        
        <input type = "submit" value = "Submit">
 </form>
<form name="logout" action="logOut.php" id=logout>
<input type = "submit" value = "LogOut">
</form>

</body>
</html>
