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
<h1> Product Details</h1>
<?php
    $con = OpenCon();
    $id = mysqli_real_escape_string($con,$_GET['Id']);
    $query = "SELECT * FROM Products where Id = '$id'";
    $result = mysqli_query($con,$query);
    
    if ($result->num_rows > 0)
    {
      
      // output data of each row  
      while($row = $result->fetch_assoc())
      {
       
        $divStatus = ($row['quantity']<1)? "style='pointer-events: none;opacity: 0.4;'" : "";
        $prodAlert = ($row['quantity']>0 && $row['quantity']<5)? "<div> only ".$row['quantity']." left</div>" : "";
        echo "<div " .$divStatus. ">" . "<img src = " . $row['photo']. ">" . "<a href='product.php?Id=>" . $row['Id']. "'>" .$row['name']." </a>" ."<span> ". $row['price']."</span>" . "<div>".$row['description'] ."</div>".$prodAlert."</div>";
     
      }}
    CloseCon($con);
?>
            
 <button name="logout" id ="logout"
    onclick="window.location.href = 'logOut.php';">
        LogOut
    </button>         
</body>
</html>