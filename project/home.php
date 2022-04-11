<?php
session_start(); 
include("config.php");
if(!isset($_SESSION['id']))
{
   // header("Location: index.php");
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
    $query = "SELECT * FROM Products";
    $result = mysqli_query($con,$query);
    
    if ($result->num_rows > 0)
    {
      
      // output data of each row  
      while($row = $result->fetch_assoc())
      {
       
        $divStatus = ($row['quantity']<1)? "style='pointer-events: none;opacity: 0.4;'" : "";
        $prodAlert = ($row['quantity']>0 && $row['quantity']<6)? "<div> Hurry up before its out of stock</div>" : "";
        echo "<div " .$divStatus. ">" . "<img src = " . $row['photo']. ">" . "<a href='product.php?Id=>" . $row['Id']. "'>" .$row['name']." </a>" ."<span> ". $row['price']."</span>" . "<div>".$row['description'] ."</div>".$prodAlert."</div>";
     
      }}
?>
            
          
</body>
</html>