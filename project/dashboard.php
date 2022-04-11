<php?
if(!isset($_SESSION['adminAccess']))
{
    //header("Location: admin.php");
} ?>

<html>
<head>
</head>
<body>
<h1>welcome</h1>
<a href="viewOrders.php"> View Orders</a>
<a href="addProduct.php"> Add Product</a>
</body>
</html>
