<?php

session_start(); 
include("config.php");

if(!isset($_SESSION['id']))
{
  header("Location: index.php");
}
?>

<!DOCTYPE html>
 <html>
   <head>
    <title>Home</title>
  </head>
   <body>
<h1> Home</h1>
<?php
    $con = OpenCon();
    session_start();
    echo "Welcome ".$_SESSION['username'];;
    $query = "SELECT * FROM Products";
    $result = mysqli_query($con,$query);
    if ($result->num_rows > 0)
    {
      
      // output data of each row  
      while($row = $result->fetch_assoc())
      {
        if($row['quantity']>0)
        {
        $divStatus = ($row['quantity']<1)? "style='pointer-events: none;opacity: 0.4;'" : "";
        $prodAlert = ($row['quantity']>0 && $row['quantity']<5)? "<div> Hurry up before its out of stock</div>" : "";
        echo "<div " .$divStatus. ">" . "<img src = 'images/" . $row['photo']. "' /><br>" . "<a href='product.php?Id=" . $row['Id']. "'>" .$row['name']." </a>" ."<br><span> ". $row['price']." SAR </span>" . "<br><div>".$row['description'] ."</div><div>".$row['quantity']." left".$prodAlert."</div>";
        }
      
      }}
     CloseCon($con);
?>

<button name="cart" id ="cart"
    onclick="window.location.href = 'cart.php';">
        Go to cart
</button> 

<button name="logout" id ="logout"
    onclick="window.location.href = 'logOut.php';">
        LogOut
</button>        
</body>
</html>