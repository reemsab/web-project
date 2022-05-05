<?php
session_start();
include("config.php");
//td: add session handler
if(!isset($_SESSION['adminAccess']))
{
    header("location:admin.php");
} 
?>

<html>
<head>
</head>
<body>
<h1>Welcome</h1>
<a href="viewOrders.php"> View Orders</a>
<a href="addProducts.php"> Add Product</a>
<button name="logout" id ="logout"
    onclick="window.location.href = 'logOut.php';">
        LogOut
    </button>  
</body>
</html>
