<php?
if(!isset($_SESSION['adminAccess']))
{
    header("Location: admin.php");
} ?>

<html>
<head>
</head>
<body>
<h1>Welcome</h1>
<a href="viewOrders.php"> View Orders</a>
<a href="addProduct.php"> Add Product</a>
<button name="logout" id ="logout"
    onclick="window.location.href = 'logOut.php';">
        LogOut
    </button>  
</body>
</html>
