<?php
session_start();
include("config.php");
//td: add session handler
if(!isset($_SESSION['adminAccess']))
{
    header("location:admin.php");
} 
include('adminmenu.php');
?>

<html>
<head>
<link rel="icon" href="images/logonotext.png">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="menu.css">
<title>Dashboard</title>
</head>
<body>
<h1>Welcome Back Admin!</h1>
<img src="images/Bookfront logo2.png">
</body>
</html>
