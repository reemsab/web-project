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
<p> <a href="home.php">home</a> / product details</p>
<?php
    $con = OpenCon();

    $id = mysqli_real_escape_string($con,$_GET['Id']);
    $query = "SELECT * FROM Products WHERE Id = '$id'";
    $result = mysqli_query($con,$query);
    
    if ($result->num_rows == 1)
    {
      // output data of each row  
      $row = $result->fetch_assoc();
       
        $divStatus = ($row['quantity']<1)? "style='pointer-events: none;opacity: 0.4;'" : "";
        $prodAlert = ($row['quantity']>0 && $row['quantity']<5)? "<div> only ".$row['quantity']." left. Hurry up before it's out of stock!</div>" : "";
        echo "<div " .$divStatus. ">" . "<img src = 'images/" . $row['photo']. "' /><br>" .$row['name']." </a>" ."<br><span> ". $row['price']." SAR</span>" . "<div>".$row['description'] ."</div>".$prodAlert."</div>";
    }

    //if(isset($_POST['add_to_cart']))
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $prod_quant = $_POST['order_quant'];
      if($prod_quant > $row['quantity']){
        $msg = "* Requested quantity is not available!";
      }
      else{
      $new_order = array($id, $prod_quant);
      array_push($_SESSION['orders'] , $new_order);
      $msg = "Product added to cart successfully!";
      }
  }

    CloseCon($con);
?>

<form name="add_to_cart" action="" method="POST" id="add_cart">
  <div class="error" ><?php echo $error; ?></div> 
        <input type="number" step="1" name="order_quant" min="1" value="1">
      <input type = "submit" value = "Add To Cart" name ="add_to_cart">
      <div class="msg" ><?php echo $msg; ?></div> 
 </form>
          
 <button name="logout" id ="logout"
    onclick="window.location.href = 'logOut.php';">
        LogOut
    </button>         
</body>
</html>