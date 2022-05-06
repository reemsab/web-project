<?php
session_start(); 
include("config.php");
if(!isset($_SESSION['id']))
{
   header("Location: index.php");
}
include("customermenu.php")
?>

<!DOCTYPE html>
 <html>
   <head>
    <title>Product</title>
    <link rel="icon" href="images/logonotext.png">
    <link rel="stylesheet" href="productcards.css">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
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
       
<<<<<<< Updated upstream
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
=======
        //$divStatus = ($row['quantity']<1)? "style='pointer-events: none;opacity: 0.4;'" : "";
        $prodAlert = ($row['quantity']>0 && $row['quantity']<5)? "<div> only ".$row['quantity']." left. Hurry up before it's out of stock!</div>" : "";
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
 <div class="wrapper">
    <div class="product-img">
      <?php echo '<img src="images/'. $row['photo'].'">';?>
    </div>
    <div class="product-info">
      <div class="product-text">
        <?php echo '<h1>'.$row['name'].'</h1>
        <h2>'.$prodAlert.'</h2>
        <p>'.$row['description'] .'</p>
      </div>
      <div class="quantity">
      <input type="number" step="1" name="order_quant" min="1" max="'.$row['quantity'].'" value="1">
      </div>       <p><span>'. $row['price'].' SAR</span></p>';?>
      <div class="product-price-btn">

        <button type="submit" value = "Add To Cart" name ="add_to_cart">Add to Cart</button>
      </div>
    </div>
  </div>     
</form>
>>>>>>> Stashed changes
</body>
</html>