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
<table>
  <tr>
<?php
    $con = OpenCon();
    session_start();
    $query = "SELECT * FROM Products";
    $result = mysqli_query($con,$query);
    $lineBreak = 0;
    if ($result->num_rows > 0)
    {
      // output data of each row  
      while($row = $result->fetch_assoc())
      {

        if($row['quantity']>0)
        {
        //$divStatus = ($row['quantity']<1)? "style='pointer-events: none;opacity: 0.4;'" : ""; <- what's the point of this?
        $prodAlert = ($row['quantity']>0 && $row['quantity']<5)? "<div> Hurry up before its out of stock</div>" : "";
        if($lineBreak % 3==0){
          echo '</tr>';
          echo '<tr>';
        }  
        echo 	'<td>
        <div class="card">
          <div class="card-body">
            <div class="card-img-actions">
              <a href="product.php?Id=' . $row['Id']. '"><img src = "images/' . $row['photo'] .  '" class="card-img img-fluid"/></a>
            </div>
            </div>
            <div class="card-body">
                <h4 class="product-title">'.$row['name'].'</h4>
                <p class="product-price"><span> '. $row['price'].' SAR </span></p>
                <p class="product-stock"> '.$row['quantity'].' left'.$prodAlert.'
                </p>
                <a href="product.php?Id=' . $row['Id']. '"><button class="bt-details">Details</button></a>
              </div>
            </div>
            </td>
          ';
          $lineBreak++;
      }}}
     CloseCon($con);
?>
</tr>
</table>
</body>
</html>