<php?
if(!isset($_SESSION['adminAccess']))
{
<<<<<<< Updated upstream
    header("Location: admin.php");
} ?>
=======
    header("location:admin.php");
} 
include('adminmenu.php');
?>
>>>>>>> Stashed changes

<html>
<head>
<link rel="icon" href="images/logonotext.png">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="menu.css">
<title>Dashboard</title>
</head>
<body>
<<<<<<< Updated upstream
<h1>Welcome</h1>
<a href="viewOrders.php"> View Orders</a>
<a href="addProduct.php"> Add Product</a>
<button name="logout" id ="logout"
    onclick="window.location.href = 'logOut.php';">
        LogOut
    </button>  
=======
<h1>Welcome Back Admin!</h1>
<img src="images/Bookfront logo2.png">
>>>>>>> Stashed changes
</body>
</html>
