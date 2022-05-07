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
        <title>Cart</title>
        <link rel="icon" href="images/logonotext.png">
        <link rel="stylesheet" href="productcards.css">
    </head>

    <body>
    <div class="cart">
        <div class="cart-container">
         <h3 class="heading">Shopping Cart</h3>    
        <?php
        $con = OpenCon();
        $grand_total = 0;
        $quantity_total=0;

        $size = count($_SESSION['orders']);
        if($size > 1){
        for($row = 1; $row < $size; $row++){
            $prod_id = $_SESSION['orders'][$row][0];
            $prod_quant = $_SESSION['orders'][$row][1];
            //echo "<h3> id = ".$prod_id." </h3>";
            //echo "<h3> quant = ".$prod_quant." </h3>";

            $prod_info = mysqli_query($con, "SELECT * FROM products WHERE Id = '$prod_id' ");

            if(mysqli_num_rows($prod_info) > 0){
                while($result = $prod_info->fetch_assoc()) {

                    $prod_price = $result['price'];
                    $sub_total = $prod_quant * $prod_price;
                    $grand_total += $sub_total;
                    $quantity_total += $prod_quant;

                    //echo "<div> Book name: ".$result['name']."</div><br><img src='images/".$result['photo']."' /> <div> quantity: ".$prod_quant ."</div><div> price: ".$sub_total."</div>";
                    echo '<div class="Cart-Items">
                    <div class="image-box">
                    <img  src="images/'.$result['photo'].'"/>
                    </div>
                    <div class="about">
                    <h1 class="title">'.$result['name'].'</h1>
                    <h3 class="subtitle">Quantity: '.$prod_quant.'</h3>
                    </div>
                    <div class="prices">'.$sub_total.' SAR</div>
                    </div>';
                }
            }      
        }
        echo "<hr><div class='checkout'><div class='total'><div><div class='Subtotal'>Total</div>
        <div class='items'>".$quantity_total." books</div></div>
        <div class='total-amount'>".$grand_total."SAR</div></div>";

    }
    else {
        echo "<div class='heading' style='text-decoration:underline;'> No Products Added </div><hr><div class='checkout'>";
    }

    ?> 

        <form action="" method="POST" name="confirm">
            <input type='submit' value="Confirm Order" name="confirm_order" class="checkout-button" />
            <div class="error"> <?php echo $msg ?> </div>
        </form>
        </div>
        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {      
        $cust_email = $_SESSION['email']; 

        $insert_order = mysqli_query($con, "INSERT INTO `orders`(custEmail, total) VALUES ('$cust_email', '$grand_total') ") or die("Insert into Orders query failed");
    
        if($insert_order){

        echo "<div> Order is Confirmed Successfully! </div>";
        $order_id = mysqli_insert_id($con);

        for ($i = 1; $i < count($_SESSION['orders']); $i++) {
        $prod_id = $_SESSION['orders'][$i][0];
        $prod_quant = $_SESSION['orders'][$i][1];
        mysqli_query($con, "INSERT INTO `orders-prod` VALUES ('$order_id', '$prod_id', '$prod_quant')") or die("Insert into orders-prod query failed");

        //update product quantity
        $select_prod = mysqli_query($con, "SELECT * FROM products WHERE Id = '$prod_id'");
        $result = $prod_info->fetch_assoc();
        $original_quant = $result['quantity'];

        $remaining_quant = $original_quant - $prod_quant;
        mysqli_query($con, "UPDATE products SET quantity = '$remaining_quant' WHERE Id = '$prod_id' ");

            }
        }
    }
    CloseCon($con);
        ?>

        </div>
        </div>
    </body>
</html>