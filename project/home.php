<?php
session_start(); 
include("config.php");
if(!isset($_SESSION['id']))
{
    header("Location: index.php");
}
include("customermenu.php");
?>

<!DOCTYPE html>
 <html>
   <head>
    <title>Home</title>
    <link rel="icon" href="images/logonotext.png">
    <link rel="stylesheet" href="productcards.css">
  </head>
   <body>
<h1>Home</h1>
<?php
    $con = OpenCon();
    session_start();
<<<<<<< Updated upstream
    echo "Welcome".$_SESSION['username'];
=======
>>>>>>> Stashed changes
    $query = "SELECT * FROM Products";
    $result = mysqli_query($con,$query);
    if ($result->num_rows > 0)
    {
      // output data of each row  
      while($row = $result->fetch_assoc())
      {

        if($row['quantity']>0)
        {
<<<<<<< Updated upstream
            $divStatus = ($row['quantity']<1)? "style='pointer-events: none;opacity: 0.4;'" : "";
        $prodAlert = ($row['quantity']>0 && $row['quantity']<5)? "<div> Hurry up before its out of stock</div>" : "";
        echo "<div " .$divStatus. ">" . "<img src = " . $row['photo']. ">" . "<a href='product.php?Id=" . $row['Id']. "'>" .$row['name']." </a>" ."<span> ". $row['price']."</span>" . "<div>".$row['description'] ."</div>".$prodAlert."</div>";
        }
=======
        //$divStatus = ($row['quantity']<1)? "style='pointer-events: none;opacity: 0.4;'" : ""; <- what's the point of this?
        $prodAlert = ($row['quantity']>0 && $row['quantity']<5)? "<div> Hurry up before its out of stock</div>" : "";
        //echo "<div " .$divStatus. ">" . "<img src = 'images/" . $row['photo']. "' /><br>" . "<a href='product.php?Id=" . $row['Id']. "'>" .$row['name']." </a>" ."<br><span> ". $row['price']." SAR </span>" . "<br><div>".$row['description'] ."</div><div>".$row['quantity']." left".$prodAlert."</div>";
          echo 	'<div class="hero-container">
          <div class="main-container">
            <div class="cover-container">
              <a href="product.php?Id=' . $row['Id']. '"><img src = "images/' . $row['photo'] .  '" class="cover"/></a>
            </div>
            <div class="book-container">
              <div class="product__content">
                <h4 class="product-title">'.$row['name'].'</h4>
                <p class="product-price"><span> '. $row['price'].' SAR </span></p>
                <p class="product-stock"> '.$row['quantity'].' left'.$prodAlert.'
                </p>
                <a href="product.php?Id=' . $row['Id']. '"><button class="product__info-btn">More...</button></a>
              </div>
            </div>
            </div>
          ';

>>>>>>> Stashed changes
      
      }}}
     CloseCon($con);
?>
<<<<<<< Updated upstream
            
<button name="logout" id ="logout"
    onclick="window.location.href = 'logOut.php';">
        LogOut
    </button>        
=======

>>>>>>> Stashed changes
</body>
</html>